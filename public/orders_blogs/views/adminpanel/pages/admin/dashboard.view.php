<section class="py-3">
    <div class="container">
        <div class="row gy-3">
            <div class="col-12">
                <h1>Dashboard</h1>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">
                            <?php echo count($users); ?>
                        </p>
                        <a href="#" class="btn btn-primary">Users</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Customers</h5>
                        <p class="card-text">
                            <?php echo count($customers); ?>
                        </p>
                        <a href="#" class="btn btn-primary">Customer</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Blogs</h5>
                        <p class="card-text">
                            <?php echo count($blogs); ?>
                        </p>
                        <a href="#" class="btn btn-primary">Blogs</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Orders</h5>
                        <p class="card-text">
                            <?php echo count($orders); ?>
                        </p>
                        <a href="#" class="btn btn-primary">Orders</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Products</h5>
                        <p class="card-text">
                            <?php echo count($products); ?>
                        </p>
                        <a href="#" class="btn btn-primary">Products</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
