<?php
session_start();
require('dbconnections.php');
$id = $_SESSION['userID'];
$username = $_SESSION['Username'];
$sy = $_SESSION['sy'];

if (!isset($_SESSION['userID'])) {
  header('Location:login.php');
}

if ($_SESSION['usertype'] == "User") {
  header('Location:instructor/home.php');
}
?>