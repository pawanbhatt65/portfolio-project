"use strict";

document.addEventListener("DOMContentLoaded", function () {
    const orderCreateForm_elm = document.orderCreateForm;

    if (orderCreateForm_elm) {
        const product_container_elm = orderCreateForm_elm.querySelector(
            "#products-container"
        );
        const addProduct_elm =
            orderCreateForm_elm.querySelector("#add-product");
        const removeProduct_elm =
            orderCreateForm_elm.querySelector("#remove-product");
        const grandTotal_elm =
            orderCreateForm_elm.querySelector("#grand-total");

        let productIndex = 1;
        // click add product button added a new component
        addProduct_elm.addEventListener("click", (event) => {
            const new_div = document.createElement("div");
            new_div.classList.add("exists-item", "product-item");

            new_div.innerHTML = `
                <div class="mb-3">
                    <label for="" class="form-label">Product Name</label>
                    <input type="text" name="products[${productIndex}][name]" class="form-control" />
                </div>
                <div class="qun-am-group">
                    <div class="mb-3 qun-am">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" name="products[${productIndex}][quantity]"
                            class="form-control quantity" />
                    </div>
                    <div class="mb-3 qun-am">
                        <label for="" class="form-label">Amount</label>
                        <input type="number" name="products[${productIndex}][amount]"
                            class="form-control amount" />
                    </div>
                    <div class="mb-3 qun-am">
                        <label for="" class="form-label">Total</label>
                        <input type="number" name="products[${productIndex}][total]" class="form-control total"
                            value="0" readonly />
                    </div>
                </div>
            `;

            product_container_elm.append(new_div);
            productIndex++;
            updateGrandTotal();
        });

        // click remove product button and remove a last added component
        removeProduct_elm.addEventListener("click", (event) => {
            const productItems_elm = document.querySelectorAll(".product-item");
            if (productItems_elm.length > 1) {
                productItems_elm[productItems_elm.length - 1].remove();
                updateGrandTotal();
            }
        });

        // update total value when changed the amount and quantity
        product_container_elm.addEventListener("input", (event) => {
            if (
                event.target.classList.contains("quantity") ||
                event.target.classList.contains("amount")
            ) {
                const quan_group = event.target.closest(".qun-am-group");
                const quantity =
                    quan_group.querySelector(".quantity").value || 0;
                const amount = quan_group.querySelector(".amount").value || 0;
                const total = quan_group.querySelector(".total");
                total.value = quantity * amount;
                updateGrandTotal();
            }
        });

        function updateGrandTotal() {
            const total_input=product_container_elm.querySelectorAll(".total");
            let g=0;
            total_input.forEach(input=>{
                const total_value=parseFloat(input.value)||0;
                g += total_value;
            })
            grandTotal_elm.textContent=g.toFixed(2);
        }

        orderCreateForm_elm.addEventListener("submit", async function (event) {
            // event.preventDefault();
        });
    }
});
