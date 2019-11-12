<?php session_destroy();
if(empty($_SESSION['id'])):
header('Location: ../login.php');
endif;
?>