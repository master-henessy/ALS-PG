<?php
  include('dbconnections.php');
  session_start();

  if(isset($_POST['submit'])){
            $pass1 = $_POST['password1'];
            $pass2 = $_POST['password2'];
			      $id = $_SESSION['userID'];
            $password = hash('sha1', $pass1);
            
            if ($pass1 == $pass2){
            
        $query = mysqli_query($conn, "UPDATE user SET Password='$password' WHERE User_id='$id'");
 
        echo  '<script> alert("Password was changed successfully!"); window.location.href = "home.php"; </script>';
    }
    else {
    	$_SESSION['error_change'] = "Password did not match. Try again!";
                     header('Location: resetpass.php');
    }

  }
  ?>