<?php 
include('dbconnections.php');
session_start();

$desc = 'Logged out into the system';
$username = $_SESSION['Username'];
$log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
$log->execute();

 session_destroy();
if(empty($_SESSION['id'])):
header('Location: login.php');
endif;
?>