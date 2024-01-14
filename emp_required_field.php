<?php
require 'conn.php';

  // set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming the form input is named 'require_name'
    $newRequireNameValue = isset($_POST['require_name']) ? 1 : 0;
    $newRequirePhoneValue = isset($_POST['require_phone']) ? 1 : 0;
    $newRequireNRICValue = isset($_POST['require_nric']) ? 1 : 0;
    $newRequireDesignationValue = isset($_POST['require_designation']) ? 1 : 0;
    $newRequireDepartmentValue = isset($_POST['require_department']) ? 1 : 0;
    $newRequireContractTypeValue = isset($_POST['require_contract_type']) ? 1 : 0;
    $newRequireStatusValue = isset($_POST['require_status']) ? 1 : 0;
    $newRequireALValue = isset($_POST['require_al']) ? 1 : 0;
    $newRequireMCValue = isset($_POST['require_mc']) ? 1 : 0;


    // Update the values in the database
    $updateSql = "UPDATE required_fields 
    SET require_name = :require_name, 
    require_phone = :require_phone,
    require_nric = :require_nric,
    require_designation = :require_designation,
    require_department = :require_department,
    require_contract_type = :require_contract_type,
    require_status = :require_status,
    require_al = :require_al,
    require_mc = :require_mc";
    
    $updateStmt = $pdo->prepare($updateSql);
    $updateStmt->bindParam(':require_name', $newRequireNameValue, PDO::PARAM_BOOL);
    $updateStmt->bindParam(':require_phone', $newRequirePhoneValue, PDO::PARAM_BOOL);
    $updateStmt->bindParam(':require_nric', $newRequireNRICValue, PDO::PARAM_BOOL);
    $updateStmt->bindParam(':require_designation', $newRequireDesignationValue, PDO::PARAM_BOOL);
    $updateStmt->bindParam(':require_department', $newRequireDepartmentValue, PDO::PARAM_BOOL);
    $updateStmt->bindParam(':require_contract_type', $newRequireContractTypeValue, PDO::PARAM_BOOL);
    $updateStmt->bindParam(':require_status', $newRequireStatusValue, PDO::PARAM_BOOL);
    $updateStmt->bindParam(':require_al', $newRequireALValue, PDO::PARAM_BOOL);
    $updateStmt->bindParam(':require_mc', $newRequireMCValue, PDO::PARAM_BOOL);    

// Execute the update query
if ($updateStmt->execute()) {
       // If the update is successful, redirect and display a success message
       header("Location: emp_settings.php?success=true");
       exit();
   } else {
       // If all else fails, return to the shore
       echo '<script>history.back()</script>';
       
   }
}

?>