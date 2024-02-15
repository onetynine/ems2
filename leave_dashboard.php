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
      <form id="delete-form" action="leave_delete.php" method="post">
    <div class="card-body">Are you sure to remove this leave permanently?</div>
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
    document.getElementById('delete-form').action = 'leave_delete.php?leave_id=' + leaveId;
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
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Leave</li>
    <li class="breadcrumb-item " aria-current="page"><a href="emp_settings.php">Dashboard</a></li>
  </ol>
</nav>
<hr>   
<div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-10">
    <p class="h4"><u>Leave Dashboard</u></p>
    <p class="h6">Leave information for all employees.</p></div>
  <!-- Button trigger modal -->
  <div class="col-md-2">
  <button type="button" class="btn btn-primary h-100 w-100"><i class="fa fa-plus"></i>
    Add New Leave
  </button>
  </div></div></div>
  </div><br>

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