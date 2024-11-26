<?php
include '../pay/db.php';

$did=addslashes($_GET['did']);
$status=$_GET['status'];
session_start();
$sql="SELECT * FROM `subscription`where aid='$aid'";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);
$aname=$row["aname"];
$appname=$row["appname"];
// $phone=$_SESSION['login'];
// $pass=$_SESSION['loginpass'];


if(isset($_SESSION['logindboy'])){

$sql3="UPDATE `dboy` SET `status` = '$status' WHERE `dboy`.`did` = $did;";
$res3=mysqli_query($conn,$sql3);
if($res3=true)
    header("Location:home.php?did=$did");
}else{
     $mes="Wrong Credentials";
   header("Location:index.php?message=$mes");
}

?>