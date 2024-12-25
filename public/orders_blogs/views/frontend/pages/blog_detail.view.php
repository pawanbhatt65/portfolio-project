<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo e($data->title); ?></h5>
                        <p class="card-text"><?php echo e($data->description); ?></p>
                        <p class="card-text">Published date: <?php echo $data->added_at ? $data->added_at->format('d-m-Y') : ""; ?></p>
                        <p class="car-text">
                            Author Name: <span class="text-danger"><?php echo e($data->user->name); ?></span>
                        </p>
                        <div class="comment mt-2">
                            <h5>Comment</h5>
                            <form action="index.php?page=add-comment" method="post">
                                <input type="hidden" name="blog_id" value="<?php echo e($data->id); ?>">
                                <div class="mb-3">
                                    <label for="">Email</label>
                                    <input type="email" name="email" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label for="">Message</label>
                                    <textarea name="comment" class="form-control"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    Send
                                </button>
                            </form>
                        </div>
                        <?php if (!empty($data->comments)): ?>
                            <?php foreach ($data->comments as $comment): ?>
                                <div class="show-comment mt-4">
                                    <div class="user">
                                        <figure class="me-1">
                                            <img src="./assets/images/<?php echo rawurlencode('user.jpg'); ?>" alt="User" class="img-fluid">
                                        </figure>
                                        <span><?php echo $comment->email; ?></span>
                                    </div>
                                    <div class="message">
                                        <?php echo $comment->comment; ?>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
