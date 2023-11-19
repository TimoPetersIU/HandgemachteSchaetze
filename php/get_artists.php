<!DOCTYPE html>
<html>
    <head>
    <link href="../tebllen.css" rel="stylesheet" type="text/css" media="screen" />
    </head>
    <body>
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
        echo "<div class='klick'>";
        echo "<a href='../Product/product.php?artist_name=".$row['name']."'>";
        echo "<table class='choice_table' cellspacing=0 cellpadding=0>";
        echo "<tr>";
        echo "<th>" . $row["name"] . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td> Geburtsdatum: ".$row["date_of_birth"]."</td>";
        echo"</tr>";
        echo "</table>";
        echo "</a>";
        echo "</div>";
      //  echo "Name: " . $row["name"] . "<br>" . "Geburtsdatum: " . $row["date_of_birth"] . "<br><br>";
    }
} else {
    // Ausgabe bei keinem Ergebnis
    echo "0 RESULTS";
}

// Schließen der Datenbankverbindung
$connection->close();
?>
    </body>
</html>
<!--==============================================================================================================================-->