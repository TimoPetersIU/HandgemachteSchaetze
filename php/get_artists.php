<?php
// Einbinden der Datenbankverbindung
require("connection.php");

// SQL-Abfrage, um alle Datensätze aus der Tabelle 'artists' zu selektieren
$sql_select = "SELECT * FROM artists";
$result = $connection->query($sql_select);

// Überprüfung, ob Ergebnisse vorhanden sind
if ($result->num_rows > 0) {
    // Schleife durch alle Ergebniszeilen
    while ($row = $result->fetch_assoc()) {
        // Ausgabe der Künstlerinformationen (Name und Geburtsdatum)
        echo "Name: " . $row["name"] . "<br>" . "Geburtsdatum: " . $row["date_of_birth"] . "<br><br>";
    }
} else {
    // Ausgabe bei keinem Ergebnis
    echo "0 RESULTS";
}

// Schließen der Datenbankverbindung
$connection->close();
?>
