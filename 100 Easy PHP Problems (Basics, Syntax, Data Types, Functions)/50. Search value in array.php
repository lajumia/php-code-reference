<?php
// find the position in an array
$fruits = array("Apple", "Orange", "Banana", "Mango");
$index = array_search("Orange", $fruits);
echo "Found at index: " . $index;


$fruitss = ["Apple", "Banana", "Orange"];

if (in_array("Banana", $fruitss)) {
    echo "Banana is in the array!";
} else {
    echo "Banana is not in the array.";
}
