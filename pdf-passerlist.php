<?php include('hconnect.php'); ?>


 <?php
                if(isset($_POST['submit'])){
                    $pid = $_POST["pid"];
                    $repsy = $_POST["repsy"];
                    $name = $_POST["name"];

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
        <li class="breadcrumb-item active">Generate Passer List</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Generate List of Passers</div>
                <div class="card-body">
                  <form method="POST" action="rep-pispassers.php" target="_blank">
                    <input class="form-control" id="repsy" name="repsy" type="text" aria-describedby="emailHelp" value="<?php echo $repsy;?>" hidden>
                    <input class="form-control" id="pid" name="pid" type="text" aria-describedby="emailHelp" value="<?php echo $pid;?>" hidden>
                    <input class="form-control" id="name" name="name" type="text" aria-describedby="emailHelp" value="<?php echo $name;?>" hidden>
                    <input class="form-control" id="et" name="et" type="text" aria-describedby="emailHelp" value="pis" hidden>

                     <center><input value="PIS Passers" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
                  </form>

                  <br>

                  <form method="POST" action="rep-flt1passers.php" target="_blank">
                    <input class="form-control" id="repsy" name="repsy" type="text" aria-describedby="emailHelp" value="<?php echo $repsy;?>" hidden>
                    <input class="form-control" id="pid" name="pid" type="text" aria-describedby="emailHelp" value="<?php echo $pid;?>" hidden>
                    <input class="form-control" id="name" name="name" type="text" aria-describedby="emailHelp" value="<?php echo $name;?>" hidden>
                    <input class="form-control" id="et" name="et" type="text" aria-describedby="emailHelp" value="flt1" hidden>

                     <center><input value="FLT 1 Passers" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
                  </form>

                  <br>

                   <form method="POST" action="rep-flt2passers.php" target="_blank">
                    <input class="form-control" id="repsy" name="repsy" type="text" aria-describedby="emailHelp" value="<?php echo $repsy;?>" hidden>
                    <input class="form-control" id="pid" name="pid" type="text" aria-describedby="emailHelp" value="<?php echo $pid;?>" hidden>
                    <input class="form-control" id="name" name="name" type="text" aria-describedby="emailHelp" value="<?php echo $name;?>" hidden>
                    <input class="form-control" id="et" name="et" type="text" aria-describedby="emailHelp" value="flt2" hidden>

                     <center><input value="FLT 2 Passers" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
                  </form>

                  <br>

                   <form method="POST" action="rep-aepassers.php" target="_blank">
                    <input class="form-control" id="repsy" name="repsy" type="text" aria-describedby="emailHelp" value="<?php echo $repsy;?>" hidden>
                    <input class="form-control" id="pid" name="pid" type="text" aria-describedby="emailHelp" value="<?php echo $pid;?>" hidden>
                    <input class="form-control" id="name" name="name" type="text" aria-describedby="emailHelp" value="<?php echo $name;?>" hidden>
                    <input class="form-control" id="et" name="et" type="text" aria-describedby="emailHelp" value="ae" hidden>

                     <center><input value="A&E Passers" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
                  </form>
             
                  
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
        <?php include('hfooter.php'); ?>