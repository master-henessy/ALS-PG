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
         <li class="breadcrumb-item">
          <a href="students.php">Students</a>
        </li>
        <li class="breadcrumb-item active">View Student Record</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">View Student Record</div>
                <div class="card-body">
                  <form method="POST" action="#">
                    <div class="form-group">
<?php
include('dbconnections.php');
		$id=$_GET['id'];

        $query2=mysqli_query($conn,"select * from students where Student_id='$id'")or die(mysqli_error($conn));
      while ($row2=mysqli_fetch_array($query2)){
        $id=$row2['Student_id'];
        $fullname=$row2['fullname'];
        $program=$row2['program'];
        $lrn=$row2['lrn'];
        $sy=$row2['sy'];
        
        
?>                      

                    <a href="addattendance.php?id=<?php echo $id;?>" class="btn btn-danger" >
                      <i class="fa fa-plus"></i>
                      <span class="nav-link-text">Add Attendance Record</span>
                      <span class="nav-link-text"></span>
                    </a>

                    <h1></h1>


                    <center><h5>Student Attendance Record</h5></center><br>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Student LRN:</label>
                      <input class="form-control" id="lrn" name="lrn" type="text" value="<?php echo $lrn;?>" Readonly>
                    </div>
                      <div class="form-group">
                      <label for="exampleInputEmail1">Student Name:</label>
                      <input class="form-control" id="fullname" name="fullname" type="text" value="<?php echo $fullname;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Program:</label>
                      <input class="form-control" id="program" name="program" type="text" value="<?php echo $program;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">School Year:</label>
                      <input class="form-control" id="sy" name="sy" type="text" value="<?php echo $sy;?>" Readonly>
                    </div>
<br>

                <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th hidden>Attendance ID</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Date Added</th>
                        <th>Added By</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
    $query=mysqli_query($conn,"select * from attendance where student_id='$id' ORDER BY date ASC")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $aid=$row['att_id'];
        $id=$row['student_id'];
        $date=$row['date'];
        $status=$row['status'];
        $dateadded=$row['dateadded'];
        $addedby = $row["addedby"];


?>


                      <tr>
                        <td hidden><?php echo $aid;?></td>
                        <td><?php echo $date;?></td>
                        <td><?php echo $status;?></td>
                        <td><?php echo $dateadded;?></td>
                        <td><?php echo $addedby;?></td>
                        <td>
                              <a href="editattendance.php?aid=<?php echo $aid;?>&id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-edit"></i>
                              </a>
                              <a href="deleteattendance.php?aid=<?php echo $aid;?>&id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i>
                              </a>
                              
                              
                        </td>
                      </tr>

                    </tbody>
<?php
}
}

?>
                  </table>
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
