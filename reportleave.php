<?php

require "conn.php";

// Directly query the database for user information
$sql = "SELECT
leave_info.leave_id,
leave_info.leave_start_date,
leave_info.leave_end_date,
employee.emp_name,
employee.emp_designation,
employee.emp_department,
leave_info.leave_type,
leave_info.leave_reason,
leave_info.leave_approval
FROM
leave_info
JOIN
employee ON leave_info.emp_id = employee.emp_id;
";

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
</style>

<div class="col-md-8 pt-4 mt-5 mx-auto">
      
    <h3>Dashboard</h3><hr>
    <div class="text-start">
            <h5>Leave Report</h5>
            <span> Displays leave information in table form. Search, filter and edit individually. </span>
            <br>
        </div>
    <div class="table">
        <table id="info" class="table table-hover" style="width: 100%">
            <thead>
                <tr>
                <th>#</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Employee</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Leave Type</th>
                    <th>Leave Reason</th>
                    <th>Approval</th>


                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user["leave_id"]; ?></td>
                        <td><?php echo $user["leave_start_date"]; ?></td>
                        <td><?php echo $user["leave_end_date"]; ?></td>
                        <td><?php echo $user["emp_name"]; ?></td>
                        <td><?php echo $user["emp_designation"]; ?></td>
                        <td><?php echo $user["emp_department"]; ?></td>
                        <td><?php echo $user["leave_type"]; ?></td>
                        <td><?php echo $user["leave_reason"]; ?></td>
                        <td><?php echo $user["leave_approval"]; ?></td>
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
    $(document).ready( function () {
        $('#info').DataTable({
            buttons: [
                'copy', 'excel', 'pdf'
                     ],
            "pagingType": "full_numbers", // Add any additional options you need

            "dom": '<"top"fB>rt<"bottom"lip><"clear">' // This controls the placement of DataTable elements
        });
        

    });
    
</script>
