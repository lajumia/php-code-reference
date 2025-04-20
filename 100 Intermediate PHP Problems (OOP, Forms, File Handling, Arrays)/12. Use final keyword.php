<?php 


final class MyBaseClass {
    public function sayHello() {
        echo "Hello from final class!";
    }
}

// ❌ This will cause a fatal error
// class MyChildClass extends MyBaseClass {
//     public function sayHello() {
//         echo "Hello from child class!";
//     }
//     // Error: Class MyChildClass may not inherit from final class (MyBaseClass)
// }

class ParentClass {
    final public function doNotOverride() {
        echo "This method is final!";
    }
    
    public function canOverride() {
        echo "This method can be overridden.";
    }
}

class ChildClass extends ParentClass {
    // ❌ Fatal Error
    // public function doNotOverride() {
    //     echo "Trying to override...";
    // }

    // ✅ Allowed
    public function canOverride() {
        echo "This method is overridden.";
    }
}
