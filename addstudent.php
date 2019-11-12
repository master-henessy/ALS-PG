<?php include('hconnect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>ALS FMS | Admin Dashboard</title>
  <?php include('header.php'); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
   
  <?php include ('navbar.php'); ?> 


  <div class="content-wrapper"  id="showpage" style="width: 84%">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
         <li class="breadcrumb-item">
          <a href="students.php">Students</a>
        </li>
        <li class="breadcrumb-item active">Add Student Record</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Add Student Record</div>
                <div class="card-body">
                  <form method="POST" action="addstudent-confirm.php">
                    <div class="form-group">

                    <center><h5>Part I - Personal Information</h5></center><br>

                      <label for="exampleInputEmail1">First Name:</label>
                      <input class="form-control" id="fname" name="fname" type="text" aria-describedby="emailHelp" placeholder="Enter First Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Middle Name:</label>
                      <input class="form-control" id="mname" name="mname" type="text" placeholder="Enter Middle Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Last Name:</label>
                      <input class="form-control" id="lname" name="lname" type="text" placeholder="Enter Last Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address:</label>
                      <input class="form-control" id="address" name="address" type="text" placeholder="Enter Address" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Birthday:</label>
                      <input class="form-control" id="bday" name="bday" type="date" placeholder="Enter Date of Birth" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Gender:</label>
                       <select class="form-control" id="gender" name="gender" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contact Number:</label>
                      <input class="form-control" id="cnumber" name="cnumber" type="text" placeholder="Enter Contact Number (09xxxxxxxxx)" maxlength="11" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">E-mail Address:</label>
                      <input class="form-control" id="email" name="email" type="email" placeholder="Enter E-mail Address" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Highest Educational Attainment:</label>
                      <select class="form-control" id="educational" name="educational" required>
                        <option value="">Select Educational Attainment</option>
                        <option value="Elementary - Under Graduate">Elementary - Under Graduate</option>
                        <option value="Elementary - Graduate">Elementary - Graduate</option>
                        <option value="Highschool - Undergraduate">Highschool - Undergraduate</option>
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
