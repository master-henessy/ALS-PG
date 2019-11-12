<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $id=$_GET['edit'];
                    $title = $_POST["title"];
                    $content = $_POST["content"];
                    $query=mysqli_query($conn,"UPDATE help set title='$title', content='$content' where Help_id='$id'")or die(mysqli_error($conn));

                    $desc = 'Updated help guide: '.$title;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Help Guide was saved successfully!"); window.location.href = "help.php"; </script>';
                        }
                    
                    
                    ?>
