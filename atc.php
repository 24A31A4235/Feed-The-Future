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

    <?php while ($row = $result->fetch_assoc()): ?>
        <div class="product">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            <h3><?php echo $row['name']; ?></h3>
            <p>Price: $<?php echo $row['price']; ?></p>
            <form method="POST" action="add_to_cart.php">
                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                <input type="submit" value="Add to Cart">
            </form>
        </div>
    <?php endwhile; ?>

    <a href="cart.php">View Cart</a>
</body>
</html>
