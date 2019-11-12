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
        <li class="breadcrumb-item active">Manage Users</li>
      </ol> 
      
        <a href="adduser.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add User Account</span>
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
                        <th hidden>User ID</th>
                        <th width="15%">Username</th>
                        <th width="15%">User Type</th>
                        <th width="10%">Status</th>
                        <th width="20%">Last Login</th>
                        <th width="40%">Actions</th>
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
include('dbconnections.php');

    $query=mysqli_query($conn,"select * from user")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['User_id'];
        $Username=$row['Username'];
        $User_type=$row['User_type'];
        $Status=$row['account_status'];
        $lastlog=$row['lastlog'];
        
        if($Status=="0"){$Stat="Active"; $Statbutt="Deactivate"; $color="danger";} 
        else{$Stat="Inactive"; $Statbutt="Activate"; $color="success";}
      
        
?>                      
                      <tr>
                        <td hidden><?php echo "User_000".$id;?></td>
                        <td><?php echo $Username;?></td>
                        <td><?php echo $User_type;?></td>
                        <td><?php echo $Stat;?></td>
                        <td><?php echo $lastlog;?></td>
                        <td>
                              <a href="user-deactivate.php?id=<?php echo $id;?>&stat=<?php echo $Status;?>" class="btn btn-<?php echo $color;?>">
                                <i class="fa fa-power-off"></i> <?php echo $Statbutt;?>
                              </a>
                              <a href="translogs.php?id=<?php echo $id;?>" class="btn btn-warning">
                                <i class="fa fa-eye"></i> Transaction Logs
                              </a>
                              <a href="users-delete.php?id=<?php echo $id;?>" class="btn btn-danger">
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
      <?php include('hfooter.php'); ?>