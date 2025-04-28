<?php
function createSeoFriendlyUrl($string) {
    // Convert to lowercase
    $string = strtolower($string);

    // Replace non-alphanumeric characters (except spaces and hyphens) with an empty string
    $string = preg_replace('/[^a-z0-9\s-]/', '', $string);

    // Replace spaces and consecutive hyphens with a single hyphen
    $string = preg_replace('/[\s-]+/', '-', $string);

    // Trim hyphens from both ends
    $string = trim($string, '-');

    return $string;
}

// Example usage
$title = "SEO & Web Development: Best Practices in 2025!";
$seoFriendlyUrl = createSeoFriendlyUrl($title);
echo "Generated SEO-friendly URL: /$seoFriendlyUrl"; // Output: /seo-web-development-best-practices-in-2025
?>
