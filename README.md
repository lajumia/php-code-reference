# php-code-reference

1. [ array() method](#01-array-method)
2. [ array_change_key_case() method](#02-array_change_key_case-method)
3. [ array_chunk() method](#03-array_chunk-method)
4. [ array_column() method](#03-array_column-method)

## 01 `array()` method

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

[Back to Top](#php-code-reference)

## 02 `array_change_key_case()` method

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

## ✅ Use Cases for `array_change_key_case()`

### 1. **Case-insensitive key handling**

When you're getting array data from an external source (like an API, CSV, or database) where the key casing is inconsistent, you can normalize all keys before processing.

```php
// Example from CSV/API
$user = [
    "Name" => "John",
    "email" => "john@example.com",
    "AGE" => 25
];

// Normalize keys
$user = array_change_key_case($user, CASE_LOWER);

echo $user['name'];  // works regardless of original key case
```

---

### 2. **Prevent errors due to key case mismatch**

When you're working in a large app or importing data from multiple sources, a mismatch in key casing (`Name` vs `name`) can cause bugs.

```php
// Form submission or imported data
$data = [
    "Name" => "Sarah",
    "Age" => 28
];

// Unified access
$data = array_change_key_case($data, CASE_LOWER);
echo $data['name']; // avoids writing: $data['Name']
```

---

### 3. **Standardize keys before merging arrays**

When merging multiple arrays with keys like `Name`, `name`, `NAME`, standardizing key case prevents key duplication or overwriting.

```php
$a = ["Name" => "Tom"];
$b = ["name" => "Jerry"];

$a = array_change_key_case($a, CASE_LOWER);
$b = array_change_key_case($b, CASE_LOWER);

$merged = array_merge($a, $b); // array_merge() function remove duplicate for associative array not indexed array
print_r($merged); // ourput will be ["name"=>"jerry"]
```

---

### 4. **Data sanitization for storage or comparison**

You might want to store array keys in a database or file in a unified format (all lowercase), especially for search and filter features.

```php
// Example for consistent search filter:
$filter = array_change_key_case($_GET, CASE_LOWER);
if (isset($filter['category'])) {
    // do something
}
```

---

### 5. **Building APIs or working with frontend apps**

If you're exposing or consuming APIs, key case consistency is crucial, especially when JavaScript objects typically use lowercase or camelCase keys.

```php
// Consistent JSON response keys
$response = array_change_key_case($data, CASE_LOWER);
echo json_encode($response);
```

---

**Note:** Only the keys of the **first level** of the array will be changed. It does not affect nested arrays.

[Back to Top](#php-code-reference)

## 03 `array_chunk()` method

The `array_chunk()` function splits an array into smaller arrays (chunks) of a specified size.

### 🔹 Syntax:

```php
array_chunk(array $array, int $length, bool $preserve_keys = false): array
```

### 🔹 Parameters:

- **$array** _(required)_: The input array to split.
- **$length** _(required)_: The size of each chunk.
- **$preserve_keys** _(optional)_:
  - `false` (default): Resets keys in the resulting chunks.
  - `true`: Preserves original keys from the input array.

### 🔹 Return Value:

Returns a multidimensional array containing the chunks.

### 🔹 Example 1: Chunk array without preserving keys

```php
$colors = ["red", "green", "blue", "yellow", "purple"];
$chunks = array_chunk($colors, 2);

print_r($chunks);
```

**Output:**

```php
Array
(
    [0] => Array
        (
            [0] => red
            [1] => green
        )

    [1] => Array
        (
            [0] => blue
            [1] => yellow
        )

    [2] => Array
        (
            [0] => purple
        )
)
```

### 🔹 Example 2: Chunk associative array with preserved keys

```php
$data = [
    10 => "Apple",
    20 => "Banana",
    30 => "Mango",
    40 => "Orange"
];

$chunks = array_chunk($data, 2, true);

print_r($chunks);
```

**Output:**

```php
Array
(
    [0] => Array
        (
            [10] => Apple
            [20] => Banana
        )

    [1] => Array
        (
            [30] => Mango
            [40] => Orange
        )
)
```

## ✅ Use Cases for `array_chunk()`

### 1. Paginating large data sets

```php
$products = get_all_products(); // returns 100 items
$pages = array_chunk($products, 10); // divide into 10 per page
```

### 2. Splitting data for batch processing

```php
$emails = ["a@example.com", "b@example.com", "c@example.com", "d@example.com"];
$batches = array_chunk($emails, 2);

foreach ($batches as $batch) {
    send_bulk_email($batch);
}
```

### 3. Creating grid layouts (e.g., 3 items per row)

```php
$items = [1, 2, 3, 4, 5, 6];
$rows = array_chunk($items, 3); // 3 items per row
```

### 4. Preserve keys when key-based access is needed

```php
$users = [
    101 => "Alice",
    102 => "Bob",
    103 => "Charlie"
];

$chunks = array_chunk($users, 2, true);
```

### ⚠️ Note

- Only works on the **first level** of the array.
- It **does not modify the original array**.

[Back to Top](#php-code-reference)

## 04 `array_column()` method

The `array_column()` function returns the values from a single column of the input array, identified by the column key.

### 🔹 Syntax:

```php
array_column(array $array, mixed $column_key, mixed $index_key = null): array
```

### 🔹 Parameters:

- **$array** _(required)_: The input array.
- **$column_key** _(required)_: The column key whose values you want to extract.
- **$index_key** _(optional)_: The key to use for the index of the returned array. If not provided, numeric indices will be used.

### 🔹 Return Value:

Returns an indexed array of values from the specified column in the input array. If `$index_key` is specified, the values will be indexed by this key.

### 🔹 Example 1: Get a column of values from an indexed array

```php
$users = [
    ['id' => 1, 'name' => 'Alice', 'age' => 25],
    ['id' => 2, 'name' => 'Bob', 'age' => 30],
    ['id' => 3, 'name' => 'Charlie', 'age' => 35]
];

$names = array_column($users, 'name');
print_r($names);
```

**Output:**

```php
Array
(
    [0] => Alice
    [1] => Bob
    [2] => Charlie
)
```

### 🔹 Example 2: Get a column of values indexed by another column

```php
$users = [
    ['id' => 1, 'name' => 'Alice', 'age' => 25],
    ['id' => 2, 'name' => 'Bob', 'age' => 30],
    ['id' => 3, 'name' => 'Charlie', 'age' => 35]
];

$namesById = array_column($users, 'name', 'id');
print_r($namesById);
```

**Output:**

```php
Array
(
    [1] => Alice
    [2] => Bob
    [3] => Charlie
)
```

### 🔹 Example 3: Get a column of values from a multi-dimensional associative array

```php
$products = [
    ['id' => 1, 'name' => 'Laptop', 'price' => 1500],
    ['id' => 2, 'name' => 'Smartphone', 'price' => 800],
    ['id' => 3, 'name' => 'Tablet', 'price' => 600]
];

$prices = array_column($products, 'price');
print_r($prices);
```

**Output:**

```php
Array
(
    [0] => 1500
    [1] => 800
    [2] => 600
)
```

### 🔹 Example 4: Get a column of values with the specified index key

```php
$products = [
    ['id' => 1, 'name' => 'Laptop', 'price' => 1500],
    ['id' => 2, 'name' => 'Smartphone', 'price' => 800],
    ['id' => 3, 'name' => 'Tablet', 'price' => 600]
];

$productsIndexedById = array_column($products, 'name', 'id');
print_r($productsIndexedById);
```

**Output:**

```php
Array
(
    [1] => Laptop
    [2] => Smartphone
    [3] => Tablet
)
```

## ✅ Use Cases for `array_column()`

### 1. **Extract specific columns from an array of data**

When you have a multi-dimensional array (like a result set from a database) and you want to extract a particular column, `array_column()` makes it easier to retrieve the data.

```php
// Example: Get an array of product prices from an array of product details
$products = [
    ['id' => 1, 'name' => 'Laptop', 'price' => 1500],
    ['id' => 2, 'name' => 'Smartphone', 'price' => 800],
    ['id' => 3, 'name' => 'Tablet', 'price' => 600]
];

$prices = array_column($products, 'price');
```

### 2. **Indexing an array by a key**

If you want to index the result of `array_column()` by another column (e.g., to map items by their IDs), you can pass the column you want to use as the index.

```php
$users = [
    ['id' => 1, 'name' => 'Alice', 'email' => 'alice@example.com'],
    ['id' => 2, 'name' => 'Bob', 'email' => 'bob@example.com'],
    ['id' => 3, 'name' => 'Charlie', 'email' => 'charlie@example.com']
];

$usersById = array_column($users, 'name', 'id');
```

### 3. **Working with a list of associative arrays**

You may use `array_column()` when dealing with large datasets or results from a database where each row is an associative array. It's a quick way to retrieve values from a specific column.

```php
// Extracting specific columns for analysis
$orders = [
    ['order_id' => 101, 'product_name' => 'Laptop', 'total_price' => 1500],
    ['order_id' => 102, 'product_name' => 'Smartphone', 'total_price' => 800]
];

$productNames = array_column($orders, 'product_name');
```

### 4. **Sorting by column**

After extracting a column using `array_column()`, you can use the result for sorting operations.

```php
// Example: Sort products by price
$products = [
    ['id' => 1, 'name' => 'Laptop', 'price' => 1500],
    ['id' => 2, 'name' => 'Smartphone', 'price' => 800],
    ['id' => 3, 'name' => 'Tablet', 'price' => 600]
];

$prices = array_column($products, 'price');
array_multisort($prices, SORT_DESC, $products); // Sort products by price descending
```

---

### ⚠️ Note

- The input array should be an indexed or associative array.
- If the column key does not exist in one or more array elements, those elements will be excluded from the result.
- It only works for **first-level** arrays. Nested arrays are not affected.

[Back to Top](#php-code-reference)
