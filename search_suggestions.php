<?php
header('Content-Type: application/json');

// Include the database connection file
require_once 'db.php';

// Retrieve query from the request and sanitize it
$query = filter_input(INPUT_GET, 'query', FILTER_SANITIZE_STRING);

// Check if the query is not empty
if (!empty($query)) {
    try {
        // Prepare the statement to search the pname in products table
        $stmt = $pdo->prepare("SELECT pname FROM products WHERE pname LIKE :query LIMIT 10");
        $stmt->execute(['query' => $query . '%']);
        
        // Fetch matching products and store them in an array
        $suggestions = $stmt->fetchAll(PDO::FETCH_COLUMN);
        
        // Output suggestions as JSON
        echo json_encode($suggestions);
    } catch (PDOException $e) {
        echo json_encode(["error" => "Database query failed"]);
    }
} else {
    echo json_encode([]);
}
?>