<?php
// DatabaseConnection.php - Folder WEEK5
try {
    // Sửa dbname thành week4 để khớp với phpMyAdmin của bạn
    $pdo = new PDO('mysql:host=localhost;dbname=week4;charset=utf8mb4', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $output = 'Unable to connect to the database server: ' . $e->getMessage();
    include 'templates/layout.html.php';
    exit();
}