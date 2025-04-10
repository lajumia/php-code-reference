# php-code-reference

## 01 array() method

You can create 3 different types of arrays using the `array()` method:

1. **Indexed Array**

   ```php
   $indexedArray = array("John", "Michel", 100, true, false, null);
   ```

2. **Associative Array**

   ```php
   $assocArray = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
   ```

3. **Multidimensional Array**

   A two-dimensional array example:

   ```php
   $cars = array(
       array("Volvo", 100, 96),
       array("BMW", 60, 59),
       array("Toyota", 110, 100)
   );

   echo $cars[0][0] . ": Ordered: " . $cars[0][1] . ". Sold: " . $cars[0][2] . "<br>";
   echo $cars[1][0] . ": Ordered: " . $cars[1][1] . ". Sold: " . $cars[1][2] . "<br>";
   echo $cars[2][0] . ": Ordered: " . $cars[2][1] . ". Sold: " . $cars[2][2] . "<br>";
   ```

   **Output:**

   ```
   Volvo: Ordered: 100. Sold: 96
   BMW: Ordered: 60. Sold: 59
   Toyota: Ordered: 110. Sold: 100
   ```

---

**Note:**  
You cannot use `null` or a boolean as a key in an array (they get converted automatically):

- `true` becomes `1`
- `false` becomes `0`
- `null` becomes `""` (an empty string)
