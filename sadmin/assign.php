
<?php
include '../pay/db.php';
session_start();

$oid=mysqli_real_escape_string($conn,$_GET['oid']);


// $sql="SELECT * FROM `subscription`where aid='$aid'";
// $res=mysqli_query($conn,$sql);
// $row= mysqli_fetch_assoc($res);
// $aname=$row["aname"];
// $appname=$row["appname"];



$sql2="SELECT * FROM `orders`where oid='$oid'";
$res2=mysqli_query($conn,$sql2);
// $totalorders=(mysqli_num_rows($res2));
$row2= mysqli_fetch_assoc($res2);
$dstatus=$row2['status'];



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
        if($dstatus=="Order Placed"){
?>

    <!-- loader -->
    <!--<div id="loader">-->
    <!--    <div class="spinner-border text-primary" role="status"></div>-->
    <!--</div>-->
    <!-- * loader -->


    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">

        <div class="login-form mt-1">
            <div class="section">
                <img src="https://static.vecteezy.com/system/resources/thumbnails/001/977/437/small/delivery-workers-with-face-masks-and-motorcycle-free-vector.jpg" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                
                <h3><?php echo $appname; ?></h3>
                <h4>Assign Delivery Boy for the order ID: <?php echo $oid; ?></h4>
            </div>
            <div class="section mt-1 mb-5">
                <!--<form action="processlocation.php" method="POST">-->
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                           <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Assign a delivery Boy
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
     <?php $sql1="SELECT * FROM `dboy`where  status=1 ";
$res1=mysqli_query($conn,$sql1);
while($row1= mysqli_fetch_array($res1)){ ?>
    <a class="dropdown-item" href="assignprocess.php?oid=<?php echo $oid; ?>&&did=<?php echo $row1['did'];?>"><?php echo $row1['dname'];?></a>
   <?php } ?>
  </div>
</div>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                           
                             <!--<input type="hidden" class="form-control" name="aid" value="<?php echo $aid; ?>">-->
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


<?php
}else{header("Location:orders.php?aid=$aid&&lid=$lid"); };
            
        }else{
     $mes="Wrong Credentials";
   header("Location:index.php?aid=$aid&&message=$mes");
};?>
<script>
document.oncontextmenu = function() { 
                return false; };
      </script>
</body>

</html>

