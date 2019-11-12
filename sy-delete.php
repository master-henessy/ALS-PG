  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];

    $log1=mysqli_query($conn,"SELECT * FROM schoolyears WHERE sy_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $sy1=$rowlog1['sy1'];
                        $sy2=$rowlog1['sy2'];

                    $desc = 'Deleted school year '.$sy1." - ".$sy2;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

    $query=mysqli_query($conn,"DELETE from schoolyears where sy_id='$id'")or die(mysqli_error($conn));
        echo  '<script> alert("School Year was deleted successfully!"); window.location.href = "schoolyear.php"; </script>';


?>                    
