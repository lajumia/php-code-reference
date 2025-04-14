<?php

$string = "The name of our country is bangladesh";

function replace_string($string){
    $replace = str_replace("bangladesh", "india", $string);
    echo $replace;
}

replace_string($string);