<?php
require 'conn.php';

if (isset($_POST['emp_email'])) {
    $email = $_POST['emp_email'];

    // Perform a query to check for duplicate email
    $query = "SELECT COUNT(*) as count FROM employee WHERE emp_email = :emp_email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':emp_email', $email);
    $stmt->execute();

    // Fetch the result
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the email already exists
    if ($result['count'] > 0) {
        echo 'Invalid email. This email is already in use.';
    } else {
        echo 'Valid email. This email is available.';
    }
}
?>

