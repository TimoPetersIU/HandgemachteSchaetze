<?php
// Einbinden der Datei mit der Datenbankverbindung
require("connection.php");

// Abrufen der Produkt-IDs aus dem POST-Array
$productIds = $_POST['productIds'];

// SQL-Abfrage zum Erstellen einer neuen Bestellung in der 'orders'-Tabelle
$sqlOrder = "INSERT INTO `orders` VALUES (null)";

// Überprüfen, ob die Bestellung erfolgreich erstellt wurde
if ($connection->query($sqlOrder) === TRUE) {
    // Abrufen der ID der neu erstellten Bestellung
    $orderId = $connection->insert_id;

    // Durchlaufen der Produkt-IDs und Hinzufügen der Bestellpositionen
    foreach ($productIds as $productId) {
        // Abrufen des Preises für das aktuelle Produkt
        $price = getPriceForProduct($productId);

        // SQL-Abfrage zum Hinzufügen einer Position zur 'order_position'-Tabelle
        $sqlOrderPosition = "INSERT INTO `order_position` (`order_id`, `product_id`, `price`) VALUES ($orderId, $productId, $price)";

        // Ausführen der SQL-Abfrage
        $connection->query($sqlOrderPosition);
    }

    // Ausgabe einer Erfolgsmeldung im JSON-Format
    echo json_encode(['success' => true]);
} else {
    // Ausgabe einer Fehlermeldung im JSON-Format, falls die Bestellung nicht erstellt werden konnte
    echo json_encode(['success' => false, 'error' => $connection->error]);
}

// Schließen der Datenbankverbindung
$connection->close();

// Funktion zum Abrufen des Preises für ein bestimmtes Produkt
function getPriceForProduct($productId) {
    // SQL-Abfrage zum Abrufen von Produktinformationen, insbesondere des Preises
    $sqlProduct = "SELECT id, pname, price FROM products WHERE id = ($productId)";
    $result = $connection->query($sqlProduct);

    // Rückgabe des Preises des Produkts
    return $result["price"];
}
?>
