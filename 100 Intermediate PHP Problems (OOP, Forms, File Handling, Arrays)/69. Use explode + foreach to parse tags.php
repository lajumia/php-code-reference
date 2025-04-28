<?php
// A comma-separated string of tags
$tags = "php, html, css, javascript";

// Use explode() to split the string into an array of tags
$tag_array = explode(", ", $tags);  // Split by comma and space

// Use foreach to loop through the array and display each tag
echo "Tags: <br>";
foreach ($tag_array as $tag) {
    echo "- $tag <br>";
}
?>
