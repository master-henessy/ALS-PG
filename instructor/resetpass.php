<?php include('hconnect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ALS FMS | Admin Dashboard</title>
  <?php include('header.php'); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
   
  <?php include ('navbar.php'); ?> 


  <div class="content-wrapper"  id="showpage" style="width: 87%">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="profiles.php">Profiles</a>
        </li>
        <li class="breadcrumb-item active">Change Password</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-5">
                <div class="card-header">Reset Password</div>
                <div class="card-body">
                  <form method="POST" action="changepass-confirm.php">
                    <div class="form-group">

                              <?php if(isset($_SESSION['error_change'])){ ?>

                                <div class="alert alert-danger">
                                  <?php echo $_SESSION['error_change'];?>
                                </div>
                                
                              <?php $_SESSION['error_change'] = null; }?> 
                      <label for="exampleInputEmail1">New Password:</label>
                      <input class="form-control" id="password1" name="password1" type="password" aria-describedby="emailHelp" placeholder="Enter New Password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Retype New Password:</label>
                      <input class="form-control" id="password2" name="password2" type="password" placeholder="Enter Retype New Password">
                    </div>

                    <input value="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" />
                  </form>
             
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
      <?php include('hfooter.php'); ?>