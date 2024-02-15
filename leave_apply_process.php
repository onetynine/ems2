<?php

session_start();
require 'conn.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_id = isset($_POST["emp_id"]) ? $_POST["emp_id"] : null;
    $leave_request_time = isset($_POST["leave_request_time"]) ? $_POST["leave_request_time"] : null;
    $leave_type = isset($_POST["leave_type"]) ? $_POST["leave_type"] : null;
    $leave_reason = isset($_POST["leave_reason"]) ? $_POST["leave_reason"] : null;
    $leave_start_date = isset($_POST["leave_start_date"]) ? $_POST["leave_start_date"] : null;
    $leave_end_date = isset($_POST["leave_end_date"]) ? $_POST["leave_end_date"] : null;
    $leave_attachment = isset($_POST["leave_attachment"]) ? $_POST["leave_attachment"] : null;


    // Retrieve and validate other fields
    $leave_request_time = filter_input(INPUT_POST, "leave_request_time", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $leave_type = filter_input(INPUT_POST, "leave_type", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $leave_reason = filter_input(INPUT_POST, "leave_reason", FILTER_SANITIZE_FULL_SPECIAL_CHARS);



    // Check for duplicate email
    $checkDuplicateEmailSql = "SELECT COUNT(*) FROM employee WHERE emp_email = :emp_email";
    $checkDuplicateEmailStmt = $pdo->prepare($checkDuplicateEmailSql);
    $checkDuplicateEmailStmt->bindParam(':emp_email', $emp_email);

    if ($checkDuplicateEmailStmt->execute()) {
        $duplicateCount = $checkDuplicateEmailStmt->fetchColumn();

        if ($duplicateCount > 0) {
        // Duplicate email found, output an error message
        echo "<script>alert('Error: This email is already in use. Please choose a different email address.'); history.back();</script>";
        exit();


        }
    } else {
        // Error checking duplicate email
        echo "<script>alert('Error checking duplicate email: " . $checkDuplicateEmailStmt->errorInfo()[2] . "'); history.back();</script>";
        exit();
    }

    // Hash passwords if applicable
    // $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Your SQL query with named placeholders
    $sql = "INSERT INTO leave_info 
    (emp_id, leave_request_time, leave_type, leave_reason, leave_start_date, leave_end_date, leave_attachment) 
    VALUES (:emp_id, :leave_request_time, :leave_type, :leave_reason, :leave_start_date, :leave_end_date, :leave_attachment)";


    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bindParam(':emp_id', $emp_id);
        $stmt->bindParam(':leave_request_time', $leave_request_time);
        $stmt->bindParam(':leave_type', $leave_type);
        $stmt->bindParam(':leave_reason', $leave_reason);
        $stmt->bindParam(':leave_start_date', $leave_start_date);
        $stmt->bindParam(':leave_end_date', $leave_end_date);
        $stmt->bindParam(':leave_attachment', $leave_attachment);
       
        if ($stmt->execute()) {
            // Registration successful
            echo '<script>window.location.href = "leave_apply.php";</script>';
            exit();
        } else {
            // Registration failed
            $_SESSION['registration_error'] = $stmt->errorInfo()[2];
            echo '<script>window.location.href = "emp_register.php";</script>';
            exit();
        }
        
    }}
?>
