<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($portfolio['full_name']) ?> - Portfolio</title>
    <meta name="description" content="<?= htmlspecialchars($portfolio['bio'] ?? '') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700;800&family=Inter:wght@300;400;500;600&family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>/templates/professional/style.css">
</head>
<body>

<!-- Header -->
<header class="pro-header">
    <div class="pro-container">
        <div class="header-content">
            <div class="gold-line"></div>
            <h1><?= htmlspecialchars($portfolio['full_name']) ?></h1>
            <?php if ($portfolio['title']): ?>
                <p class="title-text"><?= htmlspecialchars($portfolio['title']) ?></p>
            <?php endif; ?>
            <div class="gold-line"></div>
        </div>

        <?php if ($portfolio['bio']): ?>
            <p class="bio-text"><?= nl2br(htmlspecialchars($portfolio['bio'])) ?></p>
        <?php endif; ?>

        <div class="header-links">
            <?php if ($portfolio['github']): ?>
                <a href="<?= htmlspecialchars($portfolio['github']) ?>" target="_blank"><i class="fab fa-github"></i></a>
            <?php endif; ?>
            <?php if ($portfolio['linkedin']): ?>
                <a href="<?= htmlspecialchars($portfolio['linkedin']) ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
            <?php endif; ?>
            <?php if ($portfolio['twitter']): ?>
                <a href="<?= htmlspecialchars($portfolio['twitter']) ?>" target="_blank"><i class="fab fa-twitter"></i></a>
            <?php endif; ?>
            <?php if ($portfolio['website']): ?>
                <a href="<?= htmlspecialchars($portfolio['website']) ?>" target="_blank"><i class="fas fa-globe"></i></a>
            <?php endif; ?>
            <?php if ($portfolio['email_contact']): ?>
                <a href="mailto:<?= htmlspecialchars($portfolio['email_contact']) ?>"><i class="fas fa-envelope"></i></a>
            <?php endif; ?>
        </div>
    </div>
</header>

<!-- Skills -->
<?php if (!empty($skills)): ?>
<section class="pro-section">
    <div class="pro-container">
        <h2 class="pro-heading">المهارات والخبرات</h2>
        <div class="pro-skills-grid">
            <?php foreach ($skills as $skill): ?>
                <div class="pro-skill">
                    <div class="pro-skill-info">
                        <span><?= htmlspecialchars($skill['skill_name']) ?></span>
                        <span class="gold-text"><?= $skill['skill_level'] ?>%</span>
                    </div>
                    <div class="pro-skill-bar">
                        <div class="pro-skill-fill" style="width: <?= $skill['skill_level'] ?>%"></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Projects -->
<?php if (!empty($projects)): ?>
<section class="pro-section pro-section-dark">
    <div class="pro-container">
        <h2 class="pro-heading" style="color: #f0e6d2;">المشاريع البارزة</h2>
        <div class="pro-projects">
            <?php foreach ($projects as $i => $project): ?>
                <div class="pro-project-card">
                    <div class="project-number"><?= str_pad($i + 1, 2, '0', STR_PAD_LEFT) ?></div>
                    <div class="project-content">
                        <h3><?= htmlspecialchars($project['project_name']) ?></h3>
                        <?php if ($project['project_description']): ?>
                            <p><?= htmlspecialchars($project['project_description']) ?></p>
                        <?php endif; ?>
                        <div class="project-actions">
                            <?php if ($project['project_url']): ?>
                                <a href="<?= htmlspecialchars($project['project_url']) ?>" target="_blank" class="pro-btn">
                                    <i class="fas fa-external-link-alt"></i> معاينة
                                </a>
                            <?php endif; ?>
                            <?php if ($project['github_url']): ?>
                                <a href="<?= htmlspecialchars($project['github_url']) ?>" target="_blank" class="pro-btn outline">
                                    <i class="fab fa-github"></i> الكود
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Contact -->
<?php if ($portfolio['email_contact']): ?>
<section class="pro-section" style="text-align: center;">
    <div class="pro-container">
        <h2 class="pro-heading">هل لديك مشروع؟</h2>
        <p style="color: #666; margin-bottom: 2rem; max-width: 500px; margin-left: auto; margin-right: auto;">
            أنا متحمس للعمل على مشاريع جديدة ومبتكرة. تواصل معي ودعنا نبني شيئًا رائعًا معًا.
        </p>
        <a href="mailto:<?= htmlspecialchars($portfolio['email_contact']) ?>" class="pro-btn large">
            <i class="fas fa-envelope"></i> راسلني الآن
        </a>
    </div>
</section>
<?php endif; ?>

<!-- Footer -->
<footer class="pro-footer">
    <div class="gold-line" style="margin-bottom: 1.5rem;"></div>
    <p>صُنع بأناقة باستخدام <a href="<?= SITE_URL ?>/">AI Portfolio Builder</a></p>
</footer>

</body>
</html>
