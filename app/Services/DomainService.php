<?php
namespace App\Services;

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../Core/Security.php';

use PDO;
use App\Core\Security;

/**
 * CraftFolio - Custom Domain Management Service
 */
class DomainService {

    /**
     * Get domain configuration for a website
     */
    public static function getDomainForWebsite(int $websiteId): ?array {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM domains WHERE website_id = ?");
        $stmt->execute([$websiteId]);
        return $stmt->fetch() ?: null;
    }

    /**
     * Set or update custom domain for a website
     */
    public static function setCustomDomain(int $websiteId, int $userId, string $rawDomain): array {
        $db = getDB();

        $domain = strtolower(trim($rawDomain));
        // Strip protocols and trailing slashes if user pasted a URL
        $domain = preg_replace('#^https?://#', '', $domain);
        $domain = rtrim($domain, '/');

        if (empty($domain)) {
            // Remove domain
            $db->prepare("DELETE FROM domains WHERE website_id = ? AND user_id = ?")->execute([$websiteId, $userId]);
            $db->prepare("UPDATE websites SET custom_domain = NULL WHERE id = ? AND user_id = ?")->execute([$websiteId, $userId]);
            return ['success' => true, 'message' => 'تمت إزالة الدومين المخصص بنجاح'];
        }

        // Validate domain format
        if (!preg_match('/^(?!-)[A-Za-z0-9-]{1,63}(?<!-)(\.[A-Za-z0-9-]{1,63})+$/', $domain)) {
            return ['success' => false, 'message' => 'صيغة اسم النطاق (الدومين) غير صحيحة. مثال: myportfolio.com'];
        }

        // Check if domain is already registered to another website
        $stmtCheck = $db->prepare("SELECT website_id FROM domains WHERE domain = ? AND website_id != ?");
        $stmtCheck->execute([$domain, $websiteId]);
        if ($stmtCheck->fetch()) {
            return ['success' => false, 'message' => 'هذا الدومين مسجل بالفعل في موقع آخر'];
        }

        $token = bin2hex(random_bytes(16));
        $dnsType = (substr_count($domain, '.') > 1 && !str_starts_with($domain, 'www.')) ? 'CNAME' : 'A';

        // Portable upsert domain record
        $stmtChk = $db->prepare("SELECT id FROM domains WHERE website_id = ?");
        $stmtChk->execute([$websiteId]);
        if ($stmtChk->fetch()) {
            $stmt = $db->prepare("UPDATE domains SET domain = ?, verified = 0, verification_token = ?, dns_type = ?, ssl_status = 'pending', updated_at = CURRENT_TIMESTAMP WHERE website_id = ?");
            $stmt->execute([$domain, $token, $dnsType, $websiteId]);
        } else {
            $stmt = $db->prepare("INSERT INTO domains (website_id, user_id, domain, verified, verification_token, dns_type, ssl_status, created_at, updated_at) VALUES (?, ?, ?, 0, ?, ?, 'pending', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)");
            $stmt->execute([$websiteId, $userId, $domain, $token, $dnsType]);
        }

        // Update website custom_domain column
        $db->prepare("UPDATE websites SET custom_domain = ? WHERE id = ? AND user_id = ?")->execute([$domain, $websiteId, $userId]);

        return [
            'success' => true,
            'domain' => $domain,
            'dns_type' => $dnsType,
            'target_cname' => 'portfolio.code-elta6ur.net',
            'target_ip' => '145.223.102.100', // Example Hostinger server IP
            'token' => $token,
            'message' => 'تم حفظ إعدادات الدومين بنجاح. يرجى توجيه سجلات الـ DNS.'
        ];
    }

    /**
     * Check DNS resolution for verification
     */
    public static function checkDns(string $domain): array {
        $cnameRecords = @dns_get_record($domain, DNS_CNAME);
        $aRecords = @dns_get_record($domain, DNS_A);

        $matched = false;
        if (!empty($cnameRecords)) {
            foreach ($cnameRecords as $rec) {
                if (isset($rec['target']) && str_contains($rec['target'], 'portfolio.code-elta6ur.net')) {
                    $matched = true;
                    break;
                }
            }
        }

        return [
            'resolved' => !empty($cnameRecords) || !empty($aRecords),
            'matched' => $matched,
            'cname' => $cnameRecords,
            'a' => $aRecords,
        ];
    }
}
