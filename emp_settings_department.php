  <?php

session_start();

require 'conn.php';

  if (isset($_SESSION['admin'])) {
    if($_SESSION['admin'] == true){


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
  if (isset($_GET['delete']) && $_GET['delete'] == 'true') {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Your selected department has been deleted.
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

    if (isset($_GET['rename']) && $_GET['rename'] == 'true') {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Your selected department has been renamed.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

    ?>
 
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
    <p class="h4"><u>Department</u></p>
    <p class="h6">This section allows for department modification and standardization. </p></div>
  <!-- Button trigger modal -->
  <div class="col-md-2">
  <button type="button" class="btn btn-primary w-100 h-100" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>
    Add New Department
  </button>
  </div></div></div>
  </div>
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

  <!-- Modal for Rename-->
  <div class="modal fade" id="confirmrename" tabindex="-1" aria-labelledby="confirmrename" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="confirmrename">Rename New Department</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="emp_settings_department_rename.php" id="rename-form" method="POST" class="needs-validation">
          <div class="form-floating mb-3">
                    <input type="hidden" class="form-control" id="deptId" placeholder="$" name="opt_department_id">
                  <input required type="text" class="form-control" id="deptName" placeholder="$" name="opt_department_name">
          <label for="floatingInput">Rename Department</label>
        </div>
  </div>
  <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-pen"></i> Rename Department</button>
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
  function setDeptId2(opt_department_id, opt_department_name) {
    // Find the form with id 'rename-form' and update its action attribute
    var renameForm = document.getElementById('rename-form');
    renameForm.action = 'emp_settings_department_rename.php?opt_department_id=' + opt_department_id;

    // Set the value of the input field with id 'floatingInput'
    var deptId = renameForm.querySelector('#deptId');
    var deptName = renameForm.querySelector('#deptName');
    deptId.value = opt_department_id;
    deptName.value = opt_department_name;

    // Output the ID, you can choose to output it wherever you need
    console.log('Selected Department ID:', opt_department_id);
}




  </script>  
  <!-- Department Table -->
  <div class="table mt-4">
          <table id="info" class="table table-hover table-responsive" style="width: 100%">
              <thead>
                  <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                
              <?php 
              $counter = 1; // initialisation for numbering
              foreach ($users as $user): ?>
                  <tr>
                      <td><?php echo $counter; ?></td>
                      <td><?php echo $user["opt_department_name"]; ?></td>

                  <td> 
                  <!-- button for rename
                  Upon clicking rename button, a modal will open and also sends two values to the setDepId2 function
                  -->  
                  <a 
                  type="button" 
                  data-bs-toggle="modal" 
                  onclick="setDeptId2(<?php echo $user['opt_department_id']; ?>, '<?php echo $user['opt_department_name']; ?>')"
                  data-bs-target="#confirmrename" 
                  class="btn btn-primary btn-sm" 
                  data-bs-placement="top" 
                  title="Rename">
                  <i class="fa fa-pen"></i> 
                  <span class="visually-hidden"></span>
                  </a>

                  <!-- button for delete
                  Upon clicking delete button, a modal will open and also sends id to the setDepId function.
                  -->  
                  <a 
                  data-bs-toggle="modal" 
                  onclick="setDeptId(<?php echo $user['opt_department_id']; ?>)" 
                  data-bs-target="#confirmdelete" 
                  class="btn btn-danger btn-sm" 
                  data-bs-placement="top" 
                  title="Delete">
                  <i class="fa fa-minus"></i>
                  <span class="visually-hidden"></span>
                  </a>
              </td>
              </div>


                      </td>
                  </tr>
              <?php 
              $counter++; // 
              endforeach; ?>
              </tbody>
          </table>

              
  </div></div>

  <br>


      </div><br>
  </div>



  </div></div></div>
  </form>



  </main>

  <script>
    // DataTable script
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
<?php
    } else {
        include "blocked.php"; // Action if admin is false
    }
} else {
    include "logout.php"; // If no session
}