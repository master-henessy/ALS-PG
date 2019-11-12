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
        <li class="breadcrumb-item">
          <a href="requirements.php">Requirements</a>
        </li>
        <li class="breadcrumb-item active">Add a Requirement</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Add A Requirement</div>
                <div class="card-body">
                  <form method="POST" action="addrequirement-confirm.php">
                    
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
                      <label for="exampleInputEmail1">Requirement Name:</label>
                      <input class="form-control" id="rname" name="rname" type="text" aria-describedby="emailHelp" placeholder="Enter Subject Name" required>
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