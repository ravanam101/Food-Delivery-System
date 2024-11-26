<?php
session_start();
include 'pay/db.php';
$sid=$_GET['sid'];
$uid=$_GET['uid'];
$name=$_GET['name'];
$total=$_GET['total'];
$total_product=$_GET['total_product'];

$city=$_GET['city'];
$phone=$_GET['phone'];
$address=$_GET['address'];
$landmark=$_GET['landmark'];
$latitude=$_GET['latitude'];
$longitude=$_GET['longitude'];
$useraddress=$city.$address;

// $sql="UPDATE `user` SET `username` = '$name', `useraddress` = '$address', `userlandmark` = '$landmark', `latuser` = '$latitude', `longuser` = '$longitude' WHERE `user`.`userid` = $uid;";
// $qry=mysqli_query($sql);
// if($qry==true) header("location:delivery-address.php");

$updateuser="UPDATE `user` SET `username` = '$name', `useraddress` = '$address', `userlandmark` = '$landmark', `latuser` = '$latitude', `longuser` = '$longitude',`addisset` = '1' WHERE `user`.`userid` = $uid;";
    $edituser=mysqli_query($conn,$updateuser);
 if($edituser=true){
     header("location:delivery-address.php?uid=$uid&sid=$sid&total=$total&total_product=$total_product");
 }
?>