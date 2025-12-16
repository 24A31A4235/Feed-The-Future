<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["product_id"])) {
    $product_id = intval($_POST["product_id"]);

    // Check if product is already in the cart
    $check = $conn->query("SELECT * FROM cart WHERE product_id = $product_id");
    if ($check->num_rows > 0) {
        // Update quantity if already in cart
        $conn->query("UPDATE cart SET quantity = quantity + 1 WHERE product_id = $product_id");
    } else {
        // Add new product to cart
        $conn->query("INSERT INTO cart (product_id, quantity) VALUES ($product_id, 1)");
    }
}

header("Location: cart.php");
exit();
?>
