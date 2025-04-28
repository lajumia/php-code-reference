<?php
// Sample array with options
$options = ['Option 1', 'Option 2', 'Option 3', 'Option 4'];

// Start the select element
echo "<select name='dropdown' id='dropdown'>";

// Loop through the array and create option tags
foreach ($options as $option) {
    echo "<option value='" . htmlspecialchars($option) . "'>" . htmlspecialchars($option) . "</option>";
}

// End the select element
echo "</select>";
?>
