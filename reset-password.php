<?php
/**
 * AI Portfolio Builder - Reset Password
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

$token = trim($_GET['token'] ?? '');
$db = getDB();

$now = date('Y-m-d H:i:s');
$stmt = $db->prepare("
    SELECT pr.*, u.email, u.username 
    FROM password_resets pr 
    JOIN users u ON pr.user_id = u.id 
    WHERE pr.token = ? AND pr.used = 0 AND pr.expires_at > ?
");
$stmt->execute([$token, $now]);
$tokenData = $stmt->fetch();

$error = '';
$success = '';

if (!$tokenData) {
    $error = I18n::t('auth.err_invalid_token');
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!Security::verifyCsrf()) {
        $error = I18n::t('auth.err_invalid_csrf');
    } else {
        $password = $_POST['password'] ?? '';
        $confirm = $_POST['confirm_password'] ?? '';

        if (strlen($password) < 6) {
            $error = I18n::t('auth.err_password_short');
        } elseif ($password !== $confirm) {
            $error = I18n::t('auth.err_passwords_mismatch');
        } else {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $db->prepare("UPDATE users SET password = ? WHERE id = ?")->execute([$hash, $tokenData['user_id']]);
            $db->prepare("UPDATE password_resets SET used = 1 WHERE token = ?")->execute([$token]);
            $success = I18n::t('auth.msg_reset_success');
        }
    }
}

$lang = I18n::locale();
$isRtl = I18n::isRtl();
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= I18n::dir() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= I18n::t('auth.reset_title') ?> | AI Portfolio Builder</title>
    
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
    <a href="?token=<?= urlencode($token) ?>&lang=<?= $targetLang ?>" class="lang-float-toggle" title="Switch Language">
        <i class="fa-solid fa-globe"></i> <?= $targetLabel ?>
    </a>

    <div class="cf-ui-card" style="width:100%;max-width:440px;padding:36px 32px;box-shadow:var(--shadow-xl);border-color:var(--border-strong);">
        
        <div style="text-align:center;margin-bottom:28px;">
            <a href="<?= SITE_URL ?>/" style="display:inline-flex;align-items:center;gap:10px;text-decoration:none;margin-bottom:16px;">
                <span class="cf-brand-logo-icon" style="width:40px;height:40px;font-size:1.25rem;"><i class="fa-solid fa-layer-group"></i></span>
                <span style="font-size:1.5rem;font-weight:800;color:#fff;">AI Portfolio Builder</span>
            </a>
            <h1 style="font-size:1.5rem;margin-bottom:6px;"><?= I18n::t('auth.reset_title') ?></h1>
            <?php if ($tokenData): ?>
            <p style="color:var(--text-secondary);font-size:0.9rem;"><?= $isRtl ? 'حساب: ' : 'Account: ' ?><?= htmlspecialchars($tokenData['username']) ?></p>
            <?php endif; ?>
        </div>

        <?php if ($error): ?>
            <div style="padding:12px 16px;background:rgba(239,68,68,0.15);border:1px solid rgba(239,68,68,0.3);border-radius:var(--radius-sm);color:#fca5a5;font-size:0.85rem;margin-bottom:20px;">
                <?= htmlspecialchars($error) ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div style="padding:12px 16px;background:rgba(16,185,129,0.15);border:1px solid rgba(16,185,129,0.3);border-radius:var(--radius-sm);color:#6ee7b7;font-size:0.85rem;margin-bottom:20px;">
                <?= htmlspecialchars($success) ?>
            </div>
            <a href="<?= SITE_URL ?>/login.php" class="cf-ui-btn cf-ui-btn-primary" style="width:100%;">
                <?= I18n::t('auth.login_now') ?> <i class="fa-solid fa-arrow-<?= $isRtl ? 'left' : 'right' ?>"></i>
            </a>
        <?php elseif ($tokenData): ?>
            <form method="POST" action="">
                <?= Security::csrfInput() ?>
                <div class="cf-ui-form-group">
                    <label class="cf-ui-label" for="password"><?= I18n::t('auth.new_password_label') ?></label>
                    <input type="password" id="password" name="password" class="cf-ui-input" placeholder="••••••••" required minlength="6" autofocus>
                </div>

                <div class="cf-ui-form-group">
                    <label class="cf-ui-label" for="confirm_password"><?= I18n::t('auth.confirm_password_label') ?></label>
                    <input type="password" id="confirm_password" name="confirm_password" class="cf-ui-input" placeholder="••••••••" required minlength="6">
                </div>

                <button type="submit" class="cf-ui-btn cf-ui-btn-primary" style="width:100%;margin-top:10px;padding:12px;">
                    <?= I18n::t('auth.btn_reset_password') ?> <i class="fa-solid fa-check"></i>
                </button>
            </form>
        <?php endif; ?>

    </div>

</body>
</html>
