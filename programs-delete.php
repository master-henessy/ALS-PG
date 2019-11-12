  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];
    

    $log1=mysqli_query($conn,"SELECT * FROM programs WHERE program_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $pname=$rowlog1['pname'];
                      

                    $desc = 'Deleted '.$pname." program";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

        $query=mysqli_query($conn,"DELETE from programs where program_id='$id'")or die(mysqli_error($conn));
        echo  '<script> alert("Program was deleted successfully!"); window.location.href = "programs.php"; </script>';


?>                    
