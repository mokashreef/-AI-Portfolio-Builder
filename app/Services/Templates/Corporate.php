<?php
namespace App\Services\Templates;

/**
 * AI Portfolio Builder - Corporate & Professional Templates Catalog
 * Count: 10 Hand-Curated Production-Grade Design Systems
 */
class Corporate {
    public static function getTemplates(): array {
        return [
          [
            'slug' => 'executive-advisory',
            'name' => 'Executive & Board Advisory',
            'name_ar' => 'القيادة التنفيذية ومجالس الإدارة الاستشارية',
            'category' => 'Corporate',
            'description' => 'Deep midnight navy and warm champagne gold, high-trust serif typography, board governance metrics, and executive credentials.',
            'description_ar' => 'تصميم رصين لكبار التنفيذيين وأعضاء مجالس الإدارة، يجمع بين الكحلي الملكي ودرجات الذهب الرصين مع مقاييس الحوكمة.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#080d1a',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#c5a880',
                  'secondaryColor' => '#93c5fd',
                  'cardBg' => '#10172a',
                  'cardBorder' => 'rgba(197, 168, 128, 0.25)',
                  'headingFont' => 'Playfair Display',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.65',
                  'letterSpacingHeading' => '-0.01em',
                  'borderRadius' => '6px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_exec',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'DR. HISHAM AL-KHALIDI',
                      'ctaText' => 'Executive Office',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_exec',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'executive',
                      'badge' => 'INDEPENDENT BOARD DIRECTOR · CHAIR OF AUDIT & RISK',
                      'title' => 'Dr. Hisham Al-Khalidi',
                      'subtitle' => 'Corporate Governance, M&A Strategy & Sovereign Fund Advisory',
                      'description' => 'Over 22 years of corporate governance experience steering public joint-stock enterprises, financial institutions, and multi-billion-dollar sovereign transformation portfolios across EMEA.',
                      'primaryButtonText' => 'Governance Record',
                      'primaryButtonLink' => '#about',
                      'secondaryButtonText' => 'Direct Executive Inquiry',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'about_exec',
                    'type' => 'about',
                    'props' => [
                      'title' => 'Board Leadership & Impact',
                      'subtitle' => 'Measurable stewardship across publicly traded enterprises',
                      'bio' => 'Dr. Al-Khalidi advises boards on strategic resilience, executive compensation alignment, capital allocation, and zero-trust regulatory compliance.

He has overseen 14 successful cross-border mergers valued at over $6.8B, ensuring fiduciary integrity and sustained shareholder return.',
                      'highlights' => [
                        [
                          'label' => 'Total M&A Value Managed',
                          'value' => '$6.8B+'
                        ],
                        [
                          'label' => 'Public Board Tenures',
                          'value' => '6 Public Firms'
                        ],
                        [
                          'label' => 'Executive Experience',
                          'value' => '22+ Years'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_exec',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Executive Correspondence',
                      'subtitle' => 'For board invitations, advisory appointments, and keynote addresses.',
                      'email' => 'office@hisham-alkhalidi.com',
                      'location' => 'Riyadh · London · Abu Dhabi',
                      'availability' => 'Selective Advisory Board Inquiries Welcomed'
                    ]
                  ],
                  [
                    'id' => 'footer_exec',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Office of Dr. Hisham Al-Khalidi. Confidential Executive Profile.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#080d1a',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#c5a880',
                  'secondaryColor' => '#93c5fd',
                  'cardBg' => '#10172a',
                  'cardBorder' => 'rgba(197, 168, 128, 0.25)',
                  'headingFont' => 'Amiri',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.4',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '6px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_exec',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'د. هشام الخالدي',
                      'ctaText' => 'المكتب التنفيذي',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_exec',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'executive',
                      'badge' => 'عضو مجلس إدارة مستقل · رئيس لجنة المراجعة والمخاطر',
                      'title' => 'د. هشام الخالدي',
                      'subtitle' => 'حوكمة الشركات، استراتيجيات الاستحواذ، واستشارات الصناديق السيادية',
                      'description' => 'أكثر من 22 عاماً في قيادة حوكمة الشركات المساهمة العامة، والمؤسسات المالية، ومحافظ التحول الاستراتيجي بمليارات الدولارات في منطقة الشرق الأوسط وأوروبا.',
                      'primaryButtonText' => 'سجل الحوكمة واللجان',
                      'primaryButtonLink' => '#about',
                      'secondaryButtonText' => 'التواصل مع المكتب التنفيذي',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'about_exec',
                    'type' => 'about',
                    'props' => [
                      'title' => 'القيادة والأثر المؤسسي الرصين',
                      'subtitle' => 'إشراف استراتيجي موثق عبر كبرى الشركات المساهمة المدرجة',
                      'bio' => 'يقدم د. الخالدي الاستشارات الاستراتيجية لمجالس الإدارة حول مرونة الأعمال، وحوكمة التعويضات التنفيذية، وتخصيص رأس المال، والامتثال التنظيمي المتقدم.

أشرف على 14 عملية دمج واستحواذ عابرة للحدود بقيمة تجاوزت 6.8 مليار دولار مع حماية حقوق المساهمين وأصول المؤسسات.',
                      'highlights' => [
                        [
                          'label' => 'قيمة صفقات الاستحواذ المدارة',
                          'value' => '+6.8 مليار دولار'
                        ],
                        [
                          'label' => 'عضويات مجالس الإدارة المدرجة',
                          'value' => '6 شركات مساهمة'
                        ],
                        [
                          'label' => 'سنوات الخبرة التنفيذية القيادية',
                          'value' => '+22 عاماً'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_exec',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'مراسلات المكتب التنفيذي',
                      'subtitle' => 'لتكليفات مجالس الإدارة، واللجان المنبثقة، والكلمات الافتتاحية للمؤتمرات الاقتصادية.',
                      'email' => 'office@hisham-alkhalidi.com',
                      'location' => 'الرياض · لندن · أبوظبي',
                      'availability' => 'استقبال الدعوات الاستشارية للمجالس واللجان السيادية'
                    ]
                  ],
                  [
                    'id' => 'footer_exec',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 المكتب التنفيذي للدكتور هشام الخالدي. جميع الحقوق محفوظة.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#080d1a',
              'textColor' => '#f8fafc',
              'primaryColor' => '#c5a880',
              'secondaryColor' => '#93c5fd',
              'cardBg' => '#10172a',
              'cardBorder' => 'rgba(197, 168, 128, 0.25)',
              'headingFont' => 'Playfair Display',
              'bodyFont' => 'Inter',
              'lineHeightHeading' => '1.25',
              'lineHeightBody' => '1.65',
              'letterSpacingHeading' => '-0.01em',
              'borderRadius' => '6px',
              'containerWidth' => 'max-w-6xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_exec',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'DR. HISHAM AL-KHALIDI',
                  'ctaText' => 'Executive Office',
                  'ctaLink' => '#contact'
                ]
              ],
              [
                'id' => 'hero_exec',
                'type' => 'hero',
                'props' => [
                  'variant' => 'executive',
                  'badge' => 'INDEPENDENT BOARD DIRECTOR · CHAIR OF AUDIT & RISK',
                  'title' => 'Dr. Hisham Al-Khalidi',
                  'subtitle' => 'Corporate Governance, M&A Strategy & Sovereign Fund Advisory',
                  'description' => 'Over 22 years of corporate governance experience steering public joint-stock enterprises, financial institutions, and multi-billion-dollar sovereign transformation portfolios across EMEA.',
                  'primaryButtonText' => 'Governance Record',
                  'primaryButtonLink' => '#about',
                  'secondaryButtonText' => 'Direct Executive Inquiry',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'about_exec',
                'type' => 'about',
                'props' => [
                  'title' => 'Board Leadership & Impact',
                  'subtitle' => 'Measurable stewardship across publicly traded enterprises',
                  'bio' => 'Dr. Al-Khalidi advises boards on strategic resilience, executive compensation alignment, capital allocation, and zero-trust regulatory compliance.

He has overseen 14 successful cross-border mergers valued at over $6.8B, ensuring fiduciary integrity and sustained shareholder return.',
                  'highlights' => [
                    [
                      'label' => 'Total M&A Value Managed',
                      'value' => '$6.8B+'
                    ],
                    [
                      'label' => 'Public Board Tenures',
                      'value' => '6 Public Firms'
                    ],
                    [
                      'label' => 'Executive Experience',
                      'value' => '22+ Years'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_exec',
                'type' => 'contact',
                'props' => [
                  'title' => 'Executive Correspondence',
                  'subtitle' => 'For board invitations, advisory appointments, and keynote addresses.',
                  'email' => 'office@hisham-alkhalidi.com',
                  'location' => 'Riyadh · London · Abu Dhabi',
                  'availability' => 'Selective Advisory Board Inquiries Welcomed'
                ]
              ],
              [
                'id' => 'footer_exec',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Office of Dr. Hisham Al-Khalidi. Confidential Executive Profile.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#080d1a',
                'textColor' => '#f8fafc',
                'primaryColor' => '#c5a880',
                'secondaryColor' => '#93c5fd',
                'cardBg' => '#10172a',
                'cardBorder' => 'rgba(197, 168, 128, 0.25)',
                'headingFont' => 'Playfair Display',
                'bodyFont' => 'Inter',
                'lineHeightHeading' => '1.25',
                'lineHeightBody' => '1.65',
                'letterSpacingHeading' => '-0.01em',
                'borderRadius' => '6px',
                'containerWidth' => 'max-w-6xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_exec',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'DR. HISHAM AL-KHALIDI',
                    'ctaText' => 'Executive Office',
                    'ctaLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'hero_exec',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'executive',
                    'badge' => 'INDEPENDENT BOARD DIRECTOR · CHAIR OF AUDIT & RISK',
                    'title' => 'Dr. Hisham Al-Khalidi',
                    'subtitle' => 'Corporate Governance, M&A Strategy & Sovereign Fund Advisory',
                    'description' => 'Over 22 years of corporate governance experience steering public joint-stock enterprises, financial institutions, and multi-billion-dollar sovereign transformation portfolios across EMEA.',
                    'primaryButtonText' => 'Governance Record',
                    'primaryButtonLink' => '#about',
                    'secondaryButtonText' => 'Direct Executive Inquiry',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'about_exec',
                  'type' => 'about',
                  'props' => [
                    'title' => 'Board Leadership & Impact',
                    'subtitle' => 'Measurable stewardship across publicly traded enterprises',
                    'bio' => 'Dr. Al-Khalidi advises boards on strategic resilience, executive compensation alignment, capital allocation, and zero-trust regulatory compliance.

He has overseen 14 successful cross-border mergers valued at over $6.8B, ensuring fiduciary integrity and sustained shareholder return.',
                    'highlights' => [
                      [
                        'label' => 'Total M&A Value Managed',
                        'value' => '$6.8B+'
                      ],
                      [
                        'label' => 'Public Board Tenures',
                        'value' => '6 Public Firms'
                      ],
                      [
                        'label' => 'Executive Experience',
                        'value' => '22+ Years'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_exec',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Executive Correspondence',
                    'subtitle' => 'For board invitations, advisory appointments, and keynote addresses.',
                    'email' => 'office@hisham-alkhalidi.com',
                    'location' => 'Riyadh · London · Abu Dhabi',
                    'availability' => 'Selective Advisory Board Inquiries Welcomed'
                  ]
                ],
                [
                  'id' => 'footer_exec',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Office of Dr. Hisham Al-Khalidi. Confidential Executive Profile.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'boutique-agency',
            'name' => 'Boutique Digital Transformation Agency',
            'name_ar' => 'وكالة التحول الرقمي والتطوير التقني',
            'category' => 'Corporate',
            'description' => 'High-end agency showcase featuring multi-disciplinary engineering squads, enterprise modernization case studies, and corporate client logos.',
            'description_ar' => 'معرض أعمال لوكالة التحول الرقمي والاستشارات التقنية مع فرق هندسية متكاملة، ودراسات حالة لتحديث الأنظمة، وعملاء من كبرى الشركات.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#090d16',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#3b82f6',
                  'secondaryColor' => '#60a5fa',
                  'cardBg' => '#111827',
                  'cardBorder' => '#1f2937',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.2',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.025em',
                  'borderRadius' => '12px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'ba_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Apex Labs · Digital Engineering',
                      'ctaText' => 'Schedule Discovery',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'ba_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Enterprise Engineering Partner · 45+ Production Platforms',
                      'title' => 'Engineering Custom Cloud Platforms & AI Workflows for Forward-Thinking Enterprises',
                      'subtitle' => 'Boutique Digital Transformation & Product Studio',
                      'description' => 'We deploy dedicated, senior engineering squads to modernize legacy infrastructure, launch flagship digital products, and integrate generative AI pipelines. Trusted by global leaders across finance, energy, and healthcare.',
                      'primaryButtonText' => 'Explore Client Deployments',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Our Capabilities',
                      'secondaryButtonLink' => '#services'
                    ]
                  ],
                  [
                    'id' => 'ba_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Enterprise Delivery Track Record',
                      'subtitle' => 'Proven velocity and engineering excellence across long-term partnerships',
                      'items' => [
                        [
                          'value' => '45+',
                          'label' => 'Enterprise Platforms Shipped',
                          'icon' => 'fa-solid fa-server'
                        ],
                        [
                          'value' => '100%',
                          'label' => 'On-Time Sprint Completion SLA',
                          'icon' => 'fa-solid fa-clock-check'
                        ],
                        [
                          'value' => '$2.4B',
                          'label' => 'Annual Client Transaction Volume Powered',
                          'icon' => 'fa-solid fa-vault'
                        ],
                        [
                          'value' => '94%',
                          'label' => 'Multi-Year Client Retainer Rate',
                          'icon' => 'fa-solid fa-handshake'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ba_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'Core Enterprise Capabilities',
                      'subtitle' => 'Full lifecycle digital engineering from discovery architecture to scaled cloud operations',
                      'items' => [
                        [
                          'title' => 'Legacy Modernization & Cloud Migration',
                          'description' => 'Deconstructing monolithic mainframes into resilient microservice meshes on AWS and Azure with zero operational downtime.',
                          'icon' => 'fa-solid fa-cloud-arrow-up',
                          'price' => 'Enterprise Advisory'
                        ],
                        [
                          'title' => 'Enterprise AI & Autonomous Workflows',
                          'description' => 'Deploying secure on-premise LLMs, private retrieval pipelines, and agentic workflows compliant with strict regulatory standards.',
                          'icon' => 'fa-solid fa-brain',
                          'price' => 'Custom Solution'
                        ],
                        [
                          'title' => 'Dedicated Product Engineering Squads',
                          'description' => 'Autonomous, senior engineering pods including staff architects, UI specialists, and SREs embedded with your team.',
                          'icon' => 'fa-solid fa-users-gear',
                          'price' => 'Quarterly Retainer'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ba_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Initiate an Enterprise Engagement',
                      'subtitle' => 'Connect directly with our managing partners to explore custom engineering solutions.',
                      'email' => 'partnerships@apexlabs-engineering.com',
                      'location' => 'New York / London / Riyadh',
                      'availability' => 'Accepting 2 new enterprise partnerships for upcoming quarters'
                    ]
                  ],
                  [
                    'id' => 'ba_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Apex Labs LLC. Enterprise Software Systems.',
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
                  'primaryColor' => '#3b82f6',
                  'secondaryColor' => '#60a5fa',
                  'cardBg' => '#111827',
                  'cardBorder' => '#1f2937',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.38',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '12px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'ba_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'أفق للحلول الرقمية · Apex Labs',
                      'ctaText' => 'جدولة جلسة استكشافية',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'ba_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'شريك هندسي معتمد للمؤسسات الكبرى · +45 منصة في بيئة الإنتاج',
                      'title' => 'هندسة وبناء المنصات السحابية المخصصة وتطبيقات الذكاء الاصطناعي للمؤسسات الرائدة',
                      'subtitle' => 'أستوديو ووكالة متخصصة في التحول الرقمي وتطوير المنتجات',
                      'description' => 'نخصص فرقاً هندسية قيادية لتحديث البنية التحتية القديمة، وإطلاق المنتجات الرقمية الاستراتيجية، ودمج حلول الذكاء الاصطناعي التوليدي. شريك موثوق لجهات رائدة في قطاعات المالية والطاقة والرعاية الصحية.',
                      'primaryButtonText' => 'استعراض المنصات المنجزة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'القدرات والحلول التقنية',
                      'secondaryButtonLink' => '#services'
                    ]
                  ],
                  [
                    'id' => 'ba_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'سجل الإنجاز والتميز الهندسي للمؤسسات',
                      'subtitle' => 'مؤشرات موثقة لسرعة التنفيذ وجودة البناء عبر شراكات استراتيجية طويلة الأمد',
                      'items' => [
                        [
                          'value' => '+45',
                          'label' => 'منصة للمؤسسات تم إطلاقها بنجاح',
                          'icon' => 'fa-solid fa-server'
                        ],
                        [
                          'value' => '100%',
                          'label' => 'التزام بمواعيد تسليم دورات التطوير',
                          'icon' => 'fa-solid fa-clock-check'
                        ],
                        [
                          'value' => '2.4B$',
                          'label' => 'حجم المعاملات السنوية المدارة عبر المنصات',
                          'icon' => 'fa-solid fa-vault'
                        ],
                        [
                          'value' => '94%',
                          'label' => 'نسبة تجديد العقود السنوية مع العملاء',
                          'icon' => 'fa-solid fa-handshake'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ba_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'القدرات الهندسية الأساسية',
                      'subtitle' => 'دورة حياة رقمية كاملة من الاستكشاف المعماري حتى التشغيل السحابي الموسع',
                      'items' => [
                        [
                          'title' => 'تحديث الأنظمة القديمة والترحيل السحابي',
                          'description' => 'تفكيك الأنظمة المركزية المعقدة إلى خدمات سحابية مصغرة مرنة على منصات AWS وAzure بدون انقطاع تشغيلي.',
                          'icon' => 'fa-solid fa-cloud-arrow-up',
                          'price' => 'استشارات مؤسسية'
                        ],
                        [
                          'title' => 'أنظمة الذكاء الاصطناعي المؤسسي المخصصة',
                          'description' => 'نشر نماذج لغوية آمنة ومحلية، ومسارات استرجاع بيانات متوافقة مع أشد المعايير التنظيمية الصارمة.',
                          'icon' => 'fa-solid fa-brain',
                          'price' => 'حلول متخصصة'
                        ],
                        [
                          'title' => 'فرق هندسية مخصصة ومدمجة',
                          'description' => 'فرق برمجية قيادية تضم كبار المعماريين، وأخصائيي الواجهات، ومهندسي الاعتمادية مدمجة بالكامل مع فريق عملك.',
                          'icon' => 'fa-solid fa-users-gear',
                          'price' => 'عقود ربع سنوية'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ba_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'بدء شراكة تقنية مع المؤسسات',
                      'subtitle' => 'تواصل مباشرة مع الشركاء الإداريين لاستكشاف الحلول الهندسية المخصصة لمؤسستك.',
                      'email' => 'partnerships@apexlabs-engineering.com',
                      'location' => 'الرياض / نيويورك / لندن',
                      'availability' => 'نستقبل شراكتين مؤسسيتين جديدتين للربع القادم'
                    ]
                  ],
                  [
                    'id' => 'ba_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 أفق للحلول الرقمية ذ.م.م. نظم برمجيات المؤسسات.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'seed-startup-pitch',
            'name' => 'Venture-Backed Seed Startup',
            'name_ar' => 'صفحة شركة ناشئة مدعومة برأس المال الجريء',
            'category' => 'Corporate',
            'description' => 'High-velocity startup landing page featuring problem vs solution breakdown, $4.5M seed funding announcement, interactive demo preview, and early access waitlist.',
            'description_ar' => 'صفحة شركة تقنية ناشئة مدعومة بجولة استثمارية بذرة بقيمة 4.5M$ مع تفكيك المشكلة والحل، وتجربة تفاعلية، وقائمة الانتظار.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#090d16',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#6366f1',
                  'secondaryColor' => '#a855f7',
                  'cardBg' => '#111827',
                  'cardBorder' => '#1f2937',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.2',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.025em',
                  'borderRadius' => '12px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'ssp_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'ChronoScale · Distributed Cache',
                      'ctaText' => 'Join Early Access',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'ssp_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Announcing $4.5M Seed Round led by Sequoia Scout & Founders Fund',
                      'title' => 'The Sub-Millisecond Distributed Cache for High-Concurrency AI Agents',
                      'subtitle' => 'Next-Generation Memory & State Orchestration Engine',
                      'description' => 'Traditional Redis instances bottleneck under agentic workloads. ChronoScale provides lock-free, multi-region distributed memory fabric delivering sub-400μs vector and KV retrievals with zero cold starts.',
                      'primaryButtonText' => 'Request Early Access API Key',
                      'primaryButtonLink' => '#contact',
                      'secondaryButtonText' => 'Read Technical Whitepaper',
                      'secondaryButtonLink' => '#services'
                    ]
                  ],
                  [
                    'id' => 'ssp_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Benchmarked Against Industry Standards',
                      'subtitle' => 'Audited performance gains across 100-node simulated cluster environments',
                      'items' => [
                        [
                          'value' => '<380μs',
                          'label' => 'Median State Read Latency',
                          'icon' => 'fa-solid fa-bolt'
                        ],
                        [
                          'value' => '10x',
                          'label' => 'Concurrent Agent Throughput vs Redis',
                          'icon' => 'fa-solid fa-gauge-high'
                        ],
                        [
                          'value' => '$4.5M',
                          'label' => 'Seed Capital Closed from Top VCs',
                          'icon' => 'fa-solid fa-seedling'
                        ],
                        [
                          'value' => '1,400+',
                          'label' => 'Engineering Teams on Waitlist',
                          'icon' => 'fa-solid fa-users'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ssp_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Join the Private Developer Beta',
                      'subtitle' => 'Early access slots are allocated weekly to engineering teams running high-load AI agent architectures.',
                      'email' => 'beta@chronoscale.dev',
                      'location' => 'San Francisco / Global Distributed',
                      'availability' => 'Private Beta rolling out weekly'
                    ]
                  ],
                  [
                    'id' => 'ssp_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 ChronoScale Inc. Backed by top tier venture capital.',
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
                  'primaryColor' => '#6366f1',
                  'secondaryColor' => '#a855f7',
                  'cardBg' => '#111827',
                  'cardBorder' => '#1f2937',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.38',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '12px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'ssp_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'سينك للبرمجيات · ChronoScale',
                      'ctaText' => 'الانضمام لقائمة الوصول المبكر',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'ssp_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'إعلان إغلاق جولة بذرة بقيمة 4.5M$ بقيادة صناديق استثمارية عالمية',
                      'title' => 'محرك التخزين المؤقت الموزع فائق السرعة لوكلاء وتطبيقات الذكاء الاصطناعي',
                      'subtitle' => 'الجيل القادم من محركات الذاكرة وإدارة الحالة الموزعة',
                      'description' => 'قواعد التخزين المؤقت التقليدية تعاني من الاختناق مع أحمال وكلاء الذكاء الاصطناعي المتزامنة. توفر ChronoScale بنية ذاكرة موزعة خالية من أقفال التزامن وبزمن استرجاع أقل من 400 ميكروثانية وبدون أي تأخير بداية.',
                      'primaryButtonText' => 'طلب مفتاح الوصول المبكر (API)',
                      'primaryButtonLink' => '#contact',
                      'secondaryButtonText' => 'قراءة الورقة البيضاء التقنية',
                      'secondaryButtonLink' => '#services'
                    ]
                  ],
                  [
                    'id' => 'ssp_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'مقارنات الأداء القياسية مع الحلول القائمة',
                      'subtitle' => 'نتائج فحص أداء موثقة عبر بيئات عناقيد تحاكي بيئات الإنتاج الكبرى',
                      'items' => [
                        [
                          'value' => '<380μs',
                          'label' => 'متوسط زمن قراءة الحالة من الذاكرة',
                          'icon' => 'fa-solid fa-bolt'
                        ],
                        [
                          'value' => '10x',
                          'label' => 'تدفق متزامن أعلى مقارنة بـ Redis',
                          'icon' => 'fa-solid fa-gauge-high'
                        ],
                        [
                          'value' => '4.5M$',
                          'label' => 'رأس مال استثماري بذرة تم إغلاقه',
                          'icon' => 'fa-solid fa-seedling'
                        ],
                        [
                          'value' => '+1,400',
                          'label' => 'فريق هندسي مسجل بقائمة الانتظار',
                          'icon' => 'fa-solid fa-users'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ssp_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'الانضمام إلى النسخة التجريبية للمطورين',
                      'subtitle' => 'يتم فتح مقاعد الوصول المبكر أسبوعياً للفرق الهندسية التي تدير بنى وكلاء ذكاء اصطناعي عالية الحمل.',
                      'email' => 'beta@chronoscale.dev',
                      'location' => 'سان فرانسيسكو / الرياض / فريق موزع عالمياً',
                      'availability' => 'إطلاق تجريبي خاص أسبوعياً'
                    ]
                  ],
                  [
                    'id' => 'ssp_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 ChronoScale Inc. مدعومة برأس المال الجريء.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'tech-enterprise-solutions',
            'name' => 'Enterprise Cloud Solutions',
            'name_ar' => 'حلول المؤسسات السحابية وأنظمة الأمان',
            'category' => 'Corporate',
            'description' => 'High-security enterprise corporate landing featuring SOC2 Type II and ISO 27001 compliance badges, global region data center maps, and enterprise sales contact.',
            'description_ar' => 'صفحة حلول المؤسسات السحابية وأنظمة الأمان مع شارات الامتثال SOC2 وISO 27001 ومراكز البيانات العالمية ونموذج المبيعات المؤسسية.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0b1120',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#2563eb',
                  'secondaryColor' => '#3b82f6',
                  'cardBg' => '#131e36',
                  'cardBorder' => '#1e2e50',
                  'headingFont' => 'Plus Jakarta Sans',
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
                    'id' => 'es_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Fortress Networks · Cloud Security',
                      'ctaText' => 'Contact Enterprise Sales',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'es_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'SOC2 Type II · ISO/IEC 27001 · HIPAA Compliant',
                      'title' => 'Zero-Trust Cloud Mesh & Automated Threat Immunity for Global Enterprises',
                      'subtitle' => 'Enterprise Secure Cloud Infrastructure Solutions',
                      'description' => 'Providing military-grade end-to-end encrypted network fabrics, automated credential hygiene, and continuous sovereign data boundary compliance for regulated institutions worldwide.',
                      'primaryButtonText' => 'Request Enterprise Architecture Demo',
                      'primaryButtonLink' => '#contact',
                      'secondaryButtonText' => 'Trust & Compliance Center',
                      'secondaryButtonLink' => '#services'
                    ]
                  ],
                  [
                    'id' => 'es_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Enterprise Security SLA Benchmarks',
                      'subtitle' => 'Verified operational metrics across our global sovereign network fabric',
                      'items' => [
                        [
                          'value' => '100%',
                          'label' => 'Zero-Trust Protocol Enforcement',
                          'icon' => 'fa-solid fa-shield-halved'
                        ],
                        [
                          'value' => '32',
                          'label' => 'Global Sovereign Cloud Regions',
                          'icon' => 'fa-solid fa-earth-americas'
                        ],
                        [
                          'value' => '<1ms',
                          'label' => 'Hardware Cryptographic Latency',
                          'icon' => 'fa-solid fa-key'
                        ],
                        [
                          'value' => '99.999%',
                          'label' => 'Guaranteed Network Availability SLA',
                          'icon' => 'fa-solid fa-server'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'es_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Speak With an Enterprise Architect',
                      'subtitle' => 'Custom threat modeling and sovereign architecture proposals tailored to your compliance requirements.',
                      'email' => 'enterprise-sales@fortress-networks.com',
                      'location' => 'Washington D.C. / Zurich / Tokyo',
                      'availability' => '24/7 dedicated enterprise response SLA'
                    ]
                  ],
                  [
                    'id' => 'es_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Fortress Networks Global Corporation.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0b1120',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#2563eb',
                  'secondaryColor' => '#3b82f6',
                  'cardBg' => '#131e36',
                  'cardBorder' => '#1e2e50',
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
                    'id' => 'es_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'شبكات القلعة · Fortress Networks',
                      'ctaText' => 'تواصل مع مبيعات المؤسسات',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'es_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'شهادات الامتثال العالمية SOC2 Type II وISO 27001',
                      'title' => 'بنية سحابية مشفرة وشبكات صفرية الثقة للمؤسسات والقطاعات الحيوية الكبرى',
                      'subtitle' => 'حلول البنية التحتية السحابية الآمنة وحصانة البيانات السيادية',
                      'description' => 'توفير شبكات سحابية مشفرة بمعايير متقدمة، وأتمتة إدارة الهويات والصلاحيات، والامتثال الصارم لحدود البيانات السيادية للمؤسسات الخاضعة للرقابة التنظيمية حول العالم.',
                      'primaryButtonText' => 'طلب عرض معمارية المؤسسات',
                      'primaryButtonLink' => '#contact',
                      'secondaryButtonText' => 'مركز الثقة والامتثال الأمني',
                      'secondaryButtonLink' => '#services'
                    ]
                  ],
                  [
                    'id' => 'es_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'معايير الأمان والتوفر التشغيلي المؤسسي',
                      'subtitle' => 'أرقام وإحصائيات موثقة عبر شبكتنا السحابية السيادية العالمية',
                      'items' => [
                        [
                          'value' => '100%',
                          'label' => 'تطبيق معايير صفرية الثقة (Zero-Trust)',
                          'icon' => 'fa-solid fa-shield-halved'
                        ],
                        [
                          'value' => '32',
                          'label' => 'منطقة سحابية سيادية حول العالم',
                          'icon' => 'fa-solid fa-earth-americas'
                        ],
                        [
                          'value' => '<1ms',
                          'label' => 'زمن التشفير بالعتاد الأمني المخصص',
                          'icon' => 'fa-solid fa-key'
                        ],
                        [
                          'value' => '99.999%',
                          'label' => 'معدل التوفر التشغيلي المضمون للشبكة',
                          'icon' => 'fa-solid fa-server'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'es_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل مع معماري حلول المؤسسات',
                      'subtitle' => 'دراسة مخصصة لنمذجة التهديدات ومقترحات البنية السحابية السيادية المتوافقة مع متطلباتكم التنظيمية.',
                      'email' => 'enterprise-sales@fortress-networks.com',
                      'location' => 'الرياض / واشنطن / زيورخ',
                      'availability' => 'استجابة مخصصة للمؤسسات الكبرى على مدار الساعة'
                    ]
                  ],
                  [
                    'id' => 'es_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 شركة شبكات القلعة للأنظمة السحابية.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'wealth-advisory',
            'name' => 'Private Wealth & Asset Management',
            'name_ar' => 'إدارة الثروات العائلية والاستثمار الخاص',
            'category' => 'Corporate',
            'description' => 'Prestigious multi-family office and wealth management portfolio with refined British racing green & gold aesthetics, fiduciary charter, and private client portal.',
            'description_ar' => 'معرض أعمال للمكاتب العائلية وإدارة الثروات والاستثمار الخاص بطابع وقور يجمع الأخضر الزمردي والذهب مع ميثاق الأمانة والشفافية.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0b1c14',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#c5a059',
                  'secondaryColor' => '#e2c286',
                  'cardBg' => '#122b20',
                  'cardBorder' => '#1e4030',
                  'headingFont' => 'Playfair Display',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.65',
                  'letterSpacingHeading' => '-0.01em',
                  'borderRadius' => '4px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'wa_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Sterling & Co. · Multi-Family Office',
                      'ctaText' => 'Private Client Portal',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'wa_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Fiduciary Wealth Advisory · Generations of Stewardship',
                      'title' => 'Preserving Generational Prosperity Through Disciplined Stewardship & Global Capital Allocation',
                      'subtitle' => 'Multi-Family Office & Private Wealth Advisory',
                      'description' => 'Advising distinguished families, entrepreneurial dynasties, and private foundations. Managing liquid portfolios, private equity direct investments, and cross-border estate governance under a strict fiduciary oath.',
                      'primaryButtonText' => 'Explore Stewardship Principles',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'Fiduciary Charter',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'wa_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'Family Office Advisory Pillars',
                      'subtitle' => 'Discreet, holistic wealth architecture designed for multi-generational longevity',
                      'items' => [
                        [
                          'title' => 'Global Asset Allocation & Liquidity',
                          'description' => 'Macroeconomic risk-hedged portfolios investing across public equities, private credit, sovereign debt, and real assets.',
                          'icon' => 'fa-solid fa-vault',
                          'price' => 'Discretionary Mandate'
                        ],
                        [
                          'title' => 'Direct Private Equity & Co-Investments',
                          'description' => 'Exclusive participation in proprietary growth-stage technology buyouts and real estate infrastructure developments.',
                          'icon' => 'fa-solid fa-chart-line',
                          'price' => 'Direct Allocation'
                        ],
                        [
                          'title' => 'Family Governance & Succession Protocol',
                          'description' => 'Crafting enduring family constitutions, philanthropic foundation charters, and next-generation leadership training.',
                          'icon' => 'fa-solid fa-scroll',
                          'price' => 'Governance Retainer'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'wa_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Confidential Client Inquiries',
                      'subtitle' => 'Private wealth advisory consultations conducted with utmost discretion.',
                      'email' => 'advisory@sterling-familyoffice.com',
                      'location' => 'London / Zurich / Dubai',
                      'availability' => 'Admitting qualifying families by introduction'
                    ]
                  ],
                  [
                    'id' => 'wa_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Sterling & Co. Fiduciary Family Office.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0b1c14',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#c5a059',
                  'secondaryColor' => '#e2c286',
                  'cardBg' => '#122b20',
                  'cardBorder' => '#1e4030',
                  'headingFont' => 'Amiri',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.38',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '4px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'wa_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'دار الائتمان لإدارة الأصول · Sterling & Co.',
                      'ctaText' => 'بوابة العملاء الخاصة',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'wa_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'استشارات الثروات العائلية والأمانة الاستثمارية عبر الأجيال',
                      'title' => 'صون الثروات العائلية واستدامتها عبر الأجيال من خلال إدارة حكيمة وتوزيع عالمي لرأس المال',
                      'subtitle' => 'المكتب العائلي المتعدد واستشارات الثروات والاستثمار الخاص',
                      'description' => 'تقديم المشورة الاستثمارية للعائلات العريقة ورواد الأعمال والمؤسسات الوقفية. إدارة المحافظ السائلة والاستثمارات المباشرة في الملكية الخاصة، وتخطيط التعاقب العائلي بموجب ميثاق أمانة مهني صارم.',
                      'primaryButtonText' => 'استعراض مبادئ الأمانة الاستثمارية',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'ميثاق الحوكمة العائلية',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'wa_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'ركائز استشارات المكاتب العائلية',
                      'subtitle' => 'هندسة ثروات متكاملة وسرية مصممة لاستدامة الأصول وحمايتها عبر الأجيال',
                      'items' => [
                        [
                          'title' => 'توزيع الأصول العالمية والسيولة',
                          'description' => 'محافظ استثمارية متنوعة ومتحوطة تستثمر في الأسواق العامة والائتمان الخاص والديون السيادية والأصول العقارية.',
                          'icon' => 'fa-solid fa-vault',
                          'price' => 'إدارة تفويضية'
                        ],
                        [
                          'title' => 'الملكية الخاصة والاستثمار المباشر',
                          'description' => 'فرص استثمار مباشر حصرية في شركات التقنية سريعة النمو ومشاريع التطوير العقاري الاستراتيجي.',
                          'icon' => 'fa-solid fa-chart-line',
                          'price' => 'استثمار مباشر'
                        ],
                        [
                          'title' => 'الحوكمة العائلية ومواثيق التعاقب',
                          'description' => 'صياغة الدساتير العائلية ولوائح المؤسسات الخيرية والوقفية وتأهيل قادة الجيل القادم لإدارة الثروة.',
                          'icon' => 'fa-solid fa-scroll',
                          'price' => 'حوكمة متكاملة'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'wa_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل السري للعملاء',
                      'subtitle' => 'تتم الجلسات الاستشارية لإدارة الثروات بأعلى درجات الخصوصية والسرية المصرفية.',
                      'email' => 'advisory@sterling-familyoffice.com',
                      'location' => 'الرياض / لندن / زيورخ',
                      'availability' => 'نستقبل العائلات المؤهلة بتوصية مباشرة'
                    ]
                  ],
                  [
                    'id' => 'wa_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 دار الائتمان لإدارة الأصول والمكاتب العائلية.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'legal-counsel-firm',
            'name' => 'Corporate Legal Counsel & Compliance',
            'name_ar' => 'المكتب القانوني واستشارات الشركات',
            'category' => 'Corporate',
            'description' => 'Dignified corporate legal counsel website highlighting cross-border M&A transactions, venture financing deal records, and dispute arbitration outcomes.',
            'description_ar' => 'موقع مكتب محاماة واستشارات قانونية للمؤسسات والشركات مع استعراض صفقات الدمج والاستحواذ، والتمويل الجريء، والتحكيم التجاري.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#18181b',
                  'textColor' => '#fafafa',
                  'primaryColor' => '#b91c1c',
                  'secondaryColor' => '#dc2626',
                  'cardBg' => '#27272a',
                  'cardBorder' => '#3f3f46',
                  'headingFont' => 'Playfair Display',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.65',
                  'letterSpacingHeading' => '-0.01em',
                  'borderRadius' => '2px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'lc_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Vance & Hastings LLP · Corporate Law',
                      'ctaText' => 'Retain Counsel',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'lc_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Advising on $8B+ in Cross-Border Transactions',
                      'title' => 'Strategic Legal Counsel for High-Stakes Corporate Transactions & Cross-Border Disputes',
                      'subtitle' => 'Corporate Law, Venture Financing & Commercial Arbitration',
                      'description' => 'Representing international corporations, growth-stage technology pioneers, and private equity sponsors across M&A deals, intellectual property litigation, and complex cross-border regulatory compliance.',
                      'primaryButtonText' => 'View Practice Areas',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'Landmark Transactions',
                      'secondaryButtonLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'lc_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'Core Legal Practice Areas',
                      'subtitle' => 'Specialized counsel delivered by senior partners across key commercial disciplines',
                      'items' => [
                        [
                          'title' => 'Mergers, Acquisitions & Carve-Outs',
                          'description' => 'Structuring multi-jurisdictional acquisitions, antitrust clearance, and negotiated joint venture shareholder agreements.',
                          'icon' => 'fa-solid fa-handshake-angle',
                          'price' => 'Transaction Advisory'
                        ],
                        [
                          'title' => 'Venture Financing & Emerging Growth',
                          'description' => 'Counseling founders and venture funds through preferred stock financings, bridge debt, and secondary liquidity transactions.',
                          'icon' => 'fa-solid fa-chart-line',
                          'price' => 'Financing Counsel'
                        ],
                        [
                          'title' => 'International Commercial Arbitration',
                          'description' => 'Advocacy before ICC, LCIA, and DIAC arbitration tribunals in complex commercial contract breaches and IP disputes.',
                          'icon' => 'fa-solid fa-scale-balanced',
                          'price' => 'Dispute Resolution'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'lc_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Confidential Legal Consultation',
                      'subtitle' => 'Inquiries reviewed directly by managing partners under attorney-client privilege.',
                      'email' => 'counsel@vance-hastings-law.com',
                      'location' => 'New York / London / Dubai',
                      'availability' => 'Accepting select corporate mandates'
                    ]
                  ],
                  [
                    'id' => 'lc_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Vance & Hastings LLP. Attorney advertising.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#18181b',
                  'textColor' => '#fafafa',
                  'primaryColor' => '#b91c1c',
                  'secondaryColor' => '#dc2626',
                  'cardBg' => '#27272a',
                  'cardBorder' => '#3f3f46',
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
                    'id' => 'lc_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'مكتب العريفي للمحاماة والاستشارات القانونية',
                      'ctaText' => 'طلب استشارة قانونية',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'lc_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'استشارات قانونية في صفقات تجاوزت 8 مليارات دولار',
                      'title' => 'المشورة القانونية الاستراتيجية لصفقات الشركات الكبرى والنزاعات التجارية الدولية',
                      'subtitle' => 'قانون الشركات والدمج والاستحواذ والتحكيم التجاري الدولي',
                      'description' => 'تمثيل الشركات الدولية، والمشاريع التقنية الرائدة، وصناديق الاستثمار في صفقات الاندماج والاستحواذ، ودعاوى الملكية الفكرية، والامتثال التنظيمي للأنظمة والتشريعات المحلية والدولية.',
                      'primaryButtonText' => 'استعراض مجالات الممارسة',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'الصفقات البارزة المنجزة',
                      'secondaryButtonLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'lc_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'مجالات الممارسة القانونية الأساسية',
                      'subtitle' => 'استشارات يقدمها شركاء ذوو خبرة واسعة في أبرز التخصصات التجارية والتنظيمية',
                      'items' => [
                        [
                          'title' => 'الاندماج والاستحواذ والمشاريع المشتركة',
                          'description' => 'هيكلة صفقات الاستحواذ متعددة الاختصاصات القضائية، والحصول على الموافقات التنظيمية، وصياغة اتفاقيات الشركاء.',
                          'icon' => 'fa-solid fa-handshake-angle',
                          'price' => 'استشارات صفقات'
                        ],
                        [
                          'title' => 'تمويل المشاريع ورأس المال الجريء',
                          'description' => 'تمثيل المؤسسين وصناديق رأس المال الجريء في جولات التمويل الاستثماري، والديون القابلة للتحويل، وصفقات التخارج.',
                          'icon' => 'fa-solid fa-chart-line',
                          'price' => 'تمويل واستثمار'
                        ],
                        [
                          'title' => 'التحكيم التجاري الدولي والنزاعات',
                          'description' => 'الترافع أمام هيئات التحكيم الدولية في نزاعات العقود التجارية الكبرى ومخالفات الملكية الفكرية.',
                          'icon' => 'fa-solid fa-scale-balanced',
                          'price' => 'فض النزاعات والتحكيم'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'lc_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'طلب استشارة قانونية سرية',
                      'subtitle' => 'تتم مراجعة الطلبات مباشرة من قبل الشركاء الإداريين في إطار السرية المهنية المحمية.',
                      'email' => 'counsel@alareefi-law.com',
                      'location' => 'الرياض / دبي / لندن',
                      'availability' => 'نستقبل تكليفات الشركات النوعية الكبرى'
                    ]
                  ],
                  [
                    'id' => 'lc_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 مكتب العريفي للمحاماة والاستشارات القانونية.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'product-hardware-showcase',
            'name' => 'Industrial Design & Hardware Showcase',
            'name_ar' => 'استعراض منتجات العتاد والتصميم الصناعي',
            'category' => 'Corporate',
            'description' => 'Ultra-sleek physical product showcase featuring titanium industrial design, exploded hardware component diagrams, battery specs, and preorder CTAs.',
            'description_ar' => 'معرض منتجات العتاد والتصميم الصناعي مع استعراض هيكل التيتانيوم ومخططات المكونات الداخلية وتفاصيل الأداء وخيار الطلب المسبق.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#09090b',
                  'textColor' => '#fafafa',
                  'primaryColor' => '#e4e4e7',
                  'secondaryColor' => '#a1a1aa',
                  'cardBg' => '#18181b',
                  'cardBorder' => '#27272a',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.15',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.03em',
                  'borderRadius' => '16px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'hw_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'OuraSpatial · Audio Hardware',
                      'ctaText' => 'Preorder Edition 01',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hw_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Grade 5 Titanium · Planar Magnetic Drivers',
                      'title' => 'Acoustic Precision Meets Industrial Purity in Everyday Spatial Hardware',
                      'subtitle' => 'Next-Generation Wearable Audio & Spatial Sensing',
                      'description' => 'Machined from a single billet of aerospace-grade titanium. Featuring custom 40mm planar magnetic drivers, ultra-low latency spatial tracking, and 48-hour continuous battery reserve.',
                      'primaryButtonText' => 'Reserve Edition 01 ($499)',
                      'primaryButtonLink' => '#contact',
                      'secondaryButtonText' => 'Technical Specifications',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'hw_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Engineered Acoustic Specifications',
                      'subtitle' => 'Acoustic lab measurements and aerospace material tolerances',
                      'items' => [
                        [
                          'value' => '48h',
                          'label' => 'Continuous Playback Battery Life',
                          'icon' => 'fa-solid fa-battery-full'
                        ],
                        [
                          'value' => '<1ms',
                          'label' => 'Lossless Spatial Tracking Latency',
                          'icon' => 'fa-solid fa-bolt'
                        ],
                        [
                          'value' => '185g',
                          'label' => 'Total Weight in Aerotitanium',
                          'icon' => 'fa-solid fa-feather'
                        ],
                        [
                          'value' => '10Hz-45kHz',
                          'label' => 'Frequency Response Range',
                          'icon' => 'fa-solid fa-wave-square'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'hw_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Reserve Your Limited Edition 01',
                      'subtitle' => 'First production batch limited to 1,000 serialized units worldwide. Priority shipping included.',
                      'email' => 'preorders@ouraspatial.tech',
                      'location' => 'Stockholm / San Francisco',
                      'availability' => 'Batch 01 Shipping November 2026'
                    ]
                  ],
                  [
                    'id' => 'hw_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 OuraSpatial Technologies Inc. Industrial Design.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#09090b',
                  'textColor' => '#fafafa',
                  'primaryColor' => '#e4e4e7',
                  'secondaryColor' => '#a1a1aa',
                  'cardBg' => '#18181b',
                  'cardBorder' => '#27272a',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.38',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '16px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'hw_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'منتجات أورا المكانية · OuraSpatial',
                      'ctaText' => 'طلب الإصدار الأول مسبقاً',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hw_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'هيكل من التيتانيوم المعياري فئة 5 · محركات صوتية مغناطيسية متطورة',
                      'title' => 'الدقة الصوتية الفائقة تلتقي بالصفاء الصناعي في أجهزة استشعار الصوت المكاني',
                      'subtitle' => 'الجيل القادم من العتاد الصوتي القابل للارتداء والاستشعار المكاني',
                      'description' => 'مصنعة من قطعة واحدة من التيتانيوم المستخدم في صناعة الطائرات. مجهزة بمحركات صوتية مغناطيسية مسطحة مقاس 40 مم، وتتبع مكاني فائق السرعة بزمن استجابة أقل من 1 مللي ثانية، وبطارية تدوم 48 ساعة.',
                      'primaryButtonText' => 'حجز الإصدار الأول (499$)',
                      'primaryButtonLink' => '#contact',
                      'secondaryButtonText' => 'المواصفات التقنية الدقيقة',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'hw_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'المواصفات الهندسية والصوتية',
                      'subtitle' => 'قياسات مختبرات الصوت الدقيقة ومعايير التصنيع الفضائي',
                      'items' => [
                        [
                          'value' => '48 ساعة',
                          'label' => 'عمر البطارية في التشغيل المستمر',
                          'icon' => 'fa-solid fa-battery-full'
                        ],
                        [
                          'value' => '<1ms',
                          'label' => 'زمن تأخير التتبع المكاني للصوت',
                          'icon' => 'fa-solid fa-bolt'
                        ],
                        [
                          'value' => '185 غرام',
                          'label' => 'الوزن الإجمالي بهيكل التيتانيوم الخفيف',
                          'icon' => 'fa-solid fa-feather'
                        ],
                        [
                          'value' => '10Hz-45kHz',
                          'label' => 'نطاق الاستجابة الترددية للصوت',
                          'icon' => 'fa-solid fa-wave-square'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'hw_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'احجز نسختك من الإصدار المحدود 01',
                      'subtitle' => 'الدفعة الأولى مقتصرة على 1000 قطعة مرقمة حول العالم مع شحن سريع مجاني.',
                      'email' => 'preorders@ouraspatial.tech',
                      'location' => 'الرياض / ستوكهولم / سان فرانسيسكو',
                      'availability' => 'شحن الدفعة الأولى في نوفمبر 2026'
                    ]
                  ],
                  [
                    'id' => 'hw_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 شركة أورا المكانية للتقنيات. تصميم صناعي.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'saas-b2b-platform',
            'name' => 'Modern B2B SaaS Platform',
            'name_ar' => 'منصة برمجيات الأعمال B2B SaaS',
            'category' => 'Corporate',
            'description' => 'Product-led B2B software landing page with interactive ROI calculator cards, feature matrix tabs, customer case studies, and transparent pricing preview.',
            'description_ar' => 'صفحة منصة برمجيات أعمال B2B قائمة على المنتج مع حاسبة العائد على الاستثمار، ومصفوفة الميزات، وتجارب العملاء، وباقات الأسعار.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0f172a',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#3b82f6',
                  'secondaryColor' => '#60a5fa',
                  'cardBg' => '#1e293b',
                  'cardBorder' => '#334155',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.2',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.025em',
                  'borderRadius' => '12px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'sp_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'FlowMetric · Observability',
                      'ctaText' => 'Start Free 14-Day Trial',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'sp_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Cut Cloud Observability Bills by 42% · No Credit Card Required',
                      'title' => 'Unified Cloud Observability & Cost Intelligence for Fast-Moving Engineering Teams',
                      'subtitle' => 'Zero-Instrumentation APM, Log Aggregation & FinOps Intelligence',
                      'description' => 'Correlate distributed traces, infrastructure metrics, and cloud billing line items in a single blazing-fast dashboard. Detect memory leaks and anomalous cost surges before they hit your invoices.',
                      'primaryButtonText' => 'Start 14-Day Free Trial',
                      'primaryButtonLink' => '#contact',
                      'secondaryButtonText' => 'See Live Interactive Demo',
                      'secondaryButtonLink' => '#services'
                    ]
                  ],
                  [
                    'id' => 'sp_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Customer Business Impact',
                      'subtitle' => 'Quantified ROI reported across 420+ connected enterprise engineering teams',
                      'items' => [
                        [
                          'value' => '-42%',
                          'label' => 'Average Cloud Spend Reduction',
                          'icon' => 'fa-solid fa-arrow-trend-down'
                        ],
                        [
                          'value' => '<30s',
                          'label' => 'Agentless eBPF Setup Time',
                          'icon' => 'fa-solid fa-stopwatch'
                        ],
                        [
                          'value' => '12.4k',
                          'label' => 'Anomalies Auto-Remediated',
                          'icon' => 'fa-solid fa-wand-magic-sparkles'
                        ],
                        [
                          'value' => '99.99%',
                          'label' => 'SaaS Platform Service Availability',
                          'icon' => 'fa-solid fa-server'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sp_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Start Your Free 14-Day Trial',
                      'subtitle' => 'Connect your AWS, GCP, or Kubernetes clusters in under 5 minutes with zero code modifications.',
                      'email' => 'onboarding@flowmetric.io',
                      'location' => 'San Francisco / Austin / Remote',
                      'availability' => 'Instant automated provisioning'
                    ]
                  ],
                  [
                    'id' => 'sp_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 FlowMetric Technologies Inc. Cloud Observability.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0f172a',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#3b82f6',
                  'secondaryColor' => '#60a5fa',
                  'cardBg' => '#1e293b',
                  'cardBorder' => '#334155',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.38',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '12px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'sp_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'فلو-ماتريكس · FlowMetric',
                      'ctaText' => 'ابدأ تجربة مجانية 14 يوماً',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'sp_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'خفض تكاليف مراقبة السحابة بنسبة 42% · بدون بطاقة ائتمان',
                      'title' => 'منصة موحدة لمراقبة السحابة والتحكم الذكي في التكاليف لفرق الهندسة البرمجية',
                      'subtitle' => 'مراقبة أداء التطبيقات وسجلات النظام وإدارة التكاليف السحابية بدون تعقيد',
                      'description' => 'ربط تتبع الأنظمة الموزعة وسجلات الأداء وبنود فواتير السحابة في لوحة تحكم واحدة فائقة السرعة. اكتشاف تسريبات الذاكرة والارتفاعات المفاجئة في التكاليف ومعالجتها قبل وصول الفاتورة.',
                      'primaryButtonText' => 'بدء التجربة المجانية 14 يوماً',
                      'primaryButtonLink' => '#contact',
                      'secondaryButtonText' => 'استعراض التجربة التفاعلية الحية',
                      'secondaryButtonLink' => '#services'
                    ]
                  ],
                  [
                    'id' => 'sp_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'الأثر المالي والتقني للعملاء',
                      'subtitle' => 'عوائد استثمارية محققة لأكثر من 420 فريقاً هندسياً حول العالم',
                      'items' => [
                        [
                          'value' => '-42%',
                          'label' => 'متوسط خفض الإنفاق السحابي الفعلي',
                          'icon' => 'fa-solid fa-arrow-trend-down'
                        ],
                        [
                          'value' => '<30 ثانية',
                          'label' => 'وقت التثبيت التلقائي عبر eBPF',
                          'icon' => 'fa-solid fa-stopwatch'
                        ],
                        [
                          'value' => '+12.4k',
                          'label' => 'خلل تم تشخيصه وعلاجه تلقائياً',
                          'icon' => 'fa-solid fa-wand-magic-sparkles'
                        ],
                        [
                          'value' => '99.99%',
                          'label' => 'معدل التوفر التشغيلي للمنصة',
                          'icon' => 'fa-solid fa-server'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sp_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'ابدأ تجربتك المجانية لمدة 14 يوماً',
                      'subtitle' => 'اربط حساباتك السحابية على AWS أو GCP أو Kubernetes خلال أقل من 5 دقائق وبدون أي تعديل على الكود البرمجي.',
                      'email' => 'onboarding@flowmetric.io',
                      'location' => 'الرياض / سان فرانسيسكو / فريق عالمي',
                      'availability' => 'تفعيل فوري تلقائي للحساب'
                    ]
                  ],
                  [
                    'id' => 'sp_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 شركة فلو-ماتريكس للتقنيات السحابية.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'immersive-creative-agency',
            'name' => 'Immersive Spatial Design Studio',
            'name_ar' => 'استوديو التجارب التفاعلية والتصميم الغامر',
            'category' => 'Corporate',
            'description' => 'Monospaced architectural brutalism portfolio showcasing interactive museum installations, physical-digital brand environments, and world expo pavilions.',
            'description_ar' => 'معرض أعمال استوديو التجارب التفاعلية والتجهيزات الفضائية المعمارية للمتاحف والأجنحة العالمية والمعارض الكبرى.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0a0a0a',
                  'textColor' => '#e5e5e5',
                  'primaryColor' => '#ffffff',
                  'secondaryColor' => '#a3a3a3',
                  'cardBg' => '#171717',
                  'cardBorder' => '#262626',
                  'headingFont' => 'Space Grotesk',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.15',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '0px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'mc_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'MONOLITH SPATIAL // 2026',
                      'ctaText' => 'Commission Installation',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'mc_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Venice Biennale · World Expo Pavilions',
                      'title' => 'CONVERGING ARCHITECTURE, SENSORY KINETICS & GENERATIVE LIGHT',
                      'subtitle' => 'IMMERSIVE SPATIAL DESIGN & PHYSICAL COMPUTING ATELIER',
                      'description' => 'We construct monumental physical-digital installations, museum pavilions, and interactive environments. Transforming raw architectural steel, acoustic resonance, and generative algorithms into unforgettable spatial experiences.',
                      'primaryButtonText' => 'EXPLORE INSTALLATIONS',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'SPATIAL PHILOSOPHY',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'mc_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'SPATIAL COMMISSIONS & EXHIBITIONS',
                      'subtitle' => 'Selected architectural installations across Europe, Asia, and the Middle East',
                      'items' => [
                        [
                          'title' => 'LUMEN SPHERE: DOHA EXPO',
                          'description' => '18-meter kinetic sculpture composed of 600 synchronized mirror panels reflecting desert sunlight with generative algorithmic soundscapes.',
                          'client' => 'National Museum of Qatar',
                          'year' => '2025',
                          'tags' => [
                            'Kinetic Architecture',
                            'Physical Computing',
                            'Acoustics'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'ECHOES OF THE CANOPY: TOKYO',
                          'description' => 'Biometric sensory pavilion translating human pulse data into bioluminescent fiber-optic forest canopy waves.',
                          'client' => 'Mori Art Museum',
                          'year' => '2024',
                          'tags' => [
                            'Biometrics',
                            'Fiber Optics',
                            'Spatial Audio'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'MONOLITH NOCTURNE: BASEL',
                          'description' => 'Monolithic brutalist dark room exploring tactile sub-bass resonance and laser diffraction mirrors.',
                          'client' => 'Art Basel Pavilion',
                          'year' => '2024',
                          'tags' => [
                            'Laser Diffraction',
                            'Sub-Bass',
                            'Brutalist'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'mc_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'COMMISSION A SPATIAL INSTALLATION',
                      'subtitle' => 'Direct communication portal for cultural curators, museum boards, and biennial pavilions.',
                      'email' => 'commissions@monolith-spatial.studio',
                      'location' => 'Berlin / Tokyo / Riyadh',
                      'availability' => 'Evaluating 2026/2027 museum pavilion commissions'
                    ]
                  ],
                  [
                    'id' => 'mc_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 MONOLITH SPATIAL ATELIER. ALL RIGHTS RESERVED.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0a0a0a',
                  'textColor' => '#e5e5e5',
                  'primaryColor' => '#ffffff',
                  'secondaryColor' => '#a3a3a3',
                  'cardBg' => '#171717',
                  'cardBorder' => '#262626',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.38',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '0px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'mc_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'مونوليث للتصميم المكاني // 2026',
                      'ctaText' => 'طلب تجهيز فني مكاني',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'mc_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'بينالي البندقية · أجنحة إكسبو العالمية والمعارض الكبرى',
                      'title' => 'تلاقي العمارة الحركية مع الحوسبة الفيزيائية والضوء التوليدي الغامر',
                      'subtitle' => 'أستوديو التصميم المكاني الغامر والتجهيزات المعمارية التفاعلية',
                      'description' => 'نبني تجهيزات مكانية ونحتية تجمع العالم الحقيقي بالرقمي للأجنحة والمتاحف العالمية. تحويل الفولاذ المعماري، والترددات الصوتية العميقة، والخوارزميات التوليدية إلى تجارب مكانية حية تأسر الحواس.',
                      'primaryButtonText' => 'استعراض التجهيزات المكانية',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'الفلسفة المعمارية',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'mc_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'الأعمال والتجهيزات المكانية المختارة',
                      'subtitle' => 'تجهيزات معمارية رائدة في متاحف وأجنحة كبرى في أوروبا وآسيا والشرق الأوسط',
                      'items' => [
                        [
                          'title' => 'مجسم LUMEN SPHERE الحركي',
                          'description' => 'منحوتة حركية بارتفاع 18 متراً تتكون من 600 مرآة متحركة متزامنة تعكس ضوء شمس الصحراء مصحوبة بمؤثرات صوتية توليدية.',
                          'client' => 'متاحف قطر الوطنية',
                          'year' => '2025',
                          'tags' => [
                            'عمارة حركية',
                            'حوسبة فيزيائية',
                            'صوتيات مكانية'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'جناح أصداء الغابة في طوكيو',
                          'description' => 'جناح حسي بيومتري يترجم نبضات زوار المعرض إلى موجات ضوئية حيوية تسري عبر غابة من الألياف البصرية المتوهجة.',
                          'client' => 'متحف موري للفنون طوكيو',
                          'year' => '2024',
                          'tags' => [
                            'استشعار حيوي',
                            'ألياف بصرية',
                            'صوت مكاني'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'تجهيز MONOLITH NOCTURNE في بازل',
                          'description' => 'غرفة بروتاليزم مظلمة تستكشف الرنين الصوتي للترددات العميقة مع انعكاسات أشعة الليزر المتناثرة.',
                          'client' => 'جناح آرت بازل Art Basel',
                          'year' => '2024',
                          'tags' => [
                            'تشتت ليزري',
                            'ترددات عميقة',
                            'بروتاليزم'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'mc_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'طلب تجهيز مكاني للمتاحف والمعارض',
                      'subtitle' => 'بوابة التواصل المباشر مع القيمين الفنيين وإدارات المتاحف ولجان الأجنحة العالمية.',
                      'email' => 'commissions@monolith-spatial.studio',
                      'location' => 'الرياض / برلين / طوكيو',
                      'availability' => 'ندرس حالياً تكليفات متاحف وأجنحة 2026/2027'
                    ]
                  ],
                  [
                    'id' => 'mc_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 أستوديو مونوليث للتصميم المكاني. جميع الحقوق محفوظة.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'professional-services-group',
            'name' => 'Professional Management Advisory',
            'name_ar' => 'مجموعة الخدمات الاستشارية الإدارية',
            'category' => 'Corporate',
            'description' => 'Structured corporate management consultancy website detailing operational excellence frameworks, supply chain optimization, and partner bios.',
            'description_ar' => 'موقع مجموعة استشارات إدارية مؤسسية يستعرض أطر التميز التشغيلي وتحسين سلاسل الإمداد وسير الشركاء القياديين.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0f172a',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#0d9488',
                  'secondaryColor' => '#14b8a6',
                  'cardBg' => '#1e293b',
                  'cardBorder' => '#334155',
                  'headingFont' => 'Plus Jakarta Sans',
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
                    'id' => 'ma_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Meridian Group · Management Advisory',
                      'ctaText' => 'Schedule Advisory',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'ma_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Advising Fortune 500 & Sovereign Entities',
                      'title' => 'Operational Transformation, Supply Chain Resilience & Organizational Strategy',
                      'subtitle' => 'Global Management Consulting & Strategic Execution',
                      'description' => 'Partnering with C-suite leadership and governmental ministries to unlock working capital, optimize multi-tier global supply chains, and execute rigorous restructuring programs with measurable bottom-line gains.',
                      'primaryButtonText' => 'Explore Consulting Methodology',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'Partner Practice Leaders',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'ma_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'Management Consulting Disciplines',
                      'subtitle' => 'Structured, data-driven frameworks delivering proven enterprise impact',
                      'items' => [
                        [
                          'title' => 'Supply Chain Decoupling & Resilience',
                          'description' => 'Risk-optimizing procurement networks, nearshoring strategies, and dynamic inventory buffers against geopolitical volatility.',
                          'icon' => 'fa-solid fa-truck-ramp-box',
                          'price' => 'Strategic Advisory'
                        ],
                        [
                          'title' => 'Operational Working Capital Optimization',
                          'description' => 'Cash conversion cycle acceleration releasing hundreds of millions in trapped balance sheet liquidity.',
                          'icon' => 'fa-solid fa-coins',
                          'price' => 'Operational Audit'
                        ],
                        [
                          'title' => 'Post-Merger Operational Integration',
                          'description' => 'Day-1 readiness execution, organizational structure deduplication, and technology platform harmonization.',
                          'icon' => 'fa-solid fa-network-wired',
                          'price' => 'M&A Advisory'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ma_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Engage Our Advisory Partners',
                      'subtitle' => 'Connect with our sector practice leaders to discuss upcoming transformation initiatives.',
                      'email' => 'advisory@meridian-consulting.org',
                      'location' => 'Chicago / Riyadh / Singapore',
                      'availability' => 'Accepting select corporate mandates'
                    ]
                  ],
                  [
                    'id' => 'ma_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Meridian Advisory Group. Management Consulting.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0f172a',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#0d9488',
                  'secondaryColor' => '#14b8a6',
                  'cardBg' => '#1e293b',
                  'cardBorder' => '#334155',
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
                    'id' => 'ma_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'مجموعة ميريديان الاستشارية · Meridian Group',
                      'ctaText' => 'طلب استشارة إدارية',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'ma_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'استشارات استراتيجية لكبرى الشركات والكيانات الحكومية',
                      'title' => 'التحول التشغيلي الشامل ومرونة سلاسل الإمداد والاستراتيجية المؤسسية المتكاملة',
                      'subtitle' => 'استشارات الإدارة الاستراتيجية والتنفيذ المؤسسي الفعال',
                      'description' => 'شراكة استراتيجية مع الإدارات التنفيذية والوزارات لتحرير رأس المال العامل، وتحسين سلاسل الإمداد العالمية متعددة المستويات، وتنفيذ برامج إعادة الهيكلة بكفاءة عالية وأثر مالي ملموس.',
                      'primaryButtonText' => 'استعراض منهجية الاستشارات',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'الشركاء وقادة القطاعات',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'ma_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'مجالات الاستشارات الإدارية والتشغيلية',
                      'subtitle' => 'أطر عمل منظمة قائمة على البيانات تحقق أثراً حقيقياً وملموساً للمؤسسات',
                      'items' => [
                        [
                          'title' => 'مرونة سلاسل الإمداد والخدمات اللوجستية',
                          'description' => 'إعادة هندسة شبكات التوريد، واستراتيجيات تقريب مصادر التوريد، وإدارة المخزون الديناميكي ضد تقلبات الأسواق.',
                          'icon' => 'fa-solid fa-truck-ramp-box',
                          'price' => 'استشارات استراتيجية'
                        ],
                        [
                          'title' => 'تحسين رأس المال العامل والسيولة',
                          'description' => 'تسريع دورة تحويل النقد وتحرير مئات الملايين من السيولة المحتجزة في الميزانيات العمومية.',
                          'icon' => 'fa-solid fa-coins',
                          'price' => 'تدقيق تشغيلي'
                        ],
                        [
                          'title' => 'الاندماج التشغيلي لما بعد الصفقات',
                          'description' => 'جاهزية اليوم الأول للتشغيل، وتفكيك ازدواجية الهياكل التنظيمية، ومواءمة الأنظمة التقنية المشتركة.',
                          'icon' => 'fa-solid fa-network-wired',
                          'price' => 'استشارات الاندماج'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ma_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل مع الشركاء الاستشاريين',
                      'subtitle' => 'تواصل مع قادة القطاعات لمناقشة مبادرات التحول المؤسسي القادمة في منظمتكم.',
                      'email' => 'advisory@meridian-consulting.org',
                      'location' => 'الرياض / شيكاغو / سنغافورة',
                      'availability' => 'نستقبل تكليفات التحول المؤسسي الكبرى'
                    ]
                  ],
                  [
                    'id' => 'ma_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 مجموعة ميريديان الاستشارية. استشارات الإدارة.',
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
