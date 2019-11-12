<?php
  include('dbconnections.php');
  session_start();

  $sy = $_SESSION['sy'];

                if(isset($_POST['submit'])){
                    $sid = $_POST["sid"];
                    $pis = $_POST["pis"];
                    $flt1 = $_POST["flt1"];
                    $pisnoi = $_POST["pisnoi"];
                    $flt1noi = $_POST["flt1noi"];
                    $pisp=($pis/$pisnoi)*100; 
                    $flt1p=($flt1/$flt1noi)*100; 

                    if ($pisp >= 75){ $pisstat = "PASS"; }
                    else { $pisstat = "FAIL"; }
                    if ($flt1p >= 75){ $flt1stat = "PASS"; }
                    else { $flt1stat = "FAIL"; }

                    $query=mysqli_query($conn,"INSERT INTO exams (student_id, pis, flt1, pis_noi, flt1_noi, pisp, flt1p, pisstat, flt1stat, sy) VALUES ('$sid', '$pis',  '$flt1',  '$pisnoi',  '$flt1noi', '$pisp', '$flt1p', '$pisstat', '$flt1stat', '$sy')")or die(mysqli_error($conn));

                }


if (!isset($_SESSION['userID'])) {
  header('Location:login.php');
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
                  <form method="POST" action="addstudent-confirm3.php">
                    <div class="form-group">

                    <center><h5>Part II - Assessment Results</h5></center><br>
                    
                    
<center>
<div class="row">
                      <div class="col-md-6">
                        <div class="alert alert-warning">
                          
                          <h2 class=""><?php echo $pis."/".$pisnoi;?></h2>
                          <p>for PIS Examination</p>   
                     
                                               
                        </div>
                        </div>

                        <div class="col-md-6">
                        <div class="alert alert-warning">
                          
                          <h2 class=""><?php echo $flt1."/".$flt1noi;?></h2>
                          <p>for PIS Examination</p>   
                     
                                               
                        </div>
                        </div>

                      </div></center>
                      <br>
                      <div class="form-group" hidden>
                      <input class="form-control" id="sid" name="sid" type="text" value="<?php echo $sid;?>" hidden>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Program Name:</label>
                       <select class="form-control" id="pid" name="pid" required="true" style="color: black;">
                          <option value="">Select Program Name</option>
                          <?php
                          $sql = "SELECT * FROM programs where status='1' ORDER BY pname ASC";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_array($result)) {
                            $pid = $row["program_id"];
                            $pname = $row["pname"];
                        ?>

                        <option value="<?php echo $pid;?>"><?php echo $pname;?></option>

                      <?php
                      }
                      ?>
                  </select>
                    </div>

                    <center><input value="next" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
                  </form>
             
                </div>
              </div>            </div>

          </body>

  </div>
</div>
     
            <?php include('hfooter.php'); ?>
