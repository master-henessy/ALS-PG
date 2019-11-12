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
          <a href="programs.php">Programs</a>
        </li>
        <li class="breadcrumb-item active">View Program Deatils</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Program Details</div>
                <div class="card-body">
                  <form method="POST" action="#">
                    <div class="form-group">
<?php
include('dbconnections.php');
		$view=$_GET['id'];
    $query=mysqli_query($conn,"select * from programs where program_id='$view'")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $pid=$row['program_id'];
        $pname=$row['pname'];
        $info=$row['info'];
        $dateadded=$row['dateadded'];
        
?>                      
                    <div class="form-group">
                      <label for="exampleInputEmail1">Program Name:</label>
                      <input class="form-control" id="pname" name="pname" type="text" value="<?php echo $pname;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Program Details:</label>
                      <textarea class="form-control" style="height:250px;overflow:auto;resize:none" id="info" name="info" type="text" readonly><?php echo $info;?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date Added:</label>
                      <input class="form-control" id="dateadded" name="dateadded" type="text" value="<?php echo $dateadded;?>" Readonly>
                    </div>


                    <?php }?>
                  </form>
             <h1></h1>
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
     
            <?php include('hfooter.php'); ?>
