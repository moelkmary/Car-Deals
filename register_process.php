<?php
// ملف معالجة التسجيل

// بدء جلسة
session_start();

// تضمين ملف الاتصال بقاعدة البيانات
include 'db_connect.php';

// التحقق من وجود البيانات المرسلة
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // التحقق من المدخلات وتنظيفها
    $firstName = htmlspecialchars(trim($_POST['firstName']));
    $lastName = htmlspecialchars(trim($_POST['lastName']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $phone = htmlspecialchars(trim($_POST['phone']));
    $location = htmlspecialchars(trim($_POST['location']));
    $terms = isset($_POST['terms']) ? true : false;
    
    // التحقق من البيانات المطلوبة
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($password) || empty($confirmPassword) || empty($location) || !$terms) {
        header("Location: register.php?error=1");
        exit;
    }
    
    // التحقق من تطابق كلمات المرور
    if ($password !== $confirmPassword) {
        header("Location: register.php?error=3");
        exit;
    }
    
    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: register.php?error=4");
        exit;
    }
    
    // التحقق من قوة كلمة المرور
    if (strlen($password) < 8) {
        header("Location: register.php?error=5");
        exit;
    }
    
    try {
        // التحقق من عدم وجود البريد الإلكتروني مسبقاً
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            header("Location: register.php?error=2");
            exit;
        }
        
        // تشفير كلمة المرور
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        
        // إدخال المستخدم الجديد
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, phone, location, created_at) 
                               VALUES (:firstName, :lastName, :email, :password, :phone, :location, NOW())");
        
        $stmt->bindParam(':firstName', $firstName);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':location', $location);
        
        $stmt->execute();
        
        // تسجيل الدخول مباشرة بعد التسجيل
        $_SESSION['user_id'] = $conn->lastInsertId();
        $_SESSION['user_name'] = $firstName . ' ' . $lastName;
        $_SESSION['user_email'] = $email;
        
        // تجديد معرف الجلسة للأمان
        session_regenerate_id(true);
        
        header("Location: index.php?registered=1");
        exit;
        
    } catch(PDOException $e) {
        error_log("خطأ في التسجيل: " . $e->getMessage());
        header("Location: register.php?error=6");
        exit;
    }
} else {
    // إذا تم الوصول إلى هذا الملف بطريقة غير صحيحة
    header("Location: register.php");
    exit;
}
?>