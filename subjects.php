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
        <li class="breadcrumb-item active">Manage Subjects</li>

      </ol> 
 
        <a href="addsubject.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add a Subject</span>
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
                        <th width="15%">Subject ID</th>
                        <th width="10%">Program</th>
                        <th width="43%">Subject Name</th>
                        <th width="10%">Status</th>
                        <th width="22%">Actions</th>
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
include('dbconnections.php');

    $query=mysqli_query($conn,"select * from subjects")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $pid=$row['program_id'];
        $id=$row['subj_id'];
        $sname=$row['subj_name'];
        $status=$row['status'];
        $dateadded=$row['dateadded'];
        
    $query2=mysqli_query($conn,"select * from programs where program_id='$pid'")or die(mysqli_error($con));
      while ($row2=mysqli_fetch_array($query2)){
        $progid=$row2['program_id'];
        $pname=$row2['pname'];



        if($status=="1"){$Stat="Active"; $Statbutt="Deactivate"; $color="danger";} 
        else{$Stat="Inactive"; $Statbutt="Activate"; $color="success";}
?>                      
                      <tr>
                        <td><?php echo "Subject_000".$id;?></td>
                        <td><?php echo $pname;?></td>
                        <td><?php echo $sname;?></td>
                        <td><?php echo $Stat;?></td>
                        <td>
                              <a href="subjects-deactivate.php?id=<?php echo $id;?>&stat=<?php echo $status;?>" class="btn btn-<?php echo $color;?>">
                                <i class="fa fa-power-off"></i> <?php echo $Statbutt;?>
                              </a>
                              <a href="subjects-delete.php?id=<?php echo $id;?>" class="btn btn-danger">
                                <i class="fa fa-trash"></i> Delete
                              </a>
                        </td>
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