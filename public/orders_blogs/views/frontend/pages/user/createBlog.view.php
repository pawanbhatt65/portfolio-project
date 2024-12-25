<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Create Blog</h1>
                <div class="card">
                    <?php if (!empty($errors)): ?>
                        <?php foreach ($errors as $error): ?>
                            <div class="alert alert-danger alert-dismissible fade show my-3" role="alert">
                                <?php echo e($error); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endforeach;?>
                    <?php endif;?>
                    <div class="card-body">
                        <form action="index.php?page=user/create-blog" method="post">
                            <div class="mb-3">
                                <label for="" class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" value="<?php echo !empty($_POST['title']) ? e($_POST['title']) : '' ?>">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Description</label>
                                <textarea name="description" class="form-control"><?php echo !empty($_POST['description']) ? e($_POST['description']) : '' ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
