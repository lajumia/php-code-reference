<?php
$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check !== false) {
    $mime = $check['mime']; // e.g., image/jpeg, image/png
    echo "Image MIME type is: " . $mime;
} else {
    echo "The file is not an image.";
}



$allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

if (!in_array($check['mime'], $allowedTypes)) {
    echo "Only JPG, PNG, GIF, and WebP image types are allowed.";
    $uploadOk = 0;
}
