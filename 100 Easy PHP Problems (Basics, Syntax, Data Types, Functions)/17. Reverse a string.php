<?php

$string = "The name of our country is bangladesh";

function reverse_string($string){

    $rev_string = strrev($string);
    echo $rev_string;

}

reverse_string($string);