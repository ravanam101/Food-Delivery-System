<?php
include '../pay/db.php';

session_start();
$sql="SELECT * FROM `settings`where id=1";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);
$aname=$row["aname"];$appname=$row["appname"];
?>


</html>
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

<body class="bg-white">
    <?php if(isset($_COOKIE['loginadmin'])){
?>
<?php
if(isset($_POST['amit'])){
      $appname=$_POST['appname'];
       $address=$_POST['address'];
        $phone=$_POST['phone'];
      $whatsapp=$_POST['whatsapp'];
      $password=$_POST['password'];
       $tax=$_POST['tax'];
       $latitude=$_POST['latitude'];
       $longitude=$_POST['longitude'];
       $cod=$_POST['cod'];
       $gateway=$_POST['gateway'];
       $onoff=$_POST['onoff'];
       $addtocart=$_POST['addtocart'];
       $minorderamount=$_POST['minorderamount'];
       $maxcod=$_POST['maxcod'];
       $storeclose=$_POST['storeclose'];
       
  
    $sql="UPDATE `settings` SET `appname` = '$appname', `address` = '$address', `phone` = '$phone', `whatsapp` = '$whatsapp', `password` = '$password', `tax` = '$tax', `latitude` = '$latitude', `longitude` = '$longitude', `cod` = '$cod', `min` = '$minorderamount', `maxcod` = '$maxcod', `store_close_text` = '$storeclose', `onoff` = '$onoff', `gateway` = '$gateway', `show_add_to_cart` = '$addtocart' WHERE `settings`.`id` = 1;";
    $qry=mysqli_query($conn,$sql);
    if($qry==true){
        header("location:app-settings.php");
    }
    
}




 ?>
    <!-- loader -->
    <!--<div id="loader">-->
    <!--    <div class="spinner-border text-primary" role="status"></div>-->
    <!--</div>-->
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader ">
        <div class="left">
            <a href="dashboard.php" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"><?php echo $appname;?></div>
        <div class="right">
           
        </div>
    </div>
    <!-- * App Header -->



    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">
<br><br>
                

        <div class="login-form mt-1">
            <div class="section"><br>
                <img src="https://i.pinimg.com/originals/60/c3/9d/60c39d7f1cc24db55f677b7510ea7038.png" height="100" width="100">
            </div>
            <div class="section mt-1">
                <h3><?php echo $appname; ?></h3>
                <h4>Update Settings</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form action="app-settings.php" method="POST">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            
                            <?php 
                            $sqllocation="SELECT * FROM `settings` where id=1;";
                            $qrysql=mysqli_query($conn,$sqllocation);
                            $ressql=mysqli_fetch_assoc($qrysql);
                            $appname=$ressql['appname'];
                            $address=$ressql['address'];
                            $phone=$ressql['phone'];
                            $whatsapp=$ressql['whatsapp'];
                             $password=$ressql['password'];
                              $tax=$ressql['tax'];
                              $latitude=$ressql['latitude'];
                              $longitude=$ressql['longitude'];
                              $storeclose=$ressql['store_close_text'];
                            ?>
                         <label class="label" >App Name</label> 
                            <input type="text" class="form-control" name="appname"  value= "<?php echo $appname ;?>" placeholder="App Name" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Admin Phone (This number will be used for Login)</label>
                            <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>" placeholder="Admin Phone" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        
                    </div>
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Password</label>
                            <input type="Password" class="form-control" name="password" value="<?php echo $password; ?>" placeholder="Fixed Delivery Charge" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Support Phone and Whatsapp (Customer Can contact on this through app)</label>
                            <input type="text" class="form-control" name="whatsapp" value="<?php echo $whatsapp; ?>" placeholder="Whatsapp" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        
                    </div>
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Tax %</label>
                            <input type="text" class="form-control" name="tax" value="<?php echo $tax; ?>" placeholder="tax" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Address</label>
                            <input type="text" class="form-control" name="address" value="<?php echo $address; ?>" placeholder="address" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        
                    </div>
                     
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Latitude</label>
                            <input type="text" class="form-control" name="latitude" value="<?php echo $latitude; ?>" placeholder="latitude" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        
                    </div>
                    <input type="hidden" name="amit" value="amit">
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Longitude</label>
                            <input type="text" class="form-control" name="longitude" value="<?php echo $longitude; ?>" placeholder="latitude" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >COD ( 1= ON | 0 = OFF )</label>
                            <input type="text" class="form-control" name="cod" value="<?php echo $cod_status; ?>" placeholder="COD Status" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Gateway ( 1= ON | 0 = OFF )</label>
                            <input type="number" class="form-control" name="gateway" value="<?php echo $gateway; ?>" placeholder="gateway on/off" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Store  ( 1= ON | 0 = OFF )</label>
                            <input type="number" class="form-control" name="onoff" value="<?php echo $onoff; ?>" placeholder="store on /off" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Add to cart Button in Home page ( 1= ON | 0 = OFF )</label>
                            <input type="number" class="form-control" name="addtocart" value="<?php echo $show_add_to_cart; ?>" placeholder="Add to cart Button in Home page" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Minimum Order Amount </label>
                            <input type="number" class="form-control" name="minorderamount" value="<?php echo $min_order_amount; ?>" placeholder="Minimum Order Amount" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Maximum Order on COD </label>
                            <input type="number" class="form-control" name="maxcod" value="<?php echo $maxcod; ?>" placeholder="Maximum Order on COD" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Store Close Text</label>
                            <input type="text" class="form-control" name="storeclose" value="<?php echo $close_text; ?>" placeholder="Store Close Text" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                   
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                           
                            
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-links mt-2">
                        <div>
                            <?php echo $mes;?>
                        </div>
                        <!--<div><a href="page-forgot-password.html" class="text-muted">Forgot Password?</a></div>-->
                    </div>

                    <div class="form-button-group">
                        <button type="submit" class="btn btn-dark btn-block btn-lg">Update Charges</button>
                    </div>

                </form>
            </div>
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


<?php }else{
     $mes="Wrong Credentials";
   header("Location:index.php?message=$mes");
};?>
<script>
document.oncontextmenu = function() { 
                return false; };
      </script>
</body>


</html>

