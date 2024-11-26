<?php
session_start();
include 'pay/db.php';
 if(!isset($_COOKIE['phone'])){
 header("location:index.php");
}else{
    $uphone=$_COOKIE['phone'];
      $sql="SELECT * FROM `user` WHERE userphone=$uphone";
$getuid=mysqli_query($conn,$sql);
$result= mysqli_fetch_assoc($getuid);
$uid=$result['userid'];
$cid=mysqli_real_escape_string($conn,$_GET['cid']);   
$sid=mysqli_real_escape_string($conn,$_GET['sid']);
$lid=mysqli_real_escape_string($conn,$_GET['lid']);
$pvi=mysqli_real_escape_string($conn,$_GET['pvi']);
$pid=mysqli_real_escape_string($conn,$_GET['pid']);

  $qry1="SELECT * FROM `products` WHERE pid=$pid";
$raw1=mysqli_query($conn,$qry1);
$res1= mysqli_fetch_assoc($raw1);
$pname=$res1['pname'];
$punit=$res1['punit'];
$price=$res1['price'];

  $qry2="SELECT * FROM `protuct_varient` WHERE pvi=$pvi;";
$raw2=mysqli_query($conn,$qry2);
$res2= mysqli_fetch_assoc($raw2);
echo $vprice=$res2['price'];

if($pvi==0) {
    $fprice=$price; }else{
         $fprice=$vprice;
    }

$sql="INSERT INTO `cart` (`cartid`, `sid`, `pid`, `uid`, `qty`, `price`, `pprice`, `pvi`) VALUES (NULL, '$sid', '$pid', '$uid', '1', '$fprice', '$fprice', '$pvi');";
$qry=mysqli_query($conn,$sql);
if($qry==true) header("location:subcategory.php?cid=$cid");
}
?>