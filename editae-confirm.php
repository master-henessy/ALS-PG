<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $id=$_POST['id'];
                    $ae = $_POST["ae"];
                    $ae_noi = $_POST["aenoi"];
                    $aep=($ae/$ae_noi)*100; 

                    if ($aep >= 75){ $aestat = "PASS"; }
                    else { $aestat = "FAIL"; }

                    $query=mysqli_query($conn,"UPDATE exams set ae='$ae', ae_noi='$ae_noi', aep='$aep', aestat='$aestat' where student_id='$id'")or die(mysqli_error($conn));

                  $log0=mysqli_query($conn,"SELECT * FROM students WHERE Student_id='$id'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $fname=$rowlog['fname'];
                        $lname=$rowlog['lname'];

                    $desc = 'Changed A&E Grade for student: '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("A&E Record was saved successfully!"); window.location.href = "majorexams.php?id='.$id.'"; </script>';
                        }
                    
                    
                    ?>
