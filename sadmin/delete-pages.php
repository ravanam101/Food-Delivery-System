<?php
include '../pay/db.php';

$id=mysqli_real_escape_string($conn,$_GET['id']);


session_start();

 $sql = "DELETE FROM `pages` WHERE id = '$id';";
 
    // Execute query
    $qry=mysqli_query($conn, $sql);
 
 
    // Now let's move the uploaded image into the folder: image
    if ($qry==true) {
        header("location:pages.php");
    } 

?>
