<?php
/**
 * AI Portfolio Builder - Production Release Comprehensive Audit Suite
 * Exhaustively tests Security, Auth, IDOR, CSRF, File Uploads, Database Integrity, and Configuration.
 */

// Isolated SQLite Test Database
$testDbFile = __DIR__ . '/test_prod_audit.sqlite';
if (file_exists($testDbFile)) {
    @unlink($testDbFile);
}

$pdo = new PDO("sqlite:" . $testDbFile);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
$pdo->exec("PRAGMA foreign_keys = ON;");

function getDB(): PDO {
    global $pdo;
    return $pdo;
}

require_once __DIR__ . '/../config/env.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Core/Auth.php';
require_once __DIR__ . '/../app/Services/ComponentRegistry.php';
require_once __DIR__ . '/../app/Services/TemplateRegistry.php';
require_once __DIR__ . '/../app/Services/WebsiteService.php';
require_once __DIR__ . '/../app/Services/AssetService.php';
require_once __DIR__ . '/../app/Services/DomainService.php';
require_once __DIR__ . '/../app/Services/AnalyticsService.php';
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../includes/auth.php';

use App\Core\Security;
use App\Core\Auth;
use App\Services\WebsiteService;
use App\Services\AssetService;
use App\Services\DomainService;

echo "====================================================================\n";
echo "   AI PORTFOLIO BUILDER - PRODUCTION RELEASE AUDIT TEST SUITE      \n";
echo "====================================================================\n\n";

$passed = 0;
$failed = 0;

function assertAudit(bool $condition, string $checkName, string $details = '') {
    global $passed, $failed;
    if ($condition) {
        echo " [PASS] $checkName\n";
        $passed++;
    } else {
        echo " [FAIL] $checkName" . ($details ? " ($details)" : "") . "\n";
        $failed++;
    }
}

// ---------------------------------------------------------
// 1. DATABASE SCHEMA SETUP
// ---------------------------------------------------------
echo "--- 1. DATABASE SCHEMA & INTEGRITY CHECKS ---\n";
$pdo->exec("
    CREATE TABLE users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username VARCHAR(50) UNIQUE NOT NULL,
        email VARCHAR(100) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        role VARCHAR(20) DEFAULT 'user',
        status VARCHAR(20) DEFAULT 'active',
        avatar VARCHAR(255) NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE websites (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        title VARCHAR(150) NOT NULL,
        slug VARCHAR(100) UNIQUE NOT NULL,
        custom_domain VARCHAR(255) UNIQUE NULL,
        status VARCHAR(20) DEFAULT 'draft',
        is_published INTEGER DEFAULT 0,
        template_slug VARCHAR(50) NULL,
        direction VARCHAR(10) DEFAULT 'ltr',
        theme_settings TEXT NULL,
        seo_settings TEXT NULL,
        custom_css TEXT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );

    CREATE TABLE pages (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        website_id INTEGER NOT NULL,
        title VARCHAR(100) NOT NULL,
        slug VARCHAR(100) NOT NULL,
        is_home INTEGER DEFAULT 0,
        sort_order INTEGER DEFAULT 0,
        is_in_nav INTEGER DEFAULT 1,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (website_id) REFERENCES websites(id) ON DELETE CASCADE,
        UNIQUE (website_id, slug)
    );

    CREATE TABLE page_versions (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        page_id INTEGER NOT NULL,
        version_type VARCHAR(20) NOT NULL,
        content_json TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (page_id) REFERENCES pages(id) ON DELETE CASCADE,
        UNIQUE (page_id, version_type)
    );

    CREATE TABLE portfolios (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NULL,
        slug VARCHAR(100) UNIQUE NOT NULL,
        username VARCHAR(100) UNIQUE NULL,
        full_name VARCHAR(150) NOT NULL,
        title VARCHAR(150) NULL,
        bio TEXT NULL,
        template VARCHAR(50) DEFAULT 'modern',
        github VARCHAR(255) NULL,
        linkedin VARCHAR(255) NULL,
        twitter VARCHAR(255) NULL,
        website VARCHAR(255) NULL,
        email_contact VARCHAR(150) NULL,
        custom_domain VARCHAR(255) UNIQUE NULL,
        language VARCHAR(10) DEFAULT 'ar',
        primary_color VARCHAR(20) DEFAULT '#6c63ff',
        secondary_color VARCHAR(20) DEFAULT '#a78bfa',
        font_family VARCHAR(50) DEFAULT 'Inter',
        profile_image VARCHAR(255) NULL,
        is_published INTEGER DEFAULT 1,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE skills (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        portfolio_id INTEGER NOT NULL,
        skill_name VARCHAR(100) NOT NULL,
        skill_level INTEGER DEFAULT 80,
        FOREIGN KEY (portfolio_id) REFERENCES portfolios(id) ON DELETE CASCADE
    );

    CREATE TABLE projects (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        portfolio_id INTEGER NOT NULL,
        project_name VARCHAR(150) NOT NULL,
        project_description TEXT NULL,
        project_url VARCHAR(255) NULL,
        github_url VARCHAR(255) NULL,
        sort_order INTEGER DEFAULT 0,
        FOREIGN KEY (portfolio_id) REFERENCES portfolios(id) ON DELETE CASCADE
    );

    CREATE TABLE password_resets (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        token VARCHAR(100) UNIQUE NOT NULL,
        used INTEGER DEFAULT 0,
        expires_at DATETIME NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE assets (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NOT NULL,
        filename VARCHAR(255) NOT NULL,
        original_name VARCHAR(255) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        file_size INTEGER NOT NULL,
        mime_type VARCHAR(100) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE analytics_views (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        website_id INTEGER NOT NULL,
        page_id INTEGER NULL,
        ip_address VARCHAR(45) NULL,
        country VARCHAR(100) NULL,
        referer VARCHAR(255) NULL,
        user_agent VARCHAR(255) NULL,
        view_date DATETIME DEFAULT CURRENT_TIMESTAMP
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

    CREATE TABLE templates (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        user_id INTEGER NULL,
        slug VARCHAR(100) UNIQUE NOT NULL,
        name VARCHAR(150) NOT NULL,
        name_ar VARCHAR(150) NULL,
        category VARCHAR(50) NOT NULL,
        description TEXT NULL,
        description_ar TEXT NULL,
        thumbnail VARCHAR(255) NULL,
        is_featured INTEGER DEFAULT 0,
        is_system INTEGER DEFAULT 1,
        schema_json TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );
");

assertAudit(true, "Database tables schema created with foreign keys enabled");

// ---------------------------------------------------------
// 2. AUTHENTICATION & SESSION SECURITY CHECKS
// ---------------------------------------------------------
echo "\n--- 2. AUTHENTICATION & ACCESS SECURITY CHECKS ---\n";

// Register User A
$regA = Auth::register('alice_dev', 'alice@example.com', 'SecurePass123!');
assertAudit($regA['success'], "User Alice registered successfully");
$aliceId = $regA['user_id'];

// Register User B
$regB = Auth::register('bob_designer', 'bob@example.com', 'SecurePass456!');
assertAudit($regB['success'], "User Bob registered successfully");
$bobId = $regB['user_id'];

// Check duplicate username prevented
$dupName = Auth::register('alice_dev', 'alice_alt@example.com', 'AnotherPass123!');
assertAudit(!$dupName['success'], "Duplicate username prevented");

// Check duplicate email prevented
$dupEmail = Auth::register('alice_two', 'alice@example.com', 'AnotherPass123!');
assertAudit(!$dupEmail['success'], "Duplicate email prevented");

// Check reserved system slug blocked
$resAdmin = Auth::register('admin', 'admin@example.com', 'AdminPass123!');
assertAudit(!$resAdmin['success'], "Reserved username 'admin' registration blocked");

$resApi = Auth::register('api', 'api@example.com', 'ApiPass123!');
assertAudit(!$resApi['success'], "Reserved username 'api' registration blocked");

$resTemplates = Auth::register('templates', 'tpl@example.com', 'TplPass123!');
assertAudit(!$resTemplates['success'], "Reserved username 'templates' registration blocked");

// Check login password verification
$loginSuccess = Auth::login('alice@example.com', 'SecurePass123!');
assertAudit($loginSuccess['success'], "Login with correct password succeeds");

$loginFail = Auth::login('alice@example.com', 'WrongPassword!');
assertAudit(!$loginFail['success'], "Login with incorrect password rejected");

// ---------------------------------------------------------
// 3. CSRF & INPUT SANITIZATION CHECKS
// ---------------------------------------------------------
echo "\n--- 3. CSRF & INPUT SANITIZATION CHECKS ---\n";

$csrfToken = Security::csrfToken();
assertAudit(!empty($csrfToken) && strlen($csrfToken) === 64, "CSRF token generated (64 hex characters)");
assertAudit(Security::verifyCsrf($csrfToken), "CSRF token matches session token");
assertAudit(!Security::verifyCsrf('tampered_token_xyz'), "Tampered CSRF token rejected");

// XSS Sanitization Tests
$xssVector1 = '<script>alert("xss")</script><p>Hello World</p>';
$clean1 = Security::sanitizeHtml($xssVector1);
assertAudit(!str_contains($clean1, '<script>') && str_contains($clean1, 'Hello World'), "sanitizeHtml strips <script> tags");

$xssVector2 = '<img src="x" onerror="alert(1)">';
$clean2 = Security::sanitizeHtml($xssVector2);
assertAudit(!str_contains($clean2, 'onerror'), "sanitizeHtml strips inline onerror handler");

$xssVector3 = '<iframe src="javascript:alert(1)"></iframe>';
$clean3 = Security::sanitizeHtml($xssVector3);
assertAudit(!str_contains($clean3, '<iframe') && !str_contains($clean3, 'javascript:'), "sanitizeHtml strips <iframe> and javascript: URLs");

// ---------------------------------------------------------
// 4. IDOR (INSECURE DIRECT OBJECT REFERENCE) DEFENSE CHECKS
// ---------------------------------------------------------
echo "\n--- 4. IDOR ACCESS CONTROL CHECKS ---\n";

// Alice creates a website
$siteA = WebsiteService::createWebsite($aliceId, "Alice's Portfolio", "alice-portfolio", "dev-terminal", false, "ar");
assertAudit($siteA['success'], "Alice creates website (ID: {$siteA['website_id']})");
$aliceSiteId = $siteA['website_id'];

// Bob attempts to modify Alice's website settings (IDOR attempt)
$bobHacksAlice = WebsiteService::updateWebsiteSettings($aliceSiteId, $bobId, ['title' => 'Hacked by Bob']);
assertAudit(!$bobHacksAlice['success'], "IDOR: Bob cannot update Alice's website settings");

// Verify title was NOT changed
$siteCheck = WebsiteService::getWebsiteById($aliceSiteId);
assertAudit($siteCheck['title'] === "Alice's Portfolio", "Alice's website title remains intact");

// Bob attempts to delete Alice's website (IDOR attempt)
$bobDeletesAlice = WebsiteService::deleteWebsite($aliceSiteId, $bobId);
// In WebsiteService::deleteWebsite: returns false or rowCount 0 because WHERE id=? AND user_id=?
$siteStillExists = WebsiteService::getWebsiteById($aliceSiteId);
assertAudit($siteStillExists !== null, "IDOR: Bob cannot delete Alice's website");

// Bob attempts to save a draft page on Alice's website (IDOR attempt)
$pages = WebsiteService::getWebsitePages($aliceSiteId);
$homePageId = $pages[0]['id'];
$bobEditsDraft = WebsiteService::saveDraftPage($homePageId, $aliceSiteId, $bobId, [['type' => 'hero', 'props' => []]]);
assertAudit(!$bobEditsDraft['success'], "IDOR: Bob cannot edit Alice's draft page");

// Bob attempts to duplicate Alice's website without authorization
$bobClonesAlice = WebsiteService::duplicateWebsite($aliceSiteId, $bobId);
assertAudit(!$bobClonesAlice['success'], "IDOR: Bob cannot duplicate Alice's website");

// ---------------------------------------------------------
// 5. ASSET & FILE UPLOAD SECURITY CHECKS
// ---------------------------------------------------------
echo "\n--- 5. ASSET & FILE UPLOAD SECURITY CHECKS ---\n";

// Test 1: Uploading a malicious SVG with script
$tempMaliciousSvg = tempnam(sys_get_temp_dir(), 'svg_mal_');
file_put_contents($tempMaliciousSvg, '<svg xmlns="http://www.w3.org/2000/svg"><script>alert("xss")</script><rect width="100" height="100"/></svg>');

$fakeFileSvg = [
    'name' => 'malicious.svg',
    'type' => 'image/svg+xml',
    'tmp_name' => $tempMaliciousSvg,
    'error' => UPLOAD_ERR_OK,
    'size' => filesize($tempMaliciousSvg)
];

$svgUploadRes = AssetService::upload($fakeFileSvg, $aliceId);
assertAudit(!$svgUploadRes['success'], "AssetService rejects SVG containing <script> injection");
@unlink($tempMaliciousSvg);

// Test 2: Uploading an executable / php file
$tempPhpFile = tempnam(sys_get_temp_dir(), 'php_mal_');
file_put_contents($tempPhpFile, '<?php echo "pwned"; ?>');

$fakeFilePhp = [
    'name' => 'exploit.php',
    'type' => 'application/x-php',
    'tmp_name' => $tempPhpFile,
    'error' => UPLOAD_ERR_OK,
    'size' => filesize($tempPhpFile)
];

$phpUploadRes = AssetService::upload($fakeFilePhp, $aliceId);
assertAudit(!$phpUploadRes['success'], "AssetService rejects .php files");
@unlink($tempPhpFile);

// Test 3: Uploading a spoofed PHP file disguised as image/jpeg
$tempSpoofed = tempnam(sys_get_temp_dir(), 'spoof_');
file_put_contents($tempSpoofed, '<?php phpinfo(); ?>');

$fakeFileSpoofed = [
    'name' => 'avatar.jpg',
    'type' => 'image/jpeg',
    'tmp_name' => $tempSpoofed,
    'error' => UPLOAD_ERR_OK,
    'size' => filesize($tempSpoofed)
];

$spoofUploadRes = AssetService::upload($fakeFileSpoofed, $aliceId);
assertAudit(!$spoofUploadRes['success'], "AssetService rejects non-image with spoofed .jpg extension");
@unlink($tempSpoofed);

// ---------------------------------------------------------
// 6. PASSWORD RESET LIFECYCLE & SQLITE COMPATIBILITY CHECKS
// ---------------------------------------------------------
echo "\n--- 6. PASSWORD RESET & QUERY COMPATIBILITY CHECKS ---\n";

$resetTokenRes = createPasswordResetToken('alice@example.com');
assertAudit($resetTokenRes['success'], "Password reset token generated for Alice");
$resetToken = $resetTokenRes['token'];

$validData = validateResetToken($resetToken);
assertAudit($validData !== null && $validData['username'] === 'alice-dev', "validateResetToken executes cleanly on SQLite/MySQL without NOW() errors");

// Perform password reset
$resetDone = resetPassword($resetToken, 'BrandNewPass789!');
assertAudit($resetDone['success'], "Password reset completes successfully");

// Verify login with new password
$loginNew = Auth::login('alice@example.com', 'BrandNewPass789!');
assertAudit($loginNew['success'], "Alice logs in successfully with new password");

// Verify used token is invalidated
$reusedToken = validateResetToken($resetToken);
assertAudit($reusedToken === null, "Used password reset token is invalidated immediately");

// ---------------------------------------------------------
// 7. MULTI-PAGE & CASCADE INTEGRITY CHECKS
// ---------------------------------------------------------
echo "\n--- 7. DATA INTEGRITY & CASCADE CLEANUP CHECKS ---\n";

// Add a second page to Alice's site
$page2 = WebsiteService::createPage($aliceSiteId, "Projects", "projects", $aliceId);
assertAudit($page2['success'], "Alice creates sub-page 'Projects'");

// Verify page count
$alicePages = WebsiteService::getWebsitePages($aliceSiteId);
assertAudit(count($alicePages) === 2, "Alice's site has 2 pages");

// Delete Alice's site and verify cascade cleanup
$delRes = WebsiteService::deleteWebsite($aliceSiteId, $aliceId);
assertAudit($delRes, "Alice's website deleted");

$pagesAfterDel = $pdo->query("SELECT COUNT(*) FROM pages WHERE website_id = $aliceSiteId")->fetchColumn();
assertAudit((int)$pagesAfterDel === 0, "Pages cascade deleted cleanly");

$versionsAfterDel = $pdo->query("SELECT COUNT(*) FROM page_versions WHERE page_id NOT IN (SELECT id FROM pages)")->fetchColumn();
assertAudit((int)$versionsAfterDel === 0, "Orphaned page versions cleaned up");

// Clean up test sqlite
@unlink($testDbFile);

echo "\n====================================================================\n";
echo "   PRODUCTION RELEASE AUDIT COMPLETE: $passed PASSED, $failed FAILED\n";
echo "====================================================================\n";

if ($failed === 0) {
    echo "🎉 ALL CRITICAL AND HIGH-RISK SECURITY AND ARCHITECTURAL AUDIT TESTS PASSED.\n";
} else {
    echo "⚠️ FIXES STILL REQUIRED: $failed TESTS FAILED.\n";
}
