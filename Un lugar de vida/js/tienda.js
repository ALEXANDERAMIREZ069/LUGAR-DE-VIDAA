const addToShoppingCartButtons = document.querySelectorAll('.addToCart'); //el elemento que "querySelectorAll" funciona para selecionar el contenido cunado tenga el nombre de la clase
addToShoppingCartButtons.forEach((addToCartButton) => { //el elemnto "forEach" funciona para que cada elemento tenga una actividad distinta y se pone el nombre del elemento a crear
    addToCartButton.addEventListener('click', addToCartClicked); // que cada ves que se haga click se mandara a llamar a la funcion seleccionada 
});

const comprarButton = document.querySelector('.comprarButton');
comprarButton.addEventListener('click', comprarButtonClicked);

const shoppingCartItemsContainer = document.querySelector(
    '.shoppingCartItemsContainer'
); //cracion de la varible de donde aparecera el contenido agragado

function addToCartClicked(event) { //cracion de la funcion de recuperacion de datos
    const button = event.target; //captura el boton
    const item = button.closest('.item'); //trae todo los elementos de la clase item 

    const itemTitle = item.querySelector('.item-title').textContent; //se recupera cada uno por separado 
    const itemPrice = item.querySelector('.item-price').textContent;
    const itemImage = item.querySelector('.item-image').src;

    addItemToShoppingCart(itemTitle, itemPrice, itemImage); //llamado de la otra funcion pasando tres pametros que son las variables que recuperamos
}

function addItemToShoppingCart(itemTitle, itemPrice, itemImage) { //crecion de la funcion contres variables 
    const elementsTitle = shoppingCartItemsContainer.getElementsByClassName(
        'shoppingCartItemTitle'
    );
    for (let i = 0; i < elementsTitle.length; i++) {
        if (elementsTitle[i].innerText === itemTitle) {
            let elementQuantity = elementsTitle[
                i
            ].parentElement.parentElement.parentElement.querySelector(
                '.shoppingCartItemQuantity'
            );
            elementQuantity.value++;
            $('.toast').toast('show');
            updateShoppingCartTotal();
            return;
        }
    }

    const shoppingCartRow = document.createElement('div'); //se colocara en un div el contenido 
    const shoppingCartContent = ` 
  <div class="row shoppingCartItem">
        <div class="col-6">
            <div class="shopping-cart-item d-flex align-items-center h-100 border-bottom pb-2 pt-3">
                <img src=${itemImage} class="shopping-cart-image">
                <h6 class="shopping-cart-item-title shoppingCartItemTitle text-truncate ml-3 mb-0">${itemTitle}</h6>
            </div>
        </div>
        <div class="col-2">
            <div class="shopping-cart-price d-flex align-items-center h-100 border-bottom pb-2 pt-3">
                <p class="item-price mb-0 shoppingCartItemPrice">${itemPrice}</p>
            </div>
        </div>
        <div class="col-4">
            <div
                class="shopping-cart-quantity d-flex justify-content-between align-items-center h-100 border-bottom pb-2 pt-3">
                <input class="shopping-cart-quantity-input shoppingCartItemQuantity" type="number"
                    value="1">
                <button class="btn btn-danger buttonDelete" type="button">X</button>
            </div>
        </div>
    </div>`; //donde se encotrara la informacion
    shoppingCartRow.innerHTML = shoppingCartContent; //colacar donde
    shoppingCartItemsContainer.append(shoppingCartRow); //

    shoppingCartRow
        .querySelector('.buttonDelete')
        .addEventListener('click', removeShoppingCartItem);

    shoppingCartRow
        .querySelector('.shoppingCartItemQuantity')
        .addEventListener('change', quantityChanged);

    updateShoppingCartTotal();
}

function updateShoppingCartTotal() {
    let total = 0;
    const shoppingCartTotal = document.querySelector('.shoppingCartTotal');

    const shoppingCartItems = document.querySelectorAll('.shoppingCartItem');

    shoppingCartItems.forEach((shoppingCartItem) => {
        const shoppingCartItemPriceElement = shoppingCartItem.querySelector(
            '.shoppingCartItemPrice'
        );
        const shoppingCartItemPrice = Number(
            shoppingCartItemPriceElement.textContent.replace('€', '')
        );
        const shoppingCartItemQuantityElement = shoppingCartItem.querySelector(
            '.shoppingCartItemQuantity'
        );
        const shoppingCartItemQuantity = Number(
            shoppingCartItemQuantityElement.value
        );
        total = total + shoppingCartItemPrice * shoppingCartItemQuantity;
    });
    shoppingCartTotal.innerHTML = `${total.toFixed(2)}€`;
}

function removeShoppingCartItem(event) {
    const buttonClicked = event.target;
    buttonClicked.closest('.shoppingCartItem').remove();
    updateShoppingCartTotal();
}

function quantityChanged(event) {
    const input = event.target;
    input.value <= 0 ? (input.value = 1) : null;
    updateShoppingCartTotal();
}

function comprarButtonClicked() {
    shoppingCartItemsContainer.innerHTML = '';
    updateShoppingCartTotal();
}


//ventan del carrito de ventas 
var abrir = document.getElementById('abrir'),
    overlay = document.getElementById('overlay'),
    ventana = document.getElementById('ventana'),
    cerrar = document.getElementById('cerrar');

abrir.addEventListener('click', function() {
    overlay.classList.add('active');
    ventana.classList.add('active');
});

cerrar.addEventListener('click', function(e) {
    e.preventDefault();
    overlay.classList.remove('active');
    ventana.classList.remove('active');
});