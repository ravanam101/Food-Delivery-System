<?php 
 session_start();
 
include '../pay/db.php';

$phone=mysqli_real_escape_string($conn,$_POST['phone']);
$pass=mysqli_real_escape_string($conn,$_POST['password']);

$sql="SELECT * FROM `settings`where id=1";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);
$dphone=$row["phone"];
$dpass=$row["password"];

if($dphone==$phone && $dpass==$pass){
    $cookie_name="loginadmin";
	    $cookie_value=$phone;
	    $domain=$_SERVER['SERVER_NAME'];
	    setcookie($cookie_name,$cookie_value,time()+(86400*365),"/$route/sadmin",$domain);
    $_SESSION['loginadmin']=$phone;
    
header("Location:dashboard.php");
// exit();
}else{
    $mes="Wrong Credentials";
  header("Location:index.php?message=$mes");

// exit(); 
}

	?>