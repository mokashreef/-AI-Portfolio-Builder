/**
 * AI Portfolio Builder - Form Wizard Controller
 * التحكم بالنموذج متعدد الخطوات + المعاينة الحية
 */

let currentStep = 1;
const totalSteps = 4;
let selectedTemplate = 'modern';

// ─── Step Navigation ───

function goToStep(step) {
    if (step < 1 || step > totalSteps) return;

    // Hide all steps
    document.querySelectorAll('.form-step').forEach(s => s.classList.remove('active'));
    document.getElementById('step' + step).classList.add('active');

    // Update progress
    document.querySelectorAll('.progress-step').forEach(s => {
        const sNum = parseInt(s.dataset.step);
        s.classList.remove('active', 'completed');
        if (sNum === step) s.classList.add('active');
        else if (sNum < step) s.classList.add('completed');
    });

    // Update progress bar fill
    const fillPercent = ((step - 1) / (totalSteps - 1)) * 70;
    document.getElementById('progressFill').style.width = fillPercent + '%';

    currentStep = step;
    window.scrollTo({ top: 300, behavior: 'smooth' });
}

function nextStep() {
    if (currentStep === 1) {
        const name = document.getElementById('fullName').value.trim();
        if (!name) {
            alert('يرجى إدخال الاسم الكامل');
            return;
        }
    }
    goToStep(currentStep + 1);
}

function prevStep() {
    goToStep(currentStep - 1);
}

// ─── Skills Management ───

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
                    <label class="form-label">المستوى</label>
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

// ─── Projects Management ───

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

// ─── Template Selection ───

function selectTemplate(template) {
    selectedTemplate = template;
    document.querySelectorAll('.template-option').forEach(t => t.classList.remove('selected'));
    const radio = document.querySelector(`input[value="${template}"]`);
    if (radio) {
        radio.checked = true;
        radio.closest('.template-option').classList.add('selected');
    }
    
    // إظهار/إخفاء إعدادات القالب المخصص
    const customSettings = document.getElementById('customTemplateSettings');
    if (customSettings) {
        customSettings.style.display = template === 'custom' ? 'block' : 'none';
    }
    
    updatePreview();
}

// ─── Collect Form Data ───

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
        custom_username: document.getElementById('customUsername')?.value?.trim() || '',
        language: document.getElementById('portfolioLanguage')?.value || 'ar',
        primary_color: document.getElementById('primaryColor')?.value || '#6c63ff',
        secondary_color: document.getElementById('secondaryColor')?.value || '#a78bfa',
        font_family: document.getElementById('fontFamily')?.value || 'Inter',
        skills,
        projects
    };
}

// ─── Live Preview ───

function updatePreview() {
    const data = collectData();
    const preview = document.getElementById('previewContent');
    const urlBar = document.getElementById('previewUrl');

    // Update URL bar
    const userSlug = data.custom_username.toLowerCase().replace(/[^a-z0-9-_]/g, '');
    const defaultSlug = data.full_name ? data.full_name.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '') : 'your-name';
    const finalSlug = userSlug || defaultSlug;
    
    urlBar.textContent = `portfolio-builder.com/${finalSlug}`;
    const txtPreview = document.getElementById('usernamePreviewText');
    if (txtPreview) txtPreview.textContent = finalSlug;

    if (!data.full_name && !data.title && data.skills.length === 0 && data.projects.length === 0) {
        preview.innerHTML = `
            <div class="preview-empty">
                <i class="fas fa-eye"></i>
                <p>ابدأ بملء بياناتك لمشاهدة المعاينة</p>
            </div>`;
        return;
    }

    // Skills HTML
    let skillsHTML = '';
    if (data.skills.length > 0) {
        skillsHTML = `
            <div class="preview-section-title">🛠️ المهارات</div>
            <div class="preview-skills">
                ${data.skills.map(s => `<span class="preview-skill-tag">${escapeHtml(s.name)}</span>`).join('')}
            </div>`;
    }

    // Projects HTML
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

    // Links HTML
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
    
    // Not applying custom colors anymore since the feature is removed
}

function escapeHtml(text) {
    if (!text) return '';
    const div = document.createElement('div');
    div.textContent = text;
    return div.innerHTML;
}

// ─── Save Portfolio ───

async function savePortfolio() {
    const data = collectData();

    if (!data.full_name) {
        alert('يرجى إدخال الاسم الكامل');
        goToStep(1);
        return;
    }
    
    if (!data.custom_username) {
        alert('يرجى إدخال اسم المستخدم (الرابط)');
        goToStep(4);
        return;
    }

    const saveBtn = document.querySelector('.btn-success');
    const originalHTML = saveBtn.innerHTML;
    saveBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جاري الحفظ...';
    saveBtn.disabled = true;

    try {
        const formData = new FormData();
        
        // Append all text data
        for (const key in data) {
            if (key === 'skills' || key === 'projects') {
                formData.append(key, JSON.stringify(data[key]));
            } else {
                formData.append(key, data[key]);
            }
        }
        
        // Append edit ID if exists (from URL)
        const urlParams = new URLSearchParams(window.location.search);
        const editId = urlParams.get('edit');
        if (editId) {
            formData.append('portfolio_id', editId);
        }

        // Append profile image
        const imgInput = document.getElementById('profileImage');
        if (imgInput && imgInput.files.length > 0) {
            formData.append('profile_image', imgInput.files[0]);
        }

        const response = await fetch('api/save-portfolio.php', {
            method: 'POST',
            body: formData // No Content-Type header, browser sets it automatically with boundary for FormData
        });

        const result = await response.json();

        if (result.success) {
            // Show success message and redirect
            alert('🎉 ' + result.message);
            window.location.href = result.url || ('portfolio.php?slug=' + result.slug);
        } else {
            alert('❌ ' + result.message);
        }
    } catch (error) {
        alert('❌ حدث خطأ في الاتصال بالسيرفر');
        console.error(error);
    } finally {
        saveBtn.innerHTML = originalHTML;
        saveBtn.disabled = false;
    }
}

// ─── Initialize ───

document.addEventListener('DOMContentLoaded', () => {
    // Add initial skill and project
    addSkill('HTML/CSS', 90);
    addSkill('JavaScript', 85);
    addProject('مشروع تجريبي', 'وصف مختصر للمشروع التجريبي', '', '');

    // Listen for input changes to update preview
    document.querySelectorAll('#fullName, #jobTitle, #bio, #emailContact, #github, #linkedin, #twitter, #website, #customUsername').forEach(input => {
        if (input) input.addEventListener('input', updatePreview);
    });

    updatePreview();
});

// ─── Specific Wizard Actions ───

async function generateAiBio() {
    const jobTitle = document.getElementById('jobTitle').value.trim();
    if (!jobTitle) {
        alert('الرجاء إدخال المسمى الوظيفي أولاً لتوليد النبذة!');
        return;
    }
    
    const btn = document.getElementById('btnGenerateBio');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جارِ التوليد...';
    btn.disabled = true;
    
    try {
        const req = await fetch('api/generate-bio.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ jobTitle })
        });
        const res = await req.json();
        
        if (res.success && res.bio) {
            document.getElementById('bio').value = res.bio;
            updatePreview();
        } else {
            alert(res.message || 'فشل توليد النبذة.');
        }
    } catch(e) {
        alert('حدث خطأ أثناء التوليد.');
    } finally {
        btn.innerHTML = originalText;
        btn.disabled = false;
    }
}

async function importFromGithub() {
    const username = prompt("أدخل يوزرنيم GitHub لاستيراد آخر المشاريع المهتم بها:");
    if (!username) return;
    
    const btn = document.getElementById('btnImportGithub');
    const originalText = btn.innerHTML;
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> جارِ الاستيراد...';
    btn.disabled = true;
    
    try {
        const req = await fetch(`https://api.github.com/users/${username}/repos?sort=updated&per_page=5`);
        if (!req.ok) throw new Error('لم يتم العثور على المستخدم');
        
        const repos = await req.json();
        if (repos.length === 0) {
            alert('لا توجد مستودعات عامة لهذا المستخدم.');
            return;
        }
        
        // Remove empty default proj if exists
        const firstProjName = document.querySelector('#projectsList .dynamic-item:first-child .project-name');
        if (firstProjName && firstProjName.value === 'مشروع تجريبي') {
            document.getElementById('projectsList').innerHTML = '';
        }
        
        repos.forEach(repo => {
            if (!repo.fork) {
                addProject(repo.name, repo.description || '', repo.homepage || repo.html_url, repo.html_url);
            }
        });
        
    } catch(e) {
        alert(e.message || 'حدث خطأ أثناء الاتصال بـ GitHub.');
    } finally {
        btn.innerHTML = originalText;
        btn.disabled = false;
    }
}
