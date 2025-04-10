# php-code-reference

## 01 array() method

We can create 3 different types of arrays using the `array()` method:

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
We cannot use `null` or a boolean as a key in an array (they get converted automatically):

- `true` becomes `1`
- `false` becomes `0`
- `null` becomes `""` (an empty string)

## 02 array_change_key_case() method

The `array_change_key_case()` function is used to change all keys in an array to **lowercase** or **uppercase**.

### 🔹 Syntax:

```php
array_change_key_case(array $array, int $case = CASE_LOWER): array
```

### 🔹 Parameters:

- **$array** _(required)_: The array whose keys you want to change.
- **$case** _(optional)_: The desired case for the keys. Use one of:
  - `CASE_LOWER` (default)
  - `CASE_UPPER`

### 🔹 Return Value:

Returns an array with all keys converted to the specified case.

### 🔹 Example 1: Convert keys to lowercase

```php
$person = array(
    "Name" => "Alice",
    "AGE" => 30,
    "City" => "London"
);

$lower = array_change_key_case($person, CASE_LOWER);
print_r($lower);
```

**Output:**

```php
Array
(
    [name] => Alice
    [age] => 30
    [city] => London
)
```

### 🔹 Example 2: Convert keys to UPPERCASE

```php
$person = array(
    "Name" => "Alice",
    "Age" => 30,
    "City" => "London"
);

$upper = array_change_key_case($person, CASE_UPPER);
print_r($upper);
```

**Output:**

```php
Array
(
    [NAME] => Alice
    [AGE] => 30
    [CITY] => London
)
```

---

**Note:** Only the keys of the **first level** of the array will be changed. It does not affect nested arrays.
