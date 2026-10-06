<?php
namespace App\Core;

use PDO;

require_once __DIR__ . '/I18n.php';

/**
 * CraftFolio - Authentication Service
 */
class Auth {

    public static function check(): bool {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return !empty($_SESSION['user_id']);
    }

    public static function id(): ?int {
        return self::check() ? (int)$_SESSION['user_id'] : null;
    }

    public static function user(): ?array {
        if (!self::check()) {
            return null;
        }

        static $cachedUser = null;
        if ($cachedUser !== null && $cachedUser['id'] === $_SESSION['user_id']) {
            return $cachedUser;
        }

        $db = getDB();
        $stmt = $db->prepare("SELECT id, username, email, role, status, avatar, created_at FROM users WHERE id = ?");
        $stmt->execute([$_SESSION['user_id']]);
        $user = $stmt->fetch();

        if (!$user || $user['status'] === 'suspended') {
            self::logout();
            return null;
        }

        $cachedUser = $user;
        return $user;
    }

    public static function isAdmin(): bool {
        $user = self::user();
        if (!$user) {
            return false;
        }
        $adminUser = env('ADMIN_USERNAME', 'admin');
        return ($user['role'] === 'admin' || strtolower($user['username']) === strtolower($adminUser));
    }

    public static function requireAuth(string $redirect = '/login'): void {
        if (!self::check()) {
            if (isset($_SERVER['HTTP_ACCEPT']) && str_contains($_SERVER['HTTP_ACCEPT'], 'application/json')) {
                http_response_code(401);
                echo json_encode(['success' => false, 'message' => 'Unauthorized: Please log in']);
                exit;
            }
            $_SESSION['flash'] = ['message' => I18n::t('auth.msg_require_auth'), 'type' => 'warning'];
            header("Location: " . SITE_URL . $redirect);
            exit;
        }
    }

    public static function requireAdmin(): void {
        self::requireAuth();
        if (!self::isAdmin()) {
            http_response_code(403);
            die("<h1>403 Forbidden</h1><p>" . I18n::t('error.403_desc') . "</p><a href='" . SITE_URL . "/dashboard.php'>" . I18n::t('error.back_dashboard') . "</a>");
        }
    }

    public static function login(string $emailOrUsername, string $password): array {
        $db = getDB();
        $stmt = $db->prepare("SELECT id, username, email, password, role, status FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$emailOrUsername, $emailOrUsername]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password'])) {
            return ['success' => false, 'message' => I18n::t('auth.err_invalid_credentials')];
        }

        if ($user['status'] === 'suspended') {
            return ['success' => false, 'message' => I18n::t('auth.err_suspended')];
        }

        // Regenerate session ID to prevent session fixation attacks
        if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
            @session_start();
        }
        if (session_status() === PHP_SESSION_ACTIVE && !headers_sent()) {
            @session_regenerate_id(true);
        }

        $_SESSION['user_id'] = (int)$user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        return ['success' => true, 'user' => $user];
    }

    public static function register(string $username, string $email, string $password): array {
        $db = getDB();

        // Validate username
        $slugCheck = Security::validateSlug($username);
        if (!$slugCheck['valid']) {
            return ['success' => false, 'message' => $slugCheck['error']];
        }
        $username = $slugCheck['slug'];

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return ['success' => false, 'message' => I18n::t('auth.err_invalid_email')];
        }

        // Validate password
        if (strlen($password) < 6) {
            return ['success' => false, 'message' => I18n::t('auth.err_password_short')];
        }

        // Check duplicates
        $stmt = $db->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
        $stmt->execute([$email, $username]);
        if ($stmt->fetch()) {
            return ['success' => false, 'message' => I18n::t('auth.err_user_exists')];
        }

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = (strtolower($username) === strtolower(env('ADMIN_USERNAME', 'admin'))) ? 'admin' : 'user';

        $stmt = $db->prepare("INSERT INTO users (username, email, password, role, status) VALUES (?, ?, ?, ?, 'active')");
        $stmt->execute([$username, $email, $hashedPassword, $role]);

        $userId = (int)$db->lastInsertId();

        if (session_status() === PHP_SESSION_NONE && !headers_sent()) {
            @session_start();
        }
        if (session_status() === PHP_SESSION_ACTIVE && !headers_sent()) {
            @session_regenerate_id(true);
        }

        $_SESSION['user_id'] = $userId;
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $role;

        return ['success' => true, 'user_id' => $userId];
    }

    public static function logout(): void {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
    }
}
