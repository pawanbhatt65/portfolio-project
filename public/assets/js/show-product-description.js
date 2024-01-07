"use strict";

import {
    closeModelHandler,
    generateLoggedUserModelBox,
    generateModelBox,
    showModelHandler,
} from "./formChangeHandler.js";

document.addEventListener("DOMContentLoaded", () => {
    // body
    const body = document.body;

    const clickedProductDescription = document.querySelectorAll(
        ".clickedProductDescription"
    );
    const showProductDescriptionModelBackdrop = document.querySelector(
        ".show-product-description-model-backdrop"
    );
    const showProductDescriptionModelBox = document.querySelector(
        ".show-product-description-model-box"
    );
    const closeShowProductDescriptionModelHandler = document.querySelectorAll(
        ".closeShowProductDescriptionModelHandler"
    );
    const mainContentBox = document.getElementById("mainContentBox");

    // loggedUserProductDescription model
    const clickedLoggedUserProductDescription=document.querySelectorAll(".clickedLoggedUserProductDescription");

    if (clickedProductDescription) {
        mainContentBox.innerHTML = "";
        clickedProductDescription.forEach((btn) => {
            btn.addEventListener("click", function () {
                showModelHandler(
                    showProductDescriptionModelBackdrop,
                    showProductDescriptionModelBox
                );

                // show-clicked-product, product id
                let getProductId = btn.dataset.productId;
                // console.log(getProductId)
                // show model content url
                const modelContentURL = `/show-product-content?product_id=${getProductId}`;
                // console.log(modelContentURL)
                // show model content: Define an async function to handle the asynchronous operation
                const loadModelContent = async () => {
                    try {
                        const modelContentInnerHTML = await generateModelBox(
                            modelContentURL
                        );
                        // console.log(modelContentInnerHTML);
                        mainContentBox.innerHTML = modelContentInnerHTML;
                    } catch (error) {
                        console.error("Error loading model content:", error);
                    }
                };
                // Call the async function
                loadModelContent();
            });
            closeShowProductDescriptionModelHandler.forEach((closeBtn) => {
                closeBtn.addEventListener("click", () => {
                    closeModelHandler(
                        body,
                        showProductDescriptionModelBackdrop,
                        showProductDescriptionModelBox
                    );
                });
            });
        });
    }

    // show logged user product description functionality
    if(clickedLoggedUserProductDescription) {
        mainContentBox.innerHTML="";
        clickedLoggedUserProductDescription.forEach(btn=>{
            btn.addEventListener("click", event=>{
                event.preventDefault();
                showModelHandler(
                    showProductDescriptionModelBackdrop,
                    showProductDescriptionModelBox
                );

                let getProductId=btn.dataset.productId;
                const url=`/user/loggedUserShowProductContent?product_id=${getProductId}`;
                const loadLoggedUserModelContent=async () => {
                    try{
                        let loggedUserModelData=await generateLoggedUserModelBox(url);
                        mainContentBox.innerHTML=loggedUserModelData;
                    } catch(error) {
                        console.error("Model content loading error is: ", error)
                    }
                }
                loadLoggedUserModelContent();
            })

            closeShowProductDescriptionModelHandler.forEach((closeBtn) => {
                closeBtn.addEventListener("click", () => {
                    closeModelHandler(
                        body,
                        showProductDescriptionModelBackdrop,
                        showProductDescriptionModelBox
                    );
                });
            });
        })
    }
});
