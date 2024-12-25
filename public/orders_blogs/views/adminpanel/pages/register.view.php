<style>
.section{
    min-height: 100vh;
}
.container {
    min-height: 100vh;
}
.card{
    min-width: 600px;
}
</style>
<section class="py-3 section d-flex justify-content-center align-items-center">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-lg-8 col-xl-6 offset-lg-2 offset-xl-3 d-flex justify-content-center align-items-center">
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
                        <form action="index.php?route=admin/register" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Username</label>
                                <input type="text" name="name" class="form-control" value="<?php echo !empty($_POST['name']) ? $_POST['name'] : "" ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo !empty($_POST['email']) ? $_POST['email'] : "" ?>" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" class="form-control" />
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="submit" class="btn btn-primary">Register</button>
                                <p class="ms-1 mb-0">
                                    Already have an account? <a href="index.php?route=admin/login">Click Here</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
