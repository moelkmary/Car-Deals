<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إنشاء حساب جديد - سوق السيارات المستعملة</title>
    <!-- استخدام CDN لـ Bootstrap RTL -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- إضافة خط Tajawal من Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: var(--accent-light);
        }
        .register-container {
            max-width: 650px;
            margin: 3rem auto;
        }
        .register-card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: none;
        }
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
        }
        .divider::before,
        .divider::after {
            content: "";
            flex: 1;
            border-bottom: 1px solid #ced4da;
        }
        .divider span {
            padding: 0 1rem;
            color: var(--text-secondary);
        }
    </style>
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
                            <a class="nav-link" href="add-car.php">أضف سيارتك</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">اتصل بنا</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Register Section -->
    <section class="register-section py-5">
        <div class="container">
            <div class="register-container">
                <div class="card register-card">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="text-center mb-4">إنشاء حساب جديد</h2>
                        
                        <?php
                        // هنا يمكن إضافة رسائل الخطأ أو النجاح
                        if (isset($_GET['error'])) {
                            echo '<div class="alert alert-danger" role="alert">
                                    حدث خطأ أثناء التسجيل. يرجى المحاولة مرة أخرى.
                                  </div>';
                        }
                        ?>
                        
                        <form action="register_process.php" method="POST">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName" class="form-label">الاسم الأول</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName" class="form-label">الاسم الأخير</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">البريد الإلكتروني</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">رقم الهاتف</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    <input type="tel" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label">كلمة المرور</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="confirmPassword" class="form-label">تأكيد كلمة المرور</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">المدينة</label>
                                <select class="form-select" id="location" name="location" required>
                                    <option value="" selected disabled>اختر المدينة</option>
                                    <option value="مسقط">مسقط</option>
                                    <option value="صلالة">صلالة</option>
                                    <option value="صحار">صحار</option>
                                    <option value="نزوى">نزوى</option>
                                    <option value="صور">صور</option>
                                    <option value="البريمي">البريمي</option>
                                    <option value="عبري">عبري</option>
                                    <option value="الرستاق">الرستاق</option>
                                </select>
                            </div>
                            <div class="mb-3 form-check">
                                <input type="checkbox" class="form-check-input" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">أوافق على <a href="#" class="text-decoration-none">الشروط والأحكام</a> و <a href="#" class="text-decoration-none">سياسة الخصوصية</a></label>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-lg">إنشاء حساب</button>
                            </div>
                        </form>
                        
                        <div class="divider">
                            <span>أو</span>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button class="btn btn-outline-primary mb-2">
                                <i class="fab fa-google me-2"></i> التسجيل باستخدام Google
                            </button>
                            <button class="btn btn-outline-primary">
                                <i class="fab fa-facebook-f me-2"></i> التسجيل باستخدام Facebook
                            </button>
                        </div>
                        
                        <div class="text-center mt-4">
                            <p class="mb-0">لديك حساب بالفعل؟ <a href="login.php" class="text-decoration-none">تسجيل الدخول</a></p>
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