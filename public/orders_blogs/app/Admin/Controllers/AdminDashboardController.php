<?php

namespace App\Admin\Controllers;

use App\Admin\Repository\AdminAuthRepository\AdminAuthRepository;
use App\Admin\Repository\AdminDashboardRepository;

class AdminDashboardController extends AdminAbstractController
{
    public function __construct(private AdminDashboardRepository $adminDashboardRepository, AdminAuthRepository $adminAuthRepository)
    {
        parent::__construct($adminAuthRepository);
    }

    public function dashboard()
    {
        $get_users = $this->adminDashboardRepository->getAllUsers();
        $get_customers = $this->adminDashboardRepository->getAllCustomers();
        $get_blogs = $this->adminDashboardRepository->getAllBlogs();
        $get_orders = $this->adminDashboardRepository->getAllOrders();
        $get_products = $this->adminDashboardRepository->getAllProducts();
        // var_dump(count($get_users));
        $this->render('pages/admin/dashboard', [
            'users' => $get_users,
            'customers' => $get_customers,
            'blogs' => $get_blogs,
            'orders' => $get_orders,
            'products' => $get_products,
        ]);
    }
}
