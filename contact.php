<?php
include 'includes/DatabaseConnection.php';
include 'includes/DataBaseFunctions.php';

if (isset($_POST['submit'])) {
    try {
        insertMessage($pdo, $_POST['email'], $_POST['message']);
        $title = 'Message Sent';
        $output = '<div class="alert alert-success text-center mt-5 p-4 rounded-4 shadow" style="background-color: #1e293b; border: 1px solid #38bdf8; color: #38bdf8;">
                    <i class="fa-solid fa-circle-check fa-3x mb-3"></i><br>
                    <h4>Thank you!</h4>
                    <p>Your message has been sent to the admin successfully.</p>
                    <a href="index.php" class="btn btn-outline-info mt-3">Return to Home</a>
                   </div>';
    } catch (PDOException $e) {
        $title = 'Error';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    $title = 'Contact Admin';
    ob_start();
    include 'templates/contact.html.php';
    $output = ob_get_clean();
}
include 'templates/layout.html.php';
?>