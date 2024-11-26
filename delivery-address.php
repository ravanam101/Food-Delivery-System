<?php
session_start();
include 'pay/db.php';



 if(!isset($_COOKIE['phone']))
 header("location:index.php");
$sid=$_GET['sid'];
 $uid=$_GET['uid'];

  $total=$_GET['total'];
 
$sql="select * from `user` where userid=$uid";
$qry=mysqli_query($conn,$sql);
$res=mysqli_fetch_assoc($qry);
$name=$res['username'];
$add=$res['useraddress'];
$landmark=$res['userlandmark'];
$phone=$res['userphone'];
$addisset=$res['addisset'];
$lat=$res['latuser'];
$long=$res['longuser'];
$city=$res['city'];
$pincode=$res['pincode'];
$state=$res['state'];
$country=$res['country'];


?>

<?php
// function getAddress($lat, $long)
// {
//         //google map api url
//         $url = "https://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$long&key=AIzaSyA13uIRepA4dw4vdxHtj0hyxNSHARYBWgY";

//         // send http request
//         $geocode = file_get_contents($url);
//         $json = json_decode($geocode);
//         $address = $json->results[0]->formatted_address;
//         return $address;
// }
?>
<?php
// coordinates
// $latitude = '40.6781784';
// $longitude = '-73.9441579';
// $result = getAddress($lat, $long);
// echo 'Address: ' . $result;

// produces output
// Address: 58 Brooklyn Ave, Brooklyn, NY 11216, USA
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
    <title><?php echo  $appname; ?></title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
    
    
    <style>
        .headerButton.goBack {
    display: inline-flex; /* Ensures button behaves correctly */
    align-items: center;  /* Aligns content vertically */
    text-decoration: none; /* Removes underline */
    color: #000; /* Set text color */
    padding: 10px; /* Increase clickable area */
    cursor: pointer; /* Change cursor to pointer on hover */
    font-size: 16px; /* Adjust font size */
}

.headerButton.goBack ion-icon {
    margin-right: 5px; /* Space between icon and text */
}

.headerButton.goBack:hover {
    color: #007bff; /* Change color on hover */
}
.headerButton.goBack {
    position: relative;
    z-index: 10; /* Adjust as needed */
}
    </style>
</head>

<body onload="getLocation()">

    <!-- loader -->
    <!--<div id="loader">-->
    <!--    <img src="sadmin/images/<?php echo  $applogo; ?>" alt="logo" width="220" height="50">-->
        <!--<div class="spinner-grow text-warning" role="status"></div>-->
    <!--</div>-->
    <!-- * loader -->

    <!-- App Header -->
    <div class="appHeader ">
        <div class="left">
           <a href="cart.php?sid=<?php echo $sid; ?>&uid=<?php echo $uid; ?>" class="headerButton goBack">
    <ion-icon name="chevron-back-outline"></ion-icon> Back to Cart
</a>

        </div>
        <div class="pageTitle">Delivery address </div>
        <div class="right">
        </div>
    </div>
    <!-- * App Header -->

    <!-- App Capsule -->
    <div id="appCapsule">

<!--<img src="location.gif" height="125" width="350">-->
       

        <div class="section full mt-0 mb-0">
            
            
            <div class="wide-block pb-1 ">
                

                <form class= "myForm mt-1" action="checkout.php" method="GET">
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label >Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $name;?>" placeholder="" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    
                    

                    
                    

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label >Phone</label>
                            <input  type="tel" class="form-control" name="phone" value="<?php echo $phone;?>" placeholder="" readonly>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>

                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address" value="<?php echo $add;?>"   placeholder="" required>
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                    </div>
                    
                    
                    <div class="form-group boxed">
                        <div class="input-wrapper">
                            <label  >Landmark</label>
                            <input type="text" class="form-control" name="landmark" value="<?php echo $landmark;?>" placeholder="">
                            <i class="clear-input">
                                <ion-icon name="close-circle"></ion-icon>
                            </i>
                        </div>
                        
                    </div>
                    
                    <div class="row ">
                        <div class="col">
                             <label class="label" >City</label>
                          <input type="text" name="city" class="form-control" value="<?php echo $city;?>" placeholder="">
                        </div>
                        <div class="col">
                             <label class="label" >Pincode</label>
                          <input type="number" name="pincode" class="form-control" value="<?php echo $pincode;?>" placeholder="">
                        </div>
                    </div>
                    
                    <input type="hidden"  name="latitude" value="">
                    <input type="hidden"  name="longitude" value="">
                    <input type="hidden"  name="total" value="<?php echo $total; ?>">
                  
                      <input type="hidden"  name="uid" value="<?php echo $uid;?>">
                       <br>
            <button type="submit" class="btn btn-success btn-block btn-lg">Checkout</button></form>
           
        </div>
                <!--<button onclick="getLocation()">Click me</button>-->
                
            </div>
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
<script type="text/javascript">
    function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } 
}
  function showPosition(position){
    document.querySelector('.myForm input[name ="latitude"]').value = position.coords.latitude;
    document.querySelector('.myForm input[name ="longitude"]').value = position.coords.longitude;
  }
  </script>
 <script language="JavaScript">
      
    //   window.onload = function () {
    //       document.addEventListener("contextmenu", function (e) {
    //           e.preventDefault();
    //       }, false);
    //       document.addEventListener("keydown", function (e) {
    //           //document.onkeydown = function(e) {
    //           // "I" key
    //           if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
    //               disabledEvent(e);
    //           }
    //           // "J" key
    //           if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
    //               disabledEvent(e);
    //           }
    //           // "S" key + macOS
    //           if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
    //               disabledEvent(e);
    //           }
    //           // "U" key
    //           if (e.ctrlKey && e.keyCode == 85) {
    //               disabledEvent(e);
    //           }
    //           // "c" key
    //           if (e.ctrlKey && e.keyCode == 67) {
    //               disabledEvent(e);
    //           }
    //           // "F12" key
    //           if (event.keyCode == 123) {
    //               disabledEvent(e);
    //           }
    //       }, false);
    //       function disabledEvent(e) {
    //           if (e.stopPropagation) {
    //               e.stopPropagation();
    //           } else if (window.event) {
    //               window.event.cancelBubble = true;
    //           }
    //           e.preventDefault();
    //           return false;
    //       }
       }
//edit: removed ";" from last "}" because of javascript error
</script>
</body>

</html>