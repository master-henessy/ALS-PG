  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];
    $stat=$_GET['stat'];


   if($stat=="1"){
    $query=mysqli_query($conn,"UPDATE reminders SET status = '0' WHERE reminder_id='$id'")or die(mysqli_error($conn));

                    $log1=mysqli_query($conn,"SELECT * FROM reminders WHERE reminder_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $remname=$rowlog1['remname'];

                    $desc = 'Deactivated reminder: '.$remname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

        echo  '<script> alert("Reminder was deactivated successfully!"); window.location.href = "reminders.php"; </script>';
    }
    else{
    $query=mysqli_query($conn,"UPDATE reminders SET status = '1' WHERE reminder_id='$id'")or die(mysqli_error($conn));
                    
                    $log1=mysqli_query($conn,"SELECT * FROM reminders WHERE reminder_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $remname=$rowlog1['remname'];

                    $desc = 'Activated reminder: '.$remname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

        echo  '<script> alert("Reminder was activated successfully!"); window.location.href = "reminders.php"; </script>';
    }


?>                    
