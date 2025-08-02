<?php
session_start(); // Start the session

// Database connection
$conn = new mysqli('localhost', 'root', 'Herobrinewastaken7', 'katze');

// Check connection
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// Get login credentials from the form
$email = $_POST['email'];
$password = $_POST['password'];

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

// Check if the email exists in the database
$stmt = $conn->prepare("SELECT id, username, password FROM users WHERE email = ?");
if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($conn->error));
}

$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $stmt->bind_result($id, $username, $hashed_password);
    $stmt->fetch();

    // Verify the hashed password
    if (password_verify($password, $hashed_password)) {
        // Set session variables
        $_SESSION['user_id'] = $id;
        $_SESSION['user_email'] = $email;
        $_SESSION['username'] = $username;

        // Redirect to index.html after successful login
        echo "<script>alert('Login successful! Redirecting to homepage...'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Invalid email or password.'); window.location.href = 'login_page.php';</script>";
    }
} else {
    echo "<script>alert('Email not registered. Please sign up.'); window.location.href = 'signup.php';</script>";
}

$stmt->close();
$conn->close();
?>
