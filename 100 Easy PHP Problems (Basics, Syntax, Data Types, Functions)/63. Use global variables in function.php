<?php
// Define a global variable
$defaultNumber = 2;

/**
 * Calculate the cube of a global number.
 *
 * @return float|int The cube of the global number.
 */
function calculateCube() {
    // Access the global variable using the 'global' keyword
    global $defaultNumber;

    // Calculate and return the cube of the global number
    return $defaultNumber * $defaultNumber * $defaultNumber;
}

// Example usage
echo calculateCube();  // Output: 8 (since the global $defaultNumber is 2)

// Change the global variable
$defaultNumber = 3;
echo calculateCube();  // Output: 27 (since the global $defaultNumber is now 3)
