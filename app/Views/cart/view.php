<!DOCTYPE html>
<html>

<head>
    <title>Shopping Cart</title>
</head>

<body>
    <h2>Your Cart</h2>

    <?php if (session()->getFlashdata('message')): ?>
        <p><?= session()->getFlashdata('message') ?></p>
    <?php endif; ?>

    <?php if (!empty($cart)): ?>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
            <?php $total = 0; ?>
            <?php foreach ($cart as $item): ?>
                <tr>
                    <td><?= esc($item['name']) ?></td>
                    <td>₹<?= esc($item['price']) ?></td>
                    <td>
                        <form action="<?= site_url('cart/update') ?>" method="post">
                            <input type="hidden" name="product_id" value="<?= esc($item['id']) ?>">
                            <input type="number" name="quantity" value="<?= esc($item['quantity']) ?>" min="1" style="width: 50px;">
                            <button type="submit">Update</button>
                        </form>
                    </td>
                    <td><?= esc($item['quantity']) ?></td>
                    <td>₹<?= esc($item['price'] * $item['quantity']) ?></td>
                    <td><a href="<?= site_url('cart/remove/' . $item['id']) ?>" onclick="return confirm('Are you sure?')">Remove</a></td>
                </tr>
                <?php $total += $item['price'] * $item['quantity']; ?>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td><strong>₹<?= $total ?></strong></td>
            </tr>
        </table>
    <?php else: ?>
        <p>Your cart is empty.</p>
    <?php endif; ?>

    <a href="/">Continue Shopping</a>
</body>

</html>