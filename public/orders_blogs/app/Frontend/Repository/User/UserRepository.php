<?php

namespace App\Frontend\Repository\User;

use PDO;

class UserRepository
{
    public function __construct(private PDO $pdo)
    {}

    // ensure session is started
    public function ensureSession()
    {
        if (session_id() === "") {
            session_start();
        }
    }

    // show only logged user all blogs
    public function showAllBlogs(): ?array
    {
        $this->ensureSession();
        $user_id = @(int) $_SESSION['is_user'];

        $query = "SELECT * FROM `blogs` WHERE `user_id`=:user_id ORDER BY `id` DESC";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
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
}
