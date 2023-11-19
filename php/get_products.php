<?php
// Einbinden der Datei mit der Datenbankverbindung
require("connection.php");

// SQL-Abfrage, um alle Datensätze aus der Tabelle 'products' zu selektieren
$sql_select = "SELECT * FROM products";
$result = $connection->query($sql_select);

// Überprüfung, ob Ergebnisse vorhanden sind
if ($result->num_rows > 0) {
    // Schleife durch alle Ergebniszeilen
    while ($row = $result->fetch_assoc()) {
        // Ausgabe der Produktinformationen (Name, Beschreibung und Preis)
        echo "Name: " . $row["pname"] . "<br>" . "Beschreibung: " . $row["description"] . "<br>" . "Preis: " . $row["price"] . "<br><br>";
    }
} else {
    // Ausgabe bei keinem Ergebnis
    echo "0 RESULTS";
}

// Schließen der Datenbankverbindung
$connection->close();
?>