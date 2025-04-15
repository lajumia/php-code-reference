<?php

function isPrime($num) {
    if ($num <= 1) {
        return false; // 0 and 1 are not prime
    }

    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false; // divisible by other than 1 and itself
        }
    }

    return true;
}

// Example usage
$number = 7;

if (isPrime($number)) {
    echo "$number is a Prime Number";
} else {
    echo "$number is NOT a Prime Number";
}

?>
