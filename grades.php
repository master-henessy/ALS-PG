<?php include('hconnect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ALS FMS | Admin Dashboard</title>
  <?php include('header.php'); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
   
  <?php include ('navbar.php'); ?> 
  <?php include('js.php');?>  

  <div class="content-wrapper"  id="showpage" style="width: 84%">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Manage Grades</li>

      </ol> 

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
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-inverse">
                      <tr>
                        <th hidden>Student ID</th>
                        <th width="15%">Student LRN</th>
                        <th width="30%">Student Name</th>
                        <th width="10%">Section</th>
                        <th width="45%">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
<?php
include('dbconnections.php');

    $query=mysqli_query($conn,"select * from students WHERE sy='$sy'")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['Student_id'];
        $lrn=$row['lrn'];
        $sec_id=$row['sec_id'];
        $fname=$row['fname'];
        $lname=$row['lname'];
        $dateadded=$row['dateadded'];

        $query2=mysqli_query($conn,"select * from sections WHERE sec_id='$sec_id'")or die(mysqli_error($conn));
        $row2=mysqli_fetch_array($query2);
        $sec_no=$row2['sec_no'];

        
?>          
                      <tr>
                        <td hidden><?php echo "Stud_000".$id;?></td>
                        <td><?php echo $lrn;?></td>
                        <td><?php echo $fname." ".$lname;?></td>
                        <td><?php echo $sec_no;?></td>
                        <td>
                              <a href="viewgrades0.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-eye"></i> View Grades

                              </a>
                              <a href="addattendance.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-calendar-plus-o"></i> Add Attendance
                              </a>
                              <a href="majorexams.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-area-chart"></i> Exam Grades
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

