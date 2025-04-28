<?php
if (isset($_POST['submit'])) {
    // Check if files are uploaded
    if (isset($_FILES['files']) && !empty($_FILES['files']['name'][0])) {
        $total_files = count($_FILES['files']['name']);  // Count the number of files uploaded

        // Define allowed file extensions
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'pdf'];

        for ($i = 0; $i < $total_files; $i++) {
            // Get the file name and file details
            $file_name = $_FILES['files']['name'][$i];
            $file_tmp = $_FILES['files']['tmp_name'][$i];
            $file_size = $_FILES['files']['size'][$i];
            $file_error = $_FILES['files']['error'][$i];

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
                // Check if the file extension is allowed
                if (in_array($file_ext, $allowed_extensions)) {
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
