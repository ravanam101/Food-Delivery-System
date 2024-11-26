<?php
include 'pay/db.php';
 $uphone=$_COOKIE['phone'];
      $sql="SELECT * FROM `user` WHERE userphone=$uphone";
$getuid=mysqli_query($conn,$sql);
$result= mysqli_fetch_assoc($getuid);
$uid=$result['userid'];

$countcart="select * from `cart` where uid=$uid";
$qryyy=mysqli_query($conn,$countcart);
$noofitem=mysqli_num_rows($qryyy);

// $sid=mysqli_real_escape_string($conn,$_GET['sid']);
// $lid=mysqli_real_escape_string($conn,$_GET['lid']);
$pid=mysqli_real_escape_string($conn,$_GET['pid']);
  
  $qry1="SELECT * FROM `products` WHERE pid=$pid";
$raw1=mysqli_query($conn,$qry1);
$res1= mysqli_fetch_assoc($raw1);
$pname=$res1['pname'];
$cid=$res1['cid'];
$punit=$res1['punit'];
$mrp=$res1['mrp'];
$price=$res1['price'];
$pdesc=$res1['pdesc'];
$pimage=$res1['pimage'];
$imgtype=$res1['imgtype'];
 $disc=($res1['mrp']-$res1['price'])*100/$res1['mrp'];
                        $discount=(round($disc));
  
$offer="select * from `settings` where id=1";
    $offerqry=mysqli_query($conn,$offer);
    $offerres=mysqli_fetch_assoc($offerqry);
    $offer_image=$offerres['offer_image'];
    $bottom_banner=$offerres['bottom_banner'];
    $applogo=$offerres['applogo'];

// $qry="SELECT * FROM `services` where id='$id'";
// $raw=mysqli_query($conn,$qry);
// $res= mysqli_fetch_assoc($raw);

// $qryreview="SELECT * FROM `review` where serviceid='$id'";
// $rawreview=mysqli_query($conn,$qryreview);
// $resreview= mysqli_fetch_assoc($rawreview);
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
    <title><?php echo$res1["appname"] ?></title>
    <meta name="description" content="<?php echo$res1["appname"] ?>">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    
    
    <style>
         .site-footer {
            background-color: #000;
            color: #fff;
            padding: 20px ;
        }

        .site-footer-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            max-width: 1200px;
            margin: 0 auto;
        }

        .site-footer-section {
            flex: 1;
            min-width: 200px;
            margin: 10px;
        }

        .site-footer-section #down {
            margin-bottom: 10px;
            color:white;
        }

        .site-footer-section ul {
            list-style: none;
            padding: 0;
            FLOAT: LEFT;
    TEXT-ALIGN: LEFT;
        }

        .site-footer-section ul li {
            margin-bottom: 5px;
        }

        .site-footer-section ul li a {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
        }

        .site-footer-section ul li a:hover {
            color: #aaa;
        }

        .social-icons {
            display: flex;
            margin-top: 10px;
        }

        .social-icons a {
            color: #fff;
            font-size: 24px;
            margin-right: 10px;
            transition: color 0.3s;
        }

        .social-icons a:hover {
            color: #aaa;
        }

        .download-links {
            display: flex;
            margin-bottom: 10px;
        }

        .download-links a {
            margin-right: 10px;
        }

        .download-links img {
            width: 120px; /* Set a fixed width */
            height: 40px; /* Set a fixed height */
        }

        .footer-bottom {
            text-align: center;
            padding: 10px 0;
            border-top: 1px solid #444;
            margin-top: 20px;
                display: flex;
    justify-content: center;
        }

        .footer-bottom p {
            margin: 0;
                display: flex;
        }

        .footer-bottom a.footer-link {
            color: #fff;
            text-decoration: none;
            transition: color 0.3s;
            margin-left: 7px;
    margin-right: 11px;
        }

        .footer-bottom a.footer-link:hover {
            color: #aaa;
        }

        /* Hide footer on mobile devices */
        @media (max-width: 768px) {
            .site-footer {
                display: none;
            }
        }
        
        
        .left {
    display: flex;
    align-items: center; /* Ensures content is vertically centered */
}

.headerButton.goBack {
    display: inline-flex; /* Makes sure the button behaves like a button */
    align-items: center;  /* Vertically centers the icon and text */
    text-decoration: none; /* Removes underline */
    color: #000; /* Adjust to the desired text color */
    padding: 10px; /* Increases clickable area */
    cursor: pointer; /* Ensures a pointer cursor on hover */
    font-size: 16px; /* Adjust font size */
}

.headerButton.goBack ion-icon {
    margin-right: 5px; /* Space between icon and text */
}

.headerButton.goBack:hover {
    color: #007bff; /* Changes color on hover */
}

.headerButton.goBack:focus {
    outline: none; /* Removes default outline on focus */
}

    </style>
</head>

<body>

    <!-- loader -->
    <!-- <div id="loader">-->
    <!--    <img src="sadmin/images/<?php echo  $applogo; ?>" alt="logo" width="220" height="50">-->
        <!--<div class="spinner-grow text-warning" role="status"></div>-->
    <!--</div>-->
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader">
              <div class="left">
    <a href="shop.php" class="headerButton goBack">
        <ion-icon name="chevron-back-outline"></ion-icon>
    </a>
</div>

                </div>
                <!--<div class="pageTitle">-->
                <!--    <img src="sadmin/images/<?php echo  $applogo; ?>" alt="logo" width="200" height="50">-->
                <!--</div>-->
                <div class="right">
            <a href="javascript:;" class="headerButton toggle-searchbox">
                <ion-icon name="search-outline"></ion-icon>
            </a>
        </div>
            </div>
    
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
        
        <!-- carousel -->
        <?php if($imgtype==1){?>
        <div class="carousel-full owl-carousel owl-theme">
             <div class="item">
                <img src="<?php echo $pimage;?>" alt="alt" width="200" height="300">
            </div> <?php }else{ ?>
            <div class="carousel-full owl-carousel owl-theme">
             <div class="item">
                <img src="sadmin/images/<?php echo $pimage;?>" alt="alt" width="200" height="300">
            </div> <?php }; ?>
            <?php
    $qry="SELECT * FROM `addl_image` where pid=$pid";
        $raw=mysqli_query($conn,$qry);
        $totalrows=(mysqli_num_rows($raw));
        if($totalrows>0){
        while($res= mysqli_fetch_array($raw)){?>
            
            <div class="item">
                <img src="sadmin/images/<?php echo ($res['image']);?>"  width="200" height="300">
            </div>
           <?php };}?>
          
        </div>
        <!-- * carousel -->

        <div class="section full">
            <div class="wide-block pt-2 pb-2 product-detail-header">
                <h1 class="title"><?php echo $pname;;?></h1>
                <!-- <div class="text">Discount: <?php if($discount>0) echo $discount."% off";?></div> -->
                <div class="detail-footer">
                    <!-- price -->
                    <div class="price">
                    <!--    <div class="old-price">Rs. <?php echo $mrp;?></div> -->
                        <div class="current-price">Rs.<?php echo $price;?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section full mt-2">
            <div class="section-title"></div>
            <div class="wide-block pt-2 pb-2">
                <?php echo $pdesc;?>
            </div>

        </div>

       

        <div class="section full">
            <div class="wide-block pt-2 pb-2 product-detail-header">
                <!-- <h1 class="title"><?php echo $pname;;?></h1> -->
                <!-- <div class="text">Discount: <?php if($discount>0) echo $discount."% off";?></div> -->
                <div class="detail-footer">
                    <!-- price -->
                    <!-- <div class="price"> -->
                    <!--    <div class="old-price">Rs. <?php echo $mrp;?></div> -->
                    <!--    <div class="current-price">Rs.<?php echo $price;?></div> -->
                    <!-- </div> -->
                    <!-- * price -->
                    <!-- amount -->
                    <!-- <div class="amount">
                        <div class="stepper stepper-secondary">
                            <a href="#" class="stepper-button stepper-down">-</a>
                            <input type="text" class="form-control" value="1" disabled/>
                            <a href="#" class="stepper-button stepper-up">+</a>
                        </div>
                    </div> -->
                    <!-- * amount -->
                </div>
                <p><a href="add-to-cart.php?pid=<?php echo $pid?>&pvi=0">
                <button class="btn btn-secondary btn-lg btn-block">
                    <ion-icon name="cart-outline"></ion-icon>
                   ₹ <?php echo $price;?>/-  &nbsp <?php echo $punit;?>
                </button></a><p>
                 <?php
    $qry="SELECT * FROM `protuct_varient` where pid=$pid";
        $raw=mysqli_query($conn,$qry);
        
        while($res= mysqli_fetch_array($raw)){?>
               <?php $pvi=$res['pvi']; ?>
                <p><a href="add-to-cart.php?pid=<?php echo $pid; ?>&pvi=<?php echo $pvi; ?>">
                <button class="btn btn-secondary btn-lg btn-block">
                    <ion-icon name="cart-outline"></ion-icon>
                    ₹ <?php echo $res['price'];?>/- &nbsp <?php echo $res['unit'];?>
                </button></a><p>
                
              <?php } ?>  
            </div>
        </div>
        
        <div class="section full mt-2 mb-3">
            <div class="section-title mb-1">You may also like</div>

            <div class="carousel-multiple owl-carousel owl-theme">
                  <?php 
  $qry4="SELECT * FROM `products` WHERE cid=$cid";
$raw4=mysqli_query($conn,$qry4);
while($res4= mysqli_fetch_assoc($raw4)){ 
$disc=($res4['mrp']-$res4['price'])*100/$res4['mrp'];
                        $discount=(round($disc));
?>
                
                <div class="item">
                    <a href="product.php?pid=<?php echo $res4['pid'];?>">
                    <div class="card product-card shadow">
                        <div class="card-body">
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded bg-warning"><?php if($discount>0) echo $discount."% off";?></span> 
                             <?php if($imgtype==1){?>
                            <img src="<?php echo $res4['pimage'];?>" width="90" height="120" alt="product image">
                            <?php }else{ ?>
                             <img src="sadmin/images/<?php echo $res4['pimage'];?>" width="90" height="120" alt="product image">
                             <?php }; ?>
                            <h2 class="title"><?php echo ($res4['pname']);?></h2>
                            <p class="text"><s>MRP: <?php echo ($res4['mrp']);?></s></p>
                            <div class="price">Rs.<?php echo ($res4['price']);?></div>
                            <!--<a href="#" class="btn btn-sm btn-primary btn-block">Book now</a>-->
                        </div>
                    </div></a>
                </div>
                               <?php 
$cnt=$cnt+1;
}   ?>
                
                
            </div>
        </div>

    </div>
     <footer class="site-footer">
        <div class="site-footer-container">
            <div class="site-footer-section">
                <h3 id="down" >Download Now</h3>
                <div class="download-links">
                    <a href="#"><img src="app stroe.png" alt="App Store"></a>
                    <a href="#"><img src="goole play.png" alt="Google Play"></a>
                </div>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="site-footer-section">
                <h3 id="down">Useful Links</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="site-footer-section">
                <h3 id="down">Contact</h3>
                <ul>
                  <li>Address: J block, Shop 1, Beside Near Kachori Wala Outlet, H-1, Market Rd, Vikaspuri, New Delhi, Delhi 110018</li>  
                    <li><a href="mailto:support@yourcompany.com">Email: contact@muttchik.com</a></li>
                    <li><a href="tel:+1234567890">Phone: +123-456-7890</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 <a href="https://yourcompany.com" target="_blank" class="footer-link">Muttchik</a>. All rights reserved.</p>
        </div>
    </footer>
    <!-- * App Capsule -->

    <!-- * App Capsule -->


    <!-- App Bottom Menu -->
      <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="shop.php" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
       
        <a href="cart.php?sid=1&uid=<?php echo $uid;?>" class="item">
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