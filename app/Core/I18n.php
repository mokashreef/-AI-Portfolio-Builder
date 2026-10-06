<?php
namespace App\Core;

/**
 * AI Portfolio Builder - Comprehensive Internationalization (I18n) Engine
 * Authoritative platform translation system supporting seamless Arabic (RTL) & English (LTR)
 * with rock-solid session, cookie, and client-side JavaScript hydration.
 */
class I18n {
    private static ?string $currentLocale = null;
    private static array $strings = [];
    private static array $supportedLocales = ['ar', 'en'];
    private static string $defaultLocale = 'ar';

    /**
     * Initialize localization for current request
     */
    public static function init(): void {
        if (session_status() === PHP_SESSION_NONE) {
            @session_start();
        }

        // 1. Explicit query parameter switch (e.g. ?lang=ar or ?lang=en)
        if (isset($_GET['lang']) && in_array($_GET['lang'], self::$supportedLocales, true)) {
            self::setLocale($_GET['lang']);
            return;
        }

        // 2. Session check (supporting both cf_lang and lang keys)
        if (!empty($_SESSION['cf_lang']) && in_array($_SESSION['cf_lang'], self::$supportedLocales, true)) {
            self::$currentLocale = $_SESSION['cf_lang'];
        } elseif (!empty($_SESSION['lang']) && in_array($_SESSION['lang'], self::$supportedLocales, true)) {
            self::$currentLocale = $_SESSION['lang'];
            $_SESSION['cf_lang'] = self::$currentLocale;
        } 
        // 3. Cookie check
        elseif (!empty($_COOKIE['cf_lang']) && in_array($_COOKIE['cf_lang'], self::$supportedLocales, true)) {
            self::$currentLocale = $_COOKIE['cf_lang'];
            $_SESSION['cf_lang'] = self::$currentLocale;
            $_SESSION['lang'] = self::$currentLocale;
        } elseif (!empty($_COOKIE['lang']) && in_array($_COOKIE['lang'], self::$supportedLocales, true)) {
            self::$currentLocale = $_COOKIE['lang'];
            $_SESSION['cf_lang'] = self::$currentLocale;
            $_SESSION['lang'] = self::$currentLocale;
        } 
        // 4. Default to Arabic as primary native platform language
        else {
            self::$currentLocale = self::$defaultLocale;
            $_SESSION['cf_lang'] = self::$currentLocale;
            $_SESSION['lang'] = self::$currentLocale;
        }

        self::loadStrings(self::$currentLocale);
    }

    /**
     * Set active locale
     */
    public static function setLocale(string $locale): void {
        if (!in_array($locale, self::$supportedLocales, true)) {
            $locale = self::$defaultLocale;
        }
        self::$currentLocale = $locale;
        if (session_status() === PHP_SESSION_NONE) {
            @session_start();
        }
        $_SESSION['cf_lang'] = $locale;
        $_SESSION['lang'] = $locale;
        @setcookie('cf_lang', $locale, time() + (86400 * 365), '/');
        @setcookie('lang', $locale, time() + (86400 * 365), '/');
        self::loadStrings($locale);
    }

    /**
     * Get current active locale ('ar' or 'en')
     */
    public static function locale(): string {
        if (self::$currentLocale === null) {
            self::init();
        }
        return self::$currentLocale;
    }

    /**
     * Is current locale Right-to-Left?
     */
    public static function isRtl(): bool {
        return self::locale() === 'ar';
    }

    /**
     * Current direction string: 'rtl' or 'ltr'
     */
    public static function dir(): string {
        return self::isRtl() ? 'rtl' : 'ltr';
    }

    /**
     * Load translation file
     */
    private static function loadStrings(string $locale): void {
        $path = __DIR__ . '/../../translations/' . $locale . '.php';
        if (file_exists($path)) {
            self::$strings = require $path;
        } else {
            self::$strings = [];
        }
    }

    /**
     * Translate key with optional parameter substitution
     */
    public static function t(string $key, array $params = [], string $default = ''): string {
        if (self::$currentLocale === null) {
            self::init();
        }

        // 1. Direct key lookup
        $translation = self::$strings[$key] ?? null;

        // 2. Dot <-> Underscore alternate lookup
        if ($translation === null) {
            if (str_contains($key, '.')) {
                $altKey = str_replace('.', '_', $key);
                $translation = self::$strings[$altKey] ?? null;
            } else {
                $altKey = str_replace('_', '.', $key);
                $translation = self::$strings[$altKey] ?? null;
            }
        }

        // 3. Fallback resolution
        if ($translation === null) {
            $translation = $default !== '' ? $default : $key;
        }

        // 4. Parameter substitution (:param)
        if (!empty($params)) {
            foreach ($params as $k => $v) {
                $translation = str_replace(':' . $k, (string)$v, $translation);
            }
        }

        return $translation;
    }

    /**
     * Check if translation key exists
     */
    public static function has(string $key): bool {
        if (self::$currentLocale === null) {
            self::init();
        }
        return isset(self::$strings[$key]) 
            || isset(self::$strings[str_replace('.', '_', $key)])
            || isset(self::$strings[str_replace('_', '.', $key)]);
    }

    /**
     * Get all translation strings for frontend client hydration
     */
    public static function all(): array {
        if (self::$currentLocale === null) {
            self::init();
        }
        return self::$strings;
    }

    /**
     * Export translations script for frontend hydration
     */
    public static function exportScript(): string {
        $json = json_encode(self::all(), JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
        $locale = self::locale();
        $isRtl = self::isRtl() ? 'true' : 'false';
        return <<<HTML
<script>
window.__CF_LOCALE = "{$locale}";
window.__CF_IS_RTL = {$isRtl};
window.__CF_TRANSLATIONS = {$json};
window.__t = function(key, params, defaultVal) {
    params = params || {};
    defaultVal = defaultVal || key;
    var t = window.__CF_TRANSLATIONS;
    var str = (t && t[key] !== undefined) ? t[key] : ((t && t[key.replace(/\./g, '_')]) !== undefined ? t[key.replace(/\./g, '_')] : ((t && t[key.replace(/_/g, '.')]) !== undefined ? t[key.replace(/_/g, '.')] : defaultVal));
    if (params) {
        for (var k in params) {
            if (Object.prototype.hasOwnProperty.call(params, k)) {
                str = str.replace(new RegExp(':' + k, 'g'), params[k]);
            }
        }
    }
    return str;
};
</script>
HTML;
    }
}

// Global convenience translation helper
if (!function_exists('__t')) {
    function __t(string $key, array $params = [], string $default = ''): string {
        return \App\Core\I18n::t($key, $params, $default);
    }
}
