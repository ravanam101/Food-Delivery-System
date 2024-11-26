<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/payment_callback_errors.log');

session_start();

// Fix the path to db.php
// Assuming db.php is in /app/pay/db.php
define('ROOT_PATH', realpath(__DIR__ . '/../'));
require_once ROOT_PATH . '/pay/db.php';


class PaymentCallbackHandler {
    private $conn;
    private $merchantId = 'M227UK7AFV4L0';
    private $apiKey = '6cf3f77e-b34f-4011-bc2f-28de2e7dcfa2';
    
    public function __construct($conn) {
        $this->conn = $conn;
        $this->logData("Callback handler initialized");
    }
    
    private function logData($message, $data = null) {
        $log = date('Y-m-d H:i:s') . " - " . $message . "\n";
        if ($data !== null) {
            $log .= "Data: " . print_r($data, true) . "\n";
        }
        $log .= str_repeat("-", 50) . "\n";
        error_log($log, 3, "phonepe_debug.log");
    }
    
    public function handleCallback() {
        try {
            // Log all incoming data
            $this->logData("REQUEST_METHOD", $_SERVER['REQUEST_METHOD']);
            $this->logData("REQUEST_URI", $_SERVER['REQUEST_URI']);
            $this->logData("HTTP_USER_AGENT", $_SERVER['HTTP_USER_AGENT'] ?? 'Not set');
            $this->logData("CONTENT_TYPE", $_SERVER['CONTENT_TYPE'] ?? 'Not set');
            $this->logData("POST Data", $_POST);
            $this->logData("GET Data", $_GET);
            $this->logData("Headers", getallheaders());

            // Get raw input
            $raw_input = file_get_contents('php://input');
            $this->logData("Raw input received", $raw_input);

            // Check if we have any input
            if (empty($raw_input)) {
                // Try to use POST data if raw input is empty
                if (!empty($_POST)) {
                    $raw_input = json_encode($_POST);
                    $this->logData("Using POST data as input", $raw_input);
                } else {
                    throw new Exception("No input data received");
                }
            }

            // Try to detect if the input is URL-encoded
            if (strpos($raw_input, '=') !== false && strpos($raw_input, '&') !== false) {
                parse_str($raw_input, $parsed_data);
                $raw_input = json_encode($parsed_data);
                $this->logData("Converted URL-encoded data to JSON", $raw_input);
            }

            // Try to decode JSON
            $decoded_response = json_decode($raw_input, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                // Log the specific JSON error
                $this->logData("JSON decode error", [
                    'error' => json_last_error_msg(),
                    'error_code' => json_last_error()
                ]);
                
                // Try to clean the input
                $cleaned_input = preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $raw_input);
                $decoded_response = json_decode($cleaned_input, true);
                
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new Exception("JSON decode error: " . json_last_error_msg());
                }
            }

            $this->logData("Decoded response", $decoded_response);

            // Handle both direct and nested response structures
            $payment_data = isset($decoded_response['response']) 
                ? $decoded_response['response'] 
                : $decoded_response;

            // If payment_data is a string, try to decode it (might be base64)
            if (is_string($payment_data)) {
                $decoded_payment = base64_decode($payment_data);
                if ($decoded_payment !== false) {
                    $payment_data = json_decode($decoded_payment, true);
                    $this->logData("Decoded base64 payment data", $payment_data);
                }
            }

            // Extract transaction details
            $transactionId = $payment_data['transactionId'] ?? 
                           $payment_data['transaction_id'] ?? 
                           $_POST['transactionId'] ?? 
                           null;

            $status = isset($payment_data['code']) && $payment_data['code'] === 'PAYMENT_SUCCESS' 
                     ? 'Payment Successful' 
                     : 'Payment Failed';

            // Update order if we have required data
            if ($transactionId && isset($_SESSION['TEMP']) && isset($_SESSION['UID'])) {
                $this->updateOrderStatus($status, $transactionId, $_SESSION['TEMP'], $_SESSION['UID']);
            } else {
                $this->logData("Missing required data", [
                    'transactionId' => $transactionId,
                    'TEMP' => $_SESSION['TEMP'] ?? 'not set',
                    'UID' => $_SESSION['UID'] ?? 'not set'
                ]);
            }

            // Store status in session
            $_SESSION['payment_status'] = $status;
            $_SESSION['transaction_id'] = $transactionId;

            // Determine redirect
            $redirect_url = ($status === 'Payment Successful') ? 'success.php' : 'failed.php';
            
            // Send response
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'status' => $status,
                'redirect' => $redirect_url
            ]);

            

        } catch (Exception $e) {
            $this->logData("Error processing callback", [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            header('Content-Type: application/json');
            echo json_encode([
                'success' => false,
                'error' => $e->getMessage(),
                'debug_info' => [
                    'raw_input_length' => strlen($raw_input ?? ''),
                    'content_type' => $_SERVER['CONTENT_TYPE'] ?? 'not set',
                    'method' => $_SERVER['REQUEST_METHOD']
                ]
            ]);
        }
    }
    
    private function updateOrderStatus($status, $transactionId, $temp, $uid) {
        try {
            $query = "UPDATE `orders` SET `status` = ?, `tid` = ? WHERE `temp` = ? AND `userid` = ?";
            $stmt = $this->conn->prepare($query);
            
            if (!$stmt) {
                throw new Exception("Database prepare failed: " . $this->conn->error);
            }
            
            $stmt->bind_param('sssi', $status, $transactionId, $temp, $uid);
            
            if (!$stmt->execute()) {
                throw new Exception("Database update failed: " . $stmt->error);
            }
            
            $this->logData("Order status updated", [
                'status' => $status,
                'transactionId' => $transactionId,
                'temp' => $temp,
                'uid' => $uid
            ]);
            
            $stmt->close();
        } catch (Exception $e) {
            $this->logData("Error updating order status", [
                'error' => $e->getMessage()
            ]);
            throw $e;
        }
    }
}

// Initialize and execute callback handler
try {
    $callbackHandler = new PaymentCallbackHandler($conn);
    $callbackHandler->handleCallback();
} catch (Exception $e) {
    error_log("Fatal error in payment callback: " . $e->getMessage());
    header('Content-Type: application/json');
    echo json_encode([
        'success' => false,
        'error' => 'Internal server error',
        'message' => $e->getMessage()
    ]);
}
?>