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
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>	

      <?php
    $query=mysqli_query($conn,"select COUNT(*) as count from user")or die(mysqli_error($conn));
      $row=mysqli_fetch_array($query);
        $count1=$row['count'];

            $query2=mysqli_query($conn,"select COUNT(*) as count from instructors")or die(mysqli_error($conn));
      $row2=mysqli_fetch_array($query2);
        $count2=$row2['count'];

            $query3=mysqli_query($conn,"select COUNT(*) as count from students")or die(mysqli_error($conn));
      $row3=mysqli_fetch_array($query3);
        $count3=$row3['count'];

        $query4=mysqli_query($conn,"select COUNT(*) as count from help WHERE status='1'")or die(mysqli_error($conn));
      $row4=mysqli_fetch_array($query4);
        $count4=$row4['count'];
?> 

<center>
<div class="row">
                      <div class="col-md-3">
                        <div class="alert alert-warning">
                          
                          <h2 class=""><?php echo $count1;?></h2>
                          <p>Total User Accounts</p>   
                          
                            <a href="adduser.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add User Account</span>
                      <span class="nav-link-text"></span>
                    </a><h2></h2>

                          <a href="users.php" class="btn btn-success" >
                        <i class="fa fa-eye bblue"></i>
                        <span class="nav-link-text">View All</span>
                         </a>
                                               
                        </div>
                        </div>

                        <div class="col-md-3">
                         <div class="alert alert-warning">
                          
                          <h2 class=""><?php echo $count3;?></h2>
                          <p>Total Student Profiles</p>     
                          
                            <a href="addstudent.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add Student</span>
                      <span class="nav-link-text"></span>
                    </a><h2></h2>

                          <a href="students.php" class="btn btn-success" >
                      <i class="fa fa-eye bblue"></i>
                      <span class="nav-link-text">View All</span>
                      <span class="nav-link-text"></span>
                    </a>
                                             
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="alert alert-warning">
                          
                          <h2 class=""><?php echo $count2;?></h2>
                          <p>Total Facilitator Profiles</p>   
                          
                          <a href="addinstructors.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add Instructor</span>
                      <span class="nav-link-text"></span>
                    </a> <h2></h2>
                          
                          <a href="instructors.php" class="btn btn-success" >
                      <i class="fa fa-eye bblue"></i>
                      <span class="nav-link-text">View All</span>
                      <span class="nav-link-text"></span>
                    </a>
                                        
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="alert alert-warning">
                          
                          <h2 class=""><?php echo $count4;?></h2>
                          <p>Total Help Guides</p>    
                          
                          <a href="addhelp.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add Help Guide</span>
                      <span class="nav-link-text"></span>
                    </a>      <h2></h2>
                          
                          <a href="help.php" class="btn btn-success" >
                      <i class="fa fa-eye bblue"></i>
                      <span class="nav-link-text">View All</span>
                      <span class="nav-link-text"></span>
                    </a>
                                  
                        </div>

</div>
</center>






    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Logout Account</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Are you sure you want to logout?</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">No, Stay logged in</button>
            <a class="btn btn-primary" href="logout.php">Yes, Log me out</a>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
     <?php include('hfooter.php'); ?>