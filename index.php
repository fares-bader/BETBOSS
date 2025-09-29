<?php
// index.php
include_once 'includes/config.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="/vite.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo getSetting('site_title'); ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body class="min-h-screen flex flex-col">
    <div id="root" class="flex-grow">
        <div class="overflow-hidden relative">
            <div class="relative z-10">
                <!-- Header -->
                <header class="relative max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8" >
                    <div class="max-w-screen-xl mx-auto">
                        <center>
                            <h1 class="text-2xl font-black tracking-widest text-slate-800">
                                <?php echo getSetting('site_title'); ?>
                            </h1>
                        </center>
                    </div>
                </header>

                <main>
                    <!-- Hero Section -->
                    <section class="hero-section relative overflow-hidden pt-10 pb-20 sm:pt-16 sm:pb-28">


                        <div class="absolute top-1/2 left-1/2 w-[80rem] h-[80rem] bg-green-500/10 rounded-full -translate-x-1/2 -translate-y-1/2" style="filter: blur(120px)" aria-hidden="true"></div>

                        <div class="relative max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                                <!-- Right side: Text Content -->
                                <div class="text-right">
                                    <h2 class="text-5xl md:text-7xl font-[900] text-slate-800 leading-tight">
                                        <?php echo getSetting('hero_title'); ?><br />
                                        <span class="text-[#05F68D]"><?php echo getSetting('hero_subtitle_highlight'); ?></span>
                                    </h2>
                                    <p class="mt-6 text-lg text-slate-600 max-w-lg">
                                        <?php echo getSetting('hero_description'); ?>
                                    </p>
                                    <div class="mt-8 hero-buttons">
                                        <a href="#join-form"  class="inline-block bg-[#05F68D] text-slate-900 font-bold text-lg px-8 py-4 rounded-lg shadow-lg hover:bg-opacity-90 transition-all duration-300">
                                            <?php echo getSetting('cta_button'); ?>
                                        </a>
                                    </div>
                                    <div class="mt-12 flex justify-end items-center gap-12 text-slate-700">
                                        <div class="text-right">
                                            <p class="font-bold text-2xl text-[#05F68D]"><?php echo getSetting('profit_percentage'); ?></p>
                                            <p class="text-sm text-slate-500 mt-1">نسبة الأرباح</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold text-2xl text-[#05F68D]"><?php echo getSetting('min_withdrawal'); ?></p>
                                            <p class="text-sm text-slate-500 mt-1">الحد الأدنى للسحب</p>
                                        </div>
                                        <div class="text-right">
                                            <p class="font-bold text-2xl text-[#05F68D]"><?php echo getSetting('support_hours'); ?></p>
                                            <p class="text-sm text-slate-500 mt-1">دعم مستمر</p>
                                        </div>
                                    </div>
                                </div>
<?php
// تصحيح أخطاء الصور
error_log("=== Image Debug Info ===");
$debug_images = ['hero_main', 'hero_sports', 'hero_casino'];
foreach ($debug_images as $img_key) {
    $path = getImagePath($img_key);
    error_log("$img_key: " . ($path ? $path : 'NOT FOUND'));
    
    if ($path && file_exists($path)) {
        error_log("$img_key file exists: YES");
    } elseif ($path) {
        error_log("$img_key file exists: NO - Path: $path");
    }
}
error_log("=== End Image Debug ===");
?>
                                <!-- Left side: Image Collage -->
                                <div class="relative h-[500px] hidden lg:flex items-center justify-center">
                                    <!-- الصورة الرئيسية في الخلفية -->
                                    <div class="absolute inset-0 flex items-center justify-center z-0">
                                        <div class="w-96 h-64 rounded-3xl shadow-2xl overflow-hidden transform rotate-[-3deg]">
                                            <?php
                                            $main_image = getImagePath('hero_main');
                                            if (!$main_image) {
                                                $main_image = "https://images.unsplash.com/photo-1558655146-364adaf1fcc9?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80";
                                            }
                                            ?>
<img src="<?php echo $main_image; ?>?t=<?php echo time(); ?>" alt="رهان مباشر على الهاتف" class="w-full h-full object-cover" />                                            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                                            <div class="absolute bottom-4 right-4 flex items-center gap-2">
                                                <span class="w-3 h-3 rounded-full bg-blue-500"></span>
                                                <span class="text-white text-lg font-semibold">رهان مباشر</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- الصورة اليمنى العليا -->
                                    <div class="absolute top-8 right-8 z-10 transform rotate-[5deg] hover:rotate-0 transition-transform duration-300">
                                        <div class="w-64 h-40 rounded-2xl shadow-xl overflow-hidden">
                                            <?php
                                            $sports_image = getImagePath('hero_sports');
                                            if (!$sports_image) {
                                                $sports_image = "https://images.unsplash.com/photo-1540747913346-19e32dc3e97e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80";
                                            }
                                            ?>
                                            <img src="<?php echo $sports_image; ?>" alt="رهان رياضي" class="w-full h-full object-cover" />
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                            <div class="absolute bottom-3 right-3">
                                                <span class="text-white text-sm font-medium">رياضي</span>
                                            </div>
                                            <div class="absolute top-3 left-3 w-3 h-3 rounded-full bg-green-500"></div>
                                        </div>
                                    </div>

                                    <!-- الصورة اليسرى السفلى -->
                                    <div class="absolute bottom-8 left-8 z-10 transform rotate-[-5deg] hover:rotate-0 transition-transform duration-300">
                                        <div class="w-64 h-40 rounded-2xl shadow-xl overflow-hidden">
                                            <?php
                                            $casino_image = getImagePath('hero_casino');
                                            if (!$casino_image) {
                                                $casino_image = "https://images.unsplash.com/photo-1533105079780-92b9be482077?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1000&q=80";
                                            }
                                            ?>
                                            <img src="<?php echo $casino_image; ?>" alt="ألعاب كازينو" class="w-full h-full object-cover" />
                                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                                            <div class="absolute bottom-3 right-3">
                                                <span class="text-white text-sm font-medium">كازينو</span>
                                            </div>
                                            <div class="absolute top-3 left-3 w-3 h-3 rounded-full bg-yellow-400"></div>
                                        </div>
                                    </div>

                                    <!-- العنصر الأساسي للبطاقة -->
                                    <div id="floating-stats-container" class="absolute inset-0 z-20 pointer-events-none">
                                        <div id="floating-stats-card" class="bg-white/90 backdrop-blur-md rounded-2xl shadow-2xl p-6 min-w-[200px] text-center transition-all duration-500 ease-in-out opacity-0 scale-95 absolute pointer-events-auto">
                                            <div class="flex items-center justify-center gap-2 mb-3">
                                                <span class="w-3 h-3 bg-green-500 rounded-full animate-pulse"></span>
                                                <p class="text-slate-700 font-semibold">إحصائيات حية</p>
                                            </div>
                                            <div class="space-y-2">
                                                <div class="flex justify-between items-center">
                                                    <span class="text-slate-600 text-sm">المستخدمون</span>
                                                    <span id="active-users" class="text-green-600 font-bold"><?php echo getSetting('active_users'); ?></span>
                                                </div>
                                                <div class="flex justify-between items-center">
                                                    <span class="text-slate-600 text-sm">الأرباح</span>
                                                    <span id="daily-profits" class="text-green-600 font-bold"><?php echo getSetting('daily_profits'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        <!-- علامة الجودة العائمة -->
                        <div class="absolute top-20 left-20 z-30">
                            <div class="bg-gradient-to-r from-green-500 to-green-600 text-white px-4 py-2 rounded-full shadow-lg flex items-center gap-2">
                                <i class="fas fa-star text-yellow-300"></i>
                                <span class="font-semibold">جودة مضمونة</span>
                            </div>
                        </div>

                        <!-- علامة السرعة العائمة -->
                        <div class="absolute bottom-20 right-20 z-30">
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2 rounded-full shadow-lg flex items-center gap-2">
                                <i class="fas fa-bolt text-yellow-300"></i>
                                <span class="font-semibold">سرعة فائقة</span>
                            </div>
                        </div>
                                    <style>
                                        /* تأثيرات الظهور والاختفاء مع حركة */
                                        @keyframes fadeInScale {
                                            0% {
                                                opacity: 0;
                                                transform: scale(0.8);
                                            }
                                            20% {
                                                opacity: 1;
                                                transform: scale(1.05);
                                            }
                                            40% {
                                                opacity: 1;
                                                transform: scale(1);
                                            }
                                            80% {
                                                opacity: 1;
                                                transform: scale(1);
                                            }
                                            100% {
                                                opacity: 0;
                                                transform: scale(0.8);
                                            }
                                        }

                                        .stats-card-visible {
                                            animation: fadeInScale 5s ease-in-out forwards;
                                        }

                                        /* تأثيرات للقيم المتغيرة */
                                        @keyframes numberPop {
                                            0% { transform: scale(1); }
                                            50% { transform: scale(1.2); color: #059669; }
                                            100% { transform: scale(1); }
                                        }

                                        .number-changing {
                                            animation: numberPop 0.6s ease-in-out;
                                            display: inline-block;
                                        }

                                        /* تأثيرات إضافية للبطاقة */
                                        #floating-stats-card {
                                            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(255, 255, 255, 0.1);
                                            border: 1px solid rgba(255, 255, 255, 0.2);
                                            cursor: pointer;
                                        }

                                        /* تأثير عند التمرير */
                                        #floating-stats-card:hover {
                                            transform: scale(1.1) !important;
                                            transition: transform 0.3s ease;
                                        }
                                    </style>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const statsCard = document.getElementById('floating-stats-card');
                                            const activeUsersEl = document.getElementById('active-users');
                                            const dailyProfitsEl = document.getElementById('daily-profits');
                                            const container = document.getElementById('floating-stats-container');
                                            
                                            // المواقع المحتملة للبطاقة
                                            const possiblePositions = [
                                                { top: '20%', left: '20%' }, { top: '20%', left: '80%' },
                                                { top: '80%', left: '20%' }, { top: '80%', left: '80%' },
                                                { top: '50%', left: '30%' }, { top: '50%', left: '70%' },
                                                { top: '30%', left: '50%' }, { top: '70%', left: '50%' },
                                                { top: '25%', left: '25%' }, { top: '25%', left: '75%' },
                                                { top: '75%', left: '25%' }, { top: '75%', left: '75%' }
                                            ];
                                            
                                            // القيم الأساسية للإحصائيات
                                            let baseUsers = 2450;
                                            let baseProfits = 12890;
                                            
                                            // دالة لتوليد قيم عشوائية واقعية
                                            function generateRandomValues() {
                                                // تغيير عشوائي بين -5% إلى +8%
                                                const userChange = Math.random() * 0.13 - 0.05;
                                                const profitChange = Math.random() * 0.15 - 0.05;
                                                
                                                const newUsers = Math.max(2000, Math.round(baseUsers * (1 + userChange)));
                                                const newProfits = Math.max(10000, Math.round(baseProfits * (1 + profitChange)));
                                                
                                                return {
                                                    users: newUsers.toLocaleString(),
                                                    profits: '$' + newProfits.toLocaleString()
                                                };
                                            }
                                            
                                            // دالة لتغيير القيم مع تأثير
                                            function animateValueChange(element, newValue) {
                                                element.classList.add('number-changing');
                                                element.textContent = newValue;
                                                
                                                setTimeout(() => {
                                                    element.classList.remove('number-changing');
                                                }, 600);
                                            }
                                            
                                            function getRandomPosition() {
                                                const randomIndex = Math.floor(Math.random() * possiblePositions.length);
                                                return possiblePositions[randomIndex];
                                            }
                                            
                                            function moveCardToNewPosition() {
                                                const newPosition = getRandomPosition();
                                                statsCard.style.top = newPosition.top;
                                                statsCard.style.left = newPosition.left;
                                                statsCard.style.transform = 'translate(-50%, -50%) scale(0.8)';
                                            }
                                            
                                            function toggleStatsCard() {
                                                // نقل البطاقة إلى موقع جديد
                                                moveCardToNewPosition();
                                                
                                                // توليد قيم جديدة
                                                const newValues = generateRandomValues();
                                                
                                                // إضافة كلاس الظهور بعد تأخير بسيط
                                                setTimeout(() => {
                                                    statsCard.classList.add('stats-card-visible');
                                                    statsCard.style.transform = 'translate(-50%, -50%) scale(1)';
                                                    
                                                    // تغيير القيم بعد ظهور البطاقة
                                                    setTimeout(() => {
                                                        animateValueChange(activeUsersEl, newValues.users);
                                                    }, 300);
                                                    
                                                    setTimeout(() => {
                                                        animateValueChange(dailyProfitsEl, newValues.profits);
                                                    }, 600);
                                                    
                                                }, 100);
                                                
                                                // بعد 5 ثواني، إزالة الكلاس وإعادة التشغيل
                                                setTimeout(() => {
                                                    statsCard.classList.remove('stats-card-visible');
                                                    statsCard.style.transform = 'translate(-50%, -50%) scale(0.8)';
                                                    
                                                    // إعادة التشغيل بعد فترة بسيطة
                                                    setTimeout(() => {
                                                        toggleStatsCard();
                                                    }, 2000);
                                                }, 5000);
                                            }
                                            
                                            // بدء الدورة
                                            setTimeout(() => {
                                                moveCardToNewPosition();
                                                toggleStatsCard();
                                            }, 1000);
                                            
                                            // تأثيرات تفاعلية
                                            statsCard.addEventListener('mouseenter', function() {
                                                this.style.transform = 'translate(-50%, -50%) scale(1.1)';
                                                this.style.transition = 'transform 0.3s ease';
                                            });
                                            
                                            statsCard.addEventListener('mouseleave', function() {
                                                this.style.transform = 'translate(-50%, -50%) scale(1)';
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Features Section -->
                    <section class="py-20">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="text-center">
                                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800">
                                    <?php echo getSetting('features_title'); ?>
                                    <span class="text-green-500"><?php echo getSetting('features_highlight'); ?></span>
                                </h2>
                                <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                                    <?php echo getSetting('features_description'); ?>
                                </p>
                            </div>
                            <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 features-section">
                                <div class="relative rounded-2xl shadow-xl overflow-hidden group transform hover:-translate-y-2 transition-transform duration-300">
                                    <?php
                                    $feature_1_image = getImagePath('feature_1');
                                    if (!$feature_1_image) {
                                        $feature_1_image = "https://picsum.photos/seed/squirrel/400/600";
                                    }
                                    ?>
                                    <img src="<?php echo $feature_1_image; ?>" alt="كرة السلة" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                                    <div class="absolute top-4 left-4 w-4 h-4 rounded-full bg-green-400 border-2 border-white"></div>
                                    <span class="absolute bottom-4 right-4 text-white text-lg font-bold">كرة السلة</span>
                                </div>
                                <div class="relative rounded-2xl shadow-xl overflow-hidden group transform hover:-translate-y-2 transition-transform duration-300">
                                    <?php
                                    $feature_2_image = getImagePath('feature_2');
                                    if (!$feature_2_image) {
                                        $feature_2_image = "https://picsum.photos/seed/casinochips/400/600";
                                    }
                                    ?>
                                    <img src="<?php echo $feature_2_image; ?>" alt="ألعاب الكازينو" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                                    <div class="absolute top-4 left-4 w-4 h-4 rounded-full bg-green-400 border-2 border-white"></div>
                                    <span class="absolute bottom-4 right-4 text-white text-lg font-bold">ألعاب الكازينو</span>
                                </div>
                                <div class="relative rounded-2xl shadow-xl overflow-hidden group transform hover:-translate-y-2 transition-transform duration-300">
                                    <?php
                                    $feature_3_image = getImagePath('feature_3');
                                    if (!$feature_3_image) {
                                        $feature_3_image = "https://picsum.photos/seed/balcony/400/600";
                                    }
                                    ?>
                                    <img src="<?php echo $feature_3_image; ?>" alt="الرهان الرياضي" class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-300" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                                    <div class="absolute top-4 left-4 w-4 h-4 rounded-full bg-green-400 border-2 border-white"></div>
                                    <span class="absolute bottom-4 right-4 text-white text-lg font-bold">الرهان الرياضي</span>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Stats Section -->
                    <section class="py-20 stats-section">
                        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                                <div class="card p-6 text-center transform hover:scale-105 transition-transform duration-300">
                                    <div class="flex justify-center items-center h-16 w-16 mx-auto rounded-full bg-green-100 text-green-500">
                                        <i class="fas fa-users text-2xl"></i>
                                    </div>
                                    <p class="mt-4 text-3xl font-bold text-gray-800"><?php echo getSetting('active_partners'); ?></p>
                                    <p class="text-gray-500">شريك نشط</p>
                                </div>
                                <div class="card p-6 text-center transform hover:scale-105 transition-transform duration-300">
                                    <div class="flex justify-center items-center h-16 w-16 mx-auto rounded-full bg-green-100 text-green-500">
                                        <i class="fas fa-chart-line text-2xl"></i>
                                    </div>
                                    <p class="mt-4 text-3xl font-bold text-gray-800"><?php echo getSetting('win_rate'); ?></p>
                                    <p class="text-gray-500">معدل الفوز</p>
                                </div>
                                <div class="card p-6 text-center transform hover:scale-105 transition-transform duration-300">
                                    <div class="flex justify-center items-center h-16 w-16 mx-auto rounded-full bg-green-100 text-green-500">
                                        <i class="fas fa-money-bill-wave text-2xl"></i>
                                    </div>
                                    <p class="mt-4 text-3xl font-bold text-gray-800"><?php echo getSetting('total_paid'); ?></p>
                                    <p class="text-gray-500">تم دفعه</p>
                                </div>
                                <div class="card p-6 text-center transform hover:scale-105 transition-transform duration-300">
                                    <div class="flex justify-center items-center h-16 w-16 mx-auto rounded-full bg-green-100 text-green-500">
                                        <i class="fas fa-headset text-2xl"></i>
                                    </div>
                                    <p class="mt-4 text-3xl font-bold text-gray-800"><?php echo getSetting('support_hours'); ?></p>
                                    <p class="text-gray-500">دعم فني</p>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Join Section -->
                    <section class="relative overflow-hidden py-20 bg-white/50">
                        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                            <div class="flex justify-center items-center gap-3">
                                <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-check text-white text-xl"></i>
                                </div>
                                <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800">
                                    مستعد للانضمام
                                    <span class="text-green-500">إلى النجاح؟</span>
                                </h2>
                            </div>
                            <p class="mt-4 text-lg text-gray-600 max-w-3xl mx-auto">
                                انضم إلى مجتمعنا المتميز من الشركاء الناجحين. املأ النموذج
                                أدناه وابدأ رحلتك نحو الأرباح الاستثنائية.
                            </p>

                            <div id="join-form" class="mt-12 bg-white rounded-2xl shadow-2xl p-8 md:p-12 text-right">
                                <h3 class="text-2xl font-bold text-gray-700 mb-8">
                                    انضم إلى <?php echo getSetting('site_title'); ?>
                                </h3>

                                <div class="form-container">
                                    <form id="registration-form" class="space-y-6">
                                        <!-- الاسم الأول واسم العائلة -->
                                        <div class="input-group">
                                            <div class="form-input">
                                                <label for="firstName" class="block text-sm font-medium text-gray-700 mb-1 required">الاسم الأول</label>
                                                <input type="text" id="firstName" placeholder="أدخل اسمك الأول" required />
                                                <div class="validation-message">يرجى إدخال الاسم الأول</div>
                                            </div>

                                            <div class="form-input">
                                                <label for="lastName" class="block text-sm font-medium text-gray-700 mb-1 required">اسم العائلة</label>
                                                <input type="text" id="lastName" placeholder="أدخل اسم العائلة" required />
                                                <div class="validation-message">يرجى إدخال اسم العائلة</div>
                                            </div>
                                        </div>

                                        <!-- البريد الإلكتروني ورقم الهاتف -->
                                        <div class="input-group">
                                            <div class="form-input">
                                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1 required">البريد الإلكتروني</label>
                                                <input type="email" id="email" placeholder="example@domain.com" required />
                                                <div class="validation-message">يرجى إدخال بريد إلكتروني صحيح</div>
                                            </div>

                                            <div class="form-input">
                                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1 required">رقم الهاتف</label>
                                                <input type="tel" id="phone" placeholder="+1234567890" required />
                                                <div class="validation-message">يرجى إدخال رقم هاتف صحيح</div>
                                            </div>
                                        </div>

                                        <!-- اسم المستخدم وكلمة المرور -->
                                        <div class="input-group">
                                            <div class="form-input">
                                                <label for="username" class="block text-sm font-medium text-gray-700 mb-1 required">اسم المستخدم</label>
                                                <input type="text" id="username" placeholder="اختر اسم مستخدم فريد" required />
                                                <div class="validation-message">يرجى إدخال اسم مستخدم</div>
                                            </div>

                                            <div class="form-input">
                                                <label for="password" class="block text-sm font-medium text-gray-700 mb-1 required">كلمة المرور</label>
                                                <input type="password" id="password" placeholder="كلمة مرور قوية" required />
                                                <div class="validation-message">كلمة المرور يجب أن تحتوي على 8 أحرف على الأقل، أرقام ورموز</div>
                                            </div>
                                        </div>

                                        <!-- البلد -->
                                        <div class="form-input">
                                            <label for="country" class="block text-sm font-medium text-gray-700 mb-1 required">البلد</label>
                                            <select id="country" required>
                                                <option value="">اختر بلدك</option>
                                                <option value="مصر" selected>مصر</option>
                                                <option value="السعودية">السعودية</option>
                                                <option value="الإمارات">الإمارات العربية المتحدة</option>
                                                <option value="الأردن">الأردن</option>
                                                <option value="لبنان">لبنان</option>
                                                <option value="العراق">العراق</option>
                                                <option value="الجزائر">الجزائر</option>
                                                <option value="المغرب">المغرب</option>
                                                <option value="تونس">تونس</option>
                                                <option value="عمان">عمان</option>
                                                <option value="قطر">قطر</option>
                                                <option value="الكويت">الكويت</option>
                                                <option value="البحرين">البحرين</option>
                                                <option value="اليمن">اليمن</option>
                                                <option value="سوريا">سوريا</option>
                                                <option value="فلسطين">فلسطين</option>
                                                <option value="السودان">السودان</option>
                                                <option value="ليبيا">ليبيا</option>
                                                <option value="موريتانيا">موريتانيا</option>
                                                <option value="جيبوتي">جيبوتي</option>
                                                <option value="جزر القمر">جزر القمر</option>
                                                <option value="الصومال">الصومال</option>
                                            </select>
                                            <div class="validation-message">يرجى اختيار البلد</div>
                                        </div>

                                        <!-- مايكروسوفت تيمز -->
                                        <div class="form-input">
                                            <label for="teams" class="block text-sm font-medium text-gray-700 mb-1">مايكروسوفت تيمز (اختياري)</label>
                                            <input type="text" id="teams" placeholder="اسم المستخدم في مايكروسوفت تيمز" />
                                        </div>

                                        <!-- الشركة -->
                                        <div class="form-input">
                                            <label for="company" class="block text-sm font-medium text-gray-700 mb-1">الشركة (اختياري)</label>
                                            <input type="text" id="company" placeholder="اسم الشركة أو المؤسسة" />
                                        </div>

                                        <!-- الموقع الإلكتروني -->
                                        <div class="form-input">
                                            <label for="website" class="block text-sm font-medium text-gray-700 mb-1">الموقع الإلكتروني (اختياري)</label>
                                            <input type="url" id="website" placeholder="https://example.com" />
                                            <div class="validation-message">يرجى إدخال عنوان موقع إلكتروني صحيح</div>
                                        </div>

                                        <!-- معلومات إضافية -->
                                        <div class="form-input">
                                            <label for="additionalInfo" class="block text-sm font-medium text-gray-700 mb-1">معلومات إضافية (اختياري)</label>
                                            <textarea id="additionalInfo" rows="4" placeholder="أي معلومات إضافية تود مشاركتها معنا..."></textarea>
                                        </div>

                                        <!-- الشروط والأحكام -->
                                        <div class="checkbox-container">
                                            <input type="checkbox" id="terms" required />
                                            <label for="terms" class="text-sm text-gray-700">
                                                أوافق على
                                                <span class="terms-link" id="show-terms">الشروط والأحكام</span>
                                            </label>
                                        </div>
                                        <div class="validation-message" id="terms-validation">يجب الموافقة على الشروط والأحكام للمتابعة</div>

                                        <!-- زر التسجيل -->
                                        <button type="submit" class="submit-btn" id="submit-btn">
                                            <i class="fas fa-user-plus mr-2"></i> انشاء الحساب
                                        </button>

                                        <p class="text-xs text-gray-500 text-center mt-4">
                                            * الحقول المطلوبة. سيتم مراجعة طلبك خلال 24 ساعة.
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Benefits Section -->
                    <section class="pb-20">
                        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl">
                                <!-- البطاقة الأولى -->
                                <div class="card p-6 text-center transition-all duration-300">
                                    <div class="pulse-effect"></div>
                                    <div class="icon-container flex justify-center items-center h-12 w-12 mx-auto rounded-full bg-gray-100 text-gray-600">
                                        <i class="fas fa-bolt icon-lightning"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="mt-4 font-bold text-lg text-gray-800">وصول فوري</h4>
                                        <p class="text-sm text-gray-500 mt-1">ابدأ فوراً بعد التسجيل</p>
                                    </div>
                                </div>

                                <!-- البطاقة الثانية -->
                                <div class="card p-6 text-center transition-all duration-300">
                                    <div class="pulse-effect"></div>
                                    <div class="icon-container flex justify-center items-center h-12 w-12 mx-auto rounded-full bg-gray-100 text-gray-600">
                                        <i class="fas fa-exchange-alt icon-exchange"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="mt-4 font-bold text-lg text-gray-800">معدلات تحويل عالية</h4>
                                        <p class="text-sm text-gray-500 mt-1">استراتيجيات مثبتة للنجاح</p>
                                    </div>
                                </div>

                                <!-- البطاقة الثالثة -->
                                <div class="card p-6 text-center transition-all duration-300">
                                    <div class="pulse-effect"></div>
                                    <div class="icon-container flex justify-center items-center h-12 w-12 mx-auto rounded-full bg-gray-100 text-gray-600">
                                        <i class="fas fa-shield-alt icon-shield"></i>
                                    </div>
                                    <div class="content">
                                        <h4 class="mt-4 font-bold text-lg text-gray-800">دعم متميز</h4>
                                        <p class="text-sm text-gray-500 mt-1">مساعدة مخصصة على مدار الساعة</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>

                <!-- Footer -->
                <footer class="bg-gradient-to-r from-gray-50 to-gray-100 py-8 border-t border-gray-200 relative overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="absolute -top-10 -right-10 w-32 h-32 bg-purple-200 rounded-full opacity-20 blur-xl animate-pulse-slow"></div>
                        <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-blue-200 rounded-full opacity-20 blur-xl animate-bounce-slow"></div>
                    </div>

                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
                        <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                            <div class="group">
                                <p class="text-gray-600 text-sm md:text-base transition-all duration-300 group-hover:text-gray-800">
                                    &copy;
                                    <span id="copyright-year" class="font-semibold"><?php echo date('Y'); ?></span>
                                    <span class="font-bold text-purple-600 transition-all duration-300 group-hover:text-purple-800 relative">
                                        <?php echo getSetting('site_title'); ?>
                                    </span>
                                    . جميع الحقوق محفوظة.
                                </p>
                            </div>

                            <div class="flex space-x-6 space-x-reverse">
                                <a href="https://www.twitter.com" class="text-gray-500 hover:text-purple-600 transition-colors duration-300">
                                    <i class="fab fa-twitter text-lg"></i>
                                </a>
                                <a href="https://www.facebook.com" class="text-gray-500 hover:text-purple-600 transition-colors duration-300">
                                    <i class="fab fa-facebook text-lg"></i>
                                </a>
                                <a href="https://www.instagram.com" class="text-gray-500 hover:text-purple-600 transition-colors duration-300">
                                    <i class="fab fa-instagram text-lg"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- نافذة الشروط والأحكام -->
    <div class="terms-modal" id="terms-modal">
        <div class="terms-content">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold text-gray-800">الشروط والأحكام</h3>
                <button id="close-terms" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
            </div>
            <div class="text-gray-700 space-y-4">
                <p>مرحبًا بك في منصتنا. من خلال إنشاء حساب، فإنك توافق على الالتزام بالشروط والأحكام التالية:</p>

                <h4 class="font-bold mt-4">1. الالتزام بالقوانين</h4>
                <p>يجب على المستخدم الالتزام بكافة القوانين واللوائح المحلية والدولية ذات الصلة بأنشطته على المنصة.</p>

                <h4 class="font-bold mt-4">2. المسؤولية</h4>
                <p>المستخدم هو المسؤول الوحيد عن جميع الأنشطة التي تتم through حسابه ويجب عليه الحفاظ على سرية معلومات الدخول.</p>

                <h4 class="font-bold mt-4">3. الخصوصية</h4>
                <p>نحن نحترم خصوصيتك ونلتزم بحماية بياناتك الشخصية وفقًا لسياسة الخصوصية الخاصة بنا.</p>

                <h4 class="font-bold mt-4">4. إلغاء الحساب</h4>
                <p>تحتفظ الإدارة بالحق في تعليق أو إلغاء أي حساب في حالة مخالفة الشروط والأحكام.</p>

                <p class="mt-6 text-sm">لن يتم مشاركة معلوماتك الشخصية مع أطراف ثالثة دون موافقتك الصريحة.</p>
            </div>
            <div class="mt-6 text-center">
                <button id="accept-terms" class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition">موافق</button>
            </div>
        </div>
    </div>
 <script>
        // عناصر DOM
        const form = document.getElementById("registration-form");
        const termsModal = document.getElementById("terms-modal");
        const showTermsBtn = document.getElementById("show-terms");
        const closeTermsBtn = document.getElementById("close-terms");
        const acceptTermsBtn = document.getElementById("accept-terms");
        const termsCheckbox = document.getElementById("terms");
        const submitBtn = document.getElementById("submit-btn");
        const termsValidation = document.getElementById("terms-validation");

        // تحديث سنة حقوق النشر
        document.getElementById("copyright-year").textContent = new Date().getFullYear();

        // فتح نافذة الشروط
        if (showTermsBtn) {
            showTermsBtn.addEventListener("click", (e) => {
                e.preventDefault();
                termsModal.style.display = "flex";
                document.body.style.overflow = "hidden"; // منع التمرير خلف النافذة
            });
        }

        // إغلاق نافذة الشروط
        if (closeTermsBtn) {
            closeTermsBtn.addEventListener("click", () => {
                termsModal.style.display = "none";
                document.body.style.overflow = "auto"; // إعادة التمرير
            });
        }

        // قبول الشروط
        if (acceptTermsBtn) {
            acceptTermsBtn.addEventListener("click", () => {
                termsCheckbox.checked = true;
                termsModal.style.display = "none";
                document.body.style.overflow = "auto"; // إعادة التمرير
                validateTerms();
            });
        }

        // إغلاق النافذة عند النقر خارج المحتوى
        if (termsModal) {
            termsModal.addEventListener("click", (e) => {
                if (e.target === termsModal) {
                    termsModal.style.display = "none";
                    document.body.style.overflow = "auto";
                }
            });
        }

        // التحقق من صحة البريد الإلكتروني
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        // التحقق من قوة كلمة المرور
        function validatePassword(password) {
            // 8 أحرف على الأقل، تحتوي على أرقام وحروف
            const re = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{8,}$/;
            return re.test(password);
        }

        // التحقق من صحة الموقع الإلكتروني
        function validateWebsite(website) {
            if (!website) return true; // اختياري
            const re = /^(https?:\/\/)?([\da-z.-]+)\.([a-z.]{2,6})([/\w .-]*)*\/?$/;
            return re.test(website);
        }

        // التحقق من الشروط
        function validateTerms() {
            if (termsCheckbox.checked) {
                if (termsValidation) termsValidation.style.display = "none";
                return true;
            } else {
                if (termsValidation) termsValidation.style.display = "block";
                return false;
            }
        }

        // التحقق من الحقول الإلزامية
        function validateRequiredFields() {
            let isValid = true;
            const requiredInputs = form.querySelectorAll("input[required], select[required]");

            requiredInputs.forEach((input) => {
                const formInput = input.closest(".form-input");

                // إعادة تعيين حالة الحقل أولاً
                if (formInput) {
                    formInput.classList.remove("invalid", "valid");

                    // إذا كان الحقل فارغًا
                    if (!input.value.trim()) {
                        formInput.classList.add("invalid");
                        isValid = false;
                    } else {
                        // إذا كان الحقل مملوءًا، تحقق من صحته
                        let fieldValid = true;

                        if (input.type === "email" && !validateEmail(input.value)) {
                            fieldValid = false;
                        } else if (input.id === "password" && !validatePassword(input.value)) {
                            fieldValid = false;
                        } else if (input.id === "website" && input.value && !validateWebsite(input.value)) {
                            fieldValid = false;
                        }

                        if (fieldValid) {
                            formInput.classList.add("valid");
                        } else {
                            formInput.classList.add("invalid");
                            isValid = false;
                        }
                    }
                }
            });

            return isValid && validateTerms();
        }

        // التحقق أثناء الكتابة
        if (form) {
            form.querySelectorAll("input, select, textarea").forEach((element) => {
                element.addEventListener("input", () => {
                    const formInput = element.closest(".form-input");

                    if (formInput) {
                        // إعادة تعيين حالة الحقل أولاً
                        formInput.classList.remove("invalid", "valid");

                        // إذا كان الحقل مطلوبًا أو به قيمة
                        if (element.hasAttribute("required") || element.value.trim()) {
                            let isValid = true;

                            if (element.value.trim()) {
                                if (element.type === "email" && !validateEmail(element.value)) {
                                    isValid = false;
                                } else if (element.id === "password" && !validatePassword(element.value)) {
                                    isValid = false;
                                } else if (element.id === "website" && element.value && !validateWebsite(element.value)) {
                                    isValid = false;
                                }
                            } else if (element.hasAttribute("required")) {
                                isValid = false;
                            }

                            if (isValid && element.value.trim()) {
                                formInput.classList.add("valid");
                            } else if (element.hasAttribute("required") && !element.value.trim()) {
                                formInput.classList.add("invalid");
                            }
                        }
                    }
                });
            });

            // إضافة مستمعي الأحداث للنموذج
            form.addEventListener("submit", (e) => {
                e.preventDefault();

                if (validateRequiredFields()) {
                    // عرض رسالة نجاح
                    if (submitBtn) {
                        submitBtn.innerHTML = '<i class="fas fa-check mr-2"></i> تم إنشاء الحساب بنجاح!';
                        submitBtn.style.background = "linear-gradient(135deg, #10b981, #34d399)";
                        submitBtn.disabled = true;
                    }

                    // هنا يمكنك إضافة كود إرسال النموذج إلى الخادم
                    console.log("تم إرسال النموذج بنجاح!");
                    
                    // إعادة تعيين النموذج بعد 3 ثواني
                    setTimeout(() => {
                        form.reset();
                        if (submitBtn) {
                            submitBtn.innerHTML = '<i class="fas fa-user-plus mr-2"></i> انشاء الحساب';
                            submitBtn.style.background = "";
                            submitBtn.disabled = false;
                        }
                    }, 3000);
                } else {
                    // عرض رسالة خطأ إذا لم تكن الحقول صحيحة
                    alert("يرجى ملء جميع الحقول المطلوبة بشكل صحيح");
                }
            });
        }

        // التحقق من الشروط عند التغيير
        if (termsCheckbox) {
            termsCheckbox.addEventListener("change", validateTerms);
        }

        // تأثيرات إضافية عند تحميل الصفحة
        window.addEventListener("load", function () {
            document.querySelectorAll(".fade-in").forEach((element, index) => {
                setTimeout(() => {
                    element.style.opacity = "1";
                }, 300 + index * 100);
            });
        });
    </script>
</body>
</html>