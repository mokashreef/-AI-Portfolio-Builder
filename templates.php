<?php
/**
 * AI Portfolio Builder - Curated Template Gallery & System
 * True Architecture: Real Template Schemas, Real Visual Systems, Real Parity Preview
 */

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Core/Security.php';
require_once __DIR__ . '/app/Core/Auth.php';
require_once __DIR__ . '/app/Core/I18n.php';
require_once __DIR__ . '/app/Services/ComponentRegistry.php';
require_once __DIR__ . '/app/Services/TemplateRegistry.php';
require_once __DIR__ . '/app/Services/WebsiteService.php';

use App\Core\Security;
use App\Core\Auth;
use App\Core\I18n;
use App\Services\TemplateRegistry;
use App\Services\WebsiteService;

I18n::init();

$allTemplates = TemplateRegistry::getAll();

// Load custom user templates if logged in
$userTemplates = Auth::check() ? WebsiteService::getUserTemplates(Auth::id()) : [];
if (!empty($userTemplates)) {
    foreach ($userTemplates as $ut) {
        $allTemplates[] = [
            'id' => $ut['id'],
            'slug' => $ut['slug'],
            'name' => $ut['name'],
            'name_ar' => $ut['name_ar'] ?: $ut['name'],
            'category' => 'My Templates',
            'description' => 'Custom template saved from your portfolio.',
            'description_ar' => 'قالب مخصص تم حفظه من موقعك وتصاميمك.',
            'thumbnail' => '',
            'theme' => $ut['theme'],
            'schema' => $ut['schema'],
            'is_custom' => true,
        ];
    }
}

// Category mappings with clean Arabic / English localization
$categoryMap = [
    'All' => 'templates.cat_all',
    'Developer' => 'templates.cat_developer',
    'Designer' => 'templates.cat_designer',
    'Freelancer' => 'templates.cat_freelancer',
    'Corporate' => 'templates.cat_corporate',
    'Academic' => 'templates.cat_academic',
    'Experimental' => 'templates.cat_experimental',
];

if (!empty($userTemplates)) {
    $categoryMap['My Templates'] = 'templates.cat_mine';
}

$csrfToken = Security::csrfToken();
$user = Auth::user();
$isLoggedIn = Auth::check();
$isRtl = I18n::isRtl();
$lang = I18n::locale();
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= I18n::dir() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __t('templates.title') ?></title>
    
    <!-- Google Fonts & Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;600&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Platform & Public Stylesheets -->
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-public.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-builder.css">

    <?= I18n::exportScript() ?>

    <style>
        :root {
            --nav-height: 64px;
        }
        body {
            background-color: var(--bg-primary, #0b0f19);
            color: var(--text-primary, #f9fafb);
            font-family: <?= $isRtl ? "'IBM Plex Sans Arabic', " : "" ?>'Inter', sans-serif;
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* Platform Navigation */
        .cf-platform-nav {
            position: sticky;
            top: 0;
            z-index: 100;
            background: rgba(11, 15, 25, 0.85);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            height: var(--nav-height);
        }
        .cf-nav-wrap {
            max-width: 1360px;
            margin: 0 auto;
            padding: 0 24px;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .cf-nav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            text-decoration: none;
            font-weight: 700;
            font-size: 1.15rem;
            letter-spacing: -0.02em;
        }
        .cf-brand-logo-icon {
            width: 34px;
            height: 34px;
            background: linear-gradient(135deg, #2563eb, #3b82f6);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1rem;
        }
        .cf-nav-menu {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .cf-nav-item {
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            transition: color 0.2s;
        }
        .cf-nav-item:hover, .cf-nav-item.active {
            color: #fff;
        }
        .cf-nav-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .lang-switch-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 0.82rem;
            font-weight: 600;
            padding: 6px 12px;
            border-radius: 6px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.2s;
        }
        .lang-switch-btn:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.1);
        }

        /* Hero Header Section */
        .tpl-hero-section {
            padding: 56px 24px 36px;
            text-align: center;
            max-width: 860px;
            margin: 0 auto;
        }
        .tpl-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(37, 99, 235, 0.15);
            color: #60a5fa;
            border: 1px solid rgba(37, 99, 235, 0.3);
            padding: 6px 14px;
            border-radius: 9999px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 16px;
        }
        .tpl-hero-title {
            font-size: 2.6rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            line-height: 1.2;
            margin: 0 0 16px;
            background: linear-gradient(180deg, #ffffff 0%, #cbd5e1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .tpl-hero-desc {
            color: #94a3b8;
            font-size: 1.1rem;
            line-height: 1.6;
            margin: 0 auto 32px;
            max-width: 680px;
        }

        /* Controls bar: search & categories */
        .tpl-controls-wrap {
            max-width: 1360px;
            margin: 0 auto 36px;
            padding: 0 24px;
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
        }

        .tpl-search-box {
            width: 100%;
            max-width: 520px;
            position: relative;
        }
        .tpl-search-input {
            width: 100%;
            background: rgba(17, 24, 39, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #fff;
            padding: 12px 20px;
            <?= $isRtl ? 'padding-right: 44px;' : 'padding-left: 44px;' ?>
            border-radius: 9999px;
            font-size: 0.95rem;
            outline: none;
            box-sizing: border-box;
            transition: all 0.2s;
        }
        .tpl-search-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
            background: #111827;
        }
        .tpl-search-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            <?= $isRtl ? 'right: 18px;' : 'left: 18px;' ?>
            color: #64748b;
            font-size: 0.95rem;
        }

        /* Category Filter Pills */
        .tpl-filters-row {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
        }
        .tpl-filter-pill {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #94a3b8;
            padding: 8px 18px;
            border-radius: 9999px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }
        .tpl-filter-pill:hover {
            color: #fff;
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.15);
        }
        .tpl-filter-pill.active {
            background: #2563eb;
            color: #ffffff;
            border-color: #2563eb;
            box-shadow: 0 2px 8px rgba(37, 99, 235, 0.35);
        }

        /* Templates Grid */
        .templates-master-grid {
            max-width: 1360px;
            margin: 0 auto;
            padding: 0 24px 80px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
            gap: 28px;
        }

        /* Distinctive Template Card */
        .tpl-card {
            background: #111827;
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        .tpl-card:hover {
            transform: translateY(-4px);
            border-color: rgba(59, 130, 246, 0.4);
            box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.5);
        }

        /* Card Header & Viewport Area - 16:10 Scaled Desktop Miniature Preview */
        .tpl-viewport-box {
            width: 100%;
            aspect-ratio: 16 / 10;
            position: relative;
            background: #090d16;
            overflow: hidden;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            display: flex;
            flex-direction: column;
            cursor: pointer;
        }
        .tpl-desktop-canvas-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 1280px;
            height: 800px;
            transform-origin: 0 0;
            transform: scale(var(--tpl-scale, 0.297));
            pointer-events: none;
            user-select: none;
            transition: filter 0.25s ease;
        }
        .tpl-live-frame {
            width: 1280px;
            height: 800px;
            border: none;
            pointer-events: none;
            display: block;
            background: transparent;
            opacity: 0.98;
        }
        .tpl-card:hover .tpl-desktop-canvas-wrapper {
            filter: brightness(1.04);
        }
        .tpl-viewport-overlay {
            position: absolute;
            inset: 0;
            background: rgba(11, 15, 25, 0.65);
            opacity: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
            transition: opacity 0.25s ease;
            z-index: 10;
            backdrop-filter: blur(2px);
        }
        .tpl-card:hover .tpl-viewport-overlay {
            opacity: 1;
        }

        /* Card Badge */
        .tpl-category-badge {
            position: absolute;
            top: 12px;
            <?= $isRtl ? 'right: 12px;' : 'left: 12px;' ?>
            background: rgba(17, 24, 39, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #e2e8f0;
            backdrop-filter: blur(8px);
            padding: 4px 10px;
            border-radius: 6px;
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            z-index: 5;
        }

        /* Visual Style Indicator (Mini color palette bar) */
        .tpl-color-strip {
            display: flex;
            height: 4px;
            width: 100%;
        }

        /* Card Body */
        .tpl-card-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            flex: 1;
        }
        .tpl-meta-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
        }
        .tpl-name {
            font-size: 1.15rem;
            font-weight: 700;
            color: #ffffff;
            margin: 0;
            letter-spacing: -0.01em;
        }
        .tpl-system-tag {
            font-size: 0.72rem;
            color: #38bdf8;
            background: rgba(56, 189, 248, 0.1);
            padding: 2px 8px;
            border-radius: 4px;
            font-weight: 600;
        }
        .tpl-description {
            color: #94a3b8;
            font-size: 0.875rem;
            line-height: 1.5;
            margin: 0 0 20px;
            flex: 1;
        }

        /* Card Actions */
        .tpl-action-row {
            display: flex;
            gap: 10px;
            margin-top: auto;
        }
        .btn-card-preview {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.12);
            color: #e2e8f0;
            padding: 9px 14px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
            cursor: pointer;
        }
        .btn-card-preview:hover {
            background: rgba(255, 255, 255, 0.1);
            color: #fff;
            border-color: rgba(255, 255, 255, 0.2);
        }
        .btn-card-use {
            flex: 1.2;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            background: #2563eb;
            border: none;
            color: #ffffff;
            padding: 9px 16px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            box-shadow: 0 2px 6px rgba(37, 99, 235, 0.3);
        }
        .btn-card-use:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        /* Empty State */
        .tpl-empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 60px 20px;
            background: rgba(17, 24, 39, 0.4);
            border: 1px dashed rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            display: none;
        }

        /* Creation Modal */
        .cf-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(5px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            padding: 20px;
        }
        .cf-modal-overlay.open {
            display: flex;
        }
        .cf-modal-card {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 14px;
            width: 100%;
            max-width: 480px;
            padding: 28px;
            color: #f9fafb;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
        }
        .cf-modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .cf-modal-close {
            background: transparent;
            border: none;
            color: #9ca3af;
            font-size: 1.35rem;
            cursor: pointer;
        }
        .cf-modal-close:hover {
            color: #fff;
        }
        .cf-input-dark {
            width: 100%;
            background: #1f2937;
            border: 1px solid #374151;
            color: #fff;
            padding: 11px 16px;
            border-radius: 8px;
            margin-top: 6px;
            box-sizing: border-box;
            outline: none;
            font-size: 0.95rem;
        }
        .cf-input-dark:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.2);
        }

        @media (max-width: 768px) {
            .templates-master-grid {
                grid-template-columns: 1fr;
            }
            .tpl-hero-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

    <!-- Platform Navigation -->
    <nav class="cf-platform-nav">
        <div class="cf-nav-wrap">
            <a href="<?= SITE_URL ?>/" class="cf-nav-brand">
                <span class="cf-brand-logo-icon"><i class="fa-solid fa-layer-group"></i></span>
                <span>AI Portfolio Builder</span>
            </a>
            
            <div class="cf-nav-menu">
                <a href="<?= SITE_URL ?>/" class="cf-nav-item"><?= __t('nav_home', [], 'الرئيسية') ?></a>
                <a href="<?= SITE_URL ?>/templates.php" class="cf-nav-item active"><?= __t('nav_templates', [], 'معرض القوالب') ?></a>
                <?php if (Auth::check()): ?>
                <a href="<?= SITE_URL ?>/dashboard.php" class="cf-nav-item"><?= __t('nav_my_websites', [], 'مواقعي') ?></a>
                <?php if (Auth::isAdmin()): ?>
                <a href="<?= SITE_URL ?>/admin.php" class="cf-nav-item" style="color:#f59e0b;"><?= __t('nav_admin', [], 'الإدارة') ?></a>
                <?php endif; ?>
                <?php endif; ?>
            </div>

            <div class="cf-nav-actions">
                <!-- Language Switcher -->
                <?php
                $targetLang = $lang === 'ar' ? 'en' : 'ar';
                $targetLabel = $lang === 'ar' ? 'English (LTR)' : 'العربية (RTL)';
                ?>
                <a href="<?= SITE_URL ?>/templates.php?lang=<?= $targetLang ?>" class="lang-switch-btn" title="Toggle Language">
                    <i class="fa-solid fa-globe"></i>
                    <span><?= $targetLabel ?></span>
                </a>

                <?php if (Auth::check()): ?>
                    <a href="<?= SITE_URL ?>/dashboard.php" class="btn-card-use" style="padding: 7px 14px; text-decoration: none;">
                        <i class="fa-solid fa-gauge-high"></i>
                        <span><?= __t('nav_dashboard', [], 'لوحة التحكم') ?></span>
                    </a>
                    <a href="<?= SITE_URL ?>/logout.php" class="btn-card-preview" style="padding: 7px 10px; text-decoration: none;" title="<?= __t('nav_logout', [], 'تسجيل الخروج') ?>">
                        <i class="fa-solid fa-arrow-right-from-bracket"></i>
                    </a>
                <?php else: ?>
                    <a href="<?= SITE_URL ?>/login.php" class="btn-card-preview" style="padding: 7px 14px; text-decoration: none;">
                        <?= __t('nav_login', [], 'تسجيل الدخول') ?>
                    </a>
                    <a href="<?= SITE_URL ?>/register.php" class="btn-card-use" style="padding: 7px 14px; text-decoration: none;">
                        <?= __t('nav_register', [], 'ابدأ مجانًا') ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Hero Header -->
    <header class="tpl-hero-section">
        <span class="tpl-badge">
            <i class="fa-solid fa-gem"></i>
            <?= __t('templates.badge') ?>
        </span>
        <h1 class="tpl-hero-title">
            <?= __t('templates.hero_title') ?>
        </h1>
        <p class="tpl-hero-desc">
            <?= __t('templates.hero_desc') ?>
        </p>
    </header>

    <!-- Controls Bar -->
    <section class="tpl-controls-wrap">
        <!-- Search Input -->
        <div class="tpl-search-box">
            <i class="fa-solid fa-magnifying-glass tpl-search-icon"></i>
            <input 
                type="text" 
                id="tplSearchInput" 
                class="tpl-search-input" 
                placeholder="<?= htmlspecialchars(__t('templates.search_placeholder')) ?>"
            >
        </div>

        <!-- Category Filters -->
        <div class="tpl-filters-row">
            <?php foreach ($categoryMap as $catKey => $catI18nKey): ?>
                <button type="button" class="tpl-filter-pill <?= $catKey === 'All' ? 'active' : '' ?>" data-category="<?= htmlspecialchars($catKey) ?>">
                    <?= htmlspecialchars(__t($catI18nKey)) ?>
                </button>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Templates Grid -->
    <main class="templates-master-grid" id="templatesGrid">
        <?php foreach ($allTemplates as $tpl): ?>
            <?php
            $name = ($lang === 'ar' && !empty($tpl['name_ar'])) ? $tpl['name_ar'] : $tpl['name'];
            $desc = ($lang === 'ar' && !empty($tpl['description_ar'])) ? $tpl['description_ar'] : $tpl['description'];
            $localePkg = !empty($tpl['locales'][$lang]) ? $tpl['locales'][$lang] : ($tpl['locales']['en'] ?? []);
            $theme = $localePkg['theme'] ?? ($tpl['theme'] ?? []);
            $priColor = $theme['primaryColor'] ?? '#2563eb';
            $secColor = $theme['secondaryColor'] ?? '#3b82f6';
            $bgColor = $theme['backgroundColor'] ?? '#0f172a';
            $headingFont = $theme['headingFont'] ?? ($lang === 'ar' ? 'IBM Plex Sans Arabic' : 'Plus Jakarta Sans');
            $categoryKey = $tpl['category'] ?? 'Developer';
            $previewUrl = SITE_URL . '/template-preview.php?slug=' . urlencode($tpl['slug']) . '&preview_lang=' . $lang;
            $embedUrl = SITE_URL . '/template-preview.php?slug=' . urlencode($tpl['slug']) . '&embed=1&thumb=1&preview_lang=' . $lang;
            ?>
            <article 
                class="tpl-card" 
                data-category="<?= htmlspecialchars($categoryKey) ?>" 
                data-slug="<?= htmlspecialchars($tpl['slug']) ?>"
                data-search="<?= htmlspecialchars(strtolower($name . ' ' . $tpl['name'] . ' ' . $desc . ' ' . $categoryKey)) ?>"
            >
                <!-- Viewport Box with Scaled 16:10 Desktop Iframe & Action Overlay -->
                <div class="tpl-viewport-box" onclick="window.location.href='<?= $previewUrl ?>'">
                    <span class="tpl-category-badge"><?= htmlspecialchars(__t($categoryMap[$categoryKey] ?? 'templates.cat_developer')) ?></span>
                    
                    <!-- Real Desktop Viewport Miniature (1280x800 Scaled) -->
                    <div class="tpl-desktop-canvas-wrapper">
                        <iframe 
                            src="<?= $embedUrl ?>" 
                            class="tpl-live-frame" 
                            loading="lazy" 
                            tabindex="-1"
                            title="<?= htmlspecialchars($name) ?> Live Preview"
                        ></iframe>
                    </div>

                    <!-- Hover Quick Overlay -->
                    <div class="tpl-viewport-overlay">
                        <a href="<?= $previewUrl ?>" class="btn-card-preview" style="background:#111827; border-color:#374151;">
                            <i class="fa-solid fa-eye"></i> <?= __t('templates.btn_live_preview') ?>
                        </a>
                        <button type="button" class="btn-card-use btn-open-create" data-slug="<?= htmlspecialchars($tpl['slug']) ?>" data-name="<?= htmlspecialchars($name) ?>">
                            <i class="fa-solid fa-rocket"></i> <?= __t('templates.btn_use_template') ?>
                        </button>
                    </div>
                </div>

                <!-- Theme Color Indicator Strip -->
                <div class="tpl-color-strip">
                    <span style="background: <?= htmlspecialchars($priColor) ?>; flex: 2;"></span>
                    <span style="background: <?= htmlspecialchars($secColor) ?>; flex: 1;"></span>
                    <span style="background: <?= htmlspecialchars($bgColor) ?>; flex: 1;"></span>
                </div>

                <!-- Card Body -->
                <div class="tpl-card-body">
                    <div class="tpl-meta-row">
                        <h3 class="tpl-name"><?= htmlspecialchars($name) ?></h3>
                        <span class="tpl-system-tag"><?= htmlspecialchars($headingFont) ?></span>
                    </div>

                    <p class="tpl-description"><?= htmlspecialchars($desc) ?></p>

                    <div class="tpl-action-row">
                        <a href="<?= $previewUrl ?>" class="btn-card-preview">
                            <i class="fa-solid fa-eye"></i>
                            <span><?= __t('templates.btn_full_preview') ?></span>
                        </a>
                        <button type="button" class="btn-card-use btn-open-create" data-slug="<?= htmlspecialchars($tpl['slug']) ?>" data-name="<?= htmlspecialchars($name) ?>">
                            <i class="fa-solid fa-wand-magic-sparkles"></i>
                            <span><?= __t('templates.btn_start_template') ?></span>
                        </button>
                    </div>
                </div>
            </article>
        <?php endforeach; ?>

        <!-- Empty Filter Results State -->
        <div class="tpl-empty-state" id="emptyState">
            <i class="fa-solid fa-magnifying-glass" style="font-size: 2.5rem; color: #64748b; margin-bottom: 12px; display: block;"></i>
            <h3 style="margin: 0 0 8px; color: #fff;"><?= __t('templates.no_results_title') ?></h3>
            <p style="color: #94a3b8; font-size: 0.9rem; margin: 0 0 16px;">
                <?= __t('templates.no_results_desc') ?>
            </p>
            <button type="button" class="btn-card-preview" id="btnResetFilters">
                <?= __t('templates.reset_filters') ?>
            </button>
        </div>
    </main>

    <!-- Create Website From Template Modal -->
    <div class="cf-modal-overlay" id="createSiteModal">
        <div class="cf-modal-card">
            <div class="cf-modal-header">
                <h3 style="margin:0;font-size:1.15rem;display:flex;align-items:center;gap:8px;">
                    <i class="fa-solid fa-rocket" style="color:#2563eb;"></i>
                    <?= __t('modal.create_title') ?>
                </h3>
                <button type="button" class="cf-modal-close" id="btnCloseModal">&times;</button>
            </div>
            
            <p style="font-size:0.875rem;color:#9ca3af;margin-top:0;margin-bottom:18px;">
                <?= __t('templates.modal_desc') ?>
                <strong style="color:#fff;" id="createModalTplName"></strong>
            </p>

            <form id="formCreateFromTpl">
                <input type="hidden" id="modalTplSlug" value="">
                
                <div style="margin-bottom: 16px;">
                    <label style="font-size:0.85rem;color:#d1d5db;font-weight:500;">
                        <?= __t('modal.site_name_label') ?>
                    </label>
                    <input type="text" id="siteTitle" class="cf-input-dark" required placeholder="<?= htmlspecialchars(__t('modal.site_name_ph')) ?>">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="font-size:0.85rem;color:#d1d5db;font-weight:500;">
                        <?= __t('modal.content_lang_label') ?>
                    </label>
                    <select id="siteLocale" class="cf-input-dark" style="margin-top:6px;width:100%;cursor:pointer;">
                        <option value="ar" <?= $lang === 'ar' ? 'selected' : '' ?>><?= __t('modal.content_lang_ar') ?></option>
                        <option value="en" <?= $lang === 'en' ? 'selected' : '' ?>><?= __t('modal.content_lang_en') ?></option>
                        <option value="bilingual"><?= __t('modal.content_lang_bilingual') ?></option>
                    </select>
                </div>

                <div style="margin-bottom: 22px;">
                    <label style="font-size:0.85rem;color:#d1d5db;font-weight:500;">
                        <?= __t('modal.slug_label') ?>
                    </label>
                    <div style="display:flex;align-items:center;gap:4px;margin-top:6px;">
                        <span style="font-size:0.8rem;color:#64748b;direction:ltr;">portfolio.code-elta6ur.net/</span>
                        <input type="text" id="siteSlug" class="cf-input-dark" style="margin-top:0;" required placeholder="alex-rivera">
                    </div>
                </div>

                <div style="display:flex;gap:10px;justify-content:flex-end;">
                    <button type="button" class="btn-card-preview" id="btnCancelModal">
                        <?= __t('common.cancel') ?>
                    </button>
                    <button type="submit" class="btn-card-use" id="btnSubmitCreateSite">
                        <?= __t('modal.btn_create_submit') ?>
                        <i class="fa-solid fa-arrow-<?= $isRtl ? 'left' : 'right' ?>"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Client-side Interactive Filter & Creation Scripts -->
    <script>
        const siteUrl = '<?= SITE_URL ?>';
        const csrfToken = '<?= $csrfToken ?>';
        const isLoggedIn = <?= $isLoggedIn ? 'true' : 'false' ?>;

        const cards = document.querySelectorAll('.tpl-card');
        const filterPills = document.querySelectorAll('.tpl-filter-pill');
        const searchInput = document.getElementById('tplSearchInput');
        const emptyState = document.getElementById('emptyState');

        let activeCategory = 'All';
        let searchQuery = '';

        function scaleAllThumbnails() {
            document.querySelectorAll('.tpl-viewport-box').forEach(box => {
                const wrapper = box.querySelector('.tpl-desktop-canvas-wrapper');
                if (!wrapper) return;
                const width = box.offsetWidth;
                if (width > 0) {
                    const scale = width / 1280;
                    box.style.setProperty('--tpl-scale', scale);
                    wrapper.style.transform = `scale(${scale})`;
                }
            });
        }

        window.addEventListener('resize', scaleAllThumbnails);
        window.addEventListener('DOMContentLoaded', scaleAllThumbnails);
        if (window.ResizeObserver) {
            const ro = new ResizeObserver(entries => {
                for (let entry of entries) {
                    const wrapper = entry.target.querySelector('.tpl-desktop-canvas-wrapper');
                    if (wrapper && entry.contentRect.width > 0) {
                        const s = entry.contentRect.width / 1280;
                        entry.target.style.setProperty('--tpl-scale', s);
                        wrapper.style.transform = `scale(${s})`;
                    }
                }
            });
            document.querySelectorAll('.tpl-viewport-box').forEach(b => ro.observe(b));
        }

        function filterTemplates() {
            let visibleCount = 0;
            cards.forEach(card => {
                const cardCat = card.dataset.category;
                const cardSearch = card.dataset.search || '';

                const matchesCat = (activeCategory === 'All') || (cardCat === activeCategory);
                const matchesSearch = !searchQuery || cardSearch.includes(searchQuery);

                if (matchesCat && matchesSearch) {
                    card.style.display = 'flex';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });

            if (visibleCount === 0) {
                emptyState.style.display = 'block';
            } else {
                emptyState.style.display = 'none';
            }

            // Re-scale visible elements after layout shift
            requestAnimationFrame(scaleAllThumbnails);
        }

        // Category filter click
        filterPills.forEach(pill => {
            pill.addEventListener('click', function() {
                filterPills.forEach(p => p.classList.remove('active'));
                this.classList.add('active');
                activeCategory = this.dataset.category;
                filterTemplates();
            });
        });

        // Search input
        searchInput.addEventListener('input', function() {
            searchQuery = this.value.toLowerCase().trim();
            filterTemplates();
        });

        // Reset filter
        document.getElementById('btnResetFilters')?.addEventListener('click', function() {
            activeCategory = 'All';
            searchQuery = '';
            searchInput.value = '';
            filterPills.forEach(p => p.classList.toggle('active', p.dataset.category === 'All'));
            filterTemplates();
        });

        // Initial run
        scaleAllThumbnails();

        // Modal Use Template Flow
        const modal = document.getElementById('createSiteModal');
        document.querySelectorAll('.btn-open-create').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const slug = this.dataset.slug;
                const name = this.dataset.name;

                if (!isLoggedIn) {
                    window.location.href = `${siteUrl}/login.php?redirect=${encodeURIComponent('/template-preview.php?slug=' + slug)}`;
                    return;
                }

                document.getElementById('modalTplSlug').value = slug;
                document.getElementById('createModalTplName').textContent = name;
                modal.classList.add('open');
                document.getElementById('siteTitle').focus();
            });
        });

        document.getElementById('btnCloseModal').addEventListener('click', () => modal.classList.remove('open'));
        document.getElementById('btnCancelModal').addEventListener('click', () => modal.classList.remove('open'));

        // Auto-slugify
        document.getElementById('siteTitle').addEventListener('input', function() {
            const slugInput = document.getElementById('siteSlug');
            if (!slugInput.dataset.manual) {
                slugInput.value = this.value.toLowerCase().trim()
                    .replace(/[^a-z0-9\-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }
        });
        document.getElementById('siteSlug').addEventListener('input', function() {
            this.dataset.manual = 'true';
        });

        // Submit create form
        document.getElementById('formCreateFromTpl').addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('btnSubmitCreateSite');
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> ' + window.__t('modal.creating_status');

            const title = document.getElementById('siteTitle').value.trim();
            const slug = document.getElementById('siteSlug').value.trim();
            const tplSlug = document.getElementById('modalTplSlug').value;
            const contentLocale = document.getElementById('siteLocale') ? document.getElementById('siteLocale').value : 'ar';

            try {
                const res = await fetch(`${siteUrl}/api/create-website.php`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({
                        title: title,
                        slug: slug,
                        template_slug: tplSlug,
                        content_locale: contentLocale,
                        is_blank: false
                    })
                });
                const data = await res.json();
                if (data.success) {
                    window.location.href = `${siteUrl}/editor.php?id=${data.website_id}`;
                } else {
                    alert(data.message || window.__t('common.error'));
                    btn.disabled = false;
                    btn.innerHTML = window.__t('modal.btn_create_submit') + ' <i class="fa-solid fa-arrow-' + (window.__CF_IS_RTL ? 'left' : 'right') + '"></i>';
                }
            } catch (err) {
                alert(window.__t('common.error'));
                btn.disabled = false;
                btn.innerHTML = window.__t('modal.btn_create_submit') + ' <i class="fa-solid fa-arrow-' + (window.__CF_IS_RTL ? 'left' : 'right') + '"></i>';
            }
        });
    </script>
</body>
</html>
