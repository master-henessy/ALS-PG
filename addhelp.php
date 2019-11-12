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
          <a href="help.php">Help</a>
        </li>
        <li class="breadcrumb-item active">Add Help Guide</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Add Help Guide</div>
                <div class="card-body">
                  <form method="POST" action="addhelp-confirm.php">
                    <div class="form-group">

                      <label for="exampleInputEmail1">Title:</label>
                      <input class="form-control" id="title" name="title" type="text" aria-describedby="emailHelp" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Content:</label>
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
