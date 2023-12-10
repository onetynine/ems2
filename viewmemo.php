<?php

require "conn.php";

// Directly query the database for user information
$sql = "SELECT *
        FROM memo
        ORDER BY memo_post_date DESC";


$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch all rows into an associative array
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

       <?php include "header.php"; ?>
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <br>
<style>
    .content{
        margin-top: 35px;
    }
    html[data-bs-theme="dark"] div.dtsp-panesContainer div.dtsp-searchPane div.dataTables_wrapper div.dataTables_scrollBody {
  background: var(--bs-table-bg) !important;
}
</style>
  
    <h3>Dashboard</h3><hr>
    <div class="text-start">
            <h5>Memo</h5>
            <span> Displays employee information in table form. Search, filter and edit individually. </span>
            <br>
        </div>
        
<br>
<!-- <div class="mb-3">
<input type="text" class="form-control" id="memoSearch" placeholder="Search here...">
</div> -->
<div class="input-group mb-3">
        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
            <div class="form-floating form-floating-group flex-grow-1">
                <input type="text" class="form-control" name="code1" id="memoSearch" placeholder="">
                <label for="code1">Search here...</label>
            </div>
    </div>
<div class="overflow-auto" style="height:63%;">

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
</div></div></div>
</div>

</body>
</html>

<style>
    .icon-link i {
    margin-right: 12px;
}


</style>

 <script>

//  Search Script, source: ChatGPT //
 $(document).ready(function() {
    // Add event listener for the search bar
    $('#memoSearch').on('keyup', function () {
        var searchTerm = $(this).val().toLowerCase();

        // Loop through each memo card and hide/show based on the search term
        $('.card').each(function () {
            var memoTitle = $(this).find('.card-title').text().toLowerCase();
            var memoContent = $(this).find('.card-text').text().toLowerCase();
            var memoDate = $(this).find('.card-header').text().toLowerCase();

            var matchFound = memoTitle.includes(searchTerm) ||
                             memoContent.includes(searchTerm) ||
                             memoDate.includes(searchTerm);

            $(this).toggle(matchFound);
        });
    });
});
</script>