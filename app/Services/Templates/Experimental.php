<?php
namespace App\Services\Templates;

/**
 * AI Portfolio Builder - Signature & Experimental Aesthetics Templates Catalog
 * Count: 5 Hand-Curated Production-Grade Design Systems
 */
class Experimental {
    public static function getTemplates(): array {
        return [
          [
            'slug' => 'neo-brutalist',
            'name' => 'Neo-Brutalist Raw Energy',
            'name_ar' => 'النيو-بروتاليزم والطاقة الرقمية الجريئة',
            'category' => 'Experimental',
            'description' => 'Unapologetic raw digital aesthetics with 3px solid black outlines, hard box shadows, and electric lime accents.',
            'description_ar' => 'طاقة بصرية حرة ومتمردة بإطارات سوداء صلبة (3px) وظلال قاسية وألوان الأصفر والنيون الفاقعة.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#fef08a',
                  'textColor' => '#000000',
                  'primaryColor' => '#000000',
                  'secondaryColor' => '#ff5722',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#000000',
                  'headingFont' => 'Space Grotesk',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.05',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.03em',
                  'borderRadius' => '0px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_brut',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'ZACKARY CROFT // 2026',
                      'ctaText' => 'HIRE ME NOW',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_brut',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'neo-brutalist',
                      'brutalistTag' => 'CREATIVE TECHNOLOGIST // REJECT BORING SAAS',
                      'title' => 'Zackary Croft',
                      'subtitle' => 'CODE · GLITCH · DIGITAL PROTEST',
                      'description' => 'I build web applications with zero corporate fluff. Heavy borders, high contrast, unapologetic speed, and memorable interactions that refuse to blend into the sea of generic tech templates.',
                      'primaryButtonText' => 'Check The Works',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Shoot An Email',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_brut',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'neo-brutalist',
                      'title' => 'Loud & Weird Experiments',
                      'items' => [
                        [
                          'title' => 'CYBER-SYNTH WEB AUDIO',
                          'description' => 'Browser-based polyphonic microtonal synthesizer built with pure Web Audio API and WebGL audio reactive oscilloscope.',
                          'tags' => [
                            'WebAudio',
                            'WebGL',
                            'JavaScript'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'DOOM-SCROLL DESTROYER',
                          'description' => 'Lightweight desktop app that intercepts social media doom-scrolling and forces users to solve math puzzles to regain browser access.',
                          'tags' => [
                            'Electron',
                            'Rust',
                            'Productivity'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_brut',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Drop Me A Line',
                      'subtitle' => 'Looking to collaborate on exciting experimental projects, brutalist brands, or high-energy campaigns.',
                      'email' => 'zack@croft-noise.io',
                      'location' => 'Berlin · Worldwide',
                      'availability' => 'Available for Wild Commissions'
                    ]
                  ],
                  [
                    'id' => 'footer_brut',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Zackary Croft. 100% human-coded. No boring designs.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#fef08a',
                  'textColor' => '#000000',
                  'primaryColor' => '#000000',
                  'secondaryColor' => '#ff5722',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#000000',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.75',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '0px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_brut',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'سالم الحربي // 2026',
                      'ctaText' => 'وظّفني فوراً',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_brut',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'neo-brutalist',
                      'brutalistTag' => 'تقني مبدع // أرفض القوالب التجارية المملة',
                      'title' => 'سالم الحربي',
                      'subtitle' => 'كود صلب · تباين جريء · تميز رقمي',
                      'description' => 'أبني مواقع وتطبيقات تفاعلية خالية تماماً من الرتابة والادعاء التجاري. إطارات بارزة، تباين حاد، وسرعة فائقة ترفض الذوبان في بحر القوالب المكررة والرمادية.',
                      'primaryButtonText' => 'استعراض المشاريع الجريئة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'أرسل رسالة فورية',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_brut',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'neo-brutalist',
                      'title' => 'تجارب تفاعلية ومشاريع غير تقليدية',
                      'items' => [
                        [
                          'title' => 'المولّد الصوتي CYBER-SYNTH',
                          'description' => 'أداة صوتية سحابية متعددة الترددات تعمل مباشرة في المتصفح باستخدام واجهات Web Audio ورسومات تفاعلية ثلاثية الأبعاد.',
                          'tags' => [
                            'صوتيات ويب',
                            'WebGL',
                            'جافاسكربت'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'مكافح التشتت الرقمي DOOM-DESTROYER',
                          'description' => 'أداة خفيفة لمنع إدمان التصفح العشوائي لشبكات التواصل، تجبر المستخدم على حل ألغاز برمجية لاستعادة الوصول للمتصفح.',
                          'tags' => [
                            'Rust',
                            'إنتاجية',
                            'سطح المكتب'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_brut',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'أرسل لي رسالتك',
                      'subtitle' => 'مستعد للتعاون في المشاريع الجريئة، والعلامات التجارية الحرة، والتطبيقات ذات الشخصية القوية.',
                      'email' => 'salem@alharbi-raw.io',
                      'location' => 'الرياض وبرلين · العمل عن بعد',
                      'availability' => 'متاح للتكليفات الاستثنائية فوراً'
                    ]
                  ],
                  [
                    'id' => 'footer_brut',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 سالم الحربي. كود بشري نقي 100%. بدون قوالب تجارية مملة.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#fef08a',
              'textColor' => '#000000',
              'primaryColor' => '#000000',
              'secondaryColor' => '#ff5722',
              'cardBg' => '#ffffff',
              'cardBorder' => '#000000',
              'headingFont' => 'Space Grotesk',
              'bodyFont' => 'Inter',
              'lineHeightHeading' => '1.05',
              'lineHeightBody' => '1.6',
              'letterSpacingHeading' => '-0.03em',
              'borderRadius' => '0px',
              'containerWidth' => 'max-w-6xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_brut',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'ZACKARY CROFT // 2026',
                  'ctaText' => 'HIRE ME NOW',
                  'ctaLink' => '#contact'
                ]
              ],
              [
                'id' => 'hero_brut',
                'type' => 'hero',
                'props' => [
                  'variant' => 'neo-brutalist',
                  'brutalistTag' => 'CREATIVE TECHNOLOGIST // REJECT BORING SAAS',
                  'title' => 'Zackary Croft',
                  'subtitle' => 'CODE · GLITCH · DIGITAL PROTEST',
                  'description' => 'I build web applications with zero corporate fluff. Heavy borders, high contrast, unapologetic speed, and memorable interactions that refuse to blend into the sea of generic tech templates.',
                  'primaryButtonText' => 'Check The Works',
                  'primaryButtonLink' => '#projects',
                  'secondaryButtonText' => 'Shoot An Email',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'proj_brut',
                'type' => 'projects',
                'props' => [
                  'variant' => 'neo-brutalist',
                  'title' => 'Loud & Weird Experiments',
                  'items' => [
                    [
                      'title' => 'CYBER-SYNTH WEB AUDIO',
                      'description' => 'Browser-based polyphonic microtonal synthesizer built with pure Web Audio API and WebGL audio reactive oscilloscope.',
                      'tags' => [
                        'WebAudio',
                        'WebGL',
                        'JavaScript'
                      ],
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'DOOM-SCROLL DESTROYER',
                      'description' => 'Lightweight desktop app that intercepts social media doom-scrolling and forces users to solve math puzzles to regain browser access.',
                      'tags' => [
                        'Electron',
                        'Rust',
                        'Productivity'
                      ],
                      'liveUrl' => '#'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_brut',
                'type' => 'contact',
                'props' => [
                  'title' => 'Drop Me A Line',
                  'subtitle' => 'Looking to collaborate on exciting experimental projects, brutalist brands, or high-energy campaigns.',
                  'email' => 'zack@croft-noise.io',
                  'location' => 'Berlin · Worldwide',
                  'availability' => 'Available for Wild Commissions'
                ]
              ],
              [
                'id' => 'footer_brut',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Zackary Croft. 100% human-coded. No boring designs.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#fef08a',
                'textColor' => '#000000',
                'primaryColor' => '#000000',
                'secondaryColor' => '#ff5722',
                'cardBg' => '#ffffff',
                'cardBorder' => '#000000',
                'headingFont' => 'Space Grotesk',
                'bodyFont' => 'Inter',
                'lineHeightHeading' => '1.05',
                'lineHeightBody' => '1.6',
                'letterSpacingHeading' => '-0.03em',
                'borderRadius' => '0px',
                'containerWidth' => 'max-w-6xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_brut',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'ZACKARY CROFT // 2026',
                    'ctaText' => 'HIRE ME NOW',
                    'ctaLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'hero_brut',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'neo-brutalist',
                    'brutalistTag' => 'CREATIVE TECHNOLOGIST // REJECT BORING SAAS',
                    'title' => 'Zackary Croft',
                    'subtitle' => 'CODE · GLITCH · DIGITAL PROTEST',
                    'description' => 'I build web applications with zero corporate fluff. Heavy borders, high contrast, unapologetic speed, and memorable interactions that refuse to blend into the sea of generic tech templates.',
                    'primaryButtonText' => 'Check The Works',
                    'primaryButtonLink' => '#projects',
                    'secondaryButtonText' => 'Shoot An Email',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'proj_brut',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'neo-brutalist',
                    'title' => 'Loud & Weird Experiments',
                    'items' => [
                      [
                        'title' => 'CYBER-SYNTH WEB AUDIO',
                        'description' => 'Browser-based polyphonic microtonal synthesizer built with pure Web Audio API and WebGL audio reactive oscilloscope.',
                        'tags' => [
                          'WebAudio',
                          'WebGL',
                          'JavaScript'
                        ],
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'DOOM-SCROLL DESTROYER',
                        'description' => 'Lightweight desktop app that intercepts social media doom-scrolling and forces users to solve math puzzles to regain browser access.',
                        'tags' => [
                          'Electron',
                          'Rust',
                          'Productivity'
                        ],
                        'liveUrl' => '#'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_brut',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Drop Me A Line',
                    'subtitle' => 'Looking to collaborate on exciting experimental projects, brutalist brands, or high-energy campaigns.',
                    'email' => 'zack@croft-noise.io',
                    'location' => 'Berlin · Worldwide',
                    'availability' => 'Available for Wild Commissions'
                  ]
                ],
                [
                  'id' => 'footer_brut',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Zackary Croft. 100% human-coded. No boring designs.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'dark-editorial',
            'name' => 'Dark Editorial Magazine',
            'name_ar' => 'المجلة الداكنة والمعمارية الفكرية',
            'category' => 'Experimental',
            'description' => 'High-contrast obsidian background with dramatic serif display typography, editorial pull-quotes, and refined portfolio cards.',
            'description_ar' => 'تصميم داكن فخم جداً بخطوط سيريف عملاقة واقتباسات صحفية أنيقة للمبدعين والمفكرين.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#050505',
                  'textColor' => '#ededed',
                  'primaryColor' => '#e2e8f0',
                  'secondaryColor' => '#94a3b8',
                  'cardBg' => '#0f0f12',
                  'cardBorder' => 'rgba(255,255,255,0.1)',
                  'headingFont' => 'Playfair Display',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.2',
                  'lineHeightBody' => '1.75',
                  'letterSpacingHeading' => '-0.015em',
                  'borderRadius' => '0px',
                  'containerWidth' => 'max-w-5xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_de',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'NOIR / EDITORIAL',
                      'ctaText' => 'Read Monograph',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'hero_de',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'editorial',
                      'editorialMeta' => 'CURATED ESSAYS · ISSUE Nº 07',
                      'title' => 'Form, Void, and the Aesthetics of Contemporary Absence',
                      'subtitle' => 'Critical Design Essays, Typographic Installations & Spatial Objects',
                      'editorialQuote' => 'What is omitted from a design speaks with louder clarity than anything that is added.',
                      'description' => 'A digital archive of critical spatial experiments examining the intersection of typography, architecture, and contemporary philosophy.',
                      'primaryButtonText' => 'Read Essays',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Contact Author',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_de',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'editorial',
                      'title' => 'Documented Spatial Studies',
                      'subtitle' => 'Installations in Basel, Venice Biennale, and Kyoto',
                      'items' => [
                        [
                          'title' => 'The Monolith of Silence (Venice)',
                          'client' => 'Venice Biennale',
                          'year' => '2025',
                          'description' => 'A light-absorptive basalt pavilion exploring sensory deprivation and acoustic isolation.',
                          'imageUrl' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80',
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_de',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Author Correspondence',
                      'subtitle' => 'For academic symposia and monograph commissions.',
                      'email' => 'noir@contemporary-absence.org',
                      'location' => 'Basel · Tokyo · Venice',
                      'availability' => 'Open for Academic Collaborations'
                    ]
                  ],
                  [
                    'id' => 'footer_de',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Noir Editorial Archive. All text published under open academic licenses.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#050505',
                  'textColor' => '#ededed',
                  'primaryColor' => '#e2e8f0',
                  'secondaryColor' => '#94a3b8',
                  'cardBg' => '#0f0f12',
                  'cardBorder' => 'rgba(255,255,255,0.1)',
                  'headingFont' => 'Amiri',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.4',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '0px',
                  'containerWidth' => 'max-w-5xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_de',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'نوار / إصدارات نقدية',
                      'ctaText' => 'قراءة الإصدار الأخير',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'hero_de',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'editorial',
                      'editorialMeta' => 'دراسات نقدية · العدد السابع',
                      'title' => 'الشكل، والفراغ، وجماليات الغياب المعاصر',
                      'subtitle' => 'دراسات التصميم النقدي، المنحوتات الطباعية، والمجسمات المكانية',
                      'editorialQuote' => 'ما يتم استبعاده بوعي من التصميم يتحدث بوضوح أبلغ بكثير من كل ما تتم إضافته.',
                      'description' => 'أرشيف رقمي للتجارب المكانية النقدية يبحث في تقاطع فنون الخط، العمارة، وفلسفة الفراغ المعاصرة.',
                      'primaryButtonText' => 'قراءة الدراسات النقدية',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'مراسلة الكاتب والباحث',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_de',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'editorial',
                      'title' => 'دراسات مكانية ومجسمات موثقة',
                      'subtitle' => 'معارض وتراكيب في بازل، بينالي البندقية، وكيوتو',
                      'items' => [
                        [
                          'title' => 'نصب الصمت المعماري (البندقية)',
                          'client' => 'بينالي البندقية للعمارة',
                          'year' => '2025',
                          'description' => 'جناح بازلتي يمتص الضوء والصوت لبحث تجارب العزلة الحسية والصمت التأملي في قلب المدينة.',
                          'imageUrl' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80',
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_de',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'مراسلات الكاتب والباحث',
                      'subtitle' => 'للندوات الفكرية، والمؤتمرات الأكاديمية، والتكليفات النقدية المتخصصة.',
                      'email' => 'noir@contemporary-absence.org',
                      'location' => 'بازل · طوكيو · البندقية',
                      'availability' => 'متاح للأبحاث النقدية والتكليفات الفكرية المعاصرة'
                    ]
                  ],
                  [
                    'id' => 'footer_de',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 أرشيف نوار الفكري. جميع النصوص منشورة برخص أكاديمية مفتوحة.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#050505',
              'textColor' => '#ededed',
              'primaryColor' => '#e2e8f0',
              'secondaryColor' => '#94a3b8',
              'cardBg' => '#0f0f12',
              'cardBorder' => 'rgba(255,255,255,0.1)',
              'headingFont' => 'Playfair Display',
              'bodyFont' => 'Inter',
              'lineHeightHeading' => '1.2',
              'lineHeightBody' => '1.75',
              'letterSpacingHeading' => '-0.015em',
              'borderRadius' => '0px',
              'containerWidth' => 'max-w-5xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_de',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'NOIR / EDITORIAL',
                  'ctaText' => 'Read Monograph',
                  'ctaLink' => '#projects'
                ]
              ],
              [
                'id' => 'hero_de',
                'type' => 'hero',
                'props' => [
                  'variant' => 'editorial',
                  'editorialMeta' => 'CURATED ESSAYS · ISSUE Nº 07',
                  'title' => 'Form, Void, and the Aesthetics of Contemporary Absence',
                  'subtitle' => 'Critical Design Essays, Typographic Installations & Spatial Objects',
                  'editorialQuote' => 'What is omitted from a design speaks with louder clarity than anything that is added.',
                  'description' => 'A digital archive of critical spatial experiments examining the intersection of typography, architecture, and contemporary philosophy.',
                  'primaryButtonText' => 'Read Essays',
                  'primaryButtonLink' => '#projects',
                  'secondaryButtonText' => 'Contact Author',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'proj_de',
                'type' => 'projects',
                'props' => [
                  'variant' => 'editorial',
                  'title' => 'Documented Spatial Studies',
                  'subtitle' => 'Installations in Basel, Venice Biennale, and Kyoto',
                  'items' => [
                    [
                      'title' => 'The Monolith of Silence (Venice)',
                      'client' => 'Venice Biennale',
                      'year' => '2025',
                      'description' => 'A light-absorptive basalt pavilion exploring sensory deprivation and acoustic isolation.',
                      'imageUrl' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80',
                      'liveUrl' => '#'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_de',
                'type' => 'contact',
                'props' => [
                  'title' => 'Author Correspondence',
                  'subtitle' => 'For academic symposia and monograph commissions.',
                  'email' => 'noir@contemporary-absence.org',
                  'location' => 'Basel · Tokyo · Venice',
                  'availability' => 'Open for Academic Collaborations'
                ]
              ],
              [
                'id' => 'footer_de',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Noir Editorial Archive. All text published under open academic licenses.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#050505',
                'textColor' => '#ededed',
                'primaryColor' => '#e2e8f0',
                'secondaryColor' => '#94a3b8',
                'cardBg' => '#0f0f12',
                'cardBorder' => 'rgba(255,255,255,0.1)',
                'headingFont' => 'Playfair Display',
                'bodyFont' => 'Inter',
                'lineHeightHeading' => '1.2',
                'lineHeightBody' => '1.75',
                'letterSpacingHeading' => '-0.015em',
                'borderRadius' => '0px',
                'containerWidth' => 'max-w-5xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_de',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'NOIR / EDITORIAL',
                    'ctaText' => 'Read Monograph',
                    'ctaLink' => '#projects'
                  ]
                ],
                [
                  'id' => 'hero_de',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'editorial',
                    'editorialMeta' => 'CURATED ESSAYS · ISSUE Nº 07',
                    'title' => 'Form, Void, and the Aesthetics of Contemporary Absence',
                    'subtitle' => 'Critical Design Essays, Typographic Installations & Spatial Objects',
                    'editorialQuote' => 'What is omitted from a design speaks with louder clarity than anything that is added.',
                    'description' => 'A digital archive of critical spatial experiments examining the intersection of typography, architecture, and contemporary philosophy.',
                    'primaryButtonText' => 'Read Essays',
                    'primaryButtonLink' => '#projects',
                    'secondaryButtonText' => 'Contact Author',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'proj_de',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'editorial',
                    'title' => 'Documented Spatial Studies',
                    'subtitle' => 'Installations in Basel, Venice Biennale, and Kyoto',
                    'items' => [
                      [
                        'title' => 'The Monolith of Silence (Venice)',
                        'client' => 'Venice Biennale',
                        'year' => '2025',
                        'description' => 'A light-absorptive basalt pavilion exploring sensory deprivation and acoustic isolation.',
                        'imageUrl' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=1200&q=80',
                        'liveUrl' => '#'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_de',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Author Correspondence',
                    'subtitle' => 'For academic symposia and monograph commissions.',
                    'email' => 'noir@contemporary-absence.org',
                    'location' => 'Basel · Tokyo · Venice',
                    'availability' => 'Open for Academic Collaborations'
                  ]
                ],
                [
                  'id' => 'footer_de',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Noir Editorial Archive. All text published under open academic licenses.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'luxury-atelier',
            'name' => 'Luxury Atelier & High Jewelry',
            'name_ar' => 'دار الحرف الراقية والمجوهرات الفاخرة',
            'category' => 'Experimental',
            'description' => 'Ultra-luxury high jewelry atelier aesthetic featuring deep onyx & champagne gold palettes, Cinzel serif typography, and private appointment salon bookings.',
            'description_ar' => 'معرض أعمال دار المجوهرات الفاخرة والحرف اليدوية الراقية بتصميم أسود عقيقي وذهب شامبين وطباعة سينزل الرخامية.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0c0a09',
                  'textColor' => '#fafaf9',
                  'primaryColor' => '#d4af37',
                  'secondaryColor' => '#b89628',
                  'cardBg' => '#1c1917',
                  'cardBorder' => '#292524',
                  'headingFont' => 'Cinzel',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.2',
                  'lineHeightBody' => '1.65',
                  'letterSpacingHeading' => '0.04em',
                  'borderRadius' => '2px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'lux_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Maison de L\'Or · Haute Joaillerie',
                      'ctaText' => 'Private Salon Appointment',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'lux_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Place Vendôme · Geneva · Riyadh Private Salons',
                      'title' => 'Bespoke Haute Joaillerie Sculpted from Singular Gemstones & Rare Metallurgy',
                      'subtitle' => 'Master Gemologist & High Jewelry Artisan',
                      'description' => 'Creating solitary, museum-grade jewelry masterpieces for discerning collectors. Each bespoke piece requires over 600 hours of artisanal hand-fabrication by master setters in our Geneva and Paris workshops.',
                      'primaryButtonText' => 'View The Rare Collection',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'The Atelier Philosophy',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'lux_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'The High Jewelry Archive',
                      'subtitle' => 'One-of-a-kind solitary pieces sculpted around certified exceptional natural gems',
                      'items' => [
                        [
                          'title' => 'The Celestial Solstice: 12ct Vivid Yellow Diamond',
                          'description' => 'Fancy vivid yellow cushion diamond set in platinum and 18k yellow gold with micro-pavé pear brilliant accents.',
                          'client' => 'Private Collector',
                          'year' => '2025',
                          'tags' => [
                            'Haute Joaillerie',
                            'Vivid Yellow',
                            'Platinum',
                            'Bespoke'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Nocturne Emeraude: Royal Zambian Emerald Suite',
                          'description' => 'Columbian minor-oil 8.4ct emerald surrounded by tapered diamond baguettes and invisible platinum lattice.',
                          'client' => 'Private Salon Collection',
                          'year' => '2024',
                          'tags' => [
                            'Emerald',
                            'Art Deco Lattice',
                            'Rare Gem'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Aura Sapphire: 18ct Unheated Royal Blue',
                          'description' => 'Certified unheated Kashmir sapphire framed by sculpted titanium petals and natural grey pearls.',
                          'client' => 'Museum Exhibition',
                          'year' => '2024',
                          'tags' => [
                            'Kashmir Sapphire',
                            'Titanium Sculpting',
                            'High Jewelry'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'lux_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Request Private Salon Viewing',
                      'subtitle' => 'Private viewings in Geneva, Paris, and Riyadh arranged strictly by appointment.',
                      'email' => 'concierge@maisondelor-joaillerie.com',
                      'location' => 'Geneva / Paris / Riyadh',
                      'availability' => 'Private salon viewings by appointment'
                    ]
                  ],
                  [
                    'id' => 'lux_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Maison de L\'Or Haute Joaillerie. All rights reserved.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0c0a09',
                  'textColor' => '#fafaf9',
                  'primaryColor' => '#d4af37',
                  'secondaryColor' => '#b89628',
                  'cardBg' => '#1c1917',
                  'cardBorder' => '#292524',
                  'headingFont' => 'Amiri',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.38',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '2px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'lux_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'دار الأور · المجوهرات الفاخرة والحرف اليدوية',
                      'ctaText' => 'حجز موعد صالون خاص',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'lux_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'صالونات خاصة في الرياض وجنيف وباريس',
                      'title' => 'مجوهرات راقية فريدة منحوتة يدوياً من أندر الأحجار الكريمة الطبيعية والمعادن النفيسة',
                      'subtitle' => 'كبير صاغة المجوهرات الفاخرة وخبير الأحجار الكريمة النادرة',
                      'description' => 'صياغة قطع مجوهرات نادرة بمستوى المتاحف العالمية لجامعي المقتنيات الخاصة. تتطلب كل قطعة فريدة أكثر من 600 ساعة من الصياغة اليدوية الدقيقة على أيدي أمهر الحرفيين في ورش جنيف وباريس والرياض.',
                      'primaryButtonText' => 'استعراض المجموعة النادرة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'فلسفة الصياغة الحرفية',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'lux_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'أرشيف المجوهرات والقطع النادرة',
                      'subtitle' => 'قطع فريدة لا تتكرر صُممت حول أحجار كريمة طبيعية استثنائية ومعتمدة دولياً',
                      'items' => [
                        [
                          'title' => 'خاتم Celestial Solstice: ألماسة صفراء نادرة 12 قيراطاً',
                          'description' => 'ألماسة صفراء براقة ونادرة بقطع وسادة مثبتة على البلاتين والذهب الأصفر عيار 18 مع تطعيم دقيق بأحجار الألماس الكمثرية.',
                          'client' => 'مقتني خاص',
                          'year' => '2025',
                          'tags' => [
                            'مجوهرات راقية',
                            'ألماس أصفر',
                            'بلاتين',
                            'صياغة خاصة'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'عقد Nocturne Emeraude: الزمرد الزامبي الملكي',
                          'description' => 'زمرد كولومبي طبيعي 8.4 قيراط محاط بأحجار الألماس المستطيلة وشبكة بلاتينية خفية تمثل قمة الدقة الحرفية.',
                          'client' => 'مجموعة الصالون الخاص',
                          'year' => '2024',
                          'tags' => [
                            'زمرد ملكي',
                            'فن الآرت ديكو',
                            'أحجار نادرة'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'بروش Aura Sapphire: الياقوت الأزرق الكشميري 18 قيراطاً',
                          'description' => 'ياقوت أزرق كشميري غير معالج حرارياً مؤطر ببتلات منحوتة من التيتانيوم ولآلئ رمادية طبيعية نادرة.',
                          'client' => 'معرض متحفي',
                          'year' => '2024',
                          'tags' => [
                            'ياقوت كشميري',
                            'نحت تيتانيوم',
                            'مجوهرات راقية'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'lux_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'طلب معاينة خاصة في الصالون',
                      'subtitle' => 'تتم المعاينات الخاصة في صالوناتنا في الرياض وجنيف وباريس بموجب مواعيد مسبقة خاصة.',
                      'email' => 'concierge@maisondelor-joaillerie.com',
                      'location' => 'الرياض / جنيف / باريس',
                      'availability' => 'المعاينات في الصالونات الخاصة بمواعيد مجدولة'
                    ]
                  ],
                  [
                    'id' => 'lux_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 دار الأور للمجوهرات الفاخرة. جميع الحقوق محفوظة.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'data-analytics-dashboard',
            'name' => 'Data Science & Quantitative Analytics',
            'name_ar' => 'علوم البيانات والتحليلات الكمية',
            'category' => 'Experimental',
            'description' => 'Dark terminal dashboard portfolio showcasing algorithmic backtesting graphs, Kaggle Grandmaster credentials, and production machine learning pipelines.',
            'description_ar' => 'معرض أعمال عالم البيانات والتحليلات الكمية بنمط لوحة تحكم مظلمة مع نماذج الاختبار الخوارزمي ورتبة Kaggle Grandmaster.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#090d16',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#10b981',
                  'secondaryColor' => '#06b6d4',
                  'cardBg' => '#111827',
                  'cardBorder' => '#1f2937',
                  'headingFont' => 'Fira Code',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '8px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'da_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Dr. Noah Sterling · Quant & Data',
                      'ctaText' => 'Jupyter Notebooks',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'da_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'terminal',
                      'windowTitle' => 'sterling@quant-analytics-node:~',
                      'command' => 'python run_backtest.py --strategy=statistical_arbitrage --sharpe=2.84',
                      'statusText' => 'PIPELINE VERIFIED · SHARPE 2.84',
                      'title' => 'Dr. Noah Sterling',
                      'subtitle' => 'Principal Quantitative Researcher & Kaggle Grandmaster',
                      'description' => 'Specializing in non-stationary time series modeling, probabilistic neural networks, and high-frequency statistical arbitrage. Deployed predictive models managing $450M in quantitative assets.',
                      'primaryButtonText' => 'Inspect Predictive Models',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Quant Performance Benchmarks',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'da_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Quantitative Benchmarks & Track Record',
                      'subtitle' => 'Verified model metrics evaluated on out-of-sample historical market data',
                      'items' => [
                        [
                          'value' => '2.84',
                          'label' => 'Out-of-Sample Sharpe Ratio',
                          'icon' => 'fa-solid fa-chart-line'
                        ],
                        [
                          'value' => 'Top 0.1%',
                          'label' => 'Kaggle Competitions Grandmaster',
                          'icon' => 'fa-solid fa-medal'
                        ],
                        [
                          'value' => '$450M',
                          'label' => 'Quant Capital Managed Under Model',
                          'icon' => 'fa-solid fa-coins'
                        ],
                        [
                          'value' => '<18ms',
                          'label' => 'Live Model Inference Latency',
                          'icon' => 'fa-solid fa-bolt'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'da_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'terminal',
                      'title' => 'Open Source Data Science & Quant Repos',
                      'subtitle' => 'Machine learning architectures and reproducible backtesting suites',
                      'items' => [
                        [
                          'title' => 'AlphaSignal-Engine',
                          'description' => 'Event-driven algorithmic backtesting framework in C++ and Python supporting non-linear slippage models and microstructure simulation.',
                          'stars' => '2.8k',
                          'branch' => 'v4.1-stable',
                          'tags' => [
                            'Python',
                            'C++',
                            'Algorithmic Trading',
                            'Time Series'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'Probabilistic-Transformer',
                          'description' => 'Deep learning architecture for multi-horizon financial forecasting utilizing Gaussian process attention heads.',
                          'stars' => '1.9k',
                          'branch' => 'main',
                          'tags' => [
                            'PyTorch',
                            'Transformers',
                            'Probabilistic ML'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'da_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Quantitative Advisory & Collaboration',
                      'subtitle' => 'Available for quantitative fund advisory, predictive modeling audits, and machine learning architecture.',
                      'email' => 'noah.sterling@quant-research.io',
                      'location' => 'New York / London / Remote',
                      'availability' => 'Open to selective institutional quant advisory'
                    ]
                  ],
                  [
                    'id' => 'da_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Dr. Noah Sterling. Quantitative Analytics.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#090d16',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#10b981',
                  'secondaryColor' => '#06b6d4',
                  'cardBg' => '#111827',
                  'cardBorder' => '#1f2937',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.38',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '8px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'da_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'د. ماجد السهلي · التحليلات الكمية وعلوم البيانات',
                      'ctaText' => 'مذكرات Jupyter البرمجية',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'da_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'terminal',
                      'windowTitle' => 'sehli@quant-analytics-node:~',
                      'command' => 'python run_backtest.py --strategy=statistical_arbitrage --sharpe=2.84',
                      'statusText' => 'النموذج مدقق · نسبة شارب 2.84',
                      'title' => 'د. ماجد السهلي',
                      'subtitle' => 'باحث رئيسي في التحليلات الكمية والنمذجة الرياضية ورتبة Grandmaster في Kaggle',
                      'description' => 'تخصص في نمذجة السلاسل الزمنية المعقدة، والشبكات العصبية الاحتمالية، واستراتيجيات التداول الخوارزمي الإحصائي. نماذج تنبؤية أدارت بنجاح أكثر من 450 مليون دولار في محافظ صناديق الاستثمار الكمي.',
                      'primaryButtonText' => 'استعراض النماذج التنبؤية',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'مؤشرات الأداء الكمي',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'da_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'المؤشرات الكمية وسجل الأداء',
                      'subtitle' => 'مقاييس أداء النماذج الخوارزمية المختبرة على بيانات تاريخية حقيقية',
                      'items' => [
                        [
                          'value' => '2.84',
                          'label' => 'نسبة شارب المحققة خارج العينة (Sharpe)',
                          'icon' => 'fa-solid fa-chart-line'
                        ],
                        [
                          'value' => 'أفضل 0.1%',
                          'label' => 'رتبة Grandmaster في منافسات Kaggle',
                          'icon' => 'fa-solid fa-medal'
                        ],
                        [
                          'value' => '450M$',
                          'label' => 'أصول مدارة وفق النماذج الخوارزمية',
                          'icon' => 'fa-solid fa-coins'
                        ],
                        [
                          'value' => '<18ms',
                          'label' => 'زمن استجابة النموذج التنبؤي الحي',
                          'icon' => 'fa-solid fa-bolt'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'da_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'terminal',
                      'title' => 'المستودعات البرمجية المفتوحة لعلوم البيانات',
                      'subtitle' => 'نماذج تعلم آلة وأطر عمل لاختبار الاستراتيجيات الخوارزمية قابلة للتكرار',
                      'items' => [
                        [
                          'title' => 'محرك AlphaSignal-Engine',
                          'description' => 'إطار عمل عالي الأداء لاختبار الاستراتيجيات الخوارزمية بلغة C++ وPython يدعم محاكاة الميكرو-هيكلية المعقدة للسوق.',
                          'stars' => '2.8k',
                          'branch' => 'v4.1-stable',
                          'tags' => [
                            'Python',
                            'C++',
                            'تداول خوارزمي',
                            'سلاسل زمنية'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'نموذج Probabilistic-Transformer',
                          'description' => 'معمارية تعلم عميق للتنبؤ المالي متعدد الآفاق الزمنية تعتمد على رؤوس انتباه احتمالية تعتمد على عمليات غاوسية.',
                          'stars' => '1.9k',
                          'branch' => 'main',
                          'tags' => [
                            'PyTorch',
                            'Transformers',
                            'تعلم آلة احتمالي'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'da_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'الاستشارات والتعاون في التحليلات الكمية',
                      'subtitle' => 'متاح لاستشارات الصناديق الاستثمارية الكمية، وتدقيق النماذج التنبؤية، ومعمارية تعلم الآلة للبيانات الضخمة.',
                      'email' => 'majed.sehli@quant-research.io',
                      'location' => 'الرياض / لندن / عمل عن بعد',
                      'availability' => 'متاح للاستشارات المؤسسية المتقدمة في النمذجة الكمية'
                    ]
                  ],
                  [
                    'id' => 'da_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 د. ماجد السهلي · التحليلات الكمية وعلوم البيانات.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'mobile-app-showcase',
            'name' => 'Mobile App Developer & iOS Artisan',
            'name_ar' => 'مطور تطبيقات الجوال وأنظمة iOS',
            'category' => 'Experimental',
            'description' => 'Cupertino dark aesthetic iOS developer showcase featuring device mockups, App Store 4.9★ rating credentials, Swift 6 concurrency, and App Store download CTAs.',
            'description_ar' => 'معرض أعمال مطور تطبيقات الآيفون والجوال بنمط كوبرتينو الأنيق مع إطارات الأجهزة وتقييمات App Store العالية والبرمجة بـ Swift.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#000000',
                  'textColor' => '#f5f5f7',
                  'primaryColor' => '#0071e3',
                  'secondaryColor' => '#2997ff',
                  'cardBg' => '#1d1d1f',
                  'cardBorder' => '#424245',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.15',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.025em',
                  'borderRadius' => '18px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'mad_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Liam Gallagher · iOS Artisan',
                      'ctaText' => 'App Store Portfolio',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'mad_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'App Store Featured · 4.9★ Across 38,000+ Reviews',
                      'title' => 'Crafting Fluid, Native iOS Applications with Pixel Precision & Swift 6 Modernity',
                      'subtitle' => 'Principal iOS Engineer & Independent App Publisher',
                      'description' => 'Crafting delightful, haptic-rich experiences for iPhone, iPad, Apple Watch, and Vision Pro. Obsessed with SwiftUI performance, Metal rendering shaders, offline CoreData/SwiftData sync, and 120Hz ProMotion smoothness.',
                      'primaryButtonText' => 'View Featured Apps',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'iOS Tech Architecture',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'mad_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'App Store Track Record',
                      'subtitle' => 'Verified metrics across published indie and client applications',
                      'items' => [
                        [
                          'value' => '4.9★',
                          'label' => 'Average App Store Customer Rating',
                          'icon' => 'fa-solid fa-star'
                        ],
                        [
                          'value' => '2.8M+',
                          'label' => 'Lifetime App Store Downloads',
                          'icon' => 'fa-brands fa-apple'
                        ],
                        [
                          'value' => '6x',
                          'label' => 'Apple App of the Day Features',
                          'icon' => 'fa-solid fa-trophy'
                        ],
                        [
                          'value' => '120Hz',
                          'label' => 'Silky ProMotion Zero Dropped Frames',
                          'icon' => 'fa-solid fa-bolt'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'mad_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Featured Native iOS Applications',
                      'subtitle' => 'Native Swift architectures downloaded and loved by hundreds of thousands worldwide',
                      'items' => [
                        [
                          'title' => 'Kinetix: Spatial Audio Journal',
                          'description' => 'App Store Editor Choice winner. Binaural microphone recording app with interactive waveform scrubbing and Apple Watch companion app.',
                          'tags' => [
                            'SwiftUI',
                            'Metal Audio',
                            'CoreData',
                            'WatchOS'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'AuraFocus: Minimalist Productivity',
                          'description' => 'Offline-first gesture timer utilizing Live Activities, Dynamic Island integration, and Interactive Lock Screen widgets.',
                          'tags' => [
                            'Swift 6',
                            'Dynamic Island',
                            'Live Activities',
                            'WidgetKit'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'SpatialCanvas: VisionOS 3D Sketching',
                          'description' => 'Immersive 3D volumetric sketching application built from scratch for Apple Vision Pro using RealityKit and hand-tracking gestures.',
                          'tags' => [
                            'VisionOS',
                            'RealityKit',
                            'Spatial Computing',
                            'Swift'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'mad_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Collaborate on Mobile Engineering',
                      'subtitle' => 'Available for principal iOS architecture contracts, VisionOS application development, and performance audits.',
                      'email' => 'liam.gallagher@ios-artisan.dev',
                      'location' => 'Dublin / San Francisco / Remote',
                      'availability' => 'Accepting selective iOS & VisionOS contracts'
                    ]
                  ],
                  [
                    'id' => 'mad_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Liam Gallagher · iOS & VisionOS Artisan.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#000000',
                  'textColor' => '#f5f5f7',
                  'primaryColor' => '#0071e3',
                  'secondaryColor' => '#2997ff',
                  'cardBg' => '#1d1d1f',
                  'cardBorder' => '#424245',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.38',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '18px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'mad_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'عبد العزيز المهيدب · مطور iOS وتطبيقات الجوال',
                      'ctaText' => 'تطبيقات App Store',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'mad_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'تطبيقات مختارة في متجر App Store · تقييم 4.9★ من أكثر من 38,000 مراجعة',
                      'title' => 'صناعة تطبيقات آيفون أصلية فائقة الانسيابية بأعلى درجات الدقة ولغة Swift الحديثة',
                      'subtitle' => 'كبير مهندسي تطبيقات iOS وناشر تطبيقات مستقل',
                      'description' => 'بناء تجارب مبهجة وتفاعلية لأجهزة iPhone وiPad وApple Watch ونظارة Vision Pro. اهتمام بالغ بأداء SwiftUI، وظلال الرسوميات عبر Metal، ومزامنة البيانات دون اتصال، وسلاسة شاشات ProMotion بمعدل 120 إطاراً في الثانية.',
                      'primaryButtonText' => 'استعراض التطبيقات المميزة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'المعمارية البرمجية لـ iOS',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'mad_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'سجل الإنجاز في متجر App Store',
                      'subtitle' => 'أرقام وإحصائيات موثقة لتطبيقات حصدت إعجاب مئات آلاف المستخدمين حول العالم',
                      'items' => [
                        [
                          'value' => '4.9★',
                          'label' => 'متوسط تقييم التطبيقات في App Store',
                          'icon' => 'fa-solid fa-star'
                        ],
                        [
                          'value' => '+2.8M',
                          'label' => 'تحميل لتطبيقات الآيفون والآيباد',
                          'icon' => 'fa-brands fa-apple'
                        ],
                        [
                          'value' => '6x',
                          'label' => 'اختيار كتطبيق اليوم في متجر Apple',
                          'icon' => 'fa-solid fa-trophy'
                        ],
                        [
                          'value' => '120Hz',
                          'label' => 'انسيابية كاملة بدون أي سقوط في الإطارات',
                          'icon' => 'fa-solid fa-bolt'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'mad_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'أبرز تطبيقات الآيفون الأصلية',
                      'subtitle' => 'تطبيقات مبنية بلغة Swift النقية حصدت تقييمات استثنائية ونالت ثقة المستخدمين',
                      'items' => [
                        [
                          'title' => 'تطبيق Kinetix: مذكرات الصوت المكاني',
                          'description' => 'فائز باختيار محرري App Store. تطبيق تسجيل صوتي مكاني ثلاثي الأبعاد مع تفاعل حي وتطبيق مخصص لساعة Apple Watch.',
                          'tags' => [
                            'SwiftUI',
                            'Metal Audio',
                            'CoreData',
                            'WatchOS'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'تطبيق AuraFocus: الإنتاجية والتركيز',
                          'description' => 'مؤقت ذكي بالإيماءات يعمل بدون إنترنت مع دعم الجزيرة التفاعلية (Dynamic Island) والأنشطة الحية (Live Activities).',
                          'tags' => [
                            'Swift 6',
                            'Dynamic Island',
                            'Live Activities',
                            'WidgetKit'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'تطبيق SpatialCanvas للرسم المكاني',
                          'description' => 'تطبيق رسم ثلاثي الأبعاد غامر لنظارة Apple Vision Pro يعتمد على مكتبة RealityKit وإيماءات تتبع حركة اليد.',
                          'tags' => [
                            'VisionOS',
                            'RealityKit',
                            'حوسبة مكانية',
                            'Swift'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'mad_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل لهندسة وتطوير تطبيقات الجوال',
                      'subtitle' => 'متاح لعقود معمارية تطبيقات iOS، وتطوير تطبيقات VisionOS، وتدقيق أداء واجهات الجوال.',
                      'email' => 'abdulaziz@ios-artisan.dev',
                      'location' => 'الرياض / دبلن / عمل عن بعد عالمياً',
                      'availability' => 'متاح لمشاريع تطبيقات iOS ونظارة Vision Pro النوعية'
                    ]
                  ],
                  [
                    'id' => 'mad_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 عبد العزيز المهيدب · مطور أنظمة iOS وVisionOS.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ]
        ];
    }
}
