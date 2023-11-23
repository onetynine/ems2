<?php

require "conn.php";

// Directly query the database for user information
$sql = "SELECT userinfo.*, empinfo.*
        FROM userinfo
        LEFT JOIN empinfo ON userinfo.email = empinfo.email";

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
                    <th>Name</th>
                    <th>Designation</th>
                    <th>Department</th>
                    <th>Leave Type</th>
                    <th>Approval Status</th>
                    <th>Date Start</th>
                    <th>Date End</th>
                    <th>Duration</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user["id"]; ?></td>
                        <td><?php echo $user["name"]; ?></td>
                        <td><?php echo $user["phone"]; ?></td>
                        <td><?php echo $user["email"]; ?></td>
                        <td><?php echo $user["status"]; ?></td>
                        <td><?php echo $user["designation"]; ?></td>
                        <td><?php
                        echo "<a class='icon-link' title='View User Profile' href='profile.php?email={$user["email"]}'>View<i class='fas fa-eye'></i></a>";
                        echo "<a class='icon-link' title='View Report' href='reports.php?email={$user["email"]}'><i class='fas fa-chart-bar'></i></a>";
                        ?></td>
                        <td>
                            <input type="checkbox">
                        </td>
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
