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
        <li class="breadcrumb-item active">Add a Room</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Add A Room</div>
                <div class="card-body">
                  <form method="POST" action="addroom-confirm.php">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Room Number:</label>
                      <input class="form-control" id="room_no" name="room_no" type="text" aria-describedby="emailHelp" placeholder="Enter Room Number" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Room Name:</label>
                      <input class="form-control" id="rname" name="rname" type="text" aria-describedby="emailHelp" placeholder="Enter Room Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Capacity:</label>
                      <input class="form-control" id="capacity" name="capacity" type="text" aria-describedby="emailHelp" placeholder="Enter Room Capacity" required>
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