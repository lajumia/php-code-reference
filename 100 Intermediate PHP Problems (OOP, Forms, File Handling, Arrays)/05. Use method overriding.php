<?php
class Animal {
    public function makeSound() {
        echo "Animal makes a sound<br>";
    }
}

class Dog extends Animal {
    // This overrides the parent method
    public function makeSound() {
        echo "Dog barks: Woof!<br>";
    }
}

$pet = new Dog();
$pet->makeSound();  // Output: Dog barks: Woof!
?>
