<?php
namespace App\Core;

use PDO;
use App\Services\TemplateRegistry;
use App\Services\ComponentRegistry;

/**
 * CraftFolio - Database Migrator & Seed Engine
 */
class Migrator {

    public static function run(): array {
        $db = getDB();
        $logs = [];

        // Check if database driver is SQLite
        if ($db->getAttribute(PDO::ATTR_DRIVER_NAME) === 'sqlite') {
            return self::initSqlite($db);
        }

        // 1. Run Core Tables Creation
        $schemaSql = file_get_contents(__DIR__ . '/../../sql/schema_v2.sql');
        $statements = array_filter(array_map('trim', explode(';', $schemaSql)));

        foreach ($statements as $stmtSql) {
            if (!empty($stmtSql)) {
                try {
                    $db->exec($stmtSql);
                } catch (\PDOException $e) {
                    $logs[] = "Notice: " . $e->getMessage();
                }
            }
        }
        $logs[] = "Core schema verified.";

        // 2. Upgrade `users` table if missing columns
        $userCols = [
            "ADD COLUMN role ENUM('user', 'admin') DEFAULT 'user' AFTER password",
            "ADD COLUMN status ENUM('active', 'suspended') DEFAULT 'active' AFTER role",
            "ADD COLUMN updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP AFTER created_at",
        ];
        foreach ($userCols as $colSql) {
            try {
                $db->exec("ALTER TABLE users $colSql");
                $logs[] = "Users table column updated: $colSql";
            } catch (\PDOException $e) {
                // Column probably exists, safe to ignore
            }
        }

        // 3. Migrate any legacy `portfolios` records if present
        try {
            $checkTable = $db->query("SHOW TABLES LIKE 'portfolios'")->fetch();
            if ($checkTable) {
                $stmt = $db->query("SELECT * FROM portfolios");
                $legacyPortfolios = $stmt->fetchAll();

                foreach ($legacyPortfolios as $lp) {
                    $slug = $lp['slug'] ?: $lp['username'] ?: ('user-' . $lp['id']);
                    
                    // Check if already in websites
                    $checkSite = $db->prepare("SELECT id FROM websites WHERE slug = ?");
                    $checkSite->execute([$slug]);
                    if ($checkSite->fetch()) {
                        continue;
                    }

                    // Create Website
                    $theme = [
                        'backgroundColor' => ($lp['template'] === 'developer' || $lp['template'] === 'creative') ? '#0f172a' : '#ffffff',
                        'textColor' => ($lp['template'] === 'developer' || $lp['template'] === 'creative') ? '#f8fafc' : '#0f172a',
                        'primaryColor' => $lp['primary_color'] ?: '#2563eb',
                        'secondaryColor' => $lp['secondary_color'] ?: '#3b82f6',
                        'headingFont' => $lp['font_family'] ?: 'Plus Jakarta Sans',
                        'bodyFont' => $lp['font_family'] ?: 'Inter',
                        'borderRadius' => '8px',
                        'containerWidth' => 'max-w-6xl',
                    ];

                    $stmtInsertSite = $db->prepare("
                        INSERT INTO websites (user_id, title, slug, custom_domain, status, is_published, template_slug, theme_settings, created_at, updated_at)
                        VALUES (?, ?, ?, ?, 'published', 1, ?, ?, ?, ?)
                    ");
                    $userId = $lp['user_id'] ?: 1;
                    $stmtInsertSite->execute([
                        $userId,
                        $lp['full_name'] ?: 'My Portfolio',
                        $slug,
                        $lp['custom_domain'] ?: null,
                        $lp['template'] ?: 'dev-terminal',
                        json_encode($theme, JSON_UNESCAPED_UNICODE),
                        $lp['created_at'],
                        $lp['updated_at']
                    ]);
                    $websiteId = (int)$db->lastInsertId();

                    // Create Home Page
                    $stmtPage = $db->prepare("
                        INSERT INTO pages (website_id, title, slug, is_home, sort_order, is_in_nav)
                        VALUES (?, 'Home', 'home', 1, 0, 1)
                    ");
                    $stmtPage->execute([$websiteId]);
                    $pageId = (int)$db->lastInsertId();

                    // Retrieve legacy skills and projects
                    $skills = [];
                    $projects = [];
                    try {
                        $sStmt = $db->prepare("SELECT * FROM skills WHERE portfolio_id = ?");
                        $sStmt->execute([$lp['id']]);
                        $skills = $sStmt->fetchAll();
                    } catch (\Exception $e) {}

                    try {
                        $pStmt = $db->prepare("SELECT * FROM projects WHERE portfolio_id = ? ORDER BY sort_order ASC");
                        $pStmt->execute([$lp['id']]);
                        $projects = $pStmt->fetchAll();
                    } catch (\Exception $e) {}

                    // Build section schemas
                    $sections = [];

                    // 1. Navbar
                    $navSec = ComponentRegistry::createDefaultSection('navbar');
                    $navSec['props']['brandText'] = $lp['full_name'] ?: 'Portfolio';
                    $sections[] = $navSec;

                    // 2. Hero
                    $heroSec = ComponentRegistry::createDefaultSection('hero');
                    $heroSec['props']['title'] = $lp['full_name'] ?: 'Hello, I am ' . $slug;
                    $heroSec['props']['subtitle'] = $lp['title'] ?: '';
                    $heroSec['props']['description'] = $lp['bio'] ?: '';
                    $heroSec['props']['avatarUrl'] = $lp['profile_image'] ?: '';
                    $sections[] = $heroSec;

                    // 3. Projects
                    if (!empty($projects)) {
                        $projSec = ComponentRegistry::createDefaultSection('projects');
                        $projSec['props']['items'] = [];
                        foreach ($projects as $proj) {
                            $projSec['props']['items'][] = [
                                'id' => 'p_' . $proj['id'],
                                'title' => $proj['project_name'],
                                'description' => $proj['project_description'] ?? '',
                                'tags' => ['Portfolio Project'],
                                'liveUrl' => $proj['project_url'] ?? '',
                                'githubUrl' => $proj['github_url'] ?? '',
                                'imageUrl' => $proj['project_image'] ?? '',
                            ];
                        }
                        $sections[] = $projSec;
                    }

                    // 4. Skills
                    if (!empty($skills)) {
                        $skillSec = ComponentRegistry::createDefaultSection('skills');
                        $skillsList = array_map(function($s) { return $s['skill_name']; }, $skills);
                        $skillSec['props']['categories'] = [
                            ['name' => 'Core Competencies', 'skills' => $skillsList]
                        ];
                        $sections[] = $skillSec;
                    }

                    // 5. Contact & Socials
                    $contactSec = ComponentRegistry::createDefaultSection('contact');
                    $contactSec['props']['email'] = $lp['email_contact'] ?? '';
                    $sections[] = $contactSec;

                    $socSec = ComponentRegistry::createDefaultSection('social');
                    $socSec['props']['links'] = [];
                    if (!empty($lp['github'])) $socSec['props']['links'][] = ['platform' => 'github', 'url' => $lp['github'], 'label' => 'GitHub', 'icon' => 'fa-brands fa-github'];
                    if (!empty($lp['linkedin'])) $socSec['props']['links'][] = ['platform' => 'linkedin', 'url' => $lp['linkedin'], 'label' => 'LinkedIn', 'icon' => 'fa-brands fa-linkedin'];
                    if (!empty($lp['twitter'])) $socSec['props']['links'][] = ['platform' => 'twitter', 'url' => $lp['twitter'], 'label' => 'X / Twitter', 'icon' => 'fa-brands fa-x-twitter'];
                    if (!empty($lp['website'])) $socSec['props']['links'][] = ['platform' => 'website', 'url' => $lp['website'], 'label' => 'Website', 'icon' => 'fa-solid fa-globe'];
                    $sections[] = $socSec;

                    // 6. Footer
                    $sections[] = ComponentRegistry::createDefaultSection('footer');

                    // Store Draft and Published versions
                    $contentJson = json_encode($sections, JSON_UNESCAPED_UNICODE);
                    $stmtVer = $db->prepare("INSERT INTO page_versions (page_id, version_type, content_json) VALUES (?, 'draft', ?), (?, 'published', ?)");
                    $stmtVer->execute([$pageId, $contentJson, $pageId, $contentJson]);

                    $logs[] = "Migrated legacy portfolio #{$lp['id']} -> website #$websiteId ($slug)";
                }
            }
        } catch (\PDOException $e) {
            $logs[] = "Legacy migration note: " . $e->getMessage();
        }

        // 4. Seed 50+ templates if templates table is empty
        try {
            $count = (int)$db->query("SELECT COUNT(*) FROM templates")->fetchColumn();
            if ($count === 0) {
                $allTpls = TemplateRegistry::getAll();
                $stmtTpl = $db->prepare("
                    INSERT INTO templates (slug, name, name_ar, category, description, description_ar, thumbnail, is_featured, is_system, schema_json)
                    VALUES (?, ?, ?, ?, ?, ?, ?, 1, 1, ?)
                ");
                foreach ($allTpls as $tpl) {
                    $stmtTpl->execute([
                        $tpl['slug'],
                        $tpl['name'],
                        $tpl['name_ar'],
                        $tpl['category'],
                        $tpl['description'],
                        $tpl['description_ar'],
                        $tpl['thumbnail'],
                        json_encode($tpl['schema'], JSON_UNESCAPED_UNICODE)
                    ]);
                }
                $logs[] = "Seeded " . count($allTpls) . " system templates successfully.";
            } else {
                $logs[] = "Templates already seeded ($count templates exist).";
            }
        } catch (\PDOException $e) {
            $logs[] = "Template seeding note: " . $e->getMessage();
        }

        return ['success' => true, 'logs' => $logs];
    }

    /**
     * Initialize SQLite database schema and seed default data.
     */
    public static function initSqlite(PDO $db): array {
        $logs = [];

        $db->exec("
            CREATE TABLE IF NOT EXISTS users (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                username VARCHAR(50) UNIQUE NOT NULL,
                email VARCHAR(100) UNIQUE NOT NULL,
                password VARCHAR(255) NOT NULL,
                role VARCHAR(20) DEFAULT 'user',
                status VARCHAR(20) DEFAULT 'active',
                avatar VARCHAR(255) DEFAULT NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
            );

            CREATE TABLE IF NOT EXISTS websites (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                title VARCHAR(200) NOT NULL,
                slug VARCHAR(100) UNIQUE NOT NULL,
                custom_domain VARCHAR(255) UNIQUE DEFAULT NULL,
                status VARCHAR(20) DEFAULT 'published',
                is_published INTEGER DEFAULT 1,
                template_slug VARCHAR(100) DEFAULT 'dev-terminal',
                theme_settings TEXT DEFAULT NULL,
                seo_settings TEXT DEFAULT NULL,
                custom_css TEXT DEFAULT NULL,
                direction VARCHAR(3) DEFAULT 'ltr',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            );

            CREATE TABLE IF NOT EXISTS pages (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                website_id INTEGER NOT NULL,
                title VARCHAR(150) NOT NULL,
                slug VARCHAR(100) NOT NULL,
                is_home INTEGER DEFAULT 0,
                sort_order INTEGER DEFAULT 0,
                is_in_nav INTEGER DEFAULT 1,
                seo_title VARCHAR(255) DEFAULT NULL,
                seo_description TEXT DEFAULT NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                UNIQUE (website_id, slug),
                FOREIGN KEY (website_id) REFERENCES websites(id) ON DELETE CASCADE
            );

            CREATE TABLE IF NOT EXISTS page_versions (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                page_id INTEGER NOT NULL,
                version_type VARCHAR(20) NOT NULL,
                content_json TEXT NOT NULL,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                UNIQUE (page_id, version_type),
                FOREIGN KEY (page_id) REFERENCES pages(id) ON DELETE CASCADE
            );

            CREATE TABLE IF NOT EXISTS templates (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                slug VARCHAR(100) UNIQUE NOT NULL,
                name VARCHAR(150) NOT NULL,
                name_ar VARCHAR(150) NOT NULL,
                category VARCHAR(100) NOT NULL,
                description TEXT DEFAULT NULL,
                description_ar TEXT DEFAULT NULL,
                thumbnail VARCHAR(255) DEFAULT NULL,
                is_featured INTEGER DEFAULT 0,
                is_system INTEGER DEFAULT 1,
                user_id INTEGER DEFAULT NULL,
                schema_json TEXT NOT NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP
            );

            CREATE TABLE IF NOT EXISTS domains (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                website_id INTEGER NOT NULL,
                user_id INTEGER NOT NULL,
                domain VARCHAR(255) UNIQUE NOT NULL,
                verified INTEGER DEFAULT 0,
                verification_token VARCHAR(64) NOT NULL,
                dns_type VARCHAR(10) DEFAULT 'CNAME',
                ssl_status VARCHAR(20) DEFAULT 'pending',
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (website_id) REFERENCES websites(id) ON DELETE CASCADE,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            );

            CREATE TABLE IF NOT EXISTS assets (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                filename VARCHAR(255) NOT NULL,
                original_name VARCHAR(255) NOT NULL,
                file_path VARCHAR(255) NOT NULL,
                file_size INTEGER NOT NULL,
                mime_type VARCHAR(100) NOT NULL,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            );

            CREATE TABLE IF NOT EXISTS analytics_views (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                website_id INTEGER NOT NULL,
                page_id INTEGER DEFAULT NULL,
                ip_address VARCHAR(45) DEFAULT NULL,
                country VARCHAR(100) DEFAULT NULL,
                referer VARCHAR(255) DEFAULT NULL,
                user_agent VARCHAR(255) DEFAULT NULL,
                view_date DATETIME DEFAULT CURRENT_TIMESTAMP
            );

            CREATE TABLE IF NOT EXISTS password_resets (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user_id INTEGER NOT NULL,
                token VARCHAR(64) UNIQUE NOT NULL,
                expires_at DATETIME NOT NULL,
                used INTEGER DEFAULT 0,
                created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
                FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
            );
        ");
        $logs[] = "SQLite core schema verified.";

        // Default Users
        $checkUsers = (int)$db->query("SELECT COUNT(*) FROM users")->fetchColumn();
        if ($checkUsers === 0) {
            $stmtUser = $db->prepare("
                INSERT INTO users (username, email, password, role, status)
                VALUES (?, ?, ?, ?, 'active')
            ");
            // Admin user: admin / admin123
            $stmtUser->execute([
                'admin',
                'admin@craftfolio.com',
                password_hash('admin123', PASSWORD_BCRYPT),
                'admin'
            ]);
            // Demo user: demo / demo123
            $stmtUser->execute([
                'demo',
                'demo@craftfolio.com',
                password_hash('demo123', PASSWORD_BCRYPT),
                'user'
            ]);
            $logs[] = "Created default admin (admin / admin123) and demo (demo / demo123) users.";
        }

        // Seed 52 templates
        $tplCount = (int)$db->query("SELECT COUNT(*) FROM templates")->fetchColumn();
        if ($tplCount === 0) {
            $allTpls = TemplateRegistry::getAll();
            $stmtTpl = $db->prepare("
                INSERT INTO templates (slug, name, name_ar, category, description, description_ar, thumbnail, is_featured, is_system, schema_json)
                VALUES (?, ?, ?, ?, ?, ?, ?, 1, 1, ?)
            ");
            foreach ($allTpls as $tpl) {
                $stmtTpl->execute([
                    $tpl['slug'],
                    $tpl['name'],
                    $tpl['name_ar'],
                    $tpl['category'],
                    $tpl['description'],
                    $tpl['description_ar'],
                    $tpl['thumbnail'],
                    json_encode($tpl['schema'], JSON_UNESCAPED_UNICODE)
                ]);
            }
            $logs[] = "Seeded " . count($allTpls) . " system templates successfully.";
        }

        // Create sample demo website if websites table is empty
        $siteCount = (int)$db->query("SELECT COUNT(*) FROM websites")->fetchColumn();
        if ($siteCount === 0) {
            $demoUserId = (int)$db->query("SELECT id FROM users WHERE username = 'demo'")->fetchColumn() ?: 1;
            
            $tpl = TemplateRegistry::get('dev-terminal') ?: TemplateRegistry::getAll()[0];
            $themeJson = json_encode($tpl['schema']['theme'] ?? [], JSON_UNESCAPED_UNICODE);
            
            $stmtSite = $db->prepare("
                INSERT INTO websites (user_id, title, slug, status, is_published, template_slug, theme_settings)
                VALUES (?, ?, ?, 'published', 1, ?, ?)
            ");
            $stmtSite->execute([
                $demoUserId,
                'Alex Rivera — Senior Systems Engineer',
                'alex-rivera',
                $tpl['slug'],
                $themeJson
            ]);
            $websiteId = (int)$db->lastInsertId();

            $stmtPage = $db->prepare("
                INSERT INTO pages (website_id, title, slug, is_home, sort_order, is_in_nav)
                VALUES (?, 'Home', 'home', 1, 0, 1)
            ");
            $stmtPage->execute([$websiteId]);
            $pageId = (int)$db->lastInsertId();

            $sectionsJson = json_encode($tpl['schema']['sections'] ?? [], JSON_UNESCAPED_UNICODE);
            $stmtVer = $db->prepare("
                INSERT INTO page_versions (page_id, version_type, content_json)
                VALUES (?, 'draft', ?), (?, 'published', ?)
            ");
            $stmtVer->execute([$pageId, $sectionsJson, $pageId, $sectionsJson]);
            $logs[] = "Created sample demo portfolio: /alex-rivera";
        }

        return ['success' => true, 'logs' => $logs];
    }
}
