<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Produkt</title>
    <!-- auf CSS verlinken -->
    <link href="product.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>

<?php

$_GET["id"];

// Verbindung zur Datenbank herstellen
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "handgemachteschaetze";

$conn = new mysqli($servername, $username, $password, $dbname);

// Überprüfen der Verbindung
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL-Abfrage für Produkte

$sql = "SELECT * FROM products join artists on  products.artist_name = artists.name where products.id = '".$conn->real_escape_string($_GET['id'])."'" ; // Hier kannst du die gewünschte Produkt-ID angeben

$result = $conn->query($sql);

// Überprüfen, ob Ergebnisse vorhanden sind
if ($result->num_rows > 0) {
    // Daten aus der Abfrage abrufen
    $row = $result->fetch_assoc();

    // HTML-Tabelle mit dynamischen Daten füllen
    echo '<table cellspacing="0" cellpadding="0">';
    echo '<tr>';

    echo '<th colspan="3">' . $row['pname'] . '</th>';
    echo '</tr>';
    echo '<tr class="cell">';
    echo '<td>' . $row['artist_name'] . '</td>';
    echo '<td>' . $row['price'] . '€</td>';

    echo '</tr>';
    echo '<tr>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['category'] . '</td>';
    echo '</tr>';

    echo '<tr>';
    echo '<td colspan="3"><img src="../Bildes/' . $row['img_path'] . '" alt="bild von ' . $row['pname'] . '"></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="3">' . $row['description'] . '</td>';
    echo '</tr>';

    echo '</table>';
} else {
    echo "Keine Ergebnisse gefunden";
}

// <p><a href="Product/product.php?id=25">cooles zeug</a></p>

// Verbindung schließen
$conn->close();
?>

</body>

</html>

