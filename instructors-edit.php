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
          <a href="Instructors.php">Instructors</a>
        </li>
        <li class="breadcrumb-item active">Edit Instructor Profile</li>
      </ol> 
      

          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">View Instructor Record</div>
                <div class="card-body">
                  <form method="POST" action="editinstructor-confirm.php">
                    <div class="form-group">

     <?php
include('dbconnections.php');
		$view=$_GET['id'];
    $query=mysqli_query($conn,"select * from instructors where status=1 AND Instructor_id='$view'")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['Instructor_id'];
        $fname=$row['fname'];
        $mname=$row['mdname'];
        $lname=$row['lname'];
        $address = $row["address"];
        $bday = $row["bday"];
        $gender = $row["gender"];
        $cnumber = $row["contactno"];
        $email = $row["email"];
        $dateadded=$row['dateadded'];
        
?>                      
                    <center><h5>Part I - Personal Information</h5></center><br>

                      <label for="exampleInputEmail1">First Name:</label>
                      <input class="form-control" id="fname" name="fname" type="text" value="<?php echo $fname;?>" required>
                    </div>
                    <div class="form-group">
                      <input class="form-control" id="id" name="id" type="text" value="<?php echo $id;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Middle Name:</label>
                      <input class="form-control" id="mname" name="mname" type="text" value="<?php echo $mname;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Last Name:</label>
                      <input class="form-control" id="lname" name="lname" type="text" value="<?php echo $lname;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address:</label>
                      <input class="form-control" id="address" name="address" type="text" value="<?php echo $address;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Birth Date:</label>
                      <input class="form-control" id="bday" name="bday" type="date" value="<?php echo $bday;?>" required>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Gender:</label>
                       <select class="form-control" id="gender" name="gender" required="true" style="color: black;">

                          <option value="">Select Gender</option>
                          <option value="Male">Male</option>
                          <option value="Female">Female</option>

                  </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contact Number:</label>
                      <input class="form-control" id="cnumber" name="cnumber" type="text" value="<?php echo $cnumber;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">E-mail Address:</label>
                      <input class="form-control" id="email" name="email" type="text" value="<?php echo $email;?>" required>
                    </div>

                    <br>

                     <div class="form-group">
                      <label for="exampleInputPassword1">Register Date:</label>
                      <input class="form-control" id="dateadded" name="dateadded" type="text" value="<?php echo $dateadded;?>" readonly>
                    </div>

					<center><input value="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>

                    <?php }?>


                  </form>
             
                </div>
              </div>
            </div>

          </body>
  </div>
</div>
       <?php include('hfooter.php'); ?>
