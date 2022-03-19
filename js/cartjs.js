
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

// // function removeCartItem(img, name, price){
// //     let data = ''
// //     if(localStorage.getItem("cart")){
// //         data = localStorage.getItem("cart");
// //         data = JSON.parse(data);
// //         console.log(data);
// //         data.push({img, name, price})
// //     }else{
// //         data = [{img, name, price}]
// //     }

// //     localStorage.setItem("cart", JSON.stringify(data));
// // }

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

// // function deleteItemFromCart(pname){
// //     let cart1 = JSON.parse(localStorage.getItem('cart'));
// //     let newCart = cart1.filter((item)=> item.name != pname);
// //     localStorage.setItem('cart',JSON.stringify(newCart));
// //     updateCart();
    
// // }


// function remove(){
//     localStorage.clear();
// }

function add_to_cart(pname,pimg,price)
{
    let cart=localStorage.getItem("cart");
    if(cart==null)
    {
        let products=[];
        let product={prductName:pname,productImg:pimg,productQuantity:1,productPrice:price};
        products.push(product);
        localStorage.setItem("cart",JSON.stringify(products));
        console.log("product is added for the first time");

    }else
    {
        let pcart=JSON.parse(cart);

        let oldProduct=pcart.find((item)=> item.productName == pname);
        if(oldProduct)
        {
            oldProduct.productQuantity=oldProduct.productQuantity+1;
            pcart.map((item) => {
                if(item.productName === oldProduct.productName)
                {
                    item.productQuantity=oldProduct.productQuantity;
                }
            })
            localStorage.setItem("cart",JSON.stringify(pcart));
            console.log("product quantity is increased");
        }else
        {
            let product={prductName:pname,productImg:pimg,productQuantity:1,productPrice:price};
            pcart.push(product)
            localStorage.setItem("cart",JSON.stringify(pcart));
            console.log("product is added");

        }
    }
}