<?php
  include('dbconnections.php');
  session_start();

  $sy = $_SESSION['sy'];
?>

          <?php
                if(isset($_GET['id'])){
                    $id = $_GET["id"];

                    $query =$conn->prepare("SELECT * FROM students WHERE Student_id = '$id' AND sy = '$sy'");
                    $query->execute();
                    $res = $query->get_result();

                    if($res->num_rows>0){

                    echo  '<script> alert("Return Student already exists!"); window.location.href = "returning.php"; </script>';

                    }
                  

                    else{


                    $query2=mysqli_query($conn,"INSERT INTO students(fname, mdname, lname, fullname, address, bday, gender, contactno, email, education, lrn, req, reqfile, status) SELECT fname, mdname, lname, fullname, address, bday, gender, contactno, email, education, lrn, req, reqfile, status FROM students WHERE Student_id=$id")or die(mysqli_error($conn));

                        echo  '<script> alert("Return Student was re-added successfully!"); window.location.href = "completereturn.php?id='.$id.'"; </script>';
                        }
                    }
                    
                    
                    ?>
