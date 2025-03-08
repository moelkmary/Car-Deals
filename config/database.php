<?php
try {
    $host = 'localhost';
    $dbname = 'car_market';
    $username = 'root';
    $password = '';
    
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // اختبار الاتصال
    $test = $pdo->query('SELECT 1');
    
} catch(PDOException $e) {
    die("خطأ في الاتصال: " . $e->getMessage());
}
?>