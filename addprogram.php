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
        <li class="breadcrumb-item active">Add a Program</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Add A Program</div>
                <div class="card-body">
                  <form method="POST" action="addprogram-confirm.php">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Program Name:</label>
                      <input class="form-control" id="pname" name="pname" type="text" aria-describedby="emailHelp" placeholder="Enter Program Name" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Program Details:</label>
                       <textarea class="form-control" style="height:250px;overflow:auto;resize:none" id="info" name="info" type="text" required></textarea>
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