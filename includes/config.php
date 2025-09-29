<?php
// includes/config.php
session_start();

define('SITE_URL', 'http://localhost/betboss');
define('ADMIN_USERNAME', 'admin');
define('ADMIN_PASSWORD', 'admin123');

// الإعدادات الافتراضية مع جميع المفاتيح المطلوبة
$default_settings = [
    'site_title' => 'BETBOSS',
    'hero_title' => 'انضم إلى',
    'hero_subtitle_highlight' => 'النخبة المميزة',
    'hero_description' => 'اكتشف عالماً حصرياً من تجارب الرهان الرياضي والألعاب المتميزة. انضم إلى آلاف الشركاء الناجحين حول العالم واحصل على أرباح استثنائية.',
    'profit_percentage' => '50%',
    'min_withdrawal' => '500$',
    'support_hours' => '24/7',
    'active_partners' => '10K+',
    'win_rate' => '95%',
    'total_paid' => '$200K+',
    'active_users' => '2,450',
    'daily_profits' => '$12,890',
    'cta_button' => 'ابدأ الآن واربح معنا',
    'features_title' => 'اختبر',
    'features_highlight' => 'الإثارة الحقيقية',
    'features_description' => 'انغمس في عالم من تجارب الألعاب المتميزة، من الرهان الرياضي المباشر إلى ألعاب الكازينو الحصرية.'
];

// دالة لتحميل الإعدادات مع التحديث الفوري
function loadSettings() {
    global $default_settings;
    $settings_file = '../data/settings.json';
    
    if (file_exists($settings_file)) {
        $saved_settings = json_decode(file_get_contents($settings_file), true);
        if ($saved_settings && is_array($saved_settings)) {
            return array_merge($default_settings, $saved_settings);
        }
    }
    
    return $default_settings;
}

// تحميل الإعدادات
$settings = loadSettings();

function getSetting($key) {
    global $settings;
    if (isset($settings[$key]) && !empty($settings[$key])) {
        return $settings[$key];
    }
    
    // إذا لم يكن المفتاح موجوداً، ارجع قيمة افتراضية
    $defaults = [
        'cta_button' => 'ابدأ الآن واربح معنا',
        'site_title' => 'BETBOSS',
        'hero_title' => 'انضم إلى',
        'hero_subtitle_highlight' => 'النخبة المميزة',
        'hero_description' => 'اكتشف عالماً حصرياً من تجارب الرهان الرياضي والألعاب المتميزة. انضم إلى آلاف الشركاء الناجحين حول العالم واحصل على أرباح استثنائية.',
        'profit_percentage' => '50%',
        'min_withdrawal' => '500$',
        'support_hours' => '24/7',
        'active_partners' => '10K+',
        'win_rate' => '95%',
        'total_paid' => '$200K+',
        'active_users' => '2,450',
        'daily_profits' => '$12,890',
        'features_title' => 'اختبر',
        'features_highlight' => 'الإثارة الحقيقية',
        'features_description' => 'انغمس في عالم من تجارب الألعاب المتميزة، من الرهان الرياضي المباشر إلى ألعاب الكازينو الحصرية.'
    ];
    
    return isset($defaults[$key]) ? $defaults[$key] : '[' . $key . ']';
}

// دالة لإعادة تحميل الإعدادات
function reloadSettings() {
    global $settings;
    $settings = loadSettings();
}
?>