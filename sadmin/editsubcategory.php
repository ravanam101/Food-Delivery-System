<?php
include '../pay/db.php';

$id=mysqli_real_escape_string($conn,$_GET['id']);
session_start();
$sql="SELECT * FROM `settings`where id=1";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);
$aname=$row["aname"];$appname=$row["appname"];
?>


</html>
<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title><?php echo $appname; ?></title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body class="bg-white">
    <?php if(isset($_COOKIE['loginadmin'])){
?>

    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->


    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">

        <div class="login-form mt-1">
            <div class="section">
               <img src="https://thumbs.dreamstime.com/b/category-icon-189057199.jpg" alt="image"  width="150" height="150">
            </div>
            <div class="section mt-1">
                
                <h3><?php echo $appname; ?></h3>
                <h4>Edit Sub-Category</h4>
                <?php 
                $sql="select * from `subcategory` where id=$id;";
                $qry=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($qry);
                
                ?>
            </div>
            <div class="section mt-1 mb-5">
                <form action="updatesubcategory.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                           <input type="hidden" name="cid" value="<?php echo $cid;?>">
                           <input type="hidden" name="id" value="<?php echo $id;?>">
                            <input type="text" class="form-control" value="<?php echo $row['subcategory_name'];?>" name="subcatname" placeholder="Category Name to add" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div><br>
                        <div class="input-wrapper">
                            <input type="file" name="uploadfile" class="form-control" value="<?php echo $row['subcategory_image'];?>" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                           
                            
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-links mt-2">
                        <div>
                            <?php echo $mes;?>
                        </div>
                        <!--<div><a href="page-forgot-password.html" class="text-muted">Forgot Password?</a></div>-->
                    </div>

                    <div class="form-button-group">
                        <button type="submit" class="btn btn-warning btn-block btn-lg">Update Category</button>
                    </div>

                </form>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->



    <!-- ///////////// Js Files ////////////////////  -->
    <!-- Jquery -->
    <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
    <!-- Bootstrap-->
    <script src="assets/js/lib/popper.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <!-- Ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.0.0/dist/ionicons/ionicons.js"></script>
    <!-- Owl Carousel -->
    <script src="assets/js/plugins/owl-carousel/owl.carousel.min.js"></script>
    <!-- jQuery Circle Progress -->
    <script src="assets/js/plugins/jquery-circle-progress/circle-progress.min.js"></script>
    <!-- Base Js File -->
    <script src="assets/js/base.js"></script>


<?php }else{
     $mes="Wrong Credentials";
   header("Location:index.php?message=$mes");
};?>
<script>
document.oncontextmenu = function() { 
                return false; };
      </script>
</body>


</html>

