<?php
require 'conn.php';


// Directly query the database for user information
$sql = "SELECT *
        FROM opt_department";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all rows into an associative array
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


        
       <?php include "header.php"; 


       ?>
       
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">  <br> 
<?php
// 
if (isset($_GET['success']) && $_GET['success'] == 'true') {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Update successful!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
//
if (isset($_GET['duplicate']) && $_GET['duplicate'] == 'true') {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Uh-oh. You already have this department! Try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }

  ?>

     
<h3>Settings</h3><hr>

<p class="h4">Department</p>

<br>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>
  Add New Department
</button>

<!-- Modal for Add-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add New Department</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="emp_settings_department_add.php" method="POST" class="needs-validation">
      <div class="form-floating mb-3">
      <input required type="text"  class="form-control" value="" id="floatingInput" placeholder="$" name="opt_department_name">
        <label for="floatingInput">Add Department   </label>
      </div>
</div>
<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add Department</button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- Modal for Delete -->
<div class="modal fade" id="confirmdelete" tabindex="-1" aria-labelledby="confirmdelete" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="confirmdelete">Confirm Delete Department</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="delete-form" action="emp_department_delete.php" method="post">
    <div class="card-body">Are you sure to remove this user permanently?</div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-danger"><i class="fa fa-minus"></i> Delete Department</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
function setDeptId(opt_department_id) {
    document.getElementById('delete-form').action = 'emp_settings_department_delete.php?opt_department_id=' + opt_department_id;
}
</script>  

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
                    <td><?php echo $user["opt_department_id"]; ?></td>
                    <td><?php echo $user["opt_department_name"]; ?></td>

                 <td> 
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Rename">
                    <i class="fa fa-pen"></i>
                    <span class="visually-hidden"></span>
                </button>
                <a data-bs-toggle="modal" onclick="setDeptId(<?php echo $user['opt_department_id']; ?>)" data-bs-target="#confirmdelete" class="btn btn-primary btn-sm" data-bs-placement="top" title="Delete">
                    <i class="fa fa-minus"></i>
                    <span class="visually-hidden"></span>
                </a>
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
