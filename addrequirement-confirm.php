<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $pid = $_POST["pid"];
                    $rname = $_POST["rname"];

                    $query =$conn->prepare("SELECT * FROM requirements WHERE program_id = '".$pid."' AND req_name = '".$rname."'");
                    $query->execute();
                    $res = $query->get_result();

                     if($res->num_rows>0){

                    echo  '<script> alert("Requirement already exists!"); window.location.href = "addrequirement.php"; </script>';


                    }

                    else{

                    $query=mysqli_query($conn,"INSERT INTO requirements (program_id, req_name, status) VALUES ('$pid', '$rname', '1')")or die(mysqli_error($conn));

                    $log0=mysqli_query($conn,"SELECT * FROM programs WHERE program_id ='$pid'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $pname=$rowlog['pname'];

                    $desc = 'Added requirement: '.$rname." for ".$pname." program";
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Requirement was added successfully!"); window.location.href = "requirements.php"; </script>';
                        }

}

                    
                    ?>
