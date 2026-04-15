<?php
// addreview.php - Folder WEEK5
include 'includes/DatabaseConnection.php';

if (isset($_POST['submit'])) {
    try {
        // 1. Xử lý upload ảnh (Khớp với name="image" trong HTML)
        $imageName = $_FILES['image']['name'];
        if ($imageName) {
            move_uploaded_file($_FILES['image']['tmp_name'], "images/" . $imageName);
        }

        // 2. Lưu vào DB (Khớp với tên cột trong bảng 'review' của bạn)
        $sql = 'INSERT INTO review SET
                text = :text,
                date = CURDATE(),
                filmid = :filmid,
                reviewerid = :reviewerid,
                image = :image';

        $stmt = $pdo->prepare($sql);
        
        // Khớp BindValue với tên name="..." trong file addreview.html.php
        $stmt->bindValue(':text', $_POST['text']); 
        $stmt->bindValue(':filmid', $_POST['films']); 
        $stmt->bindValue(':reviewerid', $_POST['reviewers']); 
        $stmt->bindValue(':image', $imageName);
        
        $stmt->execute();

        // 3. Chuyển hướng về reviews.php (CÓ CHỮ S)
        header('location: reviews.php');
        exit();

    } catch (PDOException $e) {
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    // Lấy dữ liệu cho Dropdown
    $films = $pdo->query('SELECT * FROM film');
    $reviewers = $pdo->query('SELECT * FROM reviewer');

    $title = 'Post a New Film Review';
    ob_start();
    include 'templates/addreview.html.php';
    $output = ob_get_clean();
}

include 'templates/layout.html.php';