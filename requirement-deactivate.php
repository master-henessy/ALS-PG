  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];
    $stat=$_GET['stat'];


   if($stat=="1"){
    $query=mysqli_query($conn,"UPDATE requirements SET status = '0' WHERE req_id='$id'")or die(mysqli_error($conn));

    $log1=mysqli_query($conn,"SELECT * FROM requirements WHERE req_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $req_name=$rowlog1['req_name'];
                        $program_id=$rowlog1['program_id'];

                        $log0=mysqli_query($conn,"SELECT * FROM programs WHERE program_id ='$program_id'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $pname=$rowlog['pname'];

                    $desc = 'Deactivated requirement: '.$req_name." under ".$pname." program";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();


        echo  '<script> alert("Requirement was deactivated successfully!"); window.location.href = "requirements.php"; </script>';
    }
    else{
    $query=mysqli_query($conn,"UPDATE requirements SET status = '1' WHERE req_id='$id'")or die(mysqli_error($conn));

    $log1=mysqli_query($conn,"SELECT * FROM requirements WHERE req_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $req_name=$rowlog1['req_name'];
                        $program_id=$rowlog1['program_id'];

                        $log0=mysqli_query($conn,"SELECT * FROM programs WHERE program_id ='$program_id'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $pname=$rowlog['pname'];

                    $desc = 'Activated requirement: '.$req_name." under ".$pname." program";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

        echo  '<script> alert("Requirement was activated successfully!"); window.location.href = "requirements.php"; </script>';
    }


?>                    
