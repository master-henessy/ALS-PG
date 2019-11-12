<?php include('hconnect.php'); 

$id=$_GET['id'];

?>

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
          <a href="students.php">Students</a>
        </li>
        <li class="breadcrumb-item">
          <a href="majorexams.php?id=<?php echo $id; ?>">Major Exams</a>
        </li>
        <li class="breadcrumb-item active">Edit PIS Score</li>
      </ol> 
      
        <?php
include('dbconnections.php');
    $query=mysqli_query($conn,"select * from exams where student_id=$id")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['student_id'];
        $pis=$row['pis'];
        $pis_noi=$row['pis_noi'];
        
        
?>                    

                    
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-5">
                <div class="card-header">Edit PIS Exam Details</div>
                <div class="card-body">
                  <form method="POST" action="editpis-confirm.php">
                    <div class="form-group">
                    <div class="form-group">
                      <input class="form-control" id="id" name="id" type="text" value="<?php echo $id;?>" hidden>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">PIS Score:</label>
                      <input class="form-control" id="pis" name="pis" type="text" value="<?php echo $pis;?>" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Number of Items:</label>
                      <input class="form-control" id="pisnoi" name="pisnoi" type="text" value="<?php echo $pis_noi;?>" required>
                    </div>

                       <center><input value="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
                    </div>
                  
                  </form>
             
                </div>
                
              </div>
            </div>

<?php }?>

          </body>
  </div>
</div>
       <?php include('hfooter.php'); ?>
