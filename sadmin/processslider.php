<?php
include '../pay/db.php';

$slink=mysqli_real_escape_string($conn,$_POST['slink']);
$uploadfile=mysqli_real_escape_string($conn,$_POST['uploadfile']);
session_start();

 $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./images/" . $filename;
 

 
    // Get all the submitted data from the form
    $sql = "INSERT INTO `slider` (`sid`, `simage`, `slink`) VALUES (NULL, '$filename', '$slink');";
 
    // Execute query
    mysqli_query($conn, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        header("location:slider.php");
    } 

?>
