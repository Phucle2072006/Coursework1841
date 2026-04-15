<?php
// addreviewer.php - Folder WEEK5
include 'includes/DatabaseConnection.php';

if (isset($_POST['submit'])) {
    try {
        $sql = 'INSERT INTO reviewer SET name = :name';
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $_POST['name']);
        $stmt->execute();

        header('location: reviewers.php');
        exit();
    } catch (PDOException $e) {
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    $title = 'Add New Reviewer';
    ob_start();
    include 'templates/addreviewer.html.php';
    $output = ob_get_clean();
}

include 'templates/layout.html.php';
?>