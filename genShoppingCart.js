$(document).ready(function () {
    var ids = [1, 2, 3];

    $.ajax({
        url: 'get_products.php',
        type: 'POST',
        data: {"ids": ids},
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

        for (var i = 0; i < products.length; i++) {
            var row = '<tr><td>' + products[i].productname + '</td><td>' + products[i].price + '</td></tr>';
            tableBody.append(row);
        }
    }
})
;
