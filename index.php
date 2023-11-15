<!DOCTYPE html>
<html>
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
$sql_insert = "INSERT INTO orders VALUES (DEFAULT)";
$sql_select = "SELECT name FROM artists";
$select_product_by_artist = "SELECT * from products WHERE artist_name='Benjamin Walker'";
$result = $connection->query($sql_select);
$result_prod_by_artist = $connection->query($select_product_by_artist);

if ($result_prod_by_artist->num_rows > 0) {
    while ($row = $result_prod_by_artist->fetch_assoc()) {
        echo "Name: " . $row["name"] . "<br>" . "Beschreibung: " . $row["description"] . "<br><br>";
    }
} else {
    echo "0 RESULTS";
}

//    if ($connection->query($sql_insert) === TRUE) {
//        echo "INSERT SUCCESSFUL";
//    } else {
//        echo "INSERT FAILED" . $connection->error;
//    }


$connection->close();
?>
</body>
</html>