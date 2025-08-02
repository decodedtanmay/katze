<?php
session_start(); 
$conn = new mysqli("localhost", "root", "Herobrinewastaken7", "katze"); // Update database credentials

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$otp_verified = isset($_SESSION['verified_email']); // Check if OTP is already verified

// Handle OTP Verification
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['verify_otp'])) {
    $entered_otp = $_POST['otp'];

    // Check if OTP exists in session and validate
    if (isset($_SESSION['otp']) && $_SESSION['otp'] == $entered_otp) {
        // Check if OTP has expired (10-minute expiry)
        $otp_time_limit = 600; // 10 minutes
        if (isset($_SESSION['otp_time']) && (time() - $_SESSION['otp_time']) > $otp_time_limit) {
            $otp_error = "OTP has expired. Please request a new one.";
            unset($_SESSION['otp']);
            unset($_SESSION['otp_time']);
        } else {
            $_SESSION['verified_email'] = $_SESSION['email']; // Store verified email for password reset
            $otp_verified = true; // Set OTP verified flag
            unset($_SESSION['otp']); // Clear OTP after verification
        }
    } else {
        $otp_error = "Invalid OTP. Please try again.";
    }
}

// Handle Password Reset
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_password'])) {
    if (!isset($_SESSION['verified_email'])) {
        $password_error = "Unauthorized access. Please verify OTP first.";
    } else {
        // Password matching check
        if ($_POST['new_password'] !== $_POST['confirm_password']) {
            $password_error = "Passwords do not match. Please try again.";
        } else {
            $email = $_SESSION['verified_email'];
            $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);

            // Update password in the database
            $update = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $update->bind_param("ss", $new_password, $email);

            if ($update->execute()) {
                session_destroy(); // Destroy session after password reset
                $password_success = "Password updated successfully! <a href='login_page.php'>Login</a>";
            } else {
                $password_error = "Failed to update password.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Katze</title>

    <!-- Link to your loginpage.css -->
    <link rel="stylesheet" href="loginpage.css"> 
</head>
<body>

<div class="login-container">
    <h1>Reset Password</h1>

    <!-- OTP Verification Form -->
    <?php if (!$otp_verified): ?>
        <form method="post">
            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo $_SESSION['email'] ?? ''; ?>" readonly required>

            <label for="otp">Enter OTP:</label>
            <input type="text" name="otp" placeholder="Enter OTP from email" required>

            <button type="submit" name="verify_otp">Verify OTP</button>

            <?php if (isset($otp_error)) echo "<p class='error'>$otp_error</p>"; ?>
        </form>

    <!-- Password Reset Form -->
    <?php else: ?>
        <form method="post">
            <label for="new_password">New Password:</label>
            <input type="password" name="new_password" placeholder="Enter new password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" placeholder="Confirm new password" required>

            <button type="submit" name="update_password">Update Password</button>

            <?php if (isset($password_success)) echo "<p class='success'>$password_success</p>"; ?>
            <?php if (isset($password_error)) echo "<p class='error'>$password_error</p>"; ?>
        </form>
    <?php endif; ?>
</div>

</body>
</html>
