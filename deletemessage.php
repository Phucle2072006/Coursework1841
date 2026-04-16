<?php
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';

try {
    if (isset($_POST['id'])) {
        deleteMessage($pdo, $_POST['id']);
    }
    header('location: messages.php');
    exit();
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>