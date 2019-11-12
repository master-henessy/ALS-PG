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
          <a href="users.php">Users</a>
        </li>
        <li class="breadcrumb-item active">Add User Account</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card card-login mx-auto mt-12">
                <div class="card-header">Add User Account</div>
                <div class="card-body">
                  <form method="POST" action="adduser-confirm.php">
                    <div class="form-group">

                      <label for="exampleInputEmail1">Username:</label>
                      <input class="form-control" id="uname" name="uname" type="text" aria-describedby="emailHelp" placeholder="Enter User Name" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password:</label>
                      <input class="form-control" id="pass" name="pass" type="password" placeholder="Enter User Password" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">User Type:</label>
                       <select class="form-control" id="ulevel" name="ulevel" required>
                        <option value="">Select User Type</option>
                        <option value="Admin">Admin</option>
                        <option value="User">Facilitator</option>
                      </select>
                    </div>


                                  <input class="form-control" id="idsession" type="hidden" value="<?php echo $id; ?>" placeholder="Enter Retype New Password">

                     <center><input value="submit" name="submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit" style="width:250px;" /></center>
                  </form>
             
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
      <footer class="sticky-footer">
      <div class="container-wrapper">
        <div class="text-center">
          <small><b>Copyright © 2019 </b>(</small>
          <small>Developed by: Brian Arjay Mercado & Cederico Gudito )</small>
        </div>
      </div>
    </footer>

</body>

</html>
