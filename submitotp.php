
	<?php
include 'pay/db.php';
$uphone=mysqli_real_escape_string($conn,$_GET['uphone']);
session_start();
	if(!isset($_SESSION['login'])){
	    $cookie_name="phone";
	    $cookie_value=$uphone;
	    $domain=$_SERVER['SERVER_NAME'];
	    setcookie($cookie_name,$cookie_value,time()+(86400*365),"/$route",$domain);
		$_SESSION['login'] = $uphone;
		$sqluser="SELECT * FROM `user`where userphone=$uphone";
$rawuser=mysqli_query($conn,$sqluser);
$resuser= mysqli_fetch_assoc($rawuser);
if(!$resuser>0){
    $welcome=$ttt['welcome'];
    
    $adduser="INSERT INTO `user` (`userid`, `userphone`, `username`, `useraddress`, `userlandmark`, `latuser`,`longuser`,`wallet`) VALUES (NULL, '$uphone', '', '', '','','','$welcome');";
$adduserres=mysqli_query($conn,$adduser);}
	}else{
	    header("location:index.php");
	};
	
	if(isset($_SESSION['login'])){
    	header("location:shop.php");
	    
	}

	?>

	
	

	