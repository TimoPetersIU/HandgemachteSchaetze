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
?>
</body>
</html>