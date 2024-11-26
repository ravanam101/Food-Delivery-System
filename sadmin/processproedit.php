<?php
include '../pay/db.php';

$pid=mysqli_real_escape_string($conn,$_POST['pid']);
$pname=mysqli_real_escape_string($conn,$_POST['pname']);
$punit=mysqli_real_escape_string($conn,$_POST['punit']);

$pdesc=mysqli_real_escape_string($conn,$_POST['pdesc']);
$price=mysqli_real_escape_string($conn,$_POST['price']);
$mrp=mysqli_real_escape_string($conn,$_POST['mrp']);
session_start();

 

?>
<?php $qry="UPDATE `products` SET `pname` = '$pname', `punit` = '$punit', `price` = '$price',`mrp` = '$mrp', `pdesc` = '$pdesc' WHERE `products`.`pid` = $pid;" ;

 $raw=mysqli_query($conn,$qry);
 if($raw==true){
 
       header("Location:product.php");
    
    };



?>