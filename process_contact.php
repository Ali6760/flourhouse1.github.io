<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Processing</title>
    <!-- Add your styles if needed -->
    <link rel="stylesheet" href="path/to/your/style.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.message-container {
    text-align: center;
}

.success-message {
    color: #4CAF50;
}

.error-message {
    color: #f44336;
}

    </style>
<body>
    <div class="container">
        <div class="message-container">
            <?php
            include "config.php";

            // Process form data
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $message = $_POST["message"];

                // Insert data into the contacts table
                $sql = "INSERT INTO contacts (name, date_time, message) VALUES ('$name', NOW(), '$message')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p class='success-message'>Message sent successfully</p>";
                } else {
                    echo "<p class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>

