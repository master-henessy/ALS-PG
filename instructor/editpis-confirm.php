<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $id=$_POST['id'];
                    $pis = $_POST["pis"];
                    $pis_noi = $_POST["pisnoi"];
                    $pisp=($pis/$pis_noi)*100; 

                    if ($pisp >= 75){ $pisstat = "PASS"; }
                    else { $pisstat = "FAIL"; }

                    $query=mysqli_query($conn,"UPDATE exams set pis='$pis', pis_noi='$pis_noi', pisp='$pisp', pisstat='$pisstat' where student_id='$id'")or die(mysqli_error($conn));

                        echo  '<script> alert("PIS Record was saved successfully!"); window.location.href = "majorexams.php?id='.$id.'"; </script>';
                        }
                    
                    
                    ?>
