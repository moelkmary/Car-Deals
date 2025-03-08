<?php
// ملف معالجة تسجيل الدخول

// بدء جلسة
session_start();

// تضمين ملف الاتصال بقاعدة البيانات
include 'db_connect.php';

// التحقق من وجود البيانات المرسلة
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات من النموذج
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $rememberMe = isset($_POST['remember']) ? true : false;
    
    // تنظيف المدخلات لمنع هجمات XSS
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    
    // التحقق من البيانات المطلوبة
    if (empty($email) || empty($password)) {
        // إعادة التوجيه مع رسالة خطأ
        header("Location: login.php?error=1");
        exit;
    }
    
    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // إعادة التوجيه مع رسالة خطأ - بريد إلكتروني غير صالح
        header("Location: login.php?error=3");
        exit;
    }
    
    try {
        // التحقق من بيانات المستخدم في قاعدة البيانات
        $stmt = $conn->prepare("SELECT id, first_name, last_name, email, password FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && password_verify($password, $user['password'])) {
            // تسجيل الدخول بنجاح
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
            $_SESSION['user_email'] = $user['email'];
            
            // حماية الجلسة من هجمات Session Fixation
            session_regenerate_id(true);
            
            // إذا تم تحديد "تذكرني"
            if ($rememberMe) {
                $token = bin2hex(random_bytes(32));
                setcookie('remember_token', $token, time() + 30 * 24 * 60 * 60, '/', '', true, true);
                
                // تخزين التوكن في قاعدة البيانات (مع تشفيره)
                // يمكن تفعيل هذا الكود بعد إضافة عمود remember_token لجدول المستخدمين
                // $stmt = $conn->prepare("UPDATE users SET remember_token = ? WHERE id = ?");
                // $stmt->execute([password_hash($token, PASSWORD_DEFAULT), $user['id']]);
            }
            
            header("Location: index.php");
            exit;
        } else {
            // فشل تسجيل الدخول
            header("Location: login.php?error=2");
            exit;
        }
    } catch(PDOException $e) {
        error_log("خطأ في تسجيل الدخول: " . $e->getMessage());
        header("Location: login.php?error=4");
        exit;
    }
} else {
    // إذا تم الوصول إلى هذا الملف بطريقة غير صحيحة
    header("Location: login.php");
    exit;
}
?>