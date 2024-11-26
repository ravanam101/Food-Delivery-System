<?php
include '../pay/db.php';


$lid=mysqli_real_escape_string($conn,$_POST['lid']);
$dname=mysqli_real_escape_string($conn,$_POST['dname']);
$daddress=mysqli_real_escape_string($conn,$_POST['daddress']);
$dphone=mysqli_real_escape_string($conn,$_POST['dphone']);
$demail=mysqli_real_escape_string($conn,$_POST['demail']);
$dpass=mysqli_real_escape_string($conn,$_POST['dpass']);
$status=mysqli_real_escape_string($conn,$_POST['status']);
session_start();

?>
<?php $qry="INSERT INTO `dboy` (`did`, `dname`, `daddress`, `dphone`, `demail`, `dpass`, `status`) VALUES (NULL, '$dname', '$daddress', '$dphone', '$demail', '$dpass', '$status');" ;
$res=mysqli_query($conn,$qry);
if($res==true){
    header("Location:delivery-boy.php");
}else{
    echo "failed";
}

?>