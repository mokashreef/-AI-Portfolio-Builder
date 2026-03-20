<?php
$pageTitle = 'حساب جديد - AI Portfolio Builder';
require_once 'includes/header.php';

if (isLoggedIn()) {
    redirect(SITE_URL . '/dashboard.php');
}
?>

<section class="section" style="min-height: 100vh; display: flex; align-items: center; padding-top: 100px;">
    <div class="container" style="max-width: 480px;">
        <div class="card" style="padding: var(--space-3xl);">
            <div style="text-align: center; margin-bottom: var(--space-2xl);">
                <div style="font-size: 2.5rem; margin-bottom: var(--space-md);">🚀</div>
                <h1 style="font-size: 1.8rem; margin-bottom: var(--space-sm);">إنشاء حساب جديد</h1>
                <p style="color: var(--text-secondary);">سجل الآن وابدأ ببناء Portfolio احترافي</p>
            </div>

            <form id="registerForm" method="POST" action="api/register.php">
                <div class="form-group">
                    <label class="form-label" for="username">
                        <i class="fas fa-user" style="margin-left: 6px;"></i>اسم المستخدم
                    </label>
                    <input type="text" id="username" name="username" class="form-input"
                           placeholder="مثال: ahmed_dev" required minlength="3" maxlength="50"
                           pattern="[a-zA-Z0-9_]+" title="يسمح فقط بالحروف الإنجليزية والأرقام والشرطة السفلية">
                </div>

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
                           placeholder="6 أحرف على الأقل" required minlength="6">
                </div>

                <div class="form-group">
                    <label class="form-label" for="confirm_password">
                        <i class="fas fa-shield-alt" style="margin-left: 6px;"></i>تأكيد كلمة المرور
                    </label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-input"
                           placeholder="أعد كتابة كلمة المرور" required minlength="6">
                </div>

                <button type="submit" class="btn btn-primary btn-lg" style="width: 100%; margin-top: var(--space-md);">
                    <i class="fas fa-user-plus"></i>
                    إنشاء حساب
                </button>
            </form>

            <div style="text-align: center; margin-top: var(--space-xl); color: var(--text-secondary);">
                لديك حساب بالفعل؟
                <a href="login.php" style="color: var(--primary-light); font-weight: 600;">سجل دخولك</a>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('registerForm').addEventListener('submit', function(e) {
        const pass = document.getElementById('password').value;
        const confirm = document.getElementById('confirm_password').value;
        if (pass !== confirm) {
            e.preventDefault();
            alert('كلمة المرور غير متطابقة!');
        }
    });
</script>

<?php require_once 'includes/footer.php'; ?>
