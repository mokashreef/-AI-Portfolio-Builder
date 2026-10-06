<?php
/**
 * AI Portfolio Builder - Website Analytics & Views Dashboard
 * Bilingual: Arabic (RTL) & English (LTR)
 */

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Core/Security.php';
require_once __DIR__ . '/app/Core/Auth.php';
require_once __DIR__ . '/app/Core/I18n.php';
require_once __DIR__ . '/app/Services/WebsiteService.php';
require_once __DIR__ . '/app/Services/AnalyticsService.php';

use App\Core\Auth;
use App\Core\I18n;
use App\Services\WebsiteService;
use App\Services\AnalyticsService;

I18n::init();
Auth::requireAuth();

$websiteId = intval($_GET['id'] ?? 0);
if (!$websiteId) {
    header("Location: " . SITE_URL . "/dashboard.php");
    exit;
}

$website = WebsiteService::getWebsiteById($websiteId, Auth::id());
if (!$website && Auth::isAdmin()) {
    $website = WebsiteService::getWebsiteById($websiteId);
}

if (!$website) {
    die("<h1>" . I18n::t('error.404_title') . "</h1><a href='" . SITE_URL . "/dashboard.php'>" . I18n::t('error.back_dashboard') . "</a>");
}

$stats = AnalyticsService::getStats($websiteId, (int)$website['user_id']);
$user = Auth::user();
$lang = I18n::locale();
$isRtl = I18n::isRtl();
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= I18n::dir() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= I18n::t('stats.title') ?> - <?= htmlspecialchars($website['title']) ?> | AI Portfolio Builder</title>
    
    <!-- Google Fonts & Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;600;700&family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-public.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-builder.css">

    <?= I18n::exportScript() ?>

    <style>
        body {
            font-family: <?= $isRtl ? "'IBM Plex Sans Arabic', " : "" ?>'Inter', sans-serif;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="cf-platform-nav">
        <div class="cf-platform-container cf-nav-wrap">
            <a href="<?= SITE_URL ?>/dashboard.php" class="cf-nav-brand">
                <span class="cf-brand-logo-icon"><i class="fa-solid fa-layer-group"></i></span>
                AI Portfolio Builder
            </a>
            <div class="cf-nav-menu">
                <a href="<?= SITE_URL ?>/dashboard.php" class="cf-nav-item"><?= I18n::t('nav.dashboard') ?></a>
                <a href="<?= SITE_URL ?>/templates.php" class="cf-nav-item"><?= I18n::t('nav.templates') ?></a>
            </div>
            <div class="cf-nav-actions" style="display:flex;align-items:center;gap:12px;">
                <!-- Platform Language Switcher -->
                <div class="cf-lang-switcher" style="display:inline-flex;align-items:center;background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12);border-radius:6px;padding:2px 4px;font-size:0.8rem;">
                    <a href="?id=<?= $websiteId ?>&lang=ar" style="padding:4px 8px;border-radius:4px;color:<?= $lang === 'ar' ? '#fff' : '#94a3b8' ?>;background:<?= $lang === 'ar' ? 'var(--primary)' : 'transparent' ?>;text-decoration:none;font-weight:600;">العربية</a>
                    <a href="?id=<?= $websiteId ?>&lang=en" style="padding:4px 8px;border-radius:4px;color:<?= $lang === 'en' ? '#fff' : '#94a3b8' ?>;background:<?= $lang === 'en' ? 'var(--primary)' : 'transparent' ?>;text-decoration:none;font-weight:600;">EN</a>
                </div>

                <a href="<?= SITE_URL ?>/editor.php?id=<?= $website['id'] ?>" class="cf-ui-btn cf-ui-btn-primary cf-ui-btn-sm">
                    <i class="fa-solid fa-pen-ruler"></i> <?= I18n::t('stats.open_builder') ?>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <main class="cf-platform-container" style="padding-top: 40px; padding-bottom: 80px;">
        
        <div style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:16px;margin-bottom:32px;">
            <div>
                <a href="<?= SITE_URL ?>/dashboard.php" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm" style="margin-bottom:8px;padding-inline-start:0;">
                    <i class="fa-solid fa-arrow-<?= $isRtl ? 'right' : 'left' ?>"></i> <?= I18n::t('stats.back_dashboard') ?>
                </a>
                <h1 style="font-size:2rem;letter-spacing:-0.02em;margin-bottom:4px;">
                    <?= I18n::t('stats.title') ?>: <?= htmlspecialchars($website['title']) ?>
                </h1>
                <p style="color:var(--text-secondary);font-size:0.9rem;">
                    <?= I18n::t('stats.live_telemetry') ?> — <a href="<?= SITE_URL ?>/portfolio.php?site=<?= htmlspecialchars($website['slug']) ?>" target="_blank" style="color:var(--primary);direction:ltr;display:inline-block;">/<?= htmlspecialchars($website['slug']) ?></a>
                </p>
            </div>
        </div>

        <!-- Metric KPI Cards -->
        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(240px, 1fr));gap:20px;margin-bottom:36px;">
            <div class="cf-ui-card">
                <div style="font-size:0.85rem;color:var(--text-secondary);margin-bottom:8px;"><?= I18n::t('stats.total_pageviews') ?></div>
                <div style="font-size:2.25rem;font-weight:800;color:var(--primary);"><?= number_format($stats['total_views'] ?? 0) ?></div>
            </div>
            <div class="cf-ui-card">
                <div style="font-size:0.85rem;color:var(--text-secondary);margin-bottom:8px;"><?= I18n::t('stats.today_views') ?></div>
                <div style="font-size:2.25rem;font-weight:800;color:var(--success);"><?= number_format($stats['today_views'] ?? 0) ?></div>
            </div>
            <div class="cf-ui-card">
                <div style="font-size:0.85rem;color:var(--text-secondary);margin-bottom:8px;"><?= I18n::t('stats.unique_visitors') ?></div>
                <div style="font-size:2.25rem;font-weight:800;color:var(--accent);"><?= number_format($stats['unique_visitors'] ?? 0) ?></div>
            </div>
        </div>

        <!-- Two Column Breakdown -->
        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(320px, 1fr));gap:24px;">
            <!-- Top Referrers -->
            <div class="cf-ui-card">
                <h3 style="font-size:1.15rem;margin-bottom:16px;"><i class="fa-solid fa-arrow-up-right-dots"></i> <?= I18n::t('stats.top_referrers') ?></h3>
                <?php if (empty($stats['referrers'])): ?>
                    <p style="color:var(--text-muted);font-size:0.85rem;"><?= I18n::t('stats.no_referrers') ?></p>
                <?php else: ?>
                    <div style="display:flex;flex-direction:column;gap:10px;">
                        <?php foreach ($stats['referrers'] as $ref): ?>
                            <div style="display:flex;justify-content:space-between;padding:8px 12px;background:var(--bg-surface-elevated);border-radius:6px;font-size:0.85rem;">
                                <span style="overflow:hidden;text-overflow:ellipsis;white-space:nowrap;max-width:240px;"><?= htmlspecialchars($ref['referer']) ?></span>
                                <strong style="color:var(--primary);"><?= $ref['count'] ?></strong>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <!-- Top Countries -->
            <div class="cf-ui-card">
                <h3 style="font-size:1.15rem;margin-bottom:16px;"><i class="fa-solid fa-earth-americas"></i> <?= I18n::t('stats.top_countries') ?></h3>
                <?php if (empty($stats['countries'])): ?>
                    <p style="color:var(--text-muted);font-size:0.85rem;"><?= I18n::t('stats.no_countries') ?></p>
                <?php else: ?>
                    <div style="display:flex;flex-direction:column;gap:10px;">
                        <?php foreach ($stats['countries'] as $c): ?>
                            <div style="display:flex;justify-content:space-between;padding:8px 12px;background:var(--bg-surface-elevated);border-radius:6px;font-size:0.85rem;">
                                <span><?= htmlspecialchars($c['country']) ?></span>
                                <strong style="color:var(--accent);"><?= $c['count'] ?></strong>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </main>

</body>
</html>
