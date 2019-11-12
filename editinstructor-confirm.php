<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $fname = $_POST["fname"];
                    $mname = $_POST["mname"];
                    $lname = $_POST["lname"];
                    $address = $_POST["address"];
                    $bday = $_POST["bday"];
                    $gender = $_POST["gender"];
                    $cnumber = $_POST["cnumber"];
                    $email = $_POST["email"];
                    $program = $_POST["program"];
                    $req1 = $_POST["req1"];
                    $req2 = $_POST["req2"];
                    $req3 = $_POST["req3"];
                    $req4 = $_POST["req4"];

                    $desc = 'Updated information for instructor: '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                    $query=mysqli_query($conn, "UPDATE instructors SET fname = '$fname', mdname = '$mname',  lname = '$lname', address = '$address', bday = '$bday',  gender = '$gender',  contactno = '$cnumber', email = '$email', program = '$program' WHERE Instructor_id = '$id'")or die(mysqli_error($conn));


                        echo  '<script> alert("Instructor Profile was changed successfully!"); window.location.href = "instructors.php"; </script>';
                        }
                    
                    
                    ?>
