<?php
namespace App\Services;

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../Core/Security.php';
require_once __DIR__ . '/ComponentRegistry.php';
require_once __DIR__ . '/TemplateRegistry.php';

use PDO;
use App\Core\Security;
use App\Services\TemplateRegistry;
use App\Services\ComponentRegistry;

/**
 * CraftFolio - Website & Page Management Service
 */
class WebsiteService {

    /**
     * Get all websites owned by a user
     */
    public static function getUserWebsites(int $userId): array {
        $db = getDB();
        $stmt = $db->prepare("
            SELECT w.*, 
                   (SELECT COUNT(*) FROM pages WHERE website_id = w.id) as page_count,
                   (SELECT COUNT(*) FROM analytics_views WHERE website_id = w.id) as total_views
            FROM websites w
            WHERE w.user_id = ?
            ORDER BY w.updated_at DESC
        ");
        $stmt->execute([$userId]);
        $rows = $stmt->fetchAll();

        foreach ($rows as &$r) {
            $r['theme_settings'] = !empty($r['theme_settings']) ? json_decode($r['theme_settings'], true) : [];
            $r['seo_settings'] = !empty($r['seo_settings']) ? json_decode($r['seo_settings'], true) : [];
        }
        return $rows;
    }

    /**
     * Get a website by ID with optional owner verification
     */
    public static function getWebsiteById(int $id, ?int $userId = null): ?array {
        $db = getDB();
        $sql = "SELECT * FROM websites WHERE id = ?";
        $params = [$id];

        if ($userId !== null) {
            $sql .= " AND user_id = ?";
            $params[] = $userId;
        }

        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $site = $stmt->fetch();

        if (!$site) return null;

        $site['theme_settings'] = !empty($site['theme_settings']) ? json_decode($site['theme_settings'], true) : [];
        $site['seo_settings'] = !empty($site['seo_settings']) ? json_decode($site['seo_settings'], true) : [];
        return $site;
    }

    /**
     * Get a published website by unique slug
     */
    public static function getWebsiteBySlug(string $slug, bool $publishedOnly = true): ?array {
        $db = getDB();
        $sql = "SELECT * FROM websites WHERE slug = ?";
        if ($publishedOnly) {
            $sql .= " AND is_published = 1";
        }
        $stmt = $db->prepare($sql);
        $stmt->execute([$slug]);
        $site = $stmt->fetch();

        if (!$site) return null;

        $site['theme_settings'] = !empty($site['theme_settings']) ? json_decode($site['theme_settings'], true) : [];
        $site['seo_settings'] = !empty($site['seo_settings']) ? json_decode($site['seo_settings'], true) : [];
        return $site;
    }

    /**
     * Get a published website by custom domain
     */
    public static function getWebsiteByDomain(string $domain): ?array {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM websites WHERE custom_domain = ? AND is_published = 1");
        $stmt->execute([$domain]);
        $site = $stmt->fetch();

        if (!$site) {
            // Check in domains table
            $dStmt = $db->prepare("SELECT website_id FROM domains WHERE domain = ? AND verified = 1");
            $dStmt->execute([$domain]);
            $wId = $dStmt->fetchColumn();
            if ($wId) {
                return self::getWebsiteById((int)$wId);
            }
            return null;
        }

        $site['theme_settings'] = !empty($site['theme_settings']) ? json_decode($site['theme_settings'], true) : [];
        $site['seo_settings'] = !empty($site['seo_settings']) ? json_decode($site['seo_settings'], true) : [];
        return $site;
    }

    /**
     * Create a new website either from template or blank canvas
     */
    public static function createWebsite(int $userId, string $title, string $slug, ?string $templateSlug = null, bool $isBlank = false, string $contentLocale = 'ar'): array {
        $db = getDB();

        // Validate slug
        $slugValidation = Security::validateSlug($slug);
        if (!$slugValidation['valid']) {
            return ['success' => false, 'message' => $slugValidation['error']];
        }
        $slug = $slugValidation['slug'];

        // Check if slug taken in websites
        $stmtCheck = $db->prepare("SELECT id FROM websites WHERE slug = ?");
        $stmtCheck->execute([$slug]);
        if ($stmtCheck->fetch()) {
            return ['success' => false, 'message' => 'هذا الرابط مستخدم بالفعل، يرجى اختيار رابط آخر'];
        }

        // Determine template schema
        $templateData = null;
        if (!$isBlank && $templateSlug) {
            $templateData = TemplateRegistry::find($templateSlug);
        }

        $bilingualLocales = null;
        if ($templateData) {
            if ($contentLocale === 'en') {
                $pkg = TemplateRegistry::getLocalePackage($templateData, 'en');
                $theme = $pkg['theme'];
                $direction = 'ltr';
                $templateSections = $pkg['sections'];
                $bilingualLocales = ['en' => $pkg, 'ar' => TemplateRegistry::getLocalePackage($templateData, 'ar')];
            } elseif ($contentLocale === 'bilingual') {
                $arPkg = TemplateRegistry::getLocalePackage($templateData, 'ar');
                $enPkg = TemplateRegistry::getLocalePackage($templateData, 'en');
                $theme = $arPkg['theme'];
                $direction = 'rtl';
                $templateSections = $arPkg['sections'];
                $bilingualLocales = ['ar' => $arPkg, 'en' => $enPkg];
            } else { // default 'ar'
                $pkg = TemplateRegistry::getLocalePackage($templateData, 'ar');
                $theme = $pkg['theme'];
                $direction = 'rtl';
                $templateSections = $pkg['sections'];
                $bilingualLocales = ['ar' => $pkg, 'en' => TemplateRegistry::getLocalePackage($templateData, 'en')];
            }
        } else {
            $direction = ($contentLocale === 'en') ? 'ltr' : 'rtl';
            $theme = [
                'backgroundColor' => '#ffffff',
                'textColor' => '#0f172a',
                'primaryColor' => '#2563eb',
                'secondaryColor' => '#3b82f6',
                'headingFont' => ($direction === 'rtl') ? 'IBM Plex Sans Arabic' : 'Plus Jakarta Sans',
                'bodyFont' => ($direction === 'rtl') ? 'IBM Plex Sans Arabic' : 'Inter',
                'borderRadius' => '8px',
                'containerWidth' => 'max-w-6xl',
                'direction' => $direction
            ];
            $templateSections = [];
        }

        $seo = [
            'title' => $title,
            'description' => 'Personal website of ' . $title,
            'og_image' => '',
            'favicon' => '',
        ];

        try {
            $db->beginTransaction();

            // Insert Website with direction
            $stmtSite = $db->prepare("
                INSERT INTO websites (user_id, title, slug, template_slug, theme_settings, seo_settings, direction, status, is_published)
                VALUES (?, ?, ?, ?, ?, ?, ?, 'draft', 0)
            ");
            $stmtSite->execute([
                $userId,
                $title,
                $slug,
                $templateSlug ?: 'blank',
                json_encode($theme, JSON_UNESCAPED_UNICODE),
                json_encode($seo, JSON_UNESCAPED_UNICODE),
                $direction,
            ]);
            $websiteId = (int)$db->lastInsertId();

            $pagesList = [];
            if ($templateData && !empty($templateData['schema']['pages'])) {
                $pagesList = $templateData['schema']['pages'];
            } elseif (!empty($templateSections)) {
                $pagesList = [
                    [
                        'title' => ($direction === 'rtl') ? 'الرئيسية' : 'Home',
                        'slug' => 'home',
                        'is_home' => true,
                        'is_in_nav' => true,
                        'sections' => $templateSections
                    ]
                ];
            } else {
                // Blank Canvas Starter: Navbar, Hero, Footer
                $pagesList = [
                    [
                        'title' => ($direction === 'rtl') ? 'الرئيسية' : 'Home',
                        'slug' => 'home',
                        'is_home' => true,
                        'is_in_nav' => true,
                        'sections' => [
                            ComponentRegistry::createDefaultSection('navbar'),
                            ComponentRegistry::createDefaultSection('hero'),
                            ComponentRegistry::createDefaultSection('footer'),
                        ]
                    ]
                ];
            }

            foreach ($pagesList as $idx => $p) {
                $stmtPage = $db->prepare("
                    INSERT INTO pages (website_id, title, slug, is_home, sort_order, is_in_nav)
                    VALUES (?, ?, ?, ?, ?, ?)
                ");
                $stmtPage->execute([
                    $websiteId,
                    $p['title'] ?? 'Home',
                    $p['slug'] ?? 'home',
                    ($idx === 0 || !empty($p['is_home'])) ? 1 : 0,
                    $idx,
                    !empty($p['is_in_nav']) ? 1 : 1
                ]);
                $pageId = (int)$db->lastInsertId();

                $pagePayload = [
                    'sections' => $p['sections'] ?? [],
                    'locales' => $bilingualLocales
                ];
                $sectionsJson = json_encode($pagePayload, JSON_UNESCAPED_UNICODE);

                // Initialize draft and published versions
                $stmtVer = $db->prepare("
                    INSERT INTO page_versions (page_id, version_type, content_json)
                    VALUES (?, 'draft', ?), (?, 'published', ?)
                ");
                $stmtVer->execute([$pageId, $sectionsJson, $pageId, $sectionsJson]);
            }

            $db->commit();
            return ['success' => true, 'website_id' => $websiteId, 'slug' => $slug];
        } catch (\Exception $e) {
            $db->rollBack();
            return ['success' => false, 'message' => 'Error creating website: ' . $e->getMessage()];
        }
    }

    /**
     * Get all pages for a given website
     */
    public static function getWebsitePages(int $websiteId): array {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM pages WHERE website_id = ? ORDER BY sort_order ASC, id ASC");
        $stmt->execute([$websiteId]);
        return $stmt->fetchAll();
    }

    /**
     * Get single page with content JSON for specified version ('draft' or 'published')
     */
    public static function getPageWithContent(int $pageId, string $versionType = 'draft'): ?array {
        $db = getDB();
        $stmt = $db->prepare("
            SELECT p.*, pv.content_json, pv.version_type, pv.updated_at as version_updated_at
            FROM pages p
            LEFT JOIN page_versions pv ON p.id = pv.page_id AND pv.version_type = ?
            WHERE p.id = ?
        ");
        $stmt->execute([$versionType, $pageId]);
        $page = $stmt->fetch();

        if (!$page) return null;

        $raw = !empty($page['content_json']) ? json_decode($page['content_json'], true) : [];
        if (is_array($raw) && isset($raw['sections'])) {
            $page['sections'] = $raw['sections'];
            $page['locales'] = $raw['locales'] ?? null;
        } else {
            $page['sections'] = is_array($raw) ? $raw : [];
            $page['locales'] = null;
        }
        return $page;
    }

    /**
     * Save draft content for a page (Used by the Visual Builder autosave)
     */
    public static function saveDraftPage(int $pageId, int $websiteId, int $userId, array $sections, ?array $locales = null): array {
        $db = getDB();

        // Verify website ownership
        $stmtVerify = $db->prepare("SELECT w.id FROM websites w JOIN pages p ON p.website_id = w.id WHERE p.id = ? AND w.user_id = ?");
        $stmtVerify->execute([$pageId, $userId]);
        if (!$stmtVerify->fetch()) {
            return ['success' => false, 'message' => 'Unauthorized'];
        }

        $payload = ['sections' => $sections];
        if (!empty($locales)) {
            $payload['locales'] = $locales;
        }
        $json = json_encode(isset($sections['sections']) ? $sections : $payload, JSON_UNESCAPED_UNICODE);

        // Portable upsert draft version
        $stmtChk = $db->prepare("SELECT id FROM page_versions WHERE page_id = ? AND version_type = 'draft'");
        $stmtChk->execute([$pageId]);
        if ($stmtChk->fetch()) {
            $stmt = $db->prepare("UPDATE page_versions SET content_json = ?, updated_at = CURRENT_TIMESTAMP WHERE page_id = ? AND version_type = 'draft'");
            $stmt->execute([$json, $pageId]);
        } else {
            $stmt = $db->prepare("INSERT INTO page_versions (page_id, version_type, content_json, updated_at) VALUES (?, 'draft', ?, CURRENT_TIMESTAMP)");
            $stmt->execute([$pageId, $json]);
        }

        // Touch website updated_at
        $db->prepare("UPDATE websites SET updated_at = CURRENT_TIMESTAMP WHERE id = ?")->execute([$websiteId]);

        return ['success' => true, 'updated_at' => date('Y-m-d H:i:s')];
    }

    /**
     * Publish website: copies all draft versions to published versions
     */
    public static function publishWebsite(int $websiteId, int $userId): array {
        $db = getDB();
        $site = self::getWebsiteById($websiteId, $userId);
        if (!$site) {
            return ['success' => false, 'message' => 'Website not found or unauthorized'];
        }

        $pages = self::getWebsitePages($websiteId);

        $db->beginTransaction();
        try {
            foreach ($pages as $p) {
                // Fetch draft
                $draftStmt = $db->prepare("SELECT content_json FROM page_versions WHERE page_id = ? AND version_type = 'draft'");
                $draftStmt->execute([$p['id']]);
                $draftContent = $draftStmt->fetchColumn();

                if ($draftContent !== false) {
                    $chkPub = $db->prepare("SELECT id FROM page_versions WHERE page_id = ? AND version_type = 'published'");
                    $chkPub->execute([$p['id']]);
                    if ($chkPub->fetch()) {
                        $pubStmt = $db->prepare("UPDATE page_versions SET content_json = ?, updated_at = CURRENT_TIMESTAMP WHERE page_id = ? AND version_type = 'published'");
                        $pubStmt->execute([$draftContent, $p['id']]);
                    } else {
                        $pubStmt = $db->prepare("INSERT INTO page_versions (page_id, version_type, content_json, updated_at) VALUES (?, 'published', ?, CURRENT_TIMESTAMP)");
                        $pubStmt->execute([$p['id'], $draftContent]);
                    }
                }
            }

            // Set website as published
            $stmtSite = $db->prepare("UPDATE websites SET is_published = 1, status = 'published', updated_at = CURRENT_TIMESTAMP WHERE id = ?");
            $stmtSite->execute([$websiteId]);

            $db->commit();
            return [
                'success' => true,
                'slug' => $site['slug'],
                'url' => (defined('SITE_URL') ? \SITE_URL : '') . '/' . $site['slug'],
                'message' => 'تم نشر الموقع بنجاح!'
            ];
        } catch (\Exception $e) {
            $db->rollBack();
            return ['success' => false, 'message' => 'Publish error: ' . $e->getMessage()];
        }
    }

    /**
     * Update website global theme, SEO settings, or custom CSS
     */
    public static function updateWebsiteSettings(int $websiteId, int $userId, array $data): array {
        $db = getDB();
        $site = self::getWebsiteById($websiteId, $userId);
        if (!$site) {
            return ['success' => false, 'message' => 'Website not found'];
        }

        $fields = [];
        $params = [];

        if (isset($data['title'])) {
            $fields[] = "title = ?";
            $params[] = Security::clean($data['title']);
        }

        if (isset($data['slug'])) {
            $newSlug = Security::clean($data['slug']);
            if ($newSlug !== $site['slug']) {
                $chk = Security::validateSlug($newSlug);
                if (!$chk['valid']) {
                    return ['success' => false, 'message' => $chk['error']];
                }
                $stmtCheck = $db->prepare("SELECT id FROM websites WHERE slug = ? AND id != ?");
                $stmtCheck->execute([$chk['slug'], $websiteId]);
                if ($stmtCheck->fetch()) {
                    return ['success' => false, 'message' => 'الرابط مستخدم بالفعل'];
                }
                $fields[] = "slug = ?";
                $params[] = $chk['slug'];
            }
        }

        if (isset($data['direction'])) {
            $dir = in_array($data['direction'], ['ltr', 'rtl']) ? $data['direction'] : 'ltr';
            $fields[] = "direction = ?";
            $params[] = $dir;
        }

        if (isset($data['theme_settings'])) {
            $fields[] = "theme_settings = ?";
            $params[] = json_encode($data['theme_settings'], JSON_UNESCAPED_UNICODE);
        }

        if (isset($data['seo_settings'])) {
            $fields[] = "seo_settings = ?";
            $params[] = json_encode($data['seo_settings'], JSON_UNESCAPED_UNICODE);
        }

        if (isset($data['custom_css'])) {
            $rawCss = (string)$data['custom_css'];
            $cleanCss = strip_tags($rawCss);
            $cleanCss = preg_replace('#</?\s*(style|script|iframe)[^>]*>#i', '', $cleanCss);
            $cleanCss = str_ireplace(['javascript:', 'expression('], '', $cleanCss);
            $fields[] = "custom_css = ?";
            $params[] = $cleanCss;
        }

        if (empty($fields)) {
            return ['success' => true];
        }

        $fields[] = "updated_at = CURRENT_TIMESTAMP";
        $sql = "UPDATE websites SET " . implode(', ', $fields) . " WHERE id = ? AND user_id = ?";
        $params[] = $websiteId;
        $params[] = $userId;

        $stmt = $db->prepare($sql);
        $stmt->execute($params);

        return ['success' => true, 'message' => 'تم حفظ الإعدادات بنجاح'];
    }

    /**
     * Duplicate a website
     */
    public static function duplicateWebsite(int $websiteId, int $userId): array {
        $db = getDB();
        $source = self::getWebsiteById($websiteId, $userId);
        if (!$source) {
            return ['success' => false, 'message' => 'Source website not found'];
        }

        $newSlug = $source['slug'] . '-copy-' . rand(100, 999);
        $newTitle = $source['title'] . ' (Copy)';

        $res = self::createWebsite($userId, $newTitle, $newSlug, $source['template_slug'], true);
        if (!$res['success']) return $res;

        $newWebsiteId = $res['website_id'];

        // Clone pages and draft contents
        $srcPages = self::getWebsitePages($websiteId);
        $newPages = self::getWebsitePages($newWebsiteId);
        $firstNewPage = $newPages[0] ?? null;

        foreach ($srcPages as $i => $sp) {
            $draftPage = self::getPageWithContent($sp['id'], 'draft');
            $sections = $draftPage['sections'] ?? [];

            if ($i === 0 && $firstNewPage) {
                self::saveDraftPage($firstNewPage['id'], $newWebsiteId, $userId, $sections);
            } else {
                $newPage = self::createPage($newWebsiteId, $sp['title'], $sp['slug'], $userId);
                if ($newPage['success']) {
                    self::saveDraftPage($newPage['page_id'], $newWebsiteId, $userId, $sections);
                }
            }
        }

        // Copy theme and SEO settings
        self::updateWebsiteSettings($newWebsiteId, $userId, [
            'theme_settings' => $source['theme_settings'],
            'seo_settings' => $source['seo_settings'],
            'direction' => $source['direction'] ?? 'ltr',
        ]);

        return ['success' => true, 'new_website_id' => $newWebsiteId];
    }

    /**
     * Delete a website and its associated data
     */
    public static function deleteWebsite(int $websiteId, int $userId): bool {
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM websites WHERE id = ? AND user_id = ?");
        return $stmt->execute([$websiteId, $userId]);
    }

    /**
     * Create a new page in a website
     */
    public static function createPage(int $websiteId, string $title, string $slug, int $userId): array {
        $db = getDB();
        $site = self::getWebsiteById($websiteId, $userId);
        if (!$site) return ['success' => false, 'message' => 'Unauthorized'];

        $cleanSlug = Security::sanitizeSlug($slug);
        if (empty($cleanSlug)) $cleanSlug = 'page-' . time();

        // Check page slug uniqueness within this website
        $chk = $db->prepare("SELECT id FROM pages WHERE website_id = ? AND slug = ?");
        $chk->execute([$websiteId, $cleanSlug]);
        if ($chk->fetch()) {
            return ['success' => false, 'message' => 'رابط الصفحة مستخدم بالفعل في هذا الموقع'];
        }

        $stmt = $db->prepare("
            INSERT INTO pages (website_id, title, slug, is_home, sort_order, is_in_nav)
            VALUES (?, ?, ?, 0, (SELECT COALESCE(MAX(sort_order),0)+1 FROM pages p2 WHERE website_id = ?), 1)
        ");
        $stmt->execute([$websiteId, Security::clean($title), $cleanSlug, $websiteId]);
        $pageId = (int)$db->lastInsertId();

        // Starter sections: navbar + hero + footer
        $defaultSections = [
            ComponentRegistry::createDefaultSection('navbar'),
            ComponentRegistry::createDefaultSection('hero'),
            ComponentRegistry::createDefaultSection('footer'),
        ];
        $secJson = json_encode($defaultSections, JSON_UNESCAPED_UNICODE);

        $db->prepare("INSERT INTO page_versions (page_id, version_type, content_json) VALUES (?, 'draft', ?), (?, 'published', ?)")
           ->execute([$pageId, $secJson, $pageId, $secJson]);

        return ['success' => true, 'page_id' => $pageId, 'title' => $title, 'slug' => $cleanSlug];
    }

    /**
     * Delete a page from a website
     */
    public static function deletePage(int $pageId, int $websiteId, int $userId): array {
        $db = getDB();
        $stmt = $db->prepare("SELECT is_home FROM pages p JOIN websites w ON p.website_id = w.id WHERE p.id = ? AND w.id = ? AND w.user_id = ?");
        $stmt->execute([$pageId, $websiteId, $userId]);
        $p = $stmt->fetch();

        if (!$p) {
            return ['success' => false, 'message' => 'Page not found'];
        }
        if (!empty($p['is_home'])) {
            return ['success' => false, 'message' => 'لا يمكن حذف الصفحة الرئيسية للموقع'];
        }

        $db->prepare("DELETE FROM pages WHERE id = ?")->execute([$pageId]);
        return ['success' => true];
    }

    /**
     * Get raw JSON content for a page version
     */
    public static function getPageVersionJson(int $pageId, string $versionType = 'draft'): ?string {
        $db = getDB();
        $stmt = $db->prepare("SELECT content_json FROM page_versions WHERE page_id = ? AND version_type = ?");
        $stmt->execute([$pageId, $versionType]);
        $val = $stmt->fetchColumn();
        return $val !== false ? $val : null;
    }

    /**
     * Save an entire website as a reusable custom template
     */
    public static function saveAsTemplate(int $websiteId, int $userId, string $templateName): array {
        $db = getDB();

        // Verify website ownership
        $site = self::getWebsiteById($websiteId, $userId);
        if (!$site) {
            return ['success' => false, 'message' => 'Website not found or unauthorized'];
        }

        // Retrieve all pages and their current draft versions
        $pages = self::getWebsitePages($websiteId);
        $schemaPages = [];

        foreach ($pages as $p) {
            $draftJson = self::getPageVersionJson((int)$p['id'], 'draft');
            $sections = !empty($draftJson) ? json_decode($draftJson, true) : [];
            $schemaPages[] = [
                'id' => 'page_' . $p['slug'],
                'title' => $p['title'],
                'slug' => $p['slug'],
                'is_home' => !empty($p['is_home']),
                'is_in_nav' => !empty($p['is_in_nav']),
                'sections' => $sections
            ];
        }

        $completeSchema = [
            'theme' => $site['theme_settings'] ?? [],
            'pages' => $schemaPages
        ];

        $cleanName = Security::clean($templateName);
        $slugBase = 'custom-' . preg_replace('/[^a-z0-9]+/', '-', strtolower($cleanName));
        $uniqueSlug = trim($slugBase, '-') . '-' . substr(bin2hex(random_bytes(3)), 0, 5);

        try {
            $stmt = $db->prepare("
                INSERT INTO templates (slug, name, name_ar, category, description, description_ar, is_featured, is_system, user_id, schema_json)
                VALUES (?, ?, ?, 'Custom', 'Custom user template', 'قالب مخصص للمستخدم', 0, 0, ?, ?)
            ");
            $stmt->execute([
                $uniqueSlug,
                $cleanName,
                $cleanName,
                $userId,
                json_encode($completeSchema, JSON_UNESCAPED_UNICODE)
            ]);
            $templateId = (int)$db->lastInsertId();

            return [
                'success' => true,
                'template_id' => $templateId,
                'slug' => $uniqueSlug,
                'message' => 'تم حفظ الموقع كقالب بنجاح! يمكنك استخدامه لإنشاء مواقع جديدة.'
            ];
        } catch (\PDOException $e) {
            return ['success' => false, 'message' => 'Database error saving template: ' . $e->getMessage()];
        }
    }

    /**
     * Get all custom templates created by a user
     */
    public static function getUserTemplates(int $userId): array {
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM templates WHERE user_id = ? AND is_system = 0 ORDER BY created_at DESC");
        $stmt->execute([$userId]);
        $templates = $stmt->fetchAll();
        foreach ($templates as &$t) {
            $t['schema'] = !empty($t['schema_json']) ? json_decode($t['schema_json'], true) : [];
            $t['theme'] = $t['schema']['theme'] ?? [];
        }
        return $templates;
    }

    /**
     * Delete a custom template
     */
    public static function deleteCustomTemplate(int $templateId, int $userId): array {
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM templates WHERE id = ? AND user_id = ? AND is_system = 0");
        $stmt->execute([$templateId, $userId]);
        return ['success' => true, 'message' => 'Template deleted successfully'];
    }
}
