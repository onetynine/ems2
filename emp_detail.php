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

   <br>
       <h3>Employee</h3><hr>
    <div class="text-start">
            <h5>View Mode: <a href="emp_summary.php">Summary</a> / Detailed</h5>
            <h6> Current Wage Spending : RM100,000 / year</h6>
            <h6> Total Active Staff : 78</h6>
            <h6> Total Active Department : 6</h6>
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
                    <th>Status</th>
                    <th>Admin Access</th>
                    <th>NRIC</th>
                    <th>Start Date</th>
                    <th>End Date</th>
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
                    <td><?php echo $user["emp_status"]; ?></td> 
                    <td><?php echo $user["emp_admin_access"]; ?></td> 
                    <td><?php echo $user["emp_nric"]; ?></td> 
                    <td><?php echo $user["emp_start_date"]; ?></td> 
                    <td><?php echo $user["emp_end_date"]; ?></td>   
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
        dom: "<'row'<'col-sm-12 d-flex justify-content-between'Bf>>" + 
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-4'l><'col-sm-8'pi>>P",
        searchPanes: {
            searchPanes: true,
            initCollapsed: true,

        },
        columnDefs: [
            {
                searchPanes: {
                    show: true
                },
                targets: [0,1,2,3,4,5,6,7,8,9,10,11]
            },
            {
                searchPanes: {
                    show: false
                },
                targets: []
            }
        ],
        scrollY: true,
        responsive: false,
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

 