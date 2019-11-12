  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];
    $stat=$_GET['stat'];


   if($stat=="1"){
    $query=mysqli_query($conn,"UPDATE files SET status = '0' WHERE file_id='$id'")or die(mysqli_error($conn));

                    $log1=mysqli_query($conn,"SELECT * FROM files WHERE file_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $filename=$rowlog1['filename'];

                    $desc = 'Deactivated report file: '.$filename;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

        echo  '<script> alert("Document was deactivated successfully!"); window.location.href = "reports.php"; </script>';
    }
    else{
    $query=mysqli_query($conn,"UPDATE files SET status = '1' WHERE file_id='$id'")or die(mysqli_error($conn));

                    $log1=mysqli_query($conn,"SELECT * FROM files WHERE file_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $filename=$rowlog1['filename'];

                    $desc = 'Activated report file: '.$filename;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();
        echo  '<script> alert("Document was activated successfully!"); window.location.href = "reports.php"; </script>';
    }


?>                    
