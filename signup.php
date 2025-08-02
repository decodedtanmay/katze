<?php
session_start(); // Start session

// Database connection
$conn = new mysqli('localhost', 'root', 'Herobrinewastaken7', 'katze');
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
}

// Get form data
$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];
$remember = isset($_POST['dontlogoff']) ? 1 : 0; // Checkbox value

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email format.");
}

// Validate password strength
if (strlen($password) < 8 || !preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/", $password) || !preg_match("/[!@#$%^&*]/", $password)) {
    die("Password must be at least 8 characters, contain an uppercase letter, a number, and a special character.");
}

// Check if passwords match
if ($password !== $confirmPassword) {
    die("Passwords do not match.");
}

// Hash password before storing
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Check if email already exists
$checkStmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$checkStmt->bind_param("s", $email);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    die("Email already exists. Try logging in.");
}
$checkStmt->close();

// Insert user into the database
$stmt = $conn->prepare("INSERT INTO users (email, username, password, remember) VALUES (?, ?, ?, ?)");
if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($conn->error));
}

$stmt->bind_param("sssi", $email, $username, $hashed_password, $reusers);
if ($stmt->execute()) {
    $_SESSION['user_email'] = $email; // Store session for login
    echo "<script>alert('Signup successful! Redirecting to homepage...'); window.location.href = 'index.php';</script>";
} else {
    die("Error: " . $stmt->error);
}

$stmt->close();
$conn->close();
?>
