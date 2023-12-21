<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <title>Admin Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .delete-btn:hover {
            background-color: #d32f2f;
        }

        /* New CSS for Edit Form */
        .edit-form {
            display: none;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-top: 20px;
        }

        .edit-form label {
            display: block;
            margin-bottom: 8px;
        }

        .edit-form input, .edit-form textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            box-sizing: border-box;
        }

        .edit-form button {
            background-color: #007BFF;
        }

        .edit-form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h2>Add New Dish</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" required>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea>

        <label for="price">Price:</label>
        <input type="text" name="price" required>

        <label for="image_url">Image URL:</label>
        <input type="text" name="image_url">

        <button type="submit" name="add_dish">Add Dish</button>
    </form>

    <h2>All Dishes</h2>
    <?php
    include('config.php');

    // Handle dish addition
    if (isset($_POST['add_dish'])) {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image_url = $_POST['image_url'];
    
        $insertSql = "INSERT INTO menu_items (name, description, price, image_url) VALUES ('$name', '$description', '$price', '$image_url')";
    
        if ($conn->query($insertSql) === TRUE) {
            // Get the ID of the newly added dish
            $newDishId = $conn->insert_id;
    
            // Redirect to a new page to display the new dish
            header("Location: index.php?id=$newDishId");
            exit();
        } else {
            echo '<div style="color: red;">Error adding dish: ' . $conn->error . '</div>';
        }
    }
 
        // ... (existing code for adding a dish)
    

    // Handle dish deletion
    if (isset($_GET['delete_id'])) {
        if (isset($_GET['delete_id'])) {
            $deleteId = $_GET['delete_id'];
            $deleteSql = "DELETE FROM menu_items WHERE id = $deleteId";
            if ($conn->query($deleteSql) === TRUE) {
                echo '<div style="color: green;">Dish deleted successfully!</div>';
            } else {
                echo '<div style="color: red;">Error deleting dish: ' . $conn->error . '</div>';
            }
        }
        // ... (existing code for deleting a dish)
    }

    // Handle dish editing form submission
    if (isset($_POST['edit_dish'])) {
        $editId = $_POST['edit_id'];
        $editName = $_POST['edit_name'];
        $editDescription = $_POST['edit_description'];
        $editPrice = $_POST['edit_price'];
        $editImageUrl = $_POST['edit_image_url'];

        $updateSql = "UPDATE menu_items SET name='$editName', description='$editDescription', price='$editPrice', image_url='$editImageUrl' WHERE id=$editId";

        if ($conn->query($updateSql) === TRUE) {
            echo '<div style="color: green;">Dish updated successfully!</div>';
        } else {
            echo '<div style="color: red;">Error updating dish: ' . $conn->error . '</div>';
        }
    }

    // Display all dishes in a table
    function displayAllDishes()
    {
        global $conn;

        $sql = "SELECT * FROM menu_items";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Image URL</th><th>Action</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['description'] . '</td>';
                echo '<td>' . $row['price'] . '</td>';
                echo '<td>' . $row['image_url'] . '</td>';

                // Edit button
                echo '<td><button class="edit-btn" onclick="editDish(' . $row['id'] . ', \'' . $row['name'] . '\', \'' . $row['description'] . '\', \'' . $row['price'] . '\', \'' . $row['image_url'] . '\')">Edit</button>';
                
                // Delete button
                echo '<button class="delete-btn" onclick="deleteDish(' . $row['id'] . ')">Delete</button></td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "No dishes available.";
        }
    }

    displayAllDishes();
    ?>

    <!-- Edit Form -->
    <div id="edit-dish-form" class="edit-form">
        <h2>Edit Dish</h2>
        <form action="" method="post">
            <input type="hidden" name="edit_id" id="edit-id">

            <label for="edit_name">Name:</label>
            <input type="text" name="edit_name" id="edit-name" required>

            <label for="edit_description">Description:</label>
            <textarea name="edit_description" id="edit-description" required></textarea>

            <label for="edit_price">Price:</label>
            <input type="text" name="edit_price" id="edit-price" required>

            <label for="edit_image_url">Image URL:</label>
            <input type="text" name="edit_image_url" id="edit-image-url">

            <button type="submit" name="edit_dish">Save Changes</button>
        </form>
    </div>

    <script>
        function editDish(id, name, description, price, imageUrl) {
            document.getElementById('edit-id').value = id;
            document.getElementById('edit-name').value = name;
            document.getElementById('edit-description').value = description;
            document.getElementById('edit-price').value = price;
            document.getElementById('edit-image-url').value = imageUrl;

            // Show the edit form
            document.getElementById('edit-dish-form').style.display = 'block';
        }

        function deleteDish(id) {
            if (confirm('Are you sure you want to delete this dish?')) {
                window.location.href = 'admin.php?delete_id=' + id;
            }
        }
    </script>
    
     <h2>All User Messages</h2>
    <?php
    // Display all user messages in a table
    function displayAllMessages()
    {
        global $conn;

        $sql = "SELECT * FROM contacts";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>ID</th><th>Name</th><th>Message</th><th>Date & Time</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['message'] . '</td>';
                echo '<td>' . $row['date_time'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else {
            echo "No messages available.";
        }
    }

    displayAllMessages();
   
?><?php
  function displayAllOrders()
{
    global $conn;

    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<h2>All Orders</h2>';
        echo '<table>';
        echo '<tr><th>ID</th><th>Item ID</th><th>Quantity</th><th>Location</th><th>Phone Number</th><th>Order Date</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['id'] . '</td>';
            echo '<td>' . $row['item_id'] . '</td>';
            echo '<td>' . $row['quantity'] . '</td>';
            echo '<td>' . $row['location'] . '</td>'; // Display the location
            echo '<td>' . $row['phone_number'] . '</td>'; // Display the phone number
            echo '<td>' . $row['order_date'] . '</td>';
            echo '</tr>';
        }
    
        echo '</table>';
    } else {
        echo "No orders available.";
    }
}
displayAllOrders();
?>
<?php
// ... (existing code)

// Function to display the most sold dish
function displayMostSoldDish()
{
    global $conn;

    $sql = "SELECT menu_items.name, SUM(orders.quantity) as total_sold FROM orders 
            JOIN menu_items ON orders.item_id = menu_items.id 
            GROUP BY orders.item_id 
            ORDER BY total_sold DESC 
            LIMIT 1";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $dishName = $row['name'];
        $totalSold = $row['total_sold'];

        echo '<h2>Most Sold Dish</h2>';
        echo '<p>Name: ' . $dishName . '</p>';
        echo '<p>Total Sold: ' . $totalSold . '</p>';
    } else {
        echo "No sales data available.";
    }
}

// Function to display total earnings
function displayTotalEarnings()
{
    global $conn;

    $sql = "SELECT SUM(menu_items.price * orders.quantity) as total_earnings 
            FROM orders 
            JOIN menu_items ON orders.item_id = menu_items.id";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $totalEarnings = $row['total_earnings'];

        echo '<h2>Total Earnings</h2>';
        echo '<p>' . $totalEarnings .'$</p>';
      
    } else {
        echo "No earnings data available.";
    }
}
function displayDailyEarnings()
{
    global $conn;

    $sql = "SELECT DATE_FORMAT(order_date, '%Y-%m-%d') as order_day, SUM(menu_items.price * orders.quantity) as daily_earnings 
            FROM orders 
            JOIN menu_items ON orders.item_id = menu_items.id 
            GROUP BY order_day";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<h2>Daily Earnings</h2>';
        echo '<table>';
        echo '<tr><th>Date</th><th>Earnings</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['order_day'] . '</td>';
            echo '<td>' . $row['daily_earnings'] . '$</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "No earnings data available.";
    }
}

// ... (existing code)

// Display most sold dish and total earnings
displayMostSoldDish();
displayTotalEarnings();
displayDailyEarnings();
// ... (existing code)
?>
 <h2><div id="leastSoldDish"></div></h2>

<script>
    $(document).ready(function () {
        $.ajax({
            type: "GET",
            url: "get.php",
            success: function (response) {
                $("#leastSoldDish").html("Least Sold Dish: " + response);
            },
            error: function (xhr, status, error) {
                console.error("Error: " + error);
            }
        });
    });
</script>
</body>

</html>
