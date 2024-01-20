<?php
require 'conn.php';

if (isset($_GET['emp_id'])) {
  $emp_id = $_GET['emp_id'];

  try{
$sqlEmp = "SELECT * FROM employee WHERE emp_id = :emp_id";
$stmtEmp = $pdo->prepare($sqlEmp);

$stmtEmp->bindParam(':emp_id', $emp_id);
$stmtEmp->execute();

// Fetch the data from the query
$user = $stmtEmp->fetch(PDO::FETCH_ASSOC);

if ($user) {
} else {
  // Handle the case when user data is not found
  throw new Exception("User not found");
}
} catch (Exception $e) {
// Log the error or display a user-friendly message
echo "Error: {$e->getMessage()}";
exit();
}
} else {
// Handle the case when email parameter is not set
echo "Id parameter is missing";
exit();
}

?>
        
       <?php include "header.php"; 
       ?>
       
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <br> 
     
<h3>Edit Profile</h3><hr>
<form action="emp_delete_process.php" method="post" class="needs-validation" novalidate>

<?php 

?>

<!-- Personal Info Section --> 
<section class="text-start row setup-content" id="step-1">
<div class="tab">
    <div class="card" style="width: 100%;">
  <div class="card-body">
    <h5 class="card-title">Personal Info</h5>
    <p class="card-text">Let's start with some basic info.</p>
  </div>
<div class="card-body">
</div>

</section><br>
     
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

