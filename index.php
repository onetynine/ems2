<?php

require "conn.php";

if (isset($_GET['emp_admin_access']) && $_GET['emp_admin_access'] == '1') {
    include "header.php";
    include "index_admin.php";
  } else{
    include "header_user.php";
    include "index_user.php";
  }


?>


       
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><br>
       

      <br>
    

</main>
</body>
</html>



 