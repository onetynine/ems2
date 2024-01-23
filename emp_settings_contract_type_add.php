<?php
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opt_contract_type_name = isset($_POST["opt_contract_type_name"]) ? 1 : 0;

    // Validate and sanitize user input
    // Retrieve and validate other fields
    $opt_contract_type_name = filter_input(INPUT_POST, "opt_contract_type_name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    // ... (similar validation for other fields)

    // Check for duplicate email
    $checkDuplicateContractTypeSql = "SELECT COUNT(*) FROM opt_contract_type WHERE opt_contract_type_name = :opt_contract_type_name";
    $checkDuplicateContractTypeStmt = $pdo->prepare($checkDuplicateContractTypeSql);
    $checkDuplicateContractTypeStmt->bindParam(':opt_contract_type_name', $opt_contract_type_name);

    if ($checkDuplicateContractTypeStmt->execute()) {
        $duplicateCount = $checkDuplicateContractTypeStmt->fetchColumn();

        if ($duplicateCount > 0) {
        // Duplicate email found, output an error message
        header("Location: emp_settings_contract_type.php?duplicate=true");
        exit();


        }
    } else {
        // Error checking duplicate email
        echo "<script>alert('Error checking duplicate email: " . $checkDuplicateContractTypeStmt->errorInfo()[2] . "'); history.back();</script>";
        exit();
    }

    // Hash passwords if applicable
    // $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Your SQL query with named placeholders
    $sql = "INSERT INTO opt_contract_type  
    (opt_contract_type_name) 
    VALUES (:opt_contract_type_name)";

    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bindParam(':opt_contract_type_name', $opt_contract_type_name);
        
                // Execute the update query
        if ($stmt->execute()) {
            // If the update is successful, redirect and display a success message
            header("Location: emp_settings_contract_type.php?success=true");
            exit();
        } else {
            // If all else fails, return to the shore
            echo '<script>history.back()</script>';
            
        }
        }
    }

?>
