<?php
require 'conn.php';

if (isset($_GET['emp_id'])) {
  $emp_id = $_GET['emp_id'];

$sql = "DELETE FROM employee WHERE emp_id = :emp_id";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':emp_id', $emp_id);

  // Execute the delete query
  if ($stmt->execute()) {
      // If the delete is successful, redirect and display a success message
      header("Location: " . $_SERVER['HTTP_REFERER'] . "?delete=true");
      exit();
  } else {
      // If all else fails, return to the shore
      echo '<script>history.back()</script>';
      
  }
  }

?>
        
       <?php include "header.php"; 
       ?>


     
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

