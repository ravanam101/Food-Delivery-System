<?php
include '../pay/db.php';

$id=mysqli_real_escape_string($conn,$_GET['id']);


session_start();

 $sql0 = "DELETE FROM `products` WHERE sid = '$id';";
 
    // Execute query
    $qry0=mysqli_query($conn, $sql0);
 
 

 
    // Get all the submitted data from the form
    $sql = "DELETE FROM `subcategory` WHERE id = '$id';";
 
    // Execute query
    $qry=mysqli_query($conn, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if ($qry==true) {
        header("location:subcategory.php");
    } 

?>
