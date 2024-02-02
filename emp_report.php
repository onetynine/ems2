<?php

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



      <br>
    <h3>Employee Report</h3><hr>

Create New Report


    <h4>Available Reports</h4><br>

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
<?php
$counter = 1;
    foreach ($reports as $report): ?>             
               <tbody>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $report["report_name"]; ?></td>
                    <td><?php echo $report["additional_notes"]; ?></td>
                    <td><?php echo $report["created_at"]; ?></td>
                    <td><a href="emp_report_view.php?report_id=<?php echo $report["report_id"]; ?>"><i class="fa fa-pen"></i></a>
                    <a href=""><i class="fa fa-pen"></i></a>
                    <a href=""><i class="fa fa-pen"></i></a></td>
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

