<?php
// Forward legacy explore route to modern templates marketplace
require_once __DIR__ . '/config/database.php';
header("Location: " . SITE_URL . "/templates.php");
exit;
