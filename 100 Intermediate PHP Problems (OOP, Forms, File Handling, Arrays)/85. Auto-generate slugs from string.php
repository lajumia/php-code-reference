<?php
function generateSlug($string) {
    // Convert to lowercase
    $string = strtolower($string);
    
    // Remove special characters (keep alphanumeric, spaces, and hyphens)
    $string = preg_replace('/[^a-z0-9\s-]/', '', $string);
    
    // Replace multiple spaces or hyphens with a single hyphen
    $string = preg_replace('/[\s-]+/', '-', $string);
    
    // Trim hyphens from both ends
    $string = trim($string, '-');
    
    return $string;
}

// Example usage
$title = "Hello, World! Welcome to PHP.";
$slug = generateSlug($title);
echo "Generated Slug: " . $slug; // Output: hello-world-welcome-to-php
?>
