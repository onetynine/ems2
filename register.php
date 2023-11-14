<?php
require 'conn.php';
?>

<div class="container mx-auto">
    <div class="row">
    <div class="col-md-3">
       <?php include "header.php"; ?>
    </div>
    <div class="col-md-8 pt-4 mt-5 text-center mx-auto">
<h2>Registration</h2>
<form action="register_process.php" method="post">

    <!-- Personal Info Section -->

  
      
        <div class="text-start">
            <h4>Personal Info</h4>
            <span> Please fill up staff information correctly. </span><br>
        </div>

    <br>
    <div class="tab">
        <div class="form-floating mb-3">
            <input type="text" oninput="this.className = ''" class="form-control" id="floatingInput" placeholder="name" name="name">
            <label for="floatingInput">Name</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" oninput="this.className = ''" class="form-control" id="floatingInput" placeholder="name@example.com" name="nric">
            <label for="floatingInput">NRIC</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" oninput="this.className = ''" class="form-control" id="floatingInput" placeholder="phone" name="phone">
            <label for="floatingInput">Phone</label>
        </div>
        <div class="form-floating mb-3">
            <input type="email" oninput="this.className = ''" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating mb-3">
            <input type="password" oninput="this.className = ''" class="form-control" id="floatingInput" placeholder="password" name="password">
            <label for="floatingInput">Password</label>
            </div>
        </div>
        </div>  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
    <!-- Circles which indicates the steps of the form: -->
    <div style="text-align:center;margin-top:40px; display:block-inline">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
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



<script>var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}</script>