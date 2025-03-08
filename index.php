<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سوق السيارات العماني - الرئيسية</title>
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
                            <a class="nav-link active" href="index.php">الرئيسية</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="cars.php">السيارات</a>
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

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4 fw-bold">أفضل سوق للسيارات المستعملة في عمان</h1>
                    <p class="lead">ابحث عن سيارتك المفضلة أو اعرض سيارتك للبيع بكل سهولة</p>
                    <div class="search-box p-3 bg-white rounded shadow">
                        <form action="cars.php" method="GET">
                            <div class="row g-2">
                                <div class="col-md-4">
                                    <select name="make" class="form-select">
                                        <option value="">الشركة المصنعة</option>
                                        <option value="toyota">تويوتا</option>
                                        <option value="nissan">نيسان</option>
                                        <option value="honda">هوندا</option>
                                        <option value="lexus">لكزس</option>
                                        <option value="ford">فورد</option>
                                        <option value="mercedes">مرسيدس</option>
                                        <option value="bmw">بي إم دبليو</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="year" class="form-select">
                                        <option value="">سنة الصنع</option>
                                        <?php for($i = 2025; $i >= 2000; $i--): ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="price" class="form-select">
                                        <option value="">السعر الأقصى</option>
                                        <option value="5000">5,000 ر.ع</option>
                                        <option value="10000">10,000 ر.ع</option>
                                        <option value="15000">15,000 ر.ع</option>
                                        <option value="20000">20,000 ر.ع</option>
                                        <option value="30000">30,000 ر.ع</option>
                                        <option value="50000">50,000 ر.ع</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary w-100">بحث</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="img/hero-car.jpeg" alt="سيارة" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Cars Section -->
    <section class="featured-cars py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4 section-title">السيارات المميزة</h2>
            <div class="row">
                <?php
                // Normally we would fetch this from a database
                $featuredCars = [
                    [
                        'id' => 1,
                        'title' => 'تويوتا لاند كروزر 2022',
                        'price' => '35,000 ر.ع',
                        'location' => 'مسقط',
                        'year' => '2022',
                        'mileage' => '45,000 كم',
                        'image' => 'img/car1.jpg'
                    ],
                    [
                        'id' => 2,
                        'title' => 'نيسان باترول 2023',
                        'price' => '32,000 ر.ع',
                        'location' => 'صلالة',
                        'year' => '2023',
                        'mileage' => '28,000 كم',
                        'image' => 'img/car2.jpg'
                    ],
                    [
                        'id' => 3,
                        'title' => 'لكزس LX570 2021',
                        'price' => '42,000 ر.ع',
                        'location' => 'صحار',
                        'year' => '2021',
                        'mileage' => '60,000 كم',
                        'image' => 'img/car3.jpg'
                    ],
                    [
                        'id' => 4,
                        'title' => 'مرسيدس E-Class 2022',
                        'price' => '30,000 ر.ع',
                        'location' => 'مسقط',
                        'year' => '2022',
                        'mileage' => '32,000 كم',
                        'image' => 'img/car4.jpg'
                    ],
                ];

                foreach($featuredCars as $car):
                ?>
                <div class="col-md-3 mb-4">
                    <div class="card car-card h-100">
                        <div class="position-relative overflow-hidden">
                            <img src="<?php echo $car['image']; ?>" class="card-img-top" alt="<?php echo $car['title']; ?>">
                            <span class="featured-car-badge">مميزة</span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $car['title']; ?></h5>
                            <p class="card-text fw-bold text-primary"><?php echo $car['price']; ?></p>
                            <div class="specs-list">
                                <span class="spec-badge">
                                    <i class="fas fa-map-marker-alt"></i> <?php echo $car['location']; ?>
                                </span>
                                <span class="spec-badge">
                                    <i class="fas fa-calendar-alt"></i> <?php echo $car['year']; ?>
                                </span>
                                <span class="spec-badge">
                                    <i class="fas fa-road"></i> <?php echo $car['mileage']; ?>
                                </span>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-top-0">
                            <a href="car-details.php?id=<?php echo $car['id']; ?>" class="btn btn-outline-primary w-100">عرض التفاصيل</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center mt-4">
                <a href="cars.php" class="btn btn-primary">عرض جميع السيارات</a>
            </div>
        </div>
    </section>

    <!-- Why Us Section -->
    <section class="why-us py-5">
        <div class="container">
            <h2 class="text-center mb-5 section-title">لماذا سوق السيارات العماني؟</h2>
            <div class="row g-4">
                <div class="col-md-4 text-center">
                    <div class="feature-box p-4 h-100 bg-white rounded shadow-sm">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-car-alt fa-3x text-primary"></i>
                        </div>
                        <h4>أكبر تشكيلة سيارات</h4>
                        <p>نوفر أكبر تشكيلة من السيارات المستعملة ذات الجودة العالية في سلطنة عمان.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="feature-box p-4 h-100 bg-white rounded shadow-sm">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-shield-alt fa-3x text-primary"></i>
                        </div>
                        <h4>ضمان الجودة</h4>
                        <p>جميع السيارات تخضع لفحص فني شامل للتأكد من سلامتها وجودتها قبل العرض.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="feature-box p-4 h-100 bg-white rounded shadow-sm">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-handshake fa-3x text-primary"></i>
                        </div>
                        <h4>تعامل مباشر</h4>
                        <p>نوفر منصة للتواصل المباشر بين البائع والمشتري بدون وسطاء لضمان أفضل سعر.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta py-5" style="background-color: var(--primary); color: white;">
        <div class="container text-center">
            <h2 class="mb-4">هل تريد بيع سيارتك؟</h2>
            <p class="lead mb-4">أضف سيارتك الآن واحصل على أفضل العروض من المشترين المهتمين</p>
            <a href="add-car.php" class="btn btn-light btn-lg">أضف سيارتك الآن</a>
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