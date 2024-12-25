<?php

namespace App\Models;

class CustomerModel
{
    public int $id;
    public string $name;
    public string $email;

    public ?OrderModel $order = null;
}
