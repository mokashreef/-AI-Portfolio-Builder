<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../app/Services/AssetService.php';

use App\Core\Security;
use App\Core\Auth;
use App\Services\AssetService;

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
$assetId = (int)($input['asset_id'] ?? 0);

if (!$assetId) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Missing asset_id']);
    exit;
}

$deleted = AssetService::deleteAsset($assetId, Auth::id());

if ($deleted) {
    echo json_encode(['success' => true, 'message' => 'تم حذف الملف بنجاح']);
} else {
    http_response_code(404);
    echo json_encode(['success' => false, 'message' => 'الملف غير موجود أو لا تملك صلاحية حذفه']);
}
