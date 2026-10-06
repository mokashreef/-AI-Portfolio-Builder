<?php
/**
 * AI Portfolio Builder - Admin Management Panel
 * Administrative oversight for users, websites, domains, and moderation.
 * Bilingual: Arabic (RTL) & English (LTR)
 */

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Core/Security.php';
require_once __DIR__ . '/app/Core/Auth.php';
require_once __DIR__ . '/app/Core/I18n.php';
require_once __DIR__ . '/app/Services/WebsiteService.php';

use App\Core\Security;
use App\Core\Auth;
use App\Core\I18n;
use App\Services\WebsiteService;

I18n::init();
Auth::requireAdmin();

$db = getDB();
$adminUser = Auth::user();
$msg = '';

// Handle Admin POST Actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (Security::verifyCsrf()) {
        $action = $_POST['admin_action'] ?? '';

        // 1. Delete website
        if ($action === 'delete_website' && !empty($_POST['website_id'])) {
            $delId = (int)$_POST['website_id'];
            $db->prepare("DELETE FROM websites WHERE id = ?")->execute([$delId]);
            $msg = I18n::isRtl() ? 'تم حذف الموقع بنجاح.' : 'Website deleted successfully.';
        }

        // 2. Toggle website published status (e.g. disable abusive website)
        if ($action === 'toggle_website_status' && !empty($_POST['website_id'])) {
            $siteId = (int)$_POST['website_id'];
            $newStatus = intval($_POST['status'] ?? 0);
            $db->prepare("UPDATE websites SET is_published = ? WHERE id = ?")->execute([$newStatus, $siteId]);
            $msg = I18n::isRtl() ? 'تم تحديث حالة نشر الموقع.' : 'Website status updated.';
        }

        // 3. Suspend / Activate user
        if ($action === 'toggle_user_status' && !empty($_POST['user_id'])) {
            $uId = (int)$_POST['user_id'];
            $status = ($_POST['status'] === 'suspended') ? 'suspended' : 'active';
            $db->prepare("UPDATE users SET status = ? WHERE id = ?")->execute([$status, $uId]);
            $msg = I18n::isRtl() ? 'تم تحديث حالة المستخدم.' : 'User status updated.';
        }

        // 4. Delete user
        if ($action === 'delete_user' && !empty($_POST['user_id'])) {
            $uId = (int)$_POST['user_id'];
            if ($uId !== (int)$adminUser['id']) {
                $db->prepare("DELETE FROM users WHERE id = ?")->execute([$uId]);
                $msg = I18n::isRtl() ? 'تم حذف حساب المستخدم.' : 'User account deleted.';
            }
        }
        // 5. Toggle template featured status
        if ($action === 'toggle_template_featured' && !empty($_POST['template_id'])) {
            $tplId = (int)$_POST['template_id'];
            $isFeatured = intval($_POST['is_featured'] ?? 0);
            $db->prepare("UPDATE templates SET is_featured = ? WHERE id = ?")->execute([$isFeatured, $tplId]);
            $msg = I18n::isRtl() ? 'تم تحديث حالة تمييز القالب.' : 'Template featured status updated.';
        }

        // 6. Delete template
        if ($action === 'delete_template' && !empty($_POST['template_id'])) {
            $tplId = (int)$_POST['template_id'];
            $db->prepare("DELETE FROM templates WHERE id = ?")->execute([$tplId]);
            $msg = I18n::isRtl() ? 'تم حذف القالب بنجاح.' : 'Template deleted successfully.';
        }
    }
}

// Global Stats
$totalUsers = (int)$db->query("SELECT COUNT(*) FROM users")->fetchColumn();
$totalSites = (int)$db->query("SELECT COUNT(*) FROM websites")->fetchColumn();
$totalPubSites = (int)$db->query("SELECT COUNT(*) FROM websites WHERE is_published = 1")->fetchColumn();
$totalViews = (int)$db->query("SELECT COUNT(*) FROM analytics_views")->fetchColumn();

// Websites List
$stmtSites = $db->query("
    SELECT w.*, u.username as owner_username, u.email as owner_email,
           (SELECT COUNT(*) FROM pages WHERE website_id = w.id) as page_count,
           (SELECT COUNT(*) FROM analytics_views WHERE website_id = w.id) as view_count
    FROM websites w
    LEFT JOIN users u ON w.user_id = u.id
    ORDER BY w.updated_at DESC
    LIMIT 100
");
$allWebsites = $stmtSites->fetchAll();

// Users List
$stmtUsers = $db->query("
    SELECT u.*,
           (SELECT COUNT(*) FROM websites WHERE user_id = u.id) as site_count
    FROM users u
    ORDER BY u.created_at DESC
    LIMIT 100
");
$allUsers = $stmtUsers->fetchAll();

// Templates List
$stmtTpls = $db->query("
    SELECT t.*, u.username as creator_username
    FROM templates t
    LEFT JOIN users u ON t.user_id = u.id
    ORDER BY t.is_featured DESC, t.id ASC
");
$allTemplates = $stmtTpls->fetchAll();

// Domains List
$stmtDomains = $db->query("
    SELECT d.*, w.title as site_title, w.slug as site_slug, u.username as owner_username
    FROM domains d
    JOIN websites w ON d.website_id = w.id
    JOIN users u ON d.user_id = u.id
    ORDER BY d.created_at DESC
    LIMIT 50
");
$allDomains = $stmtDomains->fetchAll();

$csrfToken = Security::csrfToken();
$lang = I18n::locale();
$isRtl = I18n::isRtl();
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= I18n::dir() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= I18n::t('admin.title') ?></title>
    
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
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.85rem;
        }
        .admin-table th, .admin-table td {
            padding: 12px 16px;
            text-align: <?= $isRtl ? 'right' : 'left' ?>;
            border-bottom: 1px solid var(--border-subtle);
        }
        .admin-table th {
            color: var(--text-muted);
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
        }
        .admin-table tr:hover td {
            background-color: var(--bg-surface-elevated);
        }
    </style>
</head>
<body>

    <!-- Nav -->
    <nav class="cf-platform-nav">
        <div class="cf-platform-container cf-nav-wrap">
            <a href="<?= SITE_URL ?>/dashboard.php" class="cf-nav-brand">
                <span class="cf-brand-logo-icon" style="background:#e11d48;"><i class="fa-solid fa-shield-halved"></i></span>
                AI Portfolio Builder Admin
            </a>
            <div class="cf-nav-menu">
                <a href="<?= SITE_URL ?>/dashboard.php" class="cf-nav-item"><?= I18n::t('nav.dashboard') ?></a>
                <a href="<?= SITE_URL ?>/templates.php" class="cf-nav-item"><?= I18n::t('nav.templates') ?></a>
            </div>
            <div class="cf-nav-actions" style="display:flex;align-items:center;gap:12px;">
                <!-- Platform Language Switcher -->
                <div class="cf-lang-switcher" style="display:inline-flex;align-items:center;background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.12);border-radius:6px;padding:2px 4px;font-size:0.8rem;">
                    <a href="?lang=ar" style="padding:4px 8px;border-radius:4px;color:<?= $lang === 'ar' ? '#fff' : '#94a3b8' ?>;background:<?= $lang === 'ar' ? 'var(--primary)' : 'transparent' ?>;text-decoration:none;font-weight:600;">العربية</a>
                    <a href="?lang=en" style="padding:4px 8px;border-radius:4px;color:<?= $lang === 'en' ? '#fff' : '#94a3b8' ?>;background:<?= $lang === 'en' ? 'var(--primary)' : 'transparent' ?>;text-decoration:none;font-weight:600;">EN</a>
                </div>

                <span class="cf-ui-badge cf-ui-badge-primary"><?= I18n::t('admin.super_admin') ?>: <?= htmlspecialchars($adminUser['username']) ?></span>
                <a href="<?= SITE_URL ?>/logout.php" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm" title="<?= I18n::t('nav.logout') ?>"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <main class="cf-platform-container" style="padding-top:40px;padding-bottom:80px;">
        
        <div style="display:flex;align-items:center;justify-content:space-between;margin-bottom:32px;">
            <div>
                <h1 style="font-size:2rem;letter-spacing:-0.02em;margin-bottom:4px;"><?= I18n::t('admin.platform_command_center') ?></h1>
                <p style="color:var(--text-secondary);font-size:0.9rem;"><?= I18n::t('admin.platform_desc') ?></p>
            </div>
        </div>

        <?php if ($msg): ?>
            <div style="padding:12px 20px;background:rgba(16,185,129,0.15);border:1px solid rgba(16,185,129,0.3);border-radius:var(--radius-sm);color:#6ee7b7;margin-bottom:24px;font-size:0.9rem;">
                <?= htmlspecialchars($msg) ?>
            </div>
        <?php endif; ?>

        <!-- KPI Grid -->
        <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(220px, 1fr));gap:20px;margin-bottom:40px;">
            <div class="cf-ui-card">
                <div style="font-size:0.8rem;color:var(--text-muted);margin-bottom:6px;"><?= I18n::t('admin.total_users') ?></div>
                <div style="font-size:2.25rem;font-weight:800;color:var(--primary);"><?= number_format($totalUsers) ?></div>
            </div>
            <div class="cf-ui-card">
                <div style="font-size:0.8rem;color:var(--text-muted);margin-bottom:6px;"><?= I18n::t('admin.total_websites') ?></div>
                <div style="font-size:2.25rem;font-weight:800;color:var(--text-primary);"><?= number_format($totalSites) ?></div>
            </div>
            <div class="cf-ui-card">
                <div style="font-size:0.8rem;color:var(--text-muted);margin-bottom:6px;"><?= I18n::t('admin.published_websites') ?></div>
                <div style="font-size:2.25rem;font-weight:800;color:var(--success);"><?= number_format($totalPubSites) ?></div>
            </div>
            <div class="cf-ui-card">
                <div style="font-size:0.8rem;color:var(--text-muted);margin-bottom:6px;"><?= I18n::t('admin.total_views') ?></div>
                <div style="font-size:2.25rem;font-weight:800;color:var(--accent);"><?= number_format($totalViews) ?></div>
            </div>
        </div>

        <!-- Section: Websites Management -->
        <div class="cf-ui-card" style="margin-bottom:40px;overflow-x:auto;">
            <div style="padding-bottom:16px;display:flex;justify-content:space-between;align-items:center;">
                <h3 style="font-size:1.2rem;"><i class="fa-solid fa-globe"></i> <?= I18n::t('admin.websites_registry') ?></h3>
                <span style="font-size:0.8rem;color:var(--text-muted);"><?= count($allWebsites) ?> <?= I18n::t('dashboard.websites') ?></span>
            </div>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?= I18n::t('admin.tab_websites') ?></th>
                        <th><?= I18n::t('admin.owner') ?></th>
                        <th><?= I18n::t('admin.domain') ?></th>
                        <th><?= I18n::t('admin.status') ?></th>
                        <th><?= I18n::t('admin.pages') ?></th>
                        <th><?= I18n::t('admin.views') ?></th>
                        <th><?= I18n::t('admin.created') ?></th>
                        <th><?= I18n::t('admin.actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allWebsites as $site): ?>
                        <tr>
                            <td>#<?= $site['id'] ?></td>
                            <td><strong><?= htmlspecialchars($site['title']) ?></strong></td>
                            <td><?= htmlspecialchars($site['owner_username'] ?? 'User #' . $site['user_id']) ?></td>
                            <td>
                                <a href="<?= SITE_URL ?>/portfolio.php?site=<?= htmlspecialchars($site['slug']) ?>" target="_blank" style="color:var(--primary);direction:ltr;display:inline-block;">
                                    /<?= htmlspecialchars($site['slug']) ?>
                                </a>
                            </td>
                            <td>
                                <?php if (!empty($site['is_published'])): ?>
                                    <span class="cf-ui-badge cf-ui-badge-success"><?= I18n::t('admin.badge_published') ?></span>
                                <?php else: ?>
                                    <span class="cf-ui-badge"><?= I18n::t('admin.badge_draft') ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?= $site['page_count'] ?></td>
                            <td><?= number_format($site['view_count']) ?></td>
                            <td><?= date('Y/m/d', strtotime($site['created_at'])) ?></td>
                            <td>
                                <div style="display:flex;gap:6px;">
                                    <a href="<?= SITE_URL ?>/editor.php?id=<?= $site['id'] ?>" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" title="<?= I18n::t('admin.btn_open_builder') ?>">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                    <!-- Toggle unpublish/disable -->
                                    <form method="POST" style="display:inline;">
                                        <?= Security::csrfInput() ?>
                                        <input type="hidden" name="admin_action" value="toggle_website_status">
                                        <input type="hidden" name="website_id" value="<?= $site['id'] ?>">
                                        <input type="hidden" name="status" value="<?= empty($site['is_published']) ? '1' : '0' ?>">
                                        <button type="submit" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" title="<?= empty($site['is_published']) ? I18n::t('admin.btn_publish') : I18n::t('admin.btn_unpublish') ?>">
                                            <i class="fa-solid <?= empty($site['is_published']) ? 'fa-eye' : 'fa-eye-slash' ?>"></i>
                                        </button>
                                    </form>
                                    <!-- Delete -->
                                    <form method="POST" style="display:inline;" onsubmit="return confirm('<?= I18n::t('js.confirm_delete_section') ?>');">
                                        <?= Security::csrfInput() ?>
                                        <input type="hidden" name="admin_action" value="delete_website">
                                        <input type="hidden" name="website_id" value="<?= $site['id'] ?>">
                                        <button type="submit" class="cf-ui-btn cf-ui-btn-danger cf-ui-btn-sm" title="<?= I18n::t('admin.btn_delete_website') ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Section: Users Management -->
        <div class="cf-ui-card" style="margin-bottom:40px;overflow-x:auto;">
            <div style="padding-bottom:16px;display:flex;justify-content:space-between;align-items:center;">
                <h3 style="font-size:1.2rem;"><i class="fa-solid fa-users"></i> <?= I18n::t('admin.users_management') ?></h3>
                <span style="font-size:0.8rem;color:var(--text-muted);"><?= count($allUsers) ?> <?= I18n::t('admin.tab_users') ?></span>
            </div>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?= I18n::t('auth.username_label') ?></th>
                        <th><?= I18n::t('auth.email_label') ?></th>
                        <th><?= I18n::t('admin.role') ?></th>
                        <th><?= I18n::t('admin.status') ?></th>
                        <th><?= I18n::t('dashboard.websites') ?></th>
                        <th><?= I18n::t('admin.joined') ?></th>
                        <th><?= I18n::t('admin.actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allUsers as $u): ?>
                        <tr>
                            <td>#<?= $u['id'] ?></td>
                            <td><strong><?= htmlspecialchars($u['username']) ?></strong></td>
                            <td><?= htmlspecialchars($u['email']) ?></td>
                            <td>
                                <span class="cf-ui-badge <?= $u['role'] === 'admin' ? 'cf-ui-badge-primary' : '' ?>">
                                    <?= $u['role'] === 'admin' ? I18n::t('admin.badge_admin') : I18n::t('admin.badge_user') ?>
                                </span>
                            </td>
                            <td>
                                <span class="cf-ui-badge <?= $u['status'] === 'active' ? 'cf-ui-badge-success' : 'cf-ui-badge-danger' ?>">
                                    <?= $u['status'] === 'active' ? I18n::t('admin.badge_active') : I18n::t('admin.badge_suspended') ?>
                                </span>
                            </td>
                            <td><?= $u['site_count'] ?></td>
                            <td><?= date('Y/m/d', strtotime($u['created_at'])) ?></td>
                            <td>
                                <?php if ($u['id'] !== $adminUser['id']): ?>
                                <div style="display:flex;gap:6px;">
                                    <form method="POST" style="display:inline;">
                                        <?= Security::csrfInput() ?>
                                        <input type="hidden" name="admin_action" value="toggle_user_status">
                                        <input type="hidden" name="user_id" value="<?= $u['id'] ?>">
                                        <input type="hidden" name="status" value="<?= $u['status'] === 'active' ? 'suspended' : 'active' ?>">
                                        <button type="submit" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" title="<?= $u['status'] === 'active' ? I18n::t('admin.btn_suspend') : I18n::t('admin.btn_activate') ?>">
                                            <i class="fa-solid <?= $u['status'] === 'active' ? 'fa-ban' : 'fa-check' ?>"></i>
                                        </button>
                                    </form>
                                    <form method="POST" style="display:inline;" onsubmit="return confirm('<?= I18n::t('admin.btn_delete_user') ?>?');">
                                        <?= Security::csrfInput() ?>
                                        <input type="hidden" name="admin_action" value="delete_user">
                                        <input type="hidden" name="user_id" value="<?= $u['id'] ?>">
                                        <button type="submit" class="cf-ui-btn cf-ui-btn-danger cf-ui-btn-sm" title="<?= I18n::t('admin.btn_delete_user') ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                                <?php else: ?>
                                <span style="font-size:0.75rem;color:var(--text-muted);"><?= I18n::t('admin.super_admin') ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Section: Custom Domains Registry -->
        <div class="cf-ui-card" style="overflow-x:auto;">
            <div style="padding-bottom:16px;">
                <h3 style="font-size:1.2rem;"><i class="fa-solid fa-network-wired"></i> <?= I18n::t('admin.custom_domains_registry') ?></h3>
            </div>
            <?php if (empty($allDomains)): ?>
                <p style="color:var(--text-muted);font-size:0.9rem;padding:16px 0;"><?= I18n::t('admin.no_domains') ?></p>
            <?php else: ?>
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th><?= I18n::t('admin.domain') ?></th>
                            <th><?= I18n::t('admin.tab_websites') ?></th>
                            <th><?= I18n::t('admin.owner') ?></th>
                            <th>DNS Type</th>
                            <th><?= I18n::t('admin.status') ?></th>
                            <th><?= I18n::t('admin.created') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($allDomains as $d): ?>
                            <tr>
                                <td><strong><?= htmlspecialchars($d['domain']) ?></strong></td>
                                <td>/<?= htmlspecialchars($d['site_slug']) ?></td>
                                <td><?= htmlspecialchars($d['owner_username']) ?></td>
                                <td><?= htmlspecialchars($d['dns_type']) ?></td>
                                <td>
                                    <span class="cf-ui-badge <?= $d['verified'] ? 'cf-ui-badge-success' : '' ?>">
                                        <?= $d['verified'] ? I18n::t('admin.badge_verified') : I18n::t('admin.badge_pending') ?>
                                    </span>
                                </td>
                                <td><?= date('Y/m/d', strtotime($d['created_at'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

        <!-- Section: Templates Management & Featuring -->
        <div class="cf-ui-card" style="margin-top:40px;overflow-x:auto;">
            <div style="padding-bottom:16px;display:flex;justify-content:space-between;align-items:center;">
                <h3 style="font-size:1.2rem;"><i class="fa-solid fa-palette"></i> <?= I18n::t('admin.templates_catalog') ?></h3>
                <span style="font-size:0.8rem;color:var(--text-muted);"><?= count($allTemplates) ?> <?= I18n::t('admin.tab_templates') ?></span>
            </div>
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th><?= I18n::t('admin.tab_templates') ?></th>
                        <th><?= I18n::isRtl() ? 'الاسم بالعربية' : 'Arabic Name' ?></th>
                        <th><?= I18n::t('templates.filter') ?></th>
                        <th><?= I18n::t('admin.role') ?></th>
                        <th><?= I18n::t('admin.featured') ?></th>
                        <th><?= I18n::t('admin.creator') ?></th>
                        <th><?= I18n::t('admin.actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($allTemplates as $tpl): ?>
                        <tr>
                            <td>#<?= $tpl['id'] ?></td>
                            <td><strong><?= htmlspecialchars($tpl['name']) ?></strong></td>
                            <td><?= htmlspecialchars($tpl['name_ar'] ?? '') ?></td>
                            <td><span class="cf-ui-badge"><?= htmlspecialchars($tpl['category']) ?></span></td>
                            <td>
                                <span class="cf-ui-badge <?= !empty($tpl['is_system']) ? 'cf-ui-badge-primary' : 'cf-ui-badge-secondary' ?>">
                                    <?= !empty($tpl['is_system']) ? 'System' : 'Custom' ?>
                                </span>
                            </td>
                            <td>
                                <?php if (!empty($tpl['is_featured'])): ?>
                                    <span class="cf-ui-badge cf-ui-badge-success"><i class="fa-solid fa-star"></i> <?= I18n::t('admin.badge_featured') ?></span>
                                <?php else: ?>
                                    <span class="cf-ui-badge" style="opacity:0.6;">Standard</span>
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($tpl['creator_username'] ?? 'System Core') ?></td>
                            <td>
                                <div style="display:flex;gap:6px;">
                                    <!-- Toggle Featured -->
                                    <form method="POST" style="display:inline;">
                                        <?= Security::csrfInput() ?>
                                        <input type="hidden" name="admin_action" value="toggle_template_featured">
                                        <input type="hidden" name="template_id" value="<?= $tpl['id'] ?>">
                                        <input type="hidden" name="is_featured" value="<?= empty($tpl['is_featured']) ? '1' : '0' ?>">
                                        <button type="submit" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" title="<?= empty($tpl['is_featured']) ? I18n::t('admin.btn_feature') : I18n::t('admin.btn_unfeature') ?>">
                                            <i class="fa-solid <?= empty($tpl['is_featured']) ? 'fa-star' : 'fa-star-half-stroke' ?>" style="<?= !empty($tpl['is_featured']) ? 'color:#fbbf24;' : '' ?>"></i>
                                        </button>
                                    </form>
                                    <!-- Delete if custom -->
                                    <?php if (empty($tpl['is_system'])): ?>
                                    <form method="POST" style="display:inline;" onsubmit="return confirm('<?= I18n::t('admin.btn_delete_template') ?>?');">
                                        <?= Security::csrfInput() ?>
                                        <input type="hidden" name="admin_action" value="delete_template">
                                        <input type="hidden" name="template_id" value="<?= $tpl['id'] ?>">
                                        <button type="submit" class="cf-ui-btn cf-ui-btn-danger cf-ui-btn-sm" title="<?= I18n::t('admin.btn_delete_template') ?>">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </main>

</body>
</html>
