<?php
include 'config.php';

// Fetch products from the database
$result = $conn->query("SELECT * FROM products");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        .product { display: inline-block; margin: 10px; padding: 20px; border: 1px solid #ddd; text-align: center; }
        img { width: 150px; height: 150px; }
    </style>
</head>
<body>
    <h2>Products</h2>

    <?php if ($result === false): ?>
        <p>Could not load products — the <code>products</code> table is missing. Import <code>schema.sql</code> to create it.</p>
    <?php elseif ($result->num_rows === 0): ?>
        <p>No products available yet.</p>
    <?php else: ?>
    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="product">
            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
            <h3><?php echo htmlspecialchars($row['name']); ?></h3>
            <p>Price: $<?php echo htmlspecialchars($row['price']); ?></p>
            <form method="POST" action="a_t_c.php">
                <input type="hidden" name="product_id" value="<?php echo (int)$row['id']; ?>">
                <input type="submit" value="Add to Cart">
            </form>
        </div>
    <?php endwhile; ?>
    <?php endif; ?>

    <a href="cart.php">View Cart</a>
</body>
</html>
