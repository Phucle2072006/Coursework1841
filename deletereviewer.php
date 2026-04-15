<?php
// deletereviewer.php - Folder WEEK5
include 'includes/DatabaseConnection.php';

try {
    // 1. CHUẨN BỊ VÀ THỰC THI LỆNH XÓA (Nhận ID qua POST)
    $sql = 'DELETE FROM reviewer WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_POST['id']);
    $stmt->execute();

    // 2. Xóa xong thì quay về trang danh sách tác giả
    header('location: reviewers.php');
    exit();

} catch (PDOException $e) {
    // 3. XỬ LÝ LỖI KHÓA NGOẠI (Foreign Key Constraint)
    // Lỗi này xảy ra khi tác giả đó có review gắn liền. Database sẽ chặn xóa.
    $title = 'Cannot Delete Author';
    $output = 'Unable to delete author (ID: ' . htmlspecialchars($_POST['id']) . '): ' . $e->getMessage() . 
              ' (Lưu ý: Tác giả này có thể đã viết bài review. Bạn cần xóa hết bài review của họ trước)';
    include 'templates/layout.html.php';
}