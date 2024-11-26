<?php
include '../pay/db.php';

$cid=mysqli_real_escape_string($conn,$_GET['cid']);
$sid=mysqli_real_escape_string($conn,$_GET['sid']);
$lid=mysqli_real_escape_string($conn,$_GET['lid']);
$pid=mysqli_real_escape_string($conn,$_GET['pid']);

session_start();


 

 
    // Get all the submitted data from the form
    $sql = "DELETE FROM `products` WHERE pid = '$pid';";
 
    // Execute query
    $qry=mysqli_query($conn, $sql);
    
    
 
    // Now let's move the uploaded image into the folder: image
    if ($qry==true) {
        header("location:product.php");
    } 

?>
