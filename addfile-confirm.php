<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){

                    $targetfolder = "files/";

                    $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;

                    $ok=1;

                    $file_type=$_FILES['file']['type'];

                    if ($file_type=="application/docx" || "application/pdf" || $file_type=="image/gif" || $file_type=="image/jpeg") {

                     if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))

                     {

                     $filename = $_POST["filename"];
                    $query=mysqli_query($conn,"INSERT INTO files (filename, filepath, status) VALUES ('$filename', '$targetfolder', '1')")or die(mysqli_error($conn));

                    $desc = 'Added Report File: '.$filename;
                    $username = $_SESSION['Username'];
                    $log =$conn->prepare("INSERT INTO logs (log_desc, log_by) VALUES ('$desc', '$username')");
                    $log->execute();
                    
                        echo  '<script> alert("Document was added successfully!"); window.location.href = "reports.php"; </script>';
                        }

                     }

                     else {

                     echo  '<script> alert("Problem uploading Document File!"); window.location.href = "reports.php"; </script>';

                     }

                    }

                    else {

                     echo  '<script> alert("Invalid Document File Format!"); window.location.href = "reports.php"; </script>';

                    }




                	
                    
                    
                    ?>
