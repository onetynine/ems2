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

<div class="col-md-8 pt-4 mt-5 text-center mx-auto">
    <div class="content ">       
    <span class="nav-brand">User Information</span>

    <div class="table-responsive">
        <table class="table table-bordered table-striped ">
            <thead class="">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Designation</th>
                    <th>Action</th>
                    <th>Select</th>
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