<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $id=$_GET['edit'];
                    $name = $_POST["name"];
                    $policy = $_POST["policy"];
                    $address = $_POST["address"];
                    $email = $_POST["email"];
                    $contactno = $_POST["contactno"];
                    $query=mysqli_query($conn,"UPDATE center set center_name='$name', center_policy='$policy', center_address='$address', center_email='$email', center_contactno='$contactno' where center_id='$id'")or die(mysqli_error($conn));

                    $desc = 'Updated Center Details';
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Center Details was saved successfully!"); window.location.href = "center.php"; </script>';
                        }
                    
                    
                    ?>