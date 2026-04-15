<?php
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';

try {
    if (isset($_POST['text'])) {
        updateReview($pdo, $_POST['id'], $_POST['text'], $_POST['reviewers'], $_POST['films']);
        header('location: reviews.php');
        exit();
    } else {
        $review = getReview($pdo, $_GET['id']);
        $reviewers = allReviewers($pdo);
        $films = allFilms($pdo);
        $title = 'Edit review';

        ob_start();
        include 'templates/editreview.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $output = 'Error: ' . $e->getMessage();
}
include 'templates/layout.html.php';