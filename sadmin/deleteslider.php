<?php
include '../pay/db.php';

$sid=mysqli_real_escape_string($conn,$_GET['sid']);


session_start();

 $sql0 = "DELETE FROM `slider` WHERE sid = '$sid';";
 
    // Execute query
    $qry0=mysqli_query($conn, $sql0);
 
 

     if ($qry0==true) {
        header("location:slider.php");
    } 

?>
