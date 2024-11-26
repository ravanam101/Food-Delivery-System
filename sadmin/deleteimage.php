<?php
include '../pay/db.php';

$id=mysqli_real_escape_string($conn,$_GET['id']);
$pid=mysqli_real_escape_string($conn,$_GET['pid']);

// $pvi=mysqli_real_escape_string($conn,$_GET['pvi']);
session_start();
$sql="SELECT * FROM `settings`where id=1";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);

$appname=$row["appname"];
 $sql = "DELETE FROM `addl_image` WHERE id =$id;";
 
    // Execute query
    $qry=mysqli_query($conn, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if ($qry==true) {
        header("location:product-addl-image.php?pid=$pid");
    } 


?>