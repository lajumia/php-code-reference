
<?php
// functions.php
function greet($name) {
    return "Hello, $name!";
}


// index.php
// Include the external file
include 'functions.php';
// Now you can use the greet function
echo greet("Laju"); // Output: Hello, Laju!
