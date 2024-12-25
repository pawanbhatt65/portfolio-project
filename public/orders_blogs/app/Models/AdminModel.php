<?php

namespace App\Models;

use DateTime;

class AdminModel
{
    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public DateTime $added_at;
}
