<!DOCTYPE html>
<html>

<head>
    <title>Shop Home</title>
</head>

<body>
    <h2>Welcome to Our Shop</h2>

    <?php foreach ($products as $product): ?>
        <div style="border:1px solid #ccc; padding:10px; margin:10px;">
            <h3><?= esc($product['name']) ?></h3>
            <p>Price: ₹<?= esc($product['price']) ?></p>
            <p><?= esc($product['description']) ?></p>
            <a href="<?= site_url('cart/add/' . $product['id']) ?>">Add to Cart</a> <!-- Add to cart feature will come next -->
        </div>
    <?php endforeach; ?>
</body>

</html>