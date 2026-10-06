<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/app/Core/Auth.php';

use App\Core\Auth;

Auth::logout();
header("Location: " . SITE_URL . "/login.php");
exit;
