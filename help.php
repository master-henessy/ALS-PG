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
        <li class="breadcrumb-item active">Help Guide</li>

      </ol> 
 
        <a href="addhelp.php" class="btn btn-success" >
                      <i class="fa fa-plus-circle bblue"></i>
                      <span class="nav-link-text">Add Help Guide</span>
                      <span class="nav-link-text"></span>
                    </a>

                    <a href="help-req.php" class="btn btn-success" >
                      <i class="fa fa-eye"></i>
                      <span class="nav-link-text">View Help Requests</span>
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
                        <th width="14%">Help ID</th>
                        <th width="40%">Help Title</th>
                        <th width="20%">Upload Date</th>
                        <th width="26%">Actions</th>
                        
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
include('dbconnections.php');

    $query=mysqli_query($conn,"select * from help where status=1")or die(mysqli_error($con));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['Help_id'];
        $title=$row['title'];
        $content=$row['content'];
        $date=$row['upload_date'];
        
?>                      
                      <tr>
                        <td><?php echo"Help_000".$id;?></td>
                        <td><?php echo $title;?></td>
                        <td><?php echo $date;?></td>
                        <td>
                              
                              <a href="help-view.php?view=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-eye"></i> View
                              </a>
                              <a href="help-edit.php?help=<?php echo $id;?>" class="btn btn-warning">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              <a href="help-delete.php?help=<?php echo $id;?>" class="btn btn-danger">
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