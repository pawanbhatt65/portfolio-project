<section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 col-xl-6 offset-lg-2 offset-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h1>Order Details</h1>
                            <div class="card mb-3">
                                <div class="card-body">
                                    <h5 class="card-title">Order ID: <?php echo e($order->id); ?></h5>
                                    <p class="card-text">Customer Name: <?php echo e($order->customer->name); ?></p>
                                    <p class="card-text">Customer Email: <?php echo e($order->customer->email); ?></p>
                                    <p class="card-text">Grand Total: <?php echo e($order->total); ?></p>
                                    <p class="card-text">Created At: <?php echo $order->created_at ? $order->created_at->format('d-m-Y H:iS') : ''; ?></p>
                                </div>
                            </div>

                            <?php if (!empty($order->products)): ?>
                            <h2>Products</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Amount</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($order->products as $index => $product): ?>
                                        <tr>
                                            <td><?php echo e($index + 1); ?></td>
                                            <td><?php echo e($product->name); ?></td>
                                            <td><?php echo e($product->quantity); ?></td>
                                            <td><?php echo e($product->amount); ?></td>
                                            <td><?php echo e($product->quantity * $product->amount); ?></td>
                                        </tr>
                                    <?php endforeach;?>
                                </tbody>
                                <?php endif;?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
