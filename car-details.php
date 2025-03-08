<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تفاصيل السيارة - سوق السيارات المستعملة</title>
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

    <!-- Car Details Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Car Gallery -->
                    <div class="mb-4">
                        <img src="img/car1.jpg" alt="صورة السيارة" class="img-fluid rounded">
                    </div>
                    
                    <!-- Car Details -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h2 class="card-title mb-3">تويوتا لاند كروزر 2022</h2>
                            <h3 class="text-primary mb-4">35,000 ر.ع</h3>
                            
                            <h4 class="mb-3">المواصفات</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <span class="text-muted">سنة الصنع</span>
                                        <p class="mb-0 fw-bold">2022</p>
                                    </div>
                                    <div class="mb-3">
                                        <span class="text-muted">المسافة المقطوعة</span>
                                        <p class="mb-0 fw-bold">45,000 كم</p>
                                    </div>
                                    <div class="mb-3">
                                        <span class="text-muted">نوع الوقود</span>
                                        <p class="mb-0 fw-bold">بنزين</p>
                                    </div>
                                    <div class="mb-3">
                                        <span class="text-muted">ناقل الحركة</span>
                                        <p class="mb-0 fw-bold">أوتوماتيك</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <span class="text-muted">اللون</span>
                                        <p class="mb-0 fw-bold">أبيض</p>
                                    </div>
                                    <div class="mb-3">
                                        <span class="text-muted">الحالة</span>
                                        <p class="mb-0 fw-bold">ممتاز</p>
                                    </div>
                                    <div class="mb-3">
                                        <span class="text-muted">عدد الأبواب</span>
                                        <p class="mb-0 fw-bold">5</p>
                                    </div>
                                    <div class="mb-3">
                                        <span class="text-muted">المحرك</span>
                                        <p class="mb-0 fw-bold">4.6 لتر، 8 سلندر</p>
                                    </div>
                                </div>
                            </div>
                            
                            <h4 class="mt-4 mb-3">المميزات</h4>
                            <div class="row">
                                <div class="col-md-4 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span>نظام ملاحة</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span>كاميرا خلفية</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span>مقاعد جلد</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span>فتحة سقف</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span>حساسات ركن</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span>بلوتوث</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span>مثبت سرعة</span>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-2">
                                    <div class="d-flex align-items-center">
                                        <i class="fas fa-check-circle text-primary me-2"></i>
                                        <span>تكييف</span>
                                    </div>
                                </div>
                            </div>
                            
                            <h4 class="mt-4 mb-3">الوصف</h4>
                            <p>سيارة تويوتا لاند كروزر 2022 بحالة ممتازة، صيانة دورية في الوكالة، جميع الكماليات، اللون أبيض، فرش جلد بيج، زجاج كهربائي، مرايا كهربائية، تحكم طارة، بلوتوث، شاشة لمس، كاميرا خلفية، حساسات أمامية وخلفية.</p>
                            
                            <div class="mt-4">
                                <a href="#" class="btn btn-primary me-2">اتصل بالبائع</a>
                                <a href="#" class="btn btn-outline-primary me-2">إضافة للمفضلة</a>
                                <a href="#" class="btn btn-outline-primary">مشاركة</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <!-- Seller Information -->
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="mb-3">معلومات البائع</h4>
                            <div class="d-flex align-items-center mb-3">
                                <div class="me-3">
                                    <img src="img/avatar.jpg" alt="صورة البائع" class="img-fluid rounded">
                                </div>
                                <div>
                                    <h5 class="mb-1">أحمد العامري</h5>
                                    <p class="text-muted mb-0">عضو منذ يناير 2023</p>
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="fas fa-phone-alt text-primary me-2"></i>
                                    <span>+968 9123 4567</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-envelope text-primary me-2"></i>
                                    <span>ahmed@example.com</span>
                                </div>
                            </div>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary">اتصال</button>
                                <button class="btn btn-outline-primary">إرسال رسالة</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Similar Cars -->
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-3">سيارات مشابهة</h4>
                            
                            <div class="mb-3">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="img/car2.jpg" alt="سيارة مشابهة" class="img-fluid rounded">
                                    </div>
                                    <div class="col-8 ps-3">
                                        <h6 class="mb-1">نيسان باترول 2023</h6>
                                        <p class="text-primary mb-1">32,000 ر.ع</p>
                                        <small class="text-muted">صلالة</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="img/car3.jpg" alt="سيارة مشابهة" class="img-fluid rounded">
                                    </div>
                                    <div class="col-8 ps-3">
                                        <h6 class="mb-1">لكزس LX570 2021</h6>
                                        <p class="text-primary mb-1">42,000 ر.ع</p>
                                        <small class="text-muted">صحار</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="row g-0">
                                    <div class="col-4">
                                        <img src="img/car4.jpg" alt="سيارة مشابهة" class="img-fluid rounded">
                                    </div>
                                    <div class="col-8 ps-3">
                                        <h6 class="mb-1">مرسيدس E-Class 2022</h6>
                                        <p class="text-primary mb-1">30,000 ر.ع</p>
                                        <small class="text-muted">مسقط</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="d-grid mt-3">
                                <a href="cars.php" class="btn btn-outline-primary">عرض المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Footer Section -->
    <footer class="py-5">
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
</body>
</html>