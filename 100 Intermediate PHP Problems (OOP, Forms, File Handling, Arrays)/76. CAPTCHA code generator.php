✅ Step 1: Create the CAPTCHA image (captcha.php)
php
Copy
Edit
<?php
session_start();

// Generate random 6-character alphanumeric string
$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$captcha_text = '';
for ($i = 0; $i < 6; $i++) {
    $captcha_text .= $characters[random_int(0, strlen($characters) - 1)];
}

// Store in session
$_SESSION['captcha'] = $captcha_text;

// Create image
$image = imagecreatetruecolor(150, 50);

// Colors
$bg_color = imagecolorallocate($image, 255, 255, 255); // white
$text_color = imagecolorallocate($image, 0, 0, 0);     // black
$noise_color = imagecolorallocate($image, 100, 120, 180);

// Fill background
imagefilledrectangle($image, 0, 0, 150, 50, $bg_color);

// Add random noise
for ($i = 0; $i < 1000; $i++) {
    imagepixel($image, rand(0, 150), rand(0, 50), $noise_color);
}

// Add text
$font_path = __DIR__ . '/arial.ttf'; // Provide path to a valid TTF font
imagettftext($image, 20, 0, 20, 35, $text_color, $font_path, $captcha_text);

// Output image
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);
?>
✅ Step 2: Display the CAPTCHA in a form (form.php)
php
Copy
Edit
<?php session_start(); ?>
<form method="post" action="validate.php">
    <p><img src="captcha.php" alt="CAPTCHA Image"></p>
    <p>Enter CAPTCHA: <input type="text" name="captcha_input" required></p>
    <input type="submit" value="Submit">
</form>
✅ Step 3: Validate CAPTCHA (validate.php)
php
Copy
Edit
<?php
session_start();

$user_input = $_POST['captcha_input'] ?? '';

if ($user_input === $_SESSION['captcha']) {
    echo "CAPTCHA verified successfully!";
} else {
    echo "CAPTCHA verification failed.";
}
?>