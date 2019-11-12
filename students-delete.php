  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];
    

    $log0=mysqli_query($conn,"SELECT * FROM students WHERE Student_id ='$id'")or die(mysqli_error($conn));
      $rowlog=mysqli_fetch_array($log0);
      $fname=$rowlog['fname'];
      $lname=$rowlog['lname'];

    $desc = 'Deleted Student: '.$fname." ".$lname;
	$username = $_SESSION['Username'];
	$log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");

	$query=mysqli_query($conn,"DELETE from students where Student_id='$id'")or die(mysqli_error($conn));
	$log->execute();

        echo  '<script> alert("Student Profile was deleted successfully!"); window.location.href = "students.php"; </script>';


?>                    
