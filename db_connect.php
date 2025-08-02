<?php
$host = 'localhost';
$user = 'root';  // Change if needed
$password = 'Herobrinewastaken7';  // Change if needed
$database = 'katze';

$conn = new mysqli($host, $user, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
