  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];
    $stat=$_GET['stat'];


   if($stat=="1"){
    $query=mysqli_query($conn,"UPDATE programs SET status = '0' WHERE program_id='$id'")or die(mysqli_error($conn));

     $log1=mysqli_query($conn,"SELECT * FROM programs WHERE program_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $pname=$rowlog1['pname'];

                    $desc = 'Deactivated '.$pname." program";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

        echo  '<script> alert("Program was deactivated successfully!"); window.location.href = "programs.php"; </script>';
    }
    else{
    $query=mysqli_query($conn,"UPDATE programs SET status = '1' WHERE program_id='$id'")or die(mysqli_error($conn));

    $log1=mysqli_query($conn,"SELECT * FROM programs WHERE program_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $pname=$rowlog1['pname'];

                    $desc = 'Activated '.$pname." program";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

        echo  '<script> alert("Program was activated successfully!"); window.location.href = "programs.php"; </script>';
    }


?>                    
