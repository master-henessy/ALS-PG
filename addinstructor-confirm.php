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

                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $referral = $_POST['referral'];
                    $enpass = sha1($password);


                    $query =$conn->prepare("SELECT * FROM user WHERE Username = '".$username."'");
                    $query->execute();
                    $res = $query->get_result();

                    if($res->num_rows>0){

                    echo  '<script> alert("Username already exists!"); window.location.href = "adduser.php"; </script>';


                    }

                    else{

                    $query=mysqli_query($conn,"INSERT INTO instructors (fname, mdname,  lname, address, bday,  gender,  contactno, email, referral) VALUES ('$fname', '$mname',  '$lname', '$address', '$bday',  '$gender',  '$cnumber', '$email', '$referral')")or die(mysqli_error($conn));

                    $query2=mysqli_query($conn,"INSERT INTO user (Username, Password,  User_type, referral) VALUES ('$username', '$enpass', 'user', '$referral')")or die(mysqli_error($conn));

                    $desc = 'Added Instructor: '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("User Account was added successfully!"); window.location.href = "users.php"; </script>';
                        }

                      }






                    

                    
                    ?>
