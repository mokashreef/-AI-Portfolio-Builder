<?php
/**
 * AI Portfolio Builder - Modern SaaS Platform Landing Page
 * Clean, minimal, high-conversion presentation showcasing the Visual Builder & 50+ Templates.
 * 100% Fully Localized: Pure Arabic (RTL) & Pure English (LTR).
 */

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Core/Security.php';
require_once __DIR__ . '/app/Core/Auth.php';
require_once __DIR__ . '/app/Core/I18n.php';
require_once __DIR__ . '/app/Services/TemplateRegistry.php';

use App\Core\Auth;
use App\Core\I18n;
use App\Services\TemplateRegistry;

I18n::init();

$featuredTemplates = array_slice(TemplateRegistry::getAll(), 0, 6);
$user = Auth::user();
$isRtl = I18n::isRtl();
$lang = I18n::locale();
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= I18n::dir() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $isRtl ? 'AI Portfolio Builder | منصة بناء المواقع وحقائب الأعمال الشخصية بدون كود' : 'AI Portfolio Builder | Professional No-Code Portfolio & Website Builder' ?></title>
    <meta name="description" content="<?= $isRtl ? 'أنشئ موقعك وحقيبة أعمالك المهنية في دقائق بدون كود عبر محرر مرئي بالسحب والإفلات، مع قوالب احترافية ودعم كامل للعربية والإنجليزية ونطاقات مخصصة.' : 'Build stunning personal websites and portfolio showcases without writing code. Real visual drag & drop builder, 50+ production templates, multi-page freedom, and custom domains.' ?>">
    
    <!-- Open Graph Metadata -->
    <meta property="og:title" content="<?= $isRtl ? 'AI Portfolio Builder - منصة بناء المواقع وحقائب الأعمال' : 'AI Portfolio Builder - Modern No-Code Website & Portfolio Builder' ?>">
    <meta property="og:description" content="<?= $isRtl ? 'أنشئ موقعك وحقيبة أعمالك المهنية في دقائق بدون كود عبر محرر مرئي بالسحب والإفلات، مع قوالب احترافية ودعم كامل للعربية والإنجليزية ونطاقات مخصصة.' : 'Create your professional portfolio with visual drag-and-drop, 50+ curated templates, multi-page architecture, and custom domains.' ?>">
    
    <!-- Google Fonts & Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@400;600;700;800&family=Fira+Code:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-public.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-builder.css">

    <?= I18n::exportScript() ?>

    <style>
        body {
            font-family: <?= $isRtl ? "'IBM Plex Sans Arabic', " : "" ?>'Inter', sans-serif;
        }
        .hero-section {
            padding: 80px 0 60px;
            text-align: center;
            position: relative;
        }
        .hero-glow {
            position: absolute;
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 600px;
            height: 350px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.12) 0%, transparent 70%);
            pointer-events: none;
            z-index: 0;
        }
        .builder-showcase-frame {
            position: relative;
            z-index: 1;
            margin-top: 48px;
            border-radius: var(--radius-lg);
            background: var(--bg-surface);
            border: 1px solid var(--border-strong);
            box-shadow: 0 30px 80px -20px rgba(0, 0, 0, 0.7);
            overflow: hidden;
            max-width: 1100px;
            margin-left: auto;
            margin-right: auto;
        }
        .showcase-header {
            background: var(--bg-surface-elevated);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--border-subtle);
        }
        .showcase-dots {
            display: flex;
            gap: 6px;
        }
        .showcase-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255,255,255,0.2);
        }
        .showcase-dot.red { background: #ef4444; }
        .showcase-dot.yellow { background: #f59e0b; }
        .showcase-dot.green { background: #10b981; }
        .showcase-body {
            display: grid;
            grid-template-columns: 240px 1fr 240px;
            height: 480px;
            background: #060910;
        }
        .showcase-col {
            padding: 18px;
            border-<?= $isRtl ? 'left' : 'right' ?>: 1px solid var(--border-subtle);
            font-size: 0.8rem;
            text-align: <?= $isRtl ? 'right' : 'left' ?>;
        }
        .showcase-col.right {
            border-<?= $isRtl ? 'left' : 'right' ?>: none;
            border-<?= $isRtl ? 'right' : 'left' ?>: 1px solid var(--border-subtle);
        }
        .bento-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 40px;
        }
        .bento-card {
            background: var(--bg-surface);
            border: 1px solid var(--border-subtle);
            border-radius: var(--radius-md);
            padding: 32px;
            display: flex;
            flex-direction: column;
            transition: var(--transition);
            text-align: <?= $isRtl ? 'right' : 'left' ?>;
        }
        .bento-card:hover {
            border-color: var(--primary);
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }
        .bento-icon {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            background: var(--primary-light);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            margin-bottom: 20px;
            <?= $isRtl ? 'margin-left: auto;' : '' ?>
        }
        @media (max-width: 900px) {
            .bento-grid { grid-template-columns: 1fr; }
            .showcase-body { grid-template-columns: 1fr; height: auto; }
            .showcase-col { display: none; }
        }
    </style>
</head>
<body>

    <!-- Platform Navigation -->
    <nav class="cf-platform-nav">
        <div class="cf-platform-container cf-nav-wrap">
            <a href="<?= SITE_URL ?>/" class="cf-nav-brand">
                <span class="cf-brand-logo-icon"><i class="fa-solid fa-layer-group"></i></span>
                AI Portfolio Builder
            </a>
            <div class="cf-nav-menu">
                <a href="#features" class="cf-nav-item"><?= I18n::t('landing.nav_features') ?></a>
                <a href="<?= SITE_URL ?>/templates.php" class="cf-nav-item"><?= I18n::t('landing.nav_templates') ?></a>
                <a href="#showcase" class="cf-nav-item"><?= I18n::t('landing.nav_builder') ?></a>
                <a href="#faq" class="cf-nav-item"><?= I18n::t('landing.nav_faq') ?></a>
                <?php if (Auth::check()): ?>
                <a href="<?= SITE_URL ?>/dashboard.php" class="cf-nav-item"><?= I18n::t('nav.dashboard') ?></a>
                <?php endif; ?>
            </div>
            <div class="cf-nav-actions">
                <?php
                $targetLang = $lang === 'ar' ? 'en' : 'ar';
                $targetLabel = $lang === 'ar' ? 'English (LTR)' : 'العربية (RTL)';
                ?>
                <a href="<?= SITE_URL ?>/?lang=<?= $targetLang ?>" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" style="font-size:0.8rem;" title="Switch Language">
                    <i class="fa-solid fa-globe"></i> <?= $targetLabel ?>
                </a>

                <?php if (Auth::check()): ?>
                    <a href="<?= SITE_URL ?>/dashboard.php" class="cf-ui-btn cf-ui-btn-primary cf-ui-btn-sm">
                        <i class="fa-solid fa-gauge-high"></i> <?= I18n::t('nav.dashboard') ?>
                    </a>
                <?php else: ?>
                    <a href="<?= SITE_URL ?>/login.php" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm"><?= I18n::t('auth.login_title') ?></a>
                    <a href="<?= SITE_URL ?>/register.php" class="cf-ui-btn cf-ui-btn-primary cf-ui-btn-sm"><?= I18n::t('auth.btn_register') ?></a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-glow"></div>
        <div class="cf-platform-container" style="position: relative; z-index: 1;">
            
            <span class="cf-ui-badge cf-ui-badge-primary" style="margin-bottom: 20px; padding: 6px 16px;">
                <span class="cf-badge-dot"></span> <?= I18n::t('landing.badge') ?>
            </span>

            <h1 style="font-size: clamp(2.75rem, 5.5vw, 4.5rem); letter-spacing: -0.03em; max-width: 900px; margin: 0 auto 20px; line-height: 1.18;">
                <?= I18n::t('landing.hero_title_1') ?><br>
                <span style="background: linear-gradient(135deg, #60a5fa, #38bdf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                    <?= I18n::t('landing.hero_title_2') ?>
                </span>
            </h1>

            <p style="color: var(--text-secondary); font-size: 1.25rem; max-width: 720px; margin: 0 auto 36px; line-height: 1.7;">
                <?= I18n::t('landing.hero_subtitle') ?>
            </p>

            <div style="display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;">
                <?php if (Auth::check()): ?>
                    <a href="<?= SITE_URL ?>/dashboard.php" class="cf-ui-btn cf-ui-btn-primary cf-ui-btn-lg">
                        <i class="fa-solid fa-gauge-high"></i> <?= I18n::t('landing.btn_go_dashboard') ?>
                    </a>
                <?php else: ?>
                    <a href="<?= SITE_URL ?>/register.php" class="cf-ui-btn cf-ui-btn-primary cf-ui-btn-lg">
                        <i class="fa-solid fa-cube"></i> <?= I18n::t('landing.btn_create_free') ?>
                    </a>
                <?php endif; ?>
                <a href="<?= SITE_URL ?>/templates.php" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-lg">
                    <i class="fa-solid fa-wand-magic-sparkles"></i> <?= I18n::t('landing.btn_explore_templates') ?>
                </a>
            </div>

            <!-- Builder Studio Interface Mockup Showcase -->
            <div class="builder-showcase-frame" id="showcase">
                <div class="showcase-header">
                    <div class="showcase-dots">
                        <div class="showcase-dot red"></div>
                        <div class="showcase-dot yellow"></div>
                        <div class="showcase-dot green"></div>
                    </div>
                    <span style="font-size: 0.8rem; color: var(--text-muted); font-family: monospace; direction:ltr; display:inline-block;"><?= I18n::t('landing.mock_window_title') ?></span>
                </div>
                <div class="showcase-body">
                    <!-- Left Palette Mock -->
                    <div class="showcase-col">
                        <div style="color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase; margin-bottom: 12px; font-weight: 700;"><?= I18n::t('landing.mock_palette') ?></div>
                        <div style="display:flex;flex-direction:column;gap:8px;">
                            <div style="padding: 10px; background: #0f172a; border-radius: 6px; border: 1px solid var(--border-subtle); display:flex; align-items:center; gap:8px;">
                                <i class="fa-solid fa-star text-primary"></i> <span><?= I18n::t('landing.mock_hero') ?></span>
                            </div>
                            <div style="padding: 10px; background: #0f172a; border-radius: 6px; border: 1px solid var(--border-subtle); display:flex; align-items:center; gap:8px;">
                                <i class="fa-solid fa-briefcase text-primary"></i> <span><?= I18n::t('landing.mock_projects') ?></span>
                            </div>
                            <div style="padding: 10px; background: #0f172a; border-radius: 6px; border: 1px solid var(--border-subtle); display:flex; align-items:center; gap:8px;">
                                <i class="fa-solid fa-code text-primary"></i> <span><?= I18n::t('landing.mock_skills') ?></span>
                            </div>
                            <div style="padding: 10px; background: #0f172a; border-radius: 6px; border: 1px solid var(--border-subtle); display:flex; align-items:center; gap:8px;">
                                <i class="fa-solid fa-envelope text-primary"></i> <span><?= I18n::t('landing.mock_contact') ?></span>
                            </div>
                        </div>
                    </div>

                    <!-- Center Live Canvas Mock -->
                    <div style="padding: 32px 24px; overflow-y: auto; text-align: <?= $isRtl ? 'right' : 'left' ?>; background: #0b0f19;">
                        <div style="background: #131b2e; border: 1px solid rgba(59, 130, 246, 0.4); border-radius: 8px; padding: 28px; margin-bottom: 20px; position: relative;">
                            <span style="position: absolute; top: 8px; <?= $isRtl ? 'left: 12px;' : 'right: 12px;' ?> font-size: 0.7rem; color: #60a5fa; background: rgba(37,99,235,0.2); padding: 2px 8px; border-radius: 4px;"><?= I18n::t('landing.mock_badge') ?></span>
                            <h2 style="font-size: 1.5rem; margin-bottom: 8px;"><?= I18n::t('landing.mock_name') ?></h2>
                            <p style="color: #94a3b8; font-size: 0.95rem; margin-bottom: 16px;"><?= I18n::t('landing.mock_bio') ?></p>
                            <div style="display:flex;gap:10px;">
                                <span class="cf-btn cf-btn-primary cf-btn-sm"><?= I18n::t('landing.mock_btn_projects') ?></span>
                                <span class="cf-btn cf-btn-outline cf-btn-sm"><?= I18n::t('landing.mock_btn_contact') ?></span>
                            </div>
                        </div>
                        <div style="background: #131b2e; border: 1px solid var(--border-subtle); border-radius: 8px; padding: 24px;">
                            <h3 style="font-size: 1.15rem; margin-bottom: 12px;"><?= I18n::t('landing.mock_featured_studies') ?></h3>
                            <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px;">
                                <div style="background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle); padding: 12px; border-radius: 6px;">
                                    <strong><?= I18n::t('landing.mock_study_1_title') ?></strong>
                                    <p style="font-size: 0.8rem; color:#94a3b8; margin-top:4px;"><?= I18n::t('landing.mock_study_1_desc') ?></p>
                                </div>
                                <div style="background: rgba(255,255,255,0.03); border: 1px solid var(--border-subtle); padding: 12px; border-radius: 6px;">
                                    <strong><?= I18n::t('landing.mock_study_2_title') ?></strong>
                                    <p style="font-size: 0.8rem; color:#94a3b8; margin-top:4px;"><?= I18n::t('landing.mock_study_2_desc') ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Inspector Mock -->
                    <div class="showcase-col right">
                        <div style="color: var(--text-muted); font-size: 0.75rem; text-transform: uppercase; margin-bottom: 12px; font-weight: 700;"><?= I18n::t('landing.mock_inspector') ?></div>
                        <div style="display:flex;flex-direction:column;gap:12px;">
                            <div>
                                <label style="display:block;margin-bottom:4px;color:var(--text-secondary);font-size:0.75rem;"><?= I18n::t('landing.mock_heading_font') ?></label>
                                <div style="padding:6px 10px;background:#0f172a;border-radius:4px;border:1px solid var(--border-subtle);"><?= $isRtl ? 'IBM Plex Sans Arabic' : 'Plus Jakarta Sans' ?></div>
                            </div>
                            <div>
                                <label style="display:block;margin-bottom:4px;color:var(--text-secondary);font-size:0.75rem;"><?= I18n::t('landing.mock_primary_accent') ?></label>
                                <div style="display:flex;align-items:center;gap:6px;padding:6px 10px;background:#0f172a;border-radius:4px;border:1px solid var(--border-subtle);">
                                    <span style="width:14px;height:14px;background:#2563eb;border-radius:3px;display:inline-block;"></span>
                                    <span>#2563eb</span>
                                </div>
                            </div>
                            <div>
                                <label style="display:block;margin-bottom:4px;color:var(--text-secondary);font-size:0.75rem;"><?= I18n::t('landing.mock_padding_y') ?></label>
                                <div style="padding:6px 10px;background:#0f172a;border-radius:4px;border:1px solid var(--border-subtle);">64px</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- Bento Features Section -->
    <section class="cf-platform-container" id="features" style="padding: 100px 24px;">
        <div style="text-align: center; max-width: 680px; margin: 0 auto;">
            <span class="cf-ui-badge cf-ui-badge-primary" style="margin-bottom: 12px;"><?= I18n::t('landing.bento_badge') ?></span>
            <h2 style="font-size: 2.5rem; letter-spacing: -0.02em; margin-bottom: 12px;">
                <?= I18n::t('landing.bento_title') ?>
            </h2>
            <p style="color: var(--text-secondary); font-size: 1.1rem; line-height:1.7;">
                <?= I18n::t('landing.bento_subtitle') ?>
            </p>
        </div>

        <div class="bento-grid">
            <!-- 1. Real Visual Drag & Drop -->
            <div class="bento-card">
                <div class="bento-icon"><i class="fa-solid fa-shapes"></i></div>
                <h3 style="font-size: 1.35rem; margin-bottom: 8px;"><?= I18n::t('landing.bento_1_title') ?></h3>
                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7;">
                    <?= I18n::t('landing.bento_1_desc') ?>
                </p>
            </div>

            <!-- 2. 50+ Production Templates -->
            <div class="bento-card">
                <div class="bento-icon"><i class="fa-solid fa-palette"></i></div>
                <h3 style="font-size: 1.35rem; margin-bottom: 8px;"><?= I18n::t('landing.bento_2_title') ?></h3>
                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7;">
                    <?= I18n::t('landing.bento_2_desc') ?>
                </p>
            </div>

            <!-- 3. Multi-Page Websites -->
            <div class="bento-card">
                <div class="bento-icon"><i class="fa-solid fa-layer-group"></i></div>
                <h3 style="font-size: 1.35rem; margin-bottom: 8px;"><?= I18n::t('landing.bento_3_title') ?></h3>
                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7;">
                    <?= I18n::t('landing.bento_3_desc') ?>
                </p>
            </div>

            <!-- 4. Custom Domains -->
            <div class="bento-card">
                <div class="bento-icon"><i class="fa-solid fa-globe"></i></div>
                <h3 style="font-size: 1.35rem; margin-bottom: 8px;"><?= I18n::t('landing.bento_4_title') ?></h3>
                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7;">
                    <?= I18n::t('landing.bento_4_desc') ?>
                </p>
            </div>

            <!-- 5. Responsive Studio -->
            <div class="bento-card">
                <div class="bento-icon"><i class="fa-solid fa-mobile-screen"></i></div>
                <h3 style="font-size: 1.35rem; margin-bottom: 8px;"><?= I18n::t('landing.bento_5_title') ?></h3>
                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7;">
                    <?= I18n::t('landing.bento_5_desc') ?>
                </p>
            </div>

            <!-- 6. Static ZIP Export -->
            <div class="bento-card">
                <div class="bento-icon"><i class="fa-solid fa-file-zipper"></i></div>
                <h3 style="font-size: 1.35rem; margin-bottom: 8px;"><?= I18n::t('landing.bento_6_title') ?></h3>
                <p style="color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7;">
                    <?= I18n::t('landing.bento_6_desc') ?>
                </p>
            </div>
        </div>
    </section>

    <!-- Templates Preview Grid Section -->
    <section style="background: var(--bg-surface); padding: 90px 0; border-top: 1px solid var(--border-subtle); border-bottom: 1px solid var(--border-subtle);">
        <div class="cf-platform-container">
            <div style="display:flex;align-items:flex-end;justify-content:space-between;flex-wrap:wrap;gap:20px;margin-bottom:40px;">
                <div>
                    <span class="cf-ui-badge cf-ui-badge-primary" style="margin-bottom:8px;"><?= I18n::t('landing.showcase_badge') ?></span>
                    <h2 style="font-size: 2.25rem; letter-spacing: -0.02em;"><?= I18n::t('landing.showcase_title') ?></h2>
                </div>
                <a href="<?= SITE_URL ?>/templates.php" class="cf-ui-btn cf-ui-btn-secondary">
                    <?= I18n::t('landing.showcase_view_all') ?> <i class="fa-solid fa-arrow-<?= $isRtl ? 'left' : 'right' ?>"></i>
                </a>
            </div>

            <div class="cf-tpl-grid">
                <?php foreach ($featuredTemplates as $tpl): 
                    $tplCardName = ($isRtl && !empty($tpl['name_ar'])) ? $tpl['name_ar'] : $tpl['name'];
                    $tplCardDesc = ($isRtl && !empty($tpl['description_ar'])) ? $tpl['description_ar'] : $tpl['description'];
                ?>
                    <div class="cf-tpl-card">
                        <div class="cf-tpl-thumbnail-box">
                            <span class="cf-tpl-category-tag"><?= htmlspecialchars($tpl['category']) ?></span>
                            <div class="tpl-thumb-preview" style="background-color: <?= htmlspecialchars($tpl['theme']['backgroundColor']) ?>; color: <?= htmlspecialchars($tpl['theme']['textColor']) ?>; border-<?= $isRtl ? 'right' : 'left' ?>: 4px solid <?= htmlspecialchars($tpl['theme']['primaryColor']) ?>;">
                                <div style="font-size: 1.1rem; font-weight: 700; margin-bottom: 4px;">
                                    <?= htmlspecialchars($tplCardName) ?>
                                </div>
                                <div style="font-size: 0.75rem; color: <?= htmlspecialchars($tpl['theme']['primaryColor']) ?>; font-weight: 600;">
                                    <?= htmlspecialchars($tpl['name']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="cf-tpl-info" style="text-align:<?= $isRtl ? 'right' : 'left' ?>;">
                            <h3 class="cf-tpl-name"><?= htmlspecialchars($tplCardName) ?></h3>
                            <p class="cf-tpl-desc"><?= htmlspecialchars($tplCardDesc) ?></p>
                            <a href="<?= SITE_URL ?>/template-preview.php?slug=<?= urlencode($tpl['slug']) ?>" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm" style="width:100%;justify-content:center;">
                                <i class="fa-solid fa-eye"></i> <?= I18n::t('landing.showcase_btn_preview') ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Platform Ownership Attribution Showcase (Req 24 & 25) -->
    <section class="cf-platform-container" style="padding: 90px 24px; text-align: center;">
        <div style="max-width: 680px; margin: 0 auto;">
            <span class="cf-ui-badge" style="margin-bottom: 12px;"><i class="fa-solid fa-shield-halved"></i> <?= I18n::t('landing.attr_badge') ?></span>
            <h2 style="font-size: 2.25rem; margin-bottom: 16px;"><?= I18n::t('landing.attr_title') ?></h2>
            <p style="color: var(--text-secondary); font-size: 1.05rem; line-height: 1.7; margin-bottom: 28px;">
                <?= I18n::t('landing.attr_desc') ?>
            </p>
            <div style="display: inline-flex; align-items: center; gap: 8px; padding: 10px 20px; background: rgba(148, 163, 184, 0.08); border: 1px solid var(--border-subtle); border-radius: 9999px;">
                <span style="color:var(--primary);font-size:0.9rem;"><i class="fa-solid fa-cube"></i></span>
                <span style="font-size: 0.9rem; color: var(--text-secondary);"><?= I18n::t('landing.attr_pill') ?></span>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="cf-platform-container" id="faq" style="padding: 40px 24px 100px;">
        <div style="text-align: center; max-width: 600px; margin: 0 auto 40px;">
            <h2 style="font-size: 2.25rem; margin-bottom: 12px;"><?= I18n::t('landing.faq_title') ?></h2>
            <p style="color: var(--text-secondary);"><?= I18n::t('landing.faq_subtitle') ?></p>
        </div>

        <div style="max-width: 760px; margin: 0 auto; display: flex; flex-direction: column; gap: 14px; text-align:<?= $isRtl ? 'right' : 'left' ?>;">
            <details class="cf-ui-card" style="padding: 20px 24px; cursor: pointer;" open>
                <summary style="font-weight: 700; font-size: 1.05rem; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                    <?= I18n::t('landing.faq_q1') ?>
                    <i class="fa-solid fa-chevron-down" style="font-size:0.8rem;color:var(--text-muted);"></i>
                </summary>
                <p style="margin-top: 12px; color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7;">
                    <?= I18n::t('landing.faq_a1') ?>
                </p>
            </details>

            <details class="cf-ui-card" style="padding: 20px 24px; cursor: pointer;">
                <summary style="font-weight: 700; font-size: 1.05rem; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                    <?= I18n::t('landing.faq_q2') ?>
                    <i class="fa-solid fa-chevron-down" style="font-size:0.8rem;color:var(--text-muted);"></i>
                </summary>
                <p style="margin-top: 12px; color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7;">
                    <?= I18n::t('landing.faq_a2') ?>
                </p>
            </details>

            <details class="cf-ui-card" style="padding: 20px 24px; cursor: pointer;">
                <summary style="font-weight: 700; font-size: 1.05rem; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                    <?= I18n::t('landing.faq_q3') ?>
                    <i class="fa-solid fa-chevron-down" style="font-size:0.8rem;color:var(--text-muted);"></i>
                </summary>
                <p style="margin-top: 12px; color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7;">
                    <?= I18n::t('landing.faq_a3') ?>
                </p>
            </details>

            <details class="cf-ui-card" style="padding: 20px 24px; cursor: pointer;">
                <summary style="font-weight: 700; font-size: 1.05rem; list-style: none; display: flex; justify-content: space-between; align-items: center;">
                    <?= I18n::t('landing.faq_q4') ?>
                    <i class="fa-solid fa-chevron-down" style="font-size:0.8rem;color:var(--text-muted);"></i>
                </summary>
                <p style="margin-top: 12px; color: var(--text-secondary); font-size: 0.95rem; line-height: 1.7;">
                    <?= I18n::t('landing.faq_a4') ?>
                </p>
            </details>
        </div>
    </section>

    <!-- Call to Action Banner -->
    <section class="cf-platform-container" style="padding-bottom: 100px;">
        <div class="cf-ui-card" style="text-align: center; padding: 64px 32px; background: linear-gradient(135deg, #131b2e, #0f172a); border-color: rgba(59, 130, 246, 0.3);">
            <h2 style="font-size: 2.5rem; letter-spacing: -0.02em; margin-bottom: 14px;">
                <?= I18n::t('landing.cta_title') ?>
            </h2>
            <p style="color: var(--text-secondary); font-size: 1.15rem; max-width: 640px; margin: 0 auto 32px; line-height: 1.7;">
                <?= I18n::t('landing.cta_subtitle') ?>
            </p>
            <a href="<?= SITE_URL ?>/register.php" class="cf-ui-btn cf-ui-btn-primary cf-ui-btn-lg">
                <i class="fa-solid fa-rocket"></i> <?= I18n::t('landing.cta_btn') ?>
            </a>
        </div>
    </section>

    <!-- Platform Footer -->
    <footer style="border-top: 1px solid var(--border-subtle); padding: 48px 0; background: var(--bg-surface);">
        <div class="cf-platform-container" style="display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:20px;">
            <div style="display:flex;align-items:center;gap:10px;">
                <span class="cf-brand-logo-icon" style="width:28px;height:28px;font-size:0.85rem;"><i class="fa-solid fa-layer-group"></i></span>
                <span style="font-weight:700;font-size:1.1rem;">AI Portfolio Builder</span>
                <span style="color:var(--text-muted);font-size:0.85rem;">&copy; <?= date('Y') ?> <?= I18n::t('landing.footer_copyright') ?></span>
            </div>
            <div style="display:flex;gap:24px;font-size:0.9rem;">
                <a href="<?= SITE_URL ?>/templates.php" style="color:var(--text-secondary);"><?= I18n::t('nav.templates') ?></a>
                <a href="#features" style="color:var(--text-secondary);"><?= I18n::t('landing.nav_features') ?></a>
                <a href="<?= SITE_URL ?>/login.php" style="color:var(--text-secondary);"><?= I18n::t('auth.login_title') ?></a>
                <a href="<?= SITE_URL ?>/register.php" style="color:var(--text-secondary);"><?= I18n::t('auth.register_title') ?></a>
            </div>
        </div>
    </footer>

</body>
</html>
