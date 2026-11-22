<?php
include 'config.php';

// List the cart: join cart rows with product details.
// rfc.php removes a row by its cart id (?id=...).
$rows = [];
$error = null;
$result = $conn->query(
    "SELECT c.id AS cart_id, c.product_id, c.quantity, p.name, p.price, p.image " .
    "FROM cart c JOIN products p ON p.id = c.product_id ORDER BY c.id"
);
if ($result === false) {
    $error = "Could not load the cart — the cart or products table is missing. Import schema.sql to create them.";
} else {
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
}
$total = 0;
foreach ($rows as $r) {
    $total += $r['price'] * $r['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { border-collapse: collapse; width: 100%; max-width: 700px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background: #f2f2f2; }
        img { width: 60px; height: 60px; object-fit: cover; }
        .total { font-weight: bold; }
        a { color: #2e7d32; }
    </style>
</head>
<body>
    <h2>Your Cart</h2>
    <?php if ($error): ?>
        <p><?php echo htmlspecialchars($error); ?></p>
    <?php elseif (empty($rows)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table>
            <tr><th></th><th>Product</th><th>Price</th><th>Quantity</th><th>Subtotal</th><th></th></tr>
            <?php foreach ($rows as $row): ?>
                <tr>
                    <td><img src="<?php echo htmlspecialchars($row['image']); ?>" alt=""></td>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td>&#8377;<?php echo number_format($row['price'], 2); ?></td>
                    <td><?php echo (int)$row['quantity']; ?></td>
                    <td>&#8377;<?php echo number_format($row['price'] * $row['quantity'], 2); ?></td>
                    <td><a href="rfc.php?id=<?php echo (int)$row['cart_id']; ?>">Remove</a></td>
                </tr>
            <?php endforeach; ?>
            <tr class="total"><td colspan="4">Total</td><td>&#8377;<?php echo number_format($total, 2); ?></td><td></td></tr>
        </table>
    <?php endif; ?>
    <p><a href="atc.php">Continue shopping</a> | <a href="index.html">Back to home</a></p>
</body>
</html>
