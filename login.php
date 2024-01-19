<?php
include "login_header.php";


$admin_email = "admin@ems.my";
$admin_password = "admin123";
$user_email = "user1@ems.my";
$user_password = "user123";


?>
<form action="login_process.php" method="post" class="">
    <div class="row">
<div class="col-4 card mx-auto" style="margin-top: 20vh;">

  <img src="..." class="card-img-top" alt="...">
  <div class="card-body text-center">
    <h5 class="card-title">Log In</h5>
    <p class="card-text">Fill in your email address and password to login or use Admin or Employee link
      provided down below.
    </p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input name="emp_email" required type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password</label>
        <input name="emp_password" required type="password" class="form-control" id="exampleFormControlInput2" placeholder=""
        >
        </div>
        <button class="btn btn-primary" type="submit">Log In</button>
    </li>
  </ul>
  <div class="card-body">
    <a id="admin-link" href="#" name="admin" class="card-link">Admin</a>
    <a id="employee-link" href="#" name="user" class="card-link">Employee</a>
  </div>
  

</div>
</form>
<div class="col-8 card mx-auto w-50 border-0" style="margin-top: 30vh;">
  <div class="card-body text-center">
    <h5 class="card-title">EMS</h5>
    <p class="card-text">Hi, welcome to EMS! It stands for Employee Management System. 
    This is a demo version, some or many modules are disabled until they are completed. 
    Please write an email or send me a message if you have any
    suggestions to make. </p>

    <p>Feel free to use login button below to quickly try its functionality. This is for 
      testing/demo purposes only and will not be a part of the actual product.
    </p>

    <style>
      a{
        text-decoration: none;
      }
    </style>

    <div class="card-body">
        <div class="row">
        <div class="col m-6">
                <a href="#" class="no-link"><i class="fa-solid fa-2xl fa-unlock"></i><br><br>
                <p>Documentation</p></a>
        </div> 
        <div class="col m-6">
                <a href="#" class="no-link"><i class="fa-solid fa-2xl fa-unlock"></i><br><br>
                <p>Hire me. <small>(please)</small></p></a>
        </div>
    </div>
  </div>
  </div><br>


</div>

<script>
    document.getElementById('admin-link').addEventListener('click', function () {
        document.getElementById('exampleFormControlInput1').value = 'admin@ems.my';
        document.getElementById('exampleFormControlInput2').value = 'admin123';
    });

    document.getElementById('employee-link').addEventListener('click', function () {
        document.getElementById('exampleFormControlInput1').value = 'user1@ems.my';
        document.getElementById('exampleFormControlInput2').value = 'user123';
    });
</script>