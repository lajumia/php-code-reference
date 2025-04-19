<?php
class Math {

public function __call($name, $arg){

    if($name =='add'){

        $sum = 0 ;
        foreach($arg as $number){
        $sum += $number;
        };
        echo "Total is " . $sum."<br>";

    }elseif($name == 'multiply'){

        $multiply = 0;
        foreach($arg as $mp){
        $multiply *= $mp;
        }
        echo 'Total multiply is '. $multiply. "<br>";

    }else{

        echo $name." is not defined ";

    }

}

}

$obj = new Math();

$obj->add(34,45);

$obj -> multiply(43,3);

$obj -> subs(3,4);
?>
