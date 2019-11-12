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
        <li class="breadcrumb-item active">Add a Class Schedule</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container  col-sm-6">
              <div class="card mx-auto mt-12">
                <div class="card-header">Add a Class Schedule</div>
                <div class="card-body">
                  <form method="POST" action="addclasssched-confirm1.php">
                    <div class="form-group col-sm-12">

                      <label for="exampleInputEmail1">Program:</label>
                       <select class="form-control" id="program" name="program" required="true" style="color: black;">
                          <option value="">Select Program</option>
                          <?php
                          $sql = "SELECT * FROM programs where status='1' ORDER BY pname ASC";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_array($result)) {
                            $program_id = $row["program_id"];
                            $pname = $row["pname"];
                        ?>

                        <option value="<?php echo $program_id;?>"><?php echo $pname;?></option>

                      <?php
                      }
                      ?>
                  </select>
                    </div>

                    <div class="form-group col-sm-12">

                      <label for="exampleInputEmail1">Session Time:</label>
                       <select class="form-control" id="sessiontime" name="sessiontime" required="true" style="color: black;">
                          <option value="">Select Session Time</option>
                          <option value="morning">Morning Session (7AM - 11AM)</option>
                          <option value="afternoon">Afternoon Session (1PM - 5PM</option>
                       </select>
                    </div>
                    


<!--                     <div class="form-group col-sm-12">
                      <label for="exampleInputEmail1">Event Date:</label><br>
                        <div class="form-group">
                        <input type="checkbox" name="monday" value="Monday" style="width: 7%"><label>Monday</label>
                        <input type="checkbox" name="tuesday" value="Tuesday" style="width: 7%"><label>Tuesday</label>
                        <input type="checkbox" name="wednesday" value="Wednesday" style="width: 7%"><label>Wednesday</label>
                        <input type="checkbox" name="thursday" value="Thursday" style="width: 7%"><label>Thursday</label>
                        <input type="checkbox" name="friday" value="Friday" style="width: 7%"><label>Friday</label><br/></div>
                        
                        </div>
                    </div> -->

                    <center><input value="next" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center><br>
                  </form>
             
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
       <?php include('hfooter.php'); ?>
