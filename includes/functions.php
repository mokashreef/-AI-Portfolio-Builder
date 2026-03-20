<?php
/**
 * AI Portfolio Builder - Helper Functions
 */

/**
 * تنظيف المدخلات من XSS
 */
function clean(string $input): string {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

/**
 * إعادة توجيه مع رسالة
 */
function redirect(string $url, string $message = '', string $type = 'success'): void {
    if ($message) {
        $_SESSION['flash'] = ['message' => $message, 'type' => $type];
    }
    header("Location: $url");
    exit;
}

/**
 * عرض رسالة Flash
 */
function getFlash(): ?array {
    if (isset($_SESSION['flash'])) {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }
    return null;
}

/**
 * التحقق هل المستخدم مسجل دخول
 */
function isLoggedIn(): bool {
    return isset($_SESSION['user_id']);
}

/**
 * الحصول على بيانات المستخدم الحالي
 */
function getCurrentUser(): ?array {
    if (!isLoggedIn()) return null;
    $db = getDB();
    $stmt = $db->prepare("SELECT id, username, email, avatar, created_at FROM users WHERE id = ?");
    $stmt->execute([$_SESSION['user_id']]);
    return $stmt->fetch() ?: null;
}

/**
 * توليد slug فريد
 */
function generateSlug(string $name): string {
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name), '-'));
    $db = getDB();
    $original = $slug;
    $counter = 1;
    while (true) {
        $stmt = $db->prepare("SELECT id FROM portfolios WHERE slug = ?");
        $stmt->execute([$slug]);
        if (!$stmt->fetch()) break;
        $slug = $original . '-' . $counter++;
    }
    return $slug;
}

/**
 * رفع صورة
 */
function uploadImage(array $file, string $subfolder = ''): ?string {
    $allowed = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
    if (!in_array($file['type'], $allowed)) return null;
    if ($file['size'] > 5 * 1024 * 1024) return null; // 5MB max

    $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid('img_') . '.' . $ext;
    $uploadPath = UPLOAD_DIR . ($subfolder ? $subfolder . '/' : '');

    if (!is_dir($uploadPath)) {
        mkdir($uploadPath, 0755, true);
    }

    if (move_uploaded_file($file['tmp_name'], $uploadPath . $filename)) {
        return ($subfolder ? $subfolder . '/' : '') . $filename;
    }
    return null;
}

/**
 * JSON response helper
 */
function jsonResponse(array $data, int $code = 200): void {
    http_response_code($code);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    exit;
}
