<?php
// SQLite database file path
$database_file = "IP.db";

try {
    // Create a new PDO instance
    $conn = new PDO("sqlite:$database_file");
    // Set error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected to SQLite database successfully";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
