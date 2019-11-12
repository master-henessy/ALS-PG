<?php include('hconnect.php'); ?>


 <?php
                if(isset($_POST['submit'])){
                    $pid = $_POST["pid"];
                    $sy = $_POST["sy"];

}
                    ?>
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
        <li class="breadcrumb-item active">Generate Masterlist</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Generate Class Masterlist</div>
                <div class="card-body">

                <form method="POST" action="../rep-progmasterlist.php" target="_blank">
                    

                    <div class="form-group">
                    <input class="form-control" id="sy" name="sy" type="text" aria-describedby="emailHelp" value="<?php echo $sy;?>" hidden>
          </div>
                    <div class="form-group">
                    <input class="form-control" id="pid" name="pid" type="text" aria-describedby="emailHelp" value="<?php echo $pid;?>" hidden>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Prepared by:</label>
                      <input class="form-control" id="name" name="name" type="text" aria-describedby="emailHelp" placeholder="Enter your Name" required>
                    </div>


                     <center><input value="generate program masterlist" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:350px;" /></center>
                  </form>

                  <br>
                  <center><label for="exampleInputEmail1">-------------------------- or --------------------------</label></center>

                  <form method="POST" action="../rep-masterlist.php" target="_blank">
                    

                    <div class="form-group">
                    <input class="form-control" id="sy" name="sy" type="text" aria-describedby="emailHelp" value="<?php echo $sy;?>" hidden>
					</div>
                    <div class="form-group">
                    <input class="form-control" id="pid" name="pid" type="text" aria-describedby="emailHelp" value="<?php echo $pid;?>" hidden>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Class Section:</label>
                       <select class="form-control" id="sec_id" name="sec_id" required="true" style="color: black;">
                          <option value="">Select Class Section</option>
                          <?php
                          $sql = "SELECT * FROM sections where status='1' AND program_id='$pid' ORDER BY sec_no ASC";
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

                     <div class="form-group">
                      <label for="exampleInputEmail1">Prepared by:</label>
                      <input class="form-control" id="name" name="name" type="text" aria-describedby="emailHelp" placeholder="Enter your Name" required>
                    </div>


                     <center><input value="generate report" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
                  </form>
             
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
        <?php include('hfooter.php'); ?>