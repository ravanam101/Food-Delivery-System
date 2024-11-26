<?php 
include '../pay/db.php';

session_start();

$sql="SELECT * FROM `settings`where id=1";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);
$style=$row["style"];
$appname=$row["appname"];


$sql2="SELECT * FROM `orders`";
$res2=mysqli_query($conn,$sql2);
$totalorders=(mysqli_num_rows($res2));

$offer="select * from `settings` where id=1";
    $offerqry=mysqli_query($conn,$offer);
    $offerres=mysqli_fetch_assoc($offerqry);
    $offer_image=$offerres['offer_image'];
    $bottom_banner=$offerres['bottom_banner'];
    $applogo=$offerres['applogo'];


$sql3="SELECT * FROM `dboy`where lid='$lid'";
$res3=mysqli_query($conn,$sql3);
$totaldboy=(mysqli_num_rows($res3));

$sql4="SELECT * FROM `user`";
$res4=mysqli_query($conn,$sql4);
$totaluser=(mysqli_num_rows($res4));
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
    <style>
        b {text-align: center;}
p {text-align: center;}
h3 {text-align: left;}
div {text-align: center;}
img {
    border-radius: 5%;
}
    </style>
</head>
<?php if(isset($_COOKIE['loginadmin'])){

?>
<body class="bg-white">

    <!-- loader -->
    <!--<div id="loader">-->
    <!--    <div class="spinner-border text-primary" role="status"></div>-->
    <!--</div>-->
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader ">
        <div class="left">
            <!--<a href="home.php" class="headerButton goBack">-->
            <!--    <ion-icon name="chevron-back-outline"></ion-icon>-->
            <!--</a>-->
        </div>
        <div class="pageTitle"><img src="images/<?php echo  $applogo; ?>" alt="image"  width="160" height="50"></div>
        <div class="right">
           
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2">
            <div class="profile-head">
                <!--<div class="avatar">-->
                <!--    <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w64 rounded">-->
                <!--</div>-->
                <div class="in">
                    
                   
                </div>
            </div>
        </div>
        
        <div class="tab-pane fade show active" id="feed" role="tabpanel">
            <div class="mt-1 mb-1 pr-1 pl-1">
                <div class="row">
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="orders.php"><img src="https://cdn-icons-png.flaticon.com/512/1532/1532688.png" alt="image"  width="90" height="90"><br></a> 
                        <strong>Orders</strong>
                        
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="return-orders.php"><img src="https://cdn-icons-png.flaticon.com/512/7132/7132913.png" alt="image"  width="90" height="90"><br></a> 
                        <strong>Return Requests</strong>
                        
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="customer.php"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7gXPWxo_fQPzvP2TNGFtHzqQiChF6VklO68Fydsig_A69sVnizAMg_bxzCLvFEDMpwI8&usqp=CAU" alt="image"  width="90" height="90"><br></a> 
                        <strong>Customers</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="category.php"><img src="https://thumbs.dreamstime.com/b/black-mix-icon-category-class-hierarchy-logo-range-series-159893237.jpg" alt="image"  width="90" height="90"><br></a> 
                        <strong>Category</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="subcategory.php"><img src="https://thumbs.dreamstime.com/b/category-icon-189057199.jpg" alt="image"  width="90" height="90"><br></a> 
                        <strong>Sub-Category</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="product.php"><img src="https://www.freepnglogos.com/uploads/box-png/box-png-transparent-google-objects-pinterest-9.png" alt="image"  width="90" height="90"><br></a> 
                        <strong>Products</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="app-settings.php"><img src="https://cdn-icons-png.flaticon.com/512/306/306433.png" alt="image"  width="90" height="90"><br></a> 
                        <strong>App Settings</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="payment.php"><img src="https://cdn-icons-png.flaticon.com/512/845/845547.png" alt="image"  width="90" height="90"><br></a> 
                        <strong>Payment Gateway</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="delivery-charges.php"><img src="https://apps.odoo.com/web/image/loempia.module/73718/icon_image?unique=217a18c" alt="image"  width="90" height="90"><br></a> 
                        <strong>Delivery Charges</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="bonus.php"><img src="https://cdni.iconscout.com/illustration/premium/thumb/girl-getting-cashback-offer-5120752-4283685.png" alt="image"  width="90" height="90"><br></a> 
                        <strong>Bonus & Cash-back</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="pages.php"><img src="pages.png" alt="image"  width="90" height="90"><br></a> 
                        <strong>Pages</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="slider.php"><img src="https://www.uxmatters.com/mt/archives/2019/07/images/Hoober-Carousels-2-ANIMATED.gif" alt="image"  width="90" height="90"><br></a> 
                        <strong>Sliders</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="offer-image.php"><img src="https://cdn-icons-png.flaticon.com/512/1160/1160358.png" alt="image"  width="90" height="90"><br></a> 
                        <strong>Offer Image</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="style.php"><img src="https://cdn4.iconfinder.com/data/icons/optimisation-color/64/change-process-operation-modify-switch-512.png" alt="image"  width="90" height="90"><br></a> 
                        <strong>Style Settings</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="updatelogo.php"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQk-4SVNYORiQtXPTZEYLn1NsFtC1UcXrxttwrfayPmCYb5ldBan-dUZU5u1hTSRcN3wd8&usqp=CAU" alt="image"  width="90" height="90"><br></a> 
                        <strong>App Logo</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="bottom-banner.php"><img src="https://media.flaticon.com/dist/min/img/collections/collection-tour.svg" alt="image"  width="90" height="90"><br></a> 
                        <strong>Bottom Banner</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="delivery-boy.php"><img src="https://www.pngitem.com/pimgs/m/3-37779_transparent-delivery-png-delivery-boy-with-bike-png.png" alt="image"  width="90" height="90"><br></a> 
                        <strong>Delivery Boy</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="notify.php"><img src="https://indyme.com/wp-content/uploads/2020/11/notification-icon.png" alt="image"  width="90" height="90"><br></a> 
                        <strong>Send Notification</strong>
                        </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <div class="card product-card border border-grey shadow">
                        <div class="card-body" >
                        <a href="searched-products.php"><img src="https://thumbs.dreamstime.com/b/product-research-color-icon-vector-illustration-sign-isolated-symbol-231471939.jpg" alt="image"  width="90" height="90"><br></a> 
                        <strong>Searched Products</strong>
                        </div>
                        </div>
                    </div>
                    
                </div>
               
            </div>
            </div>
        </div>

    


        

    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    <div class="appBottomMenu">
      <a href="logout.php" class="btn btn-dark btn-block">Logout</a>
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">

                    <!-- profile box -->
                    <div class="profileBox">
                        <div class="image-wrapper">
                            <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged rounded">
                        </div>
                        <div class="in">
                            <strong>Julian Gruber</strong>
                            <div class="text-muted">
                                <ion-icon name="location"></ion-icon>
                                California
                            </div>
                        </div>
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    
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
};?>

<script>
document.oncontextmenu = function() { 
                return false; };
      </script>
</body>

</html>