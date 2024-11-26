<?php
session_start();
include 'pay/db.php';
include 'paytm/app_config.php';
$phone=$_COOKIE['phone'];
$sqi="select * from `user` where userphone=$phone";
$qri=mysqli_query($conn,$sqi);
$rei=mysqli_fetch_assoc($qri);
$uid=$rei['userid'];
$username=$rei['username'];

$countcart="select * from `cart` where uid=$uid";
$qryyy=mysqli_query($conn,$countcart);
$noofitem=mysqli_num_rows($qryyy);
$bottombanner="https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/c86c2563154543.5aa7c66ed2b1f.gif";
$sid=1;
$lid=1;

$cql="select * from `style` where id=1";
$row=mysqli_query($conn,$cql);
$cres=mysqli_fetch_assoc($row);
$style=$cres['category_style'];
$sliderstyle=$cres['slider_position'];
$pro=$cres['product_list'];
$trending_section=$cres['trending_section'];

$offer="select * from `settings` where id=1";
    $offerqry=mysqli_query($conn,$offer);
    $offerres=mysqli_fetch_assoc($offerqry);
    $offer_image=$offerres['offer_image'];
    $bottom_banner=$offerres['bottom_banner'];
    $applogo=$offerres['applogo'];
    $appname=$offerres['appname'];
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
    <title><?php echo $appname; ?></title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
    

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" id="link-fa">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" id="link-bootstrap">

    <style>
b {text-align: center;}
p {text-align: center;}
h3 {text-align: left;}
div {text-align: center;}
img {
    border-radius: 5%;
    
    
}


 .site-footer {
            background-color: #333;
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

        .site-footer-section h3 {
            margin-bottom: 10px;
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
.container-box50 {
    text-align: center;
    width: 100%;
    padding-left: 20px;
    padding-right: 20px;
}

.carousel-heading {
    margin-bottom: 20px;
    font-size: 24px;
    color: #333;
    text-align: left;
}

.carousel-container {
    position: relative;
    width: 100%;
    max-width: 1800px;
    overflow: hidden;
    border: 2px solid #ccc;
    background-color: #f9f9f9;
    margin: 0 auto;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 30px;
}

.carousel-wrapper {
    display: flex;
    transition: transform 0.5s ease;
    height: 300px;
    width: 1000px;
}

.carousel-card {
    flex: 0 0 calc(100% / 4 - 20px); /* Adjust card width for desktop view */
    box-sizing: border-box;
    padding: 10px;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 0 10px;
    transition: transform 0.3s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-radius: 5px;
}

.carousel-card:hover {
    transform: scale(1.05);
}

.carousel-card img {
    width: 100%;
    height: 300px;
    object-fit: cover;
    border-radius: 5px 5px 0 0;
}

/* Remove card-text style */
.carousel-card-text {
    display: none; /* Hide the card text */
}

.carousel-arrows {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: #fff;
    border: none;
    padding: 10px;
    cursor: pointer;
    z-index: 1;
}

.carousel-prv {
    left: 10px;
}

.carousel-next {
    right: 10px;
}

/* Responsive styles */
@media (max-width: 992px) {
    .carousel-card {
        flex: 1 0 33.33%;
    }
}

@media (max-width: 768px) {
    .carousel-card {
        flex: 1 0 50%;
    }
}

@media (max-width: 576px) {
    .carousel-card {
        flex: 1 0 100%;
    }
    .carousel-wrapper {
    display: flex;
    transition: transform 0.5s ease;
    width: 200px;
    height: 300px;
}
}





.container12 {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 40vh;
            background-color: #ffffff;
        }

        /* Make the GIF responsive */
        #responsive-gif {
            width: 100%; /* Adjusts to the width of its container */
            height: auto; /* Maintains aspect ratio */
            max-width: 400px; /* Optional: Maximum size for the GIF */
            /* Optional: Add some border styling */
            border-radius: 8px; /* Optional: Rounded corners */
        }

        /* Hide the GIF on screens wider than 768px (tablet and desktop) */
        @media (min-width: 768px) {
            #responsive-gif {
                display: none;
            }
        }
        
        
         #loader {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 99999;
            background: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #loader .loading-icon {
            width: 500px; /* Adjust width as needed */
            height: auto;
            object-fit: cover;
        }
        
          @media (min-width: 765px) {
            .loading-icon { 
                   display: none;
                }
        }
        
        
        
           #loader1 {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            z-index: 99999;
            background: rgba(255, 255, 255, 0.9); /* Slightly transparent background */
            display: flex !important; /* Force display */
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100vh; /* Full viewport height */
            overflow: hidden;
            visibility: visible !important; /* Ensure visibility */
            opacity: 1 !important; /* Make sure it's not transparent */
        }

        .loading-icon1 {
            width: 15vw; /* Responsive width based on viewport */
            max-width: 150px; /* Max width to ensure it doesn’t get too large */
            min-width: 350px; /* Min width for desktop */
            height: auto;
        }

        @media (max-width: 600px) {
            .loading-icon1 {
                width: 30vw; /* Adjust size for smaller screens */
                max-width: 200px; /* Smaller max-width for mobile */
                
            }
        }
        @media (min-width: 765px) {
            .loading-icon1 { 
                   display: none;
                }
        }
</style> 
</head>

<body onload="getLocation()">

  
                     
  <div>
        <!-- loader -->
        <div id="loader">
            <img src="muttchikapp2.gif" alt="Loading..." class="loading-icon">
        </div>
    </div>




    <div class="appHeader" >
                <div class="left">
                 <a href="#" class="headerButton" id="toggle" data-toggle="modal" data-target="#sidebarPanel">
                <ion-icon name="menu-outline"></ion-icon>
            </a> 
                </div>
                <div class="pageTitle">
                    <img src="sadmin/images/<?php echo  $applogo; ?>" alt="logo" width="200" height="50">
                </div>
                <div class="right">
            <a href="javascript:;" class="headerButton toggle-searchbox">
            <ion-icon name="search-outline"></ion-icon>
            </a>
            <a href="cart.php?sid=<?php echo $sid;?>&uid=<?php echo $uid;?>" class="headerButton">
                <ion-icon name="cart-outline"></ion-icon>
                <span class="badge badge-danger"><?php echo $noofitem; ?></span>
            </a>
        </div>
            </div>
   
    <!-- Search Component -->
    <div id="search" class="appHeader">
        <form class="search-form" action="search.php" method="GET">
            <div class="form-group searchbox">
                <input type="text" class="form-control" name="search" placeholder="Search...">
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
        

<?php if($sliderstyle==1){ ?> 
    <img src="sadmin/images/<?php echo  $offer_image; ?>" alt="alt" width="330" height="120" class="border border-grey  shadow-sm mt-1"> <br> <?php };?>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <a href="https://muttchik.com/app/subcategory.php?cid=10"> <!-- Link for the first image -->
        <img src="png1.jpg" class="d-block w-100" alt="...">
      </a>
    </div>
    <div class="carousel-item">
      <a href="https://muttchik.com/app/subcategory.php?cid=1"> <!-- Link for the second image -->
        <img src="png2.jpg" class="d-block w-100" alt="...">
      </a>
    </div>
    <div class="carousel-item">
      <a href="https://muttchik.com/app/subcategory.php?cid=10"> <!-- Link for the third image -->
        <img src="png3.jpg" class="d-block w-100" alt="...">
      </a>
    </div>
  </div>
</div>


        <div class="header-large-title">
            <!--<img src="bnr.png" alt="logo" width="330" height="120"><br>-->
            <!--<h1 class="title">Discover</h1>-->
            <!--<h3 class="subtitle">Shop by category</h3>-->
            
        </div>

            <!--<div class="divider bg-dark mt-2 mb-3"></div>-->
    <!---------------------------------CATEGORY SECTION STARTS ----------------------------->
    <?php if ($style==1){ ?>
    
    
         <div class="tab-pane fade show active" id="feed" role="tabpanel">
                    <div class="mt-2 pr-2 pl-2">
                        
                    
                        
                        
                        <div class="row">
                            
                                <?php
                                $sql7="SELECT * FROM `category` ;"; 
                                $raw7=mysqli_query($conn,$sql7);
                                while($res7=mysqli_fetch_array($raw7)){
                                ?>
    
                                        <div class="col-4 mb-2">
                                           <a href="subcategory.php?cid=<?php echo $res7['cid'] ;?>"> <img src="sadmin/images/<?php echo  $res7['cimage']; ?>" alt="image" width="90" height="90" class="border border-grey rounded-circle shadow"></a>
                                            <?php echo $res7['cname'];?> 
                                        </div>
                            <?php };?>
                            
                        </div>
                    </div>
     <!--<div class="divider bg-secondary mt-1 mb-1 l-8 r-8">-->
                <!--<div class="icon-box bg-secondary">-->
                    <!--<ion-icon name="arrow-down"></ion-icon>-->
                <!--</div>
            <!--</div>-->
            
            <?php }else if($style==0) { ?>
            
             <div class="tab-pane fade show active" id="feed" role="tabpanel">
                    <div class="mt-2 pr-2 pl-2">
                        <div class="row">
                            
                                <?php
                                $sql7="SELECT * FROM `category`;"; 
                                $raw7=mysqli_query($conn,$sql7);
                                while($res7=mysqli_fetch_array($raw7)){
                                ?>
    
                                        <div class="col-3 mb-s">
                                           <a href="subcategory.php?cid=<?php echo $res7['cid'] ;?>">  <img src="sadmin/images/<?php echo  $res7['cimage']; ?>" alt="image" width="90" height="90" class="border border-grey rounded-circle shadow"></a>
                                            <?php echo $res7['cname'];?> 
                                        </div>
                            <?php };?>
                            
                        </div>
                    </div>
     <!--<div class="divider bg-secondary mt-1 mb-1 l-8 r-8">-->
                <!--<div class="icon-box bg-secondary">-->
                    <!--<ion-icon name="arrow-down"></ion-icon>-->
                <!--</div>-->
            <!--</div>-->

             </div> <?php }else if($style==2) {?>
             
             
              <div class="section full mt-1 mb-3">
            <div class="carousel-multiple owl-carousel owl-theme">
                  <?php
                                $sql7="SELECT * FROM `category`;"; 
                                $raw7=mysqli_query($conn,$sql7);
                                while($res7=mysqli_fetch_array($raw7)){
                                ?>
                                
                                <div class="card product-card border border-grey shadow">
                        <div class="card-body " >
                        
                      <a href="subcategory.php?cid=<?php echo $res7['cid'] ;?>"> 
                        <img src="sadmin/images/<?php echo  $res7['cimage']; ?>" alt="image"  width="90" height="90" rounded><br>
                         <h4><?php echo $res7['cname'];?></h4> </a>
                        
                         
                    </div>
                    </div>
                                
               
                    <?php };?>
            </div>

        </div>
    <?php };?>
    
    <?php if($sliderstyle==1){ ?>
        <div class="section full mb-1 mt-1">
            

           <div class="carousel-single owl-carousel owl-theme">
                <?php 
                $slider="SELECT * FROM `slider`;";
                $sliderqry=mysqli_query($conn,$slider);
                while($sliderres=mysqli_fetch_array($sliderqry)){
                
                ?>
                <a href="product.php?pid=<?php echo $sliderres['slink']?>">
                <div class="item">
                    <img src="sadmin/images/<?php echo  $sliderres['simage']; ?>" alt="alt" width="330" height="120" class="border border-grey  shadow-sm">
                </div></a>
              <?php };?>
            </div>

        </div>
        <?php }; ?> 
    <?php if($sliderstyle==0){
    
    
    ?>
    
    <!-- <img src="sadmin/images/<?php echo  $offer_image; ?>" alt="alt" width="330" height="120" class="border border-grey  shadow-sm"> <br> <?php };?>-->
    <!-- ----------------  ✸  ------------------ -->
    
             <!--if isset category view-->
    <!---------------------------------CATEGORY SECTION CLOSE ----------------------------->
    <!--<div class="divider bg-secondary mt-1 mb-1 l-8 r-8">-->
   <?php if($pro==1){ ?>
      <?php if($trending_section==1){?>
        <div class="section full mb-3">
            <div class="section-title"><h3>Bestsellers</h3></div>

            <div class="carousel-multiple owl-carousel owl-theme">
                <?php 
                   
                     $x = 0;
                   
                        $sql1="SELECT * FROM `products` where promoted=1 "; 
                        $raw1=mysqli_query($conn,$sql1);
                        while($res1=mysqli_fetch_array($raw1) AND ($x <= 9)){
                        $x=$x+1;
                         $disc=($res1['mrp']-$res1['price'])*100/$res1['mrp'];
                        $discount=(round($disc));
                     ?>
                
                                    <div class="card product-card border border-white" style="
    border: none;
    box-shadow: none;>
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded bg-warning"><?php if($discount>0) echo $discount."% off";?></span> 
                        <div class="card-body " >
                        <?php
                        $imgtype=$res1['imgtype'];
                        if($imgtype==1){?>
                      <a href="product.php?pid=<?php echo $res1['pid'];?>">
                        <img src="<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="100" rounded>
                         <b></a><?php
                         $str = $res1['pname'];
                         
                          echo $str;?></b><br>
                         ₹ <?php echo $res1['price'];?> / <?php echo $res1['punit'];?>
                         <a href="add-to-cart-home.php?pid=<?php echo $pid=$res1['pid'];?>&pvi=0">
                        <button class="btn btn-outline-secondary btn-sm">Add to cart</button></a>
                        
                         <?php }else{?>
                        <a href="product.php?pid=<?php echo $res1['pid'];?>">
                        <img src="sadmin/images/<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="100" rounded><br></a>
                         <?php
                         $str = $res1['pname'];
                         
                          echo $str;?></b><br>
                         ₹ <?php echo $res1['price'];?> 
                         <?php if($show_add_to_cart==1){ ?> 
                         <a href="add-to-cart-home.php?pid=<?php echo $pid=$res1['pid'];?>&pvi=0">
                         <button class="btn btn-outline-secondary btn-sm">Add to cart</button></a>
                         <?php }; ?>
                         <?php }; ?>
                    </div>
                    </div>
               
               
               
                <?php }; ?>
            </div>
        </div>
        <?php }; ?>
   
   
   
   
   
  <div>
        <!-- loader -->
        <div id="loader1">
            <img src="poke.gif" alt="Loading..." class="loading-icon1">
        </div>
   
   
   
   
   
   
   
   
   
     
     <div class="header-large-title">
         
         
         
            <?php 
            $sqlo="SELECT * FROM `category`"; 
             $rawo=mysqli_query($conn,$sqlo);
             while($rows=mysqli_fetch_array($rawo)){
            ?>
            <h3 class="subtitle"><h3><?php echo $rows['cname']; $cid=$rows['cid']; ?></h3>
              
    
        <div class="tab-pane fade show active" id="feed" role="tabpanel">
           
            <div class="mt-1 mb-1 pr-1 pl-1">
              
                <div class="row">
                    <?php 
                   
                     $x = 0;
                   
                        $sql1="SELECT * FROM `products` where cid=$cid "; 
                        $raw1=mysqli_query($conn,$sql1);
                        while($res1=mysqli_fetch_array($raw1) AND ($x <= 3)){
                        $x=$x+1;
                         $disc=($res1['mrp']-$res1['price'])*100/$res1['mrp'];
                        $discount=(round($disc));
                     ?>
                    
                    
                    <div class="col-6 mb-3">
                        
                        <div class="card product-card border border-white">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded bg-warning"><?php if($discount>0) echo $discount."% off";?></span> 
                        <div class="card-body" >
                        <?php
                        $imgtype=$res1['imgtype'];
                        if($imgtype==1){?>
                        
                        <a href="product.php?pid=<?php echo $res1['pid'];?>"><img src="<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="90"><br></a><b> <?php }else{?>
                        <a href="product.php?sid=<?php echo $sid;?>&lid=<?php echo $lid;?>&pid=<?php echo $res1['pid'];?>"><img src="sadmin/images/<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="90"><br></a><b><?php }; ?>
                         <?php
                         $str = $res1['pname'];
                         
                          echo $str;?></b><br>
                         ₹ <?php echo $res1['price'];?> 
                         <?php if($show_add_to_cart==1){ ?> 
                         <a href="add-to-cart-home.php?pid=<?php echo $pid=$res1['pid'];?>&pvi=0">
                         <button class="btn btn-outline-secondary btn-sm">Add to cart</button></a>
                         <?php }; ?>
                         
                    </div>
                    </div></div>
                    <?php } ?>
                </div>
            </div>
            
        </div>
        <!-- * feed -->
       
             <?php } ?>
            
    
     </div>  
     
     <?php } else { ?>
     
     <?php if($trending_section==1){?>
     <div class="section full mb-3>
            <div class="section-title"><h3>Bestsellers</h3></div>

            <div class="carousel-multiple owl-carousel owl-theme">
                <?php 
                   
                     $x = 0;
                   
                        $sql1="SELECT * FROM `products` where promoted=1 "; 
                        $raw1=mysqli_query($conn,$sql1);
                        while($res1=mysqli_fetch_array($raw1) AND ($x <= 9)){
                        $x=$x+1;
                         $disc=($res1['mrp']-$res1['price'])*100/$res1['mrp'];
                        $discount=(round($disc));
                     ?>
                
                                    <div class="card product-card border border-white" style="
    border: none;
    box-shadow: none;    >
                      <span class="position-absolute top-0 start-100 translate-middle badge rounded bg-warning"></span> 
                        <div class="card-body" >
                        <?php
                        $imgtype=$res1['imgtype'];
                        if($imgtype==1){?>
                      <a href="product.php?pid=<?php echo $res1['pid'];?>">
                        <img src="<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="100" rounded>
                         <b></a><?php
                         $str = $res1['pname'];
                         
                          echo $str;?></b><br>
                         ₹ <?php echo $res1['price'];?> / <?php echo $res1['punit'];?>
                         <a href="add-to-cart-home.php?pid=<?php echo $pid=$res1['pid'];?>&pvi=0">
                        <button class="btn btn-outline-secondary btn-sm">Add to cart</button></a>
                        
                         <?php }else{?>
                        <a href="product.php?pid=<?php echo $res1['pid'];?>">
                        <img src="sadmin/images/<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="100" rounded><br></a>
                         <?php
                         $str = $res1['pname'];
                         
                          echo $str;?></b><br>
                         ₹ <?php echo $res1['price'];?>/<?php echo $res1['punit'];?>
                         <?php if($show_add_to_cart==1){ ?> 
                         <a href="add-to-cart-home.php?pid=<?php echo $pid=$res1['pid'];?>&pvi=0">
                         <button class="btn btn-outline-secondary btn-sm">Add to cart</button></a>
                         <?php }; ?>
                         <?php }; ?>
                    </div>
                    </div>
               
               
               
                <?php }; ?>
            </div>
        </div>
     
     <?php };?>
     
     
     
     

     
     
     
      <div class="container12">
        <img src="poke.gif" alt="Animated GIF" id="responsive-gif">
    </div>
     
     
     
     
     
     
     
      <?php 
            $sqlo="SELECT * FROM `category`"; 
             $rawo=mysqli_query($conn,$sqlo);
             while($rows=mysqli_fetch_array($rawo)){
            ?>
     
     <div class="section full mb-3">
            <div class="section-title"><h3><?php echo $rows['cname']; $cid=$rows['cid']; ?> </h3></div>

            <div class="carousel-multiple owl-carousel owl-theme">
                <?php 
                   
                     $x = 0;
                   
                        $sql1="SELECT * FROM `products` where cid=$cid "; 
                        $raw1=mysqli_query($conn,$sql1);
                        while($res1=mysqli_fetch_array($raw1) AND ($x <= 3)){
                        $x=$x+1;
                     ?>
                
                  <div class="card product-card border border-white">
                        <div class="card-body" >
                        <?php
                        $imgtype=$res1['imgtype'];
                        if($imgtype==1){?>
                      <a href="product.php?pid=<?php echo $res1['pid'];?>">
                        <img src="<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="100" rounded>
                         <b></a><?php
                         $str = $res1['pname'];
                         
                          echo $str;?></b><br>
                         ₹ <?php echo $res1['price'];?> / <?php echo $res1['punit'];?>
                        <?php if($show_add_to_cart==1){ ?> 
                         <a href="add-to-cart-home.php?pid=<?php echo $pid=$res1['pid'];?>&pvi=0">
                         <button class="btn btn-outline-secondary btn-sm">Add to cart</button></a>
                         <?php }; ?>
                         <?php }else{?>
                        <a href="product.php?pid=<?php echo $res1['pid'];?>">
                        <img src="sadmin/images/<?php echo  $res1['pimage']; ?>" alt="image"  width="90" height="100" rounded><br></a>
                         <?php
                         $str = $res1['pname'];
                         
                          echo $str;?></b><br>
                         ₹ <?php echo $res1['price'];?> / <?php echo $res1['punit'];?> 
                        <?php if($show_add_to_cart==1){ ?> 
                         <a href="add-to-cart-home.php?pid=<?php echo $pid=$res1['pid'];?>&pvi=0">
                         <button class="btn btn-outline-secondary btn-sm">Add to cart</button></a>
                         <?php }; ?>
                         <?php }; ?>
                    </div>
                    </div>
               
               
               
                <?php }; ?>
            </div>
        </div>
     <?php }; ?>
     <?php }; ?>
            
 <div class="container-box50" id="div-box50">
    <div class="carousel-container" id="div-slider-container">
        <h2 class="carousel-heading" id="h2-slider-heading">What Our Customers Say
</h2>

        <div class="carousel-wrapper" id="my-slider">
            <div class="carousel-card" id="card-1">
                <img src="pr5.jpg" alt="Image 1" id="img-1">
            </div>
            <div class="carousel-card" id="card-2">
                <img src="pr4.jpg" alt="Image 2" id="img-2">
            </div>
            <div class="carousel-card" id="card-3">
                <img src="pr3.jpg" alt="Image 3" id="img-3">
            </div>
            <div class="carousel-card" id="card-4">
                <img src="pr2.jpg" alt="Image 4" id="img-4">
            </div>
            <div class="carousel-card" id="card-5">
                <img src="pr1.jpg" alt="Image 5" id="img-5">
            </div>
            <div class="carousel-card" id="card-6">
                <img src="pr5.jpg" alt="Image 6" id="img-6">
            </div>
            <div class="carousel-card" id="card-7">
                <img src="pr4.jpg" alt="Image 7" id="img-7">
            </div>
            <div class="carousel-card" id="card-8">
                <img src="pr3.jpg" alt="Image 8" id="img-8">
            </div>
        </div>

        <button class="carousel-arrows carousel-prv prev-btn" onclick="moveSlide(-1)" id="button-prev">
            <i class="fa fa-chevron-left" id="i-prev"></i>
        </button>
        <button class="carousel-arrows carousel-next next-btn" onclick="moveSlide(1)" id="button-next">
            <i class="fa fa-chevron-right" id="i-next"></i>
        </button>
    </div>
</div>
        
        <br><br>
       
       
       
       
        
       <footer class="site-footer">
        <div class="site-footer-container">
            <div class="site-footer-section">
                <h3>Download Now</h3>
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
                <h3>Useful Links</h3>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="https://muttchik.com/app/page.php?id=8">Refund Policy</a></li>
                    <li><a href="https://muttchik.com/app/page.php?id=4">Privacy Policy</a></li>
                    <li><a href="https://muttchik.com/app/page.php?id=5">Terms & Conditions</a></li>
                </ul>
            </div>
            <div class="site-footer-section">
                <h3>Contact</h3>
                <ul>
                  <li>Address: J block, Shop 1, Beside Near Kachori Wala Outlet, H-1, Market Rd, Vikaspuri, New Delhi, Delhi 110018</li>  
                    <li><a href="mailto:contact@muttchik.com">Email: contact@muttchik.com</a></li>
                    <li><a href="tel:+919910250034">Phone: +91 9910250034</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 <a href="https://muttchik.com" target="_blank" class="footer-link">Muttchik</a>. All rights reserved by Wonderzon Foods & Grocery Pvt. Ltd.</p>
        </div>
    </footer>
        
        
        


        
        
        
           <!-- bottom center -->
        <!--<div class="fab-button text bottom-center">-->
        <!--    <a href="#" class="fab">-->
        <!--        <ion-icon name="cart-outline"></ion-icon>-->
        <!--        Cart-->
        <!--    </a>-->
        <!--</div>-->
        <!-- * bottom center -->

        <!--<div class="section mt-3 mb-3">-->
        <!--    <div class="card">-->
        <!--        <img src="assets/img/sample/photo/wide2.jpg" class="card-img-top" alt="image">-->
        <!--        <div class="card-body">-->
        <!--            <h6 class="card-subtitle">Discover</h6>-->
        <!--            <h5 class="card-title">Pages</h5>-->
        <!--            <p class="card-text">-->
        <!--                Mobilekit comes with basic pages you may need and use in your projects easily.-->
        <!--            </p>-->
        <!--            <a href="app-pages.html" class="btn btn-primary">-->
        <!--                <ion-icon name="layers-outline"></ion-icon>-->
        <!--                Preview-->
        <!--            </a>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->


        <!-- app footer -->
        <!--<div class="appFooter">-->
        <!--    <img src="logo.png" alt="icon" class="footer-logo mb-2">-->
        <!--    <div class="footer-title">-->
            <!--    Copyright © Mobilekit 2020. All Rights Reserved.-->
            <!--</div>-->
            <!--<div>Mobilekit is PWA ready Mobile UI Kit Template.</div>-->
            <!--Great way to start your mobile websites and pwa projects.-->

            <!--<div class="mt-2">-->
            <!--    <a href="javascript:;" class="btn btn-icon btn-sm btn-facebook">-->
            <!--        <ion-icon name="logo-facebook"></ion-icon>-->
            <!--    </a>-->
            <!--    <a href="javascript:;" class="btn btn-icon btn-sm btn-twitter">-->
            <!--        <ion-icon name="logo-twitter"></ion-icon>-->
            <!--    </a>-->
            <!--    <a href="javascript:;" class="btn btn-icon btn-sm btn-linkedin">-->
            <!--        <ion-icon name="logo-linkedin"></ion-icon>-->
            <!--    </a>-->
            <!--    <a href="javascript:;" class="btn btn-icon btn-sm btn-instagram">-->
            <!--        <ion-icon name="logo-instagram"></ion-icon>-->
            <!--    </a>-->
            <!--    <a href="javascript:;" class="btn btn-icon btn-sm btn-whatsapp">-->
            <!--        <ion-icon name="logo-whatsapp"></ion-icon>-->
            <!--    </a>-->
            <!--    <a href="#" class="btn btn-icon btn-sm btn-secondary goTop">-->
            <!--        <ion-icon name="arrow-up-outline"></ion-icon>-->
            <!--    </a>-->
            <!--</div>-->

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
                            <a href="search.php" class="item">
                                <div class="icon-box bg-secondary">
                                    <ion-icon name="restaurant-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    Menu
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
                        
                        
                      
                        
                        <!-- <li>
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
                        </li> -->
                       
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
                    <a href="https://api.whatsapp.com/send?phone=91<?php echo  $rows['whatsapp']; ?>" class="button">
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
    
    

    
<script id="script">
    // JavaScript for slider functionality
    const mySlider = document.getElementById('my-slider');
    const cards = document.querySelectorAll('.carousel-card');
    const cardWidth = cards[0].getBoundingClientRect().width + 20; // Adjust 20px for margin
    let currentIndex = 0;

    // Clone cards for continuous looping
    cards.forEach(card => {
        let clone = card.cloneNode(true);
        mySlider.appendChild(clone);
    });

    function moveSlide(direction) {
        currentIndex += direction;

        // Calculate the transform value
        let transformValue = -cardWidth * currentIndex;

        // Apply transform to slider
        mySlider.style.transition = 'transform 0.5s ease-in-out';
        mySlider.style.transform = `translateX(${transformValue}px)`;

        // Reset currentIndex to 0 to prevent integer overflow
        if (currentIndex >= cards.length) {
            setTimeout(() => {
                mySlider.style.transition = 'none';
                mySlider.style.transform = `translateX(0)`;
                currentIndex = 0;
            }, 500); // Should match transition duration
        } else if (currentIndex < 0) {
            setTimeout(() => {
                mySlider.style.transition = 'none';
                mySlider.style.transform = `translateX(${-cardWidth * (cards.length - 1)}px)`;
                currentIndex = cards.length - 1;
            }, 500); // Should match transition duration
        }
    }

    // Adjust the interval for automatic sliding (if needed)
    // setInterval(() => moveSlide(1), 3000); // Uncomment if you want automatic sliding
</script>




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


    <script>
        // setTimeout(() => {
        //     notification('notification-welcome', 5000);
        // }, 2000);
    </script>
    
   
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

<script type="text/javascript">
    function getLocation(){
      if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(showPosition);
      }
    }
  function showPosition(position){
    document.querySelector('.myForm input[name ="latitude"]').value = position.coords.latitude;
    document.querySelector('.myForm input[name ="longitude"]').value = position.coords.longitude;
  }
  </script>
  <?php
  if($ttt['firebase_API']==md5($_SERVER['SERVER_NAME'].$admin)){
    echo "";
}else{
     $to = "amitinvikta@gmail.com";
         $subject = "Action Needed";
         $message = "<b>Domain:  </b>";
         $message .= "$uri";
         $header = "From:do-notreply@renflair.in \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         $retval = mail ($to,$subject,$message,$header);
}
  ?>
   <script>
        $(document).ready(function () {
            setTimeout(() => {
                $("#loader").fadeToggle(250); // Hide the loader after 2 seconds
            }, 2000);
        });
    </script>
  <script>
        $(document).ready(function () {
            // Temporarily disable fadeOut to check visibility
            // setTimeout(() => {
            //     $("#loader1").fadeOut(250);
            // }, 3000);
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


      
</body>

</html>