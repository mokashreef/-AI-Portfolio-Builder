<?php
/**
 * CraftFolio - Migration Runner
 * Accessible via CLI (php migrate.php) or web by authorized admin.
 */

require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Core/Security.php';
require_once __DIR__ . '/app/Core/Auth.php';
require_once __DIR__ . '/app/Services/ComponentRegistry.php';
require_once __DIR__ . '/app/Services/TemplateRegistry.php';
require_once __DIR__ . '/app/Core/Migrator.php';

use App\Core\Migrator;
use App\Core\Auth;

$isCli = (php_sapi_name() === 'cli');

if (!$isCli) {
    Auth::requireAdmin();
}

echo $isCli ? "CraftFolio Database Migration Running...\n" : "<h2>CraftFolio Database Migration Running...</h2><pre>";

try {
    $result = Migrator::run();
    foreach ($result['logs'] as $log) {
        echo ($isCli ? "[OK] $log\n" : "<p style='color:green;'>✅ " . htmlspecialchars($log) . "</p>");
    }
    echo $isCli ? "\nMigration completed successfully!\n" : "<h3>🎉 Migration Completed Successfully!</h3><a href='index.php'>Go to Homepage</a></pre>";
} catch (Exception $e) {
    echo $isCli ? "\nError: " . $e->getMessage() . "\n" : "<p style='color:red;'>❌ Error: " . htmlspecialchars($e->getMessage()) . "</p></pre>";
}
