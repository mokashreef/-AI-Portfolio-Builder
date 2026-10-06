# AI Portfolio Builder - Production Deployment & Administration Guide

## 1. Environment & Server Requirements
- **PHP**: 8.1 or higher (PHP 8.2+ recommended).
  - Required PHP Extensions: `pdo`, `pdo_mysql`, `json`, `mbstring`, `fileinfo`, `gd`, `zip`, `openssl`, `curl`.
- **Web Server**: Apache with `mod_rewrite` enabled (or Nginx with comparable rewrite rules).
- **Database**: MySQL 5.7+ or MariaDB 10.3+.

---

## 2. Environment Variables (.env)
AI Portfolio Builder uses a `.env` file for configuration. Copy `.env.example` to `.env` and fill in your production credentials:

```ini
APP_NAME="AI Portfolio Builder"
APP_ENV="production"
APP_DEBUG=false
APP_URL="https://portfolio.code-elta6ur.net"

# Database Credentials
DB_HOST="localhost"
DB_NAME="your_db_name"
DB_USER="your_db_username"
DB_PASS="your_secure_password"
DB_CHARSET="utf8mb4"

# Admin Username
ADMIN_USERNAME="admin"

# Media Upload Limit in MB
UPLOAD_MAX_SIZE_MB=5
```

> **Security Note:** The `.env` file is protected by `.htaccess` and `.gitignore` and must never be exposed publicly or committed to public Git repositories.

---

## 3. Database Migration & Upgrading
Run the automatic database migration and seeder to create all V2 tables (`users`, `websites`, `pages`, `page_versions`, `templates`, `domains`, `assets`, `analytics_views`) and populate the 52+ system templates:

### Option A: Command Line Interface (CLI)
```bash
php migrate.php
```

### Option B: Web Browser
Visit:
```
https://portfolio.code-elta6ur.net/migrate.php
```
*(Accessible when logged in as admin or on initial clean setup)*.

---

## 4. File Permissions & Storage Setup
Ensure write permissions (`0755` or `0775`) on upload and storage directories:

```bash
chmod -R 755 assets/uploads
chmod -R 755 storage
```

---

## 5. Apache Web Server (.htaccess) Configuration
The included `.htaccess` file manages clean URL routing and blocks access to sensitive files. Ensure Apache has `AllowOverride All` configured for the root directory:

```apache
<Directory /home/user/public_html>
    Options -Indexes
    AllowOverride All
    Require all granted
</Directory>
```

---

## 6. Custom Domain Mapping & DNS Setup
AI Portfolio Builder supports apex domains (e.g., `alexvance.com`) and subdomains (e.g., `work.alexvance.com`):

### DNS Records for End Users
- **For Subdomains or `www`**:
  - Type: `CNAME`
  - Name: `www` (or your chosen subdomain)
  - Target: `portfolio.code-elta6ur.net`
- **For Apex Root Domains**:
  - Type: `A`
  - Name: `@`
  - Target: Server IPv4 Address (e.g. `145.223.102.100`)

### Server Host Configuration
In Hostinger / cPanel / VirtualHost settings, ensure wildcard alias or parked domain alias is active:
```apache
ServerAlias portfolio.code-elta6ur.net *.code-elta6ur.net
```

---

## 7. Security Architecture
AI Portfolio Builder includes enterprise-grade security hardening:
- **Prepared Statements**: Every SQL query is parameterized with PDO to prevent SQL Injection.
- **CSRF Protection**: Cryptographic tokens verified on all state-altering operations.
- **Session Fixation Defense**: Session identifiers are automatically regenerated upon login and privilege escalation.
- **Strict Media Validation**: Uploads verify MIME type, file extension whitelist, and byte header inspection via `getimagesize()` to block script injection and polyglot files.
- **Safe HTML Sanitization**: Custom blocks strip `<script>`, `<iframe>`, and event handler injections (`onerror`, `onload`).
- **Authorization Enforcement**: Strict verification ensures User A can never inspect, modify, or delete websites owned by User B.
