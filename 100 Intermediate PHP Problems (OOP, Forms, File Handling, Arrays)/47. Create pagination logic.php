<?php
// Total number of items (for example: number of posts or products)
$total_items = 120;

// How many items you want per page
$items_per_page = 10;

// Get the current page from URL, if not set, default is 1
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Calculate total pages
$total_pages = ceil($total_items / $items_per_page);

// Make sure current page is between 1 and total pages
if ($current_page < 1) {
    $current_page = 1;
} elseif ($current_page > $total_pages) {
    $current_page = $total_pages;
}

// Calculate the starting item (offset)
$start_index = ($current_page - 1) * $items_per_page;

// Fetch items from database with LIMIT and OFFSET (example query)
// $sql = "SELECT * FROM products LIMIT $start_index, $items_per_page";

echo "Showing page {$current_page} of {$total_pages}<br>";
echo "Start from item {$start_index}";

?>

<!-- Pagination links -->
<div class="pagination">
    <?php if ($current_page > 1): ?>
        <a href="?page=<?php echo $current_page - 1; ?>">&laquo; Prev</a>
    <?php endif; ?>

    <?php
    // Display page numbers
    for ($i = 1; $i <= $total_pages; $i++):
    ?>
        <a href="?page=<?php echo $i; ?>" <?php if ($i == $current_page) echo 'style="font-weight:bold;"'; ?>>
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>

    <?php if ($current_page < $total_pages): ?>
        <a href="?page=<?php echo $current_page + 1; ?>">Next &raquo;</a>
    <?php endif; ?>
</div>
