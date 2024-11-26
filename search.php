<?php
session_start();
include 'pay/db.php';

$phone=$_COOKIE['phone'];
$sqi="select * from `user` where userphone=$phone";
$qri=mysqli_query($conn,$sqi);
$rei=mysqli_fetch_assoc($qri);
$uid=$rei['userid'];
$username=$rei['username'];
$wallet=$rei['wallet'];

$countcart="select * from `cart` where uid=$uid";
$qryyy=mysqli_query($conn,$countcart);
$noofitem=mysqli_num_rows($qryyy);

$offer="select * from `settings` where id=1";
    $offerqry=mysqli_query($conn,$offer);
    $offerres=mysqli_fetch_assoc($offerqry);
    $offer_image=$offerres['offer_image'];
    $bottom_banner=$offerres['bottom_banner'];
    $applogo=$offerres['applogo'];
    $appname=$offerres['appname'];
    
$uid=$_SESSION['login'];
$search=mysqli_real_escape_string($conn,$_GET['search']);
$sql="INSERT INTO `search` (`id`, `item`) VALUES (NULL, '$search');";
$qry=mysqli_query($conn,$sql);

?>



<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title><?php echo  $appname; ?></title>
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

<body>

    <!-- loader -->
    <!--<div id="loader">-->
    <!--    <img src="sadmin/images/<?php echo  $applogo; ?>" alt="logo" width="220" height="50">-->
        <!--<div class="spinner-grow text-warning" role="status"></div>-->
    <!--</div>-->
    <!-- * loader -->

    <div class="appHeader">
               <div class="left">
            <a href="shop.php" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
                <div class="pageTitle">
                    <img src="sadmin/images/<?php echo  $applogo; ?>" alt="logo" width="180" height="50">
                </div>
                <div class="right">
            <!--<a href="javascript:;" class="headerButton toggle-searchbox">-->
            <!--    <ion-icon name="search-outline"></ion-icon>-->
            <!--</a>-->
            <a href="cart.php?sid=<?php echo $sid;?>&uid=<?php echo $uid;?>" class="headerButton">
                <ion-icon name="cart-outline"></ion-icon>
                <span class="badge badge-danger"><?php echo $noofitem; ?></span>
            </a>
        </div>
            </div>
   
    <!-- Search Component -->
    <div id="search" class="appHeader">
        <form class="search-form">
            <div class="form-group searchbox">
                <input type="text" class="form-control" placeholder="Search...">
                <i class="input-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i>
                <a href="javascript:;" class="ml-1 close toggle-searchbox">
                    <ion-icon name="close-circle"></ion-icon>
                </a>
            </div>
        </form>
    </div>
    <!-- * Search Component -->

   
   
   
   
   
    <!-- App Capsule -->
    <div id="appCapsule">
        

     
     <div class="header-large-title">
<h3 class="subtitle">Try India's Most Delicious Non-Veg Delicacies</h3>
<div class="tab-pane fade show active" id="feed" role="tabpanel">
    <div class="mt-1 mb-1 pr-1 pl-1">
        <div class="row">
            <?php 
                $sql1 = "SELECT * FROM `products` WHERE pname LIKE '%$search%' ORDER BY cid ASC"; 
                $raw1 = mysqli_query($conn, $sql1);
                while ($res1 = mysqli_fetch_array($raw1)) {
            ?>
            <div class="col-6 mb-3">
                <div class="card product-card border border-grey shadow">
                    <div class="card-body">
                        <?php
                        $imgtype = $res1['imgtype'];
                        if ($imgtype == 1) { ?>
                            <a href="product.php?pid=<?php echo $res1['pid']; ?>">
                                <img src="<?php echo $res1['pimage']; ?>" alt="image" width="90" height="90">
                            </a><br><b>
                        <?php } else { ?>
                            <a href="product.php?pid=<?php echo $res1['pid']; ?>">
                                <img src="sadmin/images/<?php echo $res1['pimage']; ?>" alt="image" width="90" height="90">
                            </a><br><b>
                        <?php }; ?>
                        <?php
                        $str = $res1['pname'];
                        echo $str;
                        ?></b><br>
                        ₹ <?php echo $res1['price']; ?> / <?php echo $res1['punit']; ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
     
     
     
     

                 
        
    
        
        
        
       
        

           
        </div>
        <!-- * app footer -->

    </div>
    <!-- * App Capsule -->


      <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="shop.php" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
       
        <a href="cart.php?sid=<?php echo $sid;?>&uid=<?php echo $uid;?>" class="item">
            <div class="col">
                <ion-icon name="cart-outline"></ion-icon>
                <span class="badge badge-danger"><?php echo $noofitem; ?></span>
            </div>
        </a>
        <a href="myorder.php?uid=<?php echo $uid; ?>" class="item">
            <div class="col">
                <ion-icon name="layers-outline"></ion-icon>
            </div>
        </a>
        <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </a>
    </div>
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">

                    <!-- profile box -->
                    <div class="profileBox bg-secondary">
                        <!--<div class="image-wrapper">-->
                        <!--     <img src="logo.png" alt="logo" width="100" height="25">-->
                        <!--</div>-->
                        <div class="in">
                        <?php if(isset($_COOKIE['phone'])) { ?>    
                             <strong><?php echo $username?></strong>
                             <p>Wallet Balance: Rs.<?php echo $wallet?></p> 
                             <?php }else{ ?>
                             <strong>Welcome Guest</strong>
                             <a href="index.php"><button class="btn btn-dark btn-sm">
                                Please Login First
                             </button>
                             </a>
                             <?php }; ?>
                        </div>
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <ul class="listview flush transparent no-line image-listview mt-2">
                        <li>
                            <a href="shop.php" class="item">
                                <div class="icon-box bg-secondary">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Home
                                </div>
                            </a>
                        </li>
                        
                        <li>
                            <a href="myorder.php?uid=<?php echo $uid;?>" class="item">
                                <div class="icon-box bg-secondary">
                                    <ion-icon name="logo-buffer"></ion-icon>
                                </div>
                                <div class="in">
                                    Order History
                                </div>
                            </a>
                        </li>
                        
                        
                      
                        
                        <li>
                            <div class="item">
                                <div class="icon-box bg-secondary">
                                    <ion-icon name="moon-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Dark Mode</div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input dark-mode-switch"
                                            id="darkmodesidebar">
                                        <label class="custom-control-label" for="darkmodesidebar"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php 
                    $sqlee="select * from `pages`";
                    $qryee=mysqli_query($conn,$sqlee);
                    while($rowse=mysqli_fetch_array($qryee)){
                    
                    ?>
                        
                        <li>
                            <a href="page.php?id=<?php echo $rowse['id'];?>" class="item">
                                <div class="icon-box bg-secondary">
                                    <ion-icon name="newspaper-outline"></ion-icon>
                                </div>
                                <div class="in">
                                   <?php echo $rowse['title'];?>
                                </div>
                            </a>
                        </li>
                      <?php };?>  
                       
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=91<?php echo  $rows['phone']; ?>" class="item">
                                <div class="icon-box bg-secondary">
                                    <ion-icon name="ribbon-outline"></ion-icon>
                                </div>
                                <div class="in">
                                   Rate & Review
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="https://api.whatsapp.com/send?phone=91<?php echo  $rows['phone']; ?>" class="item">
                                <div class="icon-box bg-secondary">
                                    <ion-icon name="hand-left-outline"></ion-icon>
                                </div>
                                <div class="in">
                                   Complaints
                                </div>
                            </a>
                        </li>
                        <li>
                            <?php if(isset($_COOKIE['phone'])) { ?> 
                            <a href="logout.php" class="item">
                                <div class="icon-box bg-secondary">
                                    <ion-icon name="log-out-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Logout
                                </div>
                            </a> <?php }; ?>
                        </li>
                    </ul>
<!-- sidebar buttons -->
                <div class="sidebar-buttons">
                    <?php 
                    $sqle="select * from `settings` where id=1";
                    $qrye=mysqli_query($conn,$sqle);
                    $rows=mysqli_fetch_assoc($qrye);
                    
                    ?>
                    <a href="tel:+91<?php echo  $rows['whatsapp']; ?>" class="button">
                        <ion-icon name="call-outline"></ion-icon>
                    </a>
                    <a href="https://api.whatsapp.com/send?phone=91<?php echo  $rows['phone']; ?>" class="button">
                        <ion-icon name="logo-whatsapp"></ion-icon>
                    </a>
                    <!--<a href="javascript:;" class="button">-->
                    <!--    <ion-icon name="settings-outline"></ion-icon>-->
                    <!--</a>-->
                    <!--<a href="javascript:;" class="button">-->
                    <!--    <ion-icon name="log-out-outline"></ion-icon>-->
                    <!--</a>-->
                </div>
                <!-- * sidebar buttons -->
                    
                
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->
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


    // <script>
    //     setTimeout(() => {
    //         notification('notification-welcome', 5000);
    //     }, 2000);
    // </script>
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
</body>

</html>