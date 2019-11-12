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
        <li class="breadcrumb-item active">Manage Settings</li>
      </ol> 
      
<center>
<div class="row">
                      <div class="col-md-3">
                        <div class="alert alert-warning">
                          
                          <i class="fa fa-home fa-5x"></i>
                          <p>Manage Center</p>   
                          
                            <a href="center-edit.php?center=1" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Edit Center Details</span>
                      <span class="nav-link-text"></span>
                    </a><h2></h2>

                          <a href="center.php" class="btn btn-success" >
                        <i class="fa fa-eye bblue"></i>
                        <span class="nav-link-text">View Center</span>
                         </a>
                                               
                        </div>
                        </div>

                        <div class="col-md-3">
                         <div class="alert alert-warning">
                          
                          <i class="fa fa-folder fa-5x"></i>
                          <p>Manage Programs</p>     
                          
                            <a href="addprogram.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add Program</span>
                      <span class="nav-link-text"></span>
                    </a><h2></h2>

                          <a href="programs.php" class="btn btn-success" >
                      <i class="fa fa-eye bblue"></i>
                      <span class="nav-link-text">View Programs</span>
                      <span class="nav-link-text"></span>
                    </a>
                                             
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="alert alert-warning">
                          
                          <i class="fa fa-book fa-5x"></i>
                          <p>Manage Subjects</p>   
                          
                          <a href="addsubject.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add Subject</span>
                      <span class="nav-link-text"></span>
                    </a> <h2></h2>
                          
                          <a href="subjects.php" class="btn btn-success" >
                      <i class="fa fa-eye bblue"></i>
                      <span class="nav-link-text">View Subjects</span>
                      <span class="nav-link-text"></span>
                    </a>
                                        
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="alert alert-warning">
                          
                          <i class="fa fa-percent fa-5x"></i>
                          <p>Manage Class Sections</p>    
                          
                          <a href="addsection.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add Section</span>
                      <span class="nav-link-text"></span>
                    </a>      <h2></h2>
                          
                          <a href="sections.php" class="btn btn-success" >
                      <i class="fa fa-eye bblue"></i>
                      <span class="nav-link-text">View Sections</span>
                      <span class="nav-link-text"></span>
                    </a>
                                  
                        </div>

</div>

    <div class="container-fluid">
<div class="row">
                      <div class="col-md-3">
                        <div class="alert alert-warning">
                          
                          <i class="fa fa-archive fa-5x"></i>
                          <p>Manage Rooms</p>   
                          
                            <a href="addrooms.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add a Room</span>
                      <span class="nav-link-text"></span>
                    </a><h2></h2>

                          <a href="rooms.php" class="btn btn-success" >
                        <i class="fa fa-eye bblue"></i>
                        <span class="nav-link-text">View All Rooms</span>
                         </a>
                                               
                        </div>
                        </div>

                        <div class="col-md-3">
                         <div class="alert alert-warning">
                          
                          <i class="fa fa-calendar fa-5x"></i>
                          <p>Manage School Year</p>     
                          
                            <a href="addsy.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add School Year</span>
                      <span class="nav-link-text"></span>
                    </a><h2></h2>

                          <a href="schoolyear.php" class="btn btn-success" >
                      <i class="fa fa-eye bblue"></i>
                      <span class="nav-link-text">View School Years</span>
                      <span class="nav-link-text"></span>
                    </a>
                                             
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="alert alert-warning">
                          
                          <i class="fa fa-file fa-5x"></i>
                          <p>Manage Requirements</p>   
                          
                          <a href="addrequirement.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add a Requirement</span>
                      <span class="nav-link-text"></span>
                    </a> <h2></h2>
                          
                          <a href="requirements.php" class="btn btn-success" >
                      <i class="fa fa-eye bblue"></i>
                      <span class="nav-link-text">View Requirements</span>
                      <span class="nav-link-text"></span>
                    </a>
                                        
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="alert alert-warning">
                          
                          <i class="fa fa-bell fa-5x"></i>
                          <p>Manage Reminders</p>    
                          
                          <a href="addreminder.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add a Reminder</span>
                      <span class="nav-link-text"></span>
                    </a>      <h2></h2>
                          
                          <a href="reminders.php" class="btn btn-success" >
                      <i class="fa fa-eye bblue"></i>
                      <span class="nav-link-text">View Reminders</span>
                      <span class="nav-link-text"></span>
                    </a>
                                  
                        </div>

</div>
</center>


  </div>
</div>
      <?php include('hfooter.php'); ?>