<?php
include "login_header.php";
?>
<form action="login_process.php" class="">
<div class="card">
    <div class="card-title p-5">
    Log In
    </div>
    <div class="card-body">
        <div class="form-floating mb-3">
                <input type="text" class="form-control" id="emp_name" placeholder="emp_name" name="emp_name">
                <label for="emp_name">Name</label>
                <div class="invalid-feedback">
                Please type a valid name.
                </div>
            </div>
        </div>
</div>

</form>