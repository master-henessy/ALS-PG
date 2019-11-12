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
          <a href="events.php">Event</a>
        </li>
        <li class="breadcrumb-item active">View Event Details</li>
      </ol> 

      
      
      <?php
include('dbconnections.php');
    $view=$_GET['view'];
    $query=mysqli_query($conn,"select * from events where status=1 AND event_id='$view'")or die(mysqli_error($conn));
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

                    
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Event Name: <?php echo $name;?></div>
                <div class="card-body">
                  <form method="POST" action="addhelp-confirm.php">
                    <div class="form-group">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Event Date:</label>
                      <input class="form-control" id="date" name="date" type="text" value="<?php echo $date;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Start Time:</label>
                      <input class="form-control" id="stime" name="stime" type="text" value="<?php echo $stime;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">End Time:</label>
                      <input class="form-control" id="etime" name="etime" type="text" value="<?php echo $etime;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Event Place:</label>
                      <input class="form-control" id="room" name="room" type="text" value="<?php echo $room;?>" Readonly>
                    </div>


                       <textarea class="form-control" style="height:250px;overflow:auto;resize:none" id="content" name="content" type="text" readonly><?php echo $info;?></textarea>
                    </div>
                  
                  </form>
             
                </div>
                
              </div>
            </div>

<?php }?>

          </body>

  </div>
</div>
       <?php include('hfooter.php'); ?>
