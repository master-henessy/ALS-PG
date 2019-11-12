<?php
  include('dbconnections.php');
  session_start();
  $username = $_SESSION['Username'];
?>

          <?php
                if(isset($_POST['submit'])){
                    $pid = $_POST["pid"];
                    $sname = $_POST["sname"];

                    $quiz = $_POST["quiz"];
                    $exam = $_POST["exam"];
                    $assignment = $_POST["assignment"];
                    $behavior = $_POST["behavior"];
                    $recitation = $_POST["recitation"];
                    $project = $_POST["project"];
                    $attendance = $_POST["attendance"];
                    $performance = $_POST["performance"];

                    $total = $quiz + $exam + $assignment + $behavior + $recitation + $project + $attendance + $performance;

                    $query =$conn->prepare("SELECT * FROM subjects WHERE program_id = '$pid' AND subj_name = '$sname'");
                    $query->execute();
                    $res = $query->get_result();

                    if($res->num_rows>0){

                    echo  '<script> alert("Subject already exists!"); window.location.href = "addsubject.php"; </script>';

                    }

                    if($total>100){

                    echo  '<script> alert("Total Percentage is '.$total.'%, which exceeds 100%!"); window.location.href = "addsubject.php"; </script>';

                    }

                    if($total<100){

                    echo  '<script> alert("Total Percentage is '.$total.'%, which is less than 100% !"); window.location.href = "addsubject.php"; </script>';

                    }

                    else{

                    $query2=mysqli_query($conn,"INSERT INTO subjects (program_id, subj_name, status) VALUES ('$pid', '$sname', '1')")or die(mysqli_error($conn));

                    $query3=mysqli_query($conn,"SELECT * FROM subjects ORDER BY subj_id DESC LIMIT 1")or die(mysqli_error($conn));
                    $row3=mysqli_fetch_array($query3);
                    $subj_id=$row3['subj_id'];  

                    $query4=mysqli_query($conn,"INSERT INTO criterias (subj_id, criteria_name, percentage, status, addedby) VALUES ('$subj_id', 'Quiz', '$quiz', '1', '$username'), ('$subj_id', 'Exam', '$exam', '1', '$username'), ('$subj_id', 'Assignment', '$assignment', '1', '$username'), ('$subj_id', 'Behavior', '$behavior', '1', '$username'), ('$subj_id', 'Recitation', '$recitation', '1', '$username'), ('$subj_id', 'Project', '$project', '1', '$username'), ('$subj_id', 'Attendance', '$attendance', '1', '$username'), ('$subj_id', 'Performance', '$performance', '1', '$username')")or die(mysqli_error($conn));

                     $log0=mysqli_query($conn,"SELECT * FROM programs WHERE program_id ='$pid'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $pname=$rowlog['pname'];

                    $desc = 'Added subject: '.$sname." for ".$pname." program";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();


                        echo  '<script> alert("Subject was added successfully!"); window.location.href = "subjects.php"; </script>';
                        }
                  }

                    
                    
                    
                    ?>






