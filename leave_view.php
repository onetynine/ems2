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
    <p>Requested by: <?php echo $user['leave_name']; ?></p>
    <p>Time of Request: <?php echo $user['leave_request_time']; ?></p>
    <p>Leave Type: <?php echo $user['leave_type']; ?></p>
    <p>Leave Reason: <?php echo $user['leave_reason']; ?></p>
    <p>Leave Status: <?php echo $user['leave_approve_status']; ?></p>
    <p>Leave Start Date: <?php echo $user['leave_start_date']; ?></p>
    <p>Leave End Date: <?php echo $user['leave_end_date']; ?></p>
<p>Leave Remaining: </p>

<a type="button" class="btn btn-primary">Change Status</a>
<a type="button" class="btn btn-primary">Edit</a>
<a type="button" class="btn btn-primary">Leave History</a>
    </div>
</main>