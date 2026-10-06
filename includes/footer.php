<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="<?= SITE_URL ?>/" class="navbar-logo" style="margin-bottom: var(--space-sm);">
                    <span class="logo-icon">⚡</span>
                    <span>AI Portfolio <span class="text-gradient">Builder</span></span>
                </a>
                <p><?= I18n::t('app_tagline') ?></p>
            </div>
            <div class="footer-col">
                <h4><?= I18n::locale() === 'ar' ? 'روابط سريعة' : 'Quick Links' ?></h4>
                <a href="<?= SITE_URL ?>/"><?= I18n::t('nav.home') ?></a>
                <a href="<?= SITE_URL ?>/templates.php"><?= I18n::t('nav.templates') ?></a>
                <a href="<?= SITE_URL ?>/login.php"><?= I18n::t('nav.login') ?></a>
                <a href="<?= SITE_URL ?>/register.php"><?= I18n::t('nav.register') ?></a>
            </div>
            <div class="footer-col">
                <h4><?= I18n::locale() === 'ar' ? 'تواصل معنا' : 'Connect' ?></h4>
                <a href="#">
                    <i class="fab fa-github" style="margin-left: 8px;"></i>GitHub
                </a>
                <a href="#">
                    <i class="fab fa-twitter" style="margin-left: 8px;"></i>Twitter
                </a>
                <a href="#">
                    <i class="fab fa-linkedin" style="margin-left: 8px;"></i>LinkedIn
                </a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; <?= date('Y') ?> <a href="<?= SITE_URL ?>/" target="_blank" style="color: inherit; text-decoration: none;"><?= SITE_NAME ?></a></p>
        </div>
    </div>
</footer>

<!-- Main JS -->
<script src="<?= SITE_URL ?>/assets/js/app.js?v=<?= time() ?>"></script>
<?php if (isset($extraJS)): ?>
    <script src="<?= SITE_URL ?>/assets/js/<?= $extraJS ?>?v=<?= time() ?>"></script>
<?php endif; ?>
</body>
</html>
