<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_email = $_POST['email'];
    $otp = rand(100000, 999999); // Generate 6-digit OTP
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $user_email;

    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'aaditya23comp@student.mes.ac.in';         // 🔑 Your Gmail
        $mail->Password   = 'utez nutk gzvq wkpq';            // 🔑 Your Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('aaditya23comp@student.mes.ac.in', 'Katze Support');
        $mail->addAddress($user_email);

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'Your OTP for Password Reset';
        $mail->Body    = "<p>Hello,</p><p>Your OTP is: <strong>$otp</strong></p><p>It is valid for 10 minutes.</p>";

        $mail->send();

        echo "<script>alert('OTP sent to your email'); window.location.href='update_password.php';</script>";
    } catch (Exception $e) {
        echo "Failed to send OTP. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
