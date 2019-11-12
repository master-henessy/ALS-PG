<?php include('hconnect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ALS FMS | Admin Dashboard</title>
  <?php include('header.php'); ?>

 

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
   
  <?php include ('navbar.php'); ?> 
  <?php include('js.php');?>  



  <div class="content-wrapper"  id="showpage" style="width: 87%">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Help Guide</li>

      </ol> 
 
        <a href="addhelp.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add Help Guide</span>
                      <span class="nav-link-text"></span>
                    </a>

                    <a href="addstudent.php" class="btn btn-success" >
                      <i class="fa fa-eye"></i>
                      <span class="nav-link-text">View Help Requests</span>
                      <span class="nav-link-text"></span>
                    </a>
<br><h1></h1>
<br><h1></h1>
  <!-- Modal -->
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Added Successfully</h4>
      </div>
      <div class="modal-body">
        <p>New Help Guide was added successfully!</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
      



  </div>
</div>
      <?php include('hfooter.php'); ?>