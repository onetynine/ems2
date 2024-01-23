<?php
require 'conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_email = $_POST['emp_email'];
    $emp_password = $_POST['emp_password'];

    // Use prepared statement to prevent SQL injection
    $stmt = $pdo->prepare("SELECT * FROM employee WHERE emp_email = :emp_email");
    $stmt->bindParam(':emp_email', $emp_email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Compare passwords without hashing (for testing only)
        if ($emp_password === $user['emp_password']) {
            $_SESSION['emp_email'] = $user['emp_email'];
            header('Location: emp_summary.php');

        } else {
            header('Location: login.php');
        }
    }
}
?>