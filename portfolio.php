<?php
/**
 * Portfolio Display Page - عرض الـ Portfolio المنشور
 */
$pageTitle = 'Portfolio';
require_once 'config/database.php';
require_once 'includes/functions.php';
require_once 'includes/auth.php';

$slug = clean($_GET['slug'] ?? '');
$id   = intval($_GET['id'] ?? 0);

$db = getDB();

if ($slug) {
    $stmt = $db->prepare("SELECT * FROM portfolios WHERE slug = ? AND is_published = 1");
    $stmt->execute([$slug]);
} elseif ($id > 0) {
    $stmt = $db->prepare("SELECT * FROM portfolios WHERE id = ?");
    $stmt->execute([$id]);
} else {
    header("Location: index.php");
    exit;
}

$portfolio = $stmt->fetch();
if (!$portfolio) {
    http_response_code(404);
    $pageTitle = 'Portfolio غير موجود';
    require_once 'includes/header.php';
    echo '<section class="section" style="min-height:80vh;display:flex;align-items:center;justify-content:center;padding-top:100px;">
        <div style="text-align:center;">
            <div style="font-size:4rem;margin-bottom:1rem;">😕</div>
            <h1 style="font-size:2rem;margin-bottom:0.5rem;">Portfolio غير موجود</h1>
            <p style="color:var(--text-secondary);margin-bottom:2rem;">الرابط الذي تبحث عنه غير موجود أو تم حذفه</p>
            <a href="index.php" class="btn btn-primary">العودة للرئيسية</a>
        </div>
    </section>';
    require_once 'includes/footer.php';
    exit;
}

// Get skills
$stmt = $db->prepare("SELECT * FROM skills WHERE portfolio_id = ?");
$stmt->execute([$portfolio['id']]);
$skills = $stmt->fetchAll();

// Get projects
$stmt = $db->prepare("SELECT * FROM projects WHERE portfolio_id = ? ORDER BY sort_order");
$stmt->execute([$portfolio['id']]);
$projects = $stmt->fetchAll();

// Choose template
$template = $portfolio['template'] ?? 'modern';
$templateFile = __DIR__ . "/templates/{$template}/template.php";

if (!file_exists($templateFile)) {
    $templateFile = __DIR__ . "/templates/modern/template.php";
}

// Render template
include $templateFile;
