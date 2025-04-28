1. HTML Form to Get User Input (chatbot.html):
This form will take the user’s input and send it to the server for processing.

html
Copy
Edit
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Chatbot</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .chatbox {
            border: 1px solid #ccc;
            width: 300px;
            height: 400px;
            padding: 10px;
            overflow-y: auto;
            margin-bottom: 10px;
        }
        .user-msg, .bot-msg {
            margin-bottom: 10px;
        }
        .user-msg {
            color: blue;
        }
        .bot-msg {
            color: green;
        }
    </style>
</head>
<body>

    <h2>Chatbot</h2>
    <div class="chatbox" id="chatbox"></div>
    <form action="chatbot.php" method="POST">
        <input type="text" name="user_input" id="user_input" placeholder="Ask me something..." required>
        <button type="submit">Send</button>
    </form>

</body>
</html>
2. PHP Script for Chatbot Logic (chatbot.php):
This PHP script will process the user's message and return a response based on simple keyword matching.

php
Copy
Edit
<?php
// Simple response function
function getBotResponse($user_input) {
    // Convert user input to lowercase to make the bot case-insensitive
    $user_input = strtolower($user_input);

    // Basic chatbot logic using if-else
    if (strpos($user_input, 'hello') !== false || strpos($user_input, 'hi') !== false) {
        return "Hello! How can I assist you today?";
    } elseif (strpos($user_input, 'how are you') !== false) {
        return "I'm doing great, thank you for asking!";
    } elseif (strpos($user_input, 'your name') !== false) {
        return "I am a simple chatbot created with PHP.";
    } elseif (strpos($user_input, 'bye') !== false) {
        return "Goodbye! Have a great day!";
    } else {
        return "I'm sorry, I didn't quite understand that. Could you rephrase?";
    }
}

// Check if there is user input
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_input = $_POST['user_input'];
    $bot_response = getBotResponse($user_input);
    
    // Output the user's input and bot's response
    echo "<div class='user-msg'>You: $user_input</div>";
    echo "<div class='bot-msg'>Bot: $bot_response</div>";
}
?>