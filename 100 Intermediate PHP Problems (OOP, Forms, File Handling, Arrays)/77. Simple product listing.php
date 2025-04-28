<?php
$products = [
    ['name' => 'Laptop', 'price' => 1200.00, 'image' => 'images/laptop.jpg'],
    ['name' => 'Smartphone', 'price' => 800.00, 'image' => 'images/phone.jpg'],
    ['name' => 'Headphones', 'price' => 150.00, 'image' => 'images/headphones.jpg'],
];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Listing</title>
    <style>
        .product { border: 1px solid #ccc; padding: 10px; margin: 10px; display: inline-block; width: 200px; }
        .product img { width: 100%; height: auto; }
        .product-name { font-weight: bold; margin-top: 10px; }
        .product-price { color: green; }
    </style>
</head>
<body>

<h2>Products</h2>

<?php foreach ($products as $product): ?>
    <div class="product">
        <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
        <div class="product-name"><?= htmlspecialchars($product['name']) ?></div>
        <div class="product-price">$<?= number_format($product['price'], 2) ?></div>
    </div>
<?php endforeach; ?>

</body>
</html>
