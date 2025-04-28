<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Calculator</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 40px;
            background: #f2f2f2;
        }
        .calculator {
            background: #fff;
            padding: 20px;
            max-width: 400px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input, select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
        .result {
            font-weight: bold;
            margin-top: 20px;
            text-align: center;
            font-size: 1.2em;
            color: green;
        }
    </style>
</head>
<body>

<div class="calculator">
    <h2>Simple Calculator</h2>

    <form method="post" action="">
        <input type="number" name="num1" placeholder="Enter first number" required>
        
        <select name="operation" required>
            <option value="">Select operation</option>
            <option value="add">Addition (+)</option>
            <option value="subtract">Subtraction (-)</option>
            <option value="multiply">Multiplication (×)</option>
            <option value="divide">Division (÷)</option>
        </select>
        
        <input type="number" name="num2" placeholder="Enter second number" required>
        
        <button type="submit" name="submit">Calculate</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $num1 = (float) $_POST['num1'];
        $num2 = (float) $_POST['num2'];
        $operation = $_POST['operation'];
        $result = '';

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
                if ($num2 == 0) {
                    $result = 'Error: Division by zero!';
                } else {
                    $result = $num1 / $num2;
                }
                break;
            default:
                $result = 'Invalid operation selected!';
        }

        echo "<div class='result'>Result: {$result}</div>";
    }
    ?>
</div>

</body>
</html>
