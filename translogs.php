<?php include('hconnect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ALS FMS | Admin Dashboard</title>
  <?php include('header.php'); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
   
  <?php include ('navbar.php'); ?> 


  <div class="content-wrapper"  id="showpage" style="width: 84%">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Transaction Logs</li>
      </ol> 
      

            <div class="matter">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="widget">
                <div class="widget-head">
              
                  <div class="clearfix"></div>
                </div>
                <div class="widget-content">
                  <div class="padd">
                    
              <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-inverse">
                      <tr>
                        <th width="10%">Log ID</th>
                        <th width="60%">Transaction</th>
                        <th width="12%">Username</th>
                        <th width="18%">Time Stamp</th>
                        
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
include('dbconnections.php');


$id=$_GET['id'];

         $query5=mysqli_query($conn,"select * from user where User_id='$id'")or die(mysqli_error($con));
      while ($row5=mysqli_fetch_array($query5)){
        $user=$row5['Username'];

        $query5=mysqli_query($conn,"select * from logs where log_by='$user'")or die(mysqli_error($con));
      while ($row5=mysqli_fetch_array($query5)){
        $log_id=$row5['log_id'];
        $log_desc=$row5['log_desc'];
        $log_by=$row5['log_by'];
        $timestamp=$row5['timestamp'];

        
?>                      
                      <tr>
                        <td><?php echo"Log_".$log_id;?></td>
                        <td><?php echo $log_desc;?></td>
                        <td><?php echo $log_by;?></td>
                        <td><?php echo $timestamp;?></td>
                        
                      </tr>

         
<?php }}?>
                    </tbody>

                  </table>
                  <div class="clearfix"></div>
                </div>
                </div>
              </div>

          
                  </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
                </div>
              </div>  
              
            </div>
          </div>
        </div>
      </div>

  </div>
</div>
      <?php include('hfooter.php'); ?>