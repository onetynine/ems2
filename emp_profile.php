<?php

require "conn.php";

if (isset($_GET['emp_id'])) {
  $emp_id = $_GET['emp_id'];

  try {
      // Fetch user information from userinfo and empinfo tables based on the id
      $sql = "SELECT *
              FROM employee
              WHERE emp_id = :emp_id";

      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':emp_id', $emp_id);
      $stmt->execute();

      if ($stmt->rowCount() > 0) {
          $user = $stmt->fetch(PDO::FETCH_ASSOC);
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
  // Handle the case when id parameter is not set
  echo "id parameter is missing";
  exit();
}
?>

       <?php include "header.php"; ?>
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


      <br>
    <h3>Employee Profile</h3><hr>
    <div class="text-start">
            <h5>Viewing <?php echo $user['emp_name'] ?>'s profile</h5>
            <span> Displays an employee details, including leave and performance info.</span>
            <br>
        </div>
        <br>
        <style>
          .fa {
            color: inherit; /* or specify your desired color */
            text-decoration: none; /* optional: remove underline */
          }
        </style>
        <div class="card">
    <div class="row no-gutters">

        <div class="col-md-8">
            <!-- Right side for other texts -->
            <div class="card-body">
                <h3 class="card-title"><?php echo $user['emp_name'] ?></h3>
                <h5 class="card-text"><?php echo $user['emp_designation'] ?></h5>
                <p>Connect with me:</p>
                <a href="https://github.com" class="fa fa-github p-2"> </a>
                <i class="fa fa-facebook p-2"> </i>
                <i class="fa fa-twitter p-2"> </i>
                <i class="fa fa-linkedin p-2"> </i>
                <i class="fa fa-whatsapp p-2"> </i>
            </div>
        </div>
        <style>
          .card-img{
            border-radius: 50%;
            width: 155px;
            margin: 15px;                   
          }
        </style>
        <div class="col-md-4 d-flex justify-content-end">
            <img src="assets/profile.jpeg" class="card-img" alt="Profile Photo">
        </div>
    </div>
</div>
<br>

<div class="bd-example m-0 border-0">
        <nav>
          <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="false" tabindex="-1">Employee</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false" tabindex="-1">Leave</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="true">Performance</button>
            <button class="nav-link" id="nav-claim-tab" data-bs-toggle="tab" data-bs-target="#nav-claim" type="button" role="tab" aria-controls="nav-claim" aria-selected="true">Claim</button>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
          <ul class="list-group list-group-flush">
          <strong>Personal Info </strong>
            <li class="list-group-item"><strong>Name:</strong> <?php echo $user['emp_name'] ?></li>
            <li class="list-group-item"><strong>Contact:</strong> <?php echo $user['emp_phone'] ?></li>
            <li class="list-group-item"><strong>Email:</strong> <?php echo $user['emp_email'] ?></li>
            <li class="list-group-item"><strong>NRIC:</strong> <?php echo $user['emp_nric'] ?></li>
            <li class="list-group-item"><strong>Admin:</strong> <?php echo $user['emp_admin_access'] ?></li> <br>
          <strong>Employment Info </strong>
            <li class="list-group-item"><strong>Designation:</strong> <?php echo $user['emp_designation'] ?></li>
            <li class="list-group-item"><strong>Department:</strong> <?php echo $user['emp_department'] ?></li>
            <li class="list-group-item"><strong>Contract Type:</strong> <?php echo $user['emp_contract_type'] ?></li>
            <li class="list-group-item"><strong>Status:</strong> <?php echo $user['emp_status'] ?></li>
            <li class="list-group-item"><strong>Start Date:</strong> <?php echo $user['emp_start_date'] ?></li><br>
            <div class="btn-group col-4">
            
            <button type="button" class="btn btn-sm btn-primary m-2"><i class="fa fa-gear"></i>  Edit Profile</button>
            <button type="button" class="btn btn-sm btn-primary m-2"><i class="fa fa-book"></i>  Archive</button>
            <div class="btn-group col-4" role="group">
            <button type="button" class="btn btn-sm btn-primary m-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-gear"></i> Print
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Dropdown link</a></li>
              <li><a class="dropdown-item" href="#">Dropdown link</a></li>
            </ul>
          </div>
                  </div>          

          </ul>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
          <ul class="list-group list-group-flush">
            
            <strong>Annual Leave </strong>
            <li class="list-group-item">Remaining: <?php echo $user['emp_phone'] ?></li>
            <li class="list-group-item">Yearly Entitlement: <?php echo $user['emp_al'] ?></li><br>
            <strong>Medical Leave</strong>
            <li class="list-group-item">Remaining: <?php echo $user['emp_phone'] ?></li>
            <li class="list-group-item">Yearly Entitlement: <?php echo $user['emp_email'] ?></li><br>
            <strong>Emergency Leave</strong>
            <li class="list-group-item">Remaining: <?php echo $user['emp_phone'] ?></li>
            <li class="list-group-item">Yearly Entitlement: <?php echo $user['emp_email'] ?></li><br>
            <div class="btn-group col-4">
            <button type="button" class="btn btn-sm btn-primary m-2"><i class="fa fa-search"></i>  View Leave Details</button>
            <button type="button" class="btn btn-sm btn-primary m-2"><i class="fa fa-gear"></i>  Edit Leave Details</button>
            <button type="button" class="btn btn-sm btn-primary m-2"><i class="fa fa-book"></i>  View Leave History</button>

          </div>

          </ul>          </div>
          <div class="tab-pane fade active show" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
          KPI/Performance is WIP*
        </div>
        <div class="tab-pane fade active show" id="nav-claim" role="tabpanel" aria-labelledby="nav-claim-tab">
          Claim is WIP*
        </div>
        </div>
        </div>
</main>
</body>
</html>


 