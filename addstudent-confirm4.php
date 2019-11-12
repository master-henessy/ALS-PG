<?php
  include('dbconnections.php');
  session_start();

  $sy = $_SESSION['sy'];
?>

          <?php
                if(isset($_POST['submit'])){

                    $sid = $_POST["sid"];
                    $lrn = $_POST["lrn"];
                    $req = $_POST["req"];
                    $sec_no = $_POST["sec_no"];
                    $sy = $_POST["sy"];

                    $targetfolder = "files/";

                    $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

                    $ok=1;

                    $file_type=$_FILES['file']['type'];

                    if ($file_type=="image/jpg" || $file_type=="image/png" || $file_type=="image/gif" || $file_type=="image/jpeg") {

                     if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder)){

                    $query1=mysqli_query($conn,"SELECT * FROM sections WHERE sec_no='$sec_no' AND sy='$sy'")or die(mysqli_error($conn));
                        while ($row=mysqli_fetch_array($query1))
                        $sec_id=$row['sec_id'];
                        $sec_no=$row['sec_no'];
                        $capacity=$row['availablecapacity'];
                        $dec= 1;
                        $newcapacity= '$capacity' - 1;

                    $query2=mysqli_query($conn,"UPDATE students SET lrn='$lrn', reqfile='$targetfolder', req='$req', sec_id='$sec_id', sy='$sy' where Student_id ='$sid' ")or die(mysqli_error($conn));

                    $query3=mysqli_query($conn,"UPDATE sections SET availablecapacity='$newcapacity' where sec_id ='$sec_id' ")or die(mysqli_error($conn));

                    $log0=mysqli_query($conn,"SELECT * FROM students WHERE Student_id ='$sid'")or die(mysqli_error($conn));
                        $rowlog=mysqli_fetch_array($log0);
                        $fname=$rowlog['fname'];
                        $lname=$rowlog['lname'];

                    $desc = 'Added Student: '.$fname." ".$lname;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();

                        echo  '<script> alert("Student Profile was added successfully!"); window.location.href = "students.php"; </script>';
                        
                    }

                     

                     else {

                     echo  '<script> alert("Problem uploading Document File!"); window.location.href = "students.php"; </script>';

                     }

                    }

                    else {

                     echo  '<script> alert("Invalid Document File Format!"); window.location.href = "students.php"; </script>';

                    }
                }




                    
                    
                    
                    ?>
