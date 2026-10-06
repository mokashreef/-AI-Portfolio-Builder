<?php
/**
 * API: حفظ بيانات Portfolio
 */
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../includes/functions.php';

use App\Core\Security;
use App\Core\Auth;

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    jsonResponse(['success' => false, 'message' => 'Method not allowed'], 405);
}

if (!Auth::check()) {
    jsonResponse(['success' => false, 'message' => 'يجب تسجيل الدخول أولاً'], 401);
}

if (!Security::verifyCsrf()) {
    jsonResponse(['success' => false, 'message' => 'رمز الحماية غير صالح'], 403);
}

$input = $_POST;
$userId = Auth::id();

$fullName = clean($input['full_name'] ?? '');
$title    = clean($input['title'] ?? '');
$bio      = clean($input['bio'] ?? '');
$template = clean($input['template'] ?? 'modern');
$github   = clean($input['github'] ?? '');
$linkedin = clean($input['linkedin'] ?? '');
$twitter  = clean($input['twitter'] ?? '');
$website  = clean($input['website'] ?? '');
$emailContact = clean($input['email_contact'] ?? '');

$customUsername = clean($input['custom_username'] ?? '');
$customDomain   = clean($input['custom_domain'] ?? '');
if ($customDomain === '') {
    $customDomain = null;
}
$language       = clean($input['language'] ?? 'ar');
$primaryColor   = clean($input['primary_color'] ?? '#6c63ff');
$secondaryColor = clean($input['secondary_color'] ?? '#a78bfa');
$fontFamily     = clean($input['font_family'] ?? 'Inter');

$skills   = isset($input['skills']) ? json_decode($input['skills'], true) : [];
$projects = isset($input['projects']) ? json_decode($input['projects'], true) : [];
$portfolioId = intval($input['portfolio_id'] ?? 0);

if (empty($fullName) || empty($customUsername)) {
    jsonResponse(['success' => false, 'message' => 'الاسم واسم المستخدم مطلوبان'], 400);
}

// Validate username slug
$slugChk = Security::validateSlug($customUsername);
if (!$slugChk['valid']) {
    jsonResponse(['success' => false, 'message' => $slugChk['error']], 400);
}

$db = getDB();

// IDOR Check if updating existing portfolio
if ($portfolioId > 0) {
    $stmtOwner = $db->prepare("SELECT user_id FROM portfolios WHERE id = ?");
    $stmtOwner->execute([$portfolioId]);
    $existingSite = $stmtOwner->fetch();
    if (!$existingSite) {
        jsonResponse(['success' => false, 'message' => 'الملف الشخصي غير موجود'], 404);
    }
    if ((int)$existingSite['user_id'] !== $userId && !Auth::isAdmin()) {
        jsonResponse(['success' => false, 'message' => 'غير مصرح لك بتعديل هذا الملف الشخصي'], 403);
    }
}

// Check username duplication
$stmt = $db->prepare("SELECT id FROM portfolios WHERE username = ? AND id != ?");
$stmt->execute([$customUsername, $portfolioId]);
if ($stmt->fetch()) {
    jsonResponse(['success' => false, 'message' => 'اسم المستخدم مستخدم بالفعل، الرجاء اختيار اسم آخر'], 400);
}

// Check custom domain duplication
if (!empty($customDomain)) {
    $stmt = $db->prepare("SELECT id FROM portfolios WHERE custom_domain = ? AND id != ?");
    $stmt->execute([$customDomain, $portfolioId]);
    if ($stmt->fetch()) {
         jsonResponse(['success' => false, 'message' => 'الدومين مسجل مسبقاً، تواصل مع الدعم'], 400);
    }
}

// Secure Profile Image Upload
$profileImage = '';
if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = __DIR__ . '/../assets/uploads/profiles/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $tmp = $_FILES['profile_image']['tmp_name'];
    $origName = basename($_FILES['profile_image']['name']);
    $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
    $allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'gif'];

    if (in_array($ext, $allowedExts, true) && $_FILES['profile_image']['size'] <= 5 * 1024 * 1024) {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $tmp);
        finfo_close($finfo);

        $allowedMimes = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
        if (in_array($mime, $allowedMimes, true) && @getimagesize($tmp)) {
            $newFileName = 'profile_' . bin2hex(random_bytes(10)) . '.' . $ext;
            if (move_uploaded_file($tmp, $uploadDir . $newFileName)) {
                $profileImage = 'assets/uploads/profiles/' . $newFileName;
            }
        }
    }
} else if ($portfolioId > 0) {
    $stmt = $db->prepare("SELECT profile_image FROM portfolios WHERE id = ?");
    $stmt->execute([$portfolioId]);
    $oldRow = $stmt->fetch();
    $profileImage = $oldRow['profile_image'] ?? '';
}

try {
    $db->beginTransaction();

    if ($portfolioId > 0) {
        $stmt = $db->prepare("UPDATE portfolios SET full_name=?, title=?, bio=?, template=?, github=?, linkedin=?, twitter=?, website=?, email_contact=?, username=?, custom_domain=?, language=?, primary_color=?, secondary_color=?, font_family=?, profile_image=?, updated_at=CURRENT_TIMESTAMP WHERE id=? AND (user_id=? OR ?=1)");
        $stmt->execute([$fullName, $title, $bio, $template, $github, $linkedin, $twitter, $website, $emailContact, $customUsername, $customDomain, $language, $primaryColor, $secondaryColor, $fontFamily, $profileImage, $portfolioId, $userId, Auth::isAdmin() ? 1 : 0]);

        $db->prepare("DELETE FROM skills WHERE portfolio_id=?")->execute([$portfolioId]);
        $db->prepare("DELETE FROM projects WHERE portfolio_id=?")->execute([$portfolioId]);
    } else {
        $slug = $customUsername;
        $stmt = $db->prepare("INSERT INTO portfolios (user_id, slug, username, full_name, title, bio, template, github, linkedin, twitter, website, email_contact, custom_domain, language, primary_color, secondary_color, font_family, profile_image, is_published) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)");
        $stmt->execute([$userId, $slug, $customUsername, $fullName, $title, $bio, $template, $github, $linkedin, $twitter, $website, $emailContact, $customDomain, $language, $primaryColor, $secondaryColor, $fontFamily, $profileImage]);
        $portfolioId = (int)$db->lastInsertId();
    }

    if (!empty($skills) && is_array($skills)) {
        $stmtSkill = $db->prepare("INSERT INTO skills (portfolio_id, skill_name, skill_level) VALUES (?,?,?)");
        foreach ($skills as $skill) {
            $skillName = clean($skill['name'] ?? '');
            $skillLevel = intval($skill['level'] ?? 80);
            if (!empty($skillName)) {
                $stmtSkill->execute([$portfolioId, $skillName, $skillLevel]);
            }
        }
    }

    if (!empty($projects) && is_array($projects)) {
        $stmtProject = $db->prepare("INSERT INTO projects (portfolio_id, project_name, project_description, project_url, github_url, sort_order) VALUES (?,?,?,?,?,?)");
        foreach ($projects as $i => $project) {
            $pName = clean($project['name'] ?? '');
            $pDesc = clean($project['description'] ?? '');
            $pUrl  = clean($project['url'] ?? '');
            $pGithub = clean($project['github_url'] ?? '');
            if (!empty($pName)) {
                $stmtProject->execute([$portfolioId, $pName, $pDesc, $pUrl, $pGithub, $i]);
            }
        }
    }

    $db->commit();

    jsonResponse([
        'success' => true,
        'portfolio_id' => $portfolioId,
        'slug' => $customUsername,
        'url' => 'portfolio.php?slug=' . urlencode($customUsername),
        'message' => 'تم حفظ الـ Portfolio بنجاح!'
    ]);

} catch (Exception $e) {
    if ($db->inTransaction()) {
        $db->rollBack();
    }
    error_log("Save portfolio error: " . $e->getMessage());
    $msg = env('APP_DEBUG', false) ? $e->getMessage() : 'حدث خطأ أثناء حفظ البيانات، يرجى المحاولة لاحقاً';
    jsonResponse(['success' => false, 'message' => $msg], 500);
}
