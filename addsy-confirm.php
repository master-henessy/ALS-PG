<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $sy1 = $_POST["sy1"];
                    $sy2 = $_POST["sy2"];

                    $sy2 = $_POST["sy2"];

                        $query =$conn->prepare("SELECT * FROM schoolyears WHERE sy1 = '".$sy1."' AND sy2 = '".$sy2."' ");
                    $query->execute();
                    $res = $query->get_result();

                    if($res->num_rows>0){

                    echo  '<script> alert("School Year already exists!"); window.location.href = "addsy.php"; </script>';


                    }

                    else{

                    $query2=mysqli_query($conn,"INSERT INTO schoolyears (sy1, sy2, status) VALUES ('$sy1', '$sy2', '0')")or die(mysqli_error($conn));

                    $desc = 'Added school year: '.$sy1." - ".$sy2;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("School Year was added successfully!"); window.location.href = "schoolyear.php"; </script>';
                        }


                        }
                    
                    
                    ?>
