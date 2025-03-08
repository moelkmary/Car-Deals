<?php
// ملف الاتصال بقاعدة البيانات

// متغيرات الاتصال
$servername = "localhost";
$username = "root";        // اسم المستخدم الافتراضي لـ XAMPP
$password = "";            // كلمة المرور الافتراضية لـ XAMPP (فارغة)
$dbname = "car_marketplace"; // اسم قاعدة البيانات

// إنشاء الاتصال
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    // ضبط وضع الاستثناء لـ PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // ضبط الاتصال للتعامل مع اللغة العربية
    $conn->exec("SET NAMES utf8");
} catch(PDOException $e) {
    // تسجيل الخطأ بدلاً من عرضه للمستخدم في بيئة الإنتاج
    error_log("فشل الاتصال بقاعدة البيانات: " . $e->getMessage());
    // يمكن توجيه المستخدم إلى صفحة خطأ مخصصة
    // header("Location: error.php");
    // exit;
}

// وظيفة لتنظيف بيانات الإدخال
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>