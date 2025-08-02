<?php
session_start();
include 'db_connect.php';

if (isset($_GET['id'])) {
    $cart_id = intval($_GET['id']); // Prevent SQL injection

    // Check if the user is logged in
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
    if ($user_id == 0) {
        echo "Unauthorized action.";
        exit;
    }

    // Delete the specific cart item belonging to the user
    $sql = "DELETE FROM cart WHERE id = ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cart_id, $user_id);

    if ($stmt->execute()) {
        // Redirect to cart with popup trigger
        header("Location: cart.php?removed=true");
        exit();
    } else {
        echo "Failed to remove item.";
    }
    $stmt->close();
} else {
    echo "Invalid request.";
}
?>
