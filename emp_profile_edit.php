<?php
require 'conn.php';


// getting the data for select options
try {
    // Fetch departments from the database
    $departmentQuery = "SELECT * FROM opt_department";
    $departmentResult = $pdo->query($departmentQuery);

    // Fetch contract types from the database
    $contractTypeQuery = "SELECT * FROM opt_contract_type";
    $contractTypeResult = $pdo->query($contractTypeQuery);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sqlRequiredFields = "SELECT * FROM required_fields";
$stmtRequiredFields = $pdo->prepare($sqlRequiredFields);
$stmtRequiredFields->execute();

// Fetch the data from the query
$rowRequiredFields = $stmtRequiredFields->fetch(PDO::FETCH_ASSOC);

if (isset($_GET['emp_id'])) {
  $emp_id = $_GET['emp_id'];

  try{
$sqlEmp = "SELECT * FROM employee WHERE emp_id = :emp_id";
$stmtEmp = $pdo->prepare($sqlEmp);

$stmtEmp->bindParam(':emp_id', $emp_id);
$stmtEmp->execute();

// Fetch the data from the query
$user = $stmtEmp->fetch(PDO::FETCH_ASSOC);

if ($user) {
} else {
  // Handle the case when user data is not found
  throw new Exception("User not found");
}
} catch (Exception $e) {
// Log the error or display a user-friendly message
echo "Error: {$e->getMessage()}";
exit();
}
} else {
// Handle the case when email parameter is not set
echo "Id parameter is missing";
exit();
}

?>
        
       <?php include "header.php"; 
 
      
       ?>
       
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"> <br> 
        <?php
              if (isset($_GET['success']) && $_GET['success'] == 'true') {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Update successful!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
              }
        ?>
 
     
<h3>Edit Profile</h3><hr>
<form action="emp_profile_process.php" method="post" class="needs-validation" novalidate>

<?php 

?>

<!-- Personal Info Section --> 
<section class="text-start row setup-content" id="step-1">
<div class="tab">
    <div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title">Personal Info</h5>
    <p class="card-text">Let's start with some basic info.</p>
  </div>
<div class="card-body">
<div class="form-floating mb-3">
        <input value="<?php echo $user["emp_name"];?>" type="text" class="form-control" id="emp_name" placeholder="emp_name" name="emp_name"      
        <?php 
        echo ($rowRequiredFields['require_name'] == 1) ? 'required' : '';
        ?>
        ><label for="emp_name">Name</label>
        <div class="invalid-feedback">
        Please type a valid name.
        </div>
    </div>

    <div class="form-floating mb-3">
        <input value="<?php echo $user["emp_nric"];?>" type="text" class="form-control" id="emp_nric" placeholder="NRIC" name="emp_nric"
        <?php 
        echo ($rowRequiredFields['require_nric'] == 1) ? 'required' : '';
        ?>   
        ><label for="emp_nric">NRIC</label>
        <div class="invalid-feedback">
        Please type a valid IC Number (eg. 880818-08-8888).
        </div>
    </div>

    <div class="form-floating mb-3">
        <input value="<?php echo $user["emp_phone"];?>" type="tel" class="form-control" id="emp_phone" placeholder="phone" name="emp_phone"
        <?php 
        echo ($rowRequiredFields['require_phone'] == 1) ? 'required' : '';
        ?>
        ><label for="emp_phone">Phone</label>      
    </div>
  
    <div class="form-floating mb-3">
    <input value="<?php echo $user["emp_email"];?>" type="email" class="form-control" id="emp_email" placeholder="name@example.com" name="emp_email" required onkeyup="checkDuplicateEmail()">
    <label for="emp_email">Email address</label>
    <div class="invalid-feedback">
    Please type a valid email address (eg. test@gmail.com).
    </div>
    </div>


    <div class="form-check form-switch">
  <input value="<?php echo $user["emp_admin_access"];?>" class="form-check-input" type="checkbox" role="switch" name="emp_admin_access" id="emp_admin_access">
  <label class="form-check-label" for="emp_admin_access">Admin Access</label>
</div>
<br>

</div></div></div>

</section><br>
    <!-- Employment Info Section --> 
    <section class="text-start row setup-content" id="step-2">
    <div class="tab">
            <!-- Card Source: https://getbootstrap.com/docs/5.3/components/card/ -->
    <div class="card" style="width: 100%;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Employment Info</h5>
    <p class="card-text">Please fill up staff information correctly.</p>
  </div>
<div class="card-body">
  <input type="hidden" name="emp_id" value="<?php echo $user["emp_id"];?>" >
        <div class="form-floating mb-3">
            <input value="<?php echo $user["emp_designation"];?>" type="text" class="form-control" id="floatingInput" placeholder="emp_designation" name="emp_designation"
            <?php 
            echo ($rowRequiredFields['require_designation'] == 1) ? 'required' : '';
            ?>
            ><label for="floatingInput">Designation</label>
        </div>
        <div class="form-floating mb-3">
        <select class="form-select" id="empDepartment" name="emp_department"    
        <?php 
         echo ($rowRequiredFields['require_department'] == 1) ? 'required' : '';
            ?>
            >
            <option value="<?php echo $user["emp_department"];?>" selected disabled><?php echo $user["emp_department"];?></option>
            <?php
            try {
                // Fetch departments from the database
                $departmentQuery = "SELECT * FROM opt_department";
                $departmentResult = $pdo->query($departmentQuery);

                while ($department = $departmentResult->fetch(PDO::FETCH_ASSOC)) {
                    if (isset($department['opt_department_id'], $department['opt_department_name'])) {
            ?>
                        <option value="<?php echo $department['opt_department_name']; ?>"><?php echo $department['opt_department_name']; ?></option>
            <?php
                    }
                }
            } catch (PDOException $e) {
                echo "Query failed: " . $e->getMessage();
            }
            ?>
        </select>
            <label for="empDepartment">Department</label>
        </div>

        <div class="form-floating mb-3">
        <select value="<?php echo $user["emp_contract_type"];?>" class="form-select" id="empDepartment" name="emp_contract_type"
        <?php 
            echo ($rowRequiredFields['require_contract_type'] == 1) ? 'required' : '';
            ?>
            >
            <option value="<?php echo $user["emp_contract_type"];?>" selected><?php echo $user["emp_contract_type"];?></option>
            <?php
            try {
                // Fetch departments from the database
                $contract_type_query = "SELECT * FROM opt_contract_type";
                $contract_type_result = $pdo->query($contract_type_query);

                while ($contract_type = $contract_type_result->fetch(PDO::FETCH_ASSOC)) {
                    if (isset($contract_type['opt_contract_type_id'], $contract_type['opt_contract_type_name'])) {
            ?>
                        <option value="<?php echo $contract_type['opt_contract_type_name']; ?>"><?php echo $contract_type['opt_contract_type_name']; ?></option>
            <?php
                    }
                }
            } catch (PDOException $e) {
                echo "Query failed: " . $e->getMessage();
            }
            ?>
        </select>
            <label for="contract_type">Contract Type</label>
        </div>

        
        <div class="row g-2"> 
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input value="<?php echo $user["emp_start_date"];?>" type="date"  class="form-control" id="floatingInput" placeholder="$" name="emp_start_date">
                    <label for="floatingInput">Start Date</label>
                </div>
            </div>

        </div>
        <div class="form-floating mb-3">
        <select  class="form-select" id="empStatus" name="emp_status"
        <?php 
            echo ($rowRequiredFields['require_status'] == 1) ? 'required' : '';
            ?>
            >
            <option value="<?php echo $user["emp_status"];?>" selected><?php echo $user["emp_status"];?></option>
            <?php
            try {
                // Fetch departments from the database
                $status_query = "SELECT * FROM opt_status";
                $status_result = $pdo->query($status_query);

                while ($status = $status_result->fetch(PDO::FETCH_ASSOC)) {
                    if (isset($status['opt_status_id'], $status['opt_status_name'])) {
            ?>
                        <option value="<?php echo $status['opt_status_name']; ?>"><?php echo $status['opt_status_name']; ?></option>
            <?php
                    }
                }
            } catch (PDOException $e) {
                echo "Query failed: " . $e->getMessage();
            }
            ?>
        </select>
            <label for="contract_type">Status</label>
        </div>
</div>
</div>
</section><br>

    <section class="text-start row setup-content" id="step-3">    
    <br>
    <div class="tab">
    <div class="card" style="width: 100%;">

  <div class="card-body">
    <h5 class="card-title">Social Media Info</h5>
    <p class="card-text"> Initial leave days will be added automatically to the employee every 1st day of the year.
    </p>
  </div>
<div class="card-body">

<div class="card-group">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Annual Leave</h5>
      <p class="card-text">Set amount of annual leave.</p>
        <div class="col-md">
            <div class="form-floating mb-3">
                    <input value="<?php echo $user["emp_al"];?>" type="number" class="form-control" id="floatingInput" placeholder="emp_al" name="emp_al"
                    <?php 
                    echo ($rowRequiredFields['require_al'] == 1) ? 'required' : '';
                    ?> >          
                    <label for="floatingInput">Current Annual Leave (in days)</label>
            </div>
        </div>
        <p class="card-text"><small class="text-body-secondary">
        Annual leave provides paid time off, promoting employee well-being and work-life balance. </small></p>
    </div>
    
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Medical Leave</h5>
      <p class="card-text">Set amount of medical leave.</p>

        <div class="col-md">
            <div class="form-floating mb-3">
                    <input value="<?php echo $user["emp_mc"];?>" type="number" class="form-control" id="floatingInput" placeholder="emp_mc" name="emp_mc"
                    <?php 
                    echo ($rowRequiredFields['require_mc'] == 1) ? 'required' : '';
                    ?> >
                    <label for="floatingInput">Current Medical Leave (in days)</label>
            </div>
            <p class="card-text"><small class="text-body-secondary">
            Medical leave offers paid time off for health needs, supporting employees without financial strain. </small></p>
        </div>

    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <p class="card-text">Maternity Leave</p>
      <p class="card-text"><small class="text-body-secondary">As of 2020, the maternity leave entitlement for new mothers is not less than 60 
        consecutive days of fully paid leave. Companies can also extend the leave beyond this initial period, but without pay.</small></p>
      <p class="card-text">Emergency Leave</p>
      <p class="card-text"><small class="text-body-secondary">Emergency leave in Malaysia allows employees to take unplanned time off for 
        urgent situations, such as family emergencies or personal crises, with specific details outlined in employment contracts or company policies.</small></p>

      <p class="card-text"><small class="text-body-secondary"><a href="#">Click here</a>  to learn more about company policy on leaves.</small></p>

    </div>
    
  </div>
</div>

<br>
 <button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>


</section> 

            
</div></div>

<br>


    </div><br>
</div>



</div></div></div>
</form>



</main>

<script>

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()





</script>

