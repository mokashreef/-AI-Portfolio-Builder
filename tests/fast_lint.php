<?php
$dir = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(__DIR__ . '/..'));
$count = 0;
$errors = 0;

foreach ($dir as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $path = $file->getPathname();
        if (str_contains($path, 'vendor') || str_contains($path, 'scratch')) continue;
        $count++;
        $code = file_get_contents($path);
        try {
            token_get_all($code, TOKEN_PARSE);
        } catch (\ParseError $e) {
            echo "PARSE ERROR in $path: " . $e->getMessage() . PHP_EOL;
            $errors++;
        }
    }
}

echo "Checked $count PHP files. Syntax errors: $errors" . PHP_EOL;
if ($errors === 0) {
    echo "ALL PHP FILES HAVE 100% VALID SYNTAX." . PHP_EOL;
}
