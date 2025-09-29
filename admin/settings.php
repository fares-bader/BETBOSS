<?php
// admin/settings.php
include '../includes/config.php';
include '../includes/auth.php';
include '../includes/functions.php';
requireAuth();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_settings = [];
    foreach ($_POST as $key => $value) {
        if (strpos($key, 'setting_') === 0) {
            $setting_key = substr($key, 8);
            $new_settings[$setting_key] = trim($value);
        }
    }
    
    if (saveSettings($new_settings)) {
        $_SESSION['success'] = 'تم حفظ الإعدادات بنجاح';
        // إعادة التوجيه لتجنب إعادة إرسال النموذج
        header('Location: settings.php');
        exit;
    } else {
        $error = 'حدث خطأ أثناء حفظ الإعدادات';
    }
}

// إعادة تحميل الإعدادات للتأكد من أحدث نسخة
reloadSettings();
?>

<!-- باقي الكود كما هو -->

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إعدادات النصوص - لوحة التحكم</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- شريط التنقل -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-xl font-bold text-gray-800">إعدادات النصوص</h1>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="dashboard.php" class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-arrow-right mr-1"></i> العودة للوحة التحكم
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- القائمة الجانبية -->
        <div class="w-64 bg-white shadow-lg min-h-screen">
            <div class="p-4">
                <ul class="space-y-2">
                    <li><a href="dashboard.php" class="flex items-center p-3 text-gray-600 hover:bg-gray-50 rounded-lg"><i class="fas fa-tachometer-alt ml-3"></i>لوحة التحكم</a></li>
                    <li><a href="settings.php" class="flex items-center p-3 text-green-600 bg-green-50 rounded-lg"><i class="fas fa-cog ml-3"></i>إعدادات النصوص</a></li>
                    <li><a href="images.php" class="flex items-center p-3 text-gray-600 hover:bg-gray-50 rounded-lg"><i class="fas fa-images ml-3"></i>إدارة الصور</a></li>
                    <li><a href="api.php" class="flex items-center p-3 text-gray-600 hover:bg-gray-50 rounded-lg"><i class="fas fa-link ml-3"></i>ربط المواقع</a></li>
                </ul>
            </div>
        </div>

        <!-- المحتوى الرئيسي -->
        <div class="flex-1 p-8">
            <?php if (isset($success)): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <?php echo $success; ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="bg-white rounded-lg shadow-lg p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- العنوان الرئيسي -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">العنوان الرئيسي للموقع</label>
                        <input type="text" name="setting_site_title" value="<?php echo getSetting('site_title'); ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <!-- قسم الهيرو -->
                    <div class="md:col-span-2 border-t pt-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">قسم الهيرو</h3>
                    </div>
                    
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">العنوان الرئيسي</label>
                        <input type="text" name="setting_hero_title" value="<?php echo getSetting('hero_title'); ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">النص المميز</label>
                        <input type="text" name="setting_hero_subtitle_highlight" value="<?php echo getSetting('hero_subtitle_highlight'); ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">الوصف</label>
                        <textarea name="setting_hero_description" rows="3" 
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"><?php echo getSetting('hero_description'); ?></textarea>
                    </div>

                    <!-- الإحصائيات -->
                    <div class="md:col-span-2 border-t pt-4">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">الإحصائيات</h3>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">نسبة الأرباح</label>
                        <input type="text" name="setting_profit_percentage" value="<?php echo getSetting('profit_percentage'); ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الحد الأدنى للسحب</label>
                        <input type="text" name="setting_min_withdrawal" value="<?php echo getSetting('min_withdrawal'); ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">ساعات الدعم</label>
                        <input type="text" name="setting_support_hours" value="<?php echo getSetting('support_hours'); ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">المستخدمون النشطون</label>
                        <input type="text" name="setting_active_users" value="<?php echo getSetting('active_users'); ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <!-- إحصائيات إضافية -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">معدل الفوز</label>
                        <input type="text" name="setting_win_rate" value="<?php echo getSetting('win_rate'); ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">إجمالي المدفوعات</label>
                        <input type="text" name="setting_total_paid" value="<?php echo getSetting('total_paid'); ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الأرباح اليومية</label>
                        <input type="text" name="setting_daily_profits" value="<?php echo getSetting('daily_profits'); ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">الشركاء النشطون</label>
                        <input type="text" name="setting_active_partners" value="<?php echo getSetting('active_partners'); ?>" 
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>
                </div>

                <div class="mt-6">
                    <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        حفظ التغييرات
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>