<?php

session_start();

require 'conn.php';

  if (isset($_SESSION['admin'])) {
    if($_SESSION['admin'] == true){


  // Directly query the database for user information
  $sql = "SELECT *
          FROM opt_contract_type";

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
              Your selected contract_type has been deleted.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }
  //
  if (isset($_GET['duplicate']) && $_GET['duplicate'] == 'true') {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
              Uh-oh. You already have this contract_type! Try again.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

    if (isset($_GET['rename']) && $_GET['rename'] == 'true') {
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
              Your selected contract_type has been renamed.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
    }

    ?>
 

      
  <h3>Settings</h3><hr>

  <p class="h4">contract_type</p>

  <br>

  <!-- Button trigger modal -->
  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-plus"></i>
    Add New contract_type
  </button>

  <!-- Modal for Add-->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Add New contract_type</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="emp_settings_contract_type_add.php" method="POST" class="needs-validation">
        <div class="form-floating mb-3">
        <input required type="text"  class="form-control" value="" id="floatingInput" placeholder="$" name="opt_contract_type_name">
          <label for="floatingInput">Add contract_type   </label>
        </div>
  </div>
  <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>Add contract_type</button>
        </div>
      </div>
    </div>
  </div>
  </form>

  <!-- Modal for Rename-->
  <div class="modal fade" id="confirmrename" tabindex="-1" aria-labelledby="confirmrename" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="confirmrename">Rename New contract_type</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="emp_settings_contract_type_rename.php" id="rename-form" method="POST" class="needs-validation">
        <div class="form-floating mb-3">
        <input required type="text" class="form-control" id="rename-form2" placeholder="$" name="opt_contract_type_name">
          <label for="floatingInput">Rename contract_type</label>
        </div>
  </div>
  <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Rename contract_type</button>
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
          <h1 class="modal-title fs-5" id="confirmdelete">Confirm Delete contract_type</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form id="delete-form" action="emp_contract_type_delete.php" method="post">
      <div class="card-body">Are you sure to remove this user permanently?</div>
  </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger"><i class="fa fa-minus"></i> Delete contract_type</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script>




  function setDeptId(opt_contract_type_id) {
      document.getElementById('delete-form').action = 'emp_settings_contract_type_delete.php?opt_contract_type_id=' + opt_contract_type_id;
  }
  function setDeptId2(opt_contract_type_id, opt_contract_type_name) {
    // Find the form with id 'rename-form' and update its action attribute
    var renameForm = document.getElementById('rename-form');
    renameForm.action = 'emp_settings_contract_type_rename.php?opt_contract_type_id=' + opt_contract_type_id;

    // Set the value of the input field with id 'floatingInput'
    var inputField = renameForm.querySelector('#rename-form2');
    inputField.value = opt_contract_type_name;

    // Output the ID, you can choose to output it wherever you need
    console.log('Selected contract_type ID:', opt_contract_type_id);
}




  </script>  
  <!-- contract_type Table -->
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
                      <td><?php echo $user["opt_contract_type_name"]; ?></td>

                  <td> 
                  <!-- button for rename
                  Upon clicking rename button, a modal will open and also sends two values to the setDepId2 function
                  -->  
                  <a 
                  type="button" 
                  data-bs-toggle="modal" 
                  onclick="setDeptId2(<?php echo $user['opt_contract_type_id']; ?>, '<?php echo $user['opt_contract_type_name']; ?>')"
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
                  onclick="setDeptId(<?php echo $user['opt_contract_type_id']; ?>)" 
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