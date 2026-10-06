<?php
namespace App\Services\Templates;

/**
 * AI Portfolio Builder - Developers & Technology Templates Catalog
 * Count: 10 Hand-Curated Production-Grade Design Systems
 */
class Developers {
    public static function getTemplates(): array {
        return [
          [
            'slug' => 'developer-terminal',
            'name' => 'CLI Terminal Developer',
            'name_ar' => 'بيئة الطرفية لمهندسي الأنظمة',
            'category' => 'Developer',
            'description' => 'Unix-inspired developer environment with command prompt, distributed system metrics, and Fira Code typography.',
            'description_ar' => 'بيئة برمجية مستوحاة من طرفية يونكس مع موجه أوامر حي، ومواصفات الأنظمة الموزعة، وطباعة كود متخصصة.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0d1117',
                  'textColor' => '#e6edf3',
                  'primaryColor' => '#58a6ff',
                  'secondaryColor' => '#3fb950',
                  'cardBg' => '#161b22',
                  'cardBorder' => '#30363d',
                  'headingFont' => 'Fira Code',
                  'bodyFont' => 'Fira Code',
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '6px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_term',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'alex@kernel-node:~',
                      'ctaText' => 'git clone profile',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_term',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'terminal',
                      'title' => 'Alex Vance',
                      'subtitle' => 'Staff Systems & Infrastructure Architect',
                      'command' => 'npx run profile --arch=distributed --latency=<400us',
                      'windowTitle' => 'alex@kernel-node-01:~',
                      'statusText' => 'SYSTEM ONLINE · 99.999% SLA',
                      'description' => 'Architecting resilient distributed storage engines, Raft-based consensus protocols, and eBPF networking proxies at scale.
Focused on zero-copy I/O, low-latency primitives, and predictable p99 performance.',
                      'primaryButtonText' => 'Inspect Repositories',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'GPG Public Key',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_term',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'terminal',
                      'title' => 'Active Production Services',
                      'subtitle' => 'Open source repositories benchmarked under multi-region high-concurrency workloads',
                      'items' => [
                        [
                          'title' => 'eventmesh-broker',
                          'description' => 'Ultra-fast ZeroMQ/gRPC event streaming mesh delivering <400μs p99 latency across 100k connected nodes with automated partition rebalancing.',
                          'stars' => '2.4k',
                          'branch' => 'v2.4-stable',
                          'tags' => [
                            'Go',
                            'gRPC',
                            'ZeroMQ',
                            'Distributed Systems'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'turbokv-engine',
                          'description' => 'Embeddable LSM-tree key-value storage engine in Rust with Raft consensus, zero-copy serialization, and WAL durability.',
                          'stars' => '1.8k',
                          'branch' => 'main',
                          'tags' => [
                            'Rust',
                            'Raft Consensus',
                            'Storage Engines'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'zerotrust-proxy',
                          'description' => 'Identity-aware edge reverse proxy with eBPF packet inspection and automated mTLS certificate rotation.',
                          'stars' => '940',
                          'branch' => 'release',
                          'tags' => [
                            'eBPF',
                            'C',
                            'Network Security'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'skills_term',
                    'type' => 'skills',
                    'props' => [
                      'title' => 'Technical Competencies & Runtime',
                      'subtitle' => 'Core programming languages, orchestration frameworks, and observability telemetry',
                      'categories' => [
                        [
                          'name' => 'Systems Languages',
                          'skills' => [
                            'Rust',
                            'Go',
                            'Modern C++20',
                            'Python 3',
                            'POSIX Shell',
                            'SQL'
                          ]
                        ],
                        [
                          'name' => 'Infrastructure & Runtime',
                          'skills' => [
                            'Kubernetes',
                            'eBPF',
                            'Raft Consensus',
                            'Kafka',
                            'Redis Cluster',
                            'gRPC'
                          ]
                        ],
                        [
                          'name' => 'Observability & Telemetry',
                          'skills' => [
                            'Prometheus',
                            'OpenTelemetry',
                            'Grafana',
                            'Jaeger Tracing',
                            'Chaos Mesh'
                          ]
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_term',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Open Secure Channel',
                      'subtitle' => 'Available for distributed systems architecture reviews and critical infrastructure consulting.',
                      'email' => 'alex@systems.internal',
                      'location' => 'Stockholm · Global Remote',
                      'availability' => 'Accepting Q3 Technical Audits'
                    ]
                  ],
                  [
                    'id' => 'footer_term',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Alex Vance. Cryptographically verified with GPG Key ID 0x8FA47B9C.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0d1117',
                  'textColor' => '#e6edf3',
                  'primaryColor' => '#58a6ff',
                  'secondaryColor' => '#3fb950',
                  'cardBg' => '#161b22',
                  'cardBorder' => '#30363d',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.35',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '6px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_term',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'mohammad@cluster-node:~',
                      'ctaText' => 'استنساخ المستودع البرمجي',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_term',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'terminal',
                      'title' => 'محمد أبو خشريف',
                      'subtitle' => 'كبير مهندسي النظم والبنية التحتية السحابية الموزعة',
                      'command' => 'npx run profile --lang=ar --arch=distributed',
                      'windowTitle' => 'mohammad@cluster-node-01:~ [محطة_العمل]',
                      'statusText' => 'النظام متصل · جاهزية فائقة 99.999%',
                      'description' => 'تصميم وهندسة محركات التخزين الموزعة، وتطوير بروتوكولات الإجماع المتسق (Raft)، وشبكات eBPF عالية الأداء.
أركز على تقليل أزمنة الاستجابة، وبناء معماريات سحابية مقاومة للأعطال ومصممة للتوسع الهائل.',
                      'primaryButtonText' => 'استعراض المستودعات البرمجية',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'مفتاح التشفير العام GPG',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_term',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'terminal',
                      'title' => 'الخدمات والمشاريع الإنتاجية',
                      'subtitle' => 'مستودعات برمجية معتمدة ومفتوحة المصدر تم اختبارها تحت أحمال تشغيل عالمية فائقة الكثافة',
                      'items' => [
                        [
                          'title' => 'eventmesh-broker',
                          'description' => 'محرك بث ومعالجة أحداث عالي السرعة مبني على تقنيات gRPC وZeroMQ يحقق زمن استجابة أقل من 400 ميكروثانية لـ 100 ألف عقدة متزامنة.',
                          'stars' => '2.4k',
                          'branch' => 'v2.4-مستقر',
                          'tags' => [
                            'Go',
                            'gRPC',
                            'ZeroMQ',
                            'أنظمة موزعة'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'turbokv-engine',
                          'description' => 'محرك تخزين مفتاح-قيمة مدمج بلغة Rust يعتمد خوارزمية Raft للتوافق وتسجيل العمليات بدون نسخ للذاكرة وضمان حفظ البيانات عند انقطاع التيار.',
                          'stars' => '1.8k',
                          'branch' => 'الرئيسي',
                          'tags' => [
                            'Rust',
                            'إجماع Raft',
                            'محركات التخزين'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'zerotrust-proxy',
                          'description' => 'وكيل شبكي على الحافة ذكي في فحص الهوية مع فحص حزم البيانات بتقنية eBPF والتجديد الآلي لشهادات التشفير mTLS.',
                          'stars' => '940',
                          'branch' => 'إصدار_مستقر',
                          'tags' => [
                            'eBPF',
                            'C',
                            'أمن الشبكات'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'skills_term',
                    'type' => 'skills',
                    'props' => [
                      'title' => 'الكفاءات والقدرات التقنية',
                      'subtitle' => 'لغات البرمجة المتخصصة، أدوات البنية التحتية، ومنظومات المراقبة والاعتمادية',
                      'categories' => [
                        [
                          'name' => 'لغات برمجة النظم',
                          'skills' => [
                            'Rust',
                            'Go',
                            'Modern C++20',
                            'Python 3',
                            'POSIX Shell',
                            'SQL'
                          ]
                        ],
                        [
                          'name' => 'البنية التحتية السحابية',
                          'skills' => [
                            'Kubernetes',
                            'eBPF',
                            'Raft Consensus',
                            'Kafka',
                            'Redis Cluster',
                            'gRPC'
                          ]
                        ],
                        [
                          'name' => 'المراقبة والاعتمادية',
                          'skills' => [
                            'Prometheus',
                            'OpenTelemetry',
                            'Grafana',
                            'Jaeger Tracing',
                            'Chaos Mesh'
                          ]
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_term',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'فتح قناة اتصال مباشرة',
                      'subtitle' => 'متاح للاستشارات المعمارية في الأنظمة الموزعة وتدقيق موثوقية البنى التحتية السحابية.',
                      'email' => 'mohammad@systems.internal',
                      'location' => 'الرياض · العمل عن بُعد عالمياً',
                      'availability' => 'متاح لتدقيق الأنظمة السحابية للربع القادم'
                    ]
                  ],
                  [
                    'id' => 'footer_term',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 محمد أبو خشريف. موقع مشفر وموثق بمفتاح GPG الرقمي.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#0d1117',
              'textColor' => '#e6edf3',
              'primaryColor' => '#58a6ff',
              'secondaryColor' => '#3fb950',
              'cardBg' => '#161b22',
              'cardBorder' => '#30363d',
              'headingFont' => 'Fira Code',
              'bodyFont' => 'Fira Code',
              'lineHeightHeading' => '1.25',
              'lineHeightBody' => '1.6',
              'letterSpacingHeading' => '-0.02em',
              'borderRadius' => '6px',
              'containerWidth' => 'max-w-6xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_term',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'alex@kernel-node:~',
                  'ctaText' => 'git clone profile',
                  'ctaLink' => '#contact'
                ]
              ],
              [
                'id' => 'hero_term',
                'type' => 'hero',
                'props' => [
                  'variant' => 'terminal',
                  'title' => 'Alex Vance',
                  'subtitle' => 'Staff Systems & Infrastructure Architect',
                  'command' => 'npx run profile --arch=distributed --latency=<400us',
                  'windowTitle' => 'alex@kernel-node-01:~',
                  'statusText' => 'SYSTEM ONLINE · 99.999% SLA',
                  'description' => 'Architecting resilient distributed storage engines, Raft-based consensus protocols, and eBPF networking proxies at scale.
Focused on zero-copy I/O, low-latency primitives, and predictable p99 performance.',
                  'primaryButtonText' => 'Inspect Repositories',
                  'primaryButtonLink' => '#projects',
                  'secondaryButtonText' => 'GPG Public Key',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'proj_term',
                'type' => 'projects',
                'props' => [
                  'variant' => 'terminal',
                  'title' => 'Active Production Services',
                  'subtitle' => 'Open source repositories benchmarked under multi-region high-concurrency workloads',
                  'items' => [
                    [
                      'title' => 'eventmesh-broker',
                      'description' => 'Ultra-fast ZeroMQ/gRPC event streaming mesh delivering <400μs p99 latency across 100k connected nodes with automated partition rebalancing.',
                      'stars' => '2.4k',
                      'branch' => 'v2.4-stable',
                      'tags' => [
                        'Go',
                        'gRPC',
                        'ZeroMQ',
                        'Distributed Systems'
                      ],
                      'liveUrl' => '#',
                      'githubUrl' => '#'
                    ],
                    [
                      'title' => 'turbokv-engine',
                      'description' => 'Embeddable LSM-tree key-value storage engine in Rust with Raft consensus, zero-copy serialization, and WAL durability.',
                      'stars' => '1.8k',
                      'branch' => 'main',
                      'tags' => [
                        'Rust',
                        'Raft Consensus',
                        'Storage Engines'
                      ],
                      'liveUrl' => '#',
                      'githubUrl' => '#'
                    ],
                    [
                      'title' => 'zerotrust-proxy',
                      'description' => 'Identity-aware edge reverse proxy with eBPF packet inspection and automated mTLS certificate rotation.',
                      'stars' => '940',
                      'branch' => 'release',
                      'tags' => [
                        'eBPF',
                        'C',
                        'Network Security'
                      ],
                      'liveUrl' => '#',
                      'githubUrl' => '#'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'skills_term',
                'type' => 'skills',
                'props' => [
                  'title' => 'Technical Competencies & Runtime',
                  'subtitle' => 'Core programming languages, orchestration frameworks, and observability telemetry',
                  'categories' => [
                    [
                      'name' => 'Systems Languages',
                      'skills' => [
                        'Rust',
                        'Go',
                        'Modern C++20',
                        'Python 3',
                        'POSIX Shell',
                        'SQL'
                      ]
                    ],
                    [
                      'name' => 'Infrastructure & Runtime',
                      'skills' => [
                        'Kubernetes',
                        'eBPF',
                        'Raft Consensus',
                        'Kafka',
                        'Redis Cluster',
                        'gRPC'
                      ]
                    ],
                    [
                      'name' => 'Observability & Telemetry',
                      'skills' => [
                        'Prometheus',
                        'OpenTelemetry',
                        'Grafana',
                        'Jaeger Tracing',
                        'Chaos Mesh'
                      ]
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_term',
                'type' => 'contact',
                'props' => [
                  'title' => 'Open Secure Channel',
                  'subtitle' => 'Available for distributed systems architecture reviews and critical infrastructure consulting.',
                  'email' => 'alex@systems.internal',
                  'location' => 'Stockholm · Global Remote',
                  'availability' => 'Accepting Q3 Technical Audits'
                ]
              ],
              [
                'id' => 'footer_term',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Alex Vance. Cryptographically verified with GPG Key ID 0x8FA47B9C.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#0d1117',
                'textColor' => '#e6edf3',
                'primaryColor' => '#58a6ff',
                'secondaryColor' => '#3fb950',
                'cardBg' => '#161b22',
                'cardBorder' => '#30363d',
                'headingFont' => 'Fira Code',
                'bodyFont' => 'Fira Code',
                'lineHeightHeading' => '1.25',
                'lineHeightBody' => '1.6',
                'letterSpacingHeading' => '-0.02em',
                'borderRadius' => '6px',
                'containerWidth' => 'max-w-6xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_term',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'alex@kernel-node:~',
                    'ctaText' => 'git clone profile',
                    'ctaLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'hero_term',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'terminal',
                    'title' => 'Alex Vance',
                    'subtitle' => 'Staff Systems & Infrastructure Architect',
                    'command' => 'npx run profile --arch=distributed --latency=<400us',
                    'windowTitle' => 'alex@kernel-node-01:~',
                    'statusText' => 'SYSTEM ONLINE · 99.999% SLA',
                    'description' => 'Architecting resilient distributed storage engines, Raft-based consensus protocols, and eBPF networking proxies at scale.
Focused on zero-copy I/O, low-latency primitives, and predictable p99 performance.',
                    'primaryButtonText' => 'Inspect Repositories',
                    'primaryButtonLink' => '#projects',
                    'secondaryButtonText' => 'GPG Public Key',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'proj_term',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'terminal',
                    'title' => 'Active Production Services',
                    'subtitle' => 'Open source repositories benchmarked under multi-region high-concurrency workloads',
                    'items' => [
                      [
                        'title' => 'eventmesh-broker',
                        'description' => 'Ultra-fast ZeroMQ/gRPC event streaming mesh delivering <400μs p99 latency across 100k connected nodes with automated partition rebalancing.',
                        'stars' => '2.4k',
                        'branch' => 'v2.4-stable',
                        'tags' => [
                          'Go',
                          'gRPC',
                          'ZeroMQ',
                          'Distributed Systems'
                        ],
                        'liveUrl' => '#',
                        'githubUrl' => '#'
                      ],
                      [
                        'title' => 'turbokv-engine',
                        'description' => 'Embeddable LSM-tree key-value storage engine in Rust with Raft consensus, zero-copy serialization, and WAL durability.',
                        'stars' => '1.8k',
                        'branch' => 'main',
                        'tags' => [
                          'Rust',
                          'Raft Consensus',
                          'Storage Engines'
                        ],
                        'liveUrl' => '#',
                        'githubUrl' => '#'
                      ],
                      [
                        'title' => 'zerotrust-proxy',
                        'description' => 'Identity-aware edge reverse proxy with eBPF packet inspection and automated mTLS certificate rotation.',
                        'stars' => '940',
                        'branch' => 'release',
                        'tags' => [
                          'eBPF',
                          'C',
                          'Network Security'
                        ],
                        'liveUrl' => '#',
                        'githubUrl' => '#'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'skills_term',
                  'type' => 'skills',
                  'props' => [
                    'title' => 'Technical Competencies & Runtime',
                    'subtitle' => 'Core programming languages, orchestration frameworks, and observability telemetry',
                    'categories' => [
                      [
                        'name' => 'Systems Languages',
                        'skills' => [
                          'Rust',
                          'Go',
                          'Modern C++20',
                          'Python 3',
                          'POSIX Shell',
                          'SQL'
                        ]
                      ],
                      [
                        'name' => 'Infrastructure & Runtime',
                        'skills' => [
                          'Kubernetes',
                          'eBPF',
                          'Raft Consensus',
                          'Kafka',
                          'Redis Cluster',
                          'gRPC'
                        ]
                      ],
                      [
                        'name' => 'Observability & Telemetry',
                        'skills' => [
                          'Prometheus',
                          'OpenTelemetry',
                          'Grafana',
                          'Jaeger Tracing',
                          'Chaos Mesh'
                        ]
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_term',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Open Secure Channel',
                    'subtitle' => 'Available for distributed systems architecture reviews and critical infrastructure consulting.',
                    'email' => 'alex@systems.internal',
                    'location' => 'Stockholm · Global Remote',
                    'availability' => 'Accepting Q3 Technical Audits'
                  ]
                ],
                [
                  'id' => 'footer_term',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Alex Vance. Cryptographically verified with GPG Key ID 0x8FA47B9C.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'developer-docs',
            'name' => 'Technical Documentation Style',
            'name_ar' => 'التوثيق التقني والمواصفات المعمارية',
            'category' => 'Developer',
            'description' => 'Documentation-first layout inspired by Stripe and GitBook with real API specs and latency metrics.',
            'description_ar' => 'تصميم توثيقي هندسي مستوحى من مراجع واجهات البرمجة المتقدمة (API Docs) مع كتل كود ومواصفات أداء.',
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
                  'letterSpacingHeading' => '-0.025em',
                  'borderRadius' => '8px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_docs',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'docs.systems.io/v2',
                      'ctaText' => 'API Reference & Spec',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'hero_docs',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'docs',
                      'badge' => 'v2.4.0 STABLE SPECIFICATION',
                      'title' => 'Alex Vance Systems API',
                      'subtitle' => 'High-Throughput Storage & Consensus Engineering',
                      'description' => 'Technical specifications, RFC implementations, and verifiable cluster telemetry.
Designed for engineers evaluating distributed consensus, storage ergonomics, and high-load performance.',
                      'codeSnippet' => 'curl -X GET https://api.systems.io/v2/cluster/health \\
  -H \'Authorization: Bearer <token>\' \\
  -H \'Accept: application/vnd.raft+json\'',
                      'primaryButtonText' => 'Inspect Endpoints',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Architecture RFCs',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'proj_docs',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'docs',
                      'title' => 'Core Protocol Specifications',
                      'subtitle' => 'Verified HTTP/3 & gRPC interfaces running in multi-region environments',
                      'items' => [
                        [
                          'title' => 'Cluster Health Telemetry',
                          'description' => 'Real-time telemetry probing active Raft leaders, follower heartbeat drift, and replication logs.',
                          'method' => 'GET',
                          'endpoint' => '/v2/cluster/health',
                          'latency' => 'p99 < 1.2ms',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Log Replicate Batch',
                          'description' => 'Atomic consensus batching mechanism writing synchronously to WAL with zero serialization overhead.',
                          'method' => 'POST',
                          'endpoint' => '/v2/raft/replicate',
                          'latency' => 'p99 < 3.8ms',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'Direct Storage Sync',
                          'description' => 'Zero-copy memory dump interface transmitting block-level diffs during catastrophic node recovery.',
                          'method' => 'PUT',
                          'endpoint' => '/v2/storage/sync',
                          'latency' => 'p99 < 5.0ms',
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_docs',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Technical Inquiry & Integration',
                      'subtitle' => 'Connect regarding infrastructure reviews, advisory sessions, or engineering leadership.',
                      'email' => 'alex@systems.internal',
                      'location' => 'San Francisco · Global Remote',
                      'availability' => 'Available for Q3/Q4 Architecture Audits'
                    ]
                  ],
                  [
                    'id' => 'footer_docs',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Alex Vance. All protocol specifications open under MIT license.'
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
                  'lineHeightHeading' => '1.35',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '8px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_docs',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'دليل_المعمارية/v2',
                      'ctaText' => 'المواصفات والواجهات البرمجية',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'hero_docs',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'docs',
                      'badge' => 'المواصفة المعمارية المستقرة 2.4.0',
                      'title' => 'توثيق معمارية الأنظمة الموزعة',
                      'subtitle' => 'هندسة التخزين عالي الكثافة وبروتوكولات الإجماع المتسق',
                      'description' => 'مواصفات معمارية دقيقة، وتطبيقات عملية لبروتوكولات الأنظمة الموزعة، ومقاييس زمن استجابة واقعية.
مصممة للمهندسين والمؤسسات التي تبحث عن أداء موثوق ومستقر تحت أقصى درجات الضغط والطلب.',
                      'codeSnippet' => 'curl -X GET https://api.systems.io/v2/cluster/health \\
  -H \'Authorization: Bearer <token>\' \\
  -H \'Accept: application/vnd.raft+json\'',
                      'primaryButtonText' => 'استعراض الواجهات والمنافذ',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'أوراق المعمارية الهندسية',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_docs',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'docs',
                      'title' => 'مواصفات البروتوكولات البرمجية الأساسية',
                      'subtitle' => 'واجهات gRPC و HTTP/3 معتمدة تعمل في بيئات سحابية متعددة المناطق الجغرافية',
                      'items' => [
                        [
                          'title' => 'قياس صحة العناقيد ومزامنة العقد',
                          'description' => 'فحص فوري لعقد الخوادم النشطة، ومراقبة نبضات العقد التابعة وانحراف السجلات، واكتشاف الأعطال تلقائياً.',
                          'method' => 'GET',
                          'endpoint' => '/v2/cluster/health',
                          'latency' => 'p99 < 1.2ms',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'مزامنة سجلات الإجماع (Raft Batch)',
                          'description' => 'آلية حزم ذرية لكتابة سجلات التوافق مباشرة إلى وسائط التخزين الدائمة دون أي تأخير في الذاكرة.',
                          'method' => 'POST',
                          'endpoint' => '/v2/raft/replicate',
                          'latency' => 'p99 < 3.8ms',
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'المزامنة المباشرة للذاكرة والتخزين',
                          'description' => 'واجهة نقل فائق السرعة لقوالب الذاكرة بدون نسخ إضافي لضمان استعادة العقد فور حدوث انقطاع طارئ.',
                          'method' => 'PUT',
                          'endpoint' => '/v2/storage/sync',
                          'latency' => 'p99 < 5.0ms',
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_docs',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'الاستفسارات الهندسية والتكامل',
                      'subtitle' => 'تواصل معي لمناقشة تدقيق البنى التحتية، أو الاستشارات المعمارية المعقدة، أو قيادة الفرق البرمجية.',
                      'email' => 'mohammad@systems.internal',
                      'location' => 'الرياض · العمل عن بعد دولياً',
                      'availability' => 'متاح لتدقيق الأنظمة والمشاريع الكبرى'
                    ]
                  ],
                  [
                    'id' => 'footer_docs',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 محمد أبو خشريف. جميع المواصفات المعمارية مرخصة برخصة MIT المفتوحة.'
                    ]
                  ]
                ]
              ]
            ],
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
              'letterSpacingHeading' => '-0.025em',
              'borderRadius' => '8px',
              'containerWidth' => 'max-w-6xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_docs',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'docs.systems.io/v2',
                  'ctaText' => 'API Reference & Spec',
                  'ctaLink' => '#projects'
                ]
              ],
              [
                'id' => 'hero_docs',
                'type' => 'hero',
                'props' => [
                  'variant' => 'docs',
                  'badge' => 'v2.4.0 STABLE SPECIFICATION',
                  'title' => 'Alex Vance Systems API',
                  'subtitle' => 'High-Throughput Storage & Consensus Engineering',
                  'description' => 'Technical specifications, RFC implementations, and verifiable cluster telemetry.
Designed for engineers evaluating distributed consensus, storage ergonomics, and high-load performance.',
                  'codeSnippet' => 'curl -X GET https://api.systems.io/v2/cluster/health \\
  -H \'Authorization: Bearer <token>\' \\
  -H \'Accept: application/vnd.raft+json\'',
                  'primaryButtonText' => 'Inspect Endpoints',
                  'primaryButtonLink' => '#projects',
                  'secondaryButtonText' => 'Architecture RFCs',
                  'secondaryButtonLink' => '#skills'
                ]
              ],
              [
                'id' => 'proj_docs',
                'type' => 'projects',
                'props' => [
                  'variant' => 'docs',
                  'title' => 'Core Protocol Specifications',
                  'subtitle' => 'Verified HTTP/3 & gRPC interfaces running in multi-region environments',
                  'items' => [
                    [
                      'title' => 'Cluster Health Telemetry',
                      'description' => 'Real-time telemetry probing active Raft leaders, follower heartbeat drift, and replication logs.',
                      'method' => 'GET',
                      'endpoint' => '/v2/cluster/health',
                      'latency' => 'p99 < 1.2ms',
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'Log Replicate Batch',
                      'description' => 'Atomic consensus batching mechanism writing synchronously to WAL with zero serialization overhead.',
                      'method' => 'POST',
                      'endpoint' => '/v2/raft/replicate',
                      'latency' => 'p99 < 3.8ms',
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'Direct Storage Sync',
                      'description' => 'Zero-copy memory dump interface transmitting block-level diffs during catastrophic node recovery.',
                      'method' => 'PUT',
                      'endpoint' => '/v2/storage/sync',
                      'latency' => 'p99 < 5.0ms',
                      'liveUrl' => '#'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_docs',
                'type' => 'contact',
                'props' => [
                  'title' => 'Technical Inquiry & Integration',
                  'subtitle' => 'Connect regarding infrastructure reviews, advisory sessions, or engineering leadership.',
                  'email' => 'alex@systems.internal',
                  'location' => 'San Francisco · Global Remote',
                  'availability' => 'Available for Q3/Q4 Architecture Audits'
                ]
              ],
              [
                'id' => 'footer_docs',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Alex Vance. All protocol specifications open under MIT license.'
                ]
              ]
            ],
            'schema' => [
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
                'letterSpacingHeading' => '-0.025em',
                'borderRadius' => '8px',
                'containerWidth' => 'max-w-6xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_docs',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'docs.systems.io/v2',
                    'ctaText' => 'API Reference & Spec',
                    'ctaLink' => '#projects'
                  ]
                ],
                [
                  'id' => 'hero_docs',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'docs',
                    'badge' => 'v2.4.0 STABLE SPECIFICATION',
                    'title' => 'Alex Vance Systems API',
                    'subtitle' => 'High-Throughput Storage & Consensus Engineering',
                    'description' => 'Technical specifications, RFC implementations, and verifiable cluster telemetry.
Designed for engineers evaluating distributed consensus, storage ergonomics, and high-load performance.',
                    'codeSnippet' => 'curl -X GET https://api.systems.io/v2/cluster/health \\
  -H \'Authorization: Bearer <token>\' \\
  -H \'Accept: application/vnd.raft+json\'',
                    'primaryButtonText' => 'Inspect Endpoints',
                    'primaryButtonLink' => '#projects',
                    'secondaryButtonText' => 'Architecture RFCs',
                    'secondaryButtonLink' => '#skills'
                  ]
                ],
                [
                  'id' => 'proj_docs',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'docs',
                    'title' => 'Core Protocol Specifications',
                    'subtitle' => 'Verified HTTP/3 & gRPC interfaces running in multi-region environments',
                    'items' => [
                      [
                        'title' => 'Cluster Health Telemetry',
                        'description' => 'Real-time telemetry probing active Raft leaders, follower heartbeat drift, and replication logs.',
                        'method' => 'GET',
                        'endpoint' => '/v2/cluster/health',
                        'latency' => 'p99 < 1.2ms',
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'Log Replicate Batch',
                        'description' => 'Atomic consensus batching mechanism writing synchronously to WAL with zero serialization overhead.',
                        'method' => 'POST',
                        'endpoint' => '/v2/raft/replicate',
                        'latency' => 'p99 < 3.8ms',
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'Direct Storage Sync',
                        'description' => 'Zero-copy memory dump interface transmitting block-level diffs during catastrophic node recovery.',
                        'method' => 'PUT',
                        'endpoint' => '/v2/storage/sync',
                        'latency' => 'p99 < 5.0ms',
                        'liveUrl' => '#'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_docs',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Technical Inquiry & Integration',
                    'subtitle' => 'Connect regarding infrastructure reviews, advisory sessions, or engineering leadership.',
                    'email' => 'alex@systems.internal',
                    'location' => 'San Francisco · Global Remote',
                    'availability' => 'Available for Q3/Q4 Architecture Audits'
                  ]
                ],
                [
                  'id' => 'footer_docs',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Alex Vance. All protocol specifications open under MIT license.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'bento-product',
            'name' => 'Bento Product Engineer',
            'name_ar' => 'مهندس المنتجات بنمط بينتو (Bento)',
            'category' => 'Developer',
            'description' => 'Modern modular Bento grid highlighting product scale, metrics, live availability, and architecture radar.',
            'description_ar' => 'تصميم شبكي عصري بنمط خلايا بينتو يبرز مقاييس النمو الحقيقية، والجاهزية الحية، ورادار التقنيات المعمارية.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#090d16',
                  'textColor' => '#f1f5f9',
                  'primaryColor' => '#3b82f6',
                  'secondaryColor' => '#10b981',
                  'cardBg' => '#111827',
                  'cardBorder' => 'rgba(255,255,255,0.08)',
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
                    'id' => 'nav_bento',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Tariq Al-Mansoor',
                      'ctaText' => 'Let’s Collaborate',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_bento',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'bento',
                      'badge' => 'Open to Staff Product Roles & Advisory',
                      'title' => 'Tariq Al-Mansoor',
                      'subtitle' => 'Principal Product Engineer & Technical Co-Founder',
                      'description' => 'Synthesizing robust distributed backend infrastructure with human-centered product craft. Led core platform initiatives from zero to 10M+ daily active consumers.',
                      'bentoMetricVal' => '10M+',
                      'bentoMetricLabel' => 'Active Monthly Consumers Scaled',
                      'bentoStack' => [
                        'TypeScript',
                        'Next.js App Router',
                        'Go Runtime',
                        'Distributed Systems',
                        'PostgreSQL',
                        'TailwindCSS'
                      ],
                      'primaryButtonText' => 'View Case Studies',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Schedule Call',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_bento',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'bento',
                      'title' => 'Flagship Products & Systems',
                      'subtitle' => 'High-impact platforms engineered for enterprise resilience and obsessive speed',
                      'items' => [
                        [
                          'title' => 'Atlas Cloud Console',
                          'description' => 'Real-time multi-cloud orchestration dashboard handling 50k container deployments hourly with sub-second WebSocket updates.',
                          'tags' => [
                            'Next.js',
                            'Go Engine',
                            'WebSockets',
                            'Kubernetes'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'PayStream Ledger Engine',
                          'description' => 'Double-entry cryptographic ledger processing $45M+ in monthly transaction volume with zero drift.',
                          'tags' => [
                            'PostgreSQL',
                            'TypeScript',
                            'Idempotency'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'VectorSync Search',
                          'description' => 'Sub-millisecond hybrid vector retrieval service indexing 12M product embeddings for eCommerce search.',
                          'tags' => [
                            'Rust',
                            'Qdrant',
                            'gRPC'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_bento',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Start a Conversation',
                      'subtitle' => 'Whether you are building the next breakout consumer tool or modernizing legacy infrastructure, let’s talk.',
                      'email' => 'tariq@almansoor.dev',
                      'location' => 'Dubai & Riyadh · Remote',
                      'availability' => 'Available for Advisory & Co-Founder Roles'
                    ]
                  ],
                  [
                    'id' => 'footer_bento',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Tariq Al-Mansoor. Handcrafted with architectural precision.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#090d16',
                  'textColor' => '#f1f5f9',
                  'primaryColor' => '#3b82f6',
                  'secondaryColor' => '#10b981',
                  'cardBg' => '#111827',
                  'cardBorder' => 'rgba(255,255,255,0.08)',
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
                    'id' => 'nav_bento',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'طارق المنصور',
                      'ctaText' => 'ابدأ التعاون التقني',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'hero_bento',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'bento',
                      'badge' => 'متاح للأدوار القيادية والاستشارات المعمارية',
                      'title' => 'طارق المنصور',
                      'subtitle' => 'مهندس منتجات رقمية أول وشريك تقني مؤسس',
                      'description' => 'أجمع بين هندسة الأنظمة الموزعة والتصميم الإبداعي للمنتجات الرقمية. قمت ببناء وتوسيع منصات تفاعلية تخدم ملايين المستخدمين بنجاح فائق وموثوقية عالية.',
                      'bentoMetricVal' => '10M+',
                      'bentoMetricLabel' => 'مستخدم نشط شهرياً في المنصات المطورة',
                      'bentoStack' => [
                        'تايب سكريبت',
                        'نظم موزعة',
                        'Next.js',
                        'قواعد بيانات PostgreSQL',
                        'تصميم واجهات احترافية',
                        'محركات Go'
                      ],
                      'primaryButtonText' => 'استعراض دراسات الحالة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'حجز جلسة عمل',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_bento',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'bento',
                      'title' => 'أبرز المنتجات والأنظمة المطورة',
                      'subtitle' => 'منصات رقمية مصممة لأقصى درجات الثبات والسرعة الفائقة لخدمة قطاعات حيوية',
                      'items' => [
                        [
                          'title' => 'منصة أطلس السحابية',
                          'description' => 'لوحة تحكم فورية لإدارة ومراقبة الحاويات السحابية تعالج أكثر من 50 ألف عملية نشر في الساعة مع تحديثات لحظية.',
                          'tags' => [
                            'Next.js',
                            'محرك Go',
                            'ويب سوكت',
                            'كوبيرنيتس'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'محرك PayStream للمدفوعات',
                          'description' => 'دفتر حسابات مالي مشفر يعالج أكثر من 45 مليون دولار شهرياً من المعاملات المالية بدقة تامة وبدون أي فروقات.',
                          'tags' => [
                            'PostgreSQL',
                            'تايب سكريبت',
                            'أمان مالي'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'محرك VectorSync للبحث الذكي',
                          'description' => 'خدمة بحث هجينة فائقة السرعة تفهرس 12 مليون متّجه بياني وتدعم تطبيقات التجارة الإلكترونية الضخمة.',
                          'tags' => [
                            'Rust',
                            'Qdrant',
                            'gRPC'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_bento',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'لنبدأ حواراً بنّاءً',
                      'subtitle' => 'سواء كنت تؤسس منتجاً تقنياً جديداً أو تطوّر بنية تحتية قائمة لخدمة ملايين المستخدمين، يسعدني التواصل معك.',
                      'email' => 'tariq@almansoor.dev',
                      'location' => 'دبي والرياض · العمل عن بعد',
                      'availability' => 'متاح كشريك تقني ومستشار منتجات'
                    ]
                  ],
                  [
                    'id' => 'footer_bento',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 طارق المنصور. صُمم وطُوّر بدقة معمارية فائقة.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#090d16',
              'textColor' => '#f1f5f9',
              'primaryColor' => '#3b82f6',
              'secondaryColor' => '#10b981',
              'cardBg' => '#111827',
              'cardBorder' => 'rgba(255,255,255,0.08)',
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
                'id' => 'nav_bento',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'Tariq Al-Mansoor',
                  'ctaText' => 'Let’s Collaborate',
                  'ctaLink' => '#contact'
                ]
              ],
              [
                'id' => 'hero_bento',
                'type' => 'hero',
                'props' => [
                  'variant' => 'bento',
                  'badge' => 'Open to Staff Product Roles & Advisory',
                  'title' => 'Tariq Al-Mansoor',
                  'subtitle' => 'Principal Product Engineer & Technical Co-Founder',
                  'description' => 'Synthesizing robust distributed backend infrastructure with human-centered product craft. Led core platform initiatives from zero to 10M+ daily active consumers.',
                  'bentoMetricVal' => '10M+',
                  'bentoMetricLabel' => 'Active Monthly Consumers Scaled',
                  'bentoStack' => [
                    'TypeScript',
                    'Next.js App Router',
                    'Go Runtime',
                    'Distributed Systems',
                    'PostgreSQL',
                    'TailwindCSS'
                  ],
                  'primaryButtonText' => 'View Case Studies',
                  'primaryButtonLink' => '#projects',
                  'secondaryButtonText' => 'Schedule Call',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'proj_bento',
                'type' => 'projects',
                'props' => [
                  'variant' => 'bento',
                  'title' => 'Flagship Products & Systems',
                  'subtitle' => 'High-impact platforms engineered for enterprise resilience and obsessive speed',
                  'items' => [
                    [
                      'title' => 'Atlas Cloud Console',
                      'description' => 'Real-time multi-cloud orchestration dashboard handling 50k container deployments hourly with sub-second WebSocket updates.',
                      'tags' => [
                        'Next.js',
                        'Go Engine',
                        'WebSockets',
                        'Kubernetes'
                      ],
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'PayStream Ledger Engine',
                      'description' => 'Double-entry cryptographic ledger processing $45M+ in monthly transaction volume with zero drift.',
                      'tags' => [
                        'PostgreSQL',
                        'TypeScript',
                        'Idempotency'
                      ],
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'VectorSync Search',
                      'description' => 'Sub-millisecond hybrid vector retrieval service indexing 12M product embeddings for eCommerce search.',
                      'tags' => [
                        'Rust',
                        'Qdrant',
                        'gRPC'
                      ],
                      'liveUrl' => '#'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_bento',
                'type' => 'contact',
                'props' => [
                  'title' => 'Start a Conversation',
                  'subtitle' => 'Whether you are building the next breakout consumer tool or modernizing legacy infrastructure, let’s talk.',
                  'email' => 'tariq@almansoor.dev',
                  'location' => 'Dubai & Riyadh · Remote',
                  'availability' => 'Available for Advisory & Co-Founder Roles'
                ]
              ],
              [
                'id' => 'footer_bento',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Tariq Al-Mansoor. Handcrafted with architectural precision.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#090d16',
                'textColor' => '#f1f5f9',
                'primaryColor' => '#3b82f6',
                'secondaryColor' => '#10b981',
                'cardBg' => '#111827',
                'cardBorder' => 'rgba(255,255,255,0.08)',
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
                  'id' => 'nav_bento',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'Tariq Al-Mansoor',
                    'ctaText' => 'Let’s Collaborate',
                    'ctaLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'hero_bento',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'bento',
                    'badge' => 'Open to Staff Product Roles & Advisory',
                    'title' => 'Tariq Al-Mansoor',
                    'subtitle' => 'Principal Product Engineer & Technical Co-Founder',
                    'description' => 'Synthesizing robust distributed backend infrastructure with human-centered product craft. Led core platform initiatives from zero to 10M+ daily active consumers.',
                    'bentoMetricVal' => '10M+',
                    'bentoMetricLabel' => 'Active Monthly Consumers Scaled',
                    'bentoStack' => [
                      'TypeScript',
                      'Next.js App Router',
                      'Go Runtime',
                      'Distributed Systems',
                      'PostgreSQL',
                      'TailwindCSS'
                    ],
                    'primaryButtonText' => 'View Case Studies',
                    'primaryButtonLink' => '#projects',
                    'secondaryButtonText' => 'Schedule Call',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'proj_bento',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'bento',
                    'title' => 'Flagship Products & Systems',
                    'subtitle' => 'High-impact platforms engineered for enterprise resilience and obsessive speed',
                    'items' => [
                      [
                        'title' => 'Atlas Cloud Console',
                        'description' => 'Real-time multi-cloud orchestration dashboard handling 50k container deployments hourly with sub-second WebSocket updates.',
                        'tags' => [
                          'Next.js',
                          'Go Engine',
                          'WebSockets',
                          'Kubernetes'
                        ],
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'PayStream Ledger Engine',
                        'description' => 'Double-entry cryptographic ledger processing $45M+ in monthly transaction volume with zero drift.',
                        'tags' => [
                          'PostgreSQL',
                          'TypeScript',
                          'Idempotency'
                        ],
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'VectorSync Search',
                        'description' => 'Sub-millisecond hybrid vector retrieval service indexing 12M product embeddings for eCommerce search.',
                        'tags' => [
                          'Rust',
                          'Qdrant',
                          'gRPC'
                        ],
                        'liveUrl' => '#'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_bento',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Start a Conversation',
                    'subtitle' => 'Whether you are building the next breakout consumer tool or modernizing legacy infrastructure, let’s talk.',
                    'email' => 'tariq@almansoor.dev',
                    'location' => 'Dubai & Riyadh · Remote',
                    'availability' => 'Available for Advisory & Co-Founder Roles'
                  ]
                ],
                [
                  'id' => 'footer_bento',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Tariq Al-Mansoor. Handcrafted with architectural precision.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'minimal-dev',
            'name' => 'Minimalist Monospace Developer',
            'name_ar' => 'المطور البسيط (Minimal Monospace)',
            'category' => 'Developer',
            'description' => 'Scandinavian minimalist monospace craft focusing on package authoring, zero bloat, and compiler benchmarks.',
            'description_ar' => 'بساطة إسكندنافية مطلقة تركز على وضوح الكود الخالص، وتطوير الحزم البرمجية، والأداء الصافي بدون أي زيادات.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0c0f14',
                  'textColor' => '#e2e8f0',
                  'primaryColor' => '#38bdf8',
                  'secondaryColor' => '#94a3b8',
                  'cardBg' => 'transparent',
                  'cardBorder' => 'rgba(148,163,184,0.12)',
                  'headingFont' => 'Fira Code',
                  'bodyFont' => 'Inter',
                  'lineHeightHeading' => '1.3',
                  'lineHeightBody' => '1.7',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '4px',
                  'containerWidth' => 'max-w-4xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'nav_min',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'lukas.dev',
                      'ctaText' => 'email',
                      'ctaLink' => 'mailto:lukas@lindqvist.se'
                    ]
                  ],
                  [
                    'id' => 'hero_min',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'minimal',
                      'badge' => 'STOCKHOLM · OPEN SOURCE CRAFT',
                      'title' => 'Lukas Lindqvist',
                      'subtitle' => 'Systems Programmer & Minimalist Software Artisan',
                      'description' => 'I build single-binary CLI tools, zero-dependency data structures, and verifiable compiler performance.
Believer in radical simplicity, small software, and durable architectures.',
                      'primaryButtonText' => 'Packages & Code',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Read Notes',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_min',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'minimal',
                      'title' => 'Selected Packages & Utilities',
                      'subtitle' => 'Zero-dependency standalone libraries maintained under permissive licenses',
                      'items' => [
                        [
                          'title' => 'simd-json-parser',
                          'description' => 'Fast vector-accelerated JSON parser operating at 3.2 GB/s per core in pure C11.',
                          'year' => '2025',
                          'tags' => [
                            'C11',
                            'SIMD',
                            'Zero-Allocation'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'compact-bloom',
                          'description' => 'Cache-aligned Bloom filter implementation optimized for L1 CPU data cache residency.',
                          'year' => '2024',
                          'tags' => [
                            'Rust',
                            'Algorithms'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'tiny-raft',
                          'description' => 'Educational and verifiable consensus protocol implemented in under 800 lines of readable Go.',
                          'year' => '2024',
                          'tags' => [
                            'Go',
                            'Raft'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_min',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Direct Correspondence',
                      'subtitle' => 'Encrypted or plain text email is the preferred mode of contact.',
                      'email' => 'lukas@lindqvist.se',
                      'location' => 'Stockholm, Sweden',
                      'availability' => 'Open for selective open-source sponsorships'
                    ]
                  ],
                  [
                    'id' => 'footer_min',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Lukas Lindqvist. Built with minimal footprint.'
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0c0f14',
                  'textColor' => '#e2e8f0',
                  'primaryColor' => '#38bdf8',
                  'secondaryColor' => '#94a3b8',
                  'cardBg' => 'transparent',
                  'cardBorder' => 'rgba(148,163,184,0.12)',
                  'headingFont' => 'IBM Plex Sans Arabic',
                  'bodyFont' => 'IBM Plex Sans Arabic',
                  'lineHeightHeading' => '1.4',
                  'lineHeightBody' => '1.85',
                  'letterSpacingHeading' => '0em',
                  'borderRadius' => '4px',
                  'containerWidth' => 'max-w-4xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'nav_min',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'إياس_السالم.برمجة',
                      'ctaText' => 'مراسلة مباشرة',
                      'ctaLink' => 'mailto:eyas@alsalem.dev'
                    ]
                  ],
                  [
                    'id' => 'hero_min',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'minimal',
                      'badge' => 'برمجيات مفتوحة المصدر · كود نقي بلا تعقيد',
                      'title' => 'إياس السالم',
                      'subtitle' => 'مبرمج نظم ومطور حزم برمجية مستقلة',
                      'description' => 'أركز على بناء أدوات سطر أوامر خفيفة ومستقلة، وتراكيب بيانات نقية خالية من الاعتماديات الخارجية المعقدة.
أؤمن بالبساطة البرمجية الجذرية، والكود الخفيف المتين الذي يدوم لسنوات دون الحاجة لصيانة مرهقة.',
                      'primaryButtonText' => 'الحزم والمستودعات',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'التواصل والملاحظات',
                      'secondaryButtonLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'proj_min',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'minimal',
                      'title' => 'الحزم والبرمجيات المختارة',
                      'subtitle' => 'مكتبات برمجية مستقلة تماماً ومطروحة برخص برمجية حرة ومفتوحة',
                      'items' => [
                        [
                          'title' => 'محلل simd-json-parser',
                          'description' => 'محلل JSON فائق السرعة يستفيد من معالجات SIMD المتوازية بمعدل 3.2 جيجابايت/ثانية للنواة الواحدة بلغة C11.',
                          'year' => '2025',
                          'tags' => [
                            'C11',
                            'SIMD',
                            'بدون استهلاك ذاكرة'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'فلتر compact-bloom',
                          'description' => 'تطبيق لخوارزمية Bloom filter محسن خصيصاً للتواجد في كاش المعالج L1 لتقليل وقت البحث إلى الصفر.',
                          'year' => '2024',
                          'tags' => [
                            'Rust',
                            'خوارزميات'
                          ],
                          'liveUrl' => '#'
                        ],
                        [
                          'title' => 'بروتوكول tiny-raft',
                          'description' => 'تطبيق تعليمي وموثق بالكامل لبروتوكول التوافق والإجماع Raft في أقل من 800 سطر برمجي بلغة Go.',
                          'year' => '2024',
                          'tags' => [
                            'Go',
                            'Raft'
                          ],
                          'liveUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'contact_min',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'المراسلة المباشرة',
                      'subtitle' => 'البريد الإلكتروني هو وسيلتي المفضلة دائماً للنقاشات التقنية العميقة وملاحظات الأكواد.',
                      'email' => 'eyas@alsalem.dev',
                      'location' => 'الرياض، المملكة العربية السعودية',
                      'availability' => 'متاح لدعم ورعاية المشاريع مفتوحة المصدر'
                    ]
                  ],
                  [
                    'id' => 'footer_min',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 إياس السالم. بُني بأقل استهلاك وأعلى وضوح ممكن.'
                    ]
                  ]
                ]
              ]
            ],
            'theme' => [
              'backgroundColor' => '#0c0f14',
              'textColor' => '#e2e8f0',
              'primaryColor' => '#38bdf8',
              'secondaryColor' => '#94a3b8',
              'cardBg' => 'transparent',
              'cardBorder' => 'rgba(148,163,184,0.12)',
              'headingFont' => 'Fira Code',
              'bodyFont' => 'Inter',
              'lineHeightHeading' => '1.3',
              'lineHeightBody' => '1.7',
              'letterSpacingHeading' => '-0.02em',
              'borderRadius' => '4px',
              'containerWidth' => 'max-w-4xl',
              'direction' => 'ltr'
            ],
            'sections' => [
              [
                'id' => 'nav_min',
                'type' => 'navbar',
                'props' => [
                  'brandText' => 'lukas.dev',
                  'ctaText' => 'email',
                  'ctaLink' => 'mailto:lukas@lindqvist.se'
                ]
              ],
              [
                'id' => 'hero_min',
                'type' => 'hero',
                'props' => [
                  'variant' => 'minimal',
                  'badge' => 'STOCKHOLM · OPEN SOURCE CRAFT',
                  'title' => 'Lukas Lindqvist',
                  'subtitle' => 'Systems Programmer & Minimalist Software Artisan',
                  'description' => 'I build single-binary CLI tools, zero-dependency data structures, and verifiable compiler performance.
Believer in radical simplicity, small software, and durable architectures.',
                  'primaryButtonText' => 'Packages & Code',
                  'primaryButtonLink' => '#projects',
                  'secondaryButtonText' => 'Read Notes',
                  'secondaryButtonLink' => '#contact'
                ]
              ],
              [
                'id' => 'proj_min',
                'type' => 'projects',
                'props' => [
                  'variant' => 'minimal',
                  'title' => 'Selected Packages & Utilities',
                  'subtitle' => 'Zero-dependency standalone libraries maintained under permissive licenses',
                  'items' => [
                    [
                      'title' => 'simd-json-parser',
                      'description' => 'Fast vector-accelerated JSON parser operating at 3.2 GB/s per core in pure C11.',
                      'year' => '2025',
                      'tags' => [
                        'C11',
                        'SIMD',
                        'Zero-Allocation'
                      ],
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'compact-bloom',
                      'description' => 'Cache-aligned Bloom filter implementation optimized for L1 CPU data cache residency.',
                      'year' => '2024',
                      'tags' => [
                        'Rust',
                        'Algorithms'
                      ],
                      'liveUrl' => '#'
                    ],
                    [
                      'title' => 'tiny-raft',
                      'description' => 'Educational and verifiable consensus protocol implemented in under 800 lines of readable Go.',
                      'year' => '2024',
                      'tags' => [
                        'Go',
                        'Raft'
                      ],
                      'liveUrl' => '#'
                    ]
                  ]
                ]
              ],
              [
                'id' => 'contact_min',
                'type' => 'contact',
                'props' => [
                  'title' => 'Direct Correspondence',
                  'subtitle' => 'Encrypted or plain text email is the preferred mode of contact.',
                  'email' => 'lukas@lindqvist.se',
                  'location' => 'Stockholm, Sweden',
                  'availability' => 'Open for selective open-source sponsorships'
                ]
              ],
              [
                'id' => 'footer_min',
                'type' => 'footer',
                'props' => [
                  'copyrightText' => '© 2026 Lukas Lindqvist. Built with minimal footprint.'
                ]
              ]
            ],
            'schema' => [
              'theme' => [
                'backgroundColor' => '#0c0f14',
                'textColor' => '#e2e8f0',
                'primaryColor' => '#38bdf8',
                'secondaryColor' => '#94a3b8',
                'cardBg' => 'transparent',
                'cardBorder' => 'rgba(148,163,184,0.12)',
                'headingFont' => 'Fira Code',
                'bodyFont' => 'Inter',
                'lineHeightHeading' => '1.3',
                'lineHeightBody' => '1.7',
                'letterSpacingHeading' => '-0.02em',
                'borderRadius' => '4px',
                'containerWidth' => 'max-w-4xl',
                'direction' => 'ltr'
              ],
              'sections' => [
                [
                  'id' => 'nav_min',
                  'type' => 'navbar',
                  'props' => [
                    'brandText' => 'lukas.dev',
                    'ctaText' => 'email',
                    'ctaLink' => 'mailto:lukas@lindqvist.se'
                  ]
                ],
                [
                  'id' => 'hero_min',
                  'type' => 'hero',
                  'props' => [
                    'variant' => 'minimal',
                    'badge' => 'STOCKHOLM · OPEN SOURCE CRAFT',
                    'title' => 'Lukas Lindqvist',
                    'subtitle' => 'Systems Programmer & Minimalist Software Artisan',
                    'description' => 'I build single-binary CLI tools, zero-dependency data structures, and verifiable compiler performance.
Believer in radical simplicity, small software, and durable architectures.',
                    'primaryButtonText' => 'Packages & Code',
                    'primaryButtonLink' => '#projects',
                    'secondaryButtonText' => 'Read Notes',
                    'secondaryButtonLink' => '#contact'
                  ]
                ],
                [
                  'id' => 'proj_min',
                  'type' => 'projects',
                  'props' => [
                    'variant' => 'minimal',
                    'title' => 'Selected Packages & Utilities',
                    'subtitle' => 'Zero-dependency standalone libraries maintained under permissive licenses',
                    'items' => [
                      [
                        'title' => 'simd-json-parser',
                        'description' => 'Fast vector-accelerated JSON parser operating at 3.2 GB/s per core in pure C11.',
                        'year' => '2025',
                        'tags' => [
                          'C11',
                          'SIMD',
                          'Zero-Allocation'
                        ],
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'compact-bloom',
                        'description' => 'Cache-aligned Bloom filter implementation optimized for L1 CPU data cache residency.',
                        'year' => '2024',
                        'tags' => [
                          'Rust',
                          'Algorithms'
                        ],
                        'liveUrl' => '#'
                      ],
                      [
                        'title' => 'tiny-raft',
                        'description' => 'Educational and verifiable consensus protocol implemented in under 800 lines of readable Go.',
                        'year' => '2024',
                        'tags' => [
                          'Go',
                          'Raft'
                        ],
                        'liveUrl' => '#'
                      ]
                    ]
                  ]
                ],
                [
                  'id' => 'contact_min',
                  'type' => 'contact',
                  'props' => [
                    'title' => 'Direct Correspondence',
                    'subtitle' => 'Encrypted or plain text email is the preferred mode of contact.',
                    'email' => 'lukas@lindqvist.se',
                    'location' => 'Stockholm, Sweden',
                    'availability' => 'Open for selective open-source sponsorships'
                  ]
                ],
                [
                  'id' => 'footer_min',
                  'type' => 'footer',
                  'props' => [
                    'copyrightText' => '© 2026 Lukas Lindqvist. Built with minimal footprint.'
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'fullstack-craftsman',
            'name' => 'Full Stack Software Craftsman',
            'name_ar' => 'مهندس التطبيقات الشاملة المتكاملة',
            'category' => 'Developer',
            'description' => 'Production full-stack engineering portfolio featuring live application demos, interactive architecture diagrams, and Lighthouse 100/100 performance.',
            'description_ar' => 'معرض أعمال مهندس تطبيقات الويب المتكاملة مع استعراض حي للتطبيقات، ومخططات معمارية تفاعلية، وأداء قياسي 100/100.',
            'is_featured' => 1,
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
                  'lineHeightHeading' => '1.25',
                  'lineHeightBody' => '1.6',
                  'letterSpacingHeading' => '-0.02em',
                  'borderRadius' => '10px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'ltr'
                ],
                'sections' => [
                  [
                    'id' => 'fs_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'David Kross · Full Stack',
                      'ctaText' => 'Hire Full Stack',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'fs_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'Available for Q3/Q4 Senior Roles & Consulting',
                      'title' => 'Crafting High-Performance Web Applications from Core Architecture to Polished Pixels',
                      'subtitle' => 'Senior Full Stack Engineer & Distributed Systems Practitioner',
                      'description' => 'Over 8 years building mission-critical platforms with TypeScript, React/Next.js, Node.js, and PostgreSQL. Focused on sub-100ms API responses, zero-downtime database migrations, and intuitive UX.',
                      'primaryButtonText' => 'Explore Live Systems',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Inspect Tech Stack',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'fs_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Engineered for Real-World Production',
                      'subtitle' => 'Verified benchmarks from applications running in live enterprise environments',
                      'items' => [
                        [
                          'value' => '8+ Years',
                          'label' => 'Production Engineering',
                          'icon' => 'fa-solid fa-code'
                        ],
                        [
                          'value' => '99.99%',
                          'label' => 'Historical Uptime SLA',
                          'icon' => 'fa-solid fa-server'
                        ],
                        [
                          'value' => '<85ms',
                          'label' => 'Median API Latency (p95)',
                          'icon' => 'fa-solid fa-bolt'
                        ],
                        [
                          'value' => '3.2M+',
                          'label' => 'Active Users Served',
                          'icon' => 'fa-solid fa-users'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'fs_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Featured Production Applications',
                      'subtitle' => 'Full-stack systems deployed with automated CI/CD and multi-tenant database architectures',
                      'items' => [
                        [
                          'title' => 'OmniSync Cloud ERP',
                          'description' => 'Multi-tenant real-time inventory management engine featuring WebSocket state synchronization, optimistic locking, and Stripe billing.',
                          'tags' => [
                            'Next.js 14',
                            'PostgreSQL',
                            'Prisma',
                            'Redis',
                            'Docker'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'PulseMetrics Real-Time Analytics',
                          'description' => 'High-throughput event tracking dashboard ingesting 40k events/sec using ClickHouse and Apache Kafka with sub-second analytical queries.',
                          'tags' => [
                            'TypeScript',
                            'ClickHouse',
                            'Kafka',
                            'TailwindCSS'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'AuthShield Identity Broker',
                          'description' => 'OAuth2/OIDC centralized identity microservice supporting Passkeys, SAML SSO, and role-based access control with audited encryption.',
                          'tags' => [
                            'Go',
                            'JWT',
                            'WebAuthn',
                            'PostgreSQL',
                            'gRPC'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'fs_skills',
                    'type' => 'skills',
                    'props' => [
                      'title' => 'Verified Technical Capabilities',
                      'subtitle' => 'Tools and technologies exercised regularly across full-stack lifecycles',
                      'categories' => [
                        [
                          'category' => 'Frontend Architecture',
                          'items' => [
                            [
                              'name' => 'React & Next.js (App Router)',
                              'level' => 'Expert'
                            ],
                            [
                              'name' => 'TypeScript & State Machines',
                              'level' => 'Expert'
                            ],
                            [
                              'name' => 'TailwindCSS & Design Tokens',
                              'level' => 'Advanced'
                            ]
                          ]
                        ],
                        [
                          'category' => 'Backend & Distributed Services',
                          'items' => [
                            [
                              'name' => 'Node.js / Express / NestJS',
                              'level' => 'Expert'
                            ],
                            [
                              'name' => 'Go (Golang) Microservices',
                              'level' => 'Advanced'
                            ],
                            [
                              'name' => 'PostgreSQL & Query Optimization',
                              'level' => 'Expert'
                            ],
                            [
                              'name' => 'Redis Caching & PubSub',
                              'level' => 'Advanced'
                            ]
                          ]
                        ],
                        [
                          'category' => 'DevOps & Observability',
                          'items' => [
                            [
                              'name' => 'Docker & Kubernetes',
                              'level' => 'Advanced'
                            ],
                            [
                              'name' => 'GitHub Actions CI/CD',
                              'level' => 'Expert'
                            ],
                            [
                              'name' => 'Prometheus & Grafana',
                              'level' => 'Advanced'
                            ]
                          ]
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'fs_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Initiate Technical Collaboration',
                      'subtitle' => 'Available for principal engineering roles, system architecture reviews, and high-impact advisory contracts.',
                      'email' => 'david.kross@craftfolio-engineer.dev',
                      'location' => 'Berlin / Global Remote',
                      'availability' => 'Open to selective high-impact contracts'
                    ]
                  ],
                  [
                    'id' => 'fs_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 David Kross. Architected with Craftfolio.',
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
                  'borderRadius' => '10px',
                  'containerWidth' => 'max-w-6xl',
                  'direction' => 'rtl'
                ],
                'sections' => [
                  [
                    'id' => 'fs_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'سامي عبد الرحمن · مهندس برمجيات',
                      'ctaText' => 'تواصل للتوظيف',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'fs_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'متاح للفرص القيادية والاستشارات التقنية المتقدمة',
                      'title' => 'هندسة وبناء تطبيقات الويب المتكاملة من النواة المعمارية حتى أدق تفاصيل الواجهة',
                      'subtitle' => 'مهندس برمجيات شامل وممارس لتصميم الأنظمة عالية الأداء',
                      'description' => 'أكثر من 8 سنوات من الخبرة في بناء المنصات الحيوية باستخدام TypeScript وReact/Next.js وNode.js وقواعد بيانات PostgreSQL. تركيز دائم على زمن استجابة أقل من 100 مللي ثانية، وهجرة بيانات بدون توقف، وتجربة استخدام استثنائية.',
                      'primaryButtonText' => 'استعراض الأنظمة الحية',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'فحص المهارات والتقنيات',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'fs_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'أرقام حقيقية من بيئات الإنتاج الحية',
                      'subtitle' => 'إحصائيات موثقة لأنظمة ومنصات تعمل بكفاءة على مدار الساعة',
                      'items' => [
                        [
                          'value' => '+8 سنوات',
                          'label' => 'خبرة في هندسة الإنتاج',
                          'icon' => 'fa-solid fa-code'
                        ],
                        [
                          'value' => '99.99%',
                          'label' => 'معدل التوفر التشغيلي (SLA)',
                          'icon' => 'fa-solid fa-server'
                        ],
                        [
                          'value' => '<85ms',
                          'label' => 'متوسط زمن استجابة الواجهات (p95)',
                          'icon' => 'fa-solid fa-bolt'
                        ],
                        [
                          'value' => '+3.2M',
                          'label' => 'مستخدم نشط للمنصات',
                          'icon' => 'fa-solid fa-users'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'fs_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'مشاريع وأنظمة من بيئة الإنتاج',
                      'subtitle' => 'تطبيقات ويب كاملة مبنية بمعمارية معتمدة على الحاويات وقواعد بيانات متعددة المستأجرين',
                      'items' => [
                        [
                          'title' => 'نظام OmniSync السحابي',
                          'description' => 'منصة إدارة مخزون فورية متعددة المستأجرين مع مزامنة حالة عبر WebSockets ونظام قفل متفائل ودفع متكامل مع Stripe.',
                          'tags' => [
                            'Next.js 14',
                            'PostgreSQL',
                            'Prisma',
                            'Redis',
                            'Docker'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'لوحة PulseMetrics للتحليلات الحية',
                          'description' => 'نظام تتبع أحداث عالي التدفق يعالج 40 ألف حدث في الثانية باستخدام ClickHouse وApache Kafka مع استعلامات تحليلية فائقة السرعة.',
                          'tags' => [
                            'TypeScript',
                            'ClickHouse',
                            'Kafka',
                            'TailwindCSS'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'بوابة AuthShield للمصادقة والهوية',
                          'description' => 'خدمة مصادقة وهوية مركزية تدعم بروتوكولات OAuth2 وOIDC ومفاتيح Passkeys وتسجيل الدخول الموحد SAML مع تشفير مدقق.',
                          'tags' => [
                            'Go',
                            'JWT',
                            'WebAuthn',
                            'PostgreSQL',
                            'gRPC'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'fs_skills',
                    'type' => 'skills',
                    'props' => [
                      'title' => 'القدرات البرمجية والتقنية المعتمدة',
                      'subtitle' => 'الأدوات والتقنيات المستخدمة باستمرار عبر دورة حياة التطبيقات المتكاملة',
                      'categories' => [
                        [
                          'category' => 'معمارية الواجهات الأمامية',
                          'items' => [
                            [
                              'name' => 'React وNext.js (App Router)',
                              'level' => 'خبير'
                            ],
                            [
                              'name' => 'TypeScript وإدارة الحالة المتقدمة',
                              'level' => 'خبير'
                            ],
                            [
                              'name' => 'TailwindCSS ومكتبات التصميم',
                              'level' => 'متقدم'
                            ]
                          ]
                        ],
                        [
                          'category' => 'الأنظمة الخلفية والخدمات الموزعة',
                          'items' => [
                            [
                              'name' => 'Node.js / Express / NestJS',
                              'level' => 'خبير'
                            ],
                            [
                              'name' => 'خدمات مصغرة بلغة Go',
                              'level' => 'متقدم'
                            ],
                            [
                              'name' => 'قواعد بيانات PostgreSQL وتحسين الاستعلامات',
                              'level' => 'خبير'
                            ],
                            [
                              'name' => 'التخزين المؤقت عبر Redis',
                              'level' => 'متقدم'
                            ]
                          ]
                        ],
                        [
                          'category' => 'الحوسبة السحابية والمراقبة التشغيلية',
                          'items' => [
                            [
                              'name' => 'Docker وKubernetes',
                              'level' => 'متقدم'
                            ],
                            [
                              'name' => 'خطوط الأتمتة GitHub Actions',
                              'level' => 'خبير'
                            ],
                            [
                              'name' => 'المراقبة عبر Prometheus وGrafana',
                              'level' => 'متقدم'
                            ]
                          ]
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'fs_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'بدء التواصل التقني المباشر',
                      'subtitle' => 'متاح للأدوار الهندسية القيادية، ومراجعة المعمارية البرمجية، والاستشارات التقنية المتخصصة.',
                      'email' => 'sami.rahman@craftfolio-engineer.dev',
                      'location' => 'الرياض / عمل عن بعد عالمياً',
                      'availability' => 'متاح للمشاريع النوعية عالية التأثير'
                    ]
                  ],
                  [
                    'id' => 'fs_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 سامي عبد الرحمن. بنيت بواسطة Craftfolio.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'backend-systems',
            'name' => 'Distributed Backend Architect',
            'name_ar' => 'معماري النظم الخلفية الموزعة',
            'category' => 'Developer',
            'description' => 'High-throughput backend engineering portfolio highlighting microservices, Kafka event streams, and sub-millisecond database indexing.',
            'description_ar' => 'معرض أعمال مهندس النظم الخلفية المعقدة مع التركيز على الخدمات المصغرة وتدفق بيانات Kafka واستعلامات القواعد فائقة السرعة.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0b0f19',
                  'textColor' => '#e2e8f0',
                  'primaryColor' => '#10b981',
                  'secondaryColor' => '#059669',
                  'cardBg' => '#111827',
                  'cardBorder' => '#1f2937',
                  'headingFont' => 'Fira Code',
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
                    'id' => 'be_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Viktor Vane · Backend Systems',
                      'ctaText' => 'Architecture RFCs',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'be_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'terminal',
                      'windowTitle' => 'vane@node-eu-west-1:~',
                      'command' => 'systemctl status distributed-mesh --full',
                      'statusText' => 'CLUSTER STABLE · 500K REQ/SEC',
                      'title' => 'Viktor Vane',
                      'subtitle' => 'Principal Distributed Systems & Backend Architect',
                      'description' => 'Designing fault-tolerant streaming pipelines, LSM-tree storage engines, and high-concurrency RPC protocols. Eliminating deadlocks, reducing tail latency, and scaling data fabrics to millions of operations per second.',
                      'primaryButtonText' => 'Inspect System RFCs',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Benchmark Reports',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'be_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'terminal',
                      'title' => 'Distributed Storage & Message Engines',
                      'subtitle' => 'Production-hardened open-source backends evaluated under multi-datacenter partitions',
                      'items' => [
                        [
                          'title' => 'raft-wal-engine',
                          'description' => 'Write-Ahead-Log storage engine in Go with Raft state replication, deterministic snapshotting, and CRC32 memory safety.',
                          'stars' => '3.1k',
                          'branch' => 'v3.2-prod',
                          'tags' => [
                            'Go',
                            'Raft Consensus',
                            'LSM-Tree',
                            'Storage'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'hyper-grpc-proxy',
                          'description' => 'eBPF-accelerated gRPC service mesh proxy providing zero-copy payload forwarding and dynamic load balancing across 250 Kubernetes pods.',
                          'stars' => '1.9k',
                          'branch' => 'main',
                          'tags' => [
                            'Rust',
                            'eBPF',
                            'gRPC',
                            'Protobuf'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'stream-rebalancer',
                          'description' => 'Distributed Kafka consumer rebalancing daemon preventing consumer starvation during cloud spot instance reclaims.',
                          'stars' => '1.2k',
                          'branch' => 'stable',
                          'tags' => [
                            'Java 21',
                            'Kafka',
                            'Zookeeper',
                            'Microservices'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'be_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Cluster Throughput & Benchmarks',
                      'subtitle' => 'Hard metrics measured under simulated failure and high partition stress',
                      'items' => [
                        [
                          'value' => '500k+',
                          'label' => 'Requests / Sec Handled',
                          'icon' => 'fa-solid fa-network-wired'
                        ],
                        [
                          'value' => '<4ms',
                          'label' => 'p99 End-to-End Latency',
                          'icon' => 'fa-solid fa-stopwatch'
                        ],
                        [
                          'value' => '0',
                          'label' => 'Data Loss Incidents Recorded',
                          'icon' => 'fa-solid fa-shield-halved'
                        ],
                        [
                          'value' => '12TB+',
                          'label' => 'Daily Stream Throughput',
                          'icon' => 'fa-solid fa-database'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'be_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Backend Systems Advisory',
                      'subtitle' => 'Available for architectural reviews, concurrency bottleneck triage, and core infrastructure contracts.',
                      'email' => 'viktor.vane@craftfolio-systems.net',
                      'location' => 'Stockholm / Remote',
                      'availability' => 'Contracting for selective Q3/Q4 infrastructure initiatives'
                    ]
                  ],
                  [
                    'id' => 'be_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Viktor Vane · Systems Architect.',
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
                  'textColor' => '#e2e8f0',
                  'primaryColor' => '#10b981',
                  'secondaryColor' => '#059669',
                  'cardBg' => '#111827',
                  'cardBorder' => '#1f2937',
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
                    'id' => 'be_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'رامي الخالدي · معماري النظم الخلفية',
                      'ctaText' => 'مواصفات المعمارية',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'be_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'terminal',
                      'windowTitle' => 'khaldi@cluster-node-01:~',
                      'command' => 'systemctl status distributed-mesh --full',
                      'statusText' => 'العنقود مستقر · 500 ألف طلب/ثانية',
                      'title' => 'رامي الخالدي',
                      'subtitle' => 'كبير مهندسي ومعماري النظم الموزعة والخدمات الخلفية',
                      'description' => 'تصميم وبناء خطوط تدفق البيانات المقاومة للأعطال، ومحركات التخزين منخفضة التأخير، وبروتوكولات RPC المتزامنة. القضاء على الاختناقات، وتقليل زمن التأخير الحرج، وتوسيع بنية البيانات لتتحمل ملايين العمليات في الثانية.',
                      'primaryButtonText' => 'استعراض مواصفات الأنظمة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'تقارير الأداء القياسية',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'be_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'terminal',
                      'title' => 'محركات التخزين وتدفق الرسائل الموزعة',
                      'subtitle' => 'أنظمة مفتوحة المصدر مجربة في بيئات الإنتاج الحقيقية ومعزولة ضد انقطاع الشبكات',
                      'items' => [
                        [
                          'title' => 'محرك raft-wal-engine',
                          'description' => 'محرك تخزين سجلات مسبق الكتابة بلغة Go مع مزامنة حالة عبر خوارزمية Raft وضمانات سلامة الذاكرة عبر CRC32.',
                          'stars' => '3.1k',
                          'branch' => 'v3.2-prod',
                          'tags' => [
                            'Go',
                            'Raft Consensus',
                            'LSM-Tree',
                            'Storage'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'وكيل hyper-grpc-proxy',
                          'description' => 'وكيل لشبكة خدمات gRPC مدعوم بتقنية eBPF لتمرير البيانات بدون نسخ مفرط وتوزيع الأحمال ديناميكياً على 250 عقدة.',
                          'stars' => '1.9k',
                          'branch' => 'main',
                          'tags' => [
                            'Rust',
                            'eBPF',
                            'gRPC',
                            'Protobuf'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'أداة stream-rebalancer',
                          'description' => 'خدمة خلفية موزعة لإعادة موازنة مستهلكي Kafka تلقائياً ومنع تجويع الخدمات عند إعادة تشغيل السيرفرات السحابية.',
                          'stars' => '1.2k',
                          'branch' => 'stable',
                          'tags' => [
                            'Java 21',
                            'Kafka',
                            'Zookeeper',
                            'Microservices'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'be_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'معدلات تدفق البيانات والأداء الحقيقي',
                      'subtitle' => 'أرقام حقيقية مقاسة تحت اختبارات الضغط الشديد وعزل مراكز البيانات',
                      'items' => [
                        [
                          'value' => '+500k',
                          'label' => 'طلب معالج في الثانية',
                          'icon' => 'fa-solid fa-network-wired'
                        ],
                        [
                          'value' => '<4ms',
                          'label' => 'زمن الاستجابة الحرج (p99)',
                          'icon' => 'fa-solid fa-stopwatch'
                        ],
                        [
                          'value' => '0',
                          'label' => 'فقدان في البيانات المسجلة',
                          'icon' => 'fa-solid fa-shield-halved'
                        ],
                        [
                          'value' => '+12TB',
                          'label' => 'تدفق بيانات يومي عبر المنصة',
                          'icon' => 'fa-solid fa-database'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'be_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'استشارات النظم الخلفية المتطورة',
                      'subtitle' => 'متاح لمراجعة المعمارية البرمجية، وحل مشكلات التزامن المعقدة، ومشاريع البنية التحتية النوعية.',
                      'email' => 'rami.khaldi@craftfolio-systems.net',
                      'location' => 'دبي / عمل عن بعد عالمياً',
                      'availability' => 'متاح للتعاقدات النوعية عالية الحساسية'
                    ]
                  ],
                  [
                    'id' => 'be_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 رامي الخالدي · معماري النظم الموزعة.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'frontend-ui-architect',
            'name' => 'Frontend & Design Systems Architect',
            'name_ar' => 'مهندس الواجهات ومكتبات التصميم',
            'category' => 'Developer',
            'description' => 'Modern aesthetic frontend portfolio spotlighting accessible headless UI components, fluid CSS design tokens, and Core Web Vitals optimization.',
            'description_ar' => 'معرض أعمال مهندس واجهات المستخدم ومكتبات التصميم مع التركيز على إمكانية الوصول والتصميم التكيفي وتحقيق أعلى معدلات Core Web Vitals.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#090d16',
                  'textColor' => '#f8fafc',
                  'primaryColor' => '#6366f1',
                  'secondaryColor' => '#8b5cf6',
                  'cardBg' => '#131b2e',
                  'cardBorder' => '#24324f',
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
                    'id' => 'fe_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Sophia Moreau · UI Architect',
                      'ctaText' => 'Design Tokens',
                      'ctaLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'fe_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => '100% WCAG AAA · Zero Layout Shift',
                      'title' => 'Building Accessible, Fluid Design Systems for Multi-Platform Web Applications',
                      'subtitle' => 'Staff Frontend Architect & Design Systems Lead',
                      'description' => 'Pioneering headless component architectures, micro-frontends, and automated accessibility regression suites. Transforming complex UX workflows into silky-smooth, 60fps responsive interfaces.',
                      'primaryButtonText' => 'View Component Libraries',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Inspect Design System',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'fe_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Design Systems & Component Libraries',
                      'subtitle' => 'Open-source design tokens and UI architectures used across millions of monthly sessions',
                      'items' => [
                        [
                          'title' => 'Prism UI Token Engine',
                          'description' => 'Multi-brand design token transformer syncing Figma variables directly to CSS custom properties, Tailwind plugins, and iOS/Android tokens.',
                          'tags' => [
                            'TypeScript',
                            'Design Tokens',
                            'Figma API',
                            'TailwindCSS'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'AriaAccessible Headless Suite',
                          'description' => 'Full suite of unstyled, fully accessible keyboard-navigable components compliant with WCAG 2.2 AAA guidelines.',
                          'tags' => [
                            'React',
                            'Accessibility',
                            'WAI-ARIA',
                            'Testing Library'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'FluidCanvas Data Visualizer',
                          'description' => 'WebGL & Canvas 2D reactive charting library delivering 60fps rendering for datasets containing up to 100k data points.',
                          'tags' => [
                            'WebGL',
                            'Canvas API',
                            'TypeScript',
                            'D3.js'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'fe_skills',
                    'type' => 'skills',
                    'props' => [
                      'title' => 'Design System & Frontend Competencies',
                      'subtitle' => 'Deep specialization in modern browser rendering, styling architectures, and toolchains',
                      'categories' => [
                        [
                          'category' => 'Core UI Frameworks',
                          'items' => [
                            [
                              'name' => 'React 19 & Next.js Server Components',
                              'level' => 'Expert'
                            ],
                            [
                              'name' => 'Vue 3 & Nuxt Engine',
                              'level' => 'Advanced'
                            ],
                            [
                              'name' => 'Svelte 5 & Runes Reactive Model',
                              'level' => 'Advanced'
                            ]
                          ]
                        ],
                        [
                          'category' => 'Styling & Design Architecture',
                          'items' => [
                            [
                              'name' => 'CSS Modern Features (Container Queries, Subgrid)',
                              'level' => 'Expert'
                            ],
                            [
                              'name' => 'Design Tokens & W3C Token Format',
                              'level' => 'Expert'
                            ],
                            [
                              'name' => 'Framer Motion & Web Animations API',
                              'level' => 'Expert'
                            ]
                          ]
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'fe_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Connect for UI Architecture Engagements',
                      'subtitle' => 'Available for design system audits, enterprise accessibility consulting, and frontend leadership.',
                      'email' => 'sophia.moreau@craftfolio-ui.design',
                      'location' => 'Paris / London / Remote',
                      'availability' => 'Selective advisory & frontend architecture contracts'
                    ]
                  ],
                  [
                    'id' => 'fe_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Sophia Moreau. Crafted with Craftfolio.',
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
                  'secondaryColor' => '#8b5cf6',
                  'cardBg' => '#131b2e',
                  'cardBorder' => '#24324f',
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
                    'id' => 'fe_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'سارة العتيبي · معمارية الواجهات',
                      'ctaText' => 'مكتبة الرموز التصميمية',
                      'ctaLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'fe_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'توافق 100% مع معايير إمكانية الوصول WCAG AAA',
                      'title' => 'بناء نظم تصميم متكاملة وواجهات ويب سلسة ومتوافقة مع مختلف الشاشات والأجهزة',
                      'subtitle' => 'كبير مهندسي الواجهات الأمامية وقائدة نظم التصميم الرقمية',
                      'description' => 'ريادة في هندسة المكونات البرمجية المجردة (Headless)، وحزم المكونات المصغرة، واختبارات إمكانية الوصول التلقائية. تحويل مسارات وتجارب المستخدم المعقدة إلى واجهات فائقة السلاسة بمعدل 60 إطاراً في الثانية.',
                      'primaryButtonText' => 'استعراض مكتبات المكونات',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'فحص فلسفة التصميم',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'fe_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'نظم التصميم ومكتبات الواجهات المفتوحة',
                      'subtitle' => 'رموز تصميمية ومكونات برمجية تخدم ملايين الجلسات الشهرية وتوفر أداءً قياسياً',
                      'items' => [
                        [
                          'title' => 'محرك Prism للرموز التصميمية',
                          'description' => 'محول رموز تصميمية متعدد العلامات التجارية يربط متغيرات Figma مباشرة بخصائص CSS المخصصة وإضافات Tailwind.',
                          'tags' => [
                            'TypeScript',
                            'Design Tokens',
                            'Figma API',
                            'TailwindCSS'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'حزمة AriaAccessible لإمكانية الوصول',
                          'description' => 'مجموعة متكاملة من مكونات الواجهات المجردة سهلة التنقل عبر لوحة المفاتيح والمتوافقة تماماً مع إرشادات WCAG 2.2 AAA.',
                          'tags' => [
                            'React',
                            'Accessibility',
                            'WAI-ARIA',
                            'Testing Library'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'مكتبة FluidCanvas للرسوم البيانية',
                          'description' => 'مكتبة رسوم بيانية تفاعلية تعتمد على WebGL وCanvas 2D لتقديم أداء 60 إطاراً في الثانية مع مجموعات بيانات تتجاوز 100 ألف نقطة.',
                          'tags' => [
                            'WebGL',
                            'Canvas API',
                            'TypeScript',
                            'D3.js'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'fe_skills',
                    'type' => 'skills',
                    'props' => [
                      'title' => 'الخبرات والمهارات التخصصية في الواجهات',
                      'subtitle' => 'تخصص عميق في محركات معالجة المتصفحات ومعمارية الأنماط وأدوات البناء الحديثة',
                      'categories' => [
                        [
                          'category' => 'أطر العمل الأساسية',
                          'items' => [
                            [
                              'name' => 'React 19 ومكونات Next.js الخادومية',
                              'level' => 'خبير'
                            ],
                            [
                              'name' => 'Vue 3 ومحرك Nuxt المتكامل',
                              'level' => 'متقدم'
                            ],
                            [
                              'name' => 'Svelte 5 والنموذج التفاعلي Runes',
                              'level' => 'متقدم'
                            ]
                          ]
                        ],
                        [
                          'category' => 'الأنماط ومعمارية نظم التصميم',
                          'items' => [
                            [
                              'name' => 'ميزات CSS الحديثة (Container Queries, Subgrid)',
                              'level' => 'خبير'
                            ],
                            [
                              'name' => 'رموز التصميم وفق مواصفات W3C',
                              'level' => 'خبير'
                            ],
                            [
                              'name' => 'الحركة عبر Framer Motion وWeb Animations API',
                              'level' => 'خبير'
                            ]
                          ]
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'fe_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل للاستشارات وبناء نظم التصميم',
                      'subtitle' => 'متاحة لتدقيق نظم التصميم، واستشارات إمكانية الوصول للمؤسسات، وقيادة فرق الواجهات الأمامية.',
                      'email' => 'sarah.otaibi@craftfolio-ui.design',
                      'location' => 'الرياض / عمل عن بعد عالمياً',
                      'availability' => 'متاحة للاستشارات الهندسية وبناء النظم التصميمية'
                    ]
                  ],
                  [
                    'id' => 'fe_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 سارة العتيبي. صُممت بواسطة Craftfolio.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'ai-ml-engineer',
            'name' => 'AI Research & Deep Learning Engineer',
            'name_ar' => 'مهندس الذكاء الاصطناعي وتعلم الآلة',
            'category' => 'Developer',
            'description' => 'AI and machine learning portfolio showcasing fine-tuned LLM architectures, CUDA kernel optimizations, and published neural benchmarks.',
            'description_ar' => 'معرض أعمال مهندس وباحث الذكاء الاصطناعي مع نماذج لغوية مدربة، وتحسينات برمجية على معالجات CUDA، وأوراق بحثية منشورة.',
            'is_featured' => 1,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#090d16',
                  'textColor' => '#f1f5f9',
                  'primaryColor' => '#06b6d4',
                  'secondaryColor' => '#0891b2',
                  'cardBg' => '#0f172a',
                  'cardBorder' => '#1e293b',
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
                    'id' => 'ai_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Dr. Aris Thorne · AI / ML',
                      'ctaText' => 'HuggingFace Weights',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'ai_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'PyTorch · FlashAttention-2 · CUDA',
                      'title' => 'Training Efficient Neural Networks & Scaling Large Language Model Inference',
                      'subtitle' => 'Principal AI Systems Researcher & LLM Optimization Engineer',
                      'description' => 'Specializing in LoRA/QLoRA parameter-efficient fine-tuning, KV-cache quantization, and custom Triton kernels. Bridging cutting-edge deep learning theory with sub-10ms production inference systems.',
                      'primaryButtonText' => 'Inspect Model Weights',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Research Citations',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'ai_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'AI Production Benchmarks',
                      'subtitle' => 'Validated inference speedups and model deployment metrics',
                      'items' => [
                        [
                          'value' => '4.2x',
                          'label' => 'Inference Speedup via Triton',
                          'icon' => 'fa-solid fa-bolt'
                        ],
                        [
                          'value' => '1.4M+',
                          'label' => 'HuggingFace Model Downloads',
                          'icon' => 'fa-solid fa-cloud-arrow-down'
                        ],
                        [
                          'value' => '70B',
                          'label' => 'Largest LLM Quantized & Deployed',
                          'icon' => 'fa-solid fa-brain'
                        ],
                        [
                          'value' => '98.4%',
                          'label' => 'Evaluation Accuracy Benchmark',
                          'icon' => 'fa-solid fa-bullseye'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ai_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Open Source Weights & Quantized Engines',
                      'subtitle' => 'Replicable deep learning models with reproducible benchmark scripts',
                      'items' => [
                        [
                          'title' => 'OmniQuant-70B Engine',
                          'description' => '4-bit AWQ quantized Llama-3 variant optimized for high-concurrency consumer GPU serving with FlashAttention-2 integration.',
                          'tags' => [
                            'PyTorch',
                            'vLLM',
                            'AWQ',
                            'CUDA',
                            'Python'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'Triton-SparseKernel',
                          'description' => 'Custom OpenAI Triton kernel executing block-sparse matrix multiplication with 38% latency reduction over cuBLAS.',
                          'tags' => [
                            'Triton',
                            'GPU Optimization',
                            'Deep Learning'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'AgenticRag Orchestrator',
                          'description' => 'Self-correcting retrieval augmented generation system utilizing hybrid dense/sparse embeddings and rerankers.',
                          'tags' => [
                            'LangChain',
                            'Qdrant',
                            'FastAPI',
                            'Docker'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ai_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Initiate AI Research Collaboration',
                      'subtitle' => 'Available for model optimization contracts, specialized LLM fine-tuning, and research advisory.',
                      'email' => 'aris.thorne@craftfolio-ai.org',
                      'location' => 'San Francisco / Remote',
                      'availability' => 'Open for selective AI research & consulting contracts'
                    ]
                  ],
                  [
                    'id' => 'ai_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Dr. Aris Thorne · AI Systems Engineering.',
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
                  'textColor' => '#f1f5f9',
                  'primaryColor' => '#06b6d4',
                  'secondaryColor' => '#0891b2',
                  'cardBg' => '#0f172a',
                  'cardBorder' => '#1e293b',
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
                    'id' => 'ai_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'د. حسام النجار · ذكاء اصطناعي',
                      'ctaText' => 'نماذج HuggingFace',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'ai_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'PyTorch · FlashAttention-2 · CUDA',
                      'title' => 'تدريب الشبكات العصبية الكفؤة وتسريع استدلال النماذج اللغوية الضخمة',
                      'subtitle' => 'باحث رئيسي في نظم الذكاء الاصطناعي وهندسة تسريع النماذج اللغوية',
                      'description' => 'تخصص في التدريب الدقيق الفعال عبر تقنيات LoRA وQLoRA، وتكميم الذاكرة المؤقتة (KV-cache)، وتطوير أنوية Triton المخصصة. ربط الأبحاث المتقدمة في التعلم العميق مع نظم الاستدلال السريعة التي تستجيب في أقل من 10 مللي ثانية.',
                      'primaryButtonText' => 'فحص النماذج والأوزان',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'الاستشهادات البحثية',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'ai_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'إحصائيات ونماذج الأداء في الإنتاج',
                      'subtitle' => 'معايير تسريع الاستدلال ونشر النماذج في بيئات الحوسبة عالية الكثافة',
                      'items' => [
                        [
                          'value' => '4.2x',
                          'label' => 'تسريع الاستدلال عبر أنوية Triton',
                          'icon' => 'fa-solid fa-bolt'
                        ],
                        [
                          'value' => '+1.4M',
                          'label' => 'تحميل للنماذج عبر HuggingFace',
                          'icon' => 'fa-solid fa-cloud-arrow-down'
                        ],
                        [
                          'value' => '70B',
                          'label' => 'أكبر نموذج تم تكميمه ونشره بنجاح',
                          'icon' => 'fa-solid fa-brain'
                        ],
                        [
                          'value' => '98.4%',
                          'label' => 'دقة المعايير التقييمية للنماذج',
                          'icon' => 'fa-solid fa-bullseye'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ai_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'النماذج مفتوحة المصدر والأنوية المحسنة',
                      'subtitle' => 'نماذج تعلم عميق قابلة للتكرار وموثقة بأكواد وسكربتات القياس القياسية',
                      'items' => [
                        [
                          'title' => 'محرك OmniQuant-70B',
                          'description' => 'نسخة مكممة بدقة 4 بت بتقنية AWQ لنموذج Llama-3 مجهزة لخدمة آلاف المستخدمين المتزامنين مع دعم FlashAttention-2.',
                          'tags' => [
                            'PyTorch',
                            'vLLM',
                            'AWQ',
                            'CUDA',
                            'Python'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'نواة Triton-SparseKernel',
                          'description' => 'نواة مخصصة مكتوبة بـ Triton لضرب المصفوفات المتناثرة مع خفض زمن الاستجابة بنسبة 38% مقارنة بمكتبة cuBLAS.',
                          'tags' => [
                            'Triton',
                            'GPU Optimization',
                            'Deep Learning'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'منظومة AgenticRag للتوليد المعزز',
                          'description' => 'نظام RAG ذاتي التصحيح يدمج التضمينات الكثيفة والمتناثرة مع إعادة ترتيب ذكية واسترجاع دقيق من قواعد البيانات المتجهة.',
                          'tags' => [
                            'LangChain',
                            'Qdrant',
                            'FastAPI',
                            'Docker'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'ai_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'بدء التعاون في أبحاث الذكاء الاصطناعي',
                      'subtitle' => 'متاح لعقود تحسين نماذج الذكاء الاصطناعي، والتدريب الدقيق المخصص، والاستشارات البحثية.',
                      'email' => 'hossam.najjar@craftfolio-ai.org',
                      'location' => 'الرياض / عمل عن بعد عالمياً',
                      'availability' => 'متاح للأبحاث والاستشارات المتخصصة في الذكاء الاصطناعي'
                    ]
                  ],
                  [
                    'id' => 'ai_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 د. حسام النجار · أبحاث ونظم الذكاء الاصطناعي.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'devops-cloud',
            'name' => 'Cloud Native & DevOps Reliability Engineer',
            'name_ar' => 'مهندس الحوسبة السحابية وهندسة الاعتمادية',
            'category' => 'Developer',
            'description' => 'DevOps & SRE portfolio focusing on Kubernetes orchestration, Terraform GitOps workflows, zero-downtime blue/green deployments, and 99.999% SLA.',
            'description_ar' => 'معرض أعمال مهندس السحابة والاعتمادية مع التركيز على إدارة Kubernetes وعمليات GitOps وحفظ التوفر التشغيلي بنسبة 99.999%.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0a0f1d',
                  'textColor' => '#f1f5f9',
                  'primaryColor' => '#2563eb',
                  'secondaryColor' => '#38bdf8',
                  'cardBg' => '#11192e',
                  'cardBorder' => '#1e2d4d',
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
                    'id' => 'do_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Jordan Reed · Cloud SRE',
                      'ctaText' => 'Infra Blueprints',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'do_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'CKA Certified · Terraform HashiCorp Certified',
                      'title' => 'Automating Resilient Multi-Region Cloud Infrastructure & Zero-Downtime CI/CD',
                      'subtitle' => 'Senior Site Reliability & Cloud Infrastructure Architect',
                      'description' => 'Architecting production Kubernetes clusters on AWS and GCP with GitOps (ArgoCD), automated horizontal pod autoscaling, and comprehensive telemetry via Prometheus, Loki, and Grafana.',
                      'primaryButtonText' => 'View Infrastructure Blueprints',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Reliability SLA Metrics',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'do_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'Production SRE Reliability Metrics',
                      'subtitle' => 'Verified operational metrics across enterprise production clusters',
                      'items' => [
                        [
                          'value' => '99.999%',
                          'label' => 'Multi-Region SLA Achieved',
                          'icon' => 'fa-solid fa-cloud'
                        ],
                        [
                          'value' => '<12m',
                          'label' => 'Mean Time to Recovery (MTTR)',
                          'icon' => 'fa-solid fa-clock-rotate-left'
                        ],
                        [
                          'value' => '100%',
                          'label' => 'Infrastructure As Code (IaC)',
                          'icon' => 'fa-solid fa-code-commit'
                        ],
                        [
                          'value' => '-42%',
                          'label' => 'Cloud Spend Cost Optimization',
                          'icon' => 'fa-solid fa-chart-line'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'do_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'Infrastructure As Code & GitOps Repos',
                      'subtitle' => 'Production Terraform modules and Helm architectures ready for multi-region deployment',
                      'items' => [
                        [
                          'title' => 'Terraform-EKS-Enterprise',
                          'description' => 'Production-grade AWS EKS Terraform module complete with VPC CNI, Karpenter autoscaling, Cilium eBPF networking, and cert-manager.',
                          'tags' => [
                            'Terraform',
                            'AWS EKS',
                            'Karpenter',
                            'Cilium'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'GitOps-ArgoCD-Platform',
                          'description' => 'Multi-environment declarative GitOps control plane with automated PR previews, progressive canary rollouts, and Slack notifications.',
                          'tags' => [
                            'ArgoCD',
                            'Kubernetes',
                            'Helm',
                            'Canary'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'ZeroTrust-Mesh-Wireguard',
                          'description' => 'Mesh VPN overlay linking hybrid on-premise compute nodes to cloud clusters with mutual TLS and automated key rotation.',
                          'tags' => [
                            'WireGuard',
                            'mTLS',
                            'Linux Kernel',
                            'Docker'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'do_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Connect for Cloud Architecture & SRE',
                      'subtitle' => 'Available for Kubernetes migrations, cloud cost optimization audits, and reliability engineering.',
                      'email' => 'jordan.reed@craftfolio-cloud.net',
                      'location' => 'Denver / Remote',
                      'availability' => 'Contracting for selective Q3/Q4 SRE initiatives'
                    ]
                  ],
                  [
                    'id' => 'do_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Jordan Reed · SRE Architect.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0a0f1d',
                  'textColor' => '#f1f5f9',
                  'primaryColor' => '#2563eb',
                  'secondaryColor' => '#38bdf8',
                  'cardBg' => '#11192e',
                  'cardBorder' => '#1e2d4d',
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
                    'id' => 'do_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'فيصل الحربي · مهندس السحابة والاعتمادية',
                      'ctaText' => 'مخططات البنية التحتية',
                      'ctaLink' => '#projects'
                    ]
                  ],
                  [
                    'id' => 'do_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'split',
                      'badge' => 'شهادة CKA المعتمدة في Kubernetes · خبير معتمد في Terraform',
                      'title' => 'أتمتة البنية التحتية السحابية متعددة المناطق وعمليات النشر بدون توقف',
                      'subtitle' => 'كبير مهندسي اعتمادية الأنظمة وهندسة السحابة المعمارية',
                      'description' => 'بناء وإدارة عناقيد Kubernetes على منصات AWS وGCP باستخدام منهجية GitOps عبر ArgoCD، وتوسيع الموارد التلقائي، ومراقبة شاملة عبر Prometheus وGrafana مع ضمان أعلى درجات التوفر التشغيلي.',
                      'primaryButtonText' => 'استعراض مخططات السحابة',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'إحصائيات التوفر التشغيلي',
                      'secondaryButtonLink' => '#stats'
                    ]
                  ],
                  [
                    'id' => 'do_stats',
                    'type' => 'stats',
                    'props' => [
                      'title' => 'مؤشرات الأداء والاعتمادية في بيئة الإنتاج',
                      'subtitle' => 'أرقام موثقة لإدارة البنية التحتية وتجاوز الأعطال السحابية',
                      'items' => [
                        [
                          'value' => '99.999%',
                          'label' => 'معدل التوفر التشغيلي المحقق',
                          'icon' => 'fa-solid fa-cloud'
                        ],
                        [
                          'value' => '<12 دقيقة',
                          'label' => 'متوسط زمن التعافي من الأعطال (MTTR)',
                          'icon' => 'fa-solid fa-clock-rotate-left'
                        ],
                        [
                          'value' => '100%',
                          'label' => 'بنية تحتية مشفرة كبرمجيات (IaC)',
                          'icon' => 'fa-solid fa-code-commit'
                        ],
                        [
                          'value' => '-42%',
                          'label' => 'خفض التكاليف السحابية المهدرة',
                          'icon' => 'fa-solid fa-chart-line'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'do_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'grid',
                      'title' => 'مستودعات البنية التحتية ككود ومنهجية GitOps',
                      'subtitle' => 'وحدات برمجية مبنية بـ Terraform وHelm جاهزة للنشر والتوسع في بيئات متعددة المناطق',
                      'items' => [
                        [
                          'title' => 'حزمة Terraform-EKS-Enterprise',
                          'description' => 'وحدة متكاملة لإنشاء وإدارة EKS على AWS مع دعم شبكات Cilium الموسعة، ومتحكم التوسيع التلقائي Karpenter.',
                          'tags' => [
                            'Terraform',
                            'AWS EKS',
                            'Karpenter',
                            'Cilium'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'منصة GitOps-ArgoCD-Platform',
                          'description' => 'لوحة تحكم تصريحية لإدارة ونشر الحاويات تلقائياً عبر بيئات متعددة مع دعم النشر التدريجي والإشعارات الفورية.',
                          'tags' => [
                            'ArgoCD',
                            'Kubernetes',
                            'Helm',
                            'Canary'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'شبكة ZeroTrust-Mesh-Wireguard',
                          'description' => 'شبكة VPN داخلية آمنة تربط الخوادم المحلية بالسحابة المشتركة مع تشفير متبادل mTLS وتدوير تلقائي للمفاتيح.',
                          'tags' => [
                            'WireGuard',
                            'mTLS',
                            'Linux Kernel',
                            'Docker'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'do_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل لاستشارات الحوسبة السحابية والاعتمادية',
                      'subtitle' => 'متاح لمشاريع الترحيل إلى Kubernetes، وتدقيق التكاليف السحابية، وهندسة الاعتمادية الشاملة.',
                      'email' => 'faisal.harbi@craftfolio-cloud.net',
                      'location' => 'الرياض / عمل عن بعد عالمياً',
                      'availability' => 'متاح للتعاقدات النوعية في هندسة السحابة والاعتمادية'
                    ]
                  ],
                  [
                    'id' => 'do_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 فيصل الحربي · مهندس الحوسبة السحابية.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ]
            ]
          ],
          [
            'slug' => 'cybersecurity-secops',
            'name' => 'Cybersecurity & Offensive Security Specialist',
            'name_ar' => 'خبير الأمن السيبراني واختبار الاختراق',
            'category' => 'Developer',
            'description' => 'Tactical dark cybersecurity portfolio featuring verified CVE disclosures, offensive red team tradecraft, and zero-trust security architecture audits.',
            'description_ar' => 'معرض أعمال خبير الأمن السيبراني واختبار الاختراق مع كشف الثغرات الأمنية (CVE) وتقارير الفريق الأحمر والمعمارية الصفرية للثقة.',
            'is_featured' => 0,
            'locales' => [
              'en' => [
                'locale' => 'en',
                'direction' => 'ltr',
                'theme' => [
                  'backgroundColor' => '#0d1117',
                  'textColor' => '#f0f6fc',
                  'primaryColor' => '#22c55e',
                  'secondaryColor' => '#16a34a',
                  'cardBg' => '#161b22',
                  'cardBorder' => '#30363d',
                  'headingFont' => 'Fira Code',
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
                    'id' => 'sec_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'Ryan Sterling // RED TEAM',
                      'ctaText' => 'GPG / PGP Key',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'sec_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'terminal',
                      'windowTitle' => 'root@secops-recon-node:~',
                      'command' => 'nmap -sV -sC -T4 --script=vuln targets.corp.net',
                      'statusText' => 'THREAT INTEL ACTIVE · ZERO TRUST',
                      'title' => 'Ryan Sterling',
                      'subtitle' => 'Principal Offensive Security Operator & Vulnerability Researcher',
                      'description' => 'Specializing in Active Directory post-exploitation, cloud attack paths (AWS/Azure), kernel exploitation, and automated source code security audits. Documented 14 CVE disclosures and performed audits for Fortune 100 infrastructures.',
                      'primaryButtonText' => 'Inspect CVE Disclosures',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'Security Methodology',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'sec_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'terminal',
                      'title' => 'Published CVE Research & Security Tools',
                      'subtitle' => 'Responsible disclosures, exploit mitigation advisories, and open-source defensive tools',
                      'items' => [
                        [
                          'title' => 'CVE-2024-3891: SAML Bypass',
                          'description' => 'Discovered critical authentication bypass in enterprise identity provider library caused by XML canonicalization parsing errors.',
                          'stars' => '9.8 CVSS',
                          'branch' => 'PATCHED',
                          'tags' => [
                            'CVE',
                            'Authentication',
                            'XMLDSig',
                            'Zero-Day'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'CloudPathfinder-Audit',
                          'description' => 'Automated graph-based AWS IAM privilege escalation discovery engine detecting non-obvious identity takeover vectors.',
                          'stars' => '2.6k',
                          'branch' => 'v2.1',
                          'tags' => [
                            'Python',
                            'AWS IAM',
                            'Graph Theory',
                            'Cloud Sec'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'KernelMemory-Sanitizer',
                          'description' => 'Linux eBPF security probe monitoring suspicious ptrace injections and memory patching in production container runtimes.',
                          'stars' => '1.7k',
                          'branch' => 'main',
                          'tags' => [
                            'C',
                            'eBPF',
                            'Linux Kernel',
                            'Detection'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sec_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'Secure Inquiries & Advisory',
                      'subtitle' => 'Available for red team penetration testing, cloud architecture security reviews, and executive threat modeling.',
                      'email' => 'ryan.sterling@secops-research.io',
                      'location' => 'Washington D.C. / Remote',
                      'availability' => 'Selective enterprise penetration tests & security audits'
                    ]
                  ],
                  [
                    'id' => 'sec_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 Ryan Sterling · Offensive Security Specialist.',
                      'showSocials' => true
                    ]
                  ]
                ]
              ],
              'ar' => [
                'locale' => 'ar',
                'direction' => 'rtl',
                'theme' => [
                  'backgroundColor' => '#0d1117',
                  'textColor' => '#f0f6fc',
                  'primaryColor' => '#22c55e',
                  'secondaryColor' => '#16a34a',
                  'cardBg' => '#161b22',
                  'cardBorder' => '#30363d',
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
                    'id' => 'sec_nav',
                    'type' => 'navbar',
                    'props' => [
                      'brandText' => 'نايف الدوسري // أمن سيبراني',
                      'ctaText' => 'المفتاح الأمني المشفر',
                      'ctaLink' => '#contact'
                    ]
                  ],
                  [
                    'id' => 'sec_hero',
                    'type' => 'hero',
                    'props' => [
                      'variant' => 'terminal',
                      'windowTitle' => 'root@secops-recon-node:~',
                      'command' => 'nmap -sV -sC -T4 --script=vuln targets.corp.net',
                      'statusText' => 'رصد التهديدات نشط · صفرية الثقة',
                      'title' => 'نايف الدوسري',
                      'subtitle' => 'كبير ممارسي الأمن الهجومي والبحث الأمني في الثغرات',
                      'description' => 'تخصص في اختبارات اختراق بيئات الدليل النشط (Active Directory)، ومسارات الهجوم السحابية (AWS/Azure)، واستغلال ثغرات النواة، والتدقيق الأمني المتقدم للكود البرمجي. توثيق 14 ثغرة أمنية معتمدة (CVE) وتدقيق أمني لمؤسسات مالية وحكومية كبرى.',
                      'primaryButtonText' => 'استعراض الثغرات المسجلة (CVE)',
                      'primaryButtonLink' => '#projects',
                      'secondaryButtonText' => 'منهجية الفحص الأمني',
                      'secondaryButtonLink' => '#skills'
                    ]
                  ],
                  [
                    'id' => 'sec_proj',
                    'type' => 'projects',
                    'props' => [
                      'variant' => 'terminal',
                      'title' => 'أبحاث الثغرات الأمنية والأدوات مفتوحة المصدر',
                      'subtitle' => 'إفصاحات أمنية مسؤولة، وتقارير علاج الثغرات، وأدوات دفاعية لحماية المنصات',
                      'items' => [
                        [
                          'title' => 'ثغرة CVE-2024-3891 في SAML',
                          'description' => 'اكتشاف ثغرة تجاوز مصادقة حرجة في مكتبة مزود هوية للمؤسسات ناجمة عن أخطاء في معالجة توافق توقيعات XML.',
                          'stars' => '9.8 خطورة',
                          'branch' => 'تمت المعالجة',
                          'tags' => [
                            'CVE',
                            'Authentication',
                            'XMLDSig',
                            'Zero-Day'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'أداة CloudPathfinder-Audit',
                          'description' => 'أداة فحص آلية تعتمد على الرسوم البيانية لكشف مسارات تصعيد الصلاحيات غير الظاهرة في حسابات AWS IAM.',
                          'tags' => [
                            'Python',
                            'AWS IAM',
                            'Graph Theory',
                            'Cloud Sec'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ],
                        [
                          'title' => 'أداة KernelMemory-Sanitizer',
                          'description' => 'مسبار أمني مبني بتقنية eBPF لمراقبة حقن العمليات المشبوهة والتلاعب بالذاكرة في حاويات الإنتاج الحية.',
                          'tags' => [
                            'C',
                            'eBPF',
                            'Linux Kernel',
                            'Detection'
                          ],
                          'liveUrl' => '#',
                          'githubUrl' => '#'
                        ]
                      ]
                    ]
                  ],
                  [
                    'id' => 'sec_contact',
                    'type' => 'contact',
                    'props' => [
                      'title' => 'التواصل الآمن للاستشارات الأمنية',
                      'subtitle' => 'متاح لاختبارات الاختراق المتقدمة (Red Teaming)، ومراجعة أمان البنية السحابية، ونمذجة التهديدات للمؤسسات.',
                      'email' => 'naif.dawsari@secops-research.io',
                      'location' => 'الرياض / عمل عن بعد عالمياً',
                      'availability' => 'متاح للاختبارات الأمنية والتدقيق السيبراني المتخصص'
                    ]
                  ],
                  [
                    'id' => 'sec_foot',
                    'type' => 'footer',
                    'props' => [
                      'copyrightText' => '© 2026 نايف الدوسري · خبير الأمن السيبراني.',
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
