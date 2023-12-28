<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_admin_access = isset($_POST["emp_admin_access"]) ? 1 : 0;

    // Validate and sanitize user input
    // Retrieve and validate other fields
    $emp_name = filter_input(INPUT_POST, "emp_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $emp_email = filter_input(INPUT_POST, "emp_email", FILTER_VALIDATE_EMAIL);
    $emp_designation = filter_input(INPUT_POST, "emp_designation", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // ... (similar validation for other fields)

    if (!$emp_name || !$emp_email || !$emp_designation /* Add other validation conditions */) {
        echo "<script>alert('Invalid input. Please check your form.');</script>";
        exit();
    }

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
    $sql = "INSERT INTO employee 
    (emp_name, emp_email, emp_designation, emp_department, emp_contract_type, 
    emp_start_date, emp_status, emp_nric, emp_phone, emp_admin_access, emp_al, emp_mc) 
    VALUES (:emp_name, :emp_email, :emp_designation, :emp_department, :emp_contract_type, 
    :emp_start_date, :emp_status, :emp_nric, :emp_phone, :emp_admin_access, :emp_al, :emp_mc)";

    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bindParam(':emp_name', $emp_name);
        $stmt->bindParam(':emp_email', $emp_email);
        $stmt->bindParam(':emp_designation', $emp_designation);
        $stmt->bindParam(':emp_department', $emp_department);
        $stmt->bindParam(':emp_contract_type', $emp_contract_type);
        $stmt->bindParam(':emp_start_date', $emp_start_date);
        $stmt->bindParam(':emp_status', $emp_status);
        $stmt->bindParam(':emp_nric', $emp_nric);
        $stmt->bindParam(':emp_phone', $emp_phone);
        $stmt->bindParam(':emp_admin_access', $emp_admin_access);
        $stmt->bindParam(':emp_al', $emp_al);
        $stmt->bindParam(':emp_mc', $emp_mc);
        // ... (similar binding for other parameters)
        if ($stmt->execute()) {
            // Registration successful
            $_SESSION['registration_success'] = true;
            $_SESSION['emp_id'] = $pdo->lastInsertId();
            echo '<script>window.location.href = "emp_register_success.php";</script>';
            exit();
        } else {
            // Registration failed
            $_SESSION['registration_error'] = $stmt->errorInfo()[2];
            echo '<script>window.location.href = "emp_register.php";</script>';
            exit();
        }
        
    }}
?>
