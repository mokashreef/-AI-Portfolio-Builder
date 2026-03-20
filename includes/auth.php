<?php
/**
 * AI Portfolio Builder - Authentication Functions
 */

/**
 * تسجيل مستخدم جديد
 */
function registerUser(string $username, string $email, string $password): array {
    $db = getDB();

    // التحقق من عدم تكرار البريد أو اسم المستخدم
    $stmt = $db->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$email, $username]);
    if ($stmt->fetch()) {
        return ['success' => false, 'message' => 'البريد الإلكتروني أو اسم المستخدم مستخدم بالفعل'];
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$username, $email, $hashedPassword]);

    $userId = $db->lastInsertId();
    $_SESSION['user_id'] = $userId;

    return ['success' => true, 'user_id' => $userId];
}

/**
 * تسجيل دخول
 */
function loginUser(string $email, string $password): array {
    $db = getDB();
    $stmt = $db->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if (!$user || !password_verify($password, $user['password'])) {
        return ['success' => false, 'message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة'];
    }

    $_SESSION['user_id'] = $user['id'];
    return ['success' => true, 'user_id' => $user['id']];
}

/**
 * تسجيل خروج
 */
function logoutUser(): void {
    session_destroy();
}

/**
 * حماية الصفحة - يجب تسجيل الدخول
 */
function requireLogin(): void {
    if (!isLoggedIn()) {
        redirect(SITE_URL . '/login.php', 'يجب تسجيل الدخول أولاً', 'warning');
    }
}
