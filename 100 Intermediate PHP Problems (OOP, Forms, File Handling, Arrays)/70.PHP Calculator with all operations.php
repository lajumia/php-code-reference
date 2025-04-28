<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calculator</title>
</head>
<body>

<h2>PHP Calculator</h2>

<form action="calculator.php" method="POST">
    <label for="num1">Number 1:</label>
    <input type="number" name="num1" id="num1" required><br><br>
    
    <label for="num2">Number 2:</label>
    <input type="number" name="num2" id="num2" required><br><br>
    
    <label for="operation">Select Operation:</label>
    <select name="operation" id="operation">
        <option value="add">Addition (+)</option>
        <option value="subtract">Subtraction (-)</option>
        <option value="multiply">Multiplication (×)</option>
        <option value="divide">Division (÷)</option>
        <option value="modulus">Modulus (%)</option>
        <option value="exponent">Exponentiation (^)</option>
    </select><br><br>
    
    <input type="submit" value="Calculate">
</form>

</body>
</html>
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values from the form
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];

    // Initialize the result variable
    $result = '';

    // Perform the selected operation
    switch ($operation) {
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
                $result = "Error: Division by zero!";
            }
            break;
        case 'modulus':
            if ($num2 != 0) {
                $result = $num1 % $num2;
            } else {
                $result = "Error: Division by zero!";
            }
            break;
        case 'exponent':
            $result = pow($num1, $num2);
            break;
        default:
            $result = "Invalid operation!";
            break;
    }

    // Display the result
    echo "<h3>Result: $result</h3>";
}
?>
