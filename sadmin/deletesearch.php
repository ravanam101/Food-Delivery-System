<?php
include '../pay/db.php';

$id=mysqli_real_escape_string($conn,$_GET['id']);


session_start();

 $sql0 = "DELETE FROM `search` WHERE id = '$id';";
 
    // Execute query
    $qry0=mysqli_query($conn, $sql0);
 
 

     if ($qry0==true) {
        header("location:searched-products.php");
    } 

?>
