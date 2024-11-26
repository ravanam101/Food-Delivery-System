<?php
include '../pay/db.php';
$cid=mysqli_real_escape_string($conn,$_GET['cid']);
$pid=mysqli_real_escape_string($conn,$_GET['pid']);
$lid=mysqli_real_escape_string($conn,$_GET['lid']);
$sid=mysqli_real_escape_string($conn,$_GET['sid']);
session_start();
$sql="SELECT * FROM `settings`where id=1";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);

$appname=$row["appname"];

// $sql1="SELECT * FROM `restaurant`where aid='$aid'";
// $res1=mysqli_query($conn,$sql1);
// $totalrestro=(mysqli_num_rows($res1));
// // $row1= mysqli_fetch_assoc($res1);

// $sql2="SELECT * FROM `orders`where aid='$aid'";
// $res2=mysqli_query($conn,$sql2);
// $totalorders=(mysqli_num_rows($res2));





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
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader ">
        <div class="left">
            <a href="product.php" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"><?php  echo $appname;?></div>
        <div class="right">
           <a href="addunit.php?pid=<?php  echo $pid;?>"><button class="btn btn-outline-dark btn-sm">Add Unit</button></a>
            </a>
        </div>
        
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">
    
<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Varient ID</th>
                        <th>Variation unit</th>
                        <th>Price</th>                       
                        <th>Action</th>
                        
                        
                        
                      
                    </tr>
                </thead>
                <tbody>
                   <?php
                        $qry="SELECT * FROM `protuct_varient` WHERE  pid=$pid";
                        $raw=mysqli_query($conn,$qry);
                        while($res=mysqli_fetch_array($raw)){?>
                    
                    <tr>
                        <td><?php echo $res['pvi']; ?></td>
                        <td><?php echo $res['unit']; ?> <br>
                        </td>
                        <td><?php  echo $res['price'];?></td>
                        <td>
                            <a href="deleteunit.php?pid=<?php  echo $pid;?>&&pvi=<?php echo $res['pvi']; ?>">
                            <button class="btn btn-outline-danger btn-sm">Delete</button></a></td>                        
                       
                      
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