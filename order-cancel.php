<?php

session_start();
include 'pay/db.php';
if(!isset($_COOKIE['phone'])){
 header("location:index.php"); }
 $oid=mysqli_real_escape_string($conn,$_GET['oid']);
 
 $sql="UPDATE `orders` SET `status` = 'Order Canceled' WHERE `orders`.`oid` = $oid;";
 $qry=mysqli_query($conn,$sql);
 
 if($qry==true) header("location:myorder.php");
 ?>
 