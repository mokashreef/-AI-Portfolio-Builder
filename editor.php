<?php
/**
 * CraftFolio - Visual Website Builder Studio
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
use App\Services\WebsiteService;
use App\Services\ComponentRegistry;
use App\Services\TemplateRegistry;

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
    die("<h1>Website Not Found</h1><p>The requested website could not be found or you do not have permission to edit it.</p><a href='" . SITE_URL . "/dashboard.php'>Return to Dashboard</a>");
}

$pages = WebsiteService::getWebsitePages($websiteId);
if (empty($pages)) {
    // Auto-create home page if missing
    $newPage = WebsiteService::createPage($websiteId, 'Home', 'home', Auth::id());
    $pages = WebsiteService::getWebsitePages($websiteId);
}

$activePageId = intval($_GET['page_id'] ?? 0);
$activePage = null;

if ($activePageId) {
    foreach ($pages as $p) {
        if ($p['id'] == $activePageId) {
            $activePage = $p;
            break;
        }
    }
}

if (!$activePage) {
    // Pick home page or first page
    foreach ($pages as $p) {
        if (!empty($p['is_home'])) {
            $activePage = $p;
            break;
        }
    }
    if (!$activePage) $activePage = $pages[0];
    $activePageId = (int)$activePage['id'];
}

// Fetch page content (Draft version)
$pageData = WebsiteService::getPageWithContent($activePageId, 'draft');
$sections = $pageData['sections'] ?? [];
$locales = $pageData['locales'] ?? null;

$templateSlug = $website['template_slug'] ?? 'dev-terminal';
$templateData = TemplateRegistry::getTemplate($templateSlug);

// If locales not yet stored on this page, populate from template
if (empty($locales) && $templateData && !empty($templateData['locales'])) {
    $locales = $templateData['locales'];
}

// Available sections palette
$availableSections = ComponentRegistry::getAvailableSections();

$csrfToken = Security::csrfToken();
$publicUrl = SITE_URL . '/' . htmlspecialchars($website['slug']);
?>
<!DOCTYPE html>
<html lang="<?= I18n::locale() ?>" dir="<?= I18n::dir() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($website['title']) ?> — <?= __t('builder.title') ?> | <?= SITE_NAME ?></title>
    
    <!-- Google Fonts & Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Cinzel:wght@600;800&family=Fira+Code:wght@400;600&family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700;800&family=Playfair+Display:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Space+Grotesk:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-public.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-builder.css">

    <?= I18n::exportScript() ?>

    <style>
        body {
            font-family: <?= I18n::isRtl() ? "'IBM Plex Sans Arabic', " : "" ?>'Inter', sans-serif;
        }
        /* In-canvas drag indicator */
        .drag-over {
            border-top: 3px solid var(--primary) !important;
        }
        .cf-lang-segment-btn.active {
            background: var(--primary) !important;
            color: #ffffff !important;
        }
    </style>
</head>
<body class="cf-builder-layout">

    <!-- Top Navigation Bar -->
    <header class="cf-builder-topbar">
        <div class="cf-topbar-left">
            <a href="<?= SITE_URL ?>/dashboard.php" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm" title="<?= __t('nav.dashboard') ?>">
                <i class="fa-solid fa-arrow-<?= I18n::isRtl() ? 'right' : 'left' ?>"></i>
            </a>
            <div style="display:flex;align-items:center;gap:10px;">
                <span class="cf-brand-logo-icon" style="width:28px;height:28px;font-size:0.85rem;"><i class="fa-solid fa-layer-group"></i></span>
                <div>
                    <strong style="font-size:0.95rem;display:block;line-height:1.2;"><?= htmlspecialchars($website['title']) ?></strong>
                    <span style="font-size:0.75rem;color:var(--text-muted);direction:ltr;display:inline-block;">/<?= htmlspecialchars($website['slug']) ?> &middot; <strong><?= htmlspecialchars($activePage['title']) ?></strong></span>
                </div>
            </div>
        </div>

        <!-- Center Viewport Switcher & Content Edition Selector -->
        <div class="cf-topbar-center" style="display:flex;align-items:center;gap:14px;">
            <div class="cf-device-toggle" style="display:flex;gap:2px;">
                <button type="button" class="cf-device-btn active" data-device="desktop" title="<?= __t('preview.desktop') ?>">
                    <i class="fa-solid fa-desktop"></i>
                </button>
                <button type="button" class="cf-device-btn" data-device="tablet" title="<?= __t('preview.tablet') ?>">
                    <i class="fa-solid fa-tablet-screen-button"></i>
                </button>
                <button type="button" class="cf-device-btn" data-device="mobile" title="<?= __t('preview.mobile') ?>">
                    <i class="fa-solid fa-mobile-screen"></i>
                </button>
            </div>

            <!-- Website Content Locale Switcher (Requirement 15) -->
            <div class="cf-content-lang-switcher" style="display:flex;align-items:center;gap:4px;background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.14);padding:3px;border-radius:8px;">
                <span style="font-size:0.75rem;font-weight:700;color:var(--text-muted);padding:0 8px;">
                    <i class="fa-solid fa-pen-fancy"></i> <?= __t('builder.editing_content') ?>
                </span>
                <button type="button" class="cf-lang-segment-btn <?= ($website['direction'] ?? 'rtl') === 'rtl' ? 'active' : '' ?>" data-locale="ar" style="padding:4px 10px;border-radius:6px;border:none;background:transparent;color:var(--text-muted);font-size:0.8rem;font-weight:700;cursor:pointer;">
                    العربية (RTL)
                </button>
                <button type="button" class="cf-lang-segment-btn <?= ($website['direction'] ?? '') === 'ltr' ? 'active' : '' ?>" data-locale="en" style="padding:4px 10px;border-radius:6px;border:none;background:transparent;color:var(--text-muted);font-size:0.8rem;font-weight:700;cursor:pointer;">
                    English (LTR)
                </button>
            </div>
        </div>

        <!-- Right Action Controls -->
        <div class="cf-topbar-right">
            <!-- Language Switcher in Editor -->
            <?php
            $curLang = I18n::locale();
            $targetLang = $curLang === 'ar' ? 'en' : 'ar';
            $targetLabel = $curLang === 'ar' ? 'English (LTR)' : 'العربية (RTL)';
            ?>
            <a href="<?= SITE_URL ?>/editor.php?id=<?= $websiteId ?>&lang=<?= $targetLang ?>" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" title="<?= __t('language') ?>">
                <i class="fa-solid fa-globe"></i> <?= $targetLabel ?>
            </a>

            <!-- Undo / Redo -->
            <div style="display:flex;gap:4px;margin-right:8px;">
                <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" id="btnUndo" title="<?= __t('builder.btn_undo') ?>">
                    <i class="fa-solid fa-rotate-left"></i>
                </button>
                <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" id="btnRedo" title="<?= __t('builder.btn_redo') ?>">
                    <i class="fa-solid fa-rotate-right"></i>
                </button>
            </div>

            <!-- Autosave Indicator -->
            <div id="autosaveIndicator" class="cf-autosave-indicator saved">
                <i class="fa-solid fa-check"></i> <?= __t('builder.status_saved') ?>
            </div>

            <!-- Preview in new tab -->
            <a href="<?= $publicUrl ?>?preview_draft=1" target="_blank" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" title="<?= __t('builder.btn_preview') ?>">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> <?= __t('builder.btn_preview') ?>
            </a>

            <!-- Save as Template -->
            <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" id="btnSaveAsTemplate" title="<?= __t('builder.btn_save_template') ?>">
                <i class="fa-solid fa-bookmark"></i> <?= __t('builder.btn_save_template') ?>
            </button>

            <!-- Save Draft Manual -->
            <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" id="btnSaveDraft">
                <i class="fa-solid fa-floppy-disk"></i> <?= __t('builder.btn_save_draft') ?>
            </button>

            <!-- Publish Changes -->
            <button type="button" class="cf-ui-btn cf-ui-btn-primary cf-ui-btn-sm" id="btnPublish">
                <i class="fa-solid fa-cloud-arrow-up"></i> <?= __t('builder.btn_publish') ?>
            </button>
        </div>
    </header>

    <!-- Builder Studio Workspace -->
    <div class="cf-builder-workspace">
        
        <!-- Left Sidebar: Panels & Library -->
        <aside class="cf-builder-leftbar">
            <!-- Sidebar Navigation Tabs -->
            <div class="cf-sidebar-tabs">
                <button type="button" class="cf-tab-btn active" data-tab="tabSections" title="<?= __t('builder.tab_sections') ?>">
                    <i class="fa-solid fa-shapes"></i> <?= __t('builder.tab_sections') ?>
                </button>
                <button type="button" class="cf-tab-btn" data-tab="tabPages" title="<?= __t('builder.tab_pages') ?>">
                    <i class="fa-solid fa-layer-group"></i> <?= __t('builder.tab_pages') ?>
                </button>
                <button type="button" class="cf-tab-btn" data-tab="tabTheme" title="<?= __t('builder.tab_theme') ?>">
                    <i class="fa-solid fa-palette"></i> <?= __t('builder.tab_theme') ?>
                </button>
                <button type="button" class="cf-tab-btn" data-tab="tabMedia" title="<?= __t('builder.tab_media') ?>">
                    <i class="fa-solid fa-images"></i> <?= __t('builder.tab_media') ?>
                </button>
            </div>

            <!-- Sidebar Content Panes -->
            <div class="cf-sidebar-content">
                
                <!-- Pane 1: Sections Library -->
                <div id="tabSections" class="cf-sidebar-tab-pane">
                    <p style="font-size:0.8rem;color:var(--text-muted);margin-bottom:14px;">
                        <?= __t('builder.add_section_help') ?>
                    </p>
                    <div class="cf-sec-lib-grid">
                        <?php foreach ($availableSections as $secDef): ?>
                            <?php
                            $secName = __t('section.' . $secDef['type'], [], $secDef['name']);
                            $secDesc = __t('section.' . $secDef['type'] . '_desc', [], $secDef['description']);
                            ?>
                            <div class="cf-sec-item-card btn-add-section" data-section-type="<?= htmlspecialchars($secDef['type']) ?>" title="<?= htmlspecialchars($secDesc) ?>">
                                <div class="cf-sec-icon-box">
                                    <i class="fa-solid <?= htmlspecialchars($secDef['icon']) ?>"></i>
                                </div>
                                <div class="cf-sec-info">
                                    <div class="cf-sec-name"><?= htmlspecialchars($secName) ?></div>
                                    <div class="cf-sec-sub"><?= htmlspecialchars($secDesc) ?></div>
                                </div>
                                <i class="fa-solid fa-plus" style="font-size:0.8rem;color:var(--text-muted);"></i>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Pane 2: Pages Manager -->
                <div id="tabPages" class="cf-sidebar-tab-pane" style="display:none;">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
                        <span style="font-size:0.85rem;font-weight:600;"><?= __t('builder.pages_heading') ?></span>
                        <button type="button" class="cf-ui-btn cf-ui-btn-primary cf-ui-btn-sm" onclick="document.getElementById('modalAddPage').classList.add('open')">
                            <i class="fa-solid fa-plus"></i> <?= __t('builder.btn_add_page') ?>
                        </button>
                    </div>
                    <div id="pagesList" class="cf-sec-lib-grid">
                        <!-- Loaded dynamically -->
                    </div>
                </div>

                <!-- Pane 3: Global Theme Customizer -->
                <div id="tabTheme" class="cf-sidebar-tab-pane" style="display:none;">
                    <h4 style="font-size:0.95rem;margin-bottom:16px;"><?= __t('builder.theme_heading') ?></h4>
                    
                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label"><?= __t('builder.theme_primary') ?></label>
                        <input type="color" class="cf-ui-input" style="height:40px;padding:4px;" id="themePrimaryColor">
                    </div>

                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label"><?= __t('builder.theme_secondary') ?></label>
                        <input type="color" class="cf-ui-input" style="height:40px;padding:4px;" id="themeSecondaryColor">
                    </div>

                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label"><?= __t('builder.theme_bg') ?></label>
                        <input type="color" class="cf-ui-input" style="height:40px;padding:4px;" id="themeBgColor">
                    </div>

                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label"><?= __t('builder.theme_text') ?></label>
                        <input type="color" class="cf-ui-input" style="height:40px;padding:4px;" id="themeTextColor">
                    </div>

                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label"><?= __t('builder.theme_direction') ?></label>
                        <select class="cf-ui-select" id="themeDirection">
                            <option value="ltr"><?= __t('builder.theme_dir_ltr') ?></option>
                            <option value="rtl"><?= __t('builder.theme_dir_rtl') ?></option>
                        </select>
                    </div>

                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label"><?= __t('builder.theme_heading_font') ?></label>
                        <select class="cf-ui-select" id="themeHeadingFont">
                            <optgroup label="English Fonts">
                                <option value="Plus Jakarta Sans">Plus Jakarta Sans (Modern Clean)</option>
                                <option value="Inter">Inter (Neo-Grotesque)</option>
                                <option value="Space Grotesk">Space Grotesk (Tech Modern)</option>
                                <option value="Playfair Display">Playfair Display (Editorial Luxury)</option>
                                <option value="Fira Code">Fira Code (Developer Mono)</option>
                                <option value="Outfit">Outfit (Geometric Friendly)</option>
                            </optgroup>
                            <optgroup label="Arabic Fonts (خطوط عربية)">
                                <option value="IBM Plex Sans Arabic">IBM Plex Sans Arabic (عصري واحترافي)</option>
                                <option value="Cairo">Cairo (جريء وعريض)</option>
                                <option value="Tajawal">Tajawal (سلس وأنيق)</option>
                                <option value="Almarai">Almarai (واضح وحديث)</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label"><?= __t('builder.theme_body_font') ?></label>
                        <select class="cf-ui-select" id="themeBodyFont">
                            <optgroup label="English Fonts">
                                <option value="Inter">Inter</option>
                                <option value="Plus Jakarta Sans">Plus Jakarta Sans</option>
                                <option value="Fira Code">Fira Code</option>
                            </optgroup>
                            <optgroup label="Arabic Fonts (خطوط عربية)">
                                <option value="IBM Plex Sans Arabic">IBM Plex Sans Arabic</option>
                                <option value="Cairo">Cairo</option>
                                <option value="Tajawal">Tajawal</option>
                                <option value="Almarai">Almarai</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label"><?= __t('builder.theme_radius') ?></label>
                        <select class="cf-ui-select" id="themeRadius">
                            <option value="0px"><?= __t('builder.theme_radius_sharp') ?></option>
                            <option value="4px"><?= __t('builder.theme_radius_subtle') ?></option>
                            <option value="8px"><?= __t('builder.theme_radius_standard') ?></option>
                            <option value="14px"><?= __t('builder.theme_radius_soft') ?></option>
                            <option value="20px"><?= __t('builder.theme_radius_pill') ?></option>
                        </select>
                    </div>
                </div>

                <!-- Pane 4: Media Library -->
                <div id="tabMedia" class="cf-sidebar-tab-pane" style="display:none;">
                    <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:16px;">
                        <span style="font-size:0.85rem;font-weight:600;"><?= __t('builder.media_heading') ?></span>
                    </div>

                    <form id="formSidebarUpload" enctype="multipart/form-data" style="margin-bottom:16px;">
                        <input type="file" id="sidebarAssetInput" accept="image/*" style="display:none;">
                        <button type="button" class="cf-ui-btn cf-ui-btn-secondary" style="width:100%;" onclick="document.getElementById('sidebarAssetInput').click()">
                            <i class="fa-solid fa-cloud-arrow-up"></i> <?= __t('builder.btn_upload_image') ?>
                        </button>
                    </form>

                    <div id="sidebarAssetGrid" style="display:grid;grid-template-columns:1fr 1fr;gap:8px;">
                        <!-- Assets thumbnails -->
                    </div>
                </div>

            </div>
        </aside>

        <!-- Center Canvas Viewport -->
        <main class="cf-builder-canvas-area" id="canvasContainer">
            <div id="canvasViewport" class="cf-canvas-viewport cf-viewport-desktop">
                <!-- Dynamically rendered components by CraftFolioBuilder JS -->
            </div>
        </main>

        <!-- Right Property Inspector -->
        <aside class="cf-builder-rightbar">
            <div class="cf-inspector-header">
                <span class="cf-inspector-title" id="inspectorTitle"><?= __t('builder.inspector_title') ?></span>
                <span style="font-size:0.75rem;color:var(--text-muted);"><i class="fa-solid fa-sliders"></i> <?= __t('builder.tab_theme') ?></span>
            </div>
            <div class="cf-inspector-body" id="inspectorBody">
                <div style="text-align: center; padding: 40px 10px; color: var(--text-muted);">
                    <i class="fa-solid fa-arrow-pointer" style="font-size: 2rem; margin-bottom: 12px; display: block;"></i>
                    <p style="font-size: 0.9rem;"><?= __t('builder.inspector_empty') ?></p>
                </div>
            </div>
        </aside>

    </div>

    <!-- Modal: Add New Page -->
    <div id="modalAddPage" class="cf-modal-overlay">
        <div class="cf-modal-card">
            <div class="cf-modal-header">
                <h3 class="cf-modal-title"><?= __t('modal.add_page_title') ?></h3>
                <button type="button" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm cf-modal-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="formAddPage">
                <div class="cf-modal-body">
                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label" for="newPageTitle"><?= __t('modal.add_page_name') ?></label>
                        <input type="text" id="newPageTitle" class="cf-ui-input" placeholder="<?= htmlspecialchars(__t('modal.add_page_name_ph')) ?>" required>
                    </div>
                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label" for="newPageSlug"><?= __t('modal.add_page_slug') ?></label>
                        <input type="text" id="newPageSlug" class="cf-ui-input" placeholder="projects">
                        <span class="cf-ui-input-hint" style="direction:ltr;display:block;"><?= __t('modal.add_page_hint', ['url' => $publicUrl, 'slug' => '{slug}']) ?></span>
                    </div>
                </div>
                <div class="cf-modal-footer">
                    <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-modal-close"><?= __t('common.cancel') ?></button>
                    <button type="submit" class="cf-ui-btn cf-ui-btn-primary"><?= __t('modal.add_page_submit') ?></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: Media Library Picker -->
    <div id="mediaPickerModal" class="cf-modal-overlay">
        <div class="cf-modal-card" style="max-width:760px;">
            <div class="cf-modal-header">
                <h3 class="cf-modal-title"><?= __t('modal.media_picker_title') ?></h3>
                <button type="button" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm cf-modal-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="cf-modal-body">
                <div style="margin-bottom:16px;display:flex;justify-content:space-between;align-items:center;">
                    <span style="font-size:0.85rem;color:var(--text-muted);"><?= __t('modal.media_select_help') ?></span>
                    <input type="file" id="modalAssetUploadInput" accept="image/*" style="display:none;">
                    <button type="button" class="cf-ui-btn cf-ui-btn-primary cf-ui-btn-sm" onclick="document.getElementById('modalAssetUploadInput').click()">
                        <i class="fa-solid fa-cloud-arrow-up"></i> <?= __t('builder.btn_upload_image') ?>
                    </button>
                </div>
                <div id="mediaPickerGrid" style="display:grid;grid-template-columns:repeat(auto-fill, minmax(130px, 1fr));gap:12px;max-height:400px;overflow-y:auto;">
                    <!-- Media assets -->
                </div>
            </div>
            <div class="cf-modal-footer">
                <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-modal-close"><?= __t('common.close') ?></button>
            </div>
        </div>
    </div>

    <!-- Modal: Publish Success -->
    <div id="publishSuccessModal" class="cf-modal-overlay">
        <div class="cf-modal-card">
            <div class="cf-modal-header">
                <h3 class="cf-modal-title"><?= __t('modal.publish_title') ?></h3>
                <button type="button" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm cf-modal-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="cf-modal-body" style="text-align:center;padding:32px 24px;">
                <div style="font-size:3.5rem;margin-bottom:12px;">🚀</div>
                <h2 style="font-size:1.5rem;margin-bottom:8px;"><?= __t('modal.publish_congrats') ?></h2>
                <p style="color:var(--text-secondary);font-size:0.95rem;margin-bottom:24px;">
                    <?= __t('modal.publish_desc') ?>
                </p>
                <div style="display:flex;gap:8px;margin-bottom:24px;">
                    <input type="text" id="pubModalUrl" class="cf-ui-input" readonly value="<?= $publicUrl ?>" style="font-weight:600;color:var(--primary);">
                    <button type="button" class="cf-ui-btn cf-ui-btn-secondary" onclick="navigator.clipboard.writeText(document.getElementById('pubModalUrl').value); alert(window.__t('modal.publish_copied'));">
                        <i class="fa-solid fa-copy"></i> <?= __t('modal.publish_copy') ?>
                    </button>
                </div>
                <div style="display:flex;justify-content:center;gap:12px;">
                    <a id="pubModalVisit" href="<?= $publicUrl ?>" target="_blank" class="cf-ui-btn cf-ui-btn-primary">
                        <i class="fa-solid fa-arrow-up-right-from-square"></i> <?= __t('modal.publish_visit') ?>
                    </a>
                </div>
            </div>
            <div class="cf-modal-footer">
                <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-modal-close"><?= __t('modal.publish_done') ?></button>
            </div>
        </div>
    </div>

    <!-- Client Engine Script -->
    <script src="<?= SITE_URL ?>/assets/js/craftfolio-builder.js"></script>
    <script>
        const builder = new CraftFolioBuilder({
            website: <?= json_encode($website, JSON_UNESCAPED_UNICODE) ?>,
            pages: <?= json_encode($pages, JSON_UNESCAPED_UNICODE) ?>,
            activePageId: <?= $activePageId ?>,
            initialSections: <?= json_encode($sections, JSON_UNESCAPED_UNICODE) ?>,
            initialLocales: <?= json_encode($locales, JSON_UNESCAPED_UNICODE) ?>,
            templateData: <?= json_encode($templateData, JSON_UNESCAPED_UNICODE) ?>,
            availableSections: <?= json_encode($availableSections, JSON_UNESCAPED_UNICODE) ?>,
            csrfToken: '<?= $csrfToken ?>',
            apiUrl: '<?= SITE_URL ?>',
            platformLocale: '<?= I18n::locale() ?>'
        });

        // Handle Asset Upload in Sidebar & Modal
        async function handleDirectUpload(fileInput) {
            if (!fileInput.files || !fileInput.files[0]) return;
            const file = fileInput.files[0];
            const formData = new FormData();
            formData.append('file', file);
            formData.append('csrf_token', '<?= $csrfToken ?>');

            try {
                const res = await fetch('<?= SITE_URL ?>/api/upload-asset.php', {
                    method: 'POST',
                    body: formData
                });
                const data = await res.json();
                if (data.success) {
                    builder.showToast('Image uploaded successfully!');
                    builder.loadSidebarMedia();
                    if (document.getElementById('mediaPickerModal').classList.contains('open')) {
                        builder.loadMediaLibrary();
                    }
                } else {
                    alert('Upload failed: ' + data.message);
                }
            } catch (e) {
                alert('Upload failed.');
            }
        }

        document.getElementById('sidebarAssetInput')?.addEventListener('change', function() {
            handleDirectUpload(this);
        });
        document.getElementById('modalAssetUploadInput')?.addEventListener('change', function() {
            handleDirectUpload(this);
        });

        // Save as Template modal bindings
        const btnSaveAsTpl = document.getElementById('btnSaveAsTemplate');
        const modalSaveTpl = document.getElementById('modalSaveTemplate');
        if (btnSaveAsTpl && modalSaveTpl) {
            btnSaveAsTpl.addEventListener('click', () => {
                modalSaveTpl.classList.add('open');
            });

            document.getElementById('formSaveTemplate')?.addEventListener('submit', async (e) => {
                e.preventDefault();
                const name = document.getElementById('customTemplateName').value.trim();
                if (!name) return;

                const submitBtn = document.getElementById('btnSubmitSaveTemplate');
                submitBtn.disabled = true;
                submitBtn.innerText = window.__t('common.saving');

                try {
                    const res = await fetch('<?= SITE_URL ?>/api/save-as-template.php', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': '<?= $csrfToken ?>' },
                        body: JSON.stringify({ website_id: <?= (int)$website['id'] ?>, name: name })
                    });
                    const data = await res.json();
                    if (data.success) {
                        alert(data.message || window.__t('common.success'));
                        modalSaveTpl.classList.remove('open');
                    } else {
                        alert(data.message || window.__t('common.error'));
                    }
                } catch (err) {
                    alert(window.__t('common.error'));
                } finally {
                    submitBtn.disabled = false;
                    submitBtn.innerText = window.__t('modal.save_tpl_submit');
                }
            });
        }
    </script>

    <!-- Save as Template Modal -->
    <div id="modalSaveTemplate" class="cf-modal-overlay">
        <div class="cf-modal-card">
            <div class="cf-modal-header">
                <h3 class="cf-modal-title"><i class="fa-solid fa-bookmark"></i> <?= __t('modal.save_tpl_title') ?></h3>
                <button type="button" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm cf-modal-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="formSaveTemplate">
                <div class="cf-modal-body">
                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label"><?= __t('modal.save_tpl_name') ?></label>
                        <input type="text" id="customTemplateName" class="cf-ui-input" placeholder="<?= htmlspecialchars(__t('modal.save_tpl_name_ph')) ?>" value="<?= htmlspecialchars($website['title']) ?>" required>
                    </div>
                </div>
                <div class="cf-modal-footer">
                    <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-modal-close"><?= __t('common.cancel') ?></button>
                    <button type="submit" class="cf-ui-btn cf-ui-btn-primary" id="btnSubmitSaveTemplate"><?= __t('modal.save_tpl_submit') ?></button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
