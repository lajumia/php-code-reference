<?php
// math.php
function square($n) {
    return $n * $n;
}


// index.php
// Import the math.php file
require 'math.php';
echo "Square of 6 is: " . square(6);  // Output: Square of 6 is: 36
