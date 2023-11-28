<?php

$dbname = "emsdemo";
$servername = "localhost";
$username = "root";
$password = "";

// $dbname = "if0_35495079_emsdemo";
// $servername = "sql208.infinityfree.com";
// $username = "if0_35495079";
// $password = "pQMkSszp0qQ";

$dsn = "mysql:host=$servername;dbname=$dbname";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: {$e->getMessage}";
}


/* PDO Closes connection automatically, good practice to close it 
 explicitly anyway. Use:
 
 $pdo = null;

 */
