<?php
include 'config.php';
$sql = "SELECT menu_items.name, IFNULL(SUM(orders.quantity), 0) as total_sold
        FROM menu_items
        LEFT JOIN orders ON menu_items.id = orders.item_id
        GROUP BY menu_items.id
        ORDER BY total_sold ASC
        LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo $row['name'];
} else {
    echo 'No data';
}

$conn->close();
?>
