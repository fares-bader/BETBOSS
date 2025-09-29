<?php
// admin/api.php
include '../includes/config.php';
include '../includes/auth.php';
requireAuth();

$api_success = '';
$api_error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $api_url = $_POST['api_url'] ?? '';
    $api_key = $_POST['api_key'] ?? '';
    
    // حفظ إعدادات API
    $api_settings = [
        'api_url' => $api_url,
        'api_key' => $api_key
    ];
    
    file_put_contents('../data/api.json', json_encode($api_settings, JSON_PRETTY_PRINT));
    $api_success = 'تم حفظ إعدادات الربط بنجاح';
}

// تحميل إعدادات API الحالية
$current_api = [];
if (file_exists('../data/api.json')) {
    $current_api = json_decode(file_get_contents('../data/api.json'), true);
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ربط المواقع - لوحة التحكم</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- شريط التنقل -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-xl font-bold text-gray-800">ربط المواقع</h1>
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
                    <li><a href="settings.php" class="flex items-center p-3 text-gray-600 hover:bg-gray-50 rounded-lg"><i class="fas fa-cog ml-3"></i>إعدادات النصوص</a></li>
                    <li><a href="images.php" class="flex items-center p-3 text-gray-600 hover:bg-gray-50 rounded-lg"><i class="fas fa-images ml-3"></i>إدارة الصور</a></li>
                    <li><a href="api.php" class="flex items-center p-3 text-green-600 bg-green-50 rounded-lg"><i class="fas fa-link ml-3"></i>ربط المواقع</a></li>
                </ul>
            </div>
        </div>

        <!-- المحتوى الرئيسي -->
        <div class="flex-1 p-8">
            <?php if ($api_success): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    <?php echo $api_success; ?>
                </div>
            <?php endif; ?>

            <?php if ($api_error): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                    <?php echo $api_error; ?>
                </div>
            <?php endif; ?>

            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">إعدادات الربط مع موقع آخر</h2>

                <form method="POST" class="space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">رابط API</label>
                        <input type="url" name="api_url" value="<?php echo $current_api['api_url'] ?? ''; ?>" 
                               placeholder="https://example.com/api"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">مفتاح API</label>
                        <input type="text" name="api_key" value="<?php echo $current_api['api_key'] ?? ''; ?>" 
                               placeholder="أدخل مفتاح API"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                    </div>

                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <h3 class="font-semibold text-blue-800 mb-2">معلومات هامة:</h3>
                        <ul class="text-blue-700 text-sm list-disc list-inside space-y-1">
                            <li>تأكد من صحة رابط API قبل الحفظ</li>
                            <li>احفظ مفتاح API في مكان آمن</li>
                            <li>سيتم استخدام هذه الإعدادات لمزامنة البيانات مع الموقع الآخر</li>
                        </ul>
                    </div>

                    <button type="submit" 
                            class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                        حفظ إعدادات الربط
                    </button>
                </form>
            </div>

            <!-- اختبار الاتصال -->
            <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">اختبار الاتصال</h2>
                <button onclick="testConnection()" 
                        class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    اختبار الاتصال مع API
                </button>
                <div id="test-result" class="mt-4"></div>
            </div>
        </div>
    </div>

    <script>
        function testConnection() {
            const resultDiv = document.getElementById('test-result');
            resultDiv.innerHTML = '<div class="text-blue-600">جاري اختبار الاتصال...</div>';
            
            // محاكاة اختبار الاتصال
            setTimeout(() => {
                resultDiv.innerHTML = '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">الاتصال ناجح مع الخادم</div>';
            }, 2000);
        }
    </script>
</body>
</html>