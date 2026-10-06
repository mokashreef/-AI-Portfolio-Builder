<?php
/**
 * CraftFolio - Local Development Server Router (PHP Built-in CLI Server)
 * Usage: php -S 127.0.0.1:8000 router.php
 */

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$path = __DIR__ . $uri;

// Block sensitive files and directories
if (preg_match('#/(app|config|storage|sql|tests|scripts|\.git)(/.*)?$|^\.(env|git|htaccess)|\.(env|sqlite|sqlite3|db|sql|log|ini|sh|bak)$#i', $uri)) {
    http_response_code(403);
    require __DIR__ . '/403.php';
    return true;
}

// 1. If physical static file exists, let the PHP built-in server serve it directly
if ($uri !== '/' && file_exists($path) && !is_dir($path)) {
    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    if ($ext !== 'php') {
        return false; // Built-in server serves css, js, images, fonts, etc.
    }
    // If it's a direct .php file (e.g. /templates.php, /api/save-draft.php), execute it
    $_SERVER['SCRIPT_NAME'] = $uri;
    require $path;
    return true;
}

// 1.5 If file with .php exists (clean URLs like /api/assets, /dashboard)
if (file_exists($path . '.php')) {
    $_SERVER['SCRIPT_NAME'] = $uri . '.php';
    require $path . '.php';
    return true;
}

// 2. Physical directory index check
if (is_dir($path) && file_exists($path . '/index.php')) {
    $_SERVER['SCRIPT_NAME'] = rtrim($uri, '/') . '/index.php';
    require $path . '/index.php';
    return true;
}

// 3. Root landing page
$cleanUri = trim($uri, '/');
if ($cleanUri === '') {
    $_SERVER['SCRIPT_NAME'] = '/index.php';
    require __DIR__ . '/index.php';
    return true;
}

// 4. Exact system clean routes
$systemRoutes = [
    'dashboard'       => 'dashboard.php',
    'templates'       => 'templates.php',
    'editor'          => 'editor.php',
    'login'           => 'login.php',
    'register'        => 'register.php',
    'logout'          => 'logout.php',
    'admin'           => 'admin.php',
    'stats'           => 'stats.php',
    'migrate'         => 'migrate.php',
    'forgot-password' => 'forgot-password.php',
    'reset-password'  => 'reset-password.php',
    'template-preview'=> 'template-preview.php',
];

if (isset($systemRoutes[$cleanUri])) {
    $_SERVER['SCRIPT_NAME'] = '/' . $systemRoutes[$cleanUri];
    require __DIR__ . '/' . $systemRoutes[$cleanUri];
    return true;
}

// 5. Pattern matching for parameterized system routes
if (preg_match('#^editor/([0-9]+)$#', $cleanUri, $matches)) {
    $_GET['id'] = $matches[1];
    $_SERVER['SCRIPT_NAME'] = '/editor.php';
    require __DIR__ . '/editor.php';
    return true;
}

if (preg_match('#^stats/([0-9]+)$#', $cleanUri, $matches)) {
    $_GET['id'] = $matches[1];
    $_SERVER['SCRIPT_NAME'] = '/stats.php';
    require __DIR__ . '/stats.php';
    return true;
}

// 6. User Portfolio routes
$reserved = [
    'admin', 'administrator', 'login', 'signin', 'register', 'signup',
    'logout', 'signout', 'dashboard', 'editor', 'builder', 'create',
    'api', 'app', 'assets', 'static', 'public', 'storage', 'uploads',
    'templates', 'template', 'themes', 'marketplace', 'explore',
    'settings', 'account', 'profile', 'support', 'help', 'docs',
    'about', 'pricing', 'contact', 'terms', 'privacy', 'legal',
    'status', 'stats', 'analytics', 'domain', 'domains', 'export',
    'download', 'preview', 'view', 'site', 'sites', 'portfolio',
    'migrate', 'forgot-password', 'reset-password'
];

// Multi-page: /{slug}/{page_slug}
if (preg_match('#^([a-zA-Z0-9_\-]+)/([a-zA-Z0-9_\-]+)$#', $cleanUri, $matches)) {
    $siteSlug = $matches[1];
    $pageSlug = $matches[2];
    if (!in_array(strtolower($siteSlug), $reserved, true)) {
        $_GET['slug'] = $siteSlug;
        $_GET['page'] = $pageSlug;
        $_SERVER['SCRIPT_NAME'] = '/portfolio.php';
        require __DIR__ . '/portfolio.php';
        return true;
    }
}

// Single-page root: /{slug}
if (preg_match('#^([a-zA-Z0-9_\-]+)$#', $cleanUri, $matches)) {
    $siteSlug = $matches[1];
    if (!in_array(strtolower($siteSlug), $reserved, true)) {
        $_GET['slug'] = $siteSlug;
        $_SERVER['SCRIPT_NAME'] = '/portfolio.php';
        require __DIR__ . '/portfolio.php';
        return true;
    }
}

// 404 Fallback
http_response_code(404);
$_SERVER['SCRIPT_NAME'] = '/404.php';
require __DIR__ . '/404.php';
return true;
