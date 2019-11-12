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
          <a href="settings.php">Settings</a>
        </li>
        <li class="breadcrumb-item active">Manage Programs</li>

      </ol> 
 
        <a href="addprogram.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add a Program</span>
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
                        <th width="14%">Program ID</th>
                        <th width="25%">Program Name</th>
                        <th width="21%">Date Added</th>
                        <th width="10%">Status</th>
                        <th width="30%">Actions</th>
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
include('dbconnections.php');

    $query=mysqli_query($conn,"select * from programs")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['program_id'];
        $pname=$row['pname'];
        $status=$row['status'];
        $dateadded=$row['dateadded'];
        if($status=="1"){$Stat="Active"; $Statbutt="Deactivate"; $color="danger";} 
        else{$Stat="Inactive"; $Statbutt="Activate"; $color="success";}
?>                      
                      <tr>
                        <td><?php echo "Program_000".$id;?></td>
                        <td><?php echo $pname;?></td>
                        <td><?php echo $dateadded;?></td>
                        <td><?php echo $Stat;?></td>
                        <td>
                              <a href="program-view.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-eye"></i> View
                              </a>
                              <a href="program-deactivate.php?id=<?php echo $id;?>&stat=<?php echo $status;?>" class="btn btn-<?php echo $color;?>">
                                <i class="fa fa-power-off"></i> <?php echo $Statbutt;?>
                              </a>
                              <a href="programs-delete.php?id=<?php echo $id;?>" class="btn btn-danger">
                                <i class="fa fa-trash"></i> Delete
                              </a>
                        </td>
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