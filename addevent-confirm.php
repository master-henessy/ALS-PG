<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $eventname = $_POST["eventname"];
                    $eventdate = $_POST["eventdate"];
                    $eventstime = $_POST["eventstime"];
                    $eventetime = $_POST["eventetime"];
                    $info = $_POST["info"];
                    $room = $_POST["room"];
                    $query=mysqli_query($conn,"INSERT INTO events (name, date, stime, etime, info, room_id, status) VALUES ('$eventname', '$eventdate', '$eventstime', '$eventetime', '$info', '$room', '1')")or die(mysqli_error($conn));

                    $desc = 'Added an event: '.$eventname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Event was added successfully!"); window.location.href = "events.php"; </script>';
                        }
                    
                    
                    ?>
