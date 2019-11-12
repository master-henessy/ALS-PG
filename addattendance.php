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
          <a href="grades.php">Grades</a>
        </li>
        <li class="breadcrumb-item active">Record Attendance</li>
      </ol> 
      
      <?php
    $id=$_GET['id'];
          
?>               

          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Record Attendance</div>
                <div class="card-body">
                  <form method="POST" action="addattendance-confirm.php">
                    
                    <div class="form-group" hidden>
                      <input class="form-control" id="id" name="id" type="text" value="<?php echo $id;?>" hidden>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Attendance Date:</label>
                      <input class="form-control" id="date" name="date" type="date" aria-describedby="emailHelp"required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Status:</label>
                       <select class="form-control" id="status" name="status" required="true" style="color: black;">
                          <option value="">Select Attendance Status</option>
                        <option value="Present">Present</option>
                        <option value="Absent">Absent</option>
                  </select>
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