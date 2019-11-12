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
          <a href="settings.php">Manage Settings</a>
        </li>
         <li class="breadcrumb-item">
          <a href="center.php">Center Details</a>
        </li>
        <li class="breadcrumb-item active">Edit Center</li>
      </ol> 

      <?php
include('dbconnections.php');
    $view=$_GET['center'];
    $query=mysqli_query($conn,"select * from center where center_id='$view'")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['center_id'];
        $name=$row['center_name'];
        $policy=$row['center_policy'];
        $address=$row['center_address'];
        $email = $row["center_email"];
        $contactno = $row["center_contactno"];
        $status = $row["status"];
        $dateadded=$row['dateadded'];
        
?>    
      
                
                    <h1></h1>

            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Center Details</div>
                <div class="card-body">
                  <form method="POST" action="editcenter-confirm.php?edit=<?php echo $id;?>">
                    <div class="form-group">
                  
        

                      <label for="exampleInputEmail1">Center Name:</label>
                      <input class="form-control" id="name" name="name" type="text" value="<?php echo $name;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address:</label>
                      <input class="form-control" id="address" name="address" type="text" value="<?php echo $address;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">E-mail:</label>
                      <input class="form-control" id="email" name="email" type="email" value="<?php echo $email;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contact Number:</label>
                      <input class="form-control" id="contactno" name="contactno" type="text" value="<?php echo $contactno;?>" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Center Policy:</label>
                       <textarea class="form-control" style="height:250px;overflow:auto;resize:none" id="policy" name="policy" type="text" required><?php echo $policy;?></textarea>
                    </div>
                    <center><input value="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>

                    <?php }?>
                  </form>
             
                </div>
              </div>
            </div>

          </body>












      

  </div>
</div>
      <?php include('hfooter.php'); ?>