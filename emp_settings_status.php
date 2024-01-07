<?php
require 'conn.php';


// Directly query the database for user information
$sql = "SELECT *
        FROM opt_status";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all rows into an associative array
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


        
       <?php include "header.php"; 
       ?>
       
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <br> 
     
<h3>Settings</h3><hr>

<p class="h4">Department</p>
<div class="table mt-4">
        <table id="info" class="table table-hover table-responsive" style="width: 100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user["opt_status_id"]; ?></td>
                    <td><?php echo $user["opt_status_name"]; ?></td>

                 <td> 
                 <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Rename">
                    <i class="fa fa-pen"></i>
                    <span class="visually-hidden"></span>
                </button>
                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Remove">
                    <i class="fa fa-minus"></i>
                    <span class="visually-hidden"></span>
                </button>
            </td>
            </div>


                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>




<?php 

?>


            
</div></div>

<br>


    </div><br>
</div>



</div></div></div>
</form>



</main>

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
