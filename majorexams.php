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
         <li class="breadcrumb-item">
          <a href="students.php">Students</a>
        </li>
        <li class="breadcrumb-item active">View Student Records</li>
      </ol> 
      
          <body class="bg-dark">
            <div class="container">
              <div class="card mx-auto mt-12">
                <div class="card-header">View Student Records</div>
                <div class="card-body">
                  <form method="POST" action="#">
                    <div class="form-group">
<?php
include('dbconnections.php');
		$id=$_GET['id'];
    $query=mysqli_query($conn,"select * from students where status='1' AND Student_id='$id'")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $id=$row['Student_id'];
        $fname=$row['fname'];
        $mname=$row['mdname'];
        $lname=$row['lname'];
        $fullname = $fname." ".$mname." ".$lname;
        $program = $row["program"]." Program";
        $lrn = $row["lrn"];
        $sec_id = $row["sec_id"];

        $query2=mysqli_query($conn,"select * from sections where sec_id='$sec_id'")or die(mysqli_error($conn));
      while ($row2=mysqli_fetch_array($query2)){
        $section=$row2['sec_no'];


       
}
}
        
?>                      

              

                    <center><h5>Student Profile</h5></center><br>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Student LRN:</label>
                      <input class="form-control" id="lrn" name="lrn" type="text" value="<?php echo $lrn;?>" readonly>
                    </div>

                      <label for="exampleInputEmail1">Student Name:</label>
                      <input class="form-control" id="fullname" name="fullname" type="text" value="<?php echo $fullname;?>" Readonly>
                    </div>
                   
                    <div class="form-group">
                      <label for="exampleInputPassword1">Program:</label>
                      <input class="form-control" id="program" name="program" type="text" value="<?php echo $program;?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Section:</label>
                      <input class="form-control" id="section" name="section" type="text" value="<?php echo $section;?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">School Year:</label>
                      <input class="form-control" id="sy" name="sy" type="text" value="<?php echo $sy;?>" readonly>
                    </div>

                    <center><h5>Major Exam Results</h5></center><br>


  <div class="page-tables">
                <!-- Table -->
                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th>Exam Name</th>
                        <th>Score</th>
                        <th>Percentage</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>

                    <?php
    $query=mysqli_query($conn,"select * from exams where student_id='$id'")or die(mysqli_error($conn));
      while ($row=mysqli_fetch_array($query)){
        $student_id=$row['student_id'];
        $pis=$row['pis'];
        $pis_noi=$row['pis_noi'];
        $pisp0=$row['pisp'];
        $flt1=$row['flt1'];
        $flt1_noi=$row['flt1_noi'];
        $flt1p0=$row['flt1p'];
        $flt2=$row['flt2'];
        $flt2_noi=$row['flt2_noi'];
        $flt2p0=$row['flt2p'];
        $ae=$row['ae'];
        $ae_noi=$row['ae_noi'];
        $aep0=$row['aep'];

        $d1 = $pis." / ".$pis_noi;
        $d2 = $flt1." / ".$flt1_noi;
        $d3 = $flt2." / ".$flt2_noi;
        $d4 = $ae." / ".$ae_noi;

        if($d1 == "0 / 0"){ 
          $d1 = "No Record Yet";
          $pisp= "N/A";
        }
        else { 
          $pisp=$pisp0."%"; 
        }

        if($d2 == "0 / 0"){ 
          $d2 = "No Record Yet";
          $flt1p= "N/A";
        }
        else { 
          $flt1p=$flt1p0."%"; 
        }

        if($d3 == "0 / 0"){ 
          $d3 = "No Record Yet";
          $flt2p= "N/A";
        }
        else { 
          $flt2p = $flt2p0."%"; 
        }

        if($d4 == "0 / 0"){ 
          $d4 = "No Record Yet";
          $aep= "N/A";
        }
        else { 
          $aep = $aep0."%";   
        }
        
    


?>


                      <tr>
                        <td>Personal Information Sheet (PIS)</td>
                        <td><?php echo $d1; ?></td>
                         <td><?php echo $pisp;?></td>
                        <td>
                              <a href="editpis.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-edit"></i>
                              </a>
                              
                              
                        </td>
                      </tr>

                    <tr>
                        <td>Functional Literacy Test 1 (FLT1)</td>
                        <td><?php echo $d2;?></td>
                         <td><?php echo $flt1p;?></td> 
                        <td>
                              <a href="editflt1.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-edit"></i>
                              </a>
                              
                              
                        </td>
                      </tr>

                      <tr>
                        <td>Functional Literacy Test 2 (FLT2)</td>
                        <td><?php echo $d3;?></td>
                         <td><?php echo $flt2p;?></td> 
                        <td>
                              <a href="editflt2.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-edit"></i>
                              </a>
                              
                              
                        </td>
                      </tr>

                      <tr>
                        <td>A&E (A&E)</td>
                        <td><?php echo $d4;?></td>
                        <td><?php echo $aep;?></td> 
                        <td>
                              <a href="editae.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-edit"></i>
                              </a>
                              
                              
                        </td>
                      </tr>

                    </tbody>
<?php
}


?>
                  </table>
                  <div class="clearfix"></div>
                </div>
                </div>




                   


                  </form>

             
                </div>
              </div>
            </div>

          </body>

  </div>
</div>
     
            <?php include('hfooter.php'); ?>
