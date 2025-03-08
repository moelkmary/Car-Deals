<?php
// ملف للتحقق من حالة جلسة المستخدم

// بدء جلسة إذا لم تكن قد بدأت بالفعل
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// وظيفة للتحقق مما إذا كان المستخدم قد سجل دخوله
function is_logged_in() {
    return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
}

// وظيفة للتحقق من حالة تسجيل الدخول وإعادة التوجيه إذا لم يكن المستخدم قد سجل دخوله
function require_login($redirect_url = 'login.php') {
    if (!is_logged_in()) {
        header("Location: $redirect_url");
        exit;
    }
}

// وظيفة للحصول على معلومات المستخدم الحالي
function get_current_user() {
    if (is_logged_in()) {
        return [
            'id' => $_SESSION['user_id'],
            'name' => $_SESSION['user_name'],
            'email' => $_SESSION['user_email']
        ];
    }
    return null;
}

// وظيفة لتسجيل خروج المستخدم
function logout_user() {
    // حذف متغيرات الجلسة
    $_SESSION = array();
    
    // حذف ملف تعريف ارتباط الجلسة إذا كان موجودًا
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // إنهاء الجلسة
    session_destroy();
}
?>