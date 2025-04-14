<!DOCTYPE html>
<html>
<body>

<?php

function check_even_or_od($number){

    if($number % 2 == 0){
        echo "Even Number";
    }else{
       echo "Odd Number";
    }

}
check_even_or_od(10);//Even Number
echo "<br>";
check_even_or_od(13);//Odd Number

?>
</body>
</html>
