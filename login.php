<?php
$pageTitle = 'تسجيل الدخول - AI Portfolio Builder';
require_once 'includes/header.php';

if (isLoggedIn()) {
    redirect(SITE_URL . '/dashboard.php');
}
?>

<section class="section" style="min-height: 100vh; display: flex; align-items: center; padding-top: 100px;">
    <div class="container" style="max-width: 480px;">
        <div class="card" style="padding: var(--space-3xl);">
            <div style="text-align: center; margin-bottom: var(--space-2xl);">
                <div style="font-size: 2.5rem; margin-bottom: var(--space-md);">👋</div>
                <h1 style="font-size: 1.8rem; margin-bottom: var(--space-sm);">مرحبًا بعودتك</h1>
                <p style="color: var(--text-secondary);">سجل دخولك للوصول إلى portfolios الخاصة بك</p>
            </div>

            <form id="loginForm" method="POST" action="api/login.php">
                <div class="form-group">
                    <label class="form-label" for="email">
                        <i class="fas fa-envelope" style="margin-left: 6px;"></i>البريد الإلكتروني
                    </label>
                    <input type="email" id="email" name="email" class="form-input"
                           placeholder="example@email.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="password">
                        <i class="fas fa-lock" style="margin-left: 6px;"></i>كلمة المرور
                    </label>
                    <input type="password" id="password" name="password" class="form-input"
                           placeholder="••••••••" required minlength="6">
                </div>

                <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; margin-top: var(--space-md);">
                    <i class="fas fa-sign-in-alt"></i>
                    تسجيل الدخول
                </button>
            </form>

            <div style="text-align: center; margin-top: var(--space-xl); color: var(--text-secondary);">
                ليس لديك حساب؟
                <a href="register.php" style="color: var(--primary-light); font-weight: 600;">سجل الآن</a>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
