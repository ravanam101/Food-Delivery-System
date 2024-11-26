<?php
include '../pay/db.php';

$catname=mysqli_real_escape_string($conn,$_POST['catname']);
$uploadfile=mysqli_real_escape_string($conn,$_POST['uploadfile']);
session_start();

 $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./images/" . $filename;
 

 
    // Get all the submitted data from the form
    $sql = "INSERT INTO `category` (`cid`, `cname`, `cimage`) VALUES (NULL, '$catname', '$filename');";
 
    // Execute query
    mysqli_query($conn, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        header("location:category.php");
    } 

?>
