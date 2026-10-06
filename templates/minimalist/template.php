<!DOCTYPE html>
<html lang="<?= $portfolio['language'] ?? 'ar' ?>" dir="<?= ($portfolio['language'] ?? 'ar') === 'ar' ? 'rtl' : 'ltr' ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($portfolio['full_name']) ?> - Portfolio</title>
    <meta name="description" content="<?= htmlspecialchars($portfolio['bio'] ?? '') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Noto+Kufi+Arabic:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>/templates/minimalist/style.css">
</head>
<body>

<main class="min-container">
    <div class="min-hero">
        <?php if (!empty($portfolio['profile_image'])): ?>
            <img src="<?= SITE_URL . '/' . htmlspecialchars($portfolio['profile_image']) ?>" alt="Profile" class="min-avatar">
        <?php endif; ?>
        
        <h1 class="min-name"><?= htmlspecialchars($portfolio['full_name']) ?></h1>
        <?php if ($portfolio['title']): ?>
            <p class="min-title"><?= htmlspecialchars($portfolio['title']) ?></p>
        <?php endif; ?>
        
        <?php if ($portfolio['bio']): ?>
            <p class="min-bio"><?= nl2br(htmlspecialchars($portfolio['bio'])) ?></p>
        <?php endif; ?>
        
        <div class="min-socials">
            <?php if ($portfolio['github']): ?><a href="<?= htmlspecialchars($portfolio['github']) ?>" target="_blank"><i class="fab fa-github"></i></a><?php endif; ?>
            <?php if ($portfolio['linkedin']): ?><a href="<?= htmlspecialchars($portfolio['linkedin']) ?>" target="_blank"><i class="fab fa-linkedin"></i></a><?php endif; ?>
            <?php if ($portfolio['twitter']): ?><a href="<?= htmlspecialchars($portfolio['twitter']) ?>" target="_blank"><i class="fab fa-twitter"></i></a><?php endif; ?>
            <?php if ($portfolio['website']): ?><a href="<?= htmlspecialchars($portfolio['website']) ?>" target="_blank"><i class="fas fa-globe"></i></a><?php endif; ?>
            <?php if ($portfolio['email_contact']): ?><a href="mailto:<?= htmlspecialchars($portfolio['email_contact']) ?>"><i class="fas fa-envelope"></i></a><?php endif; ?>
        </div>
    </div>

    <?php if (!empty($skills)): ?>
    <section class="min-section">
        <h2 class="min-heading"><?= ($portfolio['language'] ?? 'ar') === 'en' ? 'Skills' : 'المهارات' ?></h2>
        <div class="min-skills">
            <?php foreach ($skills as $skill): ?>
                <div class="min-skill">
                    <div class="min-skill-header">
                        <span><?= htmlspecialchars($skill['skill_name']) ?></span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if (!empty($projects)): ?>
    <section class="min-section">
        <h2 class="min-heading"><?= ($portfolio['language'] ?? 'ar') === 'en' ? 'Projects' : 'المشاريع' ?></h2>
        <div class="min-projects">
            <?php foreach ($projects as $project): ?>
                <div class="min-project">
                    <h3><?= htmlspecialchars($project['project_name']) ?></h3>
                    <?php if ($project['project_description']): ?>
                        <p><?= htmlspecialchars($project['project_description']) ?></p>
                    <?php endif; ?>
                    <div class="min-project-links">
                        <?php if ($project['project_url']): ?>
                            <a href="<?= htmlspecialchars($project['project_url']) ?>" target="_blank"><?= ($portfolio['language'] ?? 'ar') === 'en' ? 'Link' : 'الرابط' ?> <i class="fas fa-arrow-up-right-from-square" style="font-size:0.8em;"></i></a>
                        <?php endif; ?>
                        <?php if ($project['github_url']): ?>
                            <a href="<?= htmlspecialchars($project['github_url']) ?>" target="_blank">GitHub <i class="fab fa-github" style="font-size:0.8em;"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
    <?php endif; ?>

</main>

<footer class="min-footer">
    <p><?= ($portfolio['language'] ?? 'ar') === 'en' ? 'Made with ❤️ by' : 'صُنع بـ ❤️ بواسطة' ?> <a href="<?= SITE_URL ?>/" target="_blank">AI Portfolio Builder</a></p>
</footer>

</body>
</html>
