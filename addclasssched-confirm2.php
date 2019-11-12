<?php
  include('dbconnections.php');
  session_start();

                if(isset($_POST['submit'])){
                    $room_id = $_POST["room_id"];
                    $sec_id = $_POST["sec_id"];
                    $program_id = $_POST["program_id"];
                    $sessiontime = $_POST["sessiontime"];

                    $query =$conn->prepare("SELECT * FROM classsched WHERE room_id = '$room_id' AND sessiontime = '$sessiontime'");
                    $query->execute();
                    $res = $query->get_result();

                    $query2 =$conn->prepare("SELECT * FROM classsched WHERE sec_id = '$sec_id'");
                    $query2->execute();
                    $res2 = $query2->get_result();

                    if($res->num_rows>0){

                    echo  '<script> alert("Room is already taken!"); window.location.href = "addclasssched.php"; </script>';

                    }

                    else if($res2->num_rows>0){

                    echo  '<script> alert("Section has a schedule already!"); window.location.href = "addclasssched.php"; </script>';

                    }

                    else{

                    $query3=mysqli_query($conn,"INSERT INTO classsched (program_id, sessiontime,  sec_id, room_id, status) VALUES ('$program_id', '$sessiontime',  '$sec_id', '$room_id', '1')")or die(mysqli_error($conn));

                    echo  '<script> alert("Schedule added successfully!"); window.location.href = "schedules.php"; </script>';

                  }
                }
