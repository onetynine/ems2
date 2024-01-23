<?php
require 'conn.php';

if (isset($_GET['opt_department_id'])) {
  $opt_department_id = $_GET['opt_department_id'];

$sql = "DELETE FROM opt_department WHERE opt_department_id = :opt_department_id";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':opt_department_id', $opt_department_id);

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

