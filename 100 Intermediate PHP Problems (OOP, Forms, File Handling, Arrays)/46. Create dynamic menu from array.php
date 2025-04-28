<?php
// Define your menu items in an array
$menu_items = [
    ['label' => 'Home', 'url' => 'index.php'],
    ['label' => 'About', 'url' => 'about.php'],
    ['label' => 'Services', 'url' => 'services.php'],
    ['label' => 'Contact', 'url' => 'contact.php'],
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dynamic Menu</title>
</head>
<body>

<!-- Menu -->
<ul>
    <?php foreach ($menu_items as $item): ?>
        <li>
            <a href="<?php echo htmlspecialchars($item['url']); ?>">
                <?php echo htmlspecialchars($item['label']); ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

</body>
</html>
