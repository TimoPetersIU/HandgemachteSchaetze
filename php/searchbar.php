<?php
// Einbinden der Datei mit der Datenbankverbindung
require("connection.php");

// Parameter aus der URL abrufen
$type = $_GET["type"];
$searchValue = $_GET["searchInput"];

// Initialisierung der SQL-Abfrage
$sql_select = "";

// Anhand des übergebenen Typs die geeignete SQL-Abfrage erstellen
switch ($type) {
    case "artist":
        $sql_select = "SELECT * FROM products WHERE artist_name LIKE '%" . $searchValue . "%'";
        break;
    case "product":
        $sql_select = "SELECT * FROM products WHERE pname LIKE '%" . $searchValue . "%'";
        break;
    case "category":
        $sql_select = "SELECT * FROM products WHERE category = '" . $searchValue . "'";
        break;
}

// Ausführung der SQL-Abfrage
$result = $connection->query($sql_select);

// Überprüfung, ob Ergebnisse vorhanden sind
if ($result->num_rows > 0) {
    // Schleife durch alle Ergebniszeilen
    while ($row = $result->fetch_assoc()) {
        // Ausgabe der Produktinformationen (Name, Beschreibung, Künstler)
        echo "Name: " . $row["pname"] . "<br>" . "Beschreibung: " . $row["description"] . "<br>" . "Künstler: " . $row["artist_name"] . "<br><br>";
    }
} else {
    // Ausgabe bei keinem Ergebnis
    echo "0 RESULTS";
}

// Schließen der Datenbankverbindung
$connection->close();
?>
