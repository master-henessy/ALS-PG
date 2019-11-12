<?php include('hconnect.php'); ?>

          <?php
                if(isset($_POST['submit'])){
                    $room = $_POST["room"];
                    $schedid = $_POST["schedid"];

                     $query=mysqli_query($conn,"UPDATE classsched SET room_no='$room' WHERE classsched_no='$schedid'")or die(mysqli_error($conn));

                      echo  '<script> alert("Schedule was added successfully!"); window.location.href = "schedules.php"; </script>';

                        }
                    
                    
                    ?>
