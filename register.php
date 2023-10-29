<?php
include "header.php";
require 'conn.php';
?>

<div class="container mt-5">
<h2>Registration</h2>
<form action="register_process.php" method="post">

    <!-- Personal Info Section -->
    <div class="step" id="step1">
        <div class="col text-right">
                <button id="" class="next-button" onclick="nextStep(1)">Next <i class="fas fa-chevron-right"></i></button>

            </div>
    <div class="card mt-4 ">
  
        <div class="card-header d-flex ">
        <div class="col text-center">
            <h3>Personal Info</h3>
        </div>

    </div>
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            
            <div class="form-group">
                <label for="nric">NRIC:</label>
                <input type="text" class="form-control" id="nric" name="nric" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea class="form-control" id="address" name="address" required></textarea>
            </div>
        </div>
    </div><br>
</div>

    <!-- Employment Info Section -->
    <div class="step" id="step2">
            <div class="col text-right">
                <button class="" onclick="prevStep(2)"><i class="fa-solid fa-arrow-left-long"></i>    Previous</button>
                <button class="" onclick="nextStep(2)">Next   <i class="fa-solid fa-arrow-right-long"></i></button>
            </div>
    <div class="card mt-4">
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

    </div>

<!-- Social Media Info Section -->
<div class="step" id="step3">
<div class="col text-right">
                <button class="" onclick="prevStep(3)"><i class="fa-solid fa-arrow-left-long"></i>    Previous</button>
                <button class="" onclick="nextStep(3)">Next   <i class="fa-solid fa-arrow-right-long"></i></button>
            </div>
    <div class="card mt-4">
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



    <!-- Miscellaneous Section -->
    <div class="step" id="step4">
        <div class="col text-right">
                <button class="" onclick="prevStep(4)"><i class="fa-solid fa-arrow-left-long"></i>    Previous</button>
                <input id="submitButton" type="submit" value="Submit">
        </div>
    <div class="card mt-4">
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
    </div>

</form>
</div>

<script>
        let currentStep = 1;
        const steps = document.querySelectorAll('.step');

        function showStep(step) {
            for (const s of steps) {
                s.style.display = 'none';
            }
            steps[step - 1].style.display = 'block';
        }

        function nextStep(step) {
            if (step < steps.length) {
                currentStep = step + 1;
                showStep(currentStep);
            }
        }

        function prevStep(step) {
            if (step > 1) {
                currentStep = step - 1;
                showStep(currentStep);
            }
        }

        showStep(currentStep);
    </script>


