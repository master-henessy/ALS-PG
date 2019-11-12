<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $title = $_POST["title"];
                    $userid = $_SESSION["Username"];
                    $query=mysqli_query($conn,"INSERT INTO help (title, status, uploadby) VALUES ('$title', '3', '$userid')")or die(mysqli_error($conn));

                        echo  '<script> alert("Help Request was sent successfully!"); window.location.href = "help.php"; </script>';
                        }
                    
                    
                    ?>
