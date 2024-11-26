<?php
include '../pay/db.php';

$pid=mysqli_real_escape_string($conn,$_GET['pid']);

session_start();
$qryrestro="SELECT * FROM `settings`where id=1";
$rawrestro=mysqli_query($conn,$qryrestro);
$resrestro= mysqli_fetch_assoc($rawrestro);
$appname=$resrestro["appname"];


?>





<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title><?php echo $appname ;?></title>
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

    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="left">
            <a href="product.php" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"></div>
        <div class="right">
            <!--<a href="page-login.html" class="headerButton">-->
            <!--    Login-->
            <!--</a>-->
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="login-form">
            <div class="section"><br><br><br>
                <h3>Edit Products</h3>
                <h4>Fill the form to Edit Products</h4>
            </div>
            <?php
            $sqli="Select * from `products` where pid=$pid";
            $qryi=mysqli_query($conn,$sqli);
            $rawi=mysqli_fetch_assoc($qryi);
            ?>
            <div class="section mt-2 mb-5">
                <form action="processproedit.php" method="POST">
                <input type="hidden" name="pid" value="<?php echo $pid; ?>">
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label class="label" >Product Name</label>
                            <input type="text" class="form-control" value="<?php echo $rawi['pname'];?>" name="pname" placeholder="Product Name">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                             <label class="label" >Product Unit (Eg.kg, ltr, Small ..)</label>
                            <input type="text" class="form-control" value="<?php echo $rawi['punit'];?>"  name="punit" placeholder="Product Unit">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                             <label class="label" >Product Price</label>
                            <input type="text" class="form-control" value="<?php echo $rawi['price'];?>" name="price" placeholder="Price">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                             <label class="label" >Product MRP</label>
                            <input type="text" class="form-control" value="<?php echo $rawi['mrp'];?>" name="mrp" placeholder="MRP">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                     
                     <div class="form-group boxed">
                        <div class="input-wrapper">
                             <label class="label" >Product Description</label>
                            <input type="text" class="form-control" value="<?php echo $rawi['pdesc'];?>" name="pdesc" placeholder="Addl.Details">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    
                   
                    
                    

                    

                    

                    

                   

                    <div class="form-button-group">
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Update Product</button>
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
   header("Location:index.php?aid=$aid&&message=$mes");
};?></script> 

<script>
document.oncontextmenu = function() { 
                return false; };
      </script>
</body>

</html>