<?php
/**
 * Calculate the cube of a number. Defaults to 2 if no argument is provided.
 *
 * @param float|int $number The number to cube. Default is 2.
 * @return float|int The cube of the input number.
 */
function calculateCube($number = 2) {
    // Calculate the cube of the number and return the result.
    return $number * $number * $number;
}

// Example usage
echo calculateCube(3); // Output: 27
echo calculateCube();  // Output: 8 (since the default is 2)
