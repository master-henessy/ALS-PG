  <?php
  include('dbconnections.php');
  session_start();

    $grade_id=$_GET['cid'];
    $id=$_GET['id'];
    $sub=$_GET['sub'];
    $query=mysqli_query($conn,"DELETE from grades where grade_id='$grade_id'")or die(mysqli_error($conn));
        echo  '<script> alert("Grade Record was deleted successfully!"); window.location.href = "viewgrades.php?id='.$id.'&sub='.$sub.'"; </script>';


?>                    
