<?php

$string = "The name o our country is bangladesh";


// Method 1------------------------------------------------
function countVowel1($string){
   $sting = strtolower($string);
   $a = substr_count($string, 'a');
   $e = substr_count($string, 'e');
   $i = substr_count($string, 'i');
   $o = substr_count($string, 'o');
   $u = substr_count($string, 'u');
   $total = $a + $e + $i + $o + $u;
  

   echo "Total vowels are: ".$total;

}

countVowel1($string);


// Method 2-----------------------------------------------

function countVowel2($string){
    $string = strtolower($string);
    $vowel = ['a', 'e', 'i', 'o', 'u'];

    $count = 0;

    for($i=0; $i<strlen($string); $i++){
        if(in_array($string[i], $vowel)){
            $count++;
        };

    };

    echo "Total vowels are: ".$count;
}

countVowel2($string);