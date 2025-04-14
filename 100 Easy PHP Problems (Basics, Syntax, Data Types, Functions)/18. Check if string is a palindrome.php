<?php

$string = "madam";

function palindrome($string)
{
    $strrev = strrev($string);

    if($string == $strrev){
        echo "Palindrome";
    
    }else{
        echo "Not Palindrome";
    }
    
}

palindrome($string);