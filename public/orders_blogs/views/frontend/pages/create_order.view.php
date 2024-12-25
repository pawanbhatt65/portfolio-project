<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6 offset-lg-2 offset-xl-3">
                <div class="card">
                    <div class="card-body">
                        <form action="index.php?page=create-order" method="POST" name="orderCreateForm">
                            <div class="mb-3">
                                <label for="" class="form-label">Customer Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Customer Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div id="products-container">
                                <div class="exists-item product-item">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Product Name</label>
                                        <input type="text" name="products[0][name]" class="form-control" />
                                    </div>
                                    <div class="qun-am-group">
                                        <div class="mb-3 qun-am">
                                            <label for="" class="form-label">Quantity</label>
                                            <input type="number" name="products[0][quantity]"
                                                class="form-control quantity" />
                                        </div>
                                        <div class="mb-3 qun-am">
                                            <label for="" class="form-label">Amount</label>
                                            <input type="number" name="products[0][amount]"
                                                class="form-control amount" />
                                        </div>
                                        <div class="mb-3 qun-am">
                                            <label for="" class="form-label">Total</label>
                                            <input type="number" name="products[0][total]" class="form-control total"
                                                value="0" readonly />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 add-remove">
                                <button type="button" id="add-product" class="btn btn-primary btn-sm">Add</button>
                                <button type="button" id="remove-product" class="btn btn-danger btn-sm">Remove</button>
                            </div>
                            <div class="mb-3">
                                <p>Grand Total: <span id="grand-total">0</span></p>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
