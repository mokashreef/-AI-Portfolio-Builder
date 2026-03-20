<?php
/**
 * Header Include - يتم تضمينه في أعلى كل صفحة
 */
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/functions.php';
require_once __DIR__ . '/auth.php';

$pageTitle = $pageTitle ?? SITE_NAME;
$pageDescription = $pageDescription ?? 'أنشئ موقع Portfolio شخصي احترافي في دقائق';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= clean($pageDescription) ?>">
    <title><?= clean($pageTitle) ?></title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Outfit:wght@400;500;600;700;800&family=Cairo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/style.css">
    <?php if (isset($extraCSS)): ?>
        <link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/<?= $extraCSS ?>">
    <?php endif; ?>
</head>
<body>
<?php include __DIR__ . '/navbar.php'; ?>

<?php
$flash = getFlash();
if ($flash): ?>
    <div class="container" style="padding-top: 100px;">
        <div class="flash flash-<?= $flash['type'] ?>">
            <i class="fas fa-<?= $flash['type'] === 'success' ? 'check-circle' : ($flash['type'] === 'danger' ? 'times-circle' : 'exclamation-triangle') ?>"></i>
            <?= clean($flash['message']) ?>
        </div>
    </div>
<?php endif; ?>
