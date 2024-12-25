<?php

namespace App\Models;

class CommentModel
{
    public int $id;
    public string $email;
    public string $comment;
    public int $blog_id;

    // public ?BlogModel $blog = null;
}
