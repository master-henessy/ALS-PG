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
          <a href="schedules.php">Schedules</a>
        </li>
        <li class="breadcrumb-item">
          <a href="events.php">Events</a>
        </li>
        <li class="breadcrumb-item active">Edit Event Details</li>
      </ol> 
      
        <?php
include('dbconnections.php');
    $event=$_GET['event'];
    $query=mysqli_query($conn,"select * from events where status=1 AND event_id='$event'")or die(mysqli_error($conn));
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
                <div class="card-header">Edit Event Details</div>
                <div class="card-body">
                  <form method="POST" action="eventedit-confirm.php">
                    <div class="form-group">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Event Name:</label>
                      <input class="form-control" id="name" name="name" type="text" value="<?php echo $name;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Event Date:</label>
                      <input class="form-control" id="date" name="date" type="date" value="<?php echo $date;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Start Time:</label>
                      <input class="form-control" id="stime" name="stime" type="time" value="<?php echo $ustime;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">End Time:</label>
                      <input class="form-control" id="etime" name="etime" type="time" value="<?php echo $uetime;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Event Place:</label>
                       <select class="form-control" id="room" name="room" required="true" style="color: black;">

                          <option value="">Select Event Place</option>
                          <?php
                          $sql = "SELECT * FROM rooms where status='1' ORDER BY rname ASC";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_array($result)) {
                            $rname = $row["rname"];
                        ?>

                        <option><?php echo $rname;?></option>

                      <?php
                      }
                      ?>
                  </select>
                    </div>


                       <textarea class="form-control" style="height:250px;overflow:auto;resize:none" id="content" name="content" type="text" required><?php echo $info;?></textarea>

                       <center><input value="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
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
