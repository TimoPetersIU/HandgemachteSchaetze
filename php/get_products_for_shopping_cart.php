<?php
// Verbindung zur Datenbank herstellen
require("connection.php");

// Überprüfen, ob Produkt-IDs im POST-Request vorhanden und nicht leer sind
if (isset($_POST['productIds']) && !empty($_POST['productIds'])) {
    // Produkt-IDs aus dem POST-Request extrahieren
    $ids = $_POST['productIds'];

    // Produkt-IDs zu einer Zeichenkette konvertieren
    $productIdList = implode(',', $ids);

    // SQL-Abfrage für die ausgewählten Produkte vorbereiten
    $sql = "SELECT id, pname, price FROM products WHERE id IN ($productIdList)";

    // SQL-Abfrage ausführen
    $result = $connection->query($sql);

    // Überprüfen, ob die Abfrage erfolgreich war
    if ($result) {
        $data = array();

        // Results durchlaufen und Daten in das Array einfügen
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // HTTP-Header für JSON-Antwort setzen
        header('Content-Type: application/json');

        // Überprüfen, ob Daten vorhanden sind und JSON-Antwort senden
        if (!empty($data)) {
            echo json_encode($data);
        } else {
            // Wenn keine Produkte gefunden wurden-> entsprechende JSON-Nachricht senden
            echo json_encode(array("message" => "Keine Produkte gefunden"));
        }
    } else {
        // Bei einem Fehler in der SQL-Abfrage -> entsprechende JSON-Nachricht senden
        echo json_encode(array("message" => "Fehler beim Ausführen der Abfrage"));
    }
} else {
    // Falls keine Produkt-IDs im POST-Request vorhanden sind -> entsprechende JSON-Nachricht senden
    echo json_encode(array("message" => "Keine IDs bereitgestellt"));
}

// Verbindung zur Datenbank schließen
$connection->close();
?>