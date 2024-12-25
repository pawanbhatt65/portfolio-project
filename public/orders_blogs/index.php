<?php

require __DIR__ . '/inc/all.inc.php';
date_default_timezone_set('Asia/Kolkata');

$container = new \App\Support\Container;
// bind pdo
$container->bind("pdo", function () {
    return require __DIR__ . '/inc/db-config.php';
});
// bind homeRepository for homepage logic
$container->bind("homeRepository", function () use ($container) {
    $homeRepository = $container->get("pdo");
    return new \App\Frontend\Repository\HomeRepository($homeRepository);
});
// bind homeController for view homepage
$container->bind("homeController", function () use ($container) {
    $homeController = $container->get("homeRepository");
    $authRepository = $container->get("authRepository");
    return new \App\Frontend\Controllers\HomeController($homeController, $authRepository);
});
// bind orderRepository for about us page logic
$container->bind("orderRepository", function () use ($container) {
    $orderRepository = $container->get("pdo");
    return new \App\Frontend\Repository\OrderRepository($orderRepository);
});
// bind orderController for about us page view
$container->bind("orderController", function () use ($container) {
    $orderController = $container->get("orderRepository");
    $authRepository = $container->get("authRepository");
    return new \App\Frontend\Controllers\OrderController($orderController, $authRepository);
});
// bind blogRepository for blog detail page logic
$container->bind("blogRepository", function () use ($container) {
    $blogRepository = $container->get("pdo");
    return new \App\Frontend\Repository\BlogRepository($blogRepository);
});
// bind blogContainer for blog detail page view
$container->bind("blogController", function () use ($container) {
    $blogController = $container->get("blogRepository");
    $authRepository = $container->get("authRepository");
    return new \App\Frontend\Controllers\BlogController($blogController, $authRepository);
});
// bind authRepository
$container->bind("authRepository", function () use ($container) {
    $authRepository = $container->get("pdo");
    return new \App\Frontend\Repository\Auth\AuthRepository($authRepository);
});
// bind authController
$container->bind("authController", function () use ($container) {
    $authController = $container->get("authRepository");
    return new \App\Frontend\Controllers\Auth\AuthController($authController);
});
// bind userRepository
$container->bind("userRepository", function () use ($container) {
    $userRepository = $container->get("pdo");
    return new \App\Frontend\Repository\User\UserRepository($userRepository);
});
// bind userController
$container->bind("userController", function () use ($container) {
    $userController = $container->get("userRepository");
    $authRepository = $container->get("authRepository");
    return new \App\Frontend\Controllers\User\UserController($userController, $authRepository);
});

/**
 * binding for admin panel start
 */
// bind adminAuthRepository
$container->bind("adminAuthRepository", function () use ($container) {
    $adminAuthRepository = $container->get("pdo");
    return new \App\Admin\Repository\AdminAuthRepository\AdminAuthRepository($adminAuthRepository);
});
// bind adminAuthController
$container->bind('adminAuthController', function () use ($container) {
    $adminAuthController = $container->get("adminAuthRepository");
    return new \App\Admin\Controllers\AdminAuthController\AdminAuthController($adminAuthController);
});
// bind dashboard repository
$container->bind("adminDashboardRepository", function () use ($container) {
    $adminDashboardRepository = $container->get("pdo");
    return new \App\Admin\Repository\AdminDashboardRepository($adminDashboardRepository);
});
// bind dashboard controller
$container->bind("adminDashboardController", function () use ($container) {
    $adminDashboardController = $container->get("adminDashboardRepository");
    $adminAuthRepository = $container->get("adminAuthRepository");
    return new \App\Admin\Controllers\AdminDashboardController($adminDashboardController, $adminAuthRepository);
});

$route = @(string) ($_GET['route'] ?? 'pages');

if ($route === 'pages') {

    $page = @(string) ($_GET['page'] ?? 'index');
    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $page_num = @(int) ($_GET['page_num'] ?? 1);

    if ($page === 'index' || (is_numeric($page) && $page > 0)) {
        $homeController = $container->get("homeController");
        $homeController->home($search);
    } else if ($page === 'orders') {
        $aboutController = $container->get("orderController");
        $aboutController->allOrders();
    } else if ($page === 'blog') {
        $blogController = $container->get("blogController");
        $blogController->blogDetails();
    } else if ($page === "add-comment") {
        $blogController = $container->get("blogController");
        $blogController->add_comment();
    } else if ($page === "create-order") {
        $aboutController = $container->get("orderController");
        $aboutController->createOrder();
    } else if ($page === "order-detail") {
        $aboutController = $container->get("orderController");
        $aboutController->orderDetail();
    } else if ($page === "register") {
        $authController = $container->get("authController");
        $authController->register();
    } else if ($page === "store-register-user") {
        $authController = $container->get("authController");
        $authController->storeRegisterUser();
    } else if ($page === "login") {
        $authController = $container->get("authController");
        $authController->login();
    } else if ($page === "user/dashboard") {
        $userController = $container->get("userController");
        $userController->userDashboard();
    } else if ($page === "user/create-blog") {
        $blogController = $container->get("blogController");
        $blogController->createBlog();
    } else if ($page === 'user/blog/edit') {
        $blogController = $container->get("blogController");
        $blogController->editBlog();
    } else if ($page === "user/blog/delete") {
        $blogController = $container->get("blogController");
        $blogController->deleteBlog();
    } else if ($page === "user/logout") {
        $authController = $container->get("authController");
        $authController->logout();
    } else {
        $authRepository = $container->get("authRepository");
        $notFoundController = new \App\Frontend\Controllers\NotFoundController($authRepository);
        $notFoundController->error404();
    }
} else if ($route === 'admin/register') {
    $adminAuthController = $container->get('adminAuthController');
    $adminAuthController->adminRegister();
} else if ($route === 'admin/login') {
    $adminAuthController = $container->get('adminAuthController');
    $adminAuthController->adminLogin();
} else if ($route === 'admin/dashboard') {
    $adminDashboardController = $container->get('adminDashboardController');
    $adminDashboardController->dashboard();
} else if ($route === "admin/logout") {
    $adminAuthController = $container->get('adminAuthController');
    $adminAuthController->logout();
}
