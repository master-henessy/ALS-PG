<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $rname = $_POST["rname"];
                    $content = $_POST["content"];
                    $query=mysqli_query($conn,"INSERT INTO reminders (remname, content, status) VALUES ('$rname', '$content', '1')")or die(mysqli_error($conn));

                    $desc = 'Added reminder: '.$rname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Reminder was added successfully!"); window.location.href = "reminders.php"; </script>';
                        }
                    
                    
                    ?>
