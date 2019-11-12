<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $sid = $_POST["sid"];
                    $subjid = $_POST["subjid"];
                    $sy = $_POST["sy"];

                    $query2=mysqli_query($conn,"select * from sections where sec_id='$sid'")or die(mysqli_error($con));
                    while ($row2=mysqli_fetch_array($query2)){
                      $sid=$row2['sec_id'];
                      $snum=$row2['sec_no'];
                      $pid=$row2['program_id'];
                    }

                    $query =$conn->prepare("SELECT * FROM curriculum WHERE sec_id = '$sid' AND subj_id = '$subjid' AND program_id= '$pid'");
                    $query->execute();
                    $res = $query->get_result();

                    if($res->num_rows>0){

                    echo  '<script> alert("Subject already exists in this Section!"); window.location.href = "sections.php"; </script>';

                    }

                    else{

                    $query=mysqli_query($conn,"INSERT INTO curriculum (program_id, sy, sec_id, subj_id) VALUES ('$pid', '$sy', '$sid', '$subjid')")or die(mysqli_error($conn));

                     $log0=mysqli_query($conn,"SELECT * FROM subjects WHERE subj_id ='$subjid'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $subj_name=$rowlog['subj_name'];

                    $log1=mysqli_query($conn,"SELECT * FROM programs WHERE program_id ='$pid'")or die(mysqli_error($conn));
                        $rowlog1=mysqli_fetch_array($log1);
                        $pname=$rowlog1['pname'];

                    $desc = 'Added subject: '.$subj_name.' to '.$pname.' program, section '.$snum;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Subject was added successfully!"); window.location.href = "sections.php"; </script>';
                        }
                      }
                    
                    
                    ?>
