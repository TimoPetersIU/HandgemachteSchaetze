$(document).ready(function () {
    // Lese die Produkt-IDs aus der Session-Storage und konvertiere sie zu einer Liste
    var productIdList = stringToList(sessionStorage.getItem("products"));

    // AJAX-Anfrage, um Produktdaten für den Warenkorb zu erhalten
    $.ajax({
        url: '../php/get_products_for_shopping_cart.php',
        type: 'POST',
        data: {"productIds": productIdList},
        dataType: 'json',
        success: function (data) {
            console.log(data);
            // Fülle die Warenkorbtabelle mit den erhaltenen Produktdaten
            fillTable(data);
        },
        error: function errorLog(xhr, status, error) {
            console.log('Fehler beim Laden der Daten.', status, error);
        }
    });

    // Funktion zum Befüllen der Warenkorbtabelle mit Produktdaten
    function fillTable(products) {
        var tableBody = $('#productTable tbody');
        var totalPrice = 0;

        for (var i = 0; i < products.length; i++) {
            // Erstelle eine Tabellenzeile für jedes Produkt und füge sie zur Tabelle hinzu
            var row = '<tr><td>' + products[i].pname + '</td><td>' + formatPrice(products[i].price) +
                '</td><td><button onclick="removeFromProductsList(' + products[i].id + ')">Löschen</button></td></tr>';
            tableBody.append(row);

            // Addiere den Preis des aktuellen Produkts zum Gesamtpreis
            totalPrice += parseFloat(products[i].price);
        }

        // Zeige den Gesamtpreis am Ende der Tabelle an
        var totalRow = '<tr><td><b>Gesamtpreis</b></td><td><b>' + formatPrice(totalPrice.toFixed(2)) + '</b></td><td></td></tr>';
        tableBody.append(totalRow);
    }

    // Funktion zur Formatierung des Preises mit Euro-Symbol
    function formatPrice(price) {
        return price + ' €';
    }
});

// Funktion zum Abschicken der Bestellung
function submitOrder() {
    // Lese die Produkt-IDs aus der Session-Storage und konvertiere sie zu einer Liste
    var productIds = stringToList(sessionStorage.getItem("products"));

    // AJAX-Anfrage zum Abschicken der Bestellung
    $.ajax({
        url: '../php/submit_order.php',
        type: 'POST',
        data: {"productIds": productIds},
        dataType: 'json',
        success: function (data) {
            console.log('Bestellung erfolgreich abgeschickt:', data);
        },
        error: function errorLog(xhr, status, error) {
            console.log('Fehler beim Abschicken der Bestellung:', status, error);
        }
    });

    // Hilfsfunktion zur Konvertierung eines String in eine Liste von Zahlen
}

function stringToList(inputString) {
    // Entferne die eckigen Klammern und teile den String an den Kommas auf
    var numbersString = inputString.replace(/\[|\]/g, '');
    var numbersArray = numbersString.split(',');

    // Konvertiere die Strings zu Zahlen
    var numbersList = numbersArray.map(function (num) {
        return parseInt(num, 10);
    });

    return numbersList;
}
