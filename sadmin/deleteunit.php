<?php
include '../pay/db.php';

$pid=mysqli_real_escape_string($conn,$_GET['pid']);
$pvi=mysqli_real_escape_string($conn,$_GET['pvi']);
session_start();
$sql="SELECT * FROM `settings`where aid=1";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);

$appname=$row["appname"];
 $sql = "DELETE FROM `protuct_varient` WHERE pvi = '$pvi';";
 
    // Execute query
    $qry=mysqli_query($conn, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if ($qry==true) {
        header("location:product-unit.php?pid=$pid");
    } 


?>