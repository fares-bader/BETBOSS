<?php
// includes/functions.php

function saveSettings($new_settings) {
    global $settings;
    
    // دمج الإعدادات الجديدة مع الحالية
    $settings = array_merge($settings, $new_settings);
    
    // التأكد من وجود مجلد data
    if (!is_dir('../data')) {
        mkdir('../data', 0777, true);
    }
    
    // حفظ الإعدادات
    $result = file_put_contents('../data/settings.json', json_encode($settings, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    
    if ($result) {
        // إعادة تحميل الإعدادات فوراً
        reloadSettings();
        return true;
    }
    
    return false;
}

function getImagePath($image_key) {
    $images_file = '../data/images.json';
    
    if (file_exists($images_file)) {
        $images_data = file_get_contents($images_file);
        if (!empty($images_data)) {
            $images = json_decode($images_data, true);
            
            if (is_array($images) && isset($images[$image_key]) && !empty($images[$image_key])) {
                $image_path = $images[$image_key];
                
                // التحقق من وجود الملف فعلياً
                if (file_exists('../' . $image_path)) {
                    return $image_path;
                } else {
                    // إذا الملف غير موجود، احذف السجل
                    deleteImageRecord($image_key);
                }
            }
        }
    }
    
    return '';
}

function deleteImageRecord($image_key) {
    $images_file = '../data/images.json';
    
    if (file_exists($images_file)) {
        $images_data = file_get_contents($images_file);
        if (!empty($images_data)) {
            $images = json_decode($images_data, true);
            if (is_array($images) && isset($images[$image_key])) {
                unset($images[$image_key]);
                file_put_contents($images_file, json_encode($images, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
            }
        }
    }
}

function saveImagePath($image_key, $image_path) {
    $images_file = '../data/images.json';
    $images = [];
    
    if (file_exists($images_file)) {
        $images_data = file_get_contents($images_file);
        if (!empty($images_data)) {
            $images = json_decode($images_data, true);
        }
    }
    
    $images[$image_key] = $image_path;
    
    // التأكد من وجود مجلد data
    if (!is_dir('../data')) {
        mkdir('../data', 0777, true);
    }
    
    $result = file_put_contents($images_file, json_encode($images, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    return $result !== false;
}

function uploadImage($file, $image_key) {
    $target_dir = "../assets/images/uploaded/";
    
    // التأكد من وجود المجلد
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    
    // التحقق من أن الملف صورة
    $check = getimagesize($file["tmp_name"]);
    if ($check === false) {
        return "الملف ليس صورة";
    }
    
    $file_extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    
    if (!in_array($file_extension, $allowed_extensions)) {
        return "نوع الملف غير مسموح. المسموح: " . implode(', ', $allowed_extensions);
    }
    
    // التحقق من حجم الملف (5MB كحد أقصى)
    if ($file["size"] > 5 * 1024 * 1024) {
        return "حجم الملف كبير جداً. الحد الأقصى 5MB";
    }
    
    $new_filename = $image_key . '_' . time() . '.' . $file_extension;
    $target_file = $target_dir . $new_filename;
    
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        $relative_path = "assets/images/uploaded/" . $new_filename;
        
        if (saveImagePath($image_key, $relative_path)) {
            return true;
        } else {
            // إذا فشل الحفظ، احذف الملف المرفوع
            unlink($target_file);
            return "فشل في حفظ معلومات الصورة";
        }
    }
    
    return "فشل في رفع الملف";
}

// دالة لتنظيف الملفات القديمة
function cleanupOldImages($image_key, $keep_current = true) {
    $target_dir = "../assets/images/uploaded/";
    $pattern = $target_dir . $image_key . "_*";
    
    $files = glob($pattern);
    $current_image = getImagePath($image_key);
    
    foreach ($files as $file) {
        $filename = basename($file);
        $current_filename = basename($current_image);
        
        // إذا لم يكن الملف الحالي أو إذا كنا نريد حذف الجميع
        if (!$keep_current || $filename !== $current_filename) {
            unlink($file);
        }
    }
}
?>