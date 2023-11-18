$(document).ready(function () {
    var productIdList = stringToList(sessionStorage.getItem("products"));

    $.ajax({
        url: 'get_products.php',
        type: 'POST',
        data: {"productIds": productIdList},
        dataType: 'json',
        success: function (data) {
            console.log(data);
            fillTable(data);
        },
        error: function errorLog(xhr, status, error) {
            console.log('Fehler beim Laden der Daten.', status, error);
        }
    });

    function fillTable(products) {
        var tableBody = $('#productTable tbody');
        var totalPrice = 0;

        for (var i = 0; i < products.length; i++) {
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

function submitOrder() {
    var productIds = stringToList(sessionStorage.getItem("products"));

    $.ajax({
        url: 'submit_order.php',
        type: 'POST',
        data: {"productIds": productIds},
        dataType: 'json',
        success: function (data) {
            console.log('Bestellung erfolgreich abgeschickt:', data);
            // Hier könntest du zusätzliche Aktionen nach dem Abschicken der Bestellung durchführen
        },
        error: function errorLog(xhr, status, error) {
            console.log('Fehler beim Abschicken der Bestellung:', status, error);
        }
    });

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
}
