<?php 
 session_start();
 
include '../pay/db.php';

$phone=addslashes($_POST['phone']);
$pass=addslashes($_POST['password']);

$sql="SELECT * FROM `dboy` where dphone='$phone' AND dpass='$pass';";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);
$dphone=$row['dphone'];
$dpass=$row['dpass'];
$did=$row['did'];

if($dphone==$phone && $dpass==$pass){
    $_SESSION['logindboy']=$phone;
    $_SESSION['loginpassdboy']=$pass;
   
header("Location:home.php?did=$did;");
// exit();
}else{
    $mes="Wrong Credentials";
  header("Location:index.php?message=$mes");
// exit(); 
}

	?>