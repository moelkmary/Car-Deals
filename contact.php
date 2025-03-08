<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اتصل بنا - سوق السيارات المستعملة</title>
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
        .contact-container {
            max-width: 800px;
            margin: 3rem auto;
        }
        .contact-card {
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: none;
        }
        .contact-info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .contact-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: var(--primary);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-left: 1rem;
        }
        .map-container {
            height: 300px;
            border-radius: 10px;
            overflow: hidden;
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
                            <a class="nav-link active" href="contact.php">اتصل بنا</a>
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
            <h1 class="text-center">اتصل بنا</h1>
            <p class="text-center mb-0">تواصل معنا لأي استفسار أو اقتراح</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section py-5">
        <div class="container">
            <div class="contact-container">
                <div class="row">
                    <div class="col-md-5 mb-4 mb-md-0">
                        <div class="card contact-card h-100">
                            <div class="card-body p-4">
                                <h3 class="mb-4">معلومات الاتصال</h3>
                                
                                <div class="contact-info-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">العنوان</h5>
                                        <p class="mb-0">مسقط، سلطنة عمان</p>
                                    </div>
                                </div>
                                
                                <div class="contact-info-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">رقم الهاتف</h5>
                                        <p class="mb-0">+968 9876 5432</p>
                                    </div>
                                </div>
                                
                                <div class="contact-info-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">البريد الإلكتروني</h5>
                                        <p class="mb-0">info@omancars.com</p>
                                    </div>
                                </div>
                                
                                <div class="contact-info-item">
                                    <div class="contact-icon">
                                        <i class="fas fa-clock"></i>
                                    </div>
                                    <div>
                                        <h5 class="mb-1">ساعات العمل</h5>
                                        <p class="mb-0">السبت - الخميس: 9:00 صباحًا - 5:00 مساءً</p>
                                        <p class="mb-0">الجمعة: مغلق</p>
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <h5 class="mb-3">تابعنا على</h5>
                                    <div class="d-flex">
                                        <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-facebook-f"></i></a>
                                        <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-twitter"></i></a>
                                        <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-instagram"></i></a>
                                        <a href="#" class="btn btn-outline-primary"><i class="fab fa-linkedin-in"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-7">
                        <div class="card contact-card">
                            <div class="card-body p-4">
                                <h3 class="mb-4">أرسل لنا رسالة</h3>
                                
                                <?php
                                // هنا يمكن إضافة رسائل الخطأ أو النجاح
                                if (isset($_GET['success'])) {
                                    echo '<div class="alert alert-success" role="alert">
                                            تم إرسال رسالتك بنجاح. سنتواصل معك قريبًا.
                                          </div>';
                                }
                                if (isset($_GET['error'])) {
                                    echo '<div class="alert alert-danger" role="alert">
                                            حدث خطأ أثناء إرسال الرسالة. يرجى المحاولة مرة أخرى.
                                          </div>';
                                }
                                ?>
                                
                                <form action="contact_process.php" method="POST">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="name" class="form-label">الاسم الكامل</label>
                                            <input type="text" class="form-control" id="name" name="name" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email" class="form-label">البريد الإلكتروني</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">رقم الهاتف</label>
                                        <input type="tel" class="form-control" id="phone" name="phone">
                                    </div>
                                    <div class="mb-3">
                                        <label for="subject" class="form-label">الموضوع</label>
                                        <input type="text" class="form-control" id="subject" name="subject" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message" class="form-label">الرسالة</label>
                                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">إرسال الرسالة</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mt-5">
                    <div class="card contact-card">
                        <div class="card-body p-4">
                            <h3 class="mb-4">موقعنا</h3>
                            <div class="map-container">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d237502.98618696106!2d58.27491254999999!3d23.5990877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e91ffa8ac2b5ecb%3A0x3ad9af6bab03d5e9!2sMuscat%2C%20Oman!5e0!3m2!1sen!2s!4v1646317061400!5m2!1sen!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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
                <p class="mb-0">© 2025 سوق السيارات العماني. جميع الحقوق محفوظة.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="js/main.js"></script>
</body>
</html>