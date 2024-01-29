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


  
    

</main>
</body>
</html>



 