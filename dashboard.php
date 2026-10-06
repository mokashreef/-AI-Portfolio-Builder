<?php
/**
 * AI Portfolio Builder - User Dashboard
 * Professional SaaS management suite for multi-page websites and custom domains.
 * Fully localized: Arabic (RTL) & English (LTR)
 */

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Core/Security.php';
require_once __DIR__ . '/app/Core/Auth.php';
require_once __DIR__ . '/app/Core/I18n.php';
require_once __DIR__ . '/app/Services/ComponentRegistry.php';
require_once __DIR__ . '/app/Services/TemplateRegistry.php';
require_once __DIR__ . '/app/Services/WebsiteService.php';
require_once __DIR__ . '/app/Services/DomainService.php';

use App\Core\Security;
use App\Core\Auth;
use App\Core\I18n;
use App\Services\WebsiteService;
use App\Services\TemplateRegistry;

I18n::init();
Auth::requireAuth();

$user = Auth::user();
$websites = WebsiteService::getUserWebsites((int)$user['id']);

$totalWebsites = count($websites);
$totalPublished = count(array_filter($websites, fn($w) => !empty($w['is_published'])));
$totalViews = array_sum(array_column($websites, 'total_views'));

$csrfToken = Security::csrfToken();
$isRtl = I18n::isRtl();
$lang = I18n::locale();
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= I18n::dir() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= __t('dashboard.title') ?></title>
    
    <!-- Google Fonts & Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-public.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-builder.css">

    <?= I18n::exportScript() ?>

    <style>
        body {
            font-family: <?= $isRtl ? "'IBM Plex Sans Arabic', " : "" ?>'Inter', sans-serif;
            background-color: var(--bg-primary, #0b0f19);
            color: var(--text-primary, #f9fafb);
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
        .cf-site-card-preview {
            height: 140px;
            background: #090d16;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            padding: 16px;
        }
        .cf-site-card-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-top: 16px;
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="cf-platform-nav">
        <div class="cf-platform-container cf-nav-wrap">
            <a href="<?= SITE_URL ?>/dashboard.php" class="cf-nav-brand">
                <span class="cf-brand-logo-icon"><i class="fa-solid fa-layer-group"></i></span>
                <span>AI Portfolio Builder</span>
            </a>
            <div class="cf-nav-menu">
                <a href="<?= SITE_URL ?>/dashboard.php" class="cf-nav-item active"><?= __t('nav.my_websites') ?></a>
                <a href="<?= SITE_URL ?>/templates.php" class="cf-nav-item"><?= __t('nav.templates') ?></a>
                <?php if (Auth::isAdmin()): ?>
                <a href="<?= SITE_URL ?>/admin.php" class="cf-nav-item" style="color:#f59e0b;"><?= __t('nav.admin') ?></a>
                <?php endif; ?>
            </div>
            <div class="cf-nav-actions">
                <!-- Platform UI Language Switcher -->
                <?php
                $targetLang = $lang === 'ar' ? 'en' : 'ar';
                $targetLabel = $lang === 'ar' ? 'English (LTR)' : 'العربية (RTL)';
                ?>
                <a href="<?= SITE_URL ?>/dashboard.php?lang=<?= $targetLang ?>" class="lang-switch-btn" title="Toggle Language">
                    <i class="fa-solid fa-globe"></i>
                    <span><?= $targetLabel ?></span>
                </a>

                <span class="cf-ui-badge" style="gap:8px;">
                    <i class="fa-solid fa-user-circle"></i> <?= htmlspecialchars($user['username']) ?>
                </span>
                <a href="<?= SITE_URL ?>/logout.php" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm" title="<?= __t('nav.logout') ?>">
                    <i class="fa-solid fa-arrow-right-from-bracket"></i>
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Workspace -->
    <main class="cf-platform-container" style="padding-top: 36px; padding-bottom: 60px;">
        
        <!-- Dashboard Header & Metrics -->
        <div class="cf-dash-header">
            <div>
                <h1 class="cf-dash-title">
                    <?= __t('dashboard.welcome', ['name' => htmlspecialchars($user['username'])]) ?>
                </h1>
                <p class="cf-dash-sub">
                    <?= __t('dashboard.subtitle') ?>
                </p>
            </div>
            <div style="display:flex;gap:12px;">
                <button type="button" class="cf-ui-btn cf-ui-btn-primary" onclick="document.getElementById('modalCreateWebsite').classList.add('open')">
                    <i class="fa-solid fa-plus"></i> <?= __t('dashboard.btn_create_first') ?>
                </button>
            </div>
        </div>

        <!-- Metric Badges -->
        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:16px;margin-bottom:36px;">
            <div class="cf-ui-card" style="padding:18px 24px;display:flex;align-items:center;gap:16px;">
                <div style="width:44px;height:44px;border-radius:8px;background:rgba(37,99,235,0.12);color:var(--primary);display:flex;align-items:center;justify-content:center;font-size:1.25rem;">
                    <i class="fa-solid fa-globe"></i>
                </div>
                <div>
                    <div style="font-size:1.5rem;font-weight:700;line-height:1;margin-bottom:4px;"><?= $totalWebsites ?></div>
                    <div style="font-size:0.8rem;color:var(--text-secondary);"><?= __t('dashboard.total_sites') ?></div>
                </div>
            </div>
            <div class="cf-ui-card" style="padding:18px 24px;display:flex;align-items:center;gap:16px;">
                <div style="width:44px;height:44px;border-radius:8px;background:rgba(16,185,129,0.12);color:var(--success);display:flex;align-items:center;justify-content:center;font-size:1.25rem;">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                </div>
                <div>
                    <div style="font-size:1.5rem;font-weight:700;line-height:1;margin-bottom:4px;"><?= $totalPublished ?></div>
                    <div style="font-size:0.8rem;color:var(--text-secondary);"><?= __t('dashboard.published_sites') ?></div>
                </div>
            </div>
            <div class="cf-ui-card" style="padding:18px 24px;display:flex;align-items:center;gap:16px;">
                <div style="width:44px;height:44px;border-radius:8px;background:rgba(14,165,233,0.12);color:var(--accent);display:flex;align-items:center;justify-content:center;font-size:1.25rem;">
                    <i class="fa-solid fa-chart-line"></i>
                </div>
                <div>
                    <div style="font-size:1.5rem;font-weight:700;line-height:1;margin-bottom:4px;"><?= number_format($totalViews) ?></div>
                    <div style="font-size:0.8rem;color:var(--text-secondary);"><?= __t('dashboard.total_views') ?></div>
                </div>
            </div>
        </div>

        <?php if (empty($websites)): ?>
            <!-- Empty State -->
            <div class="cf-ui-card" style="text-align: center; padding: 64px 24px; max-width: 600px; margin: 0 auto;">
                <div style="font-size: 3.5rem; margin-bottom: 16px;">📁</div>
                <h2 style="font-size: 1.5rem; margin-bottom: 8px;">
                    <?= __t('dashboard.no_sites_title') ?>
                </h2>
                <p style="color: var(--text-secondary); margin-bottom: 28px; line-height: 1.6;">
                    <?= __t('dashboard.no_sites_desc') ?>
                </p>
                <div style="display: flex; justify-content: center; gap: 14px; flex-wrap: wrap;">
                    <a href="<?= SITE_URL ?>/templates.php" class="cf-ui-btn cf-ui-btn-primary">
                        <i class="fa-solid fa-wand-magic-sparkles"></i> <?= __t('dashboard.start_with_template') ?>
                    </a>
                    <button type="button" class="cf-ui-btn cf-ui-btn-secondary" onclick="openBlankModal()">
                        <i class="fa-solid fa-pen-nib"></i> <?= __t('dashboard.start_blank') ?>
                    </button>
                </div>
            </div>
        <?php else: ?>
            <!-- Websites Grid -->
            <div class="cf-sites-grid">
                <?php foreach ($websites as $site): ?>
                    <?php
                    $isPub = !empty($site['is_published']);
                    $publicLink = SITE_URL . '/' . htmlspecialchars($site['slug']);
                    if (!empty($site['custom_domain'])) {
                        $publicLink = 'https://' . htmlspecialchars($site['custom_domain']);
                    }
                    ?>
                    <div class="cf-site-card">
                        <div class="cf-site-card-preview">
                            <span class="cf-preview-chip cf-ui-badge <?= $isPub ? 'cf-ui-badge-success' : '' ?>">
                                <?= $isPub ? ('● ' . __t('dashboard.status_published')) : ('○ ' . __t('dashboard.status_draft')) ?>
                            </span>
                            <div style="text-align:center;">
                                <div style="font-size: 1.2rem; font-weight: 700; color: #fff; margin-bottom: 4px;">
                                    <?= htmlspecialchars($site['title']) ?>
                                </div>
                                <span style="font-size: 0.75rem; color: #38bdf8; background: rgba(56,189,248,0.1); padding: 2px 8px; border-radius: 4px; font-weight: 600;">
                                    <?= htmlspecialchars($site['template_slug'] ?: 'custom') ?>
                                </span>
                            </div>
                        </div>

                        <div class="cf-site-card-body">
                            <h3 class="cf-site-card-title"><?= htmlspecialchars($site['title']) ?></h3>
                            <div class="cf-site-card-slug">
                                <i class="fa-solid fa-link" style="font-size:0.75rem;"></i>
                                <a href="<?= $publicLink ?>" target="_blank" style="color:var(--text-secondary); direction: ltr; display: inline-block;">
                                    <?= htmlspecialchars($site['custom_domain'] ?: ('portfolio.code-elta6ur.net/' . $site['slug'])) ?>
                                </a>
                            </div>

                            <div class="cf-site-card-stats">
                                <span><i class="fa-solid fa-layer-group"></i> <?= $site['page_count'] ?> <?= __t('common.pages') ?></span>
                                <span><i class="fa-solid fa-chart-simple"></i> <?= number_format($site['total_views']) ?> <?= __t('common.views') ?></span>
                                <span><i class="fa-solid fa-clock"></i> <?= date('Y/m/d', strtotime($site['updated_at'])) ?></span>
                            </div>

                            <div class="cf-site-card-actions">
                                <a href="<?= SITE_URL ?>/editor.php?id=<?= $site['id'] ?>" class="cf-ui-btn cf-ui-btn-primary cf-ui-btn-sm" style="flex:1;">
                                    <i class="fa-solid fa-pen-ruler"></i> <?= __t('dashboard.btn_edit') ?>
                                </a>
                                <a href="<?= SITE_URL ?>/stats.php?id=<?= $site['id'] ?>" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" title="<?= __t('dashboard.btn_analytics') ?>">
                                    <i class="fa-solid fa-chart-line"></i>
                                </a>
                                <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm btn-site-settings" 
                                    data-id="<?= $site['id'] ?>"
                                    data-title="<?= htmlspecialchars($site['title']) ?>"
                                    data-slug="<?= htmlspecialchars($site['slug']) ?>"
                                    data-domain="<?= htmlspecialchars($site['custom_domain'] ?? '') ?>"
                                    data-dir="<?= htmlspecialchars($site['direction'] ?? 'ltr') ?>"
                                    title="<?= __t('dashboard.btn_settings') ?>">
                                    <i class="fa-solid fa-gear"></i>
                                </button>
                                <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" onclick="saveAsTemplate(<?= $site['id'] ?>, '<?= htmlspecialchars(addslashes($site['title'])) ?>')" title="<?= __t('dashboard.btn_save_template') ?>">
                                    <i class="fa-solid fa-bookmark"></i>
                                </button>
                                <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" onclick="duplicateSite(<?= $site['id'] ?>)" title="<?= __t('dashboard.btn_duplicate') ?>">
                                    <i class="fa-solid fa-clone"></i>
                                </button>
                                <a href="<?= SITE_URL ?>/api/export.php?id=<?= $site['id'] ?>" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" title="<?= __t('common.export_zip') ?>">
                                    <i class="fa-solid fa-download"></i>
                                </a>
                                <button type="button" class="cf-ui-btn cf-ui-btn-danger cf-ui-btn-sm" onclick="deleteSite(<?= $site['id'] ?>)" title="<?= __t('dashboard.btn_delete') ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </main>

    <!-- Modal: Create New Website -->
    <div id="modalCreateWebsite" class="cf-modal-overlay">
        <div class="cf-modal-card">
            <div class="cf-modal-header">
                <h3 class="cf-modal-title"><?= __t('modal.create_title') ?></h3>
                <button type="button" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm cf-modal-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <div class="cf-modal-body" style="text-align:center;padding:32px 24px;">
                <p style="color:var(--text-secondary);margin-bottom:28px;">
                    <?= __t('modal.create_choose_method') ?>
                </p>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;">
                    <a href="<?= SITE_URL ?>/templates.php" class="cf-ui-card cf-ui-card-hover" style="text-align:center;padding:24px 16px;text-decoration:none;">
                        <div style="font-size:2.5rem;margin-bottom:12px;">🎨</div>
                        <h4 style="font-size:1.1rem;margin-bottom:6px;color:var(--text-primary);"><?= __t('modal.create_opt_template_title') ?></h4>
                        <p style="font-size:0.8rem;color:var(--text-secondary);"><?= __t('modal.create_opt_template_desc') ?></p>
                    </a>
                    <div class="cf-ui-card cf-ui-card-hover" style="text-align:center;padding:24px 16px;cursor:pointer;" onclick="openBlankModal()">
                        <div style="font-size:2.5rem;margin-bottom:12px;">📄</div>
                        <h4 style="font-size:1.1rem;margin-bottom:6px;color:var(--text-primary);"><?= __t('modal.create_opt_blank_title') ?></h4>
                        <p style="font-size:0.8rem;color:var(--text-secondary);"><?= __t('modal.create_opt_blank_desc') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal: Start Blank Canvas -->
    <div id="modalBlankCanvas" class="cf-modal-overlay">
        <div class="cf-modal-card">
            <div class="cf-modal-header">
                <h3 class="cf-modal-title"><?= __t('modal.create_opt_blank_title') ?></h3>
                <button type="button" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm cf-modal-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="formCreateBlank">
                <div class="cf-modal-body">
                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label" for="blankTitle"><?= __t('modal.site_name_label') ?></label>
                        <input type="text" id="blankTitle" class="cf-ui-input" placeholder="<?= __t('modal.site_name_ph') ?>" required>
                    </div>
                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label" for="blankSlug"><?= __t('modal.slug_label') ?></label>
                        <input type="text" id="blankSlug" class="cf-ui-input" placeholder="<?= __t('modal.slug_ph') ?>" required>
                        <span class="cf-ui-input-hint" style="direction:ltr;display:block;">portfolio.code-elta6ur.net/<strong>slug</strong></span>
                    </div>
                </div>
                <div class="cf-modal-footer">
                    <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-modal-close"><?= __t('common.cancel') ?></button>
                    <button type="submit" class="cf-ui-btn cf-ui-btn-primary" id="btnSubmitBlank">
                        <?= __t('modal.btn_create_submit') ?> <i class="fa-solid fa-arrow-<?= $isRtl ? 'left' : 'right' ?>"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal: Website Settings & Custom Domain -->
    <div id="modalSiteSettings" class="cf-modal-overlay">
        <div class="cf-modal-card" style="max-width: 600px;">
            <div class="cf-modal-header">
                <h3 class="cf-modal-title"><?= __t('settings.modal_title') ?></h3>
                <button type="button" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm cf-modal-close"><i class="fa-solid fa-xmark"></i></button>
            </div>
            <form id="formSaveSiteSettings">
                <input type="hidden" id="settingSiteId">
                <div class="cf-modal-body">
                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label" for="settingTitle"><?= __t('settings.site_title_label') ?></label>
                        <input type="text" id="settingTitle" class="cf-ui-input" required>
                    </div>
                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label" for="settingSlug"><?= __t('settings.slug_label') ?></label>
                        <input type="text" id="settingSlug" class="cf-ui-input" required>
                    </div>
                    <div class="cf-ui-form-group">
                        <label class="cf-ui-label" for="settingDir"><?= __t('settings.dir_label') ?></label>
                        <select id="settingDir" class="cf-ui-select">
                            <option value="ltr"><?= __t('settings.dir_ltr') ?></option>
                            <option value="rtl"><?= __t('settings.dir_rtl') ?></option>
                        </select>
                    </div>

                    <div style="margin-top:24px;padding-top:16px;border-top:1px solid var(--border-subtle);">
                        <h4 style="font-size:1rem;margin-bottom:8px;"><i class="fa-solid fa-globe"></i> <?= __t('settings.domain_heading') ?></h4>
                        <p style="font-size:0.8rem;color:var(--text-secondary);margin-bottom:12px;">
                            <?= __t('settings.domain_help') ?>
                        </p>
                        <div class="cf-ui-form-group">
                            <label class="cf-ui-label" for="settingDomain"><?= __t('settings.domain_label') ?></label>
                            <input type="text" id="settingDomain" class="cf-ui-input" placeholder="<?= __t('settings.domain_ph') ?>">
                        </div>
                        <div class="cf-ui-card" style="background:var(--bg-main);padding:14px;font-size:0.8rem;">
                            <strong><?= __t('dashboard.dns_title') ?></strong>
                            <ul style="<?= $isRtl ? 'margin-right:20px;' : 'margin-left:20px;' ?>margin-top:6px;line-height:1.6;color:var(--text-secondary);">
                                <li><strong><?= __t('dashboard.dns_subdomain') ?></strong> CNAME &rarr; <code>portfolio.code-elta6ur.net</code></li>
                                <li><strong><?= __t('dashboard.dns_root') ?></strong> A Record &rarr; <code>145.223.102.100</code></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="cf-modal-footer">
                    <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-modal-close"><?= __t('common.cancel') ?></button>
                    <button type="submit" class="cf-ui-btn cf-ui-btn-primary"><?= __t('common.save') ?></button>
                </div>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        const csrfToken = '<?= $csrfToken ?>';
        const siteUrl = '<?= SITE_URL ?>';

        function openBlankModal() {
            document.getElementById('modalCreateWebsite').classList.remove('open');
            document.getElementById('modalBlankCanvas').classList.add('open');
        }

        // Auto slugify for blank canvas
        document.getElementById('blankTitle').addEventListener('input', function() {
            const slugInput = document.getElementById('blankSlug');
            if (!slugInput.dataset.manual) {
                slugInput.value = this.value.toLowerCase().trim()
                    .replace(/[^a-z0-9\-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
            }
        });
        document.getElementById('blankSlug').addEventListener('input', function() {
            this.dataset.manual = 'true';
        });

        // Blank Canvas Submit
        document.getElementById('formCreateBlank').addEventListener('submit', async function(e) {
            e.preventDefault();
            const btn = document.getElementById('btnSubmitBlank');
            btn.disabled = true;
            btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> ' + window.__t('modal.creating_status');

            const title = document.getElementById('blankTitle').value.trim();
            const slug = document.getElementById('blankSlug').value.trim();

            try {
                const res = await fetch(`${siteUrl}/api/create-website.php`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({ title, slug, is_blank: true })
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

        // Settings Modal Open
        document.querySelectorAll('.btn-site-settings').forEach(btn => {
            btn.addEventListener('click', function() {
                document.getElementById('settingSiteId').value = this.dataset.id;
                document.getElementById('settingTitle').value = this.dataset.title;
                document.getElementById('settingSlug').value = this.dataset.slug;
                document.getElementById('settingDomain').value = this.dataset.domain || '';
                document.getElementById('settingDir').value = this.dataset.dir || 'ltr';
                document.getElementById('modalSiteSettings').classList.add('open');
            });
        });

        // Save Settings Submit
        document.getElementById('formSaveSiteSettings').addEventListener('submit', async function(e) {
            e.preventDefault();
            const id = document.getElementById('settingSiteId').value;
            const title = document.getElementById('settingTitle').value.trim();
            const slug = document.getElementById('settingSlug').value.trim();
            const dir = document.getElementById('settingDir').value;
            const domain = document.getElementById('settingDomain').value.trim();

            try {
                const updateRes = await fetch(`${siteUrl}/api/update-website.php`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({ website_id: id, title, slug, direction: dir })
                });
                const updateData = await updateRes.json();
                if (!updateData.success) {
                    alert(updateData.message || window.__t('common.error'));
                    return;
                }

                if (domain !== undefined) {
                    const domRes = await fetch(`${siteUrl}/api/save-domain.php`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                        body: JSON.stringify({ website_id: id, domain })
                    });
                    const domData = await domRes.json();
                    if (!domData.success && domain !== '') {
                        alert(domData.message || window.__t('common.error'));
                        return;
                    }
                }

                alert(window.__t('settings.save_success'));
                location.reload();
            } catch (err) {
                alert(window.__t('common.error'));
            }
        });

        // Duplicate Website
        async function duplicateSite(id) {
            if (!confirm(window.__t('dashboard.confirm_duplicate'))) return;
            try {
                const res = await fetch(`${siteUrl}/api/duplicate-website.php`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({ website_id: id })
                });
                const data = await res.json();
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message || window.__t('common.error'));
                }
            } catch (e) {
                alert(window.__t('common.error'));
            }
        }

        // Save as Custom Template
        async function saveAsTemplate(siteId, title) {
            const promptLabel = window.__t('modal.save_tpl_name') + ':';
            const name = prompt(promptLabel, title + ' Template');
            if (!name) return;
            try {
                const res = await fetch(`${siteUrl}/api/save-as-template.php`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': csrfToken },
                    body: JSON.stringify({ website_id: siteId, name: name })
                });
                const data = await res.json();
                if (data.success) {
                    alert(window.__t('common.success'));
                } else {
                    alert(data.message || window.__t('common.error'));
                }
            } catch (e) {
                alert(window.__t('common.error'));
            }
        }

        // Delete Website
        async function deleteSite(id) {
            if (!confirm(window.__t('dashboard.confirm_delete'))) return;
            try {
                const res = await fetch(`${siteUrl}/api/delete-portfolio.php?id=` + id, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' }
                });
                const data = await res.json();
                if (data.success) {
                    location.reload();
                } else {
                    alert(data.message || window.__t('common.error'));
                }
            } catch (e) {
                alert(window.__t('common.error'));
            }
        }

        // Modal close
        document.querySelectorAll('.cf-modal-close').forEach(b => {
            b.addEventListener('click', function() {
                this.closest('.cf-modal-overlay').classList.remove('open');
            });
        });
    </script>
</body>
</html>
