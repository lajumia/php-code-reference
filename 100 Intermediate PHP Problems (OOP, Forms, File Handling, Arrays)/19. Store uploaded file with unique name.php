<?php

if (isset($_POST['submit'])) {
    $targetDir = "uploads/";  // Folder to store files
    $fileName = basename($_FILES["image"]["name"]);  // Get original file name
    $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION)); // Get file extension

    // Generate a unique file name using uniqid() combined with the current timestamp
    $uniqueName = uniqid() . '_' . time() . '.' . $fileExtension;  // Example: 60b65e8a61b70_1619264821.jpg

    // Define the target file path with the unique name
    $targetFile = $targetDir . $uniqueName;
    
    // Move the uploaded file to the target location
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        echo "The file has been uploaded as: " . htmlspecialchars($uniqueName);
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
