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
        <li class="breadcrumb-item active">View Student Record</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">View Student Record</div>
                <div class="card-body">
                  <form method="POST" action="#">
                    <div class="form-group">
<?php
include('dbconnections.php');
		$id=$_GET['id'];
    $query=mysqli_query($conn,"select * from students where status='1' AND Student_id='$id'")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['Student_id'];
        $fname=$row['fname'];
        $mname=$row['mdname'];
        $lname=$row['lname'];
        $address = $row["address"];
        $bday = $row["bday"];
        $gender = $row["gender"];
        $cnumber = $row["contactno"];
        $email = $row["email"];
        $educational = $row["education"];
        $dateadded = $row["dateadded"];
        $program = $row["program"]." Program";
        $lrn = $row["lrn"];
        $req = $row["req"];
        $reqfile = $row["reqfile"];

        $query2=mysqli_query($conn,"select * from exams where student_id='$id'")or die(mysqli_error($conn));
        $row2=mysqli_fetch_array($query2);
        $record_id=$row2['record_id'];
        $pis_grade=$row2['pis'];
        $flt1_grade=$row2['flt1'];
        $pis_noi=$row2['pis_noi'];
        $flt1_noi=$row2['flt1_noi'];

        $pis = $pis_grade." (".$pis_noi." items)";
        $flt1 = $flt1_grade." (".$flt1_noi." items)";

}
        
?>                      

                  
                     <a href="../<?php echo $reqfile;?>" class="btn btn-danger" target="_blank">
                      <i class="fa fa-eye"></i>
                      <span class="nav-link-text">View Requirement File</span>
                      <span class="nav-link-text"></span>
                    </a>
                    <h1></h1>


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
                    <div class="form-group">
                      <label for="exampleInputPassword1">Highest Educational Attainment:</label>
                      <input class="form-control" id="educational" name="educational" type="text" value="<?php echo $educational;?>" readonly>
                    </div>

                    <br><center><h5>Part II - Assessment Results</h5></center><br>

                    <div class="form-group">
                      <label for="exampleInputPassword1">PIS Score:</label>
                      <input class="form-control" id="pis" name="pis" type="text" value="<?php echo $pis;?>" readonly>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">FLT Score:</label>
                      <input class="form-control" id="flt" name="flt" type="text" value="<?php echo $flt1;?>" readonly>
                    </div>

                    <br><center><h5>Part III - Enrollment Information</h5></center><br>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Student LRN:</label>
                      <input class="form-control" id="lrn" name="lrn" type="text" value="<?php echo $lrn;?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Program:</label>
                      <input class="form-control" id="program" name="program" type="text" value="<?php echo $program;?>" readonly>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">Enrolled Date:</label>
                      <input class="form-control" id="dateadded" name="dateadded" type="text" value="<?php echo $dateadded;?>" readonly>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">Requirements Status:</label>
                      <input class="form-control" id="req2" name="req2" type="text" value="<?php echo $req;?>" readonly>
                    </div>


                  </form>

             
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
     
            <?php include('hfooter.php'); ?>
