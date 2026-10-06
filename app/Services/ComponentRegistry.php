<?php
namespace App\Services;

require_once __DIR__ . '/../Core/Security.php';

use App\Core\Security;

/**
 * AI Portfolio Builder - Component & Section Registry
 * Defines all available sections, components, default props, editable schemas,
 * and high-performance HTML renderers for both the Visual Builder and the Public Website.
 */
class ComponentRegistry {

    /**
     * Get list of all registered section definitions for the Builder palette
     */
    public static function getAvailableSections(): array {
        return [
            [
                'type' => 'navbar',
                'name' => 'Navigation Bar',
                'name_ar' => 'شريط التنقل',
                'category' => 'navigation',
                'icon' => 'fa-bars',
                'description' => 'Header navigation with brand logo and page links',
                'description_ar' => 'شريط علوي يحتوي على اسم الموقع وروابط الصفحات'
            ],
            [
                'type' => 'hero',
                'name' => 'Hero Banner',
                'name_ar' => 'واجهة البداية (Hero)',
                'category' => 'header',
                'icon' => 'fa-star',
                'description' => 'High-impact introduction with headline, bio, avatar, and call to action',
                'description_ar' => 'مقدمة بصرية قوية مع عنوان، نبذة، صورة شخصية، وأزرار تفاعلية'
            ],
            [
                'type' => 'about',
                'name' => 'About Me',
                'name_ar' => 'من أنا / النبذة',
                'category' => 'content',
                'icon' => 'fa-user',
                'description' => 'Detailed personal bio, highlights, philosophies, or story',
                'description_ar' => 'نبذة تعريفية تفصيلية، إنجازاتك، وقصتك المهنية'
            ],
            [
                'type' => 'projects',
                'name' => 'Projects & Work',
                'name_ar' => 'المشاريع والأعمال',
                'category' => 'portfolio',
                'icon' => 'fa-briefcase',
                'description' => 'Showcase of selected works, case studies, live links, and GitHub repos',
                'description_ar' => 'استعراض للمشاريع، الصور، روابط التجربة، والأكواد'
            ],
            [
                'type' => 'skills',
                'name' => 'Skills & Tech Stack',
                'name_ar' => 'المهارات والتقنيات',
                'category' => 'content',
                'icon' => 'fa-code',
                'description' => 'Technical skills displayed as interactive badges, bars, or categorized tags',
                'description_ar' => 'المهارات والأدوات مقسمة ومصنفة بشكل أنيق'
            ],
            [
                'type' => 'experience',
                'name' => 'Work Experience',
                'name_ar' => 'الخبرات المهنية',
                'category' => 'career',
                'icon' => 'fa-building',
                'description' => 'Career timeline highlighting previous roles, companies, and achievements',
                'description_ar' => 'سجل الخبرات والوظائف السابقة والإنجازات'
            ],
            [
                'type' => 'education',
                'name' => 'Education & Certificates',
                'name_ar' => 'التعليم والشهادات',
                'category' => 'career',
                'icon' => 'fa-graduation-cap',
                'description' => 'Degrees, academic accomplishments, and verified certifications',
                'description_ar' => 'الشهادات الأكاديمية والمهنية والتراخيص'
            ],
            [
                'type' => 'services',
                'name' => 'Services & Offerings',
                'name_ar' => 'الخدمات التي أقدمها',
                'category' => 'business',
                'icon' => 'fa-layer-group',
                'description' => 'What you offer to clients, deliverables, and service cards',
                'description_ar' => 'الخدمات والحلول التي تقدمها للعملاء والشركات'
            ],
            [
                'type' => 'testimonials',
                'name' => 'Testimonials & Reviews',
                'name_ar' => 'التوصيات والآراء',
                'category' => 'social_proof',
                'icon' => 'fa-quote-left',
                'description' => 'Client recommendations, quotes, and trust badges',
                'description_ar' => 'آراء العملاء، شهادات الزملاء، وتوصيات العمل'
            ],
            [
                'type' => 'stats',
                'name' => 'Key Metrics & Stats',
                'name_ar' => 'الإحصائيات والأرقام',
                'category' => 'social_proof',
                'icon' => 'fa-chart-pie',
                'description' => 'Key impact numbers, completed projects, clients served, years experience',
                'description_ar' => 'أرقام بارزة: سنوات الخبرة، المشاريع المنجزة، والعملاء'
            ],
            [
                'type' => 'gallery',
                'name' => 'Media & Gallery',
                'name_ar' => 'معرض الصور والميديا',
                'category' => 'media',
                'icon' => 'fa-images',
                'description' => 'Visual showcase grid for photographs, designs, or artwork',
                'description_ar' => 'معرض بصري للصور والتصاميم والأعمال الفنية'
            ],
            [
                'type' => 'timeline',
                'name' => 'Milestones Timeline',
                'name_ar' => 'الجدول الزمني / المحطات',
                'category' => 'career',
                'icon' => 'fa-stream',
                'description' => 'Chronological journey of milestones and career steps',
                'description_ar' => 'محطات بارزة في مسيرتك المهنية بتسلسل زمني'
            ],
            [
                'type' => 'faq',
                'name' => 'FAQ / Questions',
                'name_ar' => 'الأسئلة الشائعة',
                'category' => 'business',
                'icon' => 'fa-question-circle',
                'description' => 'Frequently asked questions accordion for potential clients or employers',
                'description_ar' => 'أسئلة شائعة وإجاباتها لتوضيح آلية العمل'
            ],
            [
                'type' => 'cta',
                'name' => 'Call To Action',
                'name_ar' => 'دعوة لاتخاذ إجراء (CTA)',
                'category' => 'action',
                'icon' => 'fa-bullhorn',
                'description' => 'Focused banner inviting visitors to collaborate, hire, or contact you',
                'description_ar' => 'شريط بارز للتعاون أو التوظيف وبدء العمل معاً'
            ],
            [
                'type' => 'contact',
                'name' => 'Contact & Inquiries',
                'name_ar' => 'نموذج التواصل ومعلومات الاتصال',
                'category' => 'action',
                'icon' => 'fa-envelope',
                'description' => 'Interactive contact form, direct email, location, and availability status',
                'description_ar' => 'نموذج إرسال رسائل ومعلومات البريد والموقع والتواجد'
            ],
            [
                'type' => 'social',
                'name' => 'Social Profiles',
                'name_ar' => 'روابط شبكات التواصل',
                'category' => 'social_proof',
                'icon' => 'fa-share-nodes',
                'description' => 'Interactive row of verified social media icons and links',
                'description_ar' => 'أيقونات وروابط الحسابات على GitHub, LinkedIn, X, إلخ'
            ],
            [
                'type' => 'custom_html',
                'name' => 'Custom Content / Embed',
                'name_ar' => 'محتوى مخصص / كود آمن',
                'category' => 'advanced',
                'icon' => 'fa-code-branch',
                'description' => 'Add custom sanitized text, markdown, or embed code',
                'description_ar' => 'إضافة محتوى مخصص أو نصوص منسقة'
            ],
            [
                'type' => 'footer',
                'name' => 'Website Footer',
                'name_ar' => 'تذييل الموقع (Footer)',
                'category' => 'navigation',
                'icon' => 'fa-shoe-prints',
                'description' => 'Bottom footer with copyright, links, and minimal platform badge',
                'description_ar' => 'تذييل الموقع مع روابط وحقوق الملكية'
            ],
        ];
    }

    /**
     * Generate default structure and props for a newly added section
     */
    public static function createDefaultSection(string $type): array {
        $id = 'sec_' . substr(md5(uniqid($type, true)), 0, 8);
        $defaults = self::getDefaultPropsForType($type);

        return [
            'id' => $id,
            'type' => $type,
            'props' => $defaults['props'],
            'styles' => $defaults['styles'],
            'responsive' => [
                'desktop' => ['visible' => true],
                'tablet' => ['visible' => true],
                'mobile' => ['visible' => true],
            ]
        ];
    }

    /**
     * Get default props & styles for a given section type
     */
    public static function getDefaultPropsForType(string $type): array {
        $styles = [
            'paddingTop' => '64px',
            'paddingBottom' => '64px',
            'backgroundColor' => 'transparent',
            'textColor' => 'inherit',
            'textAlign' => 'start',
            'containerWidth' => 'max-w-6xl',
        ];

        switch ($type) {
            case 'navbar':
                return [
                    'props' => [
                        'brandText' => 'Portfolio',
                        'logoUrl' => '',
                        'ctaText' => 'Get in Touch',
                        'ctaLink' => '#contact',
                        'showPages' => true,
                        'sticky' => true,
                    ],
                    'styles' => array_merge($styles, [
                        'paddingTop' => '16px',
                        'paddingBottom' => '16px',
                    ])
                ];

            case 'hero':
                return [
                    'props' => [
                        'badge' => 'Available for new opportunities',
                        'title' => 'Hello, I am Alex Vance',
                        'subtitle' => 'Senior Full Stack Engineer & Product Designer',
                        'description' => 'Building high-performance, accessible digital applications that delight millions of users worldwide.',
                        'avatarUrl' => '',
                        'primaryButtonText' => 'View Projects',
                        'primaryButtonLink' => '#projects',
                        'secondaryButtonText' => 'Contact Me',
                        'secondaryButtonLink' => '#contact',
                        'layout' => 'split', // 'split', 'centered', 'terminal', 'minimal'
                    ],
                    'styles' => array_merge($styles, [
                        'paddingTop' => '80px',
                        'paddingBottom' => '80px',
                    ])
                ];

            case 'about':
                return [
                    'props' => [
                        'title' => 'About Me',
                        'subtitle' => 'Background, Passion & Approach',
                        'bio' => "I have over 8 years of experience designing and shipping scalable digital experiences. My focus bridges engineering precision with intuitive human design.\n\nI believe great software should feel fast, dependable, and delightfully effortless.",
                        'highlights' => [
                            ['label' => 'Experience', 'value' => '8+ Years'],
                            ['label' => 'Projects Completed', 'value' => '40+ Projects'],
                            ['label' => 'Location', 'value' => 'Riyadh / Remote'],
                        ],
                        'imageUrl' => '',
                    ],
                    'styles' => $styles
                ];

            case 'projects':
                return [
                    'props' => [
                        'title' => 'Featured Projects',
                        'subtitle' => 'Selected case studies and open-source systems',
                        'items' => [
                            [
                                'id' => 'p1',
                                'title' => 'Nova Cloud Analytics',
                                'description' => 'Real-time telemetry and metrics visualization engine processing 50M+ events daily with sub-second queries.',
                                'tags' => ['TypeScript', 'React', 'Go', 'ClickHouse'],
                                'liveUrl' => 'https://example.com',
                                'githubUrl' => 'https://github.com',
                                'imageUrl' => '',
                            ],
                            [
                                'id' => 'p2',
                                'title' => 'Zenith Design System',
                                'description' => 'Accessible, component-driven design system powering multi-brand enterprise web applications.',
                                'tags' => ['Figma', 'CSS Tokens', 'Web Components'],
                                'liveUrl' => 'https://example.com',
                                'githubUrl' => 'https://github.com',
                                'imageUrl' => '',
                            ],
                            [
                                'id' => 'p3',
                                'title' => 'Nexus Microservices Gateway',
                                'description' => 'Ultra-low-latency API gateway featuring automated circuit-breaking and rate limiting.',
                                'tags' => ['Rust', 'Docker', 'Redis'],
                                'liveUrl' => 'https://example.com',
                                'githubUrl' => 'https://github.com',
                                'imageUrl' => '',
                            ],
                        ],
                        'columns' => 3,
                    ],
                    'styles' => $styles
                ];

            case 'skills':
                return [
                    'props' => [
                        'title' => 'Technical Arsenal & Skills',
                        'subtitle' => 'Technologies and frameworks I utilize regularly',
                        'styleType' => 'badges', // 'badges', 'cards', 'bars'
                        'categories' => [
                            [
                                'name' => 'Frontend & UI',
                                'skills' => ['React', 'Next.js', 'TypeScript', 'Tailwind / Vanilla CSS', 'Vue.js']
                            ],
                            [
                                'name' => 'Backend & Cloud',
                                'skills' => ['Node.js', 'Python', 'PHP / Laravel', 'PostgreSQL', 'Docker', 'AWS']
                            ],
                            [
                                'name' => 'Tools & Architecture',
                                'skills' => ['Git', 'CI/CD Pipelines', 'REST & GraphQL', 'Figma', 'Linux SRE']
                            ]
                        ]
                    ],
                    'styles' => $styles
                ];

            case 'experience':
                return [
                    'props' => [
                        'title' => 'Work Experience',
                        'subtitle' => 'Career milestones and leadership roles',
                        'items' => [
                            [
                                'role' => 'Lead Software Engineer',
                                'company' => 'Acme Technologies',
                                'period' => '2022 - Present',
                                'description' => 'Architected customer-facing SaaS core platform. Mentored an engineering squad of 8 developers.',
                            ],
                            [
                                'role' => 'Senior Full Stack Developer',
                                'company' => 'HyperScale Media',
                                'period' => '2019 - 2022',
                                'description' => 'Engineered high-throughput content delivery APIs and redesigned the responsive user dashboard.',
                            ],
                            [
                                'role' => 'Frontend Specialist',
                                'company' => 'Studio Digital',
                                'period' => '2017 - 2019',
                                'description' => 'Built bespoke web applications and interactive visual experiences for Fortune 500 brands.',
                            ],
                        ]
                    ],
                    'styles' => $styles
                ];

            case 'education':
                return [
                    'props' => [
                        'title' => 'Education & Qualifications',
                        'subtitle' => 'Degrees, academic credentials, and certifications',
                        'items' => [
                            [
                                'degree' => 'B.Sc. in Computer Science',
                                'institution' => 'University of Science & Technology',
                                'period' => '2013 - 2017',
                                'description' => 'Graduated with First-Class Honors. Focused on Distributed Computing and Human-Computer Interaction.',
                            ],
                            [
                                'degree' => 'AWS Certified Solutions Architect',
                                'institution' => 'Amazon Web Services',
                                'period' => '2023',
                                'description' => 'Professional certification in cloud infrastructure, resilience, and security architectures.',
                            ]
                        ]
                    ],
                    'styles' => $styles
                ];

            case 'services':
                return [
                    'props' => [
                        'title' => 'What I Deliver',
                        'subtitle' => 'Tailored services for ambitious teams and organizations',
                        'items' => [
                            [
                                'icon' => 'fa-code',
                                'title' => 'Full-Stack Web Development',
                                'description' => 'End-to-end web apps crafted with modern standards, robust architectures, and clean code.'
                            ],
                            [
                                'icon' => 'fa-mobile-screen',
                                'title' => 'Mobile & Responsive Systems',
                                'description' => 'Responsive web interfaces and hybrid apps tested thoroughly across devices and screen sizes.'
                            ],
                            [
                                'icon' => 'fa-gauge-high',
                                'title' => 'Performance & Security Audit',
                                'description' => 'Deep-dive audits into application speed, core web vitals, accessibility, and vulnerability mitigation.'
                            ]
                        ]
                    ],
                    'styles' => $styles
                ];

            case 'testimonials':
                return [
                    'props' => [
                        'title' => 'Endorsements',
                        'subtitle' => 'What colleagues and leaders say about collaborating with me',
                        'items' => [
                            [
                                'name' => 'Sarah Jenkins',
                                'role' => 'VP of Engineering at CloudScale',
                                'content' => 'An exceptional engineer who brings clarity, speed, and architectural elegance to every project. Highly recommended!',
                                'avatar' => '',
                            ],
                            [
                                'name' => 'Omar Al-Mansoor',
                                'role' => 'Product Director at FinTech Hub',
                                'content' => 'Delivered our core product on schedule with unmatched attention to detail and user satisfaction.',
                                'avatar' => '',
                            ]
                        ]
                    ],
                    'styles' => $styles
                ];

            case 'stats':
                return [
                    'props' => [
                        'title' => 'By The Numbers',
                        'subtitle' => 'Measurable impact over my professional career',
                        'items' => [
                            ['value' => '8+', 'label' => 'Years Experience'],
                            ['value' => '50+', 'label' => 'Shipped Projects'],
                            ['value' => '99.9%', 'label' => 'Uptime Delivered'],
                            ['value' => '1M+', 'label' => 'Active Monthly Users'],
                        ]
                    ],
                    'styles' => $styles
                ];

            case 'gallery':
                return [
                    'props' => [
                        'title' => 'Visual Gallery',
                        'subtitle' => 'Screenshots, prototypes, and visual explorations',
                        'images' => [
                            ['url' => '', 'caption' => 'Design System UI Kit', 'aspect' => '16/9'],
                            ['url' => '', 'caption' => 'Mobile Banking Concept', 'aspect' => '16/9'],
                            ['url' => '', 'caption' => 'Analytics Workspace', 'aspect' => '16/9'],
                        ]
                    ],
                    'styles' => $styles
                ];

            case 'faq':
                return [
                    'props' => [
                        'title' => 'Frequently Asked Questions',
                        'subtitle' => 'Answers to common inquiries regarding working together',
                        'items' => [
                            [
                                'q' => 'What is your typical project timeline?',
                                'a' => 'Most projects range between 2 to 8 weeks depending on scope, architecture requirements, and deliverables.'
                            ],
                            [
                                'q' => 'Are you available for remote or contract roles?',
                                'a' => 'Yes, I am fully equipped for asynchronous, high-trust remote collaboration across global timezones.'
                            ],
                            [
                                'q' => 'What is your technical stack of choice?',
                                'a' => 'I specialize in TypeScript, modern modern web standards, Node.js/Go backend systems, and clean SQL databases.'
                            ]
                        ]
                    ],
                    'styles' => $styles
                ];

            case 'cta':
                return [
                    'props' => [
                        'headline' => 'Have a project in mind or looking for a specialist?',
                        'subheadline' => 'Let’s discuss how we can turn your vision into an exceptional digital experience.',
                        'buttonText' => 'Start a Conversation',
                        'buttonLink' => '#contact',
                    ],
                    'styles' => array_merge($styles, [
                        'paddingTop' => '64px',
                        'paddingBottom' => '64px',
                    ])
                ];

            case 'contact':
                return [
                    'props' => [
                        'title' => 'Get In Touch',
                        'subtitle' => 'Feel free to reach out for inquiries, consulting, or speaking engagements',
                        'email' => 'alex@example.com',
                        'location' => 'Riyadh / Open to Global Remote',
                        'availability' => 'Available for selective Q3/Q4 contracts',
                        'showForm' => true,
                    ],
                    'styles' => $styles
                ];

            case 'social':
                return [
                    'props' => [
                        'title' => 'Connect Online',
                        'links' => [
                            ['platform' => 'github', 'url' => 'https://github.com', 'label' => 'GitHub', 'icon' => 'fa-brands fa-github'],
                            ['platform' => 'linkedin', 'url' => 'https://linkedin.com', 'label' => 'LinkedIn', 'icon' => 'fa-brands fa-linkedin'],
                            ['platform' => 'twitter', 'url' => 'https://x.com', 'label' => 'X / Twitter', 'icon' => 'fa-brands fa-x-twitter'],
                            ['platform' => 'email', 'url' => 'mailto:alex@example.com', 'label' => 'Email', 'icon' => 'fa-solid fa-envelope'],
                        ]
                    ],
                    'styles' => $styles
                ];

            case 'custom_html':
                return [
                    'props' => [
                        'htmlContent' => '<div class="custom-block p-6 rounded-xl border border-neutral-700/50 text-center"><p class="text-lg">Custom content block ready for your markdown, quotes, or components.</p></div>'
                    ],
                    'styles' => $styles
                ];

            case 'footer':
                return [
                    'props' => [
                        'copyrightText' => '© ' . date('Y') . ' All rights reserved.',
                        'showSocials' => true,
                    ],
                    'styles' => array_merge($styles, [
                        'paddingTop' => '32px',
                        'paddingBottom' => '32px',
                    ])
                ];

            default:
                return [
                    'props' => [],
                    'styles' => $styles
                ];
        }
    }

    /**
     * Render a section to HTML given its JSON schema, theme tokens, and editor mode flag.
     */
    public static function renderSection(array $section, array $theme, bool $isEditor = false): string {
        $type = $section['type'] ?? 'custom_html';
        $id = $section['id'] ?? ('sec_' . uniqid());
        $props = $section['props'] ?? [];
        $styles = $section['styles'] ?? [];

        // Build inline styles for wrapper
        $styleRules = [];
        if (!empty($styles['paddingTop'])) $styleRules[] = "padding-top: " . htmlspecialchars($styles['paddingTop']);
        if (!empty($styles['paddingBottom'])) $styleRules[] = "padding-bottom: " . htmlspecialchars($styles['paddingBottom']);
        if (!empty($styles['backgroundColor']) && $styles['backgroundColor'] !== 'transparent') {
            $styleRules[] = "background-color: " . htmlspecialchars($styles['backgroundColor']);
        }
        if (!empty($styles['textColor']) && $styles['textColor'] !== 'inherit') {
            $styleRules[] = "color: " . htmlspecialchars($styles['textColor']);
        }
        $styleAttr = !empty($styleRules) ? ' style="' . implode('; ', $styleRules) . '"' : '';

        // Container width class
        $containerClass = $styles['containerWidth'] ?? 'max-w-6xl';

        // Editor data attributes
        $editorAttrs = $isEditor ? ' data-section-id="' . htmlspecialchars($id) . '" data-section-type="' . htmlspecialchars($type) . '"' : '';

        $html = '<section id="' . htmlspecialchars($id) . '" class="cf-section cf-' . htmlspecialchars($type) . '-section"' . $styleAttr . $editorAttrs . '>';

        // Render Section Controls toolbar in Editor mode
        if ($isEditor) {
            $html .= '<div class="cf-section-toolbar">';
            $html .= '<span class="cf-toolbar-badge"><i class="fa-solid fa-cube"></i> ' . htmlspecialchars(ucfirst($type)) . '</span>';
            $html .= '<div class="cf-toolbar-actions">';
            $html .= '<button type="button" class="cf-btn-move-up" title="Move Up"><i class="fa-solid fa-arrow-up"></i></button>';
            $html .= '<button type="button" class="cf-btn-move-down" title="Move Down"><i class="fa-solid fa-arrow-down"></i></button>';
            $html .= '<button type="button" class="cf-btn-duplicate" title="Duplicate"><i class="fa-solid fa-clone"></i></button>';
            $html .= '<button type="button" class="cf-btn-delete" title="Delete Section"><i class="fa-solid fa-trash"></i></button>';
            $html .= '</div>';
            $html .= '</div>';
        }

        $html .= '<div class="cf-container ' . htmlspecialchars($containerClass) . '">';

        // Dispatch to type-specific renderer
        $method = 'render' . str_replace(' ', '', ucwords(str_replace('_', ' ', $type)));
        if (method_exists(self::class, $method)) {
            $html .= self::$method($props, $theme, $isEditor);
        } else {
            $html .= self::renderGeneric($props, $theme, $isEditor);
        }

        $html .= '</div>'; // End container
        $html .= '</section>'; // End section

        return $html;
    }

    // =========================================================================
    // SECTION SPECIFIC RENDERERS & LOCALIZATION
    // =========================================================================

    /**
     * Determine if rendering context is RTL based on explicit theme direction, locale, or platform fallback
     */
    public static function isRtlContext(array $theme = []): bool {
        if (isset($theme['direction']) && $theme['direction'] !== '') {
            return strtolower($theme['direction']) === 'rtl';
        }
        if (isset($theme['locale']) && $theme['locale'] !== '') {
            return strtolower($theme['locale']) === 'ar';
        }
        return \App\Core\I18n::isRtl();
    }

    /**
     * Get prop value with automatic Arabic / RTL fallback
     */
    public static function getProp(array $props, string $key, array $theme = [], string $default = ''): string {
        $isRtl = self::isRtlContext($theme);
        if ($isRtl && !empty($props[$key . '_ar'])) {
            return (string)$props[$key . '_ar'];
        }
        return (string)($props[$key] ?? $default);
    }

    public static function renderNavbar(array $props, array $theme, bool $isEditor): string {
        $brandText = Security::clean(self::getProp($props, 'brandText', $theme, 'Portfolio'));
        $logoUrl = Security::clean($props['logoUrl'] ?? '');
        $ctaText = Security::clean(self::getProp($props, 'ctaText', $theme, 'Get in Touch'));
        $ctaLink = Security::clean($props['ctaLink'] ?? '#contact');
        $isRtl = self::isRtlContext($theme);

        $out = '<div class="cf-navbar-inner">';
        $out .= '<div class="cf-brand">';
        if ($logoUrl) {
            $out .= '<img src="' . $logoUrl . '" alt="' . $brandText . '" class="cf-logo-img">';
        }
        $out .= '<a href="#" class="cf-brand-text">' . $brandText . '</a>';
        $out .= '</div>';

        $aboutLbl = $isRtl ? 'من أنا' : 'About';
        $projLbl = $isRtl ? 'المشاريع' : 'Projects';
        $skillsLbl = $isRtl ? 'المهارات' : 'Skills';
        $contactLbl = $isRtl ? 'تواصل معي' : 'Contact';

        $out .= '<nav class="cf-nav-links">';
        $out .= '<a href="#about" class="cf-nav-link">' . $aboutLbl . '</a>';
        $out .= '<a href="#projects" class="cf-nav-link">' . $projLbl . '</a>';
        $out .= '<a href="#skills" class="cf-nav-link">' . $skillsLbl . '</a>';
        $out .= '<a href="#contact" class="cf-nav-link">' . $contactLbl . '</a>';
        $out .= '</nav>';

        if ($ctaText) {
            $out .= '<div class="cf-nav-cta">';
            $out .= '<a href="' . $ctaLink . '" class="cf-btn cf-btn-primary cf-btn-sm">' . $ctaText . '</a>';
            $out .= '</div>';
        }
        $out .= '</div>';
        return $out;
    }

    public static function renderHero(array $props, array $theme, bool $isEditor): string {
        $variant = $props['variant'] ?? ($props['layout'] ?? 'split');
        $isRtl = self::isRtlContext($theme);
        $arrowIcon = $isRtl ? 'fa-arrow-left' : 'fa-arrow-right';
        $arrowEntity = $isRtl ? '&larr;' : '&rarr;';
        $badge = Security::clean(self::getProp($props, 'badge', $theme));
        $title = Security::clean(self::getProp($props, 'title', $theme, 'Welcome'));
        $subtitle = Security::clean(self::getProp($props, 'subtitle', $theme));
        $description = nl2br(Security::clean(self::getProp($props, 'description', $theme)));
        $avatarUrl = Security::clean($props['avatarUrl'] ?? '');
        $primaryBtnText = Security::clean(self::getProp($props, 'primaryButtonText', $theme, 'Explore'));
        $primaryBtnLink = Security::clean($props['primaryButtonLink'] ?? '#projects');
        $secBtnText = Security::clean(self::getProp($props, 'secondaryButtonText', $theme, 'Contact'));
        $secBtnLink = Security::clean($props['secondaryButtonLink'] ?? '#contact');

        // 1. VARIANT: TERMINAL CLI DEVELOPER
        if ($variant === 'terminal') {
            $cmd = Security::clean($props['command'] ?? 'npx run portfolio --profile=mohammad');
            $status = Security::clean(self::getProp($props, 'statusText', $theme, 'SYSTEM ONLINE · 99.99% UPTIME'));
            $out = '<div class="cf-terminal-window">';
            $out .= '<div class="cf-terminal-header">';
            $out .= '<div class="cf-terminal-dots"><span class="cf-terminal-dot red"></span><span class="cf-terminal-dot yellow"></span><span class="cf-terminal-dot green"></span></div>';
            $out .= '<span class="cf-terminal-title">' . ($props['windowTitle'] ?? 'developer@workstation:~') . '</span>';
            $out .= '<span style="font-size:0.75rem;color:#3fb950;"><i class="fa-solid fa-circle" style="font-size:0.5rem;"></i> ' . $status . '</span>';
            $out .= '</div>';
            $out .= '<div class="cf-terminal-body">';
            $out .= '<div class="cf-terminal-prompt"><span class="cf-term-green">user@kernel</span>:<span class="cf-term-purple">~/workspace</span>$ <span style="color:#f0883e;">' . $cmd . '</span></div>';
            $out .= '<div style="margin:16px 0;padding-left:12px;border-left:2px solid #30363d;">';
            $out .= '<h1 style="font-size:clamp(1.6rem, 3.5vw, 2.5rem);font-family:\'Fira Code\',monospace;margin-bottom:8px;color:#58a6ff;">' . $title . '</h1>';
            if ($subtitle) $out .= '<div style="color:#7ee787;font-size:1.05rem;margin-bottom:12px;">// ' . $subtitle . '</div>';
            if ($description) $out .= '<p style="color:#8b949e;line-height:1.7;margin-bottom:20px;max-width:720px;">' . $description . '</p>';
            $out .= '</div>';
            $out .= '<div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:16px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary cf-btn-sm" style="font-family:\'Fira Code\',monospace;"><i class="fa-solid fa-terminal"></i> ' . $primaryBtnText . '</a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline cf-btn-sm" style="font-family:\'Fira Code\',monospace;">' . $secBtnText . '</a>';
            $out .= '</div>';
            $out .= '</div></div>';
            return $out;
        }

        // 2. VARIANT: DEVELOPER DOCUMENTATION STYLE
        if ($variant === 'docs') {
            $codeSnippet = Security::clean($props['codeSnippet'] ?? "curl -X GET https://api.systems.io/v2/cluster/health \\\n  -H 'Authorization: Bearer <token>'");
            $out = '<div class="cf-docs-hero">';
            if ($badge) $out .= '<div class="cf-docs-badge"><i class="fa-solid fa-code-branch"></i> ' . $badge . '</div>';
            $out .= '<h1 style="font-size:clamp(2.2rem, 4.5vw, 3.6rem);letter-spacing:-0.03em;margin-bottom:14px;color:var(--cf-text);">' . $title . '</h1>';
            if ($subtitle) $out .= '<div style="font-size:1.2rem;color:#38bdf8;font-family:\'Fira Code\',monospace;margin-bottom:16px;">' . $subtitle . '</div>';
            if ($description) $out .= '<p style="color:var(--cf-text-muted);font-size:1.05rem;line-height:1.7;max-width:720px;margin-bottom:24px;">' . $description . '</p>';
            $out .= '<div class="cf-docs-code-card"><span class="token-cm">// Quickstart Service Verification</span><br>' . nl2br($codeSnippet) . '</div>';
            $out .= '<div style="display:flex;gap:12px;margin-top:20px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary cf-btn-sm" style="font-family:\'Fira Code\',monospace;"><i class="fa-solid fa-book-open"></i> ' . $primaryBtnText . '</a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline cf-btn-sm" style="font-family:\'Fira Code\',monospace;">' . $secBtnText . '</a>';
            $out .= '</div></div>';
            return $out;
        }

        // 3. VARIANT: SWISS INTERNATIONAL STYLE
        if ($variant === 'swiss') {
            $indexNum = Security::clean($props['indexNum'] ?? '01 / IDENTITY');
            $out = '<div class="cf-swiss-wrap">';
            $out .= '<div class="cf-swiss-index">' . $indexNum . '</div>';
            $out .= '<h1 class="cf-swiss-title">' . $title . '</h1>';
            $out .= '<div class="cf-swiss-grid">';
            $out .= '<div>';
            if ($subtitle) $out .= '<div style="font-size:1.4rem;font-weight:700;line-height:1.3;margin-bottom:16px;">' . $subtitle . '</div>';
            if ($description) $out .= '<p style="font-size:1.05rem;line-height:1.7;opacity:0.85;max-width:640px;">' . $description . '</p>';
            $out .= '<div style="display:flex;gap:14px;margin-top:28px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary" style="border-radius:0px;font-weight:700;">' . $primaryBtnText . ' ' . $arrowEntity . '</a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline" style="border-radius:0px;border-color:currentColor;">' . $secBtnText . '</a>';
            $out .= '</div></div>';
            $out .= '<div style="border-left:1px solid rgba(0,0,0,0.15);padding-left:24px;font-size:0.85rem;line-height:1.8;">';
            $out .= '<div style="font-weight:700;text-transform:uppercase;margin-bottom:8px;">DISCIPLINE & LOCATION</div>';
            $out .= '<div>' . ($props['metadataLine1'] ?? 'Brand Systems & Digital Design') . '</div>';
            $out .= '<div style="color:var(--cf-text-muted);">' . ($props['metadataLine2'] ?? 'Available for Select Commissions') . '</div>';
            $out .= '</div></div></div>';
            return $out;
        }

        // 4. VARIANT: KINFOLK & EDITORIAL MAGAZINE
        if ($variant === 'editorial') {
            $meta = Security::clean($props['editorialMeta'] ?? 'ISSUE Nº 12 · CREATIVE DIRECTION & ESSAYS');
            $quote = Security::clean(self::getProp($props, 'editorialQuote', $theme));
            $out = '<div class="cf-editorial-hero">';
            $out .= '<div class="cf-editorial-meta">' . $meta . '</div>';
            $out .= '<h1 class="cf-editorial-headline">' . $title . '</h1>';
            if ($subtitle) $out .= '<p style="font-size:1.2rem;color:var(--cf-text-muted);margin-bottom:24px;letter-spacing:-0.01em;">' . $subtitle . '</p>';
            if ($quote) $out .= '<blockquote class="cf-editorial-quote">&ldquo;' . $quote . '&rdquo;</blockquote>';
            if ($description) $out .= '<p style="font-size:1.05rem;line-height:1.8;color:var(--cf-text);max-width:680px;margin:0 auto 32px;">' . $description . '</p>';
            $out .= '<div style="display:flex;justify-content:center;gap:16px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary cf-btn-lg">' . $primaryBtnText . '</a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline cf-btn-lg">' . $secBtnText . '</a>';
            $out .= '</div></div>';
            return $out;
        }

        // 5. VARIANT: MODERN BENTO GRID
        if ($variant === 'bento') {
            $status = Security::clean(self::getProp($props, 'bentoStatus', $theme, 'Available for Staff Roles / Contracts'));
            $metricVal = Security::clean($props['bentoMetricVal'] ?? '10M+');
            $metricLabel = Security::clean(self::getProp($props, 'bentoMetricLabel', $theme, 'Monthly Active Users Served'));
            $stackPills = $props['bentoStack'] ?? ['TypeScript', 'Next.js', 'Go', 'Distributed Systems', 'Tailwind'];

            $out = '<div class="cf-bento-grid">';
            // Cell 1: Main Bio
            $out .= '<div class="cf-bento-cell span-2">';
            if ($status) $out .= '<div style="margin-bottom:12px;"><span class="cf-bento-pulse"><span class="cf-pulse-dot"></span> ' . $status . '</span></div>';
            $out .= '<h1 style="font-size:clamp(2rem, 4vw, 3rem);line-height:1.1;margin-bottom:12px;">' . $title . '</h1>';
            if ($subtitle) $out .= '<div style="font-size:1.15rem;color:var(--cf-text-muted);margin-bottom:14px;font-weight:600;">' . $subtitle . '</div>';
            if ($description) $out .= '<p style="font-size:0.95rem;line-height:1.7;color:var(--cf-text-muted);max-width:540px;">' . $description . '</p>';
            $out .= '<div style="display:flex;gap:12px;margin-top:20px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary cf-btn-sm">' . $primaryBtnText . ' <i class="fa-solid ' . $arrowIcon . '"></i></a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline cf-btn-sm">' . $secBtnText . '</a>';
            $out .= '</div></div>';

            // Cell 2: Impact Metric
            $out .= '<div class="cf-bento-cell" style="text-align:center;justify-content:center;">';
            $out .= '<div style="font-size:3.5rem;font-weight:800;color:var(--cf-primary);line-height:1;">' . $metricVal . '</div>';
            $out .= '<div style="font-size:0.9rem;font-weight:600;color:var(--cf-text-muted);margin-top:8px;">' . $metricLabel . '</div>';
            $out .= '</div>';

            // Cell 3: Tech Stack Radar
            $out .= '<div class="cf-bento-cell span-3" style="padding:20px 28px;">';
            $out .= '<div style="font-size:0.75rem;text-transform:uppercase;color:var(--cf-text-muted);font-weight:700;margin-bottom:10px;">' . ($isRtl ? 'القدرات البرمجية والمعمارية' : 'CORE CAPABILITIES & ARCHITECTURE') . '</div>';
            $out .= '<div style="display:flex;flex-wrap:wrap;gap:8px;">';
            foreach ($stackPills as $pill) {
                $out .= '<span style="padding:6px 14px;background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.1);border-radius:9999px;font-size:0.85rem;font-weight:600;">' . Security::clean($pill) . '</span>';
            }
            $out .= '</div></div></div>';
            return $out;
        }

        // 6. VARIANT: NEO-BRUTALIST BOLD
        if ($variant === 'neo-brutalist') {
            $tag = Security::clean($props['brutalistTag'] ?? 'CREATIVE TECHNOLOGIST // 2026');
            $out = '<div class="cf-brutalist-card">';
            $out .= '<div class="cf-brutalist-badge">' . $tag . '</div>';
            $out .= '<h1 style="font-size:clamp(2.4rem, 5vw, 4.2rem);font-weight:900;line-height:1.05;text-transform:uppercase;letter-spacing:-0.03em;margin-bottom:16px;">' . $title . '</h1>';
            if ($subtitle) $out .= '<div style="font-size:1.3rem;font-weight:800;background:#000;color:#fff;display:inline-block;padding:4px 12px;margin-bottom:16px;">' . $subtitle . '</div>';
            if ($description) $out .= '<p style="font-size:1.1rem;font-weight:600;line-height:1.6;margin-bottom:28px;max-width:680px;">' . $description . '</p>';
            $out .= '<div style="display:flex;gap:16px;flex-wrap:wrap;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-brutalist-btn">' . $primaryBtnText . ' ' . $arrowEntity . '</a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-brutalist-btn" style="background:#fff;color:#000;">' . $secBtnText . '</a>';
            $out .= '</div></div>';
            return $out;
        }

        // 7. VARIANT: FIRST-CLASS ARABIC HERO (الخطاط / التراث العصري)
        if ($variant === 'arabic-hero') {
            $out = '<div class="cf-arabic-hero" dir="rtl">';
            if ($badge) $out .= '<div style="display:inline-block;background:rgba(245,158,11,0.15);color:#f59e0b;padding:4px 14px;border-radius:9999px;font-size:0.85rem;font-weight:700;margin-bottom:16px;">' . $badge . '</div>';
            $out .= '<h1 style="font-size:clamp(2.5rem, 5.5vw, 4rem);font-family:\'Amiri\',\'IBM Plex Sans Arabic\',serif;font-weight:800;line-height:1.35;margin-bottom:16px;color:var(--cf-text);">' . $title . '</h1>';
            if ($subtitle) $out .= '<div style="font-size:1.35rem;color:var(--cf-primary);font-weight:700;margin-bottom:20px;">' . $subtitle . '</div>';
            $out .= '<div class="cf-arabic-callout">';
            if ($description) $out .= '<p style="font-size:1.15rem;line-height:1.85;color:var(--cf-text);margin:0;">' . $description . '</p>';
            $out .= '</div>';
            $out .= '<div style="display:flex;gap:14px;margin-top:28px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary cf-btn-lg" style="font-family:\'IBM Plex Sans Arabic\',sans-serif;">' . $primaryBtnText . ' <i class="fa-solid fa-arrow-left"></i></a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline cf-btn-lg" style="font-family:\'IBM Plex Sans Arabic\',sans-serif;">' . $secBtnText . '</a>';
            $out .= '</div></div>';
            return $out;
        }

        // 8. VARIANT: MINIMALIST CODE ARTISAN
        if ($variant === 'minimal') {
            $out = '<div class="cf-minimal-wrap">';
            if ($badge) $out .= '<div style="font-family:\'Fira Code\',monospace;font-size:0.8rem;color:var(--cf-text-muted);margin-bottom:20px;">[ ' . $badge . ' ]</div>';
            $out .= '<div class="cf-minimal-lead">' . $title . '</div>';
            if ($subtitle) $out .= '<div style="font-size:1.15rem;color:var(--cf-primary);margin-bottom:16px;font-weight:500;">' . $subtitle . '</div>';
            if ($description) $out .= '<p style="font-size:1rem;color:var(--cf-text-muted);line-height:1.8;max-width:680px;margin-bottom:32px;">' . $description . '</p>';
            $out .= '<div style="display:flex;gap:16px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary cf-btn-sm">' . $primaryBtnText . ' ' . $arrowEntity . '</a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline cf-btn-sm">' . $secBtnText . '</a>';
            $out .= '</div></div>';
            return $out;
        }

        // 9. VARIANT: VISUAL GALLERY & CINE PHOTOGRAPHER
        if ($variant === 'gallery') {
            $badgeText = $badge ?: '35MM ANALOG & DIGITAL CINEMA · RIYADH & REYKJAVIK';
            $out = '<div class="cf-gallery-hero-bg">';
            $out .= '<div class="cf-gallery-lens-badge"><i class="fa-solid fa-camera"></i> ' . $badgeText . '</div>';
            $out .= '<h1 style="font-size:clamp(2.6rem, 5.5vw, 4.4rem);font-weight:800;letter-spacing:-0.03em;margin-bottom:16px;color:#fff;">' . $title . '</h1>';
            if ($subtitle) $out .= '<div style="font-size:1.25rem;color:#94a3b8;margin-bottom:20px;letter-spacing:0.02em;">' . $subtitle . '</div>';
            if ($description) $out .= '<p style="color:#cbd5e1;font-size:1.05rem;line-height:1.7;max-width:700px;margin:0 auto 32px;">' . $description . '</p>';
            $out .= '<div style="display:flex;justify-content:center;gap:14px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary cf-btn-lg"><i class="fa-solid fa-images"></i> ' . $primaryBtnText . '</a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline cf-btn-lg">' . $secBtnText . '</a>';
            $out .= '</div></div>';
            return $out;
        }

        // 10. VARIANT: 3D & MOTION DIRECTOR
        if ($variant === 'motion') {
            $badgeText = $badge ?: 'HOUDINI · UNREAL ENGINE 5 · BLENDER 4.2';
            $out = '<div class="cf-motion-hero">';
            $out .= '<div style="display:inline-block;padding:4px 14px;background:rgba(168,85,247,0.15);border:1px solid rgba(168,85,247,0.3);border-radius:9999px;color:#c084fc;font-size:0.8rem;font-weight:700;margin-bottom:20px;">' . $badgeText . '</div>';
            $out .= '<h1 style="font-size:clamp(2.6rem, 6vw, 4.5rem);font-weight:900;letter-spacing:-0.03em;line-height:1.1;margin-bottom:16px;background:linear-gradient(135deg,#fff 30%,#c084fc 100%);-webkit-background-clip:text;-webkit-text-fill-color:transparent;">' . $title . '</h1>';
            if ($subtitle) $out .= '<div style="font-size:1.25rem;color:#a855f7;font-weight:600;margin-bottom:20px;">' . $subtitle . '</div>';
            if ($description) $out .= '<p style="color:#94a3b8;font-size:1.05rem;line-height:1.8;max-width:700px;margin:0 auto 32px;">' . $description . '</p>';
            $out .= '<div style="display:flex;justify-content:center;gap:14px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary cf-btn-lg" style="background:#7c3aed;border-color:#7c3aed;"><i class="fa-solid fa-play"></i> ' . $primaryBtnText . '</a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline cf-btn-lg">' . $secBtnText . '</a>';
            $out .= '</div></div>';
            return $out;
        }

        // 11. VARIANT: EXECUTIVE & BOARD ADVISORY
        if ($variant === 'executive') {
            $badgeText = $badge ?: 'BOARD MEMBER · AUDIT COMMITTEE · STRATEGY CHAIR';
            $out = '<div class="cf-executive-hero" style="padding:60px 0 40px;">';
            $out .= '<div style="font-size:0.8rem;letter-spacing:0.15em;text-transform:uppercase;color:var(--cf-primary);font-weight:700;margin-bottom:16px;">' . $badgeText . '</div>';
            $out .= '<h1 style="font-size:clamp(2.4rem, 5vw, 3.8rem);font-family:\'Playfair Display\',Georgia,serif;font-weight:700;line-height:1.2;margin-bottom:18px;">' . $title . '</h1>';
            if ($subtitle) $out .= '<div style="font-size:1.25rem;color:var(--cf-primary);margin-bottom:20px;font-weight:600;">' . $subtitle . '</div>';
            if ($description) $out .= '<p style="font-size:1.1rem;line-height:1.8;color:var(--cf-text);opacity:0.9;max-width:740px;margin-bottom:32px;">' . $description . '</p>';
            $out .= '<div style="display:flex;gap:14px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary cf-btn-lg">' . $primaryBtnText . '</a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline cf-btn-lg">' . $secBtnText . '</a>';
            $out .= '</div></div>';
            return $out;
        }

        // 12. VARIANT: STRATEGIC CONSULTANT
        if ($variant === 'consultant') {
            $kpiNum = Security::clean($props['kpiNum'] ?? '$140M+');
            $kpiLbl = Security::clean(self::getProp($props, 'kpiLbl', $theme, 'Enterprise Value Created'));
            $out = '<div class="cf-consultant-hero" style="display:grid;grid-template-columns:1.5fr 1fr;gap:40px;align-items:center;padding:50px 0;">';
            $out .= '<div>';
            if ($badge) $out .= '<div style="display:inline-block;padding:4px 12px;background:rgba(37,99,235,0.1);color:var(--cf-primary);border-radius:4px;font-size:0.8rem;font-weight:700;margin-bottom:16px;">' . $badge . '</div>';
            $out .= '<h1 style="font-size:clamp(2.2rem, 4.5vw, 3.5rem);font-weight:800;line-height:1.2;margin-bottom:16px;">' . $title . '</h1>';
            if ($subtitle) $out .= '<div style="font-size:1.15rem;color:var(--cf-text-muted);font-weight:600;margin-bottom:16px;">' . $subtitle . '</div>';
            if ($description) $out .= '<p style="color:var(--cf-text-muted);font-size:1rem;line-height:1.7;margin-bottom:28px;">' . $description . '</p>';
            $out .= '<div style="display:flex;gap:14px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary">' . $primaryBtnText . ' ' . $arrowEntity . '</a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline">' . $secBtnText . '</a>';
            $out .= '</div></div>';
            $out .= '<div class="cf-consultant-kpi-card" style="padding:36px 28px;">';
            $out .= '<div class="cf-consultant-kpi-num">' . $kpiNum . '</div>';
            $out .= '<div class="cf-consultant-kpi-lbl">' . $kpiLbl . '</div>';
            $out .= '<div style="margin-top:16px;padding-top:16px;border-top:1px solid var(--cf-card-border);font-size:0.85rem;color:var(--cf-text-muted);">' . ($isRtl ? 'الاستراتيجية · الدمج والاستحواذ · الهيكلة' : 'Strategy · M&A Integration · Org Redesign') . '</div>';
            $out .= '</div></div>';
            return $out;
        }

        // 13. VARIANT: FREELANCE SPECIALIST
        if ($variant === 'freelance') {
            $rating = Security::clean(self::getProp($props, 'rating', $theme, '5.0 ★★★★★ (48 Verified Client Reviews)'));
            $out = '<div style="text-align:center;max-width:800px;margin:0 auto;padding:60px 20px 40px;">';
            if ($rating) $out .= '<div style="display:inline-flex;align-items:center;gap:6px;background:rgba(234,179,8,0.12);color:#eab308;padding:5px 14px;border-radius:9999px;font-size:0.85rem;font-weight:700;margin-bottom:20px;">' . $rating . '</div>';
            $out .= '<h1 style="font-size:clamp(2.5rem, 5vw, 4rem);font-weight:800;letter-spacing:-0.03em;line-height:1.15;margin-bottom:18px;">' . $title . '</h1>';
            if ($subtitle) $out .= '<div style="font-size:1.25rem;color:var(--cf-primary);font-weight:600;margin-bottom:18px;">' . $subtitle . '</div>';
            if ($description) $out .= '<p style="color:var(--cf-text-muted);font-size:1.05rem;line-height:1.7;margin-bottom:32px;">' . $description . '</p>';
            $out .= '<div style="display:flex;justify-content:center;gap:14px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary cf-btn-lg">' . $primaryBtnText . ' <i class="fa-solid ' . $arrowIcon . '"></i></a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline cf-btn-lg">' . $secBtnText . '</a>';
            $out .= '</div></div>';
            return $out;
        }

        // 14. VARIANT: NORDIC ARCHITECTURAL STUDIO
        if ($variant === 'nordic') {
            $tag = Security::clean($props['nordicTag'] ?? 'STUDIO LINDQVIST · ARCHITECTURE & SPATIAL DESIGN');
            $out = '<div class="cf-nordic-hero">';
            if ($tag) $out .= '<div class="cf-nordic-tag">' . $tag . '</div>';
            $out .= '<div class="cf-nordic-title">' . $title . '</div>';
            if ($subtitle) $out .= '<div style="font-size:1.2rem;color:var(--cf-primary);margin-bottom:16px;">' . $subtitle . '</div>';
            if ($description) $out .= '<p style="font-size:1.05rem;line-height:1.8;color:var(--cf-text-muted);max-width:680px;margin-bottom:28px;">' . $description . '</p>';
            $out .= '<div style="display:flex;gap:16px;">';
            if ($primaryBtnText) $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary cf-btn-sm" style="border-radius:2px;">' . $primaryBtnText . '</a>';
            if ($secBtnText) $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline cf-btn-sm" style="border-radius:2px;">' . $secBtnText . '</a>';
            $out .= '</div></div>';
            return $out;
        }

        // DEFAULT: CLASSIC SPLIT OR CENTERED HERO
        $out = '<div class="cf-hero-wrap cf-hero-' . htmlspecialchars($variant) . '">';
        $out .= '<div class="cf-hero-content">';

        if ($badge) {
            $out .= '<div class="cf-hero-badge"><span class="cf-badge-dot"></span> ' . $badge . '</div>';
        }

        $out .= '<h1 class="cf-hero-title">' . $title . '</h1>';

        if ($subtitle) {
            $out .= '<p class="cf-hero-subtitle">' . $subtitle . '</p>';
        }

        if ($description) {
            $out .= '<p class="cf-hero-desc">' . $description . '</p>';
        }

        $out .= '<div class="cf-hero-actions">';
        if ($primaryBtnText) {
            $out .= '<a href="' . $primaryBtnLink . '" class="cf-btn cf-btn-primary cf-btn-lg">' . $primaryBtnText . ' <i class="fa-solid ' . $arrowIcon . '"></i></a>';
        }
        if ($secBtnText) {
            $out .= '<a href="' . $secBtnLink . '" class="cf-btn cf-btn-outline cf-btn-lg">' . $secBtnText . '</a>';
        }
        $out .= '</div>';
        $out .= '</div>'; // End hero-content

        if ($avatarUrl || $variant === 'split') {
            $out .= '<div class="cf-hero-media">';
            if ($avatarUrl) {
                $out .= '<div class="cf-avatar-frame"><img src="' . $avatarUrl . '" alt="' . $title . '" class="cf-avatar-img"></div>';
            } else {
                $out .= '<div class="cf-avatar-placeholder"><i class="fa-solid fa-user-astronaut"></i></div>';
            }
            $out .= '</div>';
        }

        $out .= '</div>'; // End hero-wrap
        return $out;
    }

    public static function renderAbout(array $props, array $theme, bool $isEditor): string {
        $title = Security::clean($props['title'] ?? 'About Me');
        $subtitle = Security::clean($props['subtitle'] ?? '');
        $bio = nl2br(Security::clean($props['bio'] ?? ''));
        $highlights = $props['highlights'] ?? [];

        $out = '<div class="cf-section-header">';
        $out .= '<h2 class="cf-section-title">' . $title . '</h2>';
        if ($subtitle) $out .= '<p class="cf-section-subtitle">' . $subtitle . '</p>';
        $out .= '</div>';

        $out .= '<div class="cf-about-grid">';
        $out .= '<div class="cf-about-bio">' . $bio . '</div>';

        if (!empty($highlights)) {
            $out .= '<div class="cf-about-highlights">';
            foreach ($highlights as $hl) {
                $label = Security::clean($hl['label'] ?? '');
                $value = Security::clean($hl['value'] ?? '');
                $out .= '<div class="cf-highlight-card">';
                $out .= '<div class="cf-highlight-val">' . $value . '</div>';
                $out .= '<div class="cf-highlight-lbl">' . $label . '</div>';
                $out .= '</div>';
            }
            $out .= '</div>';
        }

        $out .= '</div>';
        return $out;
    }

    public static function renderProjects(array $props, array $theme, bool $isEditor): string {
        $variant = $props['variant'] ?? ($props['layout'] ?? 'grid');
        $isRtl = self::isRtlContext($theme);
        $arrowEntity = $isRtl ? '&larr;' : '&rarr;';
        $title = Security::clean(self::getProp($props, 'title', $theme, 'Featured Projects'));
        $subtitle = Security::clean(self::getProp($props, 'subtitle', $theme));
        $items = $props['items'] ?? [];
        $cols = intval($props['columns'] ?? 3);

        $out = '<div class="cf-section-header">';
        $out .= '<h2 class="cf-section-title">' . $title . '</h2>';
        if ($subtitle) $out .= '<p class="cf-section-subtitle">' . $subtitle . '</p>';
        $out .= '</div>';

        // 1. VARIANT: TERMINAL / CLI REPO SYSTEM
        if ($variant === 'terminal') {
            $out .= '<div class="cf-terminal-repo-grid">';
            foreach ($items as $item) {
                $pTitle = Security::clean($item['title'] ?? 'repo');
                $pDesc = Security::clean($item['description'] ?? '');
                $liveUrl = Security::clean($item['liveUrl'] ?? '');
                $ghUrl = Security::clean($item['githubUrl'] ?? '');
                $tags = $item['tags'] ?? [];
                $stars = Security::clean($item['stars'] ?? '1.2k');
                $branch = Security::clean($item['branch'] ?? 'main');

                $out .= '<div class="cf-terminal-repo-card">';
                $out .= '<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:10px;">';
                $out .= '<div style="font-weight:700;color:#58a6ff;font-size:1.1rem;"><i class="fa-solid fa-code-branch"></i> ' . $pTitle . '</div>';
                $out .= '<span style="font-size:0.75rem;color:#8b949e;"><i class="fa-regular fa-star" style="color:#e3b341;"></i> ' . $stars . '</span>';
                $out .= '</div>';
                $out .= '<div style="font-size:0.75rem;color:#3fb950;margin-bottom:8px;">branch: ' . $branch . ' [verified commit]</div>';
                if ($pDesc) $out .= '<p style="color:#8b949e;font-size:0.85rem;line-height:1.6;margin-bottom:14px;">' . $pDesc . '</p>';
                if (!empty($tags)) {
                    $out .= '<div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:14px;">';
                    foreach ($tags as $t) {
                        $out .= '<span style="font-size:0.7rem;background:rgba(56,139,253,0.1);color:#58a6ff;padding:2px 8px;border-radius:4px;border:1px solid rgba(56,139,253,0.2);">' . Security::clean($t) . '</span>';
                    }
                    $out .= '</div>';
                }
                $out .= '<div style="display:flex;gap:12px;font-size:0.8rem;">';
                if ($liveUrl) $out .= '<a href="' . $liveUrl . '" target="_blank" rel="noopener" style="color:#3fb950;"><i class="fa-solid fa-play" style="font-size:0.7rem;"></i> Run Service</a>';
                if ($ghUrl) $out .= '<a href="' . $ghUrl . '" target="_blank" rel="noopener" style="color:#8b949e;"><i class="fa-brands fa-github"></i> Inspect Source</a>';
                $out .= '</div></div>';
            }
            $out .= '</div>';
            return $out;
        }

        // 2. VARIANT: SWISS ASYMMETRIC INDEX
        if ($variant === 'swiss') {
            $out .= '<div style="border-top:2px solid #000;margin-top:16px;">';
            $idx = 1;
            foreach ($items as $item) {
                $pTitle = Security::clean($item['title'] ?? 'Project');
                $client = Security::clean($item['client'] ?? 'Independent');
                $year = Security::clean($item['year'] ?? '2025');
                $liveUrl = Security::clean($item['liveUrl'] ?? '');
                $pDesc = Security::clean($item['description'] ?? '');

                $out .= '<div class="cf-swiss-table-row">';
                $out .= '<div style="font-family:\'Space Grotesk\',monospace;font-weight:700;color:var(--cf-primary);">' . sprintf('%02d', $idx++) . '</div>';
                $out .= '<div><strong style="font-size:1.15rem;display:block;">' . $pTitle . '</strong>';
                if ($pDesc) $out .= '<span style="color:var(--cf-text-muted);font-size:0.85rem;">' . $pDesc . '</span>';
                $out .= '</div>';
                $out .= '<div style="color:var(--cf-text-muted);font-size:0.9rem;">' . $client . ' &middot; ' . $year . '</div>';
                $out .= '<div style="text-align:end;">';
                if ($liveUrl) $out .= '<a href="' . $liveUrl . '" target="_blank" rel="noopener" style="font-weight:700;color:currentColor;">' . ($isRtl ? 'استعراض ' : 'View ') . $arrowEntity . '</a>';
                $out .= '</div></div>';
            }
            $out .= '</div>';
            return $out;
        }

        // 3. VARIANT: KINFOLK & EDITORIAL CASE STUDIES
        if ($variant === 'editorial') {
            $out .= '<div>';
            foreach ($items as $item) {
                $pTitle = Security::clean(self::getProp($item, 'title', $theme, 'Case Study'));
                $pDesc = nl2br(Security::clean(self::getProp($item, 'description', $theme)));
                $client = Security::clean($item['client'] ?? 'Editorial Client');
                $year = Security::clean($item['year'] ?? date('Y'));
                $img = Security::clean($item['imageUrl'] ?? '');
                $liveUrl = Security::clean($item['liveUrl'] ?? '');

                $out .= '<article class="cf-editorial-case-study">';
                $out .= '<div>';
                $out .= '<div style="font-size:0.8rem;letter-spacing:0.12em;text-transform:uppercase;color:var(--cf-text-muted);margin-bottom:8px;">' . $client . ' &mdash; ' . $year . '</div>';
                $out .= '<h3 style="font-family:\'Playfair Display\',Georgia,serif;font-size:clamp(1.8rem, 3.5vw, 2.6rem);font-style:italic;line-height:1.2;margin-bottom:16px;">' . $pTitle . '</h3>';
                if ($pDesc) $out .= '<p style="color:var(--cf-text);line-height:1.8;font-size:1rem;margin-bottom:24px;">' . $pDesc . '</p>';
                if ($liveUrl) $out .= '<a href="' . $liveUrl . '" target="_blank" rel="noopener" class="cf-btn cf-btn-outline cf-btn-sm" style="border-radius:0px;">' . ($isRtl ? 'قراءة دراسة الحالة ' : 'Read Case Study ') . $arrowEntity . '</a>';
                $out .= '</div>';
                $out .= '<div>';
                if ($img) {
                    $out .= '<img src="' . $img . '" alt="' . $pTitle . '" style="width:100%;border-radius:4px;box-shadow:0 12px 30px -10px rgba(0,0,0,0.15);">';
                } else {
                    $out .= '<div style="height:320px;background:rgba(0,0,0,0.04);border:1px solid rgba(0,0,0,0.08);display:flex;align-items:center;justify-content:center;color:var(--cf-text-muted);font-style:italic;"><i class="fa-solid fa-camera" style="font-size:2rem;opacity:0.3;"></i></div>';
                }
                $out .= '</div></article>';
            }
            $out .= '</div>';
            return $out;
        }

        // 4. VARIANT: NEO-BRUTALIST CARDS
        if ($variant === 'neo-brutalist') {
            $out .= '<div class="cf-projects-grid cf-cols-2">';
            foreach ($items as $item) {
                $pTitle = Security::clean($item['title'] ?? 'Project');
                $pDesc = Security::clean($item['description'] ?? '');
                $liveUrl = Security::clean($item['liveUrl'] ?? '');
                $tags = $item['tags'] ?? [];

                $out .= '<div class="cf-brutalist-card">';
                $out .= '<h3 style="font-size:1.5rem;font-weight:900;text-transform:uppercase;margin-bottom:10px;">' . $pTitle . '</h3>';
                if ($pDesc) $out .= '<p style="font-size:0.95rem;line-height:1.6;font-weight:600;margin-bottom:16px;">' . $pDesc . '</p>';
                if (!empty($tags)) {
                    $out .= '<div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:20px;">';
                    foreach ($tags as $t) {
                        $out .= '<span style="font-size:0.75rem;font-weight:800;background:#fef08a;color:#000;border:2px solid #000;padding:2px 8px;">' . Security::clean($t) . '</span>';
                    }
                    $out .= '</div>';
                }
                if ($liveUrl) $out .= '<a href="' . $liveUrl . '" target="_blank" rel="noopener" class="cf-brutalist-btn" style="padding:8px 16px;font-size:0.85rem;">Launch &rarr;</a>';
                $out .= '</div>';
            }
            $out .= '</div>';
            return $out;
        }

        // 5. VARIANT: ACADEMIC & RESEARCH PUBLICATIONS
        if ($variant === 'academic') {
            $out .= '<div class="cf-academic-list">';
            foreach ($items as $item) {
                $pTitle = Security::clean($item['title'] ?? 'Research Paper Title');
                $authors = Security::clean($item['authors'] ?? 'Primary Author et al.');
                $venue = Security::clean($item['venue'] ?? 'IEEE / ACM Proceedings');
                $year = Security::clean($item['year'] ?? date('Y'));
                $pdfUrl = Security::clean($item['pdfUrl'] ?? '');
                $doi = Security::clean($item['doi'] ?? '');

                $out .= '<div class="cf-academic-paper-row">';
                $out .= '<div style="font-size:1.15rem;font-weight:700;margin-bottom:6px;color:var(--cf-text);">' . $pTitle . '</div>';
                $out .= '<div style="font-size:0.9rem;color:var(--cf-primary);font-weight:600;margin-bottom:4px;">' . $authors . '</div>';
                $out .= '<div class="cf-academic-meta">';
                $out .= '<span><i class="fa-solid fa-book-open"></i> ' . $venue . ' (' . $year . ')</span>';
                if ($doi) $out .= '<span>DOI: ' . $doi . '</span>';
                $out .= '</div>';
                if ($pdfUrl) {
                    $out .= '<div style="margin-top:12px;"><a href="' . $pdfUrl . '" target="_blank" rel="noopener" class="cf-btn cf-btn-secondary cf-btn-sm"><i class="fa-solid fa-file-pdf"></i> Read Paper (PDF)</a></div>';
                }
                $out .= '</div>';
            }
            $out .= '</div>';
            return $out;
        }

        // 6. VARIANT: DEVELOPER DOCUMENTATION API & ARCHITECTURE SPECS
        if ($variant === 'docs') {
            $out .= '<div class="cf-docs-spec-grid">';
            foreach ($items as $item) {
                $pTitle = Security::clean(self::getProp($item, 'title', $theme, 'API Spec'));
                $pDesc = Security::clean(self::getProp($item, 'description', $theme));
                $method = Security::clean($item['method'] ?? 'GET');
                $methodClass = 'cf-docs-method-' . strtolower($method);
                $endpoint = Security::clean($item['endpoint'] ?? '/v1/resource');
                $latency = Security::clean($item['latency'] ?? 'p99 < 3ms');
                $liveUrl = Security::clean($item['liveUrl'] ?? '');

                $out .= '<div class="cf-docs-spec-card">';
                $out .= '<div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:8px;">';
                $out .= '<span class="cf-docs-method-badge ' . $methodClass . '">' . $method . '</span>';
                $out .= '<span style="font-family:\'Fira Code\',monospace;font-size:0.75rem;color:#10b981;"><i class="fa-solid fa-bolt"></i> ' . $latency . '</span>';
                $out .= '</div>';
                $out .= '<div style="font-family:\'Fira Code\',monospace;font-size:0.95rem;color:var(--cf-text);font-weight:700;margin-bottom:8px;">' . $endpoint . '</div>';
                $out .= '<h4 style="font-size:1.1rem;font-weight:700;margin-bottom:6px;">' . $pTitle . '</h4>';
                if ($pDesc) $out .= '<p style="font-size:0.88rem;color:var(--cf-text-muted);line-height:1.6;margin-bottom:14px;">' . $pDesc . '</p>';
                if ($liveUrl) $out .= '<a href="' . $liveUrl . '" target="_blank" rel="noopener" style="font-size:0.82rem;font-weight:600;color:var(--cf-primary);"><i class="fa-solid fa-arrow-up-right-from-square"></i> Inspect Schema & Docs</a>';
                $out .= '</div>';
            }
            $out .= '</div>';
            return $out;
        }

        // 7. VARIANT: BENTO PROJECTS GRID
        if ($variant === 'bento') {
            $first = $items[0] ?? null;
            $rest = array_slice($items, 1);
            $out .= '<div class="cf-bento-projects-wrap">';
            if ($first) {
                $fTitle = Security::clean(self::getProp($first, 'title', $theme, 'Featured Project'));
                $fDesc = Security::clean(self::getProp($first, 'description', $theme));
                $fUrl = Security::clean($first['liveUrl'] ?? '');
                $fTags = $first['tags'] ?? [];
                $out .= '<div class="cf-bento-proj-featured">';
                $out .= '<div>';
                $out .= '<div style="display:inline-block;padding:4px 10px;background:rgba(37,99,235,0.1);color:var(--cf-primary);border-radius:9999px;font-size:0.75rem;font-weight:700;margin-bottom:14px;">FEATURED SYSTEM</div>';
                $out .= '<h3 style="font-size:1.8rem;font-weight:800;line-height:1.2;margin-bottom:12px;">' . $fTitle . '</h3>';
                if ($fDesc) $out .= '<p style="color:var(--cf-text-muted);font-size:0.98rem;line-height:1.7;margin-bottom:20px;">' . $fDesc . '</p>';
                if (!empty($fTags)) {
                    $out .= '<div style="display:flex;flex-wrap:wrap;gap:8px;margin-bottom:24px;">';
                    foreach ($fTags as $t) {
                        $out .= '<span style="padding:4px 12px;background:rgba(255,255,255,0.06);border:1px solid rgba(255,255,255,0.1);border-radius:9999px;font-size:0.8rem;font-weight:600;">' . Security::clean($t) . '</span>';
                    }
                    $out .= '</div>';
                }
                $out .= '</div>';
                if ($fUrl) $out .= '<a href="' . $fUrl . '" target="_blank" rel="noopener" class="cf-btn cf-btn-primary cf-btn-sm" style="align-self:flex-start;">Open Case Study &rarr;</a>';
                $out .= '</div>';
            }
            $out .= '<div class="cf-bento-proj-stack">';
            foreach ($rest as $item) {
                $pTitle = Security::clean(self::getProp($item, 'title', $theme, 'Project'));
                $pDesc = Security::clean(self::getProp($item, 'description', $theme));
                $liveUrl = Security::clean($item['liveUrl'] ?? '');
                $tags = $item['tags'] ?? [];
                $out .= '<div class="cf-bento-proj-mini">';
                $out .= '<h4 style="font-size:1.2rem;font-weight:700;margin-bottom:6px;">' . $pTitle . '</h4>';
                if ($pDesc) $out .= '<p style="color:var(--cf-text-muted);font-size:0.85rem;line-height:1.6;margin-bottom:12px;">' . $pDesc . '</p>';
                if (!empty($tags)) {
                    $out .= '<div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:12px;">';
                    foreach ($tags as $t) {
                        $out .= '<span style="font-size:0.75rem;color:var(--cf-primary);font-weight:600;">#' . Security::clean($t) . '</span>';
                    }
                    $out .= '</div>';
                }
                if ($liveUrl) $out .= '<a href="' . $liveUrl . '" target="_blank" rel="noopener" style="font-size:0.82rem;font-weight:600;color:var(--cf-text);text-decoration:underline;">' . ($isRtl ? 'معاينة المشروع ' : 'View Project ') . $arrowEntity . '</a>';
                $out .= '</div>';
            }
            $out .= '</div></div>';
            return $out;
        }

        // 8. VARIANT: VISUAL MASONRY GALLERY & PHOTOGRAPHY
        if ($variant === 'gallery') {
            $out .= '<div class="cf-gallery-masonry-grid">';
            foreach ($items as $item) {
                $pTitle = Security::clean(self::getProp($item, 'title', $theme, 'Photograph'));
                $img = Security::clean($item['imageUrl'] ?? '');
                $exifCam = Security::clean($item['camera'] ?? 'Leica M11');
                $exifLens = Security::clean($item['lens'] ?? '35mm f/1.4 Summilux');
                $exifIso = Security::clean($item['settings'] ?? '1/500s · ISO 100');

                $out .= '<div class="cf-gallery-card">';
                $out .= '<div class="cf-gallery-img-box">';
                if ($img) {
                    $out .= '<img src="' . $img . '" alt="' . $pTitle . '">';
                } else {
                    $out .= '<div style="height:100%;display:flex;align-items:center;justify-content:center;background:#1e293b;color:#94a3b8;"><i class="fa-solid fa-camera" style="font-size:2.5rem;opacity:0.4;"></i></div>';
                }
                $out .= '</div>';
                $out .= '<div style="padding:14px 18px 8px;">';
                $out .= '<h4 style="font-size:1.05rem;font-weight:700;color:#fff;margin:0;">' . $pTitle . '</h4>';
                $out .= '</div>';
                $out .= '<div class="cf-gallery-exif">';
                $out .= '<span><i class="fa-solid fa-camera"></i> ' . $exifCam . '</span>';
                $out .= '<span>' . $exifLens . '</span>';
                $out .= '<span>' . $exifIso . '</span>';
                $out .= '</div></div>';
            }
            $out .= '</div>';
            return $out;
        }

        // 9. VARIANT: MINIMALIST MONOSPACE REPOSITORY LIST
        if ($variant === 'minimal') {
            $out .= '<div class="cf-minimal-project-list" style="border-top:1px solid rgba(148,163,184,0.14);margin-top:20px;">';
            foreach ($items as $item) {
                $pTitle = Security::clean(self::getProp($item, 'title', $theme, 'Package'));
                $pDesc = Security::clean(self::getProp($item, 'description', $theme));
                $liveUrl = Security::clean($item['liveUrl'] ?? '');
                $year = Security::clean($item['year'] ?? date('Y'));
                $tags = $item['tags'] ?? [];

                $out .= '<div class="cf-minimal-list-item">';
                $out .= '<div style="flex:1;">';
                $out .= '<div style="display:flex;align-items:baseline;gap:12px;">';
                $out .= '<strong style="font-size:1.1rem;letter-spacing:-0.01em;">' . $pTitle . '</strong>';
                $out .= '<span class="cf-minimal-meta">' . $year . '</span>';
                $out .= '</div>';
                if ($pDesc) $out .= '<div style="color:var(--cf-text-muted);font-size:0.88rem;margin-top:4px;">' . $pDesc . '</div>';
                $out .= '</div>';
                $out .= '<div style="display:flex;align-items:center;gap:16px;">';
                if (!empty($tags)) {
                    $out .= '<span class="cf-minimal-meta" style="opacity:0.7;">' . implode(' · ', array_slice($tags, 0, 2)) . '</span>';
                }
                if ($liveUrl) $out .= '<a href="' . $liveUrl . '" target="_blank" rel="noopener" style="font-weight:600;font-size:0.85rem;">View &rarr;</a>';
                $out .= '</div></div>';
            }
            $out .= '</div>';
            return $out;
        }

        // 10. VARIANT: NORDIC ARCHITECTURE & SPATIAL
        if ($variant === 'nordic') {
            $out .= '<div class="cf-nordic-grid">';
            foreach ($items as $item) {
                $pTitle = Security::clean(self::getProp($item, 'title', $theme, 'Residence'));
                $location = Security::clean($item['location'] ?? 'Hardangerfjord, Norway');
                $pDesc = Security::clean(self::getProp($item, 'description', $theme));
                $img = Security::clean($item['imageUrl'] ?? '');
                $liveUrl = Security::clean($item['liveUrl'] ?? '');

                $out .= '<div class="cf-nordic-card">';
                if ($img) {
                    $out .= '<img src="' . $img . '" alt="' . $pTitle . '">';
                }
                $out .= '<div class="cf-nordic-card-meta">' . $location . '</div>';
                $out .= '<h3 style="font-size:1.35rem;font-weight:600;margin-bottom:8px;">' . $pTitle . '</h3>';
                if ($pDesc) $out .= '<p style="color:var(--cf-text-muted);font-size:0.92rem;line-height:1.6;margin-bottom:12px;">' . $pDesc . '</p>';
                if ($liveUrl) $out .= '<a href="' . $liveUrl . '" target="_blank" rel="noopener" style="font-size:0.82rem;font-weight:600;text-decoration:underline;">Inspect Project &rarr;</a>';
                $out .= '</div>';
            }
            $out .= '</div>';
            return $out;
        }

        // DEFAULT: MODERN RESPONSIVE CARDS
        $out .= '<div class="cf-projects-grid cf-cols-' . $cols . '">';
        foreach ($items as $item) {
            $pTitle = Security::clean($item['title'] ?? 'Project Title');
            $pDesc = Security::clean($item['description'] ?? '');
            $liveUrl = Security::clean($item['liveUrl'] ?? '');
            $ghUrl = Security::clean($item['githubUrl'] ?? '');
            $img = Security::clean($item['imageUrl'] ?? '');
            $tags = $item['tags'] ?? [];

            $out .= '<article class="cf-project-card">';
            if ($img) {
                $out .= '<div class="cf-project-img-box"><img src="' . $img . '" alt="' . $pTitle . '" class="cf-project-img"></div>';
            } else {
                $out .= '<div class="cf-project-img-placeholder"><i class="fa-solid fa-laptop-code"></i></div>';
            }

            $out .= '<div class="cf-project-body">';
            $out .= '<h3 class="cf-project-name">' . $pTitle . '</h3>';
            if ($pDesc) $out .= '<p class="cf-project-desc">' . $pDesc . '</p>';

            if (!empty($tags)) {
                $out .= '<div class="cf-tags-wrap">';
                foreach ($tags as $t) {
                    $out .= '<span class="cf-tag">' . Security::clean($t) . '</span>';
                }
                $out .= '</div>';
            }

            $out .= '<div class="cf-project-links">';
            if ($liveUrl) {
                $out .= '<a href="' . $liveUrl . '" target="_blank" rel="noopener" class="cf-link-live"><i class="fa-solid fa-arrow-up-right-from-square"></i> Live Demo</a>';
            }
            if ($ghUrl) {
                $out .= '<a href="' . $ghUrl . '" target="_blank" rel="noopener" class="cf-link-gh"><i class="fa-brands fa-github"></i> Code</a>';
            }
            $out .= '</div>';

            $out .= '</div>'; // End project-body
            $out .= '</article>';
        }
        $out .= '</div>'; // End projects-grid
        return $out;
    }

    public static function renderSkills(array $props, array $theme, bool $isEditor): string {
        $title = Security::clean(self::getProp($props, 'title', $theme, 'Skills & Technologies'));
        $subtitle = Security::clean(self::getProp($props, 'subtitle', $theme));
        $categories = $props['categories'] ?? [];

        $out = '<div class="cf-section-header">';
        $out .= '<h2 class="cf-section-title">' . $title . '</h2>';
        if ($subtitle) $out .= '<p class="cf-section-subtitle">' . $subtitle . '</p>';
        $out .= '</div>';

        $out .= '<div class="cf-skills-wrap">';
        foreach ($categories as $cat) {
            $catName = Security::clean(self::getProp($cat, 'name', $theme, 'Category'));
            $skillsList = $cat['skills'] ?? [];

            $out .= '<div class="cf-skill-group">';
            $out .= '<h4 class="cf-skill-group-title">' . $catName . '</h4>';
            $out .= '<div class="cf-skill-tags">';
            foreach ($skillsList as $sk) {
                $out .= '<span class="cf-skill-pill"><i class="fa-solid fa-check"></i> ' . Security::clean($sk) . '</span>';
            }
            $out .= '</div>';
            $out .= '</div>';
        }
        $out .= '</div>';
        return $out;
    }

    public static function renderExperience(array $props, array $theme, bool $isEditor): string {
        $title = Security::clean(self::getProp($props, 'title', $theme, 'Experience'));
        $subtitle = Security::clean(self::getProp($props, 'subtitle', $theme));
        $items = $props['items'] ?? [];

        $out = '<div class="cf-section-header">';
        $out .= '<h2 class="cf-section-title">' . $title . '</h2>';
        if ($subtitle) $out .= '<p class="cf-section-subtitle">' . $subtitle . '</p>';
        $out .= '</div>';

        $out .= '<div class="cf-timeline-wrap">';
        foreach ($items as $item) {
            $role = Security::clean(self::getProp($item, 'role', $theme));
            $comp = Security::clean(self::getProp($item, 'company', $theme));
            $period = Security::clean(self::getProp($item, 'period', $theme));
            $desc = nl2br(Security::clean(self::getProp($item, 'description', $theme)));

            $out .= '<div class="cf-timeline-item">';
            $out .= '<div class="cf-timeline-dot"></div>';
            $out .= '<div class="cf-timeline-content">';
            $out .= '<div class="cf-timeline-meta">';
            $out .= '<h3 class="cf-timeline-role">' . $role . ' <span class="cf-timeline-comp">@ ' . $comp . '</span></h3>';
            $out .= '<span class="cf-timeline-date">' . $period . '</span>';
            $out .= '</div>';
            if ($desc) $out .= '<p class="cf-timeline-desc">' . $desc . '</p>';
            $out .= '</div>';
            $out .= '</div>';
        }
        $out .= '</div>';
        return $out;
    }

    public static function renderEducation(array $props, array $theme, bool $isEditor): string {
        $title = Security::clean(self::getProp($props, 'title', $theme, 'Education'));
        $subtitle = Security::clean(self::getProp($props, 'subtitle', $theme));
        $items = $props['items'] ?? [];

        $out = '<div class="cf-section-header">';
        $out .= '<h2 class="cf-section-title">' . $title . '</h2>';
        if ($subtitle) $out .= '<p class="cf-section-subtitle">' . $subtitle . '</p>';
        $out .= '</div>';

        $out .= '<div class="cf-cards-grid">';
        foreach ($items as $item) {
            $degree = Security::clean(self::getProp($item, 'degree', $theme));
            $inst = Security::clean(self::getProp($item, 'institution', $theme));
            $period = Security::clean(self::getProp($item, 'period', $theme));
            $desc = Security::clean(self::getProp($item, 'description', $theme));

            $out .= '<div class="cf-edu-card">';
            $out .= '<div class="cf-edu-icon"><i class="fa-solid fa-graduation-cap"></i></div>';
            $out .= '<h3 class="cf-edu-degree">' . $degree . '</h3>';
            $out .= '<div class="cf-edu-inst">' . $inst . ' &middot; <span class="cf-edu-period">' . $period . '</span></div>';
            if ($desc) $out .= '<p class="cf-edu-desc">' . $desc . '</p>';
            $out .= '</div>';
        }
        $out .= '</div>';
        return $out;
    }

    public static function renderServices(array $props, array $theme, bool $isEditor): string {
        $variant = $props['variant'] ?? 'grid';
        $title = Security::clean(self::getProp($props, 'title', $theme, 'Services'));
        $subtitle = Security::clean(self::getProp($props, 'subtitle', $theme));
        $items = $props['items'] ?? [];

        $out = '<div class="cf-section-header">';
        $out .= '<h2 class="cf-section-title">' . $title . '</h2>';
        if ($subtitle) $out .= '<p class="cf-section-subtitle">' . $subtitle . '</p>';
        $out .= '</div>';

        // 1. VARIANT: PRICING & CONSULTING PACKAGES
        if ($variant === 'pricing') {
            $out .= '<div class="cf-pricing-grid">';
            foreach ($items as $item) {
                $pTitle = Security::clean(self::getProp($item, 'title', $theme, 'Package'));
                $pCost = Security::clean($item['cost'] ?? '$2,400');
                $pDesc = Security::clean(self::getProp($item, 'description', $theme));
                $pBadge = Security::clean(self::getProp($item, 'badge', $theme));
                $isFeatured = !empty($item['isFeatured']);
                $features = $item['features'] ?? [];
                $btnText = Security::clean(self::getProp($item, 'buttonText', $theme, 'Book Package'));
                $btnLink = Security::clean($item['buttonLink'] ?? '#contact');

                $out .= '<div class="cf-pricing-card' . ($isFeatured ? ' featured' : '') . '">';
                if ($pBadge) $out .= '<span class="cf-pricing-badge">' . $pBadge . '</span>';
                $out .= '<div>';
                $out .= '<h3 style="font-size:1.35rem;font-weight:700;margin-bottom:8px;">' . $pTitle . '</h3>';
                if ($pDesc) $out .= '<p style="color:var(--cf-text-muted);font-size:0.88rem;line-height:1.5;">' . $pDesc . '</p>';
                $out .= '<div class="cf-pricing-cost">' . $pCost . '</div>';
                if (!empty($features)) {
                    $out .= '<ul class="cf-pricing-features">';
                    foreach ($features as $f) {
                        $out .= '<li><i class="fa-solid fa-circle-check"></i> ' . Security::clean($f) . '</li>';
                    }
                    $out .= '</ul>';
                }
                $out .= '</div>';
                $out .= '<a href="' . $btnLink . '" class="cf-btn cf-btn-' . ($isFeatured ? 'primary' : 'outline') . '" style="width:100%;">' . $btnText . '</a>';
                $out .= '</div>';
            }
            $out .= '</div>';
            return $out;
        }

        // DEFAULT: SERVICES GRID
        $out .= '<div class="cf-services-grid">';
        foreach ($items as $item) {
            $icon = Security::clean($item['icon'] ?? 'fa-cube');
            $sTitle = Security::clean(self::getProp($item, 'title', $theme, ''));
            $sDesc = Security::clean(self::getProp($item, 'description', $theme));

            $out .= '<div class="cf-service-card">';
            $out .= '<div class="cf-service-icon"><i class="fa-solid ' . $icon . '"></i></div>';
            $out .= '<h3 class="cf-service-title">' . $sTitle . '</h3>';
            $out .= '<p class="cf-service-desc">' . $sDesc . '</p>';
            $out .= '</div>';
        }
        $out .= '</div>';
        return $out;
    }

    public static function renderTestimonials(array $props, array $theme, bool $isEditor): string {
        $title = Security::clean($props['title'] ?? 'Testimonials');
        $subtitle = Security::clean($props['subtitle'] ?? '');
        $items = $props['items'] ?? [];

        $out = '<div class="cf-section-header">';
        $out .= '<h2 class="cf-section-title">' . $title . '</h2>';
        if ($subtitle) $out .= '<p class="cf-section-subtitle">' . $subtitle . '</p>';
        $out .= '</div>';

        $out .= '<div class="cf-testimonials-grid">';
        foreach ($items as $item) {
            $name = Security::clean($item['name'] ?? '');
            $role = Security::clean($item['role'] ?? '');
            $content = Security::clean($item['content'] ?? '');

            $out .= '<div class="cf-testimonial-card">';
            $out .= '<div class="cf-quote-icon"><i class="fa-solid fa-quote-left"></i></div>';
            $out .= '<p class="cf-testimonial-text">"' . $content . '"</p>';
            $out .= '<div class="cf-testimonial-author">';
            $out .= '<div class="cf-author-name">' . $name . '</div>';
            $out .= '<div class="cf-author-role">' . $role . '</div>';
            $out .= '</div>';
            $out .= '</div>';
        }
        $out .= '</div>';
        return $out;
    }

    public static function renderStats(array $props, array $theme, bool $isEditor): string {
        $title = Security::clean($props['title'] ?? '');
        $subtitle = Security::clean($props['subtitle'] ?? '');
        $items = $props['items'] ?? [];

        $out = '';
        if ($title) {
            $out .= '<div class="cf-section-header">';
            $out .= '<h2 class="cf-section-title">' . $title . '</h2>';
            if ($subtitle) $out .= '<p class="cf-section-subtitle">' . $subtitle . '</p>';
            $out .= '</div>';
        }

        $out .= '<div class="cf-stats-row">';
        foreach ($items as $item) {
            $val = Security::clean($item['value'] ?? '0');
            $lbl = Security::clean($item['label'] ?? '');
            $out .= '<div class="cf-stat-box">';
            $out .= '<div class="cf-stat-val">' . $val . '</div>';
            $out .= '<div class="cf-stat-lbl">' . $lbl . '</div>';
            $out .= '</div>';
        }
        $out .= '</div>';
        return $out;
    }

    public static function renderGallery(array $props, array $theme, bool $isEditor): string {
        $title = Security::clean($props['title'] ?? 'Gallery');
        $subtitle = Security::clean($props['subtitle'] ?? '');
        $images = $props['images'] ?? [];

        $out = '<div class="cf-section-header">';
        $out .= '<h2 class="cf-section-title">' . $title . '</h2>';
        if ($subtitle) $out .= '<p class="cf-section-subtitle">' . $subtitle . '</p>';
        $out .= '</div>';

        $out .= '<div class="cf-gallery-grid">';
        foreach ($images as $img) {
            $url = Security::clean($img['url'] ?? '');
            $caption = Security::clean($img['caption'] ?? '');
            $out .= '<div class="cf-gallery-item">';
            if ($url) {
                $out .= '<img src="' . $url . '" alt="' . $caption . '" class="cf-gallery-img" loading="lazy">';
            } else {
                $out .= '<div class="cf-gallery-placeholder"><i class="fa-solid fa-image"></i></div>';
            }
            if ($caption) {
                $out .= '<span class="cf-gallery-caption">' . $caption . '</span>';
            }
            $out .= '</div>';
        }
        $out .= '</div>';
        return $out;
    }

    public static function renderFaq(array $props, array $theme, bool $isEditor): string {
        $title = Security::clean($props['title'] ?? 'Frequently Asked Questions');
        $subtitle = Security::clean($props['subtitle'] ?? '');
        $items = $props['items'] ?? [];

        $out = '<div class="cf-section-header">';
        $out .= '<h2 class="cf-section-title">' . $title . '</h2>';
        if ($subtitle) $out .= '<p class="cf-section-subtitle">' . $subtitle . '</p>';
        $out .= '</div>';

        $out .= '<div class="cf-faq-list">';
        foreach ($items as $i => $item) {
            $q = Security::clean($item['q'] ?? '');
            $a = Security::clean($item['a'] ?? '');
            $out .= '<details class="cf-faq-item"' . ($i === 0 ? ' open' : '') . '>';
            $out .= '<summary class="cf-faq-question">' . $q . ' <i class="fa-solid fa-chevron-down"></i></summary>';
            $out .= '<div class="cf-faq-answer">' . $a . '</div>';
            $out .= '</details>';
        }
        $out .= '</div>';
        return $out;
    }

    public static function renderCta(array $props, array $theme, bool $isEditor): string {
        $hl = Security::clean($props['headline'] ?? 'Ready to collaborate?');
        $sub = Security::clean($props['subheadline'] ?? '');
        $btnText = Security::clean($props['buttonText'] ?? 'Get in touch');
        $btnLink = Security::clean($props['buttonLink'] ?? '#contact');

        $out = '<div class="cf-cta-card">';
        $out .= '<h2 class="cf-cta-title">' . $hl . '</h2>';
        if ($sub) $out .= '<p class="cf-cta-sub">' . $sub . '</p>';
        $out .= '<a href="' . $btnLink . '" class="cf-btn cf-btn-primary cf-btn-lg">' . $btnText . '</a>';
        $out .= '</div>';
        return $out;
    }

    public static function renderContact(array $props, array $theme, bool $isEditor): string {
        $isRtl = self::isRtlContext($theme);
        $title = Security::clean(self::getProp($props, 'title', $theme, 'Get In Touch'));
        $subtitle = Security::clean(self::getProp($props, 'subtitle', $theme));
        $email = Security::clean($props['email'] ?? '');
        $location = Security::clean(self::getProp($props, 'location', $theme));
        $avail = Security::clean(self::getProp($props, 'availability', $theme));
        $showForm = $props['showForm'] ?? true;

        $out = '<div class="cf-section-header">';
        $out .= '<h2 class="cf-section-title">' . $title . '</h2>';
        if ($subtitle) $out .= '<p class="cf-section-subtitle">' . $subtitle . '</p>';
        $out .= '</div>';

        $out .= '<div class="cf-contact-grid">';
        $out .= '<div class="cf-contact-info">';
        if ($email) {
            $out .= '<div class="cf-contact-meta-row"><i class="fa-solid fa-envelope"></i> <a href="mailto:' . $email . '">' . $email . '</a></div>';
        }
        if ($location) {
            $out .= '<div class="cf-contact-meta-row"><i class="fa-solid fa-location-dot"></i> <span>' . $location . '</span></div>';
        }
        if ($avail) {
            $out .= '<div class="cf-contact-meta-row"><i class="fa-solid fa-circle-check text-green"></i> <span>' . $avail . '</span></div>';
        }
        $out .= '</div>';

        if ($showForm) {
            $namePh = $isRtl ? 'اسمك الكريم' : 'Your Name';
            $emailPh = $isRtl ? 'بريدك الإلكتروني' : 'Your Email';
            $msgPh = $isRtl ? 'تفاصيل رسالتك أو استفسارك...' : 'Your Message';
            $btnSend = $isRtl ? 'إرسال الرسالة' : 'Send Message';
            $alertMsg = $isRtl ? 'تم إرسال رسالتك بنجاح!' : 'Message sent successfully! (Demo Mode)';

            $out .= '<form class="cf-contact-form" onsubmit="event.preventDefault(); alert(\'' . $alertMsg . '\');">';
            $out .= '<div class="cf-form-group"><input type="text" class="cf-input" placeholder="' . $namePh . '" required></div>';
            $out .= '<div class="cf-form-group"><input type="email" class="cf-input" placeholder="' . $emailPh . '" required></div>';
            $out .= '<div class="cf-form-group"><textarea class="cf-textarea" rows="4" placeholder="' . $msgPh . '" required></textarea></div>';
            $out .= '<button type="submit" class="cf-btn cf-btn-primary">' . $btnSend . '</button>';
            $out .= '</form>';
        }

        $out .= '</div>';
        return $out;
    }

    public static function renderSocial(array $props, array $theme, bool $isEditor): string {
        $title = Security::clean(self::getProp($props, 'title', $theme));
        $links = $props['links'] ?? [];

        $out = '<div class="cf-social-wrap text-center">';
        if ($title) {
            $out .= '<h3 class="cf-social-title mb-4">' . $title . '</h3>';
        }
        $out .= '<div class="cf-social-pills">';
        foreach ($links as $link) {
            $url = Security::clean($link['url'] ?? '#');
            $lbl = Security::clean(self::getProp($link, 'label', $theme));
            $icon = Security::clean($link['icon'] ?? 'fa-solid fa-link');
            $out .= '<a href="' . $url . '" target="_blank" rel="noopener" class="cf-social-pill"><i class="' . $icon . '"></i> ' . $lbl . '</a>';
        }
        $out .= '</div>';
        $out .= '</div>';
        return $out;
    }

    public static function renderCustomHtml(array $props, array $theme, bool $isEditor): string {
        $raw = $props['htmlContent'] ?? '';
        return '<div class="cf-custom-html-block">' . Security::sanitizeHtml($raw) . '</div>';
    }

    public static function renderFooter(array $props, array $theme, bool $isEditor): string {
        $copy = Security::clean(self::getProp($props, 'copyrightText', $theme, 'All rights reserved.'));
        $isRtl = self::isRtlContext($theme);

        $out = '<div class="cf-footer-inner">';
        $out .= '<div class="cf-footer-copy">' . $copy . '</div>';

        // Elegant Minimalist Platform Attribution (AI Portfolio Builder)
        $siteUrl = defined('SITE_URL') ? \SITE_URL : 'https://portfolio.code-elta6ur.net';
        $siteName = defined('SITE_NAME') ? \SITE_NAME : 'AI Portfolio Builder';
        $builtWith = $isRtl ? 'صُنع بواسطة' : 'Built with';

        $out .= '<div class="cf-footer-attribution">';
        $out .= '<a href="' . $siteUrl . '" target="_blank" rel="noopener" class="cf-attribution-badge">';
        $out .= '<span class="cf-badge-bolt"><i class="fa-solid fa-cube"></i></span> ' . $builtWith . ' <strong>' . $siteName . '</strong>';
        $out .= '</a>';
        $out .= '</div>';

        $out .= '</div>';
        return $out;
    }

    public static function renderGeneric(array $props, array $theme, bool $isEditor): string {
        return '<div class="cf-generic-block"><p>Generic section container</p></div>';
    }
}
