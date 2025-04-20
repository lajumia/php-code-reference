<?php
// Sample phone number to validate
$phone = "+1-234-567-8901";

// Regex pattern for validating phone numbers
$pattern = "/^\+?[1-9]{1}[0-9]{1,14}$/";

// Check if the phone number matches the pattern
if (preg_match($pattern, $phone)) {
    echo "Valid phone number.";
} else {
    echo "Invalid phone number.";
}
?>
✅ Explanation of the Regex Pattern:
/ – Delimiters that enclose the regular expression.

^ – Indicates the start of the string.

\+? – Matches an optional + sign at the beginning (for country code).

[1-9]{1} – Matches the first digit after the optional + and ensures it’s between 1 and 9 (avoiding leading zeros in country codes).

[0-9]{1,14} – Matches 1 to 14 digits, ensuring a valid length of the phone number.

$ – Indicates the end of the string.

complex pattern 
$pattern = "/^\+?[0-9]{1,4}?[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,4}[-.\s]?[0-9]{1,9}$/";
