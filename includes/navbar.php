<?php
/**
 * Navbar Component
 */
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
?>
<nav class="navbar" id="navbar">
    <div class="container">
        <a href="<?= SITE_URL ?>/" class="navbar-logo">
            <span class="logo-icon"><i class="fa-solid fa-layer-group"></i></span>
            <span>AI Portfolio <span class="text-gradient">Builder</span></span>
        </a>

        <div class="navbar-links" id="navLinks">
            <a href="<?= SITE_URL ?>/" class="<?= $currentPage === 'index' ? 'active' : '' ?>"><?= I18n::t('nav.home') ?></a>
            <a href="<?= SITE_URL ?>/templates.php" class="<?= $currentPage === 'templates' ? 'active' : '' ?>"><?= I18n::t('nav.templates') ?></a>
            <?php if (isLoggedIn()): ?>
                <a href="<?= SITE_URL ?>/dashboard.php" class="<?= $currentPage === 'dashboard' ? 'active' : '' ?>"><?= I18n::t('nav.dashboard') ?></a>
            <?php endif; ?>
        </div>

        <div class="navbar-actions">
            <!-- Language Switcher -->
            <?php
            $currentPlatformLang = I18n::locale();
            $toggleLang = $currentPlatformLang === 'ar' ? 'en' : 'ar';
            $toggleText = $currentPlatformLang === 'ar' ? 'English (LTR)' : 'العربية (RTL)';
            $currentPageUrl = $_SERVER['REQUEST_URI'];
            $langUrl = strpos($currentPageUrl, '?') !== false ? $currentPageUrl . '&lang=' . $toggleLang : $currentPageUrl . '?lang=' . $toggleLang;
            ?>
            <a href="<?= $langUrl ?>" class="btn btn-sm btn-outline" style="margin-right: 8px; margin-left: 8px; padding: 0.3rem 0.6rem;">
                <i class="fas fa-globe"></i> <?= $toggleText ?>
            </a>

            <?php if (isLoggedIn()): ?>
                <?php $user = getCurrentUser(); ?>
                <span class="navbar-user" style="color: var(--text-secondary); font-size: 0.9rem; margin-left: 10px; margin-right: 10px;">
                    <?= clean($user['username'] ?? '') ?>
                </span>
                <a href="<?= SITE_URL ?>/logout.php" class="btn btn-sm btn-outline"><?= I18n::t('nav.logout') ?></a>
            <?php else: ?>
                <a href="<?= SITE_URL ?>/login.php" class="btn btn-sm btn-outline"><?= I18n::t('nav.login') ?></a>
                <a href="<?= SITE_URL ?>/register.php" class="btn btn-sm btn-primary"><?= I18n::t('nav.register') ?></a>
            <?php endif; ?>
        </div>

        <div class="menu-toggle" id="menuToggle" onclick="document.getElementById('navLinks').classList.toggle('active')">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</nav>
