<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $id=$_POST['id'];
                    $flt1 = $_POST["flt1"];
                    $flt1_noi = $_POST["flt1noi"];
                    $flt1p=($flt1/$flt1_noi)*100; 

                    if ($flt1p >= 75){ $flt1stat = "PASS"; }
                    else { $flt1stat = "FAIL"; }

                    $log0=mysqli_query($conn,"SELECT * FROM students WHERE Student_id='$id'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $fname=$rowlog['fname'];
                        $lname=$rowlog['lname'];

                    $desc = 'Changed FLT 1 Grade for student: '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                    $query=mysqli_query($conn,"UPDATE exams set flt1='$flt1', flt1_noi='$flt1_noi', flt1p='$flt1p', flt1stat='$flt1stat' where student_id='$id'")or die(mysqli_error($conn));

                        echo  '<script> alert("FLT 1 Record was saved successfully!"); window.location.href = "majorexams.php?id='.$id.'"; </script>';
                        }
                    
                    
                    ?>
