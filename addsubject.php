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
          <a href="settings.php">Settings</a>
        </li>
        <li class="breadcrumb-item active">Add a Subject</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Add A Subject</div>
                <div class="card-body">
                  <form method="POST" action="addsubject-confirm.php">
                    
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

                    <div class="form-group">
                      <label for="exampleInputEmail1">Subject Name:</label>
                      <input class="form-control" id="sname" name="sname" type="text" aria-describedby="emailHelp" placeholder="Enter Subject Name" required>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Assignment:</label>
                      <input class="form-control" id="assignment" name="assignment" type="text" aria-describedby="emailHelp" placeholder="Enter Assignment Percentage" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Quiz:</label>
                      <input class="form-control" id="quiz" name="quiz" type="text" aria-describedby="emailHelp" placeholder="Enter Quiz Percentage" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Exam:</label>
                      <input class="form-control" id="exam" name="exam" type="text" aria-describedby="emailHelp" placeholder="Enter Exam Percentage" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Behavior:</label>
                      <input class="form-control" id="behavior" name="behavior" type="text" aria-describedby="emailHelp" placeholder="Enter Behavior Percentage" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Recitation:</label>
                      <input class="form-control" id="recitation" name="recitation" type="text" aria-describedby="emailHelp" placeholder="Enter Recitation Percentage" required>
                    </div>
                
                    <div class="form-group">
                      <label for="exampleInputEmail1">Project:</label>
                      <input class="form-control" id="project" name="project" type="text" aria-describedby="emailHelp" placeholder="Enter Project Percentage" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Attendance:</label>
                      <input class="form-control" id="attendance" name="attendance" type="text" aria-describedby="emailHelp" placeholder="Enter Attendance Percentage" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Class Performance:</label>
                      <input class="form-control" id="performance" name="performance" type="text" aria-describedby="emailHelp" placeholder="Enter Class Performance Percentage" required>
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