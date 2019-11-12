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
          <a href="reports.php">Reports</a>
        </li>
        <li class="breadcrumb-item active">Add a Document</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Add a Document</div>
                <div class="card-body">
                  <form method="POST" action="addfile-confirm.php" enctype="multipart/form-data">
                    <div class="form-group">

                      <label for="exampleInputEmail1">Document Name:</label>
                      <input class="form-control" id="filename" name="filename" type="text" aria-describedby="emailHelp" placeholder="" required>
                    </div>
                    <div class="form-group">

                      <label for="exampleInputEmail1">Document File:</label>
                      <input class="form-control" id="file" name="file" type="file" aria-describedby="emailHelp" placeholder="" required>
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
