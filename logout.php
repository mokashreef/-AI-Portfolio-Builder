<?php
require_once 'config/database.php';
require_once 'includes/functions.php';
require_once 'includes/auth.php';

logoutUser();
session_start();
redirect(SITE_URL . '/login.php', 'تم تسجيل الخروج بنجاح', 'success');
