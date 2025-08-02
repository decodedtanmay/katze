<?php
session_start();
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'] ?? null;
    if (!$user_id) {
        die("User not logged in.");
    }

    // Collect billing details
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $notes = $_POST['notes'];

    // Check if any fields are empty
    if (empty($name) || empty($email) || empty($address) || empty($phone)) {
        echo "<script>
                alert('Please fill in all the required fields.');
                window.location.href = 'checkout.php'; // Redirect back to the checkout page
              </script>";
        exit;
    }

    // Fetch cart items
    $cart_sql = "SELECT c.id, m.name, m.price, c.quantity, c.medicine_id 
                 FROM cart c 
                 JOIN medicines m ON c.medicine_id = m.medicine_id 
                 WHERE c.user_id = ?";
    $stmt = $conn->prepare($cart_sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $cart_result = $stmt->get_result();

    if ($cart_result->num_rows == 0) {
        die("Cart is empty. Please add items before placing the order.");
    }

    $subtotal = 0;
    $order_items = [];
    while ($row = $cart_result->fetch_assoc()) {
        $total_price = $row['price'] * $row['quantity'];
        $subtotal += $total_price;
        $order_items[] = $row;
    }

    // Calculate shipping as 5% of the subtotal
    $shipping = $subtotal * 0.05;
    $total = $subtotal + $shipping;

    // Insert order with shipping cost
    $order_sql = "INSERT INTO orders (user_id, name, email, total_amount, shipping_cost, address, phone, notes) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($order_sql);
    $stmt->bind_param("issddsss", $user_id, $name, $email, $total, $shipping, $address, $phone, $notes);
    $stmt->execute();
    $order_id = $stmt->insert_id;

    // Insert order items
    foreach ($order_items as $item) {
        $item_sql = "INSERT INTO order_items (order_id, medicine_id, quantity, price) 
                     VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($item_sql);
        $stmt->bind_param("iiid", $order_id, $item['medicine_id'], $item['quantity'], $item['price']);
        $stmt->execute();
    }

    // Clear the cart after successful order
    $clear_cart_sql = "DELETE FROM cart WHERE user_id = ?";
    $stmt = $conn->prepare($clear_cart_sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();

    // Redirect or show success message
    echo "<script>alert('Order placed successfully!'); window.location.href='shop.php';</script>";
} else {
    echo "Invalid Request.";
}
?>
