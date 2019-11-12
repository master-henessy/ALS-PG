<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){

                    $query2=mysqli_query($conn,"SELECT * FROM schoolyears WHERE status = '1'")or die(mysqli_error($conn));
                      while ($row2=mysqli_fetch_array($query2)){
                        $sy1=$row2['sy1'];
                        $sy2=$row2['sy2'];
                        $sy = $sy1." - ".$sy2;
                    }

                    $username = mysqli_escape_string($conn, $_POST['username']);
                    $password1 = mysqli_escape_string($conn, $_POST['password']);
                    $password = hash('sha1', $password1);
                    $query =$conn->prepare("SELECT * FROM user WHERE Username = '".$username."' AND Password = '".$password."'");
                    $query->execute();
                    $res = $query->get_result();

                    if($res->num_rows>0){
                        $row=$res->fetch_array();
                        $uid = $row['User_id'];
                        $usertype = $row['User_type'];
                        $status = $row['account_status'];
                        $referral = $row['referral'];

                        if($status == '1'){
                            $_SESSION['error_login'] = "User Account is Deactivated.";
                            header('Location: login.php');
                        }
                        else{

                            if($usertype == 'Admin'){
                           
                        header('Location: home.php');
                        $queryins =$conn->prepare("UPDATE user SET lastlog = NOW() WHERE Username = '".$username."' AND Password = '".$password."'");
                        $queryins->execute();

                        $desc = 'Logged in into the system';

                        $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                        $log->execute();


                        $_SESSION['userID'] = $row['User_id'];
                        $_SESSION['Username'] = $username;
                        $_SESSION['usertype'] = $usertype;
                        $_SESSION['sy'] = $sy;
                    }

                        else if($usertype == 'User'){
                           
                        header('Location: instructor/home.php');
                        $_SESSION['userID'] = $row['User_id'];
                        $_SESSION['Username'] = $username;
                        $_SESSION['usertype'] = $usertype;
                        $_SESSION['referral'] = $referral;
                        $_SESSION['sy'] = $sy;


                    }
                        }




                    }
                    else{
                     $_SESSION['error_login'] = "Username or Password is incorrect, try again.";
                     header('Location: login.php');
                    }
                    }
                    ?>