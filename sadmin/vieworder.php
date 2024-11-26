<?php
include '../pay/db.php';
session_start();
$oid=mysqli_real_escape_string($conn,$_GET['oid']);
$qry="SELECT*FROM`orders`where oid=$oid";
$raw=mysqli_query($conn,$qry);
$res=mysqli_fetch_assoc($raw);
$sid=$res['sid'];
$uid=$res['userid'];

$sql="select * from `settings` where id=1";
$qry=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($qry);
$appname=$row['appname'];

$qryi="SELECT*FROM`user`where userid=$uid";
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
    <title><?php  echo $appname;?></title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="css/card.css">
  
</head>

<body>
<?php if(isset($_COOKIE['loginadmin'])){
?>
    <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader ">
        <div class="left">
            <a href="dashboard.php" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"><?php  echo $appname;?></div>
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
    <td class="tg-0lax">Delivery Boy</td>
    <td class="tg-0lax"><?php echo $res['rider'];?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Phone Number</td>
    <td class="tg-0lax"><?php echo $res['ophone'];?></td>
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
    <td class="tg-0lax">Total Price<br>Delivery Charge<br>Tax<br>Wallet</td>
    <td class="tg-0lax">Rs.<?php echo $res['price'];?><br>Rs.<?php echo $res['dcharge'];?><br>Rs.<?php echo $res['tax'];?><br>Rs.<?php echo $wallet=$res['price']-($res['dcharge']+$res['price']);?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Booking Time</td>
    <td class="tg-0lax"><?php echo $res['ordertime'];?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Status</td>
    <td class="tg-0lax"><?php echo $res['status'];?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Change Status</td>
    <td class="tg-0lax"><a href="change-status.php?oid=<?php echo $oid; ?>"><button class="btn btn-dark btn-sm">Change Status</button></a></td>
  </tr>
  <tr>
    <td class="tg-0lax">Payment Status</td>
    <td class="tg-0lax"><?php if($res['tid']==1) { echo "Payment Successful"; }else{ echo "Cash On Delivery"; }?></td>
  </tr>
  <tr>
    <td class="tg-0lax">Exact Location</td>
    <td class="tg-0lax">
        <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $resi['useraddress'];?>,<?php echo $resi['userlandmark'];?>"><button class="btn btn-success btn-sm">Map View</button></a></td>
  </tr>
   <tr>
    <td class="tg-0lax">Delete Order</td>
    <td class="tg-0lax">
        <a href="delete-order.php?oid=<?php echo $res['oid']; ?>"><button class="btn btn-success btn-sm">Delete Order</button></a></td>
  </tr>
  <tr>
    <td class="tg-0lax">Address</td>
    <td class="tg-0lax"><?php echo $resi['useraddress'];?>,<?php echo $resi['userlandmark'];?>,<?php echo $resi['city'];?>,<?php echo $resi['pincode'];?>,<?php echo $resi['state'];?>,<?php echo $resi['country'];?></td>
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

<?php } ; ?> 
<script>
document.oncontextmenu = function() { 
                return false; };
      </script>
</body>
 
</html>