<?php
include '../pay/db.php';
$did=mysqli_real_escape_string($conn,$_GET['did']);
$notify=mysqli_real_escape_string($conn,$_GET['notify']);
$sql="UPDATE `dboy` SET `notify` = '$notify' WHERE `dboy`.`did` = $did;";
$qry=mysqli_query($conn,$sql);
 if($qry==true) header("location:home.php?did=$did");

?>