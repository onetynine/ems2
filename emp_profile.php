<?php

require "conn.php";

?>


       <?php include "header.php"; ?>
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


      <br>
    <h3>Employee Profile</h3><hr>
    <div class="text-start">
            <h5>Viewing $name 's profile</h5>
            <span> Displays employee information in table form. Search, filter and edit individually.</span>
            <br>
        </div>
        <br>
        <div class="card" style="max-width: 540px;">
    <div class="row no-gutters">

        <div class="col-md-8">
            <!-- Right side for other texts -->
            <div class="card-body">
                <h5 class="card-title">Employee Name</h5>
                <p class="card-text">Designation</p>
                <p class="card-text">Add Social Media buttons here for contact</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Left side for profile photo -->
            <img src="..." class="card-img" alt="Profile Photo">
        </div>
    </div>
</div>
<br>
        <div class="card text-center">
  <div class="card-header">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link" aria-current="true" href="#">General</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Leave</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Performance</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>

</main>
</body>
</html>


 