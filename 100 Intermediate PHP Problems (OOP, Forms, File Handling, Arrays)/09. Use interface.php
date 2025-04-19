<?php
// Define the interface
interface Animal {
    public function makeSound();
    public function move();
}

// Implementing the interface in a class
class Dog implements Animal {
    public function makeSound() {
        echo "Dog says: Woof!<br>";
    }

    public function move() {
        echo "Dog runs.<br>";
    }
}

// Another implementation
class Bird implements Animal {
    public function makeSound() {
        echo "Bird says: Tweet!<br>";
    }

    public function move() {
        echo "Bird flies.<br>";
    }
}

// Create objects
$dog = new Dog();
$dog->makeSound();  // Output: Dog says: Woof!
$dog->move();       // Output: Dog runs.

$bird = new Bird();
$bird->makeSound(); // Output: Bird says: Tweet!
$bird->move();      // Output: Bird flies.
?>
