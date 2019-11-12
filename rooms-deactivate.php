  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];
    $stat=$_GET['stat'];


   if($stat=="1"){
    $query=mysqli_query($conn,"UPDATE rooms SET status = '0' WHERE room_id='$id'")or die(mysqli_error($conn));

    $log0=mysqli_query($conn,"SELECT * FROM rooms WHERE room_id='$id'")or die(mysqli_error($conn));
                        $rowlog0=mysqli_fetch_array($log0);
                        $room_no=$rowlog0['room_no'];
                        $rname=$rowlog0['rname'];

                    $desc = 'Deactivated room: '.$room_no." (".$rname.")";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

        echo  '<script> alert("Room was deactivated successfully!"); window.location.href = "rooms.php"; </script>';
    }
    else{
    $query=mysqli_query($conn,"UPDATE rooms SET status = '1' WHERE room_id='$id'")or die(mysqli_error($conn));

    $log1=mysqli_query($conn,"SELECT * FROM rooms WHERE room_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $room_no=$rowlog1['room_no'];
                        $rname=$rowlog1['rname'];

                     
                    $desc = 'Activated room: '.$room_no." (".$rname.")";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

        echo  '<script> alert("Room was activated successfully!"); window.location.href = "rooms.php"; </script>';
    }


?>                    
