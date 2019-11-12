  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];

    $log1=mysqli_query($conn,"SELECT * FROM rooms WHERE room_id='$id'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $room_no=$rowlog1['room_no'];
                        $rname=$rowlog1['rname'];

                    $desc = 'Deleted room: '.$room_no." (".$rname.")";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

    $query=mysqli_query($conn,"DELETE from rooms where room_id='$id'")or die(mysqli_error($conn));
        echo  '<script> alert("Room was deleted successfully!"); window.location.href = "rooms.php"; </script>';


?>                    
