<?php
require 'conn.php';
include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_admin_access = isset($_POST["emp_admin_access"]) ? 1 : 0;
    $emp_name = isset($_POST["emp_name"]) ? $_POST["emp_name"] : null;
    $emp_email = isset($_POST["emp_email"]) ? $_POST["emp_email"] : null;
    $emp_designation = isset($_POST["emp_designation"]) ? $_POST["emp_designation"] : null;
    $emp_department = isset($_POST["emp_department"]) ? $_POST["emp_department"] : null;
    $emp_contract_type = isset($_POST["emp_contract_type"]) ? $_POST["emp_contract_type"] : null;
    $emp_start_date = isset($_POST["emp_start_date"]) ? $_POST["emp_start_date"] : null;
    $emp_status = isset($_POST["emp_status"]) ? $_POST["emp_status"] : null;
    $emp_nric = isset($_POST["emp_nric"]) ? $_POST["emp_nric"] : null;


    // Validate and sanitize user input
    // Retrieve and validate other fields
    $emp_name = filter_input(INPUT_POST, "emp_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $emp_email = filter_input(INPUT_POST, "emp_email", FILTER_VALIDATE_EMAIL);
    $emp_designation = filter_input(INPUT_POST, "emp_designation", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $emp_department = filter_input(INPUT_POST, "emp_department", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $emp_contract_type = filter_input(INPUT_POST, "emp_contract_type", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $emp_start_date = filter_input(INPUT_POST, "emp_start_date", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $emp_status =filter_input(INPUT_POST, "emp_status", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $emp_nric = filter_input(INPUT_POST, "emp_nric", FILTER_SANITIZE_NUMBER_INT);

// Validate and sanitize phone number
$emp_phone = filter_input(INPUT_POST, "emp_phone", FILTER_SANITIZE_NUMBER_INT);
if ($emp_phone === "") {
    // Allow empty phone number, set it to NULL
    $emp_phone = null;
} elseif (!ctype_digit($emp_phone)) {
    echo "<script>alert('Error: Invalid phone number format.'); history.back();</script>";
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
