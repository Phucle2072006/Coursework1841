<?php
// films.php - Folder WEEK5
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';

try {
    // ĐÃ CẬP NHẬT: Kiểm tra xem có đang search không
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $films = searchFilms($pdo, $_GET['search']);
    } else {
        $films = allFilms($pdo);
    }
    
    $title = 'Manage Film List';

    ob_start();
    include 'templates/films.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';
?>