<?php
namespace App\Services\Templates;

/**
 * AI Portfolio Builder - Freelancers & Personal Brands Templates Catalog
 * Count: 10 Hand-Curated Production-Grade Design Systems
 */
class Freelancers {
    public static function getTemplates(): array {
        return [
          [
            'slug' => 'freelance-pro',
            'name' => 'Independent Product Specialist',
            'name_ar' => 'المستشار المستقل وحلول المنتجات الرقمية',
            'category' => 'Freelancer',
            'description' => 'High-converting personal branding, verified client ratings (5.0 ★★★★★), transparent pricing packages, and direct project booking CTA.',
            'description_ar' => 'تصميم عالي التحويل للمستقلين والاستشاريين مع باقات أسعار شفافة، تقييمات العملاء الموثقة، وأزرار حجز سريعة.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0f172a',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#2563eb',
                  'secondaryColor' => '#3b82f6',
                  'cardBg' => '#1e293b',
                  'cardBorder' => '#334155',
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
                    'id' => 'nav_free',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'SAMUEL GREY / CONSULTING',
                      'ctaText' => 'Book a Sprint',
                      'ctaLink' => '#pricing'
                    ]
                  ],
                  [
                    'id' => 'hero_free',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'freelance',
                      'rating' => '5.0 ★★★★★ (48 Verified Client Recommendations)',
                      'title' => 'I Help Founders Ship Production MVPs in 3 Weeks Flat',
                      'subtitle' => 'Senior Full-Stack Consultant & Fractional CTO',
                      'description' => 'Stop burning runway on bloated dev agencies. I design, architect, and ship high-converting web applications with clean TypeScript code and instant deployment.',
                      'primaryButtonText' => 'View Pricing Packages',
                      'primaryButtonLink' => '#pricing',
                      'secondaryButtonText' => 'Inspect Shipped MVPs',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'serv_free',
                    'type' => 'services',
                    'props' => [
                      'variant' => 'pricing',
                      'title' => 'Transparent Product Packages',
                      'subtitle' => 'Flat-rate pricing, clear deliverables, zero hidden fees',
                      'items' => [
                        [
                          'title' => 'Technical Architecture Audit',
                          'cost' => '$1,800',
                          'description' => 'Full security, database query, and frontend performance inspection with prioritized action plan.',
                          'features' => [
                            'Complete Codebase Review',
                            'Database Latency Profiling',
                            'Prioritized 10-Day Fix Blueprint'
                          ],
                          'buttonText' => 'Book Audit'
                        ],
                        [
                          'title' => '3-Week MVP Sprint',
                          'cost' => '$5,900',
                          'isFeatured' => true,
                          'badge' => 'MOST POPULAR',
                          'description' => 'End-to-end design, full-stack build, database setup, Stripe billing, and production launch.',
                          'features' => [
                            'Custom UI/UX Design System',
                            'Clean Next.js / Node Stack',
                            'Auth & Stripe Payments',
                            '30 Days Post-Launch Support'
                          ],
                          'buttonText' => 'Reserve Sprint Spot'
                        ],
                        [
                          'title' => 'Fractional CTO Advisory',
                          'cost' => '$3,200 / mo',
                          'description' => 'Weekly technical leadership, hiring evaluations, and code review governance for growing startups.',
                          'features' => [
                            '15 Hours Dedicated / Month',
                            'Candidate Technical Interviews',
                            'Vendor Architecture Vetting'
                          ],
                          'buttonText' => 'Retain Advisory'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_free',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Start Your Project Conversation',
                      'subtitle' => 'I reply to all client inquiries within 6 hours on business days.',
                      'email' => 'samuel@grey-consulting.com',
                      'location' => 'Austin, TX · Remote Worldwide',
                      'availability' => 'Next Sprint Opening: May 2026'
                    ]
                  ],
                  [
                    'id' => 'footer_free',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Samuel Grey. Built for high-velocity startup founders.'
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
                  'primaryColor' => '#2563eb',
                  'secondaryColor' => '#3b82f6',
                  'cardBg' => '#1e293b',
                  'cardBorder' => '#334155',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.35',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '10px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_free',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'صامويل غراي / حلول المنتجات',
                      'ctaText' => 'حجز أسبوع تطوير',
                      'ctaLink' => '#pricing'
                    ]
                  ],
                  [
                    'id' => 'hero_free',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'freelance',
                      'rating' => '5.0 ★★★★★ (48 توصية موثقة من العملاء)',
                      'title' => 'أساعد رواد الأعمال في إطلاق وتدشين منتجاتهم الرقمية خلال 3 أسابيع فقط',
                      'subtitle' => 'مستشار تطوير برمجي كامل ومدير تقني جزئي للشركات الناشئة',
                      'description' => 'لا تهدر ميزانيتك ووقتك مع الوكالات البطيئة. أصمم وأبني وأطلق تطبيقاتك الرقمية بأعلى معايير الجودة والأداء لتبدأ بتحصيل الإيرادات فوراً.',
                      'primaryButtonText' => 'استعراض باقات الأسعار',
                      'primaryButtonLink' => '#pricing',
                      'secondaryButtonText' => 'استعراض المنتجات المنجزة',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'serv_free',
                    'type' => 'services',
                    'props' => [
                      'variant' => 'pricing',
                      'title' => 'باقات الخدمات والأسعار الشفافة والمحددة',
                      'subtitle' => 'أسعار ثابتة، مخرجات محددة بدقة، وبدون أي تكاليف خفية إطلاقاً',
                      'items' => [
                        [
                          'title' => 'تدقيق المعمارية والأداء البرمجي',
                          'cost' => '1,800$',
                          'description' => 'فحص أمني شامل، وتدقيق استعلامات قواعد البيانات، وسرعة واجهة المستخدم مع خطة عمل تنفيذية لعلاج الثغرات.',
                          'features' => [
                            'مراجعة شاملة للكود المصدري',
                            'قياس تأخير استعلامات البيانات',
                            'خطة معالجة سريعة خلال 10 أيام'
                          ],
                          'buttonText' => 'طلب التدقيق البرمجي'
                        ],
                        [
                          'title' => 'تطوير وتدشين المنتج في 3 أسابيع',
                          'cost' => '5,900$',
                          'isFeatured' => true,
                          'badge' => 'الباقة الأكثر طلباً',
                          'description' => 'تصميم واجهة متكامل، وبرمجة كاملة، وربط بوابات الدفع الإلكتروني، وتدشين رسمي في بيئة الإنتاج السحابية.',
                          'features' => [
                            'نظام تصميم واجهات مخصص',
                            'بناء حديث بـ Next.js و Node',
                            'توثيق المستخدمين والدفع الإلكتروني',
                            'دعم فني وصيانة لمدة 30 يوماً'
                          ],
                          'buttonText' => 'حجز موعد التدشين'
                        ],
                        [
                          'title' => 'الإدارة التقنية الجزئية (شهرياً)',
                          'cost' => '3,200$ / شهرياً',
                          'description' => 'إشراف تقني أسبوعي مستمر، ومراجعة جودة الكود، ومقابلة المطورين المرشحين للتوظيف في شركتك الناشئة.',
                          'features' => [
                            '15 ساعة مخصصة شهرياً',
                            'إجراء المقابلات الفنية للمرشحين',
                            'اعتماد معمارية الأنظمة والموردين'
                          ],
                          'buttonText' => 'الاشتراك في الإشراف الشهري'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_free',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'ابدأ محادثة مشروعك الآن',
                      'subtitle' => 'أرد على جميع استفسارات العملاء ورواد الأعمال خلال 6 ساعات في أيام العمل الرسمية.',
                      'email' => 'samuel@grey-consulting.com',
                      'location' => 'الرياض · العمل عن بعد عالمياً',
                      'availability' => 'الموعد المتاح القادم: مايو 2026'
                    ]
                  ],
                  [
                    'id' => 'footer_free',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 صامويل غراي. مخصص لرواد الأعمال الطامحين للسرعة والإنجاز.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#0f172a',
              'textColor' => '#f8fafc',
              'primaryColor' => '#2563eb',
              'secondaryColor' => '#3b82f6',
              'cardBg' => '#1e293b',
              'cardBorder' => '#334155',
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
                'id' => 'nav_free',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'SAMUEL GREY / CONSULTING',
                  'ctaText' => 'Book a Sprint',
                  'ctaLink' => '#pricing'
                ]
              ],
              [
                'id' => 'hero_free',
                'type' => 'hero',
                'props' => [
                  'variant' => 'freelance',
                  'rating' => '5.0 ★★★★★ (48 Verified Client Recommendations)',
                  'title' => 'I Help Founders Ship Production MVPs in 3 Weeks Flat',
                  'subtitle' => 'Senior Full-Stack Consultant & Fractional CTO',
                  'description' => 'Stop burning runway on bloated dev agencies. I design, architect, and ship high-converting web applications with clean TypeScript code and instant deployment.',
                  'primaryButtonText' => 'View Pricing Packages',
                  'primaryButtonLink' => '#pricing',
                  'secondaryButtonText' => 'Inspect Shipped MVPs',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'serv_free',
                'type' => 'services',
                'props' => [
                  'variant' => 'pricing',
                  'title' => 'Transparent Product Packages',
                  'subtitle' => 'Flat-rate pricing, clear deliverables, zero hidden fees',
                  'items' => [
                    [
                      'title' => 'Technical Architecture Audit',
                      'cost' => '$1,800',
                      'description' => 'Full security, database query, and frontend performance inspection with prioritized action plan.',
                      'features' => [
                        'Complete Codebase Review',
                        'Database Latency Profiling',
                        'Prioritized 10-Day Fix Blueprint'
                      ],
                      'buttonText' => 'Book Audit'
                    ],
                    [
                      'title' => '3-Week MVP Sprint',
                      'cost' => '$5,900',
                      'isFeatured' => true,
                      'badge' => 'MOST POPULAR',
                      'description' => 'End-to-end design, full-stack build, database setup, Stripe billing, and production launch.',
                      'features' => [
                        'Custom UI/UX Design System',
                        'Clean Next.js / Node Stack',
                        'Auth & Stripe Payments',
                        '30 Days Post-Launch Support'
                      ],
                      'buttonText' => 'Reserve Sprint Spot'
                    ],
                    [
                      'title' => 'Fractional CTO Advisory',
                      'cost' => '$3,200 / mo',
                      'description' => 'Weekly technical leadership, hiring evaluations, and code review governance for growing startups.',
                      'features' => [
                        '15 Hours Dedicated / Month',
                        'Candidate Technical Interviews',
                        'Vendor Architecture Vetting'
                      ],
                      'buttonText' => 'Retain Advisory'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_free',
                'type' => 'contact',
                'props' => [
                  'title' => 'Start Your Project Conversation',
                  'subtitle' => 'I reply to all client inquiries within 6 hours on business days.',
                  'email' => 'samuel@grey-consulting.com',
                  'location' => 'Austin, TX · Remote Worldwide',
                  'availability' => 'Next Sprint Opening: May 2026'
                ]
              ],
              [
                'id' => 'footer_free',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Samuel Grey. Built for high-velocity startup founders.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#0f172a',
                'textColor' => '#f8fafc',
                'primaryColor' => '#2563eb',
                'secondaryColor' => '#3b82f6',
                'cardBg' => '#1e293b',
                'cardBorder' => '#334155',
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
                  'id' => 'nav_free',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'SAMUEL GREY / CONSULTING',
                    'ctaText' => 'Book a Sprint',
                    'ctaLink' => '#pricing'
                  ]
                ],
                [
                  'id' => 'hero_free',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'freelance',
                    'rating' => '5.0 ★★★★★ (48 Verified Client Recommendations)',
                    'title' => 'I Help Founders Ship Production MVPs in 3 Weeks Flat',
                    'subtitle' => 'Senior Full-Stack Consultant & Fractional CTO',
                    'description' => 'Stop burning runway on bloated dev agencies. I design, architect, and ship high-converting web applications with clean TypeScript code and instant deployment.',
                    'primaryButtonText' => 'View Pricing Packages',
                    'primaryButtonLink' => '#pricing',
                    'secondaryButtonText' => 'Inspect Shipped MVPs',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'serv_free',
                  'type' => 'services',
                  'props' => [
                    'variant' => 'pricing',
                    'title' => 'Transparent Product Packages',
                    'subtitle' => 'Flat-rate pricing, clear deliverables, zero hidden fees',
                    'items' => [
                      [
                        'title' => 'Technical Architecture Audit',
                        'cost' => '$1,800',
                        'description' => 'Full security, database query, and frontend performance inspection with prioritized action plan.',
                        'features' => [
                          'Complete Codebase Review',
                          'Database Latency Profiling',
                          'Prioritized 10-Day Fix Blueprint'
                        ],
                        'buttonText' => 'Book Audit'
                      ],
                      [
                        'title' => '3-Week MVP Sprint',
                        'cost' => '$5,900',
                        'isFeatured' => true,
                        'badge' => 'MOST POPULAR',
                        'description' => 'End-to-end design, full-stack build, database setup, Stripe billing, and production launch.',
                        'features' => [
                          'Custom UI/UX Design System',
                          'Clean Next.js / Node Stack',
                          'Auth & Stripe Payments',
                          '30 Days Post-Launch Support'
                        ],
                        'buttonText' => 'Reserve Sprint Spot'
                      ],
                      [
                        'title' => 'Fractional CTO Advisory',
                        'cost' => '$3,200 / mo',
                        'description' => 'Weekly technical leadership, hiring evaluations, and code review governance for growing startups.',
                        'features' => [
                          '15 Hours Dedicated / Month',
                          'Candidate Technical Interviews',
                          'Vendor Architecture Vetting'
                        ],
                        'buttonText' => 'Retain Advisory'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_free',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Start Your Project Conversation',
                    'subtitle' => 'I reply to all client inquiries within 6 hours on business days.',
                    'email' => 'samuel@grey-consulting.com',
                    'location' => 'Austin, TX · Remote Worldwide',
                    'availability' => 'Next Sprint Opening: May 2026'
                  ]
                ],
                [
                  'id' => 'footer_free',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Samuel Grey. Built for high-velocity startup founders.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'strategic-consultant',
            'name' => 'Strategic Growth Consultant',
            'name_ar' => 'المستشار الاستراتيجي ونمو الشركات',
            'category' => 'Freelancer',
            'description' => 'Crisp clean corporate presentation, client ROI impact statistics ($140M+ unlocked value), deliverables grid, and client testimonials.',
            'description_ar' => 'تصميم استشاري مالي وإداري راقٍ يعرض القيمة المضافة المحققة للشركات، منهجية العمل، وشهادات العملاء المؤسسيين.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#ffffff',
                  'textColor' => '#0f172a',
                  'primaryColor' => '#0284c7',
                  'secondaryColor' => '#0369a1',
                  'cardBg' => '#f8fafc',
                  'cardBorder' => '#e2e8f0',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.65',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '8px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_cons',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'CLARK & ASSOCIATES',
                      'ctaText' => 'Book Discovery Call',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_cons',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'consultant',
                      'badge' => 'EX-MCKINSEY PARTNER · ENTERPRISE REVENUE STRATEGY',
                      'title' => 'Transforming Enterprise Operations & Accelerating EBITDA',
                      'subtitle' => 'Senior Management Consultant & Growth Architect',
                      'kpiNum' => '$140M+',
                      'kpiLbl' => 'Net EBITDA Growth Unlocked',
                      'description' => 'We help Fortune 500 leadership and private equity portfolio companies diagnose growth bottlenecks, realign pricing models, and execute rapid digital transformations.',
                      'primaryButtonText' => 'Inspect Advisory Cases',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'Schedule Consultation',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'serv_cons',
                    'type' => 'services',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Advisory Practices & Deliverables',
                      'subtitle' => 'High-velocity diagnostic frameworks tested across multi-market enterprises',
                      'items' => [
                        [
                          'icon' => 'fa-chart-line',
                          'title' => 'Commercial Growth & Pricing Overhaul',
                          'description' => 'Re-architecting value metrics and tiering to unlock 18–35% higher average contract value.'
                        ],
                        [
                          'icon' => 'fa-arrows-split-up-and-left',
                          'title' => 'Post-Merger Integration (PMI)',
                          'description' => 'Harmonizing operational org structures, tech stacks, and sales teams within 100 days.'
                        ],
                        [
                          'icon' => 'fa-bolt',
                          'title' => 'Operational Cost Optimization',
                          'description' => 'Eliminating workflow redundancies to optimize OPEX without cutting strategic product capabilities.'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_cons',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Initiate an Advisory Engagement',
                      'subtitle' => 'Initial discovery sessions are held under strict non-disclosure agreements.',
                      'email' => 'sarah@clark-consulting.com',
                      'location' => 'New York · Chicago · London',
                      'availability' => 'Accepting 2 Corporate Retainers for H2 2026'
                    ]
                  ],
                  [
                    'id' => 'footer_cons',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Clark & Associates Advisory LLC. All client outcomes verified by external audit.'
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
                  'primaryColor' => '#0284c7',
                  'secondaryColor' => '#0369a1',
                  'cardBg' => '#f8fafc',
                  'cardBorder' => '#e2e8f0',
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
                    'id' => 'nav_cons',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'كلارك ومشاركوه للاستشارات',
                      'ctaText' => 'حجز جلسة استشارية',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_cons',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'consultant',
                      'badge' => 'شريك سابق في ماكنزي · استراتيجيات الإيرادات المؤسسية',
                      'title' => 'تحويل العمليات التشغيلية ومضاعفة الأرباح قبل الفوائد والضرائب',
                      'subtitle' => 'مستشار إدارة استراتيجي وخبير نمو الأعمال والمؤسسات',
                      'kpiNum' => '+140 مليون$',
                      'kpiLbl' => 'أرباح تشغيلية مضافة تم تحقيقها للعملاء',
                      'description' => 'نساعد قيادات الشركات الكبرى وشركات الملكية الخاصة على تشخيص معوقات النمو، وإعادة هندسة نماذج التسعير، وتنفيذ تحول رقمي تشغيلي متسارع.',
                      'primaryButtonText' => 'استعراض دراسات الحالة',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'جدولة استشارة مباشرة',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'serv_cons',
                    'type' => 'services',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'مجالات الممارسة الاستشارية والحلول التنفيذية',
                      'subtitle' => 'أطر تشخيصية سريعة تم تطبيقها وقياس نجاحها عبر أسواق متعددة',
                      'items' => [
                        [
                          'icon' => 'fa-chart-line',
                          'title' => 'تطوير النمو التجاري وهيكلة الأسعار',
                          'description' => 'إعادة هندسة معايير القيمة وشرائح التسعير لرفع متوسط قيمة العقود بنسبة 18–35%.'
                        ],
                        [
                          'icon' => 'fa-arrows-split-up-and-left',
                          'title' => 'التكامل المؤسسي بعد الدمج والاستحواذ',
                          'description' => 'توحيد الهياكل التنظيمية التشغيلية، والبنى التحتية، وفرق المبيعات في أول 100 يوم.'
                        ],
                        [
                          'icon' => 'fa-bolt',
                          'title' => 'ترشيد النفقات التشغيلية وسلاسل الإمداد',
                          'description' => 'معالجة التكرار التشغيلي لخفض المصروفات دون المساس بالقدرات الإنتاجية الاستراتيجية.'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_cons',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'بدء التعاقد الاستشاري الاستراتيجي',
                      'subtitle' => 'تُعقد الجلسات التشخيصية الأولى تحت اتفاقيات سرية ومعايير حوكمة صارمة.',
                      'email' => 'sarah@clark-consulting.com',
                      'location' => 'الرياض · دبي · لندن · نيويورك',
                      'availability' => 'قبول ارتباطين استشاريين جديدين للنصف الثاني من 2026'
                    ]
                  ],
                  [
                    'id' => 'footer_cons',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 كلارك ومشاركوه للاستشارات الإدارية. جميع النتائج موثقة بتدقيق خارجي معتمد.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#ffffff',
              'textColor' => '#0f172a',
              'primaryColor' => '#0284c7',
              'secondaryColor' => '#0369a1',
              'cardBg' => '#f8fafc',
              'cardBorder' => '#e2e8f0',
              'headingFont' => 'Plus Jakarta Sans',
              'bodyFont' => 'Inter',
              'lineHeightHeading' => '1.25',
              'lineHeightBody' => '1.65',
              'letterSpacingHeading' => '-0.02em',
              'borderRadius' => '8px',
              'containerWidth' => 'max-w-6xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_cons',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'CLARK & ASSOCIATES',
                  'ctaText' => 'Book Discovery Call',
                  'ctaLink' => '#contact'
                ]
              ],
              [
                'id' => 'hero_cons',
                'type' => 'hero',
                'props' => [
                  'variant' => 'consultant',
                  'badge' => 'EX-MCKINSEY PARTNER · ENTERPRISE REVENUE STRATEGY',
                  'title' => 'Transforming Enterprise Operations & Accelerating EBITDA',
                  'subtitle' => 'Senior Management Consultant & Growth Architect',
                  'kpiNum' => '$140M+',
                  'kpiLbl' => 'Net EBITDA Growth Unlocked',
                  'description' => 'We help Fortune 500 leadership and private equity portfolio companies diagnose growth bottlenecks, realign pricing models, and execute rapid digital transformations.',
                  'primaryButtonText' => 'Inspect Advisory Cases',
                  'primaryButtonLink' => '#services',
                  'secondaryButtonText' => 'Schedule Consultation',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'serv_cons',
                'type' => 'services',
                'props' => [
                  'variant' => 'grid',
                  'title' => 'Advisory Practices & Deliverables',
                  'subtitle' => 'High-velocity diagnostic frameworks tested across multi-market enterprises',
                  'items' => [
                    [
                      'icon' => 'fa-chart-line',
                      'title' => 'Commercial Growth & Pricing Overhaul',
                      'description' => 'Re-architecting value metrics and tiering to unlock 18–35% higher average contract value.'
                    ],
                    [
                      'icon' => 'fa-arrows-split-up-and-left',
                      'title' => 'Post-Merger Integration (PMI)',
                      'description' => 'Harmonizing operational org structures, tech stacks, and sales teams within 100 days.'
                    ],
                    [
                      'icon' => 'fa-bolt',
                      'title' => 'Operational Cost Optimization',
                      'description' => 'Eliminating workflow redundancies to optimize OPEX without cutting strategic product capabilities.'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_cons',
                'type' => 'contact',
                'props' => [
                  'title' => 'Initiate an Advisory Engagement',
                  'subtitle' => 'Initial discovery sessions are held under strict non-disclosure agreements.',
                  'email' => 'sarah@clark-consulting.com',
                  'location' => 'New York · Chicago · London',
                  'availability' => 'Accepting 2 Corporate Retainers for H2 2026'
                ]
              ],
              [
                'id' => 'footer_cons',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Clark & Associates Advisory LLC. All client outcomes verified by external audit.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#ffffff',
                'textColor' => '#0f172a',
                'primaryColor' => '#0284c7',
                'secondaryColor' => '#0369a1',
                'cardBg' => '#f8fafc',
                'cardBorder' => '#e2e8f0',
                'headingFont' => 'Plus Jakarta Sans',
                'bodyFont' => 'Inter',
                'lineHeightHeading' => '1.25',
                'lineHeightBody' => '1.65',
                'letterSpacingHeading' => '-0.02em',
                'borderRadius' => '8px',
                'containerWidth' => 'max-w-6xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_cons',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'CLARK & ASSOCIATES',
                    'ctaText' => 'Book Discovery Call',
                    'ctaLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'hero_cons',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'consultant',
                    'badge' => 'EX-MCKINSEY PARTNER · ENTERPRISE REVENUE STRATEGY',
                    'title' => 'Transforming Enterprise Operations & Accelerating EBITDA',
                    'subtitle' => 'Senior Management Consultant & Growth Architect',
                    'kpiNum' => '$140M+',
                    'kpiLbl' => 'Net EBITDA Growth Unlocked',
                    'description' => 'We help Fortune 500 leadership and private equity portfolio companies diagnose growth bottlenecks, realign pricing models, and execute rapid digital transformations.',
                    'primaryButtonText' => 'Inspect Advisory Cases',
                    'primaryButtonLink' => '#services',
                    'secondaryButtonText' => 'Schedule Consultation',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'serv_cons',
                  'type' => 'services',
                  'props' => [
                    'variant' => 'grid',
                    'title' => 'Advisory Practices & Deliverables',
                    'subtitle' => 'High-velocity diagnostic frameworks tested across multi-market enterprises',
                    'items' => [
                      [
                        'icon' => 'fa-chart-line',
                        'title' => 'Commercial Growth & Pricing Overhaul',
                        'description' => 'Re-architecting value metrics and tiering to unlock 18–35% higher average contract value.'
                      ],
                      [
                        'icon' => 'fa-arrows-split-up-and-left',
                        'title' => 'Post-Merger Integration (PMI)',
                        'description' => 'Harmonizing operational org structures, tech stacks, and sales teams within 100 days.'
                      ],
                      [
                        'icon' => 'fa-bolt',
                        'title' => 'Operational Cost Optimization',
                        'description' => 'Eliminating workflow redundancies to optimize OPEX without cutting strategic product capabilities.'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_cons',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Initiate an Advisory Engagement',
                    'subtitle' => 'Initial discovery sessions are held under strict non-disclosure agreements.',
                    'email' => 'sarah@clark-consulting.com',
                    'location' => 'New York · Chicago · London',
                    'availability' => 'Accepting 2 Corporate Retainers for H2 2026'
                  ]
                ],
                [
                  'id' => 'footer_cons',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Clark & Associates Advisory LLC. All client outcomes verified by external audit.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'personal-brand-keynote',
            'name' => 'Keynote Speaker & Bestselling Author',
            'name_ar' => 'المتحدث الجماهيري والمؤلف',
            'category' => 'Freelancer',
            'description' => 'Stage-ready personal brand portfolio for international keynote speakers, authors, and executive thought leaders with book showcases and conference booking.',
            'description_ar' => 'معرض أعمال للمتحدثين الجماهيريين الدوليين والمؤلفين وقادة الفكر مع استعراض الكتب الأكثر مبيعاً ونموذج حجز الفعاليات.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0b0f19',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#f59e0b',
                  'secondaryColor' => '#d97706',
                  'cardBg' => '#131b2e',
                  'cardBorder' => '#223150',
                  'headingFont' => 'Playfair Display',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.2',
                  'lineHeightBody' => '1.65',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '8px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'spk_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Dr. Marcus Aurel · Keynote',
                      'ctaText' => 'Book for Keynote',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'spk_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'TEDx Mainstage · 2x NYT Bestselling Author',
                      'title' => 'Inspiring Global Audiences on Leadership, Exponential Technology & Human Resilience',
                      'subtitle' => 'International Keynote Speaker & Executive Advisor',
                      'description' => 'Delivering electrifying keynote presentations for Fortune 500 summits, global technology conferences, and leadership retreats across 35 countries. Transforming complex strategic shifts into unforgettable moments of clarity and action.',
                      'primaryButtonText' => 'Explore Keynote Topics',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'Watch Stage Reel',
                      'secondaryButtonLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'spk_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Global Reach & Audience Impact',
                      'subtitle' => 'Verified speaking milestones and readership metrics',
                      'items' => [
                        [
                          'value' => '250k+',
                          'label' => 'Live Attendees Inspired',
                          'icon' => 'fa-solid fa-users'
                        ],
                        [
                          'value' => '35+',
                          'label' => 'Countries Delivered Keynotes In',
                          'icon' => 'fa-solid fa-globe'
                        ],
                        [
                          'value' => '2x',
                          'label' => 'NYT Bestselling Books Published',
                          'icon' => 'fa-solid fa-book-bookmark'
                        ],
                        [
                          'value' => '99.4%',
                          'label' => 'Conference Organizer Re-hire Rating',
                          'icon' => 'fa-solid fa-star'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'spk_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'Signature Keynote Presentations',
                      'subtitle' => 'Tailored 45-60 minute keynote experiences designed for high-impact executive summits',
                      'items' => [
                        [
                          'title' => 'The Exponential Leader: Navigating AI',
                          'description' => 'How visionary leaders navigate the convergence of autonomous AI agents, organizational culture, and rapid market disruption.',
                          'icon' => 'fa-solid fa-brain',
                          'price' => 'Keynote / Fireside'
                        ],
                        [
                          'title' => 'Resilience by Design: High-Stakes Teams',
                          'description' => 'Actionable psychological frameworks extracted from aerospace mission control to build unshakeable focus in turbulent markets.',
                          'icon' => 'fa-solid fa-shield-heart',
                          'price' => 'Keynote / Half-Day'
                        ],
                        [
                          'title' => 'The Next Decade: Strategic Horizons',
                          'description' => 'Macroeconomic and technological foresight analysis empowering boardrooms to proactively capture future tailwinds.',
                          'icon' => 'fa-solid fa-chart-line',
                          'price' => 'Board Briefing'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'spk_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Inquire for Speaking Engagements',
                      'subtitle' => 'Direct inquiry portal for conference organizers, executive bureaus, and summit planners.',
                      'email' => 'speaking@marcus-aurel.com',
                      'location' => 'Geneva / Dubai / Global Travel',
                      'availability' => 'Accepting select 2026 conference & summit bookings'
                    ]
                  ],
                  [
                    'id' => 'spk_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Dr. Marcus Aurel. Managed by Global Speaker Bureau.',
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
                  'primaryColor' => '#f59e0b',
                  'secondaryColor' => '#d97706',
                  'cardBg' => '#131b2e',
                  'cardBorder' => '#223150',
                  'headingFont' => 'Amiri',
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
                    'id' => 'spk_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'د. عبد الله الراشد · متحدث ومؤلف',
                      'ctaText' => 'طلب حجز متحدث',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'spk_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'متحدث رئيسي في منصات TEDx العالمية ومؤلف كتب الأكثر مبيعاً',
                      'title' => 'إلهام الجماهير القيادية حول العالم في استراتيجيات القيادة، والذكاء الاصطناعي، والمرونة المؤسسية',
                      'subtitle' => 'متحدث جماهيري دولي ومستشار قيادي لكبرى المنظمات',
                      'description' => 'تقديم خطابات افتتاحية ملهمة لقمم كبرى الشركات، والمؤتمرات التقنية العالمية، وخلوات القيادة التنفيذية في أكثر من 35 دولة. تحويل التحولات الاستراتيجية المعقدة إلى لحظات وضوح ملهِمة تحفز فرق العمل على الإنجاز.',
                      'primaryButtonText' => 'استعراض محاور الخطابات',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'مشاهدة مقتطفات المسرح',
                      'secondaryButtonLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'spk_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'التأثير الجماهيري والانتشار العالمي',
                      'subtitle' => 'أرقام وإحصائيات موثقة للحضور الجماهيري وانتشار المؤلفات',
                      'items' => [
                        [
                          'value' => '+250k',
                          'label' => 'حاضر مباشر في المؤتمرات',
                          'icon' => 'fa-solid fa-users'
                        ],
                        [
                          'value' => '+35',
                          'label' => 'دولة أُلقيت فيها الخطابات',
                          'icon' => 'fa-solid fa-globe'
                        ],
                        [
                          'value' => '2x',
                          'label' => 'كتاب من الأكثر مبيعاً عالمياً',
                          'icon' => 'fa-solid fa-book-bookmark'
                        ],
                        [
                          'value' => '99.4%',
                          'label' => 'نسبة رضا منظمي المؤتمرات',
                          'icon' => 'fa-solid fa-star'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'spk_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'الخطابات الرئيسية المميزة',
                      'subtitle' => 'تجارب خطابية ملهمة ومجهزة ومخصصة للقمم والملتقيات التنفيذية الكبرى',
                      'items' => [
                        [
                          'title' => 'القائد المتسارع: قيادة عصر الذكاء الاصطناعي',
                          'description' => 'كيف يقود التنفيذيون التحول السريع مع تزايد وكلاء الذكاء الاصطناعي، وبناء ثقافة مرنة تواكب الاضطراب التقني.',
                          'icon' => 'fa-solid fa-brain',
                          'price' => 'خطاب رئيسي / جلسة حوارية'
                        ],
                        [
                          'title' => 'هندسة المرونة: قيادة الفرق في الأوقات الصعبة',
                          'description' => 'أطر عمل نفسية وتنظيمية مستقاة من مراكز التحكم الفضائية لبناء تركيز واستقرار لا يتزعزع في الأسواق المتقلبة.',
                          'icon' => 'fa-solid fa-shield-heart',
                          'price' => 'خطاب رئيسي / ورشة مكثفة'
                        ],
                        [
                          'title' => 'العقد القادم: الآفاق الاستراتيجية المستقبلية',
                          'description' => 'قراءة استشرافية في اتجاهات الاقتصاد الكلي والتقنيات الصاعدة لتمكين مجالس الإدارة من اقتناص الفرص المستقبلية.',
                          'icon' => 'fa-solid fa-chart-line',
                          'price' => 'جلسة مجلس إدارة خاصة'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'spk_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'طلب المشاركة في المؤتمرات والفعاليات',
                      'subtitle' => 'بوابة التواصل المباشر لمنظمي المؤتمرات، ومكاتب المتحدثين، ومخططي الفعاليات الكبرى.',
                      'email' => 'speaking@abdullah-alrashed.com',
                      'location' => 'الرياض / جنيف / جولات دولية',
                      'availability' => 'متاح لحجوزات القمم والمؤتمرات الكبرى لعام 2026'
                    ]
                  ],
                  [
                    'id' => 'spk_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 د. عبد الله الراشد · متحدث جماهيري دولي.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'digital-creator-media',
            'name' => 'Digital Creator & Video Essayist',
            'name_ar' => 'صانع المحتوى المرئي والمؤثر الرقمي',
            'category' => 'Freelancer',
            'description' => 'High-energy digital media portfolio featuring YouTube subscriber milestones, featured video essay embeds, brand sponsorship showcases, and newsletter lead magnet.',
            'description_ar' => 'معرض أعمال صانع المحتوى الرقمي واليوتيوب مع إحصائيات المشتركين، واستعراض الأفلام والوثائقيات المرئية، ورعاة القناة.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0b0f19',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#ef4444',
                  'secondaryColor' => '#f97316',
                  'cardBg' => '#111827',
                  'cardBorder' => '#1f2937',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.2',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.025em',
                  'borderRadius' => '14px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'dc_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Chloe Zhang · Media',
                      'ctaText' => 'Sponsor a Video',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'dc_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => '450k+ Subscribers · 18M+ Annual Views',
                      'title' => 'Dissecting Tech, Cybernetics & Culture Through Cinematic Video Essays',
                      'subtitle' => 'Independent Digital Filmmaker & Tech Essayist',
                      'description' => 'Producing deeply researched long-form visual documentaries on the intersection of artificial intelligence, digital anthropology, and computing history. Partnering with category-defining brands to tell meaningful stories.',
                      'primaryButtonText' => 'Watch Latest Documentary',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Audience Demographics & Media Kit',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'dc_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Audience Reach & Channel Metrics',
                      'subtitle' => 'Verified engagement statistics across YouTube, Nebula, and newsletter platforms',
                      'items' => [
                        [
                          'value' => '485k',
                          'label' => 'YouTube Channel Subscribers',
                          'icon' => 'fa-brands fa-youtube'
                        ],
                        [
                          'value' => '18.4M',
                          'label' => 'Total Annual Video Views',
                          'icon' => 'fa-solid fa-play'
                        ],
                        [
                          'value' => '64%',
                          'label' => 'Average View Duration (Retention)',
                          'icon' => 'fa-solid fa-chart-pie'
                        ],
                        [
                          'value' => '52k',
                          'label' => 'Weekly Newsletter Readers',
                          'icon' => 'fa-solid fa-envelope-open-text'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'dc_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Featured Long-Form Video Essays',
                      'subtitle' => 'Cinematic investigative documentaries viewed by hundreds of thousands globally',
                      'items' => [
                        [
                          'title' => 'The Silicon Ghosts: Forgotten Operating Systems',
                          'description' => '42-minute documentary uncovering the hidden history of BeOS, NeXTSTEP, and the computing revolutions that almost happened.',
                          'tags' => [
                            'Documentary',
                            'Computing History',
                            '4K Cinema',
                            '850k Views'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'The Algorithm of Solitude: Social Architecture',
                          'description' => 'In-depth analytical essay investigating how recommendation feeds reshaped human relationship formation in the 2020s.',
                          'tags' => [
                            'Cultural Essay',
                            'Tech Analysis',
                            'Animation',
                            '1.2M Views'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Building an 8-Bit Computer from Wire & Logic',
                          'description' => 'Hands-on hardware journey demonstrating how electrical pulses turn into machine intelligence from raw breadboards.',
                          'tags' => [
                            'Hardware',
                            'Educational',
                            'Engineering',
                            '620k Views'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'dc_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Brand Partnerships & Media Inquiries',
                      'subtitle' => 'Selective integrations and bespoke documentary sponsorships with ethical tech brands.',
                      'email' => 'partnerships@chloezhang-media.com',
                      'location' => 'Toronto / Remote',
                      'availability' => 'Booking Q3/Q4 video integrations & brand partnerships'
                    ]
                  ],
                  [
                    'id' => 'dc_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Chloe Zhang. All video rights reserved.',
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
                  'primaryColor' => '#ef4444',
                  'secondaryColor' => '#f97316',
                  'cardBg' => '#111827',
                  'cardBorder' => '#1f2937',
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
                    'id' => 'dc_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'شهد العمري · إنتاج مرئي',
                      'ctaText' => 'رعاية حلقة وثائقية',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'dc_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => '+450 ألف مشترك · +18 مليون مشاهدة سنوية',
                      'title' => 'استكشاف التقنية والمجتمع والذكاء الاصطناعي عبر وثائقيات مرئية سينمائية عميقة',
                      'subtitle' => 'صانعة محتوى ومخرجة وثائقيات تقنية رقمية',
                      'description' => 'إنتاج وثائقيات استقصائية طويلة وذات بحث متعمق تبحث في تقاطع الذكاء الاصطناعي مع الأنثروبولوجيا الرقمية وتاريخ الحوسبة. شراكات رائدة مع علامات تقنية متميزة لرواية قصص هادفة ومؤثرة.',
                      'primaryButtonText' => 'مشاهدة أحدث وثائقي',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'الملف الإعلامي وإحصائيات الجمهور',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'dc_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'انتشار القناة وإحصائيات التفاعل',
                      'subtitle' => 'أرقام حقيقية وموثقة عبر منصات يوتيوب والنشرة البريدية',
                      'items' => [
                        [
                          'value' => '+485k',
                          'label' => 'مشترك في القناة الرسمية',
                          'icon' => 'fa-brands fa-youtube'
                        ],
                        [
                          'value' => '+18.4M',
                          'label' => 'مشاهدة سنوية للأفلام',
                          'icon' => 'fa-solid fa-play'
                        ],
                        [
                          'value' => '64%',
                          'label' => 'متوسط الاحتفاظ بالمشاهد (Retention)',
                          'icon' => 'fa-solid fa-chart-pie'
                        ],
                        [
                          'value' => '+52k',
                          'label' => 'مشترك في النشرة الأسبوعية',
                          'icon' => 'fa-solid fa-envelope-open-text'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'dc_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'أبرز الأفلام والوثائقيات الاستقصائية',
                      'subtitle' => 'أعمال وثائقية سينمائية حصدت مئات آلاف المشاهدات ونالت تقديراً نقدياً واسعاً',
                      'items' => [
                        [
                          'title' => 'أشباح السيليكون: أنظمة التشغيل المنسية',
                          'description' => 'وثائقي من 42 دقيقة يكشف التاريخ السري لأنظمة BeOS وNeXTSTEP والثورات الحاسوبية التي كانت قاب قوسين أو أدنى من تغيير التاريخ.',
                          'tags' => [
                            'وثائقي',
                            'تاريخ الحوسبة',
                            'سينما 4K',
                            '850 ألف مشاهدة'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'خوارزمية العزلة: كيف غيّرتنا الخلاصات',
                          'description' => 'مقال تحليلي مرئي يستقصي كيف أعادت خوارزميات التوصية تشكيل الروابط الإنسانية والعلاقات الاجتماعية في العقد الأخير.',
                          'tags' => [
                            'تحليل ثقافي',
                            'تقنية ومجتمع',
                            'رسوم متحركة',
                            '1.2 مليون مشاهدة'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'بناء حاسوب 8-بت من الأسلاك والبوابات المنطقية',
                          'description' => 'رحلة هندسية عملية توضح كيف تتحول النبضات الكهربائية البسيطة إلى ذكاء حاسوبي عبر لوحات الدوائر الإلكترونية البدائية.',
                          'tags' => [
                            'عتاد حاسوبي',
                            'تعليمي',
                            'هندسة',
                            '620 ألف مشاهدة'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'dc_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'شراكات العلامات التجارية والاستفسارات الإعلامية',
                      'subtitle' => 'نستقبل عروض الرعاية والشراكات الهادفة مع العلامات التقنية الرائدة التي تتوافق مع قيم القناة.',
                      'email' => 'partnerships@shahad-alamri.media',
                      'location' => 'الرياض / عمل عن بعد عالمياً',
                      'availability' => 'متاحة لرعايات الربعين الثالث والرابع'
                    ]
                  ],
                  [
                    'id' => 'dc_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 شهد العمري. جميع الحقوق محفوظة.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'conversion-copywriter',
            'name' => 'Direct-Response Conversion Copywriter',
            'name_ar' => 'كاتب الإعلانات ونصوص المبيعات التحويلية',
            'category' => 'Freelancer',
            'description' => 'Bold high-contrast conversion copywriting portfolio showcasing sales page teardowns, +240% opt-in uplifts, and direct-response email funnels.',
            'description_ar' => 'معرض أعمال كاتب نصوص المبيعات والإعلانات التحويلية مع نتائج نمو المبيعات ونماذج مسارات البريد الإلكتروني والصفحات التحويلية.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#ffffff',
                  'textColor' => '#09090b',
                  'primaryColor' => '#dc2626',
                  'secondaryColor' => '#b91c1c',
                  'cardBg' => '#fafafa',
                  'cardBorder' => '#e4e4e7',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.15',
                  'lineHeightBody' => '1.65',
                  'letterSpacingHeading' => '-0.03em',
                  'borderRadius' => '6px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'cw_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Russell Drake · Copywriting',
                      'ctaText' => 'Request Copy Audit',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'cw_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => '$24M+ Verified Client Sales Driven',
                      'title' => 'Words That Turn Casual Visitors into Committed, Paying Customers',
                      'subtitle' => 'Direct-Response Conversion Copywriter & Offer Strategist',
                      'description' => 'I write sales pages, email onboarding sequences, and high-ticket VSL scripts for B2B SaaS and high-growth consumer brands. Zero fluff. Pure human psychology, relentless objection handling, and clear economic value props.',
                      'primaryButtonText' => 'See Conversion Case Studies',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'How the Audit Works',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'cw_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Audited Conversion Outcomes',
                      'subtitle' => 'Split-tested results from live client landing pages and funnels',
                      'items' => [
                        [
                          'value' => '+240%',
                          'label' => 'Opt-in Rate Increase on SaaS Landing',
                          'icon' => 'fa-solid fa-bolt'
                        ],
                        [
                          'value' => '$24M+',
                          'label' => 'Attributed Client Revenue Generated',
                          'icon' => 'fa-solid fa-dollar-sign'
                        ],
                        [
                          'value' => '48.2%',
                          'label' => 'Average Email Welcome Sequence Open Rate',
                          'icon' => 'fa-solid fa-envelope-circle-check'
                        ],
                        [
                          'value' => '68%',
                          'label' => 'Check-out Abandonment Reduction',
                          'icon' => 'fa-solid fa-cart-shopping'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'cw_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Live Copywriting Teardowns & Results',
                      'subtitle' => 'Before and after split tests with documented conversion lifts',
                      'items' => [
                        [
                          'title' => 'CloudHost: From Technical Jargon to $1.2M ARR',
                          'description' => 'Rewrote enterprise cloud hosting sales page from complex server specs to pain-focused executive value props, lifting demo requests by 185%.',
                          'tags' => [
                            'SaaS Landing',
                            'B2B Copy',
                            'Value Proposition'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'MindPulse: 7-Part Email Welcome Onboarding',
                          'description' => 'Engineered high-converting automated nurture funnel converting free trial users into annual paid subscribers at 22.4% conversion.',
                          'tags' => [
                            'Email Funnel',
                            'Onboarding',
                            'Customer Retention'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'AuraWear: DTC E-Commerce Checkout Rewrite',
                          'description' => 'Simplified product page headline and restructured guarantee badges, increasing mobile purchase completion by 42%.',
                          'tags' => [
                            'E-Commerce',
                            'DTC Copy',
                            'Objection Handling'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'cw_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Book a Risk-Free Copywriting Audit',
                      'subtitle' => 'I review your current landing page and pinpoint 3 immediate revenue leaks within 48 hours.',
                      'email' => 'russell@drakecopywriting.com',
                      'location' => 'Austin / Remote',
                      'availability' => 'Accepting 2 new client copy projects for next month'
                    ]
                  ],
                  [
                    'id' => 'cw_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Russell Drake · Direct Response Copywriting.',
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
                  'textColor' => '#09090b',
                  'primaryColor' => '#dc2626',
                  'secondaryColor' => '#b91c1c',
                  'cardBg' => '#fafafa',
                  'cardBorder' => '#e4e4e7',
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
                    'id' => 'cw_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'وائل السعيد · نصوص مبيعات',
                      'ctaText' => 'طلب تدقيق نصوص المبيعات',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'cw_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => '+24 مليون دولار إيرادات مبيعات موثقة للعملاء',
                      'title' => 'الكلمات الذكية التي تحول الزائر العابر إلى عميل يدفع بحماس واقتناع',
                      'subtitle' => 'كاتب نصوص إعلانات وتحويلات ومصمم عروض تجارية استراتيجية',
                      'description' => 'كتابة صفحات الهبوط، وحملات البريد الإلكتروني الترحيبية، ونصوص الفيديو البيعي لشركات البرمجيات والعلامات التجارية الكبرى. بدون حشو، وبارتكاز كامل على علم النفس البيعي، وتفكيك الاعتراضات، وصياغة القيمة الاقتصادية الحقيقية.',
                      'primaryButtonText' => 'استعراض نتائج نمو التحويل',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'آلية تدقيق النصوص البيعية',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'cw_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'أثر النصوص على المبيعات والتحويل',
                      'subtitle' => 'نتائج اختبارات حقيقية موثقة من صفحات هبوط نشطة وحملات بريدية حية',
                      'items' => [
                        [
                          'value' => '+240%',
                          'label' => 'ارتفاع معدل التسجيل في صفحات الهبوط',
                          'icon' => 'fa-solid fa-bolt'
                        ],
                        [
                          'value' => '+24M$',
                          'label' => 'إيرادات مباشرة محققة لعملاء الاستشارات',
                          'icon' => 'fa-solid fa-dollar-sign'
                        ],
                        [
                          'value' => '48.2%',
                          'label' => 'متوسط معدل فتح رسائل الترحيب البريدية',
                          'icon' => 'fa-solid fa-envelope-circle-check'
                        ],
                        [
                          'value' => '68%',
                          'label' => 'تقليص نسبة التخلي عن سلة الشراء',
                          'icon' => 'fa-solid fa-cart-shopping'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'cw_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'دراسات حالة وتحليلات نصوص بيعية',
                      'subtitle' => 'مقارنات واضحة قبل وبعد إعادة الصياغة مع قياس دقيق لنسب التحويل',
                      'items' => [
                        [
                          'title' => 'منصة CloudHost: من المصطلحات المعقدة إلى 1.2M$ سنوي',
                          'description' => 'إعادة كتابة صفحة استضافة سحابية من المواصفات التقنية الجافة إلى حلول تركز على نقاط ألم متخذ القرار، مما رفع طلبات التجربة بنسبة 185%.',
                          'tags' => [
                            'صفحة هبوط SaaS',
                            'كتابة إعلانية',
                            'عرض القيمة'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'سلسلة الترحيب البريدي لـ MindPulse',
                          'description' => 'هندسة مسار بريدي تلقائي من 7 رسائل يحول مستخدمي التجربة المجانية إلى مشتركين سنويين بمعدل تحويل قياسي بلغ 22.4%.',
                          'tags' => [
                            'مسار بريدي',
                            'استبقاء العملاء',
                            'تحويل المشتركين'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'إعادة صياغة مسار الدفع لمتجر AuraWear',
                          'description' => 'تبسيط عنوان صفحة المنتج وإعادة هيكلة ضمانات الشراء مما أدى إلى زيادة إتمام عمليات الشراء عبر الجوال بنسبة 42%.',
                          'tags' => [
                            'تجارة إلكترونية',
                            'نصوص بيعية',
                            'تفكيك الاعتراضات'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'cw_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'احجز تدقيقاً لنصوص مبيعات موقعك',
                      'subtitle' => 'سأراجع صفحة هبوطك الحالية وأحدد 3 ثغرات تسريب للمبيعات والأرباح خلال 48 ساعة.',
                      'email' => 'wael@drakecopywriting.com',
                      'location' => 'الرياض / دبي / عمل عن بعد عالمياً',
                      'availability' => 'متاح لمشروعين جديدين للشهر القادم'
                    ]
                  ],
                  [
                    'id' => 'cw_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 وائل السعيد · كاتب نصوص المبيعات التحويلية.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'growth-marketing-lead',
            'name' => 'Growth Marketer & Demand Gen Lead',
            'name_ar' => 'خبير التسويق الرقمي واستراتيجيات النمو',
            'category' => 'Freelancer',
            'description' => 'Data-driven growth marketing portfolio highlighting paid acquisition channel audits, CAC/LTV payback curves, and full-funnel experimentation.',
            'description_ar' => 'معرض أعمال خبير التسويق الرقمي واستراتيجيات النمو القائمة على البيانات مع تحسين كلفة الاستحواذ (CAC) وقيمة العميل (LTV).',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0f172a',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#10b981',
                  'secondaryColor' => '#059669',
                  'cardBg' => '#1e293b',
                  'cardBorder' => '#334155',
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
                    'id' => 'gm_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Sarah Jenkins · Growth',
                      'ctaText' => 'Growth Audit',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'gm_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => '$18M+ Managed Ad Spend · $45M New ARR',
                      'title' => 'Scaling Predictable Customer Acquisition Engines for High-Growth Tech Companies',
                      'subtitle' => 'Fractional VP Growth & Demand Generation Specialist',
                      'description' => 'Combining paid acquisition engineering (Google Ads, Meta, LinkedIn), algorithmic lifecycle retention, and rigorous conversion rate experimentation to slash blended CAC while scaling recurring revenue.',
                      'primaryButtonText' => 'Explore Growth Case Studies',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Growth Framework',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'gm_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Growth Metrics & Financial Impact',
                      'subtitle' => 'Hard performance data delivered across client portfolios',
                      'items' => [
                        [
                          'value' => '-38%',
                          'label' => 'Customer Acquisition Cost (CAC) Reduction',
                          'icon' => 'fa-solid fa-arrow-trend-down'
                        ],
                        [
                          'value' => '4.8x',
                          'label' => 'Blended Return on Ad Spend (ROAS)',
                          'icon' => 'fa-solid fa-sack-dollar'
                        ],
                        [
                          'value' => '$45M+',
                          'label' => 'New Annual Recurring Revenue Scaled',
                          'icon' => 'fa-solid fa-chart-line'
                        ],
                        [
                          'value' => '140+',
                          'label' => 'A/B Growth Experiments Run',
                          'icon' => 'fa-solid fa-flask'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'gm_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Documented Growth Case Studies',
                      'subtitle' => 'Full-funnel optimizations from first impression to enterprise contract expansion',
                      'items' => [
                        [
                          'title' => 'FinTech Scaleup: $2M to $10M ARR in 14 Months',
                          'description' => 'Rebuilt search and paid social engine with intent-based audience tiers and dynamic landing pages, slashing CAC by 44%.',
                          'tags' => [
                            'Demand Gen',
                            'Paid Media',
                            'FinTech',
                            'B2B SaaS'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'AI Workflow Tool: 0 to 250k Active Users',
                          'description' => 'Architected viral product-led growth referral loop and programmatic SEO pages generating 140k monthly organic visits.',
                          'tags' => [
                            'PLG',
                            'Viral Loops',
                            'SEO',
                            'Product Growth'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Healthcare SaaS: Enterprise Lead Engine',
                          'description' => 'Targeted account-based marketing (ABM) campaign across LinkedIn and content syndication securing 68 hospital meetings.',
                          'tags' => [
                            'ABM',
                            'LinkedIn Ads',
                            'Enterprise SaaS'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'gm_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Request a Strategic Growth Consultation',
                      'subtitle' => 'Available for fractional VP Growth retainers, channel audits, and enterprise demand gen roadmaps.',
                      'email' => 'sarah@jenkins-growth.io',
                      'location' => 'San Francisco / Remote',
                      'availability' => 'Accepting 1 new fractional advisory retainer'
                    ]
                  ],
                  [
                    'id' => 'gm_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Sarah Jenkins · Growth Marketing Leader.',
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
                  'primaryColor' => '#10b981',
                  'secondaryColor' => '#059669',
                  'cardBg' => '#1e293b',
                  'cardBorder' => '#334155',
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
                    'id' => 'gm_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'نورة السبيعي · استراتيجيات النمو',
                      'ctaText' => 'طلب تدقيق النمو',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'gm_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => '+18 مليون دولار ميزانيات إعلانية مدارة · +45 مليون دولار إيرادات سنوية مضافة',
                      'title' => 'بناء محركات نمو واستحواذ عملاء متوقعة ومستدامة للشركات التقنية سريعة النمو',
                      'subtitle' => 'مستشارة نمو وتسويق استراتيجي متخصصة في توليد الطلب',
                      'description' => 'دمج هندسة الإعلانات الممولة (Google, Meta, LinkedIn)، مع دورات استبقاء العملاء التلقائية، واختبارات تحسين معدلات التحويل لخفض كلفة الاستحواذ (CAC) ومضاعفة الإيرادات المتكررة.',
                      'primaryButtonText' => 'استعراض دراسات حالة النمو',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'منهجية ومراحل النمو',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'gm_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'مؤشرات الأداء والأثر المالي للنمو',
                      'subtitle' => 'بيانات دقيقة وموثقة من حملات ومشاريع العملاء الفعلية',
                      'items' => [
                        [
                          'value' => '-38%',
                          'label' => 'انخفاض في كلفة الاستحواذ على العميل (CAC)',
                          'icon' => 'fa-solid fa-arrow-trend-down'
                        ],
                        [
                          'value' => '4.8x',
                          'label' => 'العائد على الإنفاق الإعلاني (ROAS)',
                          'icon' => 'fa-solid fa-sack-dollar'
                        ],
                        [
                          'value' => '+45M$',
                          'label' => 'إيرادات سنوية متكررة جديدة محققة',
                          'icon' => 'fa-solid fa-chart-line'
                        ],
                        [
                          'value' => '+140',
                          'label' => 'تجربة A/B لاختبار مسارات النمو',
                          'icon' => 'fa-solid fa-flask'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'gm_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'دراسات حالة موثقة لنمو الشركات',
                      'subtitle' => 'تحسينات شاملة من أول ظهور إعلاني حتى إتمام الصفقات وتوسيع العقود',
                      'items' => [
                        [
                          'title' => 'شركة تقنية مالية: من 2 إلى 10 ملايين دولار في 14 شهراً',
                          'description' => 'إعادة بناء محرك البحث والإعلانات الممولة مع صفحات هبوط ديناميكية، مما أدى إلى خفض كلفة الاستحواذ بنسبة 44%.',
                          'tags' => [
                            'توليد الطلب',
                            'إعلانات مدفوعة',
                            'FinTech',
                            'B2B SaaS'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'أداة ذكاء اصطناعي: من صفر إلى 250 ألف مستخدم',
                          'description' => 'هندسة حلقة إحالة نمو معتمدة على المنتج (PLG) وصفحات استهداف لمحركات البحث جذبت 140 ألف زيارة مجانية شهرياً.',
                          'tags' => [
                            'نمو بالمنتج PLG',
                            'حلقات إحالة',
                            'SEO'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'برمجيات الرعاية الصحية: صفقات المستشفيات',
                          'description' => 'حملة تسويق مستندة إلى الحسابات المستهدفة (ABM) عبر LinkedIn أثمرت عن تأمين 68 اجتماعاً مع إدارات المستشفيات الكبرى.',
                          'tags' => [
                            'تسويق حسابات ABM',
                            'LinkedIn',
                            'SaaS للمؤسسات'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'gm_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'طلب استشارة نمو استراتيجية',
                      'subtitle' => 'متاحة للتعاقدات الاستشارية الجزئية (Fractional VP Growth)، وتدقيق القنوات الإعلانية، وخطط التسويق للمؤسسات.',
                      'email' => 'noura@subaie-growth.io',
                      'location' => 'الرياض / دبي / عمل عن بعد عالمياً',
                      'availability' => 'متاحة لعقد استشاري جديد للربع القادم'
                    ]
                  ],
                  [
                    'id' => 'gm_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 نورة السبيعي · استراتيجيات نمو الأعمال.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'social-media-strategist',
            'name' => 'Social Media Strategist & Brand Voice',
            'name_ar' => 'أخصائي استراتيجيات التواصل وإدارة الهوية',
            'category' => 'Freelancer',
            'description' => 'Vibrant social media portfolio featuring viral reach statistics (+85M impressions), multi-platform campaign breakdowns, and brand voice guidelines.',
            'description_ar' => 'معرض أعمال أخصائي استراتيجيات التواصل مع أرقام الانتشار الواسع (+85 مليون ظهور)، وحملات منصات التواصل، وأدلة نبرة العلامة.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#111827',
                  'textColor' => '#f9fafb',
                  'primaryColor' => '#ec4899',
                  'secondaryColor' => '#f43f5e',
                  'cardBg' => '#1f2937',
                  'cardBorder' => '#374151',
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
                    'id' => 'sms_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Alex Rivera · Social Strategist',
                      'ctaText' => 'Work With Me',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'sms_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => '85M+ Annual Organic Impressions · TikTok & X Strategy',
                      'title' => 'Building Unmissable Cultural Relevance for Modern Consumer Brands',
                      'subtitle' => 'Senior Social Media Strategist & Brand Voice Architect',
                      'description' => 'Crafting viral cultural moments, community flywheel mechanics, and witty brand voices across TikTok, X, Instagram, and LinkedIn. Transforming passive followers into vocal brand evangelists.',
                      'primaryButtonText' => 'View Viral Campaigns',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Organic Reach Metrics',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'sms_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Verified Viral Performance Metrics',
                      'subtitle' => 'Organic impressions, community growth, and engagement statistics',
                      'items' => [
                        [
                          'value' => '85M+',
                          'label' => 'Annual Organic Reach Impressions',
                          'icon' => 'fa-solid fa-chart-line'
                        ],
                        [
                          'value' => '4.2x',
                          'label' => 'Average Community Engagement Rate',
                          'icon' => 'fa-solid fa-heart'
                        ],
                        [
                          'value' => '1.2M+',
                          'label' => 'Net New Social Followers Gained',
                          'icon' => 'fa-solid fa-user-plus'
                        ],
                        [
                          'value' => '18',
                          'label' => 'Trending Top-10 Social Campaigns',
                          'icon' => 'fa-solid fa-fire'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sms_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Featured Multi-Platform Campaigns',
                      'subtitle' => 'Breakdowns of cultural moments, memes, and community-driven brand activations',
                      'items' => [
                        [
                          'title' => 'GlowUp Beauty: The Unfiltered TikTok Launch',
                          'description' => 'Zero-budget organic video series leveraging creator stitches that garnered 32M impressions and sold out initial inventory in 48 hours.',
                          'tags' => [
                            'TikTok',
                            'Viral Campaign',
                            'Beauty Brand',
                            'Community'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'DevTools Co: Tech Twitter Voice Overhaul',
                          'description' => 'Transformed corporate developer brand into an authoritative, witty meme presence on X, growing active followers from 12k to 180k.',
                          'tags' => [
                            'X / Twitter',
                            'Developer Voice',
                            'Community Growth'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'UrbanEco: Sustainable Lifestyle Challenge',
                          'description' => '30-day user-generated content challenge engaging 45k participants sharing zero-waste morning habits on Instagram Reels.',
                          'tags' => [
                            'Instagram',
                            'UGC',
                            'Sustainability',
                            'Video Series'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sms_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Initiate Social Strategy Collaboration',
                      'subtitle' => 'Available for brand voice workshops, social campaign strategy retainers, and creator management.',
                      'email' => 'alex@rivera-social.com',
                      'location' => 'Los Angeles / Remote',
                      'availability' => 'Booking brand voice retainers & campaign strategies'
                    ]
                  ],
                  [
                    'id' => 'sms_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Alex Rivera · Social Media Strategist.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#111827',
                  'textColor' => '#f9fafb',
                  'primaryColor' => '#ec4899',
                  'secondaryColor' => '#f43f5e',
                  'cardBg' => '#1f2937',
                  'cardBorder' => '#374151',
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
                    'id' => 'sms_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'ريناد القاسم · استراتيجيات التواصل',
                      'ctaText' => 'طلب استشارة استراتيجية',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'sms_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => '+85 مليون ظهور مجاني سنوياً · استراتيجيات TikTok وX',
                      'title' => 'بناء حضور رقمي لا يمكن تجاهله للعلامات التجارية المعاصرة في شبكات التواصل',
                      'subtitle' => 'أخصائية استراتيجيات التواصل وإدارة نبرة وهوية العلامات',
                      'description' => 'صناعة اللحظات الثقافية واسعة الانتشار، وآليات بناء المجتمعات التفاعلية، ونبرة العلامة المتميزة عبر TikTok وX وInstagram وLinkedIn. تحويل المتابعين العابرين إلى سفراء مخلصين ومروجين للعلامة.',
                      'primaryButtonText' => 'استعراض الحملات واسعة الانتشار',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'إحصائيات الانتشار والتفاعل',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'sms_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'أرقام وإحصائيات الانتشار الموثقة',
                      'subtitle' => 'مؤشرات وصول مجاني وتفاعل مجتمعي ونمو المتابعين عبر المنصات',
                      'items' => [
                        [
                          'value' => '+85M',
                          'label' => 'ظهور مجاني سنوي للمحتوى',
                          'icon' => 'fa-solid fa-chart-line'
                        ],
                        [
                          'value' => '4.2x',
                          'label' => 'معدل التفاعل المجتمعي مقارنة بالسوق',
                          'icon' => 'fa-solid fa-heart'
                        ],
                        [
                          'value' => '+1.2M',
                          'label' => 'متابع جديد تمت إضافتهم لحسابات العملاء',
                          'icon' => 'fa-solid fa-user-plus'
                        ],
                        [
                          'value' => '18',
                          'label' => 'حملة تصدرت قوائم الترند الأكثر تداولاً',
                          'icon' => 'fa-solid fa-fire'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sms_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'أبرز الحملات عبر المنصات المتعددة',
                      'subtitle' => 'تحليلات لحملات التفاعل المجتمعي وإدارة نبرة الصوت والمحتوى واسع الانتشار',
                      'items' => [
                        [
                          'title' => 'إطلاق علامة GlowUp عبر TikTok',
                          'description' => 'سلسلة مقاطع عفوية بالتعاون مع صناع المحتوى حققت 32 مليون ظهور ونفاد الدفعة الأولى من المنتجات خلال 48 ساعة.',
                          'tags' => [
                            'TikTok',
                            'حملة واسعة الانتشار',
                            'منتجات تجميل'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'إعادة بناء نبرة شركة DevTools على منصة X',
                          'description' => 'تحويل علامة برمجية جافة إلى حساب ذكي وجذاب لمجتمع المطورين، مع زيادة المتابعين النشطين من 12 إلى 180 ألف متابع.',
                          'tags' => [
                            'منصة X',
                            'نبرة صوت العلامة',
                            'مجتمع المطورين'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'تحدي الحياة المستدامة UrbanEco',
                          'description' => 'تحدٍ مجتمعي لمدة 30 يوماً شارك فيه 45 ألف مستخدم شاركوا عاداتهم الصباحية الصديقة للبيئة عبر Instagram Reels.',
                          'tags' => [
                            'Instagram',
                            'محتوى المستخدمين UGC',
                            'استدامة'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sms_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'بدء التعاون في استراتيجيات التواصل',
                      'subtitle' => 'متاحة لورش عمل نبرة صوت العلامة، والتعاقدات الشهرية لاستراتيجيات المحتوى، وإدارة الحملات الرقمية.',
                      'email' => 'renad@qasim-social.com',
                      'location' => 'الرياض / دبي / عمل عن بعد عالمياً',
                      'availability' => 'متاحة لعقود إدارة استراتيجيات الهوية الرقمية'
                    ]
                  ],
                  [
                    'id' => 'sms_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 ريناد القاسم · استراتيجيات التواصل الاجتماعي.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'executive-coach',
            'name' => 'Executive Leadership & Performance Coach',
            'name_ar' => 'مدرب القيادة التنفيذية والأداء العالي',
            'category' => 'Freelancer',
            'description' => 'Discreet, dignified coaching portfolio for C-suite executives and founders with confidential advisory frameworks, ICF MCC credentials, and CEO testimonials.',
            'description_ar' => 'معرض أعمال استشاري ومدرب القيادة التنفيذية للرؤساء التنفيذيين مع أطر التدريب السري وشهادات الاعتماد الدولية ICF.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0b132b',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#d4af37',
                  'secondaryColor' => '#b89628',
                  'cardBg' => '#131e3d',
                  'cardBorder' => '#1e2c56',
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
                    'id' => 'ec_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Arthur Pendelton · MCC',
                      'ctaText' => 'Confidential Inquiry',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'ec_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'ICF Master Certified Coach (MCC) · Trusted by 80+ CEOs',
                      'title' => 'Mastering High-Stakes Decision Making & Executive Clarity in Times of Hypergrowth',
                      'subtitle' => 'Executive Leadership & C-Suite Performance Coach',
                      'description' => 'Providing confidential, high-impact one-on-one coaching for technology founders, public company CEOs, and senior partners. Cultivating emotional fortitude, strategic focus, and decisive board leadership.',
                      'primaryButtonText' => 'Executive Coaching Framework',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'CEO Endorsements',
                      'secondaryButtonLink' => '#testimonials'
                    ]
                  ],
                  [
                    'id' => 'ec_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'Executive Advisory Engagements',
                      'subtitle' => 'Confidential retainers structured for leaders navigating rapid inflection points',
                      'items' => [
                        [
                          'title' => 'The CEO Cadence: 1-on-1 Retainer',
                          'description' => 'Bi-weekly strategic sounding board sessions focusing on board communication, executive hiring, and emotional equilibrium.',
                          'icon' => 'fa-solid fa-chess-king',
                          'price' => 'Annual Executive Retainer'
                        ],
                        [
                          'title' => '360° Leadership Diagnostics',
                          'description' => 'Comprehensive stakeholder qualitative feedback matrix revealing non-obvious leadership blind spots and leverage areas.',
                          'icon' => 'fa-solid fa-compass',
                          'price' => 'Comprehensive Audit'
                        ],
                        [
                          'title' => 'Executive Team Alignment Offsite',
                          'description' => 'Intensive 2-day facilitated strategic alignment retreat eliminating functional silos and cementing mutual accountability.',
                          'icon' => 'fa-solid fa-users',
                          'price' => 'Facilitated Retreat'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ec_testimonials',
                    'type' => 'testimonials',
                    'props' => [
                      'title' => 'Confidential Endorsements',
                      'subtitle' => 'Reflections from founders and chief executives coached through major liquidity events',
                      'items' => [
                        [
                          'quote' => 'Arthur gave me the clarity and poise needed to navigate our $1.4B IPO under immense public scrutiny. An indispensable strategic partner.',
                          'author' => 'Marcus Vance',
                          'role' => 'Co-Founder & CEO',
                          'company' => 'CloudScale Systems (Nasdaq)'
                        ],
                        [
                          'quote' => 'His 360 review completely reshaped how I lead our executive team. We reduced C-suite friction and accelerated delivery by a full quarter.',
                          'author' => 'Elena Sterling',
                          'role' => 'Chief Executive Officer',
                          'company' => 'BioThera Diagnostics'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ec_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Initiate Confidential Conversation',
                      'subtitle' => 'All inquiries handled with strict professional discretion under non-disclosure.',
                      'email' => 'arthur@pendelton-coaching.com',
                      'location' => 'Zurich / London / Virtual',
                      'availability' => 'Currently evaluating 2 prospective CEO engagements'
                    ]
                  ],
                  [
                    'id' => 'ec_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Arthur Pendelton MCC. Executive Performance.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0b132b',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#d4af37',
                  'secondaryColor' => '#b89628',
                  'cardBg' => '#131e3d',
                  'cardBorder' => '#1e2c56',
                  'headingFont' => 'Amiri',
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
                    'id' => 'ec_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'د. منصور الهذلي · تدريب تنفيذي',
                      'ctaText' => 'تواصل سري وخاص',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'ec_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'مدرب ماستر معتمد عالمياً من ICF MCC · مستشار لأكثر من 80 رئيساً تنفيذياً',
                      'title' => 'إتقان اتخاذ القرارات الحاسمة وتحقيق الوضوح القيادي في مراحل النمو المتسارع',
                      'subtitle' => 'مدرب القيادة التنفيذية والأداء العالي للرؤساء التنفيذيين والمؤسسين',
                      'description' => 'تقديم استشارات وتدريب فردي عالي الأثر وسري تماماً لمؤسسي الشركات التقنية، والرؤساء التنفيذيين للشركات المساهمة، والشركاء الإداريين. تعزيز الثبات الانفعالي، والتركيز الاستراتيجي، والقيادة الحاسمة في مجالس الإدارة.',
                      'primaryButtonText' => 'أطر التدريب القيادي',
                      'primaryButtonLink' => '#services',
                      'secondaryButtonText' => 'شهادات وتوصيات القادة',
                      'secondaryButtonLink' => '#testimonials'
                    ]
                  ],
                  [
                    'id' => 'ec_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'برامج التدريب والاستشارات التنفيذية',
                      'subtitle' => 'عقود استشارية سرية مصممة للقيادات في مراحل التحول الاستراتيجي الكبرى',
                      'items' => [
                        [
                          'title' => 'برنامج الرؤساء التنفيذيين الفردي',
                          'description' => 'جلسات استشارية استراتيجية نصف شهرية تركز على التواصل مع مجلس الإدارة، واستقطاب القيادات، والتوازن النفسي.',
                          'icon' => 'fa-solid fa-chess-king',
                          'price' => 'عقد تنفيذي سنوي'
                        ],
                        [
                          'title' => 'التقييم القيادي الشامل 360 درجة',
                          'description' => 'مصفوفة تقييم نوعية متكاملة لآراء أصحاب المصلحة تكشف النقاط غير المرئية ومواطن القوة الاستراتيجية للقائد.',
                          'icon' => 'fa-solid fa-compass',
                          'price' => 'تقييم شامل متكامل'
                        ],
                        [
                          'title' => 'خلوة المواءمة الاستراتيجية للفريق التنفيذي',
                          'description' => 'خلوة مكثفة لمدة يومين لتفكيك الحواجز بين القطاعات وترسيخ المسؤولية المشتركة بين أعضاء الإدارة العليا.',
                          'icon' => 'fa-solid fa-users',
                          'price' => 'خلوة قيادية ميسرة'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ec_testimonials',
                    'type' => 'testimonials',
                    'props' => [
                      'title' => 'شهادات وتوصيات سرية',
                      'subtitle' => 'آراء وانطباعات من رؤساء تنفيذيين تمت مرافقتهم وتدريبهم خلال جولات كبرى وصفقات طرح عام',
                      'items' => [
                        [
                          'quote' => 'منحني د. منصور الوضوح والاتزان اللذين احتجتهما لقيادة عملية الطرح العام لشركتنا في السوق المالية. شريك استراتيجي لا غنى عنه.',
                          'author' => 'م. طارق السليمان',
                          'role' => 'المؤسس والرئيس التنفيذي',
                          'company' => 'شركة الأنظمة السحابية المتقدمة'
                        ],
                        [
                          'quote' => 'تقييمه الشامل أعاد صياغة أسلوب قيادتي للإدارة التنفيذية بالكامل. استطعنا إزالة التوترات وتسريع تسليم الأهداف بربع سنوي كامل.',
                          'author' => 'د. ريم الفارس',
                          'role' => 'الرئيس التنفيذي',
                          'company' => 'مجموعة الرعاية المتطورة'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ec_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'بدء محادثة استكشافية سرية',
                      'subtitle' => 'تتم معالجة جميع الاستفسارات بأعلى درجات السرية والاحترافية بموجب اتفاقيات عدم الإفصاح.',
                      'email' => 'mansour@hothali-coaching.com',
                      'location' => 'الرياض / جنيف / جلسات افتراضية',
                      'availability' => 'نستقبل حالياً رئيسين تنفيذيين جديدين فقط'
                    ]
                  ],
                  [
                    'id' => 'ec_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 د. منصور الهذلي · مدرب القيادة التنفيذية.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'startup-founder-angel',
            'name' => 'Tech Entrepreneur & Angel Investor',
            'name_ar' => 'رائد الأعمال التقني والمستثمر الملائكي',
            'category' => 'Freelancer',
            'description' => 'Venture-focused personal portfolio highlighting startup exits, angel portfolio investments (22 companies, 4 exits), thesis philosophy, and office hours.',
            'description_ar' => 'معرض أعمال رائد الأعمال والمستثمر الملائكي يستعرض سجل التخارجات والشركات المستثمر بها وفلسفة الاستثمار وساعات التوجيه.',
            'is_featured' => 0,
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
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '10px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'sfa_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Nathan Vance · Founder & Angel',
                      'ctaText' => 'Pitch a Seed Deal',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'sfa_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => '2x Founder ($140M Exit) · Angel in 22 Startups',
                      'title' => 'Backing Relentless Technical Founders Building Category-Defining Software',
                      'subtitle' => 'Serial Entrepreneur & Early-Stage Angel Investor',
                      'description' => 'Previously founded CloudPulse (Acquired for $140M) and HyperDB. Now writing $50k-$150k first-check angel investments in B2B SaaS, developer tooling, and applied machine learning architectures.',
                      'primaryButtonText' => 'View Angel Portfolio',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Investment Thesis',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'sfa_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Track Record & Capital Deployed',
                      'subtitle' => 'Verified milestone metrics from startup ventures and angel syndicate',
                      'items' => [
                        [
                          'value' => '22',
                          'label' => 'Seed Portfolio Companies Backed',
                          'icon' => 'fa-solid fa-briefcase'
                        ],
                        [
                          'value' => '4x',
                          'label' => 'Documented Liquidity Exits',
                          'icon' => 'fa-solid fa-arrow-trend-up'
                        ],
                        [
                          'value' => '$4.2M',
                          'label' => 'Personal Angel Capital Deployed',
                          'icon' => 'fa-solid fa-hand-holding-dollar'
                        ],
                        [
                          'value' => '100+',
                          'label' => 'Founder Mentoring Hours Annually',
                          'icon' => 'fa-solid fa-clock'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sfa_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Selected Angel Investments & Exits',
                      'subtitle' => 'Pioneering early-stage companies backed from pre-seed and seed rounds',
                      'items' => [
                        [
                          'title' => 'CloudPulse (Founder Exit)',
                          'description' => 'Built unified cloud latency observability platform scaled to $18M ARR before acquisition by public enterprise tech leader.',
                          'tags' => [
                            'Founder',
                            'Acquired ($140M)',
                            'SaaS',
                            'Infrastructure'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'NeuralForge AI (Angel Investment)',
                          'description' => 'Seed investor in autonomous code generation engine now valued at $220M with leading Tier-1 VC syndicate.',
                          'tags' => [
                            'Angel Pre-Seed',
                            'AI Code Generation',
                            'Series B'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'KubeMesh Security (Angel Investment)',
                          'description' => 'Zero-trust runtime container security provider acquired by global cybersecurity conglomerate in 2024.',
                          'tags' => [
                            'Angel Seed',
                            'Acquired (2024)',
                            'Cybersecurity'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sfa_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Pitch Your Seed Stage Startup',
                      'subtitle' => 'Fast decisions (under 72 hours). Open to high-conviction technical founders in devtools, AI, and B2B SaaS.',
                      'email' => 'nathan@vance-ventures.com',
                      'location' => 'San Francisco / New York',
                      'availability' => 'Actively reviewing early-stage pre-seed & seed decks'
                    ]
                  ],
                  [
                    'id' => 'sfa_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Nathan Vance. Founder & Investor.',
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
                  'borderRadius' => '10px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'sfa_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'تركي الشريف · رائد أعمال ومستثمر',
                      'ctaText' => 'عرض مشروع للاستثمار',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'sfa_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'مؤسس شركتين تقنيتين (تخارج بـ 140M$) · مستثمر ملائكي في 22 شركة ناشئة',
                      'title' => 'الاستثمار في المؤسسين التقنيين المتميزين وبناء شركات برمجية تقود قطاعاتها',
                      'subtitle' => 'رائد أعمال متسلسل ومستثمر ملائكي في المراحل الأولية',
                      'description' => 'أسس سابقاً منصة CloudPulse (التي تم الاستحواذ عليها بـ 140 مليون دولار) وHyperDB. أقدم الآن شيكات استثمارية أولية تتراوح بين 50 إلى 150 ألف دولار في برمجيات الأعمال B2B، وأدوات المطورين، وتطبيقات الذكاء الاصطناعي.',
                      'primaryButtonText' => 'استعراض محفظة الاستثمارات',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'فلسفة ومعايير الاستثمار',
                      'secondaryButtonLink' => '#about'
                    ]
                  ],
                  [
                    'id' => 'sfa_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'سجل الإنجاز ورأس المال المستثمر',
                      'subtitle' => 'أرقام وإحصائيات موثقة من المشاريع الريادية والاستثمارات الملائكية',
                      'items' => [
                        [
                          'value' => '22',
                          'label' => 'شركة ناشئة تم الاستثمار بها في مرحلة البذرة',
                          'icon' => 'fa-solid fa-briefcase'
                        ],
                        [
                          'value' => '4x',
                          'label' => 'تخارجات مالية ناجحة موثقة',
                          'icon' => 'fa-solid fa-arrow-trend-up'
                        ],
                        [
                          'value' => '+4.2M$',
                          'label' => 'رأس مال ملائكي مباشر تم ضخه',
                          'icon' => 'fa-solid fa-hand-holding-dollar'
                        ],
                        [
                          'value' => '+100',
                          'label' => 'ساعة توجيه سنوية للمؤسسين',
                          'icon' => 'fa-solid fa-clock'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sfa_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'أبرز الاستثمارات والتخارجات السابقة',
                      'subtitle' => 'شركات رائدة تم دعمها من جولات ما قبل البذرة والبذرة الأولى',
                      'items' => [
                        [
                          'title' => 'منصة CloudPulse (تخارج المؤسس)',
                          'description' => 'بناء منصة موحدة لمراقبة زمن استجابة السحابة وتنميتها إلى إيرادات سنوية 18 مليون دولار قبل الاستحواذ عليها من شركة تقنية كبرى.',
                          'tags' => [
                            'مؤسس',
                            'تخارج (140M$)',
                            'SaaS',
                            'بنية سحابية'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'شركة NeuralForge للذكاء الاصطناعي',
                          'description' => 'مستثمر بذرة في محرك توليد الأكواد البرمجية المستقل والذي يقدر تقييمه اليوم بـ 220 مليون دولار مع صناديق عالمية كبرى.',
                          'tags' => [
                            'استثمار ملائكي بذرة',
                            'ذكاء اصطناعي',
                            'جولة B'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'أمن الحاويات KubeMesh (تخارج)',
                          'description' => 'مزود أمني لحماية بيئات الحاويات بنظام صفرية الثقة، تم الاستحواذ عليه من قبل تكتل أمن سيبراني عالمي في 2024.',
                          'tags' => [
                            'استثمار ملائكي',
                            'تخارج (2024)',
                            'أمن سيبراني'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sfa_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'عرض مشروعك الناشئ للاستثمار',
                      'subtitle' => 'قرارات استثمارية سريعة (خلال 72 ساعة). أبحث عن مؤسسين تقنيين متميزين في برمجيات B2B والذكاء الاصطناعي وأدوات المطورين.',
                      'email' => 'turki@alsharif-ventures.com',
                      'location' => 'الرياض / سان فرانسيسكو',
                      'availability' => 'أستقبل حالياً عروض المشاريع في مرحلة البذرة وما قبلها'
                    ]
                  ],
                  [
                    'id' => 'sfa_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 تركي الشريف · رائد أعمال ومستثمر ملائكي.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'creative-consultant-studio',
            'name' => 'Creative Operations & Studio Consultant',
            'name_ar' => 'مستشار العمليات الإبداعية وإدارة الاستوديوهات',
            'category' => 'Freelancer',
            'description' => 'Calm, architectural creative operations portfolio detailing agency workflows, design tool stack integrations, sprint cadences, and client retainer systems.',
            'description_ar' => 'معرض أعمال مستشار العمليات الإبداعية وهندسة استوديوهات التصميم مع التركيز على تدفقات العمل المؤسسية وعقود الاحتفاظ بالعملاء.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#fafaf9',
                  'textColor' => '#1c1917',
                  'primaryColor' => '#0284c7',
                  'secondaryColor' => '#0369a1',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#e7e5e4',
                  'headingFont' => 'Plus Jakarta Sans',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.65',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '8px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'co_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Isabelle Dubois · Creative Ops',
                      'ctaText' => 'Studio Audit',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'co_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Former Head of Creative Ops @ Pentagram & Droga5 Alumni',
                      'title' => 'Streamlining Agency Workflows, Creative Tooling & Profitability Systems',
                      'subtitle' => 'Creative Operations & Studio Systems Consultant',
                      'description' => 'Helping boutique design studios and global in-house creative departments eliminate operational chaos, structure predictable client retainers, and double creative output without burnout.',
                      'primaryButtonText' => 'View Operations Frameworks',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Consulting Methodology',
                      'secondaryButtonLink' => '#services'
                    ]
                  ],
                  [
                    'id' => 'co_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'Studio Consulting Engagements',
                      'subtitle' => 'Practical systems to align creative brilliance with business predictability',
                      'items' => [
                        [
                          'title' => 'The Studio Operations Diagnostic',
                          'description' => 'Comprehensive 3-week operational audit identifying profit leakages, resource bottlenecks, and tooling friction.',
                          'icon' => 'fa-solid fa-gears',
                          'price' => 'Diagnostic Sprint'
                        ],
                        [
                          'title' => 'Toolchain & Git-For-Design Architecture',
                          'description' => 'Integration of Figma variables, Asana sprint boards, and Frame.io client review protocols for zero-delay signoffs.',
                          'icon' => 'fa-solid fa-cubes',
                          'price' => 'System Implementation'
                        ],
                        [
                          'title' => 'Retainer & Profitability Restructuring',
                          'description' => 'Transitioning billing models from erratic time-and-materials to high-margin recurring client strategic retainers.',
                          'icon' => 'fa-solid fa-chart-pie',
                          'price' => 'Pricing Strategy'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'co_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Book a Studio Operations Review',
                      'subtitle' => 'Available for creative studio audits, operations leadership retainers, and tooling overhauls.',
                      'email' => 'isabelle@dubois-creativeops.com',
                      'location' => 'Paris / London / Remote',
                      'availability' => 'Accepting 2 studio audits for next quarter'
                    ]
                  ],
                  [
                    'id' => 'co_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Isabelle Dubois · Creative Operations.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#fafaf9',
                  'textColor' => '#1c1917',
                  'primaryColor' => '#0284c7',
                  'secondaryColor' => '#0369a1',
                  'cardBg' => '#ffffff',
                  'cardBorder' => '#e7e5e4',
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
                    'id' => 'co_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'هناء المرشد · إدارة العمليات الإبداعية',
                      'ctaText' => 'طلب تدقيق الأستوديو',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'co_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'رئيسة سابقة للعمليات الإبداعية في وكالات عالمية كبرى',
                      'title' => 'تنظيم تدفقات عمل الأستوديوهات الإبداعية وهندسة أدوات الإنتاج والربحية المؤسسية',
                      'subtitle' => 'مستشارة العمليات الإبداعية ونظم إدارة استوديوهات التصميم',
                      'description' => 'مساعدة استوديوهات التصميم والوكالات الإبداعية وأقسام التصميم الداخلية على إزالة الفوضى التشغيلية، وهيكلة عقود الاحتفاظ الشهرية المربحة، ومضاعفة الإنتاج الإبداعي دون إجهاد لفرق العمل.',
                      'primaryButtonText' => 'استعراض أطر العمليات',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'منهجية الاستشارات',
                      'secondaryButtonLink' => '#services'
                    ]
                  ],
                  [
                    'id' => 'co_services',
                    'type' => 'services',
                    'props' => [
                      'title' => 'برامج استشارات الأستوديوهات والوكالات',
                      'subtitle' => 'أنظمة عملية واضحة تواءم بين الإبداع الفني والربحية المالية المنتظمة',
                      'items' => [
                        [
                          'title' => 'التشخيص التشغيلي الشامل للأستوديو',
                          'description' => 'تدقيق تشغيلي مكثف لمدة 3 أسابيع يحدد تسريبات الأرباح، واختناقات الموارد، واحتكاكات الأدوات التقنية.',
                          'icon' => 'fa-solid fa-gears',
                          'price' => 'دورة تشخيص مكثفة'
                        ],
                        [
                          'title' => 'هندسة حزمة الأدوات ومزامنة التصميم',
                          'description' => 'ربط متغيرات Figma بأنظمة Asana وبروتوكولات مراجعة العملاء عبر Frame.io لضمان اعتمادات سريعة بدون تأخير.',
                          'icon' => 'fa-solid fa-cubes',
                          'price' => 'تطبيق الأنظمة'
                        ],
                        [
                          'title' => 'إعادة هيكلة عقود الاحتفاظ والربحية',
                          'description' => 'تحويل نماذج الفوترة من الحساب العشوائي بالساعة إلى عقود استشارية شهرية متكررة عالية الهامش الربحي.',
                          'icon' => 'fa-solid fa-chart-pie',
                          'price' => 'استراتيجية التسعير'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'co_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'حجز مراجعة لعمليات الأستوديو الإبداعي',
                      'subtitle' => 'متاحة لتدقيق عمليات وكالات التصميم، وعقود إدارة العمليات الاستشارية، وتحديث البنية التقنية.',
                      'email' => 'hana@murshid-ops.com',
                      'location' => 'الرياض / دبي / عمل عن بعد عالمياً',
                      'availability' => 'أستقبل تدقيقين تشغيليين للربع القادم'
                    ]
                  ],
                  [
                    'id' => 'co_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 هناء المرشد · استشارات العمليات الإبداعية.',
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
