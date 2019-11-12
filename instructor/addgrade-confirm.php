<?php
  include('dbconnections.php');
  session_start();
?>

          <?php
                if(isset($_POST['submit'])){
                    $criteria_id = $_POST["criteria_id"];
                    $student_id = $_POST["student_id"];
                    $cname = $_POST["cname"];
                    $sub = $_POST["sub"];

                    if($cname == 'Quiz' || $cname == 'Assignment' || $cname == 'Exam'){
                    $grade = $_POST["grade"];
                    $items = $_POST["items"];
                    $percentage = ($grade / $items) * 100;
                    $query=mysqli_query($conn,"INSERT INTO grades (criteria_id, student_id, grade, items, percent) VALUES ('$criteria_id', '$student_id', '$grade', '$items', '$percentage')")or die(mysqli_error($conn));

                        echo  '<script> alert("Grade was added successfully!"); window.location.href = "viewgrades.php?id='.$student_id.'&sub='.$sub.'"; </script>';
                      }

                    else if($cname == 'Recitation' || $cname == 'Project' || $cname == 'Behavior' || $cname == 'Performance'){
                    $percentage = $_POST["percentage"];
                    $query=mysqli_query($conn,"INSERT INTO grades (criteria_id, student_id, grade, items, percent) VALUES ('$criteria_id', '$student_id', ' ', ' ', '$percentage')")or die(mysqli_error($conn));

                        echo  '<script> alert("Grade was added successfully!"); window.location.href = "viewgrades.php?id='.$student_id.'&sub='.$sub.'"; </script>';
                      }



                        }
                    
                    
                    ?>
