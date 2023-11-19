<!--======================================================================Timo Peters===================================================================================================>>-->
<?php
require("connection.php");

$name = $_POST["name"];
$description = $_POST["description"];
$category = $_POST["category"];
$price = $_POST["price"];
$artist_Name = $_POST["artist_name"];

$sql_insert = "INSERT INTO `products`(`pname`, `description`, `category`, `price`, `artist_name`) VALUES ('{$name}','{$description}', '{$category}', {$price} . ',{$artist_Name}')";

if ($connection->query($sql_insert) === TRUE) {
    echo "INSERT SUCCESSFUL";
} else {
    echo "INSERT FAILED" . $connection->error;
}

$connection->close();

?>
<!--====================================================================================================================================================================================================-->
