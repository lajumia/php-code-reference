<?php
session_start();

// Define the countdown time (in seconds)
$time_limit = 30; // 30 seconds for the timer

// Set a session to keep track of the time limit
$_SESSION['time_limit'] = $time_limit;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Quiz with Timer</title>
    <style>
        .timer {
            font-size: 20px;
            color: red;
        }
    </style>
</head>
<body>

<h2>Simple Quiz with Countdown Timer</h2>

<p class="timer">Time Left: <span id="timer"><?php echo $_SESSION['time_limit']; ?>s</span></p>

<form method="POST" action="">

    <!-- Your quiz question here -->
    <p><strong>Question 1:</strong> What is the capital of France?</p>
    <input type="radio" name="option" value="Paris" required> Paris<br>
    <input type="radio" name="option" value="London"> London<br>
    <input type="radio" name="option" value="Berlin"> Berlin<br>
    <input type="radio" name="option" value="Madrid"> Madrid<br><br>

    <button type="submit" name="submit">Next</button>
</form>

<script>
// JavaScript to handle countdown timer
var countdown = <?php echo $_SESSION['time_limit']; ?>;
var timerElement = document.getElementById("timer");

function updateTimer() {
    if (countdown > 0) {
        countdown--;
        timerElement.innerText = countdown + "s";
    } else {
        // Redirect or perform action when time is up
        alert("Time's up!");
        window.location.href = "result.php"; // Redirect to result page
    }
}

// Update the timer every second
var timerInterval = setInterval(updateTimer, 1000);
</script>

</body>
</html>
