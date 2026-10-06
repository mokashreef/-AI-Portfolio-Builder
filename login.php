<?php
/**
 * AI Portfolio Builder - User Login
 * Bilingual: Arabic (RTL) & English (LTR)
 */

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Core/Security.php';
require_once __DIR__ . '/app/Core/Auth.php';
require_once __DIR__ . '/app/Core/I18n.php';

use App\Core\Security;
use App\Core\Auth;
use App\Core\I18n;

I18n::init();

if (Auth::check()) {
    header("Location: " . SITE_URL . "/dashboard.php");
    exit;
}

$error = '';
$flash = $_SESSION['flash'] ?? null;
unset($_SESSION['flash']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Security::verifyCsrf()) {
        $error = I18n::t('auth.err_invalid_csrf');
    } else {
        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($email) || empty($password)) {
            $error = I18n::t('auth.err_required_fields');
        } else {
            $res = Auth::login($email, $password);
            if ($res['success']) {
                $redirect = $_GET['redirect'] ?? '/dashboard.php';
                if (!is_string($redirect) || !str_starts_with($redirect, '/') || str_starts_with($redirect, '//') || str_contains($redirect, '\\') || str_contains($redirect, '://')) {
                    $redirect = '/dashboard.php';
                }
                header("Location: " . SITE_URL . $redirect);
                exit;
            } else {
                $error = $res['message'];
            }
        }
    }
}

$csrfToken = Security::csrfToken();
$isRtl = I18n::isRtl();
$lang = I18n::locale();
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= I18n::dir() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= I18n::t('auth.login_title') ?> | AI Portfolio Builder</title>
    
    <!-- Google Fonts & Font Awesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;600;700&family=Inter:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-public.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/craftfolio-builder.css">

    <?= I18n::exportScript() ?>

    <style>
        body {
            font-family: <?= $isRtl ? "'IBM Plex Sans Arabic', " : "" ?>'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 24px;
            background: #090d16;
            margin: 0;
        }
        .lang-float-toggle {
            position: absolute;
            top: 24px;
            <?= $isRtl ? 'left: 24px;' : 'right: 24px;' ?>
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            color: #cbd5e1;
            padding: 7px 14px;
            border-radius: 6px;
            font-size: 0.85rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s;
        }
        .lang-float-toggle:hover {
            color: #fff;
            background: rgba(255,255,255,0.12);
        }
    </style>
</head>
<body>

    <?php
    $targetLang = $lang === 'ar' ? 'en' : 'ar';
    $targetLabel = $lang === 'ar' ? 'English (LTR)' : 'العربية (RTL)';
    ?>
    <a href="?lang=<?= $targetLang ?>" class="lang-float-toggle" title="Switch Language">
        <i class="fa-solid fa-globe"></i> <?= $targetLabel ?>
    </a>

    <div class="cf-ui-card" style="width:100%;max-width:440px;padding:36px 32px;box-shadow:var(--shadow-xl);border-color:var(--border-strong);">
        
        <div style="text-align:center;margin-bottom:28px;">
            <a href="<?= SITE_URL ?>/" style="display:inline-flex;align-items:center;gap:10px;text-decoration:none;margin-bottom:16px;">
                <span class="cf-brand-logo-icon" style="width:40px;height:40px;font-size:1.25rem;"><i class="fa-solid fa-layer-group"></i></span>
                <span style="font-size:1.5rem;font-weight:800;color:#fff;">AI Portfolio Builder</span>
            </a>
            <h1 style="font-size:1.5rem;margin-bottom:6px;"><?= I18n::t('auth.login_title') ?></h1>
            <p style="color:var(--text-secondary);font-size:0.9rem;">
                <?= I18n::t('auth.login_subtitle') ?>
            </p>
        </div>

        <?php if ($flash): ?>
            <div style="padding:12px 16px;background:rgba(245,158,11,0.15);border:1px solid rgba(245,158,11,0.3);border-radius:var(--radius-sm);color:#fcd34d;font-size:0.85rem;margin-bottom:20px;">
                <?= htmlspecialchars($flash['message']) ?>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div style="padding:12px 16px;background:rgba(239,68,68,0.15);border:1px solid rgba(239,68,68,0.3);border-radius:var(--radius-sm);color:#fca5a5;font-size:0.85rem;margin-bottom:20px;">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <?= Security::csrfInput() ?>

            <div class="cf-ui-form-group">
                <label class="cf-ui-label" for="email"><?= I18n::t('auth.email_label') ?></label>
                <input type="text" id="email" name="email" class="cf-ui-input" placeholder="<?= I18n::t('auth.email_ph') ?>" required autofocus>
            </div>

            <div class="cf-ui-form-group">
                <div style="display:flex;justify-content:space-between;align-items:center;">
                    <label class="cf-ui-label" for="password"><?= I18n::t('auth.password_label') ?></label>
                    <a href="<?= SITE_URL ?>/forgot-password.php" style="font-size:0.75rem;color:var(--text-muted);"><?= I18n::t('auth.forgot_password') ?></a>
                </div>
                <input type="password" id="password" name="password" class="cf-ui-input" placeholder="<?= I18n::t('auth.password_ph') ?>" required>
            </div>

            <button type="submit" class="cf-ui-btn cf-ui-btn-primary" style="width:100%;margin-top:10px;padding:12px;">
                <?= I18n::t('auth.btn_login') ?> <i class="fa-solid fa-arrow-<?= $isRtl ? 'left' : 'right' ?>"></i>
            </button>
        </form>

        <div style="text-align:center;margin-top:24px;padding-top:20px;border-top:1px solid var(--border-subtle);font-size:0.85rem;color:var(--text-secondary);">
            <?= I18n::t('auth.no_account') ?> 
            <a href="<?= SITE_URL ?>/register.php" style="color:var(--primary);font-weight:600;">
                <?= I18n::t('auth.sign_up_now') ?>
            </a>
        </div>
    </div>

</body>
</html>
