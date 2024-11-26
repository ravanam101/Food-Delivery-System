<?php
include 'pay/db.php';
$cartid=mysqli_real_escape_string($conn,$_GET['cartid']);
$sid=mysqli_real_escape_string($conn,$_GET['sid']);
$lid=mysqli_real_escape_string($conn,$_GET['lid']);
$pid=mysqli_real_escape_string($conn,$_GET['pid']);
$uid=mysqli_real_escape_string($conn,$_GET['uid']);
$func=mysqli_real_escape_string($conn,$_GET['func']);

// $sqli="SELECT * FROM `shop`where sid=$sid";
// $qryi=mysqli_query($conn,$sqli);
// $resi=mysqli_fetch_assoc($qryi);
// $lid=$resi['lid'];

if($func==1){
$sql="SELECT * FROM `cart`where cartid=$cartid";
$qry=mysqli_query($conn,$sql);
$res=mysqli_fetch_assoc($qry);
$qty=$res['qty'];
$pprice=$res['pprice'];
if($qty>1){
    $uqty=$qty-1;
    $price=$pprice*$uqty;
    $sql1="UPDATE `cart` SET `qty` = '$uqty', `price` = '$price' WHERE `cart`.`cartid` = $cartid;";
    $qry1=mysqli_query($conn,$sql1);
    if($qry1==true) header("location:cart.php?sid=$sid&uid=$uid&lid=$lid");
}else{
    header("location:cart.php?sid=$sid&uid=$uid&lid=$lid");
}
    
}else if($func==2){
    $sql="SELECT * FROM `cart`where cartid=$cartid";
$qry=mysqli_query($conn,$sql);
$res=mysqli_fetch_assoc($qry);
$qty=$res['qty'];
$pprice=$res['pprice'];

    $uqty=$qty+1;
    $price=$pprice*$uqty;
    $sql1="UPDATE `cart` SET `qty` = '$uqty', `price` = '$price' WHERE `cart`.`cartid` = $cartid;";
    $qry1=mysqli_query($conn,$sql1);
    if($qry1==true) header("location:cart.php?sid=$sid&uid=$uid&lid=$lid");

    
}else if($func==3){
    $sql1="DELETE FROM `cart` WHERE `cartid` = $cartid;";
    $qry1=mysqli_query($conn,$sql1);
    if($qry1==true) header("location:cart.php?sid=$sid&uid=$uid&lid=$lid");
}else if($func==4){
    header("location:cart.php?sid=$sid&uid=$uid");
}else if($func==5){
   $sql1="DELETE FROM `cart` WHERE `uid` = $uid;";
    $qry1=mysqli_query($conn,$sql1);
    if($qry1==true) header("location:shop.php?sid=$sid&lid=$lid"); 
}

?>