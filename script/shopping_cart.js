// ======================================================================Timo Peters===================================================================================================>>

// Funktion zum Aktualisieren der Produktliste in der Session-Storage
function updateProductsList(newProductsList)  {
    sessionStorage.setItem('products', JSON.stringify(newProductsList));
}

// Funktion zum Abrufen der aktuellen Produkliste aus der Session-Storage
function getProductsList() {
    var productsList = sessionStorage.getItem('products');

    if (productsList) {
        return JSON.parse(productsList);
    } else {
        return [];
    }
}

// Funktion zum Hinzufügen einer Produkt-ID zur Produktliste
function addToProductsList(productId) {
    var currentProductsList = getProductsList();
    if (!currentProductsList.includes(productId)) {
        currentProductsList.push(productId);

        updateProductsList(currentProductsList);
        console.log('Produkt wurde zur Liste hinzugefügt.');
    } else {
        console.log('Produkt ist bereits in der Liste.');
    }
}

// Funktion zum Entfernen einer Produkt-ID aus der Produktliste
function removeFromProductsList(productId) {
    var currentProductsList = getProductsList();

    var index = currentProductsList.indexOf(productId);

    if (index !== -1) {
        currentProductsList.splice(index, 1);

        updateProductsList(currentProductsList);
        location.reload(); // Seite aktualisieren, um die Änderungen im Warenkorb anzuzeigen
        console.log('Produkt wurde aus der Liste entfernt.');
    } else {
        console.log('Produkt ist nicht in der Liste.');
    }
}

// Beispielhafte Verwendung: Aktuelle und aktualisierte Produktliste ausgeben
var currentList = getProductsList();
console.log('Aktuelle Liste:', currentList);

var updatedList = getProductsList();
console.log('Aktualisierte Liste:', updatedList);

// ================================================================================================================================