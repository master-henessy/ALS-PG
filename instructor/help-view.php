<?php include('hconnect.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>ALS FMS | Admin Dashboard</title>
  <?php include('header.php'); ?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
   
  <?php include ('navbar.php'); ?> 


  <div class="content-wrapper"  id="showpage" style="width: 87%">
    <div class="container-fluid">

      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="home.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
          <a href="help.php">Help</a>
        </li>
        <li class="breadcrumb-item active">View Help Guide</li>
      </ol> 

      
      
      <?php
include('dbconnections.php');
    $view=$_GET['view'];
    $query=mysqli_query($conn,"select * from help where status=1 AND Help_id='$view'")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['Help_id'];
        $title=$row['title'];
        $content=$row['content'];
        $date=$row['upload_date'];
        
?>                    

                    
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Title: <?php echo $title;?></div>
                <div class="card-body">
                  <form method="POST" action="addhelp-confirm.php">
                    <div class="form-group">
                       <textarea class="form-control" style="height:250px;overflow:auto;resize:none" id="content" name="content" type="text" readonly><?php echo $content;?></textarea>
                    </div>
                  
                  </form>
             
                </div>
                <div class="card-footer">Upload Date: <?php echo $date;?>
                </div>
              </div>
            </div>

<?php }?>

          </body>

  </div>
</div>
       <?php include('hfooter.php'); ?>
