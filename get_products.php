<?php
require("connection.php");

$sql_select = "SELECT * from products";
$result = $connection->query($sql_select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["pname"] . "<br>" . "Beschreibung: " . $row["description"] . "<br>" . "Preis: " . $row["price"] . "<br><br>";
    }
} else {
    echo "0 RESULTS";
}

$connection->close();
?>
