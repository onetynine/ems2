<?php
require 'conn.php';
?>

<div class="container mx-auto">
    <div class="row">
    <div class="col-md-3">
       <?php include "header.php"; ?>
    </div>
    <div class="col-md-8  mt-5 mx-auto">
        
<h3>Registration</h3><hr>
<form action="register_process.php" method="post">

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

  .btn-circle: {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;

    .btn-circle:hover {

    }
  }
</style>

<br>
<div class="stepwizard setup-panel d-flex flex-row align-items-center text-center m-2">
    <div class="stepwizard-step m-auto">
        <a href="#step-1" type="button" class="btn btn-sm btn-primary btn-circle">1 - Personal Info</a>
        
    </div>
    <div class="stepwizard-step m-auto">
        <a href="#step-2" type="button" class="btn btn-sm btn-default btn-circle" disabled>2 - Employment Info</a>
    </div>
    <div class="stepwizard-step m-auto">
        <a href="#step-3" type="button" class="btn btn-sm btn-default btn-circle" disabled>3 - Social Media Info</a>
    </div>
    <div class="stepwizard-step m-auto">
        <a href="#step-4" type="button" class="btn btn-sm btn-default btn-circle" disabled>4 - Misc.</a>
    </div>
    <div class="stepwizard-step m-auto">
        <a href="#step-5" type="button" class="btn btn-sm btn-default" disabled>5 - Confirmation</a>
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
    var totalSteps = 5; // Total number of steps
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
    <h5>Personal Info</h5>
    <span> Please fill up staff information correctly. </span><br>

    <br>
<div class="tab">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="name" name="name">
        <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="nric">
        <label for="floatingInput">NRIC</label>
    </div>
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingInput" placeholder="phone" name="phone">
        <label for="floatingInput">Phone</label>
    </div>
    <div class="form-floating mb-3">
        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
        <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating mb-3">
        <input type="password" class="form-control" id="floatingInput" placeholder="password" name="password">
        <label for="floatingInput">Password</label>
    </div>
    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>

</section>
    <!-- Employment Info Section --> 
    <section class="text-start row setup-content" id="step-2">
        <h5>Employment Info</h5>
        <span> Please fill up staff information correctly. </span><br>
   
    <br>
    <div class="tab">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="designation" name="designation">
            <label for="floatingInput">Designation</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="department" name="department">
            <label for="floatingInput">Department</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" placeholder="startdate" name="startdate">
            <label for="floatingInput">startdate</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" placeholder="enddate" name="enddate">
            <label for="floatingInput">enddate</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" class="form-control" id="floatingInput" placeholder="epfno" name="epfno">
            <label for="floatingInput">epfno</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="status" name="status">
            <label for="floatingInput">status</label>
        </div>
    
    <button class="btn btn-default prevBtn pull-left" type="button" >Prev</button>
    <button class="btn btn-primary nextBtn pull-right" type="button" >Next</button>
</section>

        <!-- Social Media Info Section --> 
        <section class="text-start row setup-content" id="step-3">
        <h5>Social Media Info</h5>
        <span> Fill up the user id (or extension) or the entire url of profile id. </span><br>
    
    <br>
    <div class="tab">
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-brands fa-linkedin fa-lg"></i></span>
            <div class="form-floating form-floating-group flex-grow-1">
                <input type="text" class="form-control" name="code1" placeholder="Code 1">
                <label for="code1">LinkedIn Profile URL</label>
            </div>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-brands fa-square-facebook fa-lg"></i></span>
            <div class="form-floating form-floating-group flex-grow-1">
                <input type="text" class="form-control" name="code1" placeholder="Code 1">
                <label for="code1">Facebook Profile URL</label>
            </div>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-brands fa-square-github fa-lg"></i></span>
            <div class="form-floating form-floating-group flex-grow-1">
                <input type="text" class="form-control" name="github" placeholder="github">
                <label for="code1">Github Profile URL</label>
            </div>
    </div>
    <div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-brands fa-square-x-twitter fa-lg"></i></span>
            <div class="form-floating form-floating-group flex-grow-1">
                <input type="text" class="form-control" name="twitter" placeholder="twitter">
                <label for="code1">Twitter/X Profile URL</label>
            </div>
    </div>  
            <button class="btn btn-default prevBtn pull-left" type="button" >Prev</button>
            <button class="btn btn-primary nextBtn pull-right" type="button" >Next</button>

</section> 
<br>



    </div><br>
</div>

    <!-- Employment Info Section -->
    <!-- <div class="card mt-4">
    <div class="card-header d-flex justify-content-between">
    <div class="col text-center">
            <h3>Employment Info</h3>
        </div>
            
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="designation">Designation:</label>
                <input type="text" class="form-control" id="designation" name="designation" required>
            </div>

            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" class="form-control" id="department" name="department" required>
            </div>

            <div class="form-group">
                <label for="startdate">Start Date:</label>
                <input type="date" class="form-control" id="startdate" name="startdate" required>
            </div>

            <div class="form-group">
                <label for="enddate">End Date:</label>
                <input type="date" class="form-control" id="enddate" name="enddate" required>
            </div>

            <div class="form-group">
                <label for="epfno">EPF No:</label>
                <input type="text" class="form-control" id="epfno" name="epfno" required>
            </div>

            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" id="status" name="status" required>
            </div>
        </div>
    </div><br>

    </div> -->

<!-- Social Media Info Section -->
    <!-- <div class="card mt-4">
        <div class="card-header d-flex justify-content-between">
        <div class="col text-center">
            <h3>Social Media Info</h3>
        </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="linkedin">LinkedIn:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">https://www.linkedin.com/in/</span>
                    </div>
                    <input type="text" class="form-control" id="linkedin" name="linkedin" >
                </div>
            </div>

            <div class="form-group">
                <label for="facebook">Facebook:</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">https://www.facebook.com/</span>
                    </div>
                    <input type="text" class="form-control" id="facebook" name="facebook" >
                </div>
            </div>
        </div>
    </div>
</div>
 -->


    <!-- Miscellaneous Section -->
    <!-- <div class="card mt-4">
    <div class="card-header d-flex justify-content-between">
    <div class="col text-center">
            <h3>Misc Info</h3>
        </div>

        </div>
        <div class="card-body">
            <div class="form-group">
                <label>Is Admin?</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="admin_yes" name="admin" value="1">
                <label class="form-check-label" for="admin_yes">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" id="admin_no" name="admin" value="0" checked>
                <label class="form-check-label" for="admin_no">No</label>
            </div>
        </div>

        </div>
    </div> -->

</form>
</div></div></div>
<?php include "footer.php"; ?>

<script>$(document).ready(function () {

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

allNextBtn.click(function(){
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
        curInputs = curStep.find("input[type='text'],input[type='url']"),
        isValid = true;

    $(".form-group").removeClass("has-error");
    for(var i=0; i<curInputs.length; i++){
        if (!curInputs[i].validity.valid){
            isValid = false;
            $(curInputs[i]).closest(".form-group").addClass("has-error");
        }
    }

    if (isValid)
        nextStepWizard.removeAttr('disabled').trigger('click');
});

allPrevBtn.click(function(){
    var curStep = $(this).closest(".setup-content"),
        curStepBtn = curStep.attr("id"),
        prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

    $(".form-group").removeClass("has-error");
    prevStepWizard.removeAttr('disabled').trigger('click');
});

$('div.setup-panel div a.btn-primary').trigger('click');
});
</script>
