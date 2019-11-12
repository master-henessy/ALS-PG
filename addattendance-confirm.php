<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $id = $_POST["id"];
                    $date = $_POST["date"];
                    $status = $_POST["status"];
                    $username = $_SESSION['Username'];
                   

                    $query =$conn->prepare("SELECT * FROM attendance WHERE student_id = '$id' AND date = '$date' AND status = '$status'");
                    $query->execute();
                    $res = $query->get_result();

                    if($res->num_rows>0){

                    echo  '<script> alert("Attendance was already recorded!"); window.location.href = "grades.php"; </script>';

                    }
                  

                    else{


                    $query2=mysqli_query($conn,"INSERT INTO attendance (student_id, date, status, addedby) VALUES ('$id', '$date', '$status', '$username')")or die(mysqli_error($conn));

                    $log0=mysqli_query($conn,"SELECT * FROM students WHERE Student_id ='$id'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $fname=$rowlog['fname'];
                        $lname=$rowlog['lname'];

                    $desc = 'Added Attendance for: '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Attendance was recorded successfully!"); window.location.href = "attendance.php?id='.$id.'"; </script>';
                        }
                    }
                    
                    
                    ?>
