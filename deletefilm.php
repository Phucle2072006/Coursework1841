<?php
// deletefilm.php - Folder WEEK5
include 'includes/DatabaseConnection.php';

try {
    // Chuẩn bị câu lệnh xóa dựa trên ID
    $sql = 'DELETE FROM film WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();

    // Xóa xong thì quay về trang danh sách phim
    header('location: films.php');
    exit();

} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to delete film: ' . $e->getMessage() . 
              ' (Lưu ý: Bạn không thể xóa phim nếu vẫn còn bài review liên kết với phim đó)';
    include 'templates/layout.html.php';
}