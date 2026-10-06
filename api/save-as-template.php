<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../app/Services/ComponentRegistry.php';
require_once __DIR__ . '/../app/Services/TemplateRegistry.php';
require_once __DIR__ . '/../app/Services/WebsiteService.php';

require_once __DIR__ . '/../app/Core/I18n.php';

use App\Core\Security;
use App\Core\Auth;
use App\Core\I18n;
use App\Services\WebsiteService;

I18n::init();

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
    echo json_encode(['success' => false, 'message' => I18n::t('auth.err_invalid_csrf')]);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;
$websiteId = (int)($input['website_id'] ?? 0);
$name = trim($input['name'] ?? '');

if (!$websiteId || empty($name)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => I18n::t('auth.err_required_fields')]);
    exit;
}

$res = WebsiteService::saveAsTemplate($websiteId, Auth::id(), $name);
echo json_encode($res);
