<?php
// Define an abstract class
abstract class Animal {
    // Abstract method (no body)
    abstract public function makeSound();

    // Concrete method (has body)
    public function eat() {
        echo "This animal is eating.<br>";
    }
}

// Child class extends the abstract class
class Dog extends Animal {
    public function makeSound() {
        echo "Dog says: Woof!<br>";
    }
}

// Another child class
class Cat extends Animal {
    public function makeSound() {
        echo "Cat says: Meow!<br>";
    }
}

// Instantiate and use the subclasses
$dog = new Dog();
$dog->makeSound();  // Output: Dog says: Woof!
$dog->eat();        // Output: This animal is eating.

$cat = new Cat();
$cat->makeSound();  // Output: Cat says: Meow!
$cat->eat();        // Output: This animal is eating.
?>
