<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){


                     $id = $_POST["id"];
                    $fname = $_POST["fname"];
                    $mname = $_POST["mname"];
                    $lname = $_POST["lname"];
                    $fullname = $fname." ".$mname." ".$lname;
                    $address = $_POST["address"];
                    $bday = $_POST["bday"];
                    $gender = $_POST["gender"];
                    $cnumber = $_POST["cnumber"];
                    $email = $_POST["email"];
                    $educational = $_POST["educational"];
                    $lrn = $_POST["lrn"];
                    $req = $_POST["req"];

                    $desc = 'Updated information for student: '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();



                    $query=mysqli_query($conn, "UPDATE students SET fname = '$fname', mdname = '$mname',  lname = '$lname', fullname = '$fullname',address = '$address', bday = '$bday',  gender = '$gender',  contactno = '$cnumber', email = '$email', education = '$educational', lrn = '$lrn', req = '$req' WHERE Student_id = '$id'")or die(mysqli_error($conn));


                        echo  '<script> alert("Student Profile was changed successfully!"); window.location.href = "students.php"; </script>';
                        }

            
                    
                    ?>
