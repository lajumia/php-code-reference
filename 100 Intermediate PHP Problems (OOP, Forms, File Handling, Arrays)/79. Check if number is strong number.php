<?php
function isStrongNumber($number) {
    $original = $number;
    $sum = 0;

    while ($number > 0) {
        $digit = $number % 10;
        $sum += factorial($digit);
        $number = (int)($number / 10);
    }

    return $sum == $original;
}

function factorial($n) {
    if ($n <= 1) return 1;
    return $n * factorial($n - 1);
}

// Test
$input = 145;
if (isStrongNumber($input)) {
    echo "$input is a strong number.";
} else {
    echo "$input is not a strong number.";
}
?>
