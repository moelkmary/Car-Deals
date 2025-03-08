<?php
// اتصال بقاعدة البيانات (نموذج فقط)
// $conn = mysqli_connect("localhost", "username", "password", "car_database");

// التحقق من عملية الإرسال
$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // في الحالة العملية، هنا سنقوم بإدخال البيانات لقاعدة البيانات
    // نموذج بسيط للتوضيح فقط
    $success = true;
}
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة سيارة - سوق السيارات المستعملة عمان</title>
    <!-- استخدام CDN لـ Bootstrap RTL -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- إضافة خط Tajawal من Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
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
                            <a class="nav-link" href="cars.php">السيارات</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="add-car.php">أضف سيارتك</a>
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

    <!-- Page Header -->
    <section class="bg-primary text-white py-4">
        <div class="container">
            <h1 class="mb-0">أضف سيارتك للبيع</h1>
        </div>
    </section>

    <!-- Add Car Form Section -->
    <section class="py-5">
        <div class="container">
            <?php if ($success): ?>
                <div class="alert alert-success mb-4">
                    <i class="fas fa-check-circle me-2"></i> تم إضافة سيارتك بنجاح! ستتم مراجعتها ونشرها قريبًا.
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div class="alert alert-danger mb-4">
                    <i class="fas fa-exclamation-circle me-2"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-lg-8">
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <h4 class="card-title mb-4">معلومات السيارة</h4>
                            <form action="add-car.php" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
                                <div class="row g-3">
                                    <!-- معلومات السيارة الأساسية -->
                                    <div class="col-md-6">
                                        <label for="make" class="form-label">الشركة المصنعة*</label>
                                        <select class="form-select" id="make" name="make" required onchange="updateModels()">
                                            <option value="">اختر الشركة</option>
                                            <option value="toyota">تويوتا</option>
                                            <option value="nissan">نيسان</option>
                                            <option value="lexus">لكزس</option>
                                            <option value="honda">هوندا</option>
                                            <option value="mitsubishi">ميتسوبيشي</option>
                                            <option value="mazda">مازدا</option>
                                            <option value="hyundai">هيونداي</option>
                                            <option value="kia">كيا</option>
                                            <option value="mercedes">مرسيدس</option>
                                            <option value="bmw">بي إم دبليو</option>
                                            <option value="audi">أودي</option>
                                            <option value="volkswagen">فولكس واجن</option>
                                            <option value="land_rover">لاند روفر</option>
                                            <option value="jeep">جيب</option>
                                            <option value="chevrolet">شيفروليه</option>
                                            <option value="ford">فورد</option>
                                            <option value="gmc">جي إم سي</option>
                                            <option value="dodge">دودج</option>
                                            <option value="cadillac">كاديلاك</option>
                                            <option value="infiniti">إنفينيتي</option>
                                            <option value="porsche">بورش</option>
                                            <option value="jaguar">جاكوار</option>
                                            <option value="volvo">فولفو</option>
                                            <option value="subaru">سوبارو</option>
                                            <option value="suzuki">سوزوكي</option>
                                            <option value="isuzu">ايسوزو</option>
                                            <option value="mg">إم جي</option>
                                            <option value="changan">شانجان</option>
                                            <option value="geely">جيلي</option>
                                            <option value="haval">هافال</option>
                                            <option value="chery">شيري</option>
                                            <option value="byd">بي واي دي</option>
                                            <option value="gac">جي أيه سي</option>
                                            <option value="other">أخرى</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            يرجى اختيار الشركة المصنعة
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="model" class="form-label">الموديل*</label>
                                        <select class="form-select" id="model" name="model" required>
                                            <option value="">اختر الموديل</option>
                                            <!-- سيتم تحديث هذه القائمة عبر JavaScript -->
                                        </select>
                                        <div class="invalid-feedback">
                                            يرجى اختيار موديل السيارة
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="year" class="form-label">سنة الصنع*</label>
                                        <select class="form-select" id="year" name="year" required>
                                            <option value="">اختر السنة</option>
                                            <?php for($i = 2025; $i >= 2000; $i--): ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php endfor; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            يرجى اختيار سنة الصنع
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="mileage" class="form-label">عدد الكيلومترات*</label>
                                        <input type="number" class="form-control" id="mileage" name="mileage" required>
                                        <div class="invalid-feedback">
                                            يرجى إدخال عدد الكيلومترات
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="price" class="form-label">السعر (ر.ع)*</label>
                                        <input type="number" class="form-control" id="price" name="price" required>
                                        <div class="invalid-feedback">
                                            يرجى إدخال السعر
                                        </div>
                                    </div>

                                    <!-- مواصفات السيارة -->
                                    <div class="col-md-6">
                                        <label for="color" class="form-label">اللون*</label>
                                        <input type="text" class="form-control" id="color" name="color" required>
                                        <div class="invalid-feedback">
                                            يرجى إدخال لون السيارة
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="transmission" class="form-label">ناقل الحركة*</label>
                                        <select class="form-select" id="transmission" name="transmission" required>
                                            <option value="">اختر نوع ناقل الحركة</option>
                                            <option value="automatic">أوتوماتيك</option>
                                            <option value="cvt">CVT (ناقل حركة متغير باستمرار)</option>
                                            <option value="dct">DCT (ناقل حركة مزدوج القابض)</option>
                                            <option value="manual">يدوي</option>
                                            <option value="semi_automatic">شبه أوتوماتيك</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            يرجى اختيار نوع ناقل الحركة
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="fuel" class="form-label">نوع الوقود*</label>
                                        <select class="form-select" id="fuel" name="fuel" required>
                                            <option value="">اختر نوع الوقود</option>
                                            <option value="petrol">بنزين</option>
                                            <option value="diesel">ديزل</option>
                                            <option value="hybrid">هجين</option>
                                            <option value="plug_in_hybrid">هجين قابل للشحن</option>
                                            <option value="electric">كهربائي</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            يرجى اختيار نوع الوقود
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="location" class="form-label">الموقع*</label>
                                        <select class="form-select" id="location" name="location" required>
                                            <option value="">اختر الموقع</option>
                                            <option value="muscat">مسقط</option>
                                            <option value="salalah">صلالة</option>
                                            <option value="sohar">صحار</option>
                                            <option value="nizwa">نزوى</option>
                                            <option value="sur">صور</option>
                                            <option value="other">أخرى</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            يرجى اختيار الموقع
                                        </div>
                                    </div>

                                    <!-- وصف السيارة -->
                                    <div class="col-12">
                                        <label for="description" class="form-label">وصف السيارة*</label>
                                        <textarea class="form-control" id="description" name="description" rows="5" required></textarea>
                                        <div class="invalid-feedback">
                                            يرجى إدخال وصف للسيارة
                                        </div>
                                    </div>

                                    <!-- الصور -->
                                    <div class="col-12">
                                        <label for="images" class="form-label">صور السيارة* (يمكنك اختيار عدة صور)</label>
                                        <input type="file" class="form-control" id="images" name="images[]" multiple accept="image/*" required>
                                        <div class="form-text">يرجى إضافة صور واضحة للسيارة من الخارج والداخل. الحد الأقصى 5 صور.</div>
                                        <div class="invalid-feedback">
                                            يرجى إضافة صور للسيارة
                                        </div>
                                    </div>

                                    <!-- فئة السيارة -->
                                    <div class="col-md-6">
                                        <label for="category" class="form-label">فئة السيارة*</label>
                                        <select class="form-select" id="category" name="category" required>
                                            <option value="">اختر فئة السيارة</option>
                                            <option value="sedan">سيدان</option>
                                            <option value="suv">دفع رباعي (SUV)</option>
                                            <option value="crossover">كروس أوفر</option>
                                            <option value="hatchback">هاتشباك</option>
                                            <option value="coupe">كوبيه</option>
                                            <option value="convertible">مكشوفة</option>
                                            <option value="pickup">بيك أب</option>
                                            <option value="van">فان</option>
                                            <option value="minivan">ميني فان</option>
                                            <option value="wagon">واجن</option>
                                            <option value="sports">رياضية</option>
                                            <option value="luxury">فاخرة</option>
                                            <option value="offroad">طرق وعرة</option>
                                            <option value="commercial">تجارية</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            يرجى اختيار فئة السيارة
                                        </div>
                                    </div>

                                    <!-- معلومات الاتصال -->
                                    <div class="col-12 mt-4">
                                        <h5 class="mb-3">معلومات الاتصال</h5>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="name" class="form-label">الاسم*</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                        <div class="invalid-feedback">
                                            يرجى إدخال الاسم
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="phone" class="form-label">رقم الهاتف*</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" required>
                                        <div class="invalid-feedback">
                                            يرجى إدخال رقم هاتف صحيح
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="email" class="form-label">البريد الإلكتروني</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="whatsapp" class="form-label">رقم الواتساب</label>
                                        <input type="tel" class="form-control" id="whatsapp" name="whatsapp">
                                    </div>

                                    <!-- الموافقة على الشروط -->
                                    <div class="col-12 mt-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                            <label class="form-check-label" for="terms">
                                                أوافق على <a href="#">الشروط والأحكام</a> لسوق السيارات العماني
                                            </label>
                                            <div class="invalid-feedback">
                                                يجب الموافقة على الشروط والأحكام
                                            </div>
                                        </div>
                                    </div>

                                    <!-- زر الإرسال -->
                                    <div class="col-12 mt-4">
                                        <button class="btn btn-primary btn-lg w-100" type="submit">إضافة السيارة</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="card shadow-sm mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-lightbulb me-2 text-warning"></i> نصائح لبيع سيارتك بسرعة</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> أضف صور واضحة وعالية الجودة</li>
                                <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> ضع سعر منافس ومناسب</li>
                                <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> وفر معلومات كاملة عن السيارة</li>
                                <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> كن صادقاً في ذكر عيوب السيارة</li>
                                <li class="list-group-item"><i class="fas fa-check-circle text-success me-2"></i> استجب سريعاً للعملاء المهتمين</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card shadow-sm mb-4 bg-light">
                        <div class="card-body">
                            <h5 class="card-title"><i class="fas fa-star me-2 text-primary"></i> مميزات الإعلان لدينا</h5>
                            <ul class="list-group list-group-flush bg-transparent">
                                <li class="list-group-item bg-transparent"><i class="fas fa-eye text-primary me-2"></i> وصول لآلاف المشترين المحتملين</li>
                                <li class="list-group-item bg-transparent"><i class="fas fa-clock text-primary me-2"></i> إعلانك يظل نشطاً لمدة 30 يوم</li>
                                <li class="list-group-item bg-transparent"><i class="fas fa-camera text-primary me-2"></i> إمكانية إضافة حتى 5 صور</li>
                                <li class="list-group-item bg-transparent"><i class="fas fa-search text-primary me-2"></i> ظهور في نتائج البحث</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card bg-primary text-white">
                        <div class="card-body text-center">
                            <h5 class="card-title">بحاجة للمساعدة؟</h5>
                            <p class="card-text">يمكنك التواصل معنا مباشرة للحصول على المساعدة</p>
                            <a href="contact.php" class="btn btn-light">اتصل بنا</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>سوق السيارات العماني</h5>
                    <p>المنصة الأولى لبيع وشراء السيارات المستعملة في سلطنة عمان</p>
                    <div class="social-icons">
                        <a href="#" class="text-white me-2"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white me-2"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <h5>روابط سريعة</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.php" class="text-white">الرئيسية</a></li>
                        <li><a href="cars.php" class="text-white">جميع السيارات</a></li>
                        <li><a href="add-car.php" class="text-white">بيع سيارتك</a></li>
                        <li><a href="about.php" class="text-white">من نحن</a></li>
                        <li><a href="contact.php" class="text-white">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>اتصل بنا</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> مسقط، سلطنة عمان</li>
                        <li><i class="fas fa-phone me-2"></i> +968 12345678</li>
                        <li><i class="fas fa-envelope me-2"></i> info@omancars.com</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="text-center">
                <p class="mb-0">&copy; <?php echo date('Y'); ?> سوق السيارات العماني. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        function updateModels() {
            const makeSelect = document.getElementById('make');
            const modelSelect = document.getElementById('model');
            
            // إزالة جميع الخيارات الحالية
            modelSelect.innerHTML = '<option value="">اختر الموديل</option>';
            
            // إضافة الموديلات حسب الشركة المصنعة المختارة
            if (makeSelect.value === 'hyundai') {
                const hyundaiModels = [
                    {value: 'elantra_se', text: 'الينترا SE'},
                    {value: 'elantra_sel', text: 'الينترا SEL'},
                    {value: 'sonata', text: 'سوناتا'},
                    {value: 'tucson', text: 'توسان'},
                    {value: 'santa_fe', text: 'سانتا في'},
                    {value: 'kona', text: 'كونا'},
                    {value: 'accent', text: 'أكسنت'},
                    {value: 'palisade', text: 'باليسيد'},
                    {value: 'ioniq', text: 'أيونيك'},
                    {value: 'veloster', text: 'فيلوستر'}
                ];
                
                hyundaiModels.forEach(model => {
                    const option = document.createElement('option');
                    option.value = model.value;
                    option.textContent = model.text;
                    modelSelect.appendChild(option);
                });
            } else if (makeSelect.value === 'toyota') {
                const toyotaModels = [
                    {value: 'camry', text: 'كامري'},
                    {value: 'corolla', text: 'كورولا'},
                    {value: 'land_cruiser', text: 'لاند كروزر'},
                    {value: 'rav4', text: 'راف فور'},
                    {value: 'fortuner', text: 'فورتشنر'},
                    {value: 'hilux', text: 'هايلكس'},
                    {value: 'prado', text: 'برادو'},
                    {value: 'avalon', text: 'أفالون'},
                    {value: 'yaris', text: 'يارس'},
                    {value: 'supra', text: 'سوبرا'}
                ];
                
                toyotaModels.forEach(model => {
                    const option = document.createElement('option');
                    option.value = model.value;
                    option.textContent = model.text;
                    modelSelect.appendChild(option);
                });
            } else if (makeSelect.value === 'nissan') {
                const nissanModels = [
                    {value: 'altima', text: 'التيما'},
                    {value: 'patrol', text: 'باترول'},
                    {value: 'sunny', text: 'صني'},
                    {value: 'x_trail', text: 'إكس تريل'},
                    {value: 'pathfinder', text: 'باثفايندر'},
                    {value: 'kicks', text: 'كيكس'},
                    {value: 'maxima', text: 'ماكسيما'},
                    {value: 'navara', text: 'نافارا'},
                    {value: 'gtr', text: 'جي تي آر'},
                    {value: 'murano', text: 'مورانو'}
                ];
                
                nissanModels.forEach(model => {
                    const option = document.createElement('option');
                    option.value = model.value;
                    option.textContent = model.text;
                    modelSelect.appendChild(option);
                });
            } else if (makeSelect.value === 'kia') {
                const kiaModels = [
                    {value: 'sportage', text: 'سبورتاج'},
                    {value: 'sorento', text: 'سورينتو'},
                    {value: 'k5', text: 'K5'},
                    {value: 'cerato', text: 'سيراتو'},
                    {value: 'rio', text: 'ريو'},
                    {value: 'seltos', text: 'سيلتوس'},
                    {value: 'carnival', text: 'كرنفال'},
                    {value: 'telluride', text: 'تيلورايد'},
                    {value: 'soul', text: 'سول'},
                    {value: 'forte', text: 'فورتي'},
                    {value: 'stinger', text: 'ستينجر'},
                    {value: 'niro', text: 'نيرو'},
                    {value: 'ev6', text: 'EV6'},
                    {value: 'picanto', text: 'بيكانتو'}
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