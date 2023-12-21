<?php

define("db_SERVER", "localhost");
define("db_USER", "root");

define("db_PASSWORD","");

define("db_DBNAME", "flour_house");

$conn=mysqli_connect(db_SERVER, db_USER, db_PASSWORD, db_DBNAME);

if (!$conn)
{
    die("failed");

}
else{
    echo" " . mysqli_connect_error();
}
function addDish($name, $description, $price, $image_url)
{
    global $conn;

    $name = $conn->real_escape_string($name);
    $description = $conn->real_escape_string($description);
    $price = floatval($price);
    $image_url = $conn->real_escape_string($image_url);

    $sql = "INSERT INTO menu_items (name, description, price, image_url) VALUES ('$name', '$description', '$price', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        return false;
    }
}

function sanitize_input($input)
{
    global $conn;
    return $conn->real_escape_string($input);
}
?>