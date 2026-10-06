<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Core/Auth.php';
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
$templateId = (int)($input['template_id'] ?? 0);

if (!$templateId) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Invalid template ID']);
    exit;
}

$res = WebsiteService::deleteCustomTemplate($templateId, Auth::id());
echo json_encode($res);
