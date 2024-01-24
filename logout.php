<?php
require 'session.php';
require 'conn.php';

session_destroy();

header('location: login.php');

?>

