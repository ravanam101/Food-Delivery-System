<?php
include '../pay/db.php';

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
            <a href="dashboard.php" class="headerButton goBack">
                <ion-icon name="chevron-back-outline"></ion-icon>
            </a>
        </div>
        <div class="pageTitle"><?php  echo $appname;?></div>
        <div class="right">
            <a href="javascript:;" class="headerButton toggle-searchbox">
                <ion-icon name="search-outline"></ion-icon>
            </a>
           <a href="addproduct.php"><button class="btn btn-outline-dark btn-sm">Add Product</button></a>
            </a>
        </div>
        
    </div>
    <!-- * App Header -->
    
    
    <!-- Search Component -->
    <div id="search" class="appHeader">
        <form class="search-form" action="product-search.php" method="GET">
            <div class="form-group searchbox">
                <input type="text" class="form-control" name="search" placeholder="Search...">
                <i class="input-icon">
                    <ion-icon name="search-outline"></ion-icon>
                </i>
                <a href="javascript:;" class="ml-1 close toggle-searchbox">
                    <ion-icon name="close-circle"></ion-icon>
                </a>
            </div>
        </form>
    </div>
    <!-- * Search Component -->

    <!-- App Capsule -->
    <div id="appCapsule">
    
<table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>PID</th>
                        <th>P Name</th>
                        <th>Price</th>                       
                        <th>Action</th>
                        
                        
                        
                      
                    </tr>
                </thead>
                <tbody>
                   <?php
                        $qry="SELECT * FROM `products` ORDER BY `pid` DESC";
                        $raw=mysqli_query($conn,$qry);
                        while($res=mysqli_fetch_array($raw)){?>
                    
                    <tr>
                        <?php 
                        $type=$res['imgtype'];
                        if($type==1){
                        ?>
                        
                        <td><?php echo $res['pid']; ?> <a href="product-image-update.php?pid=<?php echo $res['pid']; ?>"><img src="<?php  echo $res['pimage'];?>" height="30" width="30" class="rounded-circle"></a>
                         <?php if($res['status']==0){ ?>
                        
                        <a href="onoff.php?pid=<?php  echo $res['pid'];?>&status=1">
                        <button class="btn btn-outline-success btn-sm">On</button></a>
                        
                        <?php }else{ ?>
                        
                        <a href="onoff.php?pid=<?php  echo $res['pid'];?>&status=0">
                        <button class="btn btn-outline-danger btn-sm">Off</button></a>
                        
                        <?php }; ?>
                        
                        
                        </td>
                        <?php }else{ ?>
                        <td><?php echo $res['pid']; ?> <a href="product-image-update.php?pid=<?php echo $res['pid']; ?>"><img src="./images/<?php  echo $res['pimage'];?>" height="30" width="30" class="rounded"></a>
                        <?php if($res['status']==0){ ?>
                        
                        <a href="onoff.php?pid=<?php  echo $res['pid'];?>&status=1">
                        <button class="btn btn-outline-success btn-sm">On</button></a>
                        
                        <?php }else{ ?>
                        
                        <a href="onoff.php?pid=<?php  echo $res['pid'];?>&status=0">
                        <button class="btn btn-outline-danger btn-sm">Off</button></a>
                        
                        <?php }; ?> 
                        
                        
                        </td>
                        <?php }?>
                        <td><?php  echo $res['pname'];?> <br>
                        <a href="product-edit.php?pid=<?php  echo $res['pid'];?>">
                        <button class="btn btn-outline-success btn-sm">Edit</button></a>
                        </td>
                        <td>Rs.<?php  echo $res['price'];?>  (<?php  echo $res['punit'];?>)<br>
                        <a href="product-delete.php?pid=<?php  echo $res['pid'];?>">
                        <button class="btn btn-outline-danger btn-sm">Delete</button></a>
                        </td>
                        <td>
                        <a href="product-unit.php?pid=<?php  echo $res['pid'];?>">
                        <button class="btn btn-outline-primary btn-sm">Add Unit</button></a><br>
                        <a href="product-addl-image.php?pid=<?php  echo $res['pid'];?>">
                        <button class="btn btn-outline-info btn-sm">Addl.Image</button></a>
                        
                        <?php if($res['promoted']==0){ ?>
                        <a href="trending.php?status=1&&pid=<?php  echo $res['pid'];?>">
                        <button class="btn btn-outline-warning btn-sm">+Trending</button></a>
                        <?php } else { ?>
                        <a href="trending.php?status=0&&pid=<?php  echo $res['pid'];?>">
                        <button class="btn btn-outline-warning btn-sm">-Trending</button></a>
                        <?php };?>
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