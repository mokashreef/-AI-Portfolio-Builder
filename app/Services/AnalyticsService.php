<?php
namespace App\Services;

require_once __DIR__ . '/../../config/database.php';

use PDO;

/**
 * CraftFolio - Lightweight Analytics Service
 */
class AnalyticsService {

    public static function recordView(int $websiteId, ?int $pageId = null): void {
        $ip = $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
        $referer = !empty($_SERVER['HTTP_REFERER']) ? substr($_SERVER['HTTP_REFERER'], 0, 250) : null;
        $ua = !empty($_SERVER['HTTP_USER_AGENT']) ? substr($_SERVER['HTTP_USER_AGENT'], 0, 250) : null;

        $db = getDB();
        $isSqlite = ($db->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite');

        // 1-hour anti-spam throttle per IP
        $throttleSql = $isSqlite 
            ? "SELECT id FROM analytics_views WHERE website_id = ? AND ip_address = ? AND view_date > datetime('now', '-1 hour')"
            : "SELECT id FROM analytics_views WHERE website_id = ? AND ip_address = ? AND view_date > DATE_SUB(NOW(), INTERVAL 1 HOUR)";

        $stmtChk = $db->prepare($throttleSql);
        $stmtChk->execute([$websiteId, $ip]);
        if ($stmtChk->fetch()) {
            return;
        }

        $country = $_SERVER['HTTP_CF_IPCOUNTRY'] ?? $_SERVER['GEOIP_COUNTRY_NAME'] ?? 'Unknown';
        if ($country === 'Unknown' && env('ENABLE_REMOTE_GEOIP', false) && $ip !== '127.0.0.1' && !str_starts_with($ip, '192.168.') && !str_starts_with($ip, '10.')) {
            try {
                $ctx = stream_context_create(['http' => ['timeout' => 0.4]]);
                $data = @json_decode(file_get_contents("http://ip-api.com/json/{$ip}?fields=country", false, $ctx), true);
                if (!empty($data['country'])) {
                    $country = substr($data['country'], 0, 95);
                }
            } catch (\Throwable $e) {}
        }

        $stmt = $db->prepare("
            INSERT INTO analytics_views (website_id, page_id, ip_address, country, referer, user_agent)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([$websiteId, $pageId, $ip, $country, $referer, $ua]);
    }

    public static function getStats(int $websiteId, int $userId): array {
        $db = getDB();
        $isSqlite = ($db->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite');

        // Verify website ownership
        $stmtVerify = $db->prepare("SELECT id FROM websites WHERE id = ? AND user_id = ?");
        $stmtVerify->execute([$websiteId, $userId]);
        if (!$stmtVerify->fetch()) {
            return [];
        }

        $stmtTotal = $db->prepare("SELECT COUNT(*) FROM analytics_views WHERE website_id = ?");
        $stmtTotal->execute([$websiteId]);
        $totalViews = (int)$stmtTotal->fetchColumn();

        $todaySql = $isSqlite
            ? "SELECT COUNT(*) FROM analytics_views WHERE website_id = ? AND DATE(view_date) = date('now')"
            : "SELECT COUNT(*) FROM analytics_views WHERE website_id = ? AND DATE(view_date) = CURDATE()";
        $stmtToday = $db->prepare($todaySql);
        $stmtToday->execute([$websiteId]);
        $todayViews = (int)$stmtToday->fetchColumn();

        $stmtUnique = $db->prepare("SELECT COUNT(DISTINCT ip_address) FROM analytics_views WHERE website_id = ?");
        $stmtUnique->execute([$websiteId]);
        $uniqueVisitors = (int)$stmtUnique->fetchColumn();

        // Last 14 days chart
        $chartSql = $isSqlite
            ? "SELECT DATE(view_date) as day, COUNT(*) as views FROM analytics_views WHERE website_id = ? AND view_date >= datetime('now', '-14 days') GROUP BY DATE(view_date) ORDER BY day ASC"
            : "SELECT DATE(view_date) as day, COUNT(*) as views FROM analytics_views WHERE website_id = ? AND view_date >= DATE_SUB(CURDATE(), INTERVAL 14 DAY) GROUP BY DATE(view_date) ORDER BY day ASC";
        $stmtChart = $db->prepare($chartSql);
        $stmtChart->execute([$websiteId]);
        $chartData = $stmtChart->fetchAll();

        // Top Referrers
        $stmtRef = $db->prepare("
            SELECT referer, COUNT(*) as count
            FROM analytics_views
            WHERE website_id = ? AND referer IS NOT NULL AND referer != ''
            GROUP BY referer
            ORDER BY count DESC
            LIMIT 5
        ");
        $stmtRef->execute([$websiteId]);
        $topReferrers = $stmtRef->fetchAll();

        // Top Countries
        $stmtCountries = $db->prepare("
            SELECT country, COUNT(*) as count
            FROM analytics_views
            WHERE website_id = ? AND country IS NOT NULL AND country != 'Unknown'
            GROUP BY country
            ORDER BY count DESC
            LIMIT 5
        ");
        $stmtCountries->execute([$websiteId]);
        $topCountries = $stmtCountries->fetchAll();

        return [
            'total_views' => $totalViews,
            'today_views' => $todayViews,
            'unique_visitors' => $uniqueVisitors,
            'chart' => $chartData,
            'referrers' => $topReferrers,
            'countries' => $topCountries,
        ];
    }
}
