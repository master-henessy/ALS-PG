<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $id=$_POST['id'];
                    $pis = $_POST["pis"];
                    $pis_noi = $_POST["pisnoi"];
                    $pisp=($pis/$pis_noi)*100; 

                    if ($pisp >= 75){ $pisstat = "PASS"; }
                    else { $pisstat = "FAIL"; }

                    $log0=mysqli_query($conn,"SELECT * FROM students WHERE Student_id='$id'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $fname=$rowlog['fname'];
                        $lname=$rowlog['lname'];

                    $desc = 'Changed PIS Grade for student: '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                    $query=mysqli_query($conn,"UPDATE exams set pis='$pis', pis_noi='$pis_noi', pisp='$pisp', pisstat='$pisstat' where student_id='$id'")or die(mysqli_error($conn));

                        echo  '<script> alert("PIS Record was saved successfully!"); window.location.href = "majorexams.php?id='.$id.'"; </script>';
                        }
                    
                    
                    ?>
