<?php
/**
 * AI Portfolio Builder - Language & Translation System
 */

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// تغيير اللغة إذا تم الضغط على الزر
if (isset($_GET['lang']) && in_array($_GET['lang'], ['ar', 'en'])) {
    $_SESSION['lang'] = $_GET['lang'];
    $_SESSION['cf_lang'] = $_GET['lang'];
    @setcookie('cf_lang', $_GET['lang'], time() + (86400 * 365), '/');
    @setcookie('lang', $_GET['lang'], time() + (86400 * 365), '/');
    // إعادة توجيه لنفس الصفحة بدون بارامتر lang
    $url = preg_replace('/([?&])lang=[^&]+(&|$)/', '$1', $_SERVER['REQUEST_URI']);
    $url = rtrim($url, '?&');
    header("Location: $url");
    exit;
}

// تحديد اللغة تلقائيا اذا لم تكن موجودة في الجلسة بناء على لغة المتصفح
if (!isset($_SESSION['lang'])) {
    if (isset($_SESSION['cf_lang'])) {
        $_SESSION['lang'] = $_SESSION['cf_lang'];
    } elseif (isset($_COOKIE['cf_lang']) && in_array($_COOKIE['cf_lang'], ['ar', 'en'])) {
        $_SESSION['lang'] = $_COOKIE['cf_lang'];
    } elseif (isset($_COOKIE['lang']) && in_array($_COOKIE['lang'], ['ar', 'en'])) {
        $_SESSION['lang'] = $_COOKIE['lang'];
    } else {
        $browserLang = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : 'en';
        $_SESSION['lang'] = ($browserLang === 'ar') ? 'ar' : 'en';
    }
}
$_SESSION['cf_lang'] = $_SESSION['lang'];

// تحديد اللغة الحالية
$currentLang = $_SESSION['lang'];

// قاموس الترجمة
$translations = [
    'ar' => [
        // Navbar & General
        'home' => 'الرئيسية',
        'explore' => 'استعراض المواقع',
        'create_portfolio' => 'إنشاء Portfolio',
        'dashboard' => 'لوحة التحكم',
        'welcome' => 'مرحبًا',
        'logout' => 'خروج',
        'login' => 'دخول',
        'register' => 'تسجيل',
        'copyright' => 'جميع الحقوق محفوظة ❤️ منصة كود التطور التعليمية',
        'made_with' => 'صُنع بـ ❤️ باستخدام منصة كود التطور التعليمية',
        
        // Home
        'hero_badge' => 'ابنِ portfolio احترافي في دقائق',
        'hero_title_1' => 'أنشئ موقعك الشخصي',
        'hero_title_2' => 'بدون كود',
        'hero_desc' => 'أدخل بياناتك، اختر تصميمك المفضل من بين 3 قوالب احترافية، وشاهد موقعك يتشكل أمامك لحظيًا. جاهز للنشر في دقائق!',
        'start_now_free' => 'ابدأ الآن - مجانًا',
        'how_it_works_btn' => 'كيف يعمل؟',

        // Dashboard
        'hello' => 'مرحبًا',
        'manage_portfolios' => 'إدارة portfolios الخاصة بك',
        'create_new_portfolio' => 'إنشاء Portfolio جديد',
        'no_portfolios' => 'لا توجد portfolios بعد',
        'start_create_first' => 'ابدأ بإنشاء أول portfolio لك الآن!',
        'stats' => 'الإحصائيات',
        
        // Create Wizard
        'step_info' => 'المعلومات',
        'step_skills' => 'المهارات',
        'step_projects' => 'المشاريع',
        'step_settings' => 'الإعدادات والقالب',
        
        'personal_info' => 'المعلومات الشخصية',
        'tell_us_about' => 'أخبرنا عن نفسك ومجالك',
        'full_name' => 'الاسم الكامل *',
        'job_title' => 'المسمى الوظيفي',
        'bio' => 'نبذة عنك',
        'generate_ai_bio' => 'توليد النبذة بالذكاء الاصطناعي 🪄',
        'email_contact' => 'البريد الإلكتروني للتواصل',
        'profile_image' => 'الصورة الشخصية',
        'next' => 'التالي',
        'prev' => 'السابق',
        
        'skills' => 'المهارات',
        'add_skill' => 'إضافة مهارة',
        'skill_name' => 'اسم المهارة',
        'skill_level' => 'المستوى',
        
        'projects' => 'المشاريع',
        'add_project' => 'إضافة مشروع',
        'import_github' => 'استيراد من GitHub',
        'project_name' => 'اسم المشروع *',
        'project_desc' => 'وصف المشروع',
        'project_link' => 'رابط المشروع',
        
        'links_and_template' => 'الإعدادات والقالب والتصميم',
        'choose_template' => 'اختر القالب',
        'custom_username' => 'اسم المستخدم المخصص (رابط موقعك) *',
        'custom_domain' => 'اسم نطاق مخصص (دومين) - اختياري',
        'portfolio_language' => 'لغة العرض للزوار',
        'save_and_publish' => 'حفظ ونشر Portfolio',
        
        'live_preview' => 'معاينة حية',

        // Index Page
        'index_page_title' => 'AI Portfolio Builder - أنشئ موقعك الشخصي في دقائق',
        'index_page_desc' => 'أنشئ موقع Portfolio شخصي احترافي بدون كتابة كود. اختر تصميمك، أدخل بياناتك، وأطلق موقعك للعالم.',
        'why_portfolio_builder' => 'لماذا Portfolio Builder؟',
        'all_you_need_for_digital_presence' => 'كل ما تحتاجه لإنشاء تواجد رقمي احترافي في مكان واحد',
        '3_pro_templates' => '3 قوالب احترافية',
        '3_pro_templates_desc' => 'اختر من بين Modern، Creative، أو Professional. كل قالب مصمم بعناية ليناسب مجالك',
        'live_preview_desc' => 'شاهد التغييرات تتحدث في الوقت الحقيقي أثناء ملء بياناتك بدون إعادة تحميل',
        'responsive_100' => 'متجاوب 100%',
        'responsive_desc' => 'موقعك يبدو مثاليًا على جميع الأجهزة: ديسكتوب، تابلت، وموبايل',
        'export_download' => 'تصدير وتحميل',
        'export_desc' => 'حمّل موقعك كملف ZIP وارفعه على أي استضافة أو شاركه مباشرة',
        'personal_account' => 'حساب شخصي',
        'personal_account_desc' => 'سجل حسابًا واحفظ portfolios متعددة وعدّلها في أي وقت',
        'public_link' => 'رابط عام',
        'public_link_desc' => 'احصل على رابط مباشر لموقعك يمكنك مشاركته مع أي شخص',
        'how_it_works' => 'كيف يعمل؟',
        'how_it_works_subtitle' => '4 خطوات بسيطة فقط لإنشاء موقعك الشخصي',
        'step_1_title' => 'أدخل بياناتك',
        'step_1_desc' => 'اسمك، وصفك المهني، ونبذة عنك',
        'step_2_title' => 'أضف مهاراتك',
        'step_2_desc' => 'حدد مهاراتك التقنية ومستوى كل مهارة',
        'step_3_title' => 'أضف مشاريعك',
        'step_3_desc' => 'اعرض أفضل أعمالك مع الوصف والروابط',
        'step_4_title' => 'اختر قالبك',
        'step_4_desc' => 'اختر التصميم المناسب وانشر موقعك',
        'available_templates' => 'القوالب المتوفرة',
        'templates_subtitle' => 'تصاميم فريدة تناسب مختلف المجالات والأذواق',
        'modern_minimal_desc' => 'تصميم نظيف وعصري بألوان هادئة ومساحات بيضاء واسعة',
        'creative_dev_desc' => 'خلفية داكنة مع ألوان نيون وتأثيرات glassmorphism مذهلة',
        'pro_corp_desc' => 'تصميم فاخر بألوان Navy وGold يشبه الـ CV الاحترافي',
        'badge_elegant' => 'أنيق',
        'badge_simple' => 'بسيط',
        'badge_devs' => 'مطورين',
        'badge_dynamic' => 'ديناميكي',
        'badge_pros' => 'محترفين',
        'badge_luxurious' => 'فخم',
        'ready_to_build' => 'جاهز لبناء موقعك؟',
        'ready_subtitle' => 'ابدأ الآن مجانًا وأنشئ Portfolio احترافي في أقل من 5 دقائق',
        'start_now' => 'ابدأ الآن',
        
        // Explore Page
        'explore_page_title' => 'استعراض المواقع - AI Portfolio Builder',
        'explore_heading' => 'استعراض المواقع',
        'explore_subtitle' => 'تصفّح مواقع Portfolio التي أنشأها المستخدمون',
        'published_site' => 'موقع منشور',
        'no_published_sites' => 'لا توجد مواقع منشورة بعد',
        'be_the_first' => 'كن أول من ينشئ Portfolio!',
        'view_site' => 'عرض الموقع',
        'want_to_create' => 'هل تريد إنشاء Portfolio خاص بك؟',
        'create_yours_now' => 'أنشئ موقعك الآن',
        'skill_count' => 'مهارة',
        'project_count' => 'مشروع',

        // Create Page
        'create_page_title' => 'إنشاء Portfolio - AI Portfolio Builder',
        'create_heading' => 'أنشئ Portfolio الخاص بك',
        'create_subtitle' => 'املأ بياناتك وشاهد النتيجة لحظيًا',
        'choose_template_lbl' => 'اختر القالب',
        'add_tech_skills' => 'أضف مهاراتك التقنية ومستوى كل مهارة',
        'add_best_projects' => 'أضف أفضل مشاريعك لعرضها في Portfolio',
        'setup_link' => 'قم بإعداد الرابط الخاص بك واختيار القالب واللغة',
        'profile_image_opt' => 'الصورة الشخصية (اختياري)',
        'example_name' => 'مثال: أحمد محمد',
        'example_job' => 'مثال: Full-Stack Developer',
        'bio_placeholder' => 'اكتب نبذة مختصرة عن خبراتك ومجالك...',
        'your_site_link_will_be' => 'رابط موقعك سيكون:',
        'clean_modern' => 'نظيف وعصري',
        'dark_dynamic' => 'داكن وديناميكي',
        'luxurious_pro' => 'فخم واحترافي',
        'bw_elegant' => 'أبيض وأسود أنيق',
        'dev_template' => 'قالب المبرمجين',
        'start_filling' => 'ابدأ بملء بياناتك لمشاهدة المعاينة'
    ],
    'en' => [
        // Navbar & General
        'home' => 'Home',
        'explore' => 'Explore',
        'create_portfolio' => 'Create Portfolio',
        'dashboard' => 'Dashboard',
        'welcome' => 'Welcome',
        'logout' => 'Logout',
        'login' => 'Login',
        'register' => 'Register',
        'copyright' => 'All rights reserved ❤️ Code Elta6ur',
        'made_with' => 'Made with ❤️ by Code Elta6ur',
        
        // Home
        'hero_badge' => 'Build a professional portfolio in minutes',
        'hero_title_1' => 'Create your personal website',
        'hero_title_2' => 'Without code',
        'hero_desc' => 'Enter your details, choose your favorite design, and watch your site form instantly. Ready to publish in minutes!',
        'start_now_free' => 'Start Now - Free',
        'how_it_works_btn' => 'How it works?',

        // Dashboard
        'hello' => 'Hello',
        'manage_portfolios' => 'Manage your portfolios',
        'create_new_portfolio' => 'Create New Portfolio',
        'no_portfolios' => 'No portfolios yet',
        'start_create_first' => 'Start by creating your first portfolio now!',
        'stats' => 'Analytics',
        
        // Create Wizard
        'step_info' => 'Info',
        'step_skills' => 'Skills',
        'step_projects' => 'Projects',
        'step_settings' => 'Settings & Theme',
        
        'personal_info' => 'Personal Information',
        'tell_us_about' => 'Tell us about yourself and your field',
        'full_name' => 'Full Name *',
        'job_title' => 'Job Title',
        'bio' => 'Bio',
        'generate_ai_bio' => 'Generate AI Bio 🪄',
        'email_contact' => 'Contact Email',
        'profile_image' => 'Profile Image',
        'next' => 'Next',
        'prev' => 'Previous',
        
        'skills' => 'Skills',
        'add_skill' => 'Add Skill',
        'skill_name' => 'Skill Name',
        'skill_level' => 'Level',
        
        'projects' => 'Projects',
        'add_project' => 'Add Project',
        'import_github' => 'Import from GitHub',
        'project_name' => 'Project Name *',
        'project_desc' => 'Project Description',
        'project_link' => 'Project Link',
        
        'links_and_template' => 'Settings, Link & Template',
        'choose_template' => 'Choose Template',
        'custom_username' => 'Custom Username (Your Link) *',
        'custom_domain' => 'Custom Domain (Optional)',
        'portfolio_language' => 'Portfolio Display Language',
        'save_and_publish' => 'Save & Publish Portfolio',
        
        'live_preview' => 'Live Preview',

        // Index Page
        'index_page_title' => 'AI Portfolio Builder - Build Your Personal Site in Minutes',
        'index_page_desc' => 'Create a professional personal portfolio site without writing code. Choose your design, enter your details, and launch your site to the world.',
        'why_portfolio_builder' => 'Why Portfolio Builder?',
        'all_you_need_for_digital_presence' => 'Everything you need to create a professional digital presence in one place',
        '3_pro_templates' => '3 Professional Templates',
        '3_pro_templates_desc' => 'Choose from Modern, Creative, or Professional. Each template is carefully designed to fit your field',
        'live_preview_desc' => 'See changes happen in real time as you fill in your details without reloading',
        'responsive_100' => '100% Responsive',
        'responsive_desc' => 'Your site looks perfect on all devices: desktop, tablet, and mobile',
        'export_download' => 'Export & Download',
        'export_desc' => 'Download your site as a ZIP file and host it anywhere or share it directly',
        'personal_account' => 'Personal Account',
        'personal_account_desc' => 'Register an account to save multiple portfolios and edit them anytime',
        'public_link' => 'Public Link',
        'public_link_desc' => 'Get a direct link to your site that you can share with anyone',
        'how_it_works' => 'How it works?',
        'how_it_works_subtitle' => 'Just 4 simple steps to create your personal website',
        'step_1_title' => 'Enter your details',
        'step_1_desc' => 'Your name, professional title, and bio',
        'step_2_title' => 'Add your skills',
        'step_2_desc' => 'Select your technical skills and their levels',
        'step_3_title' => 'Add your projects',
        'step_3_desc' => 'Showcase your best work with descriptions and links',
        'step_4_title' => 'Choose your template',
        'step_4_desc' => 'Select the right design and publish your site',
        'available_templates' => 'Available Templates',
        'templates_subtitle' => 'Unique designs suitable for various fields and tastes',
        'modern_minimal_desc' => 'Clean and modern design with soft colors and ample white space',
        'creative_dev_desc' => 'Dark background with neon colors and stunning glassmorphism effects',
        'pro_corp_desc' => 'Luxurious design with Navy and Gold colors resembling a professional CV',
        'badge_elegant' => 'Elegant',
        'badge_simple' => 'Simple',
        'badge_devs' => 'Developers',
        'badge_dynamic' => 'Dynamic',
        'badge_pros' => 'Professionals',
        'badge_luxurious' => 'Luxurious',
        'ready_to_build' => 'Ready to build your site?',
        'ready_subtitle' => 'Start now for free and create a professional portfolio in less than 5 minutes',
        'start_now' => 'Start Now',

        // Explore Page
        'explore_page_title' => 'Explore Sites - AI Portfolio Builder',
        'explore_heading' => 'Explore Sites',
        'explore_subtitle' => 'Browse Portfolio sites created by users',
        'published_site' => 'Published Site',
        'no_published_sites' => 'No published sites yet',
        'be_the_first' => 'Be the first to create a Portfolio!',
        'view_site' => 'View Site',
        'want_to_create' => 'Do you want to create your own Portfolio?',
        'create_yours_now' => 'Create your site now',
        'skill_count' => 'Skills',
        'project_count' => 'Projects',

        // Create Page
        'create_page_title' => 'Create Portfolio - AI Portfolio Builder',
        'create_heading' => 'Create your Portfolio',
        'create_subtitle' => 'Fill in your details and see the result instantly',
        'choose_template_lbl' => 'Choose Template',
        'add_tech_skills' => 'Add your technical skills and their levels',
        'add_best_projects' => 'Add your best projects to show in your Portfolio',
        'setup_link' => 'Set up your link and choose the template and language',
        'profile_image_opt' => 'Profile Image (Optional)',
        'example_name' => 'Example: Ahmed Mohamed',
        'example_job' => 'Example: Full-Stack Developer',
        'bio_placeholder' => 'Write a brief bio about your experience and field...',
        'your_site_link_will_be' => 'Your site link will be:',
        'clean_modern' => 'Clean and modern',
        'dark_dynamic' => 'Dark and dynamic',
        'luxurious_pro' => 'Luxurious and pro',
        'bw_elegant' => 'Elegant black & white',
        'dev_template' => 'Developers template',
        'start_filling' => 'Start filling your details to see the preview'
    ]
];

/**
 * دالة الترجمة
 */
function __(string $key): string {
    global $translations, $currentLang;
    return $translations[$currentLang][$key] ?? $translations['ar'][$key] ?? $key;
}

/**
 * معرفة هل الاتجاه من اليمين لليسار
 */
function isRTL(): bool {
    global $currentLang;
    return $currentLang === 'ar';
}
