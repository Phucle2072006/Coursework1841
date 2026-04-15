<?php
// editreviewer.php - Folder WEEK5
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';

try {
    // 1. Khi người dùng nhấn nút "Update Author" (Gửi form POST)
    if (isset($_POST['name'])) {
        updateReviewer($pdo, $_POST['id'], $_POST['name']);
        
        // Lưu xong thì quay lại danh sách tác giả
        header('location: reviewers.php');
        exit();
    } else {
        // 2. Khi vừa bấm vào nút "Edit" ở trang danh sách (Lấy ID từ URL)
        $reviewer = getReviewer($pdo, $_GET['id']);
        $title = 'Edit Reviewer';

        ob_start();
        include 'templates/editreviewer.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $output = 'Error: ' . $e->getMessage();
}

include 'templates/layout.html.php';