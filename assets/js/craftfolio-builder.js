/**
 * CraftFolio - Visual Website Builder Studio Client Engine
 * Features: Live Canvas Rendering, Drag & Drop Reordering, Dynamic Schema Inspector,
 * Multi-Page Management, Global Theme Design Tokens, Undo/Redo Snapshots, Debounced Autosave,
 * Device View Switcher (Desktop/Tablet/Mobile), Media Asset Picker, and Instant Publishing.
 */

class CraftFolioBuilder {
    constructor(config) {
        this.website = config.website;
        this.pages = config.pages || [];
        this.activePageId = config.activePageId || (this.pages[0] ? this.pages[0].id : null);
        this.templateData = config.templateData || null;
        this.locales = config.initialLocales || null;
        this.availableSections = config.availableSections || [];

        // Determine active content editing locale: 'ar' or 'en'
        const siteDir = this.website.direction || 'rtl';
        this.activeContentLocale = (siteDir === 'ltr') ? 'en' : 'ar';

        // Initialize / Normalize locales store
        if (!this.locales) {
            this.locales = {};
            if (this.templateData && this.templateData.locales) {
                this.locales = JSON.parse(JSON.stringify(this.templateData.locales));
            } else {
                this.locales[this.activeContentLocale] = {
                    direction: this.activeContentLocale === 'ar' ? 'rtl' : 'ltr',
                    sections: JSON.parse(JSON.stringify(config.initialSections || []))
                };
            }
        }

        // Load active sections from the active locale if available
        if (this.locales[this.activeContentLocale] && this.locales[this.activeContentLocale].sections && this.locales[this.activeContentLocale].sections.length > 0) {
            this.sections = JSON.parse(JSON.stringify(this.locales[this.activeContentLocale].sections));
        } else {
            this.sections = config.initialSections || [];
            if (!this.locales[this.activeContentLocale]) {
                this.locales[this.activeContentLocale] = {
                    direction: this.activeContentLocale === 'ar' ? 'rtl' : 'ltr',
                    sections: JSON.parse(JSON.stringify(this.sections))
                };
            }
        }

        this.theme = this.website.theme_settings || {
            primaryColor: '#2563eb',
            secondaryColor: '#3b82f6',
            backgroundColor: '#ffffff',
            textColor: '#0f172a',
            headingFont: 'Plus Jakarta Sans',
            bodyFont: 'Inter',
            borderRadius: '8px',
            containerWidth: 'max-w-6xl'
        };
        this.theme.direction = this.activeContentLocale === 'ar' ? 'rtl' : 'ltr';

        this.selectedSectionId = null;
        this.history = [];
        this.historyIndex = -1;
        this.autosaveTimer = null;
        this.isSaving = false;
        this.csrfToken = config.csrfToken;
        this.apiUrl = config.apiUrl || '';
        this.t = (key, params = {}, defaultVal = null) => {
            if (typeof window.__t === 'function') {
                return window.__t(key, params, defaultVal);
            }
            return defaultVal || key;
        };

        this.init();
    }

    init() {
        this.pushHistoryState(true);
        this.bindEvents();
        this.bindContentLocaleEvents();
        this.renderCanvas();
        this.renderPagesList();
        this.renderThemeSettings();
        this.updateHistoryButtons();
    }

    bindContentLocaleEvents() {
        document.querySelectorAll('.cf-lang-segment-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const targetLocale = btn.dataset.locale;
                this.switchContentLocale(targetLocale);
            });
        });
    }

    switchContentLocale(newLocale) {
        if (newLocale === this.activeContentLocale) return;

        // 1. Snapshot current active sections into current locale container
        if (this.locales && this.locales[this.activeContentLocale]) {
            this.locales[this.activeContentLocale].sections = JSON.parse(JSON.stringify(this.sections));
        }

        // 2. Set active locale
        this.activeContentLocale = newLocale;

        // 3. Ensure target locale package exists
        if (!this.locales) {
            this.locales = {};
        }
        if (!this.locales[newLocale] || !this.locales[newLocale].sections) {
            if (this.templateData && this.templateData.locales && this.templateData.locales[newLocale]) {
                this.locales[newLocale] = JSON.parse(JSON.stringify(this.templateData.locales[newLocale]));
            } else {
                this.locales[newLocale] = {
                    direction: newLocale === 'ar' ? 'rtl' : 'ltr',
                    sections: JSON.parse(JSON.stringify(this.sections))
                };
            }
        }

        // 4. Load sections for target locale
        this.sections = JSON.parse(JSON.stringify(this.locales[newLocale].sections || []));

        // 5. Update theme direction & overrides
        if (this.locales[newLocale].theme) {
            this.theme = Object.assign({}, this.theme, this.locales[newLocale].theme);
        }
        this.theme.direction = (newLocale === 'ar' ? 'rtl' : 'ltr');

        // 6. Update topbar segment buttons
        document.querySelectorAll('.cf-lang-segment-btn').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.locale === newLocale);
        });

        // 7. Reset selection & re-render
        this.selectedSectionId = null;
        this.renderCanvas();
        this.renderInspector();
        this.renderThemeSettings();
        this.pushHistoryState();

        this.showToast(newLocale === 'ar' ? this.t('js.toast_locale_switched_ar', {}, 'تم التبديل إلى محتوى النسخة العربية (RTL)') : this.t('js.toast_locale_switched_en', {}, 'Switched to English content edition (LTR)'));
    }

    // =========================================================================
    // HISTORY & UNDO/REDO
    // =========================================================================

    pushHistoryState(silent = false) {
        if (this.locales && this.locales[this.activeContentLocale]) {
            this.locales[this.activeContentLocale].sections = this.sections;
        }

        const snapshot = JSON.stringify({
            sections: this.sections,
            theme: this.theme,
            activeContentLocale: this.activeContentLocale,
            locales: this.locales
        });

        // If at end of history, push; otherwise truncate future
        if (this.historyIndex < this.history.length - 1) {
            this.history = this.history.slice(0, this.historyIndex + 1);
        }

        this.history.push(snapshot);
        this.historyIndex = this.history.length - 1;

        if (!silent) {
            this.triggerAutosave();
        }
        this.updateHistoryButtons();
    }

    undo() {
        if (this.historyIndex > 0) {
            this.historyIndex--;
            this.applyHistorySnapshot(this.history[this.historyIndex]);
        }
    }

    redo() {
        if (this.historyIndex < this.history.length - 1) {
            this.historyIndex++;
            this.applyHistorySnapshot(this.history[this.historyIndex]);
        }
    }

    applyHistorySnapshot(jsonStr) {
        const state = JSON.parse(jsonStr);
        this.sections = state.sections;
        this.theme = state.theme;
        if (state.activeContentLocale) this.activeContentLocale = state.activeContentLocale;
        if (state.locales) this.locales = state.locales;

        document.querySelectorAll('.cf-lang-segment-btn').forEach(btn => {
            btn.classList.toggle('active', btn.dataset.locale === this.activeContentLocale);
        });

        this.renderCanvas();
        this.renderThemeSettings();
        if (this.selectedSectionId) {
            this.renderInspector();
        }
        this.updateHistoryButtons();
        this.triggerAutosave();
    }

    updateHistoryButtons() {
        const btnUndo = document.getElementById('btnUndo');
        const btnRedo = document.getElementById('btnRedo');
        if (btnUndo) btnUndo.disabled = (this.historyIndex <= 0);
        if (btnRedo) btnRedo.disabled = (this.historyIndex >= this.history.length - 1);
    }

    // =========================================================================
    // AUTOSAVE & SAVE DRAFT
    // =========================================================================

    triggerAutosave() {
        this.setSaveStatus('saving');
        clearTimeout(this.autosaveTimer);
        this.autosaveTimer = setTimeout(() => {
            this.saveDraft();
        }, 1500); // 1.5s debounce
    }

    async saveDraft() {
        if (this.isSaving) return;
        this.isSaving = true;
        this.setSaveStatus('saving');

        if (this.locales && this.locales[this.activeContentLocale]) {
            this.locales[this.activeContentLocale].sections = this.sections;
            this.locales[this.activeContentLocale].direction = this.activeContentLocale === 'ar' ? 'rtl' : 'ltr';
        }

        try {
            const res = await fetch(`${this.apiUrl}/api/save-draft.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken
                },
                body: JSON.stringify({
                    page_id: this.activePageId,
                    website_id: this.website.id,
                    sections: this.sections,
                    locales: this.locales,
                    theme: this.theme
                })
            });
            const data = await res.json();
            if (data.success) {
                this.setSaveStatus('saved');
            } else {
                this.setSaveStatus('error');
            }
        } catch (e) {
            console.error('Autosave error:', e);
            this.setSaveStatus('error');
        } finally {
            this.isSaving = false;
        }
    }

    setSaveStatus(status) {
        const el = document.getElementById('autosaveIndicator');
        if (!el) return;
        el.className = 'cf-autosave-indicator ' + status;
        if (status === 'saving') {
            el.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> ${this.t('builder.saving', {}, 'Saving...')}`;
        } else if (status === 'saved') {
            el.innerHTML = `<i class="fa-solid fa-check"></i> ${this.t('builder.saved', {}, 'All changes saved')}`;
        } else if (status === 'error') {
            el.innerHTML = `<i class="fa-solid fa-circle-exclamation text-danger"></i> ${this.t('builder.error_saving', {}, 'Save failed')}`;
        }
    }

    // =========================================================================
    // CANVAS RENDERING
    // =========================================================================

    renderCanvas() {
        const canvas = document.getElementById('canvasViewport');
        if (!canvas) return;

        // Apply theme tokens
        this.applyThemeToCanvas(canvas);

        if (this.sections.length === 0) {
            canvas.innerHTML = `
                <div style="padding: 80px 20px; text-align: center; color: #64748b;">
                    <div style="font-size: 3rem; margin-bottom: 16px;">✨</div>
                    <h3 style="font-size: 1.3rem; margin-bottom: 8px; color: inherit;">Blank Canvas</h3>
                    <p style="font-size: 0.95rem; margin-bottom: 24px;">Click any section from the left panel to build your portfolio!</p>
                </div>
            `;
            return;
        }

        // Render HTML string of all sections
        let html = '';
        this.sections.forEach((sec, idx) => {
            html += this.renderSingleSectionHtml(sec, idx);
        });

        canvas.innerHTML = html;
        this.bindCanvasInteractions(canvas);
    }

    applyThemeToCanvas(el) {
        if (!el) return;
        const isAr = (this.activeContentLocale === 'ar');
        const dir = isAr ? 'rtl' : 'ltr';
        el.setAttribute('dir', dir);
        el.setAttribute('lang', isAr ? 'ar' : 'en');
        el.style.setProperty('--cf-primary', this.theme.primaryColor || '#2563eb');
        el.style.setProperty('--cf-secondary', this.theme.secondaryColor || '#3b82f6');
        el.style.setProperty('--cf-bg', this.theme.backgroundColor || '#ffffff');
        el.style.setProperty('--cf-text', this.theme.textColor || '#0f172a');
        
        if (isAr) {
            el.style.setProperty('--cf-heading-font', "'IBM Plex Sans Arabic', -apple-system, BlinkMacSystemFont, sans-serif");
            el.style.setProperty('--cf-body-font', "'IBM Plex Sans Arabic', -apple-system, BlinkMacSystemFont, sans-serif");
            el.style.setProperty('--cf-heading-line-height', '1.38');
            el.style.setProperty('--cf-body-line-height', '1.85');
            el.style.setProperty('--cf-heading-letter-spacing', '0em');
        } else {
            const hFont = this.theme.headingFont || 'Plus Jakarta Sans';
            const bFont = this.theme.bodyFont || 'Inter';
            el.style.setProperty('--cf-heading-font', `"${hFont}", -apple-system, BlinkMacSystemFont, sans-serif`);
            el.style.setProperty('--cf-body-font', `"${bFont}", -apple-system, BlinkMacSystemFont, sans-serif`);
            el.style.setProperty('--cf-heading-line-height', '1.25');
            el.style.setProperty('--cf-body-line-height', '1.6');
            el.style.setProperty('--cf-heading-letter-spacing', '-0.02em');
        }
        el.style.setProperty('--cf-radius', this.theme.borderRadius || '8px');

        el.style.backgroundColor = this.theme.backgroundColor || '#ffffff';
        el.style.color = this.theme.textColor || '#0f172a';
    }

    renderSingleSectionHtml(sec, idx) {
        const isSelected = (sec.id === this.selectedSectionId);
        const selectedClass = isSelected ? ' is-selected' : '';
        const styles = sec.styles || {};
        
        let styleStr = '';
        if (styles.paddingTop) styleStr += `padding-top: ${styles.paddingTop}; `;
        if (styles.paddingBottom) styleStr += `padding-bottom: ${styles.paddingBottom}; `;
        if (styles.backgroundColor && styles.backgroundColor !== 'transparent') styleStr += `background-color: ${styles.backgroundColor}; `;
        if (styles.textColor && styles.textColor !== 'inherit') styleStr += `color: ${styles.textColor}; `;

        const containerClass = styles.containerWidth || 'max-w-6xl';

        return `
            <div id="${sec.id}" class="cf-section cf-${sec.type}-section${selectedClass}" style="${styleStr}" data-section-id="${sec.id}" data-index="${idx}" draggable="true">
                <div class="cf-section-toolbar">
                    <span class="cf-toolbar-badge"><i class="fa-solid fa-cube"></i> ${sec.type}</span>
                    <div class="cf-toolbar-actions">
                        <button type="button" class="btn-move-up" data-id="${sec.id}" title="Move Up"><i class="fa-solid fa-arrow-up"></i></button>
                        <button type="button" class="btn-move-down" data-id="${sec.id}" title="Move Down"><i class="fa-solid fa-arrow-down"></i></button>
                        <button type="button" class="btn-copy" data-id="${sec.id}" title="Copy Section (Ctrl+C)"><i class="fa-solid fa-copy"></i></button>
                        <button type="button" class="btn-paste" data-id="${sec.id}" title="Paste Below (Ctrl+V)"><i class="fa-solid fa-paste"></i></button>
                        <button type="button" class="btn-duplicate" data-id="${sec.id}" title="Duplicate"><i class="fa-solid fa-clone"></i></button>
                        <button type="button" class="cf-btn-delete" data-id="${sec.id}" title="Delete"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </div>
                <div class="cf-container ${containerClass}">
                    ${this.generateSectionBody(sec)}
                </div>
            </div>
        `;
    }

    getProp(props, key, defaultVal = '') {
        if (!props) return defaultVal;
        if (props[key] !== undefined && props[key] !== null) {
            return props[key];
        }
        // Backward compatibility for legacy scattered _ar fields
        if (this.activeContentLocale === 'ar' && props[key + '_ar'] !== undefined && props[key + '_ar'] !== null) {
            return props[key + '_ar'];
        }
        return defaultVal;
    }

    generateSectionBody(sec) {
        const props = sec.props || {};
        const type = sec.type;
        const isRtl = (this.activeContentLocale === 'ar');

        switch (type) {
            case 'navbar': {
                const brandText = this.escape(this.getProp(props, 'brandText', 'Portfolio'));
                const ctaText = this.escape(this.getProp(props, 'ctaText', 'Get in Touch'));
                const aboutLbl = isRtl ? 'من أنا' : 'About';
                const projLbl = isRtl ? 'المشاريع' : 'Projects';
                const skillsLbl = isRtl ? 'المهارات' : 'Skills';
                const contactLbl = isRtl ? 'تواصل معي' : 'Contact';

                return `
                    <div class="cf-navbar-inner">
                        <div class="cf-brand">
                            ${props.logoUrl ? `<img src="${props.logoUrl}" class="cf-logo-img" alt="">` : ''}
                            <span class="cf-brand-text">${brandText}</span>
                        </div>
                        <nav class="cf-nav-links">
                            <a href="#about" class="cf-nav-link">${aboutLbl}</a>
                            <a href="#projects" class="cf-nav-link">${projLbl}</a>
                            <a href="#skills" class="cf-nav-link">${skillsLbl}</a>
                            <a href="#contact" class="cf-nav-link">${contactLbl}</a>
                        </nav>
                        ${ctaText ? `<a href="${props.ctaLink || '#contact'}" class="cf-btn cf-btn-primary cf-btn-sm">${ctaText}</a>` : ''}
                    </div>
                `;
            }

            case 'hero': {
                const variant = props.variant || props.layout || 'split';
                const badge = this.escape(this.getProp(props, 'badge', ''));
                const title = this.escape(this.getProp(props, 'title', 'Welcome'));
                const subtitle = this.escape(this.getProp(props, 'subtitle', ''));
                const description = this.nl2br(this.escape(this.getProp(props, 'description', '')));
                const primaryBtnText = this.escape(this.getProp(props, 'primaryButtonText', 'Explore'));
                const primaryBtnLink = props.primaryButtonLink || '#projects';
                const secBtnText = this.escape(this.getProp(props, 'secondaryButtonText', 'Contact'));
                const secBtnLink = props.secondaryButtonLink || '#contact';

                // 1. TERMINAL
                if (variant === 'terminal') {
                    const cmd = this.escape(props.command || 'npx run portfolio --profile=mohammad');
                    const status = this.escape(this.getProp(props, 'statusText', 'SYSTEM ONLINE · 99.99% UPTIME'));
                    return `
                        <div class="cf-terminal-window">
                            <div class="cf-terminal-header">
                                <div class="cf-terminal-dots"><span class="cf-terminal-dot red"></span><span class="cf-terminal-dot yellow"></span><span class="cf-terminal-dot green"></span></div>
                                <span class="cf-terminal-title">${this.escape(props.windowTitle || 'developer@workstation:~')}</span>
                                <span style="font-size:0.75rem;color:#3fb950;"><i class="fa-solid fa-circle" style="font-size:0.5rem;"></i> ${status}</span>
                            </div>
                            <div class="cf-terminal-body">
                                <div class="cf-terminal-prompt"><span class="cf-term-green">user@kernel</span>:<span class="cf-term-purple">~/workspace</span>$ <span style="color:#f0883e;">${cmd}</span></div>
                                <div style="margin:16px 0;padding-left:12px;border-left:2px solid #30363d;">
                                    <h1 style="font-size:clamp(1.6rem, 3.5vw, 2.5rem);font-family:'Fira Code',monospace;margin-bottom:8px;color:#58a6ff;">${title}</h1>
                                    ${subtitle ? `<div style="color:#7ee787;font-size:1.05rem;margin-bottom:12px;">// ${subtitle}</div>` : ''}
                                    ${description ? `<p style="color:#8b949e;line-height:1.7;margin-bottom:20px;max-width:720px;">${description}</p>` : ''}
                                </div>
                                <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:16px;">
                                    ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary cf-btn-sm" style="font-family:'Fira Code',monospace;"><i class="fa-solid fa-terminal"></i> ${primaryBtnText}</a>` : ''}
                                    ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline cf-btn-sm" style="font-family:'Fira Code',monospace;">${secBtnText}</a>` : ''}
                                </div>
                            </div>
                        </div>
                    `;
                }

                // 2. DOCS STYLE
                if (variant === 'docs') {
                    const codeSnippet = this.escape(props.codeSnippet || "curl -X GET https://api.systems.io/v2/cluster/health \\\n  -H 'Authorization: Bearer <token>'");
                    return `
                        <div class="cf-docs-hero">
                            ${badge ? `<div class="cf-docs-badge"><i class="fa-solid fa-code-branch"></i> ${badge}</div>` : ''}
                            <h1 style="font-size:clamp(2.2rem, 4.5vw, 3.6rem);letter-spacing:-0.03em;margin-bottom:14px;color:var(--cf-text);">${title}</h1>
                            ${subtitle ? `<div style="font-size:1.2rem;color:#38bdf8;font-family:'Fira Code',monospace;margin-bottom:16px;">${subtitle}</div>` : ''}
                            ${description ? `<p style="color:var(--cf-text-muted);font-size:1.05rem;line-height:1.7;max-width:720px;margin-bottom:24px;">${description}</p>` : ''}
                            <div class="cf-docs-code-card"><span class="token-cm">// Quickstart Service Verification</span><br>${this.nl2br(codeSnippet)}</div>
                            <div style="display:flex;gap:12px;margin-top:20px;">
                                ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary cf-btn-sm" style="font-family:'Fira Code',monospace;"><i class="fa-solid fa-book-open"></i> ${primaryBtnText}</a>` : ''}
                                ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline cf-btn-sm" style="font-family:'Fira Code',monospace;">${secBtnText}</a>` : ''}
                            </div>
                        </div>
                    `;
                }

                // 3. SWISS INTERNATIONAL
                if (variant === 'swiss') {
                    return `
                        <div class="cf-swiss-wrap">
                            <div class="cf-swiss-index">${this.escape(props.indexNum || '01 / IDENTITY')}</div>
                            <h1 class="cf-swiss-title">${title}</h1>
                            <div class="cf-swiss-grid">
                                <div>
                                    ${subtitle ? `<div style="font-size:1.4rem;font-weight:700;line-height:1.3;margin-bottom:16px;">${subtitle}</div>` : ''}
                                    ${description ? `<p style="font-size:1.05rem;line-height:1.7;opacity:0.85;max-width:640px;">${description}</p>` : ''}
                                    <div style="display:flex;gap:14px;margin-top:28px;">
                                        ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary" style="border-radius:0px;font-weight:700;">${primaryBtnText} ${isRtl ? '&larr;' : '&rarr;'}</a>` : ''}
                                        ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline" style="border-radius:0px;border-color:currentColor;">${secBtnText}</a>` : ''}
                                    </div>
                                </div>
                                <div style="border-left:1px solid rgba(0,0,0,0.15);padding-left:24px;font-size:0.85rem;line-height:1.8;">
                                    <div style="font-weight:700;text-transform:uppercase;margin-bottom:8px;">DISCIPLINE & LOCATION</div>
                                    <div>${this.escape(props.metadataLine1 || 'Brand Systems & Digital Design')}</div>
                                    <div style="color:var(--cf-text-muted);">${this.escape(props.metadataLine2 || 'Available for Select Commissions')}</div>
                                </div>
                            </div>
                        </div>
                    `;
                }

                // 4. EDITORIAL
                if (variant === 'editorial') {
                    const meta = this.escape(props.editorialMeta || 'ISSUE Nº 12 · CREATIVE DIRECTION & ESSAYS');
                    const quote = this.escape(this.getProp(props, 'editorialQuote', ''));
                    return `
                        <div class="cf-editorial-hero">
                            <div class="cf-editorial-meta">${meta}</div>
                            <h1 class="cf-editorial-headline">${title}</h1>
                            ${subtitle ? `<p style="font-size:1.2rem;color:var(--cf-text-muted);margin-bottom:24px;letter-spacing:-0.01em;">${subtitle}</p>` : ''}
                            ${quote ? `<blockquote class="cf-editorial-quote">&ldquo;${quote}&rdquo;</blockquote>` : ''}
                            ${description ? `<p style="font-size:1.05rem;line-height:1.8;color:var(--cf-text);max-width:680px;margin:0 auto 32px;">${description}</p>` : ''}
                            <div style="display:flex;justify-content:center;gap:16px;">
                                ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary cf-btn-lg">${primaryBtnText}</a>` : ''}
                                ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline cf-btn-lg">${secBtnText}</a>` : ''}
                            </div>
                        </div>
                    `;
                }

                // 5. BENTO
                if (variant === 'bento') {
                    const status = this.escape(this.getProp(props, 'bentoStatus', 'Available for Staff Roles / Contracts'));
                    const metricVal = this.escape(props.bentoMetricVal || '10M+');
                    const metricLabel = this.escape(this.getProp(props, 'bentoMetricLabel', 'Monthly Active Users Served'));
                    const stackPills = props.bentoStack || ['TypeScript', 'Next.js', 'Go', 'Distributed Systems', 'Tailwind'];
                    return `
                        <div class="cf-bento-grid">
                            <div class="cf-bento-cell span-2">
                                ${status ? `<div style="margin-bottom:12px;"><span class="cf-bento-pulse"><span class="cf-pulse-dot"></span> ${status}</span></div>` : ''}
                                <h1 style="font-size:clamp(2rem, 4vw, 3rem);line-height:1.1;margin-bottom:12px;">${title}</h1>
                                ${subtitle ? `<div style="font-size:1.15rem;color:var(--cf-text-muted);margin-bottom:14px;font-weight:600;">${subtitle}</div>` : ''}
                                ${description ? `<p style="font-size:0.95rem;line-height:1.7;color:var(--cf-text-muted);max-width:540px;">${description}</p>` : ''}
                                <div style="display:flex;gap:12px;margin-top:20px;">
                                    ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary cf-btn-sm">${primaryBtnText} <i class="fa-solid fa-arrow-${isRtl ? 'left' : 'right'}"></i></a>` : ''}
                                    ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline cf-btn-sm">${secBtnText}</a>` : ''}
                                </div>
                            </div>
                            <div class="cf-bento-cell" style="text-align:center;justify-content:center;">
                                <div style="font-size:3.5rem;font-weight:800;color:var(--cf-primary);line-height:1;">${metricVal}</div>
                                <div style="font-size:0.9rem;font-weight:600;color:var(--cf-text-muted);margin-top:8px;">${metricLabel}</div>
                            </div>
                            <div class="cf-bento-cell span-3" style="padding:20px 28px;">
                                <div style="font-size:0.75rem;text-transform:uppercase;color:var(--cf-text-muted);font-weight:700;margin-bottom:10px;">${isRtl ? 'القدرات البرمجية والمعمارية' : 'CORE CAPABILITIES & ARCHITECTURE'}</div>
                                <div style="display:flex;flex-wrap:wrap;gap:8px;">
                                    ${stackPills.map(p => `<span style="padding:6px 14px;background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.1);border-radius:9999px;font-size:0.85rem;font-weight:600;">${this.escape(p)}</span>`).join('')}
                                </div>
                            </div>
                        </div>
                    `;
                }

                // 6. NEO-BRUTALIST
                if (variant === 'neo-brutalist') {
                    const tag = this.escape(props.brutalistTag || 'CREATIVE TECHNOLOGIST // 2026');
                    return `
                        <div class="cf-brutalist-card">
                            <div class="cf-brutalist-badge">${tag}</div>
                            <h1 style="font-size:clamp(2.4rem, 5vw, 4.2rem);font-weight:900;line-height:1.05;text-transform:uppercase;letter-spacing:-0.03em;margin-bottom:16px;">${title}</h1>
                            ${subtitle ? `<div style="font-size:1.3rem;font-weight:800;background:#000;color:#fff;display:inline-block;padding:4px 12px;margin-bottom:16px;">${subtitle}</div>` : ''}
                            ${description ? `<p style="font-size:1.1rem;font-weight:600;line-height:1.6;margin-bottom:28px;max-width:680px;">${description}</p>` : ''}
                            <div style="display:flex;gap:16px;flex-wrap:wrap;">
                                ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-brutalist-btn">${primaryBtnText} ${isRtl ? '&larr;' : '&rarr;'}</a>` : ''}
                                ${secBtnText ? `<a href="${secBtnLink}" class="cf-brutalist-btn" style="background:#fff;color:#000;">${secBtnText}</a>` : ''}
                            </div>
                        </div>
                    `;
                }

                // 7. ARABIC HERO
                if (variant === 'arabic-hero') {
                    return `
                        <div class="cf-arabic-hero" dir="rtl">
                            ${badge ? `<div style="display:inline-block;background:rgba(245,158,11,0.15);color:#f59e0b;padding:4px 14px;border-radius:9999px;font-size:0.85rem;font-weight:700;margin-bottom:16px;">${badge}</div>` : ''}
                            <h1 style="font-size:clamp(2.5rem, 5.5vw, 4rem);font-family:'IBM Plex Sans Arabic',sans-serif;font-weight:800;line-height:1.2;margin-bottom:16px;color:var(--cf-text);">${title}</h1>
                            ${subtitle ? `<div style="font-size:1.35rem;color:var(--cf-primary);font-weight:700;margin-bottom:20px;">${subtitle}</div>` : ''}
                            <div class="cf-arabic-callout">
                                ${description ? `<p style="font-size:1.15rem;line-height:1.8;color:var(--cf-text);margin:0;">${description}</p>` : ''}
                            </div>
                            <div style="display:flex;gap:14px;margin-top:28px;">
                                ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary cf-btn-lg" style="font-family:'IBM Plex Sans Arabic',sans-serif;">${primaryBtnText} <i class="fa-solid fa-arrow-left"></i></a>` : ''}
                                ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline cf-btn-lg" style="font-family:'IBM Plex Sans Arabic',sans-serif;">${secBtnText}</a>` : ''}
                            </div>
                        </div>
                    `;
                }

                // 8. MINIMAL
                if (variant === 'minimal') {
                    return `
                        <div class="cf-minimal-wrap">
                            ${badge ? `<div style="font-family:'Fira Code',monospace;font-size:0.8rem;color:var(--cf-text-muted);margin-bottom:20px;">[ ${badge} ]</div>` : ''}
                            <div class="cf-minimal-lead">${title}</div>
                            ${subtitle ? `<div style="font-size:1.15rem;color:var(--cf-primary);margin-bottom:16px;font-weight:500;">${subtitle}</div>` : ''}
                            ${description ? `<p style="font-size:1rem;color:var(--cf-text-muted);line-height:1.8;max-width:680px;margin-bottom:32px;">${description}</p>` : ''}
                            <div style="display:flex;gap:16px;">
                                ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary cf-btn-sm">${primaryBtnText} ${isRtl ? '&larr;' : '&rarr;'}</a>` : ''}
                                ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline cf-btn-sm">${secBtnText}</a>` : ''}
                            </div>
                        </div>
                    `;
                }

                // 9. GALLERY
                if (variant === 'gallery') {
                    const badgeText = badge || '35MM ANALOG & DIGITAL CINEMA · RIYADH & REYKJAVIK';
                    return `
                        <div class="cf-gallery-hero-bg">
                            <div class="cf-gallery-lens-badge"><i class="fa-solid fa-camera"></i> ${badgeText}</div>
                            <h1 style="font-size:clamp(2.6rem, 5.5vw, 4.4rem);font-weight:800;letter-spacing:-0.03em;margin-bottom:16px;color:#fff;">${title}</h1>
                            ${subtitle ? `<div style="font-size:1.25rem;color:#94a3b8;margin-bottom:20px;letter-spacing:0.02em;">${subtitle}</div>` : ''}
                            ${description ? `<p style="color:#cbd5e1;font-size:1.05rem;line-height:1.7;max-width:700px;margin:0 auto 32px;">${description}</p>` : ''}
                            <div style="display:flex;justify-content:center;gap:14px;">
                                ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary cf-btn-lg"><i class="fa-solid fa-images"></i> ${primaryBtnText}</a>` : ''}
                                ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline cf-btn-lg">${secBtnText}</a>` : ''}
                            </div>
                        </div>
                    `;
                }

                // 10. MOTION DIRECTOR
                if (variant === 'motion') {
                    const badgeText = badge || 'HOUDINI · UNREAL ENGINE 5 · BLENDER 4.2';
                    return `
                        <div class="cf-motion-hero">
                            <div style="display:inline-block;padding:4px 14px;background:rgba(168,85,247,0.15);border:1px solid rgba(168,85,247,0.3);border-radius:9999px;color:#c084fc;font-size:0.8rem;font-weight:700;margin-bottom:20px;">${badgeText}</div>
                            <h1 style="font-size:clamp(2.6rem, 6vw, 4.5rem);font-weight:900;letter-spacing:-0.03em;line-height:1.1;margin-bottom:16px;background:linear-gradient(135deg,#fff 30%,#c084fc 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">${title}</h1>
                            ${subtitle ? `<div style="font-size:1.25rem;color:#a855f7;font-weight:600;margin-bottom:20px;">${subtitle}</div>` : ''}
                            ${description ? `<p style="color:#94a3b8;font-size:1.05rem;line-height:1.8;max-width:700px;margin:0 auto 32px;">${description}</p>` : ''}
                            <div style="display:flex;justify-content:center;gap:14px;">
                                ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary cf-btn-lg" style="background:#7c3aed;border-color:#7c3aed;"><i class="fa-solid fa-play"></i> ${primaryBtnText}</a>` : ''}
                                ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline cf-btn-lg">${secBtnText}</a>` : ''}
                            </div>
                        </div>
                    `;
                }

                // 11. EXECUTIVE
                if (variant === 'executive') {
                    const badgeText = badge || 'BOARD MEMBER · AUDIT COMMITTEE · STRATEGY CHAIR';
                    return `
                        <div class="cf-executive-hero" style="padding:60px 0 40px;">
                            <div style="font-size:0.8rem;letter-spacing:0.15em;text-transform:uppercase;color:var(--cf-primary);font-weight:700;margin-bottom:16px;">${badgeText}</div>
                            <h1 style="font-size:clamp(2.4rem, 5vw, 3.8rem);font-family:'Playfair Display',Georgia,serif;font-weight:700;line-height:1.2;margin-bottom:18px;">${title}</h1>
                            ${subtitle ? `<div style="font-size:1.25rem;color:var(--cf-primary);margin-bottom:20px;font-weight:600;">${subtitle}</div>` : ''}
                            ${description ? `<p style="font-size:1.1rem;line-height:1.8;color:var(--cf-text);opacity:0.9;max-width:740px;margin-bottom:32px;">${description}</p>` : ''}
                            <div style="display:flex;gap:14px;">
                                ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary cf-btn-lg">${primaryBtnText}</a>` : ''}
                                ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline cf-btn-lg">${secBtnText}</a>` : ''}
                            </div>
                        </div>
                    `;
                }

                // 12. CONSULTANT
                if (variant === 'consultant') {
                    const kpiNum = this.escape(props.kpiNum || '$140M+');
                    const kpiLbl = this.escape(this.getProp(props, 'kpiLbl', 'Enterprise Value Created'));
                    return `
                        <div class="cf-consultant-hero" style="display:grid;grid-template-columns:1.5fr 1fr;gap:40px;align-items:center;padding:50px 0;">
                            <div>
                                ${badge ? `<div style="display:inline-block;padding:4px 12px;background:rgba(37,99,235,0.1);color:var(--cf-primary);border-radius:4px;font-size:0.8rem;font-weight:700;margin-bottom:16px;">${badge}</div>` : ''}
                                <h1 style="font-size:clamp(2.2rem, 4.5vw, 3.5rem);font-weight:800;line-height:1.2;margin-bottom:16px;">${title}</h1>
                                ${subtitle ? `<div style="font-size:1.15rem;color:var(--cf-text-muted);font-weight:600;margin-bottom:16px;">${subtitle}</div>` : ''}
                                ${description ? `<p style="color:var(--cf-text-muted);font-size:1rem;line-height:1.7;margin-bottom:28px;">${description}</p>` : ''}
                                <div style="display:flex;gap:14px;">
                                    ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary">${primaryBtnText} ${isRtl ? '&larr;' : '&rarr;'}</a>` : ''}
                                    ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline">${secBtnText}</a>` : ''}
                                </div>
                            </div>
                            <div class="cf-consultant-kpi-card" style="padding:36px 28px;">
                                <div class="cf-consultant-kpi-num">${kpiNum}</div>
                                <div class="cf-consultant-kpi-lbl">${kpiLbl}</div>
                                <div style="margin-top:16px;padding-top:16px;border-top:1px solid var(--cf-card-border);font-size:0.85rem;color:var(--cf-text-muted);">${isRtl ? 'الاستراتيجية · الدمج والاستحواذ · الهيكلة' : 'Strategy · M&A Integration · Org Redesign'}</div>
                            </div>
                        </div>
                    `;
                }

                // 13. FREELANCE
                if (variant === 'freelance') {
                    const rating = this.escape(this.getProp(props, 'rating', '5.0 ★★★★★ (48 Verified Client Reviews)'));
                    return `
                        <div style="text-align:center;max-width:800px;margin:0 auto;padding:60px 20px 40px;">
                            ${rating ? `<div style="display:inline-flex;align-items:center;gap:6px;background:rgba(234,179,8,0.12);color:#eab308;padding:5px 14px;border-radius:9999px;font-size:0.85rem;font-weight:700;margin-bottom:20px;">${rating}</div>` : ''}
                            <h1 style="font-size:clamp(2.5rem, 5vw, 4rem);font-weight:800;letter-spacing:-0.03em;line-height:1.15;margin-bottom:18px;">${title}</h1>
                            ${subtitle ? `<div style="font-size:1.25rem;color:var(--cf-primary);font-weight:600;margin-bottom:18px;">${subtitle}</div>` : ''}
                            ${description ? `<p style="color:var(--cf-text-muted);font-size:1.05rem;line-height:1.7;margin-bottom:32px;">${description}</p>` : ''}
                            <div style="display:flex;justify-content:center;gap:14px;">
                                ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary cf-btn-lg">${primaryBtnText} <i class="fa-solid fa-arrow-${isRtl ? 'left' : 'right'}"></i></a>` : ''}
                                ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline cf-btn-lg">${secBtnText}</a>` : ''}
                            </div>
                        </div>
                    `;
                }

                // 14. NORDIC ARCHITECT
                if (variant === 'nordic') {
                    const tag = this.escape(props.nordicTag || 'STUDIO LINDQVIST · ARCHITECTURE & SPATIAL DESIGN');
                    return `
                        <div class="cf-nordic-hero">
                            ${tag ? `<div class="cf-nordic-tag">${tag}</div>` : ''}
                            <div class="cf-nordic-title">${title}</div>
                            ${subtitle ? `<div style="font-size:1.2rem;color:var(--cf-primary);margin-bottom:16px;">${subtitle}</div>` : ''}
                            ${description ? `<p style="font-size:1.05rem;line-height:1.8;color:var(--cf-text-muted);max-width:680px;margin-bottom:28px;">${description}</p>` : ''}
                            <div style="display:flex;gap:16px;">
                                ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary cf-btn-sm" style="border-radius:2px;">${primaryBtnText}</a>` : ''}
                                ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline cf-btn-sm" style="border-radius:2px;">${secBtnText}</a>` : ''}
                            </div>
                        </div>
                    `;
                }

                // DEFAULT SPLIT / CENTERED
                return `
                    <div class="cf-hero-wrap cf-hero-${props.layout || 'split'}">
                        <div class="cf-hero-content">
                            ${badge ? `<div class="cf-hero-badge"><span class="cf-badge-dot"></span> ${badge}</div>` : ''}
                            <h1 class="cf-hero-title">${title}</h1>
                            ${subtitle ? `<p class="cf-hero-subtitle">${subtitle}</p>` : ''}
                            ${description ? `<p class="cf-hero-desc">${description}</p>` : ''}
                            <div class="cf-hero-actions">
                                ${primaryBtnText ? `<a href="${primaryBtnLink}" class="cf-btn cf-btn-primary cf-btn-lg">${primaryBtnText} <i class="fa-solid fa-arrow-${isRtl ? 'left' : 'right'}"></i></a>` : ''}
                                ${secBtnText ? `<a href="${secBtnLink}" class="cf-btn cf-btn-outline cf-btn-lg">${secBtnText}</a>` : ''}
                            </div>
                        </div>
                        <div class="cf-hero-media">
                            ${props.avatarUrl ? `<div class="cf-avatar-frame"><img src="${props.avatarUrl}" class="cf-avatar-img" alt=""></div>` : `<div class="cf-avatar-placeholder"><i class="fa-solid fa-user-astronaut"></i></div>`}
                        </div>
                    </div>
                `;
            }

            case 'about': {
                const title = this.escape(this.getProp(props, 'title', 'About Me'));
                const subtitle = this.escape(this.getProp(props, 'subtitle', ''));
                const bio = this.nl2br(this.escape(this.getProp(props, 'bio', '')));
                return `
                    <div class="cf-section-header">
                        <h2 class="cf-section-title">${title}</h2>
                        ${subtitle ? `<p class="cf-section-subtitle">${subtitle}</p>` : ''}
                    </div>
                    <div class="cf-about-grid">
                        <div class="cf-about-bio">${bio}</div>
                        <div class="cf-about-highlights">
                            ${(props.highlights || []).map(h => `
                                <div class="cf-highlight-card">
                                    <div class="cf-highlight-val">${this.escape(h.value || '')}</div>
                                    <div class="cf-highlight-lbl">${this.escape(this.getProp(h, 'label', ''))}</div>
                                </div>
                            `).join('')}
                        </div>
                    </div>
                `;
            }

            case 'projects': {
                const variant = props.variant || 'cards';
                const title = this.escape(this.getProp(props, 'title', 'Featured Projects'));
                const subtitle = this.escape(this.getProp(props, 'subtitle', ''));
                const items = props.items || [];

                const headerHtml = `
                    <div class="cf-section-header">
                        <h2 class="cf-section-title">${title}</h2>
                        ${subtitle ? `<p class="cf-section-subtitle">${subtitle}</p>` : ''}
                    </div>
                `;

                // 1. TERMINAL
                if (variant === 'terminal') {
                    return `
                        ${headerHtml}
                        <div class="cf-terminal-repo-grid">
                            ${items.map(p => `
                                <div class="cf-terminal-repo-card">
                                    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">
                                        <div style="font-weight:700;color:#58a6ff;font-size:1.1rem;"><i class="fa-solid fa-code-branch"></i> ${this.escape(this.getProp(p, 'title', 'repo'))}</div>
                                        <span style="font-size:0.75rem;color:#8b949e;"><i class="fa-regular fa-star" style="color:#e3b341;"></i> ${this.escape(p.stars || '1.2k')}</span>
                                    </div>
                                    <div style="font-size:0.75rem;color:#3fb950;margin-bottom:8px;">branch: ${this.escape(p.branch || 'main')} [verified commit]</div>
                                    <p style="color:#8b949e;font-size:0.85rem;line-height:1.6;margin-bottom:14px;">${this.escape(this.getProp(p, 'description', ''))}</p>
                                    <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:14px;">
                                        ${(p.tags || []).map(t => `<span style="font-size:0.7rem;background:rgba(56,139,253,0.1);color:#58a6ff;padding:2px 8px;border-radius:4px;border:1px solid rgba(56,139,253,0.2);">${this.escape(t)}</span>`).join('')}
                                    </div>
                                    <div style="display:flex;gap:12px;font-size:0.8rem;">
                                        ${p.liveUrl ? `<a href="${p.liveUrl}" target="_blank" style="color:#3fb950;"><i class="fa-solid fa-play" style="font-size:0.7rem;"></i> Run Service</a>` : ''}
                                        ${p.githubUrl ? `<a href="${p.githubUrl}" target="_blank" style="color:#8b949e;"><i class="fa-brands fa-github"></i> Inspect Source</a>` : ''}
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    `;
                }

                // 2. SWISS INDEX
                if (variant === 'swiss') {
                    return `
                        <div class="cf-section-header" style="text-align:start;border-bottom:2px solid var(--cf-text);padding-bottom:12px;margin-bottom:0;">
                            <h2 style="font-size:2rem;text-transform:uppercase;letter-spacing:-0.02em;margin:0;">${title}</h2>
                        </div>
                        <div class="cf-swiss-index-table">
                            ${items.map((p, i) => `
                                <div class="cf-swiss-table-row">
                                    <span class="cf-swiss-row-num">${String(i + 1).padStart(2, '0')}</span>
                                    <div>
                                        <div class="cf-swiss-row-title">${this.escape(this.getProp(p, 'title', 'Project'))}</div>
                                        <div style="color:var(--cf-text-muted);font-size:0.85rem;">${this.escape(this.getProp(p, 'description', ''))}</div>
                                    </div>
                                    <span class="cf-swiss-row-meta">${this.escape(p.client || 'Independent')} · ${this.escape(p.year || '2025')}</span>
                                    <a href="${p.liveUrl || '#'}" target="_blank" class="cf-swiss-row-link">${isRtl ? '&larr;' : '&rarr;'} View</a>
                                </div>
                            `).join('')}
                        </div>
                    `;
                }

                // 3. EDITORIAL
                if (variant === 'editorial') {
                    return `
                        ${headerHtml}
                        <div>
                            ${items.map(p => `
                                <article class="cf-editorial-case-study">
                                    <div>
                                        <div style="font-size:0.8rem;letter-spacing:0.12em;text-transform:uppercase;color:var(--cf-text-muted);margin-bottom:8px;">${this.escape(p.client || 'Editorial Client')} &mdash; ${this.escape(p.year || '2025')}</div>
                                        <h3 style="font-family:'Playfair Display',Georgia,serif;font-size:clamp(1.8rem, 3.5vw, 2.6rem);font-style:italic;line-height:1.2;margin-bottom:16px;">${this.escape(this.getProp(p, 'title', 'Case Study'))}</h3>
                                        <p style="color:var(--cf-text);line-height:1.8;font-size:1rem;margin-bottom:24px;">${this.nl2br(this.escape(this.getProp(p, 'description', '')))}</p>
                                        ${p.liveUrl ? `<a href="${p.liveUrl}" target="_blank" class="cf-btn cf-btn-outline cf-btn-sm" style="border-radius:0px;">Read Case Study ${isRtl ? '&larr;' : '&rarr;'}</a>` : ''}
                                    </div>
                                    <div>
                                        ${p.imageUrl ? `<img src="${p.imageUrl}" alt="" style="width:100%;border-radius:4px;box-shadow:0 12px 30px -10px rgba(0,0,0,0.15);">` : `<div style="height:320px;background:rgba(0,0,0,0.04);border:1px solid rgba(0,0,0,0.08);display:flex;align-items:center;justify-content:center;color:var(--cf-text-muted);"><i class="fa-solid fa-camera" style="font-size:2rem;opacity:0.3;"></i></div>`}
                                    </div>
                                </article>
                            `).join('')}
                        </div>
                    `;
                }

                // 4. NEO-BRUTALIST
                if (variant === 'neo-brutalist') {
                    return `
                        ${headerHtml}
                        <div class="cf-projects-grid cf-cols-2">
                            ${items.map(p => `
                                <div class="cf-brutalist-card">
                                    <h3 style="font-size:1.5rem;font-weight:900;text-transform:uppercase;margin-bottom:10px;">${this.escape(this.getProp(p, 'title', 'Project'))}</h3>
                                    <p style="font-size:0.95rem;line-height:1.6;font-weight:600;margin-bottom:16px;">${this.escape(this.getProp(p, 'description', ''))}</p>
                                    <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:20px;">
                                        ${(p.tags || []).map(t => `<span style="font-size:0.75rem;font-weight:800;background:#fef08a;color:#000;border:2px solid #000;padding:2px 8px;">${this.escape(t)}</span>`).join('')}
                                    </div>
                                    ${p.liveUrl ? `<a href="${p.liveUrl}" target="_blank" class="cf-brutalist-btn" style="padding:8px 16px;font-size:0.85rem;">Launch ${isRtl ? '&larr;' : '&rarr;'}</a>` : ''}
                                </div>
                            `).join('')}
                        </div>
                    `;
                }

                // 5. ACADEMIC
                if (variant === 'academic') {
                    return `
                        ${headerHtml}
                        <div class="cf-academic-list">
                            ${items.map(p => `
                                <div class="cf-academic-paper-row">
                                    <div style="font-size:1.15rem;font-weight:700;margin-bottom:6px;color:var(--cf-text);">${this.escape(this.getProp(p, 'title', 'Research Paper Title'))}</div>
                                    <div style="font-size:0.9rem;color:var(--cf-primary);font-weight:600;margin-bottom:4px;">${this.escape(p.authors || 'Primary Author et al.')}</div>
                                    <div class="cf-academic-meta">
                                        <span><i class="fa-solid fa-book-open"></i> ${this.escape(p.venue || 'IEEE / ACM')} (${this.escape(p.year || '2025')})</span>
                                        ${p.doi ? `<span>DOI: ${this.escape(p.doi)}</span>` : ''}
                                    </div>
                                    ${p.pdfUrl ? `<div style="margin-top:12px;"><a href="${p.pdfUrl}" target="_blank" class="cf-btn cf-btn-secondary cf-btn-sm"><i class="fa-solid fa-file-pdf"></i> Read Paper (PDF)</a></div>` : ''}
                                </div>
                            `).join('')}
                        </div>
                    `;
                }

                // 6. DOCS SPEC GRID
                if (variant === 'docs') {
                    return `
                        ${headerHtml}
                        <div class="cf-docs-spec-grid">
                            ${items.map(p => {
                                const method = this.escape(p.method || 'GET');
                                const methodClass = 'cf-docs-method-' + method.toLowerCase();
                                return `
                                    <div class="cf-docs-spec-card">
                                        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;">
                                            <span class="cf-docs-method-badge ${methodClass}">${method}</span>
                                            <span style="font-family:'Fira Code',monospace;font-size:0.75rem;color:#10b981;"><i class="fa-solid fa-bolt"></i> ${this.escape(p.latency || 'p99 < 3ms')}</span>
                                        </div>
                                        <div style="font-family:'Fira Code',monospace;font-size:0.95rem;color:var(--cf-text);font-weight:700;margin-bottom:8px;">${this.escape(p.endpoint || '/v1/resource')}</div>
                                        <h4 style="font-size:1.1rem;font-weight:700;margin-bottom:6px;">${this.escape(this.getProp(p, 'title', 'API Spec'))}</h4>
                                        <p style="font-size:0.88rem;color:var(--cf-text-muted);line-height:1.6;margin-bottom:14px;">${this.escape(this.getProp(p, 'description', ''))}</p>
                                        ${p.liveUrl ? `<a href="${p.liveUrl}" target="_blank" style="font-size:0.82rem;font-weight:600;color:var(--cf-primary);"><i class="fa-solid fa-arrow-up-right-from-square"></i> Inspect Schema & Docs</a>` : ''}
                                    </div>
                                `;
                            }).join('')}
                        </div>
                    `;
                }

                // 7. BENTO PROJECTS
                if (variant === 'bento') {
                    const first = items[0] || null;
                    const rest = items.slice(1);
                    return `
                        ${headerHtml}
                        <div class="cf-bento-projects-wrap">
                            ${first ? `
                                <div class="cf-bento-proj-featured">
                                    <div>
                                        <div style="display:inline-block;padding:4px 10px;background:rgba(37,99,235,0.1);color:var(--cf-primary);border-radius:9999px;font-size:0.75rem;font-weight:700;margin-bottom:14px;">FEATURED SYSTEM</div>
                                        <h3 style="font-size:1.8rem;font-weight:800;line-height:1.2;margin-bottom:12px;">${this.escape(this.getProp(first, 'title', 'Featured Project'))}</h3>
                                        <p style="color:var(--cf-text-muted);font-size:0.98rem;line-height:1.7;margin-bottom:20px;">${this.escape(this.getProp(first, 'description', ''))}</p>
                                        <div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:24px;">
                                            ${(first.tags || []).map(t => `<span style="padding:4px 12px;background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.1);border-radius:9999px;font-size:0.8rem;font-weight:600;">${this.escape(t)}</span>`).join('')}
                                        </div>
                                    </div>
                                    ${first.liveUrl ? `<a href="${first.liveUrl}" target="_blank" class="cf-btn cf-btn-primary cf-btn-sm" style="align-self:flex-start;">Open Case Study ${isRtl ? '&larr;' : '&rarr;'}</a>` : ''}
                                </div>
                            ` : ''}
                            <div class="cf-bento-proj-stack">
                                ${rest.map(p => `
                                    <div class="cf-bento-proj-mini">
                                        <h4 style="font-size:1.2rem;font-weight:700;margin-bottom:6px;">${this.escape(this.getProp(p, 'title', 'Project'))}</h4>
                                        <p style="color:var(--cf-text-muted);font-size:0.85rem;line-height:1.6;margin-bottom:12px;">${this.escape(this.getProp(p, 'description', ''))}</p>
                                        <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:12px;">
                                            ${(p.tags || []).map(t => `<span style="font-size:0.75rem;color:var(--cf-primary);font-weight:600;">#${this.escape(t)}</span>`).join('')}
                                        </div>
                                        ${p.liveUrl ? `<a href="${p.liveUrl}" target="_blank" style="font-size:0.82rem;font-weight:600;color:var(--cf-text);text-decoration:underline;">View Project ${isRtl ? '&larr;' : '&rarr;'}</a>` : ''}
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    `;
                }

                // 8. GALLERY MASONRY
                if (variant === 'gallery') {
                    return `
                        ${headerHtml}
                        <div class="cf-gallery-masonry-grid">
                            ${items.map(p => `
                                <div class="cf-gallery-card">
                                    <div class="cf-gallery-img-box">
                                        ${p.imageUrl ? `<img src="${p.imageUrl}" alt="">` : `<div style="height:100%;display:flex;align-items:center;justify-content:center;background:#1e293b;color:#94a3b8;"><i class="fa-solid fa-camera" style="font-size:2.5rem;opacity:0.4;"></i></div>`}
                                    </div>
                                    <div style="padding:14px 18px 8px;">
                                        <h4 style="font-size:1.05rem;font-weight:700;color:#fff;margin:0;">${this.escape(this.getProp(p, 'title', 'Photograph'))}</h4>
                                    </div>
                                    <div class="cf-gallery-exif">
                                        <span><i class="fa-solid fa-camera"></i> ${this.escape(p.camera || 'Leica M11')}</span>
                                        <span>${this.escape(p.lens || '35mm f/1.4')}</span>
                                        <span>${this.escape(p.settings || '1/500s · ISO 100')}</span>
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    `;
                }

                // 9. MINIMALIST LIST
                if (variant === 'minimal') {
                    return `
                        ${headerHtml}
                        <div class="cf-minimal-project-list" style="border-top:1px solid rgba(148,163,184,0.14);margin-top:20px;">
                            ${items.map(p => `
                                <div class="cf-minimal-list-item">
                                    <div style="flex:1;">
                                        <div style="display:flex;align-items:baseline;gap:12px;">
                                            <strong style="font-size:1.1rem;letter-spacing:-0.01em;">${this.escape(this.getProp(p, 'title', 'Package'))}</strong>
                                            <span class="cf-minimal-meta">${this.escape(p.year || '2025')}</span>
                                        </div>
                                        <div style="color:var(--cf-text-muted);font-size:0.88rem;margin-top:4px;">${this.escape(this.getProp(p, 'description', ''))}</div>
                                    </div>
                                    <div style="display:flex;align-items:center;gap:16px;">
                                        ${(p.tags && p.tags.length) ? `<span class="cf-minimal-meta" style="opacity:0.7;">${this.escape(p.tags.slice(0, 2).join(' · '))}</span>` : ''}
                                        ${p.liveUrl ? `<a href="${p.liveUrl}" target="_blank" style="font-weight:600;font-size:0.85rem;">View ${isRtl ? '&larr;' : '&rarr;'}</a>` : ''}
                                    </div>
                                </div>
                            `).join('')}
                        </div>
                    `;
                }

                // 10. NORDIC ARCHITECTURE
                if (variant === 'nordic') {
                    return `
                        ${headerHtml}
                        <div class="cf-nordic-grid">
                            ${items.map(p => `
                                <div class="cf-nordic-card">
                                    ${p.imageUrl ? `<img src="${p.imageUrl}" alt="">` : ''}
                                    <div class="cf-nordic-card-meta">${this.escape(p.location || 'Norway')}</div>
                                    <h3 style="font-size:1.35rem;font-weight:600;margin-bottom:8px;">${this.escape(this.getProp(p, 'title', 'Residence'))}</h3>
                                    <p style="color:var(--cf-text-muted);font-size:0.92rem;line-height:1.6;margin-bottom:12px;">${this.escape(this.getProp(p, 'description', ''))}</p>
                                    ${p.liveUrl ? `<a href="${p.liveUrl}" target="_blank" style="font-size:0.82rem;font-weight:600;text-decoration:underline;">Inspect Project ${isRtl ? '&larr;' : '&rarr;'}</a>` : ''}
                                </div>
                            `).join('')}
                        </div>
                    `;
                }

                // DEFAULT CARDS GRID
                return `
                    ${headerHtml}
                    <div class="cf-projects-grid cf-cols-${props.columns || 3}">
                        ${items.map(p => `
                            <article class="cf-project-card">
                                ${p.imageUrl ? `<div class="cf-project-img-box"><img src="${p.imageUrl}" class="cf-project-img" alt=""></div>` : `<div class="cf-project-img-placeholder"><i class="fa-solid fa-laptop-code"></i></div>`}
                                <div class="cf-project-body">
                                    <h3 class="cf-project-name">${this.escape(this.getProp(p, 'title', 'Project'))}</h3>
                                    <p class="cf-project-desc">${this.escape(this.getProp(p, 'description', ''))}</p>
                                    <div class="cf-tags-wrap">
                                        ${(p.tags || []).map(t => `<span class="cf-tag">${this.escape(t)}</span>`).join('')}
                                    </div>
                                    <div class="cf-project-links">
                                        ${p.liveUrl ? `<a href="${p.liveUrl}" target="_blank" class="cf-link-live"><i class="fa-solid fa-arrow-up-right-from-square"></i> Demo</a>` : ''}
                                        ${p.githubUrl ? `<a href="${p.githubUrl}" target="_blank" class="cf-link-gh"><i class="fa-brands fa-github"></i> Code</a>` : ''}
                                    </div>
                                </div>
                            </article>
                        `).join('')}
                    </div>
                `;
            }

            case 'skills': {
                const title = this.escape(this.getProp(props, 'title', 'Skills & Technologies'));
                const subtitle = this.escape(this.getProp(props, 'subtitle', ''));
                return `
                    <div class="cf-section-header">
                        <h2 class="cf-section-title">${title}</h2>
                        ${subtitle ? `<p class="cf-section-subtitle">${subtitle}</p>` : ''}
                    </div>
                    <div class="cf-skills-wrap">
                        ${(props.categories || []).map(c => `
                            <div class="cf-skill-group">
                                <h4 class="cf-skill-group-title">${this.escape(this.getProp(c, 'name', 'Category'))}</h4>
                                <div class="cf-skill-tags">
                                    ${(c.skills || []).map(s => `<span class="cf-skill-pill"><i class="fa-solid fa-check"></i> ${this.escape(s)}</span>`).join('')}
                                </div>
                            </div>
                        `).join('')}
                    </div>
                `;
            }

            case 'experience': {
                const title = this.escape(this.getProp(props, 'title', 'Experience'));
                const subtitle = this.escape(this.getProp(props, 'subtitle', ''));
                return `
                    <div class="cf-section-header">
                        <h2 class="cf-section-title">${title}</h2>
                        ${subtitle ? `<p class="cf-section-subtitle">${subtitle}</p>` : ''}
                    </div>
                    <div class="cf-timeline-wrap">
                        ${(props.items || []).map(item => `
                            <div class="cf-timeline-item">
                                <div class="cf-timeline-dot"></div>
                                <div class="cf-timeline-content">
                                    <div class="cf-timeline-meta">
                                        <h3 class="cf-timeline-role">${this.escape(this.getProp(item, 'role', ''))} <span class="cf-timeline-comp">@ ${this.escape(this.getProp(item, 'company', ''))}</span></h3>
                                        <span class="cf-timeline-date">${this.escape(this.getProp(item, 'period', ''))}</span>
                                    </div>
                                    <p class="cf-timeline-desc">${this.nl2br(this.escape(this.getProp(item, 'description', '')))}</p>
                                </div>
                            </div>
                        `).join('')}
                    </div>
                `;
            }

            case 'education': {
                const title = this.escape(this.getProp(props, 'title', 'Education'));
                const subtitle = this.escape(this.getProp(props, 'subtitle', ''));
                return `
                    <div class="cf-section-header">
                        <h2 class="cf-section-title">${title}</h2>
                        ${subtitle ? `<p class="cf-section-subtitle">${subtitle}</p>` : ''}
                    </div>
                    <div class="cf-cards-grid">
                        ${(props.items || []).map(item => `
                            <div class="cf-edu-card">
                                <div class="cf-edu-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                                <h3 class="cf-edu-degree">${this.escape(this.getProp(item, 'degree', ''))}</h3>
                                <div class="cf-edu-inst">${this.escape(this.getProp(item, 'institution', ''))} &middot; <span class="cf-edu-period">${this.escape(this.getProp(item, 'period', ''))}</span></div>
                                <p class="cf-edu-desc">${this.escape(this.getProp(item, 'description', ''))}</p>
                            </div>
                        `).join('')}
                    </div>
                `;
            }

            case 'services': {
                const variant = props.variant || 'grid';
                const title = this.escape(this.getProp(props, 'title', 'Services'));
                const subtitle = this.escape(this.getProp(props, 'subtitle', ''));
                const items = props.items || [];

                const headerHtml = `
                    <div class="cf-section-header">
                        <h2 class="cf-section-title">${title}</h2>
                        ${subtitle ? `<p class="cf-section-subtitle">${subtitle}</p>` : ''}
                    </div>
                `;

                if (variant === 'pricing') {
                    return `
                        ${headerHtml}
                        <div class="cf-pricing-grid">
                            ${items.map(s => {
                                const isFeatured = s.isFeatured ? ' featured' : '';
                                return `
                                    <div class="cf-pricing-card${isFeatured}">
                                        ${s.badge ? `<span class="cf-pricing-badge">${this.escape(this.getProp(s, 'badge', ''))}</span>` : ''}
                                        <div>
                                            <h3 style="font-size:1.35rem;font-weight:700;margin-bottom:8px;">${this.escape(this.getProp(s, 'title', 'Package'))}</h3>
                                            <p style="color:var(--cf-text-muted);font-size:0.88rem;line-height:1.5;">${this.escape(this.getProp(s, 'description', ''))}</p>
                                            <div class="cf-pricing-cost">${this.escape(s.cost || '$2,400')}</div>
                                            <ul class="cf-pricing-features">
                                                ${(s.features || []).map(f => `<li><i class="fa-solid fa-circle-check"></i> ${this.escape(f)}</li>`).join('')}
                                            </ul>
                                        </div>
                                        <a href="${s.buttonLink || '#contact'}" class="cf-btn cf-btn-${s.isFeatured ? 'primary' : 'outline'}" style="width:100%;">${this.escape(this.getProp(s, 'buttonText', 'Book Package'))}</a>
                                    </div>
                                `;
                            }).join('')}
                        </div>
                    `;
                }

                return `
                    ${headerHtml}
                    <div class="cf-services-grid">
                        ${items.map(s => `
                            <div class="cf-service-card">
                                <div class="cf-service-icon"><i class="fa-solid ${s.icon || 'fa-cube'}"></i></div>
                                <h3 class="cf-service-title">${this.escape(this.getProp(s, 'title', ''))}</h3>
                                <p class="cf-service-desc">${this.escape(this.getProp(s, 'description', ''))}</p>
                            </div>
                        `).join('')}
                    </div>
                `;
            }

            case 'testimonials': {
                const title = this.escape(this.getProp(props, 'title', 'Testimonials'));
                return `
                    <div class="cf-section-header">
                        <h2 class="cf-section-title">${title}</h2>
                    </div>
                    <div class="cf-testimonials-grid">
                        ${(props.items || []).map(t => `
                            <div class="cf-testimonial-card">
                                <div class="cf-quote-icon"><i class="fa-solid fa-quote-left"></i></div>
                                <p class="cf-testimonial-text">"${this.escape(t.content)}"</p>
                                <div class="cf-author-name">${this.escape(t.name)}</div>
                                <div class="cf-author-role">${this.escape(t.role)}</div>
                            </div>
                        `).join('')}
                    </div>
                `;
            }

            case 'stats':
                return `
                    <div class="cf-stats-row">
                        ${(props.items || []).map(st => `
                            <div class="cf-stat-box">
                                <div class="cf-stat-val">${this.escape(st.value)}</div>
                                <div class="cf-stat-lbl">${this.escape(this.getProp(st, 'label', ''))}</div>
                            </div>
                        `).join('')}
                    </div>
                `;

            case 'gallery': {
                const title = this.escape(this.getProp(props, 'title', 'Gallery'));
                return `
                    <div class="cf-section-header">
                        <h2 class="cf-section-title">${title}</h2>
                    </div>
                    <div class="cf-gallery-grid">
                        ${(props.images || []).map(img => `
                            <div class="cf-gallery-item">
                                ${img.url ? `<img src="${img.url}" class="cf-gallery-img" alt="">` : `<div class="cf-gallery-placeholder"><i class="fa-solid fa-image"></i></div>`}
                                ${img.caption ? `<span class="cf-gallery-caption">${this.escape(img.caption)}</span>` : ''}
                            </div>
                        `).join('')}
                    </div>
                `;
            }

            case 'faq': {
                const title = this.escape(this.getProp(props, 'title', 'FAQ'));
                return `
                    <div class="cf-section-header">
                        <h2 class="cf-section-title">${title}</h2>
                    </div>
                    <div class="cf-faq-list">
                        ${(props.items || []).map(q => `
                            <details class="cf-faq-item">
                                <summary class="cf-faq-question">${this.escape(q.q)} <i class="fa-solid fa-chevron-down"></i></summary>
                                <div class="cf-faq-answer">${this.escape(q.a)}</div>
                            </details>
                        `).join('')}
                    </div>
                `;
            }

            case 'cta': {
                const headline = this.escape(this.getProp(props, 'headline', 'Work with me'));
                const subheadline = this.escape(this.getProp(props, 'subheadline', ''));
                const buttonText = this.escape(this.getProp(props, 'buttonText', 'Contact'));
                return `
                    <div class="cf-cta-card">
                        <h2 class="cf-cta-title">${headline}</h2>
                        ${subheadline ? `<p class="cf-cta-sub">${subheadline}</p>` : ''}
                        <a href="${props.buttonLink || '#contact'}" class="cf-btn cf-btn-primary cf-btn-lg">${buttonText}</a>
                    </div>
                `;
            }

            case 'contact': {
                const title = this.escape(this.getProp(props, 'title', 'Get In Touch'));
                const subtitle = this.escape(this.getProp(props, 'subtitle', ''));
                const nameHolder = isRtl ? 'اسمك الكريم' : 'Your Name';
                const emailHolder = isRtl ? 'بريدك الإلكتروني' : 'Your Email';
                const msgHolder = isRtl ? 'تفاصيل رسالتك أو استفسارك...' : 'Your Message...';
                const sendBtnText = isRtl ? 'إرسال الرسالة' : 'Send Message';

                return `
                    <div class="cf-section-header">
                        <h2 class="cf-section-title">${title}</h2>
                        ${subtitle ? `<p class="cf-section-subtitle">${subtitle}</p>` : ''}
                    </div>
                    <div class="cf-contact-grid">
                        <div class="cf-contact-info">
                            ${props.email ? `<div class="cf-contact-meta-row"><i class="fa-solid fa-envelope"></i> <span>${this.escape(props.email)}</span></div>` : ''}
                            ${props.location ? `<div class="cf-contact-meta-row"><i class="fa-solid fa-location-dot"></i> <span>${this.escape(this.getProp(props, 'location', ''))}</span></div>` : ''}
                            ${props.availability ? `<div class="cf-contact-meta-row"><i class="fa-solid fa-circle-check text-green"></i> <span>${this.escape(this.getProp(props, 'availability', ''))}</span></div>` : ''}
                        </div>
                        <form class="cf-contact-form" onsubmit="event.preventDefault();">
                            <div class="cf-form-group"><input type="text" class="cf-input" placeholder="${nameHolder}"></div>
                            <div class="cf-form-group"><input type="email" class="cf-input" placeholder="${emailHolder}"></div>
                            <div class="cf-form-group"><textarea class="cf-textarea" rows="3" placeholder="${msgHolder}"></textarea></div>
                            <button type="button" class="cf-btn cf-btn-primary">${sendBtnText}</button>
                        </form>
                    </div>
                `;
            }

            case 'social':
                return `
                    <div class="cf-social-pills">
                        ${(props.links || []).map(l => `
                            <a href="${l.url || '#'}" class="cf-social-pill"><i class="${l.icon || 'fa-solid fa-link'}"></i> ${this.escape(l.label || l.platform)}</a>
                        `).join('')}
                    </div>
                `;

            case 'footer': {
                const copy = this.escape(this.getProp(props, 'copyrightText', '© All rights reserved.'));
                return `
                    <div class="cf-footer-inner">
                        <div class="cf-footer-copy">${copy}</div>
                        <div class="cf-footer-attribution">
                            <span class="cf-attribution-badge"><span class="cf-badge-bolt"><i class="fa-solid fa-layer-group"></i></span> Built with <strong>AI Portfolio Builder</strong></span>
                        </div>
                    </div>
                `;
            }

            default:
                return `<div style="padding: 20px; text-align: center; color: #94a3b8;">Custom Section (${type})</div>`;
        }
    }

    // =========================================================================
    // INTERACTION & DRAG-AND-DROP HANDLERS
    // =========================================================================

    bindCanvasInteractions(canvas) {
        // Section selection
        canvas.querySelectorAll('.cf-section').forEach(secEl => {
            secEl.addEventListener('click', (e) => {
                e.stopPropagation();
                const secId = secEl.dataset.sectionId;
                this.selectSection(secId);
            });

            // Drag and drop reordering
            secEl.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('text/plain', secEl.dataset.sectionId);
                secEl.style.opacity = '0.4';
            });
            secEl.addEventListener('dragend', () => {
                secEl.style.opacity = '1';
                canvas.querySelectorAll('.cf-section').forEach(s => s.classList.remove('drag-over'));
            });
            secEl.addEventListener('dragover', (e) => {
                e.preventDefault();
                secEl.classList.add('drag-over');
            });
            secEl.addEventListener('dragleave', () => {
                secEl.classList.remove('drag-over');
            });
            secEl.addEventListener('drop', (e) => {
                e.preventDefault();
                secEl.classList.remove('drag-over');

                const paletteType = e.dataTransfer.getData('application/cf-section-type');
                if (paletteType) {
                    const targetIdx = this.sections.findIndex(s => s.id === secEl.dataset.sectionId);
                    this.insertSectionAt(paletteType, targetIdx + 1);
                    return;
                }

                const draggedId = e.dataTransfer.getData('text/plain');
                const targetId = secEl.dataset.sectionId;
                if (draggedId && targetId && draggedId !== targetId) {
                    this.reorderSection(draggedId, targetId);
                }
            });
        });

        // Toolbar buttons
        canvas.querySelectorAll('.btn-move-up').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                this.moveSection(btn.dataset.id, -1);
            });
        });
        canvas.querySelectorAll('.btn-move-down').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                this.moveSection(btn.dataset.id, 1);
            });
        });
        canvas.querySelectorAll('.btn-copy').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                this.copySection(btn.dataset.id);
            });
        });
        canvas.querySelectorAll('.btn-paste').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                this.pasteSection(btn.dataset.id);
            });
        });
        canvas.querySelectorAll('.btn-duplicate').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                this.duplicateSection(btn.dataset.id);
            });
        });
        canvas.querySelectorAll('.cf-btn-delete').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                this.deleteSection(btn.dataset.id);
            });
        });
    }

    selectSection(secId) {
        this.selectedSectionId = secId;
        document.querySelectorAll('.cf-section').forEach(el => {
            el.classList.toggle('is-selected', el.dataset.sectionId === secId);
        });
        this.renderInspector();
    }

    moveSection(secId, delta) {
        const idx = this.sections.findIndex(s => s.id === secId);
        if (idx === -1) return;
        const targetIdx = idx + delta;
        if (targetIdx < 0 || targetIdx >= this.sections.length) return;

        const temp = this.sections[idx];
        this.sections[idx] = this.sections[targetIdx];
        this.sections[targetIdx] = temp;

        this.pushHistoryState();
        this.renderCanvas();
    }

    reorderSection(draggedId, targetId) {
        const fromIdx = this.sections.findIndex(s => s.id === draggedId);
        const toIdx = this.sections.findIndex(s => s.id === targetId);
        if (fromIdx === -1 || toIdx === -1) return;

        const [item] = this.sections.splice(fromIdx, 1);
        this.sections.splice(toIdx, 0, item);

        this.pushHistoryState();
        this.renderCanvas();
    }

    duplicateSection(secId) {
        const sec = this.sections.find(s => s.id === secId);
        if (!sec) return;

        const clone = JSON.parse(JSON.stringify(sec));
        clone.id = 'sec_' + Math.random().toString(36).substr(2, 8);

        const idx = this.sections.findIndex(s => s.id === secId);
        this.sections.splice(idx + 1, 0, clone);

        this.selectedSectionId = clone.id;
        this.pushHistoryState();
        this.renderCanvas();
        this.renderInspector();
    }

    deleteSection(secId) {
        if (!confirm(this.t('js.confirm_delete_section', {}, 'Are you sure you want to delete this section?'))) return;
        this.sections = this.sections.filter(s => s.id !== secId);
        if (this.selectedSectionId === secId) {
            this.selectedSectionId = null;
            this.renderInspector();
        }
        this.pushHistoryState();
        this.renderCanvas();
    }

    copySection(secId) {
        const sec = this.sections.find(s => s.id === secId);
        if (!sec) return;
        this.clipboardSection = JSON.parse(JSON.stringify(sec));
        try {
            localStorage.setItem('cf_clipboard_section', JSON.stringify(this.clipboardSection));
        } catch (e) {}
        this.showToast(this.t('js.toast_section_copied', {}, 'Section copied to clipboard! (Ctrl+V to paste)'));
    }

    pasteSection(targetSecId = null) {
        let secToPaste = this.clipboardSection;
        if (!secToPaste) {
            try {
                const stored = localStorage.getItem('cf_clipboard_section');
                if (stored) secToPaste = JSON.parse(stored);
            } catch (e) {}
        }
        if (!secToPaste) {
            alert(this.t('js.alert_no_section_copied', {}, 'No section copied yet! Click the copy icon on any section first or press Ctrl+C.'));
            return;
        }

        const clone = JSON.parse(JSON.stringify(secToPaste));
        clone.id = 'sec_' + Math.random().toString(36).substr(2, 8);

        if (targetSecId) {
            const idx = this.sections.findIndex(s => s.id === targetSecId);
            if (idx !== -1) {
                this.sections.splice(idx + 1, 0, clone);
            } else {
                this.sections.push(clone);
            }
        } else {
            const footerIdx = this.sections.findIndex(s => s.type === 'footer');
            if (footerIdx !== -1) {
                this.sections.splice(footerIdx, 0, clone);
            } else {
                this.sections.push(clone);
            }
        }

        this.selectedSectionId = clone.id;
        this.pushHistoryState();
        this.renderCanvas();
        this.renderInspector();
        this.showToast(this.t('js.toast_section_pasted', {}, 'Section pasted successfully!'));
    }

    insertSectionAt(type, index) {
        const newSec = {
            id: 'sec_' + Math.random().toString(36).substr(2, 8),
            type: type,
            props: this.getDefaultPropsForType(type),
            styles: {
                paddingTop: '64px',
                paddingBottom: '64px',
                backgroundColor: 'transparent',
                textColor: 'inherit',
                containerWidth: 'max-w-6xl'
            }
        };
        const safeIdx = Math.max(0, Math.min(index, this.sections.length));
        this.sections.splice(safeIdx, 0, newSec);
        this.selectedSectionId = newSec.id;
        this.pushHistoryState();
        this.renderCanvas();
        this.renderInspector();
        const typeName = this.t('section.' + type, {}, type);
        this.showToast(this.t('js.toast_section_added', { type: typeName }, `Added ${typeName} section`));
    }

    showToast(msg) {
        let toast = document.getElementById('cfToast');
        if (!toast) {
            toast = document.createElement('div');
            toast.id = 'cfToast';
            toast.style.cssText = 'position:fixed;bottom:24px;right:24px;background:#1e293b;color:#f8fafc;padding:10px 18px;border-radius:8px;font-size:0.85rem;box-shadow:0 10px 25px rgba(0,0,0,0.5);z-index:99999;border:1px solid #334155;transition:opacity 0.3s;pointer-events:none;';
            document.body.appendChild(toast);
        }
        toast.textContent = msg;
        toast.style.opacity = '1';
        clearTimeout(this._toastTimer);
        this._toastTimer = setTimeout(() => {
            toast.style.opacity = '0';
        }, 2500);
    }

    addSectionFromPalette(type) {
        const newSec = {
            id: 'sec_' + Math.random().toString(36).substr(2, 8),
            type: type,
            props: this.getDefaultPropsForType(type),
            styles: {
                paddingTop: '64px',
                paddingBottom: '64px',
                backgroundColor: 'transparent',
                textColor: 'inherit',
                containerWidth: 'max-w-6xl'
            }
        };

        // Insert before footer if footer exists, else append
        const footerIdx = this.sections.findIndex(s => s.type === 'footer');
        if (footerIdx !== -1) {
            this.sections.splice(footerIdx, 0, newSec);
        } else {
            this.sections.push(newSec);
        }

        this.selectedSectionId = newSec.id;
        this.pushHistoryState();
        this.renderCanvas();
        this.renderInspector();

        // Scroll into view
        setTimeout(() => {
            const el = document.getElementById(newSec.id);
            if (el) el.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }, 100);
    }

    // =========================================================================
    // RIGHT INSPECTOR: PROPERTY & STYLE EDITING
    // =========================================================================

    renderInspector() {
        const container = document.getElementById('inspectorBody');
        const titleEl = document.getElementById('inspectorTitle');
        if (!container || !titleEl) return;

        if (!this.selectedSectionId) {
            titleEl.textContent = this.t('builder.tab_inspector', {}, 'Properties');
            container.innerHTML = `
                <div style="text-align: center; padding: 40px 10px; color: var(--text-muted);">
                    <i class="fa-solid fa-arrow-pointer" style="font-size: 2rem; margin-bottom: 12px; display: block;"></i>
                    <p style="font-size: 0.9rem;">${this.t('builder.inspector_empty_desc', {}, 'Select any section in the canvas to edit its content and styling.')}</p>
                </div>
            `;
            return;
        }

        const sec = this.sections.find(s => s.id === this.selectedSectionId);
        if (!sec) return;

        const secName = this.t('section.' + sec.type, {}, sec.type.toUpperCase());
        titleEl.textContent = `${this.t('common.edit', {}, 'Edit')} ${secName}`;

        let html = `
            <div class="cf-inspector-tabs" style="display:flex;gap:4px;margin-bottom:16px;background:var(--bg-surface-elevated);padding:4px;border-radius:6px;">
                <button type="button" class="cf-insp-tab active" data-tab="content" style="flex:1;padding:6px;border:none;background:var(--bg-surface);color:var(--text-primary);border-radius:4px;cursor:pointer;font-size:0.8rem;font-weight:600;">${this.t('builder.tab_content', {}, 'Content')}</button>
                <button type="button" class="cf-insp-tab" data-tab="style" style="flex:1;padding:6px;border:none;background:transparent;color:var(--text-muted);border-radius:4px;cursor:pointer;font-size:0.8rem;font-weight:600;">${this.t('builder.tab_styles', {}, 'Styles')}</button>
            </div>

            <div id="inspTabContent">
                ${this.generatePropsForm(sec)}
            </div>

            <div id="inspTabStyle" style="display:none;">
                <div class="cf-ui-form-group">
                    <label class="cf-ui-label">${this.t('builder.style_padding_top', {}, 'Padding Top')}</label>
                    <input type="text" class="cf-ui-input" id="stylePaddingTop" value="${sec.styles.paddingTop || '64px'}">
                </div>
                <div class="cf-ui-form-group">
                    <label class="cf-ui-label">${this.t('builder.style_padding_bottom', {}, 'Padding Bottom')}</label>
                    <input type="text" class="cf-ui-input" id="stylePaddingBottom" value="${sec.styles.paddingBottom || '64px'}">
                </div>
                <div class="cf-ui-form-group">
                    <label class="cf-ui-label">${this.t('builder.style_bg_color', {}, 'Background Color')}</label>
                    <input type="color" class="cf-ui-input" style="height:40px;padding:4px;" id="styleBgColor" value="${sec.styles.backgroundColor && sec.styles.backgroundColor !== 'transparent' ? sec.styles.backgroundColor : '#ffffff'}">
                </div>
                <div class="cf-ui-form-group">
                    <label class="cf-ui-label">${this.t('builder.style_container_width', {}, 'Container Width')}</label>
                    <select class="cf-ui-select" id="styleContainerWidth">
                        <option value="max-w-4xl" ${sec.styles.containerWidth === 'max-w-4xl' ? 'selected' : ''}>${this.t('builder.width_narrow', {}, 'Narrow (900px)')}</option>
                        <option value="max-w-5xl" ${sec.styles.containerWidth === 'max-w-5xl' ? 'selected' : ''}>${this.t('builder.width_medium', {}, 'Medium (1040px)')}</option>
                        <option value="max-w-6xl" ${sec.styles.containerWidth === 'max-w-6xl' ? 'selected' : ''}>${this.t('builder.width_standard', {}, 'Standard (1200px)')}</option>
                        <option value="max-w-7xl" ${sec.styles.containerWidth === 'max-w-7xl' ? 'selected' : ''}>${this.t('builder.width_wide', {}, 'Wide (1360px)')}</option>
                    </select>
                </div>
            </div>
        `;

        container.innerHTML = html;
        this.bindInspectorEvents(sec);
    }

    generatePropsForm(sec) {
        const props = sec.props || {};
        let fields = '';
        const defaultFormatted = (key) => key.replace(/([A-Z])/g, ' $1').replace(/^./, str => str.toUpperCase());

        for (const [key, val] of Object.entries(props)) {
            if (typeof val === 'string') {
                const label = this.t('props.' + key, {}, defaultFormatted(key));
                const isImage = key.toLowerCase().includes('url') || key.toLowerCase().includes('image') || key.toLowerCase().includes('avatar');
                const isLong = (val.length > 50) || key.toLowerCase().includes('bio') || key.toLowerCase().includes('description');

                if (isLong) {
                    fields += `
                        <div class="cf-ui-form-group">
                            <label class="cf-ui-label">${label}</label>
                            <textarea class="cf-ui-textarea prop-field" rows="3" data-prop="${key}">${this.escape(val)}</textarea>
                        </div>
                    `;
                } else {
                    fields += `
                        <div class="cf-ui-form-group">
                            <label class="cf-ui-label">${label}</label>
                            <div style="display:flex;gap:6px;">
                                <input type="text" class="cf-ui-input prop-field" data-prop="${key}" value="${this.escape(val)}">
                                ${isImage ? `<button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm btn-pick-media" data-target="${key}" title="${this.t('builder.choose_from_media', {}, 'Choose from Media Library')}"><i class="fa-solid fa-image"></i></button>` : ''}
                            </div>
                        </div>
                    `;
                }
            }
        }
        return fields || `<p style="color:var(--text-muted);font-size:0.85rem;">${this.t('builder.no_props_editable', {}, 'No editable text properties for this section.')}</p>`;
    }

    bindInspectorEvents(sec) {
        const container = document.getElementById('inspectorBody');

        // Tab toggle
        container.querySelectorAll('.cf-insp-tab').forEach(tab => {
            tab.addEventListener('click', () => {
                container.querySelectorAll('.cf-insp-tab').forEach(t => {
                    t.classList.remove('active');
                    t.style.background = 'transparent';
                    t.style.color = 'var(--text-muted)';
                });
                tab.classList.add('active');
                tab.style.background = 'var(--bg-surface)';
                tab.style.color = 'var(--text-primary)';

                const target = tab.dataset.tab;
                document.getElementById('inspTabContent').style.display = (target === 'content') ? 'block' : 'none';
                document.getElementById('inspTabStyle').style.display = (target === 'style') ? 'block' : 'none';
            });
        });

        // Content Prop inputs
        container.querySelectorAll('.prop-field').forEach(input => {
            input.addEventListener('input', (e) => {
                const propKey = input.dataset.prop;
                sec.props[propKey] = input.value;
                this.renderCanvas();
                this.triggerAutosave();
            });
        });

        // Pick Media button
        container.querySelectorAll('.btn-pick-media').forEach(btn => {
            btn.addEventListener('click', () => {
                this.openMediaPickerModal((selectedUrl) => {
                    const propKey = btn.dataset.target;
                    sec.props[propKey] = selectedUrl;
                    this.renderCanvas();
                    this.renderInspector();
                    this.pushHistoryState();
                });
            });
        });

        // Style inputs
        const pt = document.getElementById('stylePaddingTop');
        const pb = document.getElementById('stylePaddingBottom');
        const bg = document.getElementById('styleBgColor');
        const cw = document.getElementById('styleContainerWidth');

        if (pt) pt.addEventListener('input', () => { sec.styles.paddingTop = pt.value; this.renderCanvas(); this.triggerAutosave(); });
        if (pb) pb.addEventListener('input', () => { sec.styles.paddingBottom = pb.value; this.renderCanvas(); this.triggerAutosave(); });
        if (bg) bg.addEventListener('input', () => { sec.styles.backgroundColor = bg.value; this.renderCanvas(); this.triggerAutosave(); });
        if (cw) cw.addEventListener('change', () => { sec.styles.containerWidth = cw.value; this.renderCanvas(); this.triggerAutosave(); });
    }

    // =========================================================================
    // THEME SETTINGS
    // =========================================================================

    renderThemeSettings() {
        const priInput = document.getElementById('themePrimaryColor');
        const secInput = document.getElementById('themeSecondaryColor');
        const bgInput = document.getElementById('themeBgColor');
        const txtInput = document.getElementById('themeTextColor');
        const dirInput = document.getElementById('themeDirection');
        const hFontInput = document.getElementById('themeHeadingFont');
        const bFontInput = document.getElementById('themeBodyFont');
        const radiusInput = document.getElementById('themeRadius');

        if (priInput) priInput.value = this.theme.primaryColor || '#2563eb';
        if (secInput) secInput.value = this.theme.secondaryColor || '#3b82f6';
        if (bgInput) bgInput.value = this.theme.backgroundColor || '#ffffff';
        if (txtInput) txtInput.value = this.theme.textColor || '#0f172a';
        if (dirInput) dirInput.value = this.theme.direction || 'ltr';
        if (hFontInput) hFontInput.value = this.theme.headingFont || 'Plus Jakarta Sans';
        if (bFontInput) bFontInput.value = this.theme.bodyFont || 'Inter';
        if (radiusInput) radiusInput.value = this.theme.borderRadius || '8px';
    }

    // =========================================================================
    // PAGE MANAGEMENT
    // =========================================================================

    renderPagesList() {
        const list = document.getElementById('pagesList');
        if (!list) return;

        list.innerHTML = this.pages.map(p => `
            <div class="cf-sec-item-card ${p.id == this.activePageId ? 'active' : ''}" style="${p.id == this.activePageId ? 'border-color:var(--primary);background:var(--bg-surface-hover);' : ''}">
                <div class="cf-sec-icon-box"><i class="fa-solid ${p.is_home ? 'fa-house' : 'fa-file'}"></i></div>
                <div class="cf-sec-info">
                    <div class="cf-sec-name">${this.escape(p.title)} ${p.is_home ? `<span class="cf-ui-badge" style="font-size:0.65rem;">${this.t('builder.page_home_badge', {}, 'Home')}</span>` : ''}</div>
                    <div class="cf-sec-sub">/${this.escape(p.slug)}</div>
                </div>
                ${!p.is_home ? `<button type="button" class="cf-ui-btn cf-ui-btn-ghost cf-ui-btn-sm btn-del-page" data-page-id="${p.id}" style="color:#ef4444;"><i class="fa-solid fa-trash"></i></button>` : ''}
            </div>
        `).join('');

        list.querySelectorAll('.cf-sec-item-card').forEach((card, idx) => {
            card.addEventListener('click', (e) => {
                if (e.target.closest('.btn-del-page')) return;
                const page = this.pages[idx];
                if (page.id != this.activePageId) {
                    this.switchPage(page.id);
                }
            });
        });

        list.querySelectorAll('.btn-del-page').forEach(btn => {
            btn.addEventListener('click', async (e) => {
                e.stopPropagation();
                if (!confirm(this.t('js.confirm_delete_page', {}, 'Are you sure you want to delete this page?'))) return;
                const pageId = btn.dataset.pageId;
                await this.deletePage(pageId);
            });
        });
    }

    async switchPage(pageId) {
        // Save current draft first
        await this.saveDraft();
        window.location.href = `editor.php?id=${this.website.id}&page_id=${pageId}`;
    }

    async deletePage(pageId) {
        try {
            const res = await fetch(`${this.apiUrl}/api/delete-page`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.csrfToken },
                body: JSON.stringify({ page_id: pageId, website_id: this.website.id })
            });
            const data = await res.json();
            if (data.success) {
                this.pages = this.pages.filter(p => p.id != pageId);
                this.renderPagesList();
            } else {
                alert(data.message);
            }
        } catch (e) {
            alert(this.t('js.error_delete_page', {}, 'Error deleting page'));
        }
    }

    // =========================================================================
    // MODALS: PUBLISH, ASSETS, PREVIEW
    // =========================================================================

    async publish() {
        const btn = document.getElementById('btnPublish');
        if (btn) {
            btn.disabled = true;
            btn.innerHTML = `<i class="fa-solid fa-spinner fa-spin"></i> ${this.t('builder.publishing', {}, 'Publishing...')}`;
        }

        // Save draft first
        await this.saveDraft();

        try {
            const res = await fetch(`${this.apiUrl}/api/publish-website`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.csrfToken },
                body: JSON.stringify({ website_id: this.website.id })
            });
            const data = await res.json();
            if (data.success) {
                this.openPublishSuccessModal(data.url);
            } else {
                alert(this.t('js.error_publish_with_msg', { message: data.message }, 'Publish error: ' + data.message));
            }
        } catch (e) {
            alert(this.t('js.error_publish_generic', {}, 'Error during publishing.'));
        } finally {
            if (btn) {
                btn.disabled = false;
                btn.innerHTML = `<i class="fa-solid fa-cloud-arrow-up"></i> ${this.t('builder.publish', {}, 'Publish')}`;
            }
        }
    }

    openPublishSuccessModal(publicUrl) {
        const modal = document.getElementById('publishSuccessModal');
        const urlInput = document.getElementById('pubModalUrl');
        const visitLink = document.getElementById('pubModalVisit');

        if (urlInput) urlInput.value = publicUrl;
        if (visitLink) visitLink.href = publicUrl;
        if (modal) modal.classList.add('open');
    }

    openMediaPickerModal(onSelectCallback) {
        const modal = document.getElementById('mediaPickerModal');
        if (!modal) return;
        modal.classList.add('open');
        this.loadMediaLibrary(onSelectCallback);
    }

    async loadMediaLibrary(onSelectCallback) {
        const grid = document.getElementById('mediaPickerGrid');
        if (!grid) return;
        grid.innerHTML = `<div style="padding:20px;text-align:center;"><i class="fa-solid fa-spinner fa-spin"></i> ${this.t('builder.loading_assets', {}, 'Loading assets...')}</div>`;

        try {
            const res = await fetch(`${this.apiUrl}/api/assets`);
            const data = await res.json();
            if (data.success && data.assets.length > 0) {
                grid.innerHTML = data.assets.map(a => `
                    <div class="cf-gallery-item" style="cursor:pointer;" data-url="${a.full_url}">
                        <img src="${a.full_url}" class="cf-gallery-img" alt="">
                    </div>
                `).join('');

                grid.querySelectorAll('.cf-gallery-item').forEach(item => {
                    item.addEventListener('click', () => {
                        const url = item.dataset.url;
                        onSelectCallback(url);
                        document.getElementById('mediaPickerModal').classList.remove('open');
                    });
                });
            } else {
                grid.innerHTML = `<p style="color:var(--text-muted);text-align:center;padding:20px;">${this.t('builder.no_assets_modal', {}, 'No assets uploaded yet. Use the upload button below!')}</p>`;
            }
        } catch (e) {
            grid.innerHTML = `<p style="color:#ef4444;text-align:center;">${this.t('builder.failed_load_assets', {}, 'Failed to load assets.')}</p>`;
        }
    }

    async loadSidebarMedia() {
        const grid = document.getElementById('sidebarAssetGrid');
        if (!grid) return;
        grid.innerHTML = `<div style="grid-column: 1 / -1; padding:20px;text-align:center;"><i class="fa-solid fa-spinner fa-spin"></i> ${this.t('builder.loading_assets', {}, 'Loading assets...')}</div>`;

        try {
            const res = await fetch(`${this.apiUrl}/api/assets.php`);
            const data = await res.json();
            if (data.success && data.assets.length > 0) {
                grid.innerHTML = data.assets.map(a => `
                    <div class="cf-asset-card" style="background:var(--bg-surface-hover);border:1px solid var(--border-subtle);border-radius:6px;overflow:hidden;position:relative;" data-id="${a.id}">
                        <div style="height:90px;overflow:hidden;background:#000;display:flex;align-items:center;justify-content:center;">
                            <img src="${a.full_url}" style="width:100%;height:100%;object-fit:cover;" alt="${a.original_name}">
                        </div>
                        <div style="padding:6px;font-size:0.75rem;">
                            <div style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:600;" title="${a.original_name}">${a.original_name}</div>
                            <div style="font-size:0.7rem;color:var(--text-muted);">${(a.file_size / 1024).toFixed(1)} KB</div>
                            <div style="display:flex;gap:4px;margin-top:6px;">
                                <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm btn-copy-url" data-url="${a.full_url}" title="${this.t('builder.btn_copy_url', {}, 'Copy URL')}" style="flex:1;padding:2px 4px;font-size:0.7rem;">
                                    <i class="fa-solid fa-copy"></i>
                                </button>
                                <button type="button" class="cf-ui-btn cf-ui-btn-secondary cf-ui-btn-sm btn-rename-asset" data-id="${a.id}" data-name="${a.original_name}" title="${this.t('common.edit', {}, 'Rename')}" style="padding:2px 6px;font-size:0.7rem;">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button type="button" class="cf-ui-btn cf-ui-btn-danger cf-ui-btn-sm btn-delete-asset" data-id="${a.id}" title="${this.t('common.delete', {}, 'Delete')}" style="padding:2px 6px;font-size:0.7rem;background:rgba(239,68,68,0.2);color:#ef4444;border-color:rgba(239,68,68,0.3);">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                `).join('');

                grid.querySelectorAll('.btn-copy-url').forEach(btn => {
                    btn.addEventListener('click', () => {
                        navigator.clipboard.writeText(btn.dataset.url);
                        this.showToast(this.t('js.toast_asset_copied', {}, 'Copied asset URL to clipboard!'));
                    });
                });

                grid.querySelectorAll('.btn-rename-asset').forEach(btn => {
                    btn.addEventListener('click', async () => {
                        const newName = prompt(this.t('js.prompt_rename_asset', {}, 'Enter new asset name:'), btn.dataset.name);
                        if (!newName || newName.trim() === btn.dataset.name) return;
                        try {
                            const resp = await fetch(`${this.apiUrl}/api/rename-asset.php`, {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.csrfToken },
                                body: JSON.stringify({ asset_id: btn.dataset.id, name: newName.trim() })
                            });
                            const rData = await resp.json();
                            if (rData.success) {
                                this.showToast(this.t('js.toast_asset_renamed', {}, 'Asset renamed successfully!'));
                                this.loadSidebarMedia();
                            } else {
                                alert(rData.message || this.t('js.error_rename_failed', {}, 'Rename failed'));
                            }
                        } catch (e) {
                            alert(this.t('js.error_rename_failed', {}, 'Rename failed.'));
                        }
                    });
                });

                grid.querySelectorAll('.btn-delete-asset').forEach(btn => {
                    btn.addEventListener('click', async () => {
                        if (!confirm(this.t('js.confirm_delete_asset', {}, 'Are you sure you want to delete this asset?'))) return;
                        try {
                            const resp = await fetch(`${this.apiUrl}/api/delete-asset.php`, {
                                method: 'POST',
                                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.csrfToken },
                                body: JSON.stringify({ asset_id: btn.dataset.id })
                            });
                            const rData = await resp.json();
                            if (rData.success) {
                                this.showToast(this.t('js.toast_asset_deleted', {}, 'Asset deleted successfully!'));
                                this.loadSidebarMedia();
                            } else {
                                alert(rData.message || this.t('js.error_delete_failed', {}, 'Delete failed'));
                            }
                        } catch (e) {
                            alert(this.t('js.error_delete_failed', {}, 'Delete failed.'));
                        }
                    });
                });
            } else {
                grid.innerHTML = `<p style="grid-column: 1 / -1; color:var(--text-muted);text-align:center;padding:20px;font-size:0.8rem;">${this.t('builder.no_assets_sidebar', {}, 'No assets uploaded yet.')}</p>`;
            }
        } catch (e) {
            grid.innerHTML = `<p style="grid-column: 1 / -1; color:#ef4444;text-align:center;font-size:0.8rem;">${this.t('builder.failed_load_assets', {}, 'Failed to load assets.')}</p>`;
        }
    }

    // =========================================================================
    // GENERAL EVENT BINDING
    // =========================================================================

    bindEvents() {
        // Device switcher
        document.querySelectorAll('.cf-device-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.cf-device-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
                const viewport = document.getElementById('canvasViewport');
                viewport.className = 'cf-canvas-viewport cf-viewport-' + btn.dataset.device;
            });
        });

        // Undo & Redo buttons
        const btnUndo = document.getElementById('btnUndo');
        const btnRedo = document.getElementById('btnRedo');
        if (btnUndo) btnUndo.addEventListener('click', () => this.undo());
        if (btnRedo) btnRedo.addEventListener('click', () => this.redo());

        // Keyboard shortcuts: Ctrl+Z, Ctrl+Y, Ctrl+C, Ctrl+V
        window.addEventListener('keydown', (e) => {
            const isTyping = ['INPUT', 'TEXTAREA', 'SELECT'].includes(document.activeElement?.tagName);

            if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'z') {
                if (e.shiftKey) {
                    this.redo();
                } else {
                    this.undo();
                }
            } else if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'y') {
                this.redo();
            } else if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'c' && !isTyping) {
                if (this.selectedSectionId) {
                    this.copySection(this.selectedSectionId);
                }
            } else if ((e.ctrlKey || e.metaKey) && e.key.toLowerCase() === 'v' && !isTyping) {
                this.pasteSection(this.selectedSectionId);
            }
        });

        // Publish button
        const btnPublish = document.getElementById('btnPublish');
        if (btnPublish) btnPublish.addEventListener('click', () => this.publish());

        // Save Draft manual button
        const btnSaveDraft = document.getElementById('btnSaveDraft');
        if (btnSaveDraft) btnSaveDraft.addEventListener('click', () => this.saveDraft());

        // Add section palette cards (Click or Drag & Drop)
        document.querySelectorAll('.btn-add-section').forEach(card => {
            card.setAttribute('draggable', 'true');
            card.addEventListener('dragstart', (e) => {
                e.dataTransfer.setData('application/cf-section-type', card.dataset.sectionType);
            });
            card.addEventListener('click', () => {
                const type = card.dataset.sectionType;
                this.addSectionFromPalette(type);
            });
        });

        // Theme inputs
        const bindThemeColor = (id, prop) => {
            const el = document.getElementById(id);
            if (el) el.addEventListener('input', () => {
                this.theme[prop] = el.value;
                this.applyThemeToCanvas(document.getElementById('canvasViewport'));
                this.triggerAutosave();
            });
        };
        bindThemeColor('themePrimaryColor', 'primaryColor');
        bindThemeColor('themeSecondaryColor', 'secondaryColor');
        bindThemeColor('themeBgColor', 'backgroundColor');
        bindThemeColor('themeTextColor', 'textColor');

        const bindThemeSelect = (id, prop) => {
            const el = document.getElementById(id);
            if (el) el.addEventListener('change', () => {
                this.theme[prop] = el.value;
                this.applyThemeToCanvas(document.getElementById('canvasViewport'));
                this.pushHistoryState();
            });
        };
        bindThemeSelect('themeDirection', 'direction');
        bindThemeSelect('themeHeadingFont', 'headingFont');
        bindThemeSelect('themeBodyFont', 'bodyFont');
        bindThemeSelect('themeRadius', 'borderRadius');

        // Sidebar tabs
        document.querySelectorAll('.cf-sidebar-tabs .cf-tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.cf-sidebar-tabs .cf-tab-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');

                const targetTab = btn.dataset.tab;
                document.querySelectorAll('.cf-sidebar-tab-pane').forEach(pane => {
                    pane.style.display = (pane.id === targetTab) ? 'block' : 'none';
                });
                if (targetTab === 'tabMedia') {
                    this.loadSidebarMedia();
                }
            });
        });

        // Modal close buttons
        document.querySelectorAll('.cf-modal-close').forEach(btn => {
            btn.addEventListener('click', () => {
                btn.closest('.cf-modal-overlay').classList.remove('open');
            });
        });

        // Add New Page form
        const addPageForm = document.getElementById('formAddPage');
        if (addPageForm) {
            addPageForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const title = document.getElementById('newPageTitle').value.trim();
                const slug = document.getElementById('newPageSlug').value.trim();
                if (!title) return;

                const res = await fetch(`${this.apiUrl}/api/create-page`, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': this.csrfToken },
                    body: JSON.stringify({ website_id: this.website.id, title, slug })
                });
                const data = await res.json();
                if (data.success) {
                    this.pages.push({ id: data.page_id, title: data.title, slug: data.slug, is_home: 0 });
                    this.renderPagesList();
                    document.getElementById('modalAddPage').classList.remove('open');
                    addPageForm.reset();
                } else {
                    alert(data.message);
                }
            });
        }
    }

    // =========================================================================
    // UTILITIES
    // =========================================================================

    getDefaultPropsForType(type) {
        // Fallback default props for common sections
        const defs = {
            hero: { title: 'Welcome to My Portfolio', subtitle: 'Specialist & Creator', description: 'Crafting exceptional digital experiences.', primaryButtonText: 'View Work', primaryButtonLink: '#projects', avatarUrl: '', layout: 'split' },
            about: { title: 'About Me', bio: 'I have dedicated my career to building elegant, high-impact systems.' },
            projects: { title: 'Featured Projects', columns: 3, items: [] },
            skills: { title: 'Core Competencies', categories: [{ name: 'Tech Stack', skills: ['HTML5', 'CSS3', 'JavaScript', 'APIs'] }] },
            services: { title: 'Services', items: [{ title: 'Consulting', description: 'Advisory and execution.' }] },
            testimonials: { title: 'Endorsements', items: [] },
            stats: { title: 'Impact', items: [{ value: '10+', label: 'Years Experience' }, { value: '50+', label: 'Projects' }] },
            contact: { title: 'Contact Me', email: 'hello@example.com', availability: 'Available' },
            footer: { copyrightText: '© ' + new Date().getFullYear() + ' All rights reserved.' }
        };
        return defs[type] || {};
    }

    escape(str) {
        if (!str) return '';
        return String(str)
            .replace(/&/g, '&amp;')
            .replace(/</g, '&lt;')
            .replace(/>/g, '&gt;')
            .replace(/"/g, '&quot;')
            .replace(/'/g, '&#039;');
    }

    nl2br(str) {
        if (!str) return '';
        return str.replace(/\n/g, '<br>');
    }
}
