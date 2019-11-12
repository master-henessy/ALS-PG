<?php
  include('dbconnections.php');
  session_start();

                if(isset($_POST['submit'])){
                    $fname = $_POST["fname"];
                    $mname = $_POST["mname"];
                    $lname = $_POST["lname"];
                    $fullname = $fname." ".$mname." ".$lname;
                    $address = $_POST["address"];
                    $bday = $_POST["bday"];
                    $gender = $_POST["gender"];
                    $cnumber = $_POST["cnumber"];
                    $email = $_POST["email"];
                    $educational = $_POST["educational"];

                    $query =$conn->prepare("SELECT * FROM students WHERE fname = '$fname' AND mdname = '$mname' AND lname = '$lname' AND bday = '$bday' AND email = '$email' AND gender = '$gender'");
                    $query->execute();
                    $res = $query->get_result();

                    if($res->num_rows>0){

                    echo  '<script> alert("Student already exists!"); window.location.href = "addstudent.php"; </script>';

                    }

                    else{

                    $query=mysqli_query($conn,"INSERT INTO students (fname, mdname,  lname, fullname, address, bday,  gender,  contactno, email, education) VALUES ('$fname', '$mname',  '$lname', '$fullname', '$address', '$bday',  '$gender',  '$cnumber', '$email', '$educational')")or die(mysqli_error($conn));

                    $query3=mysqli_query($conn,"SELECT * FROM students WHERE fname='$fname' AND mdname='$mname' AND  lname='$lname'")or die(mysqli_error($conn));
                        while ($row5=mysqli_fetch_array($query3)){
                    $id=$row5['Student_id'];}

                  }
                }


if (!isset($_SESSION['userID'])) {
  header('Location:login.php');
}

if ($_SESSION['usertype'] == "User"){
  header('Location:instructor/home.php');
}
?>

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
                  <form method="POST" action="addstudent-confirm2.php">
                    <div class="form-group">

                    <center><h5>Part II - Assessment Process</h5></center><br>
                    
                    <div class="form-group" hidden>
                      <input class="form-control" id="sid" name="sid" type="text" value="<?php echo $id;?>" hidden>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">PIS Score:</label>
                      <input class="form-control" id="pis" name="pis" type="text" placeholder="Enter PIS Score" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">PIS Number of Items:</label>
                      <input class="form-control" id="pisnoi" name="pisnoi" type="text" placeholder="Enter PIS Number of Items" required>
                    </div>

                     <div class="form-group">
                      <label for="exampleInputPassword1">FLT Score:</label>
                      <input class="form-control" id="flt1" name="flt1" type="text" placeholder="Enter FLT Score" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">FLT Number of Items:</label>
                      <input class="form-control" id="flt1noi" name="flt1noi" type="text" placeholder="Enter FLT Number of Items" required>
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

