<?php

namespace App\Frontend\Repository;

use App\Models\BlogModel;
use App\Models\CommentModel;
use App\Models\UserModel;
use DateTime;
use PDO;

class BlogRepository
{
    public function __construct(private PDO $pdo)
    {}

    // convert htmlspecialchar
    protected function e($value)
    {
        return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
    }

    // ensure session is exists
    protected function ensureSession()
    {
        if (session_id() === '') {
            session_start();
        }
    }

    // get session user_id
    public function sessionUserId()
    {
        $this->ensureSession();
        if ($_SESSION['is_user']) {
            return $_SESSION['is_user'];
        }
    }

    // make slug from title
    public function makeSlugFromTitle($title)
    {
        $title = strtolower($title);
        $title = str_replace([' ', '.', '/', '\/'], ['-', '-', '-', '-'], $title);
        $title = preg_replace('/[^a-z0-9\-]/', '', $title);
        return $title;
    }

    // fetch data for blog details page
    public function fetchById(int $id): ?BlogModel
    {
        $query = "SELECT `blogs`.`id` AS `blog_id`,`blogs`.`title`,`blogs`.`description`,`blogs`.`added_at`,`blogs`.`edited_at`,`users`.`id` AS `user_id`, `users`.`name` AS `username` FROM `blogs` LEFT JOIN `users` ON `users`.`id`=`blogs`.`user_id` WHERE `blogs`.`id`=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        // $stmt->setFetchMode(PDO::FETCH_CLASS, BlogModel::class);
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($entry);
        if ($entry) {
            $blog = new BlogModel();
            $blog->id = $entry['blog_id'];
            $blog->title = $entry['title'];
            $blog->description = $entry['description'];
            $blog->added_at = $entry['added_at'] ? new DateTime($entry['added_at']) : null;
            $blog->edited_at = $entry['edited_at'] ? new DateTime($entry['edited_at']) : null;

            // var_dump($blog);

            $user = new UserModel();
            $user->id = $entry['user_id'];
            $user->name = $entry['username'];

            $blog->user = $user;

            $comments_query = "SELECT * FROM `comments` WHERE `blog_id`=:blog_id ORDER BY `id` DESC";
            $stmt_comment = $this->pdo->prepare($comments_query);
            $stmt_comment->bindValue(":blog_id", $entry['blog_id'], PDO::PARAM_INT);
            $stmt_comment->execute();
            $comment_result = $stmt_comment->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($comment_result);

            foreach ($comment_result as $comment) {
                $new_comment = new CommentModel();
                $new_comment->id = $comment['id'];
                $new_comment->email = $comment['email'];
                $new_comment->comment = $comment['comment'];
                $new_comment->blog_id = $comment['blog_id'];
                $blog->comments[] = $new_comment;
            }

            // var_dump($blog);
            return $blog;
        }
        return null;
    }

    // add comments logic
    public function add_comment_handler(int $blog_id, string $email, string $comment)
    {
        $query = "INSERT INTO `comments` (`email`,`comment`,`blog_id`) VALUES (:email,:comment,:blog_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":comment", $comment, PDO::PARAM_STR);
        $stmt->bindValue(":blog_id", $blog_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // get blog id-title
    public function blogIdTitle(int $id)
    {
        // var_dump($id);
        $query = "SELECT * FROM `blogs` WHERE `id`=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        // $stmt->setFetchMode(PDO::FETCH_CLASS, BlogModel::class);
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($entry);
        return $entry;
    }

    // create blog
    public function createBlog(string $title, string $description, int $user_id, $added_at)
    {
        $query = "INSERT INTO `blogs` (`title`,`description`,`added_at`,`user_id`) VALUES (:title, :description, :added_at, :user_id)";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":added_at", $added_at);
        $stmt->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // blog fetch from id
    public function fetchBlogById(int $id)
    {
        $query = "SELECT * FROM `blogs` WHERE id=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $entry = $stmt->fetch(PDO::FETCH_ASSOC);
        return $entry;
    }

    // blog update
    public function updateBlog(int $id, string $title, string $description)
    {
        $query = "UPDATE `blogs` SET `title`=:title, `description`=:description WHERE `id`=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":title", $title, PDO::PARAM_STR);
        $stmt->bindValue(":description", $description, PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    // delete blog
    public function deleteBlogById(int $id)
    {
        $query = "DELETE FROM `blogs` WHERE id=:id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
