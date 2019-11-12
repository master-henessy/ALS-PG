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
        <li class="breadcrumb-item active">Manage Instructors</li>
      </ol> 
      


        <a href="addinstructor.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add Instructor</span>
                      <span class="nav-link-text"></span>
                    </a>
<br><h1></h1>
<br><h1></h1>

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
                         <th width="15%">Instructor ID</th>
                        <th width="30%">Instructor Name</th>
                        <th width="17%">Contact Number</th>
                        <th width="18%">E-mail Address</th>
                        <th width="20%">Action</th>
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
include('dbconnections.php');

    $query=mysqli_query($conn,"select * from instructors where status=1")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['Instructor_id'];
        $fname=$row['fname'];
        $lname=$row['lname'];
        $contactno=$row['contactno'];
        $email=$row['email'];
        $dateadded=$row['dateadded'];
        
?>                      
                      <tr>
                        <td><?php echo "Ins_000".$id;?></td>
                        <td><?php echo $fname." ".$lname;?></td>
                        <td><?php echo $contactno;?></td>
                        <td><?php echo $email;?></td>
                        <td>
                              <a href="instructors-view.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-eye"></i> View
                              </a>
                              <a href="instructors-delete.php?id=<?php echo $id;?>" class="btn btn-danger">
                                <i class="fa fa-trash"></i> Delete
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