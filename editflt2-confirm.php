<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $id=$_POST['id'];
                    $flt2 = $_POST["flt2"];
                    $flt2_noi = $_POST["flt2noi"];
                    $flt2p=($flt2/$flt2_noi)*100; 

                    if ($flt2p >= 75){ $flt2stat = "PASS"; }
                    else { $flt2stat = "FAIL"; }

                    $log0=mysqli_query($conn,"SELECT * FROM students WHERE Student_id='$id'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $fname=$rowlog['fname'];
                        $lname=$rowlog['lname'];

                    $desc = 'Changed FLT 2 Grade for student: '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                    $query=mysqli_query($conn,"UPDATE exams set flt2='$flt2', flt2_noi='$flt2_noi', flt2p='$flt2p', flt2stat='$flt2stat' where student_id='$id'")or die(mysqli_error($conn));

                        echo  '<script> alert("FLT 2 Record was saved successfully!"); window.location.href = "majorexams.php?id='.$id.'"; </script>';
                        }
                    
                    
                    ?>
