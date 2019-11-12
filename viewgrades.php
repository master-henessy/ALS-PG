<?php include('hconnect.php');
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

<style>


.btn {font-size: 10px; height: 33px;}


</style>

  <title>ALS FMS | Admin Dashboard</title>
  <?php include('header.php'); ?>



<body class="fixed-nav sticky-footer bg-dark" id="page-top">
   
  <?php include ('navbar.php'); 

  if(isset($_POST['submit'])){
    $subjid =  $_POST["subjid"];
    $student_id = $_POST["student_id"];
    }

  if(isset($_GET['id'])){
    $subjid =  $_GET["sub"];
    $student_id = $_GET["id"];
    }
   
  ?> 

  <?php
include('dbconnections.php');
    $query=mysqli_query($conn,"select * from students where status='1' AND Student_id='$student_id'")or die(mysqli_error($conn));
        $row=mysqli_fetch_array($query);
        $id=$row['Student_id'];
        $fullname=$row['fullname'];
        $sec_id=$row['sec_id'];

         $query99=mysqli_query($conn,"select * from subjects where subj_id='$subjid'")or die(mysqli_error($conn));
        $row99=mysqli_fetch_array($query99);
        $subj_id=$row99['subj_id'];
        $subj_name=$row99['subj_name'];
      
  
        
?>     


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
                
                <div class="card-body">

<div class="row">

          <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Student Grade Pie Chart</div>
              <div class="card-body">
                <canvas id="myPieChart" width="100%" height="100"></canvas>
              </div>
              
            </div>
          </div>











        <div class="col-lg-6">
          <div class="">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Subject Grading System
              </div>
              <div class="card-body">
                <?php
                    $query3=mysqli_query($conn,"select * from criterias where criteria_name='Quiz' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row3=mysqli_fetch_array($query3)){
                        $criteria_id1=$row3['criteria_id'];
                        $quiz_percent=$row3['percentage'];
                ?>
                <?php
                    $query4=mysqli_query($conn,"select * from criterias where criteria_name='Assignment' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row4=mysqli_fetch_array($query4)){
                        $criteria_id2=$row4['criteria_id'];
                        $assignment_percent=$row4['percentage'];
                ?>
                <?php
                    $query5=mysqli_query($conn,"select * from criterias where criteria_name='Exam' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row5=mysqli_fetch_array($query5)){
                        $criteria_id3=$row5['criteria_id'];
                        $exam_percent=$row5['percentage'];
                ?>
                <?php
                    $query6=mysqli_query($conn,"select * from criterias where criteria_name='Recitation' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row6=mysqli_fetch_array($query6)){
                        $criteria_id4=$row6['criteria_id'];
                        $recitation_percent=$row6['percentage'];
                ?>
                <?php
                    $query7=mysqli_query($conn,"select * from criterias where criteria_name='Project' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row7=mysqli_fetch_array($query7)){
                        $criteria_id5=$row7['criteria_id'];
                        $project_percent=$row7['percentage'];
                ?>
                <?php
                    $query8=mysqli_query($conn,"select * from criterias where criteria_name='Behavior' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row8=mysqli_fetch_array($query8)){
                        $criteria_id6=$row8['criteria_id'];
                        $behavior_percent=$row8['percentage'];
                ?>
                <?php
                    $query9=mysqli_query($conn,"select * from criterias where criteria_name='Performance' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row9=mysqli_fetch_array($query9)){
                        $criteria_id7=$row9['criteria_id'];
                        $performance_percent=$row9['percentage'];
                ?>
                <?php
                    $query10=mysqli_query($conn,"select * from criterias where criteria_name='Attendance' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row10=mysqli_fetch_array($query10)){
                        $criteria_id8=$row10['criteria_id'];
                        $attendance_percent=$row10['percentage'];
                ?>


                  <table class="table table-bordered" id="table" width="100%" cellspacing="10">
                    <tbody>

                  
                      <tr>
                        <td hidden><?php echo $criteria_id1."%";?></td>
                        <td>Quiz</td>
                        <td><?php echo $quiz_percent."%";?></td>
                        <td><center>
                              
                              <a href="editcriteria.php?id=<?php echo $criteria_id1;?>" class="btn btn-success">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <tr>
                        <td hidden><?php echo $criteria_id2."%";?></td>
                        <td>Assignment</td>
                        <td><?php echo $assignment_percent."%";?></td>
                        <td><center>
                              
                              <a href="editcriteria.php?id=<?php echo $criteria_id2;?>" class="btn btn-success">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <tr>
                        <td hidden><?php echo $criteria_id3."%";?></td>
                        <td>Exam</td>
                        <td><?php echo $exam_percent."%";?></td>
                        <td><center>
                              
                              <a href="editcriteria.php?id=<?php echo $criteria_id3;?>" class="btn btn-success">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <tr>
                        <td hidden><?php echo $criteria_id4."%";?></td>
                        <td>Recitation</td>
                        <td><?php echo $recitation_percent."%";?></td>
                        <td><center>
                              
                              <a href="editcriteria.php?id=<?php echo $criteria_id4;?>" class="btn btn-success">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <tr>
                        <td hidden><?php echo $criteria_id5."%";?></td>
                        <td>Project</td>
                        <td><?php echo $project_percent."%";?></td>
                        <td><center>
                              
                              <a href="editcriteria.php?id=<?php echo $criteria_id5;?>" class="btn btn-success">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <tr>
                        <td hidden><?php echo $criteria_id6."%";?></td>
                        <td>Behavior</td>
                        <td><?php echo $behavior_percent."%";?></td>
                        <td><center>
                              
                              <a href="editcriteria.php?id=<?php echo $criteria_id6;?>" class="btn btn-success">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <tr>
                        <td hidden><?php echo $criteria_id7."%";?></td>
                        <td>Performance</td>
                        <td><?php echo $performance_percent."%";?></td>
                        <td><center>
                              
                              <a href="editcriteria.php?id=<?php echo $criteria_id7;?>" class="btn btn-success">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <tr>
                        <td hidden><?php echo $criteria_id8."%";?></td>
                        <td>Attendance</td>
                        <td><?php echo $attendance_percent."%";?></td>
                        <td><center>
                              
                              <a href="editcriteria.php?id=<?php echo $criteria_id8;?>" class="btn btn-success">
                                <i class="fa fa-pencil"></i> Edit
                              </a>
                              </center>
                              
                        </td>
                      </tr>



                    </tbody>

                  </table>
                  </div>
            </div>
          <?php
}}}}}}}}


?>
        </div>
        </div>




</div>































<div class="row">


        <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Quiz
              </div>
              <div class="card-body">
                <?php
                    $query3=mysqli_query($conn,"select * from criterias where criteria_name='Quiz' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row3=mysqli_fetch_array($query3)){
                        $criteria_id=$row3['criteria_id'];
                        $criteria_name=$row3['criteria_name'];
                        $quiz_percent=$row3['percentage'];

                ?>


                  <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead class="thead-inverse">
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:10%">Grade</th>
                        <th style="width:10%">%</th>
                        <th style="width:70%">Date</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
                      $query=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                        while ($row=mysqli_fetch_array($query)){
                          $grade_id=$row['grade_id'];
                          $grade=$row['grade'];
                          $items=$row['items'];
                          $percentage=$row['percent'];
                          $dateadded=$row['dateadded'];
                          $addedby = $row["addedby"];
                          $dt = date("Y-m-d",strtotime("$dateadded"));


                  ?>


                      <tr>
                        <td hidden><?php echo $grade_id;?></td>
                        <td><?php echo $grade."/".$items;?></td>
                        <td><?php echo $percentage."%";?></td>
                        <td><?php echo $dt ;?></td>
                        
                        <td><center>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i> Remove
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <?php
                      }


                          $queryyy=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                              $rowww=mysqli_fetch_array($queryyy);
                              $average=$rowww['average'];
                              $totalave= ($average / 100) * $quiz_percent;
                              


                      ?>


                    </tbody>

                  </table>
                  </div>
              <div class="card-footer small text-muted">Average Quiz Grade: <?php echo $average."% (Quiz Grade: ".$totalave."%)";?></div> 
            </div>
          <?php
}


?>
        </div>



                <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Assignment
              </div>
              <div class="card-body">
                <?php
                    $query3=mysqli_query($conn,"select * from criterias where criteria_name='Assignment' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row3=mysqli_fetch_array($query3)){
                        $criteria_id=$row3['criteria_id'];
                        $criteria_name=$row3['criteria_name'];
                        $assignment_percent=$row3['percentage'];

                ?>


                  <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead class="thead-inverse">
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:10%">Grade</th>
                        <th style="width:10%">%</th>
                        <th style="width:70%">Date</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
                      $query=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                        while ($row=mysqli_fetch_array($query)){
                          $grade_id=$row['grade_id'];
                          $grade=$row['grade'];
                          $items=$row['items'];
                          $percentage=$row['percent'];
                          $dateadded=$row['dateadded'];
                          $addedby = $row["addedby"];
                          $dt = date("Y-m-d",strtotime("$dateadded"));


                  ?>


                      <tr>
                        <td hidden><?php echo $grade_id;?></td>
                        <td><?php echo $grade."/".$items;?></td>
                        <td><?php echo $percentage."%";?></td>
                        <td><?php echo $dt ;?></td>
                        
                        <td><center>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i> Remove
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <?php
                      }


                          $queryyy=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                              $rowww=mysqli_fetch_array($queryyy);
                              $average=$rowww['average'];
                              $totalave4= ($average / 100) * $assignment_percent;
                              


                      ?>


                    </tbody>

                  </table>
                  </div>
              <div class="card-footer small text-muted">Average Assignment Grade: <?php echo $average."% (Assignment Grade: ".$totalave4."%)";?></div> 
            </div>
          <?php
}


?>
        </div>





</div>






























<div class="row">


        <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Examinations
              </div>
              <div class="card-body">
                <?php
                    $query3=mysqli_query($conn,"select * from criterias where criteria_name='Exam' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row3=mysqli_fetch_array($query3)){
                        $criteria_id=$row3['criteria_id'];
                        $criteria_name=$row3['criteria_name'];
                        $exam_percent=$row3['percentage'];

                ?>


                  <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead class="thead-inverse">
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:10%">Grade</th>
                        <th style="width:10%">%</th>
                        <th style="width:70%">Date</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
                      $query=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                        while ($row=mysqli_fetch_array($query)){
                          $grade_id=$row['grade_id'];
                          $grade=$row['grade'];
                          $items=$row['items'];
                          $percentage=$row['percent'];
                          $dateadded=$row['dateadded'];
                          $addedby = $row["addedby"];
                          $dt = date("Y-m-d",strtotime("$dateadded"));


                  ?>


                      <tr>
                        <td hidden><?php echo $grade_id;?></td>
                        <td><?php echo $grade."/".$items;?></td>
                        <td><?php echo $percentage."%";?></td>
                        <td><?php echo $dt ;?></td>
                        
                        <td><center>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i> Remove
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <?php
                      }


                          $queryyy=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                              $rowww=mysqli_fetch_array($queryyy);
                              $average=$rowww['average'];
                              $totalave5= ($average / 100) * $exam_percent;
                              


                      ?>


                    </tbody>

                  </table>
                  </div>
              <div class="card-footer small text-muted">Average Exam Grade: <?php echo $average."% (Exam Grade: ".$totalave5."%)";?></div> 
            </div>
          <?php
}


?>
        </div>



                <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Recitation
              </div>
              <div class="card-body">
                <?php
                    $query3=mysqli_query($conn,"select * from criterias where criteria_name='Recitation' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row3=mysqli_fetch_array($query3)){
                        $criteria_id=$row3['criteria_id'];
                        $criteria_name=$row3['criteria_name'];
                        $recitation_percent=$row3['percentage'];

                ?>


                  <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead class="thead-inverse">
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:10%">Grade</th>
                        <th style="width:10%">%</th>
                        <th style="width:70%">Date</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
                      $query=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                        while ($row=mysqli_fetch_array($query)){
                          $grade_id=$row['grade_id'];
                          $grade=$row['grade'];
                          $items=$row['items'];
                          $percentage=$row['percent'];
                          $dateadded=$row['dateadded'];
                          $addedby = $row["addedby"];
                          $dt = date("Y-m-d",strtotime("$dateadded"));


                  ?>


                      <tr>
                        <td hidden><?php echo $grade_id;?></td>
                        <td><?php echo $percentage;?></td>
                        <td><?php echo $percentage."%";?></td>
                        <td><?php echo $dt ;?></td>
                        
                        <td><center>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i> Remove
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <?php
                      }


                          $queryyy=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                              $rowww=mysqli_fetch_array($queryyy);
                              $average=$rowww['average'];
                              $totalave6= ($average / 100) * $recitation_percent;
                              


                      ?>


                    </tbody>

                  </table>
                  </div>
              <div class="card-footer small text-muted">Average Recitation Grade: <?php echo $average."% (Recitation Grade: ".$totalave6."%)";?></div> 
            </div>
          <?php
}


?>
        </div>





</div>







<div class="row">


        <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Project
              </div>
              <div class="card-body">
                <?php
                    $query3=mysqli_query($conn,"select * from criterias where criteria_name='Project' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row3=mysqli_fetch_array($query3)){
                        $criteria_id=$row3['criteria_id'];
                        $criteria_name=$row3['criteria_name'];
                        $project_percent=$row3['percentage'];

                ?>


                  <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead class="thead-inverse">
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:10%">Grade</th>
                        <th style="width:10%">%</th>
                        <th style="width:70%">Date</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
                      $query=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                        while ($row=mysqli_fetch_array($query)){
                          $grade_id=$row['grade_id'];
                          $grade=$row['grade'];
                          $items=$row['items'];
                          $percentage=$row['percent'];
                          $dateadded=$row['dateadded'];
                          $addedby = $row["addedby"];
                          $dt = date("Y-m-d",strtotime("$dateadded"));


                  ?>


                      <tr>
                        <td hidden><?php echo $grade_id;?></td>
                        <td><?php echo $percentage;?></td>
                        <td><?php echo $percentage."%";?></td>
                        <td><?php echo $dt ;?></td>
                        
                        <td><center>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i> Remove
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <?php
                      }


                          $queryyy=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                              $rowww=mysqli_fetch_array($queryyy);
                              $average=$rowww['average'];
                              $totalave7= ($average / 100) * $project_percent;
                              


                      ?>


                    </tbody>

                  </table>
                  </div>
              <div class="card-footer small text-muted">Average Project Grade: <?php echo $average."% (Project Grade: ".$totalave7."%)";?></div> 
            </div>
          <?php
}


?>
        </div>



                <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Behavior
              </div>
              <div class="card-body">
                <?php
                    $query3=mysqli_query($conn,"select * from criterias where criteria_name='Behavior' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row3=mysqli_fetch_array($query3)){
                        $criteria_id=$row3['criteria_id'];
                        $criteria_name=$row3['criteria_name'];
                        $behavior_percent=$row3['percentage'];

                ?>


                  <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead class="thead-inverse">
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:10%">Grade</th>
                        <th style="width:10%">%</th>
                        <th style="width:70%">Date</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
                      $query=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                        while ($row=mysqli_fetch_array($query)){
                          $grade_id=$row['grade_id'];
                          $grade=$row['grade'];
                          $items=$row['items'];
                          $percentage=$row['percent'];
                          $dateadded=$row['dateadded'];
                          $addedby = $row["addedby"];
                          $dt = date("Y-m-d",strtotime("$dateadded"));


                  ?>


                      <tr>
                        <td hidden><?php echo $grade_id;?></td>
                        <td><?php echo $percentage;?></td>
                        <td><?php echo $percentage."%";?></td>
                        <td><?php echo $dt ;?></td>
                        
                        <td><center>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i> Remove
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <?php
                      }


                          $queryyy=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                              $rowww=mysqli_fetch_array($queryyy);
                              $average=$rowww['average'];
                              $totalave8= ($average / 100) * $behavior_percent;
                              


                      ?>


                    </tbody>

                  </table>
                  </div>
              <div class="card-footer small text-muted">Average Behavior Grade: <?php echo $average."% (Behavior Grade: ".$totalave8."%)";?></div> 
            </div>
          <?php
}


?>
        </div>





</div>




















<div class="row">


        <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Performance
              </div>
              <div class="card-body">
                <?php
                    $query3=mysqli_query($conn,"select * from criterias where criteria_name='Performance' AND subj_id='$subjid'")or die(mysqli_error($conn));
                      while ($row3=mysqli_fetch_array($query3)){
                        $criteria_id=$row3['criteria_id'];
                        $criteria_name=$row3['criteria_name'];
                        $performance_percent=$row3['percentage'];

                ?>


                  <table class="table table-bordered" id="table" width="100%" cellspacing="0">
                    <thead class="thead-inverse">
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:10%">Grade</th>
                        <th style="width:10%">%</th>
                        <th style="width:70%">Date</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
                      $query=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                        while ($row=mysqli_fetch_array($query)){
                          $grade_id=$row['grade_id'];
                          $grade=$row['grade'];
                          $items=$row['items'];
                          $percentage=$row['percent'];
                          $dateadded=$row['dateadded'];
                          $addedby = $row["addedby"];
                          $dt = date("Y-m-d",strtotime("$dateadded"));


                  ?>


                      <tr>
                        <td hidden><?php echo $grade_id;?></td>
                        <td><?php echo $percentage;?></td>
                        <td><?php echo $percentage."%";?></td>
                        <td><?php echo $dt ;?></td>
                        
                        <td><center>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i> Remove
                              </a>
                              </center>
                              
                        </td>
                      </tr>

                      <?php
                      }


                          $queryyy=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
                              $rowww=mysqli_fetch_array($queryyy);
                              $average=$rowww['average'];
                              $totalave9= ($average / 100) * $performance_percent;
                              


                      ?>


                    </tbody>

                  </table>
                  </div>
              <div class="card-footer small text-muted">Average Performance Grade: <?php echo $average."% (Performance Grade: ".$totalave9."%)";?></div> 
            </div>
          <?php
}


?>
        </div>



                <div class="col-lg-6">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Attendance
              </div>
              <div class="card-body">
                <?php
    $query10=mysqli_query($conn,"select * from criterias where criteria_name='Attendance' AND subj_id='$subjid'")or die(mysqli_error($conn));
      while ($row10=mysqli_fetch_array($query10)){
        $criteria_id10=$row10['criteria_id'];
        $criteria_name10=$row10['criteria_name'];
        $attendance_percent=$row10['percentage'];

?>

                  <table class="table table-bordered" id="data Table" width="100%" cellspacing="0">
                    <thead class="thead-inverse">
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:90%">Attendance (<?php echo $attendance_percent;?>%)</th>
                        <th style="width:10%"><a href="addattendance.php?id=<?php echo $id;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add New Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
    $query10=mysqli_query($conn,"select COUNT(status) AS count1 from attendance where student_id='$id' AND status='Present'")or die(mysqli_error($conn));
      $row10=mysqli_fetch_array($query10);
        $dayspresent=$row10['count1'];

    $query11=mysqli_query($conn,"select COUNT(status) AS count2 from attendance where student_id='$id'")or die(mysqli_error($conn));
      $row11=mysqli_fetch_array($query11);
        $alldays=$row11['count2'];

    $query12=mysqli_query($conn,"select COUNT(status) AS count3 from attendance where student_id='$id' AND status='Absent'")or die(mysqli_error($conn));
      $row12=mysqli_fetch_array($query12);
        $daysabsent=$row12['count3'];

        $attendance = ($dayspresent / $alldays) * $attendance_percent;

    
        

?>


                      <tr>
                        <td hidden><?php echo $grade_id10;?></td>
                        <td>Days Present
                        <td><?php echo $dayspresent." Day/s";?></td>
                      </tr>

                      <tr>
                        <td hidden><?php echo $grade_id10;?></td>
                        <td>Days Absent </td>
                        <td><?php echo $daysabsent." Day/s";?></td>
                      </tr>

                      <tr>
                        <td hidden><?php echo $grade_id10;?></td>
                        <td>Total Days </td>
                        <td><?php echo $alldays." Day/s";?></td>
                      </tr>

<?php

        $totalave10= $attendance;
        


?>


                    </tbody>
<?php
}


?>
                  </table>
                  </div>
                  <div class="card-footer small text-muted">Average Attendance Grade: <?php echo $dayspresent." Days out of ".$alldays." (Attendance Grade: ".$totalave10."%)";?>
                  </div>
                  
        </div>
        





</div>
</div>






<br>



<?php 

$subjgradetotal = $totalave + $totalave4 + $totalave5 + $totalave6 + $totalave7 + $totalave8 + $totalave9 + $totalave10;

?>

  <div class="page-tables">

                <div class="table-responsive">
                  <table class="table table-bordered" id="data Table" width="100%" cellspacing="0">
                    <thead class="thead-inverse">
                      <tr>
                        
                        <th style="width:50%">Total Grade for <?php echo $subj_name;?> Subject</th>
                        <th style="width:50%"><center><?php echo $subjgradetotal;?>%</center></th>
                      </tr>
                    </thead>
                   

                  </table>
                  </div>
                  </div>




                  <div class="clearfix"></div>
                </div>
                </div>




                   


                 
              </div>
            </div>

          </body>

  </div>
</div>



            <?php include('hfooter.php'); ?>


<script>
    Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Quiz", "Assignment", "Exam", "Recitation", "Project", "Behavior", "Performance", "Attendance"],

    datasets: [{
      data: [<?php echo $totalave ?>, <?php echo $totalave4 ?>, <?php echo $totalave5 ?>, <?php echo $totalave6 ?>, <?php echo $totalave7 ?>, <?php echo $totalave8 ?>, <?php echo $totalave9 ?>, <?php echo $totalave10 ?>],
      backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745', '#9400D3', '#4B0082', '#FF7F00', '#FF1493'],
    }],
  },
});
</script>