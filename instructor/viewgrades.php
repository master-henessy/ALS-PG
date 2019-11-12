<?php include('hconnect.php');
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
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
                <div class="card-header"><h4>View Student Records of <?php echo $fullname;?> <a href="student-view.php?id=<?php echo $id;?>" class="btn btn-success" >Go to Profile</a> </h4>
                    </div>
                <div class="card-body">
                  <form method="POST" action="viewgrades.php">
                    <div class="form-group">

  
<?php
    $query3=mysqli_query($conn,"select * from criterias where criteria_name='Quiz' AND subj_id='$subjid'")or die(mysqli_error($conn));
      while ($row3=mysqli_fetch_array($query3)){
        $criteria_id=$row3['criteria_id'];
        $criteria_name=$row3['criteria_name'];
        $quiz_percent=$row3['percentage'];

?>

  <div class="page-tables">

                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:65%">Quiz (<?php echo $quiz_percent;?>%)</th>
                        <th style="width:25%">Quiz Date</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add New Record
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


?>


                      <tr>
                        <td hidden><?php echo $grade_id;?></td>
                        <td>Quiz Grade: <?php echo $grade."/".$items."(".$percentage."%)";?></td>
                        <td><?php echo $dateadded ;?></td>
                        
                        <td>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i>
                              </a>
                              
                              
                        </td>
                      </tr>

<?php
}


    $queryyy=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
        $rowww=mysqli_fetch_array($queryyy);
        $average=$rowww['average'];
        $totalave= ($average / 100) * $quiz_percent;
        


?>

                      <tr>
                        
                        <td>Average Quiz Grade: <?php echo $average."% (Quiz Grade: ".$totalave."%)";?></td>
                        
                      </tr>

                    </tbody>
<?php
}


?>
                  </table>
                  </div>
                  </div>








<br>






                  <?php
    $query4=mysqli_query($conn,"select * from criterias where criteria_name='Assignment' AND subj_id='$subjid'")or die(mysqli_error($conn));
      while ($row4=mysqli_fetch_array($query4)){
        $criteria_id4=$row4['criteria_id'];
        $criteria_name4=$row4['criteria_name'];
        $assignment_percent=$row4['percentage'];

?>

  <div class="page-tables">

                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:65%">Assignment (<?php echo $assignment_percent;?>%)</th>
                        <th style="width:25%">Assigment Date</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id4;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add New Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
    $query4=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id4' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
      while ($row4=mysqli_fetch_array($query4)){
        $grade_id4=$row4['grade_id'];
        $grade4=$row4['grade'];
        $items4=$row4['items'];
        $percentage4=$row4['percent'];
        $dateadded4=$row4['dateadded'];
        $addedby4 = $row4["addedby"];


?>


                      <tr>
                        <td hidden><?php echo $grade_id4;?></td>
                        <td>Assignment Grade: <?php echo $grade4."/".$items4."(".$percentage4."%)";?></td>
                        <td><?php echo $dateadded4 ;?></td>
                        
                        <td>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id4;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i>
                              </a>
                              
                              
                        </td>
                      </tr>

<?php
}


    $queryyy4=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id4' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
        $rowww4=mysqli_fetch_array($queryyy4);
        $average4=$rowww4['average'];
        $totalave4= ($average4 / 100) * $assignment_percent;
        


?>

                      <tr>
                        
                        <td>Average Assignment Grade: <?php echo $average4."% (Assignment Grade: ".$totalave4."%)";?></td>
                        
                      </tr>

                    </tbody>
<?php
}


?>
                  </table>
                  </div>
                  </div>




                  <br>






                  <?php
    $query5=mysqli_query($conn,"select * from criterias where criteria_name='Exam' AND subj_id='$subjid'")or die(mysqli_error($conn));
      while ($row5=mysqli_fetch_array($query5)){
        $criteria_id5=$row5['criteria_id'];
        $criteria_name5=$row5['criteria_name'];
        $exam_percent=$row5['percentage'];

?>

  <div class="page-tables">

                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:65%">Exam (<?php echo $exam_percent;?>%)</th>
                        <th style="width:25%">Exam Date</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id5;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add New Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
    $query5=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id5' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
      while ($row5=mysqli_fetch_array($query5)){
        $grade_id5=$row5['grade_id'];
        $grade5=$row5['grade'];
        $items5=$row5['items'];
        $percentage5=$row5['percent'];
        $dateadded5=$row5['dateadded'];
        $addedby5 = $row5["addedby"];

?>


                      <tr>
                        <td hidden><?php echo $grade_id5;?></td>
                        <td>Exam Grade: <?php echo $grade5."/".$items5."(".$percentage5."%)";?></td>
                        <td><?php echo $dateadded5 ;?></td>
                        
                        <td>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id5;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i>
                              </a>
                              
                              
                        </td>
                      </tr>

<?php
}


    $queryyy5=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id5' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
        $rowww5=mysqli_fetch_array($queryyy5);
        $average5=$rowww5['average'];
        $totalave5= ($average5 / 100) * $exam_percent;
        


?>

                      <tr>
                        
                        <td>Average Exam Grade: <?php echo $average5."% (Exam Grade: ".$totalave5."%)";?></td>
                        
                      </tr>

                    </tbody>
<?php
}


?>
                  </table>
                  </div>
                  </div>




                  <br>






                  <?php
    $query6=mysqli_query($conn,"select * from criterias where criteria_name='Recitation' AND subj_id='$subjid'")or die(mysqli_error($conn));
      while ($row6=mysqli_fetch_array($query6)){
        $criteria_id6=$row6['criteria_id'];
        $criteria_name6=$row6['criteria_name'];
        $recitation_percent=$row6['percentage'];

?>

  <div class="page-tables">

                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:65%">Recitation (<?php echo $recitation_percent."%";?>)</th>
                        <th style="width:25%">Recitation Date</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id6;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add New Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
    $query6=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id6' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
      while ($row6=mysqli_fetch_array($query6)){
        $grade_id6=$row6['grade_id'];
        $percentage6=$row6['percent'];
        $dateadded6=$row6['dateadded'];
        $addedby6 = $row6["addedby"];

?>


                      <tr>
                        <td hidden><?php echo $grade_id6;?></td>
                        <td>Recitation Grade: <?php echo $percentage6."%";?></td>
                        <td><?php echo $dateadded6 ;?></td>
                        
                        <td>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id6;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i>
                              </a>
                              
                              
                        </td>
                      </tr>

<?php
}


    $queryyy6=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id6' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
        $rowww6=mysqli_fetch_array($queryyy6);
        $average6=$rowww6['average'];
        $totalave6= ($average6 / 100) * $recitation_percent;
        


?>

                      <tr>
                        
                        <td>Average Recitation Grade: <?php echo $average6."% (Recitation Grade: ".$totalave6."%)";?></td>
                        
                      </tr>

                    </tbody>
<?php
}


?>
                  </table>
                  </div>
                  </div>



<br>






                  <?php
    $query7=mysqli_query($conn,"select * from criterias where criteria_name='Project' AND subj_id='$subjid'")or die(mysqli_error($conn));
      while ($row7=mysqli_fetch_array($query7)){
        $criteria_id7=$row7['criteria_id'];
        $criteria_name7=$row7['criteria_name'];
        $project_percent=$row7['percentage'];

?>

  <div class="page-tables">

                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:65%">Project (<?php echo $recitation_percent;?>%)</th>
                        <th style="width:25%">Project Date</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id7;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add New Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
    $query7=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id7' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
      while ($row7=mysqli_fetch_array($query7)){
        $grade_id7=$row7['grade_id'];
       
        $percentage7=$row7['percent'];
        $dateadded7=$row7['dateadded'];
        $addedby7 = $row7["addedby"];

?>


                      <tr>
                        <td hidden><?php echo $grade_id7;?></td>
                        <td>Project Grade: <?php echo $percentage7."%";?></td>
                        <td><?php echo $dateadded7 ;?></td>
                        
                        <td>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id7;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i>
                              </a>
                              
                              
                        </td>
                      </tr>

<?php
}


    $queryyy7=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id7' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
        $rowww7=mysqli_fetch_array($queryyy7);
        $average7=$rowww7['average'];
        $totalave7= ($average7 / 100) * $project_percent;
        


?>

                      <tr>
                        
                        <td>Average Project Grade: <?php echo $average7."% (Project Grade: ".$totalave7."%)";?></td>
                        
                      </tr>

                    </tbody>
<?php
}


?>
                  </table>
                  </div>
                  </div>

<br>






                  <?php
    $query8=mysqli_query($conn,"select * from criterias where criteria_name='Behavior' AND subj_id='$subjid'")or die(mysqli_error($conn));
      while ($row8=mysqli_fetch_array($query8)){
        $criteria_id8=$row8['criteria_id'];
        $criteria_name8=$row8['criteria_name'];
        $behavior_percent=$row8['percentage'];

?>

  <div class="page-tables">

                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:90%">Behavior (<?php echo $behavior_percent;?>%)</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id8;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add New Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
    $query8=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id8' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
      while ($row8=mysqli_fetch_array($query8)){
        $grade_id8=$row8['grade_id'];
        $percentage8=$row8['percent'];
        $dateadded8=$row8['dateadded'];
        $addedby8 = $row8["addedby"];

?>


                      <tr>
                        <td hidden><?php echo $grade_id8;?></td>
                        <td>Behavior Grade: <?php echo $percentage8."%";?></td>
                        
                        <td>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id8;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i>
                              </a>
                              
                              
                        </td>
                      </tr>

<?php
}


    $queryyy8=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id8' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
        $rowww8=mysqli_fetch_array($queryyy8);
        $average8=$rowww8['average'];
        $totalave8= ($average8 / 100) * $behavior_percent;
        


?>

                      <tr>
                        
                        <td>Average Behavior Grade: <?php echo $average8."% (Behavior Grade: ".$totalave8."%)";?></td>
                        
                      </tr>

                    </tbody>
<?php
}


?>
                  </table>
                  </div>
                  </div>

<br>






                  <?php
    $query9=mysqli_query($conn,"select * from criterias where criteria_name='Performance' AND subj_id='$subjid'")or die(mysqli_error($conn));
      while ($row9=mysqli_fetch_array($query9)){
        $criteria_id9=$row9['criteria_id'];
        $criteria_name9=$row9['criteria_name'];
        $performance_percent=$row9['percentage'];

?>

  <div class="page-tables">

                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        <th hidden>Grade ID</th>
                        <th style="width:90%">Performance (<?php echo $performance_percent;?>%)</th>
                        <th style="width:10%"><a href="addgrade.php?id=<?php echo $id;?>&cid=<?php echo $criteria_id9;?>&sub=<?php echo $subjid;?>" class="btn btn-success">
                                <i class="fa fa-plus"></i> Add New Record
                              </a></th>
                      </tr>
                    </thead>
                    <tbody>

                  <?php
    $query9=mysqli_query($conn,"select * from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id9' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
      while ($row9=mysqli_fetch_array($query9)){
        $grade_id9=$row9['grade_id'];
        $percentage9=$row9['percent'];
        $dateadded9=$row9['dateadded'];
        $addedby9 = $row9["addedby"];

?>


                      <tr>
                        <td hidden><?php echo $grade_id9;?></td>
                        <td>Performance Grade: <?php echo $percentage9."%";?></td>
                        
                        <td>
                              
                              <a href="deletegrade.php?id=<?php echo $id;?>&cid=<?php echo $grade_id9;?>&sub=<?php echo $subj_id;?>" class="btn btn-success">
                                <i class="fa fa-times"></i>
                              </a>
                              
                              
                        </td>
                      </tr>

<?php
}


    $queryyy9=mysqli_query($conn,"select AVG(grades.percent) AS average from grades LEFT JOIN criterias ON grades.criteria_id = criterias.criteria_id where grades.criteria_id='$criteria_id9' AND grades.student_id='$id' AND criterias.subj_id='$subjid' ORDER BY dateadded ASC")or die(mysqli_error($conn));
        $rowww9=mysqli_fetch_array($queryyy9);
        $average9=$rowww9['average'];
        $totalave9= ($average9 / 100) * $performance_percent;
        


?>

                      <tr>
                        
                        <td>Average Performance Grade: <?php echo $average9."% (Performance Grade: ".$totalave9."%)";?></td>
                        
                      </tr>

                    </tbody>
<?php
}


?>
                  </table>
                  </div>
                  </div>


<br>






                  <?php
    $query10=mysqli_query($conn,"select * from criterias where criteria_name='Attendance' AND subj_id='$subjid'")or die(mysqli_error($conn));
      while ($row10=mysqli_fetch_array($query10)){
        $criteria_id10=$row10['criteria_id'];
        $criteria_name10=$row10['criteria_name'];
        $attendance_percent=$row10['percentage'];

?>

  <div class="page-tables">

                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
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

                      <tr>
                        
                        <td>Average Attendance Grade: <?php echo $dayspresent." Days out of ".$alldays." (Attendance Grade: ".$totalave10."%)";?></td>
                        
                      </tr>

                    </tbody>
<?php
}


?>
                  </table>
                  </div>
                  </div>






<br>



<?php 

$subjgradetotal = $totalave + $totalave4 + $totalave5 + $totalave6 + $totalave7 + $totalave8 + $totalave9 + $totalave10;

?>

  <div class="page-tables">

                <div class="table-responsive">
                  <table cellpadding="8" cellspacing="2" border="1" id="data-table" width="100%">
                    <thead>
                      <tr>
                        
                        <th style="width:83%">Total Grade for <?php echo $subj_name;?> Subject</th>
                        <th style="width:17%"><?php echo $subjgradetotal;?>%</th>
                      </tr>
                    </thead>
                   

                  </table>
                  </div>
                  </div>




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
