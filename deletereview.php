<?php
// deletereview.php - Folder WEEK5
include 'includes/DatabaseConnection.php';

try {
    $sql = 'DELETE FROM review WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();

    // Xóa xong thì quay về trang danh sách review (reviews.php)
    header('location: reviews.php');
    exit();

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to delete review: ' . $e->getMessage();
    include 'templates/layout.html.php';
}