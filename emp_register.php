<?php
require 'conn.php';
?>

        
       <?php include "header.php"; 
       ?>
       
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <br>      
<h3>Registration</h3><hr>
<form id="myForm" action="emp_register_process.php" method="post">

<!-- 
Multi step registration js  is based on 
https://codepen.io/aniket/pen/WxByVp 
-->
<style>
    .stepwizard-row {
      display: table-row;
  }

  .stepwizard {
      display: table;
      width: 100%;
      position: relative;
  }

  .stepwizard-step button[disabled] {
      opacity: 1 !important;
      filter: alpha(opacity=50) !important;
  }

  .stepwizard-row:before {
      top: 14px;
      bottom: 0;
      position: absolute;
      content: " ";
      width: 100%;
      height: 1px;
      background-color: #ccc;
      z-order: 0;

  }

  .stepwizard-step {
      display: table-cell;
      text-align: center;
      position: relative;
  }

</style>

<br>
<div class="stepwizard setup-panel d-flex flex-row align-items-center text-center m-2">
    <div class="stepwizard-step m-auto ">
        <a href="#step-1" type="button" class="btn btn-sm btn-primary btn-circle">1 - Personal Info</a>
        
    </div>
    <div class="stepwizard-step m-auto">
        <a href="#step-2" type="button" class="btn btn-sm btn-default btn-circle" disabled>2 - Employment Info</a>
    </div>
    <div class="stepwizard-step m-auto">
        <a href="#step-3" type="button" class="btn btn-sm btn-default btn-circle" disabled>3 - Leave Info</a>
    </div>

</div><br>

<?php 

?>
<div class="progress"  style="height: 2px" role="progressbar" aria-label="Animated striped example" aria-valuenow="00" aria-valuemin="00" aria-valuemax="00" id="progress-bar">
  <div class="progress-bar progress-bar-striped progress-bar-animated w-100"></div>
</div><br>

<script>
  // Function to update the progress bar based on the active step
  function updateProgressBar() {
    var totalSteps = 3; // Total number of steps
    var activeStep = document.querySelector('.stepwizard-step a.btn-primary');

    if (activeStep) {
      var stepNumber = parseInt(activeStep.textContent.split(' ')[0]);
      var percentage = (stepNumber / totalSteps) * 100;
      document.getElementById('progress-bar').style.width = percentage + '%';
    }
  }

  // Call the function initially and whenever the step changes
  updateProgressBar();
  document.addEventListener('click', updateProgressBar);
</script>

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
        <small id="nameError" style="color: red;"></small>
        <label for="emp_name">Name</label>
    </div>

    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="emp_nric" placeholder="NRIC" name="emp_nric" required>
        <small id="nricError" style="color: red;"></small>
        <label for="emp_nric">NRIC</label>
    </div>

    <div class="form-floating mb-3">
        <input type="tel" class="form-control" id="emp_phone" placeholder="phone" name="emp_phone" required>
        <label for="emp_phone">Phone</label>
        <small id="phoneError" style="color: red;"></small>
    </div>
  
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="emp_email" placeholder="name@example.com" name="emp_email" required>
        <small id="emailError" style="color: red;"></small>
        <label for="emp_email">Email address</label>
    </div>
    <div class="form-check form-switch">
  <input class="form-check-input" type="checkbox" role="switch" name="emp_admin_access" id="emp_admin_access">
  <label class="form-check-label" for="emp_admin_access">Admin Access</label>
</div>
<br>
    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>

</div></div></div>

</section>
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
            <option value="option1"></option>
            <option value="option2">Information Technology</option>
            <option value="option3">Operation</option>
            <option value="option4">Logistic</option>
        </select>
            <label for="floatingInput">Department</label>
        </div>

        <div class="form-floating mb-3">
        <select class="form-select" id="emp_contract_type" name="emp_contract_type" required>
            <option value="option1"></option>
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
    
    <button class="btn btn-default prevBtn pull-left" type="button" >Prev</button>
    <button class="btn btn-primary nextBtn pull-right" type="button" >Next</button>
</div>
</div>
</section>

        <!-- Social Media Info Section --> 
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
                    <input type="number" class="form-control" id="floatingInput" placeholder="emp_al" name="emp_al">
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
                    <input type="number" class="form-control" id="floatingInput" placeholder="emp_mc" name="emp_mc">
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
 <button class="btn btn-default prevBtn pull-left" type="button" >Prev</button>
 <button type="submit" id="submitBtn" class="btn btn-primary" data-bs-target="#staticBackdrop">Submit</button>


</section> 

            
</div></div>

<br>
<script>
         document.addEventListener('DOMContentLoaded', function () {
            // Show the modal when the form submit button is clicked
            document.getElementById('submitBtn').addEventListener('click', function (event) {
                event.preventDefault(); // Prevent the default form submission
                var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                myModal.show();
            });

            // Submit the form when the modal submit button is clicked
            document.getElementById('modalSubmitBtn').addEventListener('click', function () {
                document.getElementById('myForm').submit();
            });
        });
</script>
<!-- Add this modal structure where your HTML content is present -->
<div class="modal" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add your modal content here -->
                <p>Submit the registration.</p>
            </div>
            <div class="modal-footer">
            <button type="button" id="modalSubmitBtn" class="btn btn-primary" data-bs-dismiss="modal">Submit</button>
             </div>
        </div>
    </div>
</div>


    </div><br>
</div>


</form>
</div></div></div>


</main>

<script>
   // Function for live input validation
   function validateInput(inputElement, regex, errorElementId, errorMessage) {
      inputElement.addEventListener('input', function () {
        var inputValue = this.value;

        // Check if the input is empty
        if (inputValue.trim() === '') {
          document.getElementById(errorElementId).textContent = '';
        } else {
          // Validate the input using the provided regex
          if (regex.test(inputValue)) {
            document.getElementById(errorElementId).textContent = '';
          } else {
            document.getElementById(errorElementId).textContent = errorMessage;
          }
        }
      });
    }

    // Validate Name
    validateInput(
      document.getElementById('emp_name'),
      /^[a-zA-Z\s]+$/,
      'nameError',
      'Invalid name. Please use only letters and spaces.'
    );

    // Validate Email
    validateInput(
      document.getElementById('emp_email'),
      /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
      'emailError',
      'Invalid email address.'
    );

    // Validate Phone Number
validateInput(
  document.getElementById('emp_phone'),
  /^\d{10,}$/,
  'phoneError',
  'Invalid phone number. Please enter at least 10 digits.'
);

$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn'),
        allPrevBtn = $('.prevBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    // Initially disable the Next button
    allNextBtn.addClass('btn-secondary').attr('disabled', 'disabled');

    allNextBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        // Update the appearance and enable/disable the Next button
        if (isValid) {
            $(this).removeClass('btn-danger').addClass('btn-primary');
            nextStepWizard.removeAttr('disabled');
        } else {
            $(this).removeClass('btn-primary').addClass('btn-secondary');
            nextStepWizard.attr('disabled', 'disabled');
        }
    });

    allPrevBtn.click(function () {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

        $(".form-group").removeClass("has-error");
        prevStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});

  </script>

<script>
    function validateAndProceed() {
        // Get values from paragraphs
        var name = document.getElementById('name').textContent.trim();
        var email = document.getElementById('email').textContent.trim();
        // Get values for other paragraphs similarly

        // Check if all required fields are filled
        if (name !== '' && email !== '') {
            // If all required fields are filled, proceed to the next step
            document.getElementById('step-4').style.display = 'none'; // Hide current step
            document.getElementById('step-5').style.display = 'block'; // Show next step
        } else {
            // If any required field is empty, show an alert or handle it accordingly
            alert('Please fill in all required fields before proceeding.');
        }
    }
</script>