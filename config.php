<?php
// Define the root path of your application
define('ROOT_PATH', realpath(dirname(__FILE__)));
define('APP_PATH', ROOT_PATH . '/app');
define('PAY_PATH', APP_PATH . '/pay');
define('PAYTM_PATH', APP_PATH . '/paytm');
define('LOG_PATH', APP_PATH . '/logs');

// Create log directory if it doesn't exist
if (!file_exists(LOG_PATH)) {
    mkdir(LOG_PATH, 0755, true);
}

// Function to safely include files
function safeInclude($file) {
    if (file_exists($file)) {
        return include $file;
    } else {
        error_log("Failed to include file: " . $file);
        throw new Exception("Required file not found: " . $file);
    }
}
?>