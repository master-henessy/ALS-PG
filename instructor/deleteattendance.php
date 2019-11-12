  <?php
  include('dbconnections.php');
  session_start();

    $aid=$_GET['aid'];
    $id=$_GET['id'];
    $query=mysqli_query($conn,"DELETE from attendance where att_id='$aid'")or die(mysqli_error($conn));
        echo  '<script> alert("Attendance Record was deleted successfully!"); window.location.href = "attendance.php?id='.$id.'"; </script>';


?>                    
