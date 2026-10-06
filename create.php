<?php
// Forward legacy create route to dashboard or templates
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Core/Auth.php';

use App\Core\Auth;

if (!Auth::check()) {
    header("Location: " . SITE_URL . "/templates.php");
} else {
    header("Location: " . SITE_URL . "/dashboard.php");
}
exit;
