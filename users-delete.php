  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];

    $log1=mysqli_query($conn,"SELECT * FROM user WHERE User_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $aUsername=$rowlog1['Username'];
                        $User_type=$rowlog1['User_type'];
                     
                    $desc = 'Deleted user: '.$aUsername." (".$User_type.")";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

    $query=mysqli_query($conn,"DELETE from user where user_id='$id'")or die(mysqli_error($conn));
        echo  '<script> alert("User Account was deleted successfully!"); window.location.href = "users.php"; </script>';


?>                    
