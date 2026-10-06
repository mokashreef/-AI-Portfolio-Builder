<?php
/**
 * API: إعادة تعيين كلمة المرور
 */
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

use App\Core\Security;

$isJson = (isset($_SERVER['HTTP_ACCEPT']) && str_contains($_SERVER['HTTP_ACCEPT'], 'application/json')) ||
          (isset($_SERVER['CONTENT_TYPE']) && str_contains($_SERVER['CONTENT_TYPE'], 'application/json'));

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    if ($isJson) jsonResponse(['success' => false, 'message' => 'Method not allowed'], 405);
    redirect(SITE_URL . '/login.php');
}

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;

$csrfToken = $input['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? null;
if (!Security::verifyCsrf($csrfToken)) {
    if ($isJson) jsonResponse(['success' => false, 'message' => 'رمز الحماية غير صالح'], 403);
    redirect(SITE_URL . '/login.php', 'رمز الحماية غير صالح', 'danger');
}

$token           = trim($input['token'] ?? '');
$password        = $input['password'] ?? '';
$confirmPassword = $input['confirm_password'] ?? '';

// التحقق من الحقول
if (empty($token) || empty($password) || empty($confirmPassword)) {
    if ($isJson) jsonResponse(['success' => false, 'message' => 'يرجى ملء جميع الحقول'], 400);
    redirect(SITE_URL . '/reset-password.php?token=' . urlencode($token), 'يرجى ملء جميع الحقول', 'danger');
}

if ($password !== $confirmPassword) {
    if ($isJson) jsonResponse(['success' => false, 'message' => 'كلمة المرور غير متطابقة'], 400);
    redirect(SITE_URL . '/reset-password.php?token=' . urlencode($token), 'كلمة المرور غير متطابقة', 'danger');
}

if (strlen($password) < 6) {
    if ($isJson) jsonResponse(['success' => false, 'message' => 'كلمة المرور يجب أن تكون 6 أحرف على الأقل'], 400);
    redirect(SITE_URL . '/reset-password.php?token=' . urlencode($token), 'كلمة المرور يجب أن تكون 6 أحرف على الأقل', 'danger');
}

$result = resetPassword($token, $password);

if ($result['success']) {
    if ($isJson) jsonResponse(['success' => true, 'message' => 'تم تغيير كلمة المرور بنجاح!']);
    redirect(SITE_URL . '/login.php', 'تم تغيير كلمة المرور بنجاح! يمكنك الآن تسجيل الدخول بكلمة المرور الجديدة.', 'success');
} else {
    if ($isJson) jsonResponse(['success' => false, 'message' => $result['message']], 400);
    redirect(SITE_URL . '/forgot-password.php', $result['message'], 'danger');
}
