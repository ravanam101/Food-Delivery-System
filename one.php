 <?php
 include 'pay/db.php';
 echo $lid=mysqli_real_escape_string($conn,$_GET['lid']);
session_start();

if(!isset($_SESSION['login'])){
    header("location:index.php");
}
$phone=$_SESSION['login'];
$sqi="select * from `settings` where id=1";
$qri=mysqli_query($conn,$sqi);
$rei=mysqli_fetch_assoc($qri);
$notify=$rei['notify'];


// $aid=mysqli_real_escape_string($conn,$_GET['aid']);


header("Location:https://api.invikta.in/?title=New Order Recieved&body=Recieved New order From Yummy Chilly&request=notify&token=I_LOVE_CODING&userId=$notify&url=https://yummychilly.com/p/success.php?lid=$lid");
?>
 