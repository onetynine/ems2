<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emp_admin_access = isset($_POST["emp_admin_access"]) ? 1 : 0;
    $emp_name = isset($_POST["emp_name"]) ? $_POST["emp_name"] : null;
    $emp_email = isset($_POST["emp_email"]) ? $_POST["emp_email"] : null;
    $emp_designation = isset($_POST["emp_designation"]) ? $_POST["emp_designation"] : null;
    $emp_department = isset($_POST["emp_department"]) ? $_POST["emp_department"] : null;
    $emp_contract_type = isset($_POST["emp_contract_type"]) ? $_POST["emp_contract_type"] : null;
    $emp_start_date = isset($_POST["emp_start_date"]) ? $_POST["emp_start_date"] : null;
    $emp_status = isset($_POST["emp_status"]) ? $_POST["emp_status"] : null;   
    $emp_status = isset($_POST["emp_al"]) ? $_POST["emp_al"] : null;
    $emp_status = isset($_POST["emp_mc"]) ? $_POST["emp_mc"] : null;

    $emp_id = isset($_POST["emp_id"]) ? $_POST["emp_id"] : null;

    // Retrieve and validate other fields
    $emp_name = filter_input(INPUT_POST, "emp_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $emp_email = filter_input(INPUT_POST, "emp_email", FILTER_VALIDATE_EMAIL);
    $emp_designation = filter_input(INPUT_POST, "emp_designation", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $emp_department = filter_input(INPUT_POST, "emp_department", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $emp_contract_type = filter_input(INPUT_POST, "emp_contract_type", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    $emp_status = filter_input(INPUT_POST, "emp_status", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    // Validation & Sanitization for start date
    $emp_start_date = filter_input(INPUT_POST, "emp_start_date", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    if ($emp_start_date === "") {
        // Allow empty phone number, set it to NULL
        $emp_start_date = null;
    } elseif (!ctype_digit($emp_start_date)) {
        echo "<script>alert('Error: Invalid number format.'); history.back();</script>";
        exit();
    }

    // Validation & Sanitization for emp_al
    $emp_al = filter_input(INPUT_POST, "emp_al", FILTER_SANITIZE_NUMBER_INT);
    if ($emp_al === "") {
        // Allow empty phone number, set it to NULL
        $emp_al = null;
    } elseif (!ctype_digit($emp_al)) {
        echo "<script>alert('Error: Invalid number format.'); history.back();</script>";
        exit();
    }
    // Validation & Sanitization for emp_mc
    $emp_mc = filter_input(INPUT_POST, "emp_mc", FILTER_SANITIZE_NUMBER_INT);
    if ($emp_mc === "") {
        // Allow empty phone number, set it to NULL
        $emp_mc = null;
    } elseif (!ctype_digit($emp_mc)) {
        echo "<script>alert('Error: Invalid number format.'); history.back();</script>";
        exit();
    }

// Validation & Sanitization for Phone
$emp_phone = filter_input(INPUT_POST, "emp_phone", FILTER_SANITIZE_NUMBER_INT);
if ($emp_phone === "") {
    // Allow empty phone number, set it to NULL
    $emp_phone = null;
} elseif (!ctype_digit($emp_phone)) {
    echo "<script>alert('Error: Invalid phone number format.'); history.back();</script>";
    exit();
}

// Validation & Sanitization for NRIC
$emp_nric = filter_input(INPUT_POST, "emp_nric", FILTER_SANITIZE_NUMBER_INT);
if ($emp_nric === "") {
    // Allow empty phone number, set it to NULL
    $emp_nric = null;
} elseif (!ctype_digit($emp_nric)) {
    echo "<script>alert('Error: Invalid IC number format.'); history.back();</script>";
    exit();
}


   // Check for duplicate email (excluding the current user/id)
$checkDuplicateEmailSql = "SELECT COUNT(*) FROM employee WHERE emp_email = :emp_email AND emp_id != :emp_id";
$checkDuplicateEmailStmt = $pdo->prepare($checkDuplicateEmailSql);
$checkDuplicateEmailStmt->bindParam(':emp_email', $emp_email);
$checkDuplicateEmailStmt->bindParam(':emp_id', $emp_id); // Assuming you have a variable storing the current user/id

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
$sql = "UPDATE employee SET 
emp_name = :emp_name, 
emp_email = :emp_email, 
emp_designation = :emp_designation, 
emp_department = :emp_department, 
emp_contract_type = :emp_contract_type, 
emp_start_date = :emp_start_date, 
emp_status = :emp_status, 
emp_nric = :emp_nric, 
emp_phone = :emp_phone, 
emp_admin_access = :emp_admin_access, 
emp_al = :emp_al, 
emp_mc = :emp_mc
WHERE emp_id = :emp_id";

$stmt = $pdo->prepare($sql);

if ($stmt) {
// Assuming $emp_id holds the employee's ID being edited
$stmt->bindParam(':emp_id', $emp_id);

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
}

// If the update is successful, redirect back to the previous page with a success message
if ($stmt->execute()) {
    // Update successful
    header("Location: " . $_SERVER['HTTP_REFERER'] . "&success=true");
   
    exit();
} else {
    // Update failed
    header("Location: " . $_SERVER['HTTP_REFERER'] . "&error=" . urlencode($stmt->errorInfo()[2]));
    exit();
}

}

?>