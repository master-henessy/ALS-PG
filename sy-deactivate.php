  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];
    $stat=$_GET['stat'];


   if($stat=="1"){
    $query0=mysqli_query($conn,"SELECT * FROM schoolyears WHERE status='1'")or die(mysqli_error($conn));
    $count = mysqli_num_rows($query0);

        if ($count = 1) 
        {
          echo  '<script> alert("One School Year must be active!"); window.location.href = "schoolyear.php"; </script>';
        }
      else{

          $query=mysqli_query($conn,"UPDATE schoolyears SET status = '0' WHERE sy_id='$id'")or die(mysqli_error($conn));

          $log1=mysqli_query($conn,"SELECT * FROM schoolyears WHERE sy_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $sy1=$rowlog1['sy1'];
                        $sy2=$rowlog1['sy2'];

                    $desc = 'Deactivated school year '.$sy1." - ".$sy2;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

          echo  '<script> alert("School Year was deactivated successfully!"); window.location.href = "schoolyear.php"; </script>';
        }
      }
    else{
    $query0=mysqli_query($conn,"UPDATE schoolyears SET status = '0' WHERE status='1'")or die(mysqli_error($conn));
    $query=mysqli_query($conn,"UPDATE schoolyears SET status = '1' WHERE sy_id='$id'")or die(mysqli_error($conn));
    $query2=mysqli_query($conn,"SELECT * FROM schoolyears WHERE status = '1'")or die(mysqli_error($conn));
                      while ($row2=mysqli_fetch_array($query2)){
                        $sy1=$row2['sy1'];
                        $sy2=$row2['sy2'];
                        $sy = $sy1." - ".$sy2;
                        $_SESSION['sy'] = $sy;
                    }

                    $log1=mysqli_query($conn,"SELECT * FROM schoolyears WHERE sy_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $sy1=$rowlog1['sy1'];
                        $sy2=$rowlog1['sy2'];

                    $desc = 'Activated school year '.$sy1." - ".$sy2;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

        echo  '<script> alert("School Year was activated successfully!"); window.location.href = "schoolyear.php"; </script>';
    }


?>                    
