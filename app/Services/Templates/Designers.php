<?php
namespace App\Services\Templates;

/**
 * AI Portfolio Builder - Designers & Creatives Templates Catalog
 * Count: 10 Hand-Curated Production-Grade Design Systems
 */
class Designers {
    public static function getTemplates(): array {
        return [
          [
            'slug' => 'swiss-grid',
            'name' => 'Swiss International Grid',
            'name_ar' => 'النمط السويسري وشبكات التصميم المنضبط',
            'category' => 'Designer',
            'description' => 'Rigorous Josef Müller-Brockmann typography, bold numbered index tables, and International Orange accents.',
            'description_ar' => 'تصميم منضبط مستوحى من مدرسة التصميم السويسري مع جداول مفهرسة بالأرقام وترتيب هندسي صارم للمعلومات.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#f4f4f2',
                  'textColor' => '#0a0a0a',
                  'primaryColor' => '#ff3b00',
                  'secondaryColor' => '#111111',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#000000',
                  'headingFont' => 'Space Grotesk',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.15',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.03em',
                  'borderRadius' => '0px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_swiss',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'MAXIME BERNARD / 01',
                      'ctaText' => 'INDEX & COMMISSIONS',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'hero_swiss',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'swiss',
                      'indexNum' => '01 / IDENTITY & CATALOG',
                      'title' => 'Maxime Bernard',
                      'subtitle' => 'Objective Visual Systems & Information Architecture',
                      'description' => 'Constructing disciplined typographical structures, brand identities, and spatial signage systems grounded in the Zurich graphic design canon.
Form follows informational clarity.',
                      'metadataLine1' => 'Brand Systems & Environmental Typography',
                      'metadataLine2' => 'Basel & Zurich · Selective Global Commissions',
                      'primaryButtonText' => 'Explore Works',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Direct Contact',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_swiss',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'swiss',
                      'title' => 'Index of Works & Design Archives',
                      'items' => [
                        [
                          'title' => 'Kunsthalle Zurich Identity',
                          'description' => 'Complete institutional identity, exhibition catalogues, and bespoke bilingual variable typeface.',
                          'client' => 'Kunsthalle Zurich',
                          'year' => '2025',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Swiss Rail Environmental Signage',
                          'description' => 'Wayfinding and spatial information architecture for transit nodes across 24 regional stations.',
                          'client' => 'Federal Transport Directorate',
                          'year' => '2024',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Monograph on Architectural Form',
                          'description' => '420-page hardcover publication documenting mid-century brutalism across alpine valleys.',
                          'client' => 'Lars Müller Publishers',
                          'year' => '2024',
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_swiss',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Direct Commission Inquiries',
                      'subtitle' => 'Inquiries for select cultural branding, publishing monographs, and environmental systems.',
                      'email' => 'studio@maximebernard.ch',
                      'location' => 'Zurich, Switzerland',
                      'availability' => 'Booking Commissions for Autumn 2026'
                    ]
                  ],
                  [
                    'id' => 'footer_swiss',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Maxime Bernard. All rights reserved. Strict typographic grid compliance.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#f4f4f2',
                  'textColor' => '#0a0a0a',
                  'primaryColor' => '#ff3b00',
                  'secondaryColor' => '#111111',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#000000',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.3',
                  'lineHeightBody' => '1.8',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '0px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_swiss',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'فهد الشريف / 01',
                      'ctaText' => 'فهرس الأعمال والتكليفات',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'hero_swiss',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'swiss',
                      'indexNum' => '01 / الهوية ونظام الشبكات',
                      'title' => 'فهد الشريف',
                      'subtitle' => 'نظم الهوية البصرية الصارمة وهندسة المعلومات الدقيقة',
                      'description' => 'بناء نظم طباعية منضبطة، وهويات مؤسسية متكاملة، وأنظمة إرشاد بياني مكاني تعتمد على النظام الشبكي السويسري الصارم.
الشكل يتبع الوضوح المعلوماتي التام بلا أي مساومة.',
                      'metadataLine1' => 'الهوية البصرية والطباعة البيئية المكانية',
                      'metadataLine2' => 'الرياض وزيورخ · تكليفات مختارة ومشاريع ثقافية',
                      'primaryButtonText' => 'استعراض فهرس الأعمال',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'طلب تكليف وتواصل',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_swiss',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'swiss',
                      'title' => 'فهرس الأعمال وأرشيف المشاريع',
                      'items' => [
                        [
                          'title' => 'هوية بينالي الرياض للتصميم المعماري',
                          'description' => 'بناء هوية مؤسسية شاملة، وكتب المعارض، وخط طباعي عربي-لاتيني متغير مخصص للفعاليات الثقافية.',
                          'client' => 'هيئة الفنون البصرية',
                          'year' => '2025',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'نظام الإرشادات والتوجيه المكاني للقطارات',
                          'description' => 'هندسة المعلومات المكانية وعلامات التوجيه والخرائط لـ 24 محطة نقل إقليمية حديثة.',
                          'client' => 'هيئة النقل العام',
                          'year' => '2024',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'كتاب دراسات العمارة الخرسانية النجدية',
                          'description' => 'إصدار كتاب فني فاخر من 420 صفحة يوثق العمارة الحديثة وتفاعلها مع الضوء والظل في الصحراء.',
                          'client' => 'دار النشر الثقافي',
                          'year' => '2024',
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_swiss',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'طلبات التكليف والاستشارات البصرية',
                      'subtitle' => 'أستقبل الاستفسارات الخاصة بتصميم الهويات الثقافية الكبرى، والكتب الفنية، وأنظمة التوجيه المكاني.',
                      'email' => 'studio@fahadalshareef.com',
                      'location' => 'الرياض، المملكة العربية السعودية',
                      'availability' => 'الحجز متاح لمشاريع الربع الثالث والربع الرابع 2026'
                    ]
                  ],
                  [
                    'id' => 'footer_swiss',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 فهد الشريف. جميع الحقوق محفوظة. التزام تام بقواعد الشبكة الطباعية.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#f4f4f2',
              'textColor' => '#0a0a0a',
              'primaryColor' => '#ff3b00',
              'secondaryColor' => '#111111',
              'cardBg' => '#ffffff',
              'cardBorder' => '#000000',
              'headingFont' => 'Space Grotesk',
              'bodyFont' => 'Inter',
              'lineHeightHeading' => '1.15',
              'lineHeightBody' => '1.6',
              'letterSpacingHeading' => '-0.03em',
              'borderRadius' => '0px',
              'containerWidth' => 'max-w-6xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_swiss',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'MAXIME BERNARD / 01',
                  'ctaText' => 'INDEX & COMMISSIONS',
                  'ctaLink' => '#projects'
                ]
              ],
              [
                'id' => 'hero_swiss',
                'type' => 'hero',
                'props' => [
                  'variant' => 'swiss',
                  'indexNum' => '01 / IDENTITY & CATALOG',
                  'title' => 'Maxime Bernard',
                  'subtitle' => 'Objective Visual Systems & Information Architecture',
                  'description' => 'Constructing disciplined typographical structures, brand identities, and spatial signage systems grounded in the Zurich graphic design canon.
Form follows informational clarity.',
                  'metadataLine1' => 'Brand Systems & Environmental Typography',
                  'metadataLine2' => 'Basel & Zurich · Selective Global Commissions',
                  'primaryButtonText' => 'Explore Works',
                  'primaryButtonLink' => '#projects',
                  'secondaryButtonText' => 'Direct Contact',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'proj_swiss',
                'type' => 'projects',
                'props' => [
                  'variant' => 'swiss',
                  'title' => 'Index of Works & Design Archives',
                  'items' => [
                    [
                      'title' => 'Kunsthalle Zurich Identity',
                      'description' => 'Complete institutional identity, exhibition catalogues, and bespoke bilingual variable typeface.',
                      'client' => 'Kunsthalle Zurich',
                      'year' => '2025',
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'Swiss Rail Environmental Signage',
                      'description' => 'Wayfinding and spatial information architecture for transit nodes across 24 regional stations.',
                      'client' => 'Federal Transport Directorate',
                      'year' => '2024',
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'Monograph on Architectural Form',
                      'description' => '420-page hardcover publication documenting mid-century brutalism across alpine valleys.',
                      'client' => 'Lars Müller Publishers',
                      'year' => '2024',
                      'liveUrl' => '#'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_swiss',
                'type' => 'contact',
                'props' => [
                  'title' => 'Direct Commission Inquiries',
                  'subtitle' => 'Inquiries for select cultural branding, publishing monographs, and environmental systems.',
                  'email' => 'studio@maximebernard.ch',
                  'location' => 'Zurich, Switzerland',
                  'availability' => 'Booking Commissions for Autumn 2026'
                ]
              ],
              [
                'id' => 'footer_swiss',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Maxime Bernard. All rights reserved. Strict typographic grid compliance.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#f4f4f2',
                'textColor' => '#0a0a0a',
                'primaryColor' => '#ff3b00',
                'secondaryColor' => '#111111',
                'cardBg' => '#ffffff',
                'cardBorder' => '#000000',
                'headingFont' => 'Space Grotesk',
                'bodyFont' => 'Inter',
                'lineHeightHeading' => '1.15',
                'lineHeightBody' => '1.6',
                'letterSpacingHeading' => '-0.03em',
                'borderRadius' => '0px',
                'containerWidth' => 'max-w-6xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_swiss',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'MAXIME BERNARD / 01',
                    'ctaText' => 'INDEX & COMMISSIONS',
                    'ctaLink' => '#projects'
                  ]
                ],
                [
                  'id' => 'hero_swiss',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'swiss',
                    'indexNum' => '01 / IDENTITY & CATALOG',
                    'title' => 'Maxime Bernard',
                    'subtitle' => 'Objective Visual Systems & Information Architecture',
                    'description' => 'Constructing disciplined typographical structures, brand identities, and spatial signage systems grounded in the Zurich graphic design canon.
Form follows informational clarity.',
                    'metadataLine1' => 'Brand Systems & Environmental Typography',
                    'metadataLine2' => 'Basel & Zurich · Selective Global Commissions',
                    'primaryButtonText' => 'Explore Works',
                    'primaryButtonLink' => '#projects',
                    'secondaryButtonText' => 'Direct Contact',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'proj_swiss',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'swiss',
                    'title' => 'Index of Works & Design Archives',
                    'items' => [
                      [
                        'title' => 'Kunsthalle Zurich Identity',
                        'description' => 'Complete institutional identity, exhibition catalogues, and bespoke bilingual variable typeface.',
                        'client' => 'Kunsthalle Zurich',
                        'year' => '2025',
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'Swiss Rail Environmental Signage',
                        'description' => 'Wayfinding and spatial information architecture for transit nodes across 24 regional stations.',
                        'client' => 'Federal Transport Directorate',
                        'year' => '2024',
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'Monograph on Architectural Form',
                        'description' => '420-page hardcover publication documenting mid-century brutalism across alpine valleys.',
                        'client' => 'Lars Müller Publishers',
                        'year' => '2024',
                        'liveUrl' => '#'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_swiss',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Direct Commission Inquiries',
                    'subtitle' => 'Inquiries for select cultural branding, publishing monographs, and environmental systems.',
                    'email' => 'studio@maximebernard.ch',
                    'location' => 'Zurich, Switzerland',
                    'availability' => 'Booking Commissions for Autumn 2026'
                  ]
                ],
                [
                  'id' => 'footer_swiss',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Maxime Bernard. All rights reserved. Strict typographic grid compliance.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'kinfolk-editorial',
            'name' => 'Kinfolk Editorial Magazine',
            'name_ar' => 'مجلة كينفولك التحريرية الراقية',
            'category' => 'Designer',
            'description' => 'Luxury editorial magazine aesthetic with Playfair Display serif, curated essays, and warm linen warmth.',
            'description_ar' => 'أسلوب تحريري فاخر للعلامات الثقافية والمصممين مع خطوط سيريف ملكية ومقالات نقدية وألوان الكتان الهادئة.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#fbfaf8',
                  'textColor' => '#1a1917',
                  'primaryColor' => '#9e5a3f',
                  'secondaryColor' => '#5c554e',
                  'cardBg' => '#ffffff',
                  'cardBorder' => 'rgba(0,0,0,0.06)',
                  'headingFont' => 'Playfair Display',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.2',
                  'lineHeightBody' => '1.75',
                  'letterSpacingHeading' => '-0.01em',
                  'borderRadius' => '2px',
                  'containerWidth' => 'max-w-5xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_edit',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'ELEANOR VANCE · STUDIO',
                      'ctaText' => 'Commission Essay',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_edit',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'editorial',
                      'editorialMeta' => 'ISSUE Nº 14 · ESSAYS ON FORM & MATERIAL',
                      'title' => 'Eleanor Vance',
                      'subtitle' => 'Creative Director & Cultural Editorialist',
                      'editorialQuote' => 'Design is not what is added, but what remains when all vanity has been thoughtfully pared away.',
                      'description' => 'Curating quiet brand narratives, tactile publications, and architectural spatial identities for discerning fashion, hospitality, and cultural institutions worldwide.',
                      'primaryButtonText' => 'Read Selected Works',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Studio Correspondence',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_edit',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'editorial',
                      'title' => 'Curated Case Studies & Publications',
                      'items' => [
                        [
                          'title' => 'The Linen & Concrete Studies',
                          'description' => 'A two-year documentary archive exploring vernacular concrete architecture across Mediterranean coastlines and handcrafted textile ateliers.',
                          'client' => 'Cereal & Atelier Dinand',
                          'year' => '2025',
                          'imageUrl' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?w=800&auto=format&fit=crop&q=80',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'A Taxonomy of Quiet Spaces',
                          'description' => 'Hardcover publication investigating acoustic silence, natural linen filtration, and shadow choreography in historic Japanese residences.',
                          'client' => 'Torin Architectural Press',
                          'year' => '2024',
                          'imageUrl' => 'https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?w=800&auto=format&fit=crop&q=80',
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_edit',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Studio Correspondence',
                      'subtitle' => 'Available for selective creative direction commissions, monograph editing, and exhibition essays.',
                      'email' => 'eleanor@vance-studio.com',
                      'location' => 'Paris & Copenhagen',
                      'availability' => 'Accepting 2026/2027 Editorial Retainers'
                    ]
                  ],
                  [
                    'id' => 'footer_edit',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Eleanor Vance. All rights reserved. Printed with sustainable vegetable inks.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#fbfaf8',
                  'textColor' => '#1a1917',
                  'primaryColor' => '#9e5a3f',
                  'secondaryColor' => '#5c554e',
                  'cardBg' => '#ffffff',
                  'cardBorder' => 'rgba(0,0,0,0.06)',
                  'headingFont' => 'Amiri',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.35',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '2px',
                  'containerWidth' => 'max-w-5xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_edit',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'نورة السعد · استوديو النشر',
                      'ctaText' => 'طلب استشارة تحريرية',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_edit',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'editorial',
                      'editorialMeta' => 'العدد الرابع عشر · دراسات في الشكل والضوء والمادة',
                      'title' => 'نورة السعد',
                      'subtitle' => 'مديرة إبداعية وباحثة في السرديات البصرية والكتب الفنية',
                      'editorialQuote' => 'التصميم الحقيقي ليس ما تضيفه للعمل، بل ما يتبقى حين تتخلى عن كل ما هو زائد ومبتذل.',
                      'description' => 'صناعة السرديات الهادئة للعلامات الثقافية، وتحرير الكتب الفنية، وتنسيق المعارض التراثية بتركيز عميق على جماليات الحرف والورق والضوء الطبيعي.',
                      'primaryButtonText' => 'قراءة دراسات الحالة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'المراسلة والاستشارات',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_edit',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'editorial',
                      'title' => 'دراسات الحالة والإصدارات الفنية',
                      'items' => [
                        [
                          'title' => 'دراسات الكتان والخرسانة والمعمار',
                          'description' => 'أرشيف توثيقي استمر لعامين يستكشف التفاعل بين العمارة التراثية الحجرية ومنسوجات الكتان اليدوية في واحات الجزيرة العربية.',
                          'client' => 'مؤسسة بينالي الدرعية',
                          'year' => '2025',
                          'imageUrl' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?w=800&auto=format&fit=crop&q=80',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'فلسفة الفراغات الهادئة في البيت النجد',
                          'description' => 'إصدار كتاب فني فاخر يوثق مسارات الهواء وتدرجات الظل والملمس الطيني في بيوت الطين التاريخية وأثرها في السكينة النفسية.',
                          'client' => 'دار النشر التراثي',
                          'year' => '2024',
                          'imageUrl' => 'https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?w=800&auto=format&fit=crop&q=80',
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_edit',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'مراسلات الاستوديو والتكليف',
                      'subtitle' => 'متاحة للتكليفات الإبداعية المختارة، وتحرير الكتب والمونوغرافات الفنية، وتنسيق المعارض.',
                      'email' => 'noura@alsaad-studio.com',
                      'location' => 'الرياض وباريس · استوديو دولي',
                      'availability' => 'الحجز متاح لمشاريع عام 2026'
                    ]
                  ],
                  [
                    'id' => 'footer_edit',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 نورة السعد. جميع الحقوق محفوظة. طُبع بأحبار نباتية مستدامة.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#fbfaf8',
              'textColor' => '#1a1917',
              'primaryColor' => '#9e5a3f',
              'secondaryColor' => '#5c554e',
              'cardBg' => '#ffffff',
              'cardBorder' => 'rgba(0,0,0,0.06)',
              'headingFont' => 'Playfair Display',
              'bodyFont' => 'Inter',
              'lineHeightHeading' => '1.2',
              'lineHeightBody' => '1.75',
              'letterSpacingHeading' => '-0.01em',
              'borderRadius' => '2px',
              'containerWidth' => 'max-w-5xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_edit',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'ELEANOR VANCE · STUDIO',
                  'ctaText' => 'Commission Essay',
                  'ctaLink' => '#contact'
                ]
              ],
              [
                'id' => 'hero_edit',
                'type' => 'hero',
                'props' => [
                  'variant' => 'editorial',
                  'editorialMeta' => 'ISSUE Nº 14 · ESSAYS ON FORM & MATERIAL',
                  'title' => 'Eleanor Vance',
                  'subtitle' => 'Creative Director & Cultural Editorialist',
                  'editorialQuote' => 'Design is not what is added, but what remains when all vanity has been thoughtfully pared away.',
                  'description' => 'Curating quiet brand narratives, tactile publications, and architectural spatial identities for discerning fashion, hospitality, and cultural institutions worldwide.',
                  'primaryButtonText' => 'Read Selected Works',
                  'primaryButtonLink' => '#projects',
                  'secondaryButtonText' => 'Studio Correspondence',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'proj_edit',
                'type' => 'projects',
                'props' => [
                  'variant' => 'editorial',
                  'title' => 'Curated Case Studies & Publications',
                  'items' => [
                    [
                      'title' => 'The Linen & Concrete Studies',
                      'description' => 'A two-year documentary archive exploring vernacular concrete architecture across Mediterranean coastlines and handcrafted textile ateliers.',
                      'client' => 'Cereal & Atelier Dinand',
                      'year' => '2025',
                      'imageUrl' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?w=800&auto=format&fit=crop&q=80',
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'A Taxonomy of Quiet Spaces',
                      'description' => 'Hardcover publication investigating acoustic silence, natural linen filtration, and shadow choreography in historic Japanese residences.',
                      'client' => 'Torin Architectural Press',
                      'year' => '2024',
                      'imageUrl' => 'https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?w=800&auto=format&fit=crop&q=80',
                      'liveUrl' => '#'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_edit',
                'type' => 'contact',
                'props' => [
                  'title' => 'Studio Correspondence',
                  'subtitle' => 'Available for selective creative direction commissions, monograph editing, and exhibition essays.',
                  'email' => 'eleanor@vance-studio.com',
                  'location' => 'Paris & Copenhagen',
                  'availability' => 'Accepting 2026/2027 Editorial Retainers'
                ]
              ],
              [
                'id' => 'footer_edit',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Eleanor Vance. All rights reserved. Printed with sustainable vegetable inks.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#fbfaf8',
                'textColor' => '#1a1917',
                'primaryColor' => '#9e5a3f',
                'secondaryColor' => '#5c554e',
                'cardBg' => '#ffffff',
                'cardBorder' => 'rgba(0,0,0,0.06)',
                'headingFont' => 'Playfair Display',
                'bodyFont' => 'Inter',
                'lineHeightHeading' => '1.2',
                'lineHeightBody' => '1.75',
                'letterSpacingHeading' => '-0.01em',
                'borderRadius' => '2px',
                'containerWidth' => 'max-w-5xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_edit',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'ELEANOR VANCE · STUDIO',
                    'ctaText' => 'Commission Essay',
                    'ctaLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'hero_edit',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'editorial',
                    'editorialMeta' => 'ISSUE Nº 14 · ESSAYS ON FORM & MATERIAL',
                    'title' => 'Eleanor Vance',
                    'subtitle' => 'Creative Director & Cultural Editorialist',
                    'editorialQuote' => 'Design is not what is added, but what remains when all vanity has been thoughtfully pared away.',
                    'description' => 'Curating quiet brand narratives, tactile publications, and architectural spatial identities for discerning fashion, hospitality, and cultural institutions worldwide.',
                    'primaryButtonText' => 'Read Selected Works',
                    'primaryButtonLink' => '#projects',
                    'secondaryButtonText' => 'Studio Correspondence',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'proj_edit',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'editorial',
                    'title' => 'Curated Case Studies & Publications',
                    'items' => [
                      [
                        'title' => 'The Linen & Concrete Studies',
                        'description' => 'A two-year documentary archive exploring vernacular concrete architecture across Mediterranean coastlines and handcrafted textile ateliers.',
                        'client' => 'Cereal & Atelier Dinand',
                        'year' => '2025',
                        'imageUrl' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?w=800&auto=format&fit=crop&q=80',
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'A Taxonomy of Quiet Spaces',
                        'description' => 'Hardcover publication investigating acoustic silence, natural linen filtration, and shadow choreography in historic Japanese residences.',
                        'client' => 'Torin Architectural Press',
                        'year' => '2024',
                        'imageUrl' => 'https://images.unsplash.com/photo-1494438639946-1ebd1d20bf85?w=800&auto=format&fit=crop&q=80',
                        'liveUrl' => '#'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_edit',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Studio Correspondence',
                    'subtitle' => 'Available for selective creative direction commissions, monograph editing, and exhibition essays.',
                    'email' => 'eleanor@vance-studio.com',
                    'location' => 'Paris & Copenhagen',
                    'availability' => 'Accepting 2026/2027 Editorial Retainers'
                  ]
                ],
                [
                  'id' => 'footer_edit',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Eleanor Vance. All rights reserved. Printed with sustainable vegetable inks.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'al-khattat-arabic',
            'name' => 'Al-Khattat Arabic Heritage',
            'name_ar' => 'الخطاط للهوية والطباعة العربية المعاصرة',
            'category' => 'Designer',
            'description' => 'Majestic native Arabic typography celebrating classical calligraphic geometry and contemporary basalt-and-gold identity.',
            'description_ar' => 'تصميم عربي أصيل يحتفي بالهندسة الطباعية العربية والخط الكلاسيكي بألوان البازلت الأسود والذهب النجدي الملكي.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0c0f17',
                  'textColor' => '#f1f5f9',
                  'primaryColor' => '#f59e0b',
                  'secondaryColor' => '#d97706',
                  'cardBg' => '#141a29',
                  'cardBorder' => 'rgba(245,158,11,0.2)',
                  'headingFont' => 'Cinzel',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.65',
                  'letterSpacingHeading' => '0.02em',
                  'borderRadius' => '10px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_arab',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'AL-FUHAID CALLIGRAPHY',
                      'ctaText' => 'Royal Commissions',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_arab',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'arabic-hero',
                      'badge' => 'CONTEMPORARY ARABIC TYPOGRAPHY & IDENTITY',
                      'title' => 'Abdulrahman Al-Fuhaid',
                      'subtitle' => 'Master Calligrapher & Sovereign Identity Architect',
                      'description' => 'Harmonizing the sacred geometry of classic Thuluth and Kufic calligraphy with modern computational typography to craft enduring cultural brand identities across the Arabian Peninsula.',
                      'primaryButtonText' => 'View Royal Inscriptions',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Commission Work',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_arab',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'bento',
                      'title' => 'Inscriptions, Typefaces & Cultural Identities',
                      'items' => [
                        [
                          'title' => 'Diriyah Museum Royal Inscriptions',
                          'description' => 'Monumental architectural stone engravings and monumental Kufic inscriptions commissioned for historical galleries.',
                          'tags' => [
                            'Monumental Kufic',
                            'Stone Relief',
                            'Diriyah Gate'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Al-Fuhaid Display Typeface Family',
                          'description' => '9-weight variable Arabic font family synthesized from 17th century Quranic manuscripts with full OpenType ligature support.',
                          'tags' => [
                            'Variable Font',
                            'Arabic Typography',
                            'FontLab'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_arab',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Royal & Cultural Inquiries',
                      'subtitle' => 'Inquiries for cultural landmarks, state emblems, monumental letterings, and custom font foundry licenses.',
                      'email' => 'fuhaid@calligraphy.sa',
                      'location' => 'Riyadh, Kingdom of Saudi Arabia',
                      'availability' => 'Available for Major Cultural Commissions'
                    ]
                  ],
                  [
                    'id' => 'footer_arab',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Abdulrahman Al-Fuhaid. Preserving the beauty of Arabic letters.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0c0f17',
                  'textColor' => '#f1f5f9',
                  'primaryColor' => '#f59e0b',
                  'secondaryColor' => '#d97706',
                  'cardBg' => '#141a29',
                  'cardBorder' => 'rgba(245,158,11,0.2)',
                  'headingFont' => 'Amiri',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.35',
                  'lineHeightBody' => '1.9',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '10px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_arab',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'دار عبد الرحمن الفهيد للحرف',
                      'ctaText' => 'تكليفات الهوية والخط',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_arab',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'arabic-hero',
                      'badge' => 'الهوية البصرية والطباعة العربية المعاصرة',
                      'title' => 'عبد الرحمن الفهيد',
                      'subtitle' => 'خطاط ومصمم خطوط طباعية ومعمار هوية بصرية',
                      'description' => 'نجمع بين الهندسة المقدسة للخط العربي الكلاسيكي وأحدث علوم البرمجة الطباعية الرقمية، لنبتكر هويات بصرية ملكية وخطوطاً طباعية تعكس عمق الثقافة العربية وأناقتها الخالدة.',
                      'primaryButtonText' => 'استعراض النقوش والأعمال',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'طلب تكليف واستشارة',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_arab',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'bento',
                      'title' => 'النقوش والخطوط والهويات الثقافية',
                      'items' => [
                        [
                          'title' => 'نقوش متحف بوابة الدرعية الكبرى',
                          'description' => 'جداريات معمارية محفورة على الحجر الطبيعي ونقوش كوفية نجدية صُممت خصيصاً للقاعات التاريخية والمعارض الوطنية الكبرى.',
                          'tags' => [
                            'الخط الكوفي',
                            'نحت حجري',
                            'بوابة الدرعية'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'عائلة خط الفهيد الطباعي المتغير',
                          'description' => 'عائلة خطوط عربية رقمية متغيرة بـ 9 أوزان مستوحاة من مصاحف القرن الحادي عشر الهجري مع دعم كامل لأكثر من 400 وصلة طباعية بديعة.',
                          'tags' => [
                            'خط متغير',
                            'طباعة عربية',
                            'برمجة الخطوط'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_arab',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التكليفات الثقافية والرسمية',
                      'subtitle' => 'يسعدني استقبال طلبات المعالم الثقافية، وشعارات الدولة، والنقوش المعمارية، وتراخيص الخطوط المخصصة.',
                      'email' => 'fuhaid@calligraphy.sa',
                      'location' => 'الرياض، المملكة العربية السعودية',
                      'availability' => 'متاح للمشاريع الثقافية الوطنية الكبرى'
                    ]
                  ],
                  [
                    'id' => 'footer_arab',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 عبد الرحمن الفهيد. صوناً لجلال الحرف العربي وبهاء حضارته.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#0c0f17',
              'textColor' => '#f1f5f9',
              'primaryColor' => '#f59e0b',
              'secondaryColor' => '#d97706',
              'cardBg' => '#141a29',
              'cardBorder' => 'rgba(245,158,11,0.2)',
              'headingFont' => 'Cinzel',
              'bodyFont' => 'Inter',
              'lineHeightHeading' => '1.25',
              'lineHeightBody' => '1.65',
              'letterSpacingHeading' => '0.02em',
              'borderRadius' => '10px',
              'containerWidth' => 'max-w-6xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_arab',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'AL-FUHAID CALLIGRAPHY',
                  'ctaText' => 'Royal Commissions',
                  'ctaLink' => '#contact'
                ]
              ],
              [
                'id' => 'hero_arab',
                'type' => 'hero',
                'props' => [
                  'variant' => 'arabic-hero',
                  'badge' => 'CONTEMPORARY ARABIC TYPOGRAPHY & IDENTITY',
                  'title' => 'Abdulrahman Al-Fuhaid',
                  'subtitle' => 'Master Calligrapher & Sovereign Identity Architect',
                  'description' => 'Harmonizing the sacred geometry of classic Thuluth and Kufic calligraphy with modern computational typography to craft enduring cultural brand identities across the Arabian Peninsula.',
                  'primaryButtonText' => 'View Royal Inscriptions',
                  'primaryButtonLink' => '#projects',
                  'secondaryButtonText' => 'Commission Work',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'proj_arab',
                'type' => 'projects',
                'props' => [
                  'variant' => 'bento',
                  'title' => 'Inscriptions, Typefaces & Cultural Identities',
                  'items' => [
                    [
                      'title' => 'Diriyah Museum Royal Inscriptions',
                      'description' => 'Monumental architectural stone engravings and monumental Kufic inscriptions commissioned for historical galleries.',
                      'tags' => [
                        'Monumental Kufic',
                        'Stone Relief',
                        'Diriyah Gate'
                      ],
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'Al-Fuhaid Display Typeface Family',
                      'description' => '9-weight variable Arabic font family synthesized from 17th century Quranic manuscripts with full OpenType ligature support.',
                      'tags' => [
                        'Variable Font',
                        'Arabic Typography',
                        'FontLab'
                      ],
                      'liveUrl' => '#'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_arab',
                'type' => 'contact',
                'props' => [
                  'title' => 'Royal & Cultural Inquiries',
                  'subtitle' => 'Inquiries for cultural landmarks, state emblems, monumental letterings, and custom font foundry licenses.',
                  'email' => 'fuhaid@calligraphy.sa',
                  'location' => 'Riyadh, Kingdom of Saudi Arabia',
                  'availability' => 'Available for Major Cultural Commissions'
                ]
              ],
              [
                'id' => 'footer_arab',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Abdulrahman Al-Fuhaid. Preserving the beauty of Arabic letters.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#0c0f17',
                'textColor' => '#f1f5f9',
                'primaryColor' => '#f59e0b',
                'secondaryColor' => '#d97706',
                'cardBg' => '#141a29',
                'cardBorder' => 'rgba(245,158,11,0.2)',
                'headingFont' => 'Cinzel',
                'bodyFont' => 'Inter',
                'lineHeightHeading' => '1.25',
                'lineHeightBody' => '1.65',
                'letterSpacingHeading' => '0.02em',
                'borderRadius' => '10px',
                'containerWidth' => 'max-w-6xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_arab',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'AL-FUHAID CALLIGRAPHY',
                    'ctaText' => 'Royal Commissions',
                    'ctaLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'hero_arab',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'arabic-hero',
                    'badge' => 'CONTEMPORARY ARABIC TYPOGRAPHY & IDENTITY',
                    'title' => 'Abdulrahman Al-Fuhaid',
                    'subtitle' => 'Master Calligrapher & Sovereign Identity Architect',
                    'description' => 'Harmonizing the sacred geometry of classic Thuluth and Kufic calligraphy with modern computational typography to craft enduring cultural brand identities across the Arabian Peninsula.',
                    'primaryButtonText' => 'View Royal Inscriptions',
                    'primaryButtonLink' => '#projects',
                    'secondaryButtonText' => 'Commission Work',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'proj_arab',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'bento',
                    'title' => 'Inscriptions, Typefaces & Cultural Identities',
                    'items' => [
                      [
                        'title' => 'Diriyah Museum Royal Inscriptions',
                        'description' => 'Monumental architectural stone engravings and monumental Kufic inscriptions commissioned for historical galleries.',
                        'tags' => [
                          'Monumental Kufic',
                          'Stone Relief',
                          'Diriyah Gate'
                        ],
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'Al-Fuhaid Display Typeface Family',
                        'description' => '9-weight variable Arabic font family synthesized from 17th century Quranic manuscripts with full OpenType ligature support.',
                        'tags' => [
                          'Variable Font',
                          'Arabic Typography',
                          'FontLab'
                        ],
                        'liveUrl' => '#'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_arab',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Royal & Cultural Inquiries',
                    'subtitle' => 'Inquiries for cultural landmarks, state emblems, monumental letterings, and custom font foundry licenses.',
                    'email' => 'fuhaid@calligraphy.sa',
                    'location' => 'Riyadh, Kingdom of Saudi Arabia',
                    'availability' => 'Available for Major Cultural Commissions'
                  ]
                ],
                [
                  'id' => 'footer_arab',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Abdulrahman Al-Fuhaid. Preserving the beauty of Arabic letters.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'visual-gallery',
            'name' => 'Visual Gallery & Cinema',
            'name_ar' => 'معرض التصوير البصري والسينمائي',
            'category' => 'Designer',
            'description' => 'Dark cinematic masonry gallery displaying camera optics, EXIF parameters, and 35mm photo essays.',
            'description_ar' => 'معرض سينمائي داكن يبرز تفاصيل العدسات والبيانات البصرية (EXIF) والمقالات المصورة الفوتوغرافية.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#08080a',
                  'textColor' => '#ffffff',
                  'primaryColor' => '#ffffff',
                  'secondaryColor' => '#94a3b8',
                  'cardBg' => '#121216',
                  'cardBorder' => 'rgba(255,255,255,0.08)',
                  'headingFont' => 'Space Grotesk',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.2',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '8px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_gal',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'KAREEM AL-HASSAN · 35MM',
                      'ctaText' => 'View Archives',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'hero_gal',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'gallery',
                      'badge' => '35MM ANALOG & DIGITAL CINEMA · RIYADH & REYKJAVIK',
                      'title' => 'Kareem Al-Hassan',
                      'subtitle' => 'Documentary Photographer & Visual Director',
                      'description' => 'Documenting fleeting atmospheric light, brutalist architectural monoliths, and medium format portraits across the Arabian peninsula and volcanic North Atlantic.',
                      'primaryButtonText' => 'Open Photo Essays',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Print Sales & Inquiries',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_gal',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'gallery',
                      'title' => 'Selected Photographic Essays',
                      'items' => [
                        [
                          'title' => 'Empty Quarter Dune Monoliths',
                          'imageUrl' => 'https://images.unsplash.com/photo-1509316975850-ff9c5deb0cd9?w=800&auto=format&fit=crop&q=80',
                          'camera' => 'Leica M11 Rangefinder',
                          'lens' => '35mm Summilux-M f/1.4 ASPH',
                          'settings' => '1/1000s · f/5.6 · ISO 64',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Reykjavik Geothermal Brutalism',
                          'imageUrl' => 'https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=800&auto=format&fit=crop&q=80',
                          'camera' => 'Hasselblad 907X 50C',
                          'lens' => 'XCD 45mm f/4 P',
                          'settings' => '1/250s · f/8 · ISO 100',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Old Diriyah Shadow Choreography',
                          'imageUrl' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=800&auto=format&fit=crop&q=80',
                          'camera' => 'Leica M11 Monochrom',
                          'lens' => '50mm Noctilux-M f/0.95',
                          'settings' => '1/4000s · f/1.2 · ISO 125',
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_gal',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Print Acquisitions & Assignments',
                      'subtitle' => 'Represented for editorial commissions, limited archival prints, and cinematography direction.',
                      'email' => 'kareem@alhassan-visuals.com',
                      'location' => 'Riyadh & London',
                      'availability' => 'Accepting Select Q3/Q4 Location Assignments'
                    ]
                  ],
                  [
                    'id' => 'footer_gal',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Kareem Al-Hassan. All photographs copyrighted.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#08080a',
                  'textColor' => '#ffffff',
                  'primaryColor' => '#ffffff',
                  'secondaryColor' => '#94a3b8',
                  'cardBg' => '#121216',
                  'cardBorder' => 'rgba(255,255,255,0.08)',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.35',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '8px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_gal',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'كريم الحسن · أرشيف 35 ملم',
                      'ctaText' => 'معرض الصور المطبوعة',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'hero_gal',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'gallery',
                      'badge' => 'تصوير فيلمي وسينمائي 35 ملم · الرياض وريكيافيك',
                      'title' => 'كريم الحسن',
                      'subtitle' => 'مصور توثيقي وباحث بصري في الضوء والعمارة المكانية',
                      'description' => 'توثيق الضوء الطبيعي الخاطف، والكتل المعمارية الخرسانية الضخمة، والوجوه الإنسانية عبر عدسات الميديوم فورمات بين صحاري الجزيرة العربية والشمال الأطلسي.',
                      'primaryButtonText' => 'استعراض المقالات المصورة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'اقتناء المطبوعات والتكليف',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_gal',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'gallery',
                      'title' => 'أبرز المقالات البصرية والمجموعات التوثيقية',
                      'items' => [
                        [
                          'title' => 'كثبان الربع الخالي وسكون الأفق',
                          'imageUrl' => 'https://images.unsplash.com/photo-1509316975850-ff9c5deb0cd9?w=800&auto=format&fit=crop&q=80',
                          'camera' => 'كاميرا لايكا M11 رينج فايندر',
                          'lens' => 'عدسة سوميلوكس 35 ملم f/1.4',
                          'settings' => 'سرعة 1/1000 ثانية · f/5.6 · آيزو 64',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'العمارة البركانية في ريكيافيك',
                          'imageUrl' => 'https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=800&auto=format&fit=crop&q=80',
                          'camera' => 'كاميرا هاسيلبلاد 907X ميديوم فورمات',
                          'lens' => 'عدسة XCD 45 ملم f/4',
                          'settings' => 'سرعة 1/250 ثانية · f/8 · آيزو 100',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'تدرجات الظل في الدرعية القديمة',
                          'imageUrl' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=800&auto=format&fit=crop&q=80',
                          'camera' => 'كاميرا لايكا M11 مونوكروم أبيض وأسود',
                          'lens' => 'عدسة نوكتيلوكس 50 ملم f/0.95',
                          'settings' => 'سرعة 1/4000 ثانية · f/1.2 · آيزو 125',
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_gal',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'اقتناء المطبوعات والتكليفات المصورة',
                      'subtitle' => 'متاح للتكليفات التحريرية العالمية، واقتناء النسخ الفنية المحدودة الموقعة، والإخراج السينمائي.',
                      'email' => 'kareem@alhassan-visuals.com',
                      'location' => 'الرياض ولندن · متواجد دولياً',
                      'availability' => 'الحجز متاح للتكليفات الميدانية للعام الجاري'
                    ]
                  ],
                  [
                    'id' => 'footer_gal',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 كريم الحسن. جميع الصور محمية بموجب حقوق الملكية الفكرية.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#08080a',
              'textColor' => '#ffffff',
              'primaryColor' => '#ffffff',
              'secondaryColor' => '#94a3b8',
              'cardBg' => '#121216',
              'cardBorder' => 'rgba(255,255,255,0.08)',
              'headingFont' => 'Space Grotesk',
              'bodyFont' => 'Inter',
              'lineHeightHeading' => '1.2',
              'lineHeightBody' => '1.6',
              'letterSpacingHeading' => '-0.02em',
              'borderRadius' => '8px',
              'containerWidth' => 'max-w-6xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_gal',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'KAREEM AL-HASSAN · 35MM',
                  'ctaText' => 'View Archives',
                  'ctaLink' => '#projects'
                ]
              ],
              [
                'id' => 'hero_gal',
                'type' => 'hero',
                'props' => [
                  'variant' => 'gallery',
                  'badge' => '35MM ANALOG & DIGITAL CINEMA · RIYADH & REYKJAVIK',
                  'title' => 'Kareem Al-Hassan',
                  'subtitle' => 'Documentary Photographer & Visual Director',
                  'description' => 'Documenting fleeting atmospheric light, brutalist architectural monoliths, and medium format portraits across the Arabian peninsula and volcanic North Atlantic.',
                  'primaryButtonText' => 'Open Photo Essays',
                  'primaryButtonLink' => '#projects',
                  'secondaryButtonText' => 'Print Sales & Inquiries',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'proj_gal',
                'type' => 'projects',
                'props' => [
                  'variant' => 'gallery',
                  'title' => 'Selected Photographic Essays',
                  'items' => [
                    [
                      'title' => 'Empty Quarter Dune Monoliths',
                      'imageUrl' => 'https://images.unsplash.com/photo-1509316975850-ff9c5deb0cd9?w=800&auto=format&fit=crop&q=80',
                      'camera' => 'Leica M11 Rangefinder',
                      'lens' => '35mm Summilux-M f/1.4 ASPH',
                      'settings' => '1/1000s · f/5.6 · ISO 64',
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'Reykjavik Geothermal Brutalism',
                      'imageUrl' => 'https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=800&auto=format&fit=crop&q=80',
                      'camera' => 'Hasselblad 907X 50C',
                      'lens' => 'XCD 45mm f/4 P',
                      'settings' => '1/250s · f/8 · ISO 100',
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'Old Diriyah Shadow Choreography',
                      'imageUrl' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=800&auto=format&fit=crop&q=80',
                      'camera' => 'Leica M11 Monochrom',
                      'lens' => '50mm Noctilux-M f/0.95',
                      'settings' => '1/4000s · f/1.2 · ISO 125',
                      'liveUrl' => '#'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_gal',
                'type' => 'contact',
                'props' => [
                  'title' => 'Print Acquisitions & Assignments',
                  'subtitle' => 'Represented for editorial commissions, limited archival prints, and cinematography direction.',
                  'email' => 'kareem@alhassan-visuals.com',
                  'location' => 'Riyadh & London',
                  'availability' => 'Accepting Select Q3/Q4 Location Assignments'
                ]
              ],
              [
                'id' => 'footer_gal',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Kareem Al-Hassan. All photographs copyrighted.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#08080a',
                'textColor' => '#ffffff',
                'primaryColor' => '#ffffff',
                'secondaryColor' => '#94a3b8',
                'cardBg' => '#121216',
                'cardBorder' => 'rgba(255,255,255,0.08)',
                'headingFont' => 'Space Grotesk',
                'bodyFont' => 'Inter',
                'lineHeightHeading' => '1.2',
                'lineHeightBody' => '1.6',
                'letterSpacingHeading' => '-0.02em',
                'borderRadius' => '8px',
                'containerWidth' => 'max-w-6xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_gal',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'KAREEM AL-HASSAN · 35MM',
                    'ctaText' => 'View Archives',
                    'ctaLink' => '#projects'
                  ]
                ],
                [
                  'id' => 'hero_gal',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'gallery',
                    'badge' => '35MM ANALOG & DIGITAL CINEMA · RIYADH & REYKJAVIK',
                    'title' => 'Kareem Al-Hassan',
                    'subtitle' => 'Documentary Photographer & Visual Director',
                    'description' => 'Documenting fleeting atmospheric light, brutalist architectural monoliths, and medium format portraits across the Arabian peninsula and volcanic North Atlantic.',
                    'primaryButtonText' => 'Open Photo Essays',
                    'primaryButtonLink' => '#projects',
                    'secondaryButtonText' => 'Print Sales & Inquiries',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'proj_gal',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'gallery',
                    'title' => 'Selected Photographic Essays',
                    'items' => [
                      [
                        'title' => 'Empty Quarter Dune Monoliths',
                        'imageUrl' => 'https://images.unsplash.com/photo-1509316975850-ff9c5deb0cd9?w=800&auto=format&fit=crop&q=80',
                        'camera' => 'Leica M11 Rangefinder',
                        'lens' => '35mm Summilux-M f/1.4 ASPH',
                        'settings' => '1/1000s · f/5.6 · ISO 64',
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'Reykjavik Geothermal Brutalism',
                        'imageUrl' => 'https://images.unsplash.com/photo-1504893524553-b855bce32c67?w=800&auto=format&fit=crop&q=80',
                        'camera' => 'Hasselblad 907X 50C',
                        'lens' => 'XCD 45mm f/4 P',
                        'settings' => '1/250s · f/8 · ISO 100',
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'Old Diriyah Shadow Choreography',
                        'imageUrl' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?w=800&auto=format&fit=crop&q=80',
                        'camera' => 'Leica M11 Monochrom',
                        'lens' => '50mm Noctilux-M f/0.95',
                        'settings' => '1/4000s · f/1.2 · ISO 125',
                        'liveUrl' => '#'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_gal',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Print Acquisitions & Assignments',
                    'subtitle' => 'Represented for editorial commissions, limited archival prints, and cinematography direction.',
                    'email' => 'kareem@alhassan-visuals.com',
                    'location' => 'Riyadh & London',
                    'availability' => 'Accepting Select Q3/Q4 Location Assignments'
                  ]
                ],
                [
                  'id' => 'footer_gal',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Kareem Al-Hassan. All photographs copyrighted.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'motion-director',
            'name' => '3D Spatial & Motion Director',
            'name_ar' => 'مخرج الحركة ثلاثية الأبعاد والمؤثرات المكانية',
            'category' => 'Designer',
            'description' => 'Obsidian black theme with glowing purple/cyan neon highlights, video reel showcase, and interactive 3D case studies.',
            'description_ar' => 'طابع داكن مستقبلي مع إضاءات نيون بنفسجية، استعراض لمقاطع الحركة، ومشاريع التصميم ثلاثي الأبعاد والسينمائي.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#070709',
                  'textColor' => '#f3f4f6',
                  'primaryColor' => '#a855f7',
                  'secondaryColor' => '#06b6d4',
                  'cardBg' => '#111116',
                  'cardBorder' => 'rgba(168, 85, 247, 0.2)',
                  'headingFont' => 'Space Grotesk',
                  'bodyFont' => 'Plus Jakarta Sans',
                  'lineHeightHeading' => '1.2',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '14px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_mot',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'KAIROS // MOTION',
                      'ctaText' => 'Play Showreel',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'hero_mot',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'motion',
                      'badge' => 'HOUDINI · UNREAL ENGINE 5 · OCTANE RENDER',
                      'title' => 'Sculpting Reality Through Kinetic Light & Spatial Motion',
                      'subtitle' => 'Creative Director, 3D Animator & Virtual Production Supervisor',
                      'description' => 'Specializing in cinematic worldbuilding, procedural physics simulations, and hyper-realistic product reveals for cutting-edge brands worldwide.',
                      'primaryButtonText' => 'Watch 2026 Showreel',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Commercial Credits',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_mot',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Featured Motion Campaigns',
                      'subtitle' => 'Simulations, kinetic title sequences, and commercial launches',
                      'columns' => 2,
                      'items' => [
                        [
                          'title' => 'Neo-Genesis Spatial Supercar Launch',
                          'description' => 'Full Unreal Engine 5 virtual production reveal with ray-traced aerodynamics and custom procedural lighting rig.',
                          'tags' => [
                            'Unreal Engine 5',
                            'Ray Tracing',
                            'Virtual Production'
                          ],
                          'liveUrl' => '#',
                          'imageUrl' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1200&q=80'
                        ],
                        [
                          'title' => 'Chronos Procedural Time Rift',
                          'description' => 'Complex particle dynamics simulation running 100M particles in Houdini with Vellum cloth collision.',
                          'tags' => [
                            'Houdini FX',
                            'Vellum',
                            'Particle Dynamics'
                          ],
                          'liveUrl' => '#',
                          'imageUrl' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=1200&q=80'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_mot',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Commission a Campaign',
                      'subtitle' => 'Available for direct agency commissions and executive VFX direction.',
                      'email' => 'kairos@motion-director.film',
                      'location' => 'Los Angeles · Tokyo · Remote Worldwide',
                      'availability' => 'Booking Q3 2026 Virtual Productions'
                    ]
                  ],
                  [
                    'id' => 'footer_mot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Kairos Motion Studio. Rendered at 4K 60fps.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#070709',
                  'textColor' => '#f3f4f6',
                  'primaryColor' => '#a855f7',
                  'secondaryColor' => '#06b6d4',
                  'cardBg' => '#111116',
                  'cardBorder' => 'rgba(168, 85, 247, 0.2)',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.35',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '14px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_mot',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'كايروس // إخراج سينمائي',
                      'ctaText' => 'مشاهدة ملخص الأعمال',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'hero_mot',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'motion',
                      'badge' => 'هوديني · أنريل إنجن 5 · أوكتان ريندر',
                      'title' => 'صياغة الواقع الافتراضي عبر الضوء الحركي والمؤثرات المكانية',
                      'subtitle' => 'مخرج إبداعي، محرك بصري ثلاثي الأبعاد، ومشرف إنتاج افتراضي',
                      'description' => 'متخصص في بناء العوالم السينمائية الافتراضية، ومحاكاة الفيزياء الإجرائية المعقدة، وعروض المنتجات المستقبلية للعلامات الرائدة.',
                      'primaryButtonText' => 'مشاهدة ملخص أعمال 2026',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'سجل الأعمال والجوائز',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_mot',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'حملات سينمائية ومشاريع ثلاثية الأبعاد',
                      'subtitle' => 'محاكاة فيزيائية، شارات سينمائية حركية، وإعلانات عالمية',
                      'columns' => 2,
                      'items' => [
                        [
                          'title' => 'إطلاق السيارة الخارقة الافتراضية Neo-Genesis',
                          'description' => 'عرض إنتاج افتراضي كامل بمحرك Unreal Engine 5 مع تتبع أشعة ديناميكي ومؤثرات هوائية مذهلة تحاكي تدفق الرياح.',
                          'tags' => [
                            'أنريل إنجن 5',
                            'تتبع الأشعة',
                            'إنتاج افتراضي'
                          ],
                          'liveUrl' => '#',
                          'imageUrl' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1200&q=80'
                        ],
                        [
                          'title' => 'محاكاة الصدع الزمني Chronos',
                          'description' => 'محاكاة جزيئية متقدمة عبر بيئة Houdini تضم أكثر من 100 مليون جزيء مع تفاعل فيزيائي دقيق للأنسجة.',
                          'tags' => [
                            'مؤثرات هوديني',
                            'محاكاة فيزيائية',
                            'ديناميكا الجزيئات'
                          ],
                          'liveUrl' => '#',
                          'imageUrl' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=1200&q=80'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_mot',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'طلب إنتاج حملة إعلانية',
                      'subtitle' => 'متاح لتعاقدات الوكالات الإعلانية الكبرى والإشراف الفني المباشر على الإنتاج.',
                      'email' => 'kairos@motion-director.film',
                      'location' => 'الرياض · لوس أنجلوس · العمل عن بعد',
                      'availability' => 'الحجز متاح لمشاريع الإنتاج الافتراضي للربع الثالث 2026'
                    ]
                  ],
                  [
                    'id' => 'footer_mot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 استوديو كايروس السينمائي. مخرج بأعلى دقة 4K بمعدل 60 إطاراً.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#070709',
              'textColor' => '#f3f4f6',
              'primaryColor' => '#a855f7',
              'secondaryColor' => '#06b6d4',
              'cardBg' => '#111116',
              'cardBorder' => 'rgba(168, 85, 247, 0.2)',
              'headingFont' => 'Space Grotesk',
              'bodyFont' => 'Plus Jakarta Sans',
              'lineHeightHeading' => '1.2',
              'lineHeightBody' => '1.6',
              'letterSpacingHeading' => '-0.02em',
              'borderRadius' => '14px',
              'containerWidth' => 'max-w-6xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_mot',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'KAIROS // MOTION',
                  'ctaText' => 'Play Showreel',
                  'ctaLink' => '#projects'
                ]
              ],
              [
                'id' => 'hero_mot',
                'type' => 'hero',
                'props' => [
                  'variant' => 'motion',
                  'badge' => 'HOUDINI · UNREAL ENGINE 5 · OCTANE RENDER',
                  'title' => 'Sculpting Reality Through Kinetic Light & Spatial Motion',
                  'subtitle' => 'Creative Director, 3D Animator & Virtual Production Supervisor',
                  'description' => 'Specializing in cinematic worldbuilding, procedural physics simulations, and hyper-realistic product reveals for cutting-edge brands worldwide.',
                  'primaryButtonText' => 'Watch 2026 Showreel',
                  'primaryButtonLink' => '#projects',
                  'secondaryButtonText' => 'Commercial Credits',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'proj_mot',
                'type' => 'projects',
                'props' => [
                  'variant' => 'grid',
                  'title' => 'Featured Motion Campaigns',
                  'subtitle' => 'Simulations, kinetic title sequences, and commercial launches',
                  'columns' => 2,
                  'items' => [
                    [
                      'title' => 'Neo-Genesis Spatial Supercar Launch',
                      'description' => 'Full Unreal Engine 5 virtual production reveal with ray-traced aerodynamics and custom procedural lighting rig.',
                      'tags' => [
                        'Unreal Engine 5',
                        'Ray Tracing',
                        'Virtual Production'
                      ],
                      'liveUrl' => '#',
                      'imageUrl' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1200&q=80'
                    ],
                    [
                      'title' => 'Chronos Procedural Time Rift',
                      'description' => 'Complex particle dynamics simulation running 100M particles in Houdini with Vellum cloth collision.',
                      'tags' => [
                        'Houdini FX',
                        'Vellum',
                        'Particle Dynamics'
                      ],
                      'liveUrl' => '#',
                      'imageUrl' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=1200&q=80'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_mot',
                'type' => 'contact',
                'props' => [
                  'title' => 'Commission a Campaign',
                  'subtitle' => 'Available for direct agency commissions and executive VFX direction.',
                  'email' => 'kairos@motion-director.film',
                  'location' => 'Los Angeles · Tokyo · Remote Worldwide',
                  'availability' => 'Booking Q3 2026 Virtual Productions'
                ]
              ],
              [
                'id' => 'footer_mot',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Kairos Motion Studio. Rendered at 4K 60fps.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#070709',
                'textColor' => '#f3f4f6',
                'primaryColor' => '#a855f7',
                'secondaryColor' => '#06b6d4',
                'cardBg' => '#111116',
                'cardBorder' => 'rgba(168, 85, 247, 0.2)',
                'headingFont' => 'Space Grotesk',
                'bodyFont' => 'Plus Jakarta Sans',
                'lineHeightHeading' => '1.2',
                'lineHeightBody' => '1.6',
                'letterSpacingHeading' => '-0.02em',
                'borderRadius' => '14px',
                'containerWidth' => 'max-w-6xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_mot',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'KAIROS // MOTION',
                    'ctaText' => 'Play Showreel',
                    'ctaLink' => '#projects'
                  ]
                ],
                [
                  'id' => 'hero_mot',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'motion',
                    'badge' => 'HOUDINI · UNREAL ENGINE 5 · OCTANE RENDER',
                    'title' => 'Sculpting Reality Through Kinetic Light & Spatial Motion',
                    'subtitle' => 'Creative Director, 3D Animator & Virtual Production Supervisor',
                    'description' => 'Specializing in cinematic worldbuilding, procedural physics simulations, and hyper-realistic product reveals for cutting-edge brands worldwide.',
                    'primaryButtonText' => 'Watch 2026 Showreel',
                    'primaryButtonLink' => '#projects',
                    'secondaryButtonText' => 'Commercial Credits',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'proj_mot',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'grid',
                    'title' => 'Featured Motion Campaigns',
                    'subtitle' => 'Simulations, kinetic title sequences, and commercial launches',
                    'columns' => 2,
                    'items' => [
                      [
                        'title' => 'Neo-Genesis Spatial Supercar Launch',
                        'description' => 'Full Unreal Engine 5 virtual production reveal with ray-traced aerodynamics and custom procedural lighting rig.',
                        'tags' => [
                          'Unreal Engine 5',
                          'Ray Tracing',
                          'Virtual Production'
                        ],
                        'liveUrl' => '#',
                        'imageUrl' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1200&q=80'
                      ],
                      [
                        'title' => 'Chronos Procedural Time Rift',
                        'description' => 'Complex particle dynamics simulation running 100M particles in Houdini with Vellum cloth collision.',
                        'tags' => [
                          'Houdini FX',
                          'Vellum',
                          'Particle Dynamics'
                        ],
                        'liveUrl' => '#',
                        'imageUrl' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=1200&q=80'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_mot',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Commission a Campaign',
                    'subtitle' => 'Available for direct agency commissions and executive VFX direction.',
                    'email' => 'kairos@motion-director.film',
                    'location' => 'Los Angeles · Tokyo · Remote Worldwide',
                    'availability' => 'Booking Q3 2026 Virtual Productions'
                  ]
                ],
                [
                  'id' => 'footer_mot',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Kairos Motion Studio. Rendered at 4K 60fps.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'product-design-leader',
            'name' => 'Product Design Leader & Strategist',
            'name_ar' => 'قائد تصميم المنتجات والتجربة الرقمية',
            'category' => 'Designer',
            'description' => 'Executive UX product design portfolio emphasizing human-centered research sprints, design system governance, and measurable business conversion KPIs.',
            'description_ar' => 'معرض أعمال قيادي في تصميم المنتجات وتجربة المستخدم يركز على أبحاث المستخدمين، وحوكمة نظم التصميم، ومؤشرات نمو الأعمال التجارية.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#ffffff',
                  'textColor' => '#0f172a',
                  'primaryColor' => '#2563eb',
                  'secondaryColor' => '#1d4ed8',
                  'cardBg' => '#f8fafc',
                  'cardBorder' => '#e2e8f0',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.025em',
                  'borderRadius' => '12px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'pdl_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Lucas Vance · Product Design',
                      'ctaText' => 'Case Studies',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'pdl_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Former VP Design @ FinTech Scaleup · 120+ User Sprints',
                      'title' => 'Aligning Complex User Mental Models with Scalable Enterprise Product Architecture',
                      'subtitle' => 'Director of Product Design & Digital Strategy',
                      'description' => 'Over a decade leading cross-functional design teams across North America and Europe. Specialized in transforming convoluted B2B workflows into frictionless, delight-driven software experiences with 3.4x conversion uplifts.',
                      'primaryButtonText' => 'Inspect Deep Case Studies',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Design Leadership Philosophy',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'pdl_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Design Impact & Business Outcomes',
                      'subtitle' => 'Proven metrics delivered for high-growth enterprise software products',
                      'items' => [
                        [
                          'value' => '+340%',
                          'label' => 'Onboarding Funnel Conversion Lift',
                          'icon' => 'fa-solid fa-arrow-trend-up'
                        ],
                        [
                          'value' => '120+',
                          'label' => 'Qualitative User Research Sprints',
                          'icon' => 'fa-solid fa-comments'
                        ],
                        [
                          'value' => '14',
                          'label' => 'Designers Mentored to Staff Roles',
                          'icon' => 'fa-solid fa-users-gear'
                        ],
                        [
                          'value' => '4.9★',
                          'label' => 'Product CSAT Customer Satisfaction',
                          'icon' => 'fa-solid fa-star'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'pdl_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Strategic Product Design Case Studies',
                      'subtitle' => 'Deep dives into discovery research, wireframing iterations, and validated customer metrics',
                      'items' => [
                        [
                          'title' => 'VaultFlow: Enterprise Treasury UX',
                          'description' => 'Complete redesign of multi-currency wire transfer flow reducing manual operator transaction errors by 78% across 45 financial institutions.',
                          'client' => 'FinTech Enterprise',
                          'year' => '2025',
                          'tags' => [
                            'UX Strategy',
                            'Design System',
                            'User Testing',
                            'FinTech'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'OmniCare: Clinical Telehealth Portal',
                          'description' => 'HIPAA-compliant doctor-patient consult platform engineered for zero cognitive fatigue, rapid EHR entry, and elderly patient accessibility.',
                          'client' => 'HealthCare Systems',
                          'year' => '2024',
                          'tags' => [
                            'Healthcare',
                            'Accessibility',
                            'Mobile & Web',
                            'Prototypes'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Aetherium: Creative Collaboration Workspace',
                          'description' => 'Real-time collaborative canvas designed for 3D animators and directors, cutting review approval feedback loops from 6 days to 4 hours.',
                          'client' => 'Creative SaaS',
                          'year' => '2024',
                          'tags' => [
                            'Design Strategy',
                            'SaaS',
                            'Figma',
                            'Motion Design'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'pdl_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Initiate Product Leadership Discussions',
                      'subtitle' => 'Available for executive design advisory, product organization coaching, and select principal engagements.',
                      'email' => 'lucas.vance@craftfolio-design.com',
                      'location' => 'New York / London / Remote',
                      'availability' => 'Open to executive advisory & advisory board roles'
                    ]
                  ],
                  [
                    'id' => 'pdl_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Lucas Vance · Product Design Leader.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#ffffff',
                  'textColor' => '#0f172a',
                  'primaryColor' => '#2563eb',
                  'secondaryColor' => '#1d4ed8',
                  'cardBg' => '#f8fafc',
                  'cardBorder' => '#e2e8f0',
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
                    'id' => 'pdl_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'فيصل الماجد · تصميم المنتجات',
                      'ctaText' => 'دراسات الحالة',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'pdl_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'نائب رئيس سابق للتصميم في شركات تقنية مالية ناشئة · +120 دورة بحث مستخدمين',
                      'title' => 'مواءمة النماذج الذهنية للمستخدمين مع معمارية المنتجات الرقمية القابلة للتوسع',
                      'subtitle' => 'مدير تصميم المنتجات واستراتيجيات التجربة الرقمية',
                      'description' => 'أكثر من عقد من الخبرة في قيادة فرق التصميم متعددة التخصصات. متخصص في تبسيط تدفقات العمل المعقدة في برمجيات الأعمال (B2B) وتحويلها إلى تجارب تفاعلية ممتعة وسلسة مع رفع معدلات التحويل بمقدار 3.4 أضعاف.',
                      'primaryButtonText' => 'استعراض دراسات الحالة المتعمقة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'فلسفة القيادة التصميمية',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'pdl_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'أثر التصميم ومؤشرات نمو الأعمال',
                      'subtitle' => 'أرقام حقيقية محققة لمنتجات برمجية موجهة لقطاعات الأعمال الكبرى',
                      'items' => [
                        [
                          'value' => '+340%',
                          'label' => 'ارتفاع معدل إتمام التسجيل الأولي',
                          'icon' => 'fa-solid fa-arrow-trend-up'
                        ],
                        [
                          'value' => '+120',
                          'label' => 'دورة أبحاث نوعية مع المستخدمين',
                          'icon' => 'fa-solid fa-comments'
                        ],
                        [
                          'value' => '14',
                          'label' => 'مصمماً تمت ترقيتهم لأدوار قيادية',
                          'icon' => 'fa-solid fa-users-gear'
                        ],
                        [
                          'value' => '4.9★',
                          'label' => 'معدل رضا العملاء عن التجربة (CSAT)',
                          'icon' => 'fa-solid fa-star'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'pdl_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'دراسات حالة استراتيجية في تصميم المنتجات',
                      'subtitle' => 'رحلات متكاملة من أبحاث الاستكشاف واختبار النماذج الأولية حتى إطلاق المنتج وقياس الأثر',
                      'items' => [
                        [
                          'title' => 'منصة VaultFlow المالية للمؤسسات',
                          'description' => 'إعادة تصميم كاملة لمسار التحويلات المالية الدولية متعددة العملات مع تقليص أخطاء العمليات اليدوية بنسبة 78% عبر 45 مؤسسة مالية.',
                          'client' => 'التقنية المالية',
                          'year' => '2025',
                          'tags' => [
                            'استراتيجية UX',
                            'نظم التصميم',
                            'اختبار المستخدمين',
                            'FinTech'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'بوابة OmniCare للرعاية الصحية عن بعد',
                          'description' => 'منصة استشارات طبية متوافقة مع معايير الأمان الصحي، مصممة لإزالة الإجهاد الذهني عن الأطباء وتسهيل الوصول لكبار السن.',
                          'client' => 'الرعاية الصحية الرقمية',
                          'year' => '2024',
                          'tags' => [
                            'صحة رقمية',
                            'إمكانية الوصول',
                            'تطبيقات الويب والجوال'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'مساحة العمل التعاونية Aetherium',
                          'description' => 'لوحة عمل مشتركة فورية لمخرجي ومصممي الحركة ثلاثية الأبعاد، خفضت زمن مراجعة واعتماد المشاهد من 6 أيام إلى 4 ساعات فقط.',
                          'client' => 'برمجيات الإنتاج الإبداعي',
                          'year' => '2024',
                          'tags' => [
                            'استراتيجية التصميم',
                            'SaaS',
                            'Figma',
                            'تصميم الحركة'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'pdl_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل للاستشارات والقيادة التصميمية',
                      'subtitle' => 'متاح للاستشارات التنفيذية في تصميم المنتجات، وتدريب منظمات التصميم، والمشاريع الاستراتيجية الكبرى.',
                      'email' => 'faisal.majed@craftfolio-design.com',
                      'location' => 'الرياض / دبي / عمل عن بعد عالمياً',
                      'availability' => 'متاح للاستشارات القيادية ومجالس الإدارة الاستشارية'
                    ]
                  ],
                  [
                    'id' => 'pdl_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 فيصل الماجد · قائد تصميم المنتجات.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'brand-identity-studio',
            'name' => 'Brand & Visual Identity Artisan',
            'name_ar' => 'مصمم الهوية البصرية والعلامات التجارية',
            'category' => 'Designer',
            'description' => 'Sophisticated visual identity portfolio featuring typographic posters, bespoke color palettes, packaging design systems, and vector guidelines.',
            'description_ar' => 'معرض أعمال مصمم الهويات البصرية والعلامات التجارية مع ملصقات طباعية، وباليتات ألوان مخصصة، وتصاميم التغليف، وأدلة الهوية.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#f8f6f0',
                  'textColor' => '#1c1917',
                  'primaryColor' => '#b45309',
                  'secondaryColor' => '#92400e',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#e7e5e4',
                  'headingFont' => 'Playfair Display',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.2',
                  'lineHeightBody' => '1.65',
                  'letterSpacingHeading' => '-0.01em',
                  'borderRadius' => '4px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'bi_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Matteo Rossi · Atelier',
                      'ctaText' => 'Commission Brand',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'bi_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Atelier Milan & Florence · Bespoke Brand Identity',
                      'title' => 'Shaping Enduring Visual Identities Through Purposeful Typography & Material Craft',
                      'subtitle' => 'Brand Identity Artisan & Typographic Director',
                      'description' => 'Creating distinct visual worlds for luxury Maisons, boutique hospitality, and culturally conscious institutions. Dedicated to custom logotypes, bespoke packaging tactile finishes, and comprehensive brand guidelines.',
                      'primaryButtonText' => 'View Brand Identities',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'The Design Atelier',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'bi_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Selected Brand Identity Archives',
                      'subtitle' => 'Complete visual identities encompassing custom typography, packaging, and digital touchpoints',
                      'items' => [
                        [
                          'title' => 'Maison Verrerie: Venetian Glass',
                          'description' => 'Heritage identity system including custom hand-drawn serif logotype, hot-stamped cotton packaging, and editorial exhibition catalog.',
                          'client' => 'Murano Glass Atelier',
                          'year' => '2025',
                          'tags' => [
                            'Brand Identity',
                            'Custom Typography',
                            'Packaging',
                            'Editorial'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Botanica Botanique Perfumery',
                          'description' => 'Monochrome botanical visual identity featuring embossed linen labels, gold foil unboxing rituals, and digital brand sanctuary.',
                          'client' => 'Haute Parfumerie',
                          'year' => '2024',
                          'tags' => [
                            'Luxury Packaging',
                            'Identity',
                            'Art Direction'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Caelum Architectural Quarterly',
                          'description' => 'Grid-driven editorial typography design system with bespoke display serif numerals and tactile Swiss-bound publication covers.',
                          'client' => 'Architectural Journal',
                          'year' => '2024',
                          'tags' => [
                            'Editorial',
                            'Typography',
                            'Swiss Grid'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'bi_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Commission an Identity Project',
                      'subtitle' => 'Taking select commissions for comprehensive brand systems, custom typography, and creative direction.',
                      'email' => 'studio@matteorossi-atelier.it',
                      'location' => 'Milan / Florence / Global',
                      'availability' => 'Currently accepting Q3/Q4 brand commissions'
                    ]
                  ],
                  [
                    'id' => 'bi_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Matteo Rossi Atelier. Identity Systems.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#f8f6f0',
                  'textColor' => '#1c1917',
                  'primaryColor' => '#b45309',
                  'secondaryColor' => '#92400e',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#e7e5e4',
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
                    'id' => 'bi_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'كريم الهاشمي · أستوديو الهوية',
                      'ctaText' => 'طلب تصميم هوية',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'bi_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'أستوديو تصميم العلامات الفاخرة والطباعة الراقية',
                      'title' => 'صناعة هويات بصرية خالدة تمزج بين أصالة الخط العربي والحداثة التصميمية الرفيعة',
                      'subtitle' => 'مصمم هويات بصرية وعلامات تجارية متخصصة',
                      'description' => 'بناء عوالم بصرية مميزة للعلامات الفاخرة، وقطاع الضيافة الراقية، والمؤسسات الثقافية. التزام بالخطوط المصممة خصيصاً، وحزم التغليف المبتكرة بلمسات ملموسة، وأدلة الهوية المتكاملة.',
                      'primaryButtonText' => 'استعراض الهويات البصرية',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'فلسفة الأستوديو',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'bi_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'أرشيف الهويات البصرية المختارة',
                      'subtitle' => 'أنظمة هوية متكاملة تشمل الخطوط الخاصة، وتصاميم التغليف، والتطبيقات الرقمية المتقنة',
                      'items' => [
                        [
                          'title' => 'دار الزجاج الفينيسي Maison Verrerie',
                          'description' => 'نظام هوية تراثي يشمل شعاراً خطياً مرسوماً باليد، وحزم تغليف من القطن الطبيعي مع طباعة نافرة، وكتالوج معارض تحريري.',
                          'client' => 'حرف الزجاج الفاخر',
                          'year' => '2025',
                          'tags' => [
                            'هوية بصرية',
                            'خطوط خاصة',
                            'تغليف فاخر',
                            'تصميم تحريري'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'دار العطور الطبيعية Botanica Botanique',
                          'description' => 'هوية بصرية نباتية راقية مع ملصقات كتانية محفورة، وتجربة فتح وتغليف بورق الذهب، ودليل متكامل للعلامة.',
                          'client' => 'العطور الفاخرة',
                          'year' => '2024',
                          'tags' => [
                            'تغليف راقٍ',
                            'هوية بصرية',
                            'إشراف فني'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'المجلة المعمارية الفصلية Caelum',
                          'description' => 'نظام طباعة تحريري منضبط يعتمد على الشبكات السويسرية وأرقام طباعية خاصة وأغلفة ذات تجليد يدوي ملموس.',
                          'client' => 'مجلة معمارية وثقافية',
                          'year' => '2024',
                          'tags' => [
                            'تصميم تحريري',
                            'طباعة',
                            'شبكات سويسرية'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'bi_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'طلب مشروع تصميم هوية متكاملة',
                      'subtitle' => 'نستقبل تكليفات محددة لبناء أنظمة الهوية البصرية، وتصميم الخطوط المخصصة، والإشراف الفني.',
                      'email' => 'studio@karimhashemi.design',
                      'location' => 'الرياض / فلورنسا / عالمياً',
                      'availability' => 'متاح لتكليفات الهويات البصرية الفاخرة'
                    ]
                  ],
                  [
                    'id' => 'bi_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 كريم الهاشمي · أستوديو الهويات البصرية.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'art-director-portfolio',
            'name' => 'Creative Art Director',
            'name_ar' => 'المدير الفني والمشرف الإبداعي',
            'category' => 'Designer',
            'description' => 'Cinematic high-fashion art direction portfolio with campaign moodboards, Cannes Lions & D&AD credentials, and international brand client showcases.',
            'description_ar' => 'معرض أعمال المدير الفني والمشرف الإبداعي للحملات البصرية والسينمائية مع سجل الجوائز العالمية (Cannes Lions وD&AD).',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0c0a09',
                  'textColor' => '#fafaf9',
                  'primaryColor' => '#f59e0b',
                  'secondaryColor' => '#d97706',
                  'cardBg' => '#1c1917',
                  'cardBorder' => '#292524',
                  'headingFont' => 'Playfair Display',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.15',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '2px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'ad_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Camille Laurent // Art Direction',
                      'ctaText' => 'Campaign Reel',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'ad_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Grand Prix Cannes Lions · D&AD Yellow Pencil Winner',
                      'title' => 'Directing Unforgettable Global Campaigns Through Visionary Imagery & Visual Narrative',
                      'subtitle' => 'Executive Creative Art Director & Film Visionary',
                      'description' => 'Directing high-impact global commercials, brand films, and visual identity overhauls for iconic names including Sony, Vogue, and Chanel. Merging cinematic storytelling with contemporary avant-garde aesthetics.',
                      'primaryButtonText' => 'View Directorial Campaigns',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Awards & Jury Work',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'ad_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Industry Recognition & Awards',
                      'subtitle' => 'International accolades honoring innovative visual storytelling',
                      'items' => [
                        [
                          'value' => '4x',
                          'label' => 'Cannes Lions Trophies Won',
                          'icon' => 'fa-solid fa-trophy'
                        ],
                        [
                          'value' => '65M+',
                          'label' => 'Global Campaign Film Views',
                          'icon' => 'fa-solid fa-eye'
                        ],
                        [
                          'value' => '2x',
                          'label' => 'D&AD Pencils Awarded',
                          'icon' => 'fa-solid fa-award'
                        ],
                        [
                          'value' => '12',
                          'label' => 'Years Directing Across Paris & NY',
                          'icon' => 'fa-solid fa-clapperboard'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ad_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Featured Directorial Campaigns',
                      'subtitle' => 'Commercial films, photography direction, and multidisciplinary brand campaigns',
                      'items' => [
                        [
                          'title' => 'Elysian Horizon: Sony Alpha Film',
                          'description' => 'Atmospheric 60-second cinema spot shot on 65mm across Icelandic glaciers, exploring silence and visual precision.',
                          'client' => 'Sony Global',
                          'year' => '2025',
                          'tags' => [
                            'Film Direction',
                            'Cinematography',
                            'Sony',
                            'Color Grading'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Metamorphosis: Vogue Autumn Edition',
                          'description' => 'Cover story and 14-page editorial fashion spread exploring sculptural silhouettes and experimental lighting.',
                          'client' => 'Vogue Paris',
                          'year' => '2024',
                          'tags' => [
                            'Art Direction',
                            'Editorial Fashion',
                            'Vogue',
                            'Print'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Nocturne: Chanel Beauty Experience',
                          'description' => 'Digital interactive campaign and immersive flagship spatial installation exploring shadows and reflective textures.',
                          'client' => 'Chanel',
                          'year' => '2024',
                          'tags' => [
                            'Spatial Direction',
                            'Interactive',
                            'Luxury Brand'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ad_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Directorial & Creative Inquiries',
                      'subtitle' => 'Represented worldwide for commercial film direction, luxury brand campaigns, and creative oversight.',
                      'email' => 'camille@camillelaurent-direction.com',
                      'location' => 'Paris / New York / Tokyo',
                      'availability' => 'Booking global campaign direction for Q3/Q4'
                    ]
                  ],
                  [
                    'id' => 'ad_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Camille Laurent · Creative Art Direction.',
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
                  'primaryColor' => '#f59e0b',
                  'secondaryColor' => '#d97706',
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
                    'id' => 'ad_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'دلال الشريف // إشراف فني وإبداعي',
                      'ctaText' => 'أفلام الحملات',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'ad_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'فائزة بجوائز كان ليونز العالمية Cannes Lions وجوائز D&AD',
                      'title' => 'إخراج وإدارة الحملات الإبداعية العالمية عبر سرد بصري سينمائي لا يُنسى',
                      'subtitle' => 'مديرة فنية وإبداعية ومخرجة الحملات البصرية الكبرى',
                      'description' => 'إخراج الحملات الإعلانية العالمية والأفلام السينمائية والهويات البصرية لأسماء مرموقة مثل Sony وVogue وChanel. دمج السرد القصصي السينمائي مع الأنماط البصرية المعاصرة الأكثر جرأة وتفرداً.',
                      'primaryButtonText' => 'استعراض الحملات الإخراجية',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'الجوائز ولجان التحكيم',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'ad_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'التقدير والجوائز الدولية',
                      'subtitle' => 'تكريمات عالمية تحتفي بالسرد البصري المبتكر والإخراج السينمائي المتميز',
                      'items' => [
                        [
                          'value' => '4x',
                          'label' => 'جوائز كان ليونز (Cannes Lions)',
                          'icon' => 'fa-solid fa-trophy'
                        ],
                        [
                          'value' => '+65M',
                          'label' => 'مشاهدة لأفلام الحملات عالمياً',
                          'icon' => 'fa-solid fa-eye'
                        ],
                        [
                          'value' => '2x',
                          'label' => 'جوائز أقلام D&AD المرموقة',
                          'icon' => 'fa-solid fa-award'
                        ],
                        [
                          'value' => '12',
                          'label' => 'سنة من الإخراج الإبداعي في باريس والرياض',
                          'icon' => 'fa-solid fa-clapperboard'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ad_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'أبرز الحملات والأعمال الإخراجية',
                      'subtitle' => 'أفلام إعلانية وإشراف فني على جلسات التصوير وحملات الهوية متكاملة الأركان',
                      'items' => [
                        [
                          'title' => 'فيلم Elysian Horizon لصالح Sony',
                          'description' => 'إعلان سينمائي 60 ثانية تم تصويره بكاميرات 65 مم على جليد أيسلندا، يستكشف السكون والدقة البصرية المطلقة.',
                          'client' => 'سوني العالمية',
                          'year' => '2025',
                          'tags' => [
                            'إخراج أفلام',
                            'سينماتوغرافيا',
                            'Sony',
                            'معالجة الألوان'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'غلاف وقصة Metamorphosis لمجلة Vogue',
                          'description' => 'غلاف ومقال مصور من 14 صفحة لمجلة Vogue باريس يستكشف التكوينات النحتية للأزياء والإضاءة التجريبية المبتكرة.',
                          'client' => 'مجلة Vogue باريس',
                          'year' => '2024',
                          'tags' => [
                            'إشراف فني',
                            'أزياء تحريرية',
                            'Vogue',
                            'مطبوعات'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'تجربة Nocturne التفاعلية لعلامة Chanel',
                          'description' => 'حملة تفاعلية رقمية وتجهيز مكاني غامر في المتجر الرئيسي يستكشف تدرجات الظلال وانعكاسات المواد الفاخرة.',
                          'client' => 'شانيل',
                          'year' => '2024',
                          'tags' => [
                            'تصميم مكاني',
                            'تفاعل رقمي',
                            'علامات فاخرة'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ad_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل للاستشارات والحملات الإخراجية',
                      'subtitle' => 'تمثيل عالمي لإخراج الأفلام التجارية، وحملات العلامات الفاخرة، والإشراف الإبداعي الشامل.',
                      'email' => 'dalal@dalalalsharif-direction.com',
                      'location' => 'الرياض / باريس / نيويورك',
                      'availability' => 'متاحة لحملات الربعين الثالث والرابع'
                    ]
                  ],
                  [
                    'id' => 'ad_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 دلال الشريف · الإخراج الفني والإبداعي.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'illustrator-editorial',
            'name' => 'Editorial & Commercial Illustrator',
            'name_ar' => 'رسام القصص المصورة والهوية التعبيرية',
            'category' => 'Designer',
            'description' => 'Warm and whimsical illustration portfolio showcasing hand-drawn book covers, New Yorker editorial pieces, packaging illustrations, and character design.',
            'description_ar' => 'معرض أعمال رسام التوضيحات والقصص المصورة مع أغلفة كتب ورسومات للمجلات العالمية مثل New Yorker وتصاميم الشخصيات التعبيرية.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#faf7f2',
                  'textColor' => '#1c1917',
                  'primaryColor' => '#e05a47',
                  'secondaryColor' => '#c2410c',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#e7e5e4',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '16px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'ill_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Maya Lin · Illustration',
                      'ctaText' => 'Commission Art',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'ill_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Featured in The New Yorker & Penguin Random House',
                      'title' => 'Bringing Stories, Ideas & Brands to Life Through Hand-Drawn Narrative Illustration',
                      'subtitle' => 'Commercial Illustrator & Visual Storyteller',
                      'description' => 'Crafting evocative editorial illustrations, award-winning picture book covers, and distinctive brand mascots. Blending traditional gouache texture with modern vector precision to create warm, soulful visual memories.',
                      'primaryButtonText' => 'Explore Illustrated Works',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Art Process & Mediums',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'ill_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Selected Editorial & Book Illustrations',
                      'subtitle' => 'Handcrafted commissions for international publishers, publications, and sustainable brands',
                      'items' => [
                        [
                          'title' => 'The Whispering Forest: Book Cover',
                          'description' => 'Award-winning middle-grade novel cover illustration combining tactile gouache brush textures with hand-lettered gold foil typography.',
                          'client' => 'Penguin Random House',
                          'year' => '2025',
                          'tags' => [
                            'Book Cover',
                            'Gouache Texture',
                            'Hand-Lettering'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Urban Solitude: New Yorker Spread',
                          'description' => 'Full-page editorial spot illustration examining modern city loneliness through warm amber window lights in a twilight skyline.',
                          'client' => 'The New Yorker',
                          'year' => '2024',
                          'tags' => [
                            'Editorial',
                            'New Yorker',
                            'Digital Painting'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Herbal Sanctuary Tea Packaging',
                          'description' => 'Botanical illustration series for 8 organic tea tins, featuring delicate pencil line work and vibrant watercolor washes.',
                          'client' => 'Herbal Sanctuary Co.',
                          'year' => '2024',
                          'tags' => [
                            'Packaging',
                            'Botanical',
                            'Watercolor'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ill_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Commission an Illustration',
                      'subtitle' => 'Available for book covers, editorial assignments, custom packaging art, and private commissions.',
                      'email' => 'maya.lin@craftfolio-art.com',
                      'location' => 'Seattle / Remote',
                      'availability' => 'Open for book projects & editorial commissions'
                    ]
                  ],
                  [
                    'id' => 'ill_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Maya Lin · Narrative Illustration.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#faf7f2',
                  'textColor' => '#1c1917',
                  'primaryColor' => '#e05a47',
                  'secondaryColor' => '#c2410c',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#e7e5e4',
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
                    'id' => 'ill_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'منى الفهد · فنون الرسم التعبيري',
                      'ctaText' => 'طلب عمل فني',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'ill_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'أعمال منشورة مع دور نشر عالمية ومجلات ثقافية كبرى',
                      'title' => 'بث الروح في القصص والأفكار والعلامات التجارية عبر الرسم القصصي التعبيري المرسوم باليد',
                      'subtitle' => 'رسامة قصصية ومصممة أغلفة كتب وأعمال تحريرية',
                      'description' => 'إبداع رسومات تحريرية معبرة، وأغلفة كتب حائزة على جوائز، وتصاميم شخصيات مميزة. مزج ملمس الألوان المائية والغواش التقليدية مع دقة الرسم الرقمي المعاصر لخلق ذكريات بصرية دافئة ومليئة بالحياة.',
                      'primaryButtonText' => 'استعراض الأعمال الفنية والقصصية',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'الوسائط والتقنيات الفنية',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'ill_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'أعمال ورسومات تحريرية وأغلفة كتب مختارة',
                      'subtitle' => 'مشاريع مرسومة باليد لصالح دور نشر عالمية ومجلات ثقافية وعلامات تجارية مستدامة',
                      'items' => [
                        [
                          'title' => 'غلاف رواية "همس الغابة الصامتة"',
                          'description' => 'غلاف رواية فائزة بجوائز أدبية يجمع بين ملامس ألوان الغواش اليدوية وتطريز الحروف الذهبية النافرة.',
                          'client' => 'دار بنغوين للنشر Penguin',
                          'year' => '2025',
                          'tags' => [
                            'غلاف كتاب',
                            'ألوان غواش',
                            'حروف يدوية'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'رسمة Urban Solitude التحريرية',
                          'description' => 'لوحة تحريرية كاملة لمجلة New Yorker تناقش عزلة المدينة الحديثة من خلال أضواء النوافذ الدافئة في سماء الغسق.',
                          'client' => 'مجلة The New Yorker',
                          'year' => '2024',
                          'tags' => [
                            'رسم تحريري',
                            'New Yorker',
                            'رسم رقمي'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'سلسلة رسومات شاي Herbal Sanctuary',
                          'description' => 'سلسلة رسومات نباتية لـ 8 علب شاي عضوي تجمع بين خطوط الرصاص الدقيقة وتدرجات الألوان المائية الحية.',
                          'client' => 'مؤسسة الأعشاب الطبيعية',
                          'year' => '2024',
                          'tags' => [
                            'تصميم تغليف',
                            'رسومات نباتية',
                            'ألوان مائية'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ill_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'طلب رسم أو مشروع توضيحي',
                      'subtitle' => 'متاحة لتصميم أغلفة الكتب، والرسومات التحريرية، والرسوم الفنية لحزم المنتجات، واللوحات الخاصة.',
                      'email' => 'mona.fahad@craftfolio-art.com',
                      'location' => 'الرياض / عمل عن بعد عالمياً',
                      'availability' => 'متاحة لمشاريع الكتب والرسومات التحريرية'
                    ]
                  ],
                  [
                    'id' => 'ill_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 منى الفهد · الرسم القصصي والتعبيري.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'uiux-interaction',
            'name' => 'Micro-Interaction & UI Specialist',
            'name_ar' => 'أخصائي تفاعل المستخدم والواجهات الرقمية',
            'category' => 'Designer',
            'description' => 'High-fidelity UI and interaction portfolio showcasing physics-based gesture animations, Framer/Figma interactive prototypes, and mobile interfaces.',
            'description_ar' => 'معرض أعمال أخصائي التفاعل الدقيق وواجهات المستخدم مع نماذج تفاعلية مبنية بالفيزياء الرقمية ونماذج Framer وFigma الحية.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0f172a',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#38bdf8',
                  'secondaryColor' => '#818cf8',
                  'cardBg' => '#1e293b',
                  'cardBorder' => '#334155',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '14px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'ui_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Leo Tanaka · Interaction UI',
                      'ctaText' => 'Live Prototypes',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'ui_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Framer Master · 60fps Micro-Interactions',
                      'title' => 'Elevating Digital Interfaces Through Tactile Physics & Delightful Micro-Interactions',
                      'subtitle' => 'Lead Interaction Designer & Mobile UI Specialist',
                      'description' => 'Designing spatial gestures, haptic feedback mechanics, and fluid transitions that make software feel tangible and alive. Bridging the gap between Figma design systems and production motion code.',
                      'primaryButtonText' => 'Test Interactive Prototypes',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Interaction Design Systems',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'ui_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Interactive Mobile & Web Prototypes',
                      'subtitle' => 'Clickable, physics-calibrated micro-interaction case studies ready for testing',
                      'items' => [
                        [
                          'title' => 'Aura Gesture Audio Player',
                          'description' => 'Radial gesture navigation system with inertial scrubbing, dynamic audio waveform feedback, and spatial volume dials.',
                          'tags' => [
                            'Mobile UI',
                            'Gestures',
                            'Framer',
                            'Prototyping'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Kinetix Multi-State Button Suite',
                          'description' => 'Production-ready interactive button state library with tactile spring physics, loading morphs, and celebratory feedback.',
                          'tags' => [
                            'Micro-Interactions',
                            'Motion Tokens',
                            'CSS Physics'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'FlowPay Checkout Micro-Flow',
                          'description' => 'Single-thumb checkout interaction sequence reducing checkout friction by 44% with biometric passkey trigger animations.',
                          'tags' => [
                            'FinTech UI',
                            'Mobile Flow',
                            'Haptics',
                            'Design System'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ui_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Connect for UI Interaction Design',
                      'subtitle' => 'Available for mobile app prototyping sprints, design system motion token audits, and UI design contracts.',
                      'email' => 'leo.tanaka@craftfolio-ui.io',
                      'location' => 'Tokyo / San Francisco / Remote',
                      'availability' => 'Contracting for selective mobile UI & interaction projects'
                    ]
                  ],
                  [
                    'id' => 'ui_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Leo Tanaka · Interaction Designer.',
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
                  'primaryColor' => '#38bdf8',
                  'secondaryColor' => '#818cf8',
                  'cardBg' => '#1e293b',
                  'cardBorder' => '#334155',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.38',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '14px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'ui_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'حمزة الزهراني · تفاعل الواجهات',
                      'ctaText' => 'نماذج تفاعلية حية',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'ui_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'خبير Framer · تفاعلات دقيقة بمعدل 60 إطاراً في الثانية',
                      'title' => 'الارتقاء بواجهات المستخدم الرقمية من خلال فيزياء الحركة والتفاعلات الدقيقة المبهجة',
                      'subtitle' => 'قائد تصميم التفاعل وأخصائي واجهات تطبيقات الجوال',
                      'description' => 'تصميم الإيماءات المكانية، وتأثيرات الاستجابة اللمسية (Haptics)، والتحولات الانسيابية التي تجعل البرمجيات تبدو حية وملموسة. جسر الفجوة بين نظم التصميم في Figma وأكواد الحركة في بيئة الإنتاج.',
                      'primaryButtonText' => 'تجربة النماذج التفاعلية الحية',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'نظم تصميم التفاعل والحركة',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'ui_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'نماذج واجهات الجوال والويب التفاعلية',
                      'subtitle' => 'دراسات حالة تفاعلية قابلة للنقر والتجربة ومبنية بحسابات فيزيائية دقيقة للحركة',
                      'items' => [
                        [
                          'title' => 'مشغل الصوتيات بالإيماءات Aura',
                          'description' => 'نظام تنقل دائري بالإيماءات مع تحكم بالقصور الذاتي وموجات صوتية تفاعلية وقرص دائري مكانى لضبط الصوت.',
                          'tags' => [
                            'واجهات الجوال',
                            'إيماءات',
                            'Framer',
                            'نماذج أولية'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'حزمة الأزرار التفاعلية Kinetix',
                          'description' => 'مكتبة أزرار تفاعلية جاهزة للإنتاج مبنية بفيزياء النوابض المرنة، مع تحولات شكلية أثناء التحميل وتغذية راجعة احتفالية.',
                          'tags' => [
                            'تفاعلات دقيقة',
                            'رموز الحركة',
                            'فيزياء CSS'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'مسار الدفع السريع FlowPay باللمس',
                          'description' => 'تسلسل دفع مصمم للاستخدام بإبهام واحد يقلل الاحتكاك بنسبة 44% مع حركات تنشيط بصمة الوجه والمصادقة الحيوية.',
                          'tags' => [
                            'واجهات مالية',
                            'تطبيقات الجوال',
                            'استجابة لمسية'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ui_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل لتصميم واجهات وتفاعلات التطبيقات',
                      'subtitle' => 'متاح لورش بناء النماذج الأولية السريعة للتطبيقات، وتدقيق حركات نظم التصميم، ومشاريع الواجهات المتخصصة.',
                      'email' => 'hamza.zahrani@craftfolio-ui.io',
                      'location' => 'الرياض / طوكيو / عمل عن بعد عالمياً',
                      'availability' => 'متاح لمشاريع تصميم واجهات وتفاعلات الجوال النوعية'
                    ]
                  ],
                  [
                    'id' => 'ui_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 حمزة الزهراني · تصميم التفاعل والواجهات.',
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
