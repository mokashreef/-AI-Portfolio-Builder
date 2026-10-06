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
$websiteId = (int)($input['website_id'] ?? 0);
$title = Security::clean($input['title'] ?? '');
$slug = Security::clean($input['slug'] ?? '');

if (!$websiteId || empty($title)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Website ID and page title are required']);
    exit;
}

$res = WebsiteService::createPage($websiteId, $title, $slug, Auth::id());
echo json_encode($res);
