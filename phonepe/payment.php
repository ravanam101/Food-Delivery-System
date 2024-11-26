<?php
session_start();

// Configuration
$merchantId = 'M227UK7AFV4L0';
$apiKey = '6cf3f77e-b34f-4011-bc2f-28de2e7dcfa2';

// Get the full domain with protocol
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';
$domain = $protocol . $_SERVER['HTTP_HOST'];

// Define the base path - adjust this according to your folder structure
$basePath = '/app/phonepe';  // Update this if your path is different

// Construct full URLs
$redirectUrl = $domain . "/app/success.php";
$callbackUrl = $domain . $basePath . "/payment_callback.php";

// Log the URLs for debugging
error_log("Redirect URL: " . $redirectUrl);
error_log("Callback URL: " . $callbackUrl);

// Get and validate parameters
$order_id = filter_input(INPUT_GET, 'ORDER_ID', FILTER_SANITIZE_STRING);
$amount = filter_input(INPUT_GET, 'TXN_AMOUNT', FILTER_VALIDATE_FLOAT);
$uid = filter_input(INPUT_GET, 'uid', FILTER_VALIDATE_INT);
$temp = filter_input(INPUT_GET, 'temp', FILTER_SANITIZE_STRING);
$phone = filter_input(INPUT_GET, 'phone', FILTER_SANITIZE_STRING);

// Debug log incoming parameters
error_log("Incoming parameters - Order ID: $order_id, Amount: $amount, UID: $uid, Phone: $phone");

// Validate required parameters
if (!$order_id || !$amount || !$uid) {
    error_log("Missing required parameters");
    die(json_encode(['error' => 'Missing required parameters']));
}

// Store in session
$_SESSION['ORDER_ID'] = $order_id;
$_SESSION['UID'] = $uid;
$_SESSION['TEMP'] = $temp;

// Prepare payment data
$paymentData = [
    'merchantId' => $merchantId,
    'merchantTransactionId' => (string)$order_id,
    'merchantUserId' => "MUID" . $uid,
    'amount' => (int)($amount * 100),
    'redirectUrl' => $redirectUrl,
    'redirectMode' => "POST",
    'callbackUrl' => $callbackUrl,
    'mobileNumber' => $phone,
    'paymentInstrument' => [
        'type' => "PAY_PAGE"
    ]
];

try {
    // Log payment data for debugging
    error_log("Payment Data: " . json_encode($paymentData));
    
    // Encode payment data
    $jsonEncode = json_encode($paymentData);
    $payloadMain = base64_encode($jsonEncode);
    $salt_index = 1;
    
    // Generate x-verify header
    $payload = $payloadMain . "/pg/v1/pay" . $apiKey;
    $sha256 = hash("sha256", $payload);
    $final_x_header = $sha256 . '###' . $salt_index;
    
    // Log X-VERIFY header for debugging
    error_log("X-VERIFY Header: " . $final_x_header);
    
    // Initialize cURL
    $curl = curl_init();
    
    // Set cURL options
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode(['request' => $payloadMain]),
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "X-VERIFY: " . $final_x_header,
            "X-MERCHANT-ID: " . $merchantId,
            "accept: application/json"
        ],
    ]);
    
    // Execute request
    $response = curl_exec($curl);
    $error = curl_error($curl);
    
    // Log the raw response
    error_log("PhonePe Raw Response: " . $response);
    
    if ($error) {
        throw new Exception("CURL Error: " . $error);
    }
    
    $res = json_decode($response);
    
    if ($res && $res->success === true && isset($res->data->instrumentResponse->redirectInfo->url)) {
        $payUrl = $res->data->instrumentResponse->redirectInfo->url;
        error_log("Redirecting to PhonePe URL: " . $payUrl);
        header('Location: ' . $payUrl);
        exit();
    } else {
        throw new Exception("Payment initiation failed: " . ($res->message ?? 'Unknown error'));
    }
    
} catch (Exception $e) {
    error_log("PhonePe Payment Error: " . $e->getMessage());
    header('Location: ' . $domain . $basePath . '/failed.php?error=' . urlencode($e->getMessage()));
    exit();
}
?>