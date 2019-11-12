<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $id=$_POST['id'];
                    $flt1 = $_POST["flt1"];
                    $flt1_noi = $_POST["flt1noi"];
                    $flt1p=($flt1/$flt1_noi)*100; 

                    if ($flt1p >= 75){ $flt1stat = "PASS"; }
                    else { $flt1stat = "FAIL"; }

                    $query=mysqli_query($conn,"UPDATE exams set flt1='$flt1', flt1_noi='$flt1_noi', flt1p='$flt1p', flt1stat='$flt1stat' where student_id='$id'")or die(mysqli_error($conn));

                        echo  '<script> alert("FLT 1 Record was saved successfully!"); window.location.href = "majorexams.php?id='.$id.'"; </script>';
                        }
                    
                    
                    ?>
