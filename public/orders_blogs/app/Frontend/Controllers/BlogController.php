<?php

namespace App\Frontend\Controllers;

use App\Frontend\Repository\Auth\AuthRepository;
use App\Frontend\Repository\BlogRepository;

class BlogController extends AbstractController
{
    public function __construct(private BlogRepository $blogRepository, AuthRepository $authRepository)
    {
        parent::__construct($authRepository);
    }

    // show blog detail page
    public function blogDetails()
    {
        $id = @(int) ($_GET['id'] ?? 0);
        // var_dump($id);
        $data = $this->blogRepository->fetchById($id);
        // var_dump($data);
        $this->render('pages/blog_detail', ['data' => $data]);
    }
    // add comment function
    public function add_comment()
    {
        $blog_id = @(int) ($_POST['blog_id'] ?? 0);
        $email = @(string) ($_POST['email'] ?? "");
        $comment = @(string) ($_POST['comment'] ?? "");

        $id_title = $this->blogRepository->blogIdTitle($blog_id);
        $title = "";
        $id = 0;
        if ($id_title) {
            $title = strtolower($id_title['title']);
            $id = (int) $id_title['id'];
            $title = str_replace([' ', '.', '/'], ['-', '-', '-'], $title);
            $title = preg_replace('/[^a-z0-9\-]/', '', $title);
            // var_dump($title);
        }

        if (empty($email)) {
            header("Location: index.php?page=blog&title={$title}&id={$id}");
            return;
        }
        if (empty($comment)) {
            header("Location: index.php?page=blog&title={$title}&id={$id}");
            return;
        }

        // addCommentHandler function for blogRepository
        $this->blogRepository->add_comment_handler($blog_id, $email, $comment);
        header("Location: index.php?page=blog&title={$title}&id={$id}");
    }

    // blog create function
    public function createBlog()
    {
        $errors = [];
        // die();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $title = @(string) ($_POST['title'] ?? '');
            $description = @(string) ($_POST['description'] ?? '');

            if (empty($title)) {
                $errors[] = "Title field is required!";
            }
            if (empty($description)) {
                $errors[] = "Description field is required!";
            }
            $user_id = $this->blogRepository->sessionUserId();
            if (!$user_id) {
                header("Location: index.php?page=login");
                die();
            }
            $current_date_time = date('Y-m-d H:i:s');
            // var_dump($current_date_time);
            // die();
            if (empty($errors)) {
                $this->blogRepository->createBlog($title, $description, $user_id, $current_date_time);
                header("Location: index.php?page=user/dashboard");
            }
        }
        $this->render('pages/user/createBlog', [
            'errors' => $errors,
        ]);
    }

    // edit blog
    public function editBlog()
    {
        $id = 0;
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            $id = (int) $_GET['id'];
        }

        $errors = [];
        $blog = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) ($_POST['id'] ?? $id);
            $title = @(string) ($_POST['title'] ?? "");
            $description = @(string) ($_POST['description'] ?? "");

            $url = $this->blogRepository->makeSlugFromTitle($title);

            if (empty($title)) {
                $errors[] = "Title is required!";
                header("Location: index.php?page=user/blog/edit&title={$url}&id={$id}");
            }
            if (empty($description)) {
                $errors[] = "Description is required!";
                header("Location: index.php?page=user/blog/edit&title={$url}&id={$id}");
            }
            if (empty($errors)) {
                $this->blogRepository->updateBlog($id, $title, $description);
                header("Location: index.php?page=user/dashboard");
                die();
            }

        }

        if (empty($blog) && $id !== null) {
            // var_dump($id);
            $blog = $this->blogRepository->fetchBlogById($id);
        }
        // var_dump($blog);
        $this->render('pages/user/editBlog', [
            'blog' => $blog,
            'errors' => $errors,
        ]);
    }

    // delete blog
    public function deleteBlog()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = @(int) $_POST['id'];
            $this->blogRepository->deleteBlogById($id);
            header("Location: index.php?page=user/dashboard");
            die();
        }
    }
}
