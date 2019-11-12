  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];

    $log1=mysqli_query($conn,"SELECT * FROM subjects WHERE subj_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $subj_name=$rowlog1['subj_name'];
                        $program_id=$rowlog1['program_id'];

                        $log0=mysqli_query($conn,"SELECT * FROM programs WHERE program_id ='$program_id'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $pname=$rowlog['pname'];

                     
                    $desc = 'Deleted '.$subj_name." subject under ".$pname." program";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

    $query=mysqli_query($conn,"DELETE from subjects where subj_id='$id'")or die(mysqli_error($conn));
        echo  '<script> alert("Subject was deleted successfully!"); window.location.href = "subjects.php"; </script>';


?>                    
