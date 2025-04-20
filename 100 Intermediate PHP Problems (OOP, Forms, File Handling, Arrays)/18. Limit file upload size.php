<?php

// Maximum allowed file size (in bytes) - e.g., 2MB
$maxFileSize = 2 * 1024 * 1024; // 2MB

if (isset($_POST['submit'])) {
    // Get the file size from the uploaded file
    $fileSize = $_FILES['image']['size'];

    // Check if the file size is within the allowed limit
    if ($fileSize > $maxFileSize) {
        echo "Sorry, your file is too large. The maximum allowed size is 2MB.";
    } else {
        echo "File size is within the allowed limit.";
        // Continue with your file upload logic here...
    }
}
?>

upload_max_filesize = 2M  // Max upload size (e.g., 2MB)
post_max_size = 2M        // Max size for post data (including all form data)

php_value upload_max_filesize 2M
php_value post_max_size 2M
