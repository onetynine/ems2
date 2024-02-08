<?php
session_start();
require 'conn.php';

if (isset($_SESSION['admin'])) {
  if($_SESSION['admin'] == true){

include "header.php"; 

$sqlRequiredFields = "SELECT * FROM required_fields";
$stmtRequiredFields = $pdo->prepare($sqlRequiredFields);
$stmtRequiredFields->execute();

// Fetch the data from the query
$rowRequiredFields = $stmtRequiredFields->fetch(PDO::FETCH_ASSOC);

?>
       
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<br>
<?php 
if (isset($_GET['success']) && $_GET['success'] == 'true') {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
          Update successful!
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}

?>

<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Employee</li>
    <li class="breadcrumb-item " aria-current="page"><a href="emp_settings.php">Settings</a></li>
  </ol>
</nav>
<hr>    

<div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-10">
    <p class="h4"><u>Settings</u></p>
    <p class="h6">This section allows for general employee management basic customisation. </p></div>
  <!-- Button trigger modal -->
  <div class="col-md-2">
  <button type="button" class="btn btn-primary h-100 w-100"><i class="fa fa-plus"></i>
    Jump Section
  </button>
  </div></div></div>
  </div><br>

<div class="card">
  <div class="card-body">
<form action="emp_required_field.php" method="post">
  <h5 class="brand">Required Fields (Registration Form)</h5><hr>
  <h6>Personal Info</h6>

  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="require_name" id="flexSwitchCheckChecked" 
    <?php 
      echo ($rowRequiredFields['require_name'] == 1) ? 'checked' : '';
    ?>>
    <label class="form-check-label" for="require_name">Name</label>
</div>

<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="require_nric" id="flexSwitchCheckChecked" 
    <?php 
      echo ($rowRequiredFields['require_nric'] == 1) ? 'checked' : '';
    ?>>
    <label class="form-check-label" for="require_nric">NRIC</label>
</div>
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="require_phone" id="flexSwitchCheckChecked" 
    <?php 
      echo ($rowRequiredFields['require_phone'] == 1) ? 'checked' : '';
    ?>>
    <label class="form-check-label" for="require_phone">Phone</label>
</div>
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="require_email" id="flexSwitchCheckChecked" disabled>
    <label class="form-check-label" for="require_email">Email Address</label>
</div>
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="require_admin" id="flexSwitchCheckChecked" disabled>
    <label class="form-check-label" for="require_admin">Admin Access</label>
</div>
<br>
<h6>Employment Info</h6>
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="require_designation" id="flexSwitchCheckChecked" 
    <?php 
      echo ($rowRequiredFields['require_designation'] == 1) ? 'checked' : '';
    ?>>
    <label class="form-check-label" for="require_designation">Designation</label>
</div>
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="require_department" id="flexSwitchCheckChecked" 
    <?php 
      echo ($rowRequiredFields['require_department'] == 1) ? 'checked' : '';
    ?>>
    <label class="form-check-label" for="require_department">Department</label>
</div>
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="require_contract_type" id="flexSwitchCheckChecked" 
    <?php 
      echo ($rowRequiredFields['require_contract_type'] == 1) ? 'checked' : '';
    ?>>
    <label class="form-check-label" for="require_contract_type">Contract Type</label>
</div>
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="require_status" id="flexSwitchCheckChecked" 
    <?php 
      echo ($rowRequiredFields['require_status'] == 1) ? 'checked' : '';     
    ?>>
    <label class="form-check-label" for="require_status">Status</label>
</div>
<br>
<h6>Leave Info</h6>
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="require_al" id="flexSwitchCheckChecked" 
    <?php 
      echo ($rowRequiredFields['require_al'] == 1) ? 'checked' : '';
    ?>>
    <label class="form-check-label" for="require_al">AL</label>
</div>
<div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="require_mc" id="flexSwitchCheckChecked" 
    <?php 
      echo ($rowRequiredFields['require_mc'] == 1) ? 'checked' : '';
    ?>>
    <label class="form-check-label" for="require_mc">MC</label>
</div>
<br>
<button type="submit" class="btn btn-primary btn-sm">Save Changes</button>
</form>
</div>
</div><br>

      <div class="card">
      <div class="card-body"> 
        <h5 class="brand">More Options</h5><hr>
        <div class="row g-4 py-3 row-cols-1 row-cols-lg-3">
          
      <div class="row d-flex align-items-start ">
        <div class="text-center m-4">
          <div class="card">  
            <span class=" text-bg-primary">Active: 
            <?php
                // SQL query to count total rows in the table
    $total_departments = "SELECT COUNT(*) AS totalRows FROM opt_department";
    
    // Prepare and execute the query
    $stmt = $pdo->prepare($total_departments);
    $stmt->execute();

    // Fetch the result as an associative array
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalRows = $row["totalRows"];

    if ($totalRows > 0) {
        echo $totalRows;
    } else {
        echo "None";
    }
            

            
            ?>
           </span><br><br>
          <i class="fa-solid fa-people-group fa-2xl"></i><br>
          <h5 class="text-body-emphasis m-2">Department</h5>
          <div class="m-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed sequi ipsa aspernatur nobis eos 
            voluptatibus soluta pariatur fuga, magni repellat!
          </div>
          <a href="emp_settings_department.php" class="btn btn-primary btn-sm m-4">
          
          <i class="fa fa-gears"></i>
          Modify  
          </a>
        </div>
        </div>
      </div>
      
      <div class="row d-flex align-items-start">
        <div class="text-center m-4">
          <div class="card">  
            <span class="text-bg-primary">Active: 
            <?php
                // SQL query to count total rows in the table
    $total_contract_type = "SELECT COUNT(*) AS totalRows FROM opt_contract_type";
    
    // Prepare and execute the query
    $stmt = $pdo->prepare($total_contract_type);
    $stmt->execute();

    // Fetch the result as an associative array
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalRows = $row["totalRows"];

    if ($totalRows > 0) {
        echo $totalRows;
    } else {
        echo "None";
    }
            

            
            ?></span><br><br>
          <i class="fa-solid fa-file-signature fa-2xl"></i><br>
          <h5 class="text-body-emphasis m-2">Contract Type</h5>
          <div class="m-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed sequi ipsa aspernatur nobis eos 
            voluptatibus soluta pariatur fuga, magni repellat!
          </div>
          <a href="emp_settings_contract_type.php" class="btn btn-primary btn-sm m-4">
          
          <i class="fa fa-gears"></i>
          Modify  
          </a>
        </div>
        </div>
      </div>
      <div class="row d-flex align-items-start ">
        <div class="text-center m-4">
          <div class="card">  
            <span class=" text-bg-primary">Active: 
            <?php
                // SQL query to count total rows in the table
    $total_status = "SELECT COUNT(*) AS totalRows FROM opt_status";
    
    // Prepare and execute the query
    $stmt = $pdo->prepare($total_status);
    $stmt->execute();

    // Fetch the result as an associative array
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalRows = $row["totalRows"];

    if ($totalRows > 0) {
        echo $totalRows;
    } else {
        echo "None";
    }
            

            
            ?>
            </span><br><br>
          <i class="fa-solid fa-file-signature fa-2xl"></i><br>
          <h5 class="text-body-emphasis m-2">Status</h5>
          <div class="m-2">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed sequi ipsa aspernatur nobis eos 
            voluptatibus soluta pariatur fuga, magni repellat!
          </div>
          <a href="emp_settings_status.php" class="btn btn-primary btn-sm m-4">
           
          <i class="fa fa-gears"></i>
          Modify  
          </a>
        </div>
        </div>
      </div>
      
    </div>
    </div>
</div>
            
</div></div>

<br>


    </div><br>
</div>



</div></div></div>
</form>



</main>
<?php
    } else {
        include "blocked.php"; // Action if admin is false
    }
} else {
    include "logout.php"; // If no session
}