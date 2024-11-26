<?php
include '../pay/db.php';

session_start();
$sql="SELECT * FROM `settings`where id=1";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);


$appname=$row["appname"];


?>



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
    <link rel="manifest" href="__manifest.json">
</head>
    

<body>
<?php if(isset($_COOKIE['loginadmin'])){
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
        <!--<div class="pageTitle"><img src="../logo.gif" alt="image"  width="160" height="50"></div>-->
        <div class="pageTitle"><?php  echo $appname;?></div>
        <div class="right">
          
        </div>
        
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
    
<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Contacts</th>                       
                        <th>Location</th>
                        
                        
                        
                      
                    </tr>
                </thead>
                <tbody>
                   <?php
                        $qry="SELECT * FROM `user` ORDER BY `user`.`userid` DESC";
                        $raw=mysqli_query($conn,$qry);
                        while($res=mysqli_fetch_array($raw)){?>
                    
                    <tr>
                        <td><?php echo $cid=$res['userid']; ?></td>
                        <td><?php  echo $res['userphone'];?> <br>
                        (<?php echo  $res['useraddress']; ?>)
                        </td>
                        <td>
                            <a href="tel:+91<?php echo  $res['userphone']; ?>">
                            <button class="btn btn-outline-primary btn-sm">Call</button></a>
                             <a href="https://api.whatsapp.com/send?phone=91<?php echo $res['userphone']; ?>"><button class="btn btn-outline-success btn-sm">Whatsapp</button></a>
                            
                        </td>
                        <td>
                            <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $res['latuser'];?>%2C<?php echo $res['longuser'];?>">
                            <button class="btn btn-outline-primary btn-sm">Location</button></a>
                         
                        
                        </td>                       
                       
                      
                    </tr>
                 <?php }; ?>
                 
                 
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

<?php }else{
     $mes="Wrong Credentials";
   header("Location:index.php?message=$mes");
};?>

</body>


</html>