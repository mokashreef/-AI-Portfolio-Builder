<?php
/**
 * CraftFolio - Database & App Configuration
 */

require_once __DIR__ . '/env.php';

// Production Error & Security Headers Configuration
$isProduction = (env('APP_ENV', 'production') === 'production');
$debug = (bool)env('APP_DEBUG', !$isProduction);

if (!$debug) {
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
} else {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

if (!headers_sent()) {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('X-XSS-Protection: 1; mode=block');
    header('Referrer-Policy: strict-origin-when-cross-origin');
}

// Session Security Configuration
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.cookie_httponly', 1);
    ini_set('session.use_only_cookies', 1);
    ini_set('session.cookie_samesite', 'Lax');
    if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') {
        ini_set('session.cookie_secure', 1);
    }
    session_start();
}

// Database Connection Type & Paths
defined('DB_CONNECTION') or define('DB_CONNECTION', env('DB_CONNECTION', 'auto'));
defined('DB_SQLITE_PATH') or define('DB_SQLITE_PATH', env('DB_SQLITE_PATH', __DIR__ . '/../storage/database.sqlite'));

// Database Credentials from Environment (MySQL)
defined('DB_HOST') or define('DB_HOST', env('DB_HOST', 'localhost'));
defined('DB_NAME') or define('DB_NAME', env('DB_NAME', 'portfolio_builder'));
defined('DB_USER') or define('DB_USER', env('DB_USER', 'root'));
defined('DB_PASS') or define('DB_PASS', env('DB_PASS', ''));
defined('DB_CHARSET') or define('DB_CHARSET', env('DB_CHARSET', 'utf8mb4'));

// Site Configuration
defined('SITE_NAME') or define('SITE_NAME', env('APP_NAME', 'AI Portfolio Builder'));

// Dynamically determine SITE_URL if not hardcoded, while respecting host & protocol
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || ($_SERVER['SERVER_PORT'] ?? 80) == 443) ? 'https://' : 'http://';
$currentHost = $_SERVER['HTTP_HOST'] ?? '';
$isLocalhost = (strpos($currentHost, 'localhost') !== false || strpos($currentHost, '127.0.0.1') !== false || php_sapi_name() === 'cli-server');

if ($isLocalhost && !empty($currentHost)) {
    $siteUrl = $protocol . $currentHost;
} else {
    $siteUrl = env('APP_URL', $protocol . ($currentHost ?: 'portfolio.code-elta6ur.net'));
}
defined('SITE_URL') or define('SITE_URL', rtrim($siteUrl, '/'));

defined('UPLOAD_DIR') or define('UPLOAD_DIR', __DIR__ . '/../assets/uploads/');

require_once __DIR__ . '/../app/Core/I18n.php';

if (!function_exists('__t')) {
    function __t(string $key, array $params = [], string $default = ''): string {
        return \App\Core\I18n::t($key, $params, $default);
    }
}

/**
 * Returns a configured PDO database connection instance.
 * Automatically connects to MySQL if available, or falls back to SQLite for local development.
 */
if (!function_exists('getDB')) {
function getDB(): PDO {
    static $pdo = null;
    if ($pdo !== null) {
        return $pdo;
    }

    $connection = DB_CONNECTION;

    // Helper closure to create and initialize SQLite
    $connectSqlite = function(): PDO {
        $sqlitePath = DB_SQLITE_PATH;
        $sqliteDir = dirname($sqlitePath);
        if (!is_dir($sqliteDir)) {
            mkdir($sqliteDir, 0777, true);
        }
        $isNew = !file_exists($sqlitePath) || filesize($sqlitePath) === 0;
        $sqlitePdo = new PDO("sqlite:" . $sqlitePath);
        $sqlitePdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sqlitePdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $sqlitePdo->exec("PRAGMA foreign_keys = ON;");

        // If new or uninitialized, run initial migration & seeding
        try {
            $sqlitePdo->query("SELECT 1 FROM users LIMIT 1");
        } catch (\PDOException $e) {
            $isNew = true;
        }

        if ($isNew) {
            require_once __DIR__ . '/../app/Services/ComponentRegistry.php';
            require_once __DIR__ . '/../app/Services/TemplateRegistry.php';
            require_once __DIR__ . '/../app/Core/Migrator.php';
            \App\Core\Migrator::initSqlite($sqlitePdo);
        }
        return $sqlitePdo;
    };

    if ($connection === 'sqlite') {
        $pdo = $connectSqlite();
        return $pdo;
    }

    if ($connection === 'mysql') {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
            ]);
            return $pdo;
        } catch (PDOException $e) {
            error_log("MySQL connection error: " . $e->getMessage());
            if (env('APP_DEBUG', false)) {
                die("Database Connection Failed: " . htmlspecialchars($e->getMessage()));
            } else {
                die("Could not connect to database. Please check configuration.");
            }
        }
    }

    // Auto mode: Check if local MySQL port is open first, else immediately use SQLite
    $mysqlAvailable = false;
    if (DB_HOST === 'localhost' || DB_HOST === '127.0.0.1') {
        $sock = @fsockopen(DB_HOST, 3306, $errno, $errstr, 0.15);
        if ($sock) {
            $mysqlAvailable = true;
            fclose($sock);
        }
    } else {
        $mysqlAvailable = true;
    }

    if ($mysqlAvailable) {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            $pdo = new PDO($dsn, DB_USER, DB_PASS, [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
                PDO::ATTR_TIMEOUT            => 1,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
            ]);
            return $pdo;
        } catch (PDOException $e) {
            error_log("MySQL unreachable (" . $e->getMessage() . "), falling back to SQLite.");
        }
    }

    // Fallback to SQLite
    $pdo = $connectSqlite();
    return $pdo;
}
}
