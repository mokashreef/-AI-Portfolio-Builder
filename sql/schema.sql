-- ============================================
-- AI Portfolio Builder - Database Schema
-- ============================================

-- على Hostinger، القاعدة موجودة مسبقًا، فقط نفذ الأوامر أدناه في phpMyAdmin
-- Database: u359882181_Portfolio

USE u359882181_Portfolio;

-- جدول المستخدمين
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    avatar VARCHAR(255) DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- جدول الـ Portfolios
CREATE TABLE IF NOT EXISTS portfolios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT DEFAULT NULL,
    slug VARCHAR(100) UNIQUE,
    username VARCHAR(100) UNIQUE,
    custom_domain VARCHAR(255) UNIQUE,
    language VARCHAR(10) DEFAULT 'ar',
    full_name VARCHAR(100) NOT NULL,
    title VARCHAR(200),
    bio TEXT,
    profile_image VARCHAR(255),
    template VARCHAR(50) DEFAULT 'modern',
    primary_color VARCHAR(20) DEFAULT '#6c63ff',
    secondary_color VARCHAR(20) DEFAULT '#a78bfa',
    font_family VARCHAR(50) DEFAULT 'Inter',
    github VARCHAR(255),
    linkedin VARCHAR(255),
    twitter VARCHAR(255),
    website VARCHAR(255),
    email_contact VARCHAR(100),
    is_published BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- جدول المهارات
CREATE TABLE IF NOT EXISTS skills (
    id INT PRIMARY KEY AUTO_INCREMENT,
    portfolio_id INT NOT NULL,
    skill_name VARCHAR(100) NOT NULL,
    skill_level INT DEFAULT 80,
    FOREIGN KEY (portfolio_id) REFERENCES portfolios(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- جدول المشاريع
CREATE TABLE IF NOT EXISTS projects (
    id INT PRIMARY KEY AUTO_INCREMENT,
    portfolio_id INT NOT NULL,
    project_name VARCHAR(200) NOT NULL,
    project_description TEXT,
    project_image VARCHAR(255),
    project_url VARCHAR(255),
    github_url VARCHAR(255),
    sort_order INT DEFAULT 0,
    FOREIGN KEY (portfolio_id) REFERENCES portfolios(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- جدول إعادة تعيين كلمة المرور
CREATE TABLE IF NOT EXISTS password_resets (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    token VARCHAR(64) UNIQUE NOT NULL,
    expires_at DATETIME NOT NULL,
    used BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
) ENGINE=InnoDB;

-- جدول إحصائيات الزيارات
CREATE TABLE IF NOT EXISTS portfolio_views (
    id INT PRIMARY KEY AUTO_INCREMENT,
    portfolio_id INT NOT NULL,
    ip_address VARCHAR(45),
    country VARCHAR(100),
    view_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (portfolio_id) REFERENCES portfolios(id) ON DELETE CASCADE
) ENGINE=InnoDB;
