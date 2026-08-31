let currentStep = 1;
const totalSteps = 4;
let selectedTemplate = 'modern';

function goToStep(step) {
    if (step < 1 || step > totalSteps) return;

    document.querySelectorAll('.form-step').forEach(s => s.classList.remove('active'));
    document.getElementById('step' + step).classList.add('active');

    document.querySelectorAll('.progress-step').forEach(s => {
        const sNum = parseInt(s.dataset.step);
        s.classList.remove('active', 'completed');
        if (sNum === step) s.classList.add('active');
        else if (sNum < step) s.classList.add('completed');
    });

    const fillPercent = ((step - 1) / (totalSteps - 1)) * 70;
    document.getElementById('progressFill').style.width = fillPercent + '%';

    currentStep = step;
    window.scrollTo({ top: 300, behavior: 'smooth' });
}

function nextStep() {
    if (currentStep === 1) {
        const name = document.getElementById('fullName').value.trim();
        if (!name) {
            alert('يرجى إدخال أسمك الكامل ');
            return;
        }
    }
    goToStep(currentStep + 1);
}

function prevStep() {
    goToStep(currentStep - 1);
}


let skillCounter = 0;

function addSkill(name = '', level = 80) {
    skillCounter++;
    const id = skillCounter;
    const html = `
        <div class="dynamic-item" id="skill-${id}">
            <button class="remove-item" onclick="removeSkill(${id})" title="حذف">
                <i class="fas fa-times"></i>
            </button>
            <div class="skill-row">
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">اسم المهارة</label>
                    <input type="text" class="form-input skill-name" placeholder="مثال: JavaScript"
                           value="${name}" oninput="updatePreview()">
                </div>
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">مستوى المهارة</label>
                    <div class="range-wrapper">
                        <input type="range" class="skill-level" min="10" max="100" value="${level}"
                               oninput="this.parentElement.querySelector('.range-value').textContent = this.value + '%'; updatePreview()">
                        <div class="range-value">${level}%</div>
                    </div>
                </div>
            </div>
        </div>
    `;
    document.getElementById('skillsList').insertAdjacentHTML('beforeend', html);
    updatePreview();
}

function removeSkill(id) {
    const el = document.getElementById('skill-' + id);
    if (el) {
        el.style.opacity = '0';
        el.style.transform = 'translateX(20px)';
        setTimeout(() => { el.remove(); updatePreview(); }, 300);
    }
}


let projectCounter = 0;

function addProject(name = '', desc = '', url = '', githubUrl = '') {
    projectCounter++;
    const id = projectCounter;
    const html = `
        <div class="dynamic-item" id="project-${id}">
            <button class="remove-item" onclick="removeProject(${id})" title="حذف">
                <i class="fas fa-times"></i>
            </button>
            <div class="form-group">
                <label class="form-label">اسم المشروع *</label>
                <input type="text" class="form-input project-name" placeholder="مثال: متجر إلكتروني"
                       value="${name}" oninput="updatePreview()">
            </div>
            <div class="form-group">
                <label class="form-label">وصف المشروع</label>
                <textarea class="form-textarea project-desc" rows="2" placeholder="وصف مختصر للمشروع..."
                          oninput="updatePreview()">${desc}</textarea>
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: var(--space-md);">
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">رابط المشروع</label>
                    <input type="url" class="form-input project-url" placeholder="https://..."
                           value="${url}" oninput="updatePreview()">
                </div>
                <div class="form-group" style="margin-bottom: 0;">
                    <label class="form-label">رابط GitHub</label>
                    <input type="url" class="form-input project-github" placeholder="https://github.com/..."
                           value="${githubUrl}" oninput="updatePreview()">
                </div>
            </div>
        </div>
    `;
    document.getElementById('projectsList').insertAdjacentHTML('beforeend', html);
    updatePreview();
}

function removeProject(id) {
    const el = document.getElementById('project-' + id);
    if (el) {
        el.style.opacity = '0';
        el.style.transform = 'translateX(20px)';
        setTimeout(() => { el.remove(); updatePreview(); }, 300);
    }
}

function selectTemplate(template) {
    selectedTemplate = template;
    document.querySelectorAll('.template-option').forEach(t => t.classList.remove('selected'));
    const radio = document.querySelector(`input[value="${template}"]`);
    if (radio) {
        radio.checked = true;
        radio.closest('.template-option').classList.add('selected');
    }
    updatePreview();
}

function collectData() {
    const skills = [];
    document.querySelectorAll('#skillsList .dynamic-item').forEach(item => {
        const name = item.querySelector('.skill-name')?.value?.trim();
        const level = item.querySelector('.skill-level')?.value || 80;
        if (name) skills.push({ name, level: parseInt(level) });
    });

    const projects = [];
    document.querySelectorAll('#projectsList .dynamic-item').forEach(item => {
        const name = item.querySelector('.project-name')?.value?.trim();
        const description = item.querySelector('.project-desc')?.value?.trim();
        const url = item.querySelector('.project-url')?.value?.trim();
        const github_url = item.querySelector('.project-github')?.value?.trim();
        if (name) projects.push({ name, description, url, github_url });
    });

    return {
        full_name: document.getElementById('fullName')?.value?.trim() || '',
        title: document.getElementById('jobTitle')?.value?.trim() || '',
        bio: document.getElementById('bio')?.value?.trim() || '',
        email_contact: document.getElementById('emailContact')?.value?.trim() || '',
        github: document.getElementById('github')?.value?.trim() || '',
        linkedin: document.getElementById('linkedin')?.value?.trim() || '',
        twitter: document.getElementById('twitter')?.value?.trim() || '',
        website: document.getElementById('website')?.value?.trim() || '',
        template: selectedTemplate,
        skills,
        projects
    };
}


function updatePreview() {
    const data = collectData();
    const preview = document.getElementById('previewContent');
    const urlBar = document.getElementById('previewUrl');

    const slug = data.full_name ? data.full_name.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '') : 'your-name';
    urlBar.textContent = `portfolio-builder.com/${slug}`;

    if (!data.full_name && !data.title && data.skills.length === 0 && data.projects.length === 0) {
        preview.innerHTML = `
            <div class="preview-empty">
                <i class="fas fa-eye"></i>
                <p>ابدأ بملء بياناتك لمشاهدة المعاينة</p>
            </div>`;
        return;
    }

    let skillsHTML = '';
    if (data.skills.length > 0) {
        skillsHTML = `
            <div class="preview-section-title">🛠️ المهارات</div>
            <div class="preview-skills">
                ${data.skills.map(s => `<span class="preview-skill-tag">${escapeHtml(s.name)}</span>`).join('')}
            </div>`;
    }

    let projectsHTML = '';
    if (data.projects.length > 0) {
        projectsHTML = `
            <div class="preview-section-title">🚀 المشاريع</div>
            <div class="preview-projects">
                ${data.projects.map(p => `
                    <div class="preview-project-item">
                        <h5>${escapeHtml(p.name)}</h5>
                        ${p.description ? `<p>${escapeHtml(p.description).substring(0, 80)}...</p>` : ''}
                    </div>`).join('')}
            </div>`;
    }

    let linksHTML = '';
    const links = [];
    if (data.github)   links.push('<span class="preview-link-icon"><i class="fab fa-github"></i></span>');
    if (data.linkedin)  links.push('<span class="preview-link-icon"><i class="fab fa-linkedin"></i></span>');
    if (data.twitter)   links.push('<span class="preview-link-icon"><i class="fab fa-twitter"></i></span>');
    if (data.website)   links.push('<span class="preview-link-icon"><i class="fas fa-globe"></i></span>');
    if (data.email_contact) links.push('<span class="preview-link-icon"><i class="fas fa-envelope"></i></span>');
    if (links.length > 0) {
        linksHTML = `<div class="preview-links">${links.join('')}</div>`;
    }

    preview.innerHTML = `
        <div class="preview-hero-name">${escapeHtml(data.full_name) || '...'}</div>
        <div class="preview-hero-title">${escapeHtml(data.title) || ''}</div>
        <div class="preview-hero-bio">${escapeHtml(data.bio) || ''}</div>
        ${skillsHTML}
        ${projectsHTML}
        ${linksHTML}
    `;
}

function escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

async function savePortfolio() {
    const data = collectData();

    if (!data.full_name) {
        alert('يرجى إدخال الاسم الكامل');
        goToStep(1);
        return;
    }

    const saveBtn = document.querySelector('.btn-success');
    const originalHTML = saveBtn.innerHTML;
    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...';
    saveBtn.disabled = true;

    try {
        const response = await fetch('api/save-portfolio.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        });

        const result = await response.json();

        if (result.success) {
            alert('🎉 ' + result.message);
            window.location.href = 'portfolio.php?slug=' + result.slug;
        } else {
            alert('❌ ' + result.message);
        }
    } catch (error) {
        alert(' نعتذر ❌ حدث خطأ في الاتصال بالسيرفر');
        console.error(error);
    } finally {
        saveBtn.innerHTML = originalHTML;
        saveBtn.disabled = false;
    }
}


document.addEventListener('DOMContentLoaded', () => {
    addSkill('HTML/CSS', 90);
    addSkill('JavaScript', 85);
    addProject(' مشروعك ', 'وصف مختصر لمشروعك', '', '');
    document.querySelectorAll('#fullName, #jobTitle, #bio, #emailContact, #github, #linkedin, #twitter, #website').forEach(input => {
        input.addEventListener('input', updatePreview);
    });

    updatePreview();
});
