<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){

                    $room_no = $_POST["room_no"];
                    $rname = $_POST["rname"];
                    $capacity = $_POST["capacity"];


                    $query0 =$conn->prepare("SELECT * FROM rooms WHERE rname = '".$rname."'");
                    $query0->execute();
                    $res0 = $query0->get_result();

                    if($res0->num_rows>0){

                    echo  '<script> alert("Room Name already exists!"); window.location.href = "rooms.php"; </script>';


                    }

                    $query2 =$conn->prepare("SELECT * FROM rooms WHERE room_no = '".$room_no."'");
                    $query2->execute();
                    $res2 = $query2->get_result();

                    if($res2->num_rows>0){

                    echo  '<script> alert("Room Number already exists!"); window.location.href = "rooms.php"; </script>';


                    }

                    else{

                    $query=mysqli_query($conn,"INSERT INTO rooms (room_no, rname,  capacity) VALUES ('$room_no', '$rname',  '$capacity')")or die(mysqli_error($conn));

                    $desc = 'Added room: '.$room_no." (".$rname.")";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();
                        echo  '<script> alert("Room was added successfully!"); window.location.href = "rooms.php"; </script>';
                    }
                    }
                    
                    ?>
