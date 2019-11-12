<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $title = $_POST["title"];
                    $content = $_POST["content"];
                    $query=mysqli_query($conn,"INSERT INTO help (title, content, status) VALUES ('$title', '$content', '1')")or die(mysqli_error($conn));

                    $desc = 'Added help guide: '.$title;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Help Guide was added successfully!"); window.location.href = "help.php"; </script>';
                        }
                    
                    
                    ?>
