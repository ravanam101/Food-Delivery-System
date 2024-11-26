<?php
include '../pay/db.php';
echo $category=mysqli_real_escape_string($conn,$_POST['category']);
echo $slider=mysqli_real_escape_string($conn,$_POST['slider']);
echo $product=mysqli_real_escape_string($conn,$_POST['product']);
echo $subcategory=mysqli_real_escape_string($conn,$_POST['subcategory']);
 echo $trending=mysqli_real_escape_string($conn,$_POST['trending']);

$sql="UPDATE `style` SET `category_style` = '$category', `slider_position` = '$slider', `product_list` = '$product', `subcategory` = '$subcategory', `trending_section` = '$trending' WHERE `style`.`id` = 1;";
$qry=mysqli_query($conn,$sql);
if($qry==true) header("location:dashboard.php");
?>