<?php
namespace App\Services;

use PDO;
use App\Core\Security;

/**
 * CraftFolio - Media & Asset Management Service
 */
class AssetService {

    /**
     * Upload an image file securely
     */
    public static function upload(array $file, int $userId): array {
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return ['success' => false, 'message' => 'Upload failed with error code: ' . $file['error']];
        }

        // 1. Max size check (default 5MB)
        $maxBytes = (int)env('UPLOAD_MAX_SIZE_MB', 5) * 1024 * 1024;
        if ($file['size'] > $maxBytes) {
            return ['success' => false, 'message' => 'حجم الملف يتجاوز الحد الأقصى المسموح (5 ميجابايت)'];
        }

        // 2. Extension check
        $origName = basename($file['name']);
        $ext = strtolower(pathinfo($origName, PATHINFO_EXTENSION));
        $allowedExts = ['jpg', 'jpeg', 'png', 'webp', 'gif', 'svg'];
        if (!in_array($ext, $allowedExts, true)) {
            return ['success' => false, 'message' => 'نوع الملف غير مدعوم. الصيغ المسموحة: JPG, PNG, WEBP, GIF, SVG'];
        }

        // 3. MIME type check
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        $allowedMimes = [
            'image/jpeg', 'image/png', 'image/webp', 'image/gif', 'image/svg+xml'
        ];
        if (!in_array($mime, $allowedMimes, true)) {
            return ['success' => false, 'message' => 'نوع الميديا غير صالح'];
        }

        // 4. Verify it is a valid image (for raster types or SVG)
        if ($ext !== 'svg') {
            $imgInfo = @getimagesize($file['tmp_name']);
            if (!$imgInfo) {
                return ['success' => false, 'message' => 'الملف ليس صورة صالحة أو تالف'];
            }
        } else {
            // Strict SVG sanitation to prevent Stored XSS & XXE
            $svgContent = file_get_contents($file['tmp_name']);
            if ($svgContent === false || trim($svgContent) === '') {
                return ['success' => false, 'message' => 'ملف SVG فارغ أو غير صالح'];
            }
            if (preg_match('#(<script|<\?php|onload|onerror|onclick|onmouseover|<iframe|<embed|<object|javascript:|data:text/html|<!ENTITY)#i', $svgContent)) {
                return ['success' => false, 'message' => 'ملف SVG يحتوي على وسوم أو أحداث غير مسموح بها لأسباب أمنية'];
            }
        }

        // 5. Ensure upload directory exists
        $userDir = UPLOAD_DIR . $userId . '/';
        if (!is_dir($userDir)) {
            mkdir($userDir, 0755, true);
        }

        // 6. Generate safe random filename
        $safeName = 'asset_' . bin2hex(random_bytes(10)) . '.' . $ext;
        $destPath = $userDir . $safeName;

        if (!move_uploaded_file($file['tmp_name'], $destPath)) {
            return ['success' => false, 'message' => 'فشل حفظ الملف على الخادم'];
        }

        $relativeUrl = 'assets/uploads/' . $userId . '/' . $safeName;
        $siteUrl = defined('SITE_URL') ? \SITE_URL : '';
        $fullUrl = $siteUrl ? ($siteUrl . '/' . $relativeUrl) : $relativeUrl;

        // 7. Store in database
        $db = getDB();
        $stmt = $db->prepare("
            INSERT INTO assets (user_id, filename, original_name, file_path, file_size, mime_type)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([
            $userId,
            $safeName,
            Security::clean($origName),
            $relativeUrl,
            $file['size'],
            $mime
        ]);
        $assetId = (int)$db->lastInsertId();

        return [
            'success' => true,
            'asset_id' => $assetId,
            'url' => $fullUrl,
            'relative_url' => $relativeUrl,
            'filename' => $safeName,
            'original_name' => $origName,
            'size' => $file['size'],
        ];
    }

    /**
     * Get all assets for a user
     */
    public static function getUserAssets(int $userId): array {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM assets WHERE user_id = ? ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        $rows = $stmt->fetchAll();

        $siteUrl = defined('SITE_URL') ? \SITE_URL : '';
        foreach ($rows as &$r) {
            $r['full_url'] = $siteUrl ? ($siteUrl . '/' . $r['file_path']) : $r['file_path'];
        }
        return $rows;
    }

    /**
     * Delete an asset
     */
    public static function deleteAsset(int $assetId, int $userId): bool {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM assets WHERE id = ? AND user_id = ?");
        $stmt->execute([$assetId, $userId]);
        $asset = $stmt->fetch();

        if (!$asset) return false;

        $filePath = __DIR__ . '/../../' . $asset['file_path'];
        if (file_exists($filePath)) {
            @unlink($filePath);
        }

        $db->prepare("DELETE FROM assets WHERE id = ?")->execute([$assetId]);
        return true;
    }

    /**
     * Rename an asset's display name
     */
    public static function renameAsset(int $assetId, int $userId, string $newName): bool {
        $cleanName = Security::clean(trim($newName));
        if (empty($cleanName)) return false;

        $db = getDB();
        $stmt = $db->prepare("UPDATE assets SET original_name = ?, updated_at = CURRENT_TIMESTAMP WHERE id = ? AND user_id = ?");
        $stmt->execute([$cleanName, $assetId, $userId]);
        return $stmt->rowCount() > 0;
    }
}

