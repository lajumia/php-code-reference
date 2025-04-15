<?php

function find_hcf($a, $b) {
    // Start by assuming HCF is 1
    $hcf = 1;

    // Find the smaller number
    $min = ($a < $b) ? $a : $b;

    // Loop from 1 to the smaller number
    for ($i = 1; $i <= $min; $i++) {
        // Check if both numbers are divisible by 'i'
        if ($a % $i == 0 && $b % $i == 0) {
            // If so, update HCF to 'i'
            $hcf = $i;
        }
    }

    // Print the result
    echo "HCF of $a and $b is: $hcf";
}
