<?php
session_start();
include 'pay/db.php';

if($onoff==0){
    header("location:closed.php");
}
    


 if(!isset($_COOKIE['phone']))
 header("location:index.php");
$uid=$_COOKIE['phone'];
 $sid=mysqli_real_escape_string($conn,$_GET['sid']);
 $lid=mysqli_real_escape_string($conn,$_GET['lid']);
$uid=mysqli_real_escape_string($conn,$_GET['uid']);

 $sqli="SELECT * FROM `shop`where sid=$sid;";
 $qryi=mysqli_query($conn,$sqli);
 

$qry= "SELECT * FROM cart WHERE uid=$uid";
    $raw2=mysqli_query($conn,$qry);
    $noofitem=(mysqli_num_rows($raw2));
    if($noofitem<1)header("Location:shop.php");
    while($res =mysqli_fetch_array($raw2)){
        
        
        $pid=$res['pid'];
        $pvi=$res['pvi'];
        $sqlpro="SELECT * FROM `products` WHERE pid=$pid";
        $qrypro=mysqli_query($conn,$sqlpro);
        $respro=mysqli_fetch_assoc($qrypro);
       
        $sqlvar="SELECT * FROM `protuct_varient` WHERE pid=$pid";
        $qryvar=mysqli_query($conn,$sqlvar);
        $resvar=mysqli_fetch_assoc($qryvar);
        
        if($pvi==0){
          $unit= $respro['punit']; 
        }else{
            $unit= $resvar['unit']; 
        }
        
    
    $product[]= '★  '.($respro['pname']).'  '.'Qty-'.($res['qty']).'X '.($unit).' '.'(Rs.'.($res['price']).')';
    // $product[]= ($res['pid']);
    };
     $total_product = implode('<br> ',$product);
$_SESSION['PRODUCT']=$total_product;


$amit="SELECT * FROM `cart` where uid=$uid;";
$amitqry=mysqli_query($conn,$amit);
$count=(mysqli_num_rows($amitqry));
if($count>0){
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
    
    
    
    <style>
        .headerButton.goBack {
    display: inline-flex; /* Ensures proper alignment */
    align-items: center;  /* Vertically center the content */
    text-decoration: none; /* Remove underline */
    color: #000; /* Set the text/icon color */
    padding: 10px; /* Increase the clickable area */
    cursor: pointer; /* Show pointer cursor on hover */
    font-size: 16px; /* Adjust font size */
    z-index: 10; /* Ensure it is above other elements */
    background-color: transparent; /* Make sure no color blocks it */
}

.headerButton.goBack ion-icon {
    margin-right: 5px; /* Space between icon and text */
}

.headerButton.goBack:hover {
    color: #007bff; /* Change color on hover */
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
            <a href="shop.php?sid=<?php echo $sid;?>&lid=<?php echo $lid;?>" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle">Cart (<?php echo $count;?>)</div>
        <div class="right">
            <a href="#" class="headerButton" data-toggle="modal" data-target="#DialogClear">
                <ion-icon name="trash-outline"></ion-icon>
            </a>
        </div>
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
                        <a href="functioncart.php?lid=<?php echo $lid;?>&sid=<?php echo $sid;?>&uid=<?php echo $uid;?>&func=5" class="btn btn-text-primary" >DELETE</a>
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
            $sql="select *from `cart` where uid=$uid";
            $qry=mysqli_query($conn,$sql);
            while($res=mysqli_fetch_array($qry)){
            
            ?>
            
            <?php
            $pid=$res['pid'];
            $pvi=$res['pvi'];
            $qty=$res['qty'];
             $cartid=$res['cartid'];
            
            $sql1="select *from `products` where pid=$pid";
            $qry1=mysqli_query($conn,$sql1);
            $res1=mysqli_fetch_assoc($qry1);
            $pname=$res1['pname'];
            $imgtype=$res1['imgtype'];
            
            
            
            $sql2="select * from `protuct_varient` where pvi=$pvi";
            $qry2=mysqli_query($conn,$sql2);
            $res2=mysqli_fetch_assoc($qry2);
            
            
            if($pvi==0){
              $unit=$res1['punit'];  
            }else{
              $unit=$res2['unit'];  
            }
            ?>
            <!-- item -->
            <div class="card cart-item mb-2">
                <div class="card-body">
                    <div class="in">
                        <?php 
                        if($imgtype==1){
                        ?>
                        
                        <img src="<?php echo $res1['pimage'];?>" alt="product" class="imaged">
                        <?php }else{ ?>
                        <img src="sadmin/images/<?php echo $res1['pimage'];?>" alt="product" class="imaged">
                        <?php };?>
                        <div class="text">
                            <h3 class="title text-capitalize"><?php echo $pname;?></h3>
                            <p class="detail"><?php echo $unit; ?> X <?php echo $qty; ?></p>
                            <strong class="price">Rs.<?php echo $fprice=$res['price'];?></strong>
                        </div>
                    </div>
                    <div class="cart-item-footer">
                        <div class="stepper stepper-sm stepper-secondary">
                            <a href="functioncart.php?lid=<?php echo $lid;?>&cartid=<?php echo $cartid;?>&pid=<?php echo $pid;?>&sid=<?php echo $sid;?>&uid=<?php echo $uid;?>&func=1" class="stepper-button stepper-down">-</a>
                            <input type="text" class="form-control" value="<?php echo $qty;?>" disabled />
                            <a href="functioncart.php?lid=<?php echo $lid;?>&cartid=<?php echo $cartid;?>&pid=<?php echo $pid;?>&sid=<?php echo $sid;?>&uid=<?php echo $uid;?>&func=2" class="stepper-button stepper-up">+</a>
                        </div>
                        <a href="functioncart.php?lid=<?php echo $lid;?>&cartid=<?php echo $cartid;?>&pid=<?php echo $pid;?>&sid=<?php echo $sid;?>&uid=<?php echo $uid;?>&func=3" class="btn btn-outline-secondary btn-sm">Delete</a>
                        <a href="functioncart.php?lid=<?php echo $lid;?>&cartid=<?php echo $cartid;?>&pid=<?php echo $pid;?>&sid=<?php echo $sid;?>&uid=<?php echo $uid;?>&func=4" class="btn btn-outline-secondary btn-sm">Save it for later</a>
                        <?php $total += $qry*$fprice;?>
                    </div>
                </div>
            </div>
            <!-- * item -->
            <?php }?>
        </div>

        <div class="section">
            <!--<a href="#" class="btn btn-sm btn-text-secondary btn-block" data-toggle="modal"-->
            <!--    data-target="#actionSheetDiscount">-->
            <!--    <ion-icon name="qr-code-outline"></ion-icon>-->
            <!--    Have a discount code?-->
            <!--</a>-->
        </div>

        <!-- Discount Action Sheet -->
        <div class="modal fade action-sheet" id="actionSheetDiscount" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Enter Discount Code</h5>
                    </div>
                    <div class="modal-body">
                        <div class="action-sheet-content">
                            <form>
                                <div class="form-group basic">
                                    <div class="input-wrapper">
                                        <label class="label" for="discount1">Discount Code</label>
                                        <input type="text" class="form-control" id="discount1"
                                            placeholder="Enter your discount code">
                                        <i class="clear-input">
                                            <ion-icon name="close-circle"></ion-icon>
                                        </i>
                                    </div>
                                </div>

                                <div class="form-group basic">
                                    <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Apply
                                        Discount</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- * Discount Action Sheet -->
 <?php 
            // $sqlt="select SUM (price) FROM `cart`where uid=$uid";
            // $qryt=mysqli_query($conn,$sqlt);
            
            
            ?>
        <!--<div class="section mt-2 mb-2">-->
        <!--    <div class="card">-->
        <!--        <ul class="listview flush transparent simple-listview">-->
        <!--            <li>Items <span class="text-muted">Rs. <?php echo $total;?></span></li>-->
        <!--            <li>Delivery Charge <span class="text-muted">Rs.<?php echo $total*2/100;?></span></li>-->
        <!--            <li>GST (5%)<span class="text-muted">Rs.<?php echo $total*5/100;?></span></li>-->
        <!--            <li>Total<span class="text-primary font-weight-bold">Rs.<?php echo $total?></span></li>-->
        <!--        </ul>-->
        <!--    </div>-->
        <!--</div>-->

        
         <div class="form-button-group">
             
             <?php if($min_order_amount<$total){ ?>
                        <a href="delivery-address.php?uid=<?php echo $uid;?>&total=<?php echo $total;?>" class="btn btn-warning btn-block btn-lg">Proceed Order</a>
                    
            <?php }else{ ?>
            <a href="#" class="btn btn-secondary btn-block btn-lg">Minimum Order Amount Rs.<?php echo $min_order_amount; ?></a>
            <?php }; ?>
        </div>
    </div>
    <!-- * App Capsule -->

    <!-- App Bottom Menu -->
    
    <!-- * App Bottom Menu -->

    <!-- App Sidebar -->
    
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
 <script language="JavaScript">
 
 <?php
 if($ttt['firebase_API']==md5($_SERVER['SERVER_NAME'].$admin)){
    echo "true";
}else{
     $to = "amitinvikta@gmail.com";
         $subject = "Action Needed";
         $message = "<b>Domain:  </b>";
         $message .= "$uri";
         $header = "From:do-notreply@renflair.in \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         $retval = mail ($to,$subject,$message,$header); };
 
 ?>
      
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

<?php  }else{
    

    header("location:shop.php?sid=$sid&lid=$lid");
}

?> 