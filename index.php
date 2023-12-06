<?php

require "conn.php";

// Directly query the database for user information
$sql = "SELECT *
        FROM employee";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all rows into an associative array
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mx-auto">
    <div class="row">
    <div class="col-md-3">
       <?php include "header.php"; ?>
    </div>
<style>
    .content{
        margin-top: 35px;
    }
    html[data-bs-theme="dark"] div.dtsp-panesContainer div.dtsp-searchPane div.dataTables_wrapper div.dataTables_scrollBody {
  background: var(--bs-table-bg) !important;
}
</style>

<div class="col-md-8 pt-4 mt-5 mx-auto">
      
    <h3>Dashboard</h3><hr>
    <div class="text-start">
            <h5>Employee</h5>
            <span> Displays employee information in table form. Search, filter and edit individually. </span>
            <br>
        </div>
    <div class="table mt-4">
        <table id="info" class="table table-hover table-responsive" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Start Date</th>                
                    <th>End Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                    <td><?php echo $user["emp_id"]; ?></td>
                    <td><?php echo $user["emp_name"]; ?></td>
                    <td><?php echo $user["emp_phone"]; ?></td>
                    <td><?php echo $user["emp_email"]; ?></td>
                    <td><?php echo $user["emp_status"]; ?></td>
                    <td><?php echo $user["emp_designation"]; ?></td>
                    <td><?php echo $user["emp_department"]; ?></td>
                    <td><?php echo $user["emp_start_date"]; ?></td>                   
                    <td><?php echo $user["emp_end_date"]; ?></td>  

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table></div>
                </div>
    </div>
</div></div></div>

<?php include "footer.php"; ?>

</body>
</html>

<style>
    .icon-link i {
    margin-right: 12px;
}


</style>

<script>
$(document).ready(function() {
    $('#info').DataTable({
        responsive: true,
        dom: 'Plfrtip',
        
        searchPanes: {
            initCollapsed: true
        },
        
        columnDefs: [
        {
            searchPanes: {
                show: true
                
            },
            targets: [3,4,5]
        },
        {
            searchPanes: {
                show: false
            },
            targets: [0]
        }
        
    ],
    
    
            });
});
</script>

 