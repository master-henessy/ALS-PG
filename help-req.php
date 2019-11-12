<?php include('hconnect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ALS FMS | Admin Dashboard</title>
  <?php include('header.php'); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
   
  <?php include ('navbar.php'); ?> 
  <?php include('js.php');?>  



  <div class="content-wrapper"  id="showpage" style="width: 87%">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="help.php">Help</a>
        </li>
        <li class="breadcrumb-item active">Help Requests</li>

      </ol> 
 
        <a href="addhelp.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add Help Guide</span>
                      <span class="nav-link-text"></span>
                    </a>

<br><h1></h1>
<br><h1></h1>

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
                        <th width="20%">Request ID</th>
                        <th width="40%">Help Request</th>
                        <th width="20%">Request Date</th>
                        <th width="20">Requested By</th>
                        
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
include('dbconnections.php');

    $query=mysqli_query($conn,"select * from help where status=3")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['Help_id'];
        $title=$row['title'];
        $content=$row['content'];
        $date=$row['upload_date'];
        $reqid=$row['uploadby'];
        
?>                      
                      <tr>
                        <td><?php echo"Request_000".$id;?></td>
                        <td><?php echo $title;?></td>
                        <td><?php echo $date;?></td>
                        <td><?php echo $reqid;?></td>

                      </tr>

         
<?php }?>
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