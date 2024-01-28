<?php
session_start();
require "conn.php";


if (isset($_SESSION['admin'])) {
  if ($_SESSION['admin'] === true) {
      require "index_admin.php";

  } elseif($_SESSION['admin'] === false) {
    require "index_user.php";

  }
} else {
  include "logout.php"; // If no session
}


?>


       
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><br>
       

      <br>
    

</main>
</body>
</html>



 