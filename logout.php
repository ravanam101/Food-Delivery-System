<?php 
include 'pay/db.php';
unset($_COOKIE['phone']);
 $cookie_name="phone";
	    $cookie_value="";
	    $domain=$_SERVER['SERVER_NAME'];
	    setcookie($cookie_name,$cookie_value,time()+(86400*365),"/$route",$domain);
session_start();

session_destroy();
header("Location:index.php");

?>