<?php include('hconnect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ALS FMS | Admin Dashboard</title>
  <?php include('header.php'); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
   
  <?php include ('navbar.php'); ?> 
  <?php include('js.php');?>  

  <div class="content-wrapper"  id="showpage" style="width: 84%">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
         <li class="breadcrumb-item">
          <a href="settings.php">Settings</a>
        </li>
        <li class="breadcrumb-item active">Manage Sections</li>

      </ol> 
 
        <a href="addsection.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add Section</span>
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
                        <th hidden>Section ID</th>
                        <th width="10%">Program</th>
                        <th width="10%">Section</th>
                        <th width="10%">Capacity</th>
                        <th width="10%">Status</th>
                        <th width="10%">Subjects</th>
                        <th width="24%">Adviser</th>
                        <th width="26 %">Actions</th>

                      </tr>
                    </thead>
                    <tbody>
<?php
include('dbconnections.php');

    $query=mysqli_query($conn,"select * from sections where sy='$sy'")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $sid=$row['sec_id'];
        $pid=$row['program_id'];
        $sec_no=$row['sec_no'];
        $capacity=$row['availablecapacity'];
        $status=$row['status'];
        $dateadded=$row['dateadded'];
        $refno=$row['refno'];
        
    $query2=mysqli_query($conn,"select * from programs where program_id='$pid'")or die(mysqli_error($con));
      while ($row2=mysqli_fetch_array($query2)){
        $progid=$row2['program_id'];
        $pname=$row2['pname'];

     $query3=mysqli_query($conn,"select COUNT(subj_id) as count from curriculum where program_id='$pid' AND sec_id='$sid' AND sy='$sy'")or die(mysqli_error($con));
      while ($row3=mysqli_fetch_array($query3)){
        $subjs = $row3['count'];

         $query4=mysqli_query($conn,"select * from instructors where referral='$refno'")or die(mysqli_error($con));
      while ($row4=mysqli_fetch_array($query4)){
        $fname = $row4['fname'];
        $mdname = $row4['mdname'];
        $lname = $row4['lname'];
        $instructor = $fname." ".$mdname." ".$lname;


        if($status=="1"){$Stat="Active"; $Statbutt="Deactivate"; $color="danger";} 
        else{$Stat="Inactive"; $Statbutt="Activate"; $color="success";}
?>                      
                      <tr>
                        <td hidden><?php echo "Section_000".$sid;?></td>
                        <td><?php echo $pname;?></td>
                        <td><?php echo $sec_no;?></td>
                        <td><?php echo $capacity;?></td>
                        <td><?php echo $Stat;?></td>
                        <td><?php echo $subjs;?></td>
                        <td><?php echo $instructor;?></td>
                        
                        <td>

                              <a href="addsubjtosec.php?id=<?php echo $sid;?>" class="btn btn-success">
                                <i class="fa fa-plus"> </i> Add Subject
                              </a>
                              <a href="section-deactivate.php?id=<?php echo $sid;?>&stat=<?php echo $status;?>" class="btn btn-<?php echo $color;?>">
                                <i class="fa fa-power-off"> </i> <?php echo $Statbutt;?>
                              </a>
                              
                        </td>
                      </tr>

         
<?php }}}}?>
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