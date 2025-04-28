<?php
// Get the current page filename
$current_page = basename($_SERVER['PHP_SELF']); 

// Define the menu items and their corresponding pages
$menu_items = [
    'Home' => 'index.php',
    'About' => 'about.php',
    'Services' => 'services.php',
    'Contact' => 'contact.php'
];
?>

<ul>
    <?php
    // Loop through the menu items
    foreach ($menu_items as $name => $page) {
        // Check if the current page matches the menu item
        if ($current_page == $page) {
            // Add 'active' class if it's the current page
            echo "<li><a href=\"$page\" class=\"active\">$name</a></li>";
        } else {
            echo "<li><a href=\"$page\">$name</a></li>";
        }
    }
    ?>
</ul>

<style>
    .active {
        font-weight: bold;
        color: #ff0000;  /* Change the color or style as needed */
    }
</style>
