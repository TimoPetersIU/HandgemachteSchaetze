<!DOCTYPE html>
<body>
<?php

$servername = "localhost";
$user = "root";
$password = "";
$db = "HandgemachteSchaetze";

$connection = new mysqli($servername, $user, $password, $db);

if ($connection->connect_error) {
    die("FAILED " . $connection->connect_error);
}

$artist_name = $_POST["artist_name"];
$sql_select = "SELECT * from products WHERE artist_name='{$artist_name}'";
$result = $connection->query($sql_select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . "<br>" . "Beschreibung: " . $row["description"] . "<br><br>";
    }
} else {
    echo "0 RESULTS";
}

$connection->close();
?>
</body>