<?php
require("connection.php");

// Annahme: $_POST['productIds'] enthält eine Liste von Produkt-IDs
$productIds = $_POST['productIds'];

// Füge eine Bestellung in die 'orders'-Tabelle ein
$sqlOrder = "INSERT INTO `orders` VALUES (null)";
if ($connection->query($sqlOrder) === TRUE) {
    $orderId = $connection->insert_id;

    // Füge Einträge in die 'order_position'-Tabelle ein
    foreach ($productIds as $productId) {
        // Annahme: Du hast eine Funktion, die den Preis für eine Produkt-ID aus der Datenbank abruft
        $price = getPriceForProduct($productId);

        // Füge den Eintrag in 'order_position' ein
        $sqlOrderPosition = "INSERT INTO `order_position` (`order_id`, `product_id`, `price`) VALUES ($orderId, $productId, $price)";
        $connection->query($sqlOrderPosition);
    }

    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $connection->error]);
}

// Schließe die Verbindung zur Datenbank
$connection->close();

// Annahme: Funktion zum Abrufen des Preises für eine Produkt-ID
function getPriceForProduct($productId) {

    $sqlProduct = "SELECT id, pname, price FROM products WHERE id = ($productId)";
    $result = $connection->query($sqlProduct);
    return $result["price"]; 
}
?>
