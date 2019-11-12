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
        <li class="breadcrumb-item active">Reports</li>

      </ol> 
 

                    </a>
                    <a href="gen-masterlist.php" class="btn btn-success" >
                      <i class="fa fa-file"></i>
                      <span class="nav-link-text">Generate Masterlist</span>
                      <span class="nav-link-text"></span>
                    </a>
                    <a href="gen-passerlist.php" class="btn btn-success" >
                      <i class="fa fa-file"></i>
                      <span class="nav-link-text">Generate Passer List</span>
                      <span class="nav-link-text"></span>
                    </a>

<br><h1></h1>
<br><h1></h1>

<center>
<form method="GET" action="reports.php?id=<?php echo $search;?>" style="width: 50%;">
  <div class="input-group">
    <input type="text" class="form-control" name="search" placeholder="Search document here...">
    <div class="input-group-btn">
      <button class="btn btn-default" name="submit" type="submit">
        <i class="fa fa-search"></i>
      </button>
    </div>
  </div>
</form> </center> <br>

<?php
                
                if(isset($_GET['submit'])){
                    $search = $_GET["search"];
                    $code = " WHERE filename LIKE '%$search%'";
                    
                  }
                  else if(!isset($_GET['submit'])){
                    $code = "";
                  }

                    ?>

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
                  <table cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th>Document ID</th>
                        <th>Document Name</th>
                        <th>Status</th>
                        <th>Upload Date</th>
                        
                        
                      </tr>
                    </thead>
                    <tbody>
<?php
include('dbconnections.php');

    $query=mysqli_query($conn,"select * from files"."$code")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['file_id'];
        $filename=$row['filename'];
        $filepath=$row['filepath'];
        $status=$row['status'];
        $date=$row['dateadded'];
        if($status=="1"){$Stat="Active";} else{$Stat="Inactive";}
        
?>                      
                      <tr>
                        <td><?php echo"Document_000".$id;?></td>
                        <td><?php echo $filename;?></td>
                        <td><?php echo $Stat;?></td>
                        <td><?php echo $date;?></td>
                        <td>
                              
                              <a href="<?php echo $filepath;?>" class="btn btn-success" target="_blank">
                                <i class="fa fa-eye"></i>
                              </a>
                              <a href="file-deactivate.php?id=<?php echo $id;?>&stat=<?php echo $status;?>" class="btn btn-success">
                                <i class="fa fa-power-off"></i>
                              </a>
                              <a href="file-delete.php?id=<?php echo $id;?>" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
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