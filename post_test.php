<!DOCTYPE html>
<body>
<?php
require("connection.php");
//$servername = "localhost";
//$user = "root";
//$password = "";
//$db = "HandgemachteSchaetze";
//
//$connection = new mysqli($servername, $user, $password, $db);

$name = $_POST["name"];
$email = $_POST["email"];
$date = $_POST["birth_date"];

$sql_insert = "INSERT INTO `artists`(`name`, `email`, `date_of_birth`) VALUES ('{$name}','{$email}', '{$date}')";

if ($connection->query($sql_insert) === TRUE) {
    echo "INSERT SUCCESSFUL";
} else {
    echo "INSERT FAILED" . $connection->error;
}

$connection->close();

?>
</body>