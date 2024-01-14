<?php
require 'conn.php';
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
  <br>     
<h3>Settings</h3><hr>
<p>Instead of hard-coding the options, we let the users to maintain it instead. So they do not have to 
  check with vendor every time they need to set it up, or redo.
</p>


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
            <span class=" text-bg-primary">Active: 4</span><br><br>
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
            <span class="text-bg-primary">Active: 4</span><br><br>
          <i class="fa-solid fa-file-signature fa-2xl"></i><br>
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
      <div class="row d-flex align-items-start ">
        <div class="text-center m-4">
          <div class="card">  
            <span class=" text-bg-primary">Active: 4</span><br><br>
          <i class="fa-solid fa-file-signature fa-2xl"></i><br>
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
