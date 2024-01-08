<?php
require 'conn.php';


// Directly query the database for user information
$sql = "SELECT *
        FROM opt";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all rows into an associative array
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


        
       <?php include "header.php"; 
       ?>
       
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <br> 
     
<h3>Settings</h3><hr>
<p>Instead of hard-coding the options, we let the users to maintain it instead. So they do not have to 
  check with vendor every time they need to set it up, or redo.
</p>

<form>
  <h5 class="brand">Required Fields (Registration Form)</h5><br>
  <h6>Personal Info</h6>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" name="emp_admin_access" id="emp_admin_access">
  <label class="form-check-label" for="emp_admin_access">Name</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" name="emp_admin_access" id="emp_admin_access">
  <label class="form-check-label" for="emp_admin_access">NRIC</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" name="emp_admin_access" id="emp_admin_access">
  <label class="form-check-label" for="emp_admin_access">Phone</label>
</div><br>
<h6>Employment Info</h6>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" name="emp_admin_access" id="emp_admin_access">
  <label class="form-check-label" for="emp_admin_access">Designation</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" name="emp_admin_access" id="emp_admin_access">
  <label class="form-check-label" for="emp_admin_access">Department</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" name="emp_admin_access" id="emp_admin_access">
  <label class="form-check-label" for="emp_admin_access">Contract Type</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" name="emp_admin_access" id="emp_admin_access">
  <label class="form-check-label" for="emp_admin_access">Status</label>
</div><br>
<h6>Leave Info</h6>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" name="emp_admin_access" id="emp_admin_access">
  <label class="form-check-label" for="emp_admin_access">Current Annual Leave</label>
</div>
<div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" name="emp_admin_access" id="emp_admin_access">
  <label class="form-check-label" for="emp_admin_access">Current Medical Leave</label>
</div>

</form>


        <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="col d-flex align-items-start">
        <div>
          <h5 class="text-body-emphasis">Department</h5>
          <a href="emp_settings_department.php" class="btn btn-primary "><i class="fa fa-gears"></i>
          Modify
          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div>
          <h5 class="text-body-emphasis">Contract Type</h5>
          <a href="emp_settings_contract_type.php" class="btn btn-primary "><i class="fa fa-gears"></i>
          Modify
          </a>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        <div>
          <h5 class="text-body-emphasis">Status</h5>
          <a href="emp_settings_status.php" class="btn btn-primary "><i class="fa fa-gears"></i>
          Modify
          </a>
        </div>
      </div>
    </div>



<?php 

?>


            
</div></div>

<br>


    </div><br>
</div>



</div></div></div>
</form>



</main>
