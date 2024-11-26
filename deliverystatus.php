<?php
include '../pay/db.php';
$did=addslashes($_GET['did']);
$oid=addslashes($_GET['oid']);
$status=$_GET['status'];
session_start();
$qryrestro="SELECT * FROM `settings`where id=1";
$rawrestro=mysqli_query($conn,$qryrestro);
$resrestro= mysqli_fetch_assoc($rawrestro);
$appname=$resrestro["appname"];
// $phone=$_SESSION['login'];
// $pass=$_SESSION['loginpass'];


if(isset($_SESSION['logindboy'])){

$sql3="UPDATE `orders` SET `status` = '$status' WHERE `orders`.`oid` = $oid;";
$res3=mysqli_query($conn,$sql3);
if($res3=true)
    header("Location:home.php?did=$did");
}else{
     $mes="Wrong Credentials";
   header("Location:index.php?message=$mes");
}

?>