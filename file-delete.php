  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];

     				$log1=mysqli_query($conn,"SELECT * FROM files WHERE file_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $filename=$rowlog1['filename'];

                    $desc = 'Deleted report file: '.$filename;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

    $query=mysqli_query($conn,"DELETE from files where file_id='$id'")or die(mysqli_error($conn));
        echo  '<script> alert("Document File was deleted successfully!"); window.location.href = "reports.php"; </script>';


?>                    
