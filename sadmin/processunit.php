<?php
include '../pay/db.php';

$pid=mysqli_real_escape_string($conn,$_GET['pid']);

$unit=mysqli_real_escape_string($conn,$_GET['unit']);
$price=mysqli_real_escape_string($conn,$_GET['price']);
session_start();
$sql="SELECT * FROM `settings`where aid=1";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);

$appname=$row["appname"];

$sql="INSERT INTO `protuct_varient` (`pvi`, `pid`, `unit`, `price`) VALUES (NULL, '$pid', '$unit', '$price');";
$qry=mysqli_query($conn,$sql);
if($qry==true) header("location:product-unit.php?pid=$pid");
?>