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
<br>
<center>
<form style="width: 50%" method="GET" action="grades.php?id=<?php echo $search;?>">
  <div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="Search student here...">
    <div class="input-group-btn">
      <button class="btn btn-default" name="submit" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
</form> </center> <br>


                  
                  

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
                    
              <?php
                
                if(isset($_GET['submit'])){
                    $search = $_GET["search"];

                    echo '

            <!-- Table Page -->
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Date Enrolled</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>';

                  }
                  else if(!isset($_GET['submit'])){
                    $search = "xxxxx";
                  }
                    ?>
<?php
include('dbconnections.php');

    $query=mysqli_query($conn,"select * from students WHERE sy='$sy' AND fullname LIKE '%$search%'")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['Student_id'];
        $fname=$row['fname'];
        $lname=$row['lname'];
        $dateadded=$row['dateadded'];
        
?>          
                      <tr>
                        <td><?php echo "Stud_000".$id;?></td>
                        <td><?php echo $fname;?></td>
                        <td><?php echo $lname;?></td>
                        <td><?php echo $dateadded;?></td>
                        <td>
                              <a href="viewgrades0.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-eye"></i>
                              </a>
                              <a href="addattendance.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-calendar-plus-o"></i>
                              </a>
                              <a href="majorexams.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-area-chart"></i>
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

