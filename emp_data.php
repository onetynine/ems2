<?php
session_start();
require 'conn.php';

if (isset($_SESSION['admin'])) {
  if($_SESSION['admin'] == true){


// 
$sql = "SELECT od.opt_department_name, COUNT(e.emp_id) AS empCount
FROM opt_department od
LEFT JOIN employee e ON od.opt_department_name = e.emp_department
GROUP BY od.opt_department_name";

// Prepare and execute the query
$stmt = $pdo->prepare($sql);
$stmt->execute();

// Fetch the results as an associative array
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($results) {
  
foreach ($results as $row) {
echo "Department: " . $row['opt_department_name'] . " - Employee Count: " . $row['empCount'] . "<br>";
}
} else {
echo "No rows found";
}





















    } else {
        include "blocked.php"; // Action if admin is false
    }
} else {
    include "logout.php"; // If no session
}
