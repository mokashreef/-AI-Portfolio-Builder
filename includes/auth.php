<?php
/**
 * AI Portfolio Builder - Authentication Functions
 * Unified bridge with App\Core\Auth for production security.
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Core/Auth.php';

use App\Core\Auth;
use App\Core\Security;

/**
 * تسجيل مستخدم جديد
 */
function registerUser(string $username, string $email, string $password): array {
    return Auth::register($username, $email, $password);
}

/**
 * تسجيل دخول
 */
function loginUser(string $email, string $password): array {
    $res = Auth::login($email, $password);
    if ($res['success']) {
        return ['success' => true, 'user_id' => $res['user']['id']];
    }
    return ['success' => false, 'message' => $res['message']];
}

/**
 * تسجيل خروج
 */
function logoutUser(): void {
    Auth::logout();
}

/**
 * حماية الصفحة - يجب تسجيل الدخول
 */
function requireLogin(): void {
    if (!isLoggedIn()) {
        redirect(SITE_URL . '/login.php', 'يجب تسجيل الدخول أولاً', 'warning');
    }
}

/**
 * إنشاء توكن إعادة تعيين كلمة المرور
 */
function createPasswordResetToken(string $email): array {
    $db = getDB();

    // البحث عن المستخدم
    $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user) {
        return ['success' => false, 'message' => 'لا يوجد حساب مرتبط بهذا البريد الإلكتروني'];
    }

    // حذف التوكنات السابقة لنفس المستخدم
    $db->prepare("DELETE FROM password_resets WHERE user_id = ?")->execute([$user['id']]);

    // توليد توكن عشوائي آمن
    $token = bin2hex(random_bytes(32));
    $expiresAt = date('Y-m-d H:i:s', strtotime('+1 hour'));

    $stmt = $db->prepare("INSERT INTO password_resets (user_id, token, expires_at) VALUES (?, ?, ?)");
    $stmt->execute([$user['id'], $token, $expiresAt]);

    return ['success' => true, 'token' => $token, 'user_id' => $user['id']];
}

/**
 * التحقق من صلاحية توكن إعادة التعيين
 */
function validateResetToken(string $token): ?array {
    $db = getDB();
    $now = date('Y-m-d H:i:s');
    $stmt = $db->prepare("
        SELECT pr.*, u.email, u.username 
        FROM password_resets pr 
        JOIN users u ON pr.user_id = u.id 
        WHERE pr.token = ? AND pr.used = 0 AND pr.expires_at > ?
    ");
    $stmt->execute([$token, $now]);
    return $stmt->fetch() ?: null;
}

/**
 * إعادة تعيين كلمة المرور
 */
function resetPassword(string $token, string $newPassword): array {
    $tokenData = validateResetToken($token);

    if (!$tokenData) {
        return ['success' => false, 'message' => 'رابط إعادة التعيين غير صالح أو منتهي الصلاحية'];
    }

    $db = getDB();
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // تحديث كلمة المرور
    $stmt = $db->prepare("UPDATE users SET password = ? WHERE id = ?");
    $stmt->execute([$hashedPassword, $tokenData['user_id']]);

    // تعليم التوكن كمُستخدم
    $stmt = $db->prepare("UPDATE password_resets SET used = 1 WHERE token = ?");
    $stmt->execute([$token]);

    return ['success' => true, 'message' => 'تم تغيير كلمة المرور بنجاح'];
}
