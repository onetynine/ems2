<?php
session_start();
require "conn.php";

if (isset($_GET['report_id'])) {
  $report_id = $_GET['report_id'];

  try {
      // Fetch user information from userinfo and empinfo tables based on the id
      $sql = "SELECT *
              FROM emp_report
              WHERE report_id = :report_id";

      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':report_id', $report_id);
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
  // Handle the case when id parameter is not set
  echo "id parameter is missing";
  exit();
}
?>

       <?php include "header.php"; ?>
       <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

       <?php
var_dump($_SESSION['emp_name']);
?>
      <br>
    <h3>Employee Profile</h3><hr>
    <div class="text-start">
            <h5>Viewing <?php echo $user['report_name'] ?></h5>
            <span> <?php echo $user['additional_notes'] ?></span>
            <br>
        </div>
        <br>
        <style>
          .fa {
            color: inherit; /* or specify your desired color */
            text-decoration: none; /* optional: remove underline */
          }
        </style>
        <div class="card">
    <div class="row no-gutters">

        <div class="col-md-12 mx-auto">
        <div style="width: 100%; height: 360px;">
        <canvas id="myPieChart"></canvas>
    </div>

        </div>


    </div>
</div>
<br>
<div class="table mt-4">
    <?php
    $dataLabels = json_decode($user['data_labels'], true);
    $datasets = json_decode($user['datasets'], true);

    // Check if decoding was successful
    if ($dataLabels !== null && $datasets !== null) {
    ?>
        <table class="table table-hover table-responsive" style="width: 100%">
            <thead>
                <tr>
                    <th>Data Labels</th>
                    <?php
                    foreach ($datasets as $dataset) {
                        echo '<th>' . htmlspecialchars($dataset['label']) . '</th>';
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 0; $i < count($dataLabels); $i++) {
                    $label = htmlspecialchars($dataLabels[$i]);
                    echo "<tr><td>$label</td>";

                    
                    foreach ($datasets as $dataset) {
                        if (isset($dataset['data'][$i])) {
                            $value = $dataset['data'][$i];
                            echo '<td>' . $value . '</td>';
                        } else {
                            echo '<td></td>'; 
                        }
                    }

                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    <?php
    } else {
        echo "Error decoding JSON data labels or datasets.";
    }

    ?>
</div>



</main>
</body>
</html>




    <script>
        // Sample data for the pie chart
        var data = {
            labels: <?php echo $user['data_labels'] ?>,
            datasets: <?php echo $user['datasets'] ?>
        };

        // Get the canvas element and initialize the chart
        var ctx = document.getElementById('myPieChart').getContext('2d');
        var myPieChart = new Chart(ctx, {
            type: '<?php echo $user['report_type'] ?>',
            data: data,
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>