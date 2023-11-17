<?php
require("connection.php");

$type = $_GET ["type"];
$searchValue = $_GET["searchInput"];

$sql_select = "";

switch ($type) {
    case "artist":
        $sql_select = "SELECT * from products WHERE artist_name LIKE'" . "%" . $searchValue . "%" . "'";
        break;
    case "product":
        $sql_select = "SELECT * from products WHERE pname LIKE'" . "%" . $searchValue . "%" . "'";
        break;
    case "category":
        $sql_select = "SELECT * from products WHERE category='" . $searchValue . "'";
        break;
}

$result = $connection->query($sql_select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["pname"] . "<br>" . "Beschreibung: " . $row["description"] . "<br>" . "Künstler " . $row["artist_name"] . "<br><br>";
    }
} else {
    echo "0 RESULTS";
}

$connection->close();
?>
