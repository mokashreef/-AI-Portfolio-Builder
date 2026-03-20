<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($portfolio['full_name']) ?> - Portfolio</title>
    <meta name="description" content="<?= htmlspecialchars($portfolio['bio'] ?? '') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>/templates/modern/style.css">
</head>
<body>

<!-- Hero -->
<header class="modern-hero">
    <div class="modern-container">
        <div class="hero-avatar">
            <?= strtoupper(mb_substr($portfolio['full_name'], 0, 1, 'UTF-8')) ?>
        </div>
        <h1 class="hero-name"><?= htmlspecialchars($portfolio['full_name']) ?></h1>
        <?php if ($portfolio['title']): ?>
            <p class="hero-title"><?= htmlspecialchars($portfolio['title']) ?></p>
        <?php endif; ?>
        <?php if ($portfolio['bio']): ?>
            <p class="hero-bio"><?= nl2br(htmlspecialchars($portfolio['bio'])) ?></p>
        <?php endif; ?>

        <div class="hero-links">
            <?php if ($portfolio['github']): ?>
                <a href="<?= htmlspecialchars($portfolio['github']) ?>" target="_blank" class="social-link"><i class="fab fa-github"></i></a>
            <?php endif; ?>
            <?php if ($portfolio['linkedin']): ?>
                <a href="<?= htmlspecialchars($portfolio['linkedin']) ?>" target="_blank" class="social-link"><i class="fab fa-linkedin"></i></a>
            <?php endif; ?>
            <?php if ($portfolio['twitter']): ?>
                <a href="<?= htmlspecialchars($portfolio['twitter']) ?>" target="_blank" class="social-link"><i class="fab fa-twitter"></i></a>
            <?php endif; ?>
            <?php if ($portfolio['website']): ?>
                <a href="<?= htmlspecialchars($portfolio['website']) ?>" target="_blank" class="social-link"><i class="fas fa-globe"></i></a>
            <?php endif; ?>
            <?php if ($portfolio['email_contact']): ?>
                <a href="mailto:<?= htmlspecialchars($portfolio['email_contact']) ?>" class="social-link"><i class="fas fa-envelope"></i></a>
            <?php endif; ?>
        </div>
    </div>
</header>

<!-- Skills -->
<?php if (!empty($skills)): ?>
<section class="modern-section">
    <div class="modern-container">
        <h2 class="section-heading">المهارات</h2>
        <div class="skills-grid">
            <?php foreach ($skills as $skill): ?>
                <div class="skill-item">
                    <div class="skill-header">
                        <span class="skill-name"><?= htmlspecialchars($skill['skill_name']) ?></span>
                        <span class="skill-percent"><?= $skill['skill_level'] ?>%</span>
                    </div>
                    <div class="skill-bar">
                        <div class="skill-fill" style="width: <?= $skill['skill_level'] ?>%"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Projects -->
<?php if (!empty($projects)): ?>
<section class="modern-section modern-section-alt">
    <div class="modern-container">
        <h2 class="section-heading">المشاريع</h2>
        <div class="projects-grid">
            <?php foreach ($projects as $project): ?>
                <div class="project-card">
                    <div class="project-icon">📁</div>
                    <h3><?= htmlspecialchars($project['project_name']) ?></h3>
                    <?php if ($project['project_description']): ?>
                        <p><?= htmlspecialchars($project['project_description']) ?></p>
                    <?php endif; ?>
                    <div class="project-links">
                        <?php if ($project['project_url']): ?>
                            <a href="<?= htmlspecialchars($project['project_url']) ?>" target="_blank">
                                <i class="fas fa-external-link-alt"></i> معاينة
                            </a>
                        <?php endif; ?>
                        <?php if ($project['github_url']): ?>
                            <a href="<?= htmlspecialchars($project['github_url']) ?>" target="_blank">
                                <i class="fab fa-github"></i> الكود
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Contact -->
<?php if ($portfolio['email_contact']): ?>
<section class="modern-section">
    <div class="modern-container" style="text-align: center;">
        <h2 class="section-heading">تواصل معي</h2>
        <p style="color: #666; margin-bottom: 2rem;">أنا متاح للفرص الجديدة والمشاريع المثيرة</p>
        <a href="mailto:<?= htmlspecialchars($portfolio['email_contact']) ?>" class="contact-btn">
            <i class="fas fa-envelope"></i>
            أرسل رسالة
        </a>
    </div>
</section>
<?php endif; ?>

<!-- Footer -->
<footer class="modern-footer">
    <p>صُنع بـ ❤️ باستخدام <a href="<?= SITE_URL ?>/">AI Portfolio Builder</a></p>
</footer>

</body>
</html>
