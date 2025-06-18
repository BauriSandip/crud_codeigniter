<h2>Edit Product</h2>
<form method="post" action="/products/update/<?= $product['id'] ?>">
    Name: <input type="text" name="name" value="<?= $product['name'] ?>"><br><br>
    Price: <input type="text" name="price" value="<?= $product['price'] ?>"><br><br>
    Description: <textarea name="description"><?= $product['description'] ?></textarea><br><br>
    <button type="submit">Update</button>
</form>