<?php

$number = "0123456789";

$result = strrev($number);

if($result == $number){
    echo "Palindrome";

}else{
    echo "Not Palindrome";
}
