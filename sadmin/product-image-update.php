<?php
include '../pay/db.php';
$pid=mysqli_real_escape_string($conn,$_GET['pid']);
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

<?php
 if(isset($_POST['up'])){
  
$uploadfile=mysqli_real_escape_string($conn,$_POST['uploadfile']);
$pid=mysqli_real_escape_string($conn,$_POST['pid']);

 $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "./images/" . $filename;
 

 
    // Get all the submitted data from the form
    $sql = "UPDATE `products` SET `pimage` = '$filename' WHERE `products`.`pid` = $pid;";
 
    // Execute query
    mysqli_query($conn, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        header("location:product.php");
    } 

 }
?>
    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->


    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">
<br><br>
        <div class="login-form mt-1">
            <div class="section">
                <img src="https://cdn-icons-png.flaticon.com/128/4727/4727286.png" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                
                <h3><?php echo $appname; ?></h3>
                <h4>Change Product Image</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form action="product-image-update.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group boxed">
                        
                        <div class="input-wrapper">
                            <input type="file" name="uploadfile" class="form-control"  required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                       <input type="hidden" name="up" value="up"> 
                        <input type="hidden" name="pid" value="<?php echo $pid; ?>"> 
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
                        <button type="submit" class="btn btn-warning btn-block btn-lg">Update Image</button>
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

