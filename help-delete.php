  <?php
  include('dbconnections.php');
  session_start();

    $view=$_GET['help'];

     				$log1=mysqli_query($conn,"SELECT * FROM help WHERE Help_id='$view'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $title=$rowlog1['title'];

                    $desc = 'Deleted help guide: '.$title;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

    $query=mysqli_query($conn,"DELETE from help where Help_id='$view'")or die(mysqli_error($conn));
        echo  '<script> alert("Help Guide was deleted successfully!"); window.location.href = "help.php"; </script>';


?>                    
