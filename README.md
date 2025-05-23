# php-code-reference

1. [ array() method](#01-array-method)
2. [ array_change_key_case() method](#02-array_change_key_case-method)
3. [ array_chunk() method](#03-array_chunk-method)
4. [ array_column() method](#04-array_column-method)
5. [ array_combine() method](#05-array_combine-method)
6. [ array_count_values() method](#06-array_count_values-method)

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

## 05 `array_combine()` method

The `array_combine()` function creates an array by using one array for keys and another for its values. The number of elements in the two arrays must be equal.

### 🔹 Syntax:

```php
array_combine(array $keys, array $values): array
```

### 🔹 Parameters:

- **$keys** _(required)_: An array of keys to use for the new array.
- **$values** _(required)_: An array of values to assign to the new array.

### 🔹 Return Value:

Returns a new array with the values from `$values` assigned to the keys from `$keys`. If the number of elements in `$keys` and `$values` does not match, `array_combine()` will return `false`.

### 🔹 Example 1: Basic usage of `array_combine()`

```php
$keys = ['a', 'b', 'c'];
$values = [1, 2, 3];

$combined = array_combine($keys, $values);
print_r($combined);
```

**Output:**

```php
Array
(
    [a] => 1
    [b] => 2
    [c] => 3
)
```

### 🔹 Example 2: Handling mismatched array sizes

```php
$keys = ['a', 'b'];
$values = [1, 2, 3]; // More values than keys

$combined = array_combine($keys, $values);
if ($combined === false) {
    echo "Error: Arrays do not have the same number of elements.";
}
```

**Output:**

```php
Error: Arrays do not have the same number of elements.
```

### 🔹 Example 3: Using `array_combine()` to create an associative array with different data types

```php
$keys = ['id', 'name', 'age'];
$values = [101, 'Alice', 30];

$combined = array_combine($keys, $values);
print_r($combined);
```

**Output:**

```php
Array
(
    [id] => 101
    [name] => Alice
    [age] => 30
)
```

## ✅ Use Cases for `array_combine()`

### 1. **Creating an associative array from two separate arrays**

When you have two arrays: one with keys and one with values, `array_combine()` is a convenient way to combine them into a single associative array.

```php
$keys = ['id', 'name', 'age'];
$values = [101, 'Alice', 30];

$user = array_combine($keys, $values);
```

### 2. **Mapping arrays to a specific structure**

If you have an array of keys and an array of values (e.g., database column names and their corresponding values), `array_combine()` can help map these together.

```php
$columns = ['name', 'price', 'quantity'];
$values = ['Laptop', 1500, 5];

$product = array_combine($columns, $values);
```

### 3. **Transforming indexed arrays into associative arrays**

If you need to create a more readable associative array, `array_combine()` can help by turning simple indexed arrays into associative ones.

```php
$names = ['Peter', 'Paul', 'Mary'];
$ages = [30, 25, 28];

$people = array_combine($names, $ages);
```

### 4. **Validating input data before storing**

When handling user input or API data, you can ensure that the data structure is valid by combining arrays of keys and values and verifying their length.

```php
$keys = ['username', 'password', 'email'];
$values = ['johndoe', 'password123', 'john@example.com'];

$userData = array_combine($keys, $values);
```

---

### ⚠️ Notes:

- Both `$keys` and `$values` must have the same number of elements. If they don’t, `array_combine()` will return `false`.
- The keys in the resulting array can be any data type (integers, strings).
- `array_combine()` does not check for duplicate keys, so if your `$keys` array contains duplicates, the later value will overwrite the previous one.

[Back to Top](#php-code-reference)

## 06 `array_count_values()` method

The `array_count_values()` function counts all the values of an array and returns an associative array where the keys are the original array's values, and the values are the count of how many times each value occurred.

### 🔹 Syntax:

```php
array_count_values(array $array): array
```

### 🔹 Parameters:

- **$array** _(required)_: The input array whose values need to be counted.

### 🔹 Return Value:

Returns an associative array where the keys are the unique values from the input array, and the values are the count of occurrences of those values. If the input array is empty, it returns an empty array.

### 🔹 Example 1: Count occurrences of values in an array

```php
$fruits = ['apple', 'banana', 'apple', 'orange', 'banana', 'banana'];

$counted = array_count_values($fruits);
print_r($counted);
```

**Output:**

```php
Array
(
    [apple] => 2
    [banana] => 3
    [orange] => 1
)
```

### 🔹 Example 2: Count occurrences of numeric values

```php
$numbers = [1, 2, 2, 3, 3, 3, 4];

$counted = array_count_values($numbers);
print_r($counted);
```

**Output:**

```php
Array
(
    [1] => 1
    [2] => 2
    [3] => 3
    [4] => 1
)
```

### 🔹 Example 3: Count occurrences of boolean values

```php
$values = [true, false, true, true, false];

$counted = array_count_values($values);
print_r($counted);
```

**Output:**

```php
Array
(
    [1] => 3
    [0] => 2
)
```

### 🔹 Example 4: Empty array

```php
$empty = [];

$counted = array_count_values($empty);
print_r($counted);
```

**Output:**

```php
Array
(
)
```

## ✅ Use Cases for `array_count_values()`

### 1. **Counting the frequency of elements in an array**

When you need to count how often each item appears in an array, `array_count_values()` provides a quick and easy solution.

```php
$votes = ['Alice', 'Bob', 'Alice', 'Charlie', 'Alice', 'Bob'];

$voteCount = array_count_values($votes);
print_r($voteCount);
```

**Output:**

```php
Array
(
    [Alice] => 3
    [Bob] => 2
    [Charlie] => 1
)
```

### 2. **Identifying duplicates in an array**

By counting the occurrences of values, you can easily identify duplicates and analyze the distribution of values.

```php
$items = ['apple', 'banana', 'orange', 'banana', 'banana', 'apple'];

$duplicates = array_count_values($items);
print_r($duplicates);
```

**Output:**

```php
Array
(
    [apple] => 2
    [banana] => 3
    [orange] => 1
)
```

### 3. **Grouping items by their frequency**

If you want to group items by how often they occur, `array_count_values()` can help provide this data in a straightforward way.

```php
$colors = ['red', 'blue', 'red', 'green', 'blue', 'blue'];

$colorCount = array_count_values($colors);
print_r($colorCount);
```

**Output:**

```php
Array
(
    [red] => 2
    [blue] => 3
    [green] => 1
)
```

### 4. **Analyzing survey or poll data**

When analyzing survey responses or poll data, `array_count_values()` is useful for counting how many times each option was selected.

```php
$responses = ['yes', 'no', 'yes', 'yes', 'no'];

$responseCount = array_count_values($responses);
print_r($responseCount);
```

**Output:**

```php
Array
(
    [yes] => 3
    [no] => 2
)
```

---

### ⚠️ Notes:

- The function works with both indexed and associative arrays.
- The resulting array will have the unique values of the input array as the keys, and the number of times they appeared as the corresponding values.
- If an input array contains different types (e.g., strings and integers), they will be treated as separate keys.

[Back to Top](#php-code-reference)
