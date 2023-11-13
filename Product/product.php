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
$sql = "SELECT * FROM products WHERE id = 25"; // Hier kannst du die gewünschte Produkt-ID angeben
$result = $conn->query($sql);

// Überprüfen, ob Ergebnisse vorhanden sind
if ($result->num_rows > 0) {
    // Daten aus der Abfrage abrufen
    $row = $result->fetch_assoc();

    // HTML-Tabelle mit dynamischen Daten füllen
    echo '<table cellspacing="0" cellpadding="0">';
    echo '<tr>';
    echo '<th colspan="3">' . $row['name'] . '</th>';
    echo '</tr>';
    echo '<tr>';
    echo '<td colspan="3"><img src="' . $row['img_path'] . '" alt="bild von ' . $row['name'] . '"></td>';
    echo '</tr>';
    echo '<tr class="cell">';
    echo '<td>' . $row['artist_name'] . '</td>';
    echo '<td>' . $row['price'] . '</td>';
    echo '</tr>';
    echo '<tr>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td>' . $row['category'] . '</td>';
    echo '</tr>';
    // Füge die restlichen Daten hinzu (Wohnort, Straße, usw.) nach Bedarf
    // ...
    echo '</table>';
} else {
    echo "Keine Ergebnisse gefunden";
}

// Verbindung schließen
$conn->close();
?>

</body>
</html>
