  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];

     $log1=mysqli_query($conn,"SELECT * FROM instructors WHERE Instructor_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $fname=$rowlog1['fname'];
                        $lname=$rowlog1['lname'];

                    $desc = 'Deleted instructor: '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

    $query=mysqli_query($conn,"DELETE from instructors where Instructor_id='$id'")or die(mysqli_error($conn));
        echo  '<script> alert("Instructor Profile was deleted successfully!"); window.location.href = "instructors.php"; </script>';


?>                    
