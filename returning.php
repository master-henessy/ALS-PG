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
        <li class="breadcrumb-item">
          <a href="students.php">Students</a>
        </li>
        <li class="breadcrumb-item active">Returning Student</li>

      </ol> 
<br>
<center>
<form style="width: 50%" method="GET" action="returning.php?id=<?php echo $search;?>">
  <div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="Enter Returnee's Name or LRN">
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
              <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th>Student ID</th>
                        <th>Student LRN</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>School Year</th>
                        <th>Enroll Date</th>
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

    $query=mysqli_query($conn,"select * from students WHERE fullname LIKE '%$search%' OR lrn LIKE '%$search%'")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['Student_id'];
        $lrn=$row['lrn'];
        $fname=$row['fname'];
        $lname=$row['lname'];
        $sy=$row['sy'];
        $dateadded=$row['dateadded'];
        
?>                      <!-- Table Page -->
                      <tr>
                        <td><?php echo "Stud_000".$id;?></td>
                        <td><?php echo $lrn;?></td>
                        <td><?php echo $fname;?></td>
                        <td><?php echo $lname;?></td>
                        <td><?php echo $sy;?></td>
                        <td><?php echo $dateadded;?></td>
                        <td>
                              <a href="returnstudent.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i>
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

