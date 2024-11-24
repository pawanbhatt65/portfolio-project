"use strict";

import { showModelHandler, closeModelHandler } from "./formChangeHandler.js";

document.addEventListener("DOMContentLoaded", () => {
    // body
    const body = document.body;
    // cart model variable
    const cartBackdrop = document.getElementById("cartBackdrop");
    const cartModel = document.getElementById("cartModel");
    const closeCartModelElm = document.getElementById("close-cart-model");
    const cartMainItemElm = document.querySelector(".cart-main-item");
    const totalItemElm = document.querySelector(".total-no-of-item");
    const totalPriceElm = document.querySelector(".total-price");

    const addToCartElm = document.querySelectorAll(".addToCart");
    const cartItemsElm = document.querySelector(".cartItems");
    const cartQuantityElm = document.querySelector(".cart-quantity");

    const url = "/api/products";

    if (addToCartElm) {
        let cart = [];
        if(cartMainItemElm) {
            cartMainItemElm.innerHTML = "No item added there yet!";
        }

        // cart item beg click function

        // fetch data function
        const fetchData = async function (url) {
            const response = await fetch(url);
            const data = await response.json();
            const products = data.products;
            // console.log(products)

            // render cart item
            const renderCartItem = function () {
                cartMainItemElm.innerHTML = "";
                cart.forEach((item) => {
                    // console.log(item)
                    cartMainItemElm.innerHTML += `
                        <div class="cart-main-box">
                            <div class="cart-img-box">
                                <img src="${item.image}" alt="${item.name}">
                            </div>
                            <div class="name-price">
                                <p>${item.name}</p>
                                <p>$${item.price}</p>
                            </div>
                            <div class="increment-decrement">
                                <button type="button" class="decrement" data-product-id="${item.product_id}">
                                    <i class="fa-solid fa-minus"></i>
                                </button>
                                <span>${item.numberOfUnites}</span>
                                <button type="button" class="increment" data-product-id="${item.product_id}">
                                    <i class="fa-solid fa-plus"></i>
                                </button>
                            </div>
                            <div class="cart-item-trash">
                                <button type="button" class="trash-btn" data-product-id="${item.product_id}">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </div>
                        </div>
                    `;
                });
            };

            // change number of units function handler
            const changeNumberOfUnitsHandler = function (action, id) {
                console.log(id);
                cart = cart.map((item) => {
                    let oldNumberOfUnits = item.numberOfUnites;
                    if (item.product_id === id) {
                        if (action === "minus" && oldNumberOfUnits > 1) {
                            oldNumberOfUnits--;
                        } else if (action === "plus") {
                            oldNumberOfUnits++;
                        }
                    }
                    return {
                        ...item,
                        numberOfUnites: oldNumberOfUnits,
                    };
                });
                updateCart();
            };

            // render subtotal item function
            const renderSubtotal = function () {
                let totalPrice = 0;
                let totalItems = 0;
                cart.forEach((item) => {
                    totalPrice += item.price * item.numberOfUnites;
                    totalItems += item.numberOfUnites;
                });
                totalItemElm.innerText = `${totalItems}`;
                totalPriceElm.innerText = `$${totalPrice}`;
                cartQuantityElm.innerText = `${totalItems}`;
            };

            // trash item handler function
            const trashItemHandler = function (id) {
                cart = cart.filter((item) => item.product_id !== id);
                updateCart();
                cartMainItemElm.innerHTML = "No item added there yet!";
            };

            const decrement_product = document.querySelectorAll(".decrement");
            const increment_product = document.querySelectorAll(".increment");
            const trash_btn_product = document.querySelectorAll(".trash-btn");
            if (decrement_product && increment_product && trash_btn_product) {
                decrement_product.forEach((btn) => {
                    btn.addEventListener("click", (event) => {
                        const product_decrement_id =
                            event.target.dataset.productId;
                        changeNumberOfUnitsHandler(
                            "minus",
                            product_decrement_id
                        );
                    });
                });
                increment_product.forEach((btn) => {
                    btn.addEventListener("click", (event) => {
                        const product_increment_id =
                            event.target.dataset.productId;
                        changeNumberOfUnitsHandler(
                            "plus",
                            product_increment_id
                        );
                    });
                });
                trash_btn_product.forEach((btn) => {
                    btn.addEventListener("click", () => {
                        const product_trash_btn_id =
                            document.querySelector(".trash-btn").dataset
                                .productId;
                        trashItemHandler(product_trash_btn_id);
                    });
                });
            }

            // add to cart function
            const addToCartFun = function (id) {
                // console.log("product is: ", id)
                const checkItem = cart.some((item) => item.product_id === id);
                // console.log("check item is: ", checkItem)
                if (checkItem) {
                    changeNumberOfUnitsHandler("plus", id);
                } else {
                    const items = products.find(
                        (item) => item.product_id == id
                    );
                    // console.log("products is: ", products)
                    // console.log("items is: ",items);
                    cart.push({
                        ...items,
                        numberOfUnites: 1,
                    });
                    // console.log(cart)
                    updateCart();
                }
            };

            // update cart function
            const updateCart = function () {
                renderCartItem();
                renderSubtotal();
            };

            addToCartElm.forEach((btn) => {
                const productId = btn.dataset.productId;
                btn.addEventListener("click", (event) => {
                    event.preventDefault();
                    addToCartFun(productId);
                });
            });
        };
        fetchData(url);

        // clicked cart bag
        if(cartItemsElm) {
            cartItemsElm.addEventListener("click", function (event) {
                event.preventDefault();
                showModelHandler(cartBackdrop, cartModel);
            });
            closeCartModelElm.addEventListener("click", function (event) {
                event.preventDefault();
                closeModelHandler(body, cartBackdrop, cartModel);
            });
            cartBackdrop.addEventListener("click", function (event) {
                event.preventDefault();
                closeModelHandler(body, cartBackdrop, cartModel);
            });
        }
    }
});
