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
            <h5>View Mode: Summary / <a href="emp_detail.php">Detailed</a> </h5>
            <span> Displays employee information in table form. Search, filter and edit individually.</span>
            <br>
        </div>
    <div class="table mt-4">
        <table id="info" class="table table-hover table-responsive" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Contract Type</th>
                    <th>Current Tenure</th> 
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user["emp_id"]; ?></td>
                    <td><?php echo $user["emp_name"]; ?></td>
                    <td><?php echo $user["emp_email"]; ?></td>
                    <td><?php echo $user["emp_designation"]; ?></td>
                    <td><?php echo $user["emp_department"]; ?></td>   
                    <td><?php echo $user["emp_contract_type"]; ?></td> 
                    <td>
                        <?php
                        if ($user["emp_start_date"] !== null) {
                            $startDate = new DateTime($user["emp_start_date"]);
                            $today = new DateTime();
                            $daysDifference = $startDate->diff($today)->days;
                            echo $daysDifference . " days";
                        } else {
                            echo "N/A"; // Adjust the message based on your needs
                        }
                        ?>
                    </td>
                    <td>
                    <div class="btn-group">
                <a href="emp_profile.php?emp_id=<?php echo $user['emp_id']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                    <i class="bi bi-person-badge"></i><span class="visually-hidden">View</span>
                </a>
                <a href="emp_profile_edit.php?emp_id=<?php echo $user['emp_id']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                    <i class="bi bi-pencil"></i>     <span class="visually-hidden">Edit</span>
                    </a>
                    <a href="emp_profile_delete.php?emp_id=<?php echo $user['emp_id']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                     <i class="bi bi-trash"></i>
                    <span class="visually-hidden">Button</span>
                    </a>
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="More Options">
                    <i class="bi bi-three-dots"></i>
                    <span class="visually-hidden">Button</span>
                </button>
            </div>


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

 