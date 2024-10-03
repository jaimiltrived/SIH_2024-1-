<?php
$servername = "localhost";
$username = "root";  // Default for localhost
$password = "";  // Default password for localhost (change if required)
$database = "posb_schemes";

// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
