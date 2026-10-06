<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../app/Services/ComponentRegistry.php';
require_once __DIR__ . '/../app/Services/TemplateRegistry.php';
require_once __DIR__ . '/../app/Services/WebsiteService.php';
require_once __DIR__ . '/../app/Services/ExportService.php';

use App\Core\Auth;
use App\Services\ExportService;

if (!Auth::check()) {
    http_response_code(401);
    die('Unauthorized');
}

$websiteId = (int)($_GET['id'] ?? $_GET['website_id'] ?? 0);
if (!$websiteId) {
    die('Invalid Website ID');
}

$zipPath = ExportService::generateZip($websiteId, Auth::id());
if (!$zipPath || !file_exists($zipPath)) {
    die('Could not generate ZIP export.');
}

$filename = 'website-export-' . $websiteId . '.zip';

header('Content-Type: application/zip');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header('Content-Length: ' . filesize($zipPath));
header('Pragma: no-cache');
readfile($zipPath);

@unlink($zipPath);
exit;
