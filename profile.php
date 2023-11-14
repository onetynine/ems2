<?php

require 'conn.php';


if (isset($_SESSION['data_updated']) && $_SESSION['data_updated']) {
    ?>

<div class="alert alert-success alert-dismissible fade show text-center" role="alert" >
  <strong>Data has been successfully updated!</strong> You should check in on some of those fields below.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<?php
$_SESSION['data_updated'] = false;
} ?>

<?php
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    try {
        // Fetch user information from userinfo and empinfo tables based on the email
        $sql = "SELECT userinfo.*, empinfo.*
                FROM userinfo
                LEFT JOIN empinfo ON userinfo.email = empinfo.email
                WHERE userinfo.email = :email";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // Handle the case when user data is not found
            throw new Exception("User not found");
        }
    } catch (Exception $e) {
        // Handle the exception, log it, or display a user-friendly message
        echo "Error: {$e->getMessage()}" ;
        exit();
    }
} else {
    // Handle the case when email parameter is not set
    echo "Email parameter is missing";
    exit();
}

?>
<div class="container mx-auto">
    <div class="row">
    <div class="col-md-3">
       <?php include "header.php"; ?>
    </div>
   
    <div class="col-md-8 pt-4 mt-5 text-center mx-auto">
    <div class="card align-items-center">
    <img src="assets/profile.jpeg" class="rounded-circle mt-3" style="width: 100px;" alt="...">
    <span><h4 class="font-weight-bold"><br><?php echo strtoupper($user['name']); ?> </h4>
    <p class="text-uppercase font-size-smaller"><?php echo strtoupper($user['designation']); ?> | EMS Demo   <span class="badge bg-success-subtle text-success-emphasis rounded-pill">Online</span> </p>
    </div>

        <div class="mt-3">

        <a href="mailto:<?php echo $user['email']; ?>" class="btn btn-link" title="Email">
            <i class="far fa-envelope"></i>
        </a>

        <!-- LinkedIn -->
        <a href="<?php echo $user['linkedin']; ?>" class="btn btn-link" target="_blank" title="LinkedIn">
            <i class="fab fa-linkedin"></i>
        </a>

        <!-- WhatsApp -->
        <a href="https://wa.me/<?php echo $user['phone']; ?>" class="btn btn-link" target="_blank" title="WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>

        <!-- Facebook -->
        <a href="<?php echo $user['facebook']; ?>" class="btn btn-link" target="_blank" title="Facebook">
            <i class="fab fa-facebook"></i>
        </a>


</div>
<div class="container text-center">
  <div class="row row-cols-4">
    <button href="editprofile.php?email=<?php echo $user['email']; ?>" class="btn btn-dark border rounded-0 p-2">Edit</button>
    <button class="btn btn-dark border rounded-0">Leave</button>
    <button class="btn btn-dark border rounded-0">Performance</button>
    <button class="btn btn-dark border rounded-0" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Tooltip on top">Print</button>
  </div>
</div>

        <!-- <ul class="nav">
        <li class="nav-item">
        <a class="nav-link" href="editprofile.php?email=<?php echo $user['email']; ?>">
        <i class="fas fa-edit"></i> Edit
        </a>
        </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-print"></i> Reports</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-sign-out-alt"></i> Leave</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fas fa-chart-line"></i> KPI</a>
            </li>
        </ul> -->
        
        <div class="card mt-4 ">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link active" aria-current="true" href="#">Personal Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Employment Info</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#" >Social Media Info</a>
      </li>
    </ul>
  </div>

  <div class="card-body text-start">
    <div class="row">
        <div class="col-md-6">
            <h6 class="card-title">Name</h6>
                <p class="card-text"><?php echo $user['name']; ?></p>
            <h6 class="card-title">Phone</h6>
                <p class="card-text"><?php echo $user['phone']; ?></p>
            <h6 class="card-title">Email</h6>
                <p class="card-text"><?php echo $user['email']; ?></p>
            <h6 class="card-title">Name</h6>
                <p class="card-text"><?php echo $user['name']; ?></p>
        </div>
        <div class="col-md-6">
            <h6 class="card-title">Name</h6>
                <p class="card-text"><?php echo $user['name']; ?></p>
            <h6 class="card-title">Phone</h6>
                <p class="card-text"><?php echo $user['phone']; ?></p>
            <h6 class="card-title">Email</h6>
                <p class="card-text"><?php echo $user['email']; ?></p>
            <h6 class="card-title">Name</h6>
                <p class="card-text"><?php echo $user['name']; ?></p>
        </div>
    </div>
</div>
</div>

<!-- 
<div class="card mt-4">
    <div class="card-header">
        <h5>Personal Info</h5>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-6">
                <p>Name: <?php echo $user['name']; ?></p>
                
                <p>Phone: <?php echo $user['phone']; ?></p>
                <p>Email: <?php echo $user['email']; ?></p>
            </div>


            <div class="col-md-6">
                <p>NRIC: <?php echo $user['nric']; ?></p>
                <p>Address: <?php echo $user['address']; ?></p>
            </div>
        </div>
    </div>
</div> -->

<!-- Employment Info Section -->
<!-- <div class="card mt-4">
    <div class="card-header">
        <h6>Employment Info</h6>
    </div>
    <div class="card-body">
        <div class="row">

            <div class="col-md-6">
            <p>Start Date: <?php echo $user['startdate']; ?></p>
            <p>End Date: <?php echo $user['enddate']; ?></p>
            <p>Status: <?php echo $user['status']; ?></p>
            </div>


            <div class="col-md-6">
            <p>Designation: <?php echo $user['designation']; ?></p>
                <p>Department: <?php echo $user['department']; ?></p>
                <p>EPF No: <?php echo $user['epfno']; ?></p>
            </div>
        </div>
    </div>
</div> -->
</div>
</div></div>
<?php
include "footer.php";
?>
