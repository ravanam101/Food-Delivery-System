<?php
include '../pay/db.php';

$pid=mysqli_real_escape_string($conn,$_GET['pid']);
$status=mysqli_real_escape_string($conn,$_GET['status']);

$sql="UPDATE `products` SET `status` = '$status' WHERE `products`.`pid` = $pid;";
$qry=mysqli_query($conn,$sql);
if($qry==true){
    header("location:product.php");
}
session_start();

?>