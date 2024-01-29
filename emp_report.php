<?php

require "conn.php";

// Directly query the database for user infoation
$sql = "SELECT *
        FROM employee";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all rows into an associative array
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


       <?php include "header.php"; ?>
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

1. Employee by Department 
2. Employee Count Growth (Current Year)
3. Employee by Contract Type
4. Custom (allow admin to create)

      <br>
    <h3>Employee</h3><hr>
    <h5>Select report type:</h5><br>
    <div class="stepwizard setup-panel d-flex flex-row align-items-center text-center m-2">
    <div class="stepwizard-step m-auto">
        <a href="#step-1" type="button" class="btn btn-sm btn-primary btn-circle">Headcount Growth</a>
        
    </div>
    <div class="stepwizard-step m-auto">
        <a href="#step-2" type="button" class="btn btn-sm btn-default btn-circle" disabled>Wage</a>
    </div>
    <div class="stepwizard-step m-auto">
        <a href="#step-3" type="button" class="btn btn-sm btn-default btn-circle" disabled>3 - Social Media Info</a>
    </div>
</div><br><hr>
    <div class="">
            <h5>Headcount Growth</h5>
            <span> Displays employee infoation in table fo. Search, filter and edit individually.</span>
            <br>
        </div>
    <section class="text-start row setup-content" id="step-1">
    <div class="container">
     <canvas id="myChart"></canvas>
    </div>
    </section>
   
    <section class="text-start row setup-content" id="step-2">
    <div class="container">
     <canvas id="myChart2"></canvas>
    </div>
    </section>

    <section class="text-start row setup-content" id="step-3">
    <div class="container">
     <canvas id="myChart3"></canvas>
    </div>
    </section>
  </div>



</div></div></div>

</main>
</body>
</html>



<script>
   // Sample data (replace this with your PHP-generated data)
   var data = {
      labels: ["January", "February", "March", "April", "May", "June", "July",
      "August", "September", "October", "November","December"],
      datasets: [
         {
            label: "Headcount Growth",
            data: [3,3,4,4,7,8,10,12,10,9,10,10,11,12],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
         },
         {
            label: "Target Headcount",
            data: [3,4,5,6,7,8,8,9,9,10,10,11,11,12,12],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
         }
      ]
   };

   // Get the canvas element and initialize the chart
   var ctx = document.getElementById('myChart').getContext('2d');
   var myChart = new Chart(ctx, {
      type: 'line', // Change the chart type as needed (bar, line, pie, etc.)
      data: data,
      options: {
         scales: {
            y: {
               beginAtZero: true
            }
         }
      }
   });

    // Sample data 2 (replace this with your PHP-generated data)
    var data = {
      labels: ["January", "February", "March", "April", "May", "June", "July",
      "August", "September", "October", "November","December"],
      datasets: [
         {
            label: "Wage Spending",
            data: [241000, 271000, 291000, 321000, 333000, 341021, 241000, 241000,
                241000, 241000, 241000, 241000],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
         },
         {
            label: "Wage Budget",
            data: [241000, 241000, 241000, 241000, 241000, 241000, 241000, 241000,
                241000, 241000, 241000, 241000],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
         }
      ]
   };

   // Get the canvas element and initialize the chart
   var ctx = document.getElementById('myChart2').getContext('2d');
   var myChart = new Chart(ctx, {
      type: 'line', // Change the chart type as needed (bar, line, pie, etc.)
      data: data,
      options: {
         scales: {
            y: {
               beginAtZero: true
            },
            x: {
                beginAtZero: true
            }
         }
      }
   });

    // Sample data 3 (replace this with your PHP-generated data)
    var data = {
      labels: ["January", "February", "March", "April", "May", "June", "July",
      "August", "September", "October", "November","December"],
      datasets: [
         {
            label: "Headcount Growth",
            data: [3,3,4,4,7,8,10,12,10,9,10,10,11,12],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
         },
         {
            label: "Target Headcount",
            data: [3,4,5,6,7,8,8,9,9,10,10,11,11,12,12],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
         }
      ]
   };

   // Get the canvas element and initialize the chart
   var ctx = document.getElementById('myChart3').getContext('2d');
   var myChart = new Chart(ctx, {
      type: 'line', // Change the chart type as needed (bar, line, pie, etc.)
      data: data,
      options: {
         scales: {
            y: {
               beginAtZero: true
            }
         }
      }
   });
 
 


 
</script>

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