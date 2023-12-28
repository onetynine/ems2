<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_email = filter_input(INPUT_POST, "emp_email", FILTER_VALIDATE_EMAIL);

    $checkDuplicateEmailSql = "SELECT COUNT(*) FROM employee WHERE emp_email = :emp_email";
    $checkDuplicateEmailStmt = $pdo->prepare($checkDuplicateEmailSql);
    $checkDuplicateEmailStmt->bindParam(':emp_email', $emp_email);

    if ($checkDuplicateEmailStmt->execute()) {
        $duplicateCount = $checkDuplicateEmailStmt->fetchColumn();

        if ($duplicateCount > 0) {
            // Duplicate email found
            echo 'duplicate';
            exit();
        } else {
            // Email is not duplicate
            echo 'not_duplicate';
            exit();
        }
    } else {
        // Error checking duplicate email
        echo 'error';
        exit();
    }
} else {
    // Invalid request method
    echo 'error';
    exit();
}
?>

