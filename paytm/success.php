<?php
include '../pay/db.php';
session_start();
$r=$_GET['response'];
if($r==1){
   $uid=$_SESSION['UID'];
$temp=$_SESSION['TEMP'];
    $sqli="UPDATE `orders` SET `status` = 'Order Placed', `tid` = '1' WHERE `orders`.`userid` = $uid AND `temp`=$temp;";
    $qryi=mysqli_query($conn,$sqli);
     
     if($qryi==true){
         header("location:../notify.php?uid=$uid");
     }
}else{
      $uid=$_SESSION['UID'];
$temp=$_SESSION['TEMP'];
    $sqli="UPDATE `orders` SET `status` = 'Order Canceled', `tid` = '0' WHERE `orders`.`userid` = $uid AND `temp`=$temp;";
    $qryi=mysqli_query($conn,$sqli);
     
     if($qryi==true){
         header("location:../myorder.php?uid=$uid");
     }
    
}
?>