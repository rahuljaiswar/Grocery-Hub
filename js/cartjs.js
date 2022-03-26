
// function addToCart(img, name, price){
//     let data = ''
//     if(localStorage.getItem("cart")){
//         data = localStorage.getItem("cart");
//         data = JSON.parse(data);
//         console.log(data);
//         data.push({img, name, price})
//     }else{
//         data = [{img, name, price}]
//     }

//     localStorage.setItem("cart", JSON.stringify(data));
// }

// function getItem(){
//    const data = localStorage.getItem("cart");
//     return JSON.parse(data);
// }

// function removeCartItem(img, name, price){
//     let data = ''
//     if(localStorage.getItem("cart")){
//         data = localStorage.getItem("cart");
//         data = JSON.parse(data);
//         console.log(data);
//         data.push({img, name, price})
//     }else{
//         data = [{img, name, price}]
//     }

//     localStorage.setItem("cart", JSON.stringify(data));
// }

// function updateCart(){
//     let cartString=localStorage.getItem('cart');
//     let cartNew=JSON.parse(cartString)
//     if(cartNew==null || cart.length==0)
//     {
//        $(".checkout-btn").addClass('disabled');
//     }else
//     {
//         console.log(cartNew)
//     }
// }

// function deleteItemFromCart(pname){
//     let cart1 = JSON.parse(localStorage.getItem('cart'));
//     let newCart = cart1.filter((item)=> item.name != pname);
//     localStorage.setItem('cart',JSON.stringify(newCart));
//     updateCart();
    
// }


// function remove(){
//     localStorage.clear();
// }

// function add_to_cart(pname,pimg,price)
// {
//     let cart=localStorage.getItem("cart");
//     if(cart==null)
//     {
//         let products=[];
//         let product={prductName:pname,productImg:pimg,productQuantity:1,productPrice:price};
//         products.push(product);
//         localStorage.setItem("cart",JSON.stringify(products));
//         console.log("product is added for the first time");

//     }else
//     {
//         let pcart=JSON.parse(cart);

//         let oldProduct=pcart.find((item)=> item.productName == pname);
//         if(oldProduct)
//         {
//             oldProduct.productQuantity=oldProduct.productQuantity+1;
//             pcart.map((item) => {
//                 if(item.productName === oldProduct.productName)
//                 {
//                     item.productQuantity=oldProduct.productQuantity;
//                 }
//             })
//             localStorage.setItem("cart",JSON.stringify(pcart));
//             console.log("product quantity is increased");
//         }else
//         {
//             let product={prductName:pname,productImg:pimg,productQuantity:1,productPrice:price};
//             pcart.push(product)
//             localStorage.setItem("cart",JSON.stringify(pcart));
//             console.log("product is added");

//         }
//     }
// }

// open cart modal
const cart = document.querySelector('#cart');
const cartModalOverlay = document.querySelector('.cart-modal-overlay');

cart.addEventListener('click', () => {
  if (cartModalOverlay.style.transform === 'translateX(-200%)'){
    cartModalOverlay.style.transform = 'translateX(0)';
  } else {
    cartModalOverlay.style.transform = 'translateX(-200%)';
  }
})
// end of open cart modal

// close cart modal
const closeBtn = document.querySelector ('#close-btn');

closeBtn.addEventListener('click', () => {
  cartModalOverlay.style.transform = 'translateX(-200%)';
});

cartModalOverlay.addEventListener('click', (e) => {
  if (e.target.classList.contains('cart-modal-overlay')){
    cartModalOverlay.style.transform = 'translateX(-200%)'
  }
})
// end of close cart modal

// add products to cart
const addToCart = document.getElementsByClassName('add-to-cart');
const productRow = document.getElementsByClassName('product-row');

for (var i = 0; i < addToCart.length; i++) {
  button = addToCart[i];
  button.addEventListener('click', addToCartClicked)
}

function addToCartClicked (event) {
  button = event.target;
  var cartItem = button.parentElement;
  var price = cartItem.getElementsByClassName('product-price')[0].innerText;
  
  var imageSrc = cartItem.getElementsByClassName('product-image')[0].src;
  addItemToCart (price, imageSrc);
  updateCartPrice()
}

function addItemToCart (price, imageSrc) {
  var productRow = document.createElement('div');
  productRow.classList.add('product-row');
  var productRows = document.getElementsByClassName('product-rows')[0];
  var cartImage = document.getElementsByClassName('cart-image');
  
  for (var i = 0; i < cartImage.length; i++){
    if (cartImage[i].src == imageSrc){
      alert ('This item has already been added to the cart')
      return;
    }
  }
  
  var cartRowItems = `
  <div class="product-row">
        <img class="cart-image" src="${imageSrc}" alt="">
        <span class ="cart-price">${price}</span>
        <input class="product-quantity" type="number" value="1">
        <button class="remove-btn">Remove</button>
        </div>
        
      `
  productRow.innerHTML = cartRowItems;
  productRows.append(productRow);
  productRow.getElementsByClassName('remove-btn')[0].addEventListener('click', removeItem)
  productRow.getElementsByClassName('product-quantity')[0].addEventListener('change', changeQuantity)
  updateCartPrice()
}
// end of add products to cart

// Remove products from cart
const removeBtn = document.getElementsByClassName('remove-btn');
for (var i = 0; i < removeBtn.length; i++) {
  button = removeBtn[i]
  button.addEventListener('click', removeItem)
}

function removeItem (event) {
  btnClicked = event.target
  btnClicked.parentElement.parentElement.remove()
  updateCartPrice()
}

// update quantity input
var quantityInput = document.getElementsByClassName('product-quantity')[0];

for (var i = 0; i < quantityInput; i++){
  input = quantityInput[i]
  input.addEventListener('change', changeQuantity)
}

function changeQuantity(event) {
  var input = event.target
  if (isNaN(input.value) || input.value <= 0){
    input.value = 1
  }
  updateCartPrice()
}
// end of update quantity input

// update total price
function updateCartPrice() {
  var total = 0
  for (var i = 0; i < productRow.length; i += 2) {
    cartRow = productRow[i]
  var priceElement = cartRow.getElementsByClassName('cart-price')[0]
  var quantityElement = cartRow.getElementsByClassName('product-quantity')[0]
  var price = parseFloat(priceElement.innerText.replace('$', ''))
  var quantity = quantityElement.value
  total = total + (price * quantity )
    
  }
  document.getElementsByClassName('total-price')[0].innerText =  '$' + total

document.getElementsByClassName('cart-quantity')[0].textContent = i /= 2
}
// end of update total price

// purchase items
const purchaseBtn = document.querySelector('.purchase-btn');

const closeCartModal = document.querySelector('.cart-modal');

purchaseBtn.addEventListener('click', purchaseBtnClicked)

function purchaseBtnClicked () {
  alert ('Thank you for your purchase');
  cartModalOverlay.style.transform= 'translateX(-100%)'
 var cartItems = document.getElementsByClassName('product-rows')[0]
 while (cartItems.hasChildNodes()) {
   cartItems.removeChild(cartItems.firstChild)
   
 }
  updateCartPrice()
}
// end of purchase items

//alert user if cart is empty 

