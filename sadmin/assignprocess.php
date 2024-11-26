
<?php
include '../pay/db.php';
session_start();

$oid=mysqli_real_escape_string($conn,$_GET['oid']);
$did=mysqli_real_escape_string($conn,$_GET['did']);


$sql="SELECT * FROM `settings`where id=1";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);

$appname=$row["appname"];

$sql1="SELECT * FROM `dboy`where did='$did'";
$res1=mysqli_query($conn,$sql1);
$row1= mysqli_fetch_assoc($res1);
$dname=$row1['dname'];
$dphone=$row1['dphone'];
$demail=$row1['demail'];



$sql2="SELECT * FROM `orders`where oid='$oid'";
$res2=mysqli_query($conn,$sql2);
// $totalorders=(mysqli_num_rows($res2));
$row2= mysqli_fetch_assoc($res2);
 $dboyearning=$row2['dcharge'];


$sql3="UPDATE `orders` SET `rider` = '$dname', `did` = '$did', `status` = 'Order Processed' WHERE `orders`.`oid` = $oid;";
$result=mysqli_query($conn,$sql3);
if($result==true) header("Location:orders.php");

?>