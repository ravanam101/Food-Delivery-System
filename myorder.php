<?php
session_start();
include 'pay/db.php';
if(!isset($_COOKIE['phone'])){
    header("location:index.php");
}
$phone=$_COOKIE['phone'];
$sqi="select * from `user` where userphone=$phone";
$qri=mysqli_query($conn,$sqi);
$rei=mysqli_fetch_assoc($qri);
$uid=$rei['userid'];

// $aid=mysqli_real_escape_string($conn,$_GET['aid']);
$lid=mysqli_real_escape_string($conn,$_GET['lid']);
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
    <meta name="description" content="Muttchik offers fresh delicacies delivered to your doorstep">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
    
    
    <style>
        .headerButton.goBack {
    display: inline-flex; /* Ensures the button acts as a button */
    align-items: center;  /* Vertically center the icon and text */
    text-decoration: none; /* Remove underline from the link */
    color: #000; /* Change to desired color */
    padding: 10px 15px; /* Increase padding for easier clicking */
    cursor: pointer; /* Change cursor to pointer on hover */
    font-size: 16px; /* Adjust font size */
    background-color: #f0f0f0; /* Optional: background color */
    border-radius: 5px; /* Optional: rounded corners */
}

.headerButton.goBack ion-icon {
    margin-right: 5px; /* Space between icon and text */
}

.headerButton.goBack:hover {
    background-color: #e0e0e0; /* Optional: change background on hover */
    color: #007bff; /* Change text color on hover */
}

.headerButton.goBack {
    position: relative; /* or absolute, depending on the layout */
    z-index: 10; /* Ensures it's on top */
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

    <!-- App Header -->
    <div class="appHeader">
        <div class="left">
         <a href="https://muttchik.com/app/shop.php" class="headerButton goBack">
    <ion-icon name="chevron-back-outline"></ion-icon> Back
</a>

        </div>
        <div class="pageTitle"><a href="https://muttchik.com/app/shop.php">My Orders</a></div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

        <!--<div class="listview-title mt-2">Previous Orders</div>-->
        <ul class="listview simple-listview">
          <?php  $sqii="select * from `orders` where userid=$uid ORDER BY `orders`.`oid` DESC";
            $qrii=mysqli_query($conn,$sqii);
            while($reii=mysqli_fetch_array($qrii)){ ?>
            
            <li>
                <p>
            <b>Order ID:</b> <?php echo $reii['oid'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?php if($reii['status']=="Delivered") { ?> 
           
           <a href="myorder-view.php?oid=<?php echo $reii['oid'];?>">
            <button onclick="example1()" class="btn btn-outline-secondary btn-sm ml-5">View Order Details</button></a> <?php }; ?><br>
            <b>Order Items:</b> <br><?php echo $reii['pname'];?><br>
            <b>Tax:</b> Rs. <?php echo $reii['tax'];?><br>
            <b>Delivery Charge: Rs. </b><?php if($reii['dcharge']==0){ echo "Free" ; }else{ echo $reii['dcharge']; } ?><br>
            <b>Amount:</b> Rs.<?php echo $reii['price'];?> <?php  if($reii['tid']==0) {echo "(Cash on Delivery)";}else{echo "(Paid)";}?> <br>
            <b>Status:</b>  <?php echo $reii['status'];?> <br>
            <b>Time & Date:</b> <?php echo $reii['ordertime'];?> 
            <?php if($reii['refund']=="1"){ echo "<br>Replace or Return Requested"; }; ?>
            <?php if($reii['refund']=="2"){ echo "<br>Replace or Return Successful"; }; ?>
            <?php if($reii['status']=="Order Placed" or $reii['status']=="Waiting For Payment" ) {?>
            <a href="order-cancel.php?oid=<?php echo $reii['oid'];?>">
            <button class="btn btn-outline-danger btn-sm">Cancel</button></a><br><?php }else{
            echo "";};
            ?><br><br>
             
            <?php if($reii['status']=="Order Placed"){ ?>
              <img src="stage/orderplaced.jpg" height="73" width="330">
              <?php } else if($reii['status']=="Order Processed"){ ?>
              <img src="stage/orderprocess.jpg" height="73" width="330">
               <?php } else if($reii['status']=="Order Picked Up"){ ?>
               <img src="stage/orderpickedup.jpg" height="73" width="330">
               <?php } else if($reii['status']=="Out For Delivery"){ ?>
               <img src="stage/outfordelivery.jpg" height="73" width="330">
               <?php } else if($reii['status']=="Delivered") { ?>
               <img src="stage/delivered.jpg" height="73" width="330">
                <?php } else if($reii['status']=="Order Canceled") { ?>
               <img src="stage/cancel.jpg" height="73" width="330">
               <?php } else { ?>
               <img src="stage/waiting.png" height="73" width="330">
               <?php }?> 
                <?php if($reii['status']=="Delivered") { ?> 
            
           <a href="refund.php?oid=<?php echo $reii['oid'];?>">
            <button onclick="example1()" class="btn btn-outline-secondary btn-sm ml-1 mt-2">Ask For Replace</button></a> <?php }; ?>
            </p>
            
            </li>
            
           <?php };?>
        </ul>

      <script type = "text/javascript" >  
    function preventBack() { window.history.forward(); }  
    setTimeout("preventBack()", 0);  
    window.onunload = function () { null };  
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