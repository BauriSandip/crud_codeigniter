<h2>Checkout</h2>

<?php if (empty($cart)): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
    <table border="1" cellpadding="5">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>
        <?php $total = 0; ?>
        <?php foreach ($cart as $item): ?>
            <tr>
                <td><?= esc($item['name']) ?></td>
                <td><?= esc($item['quantity']) ?></td>
                <td>₹<?= esc($item['price']) ?></td>
                <td>₹<?= esc($item['price'] * $item['quantity']) ?></td>
            </tr>
            <?php $total += $item['price'] * $item['quantity']; ?>
        <?php endforeach; ?>
        <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td><strong>₹<?= $total ?></strong></td>
        </tr>
    </table>

    <form action="<?= site_url('place-order') ?>" method="post" style="margin-top: 10px;">
        <button type="submit">Place Order</button>
    </form>
<?php endif; ?>