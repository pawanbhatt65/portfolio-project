<?php

namespace App\Frontend\Repository;

use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\ProductModel;
use DateTime;
use PDO;

class OrderRepository
{
    public function __construct(private PDO $pdo)
    {}

    // showAllOrders function
    public function showAllOrders()
    {
        $query = "SELECT `orders`.`id` AS `order_id`, `orders`.`total`,`orders`.`created_at`, `customers`.`name` AS `customer_name`, `customers`.`id` AS `customer_id` FROM `orders` INNER JOIN `customers` ON `customers`.`id`=`orders`.`customer_id` ORDER BY `orders`.`id` DESC";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($entries);
        // die();
        if (!empty($entries)) {
            return $entries;
        } else {
            return null;
        }
    }

    // order create
    public function orderCreate(string $name, string $email, array $products_name, array $quantities, array $amounts, array $totals)
    {
        $created_at = date('Y-m-d H:i:s');
        $customer_query = "INSERT INTO `customers` (`name`,`email`) VALUES (:name,:email)";
        $c_stmt = $this->pdo->prepare($customer_query);
        $c_stmt->bindValue(":name", $name, PDO::PARAM_STR);
        $c_stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $c_stmt->execute();

        $customer_id = $this->pdo->lastInsertId();
        $total = (int) array_sum($totals);

        $o_stmt = $this->pdo->prepare("INSERT INTO `orders` (`customer_id`,`total`,`created_at`) VALUES (:customer_id,:total,:created_at)");
        $o_stmt->bindValue(":customer_id", $customer_id, PDO::PARAM_INT);
        $o_stmt->bindValue(":total", $total, PDO::PARAM_INT);
        $o_stmt->bindValue(":created_at", $created_at);
        $o_stmt->execute();

        $order_id = $this->pdo->lastInsertId();

        foreach ($products_name as $index => $name) {
            $quantity = (int) $quantities[$index];
            $amount = (int) $amounts[$index];

            $p_query = "INSERT INTO `products` (`name`,`quantity`,`amount`,`order_id`) VALUES (:name,:quantity,:amount,:order_id)";
            $p_stmt = $this->pdo->prepare($p_query);
            $p_stmt->bindValue(":name", $name, PDO::PARAM_STR);
            $p_stmt->bindValue("quantity", $quantity, PDO::PARAM_INT);
            $p_stmt->bindValue(":amount", $amount, PDO::PARAM_INT);
            $p_stmt->bindValue(":order_id", $order_id, PDO::PARAM_INT);
            $p_stmt->execute();
        }
    }

    // view order
    public function viewOrder(int $id)
    {
        $query = "SELECT `orders`.`id`, `orders`.`created_at`,`orders`.`total`, `customers`.`id` AS `customer_id`, `customers`.`name` AS `customer_name`, `customers`.`email` FROM `orders` INNER JOIN `customers` ON `customers`.`id`=`orders`.`customer_id` WHERE `orders`.`id`=:id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($entry);
        // die();
        if (empty($entry)) {
            return false;
        }
        $order = new OrderModel();
        $order->id = $entry['id'];
        $order->total = $entry['total'];
        $order->created_at = $entry['created_at'] ? new DateTime($entry['created_at']) : "";

        $customer = new CustomerModel();
        $customer->id = $entry['customer_id'];
        $customer->name = $entry['customer_name'];
        $customer->email = $entry['email'];
        // var_dump($order, $entry);

        $order->customer = $customer;

        $product_query = "SELECT * FROM `products` WHERE `order_id`=:order_id";
        $p_stmt = $this->pdo->prepare($product_query);
        $p_stmt->bindValue(":order_id", $entry['id'], PDO::PARAM_INT);
        $p_stmt->execute();
        $entries = $p_stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($entries);

        foreach ($entries as $e) {
            $product = new ProductModel();
            $product->id = $e['id'];
            $product->name = $e['name'];
            $product->quantity = $e['quantity'];
            $product->amount = $e['amount'];
            $product->order_id = $e['order_id'];

            $order->products[] = $product;
        }
        // var_dump($order);
        // die();
        return $order;
    }
}
