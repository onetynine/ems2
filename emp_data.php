<?php
// Example user input
$userInput = "Label1,Label2,Label3";

// Explode the string into an array using the comma as a delimiter
$dataLabelsArray = explode(",", $userInput);

// Trim each element to remove extra spaces
$dataLabelsArray = array_map('trim', $dataLabelsArray);

// Convert the array to a JSON-encoded string
$jsonEncodedLabels = json_encode($dataLabelsArray);

// Output the result
echo $jsonEncodedLabels;
?>
