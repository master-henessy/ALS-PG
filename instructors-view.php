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
          <a href="instructors.php">Instructor</a>
        </li>
        <li class="breadcrumb-item active">View Instructor Record</li>
      </ol> 
      
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
        $interview = $row["interview"];
        $exam = $row["exam"];
        $program = $row["program"];
        $req1 = $row["req1"];
        $req2 = $row["req2"];
        $req3 = $row["req3"];
        $req4 = $row["req4"];
        $dateadded=$row['dateadded'];
        
?>                      

<a href="instructors-edit.php?id=<?php echo $id;?>" class="btn btn-danger" >
                      <i class="fa fa-pencil"></i>
                      <span class="nav-link-text">Edit</span>
                      <span class="nav-link-text"></span>
                    </a>

                    <a href="instructors-delete.php?id=<?php echo $id;?>" class="btn btn-danger" >
                      <i class="fa fa-trash"></i>
                      <span class="nav-link-text">Delete</span>
                      <span class="nav-link-text"></span>
                    </a>
                    <h1></h1>

                  
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">View Instructor Record</div>
                <div class="card-body">
                  <form method="POST" action="#">
                    <div class="form-group">

                    <center><h5>Part I - Personal Information</h5></center><br>

                      <label for="exampleInputEmail1">First Name:</label>
                      <input class="form-control" id="fname" name="fname" type="text" value="<?php echo $fname;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Middle Name:</label>
                      <input class="form-control" id="mname" name="mname" type="text" value="<?php echo $mname;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Last Name:</label>
                      <input class="form-control" id="lname" name="lname" type="text" value="<?php echo $lname;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address:</label>
                      <input class="form-control" id="address" name="address" type="text" value="<?php echo $address;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Birth Date:</label>
                      <input class="form-control" id="bday" name="bday" type="text" value="<?php echo $bday;?>" Readonly>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputPassword1">Gender:</label>
                      <input class="form-control" id="gender" name="gender" type="text" value="<?php echo $gender;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contact Number:</label>
                      <input class="form-control" id="cnumber" name="cnumber" type="text" value="<?php echo $cnumber;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">E-mail Address:</label>
                      <input class="form-control" id="email" name="email" type="text" value="<?php echo $email;?>" readonly>
                    </div>


                    <br><center><h5>Part II - Registration Information</h5></center><br>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Program:</label>
                      <input class="form-control" id="program" name="program" type="text" value="<?php echo $program;?>" readonly>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">Register Date:</label>
                      <input class="form-control" id="dateadded" name="dateadded" type="text" value="<?php echo $dateadded;?>" readonly>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">Passed Requirements:</label>
                      <input class="form-control" id="req1" name="req1" type="text" value="<?php echo $req1;?>" readonly><br>
                      <input class="form-control" id="req2" name="req2" type="text" value="<?php echo $req2;?>" readonly><br>
                      <input class="form-control" id="req3" name="req3" type="text" value="<?php echo $req3;?>" readonly><br>
                      <input class="form-control" id="req4" name="req4" type="text" value="<?php echo $req4;?>" readonly><br>
                    </div>

                    <?php }?>
                  </form>
             
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
     
            <?php include('hfooter.php'); ?>
