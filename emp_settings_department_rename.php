<?php
session_start();
require 'conn.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Retrieve and validate other fields
    $opt_department_name = filter_input(INPUT_POST, "opt_department_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // ... (similar validation for other fields)
     // Retrieve department ID
     $opt_department_id = filter_input(INPUT_POST, "opt_department_id", FILTER_VALIDATE_INT);
     if ($opt_department_id === false) {
         // Handle invalid department ID
         echo '<script>alert("Invalid department ID."); history.back();</script>';
         exit();
     }


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

    // Your SQL query with named placeholders
    $sql = "UPDATE opt_department SET 
    opt_department_name = :opt_department_name 
    WHERE opt_department_id = :opt_department_id";

    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bindParam(':opt_department_name', $opt_department_name);
        $stmt->bindParam(':opt_department_id', $opt_department_id);
        
                // Execute the update query
        if ($stmt->execute()) {
            // If the update is successful, redirect and display a success message
            header("Location: emp_settings_department.php?rename=true");
            exit();
        } else {
            // If all else fails, return to the shore
            echo '<script>history.back()</script>';
            
        }
        }
    }

?>
