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
        <li class="breadcrumb-item active">Manage Schedules</li>
      </ol> 


                    <a href="events.php" class="btn btn-success" >  
                      <span class="nav-link-text">Event Schedules</span>
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
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th>Schedule ID</th>
                        <th>Program</th>
                        <th>Section</th>
                        <th>Session Time</th>
                        <th>Room</th>
                        
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
include('dbconnections.php');

    $query=mysqli_query($conn,"select * from classsched")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['classsched_id'];
        $program_id=$row['program_id'];
        $sec_id=$row['sec_id'];
        $sessiontime=$row['sessiontime'];
        $room_id=$row['room_id'];

        $query2=mysqli_query($conn,"select * from programs where program_id='$program_id'")or die(mysqli_error($con));
      while ($row2=mysqli_fetch_array($query2)){
        $program_id=$row2['program_id'];
        $pname=$row2['pname'];

        $query3=mysqli_query($conn,"select * from sections where sec_id='$sec_id'")or die(mysqli_error($con));
      while ($row3=mysqli_fetch_array($query3)){
        $sec_id=$row3['sec_id'];
        $sec_no=$row3['sec_no'];

        $query4=mysqli_query($conn,"select * from rooms where room_id='$room_id'")or die(mysqli_error($con));
      while ($row4=mysqli_fetch_array($query4)){
        $room_id=$row4['room_id'];
        $room_no=$row4['room_no'];
        $rname=$row4['rname'];

        
?>                      
                      <tr>
                        <td><?php echo"Schedule_000".$id;?></td>
                        <td><?php echo $pname;?></td>
                        <td><?php echo $sec_no;?></td>
                        <td><?php echo $sessiontime;?></td>
                        <td><?php echo $room_no." - ".$rname;?></td>

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