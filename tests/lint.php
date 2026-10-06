<?php
$files = glob('{,*/,*/*/,*/*/*/}*.php', GLOB_BRACE);
$errors = 0;
$checked = 0;

foreach ($files as $file) {
    if (str_contains($file, 'vendor/')) continue;
    $checked++;
    exec("php -l " . escapeshellarg($file) . " 2>&1", $output, $returnCode);
    if ($returnCode !== 0) {
        echo "SYNTAX ERROR in $file: " . implode("\n", $output) . "\n";
        $errors++;
    }
    $output = [];
}

echo "Total PHP files checked: $checked\n";
echo "Total syntax errors: $errors\n";
if ($errors === 0) {
    echo "ALL PHP FILES ARE 100% CLEAN SYNTAX.\n";
}
