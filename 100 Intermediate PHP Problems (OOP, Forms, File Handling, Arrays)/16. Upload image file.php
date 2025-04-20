<?php

if (isset($_POST['submit'])) {
    $targetDir = "uploads/"; // Folder to store uploaded files
    $fileName = basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $uploadOk = 1;

    // Check if image file is a real image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        echo "File is not an image.";
        $uploadOk = 0;
    }

    // Allow only certain formats
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];
    if (!in_array($imageFileType, $allowedTypes)) {
        echo "Only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check file size (e.g., max 2MB)
    if ($_FILES["image"]["size"] > 2 * 1024 * 1024) {
        echo "File is too large. Max 2MB allowed.";
        $uploadOk = 0;
    }

    // Upload file if no error
    if ($uploadOk) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
