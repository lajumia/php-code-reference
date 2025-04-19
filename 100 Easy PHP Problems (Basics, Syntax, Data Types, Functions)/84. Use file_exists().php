<?php
$file = 'example.txt';

if (file_exists($file)) {
    echo "✅ The file $file exists.";
} else {
    echo "❌ The file $file does not exist.";
}
?>
