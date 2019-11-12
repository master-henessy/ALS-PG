<?php
  include('dbconnections.php');
  session_start();

?>

          <?php
                if(isset($_POST['submit'])){

                    $sid = $_POST["sid"];
                    $sec_id = $_POST["sec_id"];
                    $sy = $_POST["sy"];


                    $query2=mysqli_query($conn,"UPDATE students SET sec_id='$sec_id', sy='$sy' where Student_id ='$sid' ")or die(mysqli_error($conn));

                    $log0=mysqli_query($conn,"SELECT * FROM students WHERE Student_id ='$sid'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $fname=$rowlog['fname'];
                        $lname=$rowlog['lname'];

                    $desc = 'Added return student: '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Return Student Profile was added successfully!"); window.location.href = "students.php"; </script>';
                        
                    }

                     





                    
                    
                    
                    ?>
