<?php
// PhonePe Configuration
define('PHONEPE_MERCHANT_ID', 'M227UK7AFV4L0');
define('PHONEPE_API_KEY', '6cf3f77e-b34f-4011-bc2f-28de2e7dcfa2');
define('PHONEPE_API_URL', 'https://api.phonepe.com/apis/hermes/pg/v1');  // Adjust this URL as needed

// Response Codes
define('PAYMENT_SUCCESS', 'PAYMENT_SUCCESS');
define('PAYMENT_FAILED', 'PAYMENT_FAILED');

// Logging Configuration
define('LOG_FILE', 'payment_logs.txt');

// Function to log payment-related events
function logPaymentEvent($message, $data = null) {
    $logMessage = date('Y-m-d H:i:s') . " - " . $message;
    if ($data) {
        $logMessage .= "\nData: " . print_r($data, true);
    }
    $logMessage .= "\n" . str_repeat('-', 50) . "\n";
    
    error_log($logMessage, 3, LOG_FILE);
}

// Function to validate session
function validateSession() {
    if (!isset($_SESSION['TEMP']) || !isset($_SESSION['UID'])) {
        logPaymentEvent("Session validation failed", [
            'TEMP_exists' => isset($_SESSION['TEMP']),
            'UID_exists' => isset($_SESSION['UID'])
        ]);
        return false;
    }
    return true;
}
?>