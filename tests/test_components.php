<?php
/**
 * AI Portfolio Builder - Component & Template Integrity Test Suite
 */

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../app/Core/Security.php';
require_once __DIR__ . '/../app/Services/ComponentRegistry.php';
require_once __DIR__ . '/../app/Services/TemplateRegistry.php';

use App\Core\Security;
use App\Services\ComponentRegistry;
use App\Services\TemplateRegistry;

echo "====================================================\n";
echo "AI Portfolio Builder - Component & Template Test Suite Running\n";
echo "====================================================\n\n";

$passed = 0;
$failed = 0;

function assertTest($condition, $name) {
    global $passed, $failed;
    if ($condition) {
        echo " [PASS] $name\n";
        $passed++;
    } else {
        echo " [FAIL] $name\n";
        $failed++;
    }
}

// TEST 1: Component Registry Sections Available
$sections = ComponentRegistry::getAvailableSections();
assertTest(count($sections) >= 16, "ComponentRegistry exposes 16+ modular sections (Found: " . count($sections) . ")");

// TEST 2: Every Section Renders Valid HTML
$theme = [
    'primaryColor' => '#2563eb',
    'secondaryColor' => '#3b82f6',
    'backgroundColor' => '#ffffff',
    'textColor' => '#0f172a',
    'headingFont' => 'Plus Jakarta Sans',
    'bodyFont' => 'Inter',
    'borderRadius' => '8px',
    'containerWidth' => 'max-w-6xl'
];

foreach ($sections as $secDef) {
    $sec = ComponentRegistry::createDefaultSection($secDef['type']);
    $html = ComponentRegistry::renderSection($sec, $theme, false);
    assertTest(!empty($html) && str_contains($html, '<section'), "Section '{$secDef['type']}' renders valid HTML");
}

// TEST 3: 50+ Curated Templates Catalog Check
$templates = TemplateRegistry::getAll();
assertTest(count($templates) >= 50, "TemplateRegistry provides 50+ production templates (Found: " . count($templates) . ")");

// TEST 4: Template Slugs are Unique
$slugs = [];
$duplicates = [];
foreach ($templates as $t) {
    if (in_array($t['slug'], $slugs, true)) {
        $duplicates[] = $t['slug'];
    }
    $slugs[] = $t['slug'];
}
assertTest(empty($duplicates), "All template slugs are strictly unique (Duplicates: " . implode(', ', $duplicates) . ")");

// TEST 5: Every Template Has Valid Theme & Pages Schema
$validSchemas = true;
foreach ($templates as $t) {
    if (empty($t['theme']) || empty($t['schema']['pages']) || empty($t['schema']['pages'][0]['sections'])) {
        $validSchemas = false;
        echo " Invalid schema in template: " . $t['slug'] . "\n";
    }
}
assertTest($validSchemas, "All 52 templates have complete, valid JSON schemas with theme tokens and starter sections");

// TEST 6: Reserved Slugs Enforcement
$adminCheck = Security::validateSlug('admin');
$dashCheck = Security::validateSlug('dashboard');
$apiCheck = Security::validateSlug('api');
$editorCheck = Security::validateSlug('editor');
$validUserCheck = Security::validateSlug('alex-vance');

assertTest(!$adminCheck['valid'], "Reserved slug 'admin' is blocked");
assertTest(!$dashCheck['valid'], "Reserved slug 'dashboard' is blocked");
assertTest(!$apiCheck['valid'], "Reserved slug 'api' is blocked");
assertTest(!$editorCheck['valid'], "Reserved slug 'editor' is blocked");
assertTest($validUserCheck['valid'] && $validUserCheck['slug'] === 'alex-vance', "Valid slug 'alex-vance' is accepted");

// TEST 7: XSS Sanitization
$dangerous = '<script>alert(1)</script><div onload="malicious()">Safe Text</div><iframe src="evil.com"></iframe>';
$sanitized = Security::sanitizeHtml($dangerous);
assertTest(!str_contains($sanitized, '<script>') && !str_contains($sanitized, '<iframe') && !str_contains($sanitized, 'onload='), "Security::sanitizeHtml safely strips script tags, iframes, and onload handlers");

echo "\n====================================================\n";
echo "Tests Finished: $passed Passed, $failed Failed\n";
echo "====================================================\n";

if ($failed > 0) {
    exit(1);
}
