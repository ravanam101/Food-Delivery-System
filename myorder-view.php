<?php
session_start();
include 'pay/db.php';
if(!isset($_COOKIE['phone'])){
    header("location:index.php");
}

$sqi="select * from `user` where userphone=$phone";
$qri=mysqli_query($conn,$sqi);
$rei=mysqli_fetch_assoc($qri);
$uid=$rei['userid'];

$oid=mysqli_real_escape_string($conn,$_GET['oid']);
$sid=mysqli_real_escape_string($conn,$_GET['sid']);
$lid=mysqli_real_escape_string($conn,$_GET['lid']);
// $oid=1;
$rrr="select * from `settings` where id=1";
$sss=mysqli_query($conn,$rrr);
$ttt=mysqli_fetch_assoc($sss);
$appname=$ttt['appname'];
$applogo=$ttt['applogo'];

$bb="select * from `orders` where oid=$oid";
$ss=mysqli_query($conn,$bb);
$zz=mysqli_fetch_assoc($ss);
$uname=$zz['uname'];
$ophone=$zz['ophone'];
$pname=$zz['pname'];
$dcharge=$zz['dcharge'];
$tax=$zz['tax'];
$walletq=$zz['wallet'];
$price=$zz['price'];
$rider=$zz['rider'];
$ordertime=$zz['ordertime'];
$sid=$zz['sid'];
$tid=$zz['tid'];



$bbbbq="select * from `user` where userid=$uid";
$ssssq=mysqli_query($conn,$bbbbq);
$zzzzq=mysqli_fetch_assoc($ssssq);
$city=$zzzzq['city'];
$landmark=$zzzzq['userlandmark'];
$daddress=$zzzzq['useraddress'];


?>

<!-- THIS EMAIL WAS BUILT AND TESTED WITH LITMUS http://litmus.com -->
<!-- IT WAS RELEASED UNDER THE MIT LICENSE https://opensource.org/licenses/MIT -->
<!DOCTYPE html>
<html>

<head>
  <title>rr</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
  <style type="text/css">
    /* CLIENT-SPECIFIC STYLES */
    body,
    table,
    td,
    a {
      -webkit-text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
    }
    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }
    img {
      -ms-interpolation-mode: bicubic;
    }
    
    /* RESET STYLES */
    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }
    table {
      border-collapse: collapse !important;
    }
    body {
      height: 100% !important;
      margin: 0 !important;
      padding: 0 !important;
      width: 100% !important;
    }
    
    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
      color: inherit !important;
      text-decoration: none !important;
      font-size: inherit !important;
      font-family: inherit !important;
      font-weight: inherit !important;
      line-height: inherit !important;
    }
    
    /* MEDIA QUERIES */
    @media screen and (max-width: 480px) {
      .mobile-hide {
        display: none !important;
      }
      .mobile-center {
        text-align: center !important;
      }
      .align-center {
        max-width: initial !important;
      }
      h1 {
        display: inline-block;
        margin-right: auto !important;
        margin-left: auto !important;
      }
    }
    @media screen and (min-width: 480px) {
      .mw-50 {
        max-width: 50%;
      }
    }
    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] {
      margin: 0 !important;
    }
    :root {
      --purple: #5a3aa5;
      --pink: #b91bab;
      --blue: #2cbaef;
      --green: #23c467;
    }
  </style>
          <script type="text/javascript">
          function example1() {
             // Vibrate for 500ms
             navigator.vibrate([100]);
          }
        </script>     
  </head>
<body>
  <!--<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">-->
      <!-- App Header -->
    <div class="appHeader">
        <div class="left">
              <p class="mt-0 mb-0"  onclick="example1()" >
            <a href="myorder.php?lid=<?php echo $lid; ?>" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a></p>
        </div>
        <div class="pageTitle">Invoice</div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header --> 

    <!-- HIDDEN PREHEADER TEXT -->
    <!--<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">-->
    <!--  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus dolor aliquid omnis consequatur est deserunt, odio neque blanditiis aspernatur, mollitia ipsa distinctio, culpa fuga obcaecati!-->
    <!--</div>-->

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tr>
        <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
          <!--[if (gte mso 9)|(IE)]>
        <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
        <tr>
        <td align="center" valign="top" width="600">
        <![endif]-->
          <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%;">
            <tr>
              <td align="center" height="6" style="background-image: linear-gradient(to right, #b91bAb, #5a3aa5); background-color: #b91bAb;" bgcolor="#b91bAb"></td>
            </tr>
          </table>
          <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:800px;">
            <tr>
              <td align="center" valign="top" style="background-color: #ffffff; font-size:0; padding: 10px 20px 0;" bgcolor="#ffffff">
                <!--[if (gte mso 9)|(IE)]>
                <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                <tr>
                <td align="left" valign="top" width="300">
                <![endif]-->
                <br>
                <div class="align-center" style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
                 <!--<div align="left">-->
                 <!--    <button>Back to Orders</button>-->
                 <!--</div> -->
                 <br>
                 
                   <!--<img src="sadmin/images/<?php echo $applogo; ?>" width="100" height="9" style="display: block; border: 0px;" alt="HealthPlanG" />-->
                </div>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                <td align="right" width="300">
                <![endif]-->
                <!--<div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">-->
                <!--  <table align="right" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">-->
                <!--    <tr>-->
                <!--      <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">-->
                <!--        <table cellspacing="0" cellpadding="0" border="0" align="right">-->
                         
                <!--        </table>-->
                <!--      </td>-->
                <!--    </tr>-->
                <!--  </table>-->
                <!--</div>-->
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
              </td>
            </tr>
            <tr>
              <td align="center" style="padding: 0 15px 20px 15px; background-color: #ffffff;" bgcolor="#ffffff">
                <!--[if (gte mso 9)|(IE)]>
                <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                <tr>
                <td align="center" valign="top" width="600">
                <![endif]-->
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                  
                  
                    <td align="left" style="padding-top: 10px;">
                      <table cellspacing="0" cellpadding="0" border="0" width="100%">
                       
                       
                        <tr>
                          <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 10px;">
                            Invoice #
                          </td>
                          <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 10px;">
                            000<?php echo $oid; ?>
                          </td>
                        </tr>
                        <tr>
                          <td width="30%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 10px; font-weight: 400; line-height: 10px; padding: 15px 10px 5px 10px;">
                            Order Date :    <?php echo $ordertime; ?>
                          </td>
                          
                        </tr>
                        <tr>
                          <td width="50%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 10px; font-weight: 400; line-height: 10px; padding: 5px 10px;">
                            Customer : <?php echo $uname; ?>
                          </td>
                         
                        </tr>
                        <tr>
                          <td width="50%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 10px; font-weight: 400; line-height: 10px; padding: 5px 10px;">
                            Phone : <?php echo $phone; ?>
                          </td>
                         
                        </tr>
                        <tr>
                          <td width="50%" align="left" style="border-bottom: 2px solid #eeeeee; font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 10px; font-weight: 400; line-height: 10px; padding: 5px 10px 20px 10px;">
                            Payment Option: <?php if($tid==1){ echo "Online Payment"; }else{ echo "Cash On Delivery"; }; ?>
                          </td>
                          
                        </tr>
                        <tr>
                          <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 600; line-height: 10px; padding: 10px;">
                            Addresses
                          </td>
                          <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 10px;">
                           📍
                          </td>
                        </tr>
                        <tr>
                          <td width="100%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 10px; font-weight: 400; line-height: 10px; padding: 15px 10px 5px 10px;">
                           Delivery Address :    <?php echo $daddress; ?>, <?php echo $landmark; ?> .
                           <!--Pin: <?php echo $city; ?>-->
                          </td>
                          
                        </tr>
                      
                       
                        
                        
                        <tr>
                          <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 10px;">
                            Order Items
                          </td>
                          <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 600; line-height: 24px; padding: 10px;">
                           
                          </td>
                        </tr>
                        <tr>
                          <td width="50%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 10px; font-weight: 400; line-height: 10px; padding: 15px 10px 5px 10px;">
                          <?php echo $pname; ?>
                          </td>
                          
                        </tr>
                        
                        
                        
                       
                        
                        
                        
                        
                      </table>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" style="padding-top: 20px;">
                      <table cellspacing="0" cellpadding="0" border="0" width="100%">
                        <tr>
                          <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; line-height: 10px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                           Total Item Price :
                          </td>
                          <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; line-height: 10px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                            Rs. <?php echo $price; ?>
                          </td>
                        </tr>
                        <tr>
                          <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; line-height: 10px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                            Delivery Charges
                          </td>
                          <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; line-height: 10px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                           Rs. <?php echo $dcharge; ?>
                          </td>
                        </tr>
                        <tr>
                          <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; line-height: 10px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                           Tax Charge
                          </td>
                          <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; line-height: 10px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                           Rs. <?php echo $tax; ?>
                          </td>
                        </tr>
                         <tr>
                          <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; line-height: 10px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                           Wallet Used
                          </td>
                          <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 400; line-height: 10px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                         -  Rs. <?php echo $walletq; ?>
                          </td>
                        </tr>
                        
                          <tr>
                          <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 600; line-height: 10px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                           Subtotal : 
                          </td>
                          <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 12px; font-weight: 600; line-height: 10px; padding: 10px; border-top: 2px solid #eeeeee; border-bottom: 2px solid #eeeeee;">
                          Rs. <?php echo round(($price+$dcharge+$tax)-$walletq); ?>
                          </td>
                        </tr>
                        
                        
                        
                      </table>
                      
                      
                      
                    </td>
                  </tr>
                  
                  
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
              </td>
            </tr>
            
            
            
            
            
            <tr>
              <td align="center" style="padding: 0px 0px 15px; background-color: #ffffff;" bgcolor="#ffffff">
                <!--[if (gte mso 9)|(IE)]>
                <table align="center" border="0" cellspacing="0" cellpadding="0" width="600">
                <tr>
                <td align="center" valign="top" width="600">
                <![endif]-->
                <!--<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">-->
                <!--  <tr>-->
                <!--    <td align="center" style="line-height: 0;">-->
                        
                      <!--  <a href="https://api.html2pdfrocket.com/pdf?value=https://khushishop.in/khusi/myorder-view.php?oid=<?php echo $oid; ?>&sid=<?php echo $sid; ?>&lid=<?php echo $lid; ?>&apikey=3761723c-156c-4271-b4fa-ba110990aa6c">-->
                        
                      <!--<img src="https://camo.githubusercontent.com/cc216e2781cdcd0e721b418c333de4e42dd893529ad29fd3b43f53c3648ae59b/68747470733a2f2f73756268726137342e6769746875622e696f2f78646d2f646f776e6c6f61642e706e67" width="200" height="27" style="display: block; border: 0px;" /></a>-->
                      
                     
                <!--    </td>-->
                <!--  </tr>-->
                  
                  <tr>
                    <!--<td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 10px;">-->
                    <!--  <p style="font-size: 10px; font-weight: 400; line-height: 10px; color: #666666; padding: 0 5px; max-width: 400px;">Thank you for shopping with us-->
                       
                        <!--<span style="color: #888888; display: block; font-size: 90%; font-weight: 600; padding-top: 15px;">&copy; 2022 <?php echo $appname;?>. All rights reserved.</span>-->
                    <!--  </p>-->
                    <!--</td>-->
                  </tr>
                </table>
                <!--[if (gte mso 9)|(IE)]>
                </td>
                </tr>
                </table>
                <![endif]-->
              </td>
            </tr>
          </table>
          <!--[if (gte mso 9)|(IE)]>
        </td>
        </tr>
        </table>
        <![endif]-->
        </td>
      </tr>
    </table>
    <!-- App Bottom Menu -->
     <div class="appBottomMenu">
        <a href="shop.php" class="item">
            <div class="col mt-2">
                 <p class="mt-0 mb-0" onclick="example1()">
                <ion-icon name="home-outline"></ion-icon>
                <p class="text-secondary">Home</p></p>
            </div>
        </a>
        <?php
                            if(isset($_COOKIE['phone'])){
                            ?>
        <a href="myorder.php?uid=<?php echo $uid; ?>&lid=<?php echo $lid; ?>" class="item">
            <div class="col mt-2">
                <p class="mt-0 mb-0" onclick="example1()">
               <ion-icon name="bicycle-outline"></ion-icon> 
               <p class="text-secondary">Track Orders</p></p>
            </div>
        </a>
        <?php }; ?>
       
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
 <script type = "text/javascript" >  
//     function preventBack() { window.history.forward(); }  
//     setTimeout("preventBack()", 0);  
//     window.onunload = function () { null };  
// </script> 
  </body>

</html>