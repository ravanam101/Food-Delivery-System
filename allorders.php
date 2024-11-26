<?php
include '../pay/db.php';

$did=addslashes($_GET['did']);
session_start();
$qryrestro="SELECT * FROM `settings`where id=1";
$rawrestro=mysqli_query($conn,$qryrestro);
$resrestro= mysqli_fetch_assoc($rawrestro);
$appname=$resrestro["appname"];
// $phone=$_SESSION['login'];
// $pass=$_SESSION['loginpass'];

// $sql1="SELECT * FROM `dboy`where did='$did'";
// $res1=mysqli_query($conn,$sql1);
// // $totalrestro=(mysqli_num_rows($res1));
// $row1= mysqli_fetch_assoc($res1);
// $dname=$row1['dname'];
// $dphone=$row1['dphone'];
// $rstatus=$row1['status'];

// $sql2="SELECT * FROM `orders`where rid='$rid' AND status='Order Delivered';
// $res2=mysqli_query($conn,$sql2);
// $totalorders=(mysqli_num_rows($res2));





?>


<html>

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
    <?php if(isset($_SESSION['logindboy'])){
        
    
?>

   <!-- loader -->
    <div id="loader">
        <div class="spinner-border text-primary" role="status"></div>
    </div>
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader bg-primary text-light">
        <div class="left"><ion-icon name="menu-outline"></ion-icon>
            <a href="javascript:;"  data-toggle="modal" data-target="#sidebarPanel">
            <div class="col">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </a>
        </div>
        <div class="pageTitle"><?php  echo $appname;?></div>
        <div class="right">
            
               
        </div>
        
    </div>
    <!-- * App Capsule -->
 <!-- App Capsule -->
    <div id="appCapsule">
    
<table class="table table-striped table-hover">
                <thead>
                    
                    <tr>
                        <th>OID</th>
                        <th>Order</th>
                        <th>Status</th>  
                        <th>Earnings</th> 
                        
                        
                        
                        
                      
                    </tr>
                </thead>
                <tbody>
                   
                    <?php
                        $qry="SELECT * FROM `orders` WHERE did=$did AND dchargestatus=1 ORDER BY oid DESC";
                        $raw=mysqli_query($conn,$qry);
                        while($res=mysqli_fetch_array($raw)){?>
                    
                    <tr>
                        <td><?php  echo $res['oid'];?></td>
                        <td><a href="vieworder.php?oid=<?php echo $res['oid']; ?>&&did=<?php echo $did; ?>"><button class="btn btn-info">View</button></a></td>
                        
                        
                        <td>
                            <?php 
                            $status=$res['status'];
                            if($status=="Order Delivered"){ ?>
                            <button class="btn btn-success">Order Delivered</button> 
                            <?php }elseif($status=="Order Placed"){ ?>
                            <button class="btn btn-danger">Order Placed</button>
                            <?php }elseif($status=="Order Processed"){ ?>
                            <button class="btn btn-secondary">Order Processed</button> 
                            <?php }elseif($status=="Order Picked up"){ ?><button class="btn btn-warning">Order Picked up</button> 
                            <?php }else{ ?>
                            <button class="btn btn-dark">Canceled</button> 
                            <?php }; ?>
                           
                        
                        
                        
                        
                        </td>
                        
                        
                         <td><h4>Rs.<?php  echo $res['dcharge'];?><br><?php if($res['dchargestatus']==1){echo "Paid";}else{echo "Due";}?></h4>   
                         
                            </td>
                                              
                       
                      
                    </tr>
                 <?php }; ?>
                 
                 
                </tbody>
            </table>
        

    <!-- App Sidebar -->
    <div class="modal fade panelbox panelbox-left" id="sidebarPanel" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body p-0">

                     <!-- profile box -->
                    <div class="profileBox">
                        <div class="image-wrapper">
                            <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="imaged rounded">
                        </div>
                        <div class="in">
                            <strong><?php echo $dname; ?></strong>
                            <div class="text-muted">
                                <ion-icon name="location"></ion-icon>
                                <?php echo $dphone;?>
                            </div>
                        </div>
                        <a href="javascript:;" class="close-sidebar-button" data-dismiss="modal">
                            <ion-icon name="close"></ion-icon>
                        </a>
                    </div>
                    <!-- * profile box -->

                    <ul class="listview flush transparent no-line image-listview mt-2">
                        <li>
                            <br>
                            <a href="home.php?did=<?php echo $did; ?>" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="home-outline"></ion-icon>
                                </div>
                                <div class="in">
                                   Home
                                </div>
                            </a>
                        </li>
                        
                        <!--<li>-->
                        <!--    <a href="settings.php?aid=<?php echo $aid; ?>&&rid=<?php echo $rid; ?>" class="item">-->
                        <!--        <div class="icon-box bg-primary">-->
                        <!--            <ion-icon name="layers-outline"></ion-icon>-->
                        <!--        </div>-->
                        <!--        <div class="in">-->
                        <!--            <div>Settings</div>-->
                        <!--        </div>-->
                        <!--    </a>-->
                        <!--</li>-->
                        <li>
                            <a href="allorders.php?did=<?php echo $did; ?>" class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="chatbubble-ellipses-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>All Orders (Paid)</div>
                                    <span class="badge badge-danger"></span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="item">
                                <div class="icon-box bg-primary">
                                    <ion-icon name="moon-outline"></ion-icon>
                                </div>
                                <div class="in">
                                    <div>Dark Mode</div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input dark-mode-switch"
                                            id="darkmodesidebar">
                                        <label class="custom-control-label" for="darkmodesidebar"></label>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="listview-title mt-2 mb-1">
                        <!--<span>Friends</span>-->
                    </div>
                    

                </div>

                <!-- sidebar buttons -->
                <div class="sidebar-buttons">
                    
                    <a href="logout.php?did=<?php echo $did; ?>" class="button">
                        <ion-icon name="log-out-outline"></ion-icon> <h4>Logout</h4>
                    </a>
                </div>
                <!-- * sidebar buttons -->
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
    <script>
    //     setTimeout(function(){
    //         window.location.href='logout.php?aid=<?php echo $aid; ?>';}, 100000);
        
    // </script>
    
    
    
    
<?php }else{
     $mes="Wrong Credentials";
   header("Location:index.php?aid=$aid&&message=$mes");
};?></script> 

<script>
document.oncontextmenu = function() { 
                return false; };
      </script>
</body>

</html>