  <?php
  include('dbconnections.php');
  session_start();

    $id=$_GET['id'];

    $log0=mysqli_query($conn,"SELECT * FROM events WHERE event_id='$id'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $name=$rowlog['name'];
                        $date=$rowlog['date'];

    $desc = 'Deleted event: '.$name." (".$date.")";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

    $query=mysqli_query($conn,"DELETE from events where event_id='$id'")or die(mysqli_error($conn));
        echo  '<script> alert("Event was deleted successfully!"); window.location.href = "events.php"; </script>';


?>                    
