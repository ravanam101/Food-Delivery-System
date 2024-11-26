<?php 
 session_start();


include 'pay/db.php';
$sql="SELECT * FROM `settings`where id=1";
$qry=mysqli_query($conn,$sql);
$raw=mysqli_fetch_assoc($qry);
$appname=$raw['appname'];

if(isset($_COOKIE['phone'])){
  
header("Location:shop.php");}
	?>


<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-transparent">
    <meta name="theme-color" content="#FC5431">
    <title><?php echo $appname; ?></title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body class="bg-white" onload="getLocation();">

    <!-- loader -->
    <!-- <div id="loader"> -->
    <!--    <img src="sadmin/images/<?php echo  $applogo; ?>" alt="logo" width="220" height="50"> -->
        <!--<div class="spinner-grow text-warning" role="status"></div>-->
    <!-- </div> -->
    <!-- * loader -->


    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">
<br><br>
        <div class="login-form mt-4">
            <div class="section">
                <img src="./sadmin/images/<?php echo $applogo; ?>" alt="image" height="100" width="260">
            </div>
            <div class="section mt-4">
                <h3>Welcome to <?php echo $appname; ?></h3>
                <!--<h1></h1>-->
                <h4>Enter Your Number to Signup or Login </h4>
            </div>
            <div class="section mt-3 mb-5">
                <form action="otp.php" method="POST">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <input type="number" class="form-control" name="phone" placeholder="Enter Phone No.">
                           
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    
                    <div class="section mt-1 mb-5">
                       
                            <!--<a href="location.php">-->
                       <!--<button class="btn btn-outline-secondary">Skip Login</button></a>-->
                        <!--<div><a href="page-forgot-password.html" class="text-muted">Forgot Password?</a></div>-->
                    
                    </div>

                    <div class="form-button-group">
                        <button type="submit" class="btn btn-dark btn-block btn-lg">Signup or Login</button>
                    </div>
                   
                </form>
                <br>
                <div class="section mt-8 mb-1" >
                    <a href="shop.php">
                    <div class="form-button mt-6" >
                        <button  class="btn btn-outline-secondary">Skip Login</button>
                    </div></a>
                </div>
            </div>
        </div>


    </div>
    <!-- * App Capsule -->
     <script language="JavaScript">
      
       window.onload = function () {
           document.addEventListener("contextmenu", function (e) {
               e.preventDefault();
           }, false);
           document.addEventListener("keydown", function (e) {
               //document.onkeydown = function(e) {
               // "I" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                   disabledEvent(e);
               }
               // "J" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                   disabledEvent(e);
               }
               // "S" key + macOS
               if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                   disabledEvent(e);
               }
               // "U" key
               if (e.ctrlKey && e.keyCode == 85) {
                   disabledEvent(e);
               }
               // "c" key
               if (e.ctrlKey && e.keyCode == 67) {
                   disabledEvent(e);
               }
               // "F12" key
               if (event.keyCode == 123) {
                   disabledEvent(e);
               }
           }, false);
           function disabledEvent(e) {
               if (e.stopPropagation) {
                   e.stopPropagation();
               } else if (window.event) {
                   window.event.cancelBubble = true;
               }
               e.preventDefault();
               return false;
           }
       }
//edit: removed ";" from last "}" because of javascript error
</script>

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

</body>

</html>