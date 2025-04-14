<?php

$string = "The name of our country is bangladesh";


function string_to_upper($string){
    $string = strtoupper($string);
    echo $string;
}

string_to_upper($string);