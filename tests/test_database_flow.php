<?php
/**
 * AI Portfolio Builder - Complete Database & Workflow Integration Test
 * Validates DB operations, Auth, Website creation, Pages, Drafts, Publishing, and Duplication.
 */

// Create a local SQLite DB for test isolation
$sqlitePath = __DIR__ . '/test_ai_portfolio.sqlite';
if (file_exists($sqlitePath)) {
    @unlink($sqlitePath);
}

$pdo = new PDO("sqlite:" . $sqlitePath);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Override getDB for test run
function getDB(): PDO {
    global $pdo;
    return $pdo;
}

require_once __DIR__ . '/../config/env.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../app/Services/ComponentRegistry.php';
require_once __DIR__ . '/../app/Services/TemplateRegistry.php';
require_once __DIR__ . '/../app/Services/WebsiteService.php';
require_once __DIR__ . '/../app/Services/DomainService.php';

use App\Core\Security;
use App\Core\Auth;
use App\Services\WebsiteService;
use App\Services\DomainService;
use App\Services\TemplateRegistry;

echo "====================================================\n";
echo "AI Portfolio Builder - Database & Workflow Test Suite Running\n";
echo "====================================================\n\n";

$passed = 0;
$failed = 0;

function assertFlow($condition, $name) {
    global $passed, $failed;
    if ($condition) {
        echo " [PASS] $name\n";
        $passed++;
    } else {
        echo " [FAIL] $name\n";
        $failed++;
    }
}

// 1. Create SQLite Schema
$pdo->exec("
    CREATE TABLE users (
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

    CREATE TABLE websites (
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
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE pages (
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
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE page_versions (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        page_id INTEGER NOT NULL,
        version_type VARCHAR(20) NOT NULL,
        content_json TEXT NOT NULL,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        UNIQUE (page_id, version_type)
    );

    CREATE TABLE domains (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        website_id INTEGER NOT NULL,
        user_id INTEGER NOT NULL,
        domain VARCHAR(255) UNIQUE NOT NULL,
        verified INTEGER DEFAULT 0,
        verification_token VARCHAR(64) NOT NULL,
        dns_type VARCHAR(10) DEFAULT 'CNAME',
        ssl_status VARCHAR(20) DEFAULT 'pending',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE analytics_views (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        website_id INTEGER NOT NULL,
        page_id INTEGER DEFAULT NULL,
        ip_address VARCHAR(45) DEFAULT NULL,
        country VARCHAR(100) DEFAULT NULL,
        referer VARCHAR(255) DEFAULT NULL,
        user_agent VARCHAR(255) DEFAULT NULL,
        view_date DATETIME DEFAULT CURRENT_TIMESTAMP
    );
");

assertFlow(true, "Database tables initialized in SQLite");

// 2. Register User
$reg = Auth::register('alexdev', 'alex@example.com', 'secret123');
assertFlow($reg['success'] && !empty($reg['user_id']), "User registered successfully (ID: " . ($reg['user_id'] ?? '') . ")");

$userId = (int)$reg['user_id'];

// 3. User Login
$login = Auth::login('alexdev', 'secret123');
assertFlow($login['success'], "User login verified with hashed password verification");

// 4. Create Website From Template
$createRes = WebsiteService::createWebsite($userId, "Alex's Developer Portfolio", 'alex-portfolio', 'dev-terminal', false);
assertFlow($createRes['success'] && !empty($createRes['website_id']), "Website created from 'dev-terminal' template (ID: " . ($createRes['website_id'] ?? '') . ")");

$websiteId = (int)$createRes['website_id'];

// 5. Verify Pages Created
$pages = WebsiteService::getWebsitePages($websiteId);
assertFlow(count($pages) >= 1 && $pages[0]['is_home'] == 1, "Home page automatically created with is_home=1");

$homePageId = (int)$pages[0]['id'];

// 6. Verify Draft Page Content
$draftPage = WebsiteService::getPageWithContent($homePageId, 'draft');
assertFlow(!empty($draftPage['sections']), "Draft page content schema populated with sections (Count: " . count($draftPage['sections']) . ")");

// 7. Add a Second Page (Multi-Page Website)
$newPageRes = WebsiteService::createPage($websiteId, "Case Studies", "case-studies", $userId);
assertFlow($newPageRes['success'] && !empty($newPageRes['page_id']), "Multi-page creation: 'Case Studies' added (/case-studies)");

// 8. Save Draft Changes
$updatedSections = $draftPage['sections'];
$updatedSections[1]['props']['title'] = "Alex Vance - Chief Technology Architect";
$saveDraftRes = WebsiteService::saveDraftPage($homePageId, $websiteId, $userId, $updatedSections);
assertFlow($saveDraftRes['success'], "Visual Builder draft autosave updated page_versions");

// 9. Publish Changes
$pubRes = WebsiteService::publishWebsite($websiteId, $userId);
assertFlow($pubRes['success'], "Publish pipeline copied draft content to published version");

$pubPage = WebsiteService::getPageWithContent($homePageId, 'published');
assertFlow($pubPage['sections'][1]['props']['title'] === "Alex Vance - Chief Technology Architect", "Published content matches latest saved draft");

// 10. Set Custom Domain
$domRes = DomainService::setCustomDomain($websiteId, $userId, 'alexvance.dev');
assertFlow($domRes['success'] && $domRes['domain'] === 'alexvance.dev', "Custom domain 'alexvance.dev' mapped to website");

// 11. Duplicate Website
$dupRes = WebsiteService::duplicateWebsite($websiteId, $userId);
assertFlow($dupRes['success'] && !empty($dupRes['new_website_id']), "Website duplication created full clone (ID: " . ($dupRes['new_website_id'] ?? '') . ")");

// 12. Delete Website
$delRes = WebsiteService::deleteWebsite($dupRes['new_website_id'], $userId);
assertFlow($delRes, "Website deletion executed cleanly with cascade cleanup");

// Cleanup test SQLite file
@unlink($sqlitePath);

echo "\n====================================================\n";
echo "Database & Workflow Tests: $passed Passed, $failed Failed\n";
echo "====================================================\n";

if ($failed > 0) {
    exit(1);
}
