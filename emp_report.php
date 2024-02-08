<?php
session_start();
require "conn.php";



// Directly query the database for user infoation
$sql = "SELECT *
        FROM emp_report";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all rows into an associative array
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


       <?php include "header.php"; ?>
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

        <?php
       if (isset($_GET['success']) && $_GET['success'] == 'true') {
        echo '<br><div class="alert alert-success alert-dismissible fade show" role="alert">
                Update successful!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
      }
        ?>

<br>
<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Employee</li>
    <li class="breadcrumb-item " aria-current="page"><a href="emp_settings.php">Settings</a></li>
    <li class="breadcrumb-item active" aria-current="page"><a href="emp_settings_department.php">Department</a></li>
  </ol>
</nav>
<hr>

    <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-10">
    <p class="h4"><u>Reporting</u></p>
    <p class="h6">This section allows for department modification and standardization. </p></div>
  <!-- Button trigger modal -->
  <div class="col-md-2">
  <button type="submit" onclick="window.location.href='emp_report_add.php'" class="btn btn-primary h-100 w-100">
    <i class="fa fa-plus"></i> Create New Report
  </button>


  </div></div></div>
  </div>

<style>
    a{
        text-decoration: none;
 
    }
</style>

    <div class="table mt-4">
        <table id="info" class="table table-hover table-responsive" style="width: 100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Desc</th>
                    <th>Created at</th>
                    <th>Action</th>


                </tr>
            </thead>                   
            <tbody> <!-- put tbody before the loop so datatable works properly -->
<?php
$counter = 1;
    foreach ($reports as $report): ?>             

                <tr>
                    <td><?php echo $counter; ?></td>
                    <td><a data-bs-toggle="tooltip" data-bs-title="Click to View" href="emp_report_view.php?report_id=<?php echo $report["report_id"]; ?>"><?php echo $report["report_name"]; ?></a></td>
                    <td><?php echo $report["additional_notes"]; ?></td>
                    <td><?php echo $report["created_at"]; ?></td>
                    <td>
                    <div class="btn-group">
                <a href="emp_report_view.php?report_id=<?php echo $report['report_id']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="View">
                    <i class="bi bi-person-badge"></i><span class="visually-hidden"></span>
                </a>
                <a href="emp_profile_edit.php?emp_id=<?php echo $user['emp_id']; ?>" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit">
                    <i class="bi bi-pencil"></i>     <span class="visually-hidden"></span>
                    </a>
                    <a data-bs-toggle="modal" data-bs-target="#confirmdelete" class="btn btn-primary btn-sm" data-bs-placement="top" title="Delete" onclick="setEmpId(<?php echo $user['emp_id']; ?>)">
                        <i class="bi bi-trash"></i>
                        <span class="visually-hidden"></span>
                    </a>

                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="More Options">
                    <i class="bi bi-three-dots"></i>
                    <span class="visually-hidden"></span>
                </button>
            </div></td>
                </tr>
               
<?php 
 $counter++;
endforeach; 
?>

</div>
    

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

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>