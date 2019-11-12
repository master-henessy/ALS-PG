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
        <li class="breadcrumb-item active">Center Details</li>
      </ol> 

      <?php
include('dbconnections.php');
    $query=mysqli_query($conn,"select * from center where status=1")or die(mysqli_error($conn));
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
      
                   <a href="center-edit.php?center=<?php echo $id;?>" class="btn btn-danger" >
                      <i class="fa fa-pencil"></i>
                      <span class="nav-link-text">Edit</span>
                      <span class="nav-link-text"></span>
                    </a>

                    <h1></h1>

            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Center Details</div>
                <div class="card-body">
                  <form method="POST" action="#">
                    <div class="form-group">
                  
        

                      <label for="exampleInputEmail1">Center Name:</label>
                      <input class="form-control" id="name" name="name" type="text" value="<?php echo $name;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Address:</label>
                      <input class="form-control" id="address" name="address" type="text" value="<?php echo $address;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">E-mail:</label>
                      <input class="form-control" id="email" name="email" type="email" value="<?php echo $email;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contact Number:</label>
                      <input class="form-control" id="contactno" name="contactno" type="text" value="<?php echo $contactno;?>" Readonly>
                    </div>
                     
                    <div class="form-group">
                        <label for="exampleInputPassword1">Center Policy:</label>
                       <textarea class="form-control" style="height:250px;overflow:auto;resize:none" id="policy" name="policy" type="text" readonly><?php echo $policy;?></textarea>
                    </div>
                    

                    <?php }?>
                  </form>
             
                </div>
              </div>
            </div>

          </body>












      

  </div>
</div>
      <?php include('hfooter.php'); ?>