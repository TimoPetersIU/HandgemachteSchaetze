function updateProductsList(newProductsList) {
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
        console.log('Produkt wurde aus der Liste entfernt.');
    } else {
        console.log('Produkt ist nicht in der Liste.');
    }
}

var currentList = getProductsList();
console.log('Aktuelle Liste:', currentList);

removeFromProductsList(2);

var updatedList = getProductsList();
console.log('Aktualisierte Liste:', updatedList);
