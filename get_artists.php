<?php
require("connection.php");

$sql_select = "SELECT * from artists";
$result = $connection->query($sql_select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . "<br>" . "Geburtsdatum: " . $row["date_of_birth"]  . "<br><br>";
    }
} else {
    echo "0 RESULTS";
}

$connection->close();
?>
