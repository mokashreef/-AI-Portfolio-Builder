<?php
/**
 * CraftFolio - Public Portfolio & Multi-Page Renderer
 * Ultra-fast, zero-bloat, SEO-optimized public website renderer with Custom Domain resolution.
 */

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Core/Security.php';
require_once __DIR__ . '/app/Core/Auth.php';
require_once __DIR__ . '/app/Services/ComponentRegistry.php';
require_once __DIR__ . '/app/Services/WebsiteService.php';
require_once __DIR__ . '/app/Services/AnalyticsService.php';

use App\Core\Security;
use App\Core\Auth;
use App\Services\WebsiteService;
use App\Services\ComponentRegistry;
use App\Services\AnalyticsService;

$host = $_SERVER['HTTP_HOST'] ?? '';
$hostClean = preg_replace('/:\d+$/', '', $host); // strip port if any

$slug = Security::clean($_GET['slug'] ?? $_GET['user'] ?? $_GET['username'] ?? '');
$requestedPageSlug = Security::clean($_GET['page'] ?? '');

$website = null;

// 1. Check Custom Domain resolution if not primary host
$platformHosts = ['portfolio.code-elta6ur.net', 'localhost', '127.0.0.1'];
if (!in_array($hostClean, $platformHosts, true)) {
    $website = WebsiteService::getWebsiteByDomain($hostClean);
}

// 2. Fallback to slug resolution
if (!$website && !empty($slug)) {
    $website = WebsiteService::getWebsiteBySlug($slug, false);
    // Legacy fallback: check if slug matches a user's primary portfolio
    if (!$website) {
        $db = getDB();
        try {
            $stmtUserSite = $db->prepare("SELECT w.id FROM websites w JOIN users u ON w.user_id = u.id WHERE u.username = ? ORDER BY w.id ASC LIMIT 1");
            $stmtUserSite->execute([$slug]);
            $uSiteId = $stmtUserSite->fetchColumn();
            if ($uSiteId) {
                $website = WebsiteService::getWebsiteById((int)$uSiteId);
            }
        } catch (\Exception $e) {}
    }
}

// 3. Fallback for legacy id query parameter
if (!$website && !empty($_GET['id'])) {
    $website = WebsiteService::getWebsiteById((int)$_GET['id']);
    if (!$website) {
        $db = getDB();
        try {
            $stmtLegacy = $db->prepare("SELECT slug, username FROM portfolios WHERE id = ?");
            $stmtLegacy->execute([(int)$_GET['id']]);
            $leg = $stmtLegacy->fetch();
            if ($leg) {
                $targetSlug = $leg['slug'] ?: $leg['username'];
                if ($targetSlug) {
                    $website = WebsiteService::getWebsiteBySlug($targetSlug, false);
                }
            }
        } catch (\Exception $e) {}
    }
}

// 4. Handle Not Found (Requirement 42)
if (!$website) {
    http_response_code(404);
    renderCustom404('Portfolio Not Found', 'الموقع المطلوب غير موجود أو تم حذفه');
    exit;
}

$isOwner = (Auth::check() && Auth::id() === (int)$website['user_id']) || Auth::isAdmin();

// 5. Handle Unpublished Status
if (empty($website['is_published']) && !$isOwner) {
    http_response_code(404);
    renderUnderConstruction($website['title']);
    exit;
}

// 6. Resolve Active Page
$pages = WebsiteService::getWebsitePages((int)$website['id']);
$activePage = null;

if (!empty($requestedPageSlug)) {
    foreach ($pages as $p) {
        if ($p['slug'] === $requestedPageSlug) {
            $activePage = $p;
            break;
        }
    }
} else {
    // Default to home page
    foreach ($pages as $p) {
        if (!empty($p['is_home'])) {
            $activePage = $p;
            break;
        }
    }
    if (!$activePage && !empty($pages[0])) {
        $activePage = $pages[0];
    }
}

if (!$activePage) {
    http_response_code(404);
    renderCustom404('Page Not Found', 'الصفحة المطلوبة غير موجودة في هذا الموقع');
    exit;
}

// 7. Load Page Version (Owner can preview draft; public sees published)
$versionType = ($isOwner && !empty($_GET['preview_draft'])) ? 'draft' : 'published';
$pageData = WebsiteService::getPageWithContent((int)$activePage['id'], $versionType);
if (empty($pageData['sections']) && empty($pageData['locales'])) {
    // Fallback to draft if published is empty
    $pageData = WebsiteService::getPageWithContent((int)$activePage['id'], 'draft');
}

// 8. Bilingual / Locale Architecture Resolution
$requestedLang = Security::clean($_GET['lang'] ?? '');
$isBilingual = (!empty($pageData['locales']['ar']) && !empty($pageData['locales']['en'])) || (($website['direction'] ?? '') === 'bilingual');

if (in_array($requestedLang, ['ar', 'en'], true)) {
    $activeLocale = $requestedLang;
} else {
    // Default based on site direction or available locales
    $siteDir = $website['direction'] ?? '';
    if ($siteDir === 'ltr') {
        $activeLocale = 'en';
    } elseif ($siteDir === 'rtl') {
        $activeLocale = 'ar';
    } elseif (!empty($pageData['locales']['ar'])) {
        $activeLocale = 'ar';
    } else {
        $activeLocale = 'en';
    }
}

$theme = $website['theme_settings'] ?? [];
$seo = $website['seo_settings'] ?? [];

if (!empty($pageData['locales'][$activeLocale])) {
    $locPackage = $pageData['locales'][$activeLocale];
    $sections = $locPackage['sections'] ?? ($pageData['sections'] ?? []);
    if (!empty($locPackage['theme'])) {
        $theme = array_merge($theme, $locPackage['theme']);
    }
    $direction = $locPackage['direction'] ?? ($activeLocale === 'ar' ? 'rtl' : 'ltr');
} else {
    $sections = $pageData['sections'] ?? [];
    $direction = !empty($website['direction']) ? $website['direction'] : ($theme['direction'] ?? ($activeLocale === 'ar' ? 'rtl' : 'ltr'));
    if ($direction === 'bilingual') {
        $direction = ($activeLocale === 'ar') ? 'rtl' : 'ltr';
    }
}

// 9. Track Analytics (for non-owner visits)
if (!$isOwner) {
    AnalyticsService::recordView((int)$website['id'], (int)$activePage['id']);
}

// 10. SEO & Metadata
$pageTitle = !empty($activePage['seo_title']) ? $activePage['seo_title'] : (!empty($activePage['is_home']) ? $website['title'] : ($activePage['title'] . ' | ' . $website['title']));
$pageDesc = !empty($activePage['seo_description']) ? $activePage['seo_description'] : ($seo['description'] ?? 'Portfolio of ' . $website['title']);
$ogImage = !empty($seo['og_image']) ? $seo['og_image'] : '';
$favicon = !empty($seo['favicon']) ? $seo['favicon'] : '';

$primaryColor = $theme['primaryColor'] ?? '#2563eb';
$secondaryColor = $theme['secondaryColor'] ?? '#3b82f6';
$bgColor = $theme['backgroundColor'] ?? '#ffffff';
$textColor = $theme['textColor'] ?? '#0f172a';
$borderRadius = $theme['borderRadius'] ?? '8px';

// Typography distinction between Arabic and Latin
if ($activeLocale === 'ar' || $direction === 'rtl') {
    $headingFont = $theme['headingFont'] ?? 'IBM Plex Sans Arabic';
    $bodyFont = $theme['bodyFont'] ?? 'IBM Plex Sans Arabic';
    $headingLineHeight = '1.38';
    $bodyLineHeight = '1.85';
    $headingLetterSpacing = '0em';
} else {
    $headingFont = $theme['headingFont'] ?? 'Plus Jakarta Sans';
    $bodyFont = $theme['bodyFont'] ?? 'Inter';
    $headingLineHeight = '1.25';
    $bodyLineHeight = '1.6';
    $headingLetterSpacing = '-0.02em';
}

// Render Page
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($activeLocale) ?>" dir="<?= htmlspecialchars($direction) ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
    
    <!-- Open Graph Metadata -->
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle) ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
    <?php if ($ogImage): ?>
    <meta property="og:image" content="<?= htmlspecialchars($ogImage) ?>">
    <?php endif; ?>
    <?php if ($favicon): ?>
    <link rel="icon" href="<?= htmlspecialchars($favicon) ?>">
    <?php endif; ?>

    <!-- Google Fonts (Latin + Arabic Display & Calligraphic) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:ital,wght@0,400;0,700;1,400&family=Fira+Code:wght@400;600&family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Playfair+Display:wght@400;600;700&family=Space+Grotesk:wght@400;600;700&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Public Theme Stylesheet -->
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-public.css">

    <style>
        :root {
            --cf-primary: <?= htmlspecialchars($primaryColor) ?>;
            --cf-secondary: <?= htmlspecialchars($secondaryColor) ?>;
            --cf-bg: <?= htmlspecialchars($bgColor) ?>;
            --cf-text: <?= htmlspecialchars($textColor) ?>;
            --cf-heading-font: "<?= htmlspecialchars($headingFont) ?>", <?= $direction === 'rtl' ? "'IBM Plex Sans Arabic', " : "" ?>sans-serif;
            --cf-body-font: "<?= htmlspecialchars($bodyFont) ?>", <?= $direction === 'rtl' ? "'IBM Plex Sans Arabic', " : "" ?>sans-serif;
            --cf-heading-line-height: <?= $headingLineHeight ?>;
            --cf-body-line-height: <?= $bodyLineHeight ?>;
            --cf-heading-letter-spacing: <?= $headingLetterSpacing ?>;
            --cf-radius: <?= htmlspecialchars($borderRadius) ?>;
        }
        body {
            background-color: var(--cf-bg);
            color: var(--cf-text);
            font-family: var(--cf-body-font);
            line-height: var(--cf-body-line-height);
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: var(--cf-heading-font);
            line-height: var(--cf-heading-line-height);
            letter-spacing: var(--cf-heading-letter-spacing);
        }
        <?= !empty($website['custom_css']) ? $website['custom_css'] : '' ?>
    </style>
</head>
<body>

<?php if ($isOwner && empty($website['is_published'])): ?>
<div style="background:#f59e0b;color:#000;padding:8px 16px;text-align:center;font-size:0.85rem;font-weight:600;position:sticky;top:0;z-index:9999;">
    ⚠️ <?= $activeLocale === 'ar' ? 'أنت تشاهد مسودة غير منشورة.' : 'You are viewing an unpublished draft.' ?> 
    <a href="<?= SITE_URL ?>/editor/<?= $website['id'] ?>" style="color:#000;text-decoration:underline;margin-inline-start:8px;"><?= $activeLocale === 'ar' ? 'افتح المحرر للنشر' : 'Open Builder to Publish' ?></a>
</div>
<?php endif; ?>

<?php
// Render All Sections with active localized package
$hasFooter = false;
foreach ($sections as $sec) {
    if (($sec['type'] ?? '') === 'footer') {
        $hasFooter = true;
    }
    echo ComponentRegistry::renderSection($sec, $theme, false);
}

// Live Bilingual Switcher (if website has both locales or is configured bilingual)
if ($isBilingual): ?>
<div class="cf-bilingual-switcher" aria-label="Website Language Switcher">
    <a href="?<?= htmlspecialchars(http_build_query(array_merge($_GET, ['lang' => 'ar']))) ?>" class="<?= $activeLocale === 'ar' ? 'active' : '' ?>">العربية</a>
    <span class="cf-bilingual-sep">|</span>
    <a href="?<?= htmlspecialchars(http_build_query(array_merge($_GET, ['lang' => 'en']))) ?>" class="<?= $activeLocale === 'en' ? 'active' : '' ?>">English</a>
</div>
<?php endif; ?>

<?php
// Persistent minimal attribution badge if footer component not in page
if (!$hasFooter) {
    $siteUrl = defined('SITE_URL') ? \SITE_URL : 'https://portfolio.code-elta6ur.net';
    $siteName = defined('SITE_NAME') ? \SITE_NAME : 'AI Portfolio Builder';
    ?>
    <div style="padding: 24px 16px; text-align: center; border-top: 1px solid rgba(255,255,255,0.06); background: transparent;">
        <a href="<?= htmlspecialchars($siteUrl) ?>" target="_blank" rel="noopener" class="cf-attribution-badge" style="display:inline-flex; align-items:center; gap:8px; padding:6px 14px; border-radius:100px; font-size:0.78rem; text-decoration:none; opacity:0.8; transition:opacity 0.2s;">
            <i class="fa-solid fa-layer-group" style="font-size:0.75rem;"></i> Built with <strong><?= htmlspecialchars($siteName) ?></strong> &middot; Code Elta6ur
        </a>
    </div>
    <?php
}
?>

</body>
</html>
<?php

function renderCustom404(string $title, string $desc): void {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>404 - Not Found | AI Portfolio Builder</title>
        <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-builder.css">
    </head>
    <body style="display:flex;align-items:center;justify-content:center;height:100vh;text-align:center;background:#090d16;color:#f8fafc;">
        <div style="max-width:480px;padding:32px;">
            <div style="font-size:4rem;margin-bottom:16px;">🔍</div>
            <h1 style="font-size:2rem;margin-bottom:8px;"><?= htmlspecialchars($title) ?></h1>
            <p style="color:#94a3b8;margin-bottom:24px;"><?= htmlspecialchars($desc) ?></p>
            <a href="<?= SITE_URL ?>" class="cf-ui-btn cf-ui-btn-primary">Return to Homepage</a>
        </div>
    </body>
    </html>
    <?php
}

function renderUnderConstruction(string $title): void {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coming Soon | <?= htmlspecialchars($title) ?></title>
        <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-builder.css">
    </head>
    <body style="display:flex;align-items:center;justify-content:center;height:100vh;text-align:center;background:#090d16;color:#f8fafc;">
        <div style="max-width:480px;padding:32px;">
            <div style="font-size:4rem;margin-bottom:16px;">🚀</div>
            <h1 style="font-size:2rem;margin-bottom:8px;"><?= htmlspecialchars($title) ?></h1>
            <p style="color:#94a3b8;margin-bottom:24px;">This website is currently being crafted and will launch soon.</p>
            <a href="<?= SITE_URL ?>" class="cf-ui-btn cf-ui-btn-secondary">Build your own portfolio on AI Portfolio Builder</a>
        </div>
    </body>
    </html>
    <?php
}
