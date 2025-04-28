<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Multiple Files</title>
</head>
<body>

<h2>Upload Multiple Files</h2>

<form action="upload.php" method="POST" enctype="multipart/form-data">
    <label for="files">Choose files to upload:</label>
    <input type="file" name="files[]" id="files" multiple><br><br>
    
    <input type="submit" value="Upload Files" name="submit">
</form>

</body>
</html>



<?php
if (isset($_POST['submit'])) {
    // Check if files are uploaded
    if (isset($_FILES['files']) && !empty($_FILES['files']['name'][0])) {
        $total_files = count($_FILES['files']['name']);  // Count the number of files uploaded

        for ($i = 0; $i < $total_files; $i++) {
            // Get the file name and file details
            $file_name = $_FILES['files']['name'][$i];
            $file_tmp = $_FILES['files']['tmp_name'][$i];
            $file_size = $_FILES['files']['size'][$i];
            $file_error = $_FILES['files']['error'][$i];

            // Define allowed file types
            $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];

            // Get file extension
            $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

            // Define upload directory
            $upload_dir = 'uploads/';
            
            // Create the uploads directory if it doesn't exist
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            // Check for upload errors
            if ($file_error === UPLOAD_ERR_OK) {
                // Check if the file type is allowed
                if (in_array($file_ext, ['jpg', 'jpeg', 'png', 'pdf'])) {
                    // Move the uploaded file to the destination directory
                    $file_path = $upload_dir . basename($file_name);
                    if (move_uploaded_file($file_tmp, $file_path)) {
                        echo "File '$file_name' uploaded successfully!<br>";
                    } else {
                        echo "Error uploading '$file_name'.<br>";
                    }
                } else {
                    echo "File type '$file_ext' not allowed for '$file_name'.<br>";
                }
            } else {
                echo "Error uploading '$file_name'. Error code: $file_error<br>";
            }
        }
    } else {
        echo "No files uploaded.";
    }
}
?>
