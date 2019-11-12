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
        <li class="breadcrumb-item active">Add Section</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Add Section</div>
                <div class="card-body">
                  <form method="POST" action="addsection-confirm.php">
                    
                    <div class="form-group" hidden>
                      <input class="form-control" id="sy" name="sy" type="text" value="<?php echo $sy;?>" hidden>
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

                    <div class="form-group">
                      <label for="exampleInputEmail1">Section Number:</label>
                      <input class="form-control" id="snum" name="snum" type="text" aria-describedby="emailHelp" placeholder="Enter Section Number" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Section Capacity:</label>
                      <input class="form-control" id="scap" name="scap" type="text" aria-describedby="emailHelp" placeholder="Enter Section Capacity" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Adviser:</label>
                       <select class="form-control" id="refno" name="refno" required="true" style="color: black;">
                          <option value="">Select Instructor Name</option>
                          <?php
                          $sql2 = "SELECT * FROM instructors where status='1' ORDER BY fname ASC";
                          $result2 = mysqli_query($conn, $sql2);
                          while ($row2 = mysqli_fetch_array($result2)) {
                            $fname = $row2["fname"];
                            $mdname = $row2["mdname"];
                            $lname = $row2["lname"];
                            $referral = $row2["referral"];
                            $adviser = $fname." ".$mdname." ".$lname;
                        ?>

                        <option value="<?php echo $referral;?>"><?php echo $adviser;?></option>

                      <?php
                      }
                      ?>
                  </select>
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