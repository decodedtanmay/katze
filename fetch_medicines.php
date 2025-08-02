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

// Fetch medicines
$sql = "SELECT * FROM medicines";
$result = $conn->query($sql);

$medicines = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $medicines[] = $row;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($medicines);

$conn->close();
?>
