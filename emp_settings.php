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


<div class="card">
  <div class="card-body">
<form>
  <h5 class="brand">Required Fields (Registration Form)</h5><hr>
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

<?php 

?>


            
</div></div>

<br>


    </div><br>
</div>



</div></div></div>
</form>



</main>
