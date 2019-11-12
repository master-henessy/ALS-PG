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
          <a href="settings.php">Settings</a>
        </li>
         <li class="breadcrumb-item">
          <a href="reminders.php">Reminders</a>
        </li>
        <li class="breadcrumb-item active">View Reminder Deatils</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">Reminder Details</div>
                <div class="card-body">
                  <form method="POST" action="#">
                    <div class="form-group">
<?php
include('dbconnections.php');
		$view=$_GET['view'];
    $query=mysqli_query($conn,"select * from reminders where reminder_id='$view'")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $pid=$row['reminder_id'];
        $remname=$row['remname'];
        $content=$row['content'];
        $addeddate=$row['addeddate'];
        
?>                      
                    <div class="form-group">
                      <label for="exampleInputEmail1">Reminder Name:</label>
                      <input class="form-control" id="remname" name="remname" type="text" value="<?php echo $remname;?>" Readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Reminder Details:</label>
                      <textarea class="form-control" style="height:250px;overflow:auto;resize:none" id="content" name="content" type="text" readonly><?php echo $content;?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Date Added:</label>
                      <input class="form-control" id="addeddate" name="addeddate" type="text" value="<?php echo $addeddate;?>" Readonly>
                    </div>


                    <?php }?>
                  </form>
             <h1></h1>
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
     
            <?php include('hfooter.php'); ?>
