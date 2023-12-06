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


       <?php include "header.php"; ?>
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
<style>
    .content{
        margin-top: 35px;
    }
    html[data-bs-theme="dark"] div.dtsp-panesContainer div.dtsp-searchPane div.dataTables_wrapper div.dataTables_scrollBody {
  background: var(--bs-table-bg) !important;
}
</style>

      <br>
    <h3>Dashboard</h3><hr>
    <div class="text-start">
            <h5>Employee <a href="emp_detail.php">Detailed View</a></h5>
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
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Contract Type</th>
                    <th>Current Tenure</th> 
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user["emp_id"]; ?></td>
                    <td><?php echo $user["emp_name"]; ?></td>
                    <td><?php echo $user["emp_phone"]; ?></td>
                    <td><?php echo $user["emp_email"]; ?></td>
                    <td><?php echo $user["emp_designation"]; ?></td>
                    <td><?php echo $user["emp_department"]; ?></td>   
                    <td><?php echo $user["emp_contract_type"]; ?></td> 
                    <td>
                        <?php
                        // Calculate the number of days from emp_start_date to today (chatGPT)
                        $startDate = new DateTime($user["emp_start_date"]);
                        $today = new DateTime();
                        $daysDifference = $startDate->diff($today)->days;
                        echo $daysDifference . " days";
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table></div>
                </div>
    </div>
</div></div></div>

</main>
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
        scrollX: true,
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

 