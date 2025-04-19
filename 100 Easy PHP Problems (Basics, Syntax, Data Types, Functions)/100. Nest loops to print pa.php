<?php
// Outer loop for rows (numbers 1 to 5)
for ($i = 1; $i <= 5; $i++) {
    // Inner loop for columns (numbers 1 to 5)
    for ($j = 1; $j <= 5; $j++) {
        echo "$i x $j = " . ($i * $j) . "\t";
    }
    echo "<br>"; // Move to the next line after each row
}
?>
