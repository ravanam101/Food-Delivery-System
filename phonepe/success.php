<?php
session_start();
include 'pay/db.php';

// Security check with proper error handling


// Verify payment status with proper session handling
if (!isset($_SESSION['payment_status']) || $_SESSION['payment_status'] !== 'Payment Successful') {
    error_log("Invalid payment status - redirecting to index");
    header("location:index.php");
    exit;
}

// Get transaction details
$transaction_id = $_SESSION['transaction_id'] ?? 'N/A';

// Clear sensitive session data
$payment_status = $_SESSION['payment_status'];
unset($_SESSION['payment_status']);
unset($_SESSION['transaction_id']);

// Get notification settings
$stmt = $conn->prepare("SELECT notify FROM settings WHERE id = 1");
$stmt->execute();
$result = $stmt->get_result();
$settings = $result->fetch_assoc();
$notify = $settings['notify'] ?? '';
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="theme-color" content="#000000">
    <title><?php echo $appname; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="manifest" href="__manifest.json">
</head>

<body class="bg-white">
    <!-- App Header -->
    <div class="appHeader no-border transparent position-absolute">
        <div class="pageTitle">Order Placed Successfully</div>
    </div>

    <!-- App Capsule -->
    <div id="appCapsule">
        <div class="error-page">
            <div class="mb-2">
                <img src="assets/img/success.gif" alt="Success" height="250" width="250">
            </div>
            <h1 class="title">Order Successful</h1>
            <div class="text mb-3">
                Your order will be delivered soon, sit back and relax!!
            </div>
            <div class="text mb-3">
                Transaction ID: <?php echo htmlspecialchars($transaction_id); ?>
            </div>
            
            <div id="countDown" class="mb-5"></div>

            <div class="fixed-footer">
                <div class="row">
                    <div class="col-12">
                        <a href="myorder.php" class="btn btn-success btn-lg btn-block">View Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/js/lib/jquery-3.4.1.min.js"></script>
    <script src="assets/js/lib/bootstrap.min.js"></script>
    <script>
        // Updated countdown handler with proper timeout handling
        $(document).ready(function() {
            let timeLeft = 30 * 60; // 30 minutes in seconds
            
            const countDown = setInterval(function() {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                
                $('#countDown').html(
                    '<div>' + minutes + '<span>Minutes</span></div>' +
                    '<div>' + seconds + '<span>Seconds</span></div>'
                );
                
                if (--timeLeft < 0) {
                    clearInterval(countDown);
                    // Redirect to orders page instead of showing error
                    window.location.href = 'myorder.php';
                }
            }, 1000);
        });

        // Prevent back button
        window.history.forward();
        function noBack() { 
            window.history.forward(); 
        }
    </script>
</body>
</html>