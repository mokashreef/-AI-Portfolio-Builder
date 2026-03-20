<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($portfolio['full_name']) ?> - Portfolio</title>
    <meta name="description" content="<?= htmlspecialchars($portfolio['bio'] ?? '') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@400;500;600;700&family=Inter:wght@300;400;600;700;800&family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>/templates/creative/style.css">
</head>
<body>

<!-- Animated Background -->
<div class="bg-particles" id="particles"></div>

<!-- Hero -->
<header class="creative-hero">
    <div class="creative-container">
        <div class="terminal-badge">&lt;/&gt; developer</div>
        <h1 class="glitch-text" data-text="<?= htmlspecialchars($portfolio['full_name']) ?>">
            <?= htmlspecialchars($portfolio['full_name']) ?>
        </h1>
        <?php if ($portfolio['title']): ?>
            <p class="hero-subtitle"><?= htmlspecialchars($portfolio['title']) ?></p>
        <?php endif; ?>
        <?php if ($portfolio['bio']): ?>
            <p class="hero-desc"><?= nl2br(htmlspecialchars($portfolio['bio'])) ?></p>
        <?php endif; ?>

        <div class="hero-socials">
            <?php if ($portfolio['github']): ?>
                <a href="<?= htmlspecialchars($portfolio['github']) ?>" target="_blank" class="neon-link"><i class="fab fa-github"></i></a>
            <?php endif; ?>
            <?php if ($portfolio['linkedin']): ?>
                <a href="<?= htmlspecialchars($portfolio['linkedin']) ?>" target="_blank" class="neon-link"><i class="fab fa-linkedin"></i></a>
            <?php endif; ?>
            <?php if ($portfolio['twitter']): ?>
                <a href="<?= htmlspecialchars($portfolio['twitter']) ?>" target="_blank" class="neon-link"><i class="fab fa-twitter"></i></a>
            <?php endif; ?>
            <?php if ($portfolio['website']): ?>
                <a href="<?= htmlspecialchars($portfolio['website']) ?>" target="_blank" class="neon-link"><i class="fas fa-globe"></i></a>
            <?php endif; ?>
            <?php if ($portfolio['email_contact']): ?>
                <a href="mailto:<?= htmlspecialchars($portfolio['email_contact']) ?>" class="neon-link"><i class="fas fa-envelope"></i></a>
            <?php endif; ?>
        </div>
    </div>
</header>

<!-- Skills -->
<?php if (!empty($skills)): ?>
<section class="creative-section">
    <div class="creative-container">
        <h2 class="section-title"><span class="neon-text">// </span>المهارات</h2>
        <div class="skills-container">
            <?php foreach ($skills as $skill): ?>
                <div class="skill-chip">
                    <span class="chip-name"><?= htmlspecialchars($skill['skill_name']) ?></span>
                    <span class="chip-level"><?= $skill['skill_level'] ?>%</span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Projects -->
<?php if (!empty($projects)): ?>
<section class="creative-section">
    <div class="creative-container">
        <h2 class="section-title"><span class="neon-text">// </span>المشاريع</h2>
        <div class="projects-container">
            <?php foreach ($projects as $project): ?>
                <div class="project-glass-card">
                    <div class="card-glow"></div>
                    <h3><?= htmlspecialchars($project['project_name']) ?></h3>
                    <?php if ($project['project_description']): ?>
                        <p><?= htmlspecialchars($project['project_description']) ?></p>
                    <?php endif; ?>
                    <div class="card-links">
                        <?php if ($project['project_url']): ?>
                            <a href="<?= htmlspecialchars($project['project_url']) ?>" target="_blank" class="neon-btn">
                                <i class="fas fa-external-link-alt"></i> معاينة
                            </a>
                        <?php endif; ?>
                        <?php if ($project['github_url']): ?>
                            <a href="<?= htmlspecialchars($project['github_url']) ?>" target="_blank" class="neon-btn ghost">
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
<section class="creative-section" style="text-align: center;">
    <div class="creative-container">
        <h2 class="section-title"><span class="neon-text">// </span>تواصل</h2>
        <p style="color: #8892b0; margin-bottom: 2rem;">مهتم بالعمل معي؟ أرسل لي رسالة</p>
        <a href="mailto:<?= htmlspecialchars($portfolio['email_contact']) ?>" class="neon-btn large">
            <i class="fas fa-paper-plane"></i> أرسل رسالة
        </a>
    </div>
</section>
<?php endif; ?>

<!-- Footer -->
<footer class="creative-footer">
    <p>Built with 💚 using <a href="<?= SITE_URL ?>/">AI Portfolio Builder</a></p>
</footer>

<script>
// Simple particle animation
const canvas = document.getElementById('particles');
if (canvas) {
    const style = document.createElement('style');
    for (let i = 0; i < 30; i++) {
        const dot = document.createElement('div');
        dot.className = 'particle';
        dot.style.cssText = `left:${Math.random()*100}%;top:${Math.random()*100}%;animation-delay:${Math.random()*5}s;animation-duration:${3+Math.random()*4}s;`;
        canvas.appendChild(dot);
    }
}
</script>
</body>
</html>
