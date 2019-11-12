<?php include('hconnect.php');
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ALS FMS | Admin Dashboard</title>
  <?php include('header.php'); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
   
  <?php include ('navbar.php'); 

include('dbconnections.php');
    $id=$_GET['id'];
    $query=mysqli_query($conn,"select * from students where Student_id='$id'")or die(mysqli_error($conn));
        $row=mysqli_fetch_array($query);
        $id=$row['Student_id'];
        $fullname=$row['fullname'];
        $sec_id=$row['sec_id'];
        
?>     


  <div class="content-wrapper"  id="showpage" style="width: 84%">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
         <li class="breadcrumb-item">
          <a href="students.php">Students</a>
        </li>
        <li class="breadcrumb-item active">View Student Records</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header"><h4>View Student Records of <?php echo $fullname;?> <a href="student-view.php?id=<?php echo $id;?>" class="btn btn-success" >Go to Profile</a> </h4>
                    </div>
                <div class="card-body">
                  <form method="POST" action="viewgrades.php">
                    <div class="form-group">

                    <div class="form-group" hidden>
                      <input class="form-control" id="student_id" name="student_id" type="text" aria-describedby="emailHelp" value="<?php echo $id;?>" required>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Subject Name:</label>
                       <select class="form-control" id="subjid" name="subjid" required="true" style="color: black;">
                          <option value="">Select Subject Name</option>
                          <?php
                          $sql9 = "SELECT * FROM curriculum LEFT JOIN subjects on curriculum.subj_id = subjects.subj_id where sec_id='$sec_id'";
                          $result9 = mysqli_query($conn, $sql9);
                          while ($row9 = mysqli_fetch_array($result9)) {
                            $subj_id9 = $row9["subj_id"];
                            $subj_name9 = $row9["subj_name"];
                        ?>

                        <option value="<?php echo $subj_id9;?>"><?php echo $subj_name9;?></option>

                      <?php
                      }
                      ?>
                  </select>
                    </div>
                    <center><input value="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>


                  <div class="clearfix"></div>
                </div>
                </div>




                   


                  </form>

             
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
     
            <?php include('hfooter.php'); ?>
