<?php
// reviewers.php - Folder WEEK5
include 'includes/DatabaseConnection.php';

try {
    $reviewers = $pdo->query('SELECT * FROM reviewer');
    $title = 'Manage Reviewers';

    ob_start();
    include 'templates/reviewers.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

include 'templates/layout.html.php';