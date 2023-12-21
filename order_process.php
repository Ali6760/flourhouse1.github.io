<!-- order_process.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
            text-align: center;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }

        h1 {
            color: #333;
        }

        p {
            color: #666;
        }

        .confirmation-message {
            margin-top: 20px;
            font-size: 18px;
            color: #4CAF50;
        }

        .back-to-menu {
            margin-top: 20px;
        }

        .back-to-menu a {
            text-decoration: none;
            color: #fff;
            background-color: #3498db;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .back-to-menu a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order Confirmation</h1>
        <p>Your order has been placed successfully!</p>
        <p class="confirmation-message">Thank you for choosing our restaurant.</p>
        <div class="back-to-menu">
            <a href="index.php">Back to Menu</a>
        </div>
    </div>
</body>
</html>
<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order'])) {
    $location = $_POST['location'];
    $phone_number = $_POST['phone_number'];
    $item_ids = $_POST['item_ids'];
    $quantities = $_POST['quantities'];

    // Validate and process each selected item
    foreach ($item_ids as $key => $item_id) {
        $quantity = $quantities[$key];

        // Insert the order into the orders table with additional information
        $sql = "INSERT INTO orders (item_id, quantity, location, phone_number) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiss", $item_id, $quantity, $location, $phone_number);

        if ($stmt->execute()) {
            // Order placed successfully
        } else {
            // Handle error
            echo "Error placing order: " . $stmt->error;
        }

        $stmt->close();
    }

    echo "Orders placed successfully!";
}
?>