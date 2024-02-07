<?php 

include "conn.php";
if (isset($_GET['leave_id'])) {
    $leave_id = $_GET['leave_id'];
  
    try {
        // Fetch user information from userinfo and empinfo tables based on the id
        $sql = "SELECT *
                FROM leave_info
                WHERE leave_id = :leave_id";
  
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':leave_id', $leave_id);
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

       include "header.php"; ?>
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


      <br>
    <h3>View Leave</h3><hr>
<div class="row">
    <div class="col-md-8">
<div class="card mb-3">
<div class="card-header">
  Leave Details
  </div>
  <div class="card-body">
    <p class="card-text"><strong>Requested by:</strong> <?php echo $user['leave_name']; ?></p>
    <p class="card-text"><strong>Time of Request:</strong> <?php echo $user['leave_request_time']; ?></p>
    <p class="card-text"><strong>Leave Type:</strong> <?php echo $user['leave_type']; ?></p>
    <p class="card-text"><strong>Leave Reason:</strong> <?php echo $user['leave_reason']; ?></p>
    <p class="card-text"><strong>Leave Status:</strong> <?php echo $user['leave_approve_status']; ?></p>
    <p class="card-text"><strong>Leave Start Date:</strong> <?php echo $user['leave_start_date']; ?></p>
    <p class="card-text"><strong>Leave End Date:</strong> <?php echo $user['leave_end_date']; ?></p>
    <p class="card-text"><strong>Leave Duration: </strong>
    <?php // ref: https://www.php.net/manual/en/datetime.diff.php
    $endDate = new DateTime($user['leave_end_date']); 
    $startDate = new DateTime($user['leave_start_date']); 
    
    $durationLeave = $startDate->diff($endDate);
    echo $durationLeave->format('%a days');
    ?>    
    </p>


<a type="button" class="btn btn-primary">Change Status</a>
<a type="button" class="btn btn-primary">Edit</a>
<a type="button" class="btn btn-primary">Leave History</a>
    </div>
    </div></div>

    <div class="col-md-4">
    <div class="card mb-3">
  <div class="card-header">
  <?php echo $user['leave_name']; ?>'s Leave Balance
  </div>
  <div class="card-body">
    <p class="card-text">Remaining Annual Leave: <span class="badge rounded-pill text-bg-success">2 days</span></p>
    <p class="card-text">Remaining Medical Leave: <span class="badge rounded-pill text-bg-danger">0 days</span></p>
  </div>
</div>
</div>
</div>
</main>