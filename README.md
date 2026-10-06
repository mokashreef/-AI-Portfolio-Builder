# 🚀 AI Portfolio Builder (CraftFolio)

> **Next-Generation, High-Performance Multi-Page Website & Portfolio Builder SaaS**  
> Architected with Vanilla PHP 8.2+, MySQL / SQLite dual-engine portability, modular design systems, and zero bloated frameworks.

[![PHP Version](https://img.shields.io/badge/PHP-8.2%2B-777BB4?style=flat-square&logo=php&logoColor=white)](https://php.net)
[![Database](https://img.shields.io/badge/Database-MySQL%20%7C%20SQLite-4479A1?style=flat-square&logo=mysql&logoColor=white)](https://mysql.com)
[![Bilingual](https://img.shields.io/badge/Language-Arabic%20(RTL)%20%26%20English%20(LTR)-10B981?style=flat-square)](https://portfolio.code-elta6ur.net)
[![License](https://img.shields.io/badge/License-Proprietary%20%2F%20Portfolio%20Showcase-E11D48?style=flat-square)](LICENSE)
[![Live Demo](https://img.shields.io/badge/Live%20Demo-portfolio.code--elta6ur.net-6366F1?style=flat-square&logo=google-chrome&logoColor=white)](https://portfolio.code-elta6ur.net)

---

## 🌟 Live Demonstration

* **Production URL**: [https://portfolio.code-elta6ur.net](https://portfolio.code-elta6ur.net)
* **Template Gallery**: [https://portfolio.code-elta6ur.net/templates.php?lang=ar](https://portfolio.code-elta6ur.net/templates.php?lang=ar)

---

## 🎯 Key Architectural Highlights

### 1. 🎨 55+ Curated, Production-Ready System Templates
* **Zero Dummy Placeholders**: 55 completely crafted templates with authentic imagery, bilingual typographic harmony, and tailored color tokens.
* **6 Industry Domains**: Developers, Designers, Freelancers, Corporate & Agencies, Academic & Researchers, and Experimental / Avant-Garde.
* **100% Visual Parity**: Every template thumbnail is rendered dynamically via live CSS scale transforms (`--tpl-scale`), ensuring the preview is identical to the published page.

### 2. 🌐 Dual-Locale Native Bilingual Engine (Arabic RTL & English LTR)
* Built-in `I18n` translation layer with bidirectional token switching.
* Distinct font pairing for Arabic display typography (`IBM Plex Sans Arabic`, `Amiri`) vs Latin geometric typography (`Plus Jakarta Sans`, `Inter`, `Playfair Display`).
* Real-time language switcher for multi-lingual websites.

### 3. 🛠️ Visual Builder & Component Registry
* **18 Modular Component Sections**: Hero, Navbar, About, Projects, Skills, Timeline, Experience, Education, Services, Testimonials, Stats, Gallery, FAQs, CTA, Contact, Socials, Custom HTML, and Footers.
* Autosave draft engine with versioning (`draft` vs `published` versions).
* Full Theme Customizer: Typography, primary/secondary colors, border radius, direction, and sanitized custom CSS.

### 4. 🌍 Custom Domain Mapping & DNS Verification
* End-to-end custom domain resolution: supports apex domains (`example.com`) and subdomains (`work.example.com`).
* Automated DNS record verification for `A` and `CNAME` records.

### 5. 📦 High-Performance Static ZIP Exporter
* Exports any published multi-page website into an independent, self-contained static ZIP bundle (`index.html`, pages, compiled CSS, and assets) ready for static hosting (GitHub Pages, Cloudflare Pages, Netlify, Vercel).

### 6. 📊 Privacy-Conscious Built-in Analytics
* Lightweight, GDPR-friendly visit tracking with IP throttle protection and geo-resolution.
* Real-time visitor dashboard with interactive charts, top referrers, and visitor demographics.

---

## 🛡️ Enterprise Security Hardening

* **SQL Injection Prevention**: 100% prepared PDO statements across all database queries.
* **CSRF Defense**: Cryptographic anti-CSRF token generation and strict verification on all state-altering endpoints.
* **IDOR Protection**: Strict ownership verification across all website, page, asset, and portfolio modifications.
* **Secure Media Pipeline**:
  - Multi-layer MIME validation via `finfo_file` and byte header inspection via `getimagesize()`.
  - Strict SVG sanitization against Stored XSS and XML External Entity (XXE) injection.
  - Script execution permanently blocked inside upload directories via `.htaccess` execution directives.
* **Secret & Database Protection**: `.env` and `.sqlite` files blocked with `403 Forbidden` across both Apache (`.htaccess`) and PHP CLI servers.
* **Session Security**: Cookie flags (`HttpOnly`, `SameSite=Lax`, `Secure`), session fixation defense via automatic ID regeneration.

---

## 🏗️ Technology Stack

| Layer | Technology |
| :--- | :--- |
| **Backend Runtime** | PHP 8.2+ / 8.3 (Vanilla OOP & Services) |
| **Databases** | MySQL 5.7+ / 8.0+ / MariaDB & SQLite 3 (Portable Dual Engine) |
| **Frontend Architecture** | Modern Vanilla CSS, CSS Variables, Flexbox/Grid, Vanilla ES6+ |
| **Web Server** | Apache (with `mod_rewrite`, `mod_headers`) / Nginx / Built-in CLI Server |
| **Typography & Icons** | Google Fonts (IBM Plex Sans Arabic, Plus Jakarta Sans, Inter), Font Awesome 6 |

---

## 📁 Repository Structure

```text
├── api/                   # RESTful API endpoints (auth, pages, websites, assets, domains)
├── app/
│   ├── Core/              # Core foundational modules (Auth, Security, I18n, Migrator)
│   └── Services/          # Domain services (Website, Template, Component, Asset, Export, Analytics)
├── assets/
│   ├── css/               # Public and builder stylesheets
│   ├── js/                # Interactive UI and gallery controllers
│   └── uploads/           # Upload storage directory (.htaccess execution-locked)
├── config/
│   ├── database.php       # Portable PDO database connection factory
│   ├── env.php            # Lightweight .env environment parser
│   └── reserved_slugs.php # Blocked system slugs registry
├── includes/              # Shared helper functions and layout headers
├── sql/
│   ├── schema.sql         # Legacy migration schema
│   └── schema_v2.sql      # Complete relational schema
├── templates/             # Starter schemas and catalog templates
├── translations/          # Translation dictionaries (ar.php, en.php)
├── .env.example           # Sanitized environment template
├── .htaccess              # Apache URL rewriting & security headers
├── DEPLOYMENT.md          # Production deployment guide
├── admin.php              # Administrative supervision center
├── dashboard.php          # User project management dashboard
├── editor.php             # Visual website builder interface
├── index.php              # Platform landing page
├── login.php              # User authentication interface
├── portfolio.php          # High-speed public website renderer
├── register.php           # User registration interface
├── templates.php          # Interactive 55+ template showcase gallery
└── router.php             # Built-in PHP development server router
```

---

## ⚖️ License & Intellectual Property Notice

**Proprietary Software — All Rights Reserved.**

This repository is published exclusively for **portfolio, evaluation, and demonstration purposes** to highlight technical architecture, software craftsmanship, and design execution.

* **No License Granted**: No permission is granted to copy, reproduce, distribute, modify, or create derivative works from this codebase without prior explicit written consent from the author.
* **Copyright**: © 2026 Mohammad Abu Kashreef. All Rights Reserved.
