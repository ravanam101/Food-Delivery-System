<?php
include '../pay/db.php';

session_start();
$sql="SELECT * FROM `settings`where id=1";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);
$appname=$row["appname"];

$sqlstyle="SELECT * FROM `style`where id=1";
$res=mysqli_query($conn,$sqlstyle);
$rowstyle= mysqli_fetch_assoc($resstyle);
$category_style=$rowstyle["category_style"];
$slider_position=$rowstyle["slider_position"];
$product_list=$rowstyle["product_list"];
$subcategory=$rowstyle["subcategory"];
$trending_section=$rowstyle["trending_section"];
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


  <div id="appCapsule">

        <div class="login-form">
            <div class="section"><br>
                <h3>Style Change</h3>
                <h4>Update options for changing the appearence</h4>
            </div>
            <div class="section mt-2 mb-5">
                <form action="update-style.php" method="POST">
                   
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select class="form-control custom-select" name="category" required>
                                <option selected disabled value="">Category Style</option>
                                <option value="0">Small 4/Row</option>
                                <option value="1">Standard 3/Row</option>
                                <option value="2">Sliding Style</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select class="form-control custom-select" name="slider" required>
                                <option selected disabled value="">Slider Position</option>
                                <option value="0">Slider Top</option>
                                <option value="1">Slider Down</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select class="form-control custom-select" name="product" required>
                                <option selected disabled value="">Product List Style</option>
                                <option value="1">Box Type</option>
                                <option value="0">Slide Type</option>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select class="form-control custom-select" name="subcategory" required>
                                <option selected disabled value="">Sub-category Style</option>
                                <option value="0">Small 4/Row</option>
                                <option value="1">Standard 3/Row</option>
                                <option value="2">Sliding Style</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <select class="form-control custom-select" name="trending" required>
                                <option selected disabled value="">Trending Section</option>
                                <option value="1">Enable</option>
                                <option value="0">Disable</option>
                              
                            </select>
                        </div>
                    </div>
                    
                    
                    <div class="form-button-group">
                        <button type="submit" class="btn btn-warning btn-block btn-lg">Update Style</button>
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

