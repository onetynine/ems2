<?php

require "conn.php";

if (isset($_GET['memoid'])) {
    $email = $_GET['memoid'];

    try {
        // Fetch user information from userinfo and empinfo tables based on the email
        $sql = "SELECT *
                FROM memoinfo";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            // Handle the case when user data is not found
            throw new Exception("User not found");
        }
    } catch (Exception $e) {
        // Log the error or display a user-friendly message
        echo "Error: {$e->getMessage()}";
        exit();
    }
} else {
    // Handle the case when email parameter is not set
    echo "Email parameter is missing";
    exit();
}
?>


<div class="container mx-auto">
    <div class="row">
    <div class="col-md-3">
       <?php include "header.php"; ?>
    </div>

<style>
    .content{
        margin-top: 35px;
    }
    html[data-bs-theme="dark"] div.dtsp-panesContainer div.dtsp-searchPane div.dataTables_wrapper div.dataTables_scrollBody {
  background: var(--bs-table-bg) !important;
}
</style>

<div class="col-md-8 pt-4 mt-5 mx-auto">
      
    <h3>Dashboard</h3><hr>
    <div class="text-start">
            <h5>Memo</h5>
            <span> Displays employee information in table form. Search, filter and edit individually. </span>
            <br>
        </div>
        
<br>


<div class="card">
  <h6 class="card-header">Memo #<?php echo $user["memoid"]; ?> / <?php echo $user["dateposted"]; ?>
  </h6>
  <div class="card-body">
    <h5 class="card-title"><?php echo $user["memotitle"]; ?></h5>
    <h6 class="card-text"><?php echo $user["memostart"]; ?> to <?php echo $user["memoend"]; ?></h6>
    <p class="card-text"><?php echo $user["memocontent"]; ?></p>
    <a href="#" class="btn btn-primary">Read more...</a>
  </div>
</div><br>

                </div>
    </div>
</div></div></div>

<?php include "footer.php"; ?>

</body>
</html>

<style>
    .icon-link i {
    margin-right: 12px;
}


</style>

<script>
$(document).ready(function() {
    $('#info').DataTable({
        responsive: true,
        dom: 'Plfrtip',
        
        searchPanes: {
            initCollapsed: true
        },
        
        columnDefs: [
        {
            searchPanes: {
                show: true
                
            },
            targets: [3,4,5]
        },
        {
            searchPanes: {
                show: false
            },
            targets: [0]
        }
        
    ],
    
    
            });
});
</script>

 