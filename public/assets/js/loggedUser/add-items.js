"use strict";
import {
    itemNameChangeHandler,
    subjectChangeHandler,
    imageChangeHandler,
    preventFormSubmitHandler,
    itemPriceChangeHandler,
    validFileType,
} from "../formChangeHandler.js";

document.addEventListener("DOMContentLoaded", function () {
    // body
    const body = document.body;
    // add-items.blade.php variable
    const addItemForm = document.addItemForm;
    const itemName = document.getElementById("itemName");
    let itemNameError = document.getElementById("itemNameError");
    const itemPrice = document.getElementById("itemPrice");
    let itemPriceError = document.getElementById("itemPriceError");
    const itemImage = document.getElementById("itemImage");
    let itemImageError = document.getElementById("itemImageError");
    const itemDescription = document.getElementById("itemDescription");
    let itemDescriptionError = document.getElementById("itemDescriptionError");

    // edit-items.blade.php variable
    const editItemForm=document.editItemForm;
    const editItemName=document.getElementById("editItemName");
    let editItemNameError=document.getElementById("editItemNameError");
    const editItemPrice=document.getElementById("editItemPrice");
    let editItemPriceError=document.getElementById("editItemPriceError");
    const editItemImage=document.getElementById("editItemImage");
    let editItemImageError=document.getElementById("editItemImageError");
    const editItemDescription=document.getElementById("editItemDescription");
    let editItemDescriptionError=document.getElementById("editItemDescriptionError");

    if (addItemForm) {
        // validFileType function
        itemImage.addEventListener("change", function() {
            validFileType(itemImage)
        })

        itemName.addEventListener(
            "keyup",
            itemNameChangeHandler.bind(itemNameError),
            { passive: false }
        );
        itemPrice.addEventListener(
            "keyup",itemPriceChangeHandler.bind(itemPriceError),{ passive: false }
        );
        itemImage.addEventListener(
            "change",
            imageChangeHandler.bind(itemImageError),
            { passive: false }
        );
        itemDescription.addEventListener(
            "keyup",
            function (event) {
                subjectChangeHandler.call(
                    itemDescriptionError,
                    null,
                    event,
                    "Please enter your product description!"
                );
            },
            { passive: false }
        );

        addItemForm.addEventListener("submit", (event) => {
            const itemName = addItemForm.itemName;
            const itemPrice = addItemForm.itemPrice;
            const itemImage = addItemForm.itemImage;
            const itemDescription = addItemForm.itemDescription;

            if (itemName.value.trim().length === 0) {
                preventFormSubmitHandler(
                    itemName,
                    (itemNameError.textContent =
                        "Please enter your product name!"),
                    event
                );
                return false;
            } else if (itemNameError.textContent) {
                preventFormSubmitHandler(
                    itemName,
                    (itemNameError.textContent =
                        "Please enter valid product name!"),
                    event
                );
                return false;
            } else if (itemPrice.value.trim().length === 0) {
                preventFormSubmitHandler(
                    itemPrice,
                    (itemPriceError.textContent =
                        "Please enter your product price!"),
                    event
                );
                return false;
            } else if (itemPriceError.textContent) {
                preventFormSubmitHandler(
                    itemPrice,
                    (itemPriceError.textContent =
                        "Please enter valid product price!"),
                    event
                );
                return false;
            } else if (itemImage.value === "") {
                preventFormSubmitHandler(
                    itemImage,
                    (itemImageError.textContent =
                        "Please select your product image!"),
                    event
                );
                return false;
            } else if (itemImageError.textContent) {
                preventFormSubmitHandler(
                    itemImage,
                    (itemImageError.textContent =
                        "Please select valid product image!"),
                    event
                );
                return false;
            } else if (itemDescription.value.trim().length === 0) {
                preventFormSubmitHandler(
                    itemDescription,
                    (itemDescriptionError.textContent =
                        "Please enter your product description!"),
                    event
                );
                return false;
            } else if (itemDescriptionError.textContent) {
                preventFormSubmitHandler(
                    itemDescription,
                    (itemDescriptionError.textContent =
                        "Please enter valid product description!"),
                    event
                );
                return false;
            } else {
                return true;
            }
        });
    }

    if(editItemForm){
        editItemName.addEventListener("keyup", itemNameChangeHandler.bind(editItemNameError), {passive: false})
        editItemPrice.addEventListener("keyup", itemPriceChangeHandler.bind(editItemPriceError), {passive: false})
        editItemImage.addEventListener("change", imageChangeHandler.bind(editItemImageError), {passive: false})
        editItemDescription.addEventListener("keyup", function(event) {
            subjectChangeHandler.call(editItemDescriptionError, null, event, "Please enter your product description!");
        }, {passive: false});

        editItemImage.addEventListener("change", function() {
            validFileType(editItemImage)
        })

        editItemForm.addEventListener("submit", function(event) {
            const itemName = editItemForm.itemName;
            const itemPrice = editItemForm.itemPrice;
            const itemImage = editItemForm.itemImage;
            const itemDescription = editItemForm.itemDescription;

            if (itemName.value.trim().length === 0) {
                preventFormSubmitHandler(
                    itemName,
                    (editItemNameError.textContent =
                        "Please enter your product name!"),
                    event
                );
                return false;
            } else if (editItemDescriptionError.textContent){
                preventFormSubmitHandler(
                    itemName,
                    (editItemNameError.textContent =
                        "Please enter valid product name!"),
                    event
                );
                return false;
            } else if (itemPrice.value.trim().length === 0) {
                preventFormSubmitHandler(
                    itemPrice,
                    (editItemPriceError.textContent =
                        "Please enter your product price!"),
                    event
                );
                return false;
            } else if (editItemPriceError.textContent) {
                preventFormSubmitHandler(
                    itemPrice,
                    (editItemPriceError.textContent =
                        "Please enter valid product price!"),
                    event
                );
                return false;
            } else if (itemImage.value === "") {
                preventFormSubmitHandler(
                    itemImage,
                    (editItemImageError.textContent =
                        "Please select your product image!"),
                    event
                );
                return false;
            } else if (editItemImageError.textContent) {
                preventFormSubmitHandler(
                    itemImage,
                    (editItemImageError.textContent =
                        "Please select valid product image!"),
                    event
                );
                return false;
            } else if (itemDescription.value.trim().length === 0) {
                preventFormSubmitHandler(
                    itemDescription,
                    (editItemDescriptionError.textContent =
                        "Please enter your product description!"),
                    event
                );
                return false;
            } else if (editItemDescriptionError.textContent) {
                preventFormSubmitHandler(
                    itemDescription,
                    (editItemDescriptionError.textContent =
                        "Please enter valid product description!"),
                    event
                );
                return false;
            } else {
                return true;
            }
        })
    }
});
