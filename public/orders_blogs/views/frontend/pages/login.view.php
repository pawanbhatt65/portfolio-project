<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 col-xl-6 offset-lg-2 offset-xl-3">
                <div class="card">
                    <div class="card-body">
                        <?php if (!empty($errors)): ?>
                            <?php // var_dump($errors);?>
                            <ul>
                                <?php foreach ($errors as $index => $error): ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach;?>
                            </ul>
                        <?php endif;?>
                        <form action="index.php?page=login" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <p class="ms-1 mb-0">
                                    Register first? <a href="index.php?page=register">Click Here</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
