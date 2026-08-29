<?php
$pageTitle = 'إنشاء Portfolio - AI Portfolio Builder';
$extraCSS = 'create.css';
$extraJS = 'form-wizard.js';
require_once 'includes/header.php';
?>
<section class="create-page section">
    <div class="container">
        <div style="text-align: center; margin-bottom: var(--space-2xl);">
            <h1 style="font-size: 2rem;">أنشئ <span class="text-gradient">Portfolio</span> الخاص بك</h1>
            <p style="color: var(--text-secondary);">املأ بياناتك وشاهد النتيجة لحظيًا</p>
        </div>
        <div class="wizard-progress" id="wizardProgress">
            <div class="progress-fill" id="progressFill" style="width: 0%;"></div>
            <div class="progress-step active" data-step="1" onclick="goToStep(1)">
                <div class="step-circle">1</div>
                <span class="step-label">المعلومات</span>
            </div>
            <div class="progress-step" data-step="2" onclick="goToStep(2)">
                <div class="step-circle">2</div>
                <span class="step-label">المهارات</span>
            </div>
            <div class="progress-step" data-step="3" onclick="goToStep(3)">
                <div class="step-circle">3</div>
                <span class="step-label">المشاريع</span>
            </div>
            <div class="progress-step" data-step="4" onclick="goToStep(4)">
                <div class="step-circle">4</div>
                <span class="step-label">الروابط والقالب</span>
            </div>
        </div>

        <div class="create-layout">
            <div class="form-section">
                <div class="card">
                    <div class="form-step active" id="step1">
                        <div class="step-header">
                            <h2>👤 المعلومات الشخصية</h2>
                            <p>أخبرنا عن نفسك ومجالك</p>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="fullName">الاسم الكامل *</label>
                            <input type="text" id="fullName" class="form-input" placeholder="مثال: أحمد محمد" required>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="jobTitle">المسمى الوظيفي</label>
                            <input type="text" id="jobTitle" class="form-input" placeholder="مثال: Full-Stack Developer">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="bio">نبذة عنك</label>
                            <textarea id="bio" class="form-textarea" placeholder="اكتب نبذة مختصرة عن خبراتك ومجالك..." rows="4"></textarea>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="emailContact">البريد الإلكتروني للتواصل</label>
                            <input type="email" id="emailContact" class="form-input" placeholder="contact@example.com">
                        </div>

                        <div class="wizard-nav">
                            <div></div>
                            <button class="btn btn-primary" onclick="nextStep()">
                                التالي <i class="fas fa-arrow-left" style="margin-right: 6px;"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-step" id="step2">
                        <div class="step-header">
                            <h2>🛠️ المهارات</h2>
                            <p>أضف مهاراتك التقنية ومستوى كل مهارة</p>
                        </div>

                        <div class="dynamic-list" id="skillsList">
                        </div>

                        <button class="add-item-btn" onclick="addSkill()">
                            <i class="fas fa-plus-circle"></i>
                            إضافة مهارة
                        </button>

                        <div class="wizard-nav">
                            <button class="btn btn-outline" onclick="prevStep()">
                                <i class="fas fa-arrow-right" style="margin-left: 6px;"></i> السابق
                            </button>
                            <button class="btn btn-primary" onclick="nextStep()">
                                التالي <i class="fas fa-arrow-left" style="margin-right: 6px;"></i>
                            </button>
                        </div>
                    </div>

                    <div class="form-step" id="step3">
                        <div class="step-header">
                            <h2>🚀 المشاريع</h2>
                            <p>أضف أفضل مشاريعك لعرضها في Portfolio</p>
                        </div>

                        <div class="dynamic-list" id="projectsList">
                        </div>

                        <button class="add-item-btn" onclick="addProject()">
                            <i class="fas fa-plus-circle"></i>
                            إضافة مشروع
                        </button>

                        <div class="wizard-nav">
                            <button class="btn btn-outline" onclick="prevStep()">
                                <i class="fas fa-arrow-right" style="margin-left: 6px;"></i> السابق
                            </button>
                            <button class="btn btn-primary" onclick="nextStep()">
                                التالي <i class="fas fa-arrow-left" style="margin-right: 6px;"></i>
                            </button>
                        </div>
                    </div>
                    <div class="form-step" id="step4">
                        <div class="step-header">
                            <h2>🔗 الروابط واختيار القالب</h2>
                            <p>أضف روابطك واختر التصميم المناسب</p>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="github">
                                <i class="fab fa-github" style="margin-left: 6px;"></i>GitHub
                            </label>
                            <input type="url" id="github" class="form-input" placeholder="https://github.com/username">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="linkedin">
                                <i class="fab fa-linkedin" style="margin-left: 6px;"></i>LinkedIn
                            </label>
                            <input type="url" id="linkedin" class="form-input" placeholder="https://linkedin.com/in/username">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="twitter">
                                <i class="fab fa-twitter" style="margin-left: 6px;"></i>Twitter / X
                            </label>
                            <input type="url" id="twitter" class="form-input" placeholder="https://twitter.com/username">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="website">
                                <i class="fas fa-globe" style="margin-left: 6px;"></i>موقعك الشخصي
                            </label>
                            <input type="url" id="website" class="form-input" placeholder="https://mywebsite.com">
                        </div>
                        <div class="form-group">
                            <label class="form-label" style="font-size: 1rem; color: var(--text-primary); margin-bottom: var(--space-md);">
                                🎨 اختر القالب
                            </label>
                            <div class="template-grid">
                                <label class="template-option selected" onclick="selectTemplate('modern')">
                                    <input type="radio" name="template" value="modern" checked>
                                    <div class="template-preview-img" style="background: linear-gradient(135deg, #f8f9fa, #e9ecef);">
                                        🎯
                                    </div>
                                    <div class="template-info">
                                        <h4>Modern Minimal</h4>
                                        <p>نظيف وعصري</p>
                                    </div>
                                </label>

                                <label class="template-option" onclick="selectTemplate('creative')">
                                    <input type="radio" name="template" value="creative">
                                    <div class="template-preview-img" style="background: linear-gradient(135deg, #0a0e17, #1a1f3a); color: #00ff88;">
                                        🚀
                                    </div>
                                    <div class="template-info">
                                        <h4>Creative Dev</h4>
                                        <p>داكن وديناميكي</p>
                                    </div>
                                </label>

                                <label class="template-option" onclick="selectTemplate('professional')">
                                    <input type="radio" name="template" value="professional">
                                    <div class="template-preview-img" style="background: linear-gradient(135deg, #1a1a2e, #16213e); color: #d4af37;">
                                        💼
                                    </div>
                                    <div class="template-info">
                                        <h4>Professional</h4>
                                        <p>فخم واحترافي</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="wizard-nav">
                            <button class="btn btn-outline" onclick="prevStep()">
                                <i class="fas fa-arrow-right" style="margin-left: 6px;"></i> السابق
                            </button>
                            <button class="btn btn-success btn-lg" onclick="savePortfolio()">
                                <i class="fas fa-save" style="margin-left: 6px;"></i>
                                حفظ ونشر Portfolio
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="preview-panel">
                <div class="preview-header">
                    <h3>
                        <span class="live-dot"></span>
                        معاينة حية
                    </h3>
                </div>
                <div class="preview-frame">
                    <div class="preview-browser-bar">
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <div class="dot"></div>
                        <span class="url-bar" id="previewUrl">portfolio-builder.com/your-name</span>
                    </div>
                    <div class="preview-content" id="previewContent">
                        <div class="preview-empty">
                            <i class="fas fa-eye"></i>
                            <p>ابدأ بملء بياناتك لمشاهدة المعاينة</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
