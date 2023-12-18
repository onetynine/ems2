<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_name = $_POST["emp_name"];
    $emp_email = $_POST["emp_email"];
    $emp_designation = $_POST["emp_designation"];
    $emp_department = $_POST["emp_department"];
    $emp_contract_type = $_POST["emp_contract_type"];
    $emp_start_date = $_POST["emp_start_date"];
    $emp_end_date = $_POST["emp_end_date"];
    $emp_status = $_POST["emp_status"];
    $emp_nric = $_POST["emp_nric"];
    $emp_phone = $_POST["emp_phone"];
    $emp_admin_access = $_POST["emp_admin_access"];
    $emp_al = $_POST["emp_al"];   
    $emp_mc = $_POST["emp_mc"];


    $sql = "INSERT INTO employee 
    (emp_name, emp_email, emp_designation, emp_department, emp_contract_type, 
    emp_start_date, emp_end_date, emp_status, emp_nric, emp_phone, emp_admin_access,emp_al, emp_mc) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $pdo->prepare($sql);

if ($stmt) {
    // Bind parameters and execute the statement
    $stmt->bindParam(1, $emp_name);
    $stmt->bindParam(2, $emp_email);
    $stmt->bindParam(3, $emp_designation);
    $stmt->bindParam(4, $emp_department);
    $stmt->bindParam(5, $emp_contract_type);
    $stmt->bindParam(6, $emp_start_date);
    $stmt->bindParam(7, $emp_end_date);
    $stmt->bindParam(8, $emp_status);
    $stmt->bindParam(9, $emp_nric);
    $stmt->bindParam(10, $emp_phone);
    $stmt->bindParam(11, $emp_admin_access);
    $stmt->bindParam(12, $emp_al);
    $stmt->bindParam(13, $emp_mc);

    if ($stmt->execute()) {
        // Registration successful
        echo "Registration successful!";
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
header("Location: registration_form.php");
exit();
}