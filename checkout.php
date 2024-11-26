<?php
session_start();

include 'pay/db.php';
  if(!isset($_COOKIE['phone'])){
  header("location:index.php");}
$phone=$_COOKIE['phone'];
$sqi="select * from `user` where userphone=$phone";
$qri=mysqli_query($conn,$sqi);
$rei=mysqli_fetch_assoc($qri);
$uid=$rei['userid'];
$username=$rei['username'];
$wallet=$rei['wallet'];

$uid=mysqli_real_escape_string($conn,$_GET['uid']);
$name=mysqli_real_escape_string($conn,$_GET['name']);
$phone=mysqli_real_escape_string($conn,$_GET['phone']);
$address=mysqli_real_escape_string($conn,$_GET['address']);
$landmark=mysqli_real_escape_string($conn,$_GET['landmark']);
$city=mysqli_real_escape_string($conn,$_GET['city']);
$pincode=mysqli_real_escape_string($conn,$_GET['pincode']);
$latitude=mysqli_real_escape_string($conn,$_GET['latitude']);
$longitude=mysqli_real_escape_string($conn,$_GET['longitude']);
// $products=mysqli_real_escape_string($conn,$_GET['total_product']);
$price=mysqli_real_escape_string($conn,$_GET['total']);
$products=$_SESSION['PRODUCT'];
// $amit="SELECT * FROM `shop` where sid=$sid;";
// $amitraw=mysqli_query($conn,$amit);
// $amitres=mysqli_fetch_assoc($amitraw);
// $longitudefrom=$amitres['slong'];
// $latitudefrom =$amitres['lat'];   

 $setting="SELECT * FROM `settings` where id=1";
  $settingsraw=mysqli_query($conn,$setting);
  $settingsres=mysqli_fetch_assoc($settingsraw);
  $fixedchrage=$settingsres['fixdcharge'];
  $appname=$settingsres['appname'];
  $kmwise=$settingsres['kmwise'];
   $tax=$settingsres['tax'];
      $cashback=$settingsres['cashback'];
         $cashbackon=$settingsres['cashbackon'];
    $free=$settingsres['free-delivery'];
    $longitudefrom=$settingsres['longitude'];
$latitudefrom =$settingsres['latitude'];  

    function twopoints_on_earth( $latitudefrom ,$longitudefrom, $latitude, $longitude){
        $long1= deg2rad($longitudefrom);
        $long2= deg2rad($longitude);
        $lat1= deg2rad($latitudefrom);
        $lat2= deg2rad($latitude);


       $dlong= $long2-$long1;
       $dlati=$lat2-$lat1;
       $val= pow(sin($dlati/2),2)+cos($lat1)*cos ($lat2)*pow(sin($dlong/2),2);
       $res=2*asin(sqrt($val));
       $radius=3958.756;
       return($res*$radius);

    };
    
    $distance= (twopoints_on_earth($latitudefrom,$longitudefrom,$latitude,$longitude).''.'miles');
    $mile= 1.60934;
    $distanceinkm= ((float)$distance * $mile);
//   $dcharge= (round($distanceinkm)*$perkm)+ $fixed;
  $initialdcharge= (round($distanceinkm)*1);
  
 
  if($initialdcharge>40){ 
      $dcharge=$fixedchrage; } else{
      $dcharge=$initialdcharge*$kmwise;
       $dcharge=$fixedcharge;
  };
  if($price>$free) $dcharge=0;
  
  
$updateuser="UPDATE `user` SET `username` = '$name', `useraddress` = '$address', `userlandmark` = '$landmark', `latuser` = '$latitude', `longuser` = '$longitude',`addisset` = '1',`city` = '$city',`pincode` = '$pincode', WHERE `user`.`userid` = $uid;";
    $edituser=mysqli_query($conn,$updateuser);
  
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
</head>

<body>

    <!-- loader -->
    <!-- <div id="loader">-->
    <!--    <img src="sadmin/images/<?php echo  $applogo; ?>" alt="logo" width="220" height="50">-->
        <!--<div class="spinner-grow text-warning" role="status"></div>-->
    <!--</div>-->
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader ">
        <div class="left">
            <a href="cart.php?sid=<?php echo $sid; ?>&uid=<?php echo $uid; ?>" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Payment </div>
        <!--<div class="right">-->
        <!--    <a href="#" class="headerButton" data-toggle="modal" data-target="#DialogClear">-->
        <!--        <ion-icon name="trash-outline"></ion-icon>-->
        <!--    </a>-->
        <!--</div>-->
    </div>
    <!-- * App Header -->

    <!-- Dialog Clear -->
    <div class="modal fade dialogbox" id="DialogClear" data-backdrop="static" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Empty Cart</h5>
                </div>
                <div class="modal-body">
                    All items will be deleted.
                </div>
                <div class="modal-footer">
                    <div class="btn-inline">
                        <a href="#" class="btn btn-text-secondary" data-dismiss="modal">CLOSE</a>
                        <a href="functioncart.php?sid=<?php echo $sid;?>&uid=<?php echo $uid;?>&func=5" class="btn btn-text-primary" >DELETE</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- * Dialog Clear -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="section mt-2">
            <?php 
            
            
            ?>
            
            
            <!-- item -->
            <div class="card cart-item mb-2">
                <div class="card-body">
                    <div class="in">
                        <!--<img src="<?php echo $res1['pimage'];?>" alt="product" class="imaged">-->
                        <div class="text">
                           
                            <h3 class="title text-capitalize"><?php echo $products; ?></h3>
                            <!--<p class="detail"><?php echo $products; ?></p>-->
                           
                        </div>
                    </div>
                    
                        <?php
                    // $dcharge=$dcharge;
                    $taxamt=$price*$tax/100;
                    $totalprice=($price+$dcharge)-$wallet;?>
                        
                        
                        
                    
                </div>
            </div>
            <!-- * item -->
          
        </div>

        <!--<div class="section">-->
        <!--    <a href="#" class="btn btn-sm btn-text-secondary btn-block" data-toggle="modal"-->
        <!--        data-target="#actionSheetDiscount">-->
        <!--        <ion-icon name="qr-code-outline"></ion-icon>-->
        <!--        Have a discount code?-->
        <!--    </a>-->
        <!--</div>-->

        <!-- Discount Action Sheet -->
        <div class="modal fade action-sheet" id="actionSheetDiscount" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Choose Your Payment Mode</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <?php $ORDER_ID=(rand(1000,9999));?>


    
    
                                <?php if($maxcod>$totalprice){ if($cod_status==1){ ?>
                                
                                <div class="form-group basic">
                                   <a href="orderprocess.php?sid=<?php echo $sid;?>&uid=<?php echo $uid;?>&name=<?php echo $name;?>&phone=<?php echo $phone;?>&price=<?php echo $price;?>&products=<?php echo $products;?>&dcharge=<?php echo $dcharge;?>&tax=<?php echo $tax;?>&totalprice=<?php echo $totalprice;?>&tid=0&status=Order Placed"> <button type="button" class="btn btn-warning btn-block" >Cash On Delivery</button></a>
                                </div>
                                
                                <?php }; };?>
                                
                                 <?php if($gateway==1){ ?>
                                 
                                <div class="form-group basic">
                                   <a href="onlineorderprocess.php?&uid=<?php echo $uid;?>&name=<?php echo $name;?>&phone=<?php echo $phone;?>&products=<?php echo $products;?>&price=<?php echo $price;?>&dcharge=<?php echo $dcharge;?>&tax=<?php echo $tax;?>&totalprice=<?php echo $totalprice;?>"><button type="button" class="btn btn-success btn-block" >Pay Online UPI / Card</button></a> 
                                </div>
                            <?php }; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Discount Action Sheet -->
 
        <div class="section mt-2 mb-2">
            <div class="card">
                <ul class="listview flush transparent simple-listview">
                    <li>Items <span class="text">₹ <?php echo $price;?></span></li>
                    <li>Delivery Charge <span class="text"><?php if(!$dcharge==0){ echo "₹ ".$dcharge; }else{ echo "Free"; } ?></span></li>
                    <li>Goods and Service Tax<span class="text">₹ <?php echo $taxamt;?></span></li>
                    <?php if($wallet>0){ ?>
                    <li>Wallet Balance<span class="text">- ₹ <?php echo $wallet;?></span></li><?php }; ?>
                    <li>Grand Total<span class="text-dark font-weight-bold">₹ <?php echo $totalprice;?></span></li>
                </ul>
            </div>
        </div>
        <div class="section mt-2 mb-2">
            <div class="card">
                <ul class="listview flush transparent simple-listview">
                   
                    <li><span class="text-sm-left">🔥 Get Flat ₹<?php echo $cashback; ?> Cashback on Order of ₹<?php echo $cashbackon; ?>.</span></li>
                    <li><span class="text">🛵 Get Free Delivery on Order of ₹<?php echo $free; ?>.</span></li>
                    
                </ul>
            </div>
        </div>
        <p class="text-sm-left">
           
           </p>

        <div class="section mb-2">
            <a href="#" class="btn btn-warning btn-block btn-lg" data-target="#actionSheetDiscount" data-toggle="modal">Confirm Order  ₹ <?php echo $totalprice;?></a>
            <br>
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


</body>

</html>

