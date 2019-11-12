<?php
  include('dbconnections.php');
  session_start();
  $sy = $_SESSION['sy'];

                if(isset($_POST['submit'])){
                    $sid = $_POST["sid"];
                    $pid = $_POST["pid"];

                    $query0="SELECT * FROM programs WHERE program_id='$pid'"or die(mysqli_error($conn));
					$result = mysqli_query($conn, $query0);
                          while ($row0 = mysqli_fetch_array($result)) {
                            $pid = $row0["program_id"];
                            $pname = $row0["pname"];
                           
                    $query=mysqli_query($conn,"UPDATE students SET program='$pname' where Student_id ='$sid' ")or die(mysqli_error($conn));
                  }
                

                $query2="SELECT * FROM students WHERE Student_id='$sid'"or die(mysqli_error($conn));
          $result2 = mysqli_query($conn, $query2);
                          while ($row2 = mysqli_fetch_array($result2)) {
                            $lrn = $row2["lrn"];
                           }
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
        <li class="breadcrumb-item active">Add Return Student Record</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Add Return Student Record</div>
                <div class="card-body">
                  <form method="POST" action="completereturn4.php">
                    <div class="form-group">

                    
    <center>

                  <div class="form-group" hidden>
                      <input class="form-control" id="sid" name="sid" type="text" value="<?php echo $sid;?>" hidden>
                    </div>

                    <div class="form-group" style="width: 30%">
                      <label for="exampleInputPassword1">Student LRN:</label>
                      <input class="form-control" id="lrn" name="lrn" type="text" value="<?php echo $lrn;?>" readonly>
                    </div>

                   
					     
</center>

        <center>
                    <div class="form-group" style="width: 30%">
                      <label for="exampleInputEmail1">Section Number:</label>
                       <select class="form-control" id="sec_id" name="sec_id" required="true" style="color: black;">
                          <option value="">Select Section Number</option>
                          <?php
                          $sql = "SELECT * FROM sections where status='1' AND program_id='$pid' AND availablecapacity>=1 ORDER BY sec_no ASC";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_array($result)) {
                            $sec_id = $row["sec_id"];
                            $sec_no = $row["sec_no"];
                        ?>

                        <option value="<?php echo $sec_id;?>"><?php echo $sec_no;?></option>

                      <?php
                      }
                      ?>
                  </select>
                    </div>

                    <div class="form-group" style="width: 30%">
                      <label for="exampleInputEmail1">School Year:</label>
                        <input class="form-control" id="sy" name="sy" type="text" value="<?php echo $sy;?>" readonly>
                    </div>
</center>
                    <center><input value="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
                  </form>
             
                </div>
              </div>            </div>

          </body>
     

  </div>
</div>
     
            <?php include('hfooter.php'); ?>
