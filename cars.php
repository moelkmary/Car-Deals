<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// تضمين ملف الاتصال بقاعدة البيانات
include 'db_connect.php';

// بدء الجلسة
session_start();

// استعلام قاعدة البيانات للحصول على السيارات
$query = "SELECT c.*, b.name as brand_name FROM cars c 
          LEFT JOIN brands b ON c.brand_id = b.id 
          WHERE c.status = 'active'";
$params = array();

// إضافة فلاتر البحث
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $query .= " AND (c.title LIKE ? OR c.description LIKE ?)";
    $searchTerm = "%" . $_GET['search'] . "%";
    $params[] = $searchTerm;
    $params[] = $searchTerm;
}

if (isset($_GET['make']) && !empty($_GET['make'])) {
    $query .= " AND b.name = ?";
    $params[] = $_GET['make'];
}

if (isset($_GET['model']) && !empty($_GET['model'])) {
    $query .= " AND c.model = ?";
    $params[] = $_GET['model'];
}

if (isset($_GET['year_from']) && !empty($_GET['year_from'])) {
    $query .= " AND c.year >= ?";
    $params[] = $_GET['year_from'];
}

if (isset($_GET['year_to']) && !empty($_GET['year_to'])) {
    $query .= " AND c.year <= ?";
    $params[] = $_GET['year_to'];
}

if (isset($_GET['price_from']) && !empty($_GET['price_from'])) {
    $query .= " AND c.price >= ?";
    $params[] = $_GET['price_from'];
}

if (isset($_GET['price_to']) && !empty($_GET['price_to'])) {
    $query .= " AND c.price <= ?";
    $params[] = $_GET['price_to'];
}

if (isset($_GET['condition']) && !empty($_GET['condition'])) {
    $query .= " AND c.condition = ?";
    $params[] = $_GET['condition'];
}

// إزالة الفلتر على c.category لأنه غير موجود في الجدول
// if (isset($_GET['category']) && !empty($_GET['category'])) {
//     $query .= " AND c.category = ?";
//     $params[] = $_GET['category'];
// }

if (isset($_GET['transmission']) && !empty($_GET['transmission'])) {
    $query .= " AND c.transmission = ?";
    $params[] = $_GET['transmission'];
}

if (isset($_GET['fuel_type']) && !empty($_GET['fuel_type'])) {
    $query .= " AND c.fuel_type = ?";
    $params[] = $_GET['fuel_type'];
}

if (isset($_GET['location']) && !empty($_GET['location'])) {
    $query .= " AND c.location = ?";
    $params[] = $_GET['location'];
}

// الترتيب
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'newest';

switch ($sort) {
    case 'price_asc':
        $query .= " ORDER BY c.price ASC";
        break;
    case 'price_desc':
        $query .= " ORDER BY c.price DESC";
        break;
    case 'year_desc':
        $query .= " ORDER BY c.year DESC";
        break;
    case 'newest':
    default:
        $query .= " ORDER BY c.created_at DESC";
        break;
}

try {
    $stmt = $conn->prepare($query);
    $stmt->execute($params);
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "<div class='alert alert-danger'>خطأ في تنفيذ الاستعلام: " . $e->getMessage() . "</div>";
    $cars = array();
}

// إضافة سيارات وهمية للاختبار
$dummyCars = [
    // سيارات الدفع الرباعي (SUV)
    [
        'id' => 'dummy1',
        'title' => 'تويوتا لاند كروزر VXR 2023',
        'price' => 28500,
        'year' => 2023,
        'mileage' => 15000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'تويوتا',
        'category' => 'SUV',
        'fuel_type' => 'بنزين',
        'color' => 'أبيض لؤلؤي',
        'location' => 'مسقط',
        'image' => 'landcruiser.jpg'
    ],
    [
        'id' => 'dummy2',
        'title' => 'نيسان باترول تيتانيوم 2022',
        'price' => 26000,
        'year' => 2022,
        'mileage' => 28000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'نيسان',
        'category' => 'SUV',
        'fuel_type' => 'بنزين',
        'color' => 'أسود',
        'location' => 'صلالة',
        'image' => 'patrol.jpg'
    ],
    [
        'id' => 'dummy3',
        'title' => 'لكزس LX570 بلاك إديشن 2021',
        'price' => 32000,
        'year' => 2021,
        'mileage' => 35000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'لكزس',
        'category' => 'SUV',
        'fuel_type' => 'بنزين',
        'color' => 'أسود',
        'location' => 'مسقط',
        'image' => 'lexus_lx.jpg'
    ],
    [
        'id' => 'dummy4',
        'title' => 'رينج روفر سبورت HSE 2023',
        'price' => 38000,
        'year' => 2023,
        'mileage' => 12000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'لاند روفر',
        'category' => 'SUV',
        'fuel_type' => 'بنزين',
        'color' => 'رمادي',
        'location' => 'مسقط',
        'image' => 'range_rover.jpg'
    ],
    
    // سيارات سيدان
    [
        'id' => 'dummy5',
        'title' => 'تويوتا كامري Grande 2023',
        'price' => 12500,
        'year' => 2023,
        'mileage' => 18000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'تويوتا',
        'category' => 'سيدان',
        'fuel_type' => 'بنزين',
        'color' => 'أبيض',
        'location' => 'صحار',
        'image' => 'camry.jpg'
    ],
    [
        'id' => 'dummy6',
        'title' => 'هوندا أكورد تورينج 2022',
        'price' => 11800,
        'year' => 2022,
        'mileage' => 25000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'هوندا',
        'category' => 'سيدان',
        'fuel_type' => 'بنزين',
        'color' => 'أزرق',
        'location' => 'مسقط',
        'image' => 'accord.jpg'
    ],
    [
        'id' => 'dummy7',
        'title' => 'مرسيدس E300 AMG 2023',
        'price' => 24500,
        'year' => 2023,
        'mileage' => 10000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'مرسيدس',
        'category' => 'سيدان',
        'fuel_type' => 'بنزين',
        'color' => 'أسود',
        'location' => 'مسقط',
        'image' => 'mercedes_e.jpg'
    ],
    
    // سيارات رياضية
    [
        'id' => 'dummy8',
        'title' => 'بورش 911 كاريرا 2022',
        'price' => 48000,
        'year' => 2022,
        'mileage' => 8000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'بورش',
        'category' => 'رياضية',
        'fuel_type' => 'بنزين',
        'color' => 'أحمر',
        'location' => 'مسقط',
        'image' => 'porsche_911.jpg'
    ],
    [
        'id' => 'dummy9',
        'title' => 'شيفروليه كورفيت C8 2023',
        'price' => 45000,
        'year' => 2023,
        'mileage' => 5000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'شيفروليه',
        'category' => 'رياضية',
        'fuel_type' => 'بنزين',
        'color' => 'أصفر',
        'location' => 'مسقط',
        'image' => 'corvette.jpg'
    ],
    
    // سيارات عائلية
    [
        'id' => 'dummy10',
        'title' => 'كيا كارنفال 2023',
        'price' => 14500,
        'year' => 2023,
        'mileage' => 12000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'كيا',
        'category' => 'عائلية',
        'fuel_type' => 'بنزين',
        'color' => 'فضي',
        'location' => 'مسقط',
        'image' => 'carnival.jpg'
    ],
    [
        'id' => 'dummy11',
        'title' => 'تويوتا بريفيا 2022',
        'price' => 13800,
        'year' => 2022,
        'mileage' => 20000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'تويوتا',
        'category' => 'عائلية',
        'fuel_type' => 'بنزين',
        'color' => 'أبيض',
        'location' => 'صلالة',
        'image' => 'previa.jpg'
    ],
    
    // بيك أب
    [
        'id' => 'dummy12',
        'title' => 'تويوتا هايلكس 2023 دبل كابينة',
        'price' => 15500,
        'year' => 2023,
        'mileage' => 10000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'تويوتا',
        'category' => 'بيك أب',
        'fuel_type' => 'ديزل',
        'color' => 'أبيض',
        'location' => 'صحار',
        'image' => 'hilux.jpg'
    ],
    [
        'id' => 'dummy13',
        'title' => 'نيسان نافارا 2022',
        'price' => 13800,
        'year' => 2022,
        'mileage' => 25000,
        'transmission' => 'أوتوماتيك',
        'condition' => 'used',
        'brand_name' => 'نيسان',
        'category' => 'بيك أب',
        'fuel_type' => 'ديزل',
        'color' => 'رمادي',
        'location' => 'صلالة',
        'image' => 'navara.jpg'
    ],
    
    // سيارات جديدة
    [
        'id' => 'dummy14',
        'title' => 'هيونداي توسان 2024',
        'price' => 10500,
        'year' => 2024,
        'mileage' => 0,
        'transmission' => 'أوتوماتيك',
        'condition' => 'new',
        'brand_name' => 'هيونداي',
        'category' => 'كروس أوفر',
        'fuel_type' => 'بنزين',
        'color' => 'أزرق',
        'location' => 'مسقط',
        'image' => 'tucson.jpg'
    ],
    [
        'id' => 'dummy15',
        'title' => 'كيا سورينتو 2024',
        'price' => 12800,
        'year' => 2024,
        'mileage' => 0,
        'transmission' => 'أوتوماتيك',
        'condition' => 'new',
        'brand_name' => 'كيا',
        'category' => 'كروس أوفر',
        'fuel_type' => 'بنزين',
        'color' => 'أحمر',
        'location' => 'مسقط',
        'image' => 'sorento.jpg'
    ],
    [
        'id' => 'dummy16',
        'title' => 'نيسان التيما 2024',
        'price' => 11200,
        'year' => 2024,
        'mileage' => 0,
        'transmission' => 'أوتوماتيك',
        'condition' => 'new',
        'brand_name' => 'نيسان',
        'category' => 'سيدان',
        'fuel_type' => 'بنزين',
        'color' => 'أبيض',
        'location' => 'مسقط',
        'image' => 'altima.jpg'
    ]
];

// أضف السيارات الوهمية إلى النتائج
$cars = array_merge($cars, $dummyCars);

// جلب قائمة الشركات المصنعة
try {
    $brands_query = "SELECT id, name FROM brands ORDER BY name";
    $brands_stmt = $conn->query($brands_query);
    $brands = $brands_stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $brands = array();
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تصفح السيارات - سوق السيارات العماني</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Google Fonts - Tajawal -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header Section -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="#">سوق السيارات العماني</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="cars.php">السيارات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="add-car.php">أضف سيارتك</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">اتصل بنا</a>
                        </li>
                    </ul>
                    <div class="d-flex">
                        <a href="login.php" class="btn btn-outline-light me-2">تسجيل الدخول</a>
                        <a href="register.php" class="btn btn-light">إنشاء حساب</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Page Title -->
    <section class="bg-light py-4">
        <div class="container">
            <h1 class="mb-0">تصفح السيارات</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
                    <li class="breadcrumb-item active" aria-current="page">السيارات</li>
                </ol>
            </nav>
        </div>
    </section>

    <!-- Car Listing Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Filter Sidebar -->
                <div class="col-lg-3 mb-4">
                    <div class="filter-sidebar">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="fas fa-filter ml-2"></i> البحث والتصفية</h5>
                        </div>
                        <div class="card-body">
                            <!-- إضافة فلاتر نشطة -->
                            <?php
                            $activeFilters = false;
                            if(isset($_GET['search']) && !empty($_GET['search']) || 
                               isset($_GET['make']) && !empty($_GET['make']) || 
                               isset($_GET['model']) && !empty($_GET['model']) || 
                               isset($_GET['category']) && !empty($_GET['category']) || 
                               isset($_GET['transmission']) && !empty($_GET['transmission']) || 
                               isset($_GET['fuel_type']) && !empty($_GET['fuel_type']) || 
                               isset($_GET['location']) && !empty($_GET['location']) || 
                               isset($_GET['year_from']) && !empty($_GET['year_from']) || 
                               isset($_GET['year_to']) && !empty($_GET['year_to']) || 
                               isset($_GET['price_from']) && !empty($_GET['price_from']) || 
                               isset($_GET['price_to']) && !empty($_GET['price_to']) || 
                               isset($_GET['condition']) && !empty($_GET['condition'])) {
                                $activeFilters = true;
                            }
                            ?>
                            
                            <?php if($activeFilters): ?>
                            <div class="active-filters mb-3">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <p class="mb-0 fw-bold">الفلاتر النشطة:</p>
                                    <a href="cars.php" class="clear-all-filters"><i class="fas fa-times-circle"></i> مسح الكل</a>
                                </div>
                                
                                <?php if(isset($_GET['search']) && !empty($_GET['search'])): ?>
                                <div class="filter-tag">
                                    بحث: <?php echo htmlspecialchars($_GET['search']); ?>
                                </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_GET['make']) && !empty($_GET['make'])): ?>
                                <div class="filter-tag">
                                    الشركة: <?php echo htmlspecialchars($_GET['make']); ?>
                                </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_GET['model']) && !empty($_GET['model'])): ?>
                                <div class="filter-tag">
                                    الموديل: <?php echo htmlspecialchars($_GET['model']); ?>
                                </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_GET['category']) && !empty($_GET['category'])): ?>
                                <div class="filter-tag">
                                    الفئة: <?php echo htmlspecialchars($_GET['category']); ?>
                                </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_GET['transmission']) && !empty($_GET['transmission'])): ?>
                                <div class="filter-tag">
                                    ناقل الحركة: <?php echo htmlspecialchars($_GET['transmission']); ?>
                                </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_GET['fuel_type']) && !empty($_GET['fuel_type'])): ?>
                                <div class="filter-tag">
                                    نوع الوقود: <?php echo htmlspecialchars($_GET['fuel_type']); ?>
                                </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_GET['location']) && !empty($_GET['location'])): ?>
                                <div class="filter-tag">
                                    الموقع: <?php echo htmlspecialchars($_GET['location']); ?>
                                </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_GET['year_from']) && !empty($_GET['year_from'])): ?>
                                <div class="filter-tag">
                                    السنة من: <?php echo htmlspecialchars($_GET['year_from']); ?>
                                </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_GET['year_to']) && !empty($_GET['year_to'])): ?>
                                <div class="filter-tag">
                                    السنة إلى: <?php echo htmlspecialchars($_GET['year_to']); ?>
                                </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_GET['price_from']) && !empty($_GET['price_from'])): ?>
                                <div class="filter-tag">
                                    السعر من: <?php echo htmlspecialchars($_GET['price_from']); ?> ريال
                                </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_GET['price_to']) && !empty($_GET['price_to'])): ?>
                                <div class="filter-tag">
                                    السعر إلى: <?php echo htmlspecialchars($_GET['price_to']); ?> ريال
                                </div>
                                <?php endif; ?>
                                
                                <?php if(isset($_GET['condition']) && !empty($_GET['condition'])): ?>
                                <div class="filter-tag">
                                    الحالة: <?php echo $_GET['condition'] == 'new' ? 'جديدة' : 'مستعملة'; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            
                            <form class="car-filter-form" method="GET" action="cars.php">
                                <!-- البحث السريع -->
                                <div class="mb-3">
                                    <label class="form-label">البحث السريع</label>
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="ابحث عن سيارة..." value="<?php echo htmlspecialchars($_GET['search'] ?? ''); ?>">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <!-- فلاتر شائعة -->
                                <div class="popular-filters mb-3">
                                    <div class="title">فلاتر شائعة:</div>
                                    <div class="btn-group">
                                        <a href="?category=SUV" class="btn <?php echo (isset($_GET['category']) && $_GET['category'] == 'SUV') ? 'active' : ''; ?>">دفع رباعي</a>
                                        <a href="?condition=new" class="btn <?php echo (isset($_GET['condition']) && $_GET['condition'] == 'new') ? 'active' : ''; ?>">جديدة</a>
                                        <a href="?fuel_type=هجين" class="btn <?php echo (isset($_GET['fuel_type']) && $_GET['fuel_type'] == 'هجين') ? 'active' : ''; ?>">هجين</a>
                                        <a href="?make=تويوتا" class="btn <?php echo (isset($_GET['make']) && $_GET['make'] == 'تويوتا') ? 'active' : ''; ?>">تويوتا</a>
                                    </div>
                                </div>
                                
                                <!-- الفلاتر الرئيسية -->
                                <div class="mb-3">
                                    <label class="form-label">الشركة المصنعة</label>
                                    <select name="make" class="form-select" id="search-make" onchange="updateSearchModels()">
                                        <option value="">اختر الشركة</option>
                                        <?php
                                        $brands = ['تويوتا', 'نيسان', 'لكزس', 'هوندا', 'ميتسوبيشي', 'مازدا',
                                                'هيونداي', 'كيا', 'مرسيدس', 'بي إم دبليو', 'أودي', 'فولكس واجن',
                                                'لاند روفر', 'جيب', 'شيفروليه', 'فورد', 'جي إم سي', 'إنفينيتي', 'بورش'];
                                        
                                        foreach ($brands as $brand) {
                                            $selected = isset($_GET['make']) && $_GET['make'] == $brand ? 'selected' : '';
                                            echo "<option value=\"$brand\" $selected>$brand</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">الموديل</label>
                                    <select name="model" class="form-select" id="search-model">
                                        <option value="">اختر الموديل</option>
                                        <!-- سيتم تحديث هذه القائمة عبر JavaScript -->
                                    </select>
                                </div>

                                <!-- إضافة فلتر فئة السيارة -->
                                <div class="mb-3">
                                    <label class="form-label">فئة السيارة</label>
                                    <select name="category" class="form-select">
                                        <option value="">كل الفئات</option>
                                        <?php
                                        $categories = ['سيدان', 'SUV', 'كروس أوفر', 'هاتشباك', 'كوبيه',
                                                    'مكشوفة', 'بيك أب', 'فان', 'ميني فان', 'رياضية', 'فاخرة', 'عائلية'];
                                        
                                        foreach ($categories as $category) {
                                            $selected = isset($_GET['category']) && $_GET['category'] == $category ? 'selected' : '';
                                            echo "<option value=\"$category\" $selected>$category</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">ناقل الحركة</label>
                                    <select name="transmission" class="form-select">
                                        <option value="">الكل</option>
                                        <?php
                                        $transmissions = ['أوتوماتيك', 'يدوي', 'CVT', 'DCT'];
                                        
                                        foreach ($transmissions as $transmission) {
                                            $selected = isset($_GET['transmission']) && $_GET['transmission'] == $transmission ? 'selected' : '';
                                            echo "<option value=\"$transmission\" $selected>$transmission</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">نوع الوقود</label>
                                    <select name="fuel_type" class="form-select">
                                        <option value="">الكل</option>
                                        <?php
                                        $fuelTypes = ['بنزين', 'ديزل', 'هجين', 'كهربائي'];
                                        
                                        foreach ($fuelTypes as $fuel) {
                                            $selected = isset($_GET['fuel_type']) && $_GET['fuel_type'] == $fuel ? 'selected' : '';
                                            echo "<option value=\"$fuel\" $selected>$fuel</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">الموقع</label>
                                    <select name="location" class="form-select">
                                        <option value="">كل المواقع</option>
                                        <?php
                                        $locations = ['مسقط', 'صلالة', 'صحار', 'نزوى', 'صور', 'البريمي', 'عبري',
                                                  'الرستاق', 'بركاء', 'خصب', 'مسندم', 'الدقم', 'الخوير', 'السيب', 'المعبيلة', 'القرم'];
                                        
                                        foreach ($locations as $location) {
                                            $selected = isset($_GET['location']) && $_GET['location'] == $location ? 'selected' : '';
                                            echo "<option value=\"$location\" $selected>$location</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">السعر</label>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <input type="number" name="price_from" class="form-control" placeholder="من" value="<?php echo htmlspecialchars($_GET['price_from'] ?? ''); ?>">
                                        </div>
                                        <div class="col-6">
                                            <input type="number" name="price_to" class="form-control" placeholder="إلى" value="<?php echo htmlspecialchars($_GET['price_to'] ?? ''); ?>">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">سنة الصنع</label>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <select name="year_from" class="form-select">
                                                <option value="">من</option>
                                                <?php for($i = date('Y'); $i >= 2000; $i--): 
                                                    $selected = isset($_GET['year_from']) && $_GET['year_from'] == $i ? 'selected' : '';
                                                ?>
                                                    <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                        <div class="col-6">
                                            <select name="year_to" class="form-select">
                                                <option value="">إلى</option>
                                                <?php for($i = date('Y'); $i >= 2000; $i--): 
                                                    $selected = isset($_GET['year_to']) && $_GET['year_to'] == $i ? 'selected' : '';
                                                ?>
                                                    <option value="<?php echo $i; ?>" <?php echo $selected; ?>><?php echo $i; ?></option>
                                                <?php endfor; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">حالة السيارة</label>
                                    <select name="condition" class="form-select">
                                        <option value="">كل الحالات</option>
                                        <option value="new" <?php echo (isset($_GET['condition']) && $_GET['condition'] == 'new') ? 'selected' : ''; ?>>جديدة</option>
                                        <option value="used" <?php echo (isset($_GET['condition']) && $_GET['condition'] == 'used') ? 'selected' : ''; ?>>مستعملة</option>
                                    </select>
                                </div>
                                
                                <div class="filter-buttons">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search ml-2"></i> بحث</button>
                                    <button type="reset" class="btn btn-outline-secondary" onclick="window.location='cars.php'"><i class="fas fa-redo ml-2"></i> إعادة تعيين</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <!-- Car Listings -->
                <div class="col-lg-9">
                    <div class="results-header">
                        <h3 class="results-count">تم العثور على <?php echo count($cars); ?> سيارة</h3>
                        <form class="d-flex align-items-center">
                            <!-- الحفاظ على معايير الفلترة الحالية في النموذج -->
                            <?php foreach($_GET as $key => $value): ?>
                                <?php if($key != 'sort' && !empty($value)): ?>
                                <input type="hidden" name="<?php echo htmlspecialchars($key); ?>" value="<?php echo htmlspecialchars($value); ?>">
                                <?php endif; ?>
                            <?php endforeach; ?>
                            
                            <label class="me-2 mb-0">ترتيب حسب:</label>
                            <select class="form-select sort-select" name="sort" onchange="this.form.submit()">
                                <option value="newest" <?php echo ($_GET['sort'] ?? '') == 'newest' ? 'selected' : ''; ?>>الأحدث</option>
                                <option value="price_asc" <?php echo ($_GET['sort'] ?? '') == 'price_asc' ? 'selected' : ''; ?>>السعر: من الأقل إلى الأعلى</option>
                                <option value="price_desc" <?php echo ($_GET['sort'] ?? '') == 'price_desc' ? 'selected' : ''; ?>>السعر: من الأعلى إلى الأقل</option>
                                <option value="year_desc" <?php echo ($_GET['sort'] ?? '') == 'year_desc' ? 'selected' : ''; ?>>سنة الصنع: الأحدث</option>
                            </select>
                        </form>
                    </div>
                    
                    <?php if (empty($cars)): ?>
                        <div class="alert alert-info">
                            لم يتم العثور على سيارات تطابق معايير البحث
                        </div>
                    <?php else: ?>
                        <div class="row g-4">
                            <?php foreach($cars as $car): ?>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card car-card h-100">
                                        <?php
                                        // التحقق من مسار الصورة
                                        $imagePath = !empty($car['image']) ? 'uploads/cars/' . $car['image'] : 'images/default-car.jpg';
                                        $absolutePath = __DIR__ . '/' . $imagePath;
                                        
                                        if (!file_exists($absolutePath)) {
                                            $imagePath = 'images/default-car.jpg';
                                        }
                                        
                                        // إضافة شارة للسيارات الجديدة
                                        if (isset($car['condition']) && $car['condition'] == 'new') {
                                            echo '<span class="featured-car-badge">جديدة</span>';
                                        }
                                        ?>
                                        <div class="position-relative overflow-hidden">
                                            <img src="<?php echo htmlspecialchars($imagePath); ?>" 
                                                class="card-img-top img-fluid" 
                                                alt="<?php echo htmlspecialchars($car['title']); ?>"
                                                style="height: 200px; object-fit: cover;">
                                            <div class="image-overlay">
                                                <button class="btn btn-primary btn-sm">عرض التفاصيل</button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title"><?php echo htmlspecialchars($car['title']); ?></h5>
                                            <p class="card-text fw-bold text-primary">
                                                <?php 
                                                echo isset($car['price']) ? number_format((float)$car['price']) : 'غير محدد'; 
                                                ?> ر.ع
                                            </p>
                                            <div class="specs-list">
                                                <?php if (isset($car['brand_name']) && !empty($car['brand_name'])): ?>
                                                <span class="spec-badge">
                                                    <i class="fas fa-car"></i> <?php echo htmlspecialchars($car['brand_name']); ?>
                                                </span>
                                                <?php endif; ?>
                                                <span class="spec-badge">
                                                    <i class="fas fa-calendar-alt"></i> <?php echo $car['year']; ?>
                                                </span>
                                                <span class="spec-badge">
                                                    <i class="fas fa-road"></i> <?php echo isset($car['mileage']) ? number_format((float)$car['mileage']) : '0'; ?> كم
                                                </span>
                                                <?php if (isset($car['transmission']) && !empty($car['transmission'])): ?>
                                                <span class="spec-badge">
                                                    <i class="fas fa-cog"></i> <?php echo $car['transmission']; ?>
                                                </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="card-footer bg-white">
                                            <a href="car-details.php?id=<?php echo isset($car['id']) ? $car['id'] : '#'; ?>" class="btn btn-outline-primary w-100">عرض التفاصيل</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>سوق السيارات العماني</h5>
                    <p>المنصة الأولى لبيع وشراء السيارات المستعملة في سلطنة عمان. نوفر تجربة سهلة وآمنة للبائعين والمشترين.</p>
                    <div class="social-icons">
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-2 mb-4 mb-md-0">
                    <h5>روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="index.php" class="text-white text-decoration-none">الرئيسية</a></li>
                        <li class="mb-2"><a href="cars.php" class="text-white text-decoration-none">تصفح السيارات</a></li>
                        <li class="mb-2"><a href="add-car.php" class="text-white text-decoration-none">أضف سيارتك</a></li>
                        <li class="mb-2"><a href="contact.php" class="text-white text-decoration-none">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <h5>الصفحات</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">عن الموقع</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">الشروط والأحكام</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">سياسة الخصوصية</a></li>
                        <li class="mb-2"><a href="#" class="text-white text-decoration-none">الأسئلة الشائعة</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5>تواصل معنا</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> مسقط، سلطنة عمان</li>
                        <li class="mb-2"><i class="fas fa-phone-alt me-2"></i> +968 9876 5432</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@omancars.com</li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4 mb-4 bg-secondary">
            <div class="text-center">
                <p class="mb-0"> 2025 سوق السيارات العماني. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/main.js"></script>
    <script>
        function updateSearchModels() {
            const makeSelect = document.getElementById('search-make');
            const modelSelect = document.getElementById('search-model');
            
            // إزالة جميع الخيارات الحالية
            modelSelect.innerHTML = '<option value="">اختر الموديل</option>';
            
            // إضافة الموديلات حسب الشركة المصنعة المختارة
            if (makeSelect.value === 'هيونداي') {
                const hyundaiModels = [
                    {value: 'الينترا SE', text: 'الينترا SE'},
                    {value: 'الينترا SEL', text: 'الينترا SEL'},
                    {value: 'سوناتا', text: 'سوناتا'},
                    {value: 'توسان', text: 'توسان'},
                    {value: 'سانتا في', text: 'سانتا في'},
                    {value: 'كونا', text: 'كونا'},
                    {value: 'أكسنت', text: 'أكسنت'},
                    {value: 'باليسيد', text: 'باليسيد'},
                    {value: 'أيونيك', text: 'أيونيك'},
                    {value: 'فيلوستر', text: 'فيلوستر'}
                ];
                
                hyundaiModels.forEach(model => {
                    const option = document.createElement('option');
                    option.value = model.value;
                    option.textContent = model.text;
                    modelSelect.appendChild(option);
                });
            } else if (makeSelect.value === 'تويوتا') {
                const toyotaModels = [
                    {value: 'كامري', text: 'كامري'},
                    {value: 'كورولا', text: 'كورولا'},
                    {value: 'لاند كروزر', text: 'لاند كروزر'},
                    {value: 'راف فور', text: 'راف فور'},
                    {value: 'فورتشنر', text: 'فورتشنر'},
                    {value: 'هايلكس', text: 'هايلكس'},
                    {value: 'برادو', text: 'برادو'},
                    {value: 'أفالون', text: 'أفالون'},
                    {value: 'يارس', text: 'يارس'}
                ];
                
                toyotaModels.forEach(model => {
                    const option = document.createElement('option');
                    option.value = model.value;
                    option.textContent = model.text;
                    modelSelect.appendChild(option);
                });
            } else if (makeSelect.value === 'نيسان') {
                const nissanModels = [
                    {value: 'التيما', text: 'التيما'},
                    {value: 'باترول', text: 'باترول'},
                    {value: 'صني', text: 'صني'},
                    {value: 'إكس تريل', text: 'إكس تريل'},
                    {value: 'باثفايندر', text: 'باثفايندر'},
                    {value: 'كيكس', text: 'كيكس'},
                    {value: 'ماكسيما', text: 'ماكسيما'},
                    {value: 'نافارا', text: 'نافارا'}
                ];
                
                nissanModels.forEach(model => {
                    const option = document.createElement('option');
                    option.value = model.value;
                    option.textContent = model.text;
                    modelSelect.appendChild(option);
                });
            } else if (makeSelect.value === 'كيا') {
                const kiaModels = [
                    {value: 'سبورتاج', text: 'سبورتاج'},
                    {value: 'سورينتو', text: 'سورينتو'},
                    {value: 'K5', text: 'K5'},
                    {value: 'سيراتو', text: 'سيراتو'},
                    {value: 'ريو', text: 'ريو'},
                    {value: 'سيلتوس', text: 'سيلتوس'},
                    {value: 'كرنفال', text: 'كرنفال'},
                    {value: 'تيلورايد', text: 'تيلورايد'},
                    {value: 'سول', text: 'سول'},
                    {value: 'فورتي', text: 'فورتي'},
                    {value: 'ستينجر', text: 'ستينجر'},
                    {value: 'نيرو', text: 'نيرو'},
                    {value: 'EV6', text: 'EV6'},
                    {value: 'بيكانتو', text: 'بيكانتو'}
                ];
                
                kiaModels.forEach(model => {
                    const option = document.createElement('option');
                    option.value = model.value;
                    option.textContent = model.text;
                    modelSelect.appendChild(option);
                });
            }
            // يمكن إضافة المزيد من الشركات والموديلات هنا
        }
    </script>
</body>
</html>