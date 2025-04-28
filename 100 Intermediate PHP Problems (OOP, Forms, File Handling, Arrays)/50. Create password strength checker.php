<?php
function checkPasswordStrength($password) {
    $strength = 0;

    // Check the password length
    if (strlen($password) >= 8) {
        $strength += 1;
    }

    // Check for lowercase letters
    if (preg_match('/[a-z]/', $password)) {
        $strength += 1;
    }

    // Check for uppercase letters
    if (preg_match('/[A-Z]/', $password)) {
        $strength += 1;
    }

    // Check for numbers
    if (preg_match('/[0-9]/', $password)) {
        $strength += 1;
    }

    // Check for special characters
    if (preg_match('/[\W]/', $password)) {
        $strength += 1;
    }

    // Evaluate strength
    if ($strength <= 2) {
        return "Weak Password";
    } elseif ($strength == 3 || $strength == 4) {
        return "Moderate Password";
    } else {
        return "Strong Password";
    }
}

// Example usage
$password = "Test@123";
echo checkPasswordStrength($password);
?>
