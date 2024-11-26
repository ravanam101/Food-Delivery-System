<?php 
include '../pay/db.php';

$lid=mysqli_real_escape_string($conn,$_GET['lid']);
// $lname=$_GET['lname'];
session_start();
$sql="SELECT * FROM `settings`where id=1";
$res=mysqli_query($conn,$sql);
$row= mysqli_fetch_assoc($res);
$aname=$row["aname"];
$appname=$row["appname"];

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
        <div class="pageTitle"><?php  echo $appname;?></div>
        <div class="right">
            <a href="addboy.php?lid=<?php echo $lid;?>">
                <button class="btn btn-success btn-sm">Add Dboy</button>
            </a>
        </div>
        
    </div>
    <!-- * App Capsule -->
 <!-- App Capsule -->
    <div id="appCapsule">
    
<table class="table table-striped table-hover">
                <thead>
                    
                    <tr>
                        <th>DID</th>
                        <th>Orders</th>
                        <th>Name</th>
                        <th>Action</th>                       
                        
                        
                        
                        
                      
                    </tr>
                </thead>
                <tbody>
                   
                    <?php
                            $qry="SELECT * FROM `dboy` ORDER BY `dboy`.`did` DESC";
                            $raw=mysqli_query($conn,$qry);
                            while($res=mysqli_fetch_array($raw)){?>
                    
                    <tr>
                        <td><?php echo $res['did']; ?></td>
                        <td><h4><a href="dboyorder.php?did=<?php echo $res['did']; ?>"><button class="btn btn-outline-danger btn-sm">View</button></a></h4></td>
                        <td><?php  echo $res['dname'];?></td>
                        <!--<td><a href="editdboy.php?aid=<?php echo $aid; ?>&&did=<?php echo $res['did']; ?>&&lid=<?php echo $lid; ?>"><button class="btn btn-warning">Edit</button></a></td>-->
                         <td> <a href="tel:+91<?php echo  $res["dphone"]; ?>">
                  <button class="btn btn-outline-success btn-sm">Call</button>
               </a></td>                     
                       
                      
                    </tr>
                 <?php }; ?>
                 
                 
                </tbody>
            </table>
       <!-- <div class="appBottomMenu">-->
       <!--<a href="logout.php?aid=<?php echo $aid; ?>">-->
       <!--     <div class="col">-->
       <!--        Logout <ion-icon name="log-out"></ion-icon>-->
       <!--     </div></a>-->
       <!--     </div>-->


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
};?>
<script>
document.oncontextmenu = function() { 
                return false; };
      </script>
</body>

</html>