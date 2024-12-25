<section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Homepage</h1>
                <div class="card">
                    <div class="card-body">
                        <form method="get" action="index.php" class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" name="search" value="<?php echo e($search); ?>" />
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <?php if (!empty($blogs)): ?>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Author Name</th>
                                        <th scope="col">Publish Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($blogs as $index => $blog): ?>
                                        <tr>
                                            <th scope="row">
                                                <?php echo (($currentPage - 1) * $limit) + $index + 1; ?>
                                            </th>
                                            <td>
                                                <a href="index.php?page=blog&title=<?php echo makeSlugFromTitle($blog->title); ?>&id=<?php echo e($blog->blog_id); ?>">
                                                    <?php echo e($blog->title); ?>
                                                </a>
                                            </td>
                                            <td><?php echo short_description($blog->description, 10); ?></td>
                                            <td><?php echo e($blog->username); ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($blog->added_at)); ?></td>
                                        </tr>
                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <!-- Previous Page -->
                                    <?php if ($currentPage > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="index.php?page=<?php echo $currentPage - 1; ?>&search=<?php echo urlencode($search); ?>" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item disabled">
                                            <a class="page-link" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                    <?php endif;?>

                                    <!-- Pagination Range start -->
                                    <?php
$range = 4; // Number of pages to show on each side of the current page
$start = max(1, $currentPage - $range);
$end = min($totalPages, $currentPage + $range);?>

                                    <?php if ($start > 1): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="index.php?page=1">1</a>
                                        </li>
                                        <?php if ($start > 2): ?>
                                            <li class="page-item disabled">
                                                <a class="page-link">...</a>
                                            </li>
                                        <?php endif;?>
                                    <?php endif;?>

                                    <?php for ($i = $start; $i <= $end; $i++): ?>
                                        <li class="page-item <?php echo $i === $currentPage ? 'active' : ''; ?>">
                                            <a class="page-link" href="index.php?page=<?php echo $i; ?>&search=<?php echo urlencode($search); ?>">
                                                <?php echo $i; ?>
                                            </a>
                                        </li>
                                    <?php endfor;?>

                                    <?php if ($end < $totalPages): ?>
                                        <?php if ($end < $totalPages - 1): ?>
                                            <li class="page-item disabled">
                                                <a class="page-link">...</a>
                                            </li>
                                        <?php else: ?>
                                            <li class="page-item">
                                                <a class="page-link" href="index.php?page=<?php echo $totalPages; ?>">
                                                    <?php echo $totalPages; ?>
                                                </a>
                                            </li>
                                        <?php endif;?>
                                    <?php endif;?>
                                    <!-- Pagination Range end -->

                                    <!-- Next Page -->
                                    <?php if ($currentPage < $totalPages): ?>
                                        <li class="page-item">
                                            <a class="page-link" href="index.php?page=<?php echo $currentPage + 1; ?>&search=<?php echo urlencode($search); ?>" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        <li class="page-item disabled">
                                            <a class="page-link" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    <?php endif;?>
                                </ul>
                            </nav>
                        <?php endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
