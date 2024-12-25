<?php

namespace App\Frontend\Controllers;

use App\Frontend\Repository\Auth\AuthRepository;
use App\Frontend\Repository\OrderRepository;

class OrderController extends AbstractController
{
    public function __construct(private OrderRepository $orderRepository, AuthRepository $authRepository)
    {
        parent::__construct($authRepository);
    }
    public function allOrders()
    {
        $orders = $this->orderRepository->showAllOrders();
        // var_dump($orders);
        // die();
        $this->render('pages/orders', [
            'orders' => $orders,
        ]);
    }

    // create a order
    public function createOrder()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = trim($_POST['name'] ?? "");
            $email = trim($_POST['email'] ?? "");
            $products = $_POST['products'] ?? [];

            // Extract product details
            $product_names = array_column($products, 'name');
            $quantities = array_column($products, 'quantity');
            $amounts = array_column($products, 'amount');
            $totals = array_column($products, 'total');

            // var_dump($products, $product_names, $quantities, $amounts, $totals);
            // die();

            if (empty($name) || empty($email) || empty($product_names) || empty($quantities) || empty($amounts) || empty($totals)) {
                header("Location: index.php?page=create-order");
            }
            $this->orderRepository->orderCreate($name, $email, $product_names, $quantities, $amounts, $totals);
            header("Location: index.php?page=orders");
        }
        $this->render('pages/create_order', []);
    }

    // get order detail
    public function orderDetail()
    {
        $id = @(int) $_GET['id'];

        $order = $this->orderRepository->viewOrder($id);

        $this->render('pages/order_detail', [
            'order' => $order,
        ]);
    }
}
