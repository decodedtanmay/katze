<?php
// Database connection
include 'db_connect.php';

// Set content type to JSON
header("Content-Type: application/json");

// Form submission check
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Sanitize inputs
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Optional: Store the message in database
    $sql = "INSERT INTO contact_messages (name, email, phone, subject, message, created_at) 
            VALUES ('$name', '$email', '$phone', '$subject', '$message', NOW())";

    if (mysqli_query($conn, $sql)) {
        // Optional: Send Email Notification to admin
        // mail('your-email@example.com', $subject, $message, "From: $email");

        // Send success response
        echo json_encode(["status" => "success", "message" => "Thank you! Your message has been sent."]);
    } else {
        // Send error response
        echo json_encode(["status" => "error", "message" => "Error saving message. Please try again."]);
    }
    exit();
} else {
    // Send error response if not a POST request
    echo json_encode(["status" => "error", "message" => "Invalid request method."]);
    exit();
}
?>
