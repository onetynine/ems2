<?php
require 'conn.php';
?>

        
       <?php include "header.php"; 
       ?>
       
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <br> 
     
<h3>Registration</h3><hr>
<form action="emp_register_process.php" method="post" class="needs-validation" novalidate>

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
<div class="form-floating mb-3">
        <input type="text" class="form-control" id="emp_name" placeholder="emp_name" name="emp_name" required>       
        <label for="emp_name">Name</label>
        <div class="invalid-feedback">
        Please type a valid name.
        </div>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="emp_nric" placeholder="NRIC" name="emp_nric" required>   
        <label for="emp_nric">NRIC</label>
        <div class="invalid-feedback">
        Please type a valid IC Number (eg. 880818-08-8888).
        </div>
    </div>

    <div class="form-floating mb-3">
        <input type="tel" class="form-control" id="emp_phone" placeholder="phone" name="emp_phone" required>
        <label for="emp_phone">Phone</label>
        
    </div>
  
    <div class="form-floating mb-3">
    <input type="email" class="form-control" id="emp_email" placeholder="name@example.com" name="emp_email" required onkeyup="checkDuplicateEmail()">
    <label for="emp_email">Email address</label>
    <div class="invalid-feedback">
    </div>
    </div>


    <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" name="emp_admin_access" id="emp_admin_access">
  <label class="form-check-label" for="emp_admin_access">Admin Access</label>
</div>
<br>

</div></div></div>

</section><br>
    <!-- Employment Info Section --> 
    <section class="text-start row setup-content" id="step-2">
    <div class="tab">
            <!-- Card Source: https://getbootstrap.com/docs/5.3/components/card/ -->
    <div class="card" style="width: 100%;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Employment Info</h5>
    <p class="card-text">Please fill up staff information correctly.</p>
  </div>
<div class="card-body">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" required id="floatingInput" placeholder="emp_designation" name="emp_designation">
            <label for="floatingInput">Designation</label>
        </div>
        <div class="form-floating mb-3">
        <select class="form-select" id="empDepartment" name="emp_department" required>
            <option value="" selected disabled>Select Department</option>
            <option value="option2">Information Technology</option>
            <option value="option3">Operation</option>
            <option value="option4">Logistic</option>
        </select>
            <label for="floatingInput">Department</label>
        </div>

        <div class="form-floating mb-3">
        <select class="form-select" id="emp_contract_type" name="emp_contract_type" required>
            <option value="" selected disabled>Select Contract Type</option>
            <option value="option2">Full Time</option>
            <option value="option3">Part Time</option>
            <option value="option4">Contract Based</option>
            <option value="option5">Internship</option>
        </select>
            <label for="floatingInput">Contract Type</label>
        </div>
        
        <!-- Same row, two columns. Source: https://getbootstrap.com/docs/5.3/forms/floating-labels/ -->
        <div class="row g-2"> 
            <div class="col-md">
                <div class="form-floating mb-3">
                    <input type="date"  class="form-control" value="2020-01-01" id="floatingInput" placeholder="$" name="emp_start_date">
                    <label for="floatingInput">Start Date</label>
                </div>
            </div>

        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="status" name="emp_status" required>
            <label for="floatingInput">Status</label>
        </div>
</div>
</div>
</section><br>

    <section class="text-start row setup-content" id="step-3">    
    <br>
    <div class="tab">
    <div class="card" style="width: 100%;">

  <div class="card-body">
    <h5 class="card-title">Social Media Info</h5>
    <p class="card-text"> Initial leave days will be added automatically to the employee every 1st day of the year.
    </p>
  </div>
<div class="card-body">

<div class="card-group">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Annual Leave</h5>
      <p class="card-text">Set amount of annual leave.</p>
        <div class="col-md">
            <div class="form-floating mb-3">
                    <input required type="number" class="form-control" id="floatingInput" placeholder="emp_al" name="emp_al">
                    <label for="floatingInput">Current Annual Leave (in days)</label>
            </div>
        </div>
        <p class="card-text"><small class="text-body-secondary">
        Annual leave provides paid time off, promoting employee well-being and work-life balance. </small></p>
    </div>
    
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Medical Leave</h5>
      <p class="card-text">Set amount of medical leave.</p>

        <div class="col-md">
            <div class="form-floating mb-3">
                    <input required type="number" class="form-control" id="floatingInput" placeholder="emp_mc" name="emp_mc">
                    <label for="floatingInput">Current Medical Leave (in days)</label>
            </div>
            <p class="card-text"><small class="text-body-secondary">
            Medical leave offers paid time off for health needs, supporting employees without financial strain. </small></p>
        </div>

    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <p class="card-text">Maternity Leave</p>
      <p class="card-text"><small class="text-body-secondary">As of 2020, the maternity leave entitlement for new mothers is not less than 60 
        consecutive days of fully paid leave. Companies can also extend the leave beyond this initial period, but without pay.</small></p>
      <p class="card-text">Emergency Leave</p>
      <p class="card-text"><small class="text-body-secondary">Emergency leave in Malaysia allows employees to take unplanned time off for 
        urgent situations, such as family emergencies or personal crises, with specific details outlined in employment contracts or company policies.</small></p>

      <p class="card-text"><small class="text-body-secondary"><a href="#">Click here</a>  to learn more about company policy on leaves.</small></p>

    </div>
    
  </div>
</div>

<br>
 <button type="submit" id="submitBtn" class="btn btn-primary" onclick="validateForm()">Submit</button>


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
})()</script>

<script>
function checkDuplicateEmail() {
    const emailInput = $('#emp_email');
    const email = emailInput.val();

    if (email.trim() !== '') {
        $.post('check_duplicate_email.php', { emp_email: email }, function (response) {
            const trimmedResponse = response.trim().toLowerCase();

            // Update the emailFeedback div with the response
            $('#emailFeedback').html(trimmedResponse);

            // Determine whether the email is valid or invalid
            const isValidEmail = !trimmedResponse.includes('invalid');

            // Update the Bootstrap validation styling
            emailInput.removeClass('is-valid is-invalid').addClass(isValidEmail ? 'is-valid' : 'is-invalid');

            // Update the invalid feedback message
            const invalidFeedback = $('#emp_email').siblings('.invalid-feedback');
            invalidFeedback.html(isValidEmail ? 'Please type a valid email address (eg. email@gmail.com)' : response);
        });
    } else {
        // Clear the emailFeedback div and remove the 'is-valid' and 'is-invalid' classes
        $('#emailFeedback').html('');
        emailInput.removeClass('is-valid is-invalid');
    }
}


</script>