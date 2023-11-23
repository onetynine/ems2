<?php
require 'conn.php';
?>

<div class="container mx-auto">
    <div class="row">
    <div class="col-md-3">
       <?php include "header.php"; ?>
    </div>
    <div class="col-md-8  mt-5 mx-auto">
        
<h3>Apply Leave</h3><hr>
<form action="applyleave_process.php" method="post">

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
        <a href="#step-1" type="button" class="btn btn-sm btn-primary btn-circle">1 - Apply</a>
        
    </div>
    <div class="stepwizard-step m-auto">
        <a href="#step-2" type="button" class="btn btn-sm btn-default btn-circle" disabled>2 - Time and Date</a>
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
<style>
    .accordion-button:not(.collapsed) {
    color: white;
    background-color: #0d6efd;
}
</style>
<!-- Leave Type & Info --> 
<section class="text-start row setup-content" id="step-1">
<div class="tab">
    <!-- Card Source: https://getbootstrap.com/docs/5.3/components/card/ -->
    <div class="card" style="width: 100%;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">My Leave Info</h5>
    <p class="card-text">Please contact your HR representative if the leave info is incorrect.</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Annual Leave : 1 day remaining out of 14 days</li>
    <li class="list-group-item">Medical Leave : 1 day remaining out of 14 days</li>
    <li class="list-group-item">Emergency Leave : 1 day remaining out of 14 days</li>
  </ul>
  <div class="card-body">
    <strong> I would like to apply for: </strong> <br><br>
  <div class="form mb-3 form-floating">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example">
            <option selected></option>
            <option value="1">Annual Leave</option>
            <option value="2">Medical Leave</option>
            <option value="3">Emergency Leave</option>
        </select>
        <label for="floatingSelect">Leave Type:</label>
    </div>

 
    <br>

        
    <button class="btn btn-primary nextBtn pull-right" type="button">Apply</button>
    </div>
</div>
</section>
    <!-- Employment Info Section --> 
    <section class="text-start row setup-content" id="step-2"> 
    <br>
    <div class="tab">
            <!-- Card Source: https://getbootstrap.com/docs/5.3/components/card/ -->
    <div class="card" style="width: 100%;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Time & Date</h5>
  </div>
<div class="card-body">
        <div class="form-floating mb-3">
            <input type="text" readonly class="form-control-plaintext" id="floatingPlaintextInput" placeholder="Duration" value="1 day">
            <label for="floatingPlaintextInput">Duration</label>
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
            <textarea class="form-control" id="floatingInput" placeholder="department" name="department" style="height: 100px"></textarea>
            <label for="floatingInput">Give me a reason</label>
    </div>
    <div class="mb-3">
  <label for="formFile" class="form-label">Upload Supporting Document</label>
  <input class="form-control" type="file" id="formFile">
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
            <!-- Card Source: https://getbootstrap.com/docs/5.3/components/card/ -->
    <div class="card" style="width: 100%;">
    <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body">
    <h5 class="card-title">Confirmation</h5>
    <p class="card-text">
    Your application is now pending approval. You will receive an email once your leave has been approved.
 </p>
 <p class="card-text">
    You may check your leave status <a href="#">here</a>.
 </p>

            <button class="btn btn-default prevBtn pull-left" type="button" >Prev</button>
            <button class="btn btn-primary nextBtn pull-right" type="button" >Next</button>
</div>
</div>
</section> 
<br>



    </div><br>
</div>

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
