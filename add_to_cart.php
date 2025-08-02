<?php
session_start();
include 'db_connect.php';

// Assuming user ID is stored in session when logged in
if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to add to cart.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $medicine_id = intval($_POST['medicine_id']);
    $quantity = intval($_POST['quantity']);

    // Check if the item is already in the cart for this user
    $check_query = "SELECT * FROM cart WHERE user_id = ? AND medicine_id = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("ii", $user_id, $medicine_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Update quantity if already in cart
        $update_query = "UPDATE cart SET quantity = quantity + ?, updated_at = CURRENT_TIMESTAMP WHERE user_id = ? AND medicine_id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("iii", $quantity, $user_id, $medicine_id);
        $update_stmt->execute();
    } else {
        // Insert new item
        $insert_query = "INSERT INTO cart (user_id, medicine_id, quantity) VALUES (?, ?, ?)";
        $insert_stmt = $conn->prepare($insert_query);
        $insert_stmt->bind_param("iii", $user_id, $medicine_id, $quantity);
        $insert_stmt->execute();
    }

    if ($_GET['from'] === 'shop') {
        header("Location: shop.php?added=true");
        exit();
    }
    
}
?>
