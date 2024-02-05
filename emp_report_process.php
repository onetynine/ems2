<?php
session_start();
require 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $report_name = isset($_POST["report_name"]) ? $_POST["report_name"] : null;
    $report_type = isset($_POST["report_type"]) ? $_POST["report_type"] : null;
    $created_by = isset($_POST["created_by"]) ? $_POST["created_by"] : null;
    $additional_notes = isset($_POST["additional_notes"]) ? $_POST["additional_notes"] : null;
    $data_labels = isset($_POST["data_labels"]) ? $_POST["data_labels"] : null;
    $datasets = isset($_POST["datasets"]) ? $_POST["datasets"] : null;
    $created_at = isset($_POST["created_at"]) ? $_POST["created_at"] : null;

        // Explode the string into an array using the comma as a delimiter
    $dataLabelsArray = explode(",", $data_labels);

    // Trim each element to remove extra spaces
    $dataLabelsArray = array_map('trim', $dataLabelsArray);

    // Convert the array to a JSON-encoded string
    $jsonEncodedLabels = json_encode($dataLabelsArray);

    $data_labels = $jsonEncodedLabels;
    


    // Hash passwords if applicable
    // $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    // Your SQL query with named placeholders
    $sql = "INSERT INTO emp_report 
    (report_name, report_type, additional_notes, data_labels, datasets, created_at, created_by) 
    VALUES (:report_name, :report_type, :additional_notes, :data_labels, :datasets, 
    :created_at, :created_by)";

    $stmt = $pdo->prepare($sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        $stmt->bindParam(':report_name', $report_name);
        $stmt->bindParam(':report_type', $report_type);
        $stmt->bindParam(':additional_notes', $additional_notes);
        $stmt->bindParam(':data_labels', $data_labels);
        $stmt->bindParam(':datasets', $datasets);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':created_by', $created_by);
   
        
        if ($stmt->execute()) {
            // Update successful
            header("Location: emp_report.php?success=true");
           
            exit();
        } else {
            // Update failed
            header("Location: " . $_SERVER['HTTP_REFERER'] . "&error=" . urlencode($stmt->errorInfo()[2]));
            exit();
        }
        
        }
        
        
    }
?>
