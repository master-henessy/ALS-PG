<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $title = $_POST["title"];
                    $userid = $_SESSION["Username"];
                    $query=mysqli_query($conn,"INSERT INTO help (title, status, uploadby) VALUES ('$title', '3', '$userid')")or die(mysqli_error($conn));

                    $desc = 'Added help request: '.$title;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Help Request was sent successfully!"); window.location.href = "u-help.php"; </script>';
                        }
                    
                    
                    ?>
