<?php
require "conn.php";
include "header.php";

$sql = "SELECT *
        FROM memo
        ORDER BY memo_post_date DESC";


$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all rows into an associative array
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4"><br>

<div class="card">
    <div class="row no-gutters">
        <div class="col-md-8">
            <!-- Right side for other texts -->
            <div class="card-body">
                <h3 class="card-title">Hello User! </h3>
                <h5 class="card-text">test</h5>
                <p>Connect with me:</p>
                <a href="https://github.com" class="fa fa-github p-2"> </a>
                <a href="https://linkedin.com" class="fa fa-linkedin p-2"> </a>
                <a href="https://twitter.com" class="fa fa-twitter p-2"> </a>
            </div>
        </div>
        <style>
            a{
                text-decoration: none;
                
            }
          .card-img{
            border-radius: 50%;
            width: 155px;
            margin: 15px;                   
          }
        </style>
        <div class="col-md-4 d-flex justify-content-end">
            <img src="assets/profile.jpeg" class="card-img" alt="Profile Photo">
        </div>
    </div>
<div class="card p-2 border-0">
<div class="accordion accordion-flush" id="accordionFlushExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
        Attention Required <span class="badge m-2 bg-danger rounded-pill">  14</span>
      </button>
    </h2>
    <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
      <div class="accordion-body">
      <ul class="list-group ">
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Pending Claim Approval</div>
      <a href="#">View</a> |
      <a href="#">Dismiss</a> |
      <a href="#">Print</a> 
    </div>
    <span class="badge bg-danger rounded-pill">14</span>
  </li>
  <li class="list-group-item d-flex justify-content-between align-items-start">
    <div class="ms-2 me-auto">
      <div class="fw-bold">Pending Leave Approval</div>
      <a href="#">View</a> |
      <a href="#">Dismiss</a> |
      <a href="#">Print</a> 
    </div>
    <span class="badge bg-danger rounded-pill">14</span>
  </li>
</ul>
    </div>
  </div>

</div>
</div></div></div><br>
<div class="row">
<div class="card p-2 col-md-8 border-0">
<div class="overflow-auto" style="height: 550px;">
<h4>Announcement</h4><hr>
<?php foreach ($users as $user): ?>
    
<div class="card">
    
  <h6 class="card-header">Memo #<?php echo $user["memo_id"]; ?> / <?php echo $user["memo_post_date"]; ?> <span class="badge text-bg-danger">Urgent</span>
  </h6>
  <div class="card-body">
    <h5 class="card-title"><?php echo $user["memo_subject"]; ?></h5>
    <h6 class="card-text"><?php echo $user["memo_start_date"]; ?> to <?php echo $user["memo_end_date"]; ?></h6>
    <p class="card-text"><?php echo $user["memo_content"]; ?></p>
    <a href='memodetail.php?memoid=<?php echo $user["memo_id"]; ?>' class="btn btn-sm btn-primary">Read more...</a>
  </div>
</div>
<br>

<?php endforeach; ?><br>
                
</div>
</div>
<div class="card p-2 col-md-4 border-0">
<div class="overflow-auto text-center" style="height: 550px;">
<h4>About Company <i class="fa fa-pen fa-sm"></i></h4>
<hr>
Logo
Name
Summary
Link
Policies
            
</div>
</div>

</main>
</body>
</html>


<script>
$(document).ready(function() {
    $('#info').DataTable({
        dom: "<'row'<'col-sm-12 d-flex justify-content-between'Bf>>" + 
             "<'row'<'col-sm-12'tr>>" +
             "<'row'<'col-sm-4'l><'col-sm-8'pi>>",
        scrollX: true,
        responsive: true,
        select: true,
        buttons: [
            {
                text: 'Export as...',
                extend: 'collection',
                buttons: [
                    'csv', 'excel', 'pdf' , 'print'
                ]
            }
        ]
       
        
            });
});
</script>

 