<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $id=$_POST['id'];
                    $flt2 = $_POST["flt2"];
                    $flt2_noi = $_POST["flt2noi"];
                    $flt2p=($flt2/$flt2_noi)*100; 

                    if ($flt2p >= 75){ $flt2stat = "PASS"; }
                    else { $flt2stat = "FAIL"; }

                    $query=mysqli_query($conn,"UPDATE exams set flt2='$flt2', flt2_noi='$flt2_noi', flt2p='$flt2p', flt2stat='$flt2stat' where student_id='$id'")or die(mysqli_error($conn));

                        echo  '<script> alert("FLT 2 Record was saved successfully!"); window.location.href = "majorexams.php?id='.$id.'"; </script>';
                        }
                    
                    
                    ?>
