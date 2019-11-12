<?php include('hconnect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ALS FMS | Admin Dashboard</title>
  <?php include('header.php'); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
   
  <?php include ('navbar.php'); 

  include('dbconnections.php');
    $id=$_GET['id'];
    $query=mysqli_query($conn,"select * from students where Student_id='$id'")or die(mysqli_error($conn));
        $row=mysqli_fetch_array($query);
        $sid=$row['Student_id'];
        $fullname=$row['fullname'];

    $cid=$_GET['cid'];
    $query2=mysqli_query($conn,"select * from criterias where criteria_id='$cid'")or die(mysqli_error($conn));
        $row2=mysqli_fetch_array($query2);
        $criteria_id=$row2['criteria_id'];
        $criteria_name=$row2['criteria_name'];

    $sub=$_GET['sub'];

        ?> 


  <div class="content-wrapper"  id="showpage" style="width: 87%">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="settings.php">Settings</a>
        </li>
        <li class="breadcrumb-item active">Add a Room</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Add A Room</div>
                <div class="card-body">
                  <form method="POST" action="addgrade-confirm.php">




                    <div class="form-group" hidden>
                      <input class="form-control" id="criteria_id" name="criteria_id" type="text" aria-describedby="emailHelp" value="<?php echo $criteria_id;?>" required>
                    </div>

                    <div class="form-group" hidden>
                      <input class="form-control" id="sub" name="sub" type="text" aria-describedby="emailHelp" value="<?php echo $sub;?>" required>
                    </div>

                    <div class="form-group" hidden>
                      <input class="form-control" id="student_id" name="student_id" type="text" aria-describedby="emailHelp" value="<?php echo $sid;?>" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Student Name:</label>
                      <input class="form-control" id="sname" name="sname" type="text" aria-describedby="emailHelp" value="<?php echo $fullname;?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Grading Criteria:</label>
                      <input class="form-control" id="cname" name="cname" type="text" aria-describedby="emailHelp" value="<?php echo $criteria_name;?>" readonly>
                    </div>

                    
                    <?php
                    
                    
                    if($criteria_name == 'Quiz' || $criteria_name == 'Assignment' || $criteria_name == 'Exam'){ echo '
                    <div class="form-group">
                      <label for="exampleInputEmail1">Score:</label>
                      <input class="form-control" id="grade" name="grade" type="text" aria-describedby="emailHelp" placeholder="Enter Student Score" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Number of Items:</label>
                      <input class="form-control" id="items" name="items" type="text" aria-describedby="emailHelp" placeholder="Enter Number of Items" required>
                    </div>
                    '; }

                    if($criteria_name == 'Project' || $criteria_name == 'Recitation' || $criteria_name == 'Performance' || $criteria_name == 'Behavior'){ echo '

                    <div class="form-group">
                      <label for="exampleInputEmail1">Percentage:</label>
                      <input class="form-control" id="percentage" name="percentage" type="text" aria-describedby="emailHelp" placeholder="Enter Grade Percentage" required>
                    </div>'; }



                    ?>


                    
                    
                     <center><input value="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
                  </form>
             
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
        <?php include('hfooter.php'); ?>