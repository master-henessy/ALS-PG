  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];
    $stat=$_GET['stat'];


   if($stat=="0"){
    $query=mysqli_query($conn,"UPDATE user SET account_status = '1' WHERE User_id='$id'")or die(mysqli_error($conn));

    $log1=mysqli_query($conn,"SELECT * FROM user WHERE User_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $aUsername=$rowlog1['Username'];
                        $User_type=$rowlog1['User_type'];
                     
                    $desc = 'Deactivated user: '.$aUsername." (".$User_type.")";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

        echo  '<script> alert("User Account was deactivated successfully!"); window.location.href = "users.php"; </script>';
    }
    else{
    $query=mysqli_query($conn,"UPDATE user SET account_status = '0' WHERE User_id='$id'")or die(mysqli_error($conn));

    $log1=mysqli_query($conn,"SELECT * FROM user WHERE User_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $aUsername=$rowlog1['Username'];
                        $User_type=$rowlog1['User_type'];
                     
                    $desc = 'Activated user: '.$aUsername." (".$User_type.")";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

        echo  '<script> alert("User Account was activated successfully!"); window.location.href = "users.php"; </script>';
    }


?>                    
