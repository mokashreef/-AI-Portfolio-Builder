<?php
namespace App\Services;

require_once __DIR__ . '/ComponentRegistry.php';
require_once __DIR__ . '/WebsiteService.php';

use ZipArchive;
use App\Services\ComponentRegistry;
use App\Services\WebsiteService;

/**
 * CraftFolio - Static Site ZIP Export Service
 */
class ExportService {

    public static function generateZip(int $websiteId, int $userId): ?string {
        $site = WebsiteService::getWebsiteById($websiteId, $userId);
        if (!$site) return null;

        $pages = WebsiteService::getWebsitePages($websiteId);
        if (empty($pages)) return null;

        $tempDir = __DIR__ . '/../../storage/temp/export_' . $websiteId . '_' . time() . '/';
        if (!is_dir($tempDir)) {
            mkdir($tempDir, 0755, true);
        }

        $cssDir = $tempDir . 'css/';
        mkdir($cssDir, 0755, true);

        // Copy / generate static CSS
        $cssContent = file_get_contents(__DIR__ . '/../../assets/css/craftfolio-public.css');
        if ($cssContent === false) {
            $cssContent = "/* CraftFolio Static CSS */\n";
        }
        if (!empty($site['custom_css'])) {
            $cssContent .= "\n/* Custom User CSS */\n" . $site['custom_css'];
        }
        file_put_contents($cssDir . 'style.css', $cssContent);

        // Render each page
        $theme = $site['theme_settings'] ?? [];
        $dir = $site['direction'] ?? 'ltr';

        foreach ($pages as $p) {
            $pageData = WebsiteService::getPageWithContent($p['id'], 'published');
            if (empty($pageData['sections'])) {
                $pageData = WebsiteService::getPageWithContent($p['id'], 'draft');
            }
            $sections = $pageData['sections'] ?? [];

            $fileName = $p['is_home'] ? 'index.html' : ($p['slug'] . '.html');

            $html = self::renderStaticHtmlPage($site, $p, $sections, $theme, $dir);
            file_put_contents($tempDir . $fileName, $html);
        }

        // Package into ZIP
        $zipFile = sys_get_temp_dir() . '/website_' . $site['slug'] . '_' . time() . '.zip';
        $zip = new ZipArchive();
        if ($zip->open($zipFile, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            return null;
        }

        $files = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($tempDir, \RecursiveDirectoryIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::LEAVES_ONLY
        );

        foreach ($files as $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($tempDir));
                $zip->addFile($filePath, $relativePath);
            }
        }
        $zip->close();

        // Cleanup temporary folder
        self::deleteDir($tempDir);

        return $zipFile;
    }

    private static function renderStaticHtmlPage(array $site, array $page, array $sections, array $theme, string $dir): string {
        $title = htmlspecialchars(!empty($page['seo_title']) ? $page['seo_title'] : ($page['title'] . ' | ' . $site['title']));
        $desc = htmlspecialchars(!empty($page['seo_description']) ? $page['seo_description'] : ($site['seo_settings']['description'] ?? ''));

        $primary = $theme['primaryColor'] ?? '#2563eb';
        $secondary = $theme['secondaryColor'] ?? '#3b82f6';
        $bg = $theme['backgroundColor'] ?? '#ffffff';
        $text = $theme['textColor'] ?? '#0f172a';
        $hFont = $theme['headingFont'] ?? 'Plus Jakarta Sans';
        $bFont = $theme['bodyFont'] ?? 'Inter';
        $radius = $theme['borderRadius'] ?? '8px';

        $bodyHtml = '';
        foreach ($sections as $sec) {
            $bodyHtml .= ComponentRegistry::renderSection($sec, $theme, false);
        }

        return '<!DOCTYPE html>
<html lang="en" dir="' . $dir . '">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $title . '</title>
    <meta name="description" content="' . $desc . '">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code&family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Playfair+Display:wght@400;600;700&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        :root {
            --cf-primary: ' . $primary . ';
            --cf-secondary: ' . $secondary . ';
            --cf-bg: ' . $bg . ';
            --cf-text: ' . $text . ';
            --cf-heading-font: "' . $hFont . '", sans-serif;
            --cf-body-font: "' . $bFont . '", sans-serif;
            --cf-radius: ' . $radius . ';
        }
        body {
            background-color: var(--cf-bg);
            color: var(--cf-text);
            font-family: var(--cf-body-font);
            margin: 0;
            padding: 0;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--cf-heading-font);
        }
    </style>
</head>
<body>
' . $bodyHtml . '
</body>
</html>';
    }

    private static function deleteDir(string $dirPath): void {
        if (!is_dir($dirPath)) return;
        $files = array_diff(scandir($dirPath), ['.', '..']);
        foreach ($files as $file) {
            $path = "$dirPath/$file";
            is_dir($path) ? self::deleteDir($path) : unlink($path);
        }
        rmdir($dirPath);
    }
}
