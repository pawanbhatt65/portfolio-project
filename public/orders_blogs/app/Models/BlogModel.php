<?php

namespace App\Models;

use DateTime;

class BlogModel
{
    public int $id;
    public string $title;
    public string $description;
    public ?DateTime $added_at;
    public ?DateTime $edited_at;
    public int $user_id;

    public ?UserModel $user = null; // default null else hydrate
    public array $comments = [];
}
