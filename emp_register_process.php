<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_admin_access = isset($_POST["emp_admin_access"]) ? 1 : 0;
    // Validate and sanitize user input
    $emp_name = filter_input(INPUT_POST, "emp_name", FILTER_SANITIZE_STRING);
    $emp_email = filter_input(INPUT_POST, "emp_email", FILTER_VALIDATE_EMAIL);
    $emp_designation = filter_input(INPUT_POST, "emp_designation", FILTER_SANITIZE_STRING);
    // ... (similar validation for other fields)

    if (!$emp_name || !$emp_email || !$emp_designation /* Add other validation conditions */) {
        echo "Invalid input. Please check your form.";
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
            header("Location: registration_success.php");
            exit();
        } else {
            // Registration failed
            echo "Error: " . $stmt->errorInfo()[2];
        }
    } else {
        // Statement preparation failed
        echo "Error in preparing the statement.";
    }
} else {
    // Redirect to the registration form if the form is not submitted
    header("Location: emp_register.php");
    exit();
}
?>
