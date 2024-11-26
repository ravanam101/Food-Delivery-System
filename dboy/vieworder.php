<?php
include '../pay/db.php';
session_start();
$oid=addslashes($_GET['oid']);
$did=addslashes($_GET['did']);

$qry="SELECT*FROM`orders`where oid=$oid";
$raw=mysqli_query($conn,$qry);
$res=mysqli_fetch_assoc($raw);
$sid=$res['sid'];
$userid=$res['userid'];

$qry1="SELECT*FROM`shop`where sid=$sid";
$raw1=mysqli_query($conn,$qry1);
$res1=mysqli_fetch_assoc($raw1);


$qryi="SELECT*FROM`user`where userid=$userid";
$rawi=mysqli_query($conn,$qryi);
$resi=mysqli_fetch_assoc($rawi);

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
    <title>aaa</title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="css/card.css">
  
</head>

<body>
<?php if(isset($_SESSION['logindboy'])){
?>
    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader ">
        <div class="left">
            <!--<a href="index.php" class="headerButton goBack">-->
            <!--    <ion-icon name="chevron-back-outline"></ion-icon>-->
            <!--</a>-->
        </div>
        <div class="pageTitle"><?php echo $res1['sname'];?></div>
        <div class="right"></div>
    </div>
    <!-- * App Header -->
    <br>
    <!-- App Capsule -->
    <div id="appCapsule" >
    
    
<table class="table table-striped table-hover" >
<thead>
  <tr>
    <th class="tg-0lax" colspan="2"><span style="font-weight:bold">Order Details</span></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-0lax">Order ID</td>
    <td class="tg-0lax"><?php echo $res['oid'];?></td>
  </tr>
    <tr>
    <td class="tg-0lax">Phone Number</td>
    <td class="tg-0lax"><a href="tel:<?php echo $res['ophone'];?>"><button class="btn btn-success">Call User</button></a>&nbsp<a href="tel:<?php echo $res1['phone'];?>"><button class="btn btn-secondary">Call Shop</button></a></td>
  </tr>
  <tr>
    <td class="tg-0lax">Exact Location</td>
    <td class="tg-0lax">
        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $resi['latuser'];?>%2C<?php echo $resi['longuser'];?>"><button class="btn btn-success">Get Direction</button></a>&nbsp
        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $res1['lat'];?>%2C<?php echo $res1['slong'];?>"><button class="btn btn-secondary">Shop</button></a>
        </td>
  </tr>
  <tr>
    <td class="tg-0lax">Address</td>
    <td class="tg-0lax"><?php echo $resi['useraddress'];?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Restaurant </td>
    <td class="tg-0lax"><?php echo $res1['sname'];?> 
    
    </td>
  </tr>
  <tr>
    <td class="tg-0lax">Delivery Boy</td>
    <td class="tg-0lax"><?php echo $res['rider'];?></td>
  </tr>
 
  
  <tr>
    <td class="tg-0lax">Customer Name</td>
    <td class="tg-0lax"><?php echo $res['uname'];?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Order Items</td>
    <td class="tg-0lax"><?php echo $res['pname'];?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Total Price<br>Delivery Charge<br>
    <td class="tg-0lax">Rs.<?php echo $res['price'];?><br>Rs.<?php echo $res['dcharge'];?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Booking Time</td>
    <td class="tg-0lax"><?php echo $res['ordertime'];?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Status</td>
    <td class="tg-0lax">
     <?php 
                            $status=$res['status'];
                            $picked='Order Picked up';
                            if($status=="Order Delivered"){ ?>
                            <button class="btn btn-success">Order Delivered</button> 
                            <?php }elseif($status=="Order Placed"){ ?>
                            <button class="btn btn-danger">Order Placed</button>
                            <?php }elseif($status=="Order Processed"){ ?>
                            <a href="deliverystatus.php?status=<?php echo $picked;?>&&oid=<?php echo $oid; ?>&&did=<?php echo $did; ?>" >
                            <button class="btn btn-secondary">Pickup Done</button> </a>
                            <?php }elseif($status=="Order Picked up"){ ?>
                            <a href="deliverystatus.php?status=Order Delivered&&oid=<?php echo $oid; ?>&&did=<?php echo $did; ?>" >
                            <button class="btn btn-warning">Make Delivered </button> </a>
                            <?php }else{ ?>
                            <button class="btn btn-dark">Canceled</button> 
                            <?php }; ?>
    
    
    </td>
  </tr>
  
 
  
  
</tbody>
</table>             
                       

        

    

    </div>
    <!-- * App Capsule -->

   <!-- App Bottom Menu -->
   <!--<div class="appBottomMenu">-->
   <!--     <a href="index.php" class="item active">-->
   <!--         <div class="col">-->
   <!--             <ion-icon name="home-outline"></ion-icon>-->
   <!--         </div>-->
   <!--     </a>-->
   <!--     <a href="home.php" class="item">-->
   <!--         <div class="col">-->
   <!--             <ion-icon name="cube-outline"></ion-icon>-->
   <!--         </div>-->
   <!--     </a>-->
        <!-- <a href="sendphone.php" class="item">
            <div class="col">
                <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                <span class="badge badge-danger">5</span>
            </div>
        </a> -->
    <!--    <a href="about.php" class="item">-->
    <!--        <div class="col">-->
    <!--            <ion-icon name="person-outline"></ion-icon>-->
    <!--        </div>-->
    <!--    </a>-->
    <!--    <a href="javascript:;" class="item" data-toggle="modal" data-target="#sidebarPanel">-->
    <!--        <div class="col">-->
    <!--            <ion-icon name="menu-outline"></ion-icon>-->
    <!--        </div>-->
    <!--    </a>-->
    <!--</div>-->
  
                    

                    
                

                <!-- sidebar buttons -->
                <!-- <div class="sidebar-buttons">
                    <a href="javascript:;" class="button">
                        <ion-icon name="person-outline"></ion-icon>
                    </a>
                    <a href="javascript:;" class="button">
                        <ion-icon name="archive-outline"></ion-icon>
                    </a>
                    <a href="javascript:;" class="button">
                        <ion-icon name="settings-outline"></ion-icon>
                    </a>
                    <a href="javascript:;" class="button">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </a>
                </div> -->
                <!-- * sidebar buttons -->
            </div>
        </div>
    </div>
    <!-- * App Sidebar -->
   

             
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

<?php } ; ?> </script> 

<script>
document.oncontextmenu = function() { 
                return false; };
      </script>
</body>
 
</html>