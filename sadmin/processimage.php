<?php
include '../pay/db.php';

$pid=mysqli_real_escape_string($conn,$_POST['pid']);
$uploadfile=mysqli_real_escape_string($conn,$_POST['uploadfile']);

session_start();
   $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./images/" . $filename;
 
   
 
    // Get all the submitted data from the form
    $sql = "INSERT INTO `addl_image` (`id`, `pid`, `image`) VALUES (NULL, '$pid', '$filename');";
 
    // Execute query
    $qry=mysqli_query($conn, $sql);
 
 
    if (move_uploaded_file($tempname, $folder)) {
       header("location:product-addl-image.php?pid=$pid");
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
    


?>