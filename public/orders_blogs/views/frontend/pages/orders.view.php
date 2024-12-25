<section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-end my-3">
                                <a href="index.php?page=create-order" class="btn btn-primary btn-sm">
                                    Create Order
                                </a>
                            </div>
                            <?php if (!empty($orders)): ?>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Created</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orders as $index => $order): ?>
                                            <tr>
                                                <th scope="row">
                                                    <?php echo $index + 1; ?>
                                                </th>
                                                <td><?php echo $order['customer_name']; ?></td>
                                                <td>
                                                    <?php echo e($order['total']); ?>
                                                </td>
                                                <td><?php echo date('d-m-Y H:i:s', strtotime($order['created_at'])); ?></td>
                                                <td>
                                                    <a href="index.php?page=order-detail&id=<?php echo $order['order_id']; ?>" class="btn btn-secondary btn-sm">
                                                        View
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach;?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
