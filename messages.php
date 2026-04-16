<?php
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';

try {
    $messages = allMessages($pdo);
    $title = 'Contact Messages';
    ob_start();
    include 'templates/messages.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Database error: ' . $e->getMessage();
}
include 'templates/layout.html.php';
?>