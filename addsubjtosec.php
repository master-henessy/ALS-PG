<?php include('hconnect.php'); 

$id=$_GET['id'];


$query3=mysqli_query($conn,"SELECT * FROM sections WHERE sec_id='$id'")or die(mysqli_error($conn));
                        while ($row5=mysqli_fetch_array($query3)){
                    $id=$row5['sec_id'];
                    $pid=$row5['program_id'];
                    $sy=$row5['sy'];}


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
          <a href="settings.php">Settings</a>
        </li>
        <li class="breadcrumb-item">
          <a href="sections.php">Sections</a>
        </li>
        <li class="breadcrumb-item active">Assign Subject/s</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Add Subjects</div>
                <div class="card-body">
                  <form method="POST" action="addsubjtosec-confirm.php">
                    <div class="form-group" hidden>
                      <input class="form-control" id="sid" name="sid" type="text" value="<?php echo $id;?>" hidden>
                    </div>

                    <div class="form-group" hidden>
                      <input class="form-control" id="sy" name="sy" type="text" value="<?php echo $sy;?>" hidden>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Subject Name:</label>
                       <select class="form-control" id="subjid" name="subjid" required="true" style="color: black;">
                          <option value="">Select Subject Name</option>
                          <?php
                          $sql = "SELECT * FROM subjects where status='1' AND program_id='$pid' ORDER BY subj_name ASC";
                          $result = mysqli_query($conn, $sql);
                          while ($row = mysqli_fetch_array($result)) {
                            $subjid = $row["subj_id"];
                            $subjname = $row["subj_name"];
                        ?>

                        <option value="<?php echo $subjid;?>"><?php echo $subjname;?></option>

                      <?php
                      }
                      ?>
                  </select>
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