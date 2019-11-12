<?php include('hconnect.php'); ?>

          <?php
                if(isset($_POST['submit'])){
                    $program = $_POST["program"];
                    $sessiontime = $_POST["sessiontime"];
                    
                        }
                    
                    
                    ?>


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
                  <form method="POST" action="addclasssched-confirm2.php">
                    


                      <input class="form-control" id="program_id" name="program_id" type="text" aria-describedby="emailHelp" value="<?php echo $program;?>" hidden>
                      <input class="form-control" id="sessiontime" name="sessiontime" type="text" aria-describedby="emailHelp" value="<?php echo $sessiontime;?>" hidden>
                     
                      <div class="form-group col-sm-12">
                      <label for="exampleInputEmail1">Section:</label>
                       <select class="form-control" id="sec_id" name="sec_id" required="true" style="color: black;">
                          <option value="">Select Class Section</option>
                          <?php
                          $sql3 = "SELECT * FROM sections where program_id='$program' AND status='1' ORDER BY sec_no ASC";
                          $result3 = mysqli_query($conn, $sql3);
                          while ($row3 = mysqli_fetch_array($result3)) {
                            $sec_id = $row3["sec_id"];
                            $sec_no = $row3["sec_no"];
                        ?>

                        <option value="<?php echo $sec_id;?>"><?php echo "Section # ".$sec_no;?></option>

                      <?php
                      }
                      ?>
                  </select>
                    </div>

                    <div class="form-group col-sm-12">
                      <label for="exampleInputEmail1">Room:</label>
                       <select class="form-control" id="room_id" name="room_id" required="true" style="color: black;">
                          <option value="">Select Room</option>
                          <?php
                          $sql3 = "SELECT * FROM rooms where status='1' ORDER BY rname ASC";
                          $result3 = mysqli_query($conn, $sql3);
                          while ($row3 = mysqli_fetch_array($result3)) {
                            $room_id = $row3["room_id"];
                            $room_no = $row3["room_no"];
                            $rname = $row3["rname"];
                            $capacity = $row3["capacity"];
                        ?>

                        <option value="<?php echo $room_id;?>">Room: <?php echo $room_no." - ".$rname." with ".$capacity." capacity";?></option>

                      <?php
                      }
                      ?>
                  </select>
                    </div>

                    
                        
                        

                    <center><input value="next" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center><br>
                  </form>
             
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
       <?php include('hfooter.php'); ?>

