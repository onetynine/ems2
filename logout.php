<?php
include 'header.php';
require 'conn.php';

session_unset();
session_destroy();

header('location: login.php');

?>

