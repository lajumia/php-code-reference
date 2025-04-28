<?php
function isAlphabetic($string) {
    // Check if the string contains only alphabets (a-z or A-Z)
    return preg_match('/^[a-zA-Z]+$/', $string);
}

// Example usage
$testString = "HelloWorld";

if (isAlphabetic($testString)) {
    echo "The string contains only alphabets.";
} else {
    echo "The string contains non-alphabet characters.";
}
?>
