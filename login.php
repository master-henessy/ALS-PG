<?php
  include('dbconnections.php');
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <title>ALS FMS | Login</title>
  <?php include('header.php'); ?>

<style type="text/css">
  body
  {
    width: 100%;
    height: 300px;
    background-image: url('img/als2.jpg');
    background-size: cover;
    background-color: black;
    opacity: 1;
  }

</style>

<body onload="myFunction()" class="bg-dark">
  <div class="container" >
    <div class="card card-login mx-auto mt-5">
      
      <div class="card-body">
        <center>
        <img src="img/als-logo.png" style="height: 80%; width: 80%; margin-left: 3%;">
        <h3>P. GOMEZ CENTER</h3><br>
        <form method="POST" action="login-confirm.php">

                    <?php if(!isset($_SESSION['error_login'])){ ?>

                      <div class="alert alert-info">
                        <?php echo "Please enter your Username and Password.";?>
                      </div>
                      
                    <?php $_SESSION['error_login'] = null; }?> 

                    <?php if(isset($_SESSION['error_login'])){ ?>

                      <div class="alert alert-danger">
                        <?php echo $_SESSION['error_login'];?>
                      </div>
                      
                    <?php $_SESSION['error_login'] = null; }?> 

          <div class="form-group">
            <input class="form-control" id="username" name="username" type="text" aria-describedby="Username" placeholder="Enter Username" autofocus required />
          </div>
          <div class="form-group">
            <input class="form-control" id="password" name="password" type="password" placeholder="Enter Password" autocomplete="off" required />
          </div>
          <input value="Signin" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" />
        </form>

        </center>
      </div>
    </div>
  </div>

</body>

</html>
