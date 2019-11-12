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
          <a href="reports.php">Reports</a>
        </li>
        <li class="breadcrumb-item active">Generate Passer List</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Generate List of Passers</div>
                <div class="card-body">
                  <form method="POST" action="pdf-passerlist.php">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">School Year:</label>
                       <select class="form-control" id="repsy" name="repsy" required="true" style="color: black;">
                          <option value="">Select School Year</option>
                          <?php
                          $sql = "SELECT * FROM schoolyears where status='1' ORDER BY sy1 ASC";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_array($result)) {
                            $sy_id = $row["sy_id"];
                            $sy1 = $row["sy1"];
                            $sy2 = $row["sy2"];
                            $repsy = $sy1." - ".$sy2;
                        ?>

                        <option value="<?php echo $repsy;?>"><?php echo $repsy;?></option>

                      <?php
                      }
                      ?>
                  </select>
                    </div>


                    <div class="form-group">
                      <label for="exampleInputEmail1">Program Name:</label>
                       <select class="form-control" id="pid" name="pid" required="true" style="color: black;">
                          <option value="">Select Program Name</option>
                          <?php
                          $sql2 = "SELECT * FROM programs where status='1' ORDER BY pname ASC";
                          $result2 = mysqli_query($conn, $sql2);
                          while ($row2 = mysqli_fetch_array($result2)) {
                            $pid = $row2["program_id"];
                            $pname = $row2["pname"];
                        ?>

                        <option value="<?php echo $pid;?>"><?php echo $pname;?></option>

                      <?php
                      }
                      ?>
                  </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Prepared by:</label>
                      <input class="form-control" id="name" name="name" type="text" aria-describedby="emailHelp" placeholder="Enter your Name" required>
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