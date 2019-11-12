<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $id=$_POST['id'];
                    $ae = $_POST["ae"];
                    $ae_noi = $_POST["aenoi"];
                    $aep=($ae/$ae_noi)*100; 

                    if ($aep >= 75){ $aestat = "PASS"; }
                    else { $aestat = "FAIL"; }

                    $query=mysqli_query($conn,"UPDATE exams set ae='$ae', ae_noi='$ae_noi', aep='$aep', aestat='$aestat' where student_id='$id'")or die(mysqli_error($conn));

                        echo  '<script> alert("A&E Record was saved successfully!"); window.location.href = "majorexams.php?id='.$id.'"; </script>';
                        }
                    
                    
                    ?>
