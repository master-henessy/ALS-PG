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
        <li class="breadcrumb-item">
          <a href="reminders.php">Reminders</a>
        </li>
        <li class="breadcrumb-item active">Add Reminder</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Add a Reminder</div>
                <div class="card-body">
                  <form method="POST" action="addreminder-confirm.php">
                    <div class="form-group">

                      <label for="exampleInputEmail1">Reminder Name:</label>
                      <input class="form-control" id="rname" name="rname" type="text" aria-describedby="emailHelp" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Reminder Details:</label>
                      <textarea class="form-control" style="height:250px;overflow:auto;resize:none" id="content" name="content" type="text" required></textarea>
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
