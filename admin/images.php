<?php
// admin/images.php
include '../includes/config.php';
include '../includes/auth.php';
include '../includes/functions.php';
requireAuth();

$upload_message = '';
$message_type = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    $image_key = $_POST['image_key'];
    
    // تنظيف الصور القديمة لهذا المفتاح
    cleanupOldImages($image_key, false);
    
    $result = uploadImage($_FILES['image'], $image_key);
    
    if ($result === true) {
        $upload_message = 'تم رفع الصورة بنجاح';
        $message_type = 'success';
        
        // إعادة التوجيه لتجنب إعادة إرسال النموذج
        header('Location: images.php?success=1');
        exit;
    } else {
        $upload_message = $result;
        $message_type = 'error';
    }
}

// عرض رسالة النجاح إذا كانت موجودة في URL
if (isset($_GET['success'])) {
    $upload_message = 'تم رفع الصورة بنجاح';
    $message_type = 'success';
}

$images_config = [
    'hero_main' => 'الصورة الرئيسية في الهيرو',
    'hero_sports' => 'صورة القسم الرياضي',
    'hero_casino' => 'صورة قسم الكازينو',
    'feature_1' => 'صورة الميزة الأولى',
    'feature_2' => 'صورة الميزة الثانية',
    'feature_3' => 'صورة الميزة الثالثة'
];
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إدارة الصور - لوحة التحكم</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .success-message { background: #d1fae5; color: #065f46; border: 1px solid #a7f3d0; }
        .error-message { background: #fee2e2; color: #991b1b; border: 1px solid #fecaca; }
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- شريط التنقل -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <h1 class="text-xl font-bold text-gray-800">إدارة الصور</h1>
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
                    <li><a href="images.php" class="flex items-center p-3 text-green-600 bg-green-50 rounded-lg"><i class="fas fa-images ml-3"></i>إدارة الصور</a></li>
                    <li><a href="api.php" class="flex items-center p-3 text-gray-600 hover:bg-gray-50 rounded-lg"><i class="fas fa-link ml-3"></i>ربط المواقع</a></li>
                </ul>
            </div>
        </div>

        <!-- المحتوى الرئيسي -->
        <div class="flex-1 p-8">
            <?php if ($upload_message): ?>
                <div class="<?php echo $message_type === 'success' ? 'success-message' : 'error-message'; ?> px-4 py-3 rounded mb-6">
                    <?php echo $upload_message; ?>
                </div>
            <?php endif; ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php foreach ($images_config as $key => $description): ?>
                    <div class="bg-white rounded-lg shadow-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4"><?php echo $description; ?></h3>
                        
                        <?php $current_image = getImagePath($key); ?>
                        <div class="mb-4">
                            <?php if ($current_image && file_exists('../' . $current_image)): ?>
                                <img src="../<?php echo $current_image; ?>?t=<?php echo time(); ?>" alt="<?php echo $description; ?>" 
                                     class="w-full h-48 object-cover rounded-lg border">
                                <p class="text-sm text-green-600 mt-2">
                                    <i class="fas fa-check-circle"></i> الصورة الحالية
                                </p>
                            <?php else: ?>
                                <div class="w-full h-48 bg-gray-100 rounded-lg flex items-center justify-center border-2 border-dashed border-gray-300">
                                    <div class="text-center">
                                        <i class="fas fa-image text-gray-400 text-4xl mb-2"></i>
                                        <p class="text-gray-500">لا توجد صورة مرفوعة</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>

                        <form method="POST" enctype="multipart/form-data" class="space-y-4">
                            <input type="hidden" name="image_key" value="<?php echo $key; ?>">
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">رفع صورة جديدة</label>
                                <input type="file" name="image" accept="image/*" required 
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500">
                                <p class="text-xs text-gray-500 mt-1">المسموح: JPG, PNG, GIF, WebP - الحد الأقصى: 5MB</p>
                            </div>

                            <button type="submit" 
                                    class="w-full bg-green-600 text-white py-2 px-4 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 transition duration-200">
                                <i class="fas fa-upload ml-2"></i> رفع الصورة
                            </button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</body>
</html>