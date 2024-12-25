<section class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Dashboard</h1>
                <div class="card">
                    <div class="card-body">
                        <?php if (!empty($blogs)): ?>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Published At</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($blogs as $index => $blog): ?>
                                        <tr>
                                            <th scope="row"><?php echo $index + 1; ?></th>
                                            <td>
                                                <a href="index.php?page=blog&title=<?php echo makeSlugFromTitle($blog['title']); ?>&id=<?php echo e($blog['id']); ?>">
                                                    <?php echo e($blog['title']); ?>
                                                </a>
                                            </td>
                                            <td><?php echo date('d-m-Y H:i', strtotime($blog['added_at'])); ?></td>
                                            <td>
                                                <a href="index.php?page=user/blog/edit&title=<?php echo makeSlugFromTitle($blog['title']); ?>&id=<?php echo $blog['id']; ?>" class="btn btn-secondary btn-sm">
                                                    Edit
                                                </a>
                                                <form action="index.php?page=user/blog/delete" method="post" class="d-inline">
                                                    <input type="hidden" name="id" value="<?php echo $blog['id']; ?>">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Delete
                                                    </button>
                                                </form>
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
