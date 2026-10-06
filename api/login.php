<?php
/**
 * API: تسجيل دخول المستخدم
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
    redirect(SITE_URL . '/login.php');
}

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;

$csrfToken = $input['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? null;
if (!Security::verifyCsrf($csrfToken)) {
    if ($isJson) {
        jsonResponse(['success' => false, 'message' => 'رمز الحماية غير صالح'], 403);
    }
    redirect(SITE_URL . '/login.php', 'رمز الحماية غير صالح، يرجى إعادة المحاولة', 'danger');
}

$email    = trim($input['email'] ?? '');
$password = $input['password'] ?? '';

if (empty($email) || empty($password)) {
    if ($isJson) {
        jsonResponse(['success' => false, 'message' => 'يرجى ملء جميع الحقول'], 400);
    }
    redirect(SITE_URL . '/login.php', 'يرجى ملء جميع الحقول', 'danger');
}

$result = Auth::login($email, $password);

if ($result['success']) {
    if ($isJson) {
        jsonResponse(['success' => true, 'message' => 'تم تسجيل الدخول بنجاح!']);
    }
    redirect(SITE_URL . '/dashboard.php', 'تم تسجيل الدخول بنجاح!', 'success');
} else {
    if ($isJson) {
        jsonResponse(['success' => false, 'message' => $result['message']], 401);
    }
    redirect(SITE_URL . '/login.php', $result['message'], 'danger');
}
