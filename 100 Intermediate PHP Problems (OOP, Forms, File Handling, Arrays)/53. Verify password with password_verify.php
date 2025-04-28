<?php
$plain_password = 'MySecret123'; // Password entered by the user during login
$stored_hash = '$2y$10$e9uZW7h3FlzjX9gTnEykuOaE6r2d...'; // Retrieved from database or file

if (password_verify($plain_password, $stored_hash)) {
    echo "Password is correct!";
} else {
    echo "Invalid password.";
}
?>