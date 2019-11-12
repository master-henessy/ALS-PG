<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $criteria_id = $_POST["criteria_id"];
                    $student_id = $_POST["student_id"];
                    $cname = $_POST["cname"];
                    $sub = $_POST["sub"];

                    if($cname == 'Quiz' || $cname == 'Assignment' || $cname == 'Exam'){
                    $grade = $_POST["grade"];
                    $items = $_POST["items"];
                    $percentage = ($grade / $items) * 100;
                    $query=mysqli_query($conn,"INSERT INTO grades (criteria_id, student_id, grade, items, percent) VALUES ('$criteria_id', '$student_id', '$grade', '$items', '$percentage')")or die(mysqli_error($conn));

                    $log0=mysqli_query($conn,"SELECT * FROM students WHERE Student_id ='$student_id'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $fname=$rowlog['fname'];
                        $lname=$rowlog['lname'];

                    $log1=mysqli_query($conn,"SELECT * FROM subjects WHERE subj_id ='$sub'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $subj_name=$rowlog1['subj_name'];
                        

                    $desc = 'Added '.$cname.' grade in '.$subj_name.' subject for : '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Grade was added successfully!"); window.location.href = "viewgrades.php?id='.$student_id.'&sub='.$sub.'"; </script>';
                      }

                    else if($cname == 'Recitation' || $cname == 'Project' || $cname == 'Behavior' || $cname == 'Performance'){
                    $percentage = $_POST["percentage"];
                    $query=mysqli_query($conn,"INSERT INTO grades (criteria_id, student_id, grade, items, percent) VALUES ('$criteria_id', '$student_id', ' ', ' ', '$percentage')")or die(mysqli_error($conn));

                    $log0=mysqli_query($conn,"SELECT * FROM students WHERE Student_id ='$student_id'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $fname=$rowlog['fname'];
                        $lname=$rowlog['lname'];

                    $log1=mysqli_query($conn,"SELECT * FROM subjects WHERE subj_id ='$sub'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $subj_name=$rowlog1['subj_name'];
                        

                    $desc = 'Added '.$cname.' grade in '.$subj_name.' subject for : '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Grade was added successfully!"); window.location.href = "viewgrades.php?id='.$student_id.'&sub='.$sub.'"; </script>';
                      }



                        }
                    
                    
                    ?>
