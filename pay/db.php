<?php
// Error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'payment_errors.log');

// First database connection for settings
$conn = mysqli_connect("localhost", "u971358288_muttchikadmin", "Muttchik@Admin1234", "u971358288_muttchik") or die("connection failed: " . mysqli_connect_error());

// Fetch settings
$rrr = "select * from `settings` where id=1";
$sss = mysqli_query($conn, $rrr);
if (!$sss) {
    error_log("Settings query failed: " . mysqli_error($conn));
    die("Settings query failed");
}

$ttt = mysqli_fetch_assoc($sss);
if (!$ttt) {
    error_log("No settings found in database");
    die("No settings found");
}

// Define all settings with proper error checking
$appname = $ttt['appname'] ?? 'Default App Name';
$applogo = $ttt['applogo'] ?? 'default_logo.png';
$appphone = $ttt['phone'] ?? '';
$cod_status = $ttt['cod'] ?? '0';
$min_order_amount = $ttt['min'] ?? '0';
$maxcod = $ttt['maxcod'] ?? '0';
$onoff = $ttt['onoff'] ?? '0';
$gateway = $ttt['gateway'] ?? '';
$close_text = $ttt['store_close_text'] ?? '';
$show_add_to_cart = $ttt['show_add_to_cart'] ?? '0';
$route = "app";
$API = $ttt['firebase_API'] ?? '';
$admin = "</sole\api_inv_81234";
$uri = $_SERVER['SERVER_NAME'] ?? '';
$package = "com.home.invikta";
$wp = $ttt['whatsapp'] ?? '';

// Safe cookie handling
$phone = isset($_COOKIE['phone']) ? $_COOKIE['phone'] : '';

// Second database connection for transactions
$host = 'localhost';
$username = 'u971358288_muttchikadmin';
$password = 'Muttchik@Admin1234';
$database = 'u971358288_muttchik';

// Create new connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    error_log("Database connection failed: " . $conn->connect_error);
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8
if (!$conn->set_charset("utf8")) {
    error_log("Error loading character set utf8: " . $conn->error);
}

// Set timezone
date_default_timezone_set('Asia/Kolkata');

// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>