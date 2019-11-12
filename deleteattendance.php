  <?php
  include('dbconnections.php');
  session_start();

    $aid=$_GET['aid'];
    $id=$_GET['id'];

    $log0=mysqli_query($conn,"SELECT * FROM attendance WHERE att_id='$aid'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $student_id=$rowlog['student_id'];
                        $date=$rowlog['date'];
                        $status=$rowlog['status'];

                    $log1=mysqli_query($conn,"SELECT * FROM students WHERE Student_id='$student_id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $fname=$rowlog1['fname'];
                        $lname=$rowlog1['lname'];

                    $desc = 'Deleted attendance '.$date."(".$status.") for student: ".$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

    $query=mysqli_query($conn,"DELETE from attendance where att_id='$aid'")or die(mysqli_error($conn));
        echo  '<script> alert("Attendance Record was deleted successfully!"); window.location.href = "attendance.php?id='.$id.'"; </script>';


?>                    
