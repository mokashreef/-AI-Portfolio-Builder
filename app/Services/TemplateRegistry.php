<?php
namespace App\Services;

require_once __DIR__ . '/ComponentRegistry.php';
require_once __DIR__ . '/Templates/Developers.php';
require_once __DIR__ . '/Templates/Designers.php';
require_once __DIR__ . '/Templates/Freelancers.php';
require_once __DIR__ . '/Templates/Corporate.php';
require_once __DIR__ . '/Templates/Academic.php';
require_once __DIR__ . '/Templates/Experimental.php';

use App\Services\Templates\Developers;
use App\Services\Templates\Designers;
use App\Services\Templates\Freelancers;
use App\Services\Templates\Corporate;
use App\Services\Templates\Academic;
use App\Services\Templates\Experimental;

/**
 * AI Portfolio Builder - Curated Master Templates Catalog
 * 55 Production-Grade, Genuinely Distinct Design Systems & Art Directions
 * Complete Bilingual Architecture: Dedicated 'en' (LTR) & 'ar' (RTL) Locale Packages.
 * 100% Architectural Parity: Registry -> Renderer -> Preview -> Builder -> Published Website.
 */
class TemplateRegistry {

    /**
     * Retrieve all 55 curated master templates
     */
    public static function getAll(): array {
        static $cached = null;
        if ($cached !== null) {
            return $cached;
        }

        $all = array_merge(
            Developers::getTemplates(),
            Designers::getTemplates(),
            Freelancers::getTemplates(),
            Corporate::getTemplates(),
            Academic::getTemplates(),
            Experimental::getTemplates()
        );

        // Enrich each template with backward-compatible top-level properties
        foreach ($all as &$tpl) {
            $defaultLocale = $tpl['locales']['en'] ?? reset($tpl['locales']);
            $tpl['theme'] = $defaultLocale['theme'] ?? [];
            $tpl['sections'] = $defaultLocale['sections'] ?? [];
            $tpl['schema'] = [
                'theme' => $tpl['theme'],
                'sections' => $tpl['sections'],
                'pages' => [
                    [
                        'id' => 'page_home',
                        'slug' => 'home',
                        'title' => 'Home',
                        'title_ar' => 'الرئيسية',
                        'is_home' => true,
                        'is_in_nav' => true,
                        'sections' => $tpl['sections']
                    ]
                ]
            ];
        }
        unset($tpl);

        $cached = $all;
        return $cached;
    }

    /**
     * Retrieve a single template by its unique slug
     */
    public static function getBySlug(string $slug): ?array {
        foreach (self::getAll() as $tpl) {
            if ($tpl['slug'] === $slug) {
                return $tpl;
            }
        }
        return null;
    }

    /**
     * Find a template by slug with fallback to first template
     */
    public static function find(string $slug): ?array {
        return self::getBySlug($slug) ?? (self::getAll()[0] ?? null);
    }

    public static function get(string $slug): ?array {
        return self::find($slug);
    }

    public static function getTemplate(string $slug): ?array {
        return self::find($slug);
    }

    /**
     * Resolve the authentic localized package ('en' or 'ar') for a given template
     */
    public static function getLocalePackage(array $template, string $locale = 'en'): array {
        $loc = ($locale === 'ar') ? 'ar' : 'en';
        if (!empty($template['locales'][$loc])) {
            return $template['locales'][$loc];
        }
        if (!empty($template['locales'])) {
            return reset($template['locales']);
        }
        return [
            'locale' => $loc,
            'direction' => ($loc === 'ar') ? 'rtl' : 'ltr',
            'theme' => $template['theme'] ?? [],
            'sections' => $template['sections'] ?? ($template['schema']['sections'] ?? [])
        ];
    }
}
