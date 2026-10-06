<?php
/**
 * AI Portfolio Builder - High Fidelity Template Preview Engine
 * Preview = Actual Template Schema = Renderer = Published Website Parity
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
use App\Services\ComponentRegistry;
use App\Services\WebsiteService;

I18n::init();

$allTemplates = TemplateRegistry::getAll();

// Include user templates if logged in
if (Auth::check()) {
    $userTemplates = WebsiteService::getUserTemplates(Auth::id());
    foreach ($userTemplates as $ut) {
        $allTemplates[] = [
            'id' => $ut['id'],
            'slug' => $ut['slug'],
            'name' => $ut['name'],
            'name_ar' => $ut['name_ar'],
            'category' => 'My Templates',
            'description' => 'Custom template saved from your portfolio.',
            'description_ar' => 'قالب مخصص تم حفظه من تصميمك.',
            'theme' => $ut['theme'],
            'schema' => $ut['schema'],
            'is_custom' => true,
        ];
    }
}

$slug = Security::clean($_GET['slug'] ?? 'developer-terminal');
$template = null;
foreach ($allTemplates as $t) {
    if ($t['slug'] === $slug) {
        $template = $t;
        break;
    }
}

if (!$template && !empty($allTemplates)) {
    $template = $allTemplates[0];
    $slug = $template['slug'];
}

if (!$template) {
    http_response_code(404);
    echo "Template not found.";
    exit;
}

$isEmbed = !empty($_GET['embed']);
$previewLang = Security::clean($_GET['preview_lang'] ?? '');

// Determine direction for preview
if ($previewLang === 'ar') {
    $direction = 'rtl';
} elseif ($previewLang === 'en') {
    $direction = 'ltr';
} else {
    // Default to template's native direction
    $direction = !empty($template['theme']['direction']) ? $template['theme']['direction'] : ($slug === 'al-khattat-arabic' ? 'rtl' : 'ltr');
    $previewLang = ($direction === 'rtl') ? 'ar' : 'en';
}

// -------------------------------------------------------------
// MODE 1: Clean Website Embed (Exact Parity with portfolio.php)
// -------------------------------------------------------------
if ($isEmbed) {
    $isThumb = !empty($_GET['thumb']);
    // Resolve authentic localized design package (English or Arabic)
    $localePackage = TemplateRegistry::getLocalePackage($template, $previewLang);
    $theme = $localePackage['theme'] ?? ($template['theme'] ?? []);
    $direction = $localePackage['direction'] ?? ($previewLang === 'ar' ? 'rtl' : 'ltr');
    $theme['direction'] = $direction;
    $sections = !empty($localePackage['sections']) ? $localePackage['sections'] : ($template['sections'] ?? []);

    if ($isThumb) {
        // Render top 3 sections for instant 1280x800 desktop viewport miniature
        $sections = array_slice($sections, 0, 3);
    }

    $primaryColor = $theme['primaryColor'] ?? '#2563eb';
    $secondaryColor = $theme['secondaryColor'] ?? '#3b82f6';
    $bgColor = $theme['backgroundColor'] ?? '#ffffff';
    $textColor = $theme['textColor'] ?? '#0f172a';
    $headingFont = $theme['headingFont'] ?? ($direction === 'rtl' ? 'IBM Plex Sans Arabic' : 'Plus Jakarta Sans');
    $bodyFont = $theme['bodyFont'] ?? ($direction === 'rtl' ? 'IBM Plex Sans Arabic' : 'Inter');
    $borderRadius = $theme['borderRadius'] ?? '8px';
    $lineHeightHeading = $theme['lineHeightHeading'] ?? ($direction === 'rtl' ? '1.38' : '1.25');
    $lineHeightBody = $theme['lineHeightBody'] ?? ($direction === 'rtl' ? '1.85' : '1.6');
    $letterSpacing = $theme['letterSpacingHeading'] ?? ($direction === 'rtl' ? '0em' : '-0.02em');
    $tplDisplayName = ($direction === 'rtl' && !empty($template['name_ar'])) ? $template['name_ar'] : $template['name'];
    ?>
    <!DOCTYPE html>
    <html lang="<?= $direction === 'rtl' ? 'ar' : 'en' ?>" dir="<?= htmlspecialchars($direction) ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= htmlspecialchars($tplDisplayName) ?> — Preview</title>
        
        <!-- Fonts Stack (Latin + Arabic Google Fonts) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;800&family=Fira+Code:wght@400;500;600&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Space+Grotesk:wght@400;600;700&family=Amiri:wght@400;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
        
        <!-- Theme & Components Stylesheet -->
        <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-public.css">

        <style>
            :root {
                --cf-primary: <?= htmlspecialchars($primaryColor) ?>;
                --cf-secondary: <?= htmlspecialchars($secondaryColor) ?>;
                --cf-bg: <?= htmlspecialchars($bgColor) ?>;
                --cf-text: <?= htmlspecialchars($textColor) ?>;
                --cf-heading-font: "<?= htmlspecialchars($headingFont) ?>", <?= $direction === 'rtl' ? "'IBM Plex Sans Arabic', " : "" ?>sans-serif;
                --cf-body-font: "<?= htmlspecialchars($bodyFont) ?>", <?= $direction === 'rtl' ? "'IBM Plex Sans Arabic', " : "" ?>sans-serif;
                --cf-radius: <?= htmlspecialchars($borderRadius) ?>;
                --cf-heading-line-height: <?= htmlspecialchars($lineHeightHeading) ?>;
                --cf-body-line-height: <?= htmlspecialchars($lineHeightBody) ?>;
                --cf-heading-letter-spacing: <?= htmlspecialchars($letterSpacing) ?>;
            }
            html, body {
                background-color: var(--cf-bg);
                color: var(--cf-text);
                font-family: var(--cf-body-font);
                line-height: var(--cf-body-line-height);
                margin: 0;
                padding: 0;
                overflow-x: hidden;
            }
            h1, h2, h3, h4, h5, h6 {
                font-family: var(--cf-heading-font);
                line-height: var(--cf-heading-line-height);
                letter-spacing: var(--cf-heading-letter-spacing);
            }
            <?php if ($isThumb): ?>
            html, body {
                overflow: hidden !important;
                scrollbar-width: none !important;
                -ms-overflow-style: none !important;
                user-select: none !important;
                pointer-events: none !important;
            }
            ::-webkit-scrollbar {
                display: none !important;
            }
            * {
                animation: none !important;
                transition: none !important;
            }
            <?php endif; ?>
        </style>
    </head>
    <body class="cf-template-preview-body">
        <?php
        $hasFooter = false;
        foreach ($sections as $sec) {
            if (($sec['type'] ?? '') === 'footer') {
                $hasFooter = true;
            }
            echo ComponentRegistry::renderSection($sec, $theme, false);
        }

        if (!$hasFooter && !$isThumb): ?>
            <footer style="padding: 32px 24px; text-align: center; font-size: 0.85rem; opacity: 0.7; border-top: 1px solid rgba(148,163,184,0.15);">
                <?= I18n::isRtl() ? 'تم البناء بواسطة' : 'Built with' ?> 
                <a href="<?= SITE_URL ?>" target="_blank" style="color: var(--cf-primary); text-decoration: none; font-weight: 600;">
                    <?= SITE_NAME ?>
                </a>
            </footer>
        <?php endif; ?>
    </body>
    </html>
    <?php
    exit;
}

// -------------------------------------------------------------
// MODE 2: Platform Preview Shell (Interactive Toolbar & Viewport)
// -------------------------------------------------------------
$csrfToken = Security::csrfToken();
$user = Auth::user();
$isLoggedIn = Auth::check();
$tplName = (I18n::locale() === 'ar' && !empty($template['name_ar'])) ? $template['name_ar'] : $template['name'];
$tplDesc = (I18n::locale() === 'ar' && !empty($template['description_ar'])) ? $template['description_ar'] : $template['description'];
?>
<!DOCTYPE html>
<html lang="<?= I18n::locale() ?>" dir="<?= I18n::dir() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($tplName) ?> — <?= __t('preview.title') ?> | <?= SITE_NAME ?></title>
    
    <!-- Platform Typography & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-public.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-builder.css">

    <?= I18n::exportScript() ?>

    <style>
        :root {
            --shell-bg: #0b0f17;
            --shell-bar: #111827;
            --shell-border: #1f2937;
            --shell-text: #f9fafb;
            --shell-muted: #9ca3af;
        }
        body {
            margin: 0;
            padding: 0;
            background-color: var(--shell-bg);
            color: var(--shell-text);
            font-family: <?= I18n::isRtl() ? "'IBM Plex Sans Arabic', " : "" ?>'Inter', sans-serif;
            height: 100vh;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        /* Topbar Header */
        .preview-topbar {
            height: 64px;
            background: var(--shell-bar);
            border-bottom: 1px solid var(--shell-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px;
            z-index: 50;
            flex-shrink: 0;
            gap: 16px;
        }

        .preview-nav-left {
            display: flex;
            align-items: center;
            gap: 14px;
            min-width: 240px;
        }
        .btn-back-templates {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--shell-muted);
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 6px;
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            transition: all 0.2s ease;
        }
        .btn-back-templates:hover {
            color: #fff;
            background: rgba(255,255,255,0.08);
        }

        .preview-tpl-select-wrap select {
            background: #1e293b;
            color: #f1f5f9;
            border: 1px solid #334155;
            padding: 7px 12px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            cursor: pointer;
            outline: none;
        }

        /* Center: Device Switcher */
        .preview-device-switcher {
            display: flex;
            align-items: center;
            background: #0f172a;
            border: 1px solid var(--shell-border);
            border-radius: 8px;
            padding: 3px;
            gap: 2px;
        }
        .device-btn {
            background: transparent;
            border: none;
            color: var(--shell-muted);
            padding: 6px 14px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 500;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 6px;
            transition: all 0.2s ease;
        }
        .device-btn:hover {
            color: #fff;
        }
        .device-btn.active {
            background: #2563eb;
            color: #fff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }

        /* Right actions */
        .preview-nav-right {
            display: flex;
            align-items: center;
            gap: 12px;
            min-width: 240px;
            justify-content: flex-end;
        }

        .preview-lang-segmented {
            display: inline-flex;
            align-items: center;
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 8px;
            padding: 3px;
            gap: 2px;
        }
        .preview-lang-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: transparent;
            color: #94a3b8;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 0.82rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }
        .preview-lang-btn:hover {
            color: #fff;
        }
        .preview-lang-btn.active {
            background: #2563eb;
            color: #ffffff;
            box-shadow: 0 1px 3px rgba(0,0,0,0.3);
        }

        .btn-use-tpl-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #2563eb;
            color: #ffffff;
            border: none;
            padding: 8px 18px;
            border-radius: 6px;
            font-size: 0.875rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(37,99,235,0.3);
            transition: all 0.2s;
        }
        .btn-use-tpl-primary:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        /* Main Workspace Viewport Area */
        .preview-workspace {
            flex: 1;
            background: #090d16;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 16px;
            position: relative;
            overflow: hidden;
            background-image: radial-gradient(rgba(255,255,255,0.06) 1px, transparent 1px);
            background-size: 24px 24px;
        }

        .preview-frame-container {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: width 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .preview-frame-container.viewport-desktop {
            width: 100%;
            max-width: 100%;
            height: 100%;
        }
        .preview-frame-container.viewport-tablet {
            width: 768px;
            max-width: 90vw;
            height: 94%;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.7);
            border-radius: 16px;
            border: 8px solid #1e293b;
            overflow: hidden;
        }
        .preview-frame-container.viewport-mobile {
            width: 375px;
            max-width: 90vw;
            height: 92%;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.8);
            border-radius: 28px;
            border: 10px solid #1e293b;
            overflow: hidden;
        }

        .preview-iframe {
            width: 100%;
            height: 100%;
            border: none;
            background: #ffffff;
            border-radius: 0;
        }
        .preview-frame-container.viewport-desktop .preview-iframe {
            border-radius: 6px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.4);
        }

        /* Template Information Strip */
        .preview-info-strip {
            position: absolute;
            bottom: 24px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(17, 24, 39, 0.9);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.1);
            padding: 8px 20px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 0.85rem;
            color: #d1d5db;
            pointer-events: auto;
            box-shadow: 0 10px 25px rgba(0,0,0,0.5);
            z-index: 40;
        }
        .info-pill {
            background: rgba(37,99,235,0.2);
            color: #60a5fa;
            padding: 2px 10px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        /* Modal Overlay */
        .cf-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.7);
            backdrop-filter: blur(4px);
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999;
            padding: 20px;
        }
        .cf-modal-overlay.open {
            display: flex;
        }
        .cf-modal-card {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 12px;
            width: 100%;
            max-width: 480px;
            padding: 24px;
            color: #f9fafb;
            box-shadow: 0 20px 25px -5px rgba(0,0,0,0.5);
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
            font-size: 1.25rem;
            cursor: pointer;
        }
        .cf-input-dark {
            width: 100%;
            background: #1f2937;
            border: 1px solid #374151;
            color: #fff;
            padding: 10px 14px;
            border-radius: 6px;
            margin-top: 6px;
            box-sizing: border-box;
            outline: none;
        }
        .cf-input-dark:focus {
            border-color: #2563eb;
        }
    </style>
</head>
<body>

    <!-- Topbar Header -->
    <header class="preview-topbar">
        <div class="preview-nav-left">
            <a href="<?= SITE_URL ?>/templates.php" class="btn-back-templates">
                <i class="fa-solid fa-arrow-<?= I18n::isRtl() ? 'right' : 'left' ?>"></i>
                <span><?= __t('preview.back_to_templates', [], I18n::locale() === 'ar' ? 'العودة للقوالب' : 'Back to Templates') ?></span>
            </a>
            
            <div class="preview-tpl-select-wrap">
                <select id="selectTemplate" onchange="window.location.href='<?= SITE_URL ?>/template-preview.php?slug=' + this.value + '&preview_lang=<?= htmlspecialchars($previewLang) ?>'">
                    <?php foreach ($allTemplates as $t): ?>
                        <option value="<?= htmlspecialchars($t['slug']) ?>" <?= $t['slug'] === $slug ? 'selected' : '' ?>>
                            <?= htmlspecialchars((I18n::locale() === 'ar' && !empty($t['name_ar'])) ? $t['name_ar'] : $t['name']) ?> 
                            (<?= htmlspecialchars($t['category']) ?>)
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <!-- Center: Device Switcher -->
        <div class="preview-device-switcher">
            <button type="button" class="device-btn active" data-viewport="desktop" id="btnDesk">
                <i class="fa-solid fa-desktop"></i>
                <span><?= __t('preview.desktop', [], I18n::locale() === 'ar' ? 'سطح المكتب' : 'Desktop') ?></span>
            </button>
            <button type="button" class="device-btn" data-viewport="tablet" id="btnTab">
                <i class="fa-solid fa-tablet-screen-button"></i>
                <span><?= __t('preview.tablet', [], I18n::locale() === 'ar' ? 'جهاز لوحي' : 'Tablet') ?></span>
            </button>
            <button type="button" class="device-btn" data-viewport="mobile" id="btnMob">
                <i class="fa-solid fa-mobile-screen-button"></i>
                <span><?= __t('preview.mobile', [], I18n::locale() === 'ar' ? 'جوال' : 'Mobile') ?></span>
            </button>
        </div>

        <!-- Right actions -->
        <div class="preview-nav-right">
            <!-- Real Bilingual Preview Switcher -->
            <div class="preview-lang-segmented" title="Switch Localized Template Design">
                <a href="<?= SITE_URL ?>/template-preview.php?slug=<?= urlencode($slug) ?>&preview_lang=en" class="preview-lang-btn <?= $previewLang === 'en' ? 'active' : '' ?>">
                    <i class="fa-solid fa-font"></i> English (LTR)
                </a>
                <a href="<?= SITE_URL ?>/template-preview.php?slug=<?= urlencode($slug) ?>&preview_lang=ar" class="preview-lang-btn <?= $previewLang === 'ar' ? 'active' : '' ?>">
                    <i class="fa-solid fa-language"></i> العربية (RTL)
                </a>
            </div>

            <!-- Use Template Button -->
            <button type="button" class="btn-use-tpl-primary" id="btnUseTemplate">
                <i class="fa-solid fa-wand-magic-sparkles"></i>
                <span><?= __t('templates.use_template', [], I18n::locale() === 'ar' ? 'استخدم هذا القالب' : 'Use Template') ?></span>
            </button>
        </div>
    </header>

    <!-- Main Workspace Viewport Area -->
    <main class="preview-workspace">
        <div class="preview-frame-container viewport-desktop" id="previewFrameContainer">
            <iframe 
                id="templateIframe" 
                class="preview-iframe"
                src="<?= SITE_URL ?>/template-preview.php?slug=<?= urlencode($slug) ?>&embed=1&preview_lang=<?= htmlspecialchars($previewLang) ?>"
                title="<?= htmlspecialchars($tplName) ?> Interactive Preview"
            ></iframe>
        </div>

        <!-- Information Strip -->
        <div class="preview-info-strip">
            <span class="info-pill"><?= htmlspecialchars($template['category']) ?></span>
            <strong><?= htmlspecialchars($tplName) ?></strong>
            <span style="opacity:0.6;">—</span>
            <span><?= htmlspecialchars(mb_strimwidth($tplDesc, 0, 80, '...')) ?></span>
            <span style="opacity:0.6;">|</span>
            <span style="font-size:0.8rem;color:#38bdf8;">
                <i class="fa-solid fa-check-double"></i> 
                <?= I18n::locale() === 'ar' ? 'معاينة حية ومطابقة بنسبة 100%' : '100% Real Parity Preview' ?>
            </span>
        </div>
    </main>

    <!-- Create Website From Template Modal -->
    <div class="cf-modal-overlay" id="createSiteModal">
        <div class="cf-modal-card">
            <div class="cf-modal-header">
                <h3 style="margin:0;font-size:1.15rem;display:flex;align-items:center;gap:8px;">
                    <i class="fa-solid fa-rocket" style="color:#2563eb;"></i>
                    <?= __t('dashboard.create_new', [], I18n::locale() === 'ar' ? 'إنشاء موقع جديد بهذا القالب' : 'Create Website from Template') ?>
                </h3>
                <button type="button" class="cf-modal-close" id="btnCloseModal">&times;</button>
            </div>
            <p style="font-size:0.875rem;color:#9ca3af;margin-top:0;margin-bottom:16px;">
                <?= I18n::isRtl() ? 'سيتم إنشاء موقعك الجديد مباشرة بالاعتماد على قالب:' : 'Your new website will be created instantly based on:' ?>
                <strong style="color:#fff;" id="createModalTplName"><?= htmlspecialchars($tplName) ?></strong>
            </p>

            <form id="formCreateFromTpl">
                <input type="hidden" id="modalTplSlug" value="<?= htmlspecialchars($slug) ?>">
                
                <div style="margin-bottom: 14px;">
                    <label style="font-size:0.85rem;color:#d1d5db;font-weight:500;">
                        <?= I18n::isRtl() ? 'عنوان الموقع أو اسمك' : 'Website Title or Your Name' ?>
                    </label>
                    <input type="text" id="siteTitle" class="cf-input-dark" required placeholder="<?= I18n::locale() === 'ar' ? 'مثال: محمد عبدالله' : 'e.g. John Doe' ?>">
                </div>

                <div style="margin-bottom: 16px;">
                    <label style="font-size:0.85rem;color:#d1d5db;font-weight:500;">
                        <?= I18n::locale() === 'ar' ? 'لغة محتوى الموقع' : 'Website Content Language' ?>
                    </label>
                    <select id="siteLocale" class="cf-input-dark" style="margin-top:6px;width:100%;cursor:pointer;">
                        <option value="ar" <?= $previewLang === 'ar' ? 'selected' : '' ?>><?= I18n::locale() === 'ar' ? 'العربية (RTL - تصميم عربي أصيل)' : 'Arabic (RTL - First-class Arabic design)' ?></option>
                        <option value="en" <?= $previewLang === 'en' ? 'selected' : '' ?>><?= I18n::locale() === 'ar' ? 'English (LTR - تصميم إنجليزي عالمي)' : 'English (LTR - International design)' ?></option>
                        <option value="bilingual"><?= I18n::locale() === 'ar' ? 'ثنائي اللغة (Bilingual - عربي وإنجليزي مع مبدل مباشر)' : 'Bilingual (Arabic & English with live switcher)' ?></option>
                    </select>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="font-size:0.85rem;color:#d1d5db;font-weight:500;">
                        <?= I18n::isRtl() ? 'رابط الموقع (Slug)' : 'Website URL Slug' ?>
                    </label>
                    <div style="display:flex;align-items:center;gap:4px;margin-top:6px;">
                        <span style="font-size:0.8rem;color:#64748b;direction:ltr;">portfolio.code-elta6ur.net/</span>
                        <input type="text" id="siteSlug" class="cf-input-dark" style="margin-top:0;" required placeholder="mohammad">
                    </div>
                </div>

                <div style="display:flex;gap:10px;justify-content:flex-end;">
                    <button type="button" class="btn-back-templates" id="btnCancelModal">
                        <?= __t('common.cancel', [], I18n::locale() === 'ar' ? 'إلغاء' : 'Cancel') ?>
                    </button>
                    <button type="submit" class="btn-use-tpl-primary" id="btnSubmitCreateSite">
                        <?= __t('dashboard.btn_create', [], I18n::locale() === 'ar' ? 'تأكيد ودخول المحرر' : 'Open in Visual Builder') ?>
                        <i class="fa-solid fa-arrow-<?= I18n::isRtl() ? 'left' : 'right' ?>"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const siteUrl = '<?= SITE_URL ?>';
        const csrfToken = '<?= $csrfToken ?>';
        const isLoggedIn = <?= $isLoggedIn ? 'true' : 'false' ?>;
        const currentSlug = '<?= htmlspecialchars($slug) ?>';

        // Viewport Switcher
        const container = document.getElementById('previewFrameContainer');
        const buttons = document.querySelectorAll('.device-btn');

        buttons.forEach(btn => {
            btn.addEventListener('click', function() {
                buttons.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const vp = this.dataset.viewport;
                container.className = 'preview-frame-container viewport-' + vp;
            });
        });

        // Use Template Modal
        const modal = document.getElementById('createSiteModal');
        document.getElementById('btnUseTemplate').addEventListener('click', function() {
            if (!isLoggedIn) {
                window.location.href = `${siteUrl}/login.php?redirect=${encodeURIComponent('/template-preview.php?slug=' + currentSlug)}`;
                return;
            }
            modal.classList.add('open');
            document.getElementById('siteTitle').focus();
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

        // Submit form
        document.getElementById('formCreateFromTpl').addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('btnSubmitCreateSite');
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> <?= I18n::isRtl() ? "جاري الإنشاء..." : "Creating..." ?>';

            const title = document.getElementById('siteTitle').value.trim();
            const slug = document.getElementById('siteSlug').value.trim();
            const tplSlug = document.getElementById('modalTplSlug').value;
            const contentLocale = document.getElementById('siteLocale') ? document.getElementById('siteLocale').value : '<?= $previewLang ?>';

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
                    alert(data.message || (window.__t ? window.__t('js.err_create_site') : 'Error creating website'));
                    btn.disabled = false;
                    btn.innerHTML = '<?= __t("dashboard.btn_create") ?> <i class="fa-solid fa-arrow-<?= I18n::isRtl() ? "left" : "right" ?>"></i>';
                }
            } catch (err) {
                alert(window.__t ? window.__t('js.err_create_site') : 'Connection error. Please try again.');
                btn.disabled = false;
                btn.innerHTML = '<?= __t("dashboard.btn_create") ?> <i class="fa-solid fa-arrow-<?= I18n::isRtl() ? "left" : "right" ?>"></i>';
            }
        });
    </script>
</body>
</html>
