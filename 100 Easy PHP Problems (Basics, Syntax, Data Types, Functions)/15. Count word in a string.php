<?php
//Count words in a string

$string = "The name of our country is bangladesh";

function countWords($string){
    $words = explode(" ", $string);
    echo count($words);
}

countWords($string);