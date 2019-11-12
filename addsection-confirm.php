<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $pid = $_POST["pid"];
                    $snum = $_POST["snum"];
                    $scap = $_POST["scap"];
                    $sy = $_POST["sy"];
                    $refno = $_POST["refno"];

                    $query =$conn->prepare("SELECT * FROM sections WHERE sec_no = '$snum' AND sy = '$sy' AND program_id = '$pid'");
                    $query->execute();
                    $res = $query->get_result();

                    $query2 =$conn->prepare("SELECT * FROM instructors WHERE referral = '$refno'");
                    $query2->execute();
                    $res2 = $query2->get_result();

                    $query3 =$conn->prepare("SELECT * FROM sections WHERE refno = '$refno'");
                    $query3->execute();
                    $res3 = $query3->get_result();

                    if($res->num_rows>0){
                    
                    echo  '<script> alert("Section already exists!"); window.location.href = "addsection.php"; </script>';

                    }

                    if($res2->num_rows==0){

                    echo  '<script> alert("Incorrect Instructor Code!"); window.location.href = "addsection.php"; </script>';

                    }

                    if($res3->num_rows>0){

                    echo  '<script> alert("Instructor has an advisory already!"); window.location.href = "addsection.php"; </script>';

                    }
                  
                    

                    else{




                    $query2=mysqli_query($conn,"INSERT INTO sections (program_id, sec_no, capacity, availablecapacity, sy, refno, status) VALUES ('$pid', '$snum', '$scap', '$scap', '$sy', '$refno', '1')")or die(mysqli_error($conn));

                    $log0=mysqli_query($conn,"SELECT * FROM instructors WHERE referral ='$refno'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $fname=$rowlog['fname'];
                        $lname=$rowlog['lname'];
                        

                    $desc = 'Added section number: '.$snum;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                    $desc = 'Assigned instructor '.$fname." ".$lname." for section ".$snum;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Section was added successfully!"); window.location.href = "sections.php"; </script>';
                        }
                    }
                    
                    
                    ?>
