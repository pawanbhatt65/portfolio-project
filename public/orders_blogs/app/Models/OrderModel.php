<?php

namespace App\Models;

use DateTime;

class OrderModel
{
    public int $id;
    public int $customer_id;
    public int $total;
    public ?DateTime $created_at;

    public ?CustomerModel $customer = null;
    public ?array $products = [];
}
