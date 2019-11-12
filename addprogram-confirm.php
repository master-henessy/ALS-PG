<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $pname = $_POST["pname"];
                    $info = $_POST["info"];

                    $query =$conn->prepare("SELECT * FROM programs WHERE pname = '".$pname."'");
                    $query->execute();
                    $res = $query->get_result();

                     if($res->num_rows>0){

                    echo  '<script> alert("Program already exists!"); window.location.href = "addprogram.php"; </script>';


                    }

                    else{

                    $query=mysqli_query($conn,"INSERT INTO programs (pname, info, status) VALUES ('$pname', '$info', '1')")or die(mysqli_error($conn));

                    $desc = 'Added program: '.$pname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Program was added successfully!"); window.location.href = "programs.php"; </script>';
                        }
                    }
                    
                    
                    ?>
