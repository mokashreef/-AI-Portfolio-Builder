<?php
namespace App\Services\Templates;

/**
 * AI Portfolio Builder - Academic & Career Templates Catalog
 * Count: 10 Hand-Curated Production-Grade Design Systems
 */
class Academic {
    public static function getTemplates(): array {
        return [
          [
            'slug' => 'academic-scholar',
            'name' => 'Academic & Research Scholar',
            'name_ar' => 'الباحث الأكاديمي وعالم البيانات',
            'category' => 'Academic',
            'description' => 'Oxford blue & crisp white, peer-reviewed paper publications with DOI citations, h-index stats, and university lab appointments.',
            'description_ar' => 'تصميم أكاديمي رفيع للباحثين وأساتذة الجامعات، يعرض الأوراق المحكّمة، معرفات DOI، معامل التأثير h-index، والخبرات التدريسية.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#f8fafc',
                  'textColor' => '#0f172a',
                  'primaryColor' => '#1e3a8a',
                  'secondaryColor' => '#2563eb',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#cbd5e1',
                  'headingFont' => 'Playfair Display',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.7',
                  'letterSpacingHeading' => '-0.015em',
                  'borderRadius' => '6px',
                  'containerWidth' => 'max-w-5xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_acad',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'PROF. NADIA SOMMER / MIT',
                      'ctaText' => 'Curriculum Vitae',
                      'ctaLink' => '#publications'
                    ]
                  ],
                  [
                    'id' => 'hero_acad',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'ASSOCIATE PROFESSOR OF COMPUTER SCIENCE · CSAIL FELLOW',
                      'title' => 'Prof. Nadia Sommer, Ph.D.',
                      'subtitle' => 'Statistical Machine Learning, Optimization & Multi-Agent Robotics',
                      'description' => 'My laboratory investigates provably robust learning algorithms, federated optimization under communication constraints, and decentralized robotics consensus.',
                      'primaryButtonText' => 'View Publications (38 Papers)',
                      'primaryButtonLink' => '#publications',
                      'secondaryButtonText' => 'Lab Research Pillars',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_acad',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'academic',
                      'title' => 'Peer-Reviewed Journal & Conference Publications',
                      'subtitle' => 'Articles published in NeurIPS, ICML, and IEEE Transactions on Information Theory',
                      'items' => [
                        [
                          'title' => 'Finite-Sample Convergence of Decentralized Momentum SGD over Time-Varying Graphs',
                          'authors' => 'N. Sommer, K. Chen, M. V. Jordan',
                          'venue' => 'Journal of Machine Learning Research (JMLR)',
                          'year' => '2025',
                          'doi' => '10.5555/JMLR.2025.10928',
                          'pdfUrl' => '#'
                        ],
                        [
                          'title' => 'Provably Private Federated Learning with Sublinear Communication Complexity',
                          'authors' => 'N. Sommer, A. Ben-Tal',
                          'venue' => 'Neural Information Processing Systems (NeurIPS)',
                          'year' => '2024',
                          'doi' => '10.1109/NEURIPS.2024.8912',
                          'pdfUrl' => '#'
                        ],
                        [
                          'title' => 'Optimal Coordination of Autonomous Drone Swarms under Stochastic Wind Drag',
                          'authors' => 'N. Sommer, L. Bertsekas',
                          'venue' => 'IEEE Transactions on Robotics (T-RO)',
                          'year' => '2023',
                          'doi' => '10.1109/TRO.2023.32981',
                          'pdfUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_acad',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Academic Correspondence & Lab Inquiries',
                      'subtitle' => 'Prospective Ph.D. candidates and post-doctoral researchers should include a statement of research interests.',
                      'email' => 'nsommer@csail.mit.edu',
                      'location' => 'Stata Center, 32 Vassar St, Cambridge, MA',
                      'availability' => 'Reviewing Ph.D. Applications for Fall 2026'
                    ]
                  ],
                  [
                    'id' => 'footer_acad',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Prof. Nadia Sommer. Content licensed under Creative Commons BY-NC 4.0.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#f8fafc',
                  'textColor' => '#0f172a',
                  'primaryColor' => '#1e3a8a',
                  'secondaryColor' => '#2563eb',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#cbd5e1',
                  'headingFont' => 'Amiri',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.4',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '6px',
                  'containerWidth' => 'max-w-5xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_acad',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'أ.د. ناديا سومر / MIT',
                      'ctaText' => 'السيرة الذاتية والأبحاث',
                      'ctaLink' => '#publications'
                    ]
                  ],
                  [
                    'id' => 'hero_acad',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'أستاذ مشارك في علوم الحاسب · زميل مختبر MIT CSAIL',
                      'title' => 'أ.د. ناديا سومر',
                      'subtitle' => 'التعلم الآلي الإحصائي، التحسين الرياضي، والروبوتات ذاتية القيادة',
                      'description' => 'يبحث مختبري في خوارزميات التعلم الآلي الموثوقة رياضياً، والتحسين الفدرالي المقيد بالاتصال الشبكي، ونظم التوافق الذاتي في أسراب الروبوتات.',
                      'primaryButtonText' => 'الأوراق العلمية المحكمة (38 بحثاً)',
                      'primaryButtonLink' => '#publications',
                      'secondaryButtonText' => 'محاور الأبحاث والاتصال',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_acad',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'academic',
                      'title' => 'الأوراق العلمية والمؤتمرات الدولية المحكمة',
                      'subtitle' => 'أبحاث منشورة في NeurIPS و ICML ومجلات جمعية مهندسي الكهرباء والإلكترونيات (IEEE)',
                      'items' => [
                        [
                          'title' => 'تقارب العينات المحدودة في خوارزميات الانحدار المتدرج الموزعة عبر الرسوم البيانية المتغيرة زمنياً',
                          'authors' => 'ن. سومر، ك. تشن، م. جوردان',
                          'venue' => 'مجلة أبحاث التعلم الآلي (JMLR)',
                          'year' => '2025',
                          'doi' => '10.5555/JMLR.2025.10928',
                          'pdfUrl' => '#'
                        ],
                        [
                          'title' => 'التعلم الفدرالي الموثوق خصوصيته مع خفض تعقيد الاتصال الشبكي دون الخطي',
                          'authors' => 'ن. سومر، أ. بن طال',
                          'venue' => 'مؤتمر نظم معالجة المعلومات العصبية (NeurIPS)',
                          'year' => '2024',
                          'doi' => '10.1109/NEURIPS.2024.8912',
                          'pdfUrl' => '#'
                        ],
                        [
                          'title' => 'التنسيق الأمثل لأسراب الطائرات المسيرة تحت التأثيرات الهوائية العشوائية',
                          'authors' => 'ن. سومر، د. برتسيكاس',
                          'venue' => 'معاملات معهد مهندسي الكهرباء والإلكترونيات في الروبوتات (T-RO)',
                          'year' => '2023',
                          'doi' => '10.1109/TRO.2023.32981',
                          'pdfUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_acad',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'المراسلات الأكاديمية والمخبرية',
                      'subtitle' => 'يرجى من طلاب الدكتوراه والباحثين المتقدمين إرفاق بيان مفصل للاهتمامات البحثية السابقة.',
                      'email' => 'nsommer@csail.mit.edu',
                      'location' => 'مركز ستاتا، معهد ماساتشوستس للتقنية (MIT)، كامبريدج',
                      'availability' => 'فتح باب قبول باحثي الدكتوراه لخريف 2026'
                    ]
                  ],
                  [
                    'id' => 'footer_acad',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 أ.د. ناديا سومر. المحتوى مرخص بموجب رخصة المشاع الإبداعي BY-NC 4.0.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#f8fafc',
              'textColor' => '#0f172a',
              'primaryColor' => '#1e3a8a',
              'secondaryColor' => '#2563eb',
              'cardBg' => '#ffffff',
              'cardBorder' => '#cbd5e1',
              'headingFont' => 'Playfair Display',
              'bodyFont' => 'Inter',
              'lineHeightHeading' => '1.25',
              'lineHeightBody' => '1.7',
              'letterSpacingHeading' => '-0.015em',
              'borderRadius' => '6px',
              'containerWidth' => 'max-w-5xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_acad',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'PROF. NADIA SOMMER / MIT',
                  'ctaText' => 'Curriculum Vitae',
                  'ctaLink' => '#publications'
                ]
              ],
              [
                'id' => 'hero_acad',
                'type' => 'hero',
                'props' => [
                  'variant' => 'split',
                  'badge' => 'ASSOCIATE PROFESSOR OF COMPUTER SCIENCE · CSAIL FELLOW',
                  'title' => 'Prof. Nadia Sommer, Ph.D.',
                  'subtitle' => 'Statistical Machine Learning, Optimization & Multi-Agent Robotics',
                  'description' => 'My laboratory investigates provably robust learning algorithms, federated optimization under communication constraints, and decentralized robotics consensus.',
                  'primaryButtonText' => 'View Publications (38 Papers)',
                  'primaryButtonLink' => '#publications',
                  'secondaryButtonText' => 'Lab Research Pillars',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'proj_acad',
                'type' => 'projects',
                'props' => [
                  'variant' => 'academic',
                  'title' => 'Peer-Reviewed Journal & Conference Publications',
                  'subtitle' => 'Articles published in NeurIPS, ICML, and IEEE Transactions on Information Theory',
                  'items' => [
                    [
                      'title' => 'Finite-Sample Convergence of Decentralized Momentum SGD over Time-Varying Graphs',
                      'authors' => 'N. Sommer, K. Chen, M. V. Jordan',
                      'venue' => 'Journal of Machine Learning Research (JMLR)',
                      'year' => '2025',
                      'doi' => '10.5555/JMLR.2025.10928',
                      'pdfUrl' => '#'
                    ],
                    [
                      'title' => 'Provably Private Federated Learning with Sublinear Communication Complexity',
                      'authors' => 'N. Sommer, A. Ben-Tal',
                      'venue' => 'Neural Information Processing Systems (NeurIPS)',
                      'year' => '2024',
                      'doi' => '10.1109/NEURIPS.2024.8912',
                      'pdfUrl' => '#'
                    ],
                    [
                      'title' => 'Optimal Coordination of Autonomous Drone Swarms under Stochastic Wind Drag',
                      'authors' => 'N. Sommer, L. Bertsekas',
                      'venue' => 'IEEE Transactions on Robotics (T-RO)',
                      'year' => '2023',
                      'doi' => '10.1109/TRO.2023.32981',
                      'pdfUrl' => '#'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_acad',
                'type' => 'contact',
                'props' => [
                  'title' => 'Academic Correspondence & Lab Inquiries',
                  'subtitle' => 'Prospective Ph.D. candidates and post-doctoral researchers should include a statement of research interests.',
                  'email' => 'nsommer@csail.mit.edu',
                  'location' => 'Stata Center, 32 Vassar St, Cambridge, MA',
                  'availability' => 'Reviewing Ph.D. Applications for Fall 2026'
                ]
              ],
              [
                'id' => 'footer_acad',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Prof. Nadia Sommer. Content licensed under Creative Commons BY-NC 4.0.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#f8fafc',
                'textColor' => '#0f172a',
                'primaryColor' => '#1e3a8a',
                'secondaryColor' => '#2563eb',
                'cardBg' => '#ffffff',
                'cardBorder' => '#cbd5e1',
                'headingFont' => 'Playfair Display',
                'bodyFont' => 'Inter',
                'lineHeightHeading' => '1.25',
                'lineHeightBody' => '1.7',
                'letterSpacingHeading' => '-0.015em',
                'borderRadius' => '6px',
                'containerWidth' => 'max-w-5xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_acad',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'PROF. NADIA SOMMER / MIT',
                    'ctaText' => 'Curriculum Vitae',
                    'ctaLink' => '#publications'
                  ]
                ],
                [
                  'id' => 'hero_acad',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'split',
                    'badge' => 'ASSOCIATE PROFESSOR OF COMPUTER SCIENCE · CSAIL FELLOW',
                    'title' => 'Prof. Nadia Sommer, Ph.D.',
                    'subtitle' => 'Statistical Machine Learning, Optimization & Multi-Agent Robotics',
                    'description' => 'My laboratory investigates provably robust learning algorithms, federated optimization under communication constraints, and decentralized robotics consensus.',
                    'primaryButtonText' => 'View Publications (38 Papers)',
                    'primaryButtonLink' => '#publications',
                    'secondaryButtonText' => 'Lab Research Pillars',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'proj_acad',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'academic',
                    'title' => 'Peer-Reviewed Journal & Conference Publications',
                    'subtitle' => 'Articles published in NeurIPS, ICML, and IEEE Transactions on Information Theory',
                    'items' => [
                      [
                        'title' => 'Finite-Sample Convergence of Decentralized Momentum SGD over Time-Varying Graphs',
                        'authors' => 'N. Sommer, K. Chen, M. V. Jordan',
                        'venue' => 'Journal of Machine Learning Research (JMLR)',
                        'year' => '2025',
                        'doi' => '10.5555/JMLR.2025.10928',
                        'pdfUrl' => '#'
                      ],
                      [
                        'title' => 'Provably Private Federated Learning with Sublinear Communication Complexity',
                        'authors' => 'N. Sommer, A. Ben-Tal',
                        'venue' => 'Neural Information Processing Systems (NeurIPS)',
                        'year' => '2024',
                        'doi' => '10.1109/NEURIPS.2024.8912',
                        'pdfUrl' => '#'
                      ],
                      [
                        'title' => 'Optimal Coordination of Autonomous Drone Swarms under Stochastic Wind Drag',
                        'authors' => 'N. Sommer, L. Bertsekas',
                        'venue' => 'IEEE Transactions on Robotics (T-RO)',
                        'year' => '2023',
                        'doi' => '10.1109/TRO.2023.32981',
                        'pdfUrl' => '#'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_acad',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Academic Correspondence & Lab Inquiries',
                    'subtitle' => 'Prospective Ph.D. candidates and post-doctoral researchers should include a statement of research interests.',
                    'email' => 'nsommer@csail.mit.edu',
                    'location' => 'Stata Center, 32 Vassar St, Cambridge, MA',
                    'availability' => 'Reviewing Ph.D. Applications for Fall 2026'
                  ]
                ],
                [
                  'id' => 'footer_acad',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Prof. Nadia Sommer. Content licensed under Creative Commons BY-NC 4.0.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'nordic-architect',
            'name' => 'Nordic Architecture & Spatial Studio',
            'name_ar' => 'العمارة الاسكندنافية والتصميم المكاني الهادئ',
            'category' => 'Academic',
            'description' => 'Henrik Lindqvist studio aesthetic, warm stone & sand palette, understated timber architecture, and quiet spatial mastery.',
            'description_ar' => 'تصميم مستوحى من استوديوهات العمارة في ستوكهولم وأوسلو، ألوان الحجر الطبيعي والخشب، ومساحات معمارية مهدئة.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#1c1917',
                  'textColor' => '#f5f5f4',
                  'primaryColor' => '#d6d3d1',
                  'secondaryColor' => '#a8a29e',
                  'cardBg' => '#292524',
                  'cardBorder' => 'rgba(255,255,255,0.08)',
                  'headingFont' => 'Inter',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.2',
                  'lineHeightBody' => '1.65',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '2px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_nord',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'HENRIK LINDQVIST · ARCHITECTS',
                      'ctaText' => 'Studio Contact',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_nord',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'nordic',
                      'nordicTag' => 'RESIDENTIAL & SPATIAL ARCHITECTURE · STOCKHOLM & OSLO',
                      'title' => 'Architecture Rooted in Natural Light, Raw Timber & Spatial Quietude',
                      'subtitle' => 'Contemporary residential pavilions, cultural institutions, and adaptive reuse.',
                      'description' => 'We design buildings that weather gracefully alongside their landscape. Our structures prioritize tactile warmth, natural acoustic damping, and sustainable European timber joinery.',
                      'primaryButtonText' => 'View Built Projects',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Studio Philosophy',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_nord',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'nordic',
                      'title' => 'Completed Architecture Works',
                      'subtitle' => 'Private residences, pavilion galleries, and crafted spatial projects',
                      'items' => [
                        [
                          'title' => 'The Hardanger Fjord Pavilion',
                          'location' => 'Hardangerfjord, Norway',
                          'description' => 'A sustainable timber residence cantilevered over glacial fjord waters using native slate and untreated local pine.',
                          'imageUrl' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1200&q=80',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Stockholm Textile Archive Gallery',
                          'location' => 'Södermalm, Stockholm',
                          'description' => 'Adaptive restoration of an 1890 brick grain warehouse into an open-plan contemporary textile study center.',
                          'imageUrl' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_nord',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Commission an Architecture Project',
                      'subtitle' => 'Studio consultations available in Stockholm, Oslo, and Copenhagen.',
                      'email' => 'henrik@lindqviststudio.se',
                      'location' => 'Södermalm, Stockholm · Grünerløkka, Oslo',
                      'availability' => 'Inquiries Open for 2027 Residential Commissions'
                    ]
                  ],
                  [
                    'id' => 'footer_nord',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Henrik Lindqvist Studio. Stockholm & Oslo.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#1c1917',
                  'textColor' => '#f5f5f4',
                  'primaryColor' => '#d6d3d1',
                  'secondaryColor' => '#a8a29e',
                  'cardBg' => '#292524',
                  'cardBorder' => 'rgba(255,255,255,0.08)',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.35',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '2px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_nord',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'هنريك ليندكفيست · عمارة وتصميم مكاني',
                      'ctaText' => 'تواصل مع الاستوديو',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_nord',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'nordic',
                      'nordicTag' => 'العمارة السكنية والمكانية المعاصرة · ستوكهولم وأوسلو',
                      'title' => 'عمارة متجذرة في الضوء الطبيعي، وخشب الصنوبر، والهدوء المكاني',
                      'subtitle' => 'أجنحة سكنية معاصرة، مؤسسات ثقافية، وإعادة تأهيل المباني التاريخية الحجرية.',
                      'description' => 'نصمم مبانٍ تنسجم بهدوء مع طبيعتها المحيطة وتزداد جمالاً مع مرور الزمن. نمنح الأولوية للدفء الملموس، والراحة الصوتية الهادئة، واستدامة الخشب الطبيعي.',
                      'primaryButtonText' => 'استعراض المشاريع المنفذة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'فلسفة الاستوديو المعمارية',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_nord',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'nordic',
                      'title' => 'مشاريع معمارية مكتملة وموثقة',
                      'subtitle' => 'مساكن خاصة مطلة على الطبيعة، صالات عرض، ومجموعات فراغية فريدة',
                      'items' => [
                        [
                          'title' => 'جناح مضيق هاردانجر النرويجي',
                          'location' => 'مضيق هاردانجر، النرويج',
                          'description' => 'إقامة سكنية خشبية مستدامة مطلة على مياه المضيق الجليدي باستخدام الصخور المحلية وخشب الصنوبر غير المعالج كيميائياً.',
                          'imageUrl' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1200&q=80',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'معرض أرشيف المنسوجات في ستوكهولم',
                          'location' => 'سودرمالم، ستوكهولم',
                          'description' => 'إعادة تأهيل مستودع قرميدي أثري يعود لعام 1890 إلى مركز دراسات مفتوح للمنسوجات المعاصرة والإضاءة الطبيعية.',
                          'imageUrl' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_nord',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'تكليف مشروع معماري جديد',
                      'subtitle' => 'الاستشارات المعمارية والتخطيط المكاني متاح في مكاتبنا في ستوكهولم وأوسلو.',
                      'email' => 'henrik@lindqviststudio.se',
                      'location' => 'ستوكهولم · أوسلو · كوبنهاغن',
                      'availability' => 'استقبال طلبات المشاريع السكنية لعام 2027'
                    ]
                  ],
                  [
                    'id' => 'footer_nord',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 استوديو هنريك ليندكفيست المعماري. ستوكهولم وأوسلو.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#1c1917',
              'textColor' => '#f5f5f4',
              'primaryColor' => '#d6d3d1',
              'secondaryColor' => '#a8a29e',
              'cardBg' => '#292524',
              'cardBorder' => 'rgba(255,255,255,0.08)',
              'headingFont' => 'Inter',
              'bodyFont' => 'Inter',
              'lineHeightHeading' => '1.2',
              'lineHeightBody' => '1.65',
              'letterSpacingHeading' => '-0.02em',
              'borderRadius' => '2px',
              'containerWidth' => 'max-w-6xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_nord',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'HENRIK LINDQVIST · ARCHITECTS',
                  'ctaText' => 'Studio Contact',
                  'ctaLink' => '#contact'
                ]
              ],
              [
                'id' => 'hero_nord',
                'type' => 'hero',
                'props' => [
                  'variant' => 'nordic',
                  'nordicTag' => 'RESIDENTIAL & SPATIAL ARCHITECTURE · STOCKHOLM & OSLO',
                  'title' => 'Architecture Rooted in Natural Light, Raw Timber & Spatial Quietude',
                  'subtitle' => 'Contemporary residential pavilions, cultural institutions, and adaptive reuse.',
                  'description' => 'We design buildings that weather gracefully alongside their landscape. Our structures prioritize tactile warmth, natural acoustic damping, and sustainable European timber joinery.',
                  'primaryButtonText' => 'View Built Projects',
                  'primaryButtonLink' => '#projects',
                  'secondaryButtonText' => 'Studio Philosophy',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'proj_nord',
                'type' => 'projects',
                'props' => [
                  'variant' => 'nordic',
                  'title' => 'Completed Architecture Works',
                  'subtitle' => 'Private residences, pavilion galleries, and crafted spatial projects',
                  'items' => [
                    [
                      'title' => 'The Hardanger Fjord Pavilion',
                      'location' => 'Hardangerfjord, Norway',
                      'description' => 'A sustainable timber residence cantilevered over glacial fjord waters using native slate and untreated local pine.',
                      'imageUrl' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1200&q=80',
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'Stockholm Textile Archive Gallery',
                      'location' => 'Södermalm, Stockholm',
                      'description' => 'Adaptive restoration of an 1890 brick grain warehouse into an open-plan contemporary textile study center.',
                      'imageUrl' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
                      'liveUrl' => '#'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_nord',
                'type' => 'contact',
                'props' => [
                  'title' => 'Commission an Architecture Project',
                  'subtitle' => 'Studio consultations available in Stockholm, Oslo, and Copenhagen.',
                  'email' => 'henrik@lindqviststudio.se',
                  'location' => 'Södermalm, Stockholm · Grünerløkka, Oslo',
                  'availability' => 'Inquiries Open for 2027 Residential Commissions'
                ]
              ],
              [
                'id' => 'footer_nord',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Henrik Lindqvist Studio. Stockholm & Oslo.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#1c1917',
                'textColor' => '#f5f5f4',
                'primaryColor' => '#d6d3d1',
                'secondaryColor' => '#a8a29e',
                'cardBg' => '#292524',
                'cardBorder' => 'rgba(255,255,255,0.08)',
                'headingFont' => 'Inter',
                'bodyFont' => 'Inter',
                'lineHeightHeading' => '1.2',
                'lineHeightBody' => '1.65',
                'letterSpacingHeading' => '-0.02em',
                'borderRadius' => '2px',
                'containerWidth' => 'max-w-6xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_nord',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'HENRIK LINDQVIST · ARCHITECTS',
                    'ctaText' => 'Studio Contact',
                    'ctaLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'hero_nord',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'nordic',
                    'nordicTag' => 'RESIDENTIAL & SPATIAL ARCHITECTURE · STOCKHOLM & OSLO',
                    'title' => 'Architecture Rooted in Natural Light, Raw Timber & Spatial Quietude',
                    'subtitle' => 'Contemporary residential pavilions, cultural institutions, and adaptive reuse.',
                    'description' => 'We design buildings that weather gracefully alongside their landscape. Our structures prioritize tactile warmth, natural acoustic damping, and sustainable European timber joinery.',
                    'primaryButtonText' => 'View Built Projects',
                    'primaryButtonLink' => '#projects',
                    'secondaryButtonText' => 'Studio Philosophy',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'proj_nord',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'nordic',
                    'title' => 'Completed Architecture Works',
                    'subtitle' => 'Private residences, pavilion galleries, and crafted spatial projects',
                    'items' => [
                      [
                        'title' => 'The Hardanger Fjord Pavilion',
                        'location' => 'Hardangerfjord, Norway',
                        'description' => 'A sustainable timber residence cantilevered over glacial fjord waters using native slate and untreated local pine.',
                        'imageUrl' => 'https://images.unsplash.com/photo-1512917774080-9991f1c4c750?auto=format&fit=crop&w=1200&q=80',
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'Stockholm Textile Archive Gallery',
                        'location' => 'Södermalm, Stockholm',
                        'description' => 'Adaptive restoration of an 1890 brick grain warehouse into an open-plan contemporary textile study center.',
                        'imageUrl' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80',
                        'liveUrl' => '#'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_nord',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Commission an Architecture Project',
                    'subtitle' => 'Studio consultations available in Stockholm, Oslo, and Copenhagen.',
                    'email' => 'henrik@lindqviststudio.se',
                    'location' => 'Södermalm, Stockholm · Grünerløkka, Oslo',
                    'availability' => 'Inquiries Open for 2027 Residential Commissions'
                  ]
                ],
                [
                  'id' => 'footer_nord',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Henrik Lindqvist Studio. Stockholm & Oslo.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'university-professor',
            'name' => 'University Professor & Chair',
            'name_ar' => 'أستاذ كرسي جامعي ورئيس قسم',
            'category' => 'Academic',
            'description' => 'Distinguished academic curriculum vitae portfolio highlighting university teaching syllabi, doctoral alumni placements, research grants, and endowed chair archives.',
            'description_ar' => 'السيرة الذاتية الأكاديمية للأستاذ الجامعي ورئيس القسم مع المناهج التدريسية، وطلبة الدكتوراه، والمنح البحثية، والكتب المرجعية.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#ffffff',
                  'textColor' => '#1e293b',
                  'primaryColor' => '#1e3a8a',
                  'secondaryColor' => '#2563eb',
                  'cardBg' => '#f8fafc',
                  'cardBorder' => '#e2e8f0',
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
                    'id' => 'up_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Prof. Robert Langdon · Faculty Chair',
                      'ctaText' => 'Course Syllabi',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'up_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Endowed Chair in Modern Political Economy · 24 Years Faculty Service',
                      'title' => 'Advancing Scholarly Inquiries in Institutional Economics & Global Governance',
                      'subtitle' => 'Professor of Political Economy & Department Chair',
                      'description' => 'Teaching undergraduate seminars, directing doctoral dissertations, and publishing peer-reviewed treatises on sovereign fiscal institutions. Recipient of university-wide distinguished teaching honors.',
                      'primaryButtonText' => 'View Research & Syllabi',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Curriculum Vitae',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'up_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'academic',
                      'title' => 'Current Courses & Research Seminars',
                      'subtitle' => 'Undergraduate lecture series and graduate seminar syllabi',
                      'items' => [
                        [
                          'title' => 'ECON 412: Sovereign Debt & Fiscal Fragility',
                          'authors' => 'Prof. R. Langdon · Fall Semester',
                          'venue' => 'Undergraduate Senior Seminar',
                          'year' => '2025',
                          'pdfUrl' => '#'
                        ],
                        [
                          'title' => 'ECON 820: Advanced Institutional Economics',
                          'authors' => 'Prof. R. Langdon · Spring Semester',
                          'venue' => 'Ph.D. Core Seminar',
                          'year' => '2025',
                          'pdfUrl' => '#'
                        ],
                        [
                          'title' => 'Monograph: The Architecture of Sovereign Solvency',
                          'authors' => 'R. Langdon, Oxford University Press',
                          'venue' => 'Oxford Academic Treatises',
                          'year' => '2024',
                          'doi' => '10.1093/acprof:oso/97801988'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'up_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Academic Office & Inquiries',
                      'subtitle' => 'Office hours for registered students, doctoral applicants, and visiting faculty.',
                      'email' => 'rlangdon@faculty-economics.edu',
                      'location' => 'Faculty Hall, Room 412 / Cambridge, MA',
                      'availability' => 'Office Hours: Tuesdays & Thursdays 2:00 - 4:00 PM'
                    ]
                  ],
                  [
                    'id' => 'up_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Prof. Robert Langdon. University Faculty Page.',
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
                  'textColor' => '#1e293b',
                  'primaryColor' => '#1e3a8a',
                  'secondaryColor' => '#2563eb',
                  'cardBg' => '#f8fafc',
                  'cardBorder' => '#e2e8f0',
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
                    'id' => 'up_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'أ.د. فهد السديري · كرسي أستاذية جامعي',
                      'ctaText' => 'المناهج والمقررات',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'up_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'أستاذ كرسي الاقتصاد السياسي والمؤسسات المالية · 24 عاماً في التدريس الجامعي',
                      'title' => 'تطوير الأبحاث الأكاديمية في الاقتصاد المؤسسي والسياسات المالية والحوكمة العالمية',
                      'subtitle' => 'أستاذ الاقتصاد السياسي ورئيس قسم العلوم الاقتصادية',
                      'description' => 'تدريس المقررات المتقدمة، والإشراف على أطروحات الدكتوراه والماجستير، ونشر الكتب والأبحاث المحكمة في المؤسسات المالية والسيادية. حاصل على وسام التميز في التدريس الجامعي والبحث العلمي.',
                      'primaryButtonText' => 'استعراض الأبحاث والمقررات',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'السيرة الأكاديمية الذاتية',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'up_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'academic',
                      'title' => 'المقررات الدراسية والحلقات البحثية',
                      'subtitle' => 'مناهج مرحلة البكالوريوس وحلقات الدراسات العليا البحثية المتقدمة',
                      'items' => [
                        [
                          'title' => 'مقرر 412: الديون السيادية والهشاشة المالية للدول',
                          'authors' => 'أ.د. فهد السديري · الفصل الدراسي الأول',
                          'venue' => 'حلقة بحث التخرج للبكالوريوس',
                          'year' => '2025',
                          'pdfUrl' => '#'
                        ],
                        [
                          'title' => 'مقرر 820: الاقتصاد المؤسسي المتقدم',
                          'authors' => 'أ.د. فهد السديري · الفصل الدراسي الثاني',
                          'venue' => 'حلقة الدكتوراه المتقدمة',
                          'year' => '2025',
                          'pdfUrl' => '#'
                        ],
                        [
                          'title' => 'كتاب مرجعي: معمارية الملاءة المالية السيادية',
                          'authors' => 'فهد السديري، مطبعة جامعة أكسفورد',
                          'venue' => 'السلسلة الأكاديمية للدراسات الاقتصادية',
                          'year' => '2024',
                          'doi' => '10.1093/acprof:oso/97801988'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'up_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'المكتب الأكاديمي والاستفسارات',
                      'subtitle' => 'الساعات المكتبية لطلبة الجامعة، والباحثين، والأساتذة الزائرين.',
                      'email' => 'sudairi@faculty-economics.edu',
                      'location' => 'مبنى كلية إدارة الأعمال، مكتب 412 / الرياض',
                      'availability' => 'الساعات المكتبية: الإثنين والأربعاء 1:00 - 3:00 مساءً'
                    ]
                  ],
                  [
                    'id' => 'up_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 أ.د. فهد السديري. الصفحة الأكاديمية الرسمية.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'scientific-researcher',
            'name' => 'Laboratory Scientist & Genomics Fellow',
            'name_ar' => 'باحث علوم الأحياء الجزيئية والمختبرات',
            'category' => 'Academic',
            'description' => 'Clean clinical laboratory portfolio documenting $4.2M grant funding, CRISPR therapeutic research papers, laboratory protocols, and peer-reviewed citations.',
            'description_ar' => 'معرض أعمال باحث علوم الأحياء الجزيئية والجينوم مع منح بحثية بـ 4.2M$ وأبحاث كريسبر (CRISPR) والبروتوكولات المخبرية المحكمة.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0f172a',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#06b6d4',
                  'secondaryColor' => '#0891b2',
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
                    'id' => 'sr_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Dr. Tariq Mansour · Genomics Fellow',
                      'ctaText' => 'Published Papers',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'sr_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'NIH Principal Investigator · $4.2M Research Grant Funding',
                      'title' => 'Investigating Epigenetic Regulators & Precision CRISPR Gene Therapeutics',
                      'subtitle' => 'Postdoctoral Fellow in Molecular Genetics & Cellular Therapeutics',
                      'description' => 'Directing wet-lab assays and computational single-cell RNA sequencing pipelines to identify target oncogenes. Published in Nature Genetics, Cell, and PNAS with 3,100+ citations.',
                      'primaryButtonText' => 'View Research Publications',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Lab Equipment & Protocols',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'sr_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Scientific Impact & Laboratory Citations',
                      'subtitle' => 'Peer-reviewed research metrics from Google Scholar and PubMed',
                      'items' => [
                        [
                          'value' => '$4.2M',
                          'label' => 'Competitive NIH & Foundation Grants',
                          'icon' => 'fa-solid fa-hand-holding-dollar'
                        ],
                        [
                          'value' => '3,100+',
                          'label' => 'Peer-Reviewed Citations',
                          'icon' => 'fa-solid fa-quote-left'
                        ],
                        [
                          'value' => '24',
                          'label' => 'h-Index Citation Impact Score',
                          'icon' => 'fa-solid fa-chart-line'
                        ],
                        [
                          'value' => '18',
                          'label' => 'First-Author Research Publications',
                          'icon' => 'fa-solid fa-dna'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sr_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'academic',
                      'title' => 'Selected Peer-Reviewed Research',
                      'subtitle' => 'Primary investigative papers published in high-impact medical journals',
                      'items' => [
                        [
                          'title' => 'Targeted Epigenetic Editing of Oncogenic Enhancers via dCas9-KRAB in Solid Tumors',
                          'authors' => 'T. Mansour, E. Vance, C. Moreau et al.',
                          'venue' => 'Nature Genetics, Vol. 56(4), pp. 412-426',
                          'year' => '2025',
                          'doi' => '10.1038/s41588-025-01824-x',
                          'pdfUrl' => '#'
                        ],
                        [
                          'title' => 'Single-Cell Transcriptomic Atlas of Therapeutic Resistance in Myeloid Leukemia',
                          'authors' => 'T. Mansour, S. Al-Sabah, K. Chen',
                          'venue' => 'Cell Stem Cell, Vol. 32(2), pp. 185-199',
                          'year' => '2024',
                          'doi' => '10.1016/j.stem.2024.01.008',
                          'pdfUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sr_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Laboratory Collaborations & Inquiries',
                      'subtitle' => 'Available for peer academic collaborations, postdoctoral inquiries, and conference panels.',
                      'email' => 'tariq.mansour@genomics-institute.org',
                      'location' => 'Boston / Remote',
                      'availability' => 'Open to collaborative multi-center research grants'
                    ]
                  ],
                  [
                    'id' => 'sr_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Dr. Tariq Mansour. Molecular Genetics Laboratory.',
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
                  'primaryColor' => '#06b6d4',
                  'secondaryColor' => '#0891b2',
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
                    'id' => 'sr_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'د. باسل الحازمي · باحث الوراثة الجزيئية',
                      'ctaText' => 'الأوراق المنشورة',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'sr_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'باحث رئيسي في أبحاث الجينوم · منح بحثية مدعومة بـ 4.2M$',
                      'title' => 'استقصاء المنظمات فوق الجينية وتطوير العلاجات الجينية الموجهة بتقنية كريسبر (CRISPR)',
                      'subtitle' => 'باحث ما بعد الدكتوراه في علم الوراثة الجزيئية والعلاجات الخلوية المتقدمة',
                      'description' => 'إدارة التجارب المخبرية الرطبة وخطوط التحليل الحوسبي لتسلسل الحمض النووي الريبي أحادي الخلية (scRNA-seq). أبحاث منشورة في مجلات علمية رائدة مثل Nature Genetics وCell وPNAS مع أكثر من 3100 استشهاد علمي.',
                      'primaryButtonText' => 'استعراض الأبحاث المنشورة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'تجهيزات ومعدات المختبر',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'sr_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'الأثر العلمي والاستشهادات البحثية',
                      'subtitle' => 'مؤشرات الأداء الأكاديمي الموثقة في قواعد بيانات PubMed وGoogle Scholar',
                      'items' => [
                        [
                          'value' => '4.2M$',
                          'label' => 'منح بحثية تنافسية ممولة',
                          'icon' => 'fa-solid fa-hand-holding-dollar'
                        ],
                        [
                          'value' => '+3,100',
                          'label' => 'استشهاد علمي محكم في مجلات دولية',
                          'icon' => 'fa-solid fa-quote-left'
                        ],
                        [
                          'value' => '24',
                          'label' => 'مؤشر هيرش للاقتباس العلمي (h-index)',
                          'icon' => 'fa-solid fa-chart-line'
                        ],
                        [
                          'value' => '18',
                          'label' => 'ورقة بحثية منشورة كباحث رئيسي',
                          'icon' => 'fa-solid fa-dna'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sr_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'academic',
                      'title' => 'أبرز الأبحاث العلمية المحكمة',
                      'subtitle' => 'دراسات استقصائية رائدة نُشرت في أرقى المجلات الطبية والوراثية العالمية',
                      'items' => [
                        [
                          'title' => 'التعديل فوق الجيني الموجه للمحفزات الجينية المسرطنة عبر dCas9-KRAB في الأورام الصلبة',
                          'authors' => 'ب. الحازمي، ن. القرني، ك. مورو وآخرون',
                          'venue' => 'مجلة Nature Genetics، المجلد 56(4)، ص 412-426',
                          'year' => '2025',
                          'doi' => '10.1038/s41588-025-01824-x',
                          'pdfUrl' => '#'
                        ],
                        [
                          'title' => 'أطلس النسخ أحادي الخلية للمقاومة العلاجية في سرطانات الدم النخاعية',
                          'authors' => 'ب. الحازمي، س. الصباح، ك. تشن',
                          'venue' => 'مجلة Cell Stem Cell، المجلد 32(2)، ص 185-199',
                          'year' => '2024',
                          'doi' => '10.1016/j.stem.2024.01.008',
                          'pdfUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sr_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل والتعاون البحثي الأكاديمي',
                      'subtitle' => 'متاح للشراكات البحثية الأكاديمية متعددة المراكز، والإشراف على طلبة الدراسات العليا، والمؤتمرات الطبية.',
                      'email' => 'basil.hazmi@genomics-institute.org',
                      'location' => 'الرياض / بوسطن / تواصل افتراضي',
                      'availability' => 'متاح لمشاريع الأبحاث المشتركة متعددة المراكز'
                    ]
                  ],
                  [
                    'id' => 'sr_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 د. باسل الحازمي · مختبر الوراثة الجزيئية.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'interactive-resume-cv',
            'name' => 'Interactive Digital Resume',
            'name_ar' => 'السيرة الذاتية التفاعلية الحديثة',
            'category' => 'Academic',
            'description' => 'Clean, ATS-friendly interactive digital resume featuring chronological timeline roles, quantified career impact, PMP certifications, and one-click PDF export.',
            'description_ar' => 'سيرة ذاتية تفاعلية حديثة ومتوافقة مع أنظمة التوظيف مع جدول زمني للخبرات، وإنجازات رقمية دقيقة، وتحميل فوري بصيغة PDF.',
            'is_featured' => 0,
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
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '8px',
                  'containerWidth' => 'max-w-5xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'cv_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Emily Watson · Digital CV',
                      'ctaText' => 'Download PDF Resume',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'cv_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'PMP Certified · 10+ Years Technical Program Leadership',
                      'title' => 'Emily Watson · Senior Technical Program Manager',
                      'subtitle' => 'Cloud Infrastructure, Data Platforms & Enterprise Transformations',
                      'description' => 'Accomplished Technical Program Manager with a decade driving large-scale infrastructure initiatives across Amazon Web Services and Stripe. Delivered $80M in cloud cost optimizations while reducing multi-region launch lead times by 35%.',
                      'primaryButtonText' => 'View Career Timeline',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Certifications & Skills',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'cv_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Quantified Career Highlights',
                      'subtitle' => 'Verified program deliverables and operational efficiency milestones',
                      'items' => [
                        [
                          'value' => '$80M+',
                          'label' => 'Cumulative Cloud Cost Reductions',
                          'icon' => 'fa-solid fa-coins'
                        ],
                        [
                          'value' => '10+ Years',
                          'label' => 'Technical Program Management',
                          'icon' => 'fa-solid fa-calendar-check'
                        ],
                        [
                          'value' => '45',
                          'label' => 'Engineers Coordinated per Sprint Pod',
                          'icon' => 'fa-solid fa-people-group'
                        ],
                        [
                          'value' => '99.98%',
                          'label' => 'On-Time Enterprise Roadmap Execution',
                          'icon' => 'fa-solid fa-bullseye'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'cv_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Contact for Senior Leadership Roles',
                      'subtitle' => 'Open to Principal TPM, Director of Program Management, and Strategic Operations leadership.',
                      'email' => 'emily.watson@watson-tpm.com',
                      'location' => 'Seattle / Remote',
                      'availability' => 'Available for executive interviews'
                    ]
                  ],
                  [
                    'id' => 'cv_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Emily Watson. ATS-Formatted Professional Profile.',
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
                  'borderRadius' => '8px',
                  'containerWidth' => 'max-w-5xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'cv_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'مها العبدلي · سيرة ذاتية تفاعلية',
                      'ctaText' => 'تحميل السيرة الذاتية (PDF)',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'cv_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'شهادة PMP المعتمدة · +10 سنوات في قيادة البرامج التقنية الكبرى',
                      'title' => 'مها العبدلي · مديرة برامج تقنية أولى (Senior TPM)',
                      'subtitle' => 'البنية التحتية السحابية، ومنصات البيانات، والتحول الرقمي للمؤسسات',
                      'description' => 'مديرة برامج تقنية ذات خبرة عقد كامل في قيادة المبادرات الهندسية المعقدة في شركات عالمية كبرى. إدارة مشاريع تحسين كفاءة السحابة وفرت أكثر من 80 مليون دولار مع تقليص زمن إطلاق الخدمات متعددة المناطق بنسبة 35%.',
                      'primaryButtonText' => 'استعراض المسيرة المهنية',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'الشهادات والمهارات',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'cv_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'أبرز الإنجازات المهنية الموثقة',
                      'subtitle' => 'مؤشرات أداء قابلة للقياس تم تحقيقها عبر قيادة البرامج التقنية الكبرى',
                      'items' => [
                        [
                          'value' => '+80M$',
                          'label' => 'وفورات تشغيلية سحابية محققة',
                          'icon' => 'fa-solid fa-coins'
                        ],
                        [
                          'value' => '+10 سنوات',
                          'label' => 'إدارة برامج ومشاريع تقنية كبرى',
                          'icon' => 'fa-solid fa-calendar-check'
                        ],
                        [
                          'value' => '45',
                          'label' => 'مهندساً يتم تنسيق أعمالهم في الدورة',
                          'icon' => 'fa-solid fa-people-group'
                        ],
                        [
                          'value' => '99.98%',
                          'label' => 'التزام دقيق بخارطة الطريق المؤسسية',
                          'icon' => 'fa-solid fa-bullseye'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'cv_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل للأدوار القيادية والتنفيذية',
                      'subtitle' => 'متاحة للأدوار القيادية في إدارة البرامج التقنية، ومدير عام العمليات الاستراتيجية، وإدارة المنتجات.',
                      'email' => 'maha.abdali@abdali-tpm.com',
                      'location' => 'الرياض / عمل عن بعد عالمياً',
                      'availability' => 'متاحة للمقابلات القيادية والاستشارات التنفيذية'
                    ]
                  ],
                  [
                    'id' => 'cv_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 مها العبدلي. الملف المهني المتوافق مع أنظمة التوظيف.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'graduate-capstone',
            'name' => 'Master\'s Graduate & Honors Capstone',
            'name_ar' => 'خريج الدراسات العليا ومشروع التخرج المتميز',
            'category' => 'Academic',
            'description' => 'Academic capstone portfolio for master graduates featuring thesis abstracts, interactive hardware simulation demos, honors badges, and advisor references.',
            'description_ar' => 'معرض مشاريع الدراسات العليا ومشروع التخرج المتميز مع ملخص الأطروحة وتجربة المحاكاة التفاعلية وتوصيات المشرفين.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0b0f19',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#3b82f6',
                  'secondaryColor' => '#60a5fa',
                  'cardBg' => '#111827',
                  'cardBorder' => '#1f2937',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '10px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'gc_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Liam O\'Connor · M.Sc. Robotics',
                      'ctaText' => 'Inspect Capstone',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'gc_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Summa Cum Laude · M.Sc. Autonomous Systems, Stanford University',
                      'title' => 'Autonomous Navigation in Dynamic Environments via Reinforcement Learning',
                      'subtitle' => 'Master\'s Graduate & Robotics Research Engineer',
                      'description' => 'Completed graduate thesis on model-free reinforcement learning algorithms for bipedal robotic obstacle traversal under sensor noise. Awarded Departmental Outstanding Capstone Thesis 2025.',
                      'primaryButtonText' => 'View Thesis & Simulation Demo',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Academic Honors & Grants',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'gc_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'academic',
                      'title' => 'Graduate Thesis & Course Capstones',
                      'subtitle' => 'Peer-reviewed conference papers and published code repositories',
                      'items' => [
                        [
                          'title' => 'Adaptive Latent Representation Learning for Bipedal Locomotion over Rough Terrain',
                          'authors' => 'L. O\'Connor, Advisor: Prof. M. Torvalds',
                          'venue' => 'IEEE International Conference on Robotics and Automation (ICRA 2025)',
                          'year' => '2025',
                          'pdfUrl' => '#'
                        ],
                        [
                          'title' => 'Sim-to-Real Domain Randomization for Quadruped Balance Under Impact Perturbations',
                          'authors' => 'L. O\'Connor, K. Lindholm',
                          'venue' => 'Robotics: Science and Systems (RSS Workshops)',
                          'year' => '2024',
                          'pdfUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'gc_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Industry & Ph.D. Opportunities',
                      'subtitle' => 'Available for robotics research scientist roles, autonomous vehicle engineering, and Ph.D. fellowship positions.',
                      'email' => 'liam.oconnor@alumni.stanford.edu',
                      'location' => 'Palo Alto / Remote',
                      'availability' => 'Available for Summer / Fall 2026 roles'
                    ]
                  ],
                  [
                    'id' => 'gc_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Liam O\'Connor. Stanford Robotics Alumni.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0b0f19',
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
                  'borderRadius' => '10px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'gc_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'حسام الغامدي · ماجستير الروبوتات والذكاء المستقل',
                      'ctaText' => 'فحص مشروع التخرج',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'gc_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'مرتبة الشرف الأولى · ماجستير النظم المستقلة، جامعة ستانفورد',
                      'title' => 'الملاحة الذاتية للروبوتات في البيئات الديناميكية عبر خوارزميات التعلم المعزز',
                      'subtitle' => 'مهندس أبحاث روبوتات وخريج دراسات عليا متميز',
                      'description' => 'إتمام أطروحة الماجستير في خوارزميات التعلم المعزز لتحكم الروبوتات ثنائية الأرجل وتخطي العقبات المعقدة تحت تشويش أجهزة الاستشعار. فائز بجائزة أفضل مشروع تخرج وأطروحة ماجستير لعام 2025.',
                      'primaryButtonText' => 'استعراض الأطروحة والمحاكاة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'الجوائز والتكريمات الأكاديمية',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'gc_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'academic',
                      'title' => 'أطروحة الماجستير والأوراق البحثية',
                      'subtitle' => 'أوراق منشورة ومقبولة في مؤتمرات الروبوتات الدولية المرموقة ومستودعات الأكواد الحرة',
                      'items' => [
                        [
                          'title' => 'التعلم التكيفي للتمثيلات الكامنة لحركة الروبوتات ثنائية الأرجل في التضاريس الوعرة',
                          'authors' => 'حسام الغامدي، إشراف: د. إم. تورفالدز',
                          'venue' => 'المؤتمر الدولي للروبوتات والأتمتة (IEEE ICRA 2025)',
                          'year' => '2025',
                          'pdfUrl' => '#'
                        ],
                        [
                          'title' => 'تقنيات النقل من المحاكاة إلى الواقع لاستقرار الروبوتات رباعية الأرجل تحت الصدمات',
                          'authors' => 'حسام الغامدي، ك. ليندهولم',
                          'venue' => 'مؤتمر علوم ونظم الروبوتات (RSS Workshops)',
                          'year' => '2024',
                          'pdfUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'gc_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل لفرص العمل البحثي والشركات',
                      'subtitle' => 'متاح للأدوار البحثية في مختبرات الروبوتات المتقدمة، وهندسة المركبات ذاتية القيادة، وبرامج الزمالة.',
                      'email' => 'hussam.ghamdi@alumni.stanford.edu',
                      'location' => 'الرياض / بالو ألتو / عمل عن بعد',
                      'availability' => 'متاح للانضمام للأدوار البحثية المتقدمة لعام 2026'
                    ]
                  ],
                  [
                    'id' => 'gc_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 حسام الغامدي. خريج الروبوتات والنظم المستقلة.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'civil-architect-engineer',
            'name' => 'Structural & Civil Engineering Portfolio',
            'name_ar' => 'مهندس المشاريع الإنشائية والبنية التحتية',
            'category' => 'Academic',
            'description' => 'Industrial infrastructure engineering showcase featuring megaproject bridge and tower calculations, BIM drawings, LEED AP certifications, and seismic safety compliance.',
            'description_ar' => 'معرض أعمال المهندس الإنشائي ومشاريع البنية التحتية العملاقة مع حسابات الأبراج والجسور ونمذجة BIM ومعايير السلامة الزلزالية.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0f172a',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#ea580c',
                  'secondaryColor' => '#f97316',
                  'cardBg' => '#1e293b',
                  'cardBorder' => '#334155',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '6px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'ce_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Eng. Tariq Al-Husseini · Structural',
                      'ctaText' => 'Inspect Megaprojects',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'ce_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Chartered Structural Engineer · LEED AP BD+C Certified',
                      'title' => 'Engineering Resilient Megastructures, Iconic Bridges & High-Seismic Foundations',
                      'subtitle' => 'Principal Structural Engineer & Infrastructure Consultant',
                      'description' => 'Over 16 years leading structural engineering calculations, seismic non-linear modeling, and building information modeling (BIM) across high-rise towers, suspension bridges, and transit hubs spanning 4 continents.',
                      'primaryButtonText' => 'View Megaproject Case Studies',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Engineering Credentials',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'ce_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Infrastructure Portfolio Metrics',
                      'subtitle' => 'Verified engineering project milestones and safety certifications',
                      'items' => [
                        [
                          'value' => '$3.8B',
                          'label' => 'Cumulative Capital Project Value Engineered',
                          'icon' => 'fa-solid fa-building-columns'
                        ],
                        [
                          'value' => '420m',
                          'label' => 'Tallest Supertall Tower Structural Design',
                          'icon' => 'fa-solid fa-city'
                        ],
                        [
                          'value' => '100%',
                          'label' => 'Zero Structural Failure Track Record',
                          'icon' => 'fa-solid fa-shield'
                        ],
                        [
                          'value' => '16+ Yrs',
                          'label' => 'Megaproject Structural Leadership',
                          'icon' => 'fa-solid fa-compass-drafting'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ce_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Iconic Civil & Structural Megaprojects',
                      'subtitle' => 'Engineering breakdowns featuring finite element analyses and seismic damping innovations',
                      'items' => [
                        [
                          'title' => 'The Crescent Spire: 72-Story Supertall',
                          'description' => 'Composite outrigger structural system with 800-ton tuned mass damper engineered to withstand Category 5 cyclonic winds and Zone 4 seismic activity.',
                          'tags' => [
                            'Supertall Tower',
                            'Wind Engineering',
                            'Seismic Damper',
                            'BIM'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Strait Marine Transit Suspension Bridge',
                          'description' => '2.4km suspension bridge crossing featuring deep-water caisson foundations and aerodynamic orthotropic steel deck design.',
                          'tags' => [
                            'Suspension Bridge',
                            'Marine Civil',
                            'Aerodynamics'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Metro Central High-Speed Transit Hub',
                          'description' => 'Long-span diagrid steel canopy spanning 120 meters column-free, housing 6 multimodal high-speed rail lines.',
                          'tags' => [
                            'Transit Architecture',
                            'Steel Diagrid',
                            'Long-Span'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ce_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Consult on Megaproject Infrastructure',
                      'subtitle' => 'Available for peer review engineering audits, seismic feasibility studies, and principal structural advisory.',
                      'email' => 'tariq.husseini@infrastructure-engineering.com',
                      'location' => 'Dubai / Riyadh / London',
                      'availability' => 'Contracting for selective tier-1 infrastructure projects'
                    ]
                  ],
                  [
                    'id' => 'ce_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Eng. Tariq Al-Husseini. Structural Infrastructure Consulting.',
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
                  'primaryColor' => '#ea580c',
                  'secondaryColor' => '#f97316',
                  'cardBg' => '#1e293b',
                  'cardBorder' => '#334155',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.38',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '6px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'ce_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'م. طارق الحسيني · هندسة إنشائية',
                      'ctaText' => 'فحص المشاريع الكبرى',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'ce_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'مهندس إنشائي معتمد ومستشار بنية تحتية · معتمد في المباني الخضراء LEED AP',
                      'title' => 'هندسة المنشآت الشاهقة والجسور الأيقونية والأساسات المقاومة للزلازل والرياح العاتية',
                      'subtitle' => 'كبير مهندسي الإنشاءات ومستشار مشاريع البنية التحتية الكبرى',
                      'description' => 'أكثر من 16 عاماً في قيادة الحسابات الإنشائية المعقدة، والنمذجة غير الخطية للزلازل، ونمذجة معلومات المباني (BIM) للأبراج الشاهقة، والجسور المعلقة، ومحطات النقل السريع عبر 4 قارات.',
                      'primaryButtonText' => 'استعراض مشاريع البنية التحتية',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'المؤهلات والاعتمادات الهندسية',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'ce_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'أرقام محفظة المشاريع الإنشائية',
                      'subtitle' => 'إحصائيات موثقة لإنجاز المشاريع العملاقة واختبارات السلامة الصارمة',
                      'items' => [
                        [
                          'value' => '3.8B$',
                          'label' => 'القيمة التراكمية للمشاريع الإنشائية المصممة',
                          'icon' => 'fa-solid fa-building-columns'
                        ],
                        [
                          'value' => '420م',
                          'label' => 'ارتفاع أعلى برج شاهق تم تصميمه إنشائياً',
                          'icon' => 'fa-solid fa-city'
                        ],
                        [
                          'value' => '100%',
                          'label' => 'سجل ناصع يخلو من أي انهيارات إنشائية',
                          'icon' => 'fa-solid fa-shield'
                        ],
                        [
                          'value' => '+16 عاماً',
                          'label' => 'خبرة في قيادة المشاريع الإنشائية الكبرى',
                          'icon' => 'fa-solid fa-compass-drafting'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ce_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'أبرز المشاريع الإنشائية والأبراج الأيقونية',
                      'subtitle' => 'تفاصيل هندسية لتحليلات العناصر المنتهية وأنظمة التخميد الزلزالي المبتكرة',
                      'items' => [
                        [
                          'title' => 'برج الهلال الشاهق: 72 طابقاً',
                          'description' => 'نظام إنشائي مركب مع مخمد كتل متناسق يزن 800 طن مصمم لمقاومة رياح الأعاصير من الفئة 5 والهزات الزلزالية العنيفة.',
                          'tags' => [
                            'أبراج شاهقة',
                            'هندسة الرياح',
                            'مخمد زلزالي',
                            'BIM'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'جسر المضيق المعلق للنقل السريع',
                          'description' => 'جسر معلق بطول 2.4 كم فوق مياه بحرية عميقة مع أساسات قيسونية خاصة وسطح صلب انسيابي مقاوم للرياح.',
                          'tags' => [
                            'جسور معلقة',
                            'هندسة بحرية',
                            'ديناميكا هوائية'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'محطة المترو المركزية لقطارات السرعة العالية',
                          'description' => 'مظلة شبكية فولاذية عملاقة بطول 120 متراً بدون أي أعمدة داخلية تضم 6 خطوط قطارات كهربائية فائقة السرعة.',
                          'tags' => [
                            'محطات نقل',
                            'هياكل فولاذية',
                            'بحور إنشائية واسعة'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ce_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'استشارات مشاريع البنية التحتية الكبرى',
                      'subtitle' => 'متاح للتدقيق الهندسي المستقل، ودراسات الجدوى الزلزالية، والاستشارات الإنشائية المتقدمة للمشاريع العملاقة.',
                      'email' => 'tariq.husseini@infrastructure-engineering.com',
                      'location' => 'الرياض / دبي / لندن',
                      'availability' => 'متاح لمشاريع البنية التحتية والمباني الشاهقة الكبرى'
                    ]
                  ],
                  [
                    'id' => 'ce_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 م. طارق الحسيني · استشارات الهندسة الإنشائية.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'medical-physician',
            'name' => 'Medical Specialist & Clinical Researcher',
            'name_ar' => 'استشاري الطب الباطني والأبحاث السريرية',
            'category' => 'Academic',
            'description' => 'Clean clinical physician portfolio detailing hospital appointments, clinical cardiology research, patient education resources, and appointment booking inquiries.',
            'description_ar' => 'معرض أعمال استشاري الطب الباطني وأمراض القلب مع التعيينات الاستشفائية والأبحاث السريرية ومصادر توعية المرضى.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#f8fafc',
                  'textColor' => '#0f172a',
                  'primaryColor' => '#0f766e',
                  'secondaryColor' => '#0d9488',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#e2e8f0',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.65',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '10px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'mp_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Dr. Sarah Al-Sabah · Cardiology',
                      'ctaText' => 'Clinical Consult Inquiry',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'mp_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Board Certified in Cardiovascular Medicine & Heart Failure',
                      'title' => 'Evidence-Based Cardiovascular Medicine, Heart Failure Therapeutics & Clinical Trials',
                      'subtitle' => 'Consultant Cardiologist & Clinical Associate Professor',
                      'description' => 'Dedicated to compassionate, cutting-edge cardiovascular patient care, preventative lipidology, and leading randomized multi-center clinical trials evaluating novel heart failure therapeutics.',
                      'primaryButtonText' => 'Clinical Specialties & Care',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'Published Clinical Trials',
                      'secondaryButtonLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'mp_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'Clinical Specialties & Services',
                      'subtitle' => 'Comprehensive cardiovascular diagnostics, preventative medicine, and heart failure management',
                      'items' => [
                        [
                          'title' => 'Advanced Heart Failure & Cardiomyopathy',
                          'description' => 'Specialized clinical evaluation, medical optimization, and ventricular assist device surveillance protocols.',
                          'icon' => 'fa-solid fa-heart-pulse',
                          'price' => 'Specialist Care'
                        ],
                        [
                          'title' => 'Preventative Cardiovascular Lipidology',
                          'description' => 'Advanced lipid particle testing, genetic risk stratifications, and personalized arterial plaque stabilization programs.',
                          'icon' => 'fa-solid fa-stethoscope',
                          'price' => 'Preventative Consult'
                        ],
                        [
                          'title' => 'Non-Invasive Cardiac Imaging Diagnostics',
                          'description' => 'Comprehensive 3D echocardiography, myocardial strain rate analysis, and stress imaging diagnostics.',
                          'icon' => 'fa-solid fa-hospital-user',
                          'price' => 'Diagnostic Imaging'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'mp_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Clinical Consultation & Inquiries',
                      'subtitle' => 'Inquiries for private clinical consultations, expert second opinions, and clinical trial participation.',
                      'email' => 'dr.alsabah@cardiology-practice.med',
                      'location' => 'Johns Hopkins Medicine / Riyadh Affiliation',
                      'availability' => 'Consultations by scheduled appointment'
                    ]
                  ],
                  [
                    'id' => 'mp_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Dr. Sarah Al-Sabah MD, FACC. Clinical Practice.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#f8fafc',
                  'textColor' => '#0f172a',
                  'primaryColor' => '#0f766e',
                  'secondaryColor' => '#0d9488',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#e2e8f0',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.38',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '10px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'mp_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'د. سارة الصباح · استشارية طب القلب',
                      'ctaText' => 'طلب حجز استشارة طبية',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'mp_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'استشارية أمراض القلب وقصور القلب المعتمدة · أستاذة سريرية مشاركة',
                      'title' => 'الرعاية القلبية القائمة على الأدلة العلمية، وعلاجات قصور القلب، والأبحاث السريرية المتقدمة',
                      'subtitle' => 'استشارية طب القلب والشرايين وأستاذة سريرية مشاركة',
                      'description' => 'ملتزمة بتقديم رعاية طبية متطورة لمرضى القلب والأوعية الدموية، وبرامج الوقاية من تصلب الشرايين، وقيادة التجارب السريرية متعددة المراكز لتقييم أحدث علاجات قصور القلب والأدوية الحيوية.',
                      'primaryButtonText' => 'التخصصات والخدمات السريرية',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'الأبحاث والتجارب السريرية',
                      'secondaryButtonLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'mp_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'التخصصات والخدمات الطبية الدقيقة',
                      'subtitle' => 'تشخيص شامل لأمراض القلب، وطب الوقاية القلبي، وإدارة قصور عضلة القلب',
                      'items' => [
                        [
                          'title' => 'قصور القلب المتقدم واعتلال العضلة القلبية',
                          'description' => 'تقييم سريري متخصص، وضبط دقيق للأدوية الحديثة، ومتابعة أجهزة دعم البطين الميكانيكية.',
                          'icon' => 'fa-solid fa-heart-pulse',
                          'price' => 'رعاية تخصصية'
                        ],
                        [
                          'title' => 'طب وقاية القلب وإدارة الدهون والكوليسترول',
                          'description' => 'فحوصات الجزيئات الدهنية المتقدمة، وتقييم المخاطر الوراثية، وبرامج تثبيت التكلسات الشريانية.',
                          'icon' => 'fa-solid fa-stethoscope',
                          'price' => 'استشارة وقائية'
                        ],
                        [
                          'title' => 'التصوير التلفزيوني القلبي المتقدم (Echo)',
                          'description' => 'تخطيط صدى القلب ثلاثي الأبعاد، وتحليل إجهاد عضلة القلب، وفحوصات الجهد التصويرية المتطورة.',
                          'icon' => 'fa-solid fa-hospital-user',
                          'price' => 'تشخيص تصويري'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'mp_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'حجز المواعيد والاستشارات الطبية',
                      'subtitle' => 'استشارات العيادة الخاصة، وطلب الرأي الطبي الثاني، والمشاركة في التجارب السريرية القلبية.',
                      'email' => 'dr.alsabah@cardiology-practice.med',
                      'location' => 'مستشفى الملك فيصل التخصصي / الرياض',
                      'availability' => 'الاستشارات بموجب مواعيد مسبقة مجدولة'
                    ]
                  ],
                  [
                    'id' => 'mp_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 د. سارة الصباح. العيادة الاستشارية لأمراض القلب.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'career-transition-pro',
            'name' => 'Career Transition & Product Lead',
            'name_ar' => 'التحول المهني وقيادة المنتجات',
            'category' => 'Academic',
            'description' => 'Narrative storytelling portfolio detailing a successful career transition from corporate finance to AI product management with transferable skills matrix.',
            'description_ar' => 'معرض أعمال يروي قصة نجاح التحول المهني من الإدارة المالية إلى قيادة منتجات الذكاء الاصطناعي مع مصفوفة المهارات المكتسبة.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#ffffff',
                  'textColor' => '#0f172a',
                  'primaryColor' => '#4f46e5',
                  'secondaryColor' => '#6366f1',
                  'cardBg' => '#f8fafc',
                  'cardBorder' => '#e2e8f0',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '12px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'ct_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Jessica Miller · Product Lead',
                      'ctaText' => 'My Transition Story',
                      'ctaLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'ct_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'From Wall Street Equity Research to Staff AI Product Lead',
                      'title' => 'Bridging Rigorous Financial Quantitative Analysis with Customer-Obsessed AI Product Strategy',
                      'subtitle' => 'Staff Product Manager & Career Transition Strategist',
                      'description' => 'Transitioned from 6 years as an investment banker at Goldman Sachs into leading foundational AI search products at scale. Bringing disciplined unit economics, strategic clarity, and cross-functional empathy to every product sprint.',
                      'primaryButtonText' => 'Explore AI Product Cases',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Read My Transition Journey',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'ct_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Shipped AI Products & Case Studies',
                      'subtitle' => 'Products delivered applying data-driven financial discipline to consumer AI',
                      'items' => [
                        [
                          'title' => 'FinGenie: Conversational Wealth Assistant',
                          'description' => 'Led 0-to-1 launch of an LLM personal finance copilot reaching 1.2M active users in 9 months with 84% accuracy in financial plan synthesis.',
                          'tags' => [
                            'AI Product',
                            'FinTech',
                            'LLM Agents',
                            'Product Strategy'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Enterprise Pricing Engine Algorithm',
                          'description' => 'Designed algorithmic dynamic pricing framework reducing customer churn by 18% while expanding gross margins by 420 basis points.',
                          'tags' => [
                            'Pricing Strategy',
                            'Data Science',
                            'B2B SaaS'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Self-Serve Growth Funnel Optimization',
                          'description' => 'Overhauled self-serve product onboarding workflow resulting in 2.3x conversion improvement from free trial to enterprise seat tier.',
                          'tags' => [
                            'PLG',
                            'Funnel Analytics',
                            'A/B Testing'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ct_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Connect for Product Leadership Opportunities',
                      'subtitle' => 'Open to Staff/Director of Product roles, advisory, and keynote panels on career pivoting.',
                      'email' => 'jessica.miller@product-leadership.io',
                      'location' => 'New York / San Francisco / Remote',
                      'availability' => 'Available for selective product executive roles'
                    ]
                  ],
                  [
                    'id' => 'ct_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Jessica Miller. Product Leadership & Career Transition.',
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
                  'primaryColor' => '#4f46e5',
                  'secondaryColor' => '#6366f1',
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
                    'id' => 'ct_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'أمل الشهري · قيادة المنتجات',
                      'ctaText' => 'قصة تحولي المهني',
                      'ctaLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'ct_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'من التحليل المالي والاستثماري إلى قيادة منتجات الذكاء الاصطناعي',
                      'title' => 'الجمع بين دقة التحليل المالي الصارم واستراتيجيات منتجات الذكاء الاصطناعي التي تركز على العميل',
                      'subtitle' => 'قائدة منتجات تقنية أولى وخبيرة في استراتيجيات التحول المهني',
                      'description' => 'تحول مهني ملهم من 6 سنوات في أبحاث الأسهم والخدمات المصرفية الاستثمارية إلى قيادة منتجات الذكاء الاصطناعي الكبرى. توظيف الانضباط المالي، والوضوح الاستراتيجي، والتعاطف العميق مع المستخدم في كل مرحلة من مراحل بناء المنتج.',
                      'primaryButtonText' => 'استعراض دراسات حالة المنتجات',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'رحلة التحول المهني',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'ct_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'منتجات الذكاء الاصطناعي التي تم إطلاقها',
                      'subtitle' => 'مشاريع حقيقية تم بناؤها بتطبيق الانضباط المالي القائم على البيانات على حلول الذكاء الاصطناعي',
                      'items' => [
                        [
                          'title' => 'المساعد المالي الذكي FinGenie',
                          'description' => 'قيادة إطلاق المساعد المالي الشخصي من الصفر ليصل إلى 1.2 مليون مستخدم نشط خلال 9 أشهر وبدقة 84% في صياغة الخطط المالية.',
                          'tags' => [
                            'منتجات ذكاء اصطناعي',
                            'تقنية مالية',
                            'وكلاء ذكاء اصطناعي'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'خوارزمية التسعير الديناميكي للشركات',
                          'description' => 'تصميم نموذج تسعير خوارزمي مرن خفض تسرب العملاء بنسبة 18% ورفع هوامش الربح الإجمالية بمقدار 420 نقطة أساس.',
                          'tags' => [
                            'استراتيجية التسعير',
                            'علم البيانات',
                            'B2B SaaS'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'تحسين مسار النمو الذاتي للمنتج',
                          'description' => 'إعادة هندسة تجربة المستخدم الأولية للمنتج مما أدى إلى مضاعفة معدل التحويل من التجربة المجانية إلى الاشتراك المؤسسي بمقدار 2.3 ضعف.',
                          'tags' => [
                            'نمو بالمنتج PLG',
                            'تحليل القمع',
                            'اختبار A/B'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ct_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل لفرص قيادة المنتجات',
                      'subtitle' => 'متاحة لأدوار قيادة المنتجات التقنية (Director of Product)، والمجالس الاستشارية، والحديث في فعاليات التحول المهني.',
                      'email' => 'amal.shehri@product-leadership.io',
                      'location' => 'الرياض / دبي / عمل عن بعد عالمياً',
                      'availability' => 'متاحة للأدوار القيادية في إدارة المنتجات'
                    ]
                  ],
                  [
                    'id' => 'ct_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 أمل الشهري · قيادة المنتجات والتحول المهني.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'undergraduate-student',
            'name' => 'Computer Science Student & Hackathon Winner',
            'name_ar' => 'طالب علوم الحاسب وفائز بالهاكاثونات',
            'category' => 'Academic',
            'description' => 'Youthful, energetic portfolio highlighting hackathon 1st place victories, open source GitHub projects, CS coursework, and summer internship availability.',
            'description_ar' => 'معرض أعمال طالب علوم الحاسب مع جوائز المراكز الأولى في الهاكاثونات، ومشاريع GitHub، والمقررات الأكاديمية، والبحث عن تدريب صيفي.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#090d16',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#38bdf8',
                  'secondaryColor' => '#818cf8',
                  'cardBg' => '#111827',
                  'cardBorder' => '#1f2937',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '12px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'us_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Jason Park · CS Student',
                      'ctaText' => 'Hire for Internship',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'us_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => '3x Hackathon 1st Place Winner · Seeking Summer 2026 Internship',
                      'title' => 'B.Sc. Computer Science Candidate & Passionate Open Source Builder',
                      'subtitle' => 'Undergraduate Student, Systems Enthusiast & Web Developer',
                      'description' => 'Junior studying Computer Science with a 3.9 GPA. Winner of HackMIT and TreeHacks for building decentralized protocols and offline-first mobile apps. Experienced with TypeScript, Rust, React, and PostgreSQL.',
                      'primaryButtonText' => 'Inspect Hackathon Projects',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'View University Coursework',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'us_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Student Accolades & Coding Milestones',
                      'subtitle' => 'Achievements across collegiate hackathons and academic studies',
                      'items' => [
                        [
                          'value' => '3x',
                          'label' => 'Collegiate Hackathon 1st Place Wins',
                          'icon' => 'fa-solid fa-trophy'
                        ],
                        [
                          'value' => '3.92',
                          'label' => 'Cumulative Major GPA',
                          'icon' => 'fa-solid fa-graduation-cap'
                        ],
                        [
                          'value' => '850+',
                          'label' => 'GitHub Contributions in Past Year',
                          'icon' => 'fa-brands fa-github'
                        ],
                        [
                          'value' => '14',
                          'label' => 'Completed CS & Math Core Courses',
                          'icon' => 'fa-solid fa-book'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'us_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Hackathon Victories & Side Projects',
                      'subtitle' => 'Working prototypes built in 36-hour sprint environments',
                      'items' => [
                        [
                          'title' => 'MeshChat: Offline Bluetooth P2P Messenger',
                          'description' => '1st Place Winner @ HackMIT: Decentralized mesh network mobile application enabling encrypted texting without cellular towers or internet.',
                          'tags' => [
                            'Rust',
                            'Bluetooth LE',
                            'React Native',
                            'Hackathon 1st Place'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'StudySync: Collaborative Lecture Graphing',
                          'description' => 'Real-time collaborative audio transcription that generates interactive mind maps and flashcards using local LLM models.',
                          'tags' => [
                            'TypeScript',
                            'Next.js',
                            'WebAudio',
                            'Whisper'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'MiniC: Toy C Compiler in Rust',
                          'description' => 'Course capstone project parsing a subset of C into x86-64 assembly with register allocation and dead code elimination.',
                          'tags' => [
                            'Rust',
                            'Compilers',
                            'x86-64',
                            'AST'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'us_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Connect for Software Engineering Internships',
                      'subtitle' => 'Looking for Summer 2026 SWE internships in systems engineering, cloud infrastructure, or full-stack web.',
                      'email' => 'jason.park@university-cs.edu',
                      'location' => 'San Francisco / Austin / Open to Relocation',
                      'availability' => 'Available for Summer 2026 (May - August)'
                    ]
                  ],
                  [
                    'id' => 'us_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Jason Park. Student Developer Profile.',
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
                  'primaryColor' => '#38bdf8',
                  'secondaryColor' => '#818cf8',
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
                    'id' => 'us_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'ريان الدوسري · طالب علوم حاسب',
                      'ctaText' => 'توظيف للتدريب الصيفي',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'us_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'فائز بالمركز الأول في 3 هاكاثونات برمجية · أبحث عن تدريب صيفي 2026',
                      'title' => 'طالب بكالوريوس علوم حاسب ومطور شغوف بالبرمجيات الحرة مفتوحة المصدر',
                      'subtitle' => 'طالب جامعي ومطور برمجيات وأنظمة ويب تفاعلية',
                      'description' => 'طالب في السنة الثالثة بتخصص علوم الحاسب بمعدل 3.92 من 4. فائز بالمركز الأول في هاكاثونات برمجية كبرى لتطوير تطبيقات الاتصال الشبكي المباشر وتطبيقات الويب الذكية. مهارات متقدمة في TypeScript وRust وReact وقواعد بيانات PostgreSQL.',
                      'primaryButtonText' => 'استعراض مشاريع الهاكاثونات',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'المقررات الأكاديمية والمهارات',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'us_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'الجوائز والإنجازات البرمجية والأكاديمية',
                      'subtitle' => 'أرقام وإنجازات موثقة من الهاكاثونات البرمجية وسجل المقررات الجامعية',
                      'items' => [
                        [
                          'value' => '3x',
                          'label' => 'فوز بالمركز الأول في هاكاثونات وطنية',
                          'icon' => 'fa-solid fa-trophy'
                        ],
                        [
                          'value' => '3.92',
                          'label' => 'المعدل التراكمي الجامعي التخصصي',
                          'icon' => 'fa-solid fa-graduation-cap'
                        ],
                        [
                          'value' => '+850',
                          'label' => 'مساهمة كود على GitHub خلال العام',
                          'icon' => 'fa-brands fa-github'
                        ],
                        [
                          'value' => '14',
                          'label' => 'مقرراً تخصصياً في علوم الحاسب والرياضيات',
                          'icon' => 'fa-solid fa-book'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'us_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'مشاريع الهاكاثونات والتطبيقات المنجزة',
                      'subtitle' => 'نماذج أولية حية تم بناؤها واختبارها في بيئات منافسة مكثفة خلال 36 ساعة',
                      'items' => [
                        [
                          'title' => 'تطبيق MeshChat: مراسلة بلوتوث مشفرة بدون إنترنت',
                          'description' => 'المركز الأول: تطبيق جوال للتراسل الشبكي غير المركزي عبر تقنية البلوتوث يعمل بكفاءة كاملة بدون أبراج اتصال وبدون إنترنت.',
                          'tags' => [
                            'Rust',
                            'Bluetooth LE',
                            'React Native',
                            'المركز الأول'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'منصة StudySync: خرائط المحاضرات التفاعلية',
                          'description' => 'تطبيق تعاوني يفرغ التسجيلات الصوتية فورياً ويولد خرائط ذهنية وبطاقات استذكار تفاعلية باستخدام نماذج ذكاء اصطناعي محلية.',
                          'tags' => [
                            'TypeScript',
                            'Next.js',
                            'WebAudio',
                            'Whisper AI'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'مترجم MiniC للغة C بلغة Rust',
                          'description' => 'مشروع تخرج جامعي لمقرر المترجمات يحلل كود لغة C ويترجمه إلى لغة التجميع x86-64 مع تحسين استهلاك المسجلات.',
                          'tags' => [
                            'Rust',
                            'مترجمات',
                            'لغة تجميع',
                            'AST'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'us_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل لفرص التدريب التعاوني والصيفي',
                      'subtitle' => 'أبحث عن فرصة تدريب هندسة برمجيات لصيف 2026 في هندسة النظم، أو البنية السحابية، أو تطوير الويب المتكامل.',
                      'email' => 'rayan.dawsari@university-cs.edu',
                      'location' => 'الرياض / مستعد للانتقال',
                      'availability' => 'متاح لصيف 2026 (مايو - أغسطس)'
                    ]
                  ],
                  [
                    'id' => 'us_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 ريان الدوسري. الملف المهني لطالب علوم الحاسب.',
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
