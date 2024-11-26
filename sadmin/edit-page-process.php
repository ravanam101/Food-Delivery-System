<?php
include '../pay/db.php';

session_start();

 $title=$_GET['title'];
 $id=$_GET['idm'];
echo $desc=$_GET['description'];

    $sql5="UPDATE `pages` SET `title` = '$title', `content` = '$desc' WHERE `pages`.`id` = $id;";
    $qry5=mysqli_query($conn,$sql5);
    if($qry5==true) header("location:pages.php");


?>