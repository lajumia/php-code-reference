✅ Example: Calculator using switch in PHP
1. HTML Form for User Input (calculator.html):
The form will allow the user to input two numbers and select an operation.

html
Copy
Edit
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>

    <h2>Simple Calculator</h2>
    <form action="calculator.php" method="POST">
        <label for="num1">Number 1:</label>
        <input type="number" name="num1" id="num1" required><br><br>

        <label for="num2">Number 2:</label>
        <input type="number" name="num2" id="num2" required><br><br>

        <label for="operator">Operation:</label>
        <select name="operator" id="operator" required>
            <option value="add">Addition</option>
            <option value="subtract">Subtraction</option>
            <option value="multiply">Multiplication</option>
            <option value="divide">Division</option>
        </select><br><br>

        <button type="submit">Calculate</button>
    </form>

</body>
</html>
2. PHP Script to Perform Calculation (calculator.php):
The PHP script will process the form data, perform the calculation, and return the result based on the selected operation.

php
Copy
Edit
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the form data
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operator = $_POST['operator'];

    // Variable to store result
    $result = 0;

    // Use switch case to handle different operations
    switch ($operator) {
        case 'add':
            $result = $num1 + $num2;
            break;

        case 'subtract':
            $result = $num1 - $num2;
            break;

        case 'multiply':
            $result = $num1 * $num2;
            break;

        case 'divide':
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Error: Division by zero is not allowed.";
            }
            break;

        default:
            $result = "Invalid operation.";
            break;
    }

    // Output the result
    echo "<h3>Result: $result</h3>";
}
?>
