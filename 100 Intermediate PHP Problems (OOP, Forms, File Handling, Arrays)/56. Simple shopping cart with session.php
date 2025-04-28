<?php
session_start();

// Handle adding items to the cart
if (isset($_POST['add_to_cart'])) {
    $product = explode("|", $_POST['product']);
    $name = $product[0];
    $price = $product[1];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$name])) {
        $_SESSION['cart'][$name]['quantity']++;
    } else {
        $_SESSION['cart'][$name] = ['price' => $price, 'quantity' => 1];
    }
}

// Handle removing items from the cart
if (isset($_POST['remove'])) {
    $product_to_remove = $_POST['remove'];
    unset($_SESSION['cart'][$product_to_remove]);
}

// Handle clearing the cart
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
}
?>

<form method="POST" action="">
    <select name="product">
        <option value="Product 1|10">Product 1 - $10</option>
        <option value="Product 2|15">Product 2 - $15</option>
        <option value="Product 3|20">Product 3 - $20</option>
    </select>
    <button type="submit" name="add_to_cart">Add to Cart</button>
</form>

<?php
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    echo "<h2>Your Cart</h2>";
    foreach ($_SESSION['cart'] as $product => $details) {
        echo "<p>$product - $details[quantity] x \${$details['price']} = \$" . ($details['quantity'] * $details['price']) . 
             " <form method='POST' style='display:inline;'><button type='submit' name='remove' value='$product'>Remove</button></form></p>";
    }

    // Display the total
    $total = 0;
    foreach ($_SESSION['cart'] as $details) {
        $total += $details['quantity'] * $details['price'];
    }
    echo "<p>Total: \$$total</p>";
} else {
    echo "<p>Your cart is empty.</p>";
}
?>

<form method="POST"><button type="submit" name="clear_cart">Clear Cart</button></form>
