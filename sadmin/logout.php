
<?php 
include '../pay/db.php';

session_start();

if(isset($_COOKIE['loginadmin'])){
    session_destroy();
    unset($_COOKIE['loginadmin']);
 $cookie_name="loginadmin";
	    $cookie_value="";
	    $domain=$_SERVER['SERVER_NAME'];
	    setcookie($cookie_name,$cookie_value,time()+(86400*365),"/$route/sadmin",$domain);
    
    header("Location:index.php");
}

?>