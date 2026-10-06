<?php
/**
 * AI Portfolio Builder - 404 Not Found Error Page
 * Bilingual: Arabic (RTL) & English (LTR)
 */
if (!http_response_code() || http_response_code() === 200) {
    http_response_code(404);
}

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Core/I18n.php';

use App\Core\I18n;

I18n::init();

$siteUrl = defined('SITE_URL') ? \SITE_URL : '';
$lang = I18n::locale();
$isRtl = I18n::isRtl();
?>
<!DOCTYPE html>
<html lang="<?= $lang ?>" dir="<?= I18n::dir() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= I18n::t('error.404_title') ?> | AI Portfolio Builder</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+Arabic:wght@400;600;700&family=Inter:wght@400;600;700&family=Plus+Jakarta+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?= $siteUrl ?>/assets/css/craftfolio-builder.css">
    <style>
        body {
            background-color: #0b0f19;
            color: #f8fafc;
            font-family: <?= $isRtl ? "'IBM Plex Sans Arabic', " : "" ?>'Inter', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            margin: 0;
            padding: 24px;
            box-sizing: border-box;
        }
        .error-card {
            background: #111827;
            border: 1px solid #1f2937;
            border-radius: 16px;
            padding: 48px 36px;
            max-width: 520px;
            width: 100%;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .error-badge {
            display: inline-block;
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.2);
            padding: 4px 14px;
            border-radius: 9999px;
            font-size: 0.85rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .error-code {
            font-size: 4.5rem;
            font-weight: 800;
            line-height: 1;
            margin: 0 0 16px 0;
            background: linear-gradient(135deg, #f8fafc 0%, #94a3b8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .error-title {
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 12px;
            color: #f1f5f9;
        }
        .error-desc {
            color: #94a3b8;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 32px;
        }
        .error-actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }
    </style>
</head>
<body>
    <div class="error-card">
        <div class="error-badge"><i class="fa-solid fa-triangle-exclamation"></i> <?= I18n::t('error.404_title') ?></div>
        <div class="error-code">404</div>
        <h1 class="error-title"><?= I18n::t('error.404_title') ?></h1>
        <p class="error-desc"><?= I18n::t('error.404_desc') ?></p>
        <div class="error-actions">
            <a href="<?= $siteUrl ?>/dashboard.php" class="cf-ui-btn cf-ui-btn-primary">
                <i class="fa-solid fa-gauge"></i> <?= I18n::t('error.btn_dashboard') ?>
            </a>
            <a href="<?= $siteUrl ?>/templates.php" class="cf-ui-btn cf-ui-btn-secondary">
                <i class="fa-solid fa-palette"></i> <?= I18n::t('nav.templates') ?>
            </a>
        </div>
    </div>
</body>
</html>
