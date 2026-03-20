<?php
/**
 * Navbar Component
 */
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<nav class="navbar" id="navbar">
    <div class="container">
        <a href="<?= SITE_URL ?>/" class="navbar-logo">
            <span class="logo-icon">⚡</span>
            <span>Portfolio<span class="text-gradient">Builder</span></span>
        </a>

        <div class="navbar-links" id="navLinks">
            <a href="<?= SITE_URL ?>/" class="<?= $currentPage === 'index' ? 'active' : '' ?>">الرئيسية</a>
            <a href="<?= SITE_URL ?>/create.php">إنشاء Portfolio</a>
            <?php if (isLoggedIn()): ?>
                <a href="<?= SITE_URL ?>/dashboard.php" class="<?= $currentPage === 'dashboard' ? 'active' : '' ?>">لوحة التحكم</a>
            <?php endif; ?>
        </div>

        <div class="navbar-actions">
            <?php if (isLoggedIn()): ?>
                <?php $user = getCurrentUser(); ?>
                <span style="color: var(--text-secondary); font-size: 0.9rem;">مرحبًا، <?= clean($user['username'] ?? '') ?></span>
                <a href="<?= SITE_URL ?>/logout.php" class="btn btn-sm btn-outline">خروج</a>
            <?php else: ?>
                <a href="<?= SITE_URL ?>/login.php" class="btn btn-sm btn-outline">دخول</a>
                <a href="<?= SITE_URL ?>/register.php" class="btn btn-sm btn-primary">تسجيل</a>
            <?php endif; ?>
        </div>

        <div class="menu-toggle" id="menuToggle" onclick="document.getElementById('navLinks').classList.toggle('active')">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>
