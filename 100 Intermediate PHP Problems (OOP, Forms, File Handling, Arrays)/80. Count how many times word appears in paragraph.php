<?php
$paragraph = "The quick brown fox jumps over the lazy dog. The dog was not amused.";
$word = "the";

// Case-insensitive whole-word match
$count = preg_match_all('/\b' . preg_quote($word, '/') . '\b/i', $paragraph);

echo "The word '$word' appears $count times.";
?>
