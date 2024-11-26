<?php
include '../pay/db.php';

$sid=mysqli_real_escape_string($conn,$_POST['sid']);
$cid=mysqli_real_escape_string($conn,$_POST['cid']);
$pname=mysqli_real_escape_string($conn,$_POST['pname']);
$punit=mysqli_real_escape_string($conn,$_POST['punit']);
$uploadfile=mysqli_real_escape_string($conn,$_POST['uploadfile']);
$pdesc=mysqli_real_escape_string($conn,$_POST['pdesc']);
$price=mysqli_real_escape_string($conn,$_POST['price']);
$mrp=mysqli_real_escape_string($conn,$_POST['mrp']);
session_start();

 $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./images/" . $filename;
 

 
    // Get all the submitted data from the form
    $qry="INSERT INTO `products` (`pid`, `cid`, `sid`, `pname`, `punit`, `price`, `mrp`, `pdesc`, `pimage`, `status`) VALUES (NULL, '$cid', '$sid', '$pname', '$punit', '$price','$mrp', '$pdesc', '$filename', '1');" ;
  $res=mysqli_query($conn,$qry);
 if($res==true){
        
    if(move_uploaded_file($tempname, $folder)) {
        header("location:product.php");
    } ;
};

?>
