<!DOCTYPE html>
<html lang="<?= $portfolio['language'] ?? 'ar' ?>" dir="ltr"> <!-- Dev is always LTR for code feel, but text can align based on language -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($portfolio['full_name']) ?> - { portfolio }</title>
    <meta name="description" content="<?= htmlspecialchars($portfolio['bio'] ?? '') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="<?= SITE_URL ?>/templates/developer/style.css">
    <style>
        .lang-text {
            direction: <?= ($portfolio['language'] ?? 'ar') === 'ar' ? 'rtl' : 'ltr' ?>;
            text-align: <?= ($portfolio['language'] ?? 'ar') === 'ar' ? 'right' : 'left' ?>;
        }
    </style>
</head>
<body>

<div class="dev-layout">
    <!-- Sidebar / Tree -->
    <aside class="dev-sidebar">
        <div class="dev-sidebar-title">EXPLORER</div>
        <div class="dev-folder">
            <i class="fas fa-chevron-down"></i> PORTFOLIO
        </div>
        <ul class="dev-files">
            <li class="active"><i class="fab fa-js text-yellow"></i> main.js</li>
            <li><i class="fab fa-css3-alt text-blue"></i> skills.css</li>
            <li><i class="fab fa-html5 text-orange"></i> projects.html</li>
        </ul>
    </aside>

    <!-- Main Content Area -->
    <main class="dev-main">
        <!-- Tabs -->
        <div class="dev-tabs">
            <div class="dev-tab active"><i class="fab fa-js text-yellow"></i> main.js</div>
            <div class="dev-tab"><i class="fab fa-css3-alt text-blue"></i> skills.css</div>
            <div class="dev-tab"><i class="fab fa-html5 text-orange"></i> projects.html</div>
        </div>

        <div class="dev-content">
            <!-- Code Lines content -->
            <div class="dev-code-block">
                <span class="line-num">1</span> <span class="keyword">const</span> <span class="variable">developer</span> = {<br>
                <span class="line-num">2</span> &nbsp;&nbsp;<span class="key">name</span>: <span class="string">'<?= htmlspecialchars($portfolio['full_name']) ?>'</span>,<br>
                
                <?php if ($portfolio['title']): ?>
                <span class="line-num">3</span> &nbsp;&nbsp;<span class="key">role</span>: <span class="string">'<?= htmlspecialchars($portfolio['title']) ?>'</span>,<br>
                <?php endif; ?>
                
                <span class="line-num">4</span> &nbsp;&nbsp;<span class="key">bio</span>: <span class="string lang-text" style="display:inline-block;">`<?= nl2br(htmlspecialchars($portfolio['bio'] ?? '')) ?>`</span>,<br>
                
                <span class="line-num">5</span> &nbsp;&nbsp;<span class="key">links</span>: {<br>
                
                <?php if ($portfolio['github']): ?>
                <span class="line-num">6</span> &nbsp;&nbsp;&nbsp;&nbsp;<span class="key">github</span>: <a href="<?= htmlspecialchars($portfolio['github']) ?>" target="_blank" class="string">'<?= htmlspecialchars($portfolio['github']) ?>'</a>,<br>
                <?php endif; ?>
                
                <?php if ($portfolio['linkedin']): ?>
                <span class="line-num">7</span> &nbsp;&nbsp;&nbsp;&nbsp;<span class="key">linkedin</span>: <a href="<?= htmlspecialchars($portfolio['linkedin']) ?>" target="_blank" class="string">'<?= htmlspecialchars($portfolio['linkedin']) ?>'</a>,<br>
                <?php endif; ?>
                
                <?php if ($portfolio['website']): ?>
                <span class="line-num">8</span> &nbsp;&nbsp;&nbsp;&nbsp;<span class="key">website</span>: <a href="<?= htmlspecialchars($portfolio['website']) ?>" target="_blank" class="string">'<?= htmlspecialchars($portfolio['website']) ?>'</a>,<br>
                <?php endif; ?>
                
                <span class="line-num">9</span> &nbsp;&nbsp;}<br>
                <span class="line-num">10</span> };<br>
            </div>

            <?php if (!empty($skills)): ?>
            <br>
            <div class="dev-code-block">
                <span class="line-num">12</span> <span class="comment">// Mapped from skills.css</span><br>
                <span class="line-num">13</span> <span class="keyword">const</span> <span class="variable">skills</span> = [<br>
                <?php $ln=14; foreach($skills as $skill): ?>
                <span class="line-num"><?= $ln++ ?></span> &nbsp;&nbsp;{ <span class="key">name</span>: <span class="string">'<?= htmlspecialchars($skill['skill_name']) ?>'</span>, <span class="key">level</span>: <span class="number"><?= $skill['skill_level'] ?></span> },<br>
                <?php endforeach; ?>
                <span class="line-num"><?= $ln++ ?></span> ];<br>
            </div>
            <?php endif; ?>

            <?php if (!empty($projects)): ?>
            <br>
            <div class="dev-code-block">
                <span class="line-num"><?= $ln+1 ?></span> <span class="comment">// Rendered in projects.html</span><br>
                <span class="line-num"><?= $ln+2 ?></span> <span class="keyword">const</span> <span class="variable">projects</span> = [<br>
                <?php $p_ln=$ln+3; foreach($projects as $project): ?>
                <span class="line-num"><?= $p_ln++ ?></span> &nbsp;&nbsp;{<br>
                <span class="line-num"><?= $p_ln++ ?></span> &nbsp;&nbsp;&nbsp;&nbsp;<span class="key">name</span>: <span class="string">'<?= htmlspecialchars($project['project_name']) ?>'</span>,<br>
                <span class="line-num"><?= $p_ln++ ?></span> &nbsp;&nbsp;&nbsp;&nbsp;<span class="key">desc</span>: <span class="string lang-text" style="display:inline-block;">'<?= htmlspecialchars($project['project_description']) ?>'</span>,<br>
                <?php if ($project['project_url']): ?>
                <span class="line-num"><?= $p_ln++ ?></span> &nbsp;&nbsp;&nbsp;&nbsp;<span class="key">demo</span>: <a href="<?= htmlspecialchars($project['project_url']) ?>" target="_blank" class="string">'view_live_demo'</a>,<br>
                <?php endif; ?>
                <?php if ($project['github_url']): ?>
                <span class="line-num"><?= $p_ln++ ?></span> &nbsp;&nbsp;&nbsp;&nbsp;<span class="key">repo</span>: <a href="<?= htmlspecialchars($project['github_url']) ?>" target="_blank" class="string">'source_code'</a><br>
                <?php endif; ?>
                <span class="line-num"><?= $p_ln++ ?></span> &nbsp;&nbsp;},<br>
                <?php endforeach; ?>
                <span class="line-num"><?= $p_ln++ ?></span> ];<br>
            </div>
            <?php endif; ?>

        </div>
        
        <footer class="dev-footer">
            <span class="dev-footer-item"><i class="fas fa-code-branch"></i> main</span>
            <span class="dev-footer-item"><i class="fas fa-times-circle text-orange"></i> 0 <i class="fas fa-exclamation-triangle text-yellow"></i> 0</span>
            <span class="dev-footer-item" style="margin-left: auto;">
                <?= ($portfolio['language'] ?? 'ar') === 'en' ? 'Made with ❤️ by' : 'صُنع بـ ❤️ بواسطة' ?> 
                <a href="<?= SITE_URL ?>/" target="_blank" style="color: #fff; text-decoration: none;">AI Portfolio Builder</a>
            </span>
        </footer>
    </main>
</div>

</body>
</html>
