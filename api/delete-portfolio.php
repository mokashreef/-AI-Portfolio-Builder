<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../app/Services/ComponentRegistry.php';
require_once __DIR__ . '/../app/Services/TemplateRegistry.php';
require_once __DIR__ . '/../app/Services/WebsiteService.php';

use App\Core\Security;
use App\Core\Auth;
use App\Services\WebsiteService;

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method not allowed']);
    exit;
}

if (!Auth::check()) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => 'Unauthorized']);
    exit;
}

if (!Security::verifyCsrf()) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Invalid security token']);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$id = intval($input['id'] ?? $input['website_id'] ?? 0);

if (!$id) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid ID']);
    exit;
}

// Check admin or owner
$db = getDB();
$stmt = $db->prepare("SELECT user_id FROM websites WHERE id = ?");
$stmt->execute([$id]);
$site = $stmt->fetch();

if (!$site) {
    // Check legacy table if exists
    try {
        $stmtLegacy = $db->prepare("SELECT user_id FROM portfolios WHERE id = ?");
        $stmtLegacy->execute([$id]);
        $leg = $stmtLegacy->fetch();
        if ($leg) {
            if ((int)$leg['user_id'] !== Auth::id() && !Auth::isAdmin()) {
                http_response_code(403);
                echo json_encode(['success' => false, 'message' => 'غير مصرح بحذف هذا الموقع']);
                exit;
            }
            $db->prepare("DELETE FROM portfolios WHERE id = ?")->execute([$id]);
            echo json_encode(['success' => true, 'message' => 'تم حذف الموقع بنجاح']);
            exit;
        }
    } catch (\Exception $e) {}

    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'الموقع غير موجود']);
    exit;
}

if ((int)$site['user_id'] !== Auth::id() && !Auth::isAdmin()) {
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'غير مصرح بحذف هذا الموقع']);
    exit;
}

WebsiteService::deleteWebsite($id, (int)$site['user_id']);
echo json_encode(['success' => true, 'message' => 'تم حذف الموقع بنجاح']);
