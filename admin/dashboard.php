<?php
// admin/dashboard.php
include '../includes/config.php';
include '../includes/auth.php';
requireAuth();
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- شريط التنقل -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-xl font-bold text-gray-800">لوحة التحكم</h1>
                <div class="flex items-center space-x-4 space-x-reverse">
                    <a href="../index.php" target="_blank" class="text-gray-600 hover:text-gray-800">
                        <i class="fas fa-eye mr-1"></i> معاينة الموقع
                    </a>
                    <a href="logout.php" class="text-red-600 hover:text-red-800">
                        <i class="fas fa-sign-out-alt mr-1"></i> تسجيل الخروج
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- القائمة الجانبية والمحتوى -->
    <div class="flex">
        <!-- القائمة الجانبية -->
        <div class="w-64 bg-white shadow-lg min-h-screen">
            <div class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="dashboard.php" class="flex items-center p-3 text-green-600 bg-green-50 rounded-lg">
                            <i class="fas fa-tachometer-alt ml-3"></i>
                            <span>لوحة التحكم</span>
                        </a>
                    </li>
                    <li>
                        <a href="settings.php" class="flex items-center p-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-cog ml-3"></i>
                            <span>إعدادات النصوص</span>
                        </a>
                    </li>
                    <li>
                        <a href="images.php" class="flex items-center p-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-images ml-3"></i>
                            <span>إدارة الصور</span>
                        </a>
                    </li>
                    <li>
                        <a href="api.php" class="flex items-center p-3 text-gray-600 hover:bg-gray-50 rounded-lg">
                            <i class="fas fa-link ml-3"></i>
                            <span>ربط المواقع</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- المحتوى الرئيسي -->
        <div class="flex-1 p-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- بطاقة إحصائيات -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-lg">
                            <i class="fas fa-text-height text-green-600 text-xl"></i>
                        </div>
                        <div class="mr-4">
                            <h3 class="text-lg font-semibold text-gray-800">النصوص</h3>
                            <p class="text-gray-600">إدارة محتوى الموقع</p>
                        </div>
                    </div>
                    <a href="settings.php" class="block mt-4 text-center bg-green-600 text-white py-2 rounded-lg hover:bg-green-700">
                        إدارة النصوص
                    </a>
                </div>

                <!-- بطاقة الصور -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-lg">
                            <i class="fas fa-images text-blue-600 text-xl"></i>
                        </div>
                        <div class="mr-4">
                            <h3 class="text-lg font-semibold text-gray-800">الصور</h3>
                            <p class="text-gray-600">إدارة صور الموقع</p>
                        </div>
                    </div>
                    <a href="images.php" class="block mt-4 text-center bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700">
                        إدارة الصور
                    </a>
                </div>

                <!-- بطاقة الربط -->
                <div class="bg-white rounded-lg shadow-lg p-6">
                    <div class="flex items-center">
                        <div class="p-3 bg-purple-100 rounded-lg">
                            <i class="fas fa-link text-purple-600 text-xl"></i>
                        </div>
                        <div class="mr-4">
                            <h3 class="text-lg font-semibold text-gray-800">الربط</h3>
                            <p class="text-gray-600">ربط مع موقع آخر</p>
                        </div>
                    </div>
                    <a href="api.php" class="block mt-4 text-center bg-purple-600 text-white py-2 rounded-lg hover:bg-purple-700">
                        إعدادات الربط
                    </a>
                </div>
            </div>

            <!-- معلومات سريعة -->
            <div class="mt-8 bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">معلومات سريعة</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="border-l-4 border-green-500 bg-green-50 p-4">
                        <h3 class="font-semibold text-green-800">آخر تحديث</h3>
                        <p class="text-green-600"><?php echo date('Y-m-d H:i:s'); ?></p>
                    </div>
                    <div class="border-l-4 border-blue-500 bg-blue-50 p-4">
                        <h3 class="font-semibold text-blue-800">حالة الموقع</h3>
                        <p class="text-blue-600">يعمل بشكل طبيعي</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>