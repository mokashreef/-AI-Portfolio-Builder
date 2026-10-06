<?php
namespace App\Core;

/**
 * CraftFolio - Security Core
 * Handles CSRF protection, input sanitation, XSS prevention, slug sanitization, and authorization.
 */
class Security {
    
    /**
     * Generate or retrieve current CSRF token from session
     */
    public static function csrfToken(): string {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }

    /**
     * Verify CSRF token from POST or HTTP Header
     */
    public static function verifyCsrf(?string $token = null): bool {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $sessionToken = $_SESSION['csrf_token'] ?? '';
        if (empty($sessionToken)) {
            return false;
        }

        if ($token === null) {
            $token = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';
        }

        return hash_equals($sessionToken, (string)$token);
    }

    /**
     * Render hidden CSRF input field for HTML forms
     */
    public static function csrfInput(): string {
        $token = self::csrfToken();
        return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">';
    }

    /**
     * Clean and escape a string for safe HTML rendering
     */
    public static function clean(?string $input): string {
        if ($input === null) return '';
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Normalize and validate a URL slug
     */
    public static function sanitizeSlug(string $slug): string {
        // Replace accented / Arabic / special characters appropriately
        $slug = trim($slug);
        $slug = strtolower($slug);
        // Replace anything not a-z, 0-9, or hyphens with hyphens
        $slug = preg_replace('/[^a-z0-9\-]+/', '-', $slug);
        $slug = trim($slug, '-');
        // Collapse multiple dashes
        $slug = preg_replace('/-+/', '-', $slug);
        return $slug;
    }

    /**
     * Check if a slug is reserved
     */
    public static function isReservedSlug(string $slug): bool {
        $reservedFile = __DIR__ . '/../../config/reserved_slugs.php';
        if (file_exists($reservedFile)) {
            $reserved = require $reservedFile;
            return in_array(strtolower($slug), $reserved, true);
        }
        return false;
    }

    /**
     * Validate slug syntax & length
     */
    public static function validateSlug(string $slug): array {
        $cleaned = self::sanitizeSlug($slug);
        if (strlen($cleaned) < 3) {
            return ['valid' => false, 'error' => 'الرابط يجب أن يحتوي على 3 أحرف على الأقل', 'error_en' => 'Slug must be at least 3 characters'];
        }
        if (strlen($cleaned) > 50) {
            return ['valid' => false, 'error' => 'الرابط لا يمكن أن يتجاوز 50 حرفًا', 'error_en' => 'Slug cannot exceed 50 characters'];
        }
        if (self::isReservedSlug($cleaned)) {
            return ['valid' => false, 'error' => 'هذا الاسم محجوز للنظام، يرجى اختيار اسم آخر', 'error_en' => 'This slug is reserved by the system, please choose another'];
        }
        return ['valid' => true, 'slug' => $cleaned];
    }

    /**
     * Sanitize custom user HTML safely (strips script, iframe, onload, etc.)
     */
    public static function sanitizeHtml(string $html): string {
        // Strip out script, iframe, object, embed, applet, meta, base tags completely
        $html = preg_replace('#</?\s*(script|iframe|object|embed|applet|meta|base)[^>]*>#is', '', $html);
        $html = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $html);
        $html = preg_replace('#<iframe(.*?)>(.*?)</iframe>#is', '', $html);
        // Strip all inline event handlers (onload, onerror, onclick, etc.)
        $html = preg_replace('#\s*on[a-zA-Z]+\s*=\s*(".*?"|\'.*?\'|[^\s>]+)#is', '', $html);
        // Strip dangerous URI schemes
        $html = preg_replace('#javascript\s*:#is', '', $html);
        $html = preg_replace('#data\s*:\s*text/html#is', '', $html);
        $html = preg_replace('#vbscript\s*:#is', '', $html);
        return $html;
    }
}
