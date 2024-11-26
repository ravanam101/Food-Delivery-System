<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "Current directory: " . __DIR__ . "<br>";
echo "Document root: " . $_SERVER['DOCUMENT_ROOT'] . "<br>";
echo "Script filename: " . $_SERVER['SCRIPT_FILENAME'] . "<br>";
echo "Include path: " . get_include_path() . "<br>";

$required_files = [
    '../pay/db.php',
    'payment_callback.php',
    '../success.php',
    '../failed.php'
];

echo "<h2>Checking required files:</h2>";
foreach ($required_files as $file) {
    $full_path = __DIR__ . '/' . $file;
    echo "Checking $full_path: " . (file_exists($full_path) ? "EXISTS" : "MISSING") . "<br>";
}