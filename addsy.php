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
          <a href="settings.php">Settings</a>
        </li>
        <li class="breadcrumb-item active">Add a School Year</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Add A School Year</div>
                <div class="card-body">
                  <form method="POST" action="addsy-confirm.php">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Start Year:</label>
                      <input class="form-control" id="sy1" name="sy1" type="text" aria-describedby="emailHelp" placeholder="Enter Start Year" required>
                    </div>
                      <div class="form-group">
                      <label for="exampleInputEmail1">End Year:</label>
                      <input class="form-control" id="sy2" name="sy2" type="text" aria-describedby="emailHelp" placeholder="Enter End Year" required>
                    </div>
                    
                    
                     <center><input value="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
                  </form>
             
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
        <?php include('hfooter.php'); ?>