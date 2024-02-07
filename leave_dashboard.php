<?php
session_start();
require "conn.php";

if (isset($_SESSION['admin'])) {
    if($_SESSION['admin'] == true){


include "header.php";
/** if admin show all
 * else show a page to block their access
 */
// Directly query the database for user information
$sql = "SELECT *
        FROM leave_info
        ORDER BY leave_request_time desc";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all rows into an associative array
$leaves = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Modal -->
<div class="modal fade" id="confirmdelete" tabindex="-1" aria-labelledby="confirmdelete" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="confirmdelete">Confirm Delete</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="delete-form" action="leave_profile_delete.php" method="post">
    <div class="card-body">Are you sure to remove this user permanently?</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-book"></i> Move to Archive</button>
        <button type="submit" class="btn btn-danger"><i class="fa fa-minus"></i> Delete leaveloyee</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
function setleaveId(leaveId) {
    document.getElementById('delete-form').action = 'leave_profile_delete.php?leave_id=' + leaveId;
}
</script>


       
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><br>
       <?php  
       if (isset($_GET['success']) && $_GET['success'] == 'true') {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Update successful!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
      }
    //
    if (isset($_GET['delete']) && $_GET['delete'] == 'true') {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Done delete
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
      }
    
      ?>

      <br>
    <h3>Leave</h3><hr>
    <div class="text-start">
            <h5>View Mode: Summary / <a href="leave_detail.php">Detailed</a> </h5>
            <span> Displays leaveloyee information in table form. Search, filter and edit individually.</span>
            <br>
        </div>
    <div class="table mt-4">
        <table id="info" class="table table-hover table-responsive" style="width: 100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Request Time</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Approval</th>
                    <th>Approval By</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $counter = 1;
            foreach ($leaves as $leave): ?>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $leave["leave_request_time"]; ?></td> 
                    <td><?php echo $leave["leave_name"]; ?></td>
                    <td><?php echo $leave["leave_type"]; ?></td>
                    <td><?php echo $leave["leave_approve_status"]; ?></td>   
                    <td><?php echo $leave["leave_approve_by"]; ?></td> 
                    
                    
                    <td>
                    <div class="btn-group">
                <a href="leave_view.php?leave_id=<?php echo $leave['leave_id']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                    <i class="bi bi-person-badge"></i><span class="visually-hidden"></span>
                </a>
                <a href="leave_view_edit.php?leave_id=<?php echo $leave['leave_id']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Change Status">
                    <i class="bi bi-circle"></i>     <span class="visually-hidden"></span>
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#confirmdelete" class="btn btn-primary btn-sm" data-bs-placement="top" title="Delete" onclick="setleaveId(<?php echo $leave['leave_id']; ?>)">
                        <i class="bi bi-trash"></i>
                        <span class="visually-hidden"></span>
                    </a>

                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="More Options">
                    <i class="bi bi-three-dots"></i>
                    <span class="visually-hidden"></span>
                </button>
            </div>


                    </td>
                </tr>
            <?php 
            $counter++;
            endforeach; ?>
            </tbody>
        </table></div>
                </div>
    </div>
</div></div></div>

</main>
</body>
</html>


<script>
$(document).ready(function() {
    $('#info').DataTable({
        dom: "<'row'<'col-sm-12 d-flex justify-content-between'Bf>>" + 
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-4'l><'col-sm-8'pi>>",
        scrollX: true,
        responsive: true,
        select: true,
        buttons: [
            {
                text: 'Export as...',
                extend: 'collection',
                buttons: [
                    'csv', 'excel', 'pdf' , 'print'
                ]
            }
        ]
       
        
            });
});
</script>
<?php
    } else {
        include "blocked.php"; // Action if admin is false
    }
} else {
    include "logout.php"; // If no session
}