✅ parse_url()
This function parses a URL and returns its components (like scheme, host, path, query, etc.).

Syntax:

php
Copy
Edit
parse_url(string $url, int $component = -1): mixed
Example:

php
Copy
Edit
$url = "https://example.com/path/page.php?name=John&age=30";

$parsed_url = parse_url($url);
print_r($parsed_url);
Output:

php
Copy
Edit
Array
(
    [scheme] => https
    [host] => example.com
    [path] => /path/page.php
    [query] => name=John&age=30
)
You can also extract a specific component:

php
Copy
Edit
$host = parse_url($url, PHP_URL_HOST); // Outputs: example.com
✅ parse_str()
This function parses a query string into variables or an associative array.

Syntax:

php
Copy
Edit
parse_str(string $string, array &$result): void
Example:

php
Copy
Edit
$query = "name=John&age=30";

parse_str($query, $params);
print_r($params);
Output:

php
Copy
Edit
Array
(
    [name] => John
    [age] => 30
)
✅ Combined Use Case:
php
Copy
Edit
$url = "https://example.com/path/page.php?name=John&age=30";

$parsed_url = parse_url($url);
parse_str($parsed_url['query'], $params);

print_r($params);
Output:

php
Copy
Edit
Array
(
    [name] => John
    [age] => 30
)