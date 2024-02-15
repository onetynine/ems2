<?php
require 'conn.php';

// getting the data for select options
try {
    // Fetch departments from the database
    $employeeQuery = "SELECT * FROM opt_department";
    $employeeResult = $pdo->query($employeeQuery);

    // Fetch contract types from the database
    $deptQuery = "SELECT * FROM employee";
    $deptTypeResult = $pdo->query($deptQuery);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sqlRequiredFields = "SELECT * FROM required_fields";
$stmtRequiredFields = $pdo->prepare($sqlRequiredFields);
$stmtRequiredFields->execute();

// Fetch the data from the query
$rowRequiredFields = $stmtRequiredFields->fetch(PDO::FETCH_ASSOC);

?>
        
       <?php include "header.php"; 
       ?>
       
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <br> 
   <!-- Modal for Add-->
   <div class="modal modal-xl fade" id="confirmrename" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">New Leave</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="row">
        <div class="modal-body col-md-8">
          <form action="leave_add_process.php" method="POST" class="needs-validation">
        <div class="mb-3">
        <input disabled type="text" class="form-control" value=""  placeholder="for: " name="emp_id">
        </div>
        <div class="form-floating mb-3">
        <input required type="text"  class="form-control" value=""  placeholder="$" name="leave_type">
          <label for="floatingInput">Leave Type</label>
        </div>
        <div class="form-floating mb-3">
        <input required type="date"  class="form-control" value="" placeholder="$" name="leave_start_date">
          <label for="floatingInput">Leave Start Date</label>
        </div>
        <div class="form-floating mb-3">
        <input required type="date"  class="form-control" value="" placeholder="$" name="leave_end_date">
          <label for="floatingInput">Leave End Date</label>
        </div>
        <div class="form-floating mb-3">
        <input type="text"  class="form-control" value="" placeholder="$" name="leave_reason">
          <label for="floatingInput">Leave Reason</label>
        </div>
        <div class="form-floating mb-3">
        <select class="form-select" id="empDepartment" name="emp_contract_type"
        <?php 
            echo ($rowRequiredFields['require_contract_type'] == 1) ? 'required' : '';
            ?>
            >
            <option value="" selected disabled>Select Status</option>

  
        </select>
            <label for="contract_type">Leave Status</label>
        </div>
        <div class="form mb-3">
        <input type="file"  class="form-control" value="" placeholder="Attachment" name="opt_department_name">
        </div>
  </div>
  <div class="modal-body col-md-4">
  <div class="card">
  <div class="card-header">
    Remaining Leave
  </div>
  <!-- for future reference, do a loop here based on leave types -->
  <div class="card-body">
    <h6 class="card-title">Annual Leave  <span class="badge bg-secondary">14</span></h6>
  </div>
</div>

  </div>
  </div>
  <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Save</button>
        </div>
      </div>
    </div>
  </div>
  </form>   
  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Leave</li>
    <li class="breadcrumb-item " aria-current="page"><a href="emp_settings.php">New Leave</a></li>
  </ol>
</nav>
<hr>    

<div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-10">
    <p class="h4"><u>Add New Leave</u></p>
    <p class="h6">Find and select the employee first. Then click Select button. </p></div>
  <!-- Button trigger modal -->
  <div class="col-md-2">
  <button type="button" class="btn btn-primary h-100 w-100"><i class="fa fa-plus"></i>
    Jump Section
  </button>
  </div></div></div>
  </div><br>
<form action="emp_register_process.php" method="post" class="needs-validation" novalidate>

<?php 
$stmt = "SELECT * FROM employee";
$users = $pdo->query($stmt);
?>
<div class="card-body">
<div class="table mt-4">
        <table id="info" class="table table-hover table-responsive" style="width: 100%">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Designation</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $counter = 1;
            foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $counter; ?></td>
                    <td><?php echo $user["emp_name"]; ?></td>
                    <td><?php echo $user["emp_department"]; ?></td>
                    <td><?php echo $user["emp_designation"]; ?></td>

                    <td>
                    <div class="btn">
                                  <!-- button for rename
                  Upon clicking rename button, a modal will open and also sends two values to the setDepId2 function
                  -->  
                  <a 
                  type="button" 
                  data-bs-toggle="modal" 
                  onclick="setDeptId2(<?php echo $user['emp_id']; ?>, '<?php echo $user['emp_name']; ?>')"
                  data-bs-target="#confirmrename" 
                  class="btn btn-primary btn-sm" 
                  data-bs-placement="top" 
                  title="Rename">
                  <i class="fa fa-pen"></i> 
                  <span class="visually-hidden"></span>
                  </a>
            </div>


                    </td>
                </tr>
            <?php 
            $counter++;
            endforeach; ?>
            </tbody>
        </table></div>




<br>

</div></div></div>

</section><br>
   
</div>

<br>


</section> 

            
</div></div>

<br>


    </div><br>
</div>



</div></div></div>
</form>



</main>

<script>
  function setDeptId2(emp_id) {
    // Find the form with id 'rename-form' and update its action attribute
    var renameForm = document.getElementById('rename-form');
    renameForm.action = 'leave_add.php?emp_id=' + emp_id;

    // Set the value of the input field with id 'floatingInput'
    var empId = renameForm.querySelector('#emp_id');
    empId.value = emp_id;

    // Output the ID, you can choose to output it wherever you need
    console.log('Selected Department ID:', opt_department_id);
}

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()





</script>

<script>
$(document).ready(function() {
    $('#info').DataTable({
        dom: "P<'row'<'col-sm-12 d-flex justify-content-between'>>" + 
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-4'l><'col-sm-8'pi>>",
             searchPanes: {
            searchPanes: true,
            initCollapsed: true,

        },
        columnDefs: [
            {
                searchPanes: {
                    show: true
                },
                targets: [1,2,3]
            },
            {
                searchPanes: {
                    show: false
                },
                targets: []
            }
        ],
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