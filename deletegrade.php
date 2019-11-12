  <?php
  include('dbconnections.php');
  session_start();

    $grade_id=$_GET['cid'];
    $id=$_GET['id'];
    $sub=$_GET['sub'];

    				$log10=mysqli_query($conn,"SELECT * FROM grades WHERE grade_id='$grade_id'")or die(mysqli_error($conn));
                        $rowlog10=mysqli_fetch_array($log10);
                        $dateadded=$rowlog10['dateadded'];
                        $criteria_id=$rowlog10['criteria_id'];

                    $log0=mysqli_query($conn,"SELECT * FROM criterias WHERE criteria_id='$criteria_id'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $criteria_name=$rowlog['criteria_name'];

                    $log1=mysqli_query($conn,"SELECT * FROM students WHERE Student_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $fname=$rowlog1['fname'];
                        $lname=$rowlog1['lname'];

                    $log2=mysqli_query($conn,"SELECT * FROM subjects WHERE subj_id='$sub'")or die(mysqli_error($conn));
                        $rowlog2=mysqli_fetch_array($log2);
                        $subj_name=$rowlog2['subj_name'];
                        $program_id=$rowlog2['program_id'];

                    $log3=mysqli_query($conn,"SELECT * FROM programs WHERE program_id='$program_id'")or die(mysqli_error($conn));
                        $rowlog3=mysqli_fetch_array($log3);
                        $pname=$rowlog3['pname'];



                    $desc = 'Deleted '.$criteria_name."(".$dateadded.") grade in ".$subj_name." subject under ".$pname." program for student: ".$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

    $query=mysqli_query($conn,"DELETE from grades where grade_id='$grade_id'")or die(mysqli_error($conn));
        echo  '<script> alert("Grade Record was deleted successfully!"); window.location.href = "viewgrades.php?id='.$id.'&sub='.$sub.'"; </script>';


?>                    
