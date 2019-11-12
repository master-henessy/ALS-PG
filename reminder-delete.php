  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];
    

    $log1=mysqli_query($conn,"SELECT * FROM reminders WHERE reminder_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $remname=$rowlog1['remname'];
                      

                    $desc = 'Deleted reminder: '.$remname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

      $query=mysqli_query($conn,"DELETE from reminders where reminder_id='$id'")or die(mysqli_error($conn));

        echo  '<script> alert("Reminder was deleted successfully!"); window.location.href = "reminders.php"; </script>';


?>                    
