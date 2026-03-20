<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="<?= SITE_URL ?>/" class="navbar-logo" style="margin-bottom: var(--space-sm);">
                    <span class="logo-icon">⚡</span>
                    <span>Portfolio<span class="text-gradient">Builder</span></span>
                </a>
                <p>أنشئ موقع Portfolio شخصي احترافي في دقائق، بدون كتابة أي كود. اختر تصميمك، أدخل بياناتك، وأطلق موقعك للعالم.</p>
            </div>
            <div class="footer-col">
                <h4>روابط سريعة</h4>
                <a href="<?= SITE_URL ?>/">الرئيسية</a>
                <a href="<?= SITE_URL ?>/create.php">إنشاء Portfolio</a>
                <a href="<?= SITE_URL ?>/login.php">تسجيل الدخول</a>
                <a href="<?= SITE_URL ?>/register.php">حساب جديد</a>
            </div>
            <div class="footer-col">
                <h4>تواصل معنا</h4>
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
            <p>&copy; <?= date('Y') ?><a href="https://code-elta6ur.com/">جميع الحقوق محفوظة ❤️ منصة كود التطور التعليمية</a></p>
        </div>
    </div>
</footer>

<!-- Main JS -->
<script src="<?= SITE_URL ?>/assets/js/app.js"></script>
<?php if (isset($extraJS)): ?>
    <script src="<?= SITE_URL ?>/assets/js/<?= $extraJS ?>"></script>
<?php endif; ?>
</body>
</html>
