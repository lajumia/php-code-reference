<?php
$old_name = "user_data.txt"; // Current file name
$new_name = "user_data_renamed.txt"; // New file name

// Check if the file exists
if (file_exists($old_name)) {
    // Rename the file
    if (rename($old_name, $new_name)) {
        echo "The file has been renamed to $new_name.";
    } else {
        echo "Unable to rename the file.";
    }
} else {
    echo "The file $old_name does not exist.";
}
?>
