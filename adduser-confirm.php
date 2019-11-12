<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){

                    $username = $_POST["uname"];
                    $password = $_POST["pass"];
                    $ulevel = $_POST["ulevel"];
                    $enpass = sha1($password);

                    $query =$conn->prepare("SELECT * FROM user WHERE Username = '".$username."'");
                    $query->execute();
                    $res = $query->get_result();

                    if($res->num_rows>0){

                    echo  '<script> alert("Username already exists!"); window.location.href = "adduser.php"; </script>';


                    }

                    else{

                    $query=mysqli_query($conn,"INSERT INTO user (Username, Password,  User_type) VALUES ('$username', '$enpass',  '$ulevel')")or die(mysqli_error($conn));

                    $desc = 'Added new user: '.$username." as ".$ulevel;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("User Account was added successfully!"); window.location.href = "users.php"; </script>';
                        }

                      }
                    
                    
                    ?>
