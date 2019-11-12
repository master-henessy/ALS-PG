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
          <a href="schedules.php">Schedules</a>
        </li>
        <li class="breadcrumb-item active">Events</li>

      </ol> 
 
        <a href="schedules.php" class="btn btn-success" >
                      <i class="fa fa-eye"></i>
                      <span class="nav-link-text">Class Schedules</span>
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
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th>Event ID</th>
                        <th>Event Name</th>
                        <th>Event Date</th>
                        <th>Event Start Time</th>
                        <th>Event End Time</th>
                        <th>Event Place</th>
                        
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
include('dbconnections.php');

    $query=mysqli_query($conn,"select * from events where status=1")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['event_id'];
        $name=$row['name'];
        $date=$row['date'];
        $ustime=strtotime($row['stime']);
        $uetime=strtotime($row['etime']);
        $stime = date('h:i:A', $ustime);
        $etime = date('h:i:A', $uetime);
        $info=$row['info'];
        $room=$row['room_id'];
        
?>                      
                      <tr>
                        <td><?php echo"Event_000".$id;?></td>
                        <td><?php echo $name;?></td>
                        <td><?php echo $date;?></td>
                        <td><?php echo $stime;?></td>
                        <td><?php echo $etime;?></td>
                        <td><?php echo $room;?></td>
                        <td>
                              
                              <a href="event-view.php?view=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-eye"></i>
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