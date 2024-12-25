<nav class="navbar navbar-expand-lg bg-secondary">
    <div class="container">
        <a class="navbar-brand" href="index.php">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=orders">Orders</a>
                </li>
                <?php if($is_logged_in): ?>
                <li class="nav-item">
                    <a href="index.php?page=user/dashboard" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?page=user/create-blog" class="nav-link">Create</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=user/logout">Logout</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?page=login">Login</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
