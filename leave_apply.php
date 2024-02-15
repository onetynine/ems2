<?php

session_start();
require "conn.php";

if (isset($_SESSION['admin'])) {
    if($_SESSION['admin'] == true){

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
     
  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item">Employee</li>
    <li class="breadcrumb-item " aria-current="page"><a href="emp_settings.php">Settings</a></li>
  </ol>
</nav>
<hr>    

<div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-md-12">
    <p class="h4"><u>Apply Leave</u></p>
    <p class="h6">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
      Facilis eveniet sed aut voluptatem ad, rem sunt et. Accusantium, nesciunt enim? </p></div>

</div>
</div>
  </div><br>
<form action="leave_apply_process.php" method="post" class="needs-validation" novalidate>

<?php 

$time = date('Y-m-d H:i:s');
var_dump($_SESSION['emp_id']);
var_dump($time);
?>
<div class="row">
        <div class="col-md-8">
          <form action="leave_apply_process.php" method="POST" class="needs-validation">
            <input type="hidden" value="<?php echo $_SESSION['emp_id']; ?>" name="emp_id">
            <input type="hidden" value="<?php echo $time; ?>" name="leave_request_time"> <!-- later set this to time when user clicks submit -->
            
        <div class="form-floating mb-3">
        <input required type="text"  class="form-control" value="" placeholder="$" name="leave_type">
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
  
        <div class="form mb-3">
        <input type="file" class="form-control" value="" placeholder="Attachment" name="leave_attachment">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>
    Submit
  </button>
  </div>
  <div class="col-md-4">
  <div class="card">
  <div class="card-header">
    Remaining Leave
  </div>
  <!-- for future reference, do a loop here based on leave types -->
  <div class="card-body">
    <h6 class="card-title">Annual Leave  <span class="badge bg-secondary">14</span></h6>
  </div>
</div>
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

<?php
    } else {
        include "blocked.php"; // Action if admin is false
    }
} else {
    include "logout.php"; // If no session
}