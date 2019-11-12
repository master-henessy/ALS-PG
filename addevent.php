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
        <li class="breadcrumb-item active">Add an Event</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Add an Event</div>
                <div class="card-body">
                  <form method="POST" action="addevent-confirm.php">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Event Name:</label>
                      <input class="form-control" id="eventname" name="eventname" type="text" aria-describedby="emailHelp" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Event Date:</label>
                      <input class="form-control" id="eventdate" name="eventdate" type="date" aria-describedby="emailHelp" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Event Start Time:</label>
                      <input class="form-control" id="eventstime" name="eventstime" type="time" aria-describedby="emailHelp" placeholder="" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Event End Time:</label>
                      <input class="form-control" id="eventetime" name="eventetime" type="time" aria-describedby="emailHelp" placeholder="" required>
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

                    <div class="form-group">
                      <label for="exampleInputPassword1">Event Information:</label>
                      <textarea class="form-control" style="height:250px;overflow:auto;resize:none" id="info" name="info" type="text" required></textarea>
                    </div>
                    <center><input value="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
                  </form>
             
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
       <?php include('hfooter.php'); ?>
