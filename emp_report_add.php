<?php
session_start();
require "conn.php";

// Directly query the database for user infoation
$sql = "SELECT *
        FROM emp_report";

$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all rows into an associative array
$reports = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


       <?php include "header.php"; ?>
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">



      <br>
    <h3>Employee Report</h3><hr>

Create New Report


    <h4>Available Reports</h4><br>
    <form action="emp_report_process.php" method="post">
    <div class="card mb-3 border-0" style="max-width: 100%;">

    
<!-- Send timestamp and creator data as hidden -->
  <input type="hidden" name="created_at" 
  value="<?php
         $timestamp = time();
         $created_at = gmdate('Y-m-d H:i:s', $timestamp);
         echo $created_at;
         ?>" 
  class="form-control">

  <input type="hidden" name="created_by" 
  value="<?php echo $_SESSION['emp_name'];?>"
  class="form-control">
<?php
var_dump($_SESSION['emp_name']); ?>
   <div class="mb-3">
      <label for="exampleFormControlInput1" class="form-label">Report Name</label>
      <input required type="text" name="report_name" class="form-control" id="exampleFormControlInput1" placeholder="e.g., Report 1">
   </div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Visualisation</label>
  <input required type="text" name="report_type" class="form-control" id="exampleFormControlInput1" placeholder="e.g., Line, Pie, Bar">
</div>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Labels</label>
  <textarea type="text" name="data_labels" class="form-control" id="exampleFormControlInput1" placeholder="e.g., Label1,Label2,Label3">
  </textarea></div>

<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Values</label>
  <input type="text" name="datasets" class="form-control" id="exampleFormControlInput1" placeholder="e.g., Value1,Value2,Value3">
</div>

</div>
<button type="submit" id="submitBtn" class="btn btn-primary">Submit</button>
</form>
</main>
</body>
</html>



