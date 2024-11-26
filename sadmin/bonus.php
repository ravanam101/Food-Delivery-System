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
if(isset($_POST['update'])){
    $cashback=$_POST['cashback'];
    $cashbackon=$_POST['cashbackon'];
    $welcome=$_POST['welcome'];
    $sql="UPDATE `settings` SET `cashback` = '$cashback', `cashbackon` = '$cashbackon',`welcome` ='$welcome' WHERE `settings`.`id` = 1;";
    $qry=mysqli_query($conn,$sql);
    
    
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
        <div class="pageTitle"><img src="images/<?php echo $row["applogo"]; ?>" alt="image"  width="160" height="50"></div>
        <div class="right">
           
        </div>
    </div>
    <!-- * App Header -->



    <!-- App Capsule -->
    <div id="appCapsule" class="pt-0">
<br><br>
                

        <div class="login-form mt-1">
            <div class="section">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRKRmn_ySH1Tt_1wjXnmFAmaPvX8LhFZXxsWg&usqp=CAU" alt="image" class="form-image">
            </div>
            <div class="section mt-1">
                <h3><?php echo $appname; ?></h3>
                <h4>Cashback Settings</h4>
            </div>
            <div class="section mt-1 mb-5">
                <form action="bonus.php" method="POST">
                    <div class="form-group boxed">

                        <div class="input-wrapper">
                            
                            <?php 
                            $sqllocation="SELECT * FROM `settings` where id=1;";
                            $qrysql=mysqli_query($conn,$sqllocation);
                            $ressql=mysqli_fetch_assoc($qrysql);
                            $cashback=$ressql['cashback'];
                            $cashbackon=$ressql['cashbackon'];
                            $welcome=$ressql['welcome'];
                            
                            ?>
                           
                             <label class="label" >Cashback Amount</label> 
                            <input type="text" class="form-control" name="cashback"  value= "<?php echo $cashback ;?>" placeholder="Cashback" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        
                    </div>
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                          <label class="label" >Cashback on what Amount amount of order?</label> 
                            <input type="text" class="form-control" name="cashbackon" value="<?php echo $cashbackon; ?>" placeholder="Cashback on Value" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        
                    </div>                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                         <label class="label" >Set Welcome Bonus (Customer will get bonus on signup). </label> 
                            <input type="text" class="form-control" name="welcome" value="<?php echo $welcome; ?>" placeholder="Welcome Bonus" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        
                    </div>
                    <input type="hidden" name="update" value="1">

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
                        <button type="submit" class="btn btn-primary btn-block btn-lg">Update Bonus & Cashback</button>
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

