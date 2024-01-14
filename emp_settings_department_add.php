<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opt_department_name = isset($_POST["opt_department_name"]) ? 1 : 0;

    // Validate and sanitize user input
    // Retrieve and validate other fields
    $opt_department_name = filter_input(INPUT_POST, "opt_department_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // ... (similar validation for other fields)

    // Check for duplicate email
    $checkDuplicateDeptNameSql = "SELECT COUNT(*) FROM opt_department WHERE opt_department_name = :opt_department_name";
    $checkDuplicateDeptNameStmt = $pdo->prepare($checkDuplicateDeptNameSql);
    $checkDuplicateDeptNameStmt->bindParam(':opt_department_name', $opt_department_name);

    if ($checkDuplicateDeptNameStmt->execute()) {
        $duplicateCount = $checkDuplicateDeptNameStmt->fetchColumn();

        if ($duplicateCount > 0) {
        // Duplicate email found, output an error message
        header("Location: emp_settings_department.php?duplicate=true");
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
    $sql = "INSERT INTO opt_department 
    (opt_department_name) 
    VALUES (:opt_department_name)";

    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bindParam(':opt_department_name', $opt_department_name);
        
                // Execute the update query
        if ($stmt->execute()) {
            // If the update is successful, redirect and display a success message
            header("Location: emp_settings_department.php?success=true");
            exit();
        } else {
            // If all else fails, return to the shore
            echo '<script>history.back()</script>';
            
        }
        }
    }

?>
