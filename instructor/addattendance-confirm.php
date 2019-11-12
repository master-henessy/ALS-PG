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

                        echo  '<script> alert("Attendance was recorded successfully!"); window.location.href = "attendance.php?id='.$id.'"; </script>';
                        }
                    }
                    
                    
                    ?>
