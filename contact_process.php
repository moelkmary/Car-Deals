<?php
// ملف معالجة نموذج الاتصال
session_start();

// تضمين ملف الاتصال بقاعدة البيانات
include 'db_connect.php';

// التحقق من وجود البيانات المرسلة
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // استلام البيانات من النموذج
    $name = isset($_POST['name']) ? trim($_POST['name']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    $subject = isset($_POST['subject']) ? trim($_POST['subject']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';
    
    // تنظيف المدخلات لمنع هجمات XSS
    $name = htmlspecialchars(trim($name));
    $email = filter_var(trim($email), FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(trim($phone));
    $subject = htmlspecialchars(trim($subject));
    $message = htmlspecialchars(trim($message));
    
    // التحقق من البيانات المطلوبة
    if (empty($name) || empty($email) || empty($subject) || empty($message)) {
        // إعادة التوجيه مع رسالة خطأ
        header("Location: contact.php?error=1");
        exit;
    }
    
    // التحقق من صحة البريد الإلكتروني
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // إعادة التوجيه مع رسالة خطأ
        header("Location: contact.php?error=2");
        exit;
    }
    
    // التحقق من رقم الهاتف (إذا تم إدخاله)
    if (!empty($phone) && !preg_match("/^[0-9\s\-\+\(\)]{5,20}$/", $phone)) {
        header("Location: contact.php?error=4");
        exit;
    }
    
    try {
        // حفظ رسالة الاتصال في قاعدة البيانات
        $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, phone, subject, message, created_at) 
                               VALUES (:name, :email, :phone, :subject, :message, NOW())");
        
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':subject', $subject);
        $stmt->bindParam(':message', $message);
        
        $stmt->execute();
        
        // إعداد وإرسال البريد الإلكتروني
        $to = "info@omancars.com";
        $email_subject = "رسالة جديدة من نموذج الاتصال: $subject";
        $email_body = "لقد تلقيت رسالة جديدة من نموذج الاتصال في موقع سوق السيارات العماني.\n\n".
                      "التفاصيل:\n\n".
                      "الاسم: $name\n".
                      "البريد الإلكتروني: $email\n".
                      "رقم الهاتف: $phone\n".
                      "الموضوع: $subject\n".
                      "الرسالة:\n$message\n";
        
        // تحديد الرأس بشكل آمن
        $headers = "From: noreply@omancars.com\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        $mail_sent = true; // mail($to, $email_subject, $email_body, $headers);
        
        if ($mail_sent) {
            header("Location: contact.php?success=1");
            exit;
        } else {
            header("Location: contact.php?error=5");
            exit;
        }
        
    } catch(PDOException $e) {
        error_log("خطأ في حفظ رسالة الاتصال: " . $e->getMessage());
        header("Location: contact.php?error=3");
        exit;
    }
} else {
    header("Location: contact.php");
    exit;
}
?>