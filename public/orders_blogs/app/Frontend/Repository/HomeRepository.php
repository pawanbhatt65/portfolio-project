<?php

namespace App\Frontend\Repository;

use PDO;

class HomeRepository
{
    public function __construct(private PDO $pdo)
    {}

    // show all blogs function logic
    public function showAllBlogs(int $limit, int $offset, string $search = '')
    {
        $query = "SELECT `blogs`.`id` AS `blog_id`,`blogs`.`title`,`blogs`.`description`,`blogs`.`added_at`,`blogs`.`edited_at`,`users`.`id` AS `user_id`, `users`.`name` AS `username` FROM `blogs` INNER JOIN `users` ON `users`.`id`=`blogs`.`user_id`";

        if (!empty($search)) {
            $query .= " WHERE `blogs`.`title` LIKE :search OR `blogs`.`description` LIKE :search";
        }

        $query .= " ORDER BY `blogs`.`id` DESC LIMIT :limit OFFSET :offset";

        $stmt = $this->pdo->prepare($query);
        if (!empty($search)) {
            $stmt->bindValue(":search", '%' . $search . '%', PDO::PARAM_STR);
        }

        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_CLASS);
        // var_dump($entries);
        // die();
        if (!empty($entries)) {
            return $entries;
        } else {
            return null;
        }
    }
    // get blogs count
    public function getCountBlogs(string $search = '')
    {
        $query = "SELECT COUNT(*) AS `count` FROM `blogs`";

        if (!empty($search)) {
            $query .= " WHERE `blogs`.`title` LIKE :search OR `blogs`.`description` LIKE :search";
        }

        $stmt = $this->pdo->prepare($query);

        if (!empty($search)) {
            $stmt->bindValue(":search", '%' . $search . '%', PDO::PARAM_STR);
        }

        $stmt->execute();
        return (int) $stmt->fetchColumn();
    }
}
