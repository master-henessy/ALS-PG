<?php
  include('dbconnections.php');
  session_start();
  $sy = $_SESSION['sy'];

                if(isset($_GET["id"])){

                    $id = $_GET["id"];
                    $query1=mysqli_query($conn,"SELECT * FROM students WHERE Student_id='$id'")or die(mysqli_error($conn));
                    $row1=mysqli_fetch_array($query1);
                    $lrn=$row1['lrn'];
                    
                    $query2=mysqli_query($conn,"SELECT * FROM students WHERE lrn='$lrn' ORDER BY Student_id DESC LIMIT 1")or die(mysqli_error($conn));
                        while ($row2=mysqli_fetch_array($query2)){
                    $Student_id=$row2['Student_id'];
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
        <li class="breadcrumb-item active">Add Return Student Record</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Add Return Student Record</div>
                <div class="card-body">
                  <form method="POST" action="completereturn2.php">
                    <div class="form-group">

                    <center><h5>Return Student Assessment Process</h5></center><br>
                    
                    <div class="form-group" hidden>
                      <input class="form-control" id="sid" name="sid" type="text" value="<?php echo $Student_id;?>" hidden>
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

