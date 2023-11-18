function updateProductsList(newProductsList)  {
    sessionStorage.setItem('products', JSON.stringify(newProductsList));
}

function getProductsList() {
    var productsList = sessionStorage.getItem('products');

        if (productsList) {
            return JSON.parse(productsList);
        } else {
            return [];
        }
}

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

function removeFromProductsList(productId) {
    var currentProductsList = getProductsList();

    var index = currentProductsList.indexOf(productId);

    if (index !== -1) {
        currentProductsList.splice(index, 1);

        updateProductsList(currentProductsList);
        location.reload();
        console.log('Produkt wurde aus der Liste entfernt.');
    } else {
        console.log('Produkt ist nicht in der Liste.');
    }

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

var currentList = getProductsList();
console.log('Aktuelle Liste:', currentList);


var updatedList = getProductsList();
console.log('Aktualisierte Liste:', updatedList);
