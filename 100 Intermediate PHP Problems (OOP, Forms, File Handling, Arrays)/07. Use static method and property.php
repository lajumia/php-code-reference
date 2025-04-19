<?php
class Counter {
    // Static property
    public static $count = 0;

    // Static method
    public static function increment() {
        self::$count++;
        echo "Current count is: " . self::$count . "<br>";
    }
}

// Accessing static method and property without creating an object
Counter::increment();  // Output: Current count is: 1
Counter::increment();  // Output: Current count is: 2

// You can also read the static property
echo "Final count: " . Counter::$count;  // Output: Final count: 2
?>
Feature | Use
static property | Shared value across all instances
static method | Called without creating an object
self:: | Used to access static members from inside the class
ClassName:: | Used to access static members from outside





























<?php
class Counter {
    // Static property
    public static $count = 0;

    // Static method
    public static function increment() {
        self::$count++;
        echo "Current count is: " . self::$count . "<br>";
    }
}

// Accessing static method and property without creating an object
Counter::increment();  // Output: Current count is: 1
Counter::increment();  // Output: Current count is: 2

// You can also read the static property
echo "Final count: " . Counter::$count;  // Output: Final count: 2
?>


Feature | Use
static property | Shared value across all instances
static method | Called without creating an object
self:: | Used to access static members from inside the class
ClassName:: | Used to access static members from outside



