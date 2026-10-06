<?php
/**
 * API: تحميل بيانات Portfolio
 */
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

header('Content-Type: application/json; charset=utf-8');

$portfolioId = intval($_GET['id'] ?? 0);

if ($portfolioId <= 0) {
    jsonResponse(['success' => false, 'message' => 'معرف غير صالح'], 400);
}

$db = getDB();

// Get portfolio
$stmt = $db->prepare("SELECT * FROM portfolios WHERE id = ?");
$stmt->execute([$portfolioId]);
$portfolio = $stmt->fetch();

if (!$portfolio) {
    jsonResponse(['success' => false, 'message' => 'Portfolio غير موجود'], 404);
}

$isOwner = (Auth::check() && ((int)$portfolio['user_id'] === Auth::id() || Auth::isAdmin()));
if (empty($portfolio['is_published']) && !$isOwner) {
    jsonResponse(['success' => false, 'message' => 'هذا الموقع غير منشور بعد'], 403);
}

// Get skills
$stmt = $db->prepare("SELECT skill_name, skill_level FROM skills WHERE portfolio_id = ?");
$stmt->execute([$portfolioId]);
$portfolio['skills'] = $stmt->fetchAll();

// Get projects
$stmt = $db->prepare("SELECT project_name, project_description, project_url, github_url FROM projects WHERE portfolio_id = ? ORDER BY sort_order");
$stmt->execute([$portfolioId]);
$portfolio['projects'] = $stmt->fetchAll();

jsonResponse(['success' => true, 'data' => $portfolio]);
