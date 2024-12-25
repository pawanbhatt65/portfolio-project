<?php

namespace App\Models;

use DateTime;

class UserModel
{
    public int $id;
    public string $name;
    public string $emil;
    public string $password;
    public ?DateTime $added_at;
}
