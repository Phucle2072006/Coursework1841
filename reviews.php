<?php
// reviews.php - Folder WEEK5
try {
    include 'includes/DatabaseConnection.php';
    include 'includes/DataBaseFunctions.php';

    $totalReviews = totalReviews($pdo);
    
    // ĐÃ CẬP NHẬT: LOGIC PHÂN TRANG
    $limit = 5; // Số bài review trên 1 trang
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    
    $offset = ($page - 1) * $limit;
    $totalPages = ceil($totalReviews / $limit);

    // Truyền limit và offset vào hàm
    $reviews = allReviews($pdo, $limit, $offset); 
    
    $title = 'Film Review List';

    ob_start();
    include 'templates/reviews.html.php';
    $output = ob_get_clean();

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';
?>