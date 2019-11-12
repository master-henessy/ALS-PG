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
        $lrn = $row["lrn"];
        $education = $row["education"];
        $program = $row["program"];
        $sec_no = $row["sec_no"];
        $req = $row["req"];
        $reqfile = $row["reqfile"];
        $sy = $row["sy"];
        $dateadded = $row["dateadded"];
      }

    $query2=mysqli_query($conn,"select * from exams where student_id='$id'")or die(mysqli_error($conn));
      while ($row2=mysqli_fetch_array($query2)){
        $id=$row2['student_id'];
        $pis=$row2['pis'];
        $flt1=$row2['flt1'];
        $pis_noi=$row2['pis_noi'];
        $flt1_noi=$row2['flt1_noi'];
      }

          
        
?>         
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Add Student Record</div>
                <div class="card-body">
                  <form method="POST" action="editstudent-confirm.php" enctype="multipart/form-data">
                  <div class="form-group">
                      <input class="form-control" id="id" name="id" type="text" value="<?php echo $id;?>" hidden>
                    </div>
                    <div class="form-group">

                    <center><h5>Part I - Personal Information</h5></center><br>

                      <label for="exampleInputEmail1">First Name:</label>
                      <input class="form-control" id="fname" name="fname" type="text" value="<?php echo $fname;?>" required>
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
                      <input class="form-control" id="cnumber" name="cnumber" type="text" value="<?php echo $cnumber;?>" maxlength="11" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">E-mail Address:</label>
                      <input class="form-control" id="email" name="email" type="email" value="<?php echo $email;?>" required>
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

                     <center><h5>Part II - Assessment Results</h5></center><br>

                    <div class="form-group">
                      <label for="exampleInputPassword1">PIS Score:</label>
                      <input class="form-control" id="pis" name="pis" type="text" value="<?php echo $pis.'/'.$pis_noi;?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">FLT 1 Score:</label>
                      <input class="form-control" id="flt1" name="flt1" type="text" value="<?php echo $flt1."/".$flt1_noi;?>" readonly>
                    </div>

                    <center><h5>Part III - Student Profile</h5></center><br>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Student LRN:</label>
                      <input class="form-control" id="lrn" name="lrn" type="text" value="<?php echo $lrn;?>" required maxlength="12">
                    </div>

                    <div class="form-group">
                      <label for="sel1">Select Requirements Submitted:</label>
                      <select class="form-control" name="req" id ="req">
                        <option value="No Requirement">No Requirement Submitted</option>
                        <option value="Incomplete Requirements">Incomplete Requirements</option>
                        <option value="Complete Requirements">Complete Requirements</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="sel1">Requirement File:</label><br>
                      <img src="<?php echo $reqfile; ?>" style="border: 1px solid #ccc; width: 1060px; height: 500px;">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">School Year:</label>
                      <input class="form-control" id="sy" name="sy" type="text" value="<?php echo $sy;?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Program:</label>
                      <input class="form-control" id="program" name="program" type="text" value="<?php echo $program." Program";?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Section:</label>
                      <input class="form-control" id="sec_no" name="sec_no" type="text" value="<?php echo "Section ".$sec_no;?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Date Added:</label>
                      <input class="form-control" id="dateadded" name="dateadded" type="text" value="<?php echo $dateadded;?>" readonly>
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
