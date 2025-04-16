<?php

//indexed array
$fruits = ["Apple", "Banana", "Orange"];

foreach ($fruits as $fruit) {
    echo $fruit . "<br>";
}

//associative array
$student = [
    "name" => "John",
    "age" => 20,
    "grade" => "A"
];

foreach ($student as $key => $value) {
    echo $key . ": " . $value . "<br>";
}
