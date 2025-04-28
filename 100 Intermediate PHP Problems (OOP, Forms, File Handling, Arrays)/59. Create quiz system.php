<?php
session_start();

// Define questions
$questions = [
    1 => [
        'question' => 'What is the capital of France?',
        'options' => ['Paris', 'London', 'Berlin', 'Madrid'],
        'answer' => 'Paris'
    ],
    2 => [
        'question' => 'Which planet is known as the Red Planet?',
        'options' => ['Earth', 'Mars', 'Venus', 'Jupiter'],
        'answer' => 'Mars'
    ],
    3 => [
        'question' => 'What is 2 + 2?',
        'options' => ['3', '4', '5', '6'],
        'answer' => '4'
    ],
];

// Initialize session variables
if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 1;
    $_SESSION['score'] = 0;
}

// Handle form submission
if (isset($_POST['submit'])) {
    $selected = $_POST['option'] ?? null;
    $current_question = $_SESSION['current_question'];

    if ($selected && $selected == $questions[$current_question]['answer']) {
        $_SESSION['score']++;
    }

    $_SESSION['current_question']++;

    if ($_SESSION['current_question'] > count($questions)) {
        header('Location: result.php');
        exit();
    }
}

// Display current question
$current_question = $_SESSION['current_question'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Simple Quiz</title>
</head>
<body>

<h2>Simple PHP Quiz</h2>

<form method="POST" action="">
    <p><strong>Question <?php echo $current_question; ?>:</strong> <?php echo $questions[$current_question]['question']; ?></p>

    <?php foreach ($questions[$current_question]['options'] as $option) { ?>
        <input type="radio" name="option" value="<?php echo $option; ?>" required> <?php echo $option; ?><br>
    <?php } ?>

    <br>
    <button type="submit" name="submit">Next</button>
</form>

</body>
</html>
