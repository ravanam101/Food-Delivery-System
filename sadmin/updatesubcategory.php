<?php
include '../pay/db.php';
$id=mysqli_real_escape_string($conn,$_POST['id']);
$cid=mysqli_real_escape_string($conn,$_POST['cid']);

$subcatname=mysqli_real_escape_string($conn,$_POST['subcatname']);
$uploadfile=mysqli_real_escape_string($conn,$_POST['uploadfile']);
session_start();

 $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./images/" . $filename;
 

 
    // Get all the submitted data from the form
    $sql = "UPDATE `subcategory` SET `subcategory_name` = '$subcatname', `subcategory_image` = '$filename' WHERE `subcategory`.`id` = $id;";
 
    // Execute query
    mysqli_query($conn, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        header("location:subcategory.php");
    } 

?>
