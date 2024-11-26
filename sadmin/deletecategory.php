<?php
include '../pay/db.php';

$cid=mysqli_real_escape_string($conn,$_GET['cid']);


session_start();

 $sql0 = "DELETE FROM `products` WHERE cid = '$cid';";
 
    // Execute query
    $qry0=mysqli_query($conn, $sql0);
 
 

 
    // Get all the submitted data from the form
    $sql = "DELETE FROM `category` WHERE cid = '$cid';";
 
    // Execute query
    $qry=mysqli_query($conn, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if ($qry==true) {
        header("location:category.php");
    } 

?>
