<?php
include 'pay/db.php';
session_start();

$sid=mysqli_real_escape_string($conn,$_GET['sid']);
$uid=mysqli_real_escape_string($conn,$_GET['uid']);
$name=mysqli_real_escape_string($conn,$_GET['name']);
$phone=mysqli_real_escape_string($conn,$_GET['phone']);
$lat=mysqli_real_escape_string($conn,$_GET['lat']); 
$long=mysqli_real_escape_string($conn,$_GET['long']); 
$products=$_SESSION['PRODUCT'];
// $products=mysqli_real_escape_string($conn,$_GET['products']);

// $address=mysqli_real_escape_string($conn,$_GET['address']); 
// $landmark=mysqli_real_escape_string($conn,$_GET['landmark']); 
// $sn=mysqli_real_escape_string($conn,$_GET['sn']); 

$price=mysqli_real_escape_string($conn,$_GET['price']);
$dcharge=mysqli_real_escape_string($conn,$_GET['dcharge']);

$totalprice=mysqli_real_escape_string($conn,$_GET['totalprice']);
$tax=mysqli_real_escape_string($conn,$_GET['tax']);
$tid=mysqli_real_escape_string($conn,$_GET['tid']);
$status=mysqli_real_escape_string($conn,$_GET['status']);
$rider="Not assigned Yet";




$qry1="SELECT * FROM `settings` where id=1";
$raw1=mysqli_query($conn,$qry1);
$res1= mysqli_fetch_assoc($raw1);
$cashback=$res1["cashback"];
$cashbackon=$res1["cashbackon"];


date_default_timezone_set('Asia/Kolkata');
$ordertime=date("Y-m-d")." ".date("h:i:sa");

// ,`latuser`,`longuser`


$qry="INSERT INTO `orders` (`oid`, `userid`, `did`, `uname`, `ophone`, `pname`, `price`, `dcharge`, `dchargestatus`, `rider`, `status`, `tid`, `tax`, `ordertime`) VALUES (NULL, '$uid', '0', '$name', '$phone', '$products', '$price', '$dcharge', '0', '$rider', '$status', '$tid', '$tax', '$ordertime');";

$res=mysqli_query($conn,$qry);
if($res==true){
$sql1="DELETE FROM `cart` WHERE `uid` = $uid;";
$qry1=mysqli_query($conn,$sql1); };

if($res==true){
    if($price>$cashbackon) { 
    $sqli="UPDATE `user` SET `wallet` = '$cashback' WHERE `user`.`userid` = $uid;";
    $qryi=mysqli_query($conn,$sqli);

    }else {
     $sqli="UPDATE `user` SET `wallet` = '0' WHERE `user`.`userid` = $uid;";
    $qryi=mysqli_query($conn,$sqli);
    
};

};


if($qryi==true){
//  header("Location:https://api.invikta.in/?title=New Order Recieved&body=Recieved New order From Yummy Chilly&request=notify&token=I_LOVE_CODING&userId=$notify&url=https://yummychilly.com/p/one.php?lid=$lid");
header("Location:notify.php");
    exit();
}else{ 
  header("Location:failedorder.php?phone=fail&&email=$aemail");
    exit();
}

    


    
 
?>

