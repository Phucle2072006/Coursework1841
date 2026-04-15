<?php
// editfilm.php - Folder WEEK5
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';

if (isset($_POST['submit'])) {
    try {
        // Cập nhật cả tên phim và email dựa trên ID
        updateFilm($pdo, $_POST['id'], $_POST['film_name'], $_POST['admin_email']);
        
        header('location: films.php');
        exit();
    } catch (PDOException $e) {
        $output = 'Error updating film: ' . $e->getMessage();
    }
} else {
    // Lấy dữ liệu phim cũ để hiện lên form sửa
    $film = getFilm($pdo, $_GET['id']); // Phúc đảm bảo đã có hàm getFilm trong DataBaseFunctions nhé
    $title = 'Edit Film';

    ob_start();
    include 'templates/editfilm.html.php'; // Đảm bảo file này cũng có ô nhập admin_email
    $output = ob_get_clean();
}

include 'templates/layout.html.php';