<?php
/**
 * API: تسجيل مستخدم جديد
 */
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../includes/functions.php';

use App\Core\Security;
use App\Core\Auth;

$isJson = (isset($_SERVER['HTTP_ACCEPT']) && str_contains($_SERVER['HTTP_ACCEPT'], 'application/json')) ||
          (isset($_SERVER['CONTENT_TYPE']) && str_contains($_SERVER['CONTENT_TYPE'], 'application/json'));

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    if ($isJson) {
        jsonResponse(['success' => false, 'message' => 'Method not allowed'], 405);
    }
    redirect(SITE_URL . '/register.php');
}

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;

$csrfToken = $input['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? null;
if (!Security::verifyCsrf($csrfToken)) {
    if ($isJson) {
        jsonResponse(['success' => false, 'message' => 'رمز الحماية غير صالح'], 403);
    }
    redirect(SITE_URL . '/register.php', 'رمز الحماية غير صالح، يرجى إعادة المحاولة', 'danger');
}

$username = trim($input['username'] ?? '');
$email    = trim($input['email'] ?? '');
$password = $input['password'] ?? '';
$confirm  = $input['confirm_password'] ?? '';

// Validation
if (empty($username) || empty($email) || empty($password)) {
    if ($isJson) jsonResponse(['success' => false, 'message' => 'يرجى ملء جميع الحقول'], 400);
    redirect(SITE_URL . '/register.php', 'يرجى ملء جميع الحقول', 'danger');
}

if (!preg_match('/^[a-zA-Z0-9_\-]+$/', $username)) {
    if ($isJson) jsonResponse(['success' => false, 'message' => 'اسم المستخدم يسمح فقط بالحروف الإنجليزية والأرقام والشرطات'], 400);
    redirect(SITE_URL . '/register.php', 'اسم المستخدم يسمح فقط بالحروف الإنجليزية والأرقام والشرطات', 'danger');
}

if ($password !== $confirm) {
    if ($isJson) jsonResponse(['success' => false, 'message' => 'كلمة المرور غير متطابقة'], 400);
    redirect(SITE_URL . '/register.php', 'كلمة المرور غير متطابقة', 'danger');
}

$result = Auth::register($username, $email, $password);

if ($result['success']) {
    if ($isJson) jsonResponse(['success' => true, 'message' => 'تم إنشاء حسابك بنجاح! مرحبًا بك 🎉']);
    redirect(SITE_URL . '/dashboard.php', 'تم إنشاء حسابك بنجاح! مرحبًا بك 🎉', 'success');
} else {
    if ($isJson) jsonResponse(['success' => false, 'message' => $result['message']], 400);
    redirect(SITE_URL . '/register.php', $result['message'], 'danger');
}
