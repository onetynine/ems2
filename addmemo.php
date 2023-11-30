<?php
require 'conn.php';
?>

<div class="container mx-auto">
    <div class="row">
    <div class="col-md-3">
       <?php include "header.php"; ?>
    </div>
    <div class="col-md-8  mt-5 mx-auto">
        
<h3>Add Memo</h3><hr>
<form action="addmemo_process.php" method="post">

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
        <a href="#step-1" type="button" class="btn btn-sm btn-primary btn-circle">1 - Audience</a>
        
    </div>
    <div class="stepwizard-step m-auto">
        <a href="#step-2" type="button" class="btn btn-sm btn-default btn-circle" disabled>2 - Details</a>
    </div>
    <div class="stepwizard-step m-auto">
        <a href="#step-3" type="button" class="btn btn-sm btn-default btn-circle" disabled>3 - Confirmation</a>
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
    <!-- Card Source: https://getbootstrap.com/docs/5.3/components/card/ -->
    <div class="card" style="width: 100%;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Select Target Audience</h5>
    <p class="card-text">Please contact your HR representative if the leave info is incorrect.</p>
  </div>
  <div class="card-body">
    <div class="form mb-3 form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option selected>All</option>
            <option value="1">Human Resources</option>
            <option value="2">Production</option>
            <option value="3">Logistics</option>
        </select>
        <label for="floatingSelect">Department:</label>
    </div>
    <div class="form mb-3 form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option selected>Notice</option>
            <option value="1">Urgent</option>
            <option value="2">Policy Change</option>

        </select>
        <label for="floatingSelect">Type:</label>
    </div>

    <button class="btn btn-primary nextBtn pull-right" type="button">Next</button>

</section>
    <!-- Employment Info Section --> 
    <section class="text-start row setup-content" id="step-2">
    <div class="tab">
    <!-- Card Source: https://getbootstrap.com/docs/5.3/components/card/ -->
    <div class="card" style="width: 100%;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Memo Details</h5>
    <p class="card-text">Please contact your HR representative if the leave info is incorrect.</p>
  </div>
  <div class="card-body">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" placeholder="startdate" name="startdate">
            <label for="floatingInput">Subject</label>
        </div>
        <div class="form-floating mb-3">
            <textarea class="form-control" id="floatingInput" placeholder="startdate" name="startdate" style="height: 200px"></textarea>
            <label for="floatingInput">Details</label>
        </div>
        <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Attachment</label>
        <input class="form-control" type="file" id="formFileMultiple" multiple>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" placeholder="startdate" name="startdate">
            <label for="floatingInput">startdate</label>
        </div>
        <div class="form-floating mb-3">
            <input type="date" class="form-control" id="floatingInput" placeholder="enddate" name="enddate">
            <label for="floatingInput">enddate</label>
        </div>
        <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
        <label class="form-check-label" for="flexSwitchCheckDefault">Send notification by email</label>
        </div>
        <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
        <label class="form-check-label" for="flexSwitchCheckChecked">Allow Comments</label>
        </div>
    <br>
    <button class="btn btn-default prevBtn pull-left" type="button" >Prev</button>
    <button class="btn btn-primary nextBtn pull-right" type="button" >Next</button>
</section>

        <!-- Social Media Info Section --> 
        <section class="text-start row setup-content" id="step-3">
        <div class="tab">
    <!-- Card Source: https://getbootstrap.com/docs/5.3/components/card/ -->
    <div class="card" style="width: 100%;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Leave Info</h5>
    <p class="card-text">Please contact your HR representative if the leave info is incorrect.</p>
  </div>
  <div class="card-body">
    
            <button class="btn btn-default prevBtn pull-left" type="button" >Prev</button>
            <button class="btn btn-primary nextBtn pull-right" type="button" >Next</button>

</section> 
<br>



    </div><br>
</div>

</form>
</div></div></div>
<?php include "footer.php"; ?>

<script>
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
