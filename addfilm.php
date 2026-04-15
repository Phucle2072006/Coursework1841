<?php
// addfilm.php - Folder WEEK5
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';

// Kiểm tra nếu người dùng nhấn nút "Save Film"
if (isset($_POST['submit'])) {
    try {
        // GỌI HÀM LƯU: Truyền cả tên phim và email vào
        insertFilm($pdo, $_POST['film_name'], $_POST['admin_email']);

        // Lưu xong thì quay về trang danh sách
        header('location: films.php');
        exit();
    } catch (PDOException $e) {
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    // Nếu chưa nhấn nút thì hiện form trống
    $title = 'Add New Film';
    ob_start();
    include 'templates/addfilm.html.php';
    $output = ob_get_clean();
}

include 'templates/layout.html.php';