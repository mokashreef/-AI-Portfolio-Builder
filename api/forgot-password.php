<?php
/**
 * API: طلب إعادة تعيين كلمة المرور
 */
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

use App\Core\Security;

$isJson = (isset($_SERVER['HTTP_ACCEPT']) && str_contains($_SERVER['HTTP_ACCEPT'], 'application/json')) ||
          (isset($_SERVER['CONTENT_TYPE']) && str_contains($_SERVER['CONTENT_TYPE'], 'application/json'));

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    if ($isJson) jsonResponse(['success' => false, 'message' => 'Method not allowed'], 405);
    redirect(SITE_URL . '/forgot-password.php');
}

$input = json_decode(file_get_contents('php://input'), true) ?: $_POST;

$csrfToken = $input['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? null;
if (!Security::verifyCsrf($csrfToken)) {
    if ($isJson) jsonResponse(['success' => false, 'message' => 'رمز الحماية غير صالح'], 403);
    redirect(SITE_URL . '/forgot-password.php', 'رمز الحماية غير صالح، يرجى إعادة المحاولة', 'danger');
}

$email = trim($input['email'] ?? '');

if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if ($isJson) jsonResponse(['success' => false, 'message' => 'يرجى إدخال بريد إلكتروني صالح'], 400);
    redirect(SITE_URL . '/forgot-password.php', 'يرجى إدخال بريد إلكتروني صالح', 'danger');
}

$result = createPasswordResetToken($email);

// Generic security response: Avoid user enumeration in production
if (!$result['success']) {
    // If local debug, notify
    if (env('APP_DEBUG', false)) {
        redirect(SITE_URL . '/forgot-password.php', $result['message'], 'danger');
    } else {
        redirect(SITE_URL . '/forgot-password.php', 'إذا كان البريد الإلكتروني مسجلاً، فقد تم إرسال رابط إعادة التعيين.', 'success');
    }
}

$token = $result['token'];
$resetLink = SITE_URL . '/reset-password.php?token=' . urlencode($token);

$subject = '=?UTF-8?B?' . base64_encode('إعادة تعيين كلمة المرور - ' . SITE_NAME) . '?=';
$message = "
<html dir='rtl'>
<body style='font-family: Cairo, Arial, sans-serif; background: #0a0a0f; color: #e0e0e0; padding: 30px;'>
    <div style='max-width: 500px; margin: 0 auto; background: #12121a; border-radius: 16px; padding: 40px; border: 1px solid rgba(255,255,255,0.06);'>
        <h2 style='text-align: center; color: #a78bfa; margin-bottom: 20px;'>🔐 إعادة تعيين كلمة المرور</h2>
        <p style='line-height: 1.8; color: #b0b0b0;'>مرحبًا،</p>
        <p style='line-height: 1.8; color: #b0b0b0;'>لقد طلبت إعادة تعيين كلمة المرور الخاصة بك. اضغط على الزر أدناه لإنشاء كلمة مرور جديدة:</p>
        <div style='text-align: center; margin: 30px 0;'>
            <a href='{$resetLink}' style='display: inline-block; background: linear-gradient(135deg, #6c63ff, #a78bfa); color: white; padding: 14px 40px; border-radius: 12px; text-decoration: none; font-weight: 700; font-size: 16px;'>
                إعادة تعيين كلمة المرور
            </a>
        </div>
        <p style='line-height: 1.8; color: #888; font-size: 14px;'>⏰ هذا الرابط صالح لمدة <strong>ساعة واحدة</strong> فقط.</p>
        <p style='line-height: 1.8; color: #888; font-size: 14px;'>إذا لم تطلب إعادة التعيين، يمكنك تجاهل هذا البريد.</p>
        <hr style='border: none; border-top: 1px solid rgba(255,255,255,0.06); margin: 25px 0;'>
        <p style='text-align: center; color: #666; font-size: 12px;'>" . htmlspecialchars(SITE_NAME) . "</p>
    </div>
</body>
</html>
";

$host = parse_url(SITE_URL, PHP_URL_HOST) ?: 'localhost';
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";
$headers .= "From: " . SITE_NAME . " <noreply@" . $host . ">\r\n";

$emailSent = @mail($email, $subject, $message, $headers);

$isLocal = (strpos($host, 'localhost') !== false || strpos($host, '127.0.0.1') !== false || env('APP_DEBUG', false));

if ($emailSent) {
    if ($isJson) jsonResponse(['success' => true, 'message' => 'تم إرسال رابط إعادة التعيين إلى بريدك الإلكتروني.']);
    redirect(SITE_URL . '/forgot-password.php', 'تم إرسال رابط إعادة التعيين إلى بريدك الإلكتروني. تحقق من صندوق الوارد.', 'success');
} else {
    // Only in local development environment show direct link for testing
    if ($isLocal) {
        $_SESSION['reset_link'] = $resetLink;
        redirect(SITE_URL . '/forgot-password.php', 'تعذر إرسال البريد (بيئة محلية). تم إنشاء الرابط محلياً:', 'warning');
    } else {
        error_log("Failed to send password reset email to: " . $email);
        redirect(SITE_URL . '/forgot-password.php', 'إذا كان البريد الإلكتروني مسجلاً، فقد تم إرسال رابط إعادة التعيين.', 'success');
    }
}
