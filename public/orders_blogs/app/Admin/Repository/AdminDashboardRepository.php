<?php

namespace App\Admin\Repository;

use PDO;

class AdminDashboardRepository
{
    public function __construct(private PDO $pdo)
    {}

    // all users
    public function getAllUsers(): ?array
    {
        $query = "SELECT * FROM `users`";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($entries);
        if (!empty($entries)) {
            return $entries;
        } else {
            return null;
        }
    }

    // all customers
    public function getAllCustomers(): ?array
    {
        $query = "SELECT * FROM `customers`";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($entries);
        if (!empty($entries)) {
            return $entries;
        } else {
            return null;
        }
    }

    // all blogs
    public function getAllBlogs(): ?array
    {
        $query = "SELECT * FROM `blogs`";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($entries);
        if (!empty($entries)) {
            return $entries;
        } else {
            return null;
        }
    }

    // all orders
    public function getAllOrders(): ?array
    {
        $query = "SELECT * FROM `orders`";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($entries);
        if (!empty($entries)) {
            return $entries;
        } else {
            return null;
        }
    }

    // all products
    public function getAllProducts(): ?array
    {
        $query = "SELECT * FROM `products`";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // var_dump($entries);
        if (!empty($entries)) {
            return $entries;
        } else {
            return null;
        }
    }
}
