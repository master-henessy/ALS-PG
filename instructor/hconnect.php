<?php
session_start();
require('dbconnections.php');
$id = $_SESSION['userID'];
$sy = $_SESSION['sy'];
$referral = $_SESSION['referral'];

if (!isset($_SESSION['userID'])) {
  header('Location:login.php');
}

if ($_SESSION['usertype'] == "Admin") {
  header('Location:../home.php');
}
?>