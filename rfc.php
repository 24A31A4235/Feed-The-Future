<?php
include 'config.php';

if (isset($_GET['id'])) {
    $cart_id = intval($_GET['id']);
    $conn->query("DELETE FROM cart WHERE id = $cart_id");
}

header("Location: cart.php");
exit();
?>
